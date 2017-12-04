<?php

namespace Advent2017\Tests\Day3;

use Advent2017\Day3\StressTest;
use PHPUnit\Framework\TestCase;

class StressTestTest extends TestCase
{
    /**
     * @var StressTest
     */
    private $stressTest;

    protected function setUp()
    {
        $this->stressTest = new StressTest();
    }

    public function testValueAtPosition1()
    {
        $this->assertEquals(1, $this->stressTest->valueAtPosition(1));
    }

    public function testValueAtPosition2()
    {
        $this->assertEquals(1, $this->stressTest->valueAtPosition(2));
    }

    public function testValueAtPosition3()
    {
        $this->assertEquals(2, $this->stressTest->valueAtPosition(3));
    }

    public function testValueAtPosition4()
    {
        $this->assertEquals(4, $this->stressTest->valueAtPosition(4));
    }

    public function testValueAtPosition5()
    {
        $this->assertEquals(5, $this->stressTest->valueAtPosition(5));
    }

    public function testValueAtPosition6()
    {
        $this->assertEquals(10, $this->stressTest->valueAtPosition(6));
    }

    public function testValueAtPosition7()
    {
        $this->assertEquals(11, $this->stressTest->valueAtPosition(7));
    }

    public function testValueAtPosition8()
    {
        $this->assertEquals(23, $this->stressTest->valueAtPosition(8));
    }

    public function testValueAtPosition9()
    {
        $this->assertEquals(25, $this->stressTest->valueAtPosition(9));
    }

    public function testValueAtPosition10()
    {
        $this->assertEquals(26, $this->stressTest->valueAtPosition(10));
    }

    public function testValueAtPosition11()
    {
        $this->assertEquals(54, $this->stressTest->valueAtPosition(11));
    }

    public function testValueAtPosition12()
    {
        $this->assertEquals(57, $this->stressTest->valueAtPosition(12));
    }

    public function testValueAtPosition13()
    {
        $this->assertEquals(59, $this->stressTest->valueAtPosition(13));
    }

    public function testValueAtPosition14()
    {
        $this->assertEquals(122, $this->stressTest->valueAtPosition(14));
    }

    public function testValueAtPosition15()
    {
        $this->assertEquals(133, $this->stressTest->valueAtPosition(15));
    }

    public function testValueAtPosition16()
    {
        $this->assertEquals(142, $this->stressTest->valueAtPosition(16));
    }

    public function testValueAtPosition17()
    {
        $this->assertEquals(147, $this->stressTest->valueAtPosition(17));
    }

    public function testValueAtPosition18()
    {
        $this->assertEquals(304, $this->stressTest->valueAtPosition(18));
    }

    public function testValueAtPosition19()
    {
        $this->assertEquals(330, $this->stressTest->valueAtPosition(19));
    }

    public function testValueAtPosition20()
    {
        $this->assertEquals(351, $this->stressTest->valueAtPosition(20));
    }

    public function testValueAtPosition21()
    {
        $this->assertEquals(362, $this->stressTest->valueAtPosition(21));
    }

    public function testValueAtPosition22()
    {
        $this->assertEquals(747, $this->stressTest->valueAtPosition(22));
    }

    public function testValueAtPosition23()
    {
        $this->assertEquals(806, $this->stressTest->valueAtPosition(23));
    }
}
