<?php

use Burthorpe\Runescape\RS3\API;

class APITests extends PHPUnit_Framework_TestCase {

    public function testGetSkills()
    {
        $api = new API();

        $this->assertInstanceOf(\Burthorpe\Runescape\RS3\Skills\Repository::class, $api->getSkills());
    }

    public function testStatsForExistentPlayer()
    {
        $eoc = new API();

        $this->assertInstanceOf(\Illuminate\Support\Collection::class, $eoc->stats('Drumgun'));
    }

    public function testStatsWithValidDisplayName()
    {
        $eoc = new API();

        $this->assertInstanceOf(\Burthorpe\Runescape\RS3\Stats\Repository::class, $eoc->stats('Drumgun'));
    }

    public function testStatsWithInvalidDisplayName()
    {
        $this->expectException(\Burthorpe\Exception\UnknownPlayerException::class);

        $eoc = new API();

        $eoc->stats('thisdisplaynameisjusttoolong');
    }

    public function testCalculateCombatLevel()
    {
        $eoc = new API();

        $this->assertEquals(3, $eoc->calculateCombatLevel(1, 1, 1, 1, 1, 10, 1, 1));
        $this->assertEquals(138, $eoc->calculateCombatLevel(99, 99, 99, 99, 99, 99, 99, 99));
        $this->assertEquals(35, $eoc->calculateCombatLevel(99, 1, 1, 1, 1, 10, 1, 1));
        $this->assertEquals(35, $eoc->calculateCombatLevel(1, 99, 1, 1, 1, 10, 1, 1));
        $this->assertEquals(67, $eoc->calculateCombatLevel(1, 1, 99, 1, 1, 10, 1, 1));
        $this->assertEquals(67, $eoc->calculateCombatLevel(1, 1, 1, 99, 1, 10, 1, 1));
        $this->assertEquals(27, $eoc->calculateCombatLevel(1, 1, 1, 1, 99, 10, 1, 1));
        $this->assertEquals(15, $eoc->calculateCombatLevel(1, 1, 1, 1, 1, 10, 99, 1));
        $this->assertEquals(15, $eoc->calculateCombatLevel(1, 1, 1, 1, 1, 10, 1, 99));
        $this->assertEquals(67, $eoc->calculateCombatLevel(99, 99, 1, 1, 1, 10, 1, 1));
    }

}