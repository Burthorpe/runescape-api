<?php

namespace Burthorpe\Runescape\RS3\Skills;

final class Cooking extends Skill
{
    /**
     * {@inheritdoc}
     */
    protected $id = 8;

    /**
     * {@inheritdoc}
     */
    protected $name = 'cooking';

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
