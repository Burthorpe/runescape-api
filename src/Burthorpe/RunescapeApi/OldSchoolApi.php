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
     * Default combat stats
     */
    private $defaultStats = array(
        'attack'    => 1,
        'strength'  => 1,
        'defence'   => 1,
        'hitpoints' => 10,
        'ranged'    => 1,
        'prayer'    => 1,
        'magic'     => 1,
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
        
        $combat['remainders'] = array(
            'strength_attack' => ceil($combat['remainder_diff'] / (1.0/3.0)),
            'defence_constitution' => ceil($combat['remainder_diff'] / (0.25)),
            'prayer' => ceil($combat['remainder_diff'] / 0.125),
        );
        
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
