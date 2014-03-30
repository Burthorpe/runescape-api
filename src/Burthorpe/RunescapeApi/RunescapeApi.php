<?php namespace Burthorpe\RunescapeApi;

class RunescapeApi {

    /**
     * A CURL wrapper for easily fetching data from a URL
     *
     * @param string $url The url the curl request should fetch
     * @param int $timeout The number of seconds before curl should timeout
     * @return string|boolean A boolean(false) on a failed request. String of data from the curl request
     */
    public static function curl($url, $timeout = 3)
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
    public function expandNumber($num)
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
