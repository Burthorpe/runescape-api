<?php namespace Burthorpe\Runescape\Skills;

class Constitution extends Skill {

    /*
     * Jagex skill ID
     *
     * @var integer
     */
    protected $id = 4;

    /*
     * Skill name
     *
     * @var string
     */
    protected $name = 'constitution';

    /*
     * Old school skill name
     *
     * @var string
     */
    protected $old_school_name = 'hitpoints';

    /*
     * Skill affects combat level
     *
     * @var bool
     */
    protected $combat_skill = true;

}