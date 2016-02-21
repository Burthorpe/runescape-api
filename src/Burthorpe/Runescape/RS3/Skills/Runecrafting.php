<?php

namespace Burthorpe\Runescape\RS3\Skills;

final class Runecrafting extends Skill
{
    /**
     * {@inheritdoc}
     */
    protected $id = 21;

    /**
     * {@inheritdoc}
     */
    protected $name = 'runecrafting';

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
    protected $isCombat = false;

    /**
     * {@inheritdoc}
     */
    protected $isMembers = false;
}
