<?php

use Burthorpe\Runescape\RS3\API;

class APITests extends PHPUnit_Framework_TestCase {

    public function testGetSkills()
    {
        $api = new API();

        $this->assertTrue($api->getSkills() instanceof \Burthorpe\Runescape\RS3\Skills\Repository);
    }

    public function testStatsForExistentPlayer()
    {
        $eoc = new API();

        $this->assertInstanceOf(\Illuminate\Support\Collection::class, $eoc->stats('Drumgun'));
    }

    public function testStatsForNonExistentPlayer()
    {
        $eoc = new API();

        $this->setExpectedException(\Burthorpe\Exceptions\PlayerNotFound::class);

        $eoc->stats('1234567890123');
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