<?php

namespace Advent2017\Day5;

class JumpMaze
{
    /**
     * @var int
     */
    protected $steps = 0;
    /**
     * @var array
     */
    protected $maze;

    /**
     * JumpMaze constructor.
     *
     * @param array $maze
     */
    public function __construct(array $maze)
    {
        $this->maze = $maze;
    }

    /**
     * @param int $instruction
     *
     * @return int
     */
    public function followInstruction(int $instruction): int
    {
        $position = key($this->maze);

        foreach (range(1, abs($instruction)) as $jump) {
            if ($instruction > 0) {
                $this->jumpForward();
            } elseif ($instruction < 0) {
                $this->jumpBackward();
            }
        }

        return $position;
    }

    /**
     * @return int
     */
    public function instruction(): int
    {
        return current($this->maze);
    }

    /**
     * @return int
     */
    private function jumpForward(): int
    {
        return next($this->maze);
    }

    /**
     * @return int
     */
    private function jumpBackward(): int
    {
        return prev($this->maze);
    }

    public function addStep(): void
    {
        $this->steps++;
    }

    /**
     * @param int $position
     * @param bool $alt
     *
     * @return int
     */
    public function updateInstruction(int $position, $alt = false): int
    {
        if ($alt && $this->maze[$position] >= 3) {
            $this->maze[$position]--;
        } else {
            $this->maze[$position]++;
        }

        return $this->maze[$position];
    }

    /**
     * @return bool
     */
    public function inMaze(): bool
    {
        return isset($this->maze[key($this->maze)]);

    }

    /**
     * @return int
     */
    public function steps(): int
    {
        return $this->steps;
    }
}
