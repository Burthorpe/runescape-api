<?php

namespace Burthorpe\Runescape\RS3;

use Burthorpe\Runescape\RS3\Skills\Attack;
use Burthorpe\Runescape\RS3\Skills\Constitution;
use Burthorpe\Runescape\RS3\Skills\Defence;
use Burthorpe\Runescape\RS3\Skills\Magic;
use Burthorpe\Runescape\RS3\Skills\Prayer;
use Burthorpe\Runescape\RS3\Skills\Ranged;
use Burthorpe\Runescape\RS3\Skills\Strength;
use Burthorpe\Runescape\RS3\Skills\Summoning;
use InvalidArgumentException;
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
     * @throws InvalidArgumentException
     */
    public function __construct($displayName)
    {
        $this->common = new Common();
        $this->api = new API();

        if ($this->common->validateDisplayName($displayName) === false)
        {
            throw new InvalidArgumentException('Invalid Display Name given (Maximum of 12 characters and only contain letters, numbers, dashes, underscores and spaces)');
        }

        $this->displayName = $displayName;
    }

    /**
     * Return the players stats
     *
     * @return \Burthorpe\Runescape\RS3\Stats\Repository|bool
     */
    public function getStats()
    {
        if ($this->stats) return $this->stats;

        return $this->stats = $this->api->stats($this->getDisplayName());
    }

    /**
     * Return the calculated combat level of this player
     *
     * @param bool $float
     * @return int
     */
    public function getCombatLevel($float = false)
    {
        $stats = $this->getStats();

        return $this->api->calculateCombatLevel(
            $stats->findByClass(Attack::class)->getLevel(),
            $stats->findByClass(Strength::class)->getLevel(),
            $stats->findByClass(Magic::class)->getLevel(),
            $stats->findByClass(Ranged::class)->getLevel(),
            $stats->findByClass(Defence::class)->getLevel(),
            $stats->findByClass(Constitution::class)->getLevel(),
            $stats->findByClass(Prayer::class)->getLevel(),
            $stats->findByClass(Summoning::class)->getLevel(),
            $float
        );
    }

    public function getDisplayName()
    {
        return $this->displayName;
    }

}