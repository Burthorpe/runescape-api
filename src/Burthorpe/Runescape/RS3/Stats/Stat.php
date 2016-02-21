<?php

namespace Burthorpe\Runescape\RS3\Stats;

use Burthorpe\Runescape\RS3\Skills\Contract as SkillContract;

class Stat implements Contract
{
    /**
     * The skill related to this stat
     *
     * @var \Burthorpe\Runescape\RS3\Skills\Skill
     */
    protected $skill;

    /**
     * The players current level in this skill
     *
     * @var int
     */
    protected $level;

    /**
     * The players current rank in this skill
     *
     * @var int
     */
    protected $rank;

    /**
     * The players current experience in this skill
     *
     * @var int
     */
    protected $experience;

    /**
     * @param SkillContract $skill
     * @param $level
     * @param $rank
     * @param $experience
     */
    public function __construct(SkillContract $skill, $level, $rank, $experience)
    {
        $this->skill      = $skill;
        $this->level      = $level;
        $this->rank       = $rank;
        $this->experience = $experience;
    }

    /**
     * {@inheritdoc}
     */
    public function getSkill()
    {
        return $this->skill;
    }

    /**
     * {@inheritdoc}
     */
    public function getLevel()
    {
        return $this->level;
    }

    /**
     * {@inheritdoc}
     */
    public function getRank()
    {
        return $this->rank;
    }

    /**
     * {@inheritdoc}
     */
    public function getExperience()
    {
        return $this->experience;
    }
}
