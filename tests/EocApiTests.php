<?php

use Burthorpe\RunescapeApi\EocApi;

class EocApiTests extends PHPUnit_Framework_TestCase {

  /**
   * EocApi instance
   *
   * @var Burthorpe\RunescapeApi\EocApi
   */
  protected $EocApi;

  /**
   * Display name of control subject. (The name used throughout tests)
   * Idealy this is a player who doesn't change their name
   *
   * @var String
   */
  protected $controlUser = 'Zezima';

  public function setUp()
  {
    $this->EocApi = new EocApi;
  }

  public function testValidGetStats()
  {
    $stats = $this->EocApi->getStats($this->controlUser);

    $this->assertInternalType('array', $stats);
  }

  public function testInvalidGetStats()
  {
    $stats = $this->EocApi->getStats('stringthatisinvalidname');

    $this->assertFalse($stats);
  }

  public function testMinimumCalcCombat()
  {
    $combat = $this->EocApi->calcCombat([
        'attack'    => 1,
        'strength'  => 1,
        'defence'   => 1,
        'ranged'    => 1,
        'magic'     => 1,
      ]);

    $this->assertEquals(4, $combat['combat_level']);
  }

  public function testMaximumCalcCombat()
  {
    $combat = $this->EocApi->calcCombat([
        'attack'    => 99,
        'strength'  => 99,
        'defence'   => 99,
        'ranged'    => 99,
        'magic'     => 99,
      ]);

    $this->assertEquals(200, $combat['combat_level']);
  }

  public function testMaxAttackCalcCombat()
  {
    $combat = $this->EocApi->calcCombat([
        'attack'    => 99,
        'strength'  => 1,
        'defence'   => 1,
        'ranged'    => 1,
        'magic'     => 1,
      ]);

    $this->assertEquals(102, $combat['combat_level']);
    $this->assertEquals(102, $combat['attack_combat']);
    $this->assertEquals(4, $combat['strength_combat']);
    $this->assertEquals(4, $combat['ranged_combat']);
    $this->assertEquals(4, $combat['magic_combat']);
  }

  public function testMaxStrengthCalcCombat()
  {
    $combat = $this->EocApi->calcCombat([
        'attack'    => 1,
        'strength'  => 99,
        'defence'   => 1,
        'ranged'    => 1,
        'magic'     => 1,
      ]);

    $this->assertEquals(102, $combat['combat_level']);
    $this->assertEquals(4, $combat['attack_combat']);
    $this->assertEquals(102, $combat['strength_combat']);
    $this->assertEquals(4, $combat['ranged_combat']);
    $this->assertEquals(4, $combat['magic_combat']);
  }

  public function testMaxDefenceCalcCombat()
  {
    $combat = $this->EocApi->calcCombat([
        'attack'    => 1,
        'strength'  => 1,
        'defence'   => 99,
        'ranged'    => 1,
        'magic'     => 1,
      ]);

    $this->assertEquals(102, $combat['combat_level']);
    $this->assertEquals(102, $combat['attack_combat']);
    $this->assertEquals(102, $combat['strength_combat']);
    $this->assertEquals(102, $combat['ranged_combat']);
    $this->assertEquals(102, $combat['magic_combat']);
  }

  public function testMaxRangedCalcCombat()
  {
    $combat = $this->EocApi->calcCombat([
        'attack'    => 1,
        'strength'  => 1,
        'defence'   => 1,
        'ranged'    => 99,
        'magic'     => 1,
      ]);

    $this->assertEquals(102, $combat['combat_level']);
    $this->assertEquals(4, $combat['attack_combat']);
    $this->assertEquals(4, $combat['strength_combat']);
    $this->assertEquals(102, $combat['ranged_combat']);
    $this->assertEquals(4, $combat['magic_combat']);
  }

  public function testMaxMagicCalcCombat()
  {
    $combat = $this->EocApi->calcCombat([
        'attack'    => 1,
        'strength'  => 1,
        'defence'   => 1,
        'ranged'    => 1,
        'magic'     => 99,
      ]);

    $this->assertEquals(102, $combat['combat_level']);
    $this->assertEquals(4, $combat['attack_combat']);
    $this->assertEquals(4, $combat['strength_combat']);
    $this->assertEquals(4, $combat['ranged_combat']);
    $this->assertEquals(102, $combat['magic_combat']);
  }

  public function testLengthRestrictionsValidateRsn()
  {
    // String too short
    $this->assertFalse($this->EocApi->validateRsn(''));

    // String too long
    $this->assertFalse($this->EocApi->validateRsn('abcdefghijklm'));

    // String at min length
    $this->assertTrue($this->EocApi->validateRsn('a'));

    // String at max length
    $this->assertTrue($this->EocApi->validateRsn('abcdefghijkl'));
  }

  public function testInvalidCharactersValidateRsn()
  {
    $this->assertFalse($this->EocApi->validateRsn('ab&^%as'));
  }

  public function testControlUserValidateRsn()
  {
    $this->assertTrue($this->EocApi->validateRsn($this->controlUser));
  }

}
