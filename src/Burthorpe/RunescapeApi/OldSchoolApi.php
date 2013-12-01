<?php

namespace Burthorpe\RunescapeApi;

class OldSchoolApi
{
    /**
     * URL resources
     */
    private $resources = array(
        'highscores_url' => 'http://services.runescape.com/m=hiscore_oldschool/index_lite.ws?player=%s',
    );
    
    /**
     * Runescape skills
     */
    private $skills = array('overall', 'attack', 'defence', 'strength', 'hitpoints', 'ranged', 'prayer', 'magic', 'cooking', 'woodcutting', 'fletching', 'fishing', 'firemaking', 'crafting', 'smithing', 'mining', 'herblore', 'agility', 'thieving', 'slayer', 'farming', 'runecrafting', 'hunter', 'construction');
    
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
}
