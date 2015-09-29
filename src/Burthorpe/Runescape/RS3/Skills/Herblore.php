<?php

namespace Burthorpe\Runescape\RS3\Skills;

final class Herblore extends Skill
{
    /**
     * {@inheritdoc}
     */
    protected $id = 16;

    /**
     * {@inheritdoc}
     */
    protected $name = 'herblore';

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
    protected $isMembers = true;
}