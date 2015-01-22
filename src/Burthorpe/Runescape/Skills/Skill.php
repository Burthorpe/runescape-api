<?php namespace Burthorpe\Runescape\Skills;

abstract class Skill implements SkillInterface {

    /*
     * Jagex Skill ID
     *
     * @var integer
     */
    protected $id;

    /*
     * Skill name
     *
     * @var string
     */
    protected $name;

    /*
     * Old school skill name
     *
     * @var string
     */
    protected $old_school_name;

    /*
     * Maximum possible experience;
     *
     * @var integer
     */
    protected $maximum_xp = 200000000;

    /*
     * Maximum possible level
     *
     * @var integer
     */
    protected $maximum_level = 99;

    /*
     * Skill affects your combat level
     *
     * @var bool
     */
    protected $combat_skill = false;

    /*
     * Skill is available to members only
     *
     * @var bool
     */
    protected $members_only = false;

    /*
     * Skill is available in old school
     *
     * @var bool
     */
    protected $old_school = true;

    /*
     * Gets the Jagex skill ID
     *
     * @return integer
     */
    public function getId()
    {
        return $this->id;
    }

    /*
     * Gets the skill name
     *
     * @return string
     */
    public function getName()
    {
        return $this->name;
    }

    /*
     * Gets the old school skill name
     *
     * @return string
     */
    public function getOldSchoolName()
    {
        if ($this->old_school_name)
        {
            return $this->old_school_name;
        }

        return $this->getName();
    }

    /*
     * Gets the maximum possible experience
     *
     * @return integer
     */
    public function getMaximumXp()
    {
        return $this->maximum_xp;
    }

    /*
     * Gets the maximum possible level
     *
     * @return integer
     */
    public function getMaximumLevel()
    {
        return $this->maximum_level;
    }

    /*
     * Skill affects your combat level
     *
     * @return bool
     */
    public function isCombatSkill()
    {
        return $this->combat_skill;
    }

    /*
     * Skill is available to members only
     *
     * @return bool
     */
    public function isMembersOnly()
    {
        return $this->members_only;
    }

    /*
     * Skill is available is old school
     *
     * @return bool
     */
    public function isOldSchool()
    {
        return $this->old_school;
    }

}