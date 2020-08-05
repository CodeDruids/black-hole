<?php
namespace CodeDruids\Tests;

use PHPUnit\Framework\TestCase as TestCase;
use CodeDruids\BlackHole;

class BlackHoleTest extends TestCase
{
    /**
     * @test
     */
    public function testConstructor()
    {
        $empty = new BlackHole();
        $test = new BlackHole("test");

        $this->assertInstanceOf(BlackHole::class, $empty);
        $this->assertInstanceOf(BlackHole::class, $test);
        $this->assertEquals($empty, $test);
    }
}
