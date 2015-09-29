<?php

namespace Burthorpe\Runescape\RS3\Skills;

final class Agility extends Skill
{
    /**
     * {@inheritdoc}
     */
    protected $id = 17;

    /**
     * {@inheritdoc}
     */
    protected $name = 'agility';

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