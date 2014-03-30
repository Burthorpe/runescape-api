<?php

use Burthorpe\RunescapeApi\RunescapeApi;

class RunescapeApiTests extends PHPUnit_Framework_TestCase {

  /**
   * RunescapeApi instance
   *
   * @var Burthorpe\RunescapeApi\RunescapeApi
   */
  protected $RunescapeApi;

  public function setUp()
  {
    $this->RunescapeApi = new RunescapeApi;
  }

  public function testMinimumExpToLevel()
  {
    $this->assertEquals(1, $this->RunescapeApi->expToLevel(1));
  }

  public function testMaximumExpToLevel()
  {
    $this->assertEquals(126, $this->RunescapeApi->expToLevel(200000000));
  }

  public function testLevel99ExpToLevel()
  {
    $this->assertEquals(99, $this->RunescapeApi->expToLevel(13034431));
  }

  public function testLevel120ExpToLevel()
  {
    $this->assertEquals(120, $this->RunescapeApi->expToLevel(104273167));
  }

  public function testLevel126ExpToLevel()
  {
    $this->assertEquals(126, $this->RunescapeApi->expToLevel(188884740));
  }

  public function testMinimumLevelToExp()
  {
    $this->assertEquals(0, $this->RunescapeApi->levelToExp(1));
  }

  public function testMaximumLevelToExp()
  {
    $this->assertEquals(188884740, $this->RunescapeApi->levelToExp(126));
  }

  public function testLevel99LevelToExp()
  {
    $this->assertEquals(13034431, $this->RunescapeApi->levelToExp(99));
  }

  public function testLevel120LevelToExp()
  {
    $this->assertEquals(104273167, $this->RunescapeApi->levelToExp(120));
  }

  public function testLevel127LevelToExp()
  {
    $this->assertEquals(200000000, $this->RunescapeApi->levelToExp(127));
  }

  public function testUnder1000ShortenNumber()
  {
    $this->assertEquals(999, $this->RunescapeApi->shortenNumber(999));
  }

  public function test1kShortenNumber()
  {
    $this->assertEquals('1K', $this->RunescapeApi->shortenNumber(1000));
  }

  public function test999kShortenNumber()
  {
    $this->assertEquals('999K', $this->RunescapeApi->shortenNumber(999999));
  }

  public function test1mShortenNumber()
  {
    $this->assertEquals('1M', $this->RunescapeApi->shortenNumber(1000000));
  }

  public function test999mShortenNumber()
  {
    $this->assertEquals('999M', $this->RunescapeApi->shortenNumber(999999999));
  }

  public function test1bShortenNumber()
  {
    $this->assertEquals('1B', $this->RunescapeApi->shortenNumber(1000000000));
  }

  public function testUnder1000ExpandNumber()
  {
    $this->assertEquals(999, $this->RunescapeApi->expandNumber(999));
  }

  public function test1kExpandNumber()
  {
    $this->assertEquals(1000, $this->RunescapeApi->expandNumber('1k'));
  }

  public function test999kExpandNumber()
  {
    $this->assertEquals(999000, $this->RunescapeApi->expandNumber('999k'));
  }

  public function test1mExpandNumber()
  {
    $this->assertEquals(1000000, $this->RunescapeApi->expandNumber('1m'));
  }

  public function test999mExpandNumber()
  {
    $this->assertEquals(999000000, $this->RunescapeApi->expandNumber('999m'));
  }

  public function test1bExpandNumber()
  {
    $this->assertEquals(1000000000, $this->RunescapeApi->expandNumber('1b'));
  }

}
