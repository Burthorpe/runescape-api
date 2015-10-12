<?php

namespace Burthorpe\Runescape\RS3;

use Burthorpe\Runescape\RS3\Skills\Contract as SkillContract;
use Burthorpe\Runescape\RS3\Skills\Repository;
use Illuminate\Support\Collection;
use GuzzleHttp\Client as Guzzle;

class API
{
    /**
     * @var \Burthorpe\Runescape\RS3\Skills\Repository
     */
    protected $skills;

    /**
     * Guzzle HTTP client for making requests
     *
     * @var \GuzzleHttp\Client
     */
    protected $guzzle;

    /**
     * Array of resource URLs
     *
     * @var array
     */
    protected $resources = [
        'hiscores' => 'http://hiscore.runescape.com/index_lite.ws',
    ];

    /**
     * Class constructor
     */
    public function __construct()
    {
        $this->skills = new Repository();

        $this->guzzle = new Guzzle([
            'defaults' => [
                'headers' => [
                    'User-Agent' => 'Burthorpe Runescape API',
                ],
                'exceptions' => false,
            ],
        ]);
    }

    /**
     * Get a players statistics from the hiscores API feed
     *
     * @return mixed
     */
    public function stats($rsn)
    {
        $response = $this->guzzle->get(
            $this->resources['hiscores'],
            ['query' => [
                    'player' => $rsn,
                ],
            ]
        );

        if ($response->getStatusCode() !== 200) return false;

        $raw = array_map(
            function ($raw) {
                $stat = explode(',', $raw);

                return [
                    'rank'  => $stat[0],
                    'level' => $stat[1],
                    'xp'    => $stat[2],
                ];
            },
            array_slice(
                explode("\n", $response->getBody()),
                0,
                $this->getSkills()->count()
            )
        );

        $collection = new Collection();

        $this->getSkills()->each(function (SkillContract $skill) use ($collection, $raw) {
            $collection->put(
                $skill->getName(),
                new Collection(
                    $raw[$skill->getId()]
                )
            );
        });

        return $collection;
    }

    /**
     * Get access to the skills helper
     *
     * @return \Burthorpe\Runescape\RS3\Skills\Repository
     */
    public function getSkills()
    {
        return $this->skills;
    }

    /**
     * Calculates a players combat level
     *
     * @param  int $attack
     * @param  int $strength
     * @param  int $magic
     * @param  int $ranged
     * @param  int $defence
     * @param  int $constitution
     * @param  int $prayer
     * @param  int $summoning
     * @return int
     */
    public function calculateCombatLevel($attack, $strength, $magic, $ranged, $defence, $constitution, $prayer, $summoning)
    {
        $highest = max(($attack + $strength), (2 * $magic), (2 * $ranged));

        return floor(0.25 * ((1.3 * $highest) + $defence + $constitution + floor(0.5 * $prayer) + floor(0.5 * $summoning)));
    }
}
