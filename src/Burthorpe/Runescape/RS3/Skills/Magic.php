<?php

namespace Burthorpe\Runescape\RS3\Skills;

final class Magic extends Skill
{
    /**
     * {@inheritdoc}
     */
    protected $id = 7;

    /**
     * {@inheritdoc}
     */
    protected $name = 'magic';

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
