<?php

namespace Burthorpe\Runescape\RS3\Skills;

final class Summoning extends Skill
{
    /**
     * {@inheritdoc}
     */
    protected $id = 24;

    /**
     * {@inheritdoc}
     */
    protected $name = 'summoning';

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