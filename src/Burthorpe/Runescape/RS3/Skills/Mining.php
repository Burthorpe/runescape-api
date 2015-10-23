<?php

namespace Burthorpe\Runescape\RS3\Skills;

final class Mining extends Skill
{
    /**
     * {@inheritdoc}
     */
    protected $id = 15;

    /**
     * {@inheritdoc}
     */
    protected $name = 'mining';

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
