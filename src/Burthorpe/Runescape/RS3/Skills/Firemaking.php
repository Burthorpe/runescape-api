<?php

namespace Burthorpe\Runescape\RS3\Skills;

final class Firemaking extends Skill
{
    /**
     * {@inheritdoc}
     */
    protected $id = 12;

    /**
     * {@inheritdoc}
     */
    protected $name = 'firemaking';

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
