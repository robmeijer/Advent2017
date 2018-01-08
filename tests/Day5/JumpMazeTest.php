<?php

namespace Advent2017\Tests\Day5;

use Advent2017\Day5\JumpMaze;
use PHPUnit\Framework\TestCase;

class JumpMazeTest extends TestCase
{
    /**
     * @var JumpMaze
     */
    private $jumpMaze;

    protected function setUp()
    {
        $this->jumpMaze = new JumpMaze([0, 3, 0, 1, -3]);
    }

    public function testFollowInstruction()
    {
        $position = $this->jumpMaze->followInstruction($this->jumpMaze->instruction());
        $this->assertEquals(0, $position);
        $this->jumpMaze->updateInstruction($position);

        $position = $this->jumpMaze->followInstruction($this->jumpMaze->instruction());
        $this->assertEquals(0, $position);
        $this->jumpMaze->updateInstruction($position);

        $position = $this->jumpMaze->followInstruction($this->jumpMaze->instruction());
        $this->assertEquals(1, $position);
        $this->jumpMaze->updateInstruction($position);

        $position = $this->jumpMaze->followInstruction($this->jumpMaze->instruction());
        $this->assertEquals(3, $position);
        $this->jumpMaze->updateInstruction($position);

        $position = $this->jumpMaze->followInstruction($this->jumpMaze->instruction());
        $this->assertEquals(1, $position);
        $this->jumpMaze->updateInstruction($position);
    }

    public function testUpdateInstruction()
    {
        $position = $this->jumpMaze->followInstruction($this->jumpMaze->instruction());
        $this->assertEquals(1, $this->jumpMaze->updateInstruction($position));
        $position = $this->jumpMaze->followInstruction($this->jumpMaze->instruction());
        $this->assertEquals(2, $this->jumpMaze->updateInstruction($position));
        $position = $this->jumpMaze->followInstruction($this->jumpMaze->instruction());
        $this->assertEquals(4, $this->jumpMaze->updateInstruction($position));
        $position = $this->jumpMaze->followInstruction($this->jumpMaze->instruction());
        $this->assertEquals(-2, $this->jumpMaze->updateInstruction($position));
        $position = $this->jumpMaze->followInstruction($this->jumpMaze->instruction());
        $this->assertEquals(5, $this->jumpMaze->updateInstruction($position));
    }

    public function testUpdateInstructionAlt()
    {
        $position = $this->jumpMaze->followInstruction($this->jumpMaze->instruction());
        $this->assertEquals(1, $this->jumpMaze->updateInstruction($position, true));
        $position = $this->jumpMaze->followInstruction($this->jumpMaze->instruction());
        $this->assertEquals(2, $this->jumpMaze->updateInstruction($position, true));
        $position = $this->jumpMaze->followInstruction($this->jumpMaze->instruction());
        $this->assertEquals(2, $this->jumpMaze->updateInstruction($position, true));
        $position = $this->jumpMaze->followInstruction($this->jumpMaze->instruction());
        $this->assertEquals(-2, $this->jumpMaze->updateInstruction($position, true));
        $position = $this->jumpMaze->followInstruction($this->jumpMaze->instruction());
        $this->assertEquals(3, $this->jumpMaze->updateInstruction($position, true));
        $position = $this->jumpMaze->followInstruction($this->jumpMaze->instruction());
        $this->assertEquals(2, $this->jumpMaze->updateInstruction($position, true));
        $position = $this->jumpMaze->followInstruction($this->jumpMaze->instruction());
        $this->assertEquals(-1, $this->jumpMaze->updateInstruction($position, true));
        $position = $this->jumpMaze->followInstruction($this->jumpMaze->instruction());
        $this->assertEquals(1, $this->jumpMaze->updateInstruction($position, true));
        $position = $this->jumpMaze->followInstruction($this->jumpMaze->instruction());
        $this->assertEquals(2, $this->jumpMaze->updateInstruction($position, true));
        $position = $this->jumpMaze->followInstruction($this->jumpMaze->instruction());
        $this->assertEquals(3, $this->jumpMaze->updateInstruction($position, true));
    }
}
