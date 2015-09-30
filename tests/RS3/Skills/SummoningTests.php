<?php

class SummoningTests extends PHPUnit_Framework_TestCase {

    public function testGetId()
    {
        $skill = new \Burthorpe\Runescape\RS3\Skills\Summoning();

        $this->assertEquals(24, $skill->getId());
    }

    public function testGetName()
    {
        $skill = new \Burthorpe\Runescape\RS3\Skills\Summoning();

        $this->assertSame('summoning', $skill->getName());
    }

    public function testGetMaximumExperience()
    {
        $skill = new \Burthorpe\Runescape\RS3\Skills\Summoning();

        $this->assertSame(200000000, $skill->getMaximumExperience());
    }

    public function testGetMaximumLevel()
    {
        $skill = new \Burthorpe\Runescape\RS3\Skills\Summoning();

        $this->assertSame(99, $skill->getMaximumLevel());
    }

    public function testIsCombat()
    {
        $skill = new \Burthorpe\Runescape\RS3\Skills\Summoning();

        $this->assertFalse($skill->isCombat());
    }

    public function testIsMembers()
    {
        $skill = new \Burthorpe\Runescape\RS3\Skills\Summoning();

        $this->assertTrue($skill->isMembers());
    }
}