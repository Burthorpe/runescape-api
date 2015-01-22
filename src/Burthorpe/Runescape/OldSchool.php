<?php namespace Burthorpe\Runescape;

use Illuminate\Support\Collection;

class OldSchool {

    /*
     * Burthorpe API instance
     *
     * @var \Burthorpe\Runescape\API
     */
    protected $api;

    /*
     * Array of resource URLs
     *
     * @var array
     */
    protected $resources = [
        'hiscores' => 'http://services.runescape.com/m=hiscore_oldschool/index_lite.ws',
    ];

    /*
     * Class constructor
     */
    public function __construct()
    {
        $this->api = new API;
    }

    /*
     * Get a players statistics from the hiscores API feed
     *
     * @return mixed
     */
    public function stats($rsn)
    {
        $response = $this->api->get(
            $this->resources['hiscores'],
            ['query' => [
                    'player' => $rsn,
                ]
            ]
        );

        if ($response->getStatusCode() !== 200)
        {
            return false;
        }

        $raw = array_map(
            function($raw)
            {
                $stat = explode(',', $raw);

                return [
                    'rank' => $stat[0],
                    'level' => $stat[1],
                    'xp' => $stat[2],
                ];
            },
            array_slice(
                explode("\n", $response->getBody()),
                0,
                $this->api->getOldSchoolSkills()->count() - 1
            )
        );

        $collection = new Collection;

        $this->api->getOldSchoolSkills()
                  ->each(function($skill) use ($collection, $raw)
        {
            $collection->put($skill->getname(), new Collection($raw[0]));
        });

        return $collection;
    }

    /*
     * Calculates a player combat level
     *
     * @param integer $hitpoints
     * @param integer $attack
     * @param integer $strength
     * @param integer $defence
     * @param integer $ranged
     * @param integer $magic
     * @param integer $prayer
     * @return float
     */
    public function calculateCombatLevel($hitpoints, $attack, $strength, $defence, $ranged, $magic, $prayer)
    {
        $combat['base_level'] = ($defence + $hitpoints + floor($prayer / 2)) * 0.25;
        $combat['base_melee'] = ($attack + $strength) * 0.325;
        $combat['base_ranged'] = floor($ranged * 1.5) * 0.325;
        $combat['base_magic'] = floor($magic * 1.5) * 0.325;

        $combat['combat_level'] = $combat['base_level'] + max($combat['base_melee'], $combat['base_ranged'], $combat['base_magic']);

        return $combat['combat_level'] + max($combat['base_melee'], $combat['base_ranged'], $combat['base_magic']);
    }

}