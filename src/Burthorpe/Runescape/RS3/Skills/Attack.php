<?php

namespace Burthorpe\Runescape\RS3\Skills;

final class Attack extends Skill
{
    /**
     * {@inheritdoc}
     */
    protected $id = 1;

    /**
     * {@inheritdoc}
     */
    protected $name = 'attack';

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
