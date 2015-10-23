<?php

namespace Burthorpe\Runescape\RS3\Skills;

final class Divination extends Skill
{
    /**
     * {@inheritdoc}
     */
    protected $id = 26;

    /**
     * {@inheritdoc}
     */
    protected $name = 'divination';

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
