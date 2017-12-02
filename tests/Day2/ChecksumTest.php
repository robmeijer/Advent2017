<?php

namespace Advent2017\Tests\Day2;

use Advent2017\Day2\Checksum;
use PHPUnit\Framework\TestCase;

class ChecksumTest extends TestCase
{
    public function testRow()
    {
        $checksum = new Checksum();

        $this->assertEquals(8, $checksum->row('5	1	9	5'));
        $this->assertEquals(4, $checksum->row('7	5	3'));
        $this->assertEquals(6, $checksum->row('2	4	6	8'));
    }

    public function testCalculate()
    {
        $checksum = new Checksum();

        $input = [
            '5	1	9	5',
            '7	5	3',
            '2	4	6	8',
        ];

        $this->assertEquals(18, $checksum->calculate($input));
    }

    public function testRowDivide()
    {
        $checksum = new Checksum();

        $this->assertEquals(4, $checksum->rowDivide('5	9	2	8'));
        $this->assertEquals(3, $checksum->rowDivide('9	4	7	3'));
        $this->assertEquals(2, $checksum->rowDivide('3	8	6	5'));
    }

    public function testCalculateDivide()
    {
        $checksum = new Checksum();

        $input = [
            '5	9	2	8',
            '9	4	7	3',
            '3	8	6	5',
        ];

        $this->assertEquals(9, $checksum->calculateDivide($input));
    }
}
