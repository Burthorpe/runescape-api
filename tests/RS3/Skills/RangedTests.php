<?php

class RangedTests extends PHPUnit_Framework_TestCase {

    public function testGetId()
    {
        $skill = new \Burthorpe\Runescape\RS3\Skills\Ranged();

        $this->assertEquals(5, $skill->getId());
    }

    public function testGetName()
    {
        $skill = new \Burthorpe\Runescape\RS3\Skills\Ranged();

        $this->assertSame('ranged', $skill->getName());
    }

    public function testGetMaximumExperience()
    {
        $skill = new \Burthorpe\Runescape\RS3\Skills\Ranged();

        $this->assertSame(200000000, $skill->getMaximumExperience());
    }

    public function testGetMaximumLevel()
    {
        $skill = new \Burthorpe\Runescape\RS3\Skills\Ranged();

        $this->assertSame(99, $skill->getMaximumLevel());
    }

    public function testIsCombat()
    {
        $skill = new \Burthorpe\Runescape\RS3\Skills\Ranged();

        $this->assertTrue($skill->isCombat());
    }

    public function testIsMembers()
    {
        $skill = new \Burthorpe\Runescape\RS3\Skills\Ranged();

        $this->assertFalse($skill->isMembers());
    }
}