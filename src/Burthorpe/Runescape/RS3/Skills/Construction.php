<?php

namespace Burthorpe\Runescape\RS3\Skills;

final class Construction extends Skill
{
    /**
     * {@inheritdoc}
     */
    protected $id = 23;

    /**
     * {@inheritdoc}
     */
    protected $name = 'construction';

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