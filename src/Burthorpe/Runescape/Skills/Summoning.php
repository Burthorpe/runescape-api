<?php namespace Burthorpe\Runescape\Skills;

class Summoning extends Skill {

    /*
     * Jagex skill ID
     *
     * @var integer
     */
    protected $id = 24;

    /*
     * Skill affects your combat level
     *
     * @var bool
     */
    protected $combat_skill = true;

    /*
     * Skill is available to members only
     *
     * @var bool
     */
    protected $members_only = true;

    /*
     * Skill is available in old school
     *
     * @var bool
     */
    protected $old_school = false;

}