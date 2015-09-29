<?php

namespace Burthorpe\Runescape\RS3\Skills;

final class Fletching extends Skill
{
    /**
     * {@inheritdoc}
     */
    protected $id = 10;

    /**
     * {@inheritdoc}
     */
    protected $name = 'fletching';

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