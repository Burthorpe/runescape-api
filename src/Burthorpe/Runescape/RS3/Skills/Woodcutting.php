<?php

namespace Burthorpe\Runescape\RS3\Skills;

final class Woodcutting extends Skill
{
    /**
     * {@inheritdoc}
     */
    protected $id = 9;

    /**
     * {@inheritdoc}
     */
    protected $name = 'woodcutting';

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
