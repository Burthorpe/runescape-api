<?php

namespace Burthorpe\Runescape\RS3;

use Burthorpe\Runescape\Common;
use Illuminate\Support\Collection;

class API
{
    /**
     * @var \Burthorpe\Runescape\Common
     */
    protected $common;

    /**
     * @var \Burthorpe\Runescape\RS3\Skills\Repository
     */
    protected $skills;

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
        $this->common = new Common();
        $this->skills = new Skills();
    }

    /**
     * Call magic methods on \Burthorpe\Runescape\Common
     */
    public function __call($method, $args)
    {
        return call_user_func_array([$this->common, $method], $args);
    }

    /**
     * Get a players statistics from the hiscores API feed
     *
     * @return mixed
     */
    public function stats($rsn)
    {
        $response = $this->common->get(
            $this->resources['hiscores'],
            ['query' => [
                    'player' => $rsn,
                ],
            ]
        );

        if ($response->getStatusCode() !== 200) {
            return false;
        }

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

        $this->skills->each(function ($skill) use ($collection, $raw) {
            $collection->put($skill->get('name'), new Collection($raw[$skill->get('id')]));
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
