<?php

class FiremakingTests extends PHPUnit_Framework_TestCase {

    public function testGetId()
    {
        $skill = new \Burthorpe\Runescape\RS3\Skills\Firemaking();

        $this->assertEquals(12, $skill->getId());
    }

    public function testGetName()
    {
        $skill = new \Burthorpe\Runescape\RS3\Skills\Firemaking();

        $this->assertSame('firemaking', $skill->getName());
    }

    public function testGetMaximumExperience()
    {
        $skill = new \Burthorpe\Runescape\RS3\Skills\Firemaking();

        $this->assertSame(200000000, $skill->getMaximumExperience());
    }

    public function testGetMaximumLevel()
    {
        $skill = new \Burthorpe\Runescape\RS3\Skills\Firemaking();

        $this->assertSame(99, $skill->getMaximumLevel());
    }

    public function testIsCombat()
    {
        $skill = new \Burthorpe\Runescape\RS3\Skills\Firemaking();

        $this->assertFalse($skill->isCombat());
    }

    public function testIsMembers()
    {
        $skill = new \Burthorpe\Runescape\RS3\Skills\Firemaking();

        $this->assertFalse($skill->isMembers());
    }
}