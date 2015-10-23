<?php

namespace Burthorpe\Runescape\RS3\Skills;

final class Farming extends Skill
{
    /**
     * {@inheritdoc}
     */
    protected $id = 20;

    /**
     * {@inheritdoc}
     */
    protected $name = 'farming';

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
