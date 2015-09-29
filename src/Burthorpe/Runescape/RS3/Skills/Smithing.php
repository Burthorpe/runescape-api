<?php

namespace Burthorpe\Runescape\RS3\Skills;

final class Smithing extends Skill
{
    /**
     * {@inheritdoc}
     */
    protected $id = 14;

    /**
     * {@inheritdoc}
     */
    protected $name = 'smithing';

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