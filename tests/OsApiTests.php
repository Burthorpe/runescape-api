<?php

use Burthorpe\RunescapeApi\OsApi;

class OsApiTests extends PHPUnit_Framework_TestCase {

  /**
   * EocApi instance
   *
   * @var Burthorpe\RunescapeApi\OsApi
   */
  protected $OsApi;

  /**
   * Display name of control subject. (The name used throughout tests)
   * Idealy this is a player who doesn't change their name
   *
   * @var String
   */
  protected $controlUser = 'Vestfold';

  public function setUp()
  {
    $this->OsApi = new OsApi;
  }

  public function testValidGetStats()
  {
    $stats = $this->OsApi->getStats($this->controlUser);

    $this->assertInternalType('array', $stats);
  }

  public function testInvalidGetStats()
  {
    $stats = $this->OsApi->getStats('stringthatisinvalidname');

    $this->assertFalse($stats);
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
    $this->assertEquals(0.325, $combat['base_ranged']);
    $this->assertEquals(0.325, $combat['base_magic']);
    $this->assertEquals(3.4, $combat['combat_level']);
    $this->assertEquals(0.6, $combat['remainder_diff']);
    $this->assertEquals(2, $combat['remainders']['strength_attack']);
    $this->assertEquals(3, $combat['remainders']['defence_hitpoints']);
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
    $this->assertEquals(48.1, $combat['base_ranged']);
    $this->assertEquals(48.1, $combat['base_magic']);
    $this->assertEquals(126.1, $combat['combat_level']);
    $this->assertEquals(0.89999999999999, $combat['remainder_diff']);
    $this->assertEquals(3, $combat['remainders']['strength_attack']);
    $this->assertEquals(4, $combat['remainders']['defence_hitpoints']);
    $this->assertEquals(8, $combat['remainders']['prayer']);
  }

  public function testMaxAttackCalcCombat()
  {
    $combat = $this->OsApi->calcCombat([
        'attack'    => 99,
        'strength'  => 1,
        'defence'   => 1,
        'hitpoints' => 10,
        'ranged'    => 1,
        'prayer'    => 1,
        'magic'     => 1,
      ]);

    $this->assertEquals(2.75, $combat['base_level']);
    $this->assertEquals(32.5, $combat['base_melee']);
    $this->assertEquals(0.325, $combat['base_ranged']);
    $this->assertEquals(0.325, $combat['base_magic']);
    $this->assertEquals(35.25, $combat['combat_level']);
    $this->assertEquals(0.75, $combat['remainder_diff']);
    $this->assertEquals(3, $combat['remainders']['strength_attack']);
    $this->assertEquals(3, $combat['remainders']['defence_hitpoints']);
    $this->assertEquals(6, $combat['remainders']['prayer']);
  }

  public function testMaxStrengthCalcCombat()
  {
    $combat = $this->OsApi->calcCombat([
        'attack'    => 1,
        'strength'  => 99,
        'defence'   => 1,
        'hitpoints' => 10,
        'ranged'    => 1,
        'prayer'    => 1,
        'magic'     => 1,
      ]);

    $this->assertEquals(2.75, $combat['base_level']);
    $this->assertEquals(32.5, $combat['base_melee']);
    $this->assertEquals(0.325, $combat['base_ranged']);
    $this->assertEquals(0.325, $combat['base_magic']);
    $this->assertEquals(35.25, $combat['combat_level']);
    $this->assertEquals(0.75, $combat['remainder_diff']);
    $this->assertEquals(3, $combat['remainders']['strength_attack']);
    $this->assertEquals(3, $combat['remainders']['defence_hitpoints']);
    $this->assertEquals(6, $combat['remainders']['prayer']);
  }

  public function testMaxDefenceCalcCombat()
  {
    $combat = $this->OsApi->calcCombat([
        'attack'    => 1,
        'strength'  => 1,
        'defence'   => 99,
        'hitpoints' => 10,
        'ranged'    => 1,
        'prayer'    => 1,
        'magic'     => 1,
      ]);

    $this->assertEquals(27.25, $combat['base_level']);
    $this->assertEquals(0.65, $combat['base_melee']);
    $this->assertEquals(0.325, $combat['base_ranged']);
    $this->assertEquals(0.325, $combat['base_magic']);
    $this->assertEquals(27.9, $combat['combat_level']);
    $this->assertEquals(0.1, $combat['remainder_diff']);
    $this->assertEquals(1, $combat['remainders']['strength_attack']);
    $this->assertEquals(1, $combat['remainders']['defence_hitpoints']);
    $this->assertEquals(1, $combat['remainders']['prayer']);
  }

