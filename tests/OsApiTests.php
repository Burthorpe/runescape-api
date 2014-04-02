<?php

use Burthorpe\RunescapeApi\OsApi;

class OsApiTests extends PHPUnit_Framework_TestCase {

  /**
   * EocApi instance
   *
   * @var Burthorpe\RunescapeApi\OsApi
   */
  protected $OsApi;

  public function setUp()
  {
    $this->OsApi = new OsApi;
  }

  public function testMinimumCalcCombat()
  {
    $combat = $this->OsApi->calcCombat([
        'attack'    => 1,
        'strength'  => 1,
        'defence'   => 1,
        'hitpoints' => 10,
        'ranged'    => 1,
        'prayer'    => 1,
        'magic'     => 1,
      ]);

    $this->assertEquals(2.75, $combat['base_level']);
    $this->assertEquals(0.65, $combat['base_melee']);
    $this->assertEquals(0.325, $combat['base_range']);
    $this->assertEquals(0.325, $combat['base_magic']);
    $this->assertEquals(3.4, $combat['combat_level']);
    $this->assertEquals(0.6, $combat['remainder_diff']);
    $this->assertEquals(2, $combat['remainders']['strength_attack']);
    $this->assertEquals(3, $combat['remainders']['defence_constitution']);
    $this->assertEquals(5, $combat['remainders']['prayer']);
  }

  public function testMaximumCalcCombat()
  {
    $combat = $this->OsApi->calcCombat([
        'attack'    => 99,
        'strength'  => 99,
        'defence'   => 99,
        'hitpoints' => 99,
        'ranged'    => 99,
        'prayer'    => 99,
        'magic'     => 99,
      ]);

    $this->assertEquals(61.75, $combat['base_level']);
    $this->assertEquals(64.35, $combat['base_melee']);
    $this->assertEquals(48.1, $combat['base_range']);
    $this->assertEquals(48.1, $combat['base_magic']);
    $this->assertEquals(126.1, $combat['combat_level']);
    $this->assertEquals(0.89999999999999, $combat['remainder_diff']);
    $this->assertEquals(3, $combat['remainders']['strength_attack']);
    $this->assertEquals(4, $combat['remainders']['defence_constitution']);
    $this->assertEquals(8, $combat['remainders']['prayer']);
  }

}
