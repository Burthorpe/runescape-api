<?php

namespace Burthorpe\Runescape\RS3\Skills;

final class Constitution extends Skill
{
    /**
     * {@inheritdoc}
     */
    protected $id = 4;

    /**
     * {@inheritdoc}
     */
    protected $name = 'constitution';

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
