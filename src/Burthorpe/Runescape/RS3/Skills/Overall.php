<?php

namespace Burthorpe\Runescape\RS3\Skills;

final class Overall extends Skill
{
    /**
     * {@inheritdoc}
     */
    protected $id = 0;

    /**
     * {@inheritdoc}
     */
    protected $name = 'overall';

    /**
     * {@inheritdoc}
     */
    protected $maximumExperience = 5200000000;

    /**
     * {@inheritdoc}
     */
    protected $maximumLevel = 2595;

    /**
     * {@inheritdoc}
     */
    protected $isCombat = false;

    /**
     * {@inheritdoc}
     */
    protected $isMembers = false;
}