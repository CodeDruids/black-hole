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
        $test = new BlackHole('test');

        $this->assertInstanceOf(BlackHole::class, $empty);
        $this->assertInstanceOf(BlackHole::class, $test);
        $this->assertEquals($empty, $test);
    }

    /**
     * @test
     */
    public function testDestructor()
    {
        $test = new BlackHole();
        $this->assertInstanceOf(BlackHole::class, $test);
        unset($test);
        $this->assertFalse(isset($test));
    }

    /**
     * @test
     */
    public function testPropertyOverloading()
    {
        $empty = new BlackHole();
        $test = new BlackHole();

        // get
        $this->assertSame($test, $test->some_property);
        // set
        $test->some_property = 'test';
        $this->assertEquals($empty, $test);
        // isset
        $this->assertTrue(isset($test->some_other_property));
        // unset
        unset($test->some_property);
        $this->assertEquals($empty, $test);
    }

    /**
     * @test
     */
    public function testMethodOverload()
    {
        // object context
        $test = new BlackHole();
        $result = $test->undefinedMethod('test');
        $this->assertSame($test, $result);
        // static context
        $empty = new BlackHole();
        $result = BlackHole::undefinedStaticMethod('test');
        $this->assertInstanceOf(BlackHole::class, $result);
        $this->assertEquals($empty, $result);
    }

    /**
     * @test
     * @requires PHP >= 7.4
     */
    public function testSerializationOverloading()
    {
        // to string
        $test = new BlackHole();
        $test->some_other_property = "test";
        $this->assertEquals(BlackHole::class, (string) $test);
        // serialize
        $this->assertEquals('O:20:"'.BlackHole::class.'":0:{}', serialize($test));
        // unserialize
        $empty = new BlackHole();
        $result = unserialize(
            'O:20:"'.BlackHole::class.'":1:{s:4:"prop";s:3:"val";}',
            ['allowed_classes' => [BlackHole::class]]
        );
        $this->assertInstanceOf(BlackHole::class, $result);
        $this->assertEquals($empty, $result);
    }

    /**
     * @test
     */
    public function testObjectAsFunction()
    {
        $test = new BlackHole();
        $this->assertSame($test, $test());
    }

    /**
     * @test
     */
    public function testObjectExport()
    {
        $empty = new BlackHole();
        $this->assertEquals(BlackHole::class."::__set_state(array(\n))", var_export($empty, true));
        $result = BlackHole::__set_state(['property' => 'value']);
        $this->assertInstanceOf(BlackHole::class, $result);
        $this->assertEquals($empty, $result);
    }

    /**
     * @test
     */
    public function testObjectDump()
    {
        $test = new BlackHole();
        $expected = BlackHole::class." Object\n(\n)\n";
        $this->assertEquals($expected, print_r($test, true));
        ob_start();
        var_dump($test);
        $result = ob_get_clean();
        $this->assertStringStartsWith(__FILE__.":121:\nclass ".BlackHole::class."#", $result);
        $this->assertStringEndsWith(" (0) {\n}\n", $result);
    }
}
