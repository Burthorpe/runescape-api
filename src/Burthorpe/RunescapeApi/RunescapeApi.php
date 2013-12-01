<?php

namespace Burthorpe\RunescapeApi;

class RunescapeApi
{
    /**
     * URL resources
     */
    private $resources = array(
        'highscores_url' => 'http://hiscore.runescape.com/index_lite.ws?player=%s',
    );
    
    /**
     * Runescape skills
     */
    private $skills = array('overall', 'attack', 'defence', 'strength', 'constitution', 'ranged', 'prayer', 'magic', 'cooking', 'woodcutting', 'fletching', 'fishing', 'firemaking', 'crafting', 'smithing', 'mining', 'herblore', 'agility', 'thieving', 'slayer', 'farming', 'runecrafting', 'hunter', 'construction', 'summoning', 'dungeoneering', 'divination');
    
    /**
     * Default combat stats
     */
    private $defaultStats = array(
        'attack'       => 1,
        'strength'     => 1,
        'defence'      => 1,
        'ranged'       => 1,
        'magic'        => 1,
        'summoning'    => 1,
    );
    
    /**
     * A CURL wrapper for easily fetching data from a URL
     * 
     * @param string $url The url the curl request should fetch
     * @param int $timeout The number of seconds before curl should timeout
     * @return string|boolean A boolean(false) on a failed request. String of data from the curl request
     */
    private function curl($url, $timeout = 3)
    {
        $ch = curl_init(utf8_encode($url));
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_TIMEOUT, $timeout);
        
        $result = curl_exec($ch);
        $http_code = curl_getinfo($ch, CURLINFO_HTTP_CODE);
        curl_close($ch);
        
        if ($http_code == "200" && $result)
            return $result;
        else
            return false;
    }
    
    /**
     * 
     * 
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
        $result = $this->curl(sprintf($this->getResource('highscores_url'), $rsn));
        
        if ($result === false)
            return false;
        
        $result = explode("\n", $result);
        $stats = array();
        
        for ($i = 0; $i < count($this->skills); $i++)
        {
            $stat = explode(",", $result[$i]);
            
            $stats[$this->skills[$i]]['rank'] = $stat[0];
            $stats[$this->skills[$i]]['level'] = $stat[1];
            $stats[$this->skills[$i]]['exp'] = $stat[2];
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
        
        $combat['highest_stat'] = 'attack';
        $cmbSkills = array('attack', 'strength', 'ranged', 'magic', 'summoning');
        
        // Could use max() here but doesnt give us the name of the skill thats their highest
        foreach ($cmbSkills as $skill)
            if ($stats[$combat['highest_stat']] < $stats[$skill])
                $combat['highest_stat'] = $skill;
        
        $combat['combat_level'] = (int) floor(($stats[$combat['highest_stat']] + $stats['defence']) + 2);
        $combat['attack_combat'] = (int) floor(($stats['attack'] + $stats['defence']) + 2);
        $combat['strength_combat'] = (int) floor(($stats['strength'] + $stats['defence']) + 2);
        $combat['ranged_combat'] = (int) floor(($stats['ranged'] + $stats['defence']) + 2);
        $combat['magic_combat'] = (int) floor(($stats['magic'] + $stats['defence']) + 2);
        $combat['summoning_combat'] = (int) floor(($stats['summoning'] + $stats['defence']) + 2);
        
        return $combat;
    }
}
