<?php

namespace Burthorpe\Runescape\RS3\Skills;

final class Thieving extends Skill
{
    /**
     * {@inheritdoc}
     */
    protected $id = 18;

    /**
     * {@inheritdoc}
     */
    protected $name = 'thieving';

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