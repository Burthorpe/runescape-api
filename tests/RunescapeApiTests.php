<?php

use Burthorpe\RunescapeApi\RunescapeApi;

class RunescapeApiTest extends PHPUnit_Framework_TestCase {

  /**
   * RunescapeApi instance
   *
   * @var Burthorpe/RunescapeApi
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

}
