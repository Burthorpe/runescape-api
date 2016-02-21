<?php

namespace Burthorpe\Runescape\RS3\Skills;

final class Dungeoneering extends Skill
{
    /**
     * {@inheritdoc}
     */
    protected $id = 25;

    /**
     * {@inheritdoc}
     */
    protected $name = 'dungeoneering';

    /**
     * {@inheritdoc}
     */
    protected $maximumExperience = 200000000;

    /**
     * {@inheritdoc}
     */
    protected $maximumLevel = 120;

    /**
     * {@inheritdoc}
     */
    protected $isCombat = false;

    /**
     * {@inheritdoc}
     */
    protected $isMembers = false;
}
