<?php

namespace Burthorpe\Runescape\RS3\Skills;

abstract class Skill implements Contract
{
    /**
     * The skills ID
     *
     * @var int
     */
    protected $id;

    /**
     * The skills name
     *
     * @var string
     */
    protected $name;

    /**
     * Maximum possible experience in this skill
     *
     * @var int
     */
    protected $maximumExperience;

    /**
     * Maximum possible level in this skill
     *
     * @var int
     */
    protected $maximumLevel;

    /**
     * Does the skill effect a players combat level
     *
     * @var bool
     */
    protected $isCombat;

    /**
     * Does the skill require a membership subscription
     *
     * @var bool
     */
    protected $isMembers;

    /**
     * {@inheritdoc}
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * {@inheritdoc}
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * {@inheritdoc}
     */
    public function getMaximumExperience()
    {
        return $this->maximumExperience;
    }

    /**
     * {@inheritdoc}
     */
    public function getMaximumLevel()
    {
        return $this->maximumLevel;
    }

    /**
     * {@inheritdoc}
     */
    public function isCombat()
    {
        return $this->isCombat;
    }

    /**
     * {@inheritdoc}
     */
    public function isMembers()
    {
        return $this->isMembers;
    }
}
