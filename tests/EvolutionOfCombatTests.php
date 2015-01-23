<?php

use Burthorpe\Runescape\EvolutionOfCombat as EOC;

class EvolutionOfCombatTests extends PHPUnit_Framework_TestCase {

    public function testCalculateCombatLevel()
    {
        $eoc = new EOC;

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