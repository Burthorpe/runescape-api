<?php

class ConstructionTests extends PHPUnit_Framework_TestCase {

    public function testGetId()
    {
        $skill = new \Burthorpe\Runescape\RS3\Skills\Construction();

        $this->assertEquals(23, $skill->getId());
    }

    public function testGetName()
    {
        $skill = new \Burthorpe\Runescape\RS3\Skills\Construction();

        $this->assertSame('construction', $skill->getName());
    }

    public function testGetMaximumExperience()
    {
        $skill = new \Burthorpe\Runescape\RS3\Skills\Construction();

        $this->assertSame(200000000, $skill->getMaximumExperience());
    }

    public function testGetMaximumLevel()
    {
        $skill = new \Burthorpe\Runescape\RS3\Skills\Construction();

        $this->assertSame(99, $skill->getMaximumLevel());
    }

    public function testIsCombat()
    {
        $skill = new \Burthorpe\Runescape\RS3\Skills\Construction();

        $this->assertFalse($skill->isCombat());
    }

    public function testIsMembers()
    {
        $skill = new \Burthorpe\Runescape\RS3\Skills\Construction();

        $this->assertTrue($skill->isMembers());
    }
}