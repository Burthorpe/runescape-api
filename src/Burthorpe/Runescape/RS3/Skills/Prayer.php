<?php

namespace Burthorpe\Runescape\RS3\Skills;

final class Prayer extends Skill
{
    /**
     * {@inheritdoc}
     */
    protected $id = 6;

    /**
     * {@inheritdoc}
     */
    protected $name = 'prayer';

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
