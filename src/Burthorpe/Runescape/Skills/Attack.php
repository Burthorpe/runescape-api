<?php namespace Burthorpe\Runescape\Skills;

class Attack extends Skill {

    /*
     * Jagex skill ID
     *
     * @var integer
     */
    protected $id = 1;

    /*
     * Skill name
     *
     * @var string
     */
    protected $name = 'attack';

    /*
     * Skill affects combat level
     *
     * @var bool
     */
    protected $combat_skill = true;

}