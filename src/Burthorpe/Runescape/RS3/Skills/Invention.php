<?php

namespace Burthorpe\Runescape\RS3\Skills;

final class Invention extends Skill
{
    /**
     * {@inheritdoc}
     */
    protected $id = 27;

    /**
     * {@inheritdoc}
     */
    protected $name = 'invention';

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
    protected $isMembers = true;
}