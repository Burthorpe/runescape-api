<?php

namespace Burthorpe\Runescape\RS3\Skills;

final class Hunter extends Skill
{
    /**
     * {@inheritdoc}
     */
    protected $id = 22;

    /**
     * {@inheritdoc}
     */
    protected $name = 'hunter';

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