<?php

namespace Burthorpe\Runescape\RS3\Stats;

interface Contract
{
    /**
     * Return the skill related to this stat
     *
     * @return \Burthorpe\Runescape\RS3\Skills\Skill
     */
    public function getSkill();

    /**
     * Return the players current level in this skill
     *
     * @return int
     */
    public function getLevel();

    /**
     * Return the players current rank in this skill
     *
     * @return int
     */
    public function getRank();

    /**
     * Return the players current experience in this skill
     *
     * @return int
     */
    public function getExperience();
}