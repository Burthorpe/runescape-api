<?php

namespace Burthorpe\Runescape\RS3\Skills;

final class Strength extends Skill
{
    /**
     * {@inheritdoc}
     */
    protected $id = 3;

    /**
     * {@inheritdoc}
     */
    protected $name = 'strength';

    /**
     * {@inheritdoc}
     */
    protected $maximumExperience = 200000000;

    /**
     * {@inheritdoc}
     */
    protected $maximumLevel = 99;

    /**
     * {@inheritdoc}
     */
    protected $isCombat = true;

    /**
     * {@inheritdoc}
     */
    protected $isMembers = false;
}
