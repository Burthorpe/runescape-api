<?php

namespace Burthorpe\Runescape\RS3\Skills;

interface Contract
{
    /**
     * Get the skills ID
     *
     * @return int
     */
    public function getId();

    /**
     * Get the name of the skill
     *
     * @return string
     */
    public function getName();

    /**
     * Get the maximum possible experience for the skill
     *
     * @return int
     */
    public function getMaximumExperience();

    /**
     * Get the maximum possible level for the skill
     *
     * @return int
     */
    public function getMaximumLevel();

    /**
     * Does the skill effect a players combat level
     *
     * @return bool
     */
    public function isCombat();

    /**
     * Does the skill require a membership subscription
     *
     * @return bool
     */
    public function isMembers();
}