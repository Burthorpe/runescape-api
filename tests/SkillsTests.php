<?php

use Burthorpe\Runescape\Skills;

class SkillsTests extends PHPUnit_Framework_TestCase {

    public function testGetById()
    {
        $skills = new Skills;

        $this->assertEquals('fletching', $skills->getById(10)->get('name'));
        $this->assertEquals(null, $skills->getById(99));
    }

    public function testGetByName()
    {
        $skills = new Skills;

        $this->assertEquals(10, $skills->getByName('fletching')->get('id'));
        $this->assertEquals(null, $skills->getByName('Non-existant'));
    }

}