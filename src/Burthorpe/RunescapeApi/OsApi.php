<?php namespace Burthorpe\RunescapeApi;

class OsApi {

    /**
     * URL resources
     */
    protected $resources = [
        'highscores_url' => 'http://services.runescape.com/m=hiscore_oldschool/index_lite.ws?player=%s',
    ];

    /**
     * Runescape skills
     */
    protected $skills = ['overall', 'attack', 'defence', 'strength', 'hitpoints', 'ranged', 'prayer', 'magic', 'cooking', 'woodcutting', 'fletching', 'fishing', 'firemaking', 'crafting', 'smithing', 'mining', 'herblore', 'agility', 'thieving', 'slayer', 'farming', 'runecrafting', 'hunter', 'construction'];

    /**
     * Default combat stats
     */
    protected $defaultStats = [
        'attack'    => 1,
        'strength'  => 1,
        'defence'   => 1,
        'hitpoints' => 10,
        'ranged'    => 1,
        'prayer'    => 1,
        'magic'     => 1,
    ];

    /**
     * @return string A URL to the supplied resource name
     */
    public function getResource($resource)
    {
        return ($this->resources[$resource] ? $this->resources[$resource] : null);
    }

    /**
     * Returns an array of the Runescape skills
     *
     * @return array
     */
    public function getSkills()
    {
        return $this->skills;
    }

    /**
     * Gets a users skill stats
     *
     * @param string $rsn The users runescape display name
     * @return array|boolean Boolean false if the user was not found (or server error).
     */
    public function getStats($rsn)
    {
        $result = RunescapeApi::curl(sprintf($this->getResource('highscores_url'), $rsn));

        if ($result === false)
            return false;

        $result = explode("\n", $result);
        $stats = [];

        for ($i = 0; $i < count($this->skills); $i++)
        {
            $stat = explode(",", $result[$i]);

            $stats[$this->skills[$i]]['rank'] = (int) $stat[0];
            $stats[$this->skills[$i]]['level'] = (int) $stat[1];
            $stats[$this->skills[$i]]['exp'] = (int) $stat[2];
        }

        return $stats;
    }

    /**
     * Calculates a users combat level
     *
     * @param array $stats An single level array of the users levels. Only combat levels are used, if missing are assumed the default levels
     * @return array An array of calculations relating to the users combat level.
     */
    public function calcCombat($stats)
    {
        $stats = array_merge($this->defaultStats, $stats);

        $combat['base_level'] = ($stats['defence'] + $stats['hitpoints'] + floor($stats['prayer'] / 2)) * 0.25;
        $combat['base_melee'] = ($stats['attack'] + $stats['strength']) * 0.325;
        $combat['base_range'] = floor($stats['ranged'] * 1.5) * 0.325;
        $combat['base_magic'] = floor($stats['magic'] * 1.5) * 0.325;

        $combat['combat_level'] = $combat['base_level'] + max($combat['base_melee'], $combat['base_range'], $combat['base_magic']);

        if (is_float($combat['combat_level']))
            $combat['remainder_diff'] = ceil($combat['combat_level']) - $combat['combat_level'];
        else
            $combat['remainder_diff'] = $combat['combat_level'] + 1;

        $combat['remainders'] = [
            'strength_attack' => ceil($combat['remainder_diff'] / (1.0/3.0)),
            'defence_constitution' => ceil($combat['remainder_diff'] / (0.25)),
            'prayer' => ceil($combat['remainder_diff'] / 0.125),
        ];

        return $combat;
    }

}
