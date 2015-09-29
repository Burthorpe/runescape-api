<?php

namespace Burthorpe\Runescape\RS3\Skills;

final class Ranged extends Skill
{
    /**
     * {@inheritdoc}
     */
    protected $id = 5;

    /**
     * {@inheritdoc}
     */
    protected $name = 'ranged';

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