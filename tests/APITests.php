<?php

use Burthorpe\Runescape\API;

class APITests extends PHPUnit_Framework_TestCase {

    public function testValidateDisplayName()
    {
        $api = new API;

        $this->assertTrue($api->validateDisplayName('1'));
        $this->assertTrue($api->validateDisplayName('123456789012'));
        $this->assertFalse($api->validateDisplayName(''));
        $this->assertFalse($api->validateDisplayName('1234567890123'));
        $this->assertTrue($api->validateDisplayName('iWader'));
        $this->assertFalse($api->validateDisplayName('iW%d^r$'));
    }

    public function testExpandNumber()
    {
        $api = new API;

        $this->assertEquals(1, $api->expandNumber('1'));
        $this->assertEquals(100, $api->expandNumber('100'));
        $this->assertEquals(1000, $api->expandNumber('1K'));
        $this->assertEquals(100000, $api->expandNumber('100k'));
        $this->assertEquals(1000000, $api->expandNumber('1M'));
        $this->assertEquals(100000000, $api->expandNumber('100m'));
        $this->assertEquals(1000000000, $api->expandNumber('1B'));
        $this->assertEquals(100000000000, $api->expandNumber('100b'));
    }

    public function testShortenNumber()
    {
        $api = new API;

        $this->assertEquals(1, $api->shortenNumber(1));
        $this->assertEquals(100, $api->shortenNumber(100));
        $this->assertEquals('1K', $api->shortenNumber(1000));
        $this->assertEquals('100K', $api->shortenNumber(100000));
        $this->assertEquals('1M', $api->shortenNumber(1000000));
        $this->assertEquals('100M', $api->shortenNumber(100000000));
        $this->assertEquals('1B', $api->shortenNumber(1000000000));
        $this->assertEquals('100B', $api->shortenNumber(100000000000));
    }

    public function testXpToLevel()
    {
        $api = new API;

        $this->assertEquals(1, $api->xpTolevel(1));
        $this->assertEquals(126, $api->xpTolevel(200000000));
        $this->assertEquals(99, $api->xpToLevel(13034431));
        $this->assertEquals(98, $api->xpTolevel(13034430));
        $this->assertEquals(120, $api->xpToLevel(104273167));
        $this->assertEquals(119, $api->xpTolevel(104273166));
        $this->assertEquals(126, $api->xpToLevel(188884740));
        $this->assertEquals(125, $api->xpToLevel(188884739));
    }

    public function testLevelToXp()
    {
        $api = new API;

        $this->assertEquals(0, $api->levelToXp(1));
        $this->assertEquals(188884740, $api->levelToXp(126));
        $this->assertEquals(13034431, $api->levelToXp(99));
        $this->assertEquals(104273167, $api->levelToXp(120));
        $this->assertEquals(200000000, $api->levelToXp(127));
    }

    public function testGetSkills()
    {
        $api = new API;

        $this->assertTrue($api->getSkills() instanceof \Burthorpe\Runescape\Skills);
    }

}