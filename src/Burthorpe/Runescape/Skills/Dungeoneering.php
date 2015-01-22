<?php namespace Burthorpe\Runescape\Skills;

class Dungeoneering extends Skill {

    /*
     * Jagex skill ID
     *
     * @var integer
     */
    protected $id = 25;

    /*
     * Skill name
     *
     * @var string
     */
    protected $name = 'dungeoneering';

    /*
     * Maximum possible level
     *
     * @var integer
     */
    protected $maximum_level = 120;

    /*
     * Skill is available in old school
     *
     * @var bool
     */
    protected $old_school = false;

}