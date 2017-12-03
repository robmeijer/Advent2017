<?php

namespace Advent2017\Tests\Day3;

use Advent2017\Day3\SpiralMemory;
use PHPUnit\Framework\TestCase;

class SpiralMemoryTest extends TestCase
{
    public function testCalculateStepsWith1()
    {
        $spiralMemory = new SpiralMemory();
        $this->assertEquals(0, $spiralMemory->calculateSteps(1));
    }

    public function testCalculateStepsWith12()
    {
        $spiralMemory = new SpiralMemory();
        $this->assertEquals(3, $spiralMemory->calculateSteps(12));
    }

    public function testCalculateStepsWith23()
    {
        $spiralMemory = new SpiralMemory();
        $this->assertEquals(2, $spiralMemory->calculateSteps(23));
    }

    public function testCalculateStepsWith1024()
    {
        $spiralMemory = new SpiralMemory();
        $this->assertEquals(31, $spiralMemory->calculateSteps(1024));
    }
}