  public function testMaxHitpointsCalcCombat()
  {
    $combat = $this->OsApi->calcCombat([
        'attack'    => 1,
        'strength'  => 1,
        'defence'   => 1,
        'hitpoints' => 99,
        'ranged'    => 1,
        'prayer'    => 1,
        'magic'     => 1,
      ]);

    $this->assertEquals(25, $combat['base_level']);
    $this->assertEquals(0.65, $combat['base_melee']);
    $this->assertEquals(0.325, $combat['base_ranged']);
    $this->assertEquals(0.325, $combat['base_magic']);
    $this->assertEquals(25.65, $combat['combat_level']);
    $this->assertEquals(0.35, $combat['remainder_diff']);
    $this->assertEquals(2, $combat['remainders']['strength_attack']);
    $this->assertEquals(2, $combat['remainders']['defence_hitpoints']);
    $this->assertEquals(3, $combat['remainders']['prayer']);
  }

  public function testMaxRangedCalcCombat()
  {
    $combat = $this->OsApi->calcCombat([
        'attack'    => 1,
        'strength'  => 1,
        'defence'   => 1,
        'hitpoints' => 10,
        'ranged'    => 99,
        'prayer'    => 1,
        'magic'     => 1,
      ]);

    $this->assertEquals(2.75, $combat['base_level']);
    $this->assertEquals(0.65, $combat['base_melee']);
    $this->assertEquals(48.1, $combat['base_ranged']);
    $this->assertEquals(0.325, $combat['base_magic']);
    $this->assertEquals(50.85, $combat['combat_level']);
    $this->assertEquals(0.15, $combat['remainder_diff']);
    $this->assertEquals(1, $combat['remainders']['strength_attack']);
    $this->assertEquals(1, $combat['remainders']['defence_hitpoints']);
    $this->assertEquals(2, $combat['remainders']['prayer']);
  }

  public function testMaxPrayerCalcCombat()
  {
    $combat = $this->OsApi->calcCombat([
        'attack'    => 1,
        'strength'  => 1,
        'defence'   => 1,
        'hitpoints' => 10,
        'ranged'    => 1,
        'prayer'    => 99,
        'magic'     => 1,
      ]);

    $this->assertEquals(15, $combat['base_level']);
    $this->assertEquals(0.65, $combat['base_melee']);
    $this->assertEquals(0.325, $combat['base_ranged']);
    $this->assertEquals(0.325, $combat['base_magic']);
    $this->assertEquals(15.65, $combat['combat_level']);
    $this->assertEquals(0.35, $combat['remainder_diff']);
    $this->assertEquals(2, $combat['remainders']['strength_attack']);
    $this->assertEquals(2, $combat['remainders']['defence_hitpoints']);
    $this->assertEquals(3, $combat['remainders']['prayer']);
  }

  public function testMaxMagicCalcCombat()
  {
    $combat = $this->OsApi->calcCombat([
        'attack'    => 1,
        'strength'  => 1,
        'defence'   => 1,
        'hitpoints' => 10,
        'ranged'    => 1,
        'magic'     => 99,
      ]);

    $this->assertEquals(2.75, $combat['base_level']);
    $this->assertEquals(0.65, $combat['base_melee']);
    $this->assertEquals(0.325, $combat['base_ranged']);
    $this->assertEquals(48.1, $combat['base_magic']);
    $this->assertEquals(50.85, $combat['combat_level']);
    $this->assertEquals(0.15, $combat['remainder_diff']);
    $this->assertEquals(1, $combat['remainders']['strength_attack']);
    $this->assertEquals(1, $combat['remainders']['defence_hitpoints']);
    $this->assertEquals(2, $combat['remainders']['prayer']);
  }

}
