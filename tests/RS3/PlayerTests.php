<?php

class PlayerTests extends PHPUnit_Framework_TestCase {

    public function testInvalidDisplayNameLength()
    {
        $this->setExpectedException('\Burthorpe\Exception\InvalidDisplayNameException');

        new \Burthorpe\Runescape\RS3\Player('thisdisplaynameistoolong');
    }

    public function testInvalidDisplayNameWithSymbols()
    {
        $this->setExpectedException('\Burthorpe\Exception\InvalidDisplayNameException');

        new \Burthorpe\Runescape\RS3\Player('$£!@');
    }

    public function testValidDisplayName()
    {
        $player = new \Burthorpe\Runescape\RS3\Player('iWader');

        $this->assertInstanceOf(\Burthorpe\Runescape\RS3\Player::class, $player);
    }

    public function testGetDisplayName()
    {
        $player = new \Burthorpe\Runescape\RS3\Player('iWader');

        $this->assertSame('iWader', $player->getDisplayName());
    }

    public function testGetStats()
    {
        $player = new \Burthorpe\Runescape\RS3\Player('iWader');

        $this->assertInstanceOf(\Burthorpe\Runescape\RS3\Stats\Repository::class, $player->getStats());
    }

    public function testGetCombatLevel()
    {
        $player = new \Burthorpe\Runescape\RS3\Player('iWader');

        $this->assertSame(138, $player->getCombatLevel());
        $this->assertSame(138.0, $player->getCombatLevel(true));
    }

}