<?php

namespace Advent2017\Tests\Day6;

use Advent2017\Day6\Reallocation;
use PHPUnit\Framework\TestCase;

class ReallocationTest extends TestCase
{
    /**
     * @var Reallocation
     */
    private $reallocation;

    protected function setUp()
    {
        $this->reallocation = new Reallocation([0, 2, 7, 0]);
    }

    public function testRedistribute()
    {
        $this->reallocation->redistribute();
        $cycles = $this->reallocation->getCycles();
        $this->assertEquals([0, 2, 7, 0], end($cycles));
        $this->reallocation->redistribute();
        $cycles = $this->reallocation->getCycles();
        $this->assertEquals([2, 4, 1, 2], end($cycles));
        $this->reallocation->redistribute();
        $cycles = $this->reallocation->getCycles();
        $this->assertEquals([3, 1, 2, 3], end($cycles));
        $this->reallocation->redistribute();
        $cycles = $this->reallocation->getCycles();
        $this->assertEquals([0, 2, 3, 4], end($cycles));
        $this->reallocation->redistribute();
        $cycles = $this->reallocation->getCycles();
        $this->assertEquals([1, 3, 4, 1], end($cycles));
        $this->reallocation->redistribute();
    }
}
