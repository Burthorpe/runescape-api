<?php

class FarmingTests extends PHPUnit_Framework_TestCase {

    public function testGetId()
    {
        $skill = new \Burthorpe\Runescape\RS3\Skills\Farming();

        $this->assertEquals(20, $skill->getId());
    }

    public function testGetName()
    {
        $skill = new \Burthorpe\Runescape\RS3\Skills\Farming();

        $this->assertSame('farming', $skill->getName());
    }

    public function testGetMaximumExperience()
    {
        $skill = new \Burthorpe\Runescape\RS3\Skills\Farming();

        $this->assertSame(200000000, $skill->getMaximumExperience());
    }

    public function testGetMaximumLevel()
    {
        $skill = new \Burthorpe\Runescape\RS3\Skills\Farming();

        $this->assertSame(99, $skill->getMaximumLevel());
    }

    public function testIsCombat()
    {
        $skill = new \Burthorpe\Runescape\RS3\Skills\Farming();

        $this->assertFalse($skill->isCombat());
    }

    public function testIsMembers()
    {
        $skill = new \Burthorpe\Runescape\RS3\Skills\Farming();

        $this->assertTrue($skill->isMembers());
    }
}