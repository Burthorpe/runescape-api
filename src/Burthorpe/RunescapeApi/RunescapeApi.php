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
    
    /**
     * Convert experience to a level
     * 
     * @return int The level the given experience corresponds to
     */
    public function expToLevel($exp)
    {
        $modifier = 0;
        
        for ($i = 1; $i <= 200; $i++)
        {
            $modifier += floor($i + 300 * (2 ^ ($i / 7)));
            $level = floor($modifier/4);
            
            if ($exp < $level)
                return $i;
        }
        
        return 200; // Max possible level
    }
    
    /**
     * Convert a level to experience
     * 
     * @return int The experience that corresponds to the given level
     */
    public function levelToExp($level)
    {
        $exp = 0;
        
        for ($i = 1; $i < $level; $i++)
            $exp += floor($i + 300 * (2 ^ ($i / 7)));
        
        return floor($exp / 4);
    }
    
    /**
     * Shorten a number to K, M, B. e.g: 5,000 becomes 5k.
     * 
     * @param int $num The number being shortened
     * @param boolean $useful If an array of useful items should be returned
     * @return string|array String of the formatted number or Array of the formatted number, the shortened number, suffix and html colours
     */
    public function shortenNumber($num, $useful = false)
    {
        $abbrevs = array(9 => 'B', 6 => 'M', 3 => 'K', 0 => '');
        
        foreach($abbrevs as $exponent => $suffix)
            if ($num >= pow(10, $exponent))
            {
                $return['shortened'] = intval($num / pow(10, $exponent));
                $return['suffix'] = $suffix;
                $return['formatted'] = intval($num / pow(10, $exponent)) . $suffix;
                
                break;
            }
        
        switch($return['suffix'])
        {
            case 'B':
                $return['colour'] = '#00CC66';
                break;
            case 'M':
                $return['colour'] = '#FF9900';
                break;
            default:
                $return['colour'] = '#555555';
        }
        
        return ($useful ? $return : $return['formatted']);
    }
    
    /**
     * Expends a shortened number. e.g: 5k becomes 5,000
     * 
     * @param string $num
     * @return int The expanded number
     */
    public function expandNumber($num, $useful = false)
    {
        $multiplier = 1;
        $num = strtoupper($num);
        $suffix = substr($num, -1);
        
        switch($suffix)
        {
            case 'B':
                $multiplier = 1000000000;
                break;
            case 'M':
                $multiplier = 1000000;
                break;
            case 'K':
                $multiplier = 1000;
        }
        
        return round(floatval($num) * $multiplier, 1);
    }
}
