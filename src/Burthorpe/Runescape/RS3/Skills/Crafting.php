<?php

namespace Burthorpe\Runescape\RS3\Skills;

final class Crafting extends Skill
{
    /**
     * {@inheritdoc}
     */
    protected $id = 13;

    /**
     * {@inheritdoc}
     */
    protected $name = 'crafting';

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