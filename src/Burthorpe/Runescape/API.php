<?php namespace Burthorpe\Runescape;

use GuzzleHttp\Client as Guzzle;

/**
 * @method \GuzzleHttp\Message\ResponseInterface get(string $url, array $options)
 */
class API {

    /*
     * Guzzle HTTP client for making requests
     *
     * @var \GuzzleHttp\Client
     */
    protected $guzzle;

    /*
     * Skills helpers class
     *
     * @var \Burthorpe\Runescape\Skills
     */
    protected $skills;

    /*
     * Class constructor
     */
    public function __construct()
    {
        $this->guzzle = new Guzzle([
            'defaults' => [
                'headers' => [
                    'User-Agent' => 'Burthorpe Runescape API',
                ]
            ]
        ]);

        $this->skills = new Skills;
    }

    /*
     * Checks if the given string is a valid display name
     *
     * @param string $rsn
     * @return boolean
     */
    public function validateDisplayName($rsn)
    {
        return (bool) preg_match('/^[a-z0-9\-_ ]{1,12}$/i', $rsn);
    }

    /*
     * Expands a short-hand number to its full value
     *
     * @param string $number
     * @return float
     */
    public function expandNumber($number)
    {
        switch(strtoupper(substr($number, -1)))
        {
            case 'B':
                $multiplier = 1000000000;
                break;
            case 'M':
                $multiplier = 1000000;
                break;
            case 'K':
                $multiplier = 1000;
                break;
            default:
                $multiplier = 1;
        }

        return (int) intval($number) * $multiplier;
    }

    /*
     * Compact a number into short-hand
     *
     * @param integer $number
     * @return string
     */
    public function shortenNumber($number)
    {
        $abbr = [9 => 'B', 6 => 'M', 3 => 'K', 0 => ''];

        foreach($abbr as $exponent => $suffix)
        {
            if ($number >= pow(10, $exponent))
            {
                return intval($number / pow(10, $exponent)) . $suffix;
            }
        }

        return $number;
    }

    /*
     * Calculate a level with the give amount of experience
     *
     * @param integer $xp
     * @return integer
     */
    public function xpTolevel($xp)
    {
        $modifier = 0;

        for($i = 1; $i <= 126; $i++)
        {
            $modifier += floor($i + 300 * pow(2, ($i / 7)));
            $level = floor($modifier / 4);

            if ($xp < $level)
            {
                return $i;
            }
        }

        // Return the maximum possible level
        return 126;
    }

    /*
     * Calculates the minimum experience needed for the given level
     *
     * @param integer $level
     * @return integer
     */
    public function levelToXp($level)
    {
        $xp = 0;

        for ($i = 1; $i < $level; $i++)
        {
            $xp += floor($i + 300 * pow(2, ($i / 7)));
        }

        $xp = floor($xp / 4);

        // Check if our value is above 200m, if so return 200m, otherwise our value
        return ($xp > 200000000 ? 200000000 : $xp);
    }

    /*
     * Get access to the skills helper
     *
     * @return \Burthorpe\Runescape\Skills\Helper
     */
    public function getSkills()
    {
        return $this->skills;
    }

    /*
     * Call magic methods on guzzle instance
     *
     * @return mixed
     */
    public function __call($method, $params)
    {
        return call_user_func_array([$this->guzzle, $method], $params);
    }

}