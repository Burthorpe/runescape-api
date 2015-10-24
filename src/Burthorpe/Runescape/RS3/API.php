<?php

namespace Burthorpe\Runescape\RS3;

use Burthorpe\Exception\UnknownPlayerException;
use Burthorpe\Runescape\RS3\Skills\Repository as SkillsRepository;
use Burthorpe\Runescape\RS3\Stats\Repository as StatsRepository;
use GuzzleHttp\Client as Guzzle;
use GuzzleHttp\Exception\RequestException;
use GuzzleHttp\Psr7\Request;

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
        'hiscores' => 'http://hiscore.runescape.com/index_lite.ws?player=%s',
    ];

    /**
     * Class constructor
     */
    public function __construct()
    {
        $this->skills = new SkillsRepository();

        $this->guzzle = new Guzzle([
            'headers' => [
                'User-Agent' => 'Burthorpe Runescape API',
            ],
        ]);
    }

    /**
     * Get a players statistics from the hiscores API feed
     *
     * @return \Burthorpe\Runescape\RS3\Stats\Repository|bool
     *
     * @throws \Burthorpe\Exception\UnknownPlayerException
     */
    public function stats($rsn)
    {
        $request = new Request('GET', sprintf($this->resources['hiscores'], $rsn));

        try {
            $response = $this->guzzle->send($request);
        } catch (RequestException $e) {
            throw new UnknownPlayerException('Unknown player');
        }

        return StatsRepository::factory($response->getBody());
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
     * @param  int  $attack
     * @param  int  $strength
     * @param  int  $magic
     * @param  int  $ranged
     * @param  int  $defence
     * @param  int  $constitution
     * @param  int  $prayer
     * @param  int  $summoning
     * @param  bool $float
     * @return int
     */
    public function calculateCombatLevel($attack, $strength, $magic, $ranged, $defence, $constitution, $prayer, $summoning, $float = false)
    {
        $highest = max(($attack + $strength), (2 * $magic), (2 * $ranged));

        $cmb = floor(0.25 * ((1.3 * $highest) + $defence + $constitution + floor(0.5 * $prayer) + floor(0.5 * $summoning)));

        return $float ? $cmb : (int) $cmb;
    }
}
