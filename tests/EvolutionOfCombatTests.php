<?php

use Burthorpe\Runescape\EvolutionOfCombat as EOC;

class EvolutionOfCombatTests extends PHPUnit_Framework_TestCase {

    public function testCalculateCombatLevel()
    {
        $eoc = new EOC;

        $this->assertEquals(4, $eoc->calculateCombatLevel(1, 1, 1, 1, 1));
        $this->assertEquals(200, $eoc->calculateCombatLevel(99, 99, 99, 99, 99));
        $this->assertEquals(102, $eoc->calculateCombatLevel(99, 1, 1, 1, 1));
        $this->assertEquals(102, $eoc->calculateCombatLevel(1, 99, 1, 1, 1));
        $this->assertEquals(102, $eoc->calculateCombatLevel(1, 1, 99, 1, 1));
        $this->assertEquals(102, $eoc->calculateCombatLevel(1, 1, 1, 99, 1));
        $this->assertEquals(102, $eoc->calculateCombatLevel(1, 1, 1, 1, 99));
    }

}