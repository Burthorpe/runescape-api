<?php

namespace Burthorpe\Runescape\RS3\Skills;

final class Fishing extends Skill
{
    /**
     * {@inheritdoc}
     */
    protected $id = 11;

    /**
     * {@inheritdoc}
     */
    protected $name = 'fishing';

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