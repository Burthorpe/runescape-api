<?php

namespace Burthorpe\Runescape\RS3\Skills;

final class Slayer extends Skill
{
    /**
     * {@inheritdoc}
     */
    protected $id = 19;

    /**
     * {@inheritdoc}
     */
    protected $name = 'slayer';

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
