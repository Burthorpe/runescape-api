<?php

namespace Burthorpe\Runescape\RS3;

use Exception;
use Burthorpe\Runescape\Common;

class Player
{
    /**
     * @var \Burthorpe\Runescape\Common
     */
    protected $common;

    /**
     * @var \Burthorpe\Runescape\RS3\API
     */
    protected $api;

    /**
     * Players display name
     *
     * @var string
     */
    protected $displayName;

    /**
     * @var array
     */
    protected $stats;

    /**
     * @param $displayName string Runescape display name
     * @throws Exception
     */
    public function __construct($displayName)
    {
        $this->common = new Common();
        $this->api = new API();

        if ($this->common->validateDisplayName($displayName) === false)
        {
            throw new Exception('Invalid Display Name given (Maximum of 12 characters and only contain letters, numbers, dashes, underscores and spaces)');
        }

        $this->displayName = $displayName;
    }

    /**
     * Return the players stats
     *
     * @return array|bool
     */
    public function getStats()
    {
        if ($this->stats) return $this->stats;

        return $this->stats = $this->api->stats($this->displayName);
    }

    public function getCombatLevel()
    {

    }


}