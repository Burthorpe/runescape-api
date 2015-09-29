<?php

namespace Burthorpe\Runescape\RS3\Skills;

final class Defence extends Skill
{
    /**
     * {@inheritdoc}
     */
    protected $id = 2;

    /**
     * {@inheritdoc}
     */
    protected $name = 'defence';

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