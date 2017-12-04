<?php

namespace Advent2017\Day3;

class StressTest
{
    /**
     * @var int
     */
    protected $column = 0;

    /**
     * @var int
     */
    protected $row = 0;

    /**
     * @var int
     */
    protected $movesPerTurn = 1;

    /**
     * @var int
     */
    protected $timesMoved = 0;

    /**
     * @var string
     */
    protected $direction = 'right';

    /**
     * @var array
     */
    protected $directions = [
        'right' => 'up',
        'up' => 'left',
        'left' => 'down',
        'down' => 'right',
    ];

    /**
     * @var array
     */
    protected $start = [1];

    /**
     * @var array
     */
    protected $grid = [];

    /**
     * @param int $position
     * @return int
     */
    public function valueAtPosition(int $position): int
    {
        $this->grid[] = $this->start;
        $currentPosition = 1;

        foreach (range(1, $position) as $step) {
            foreach (range(1, $this->movesPerTurn) as $move) {
                if ($currentPosition == $position) {
                    return $this->grid[$this->row][$this->column];
                }
                $this->move();
                $this->writeValue();
                $currentPosition++;
            }
            $this->timesMoved++;
            $this->turn();
            if ($this->timesMoved == 2) {
                $this->movesPerTurn++;
                $this->timesMoved = 0;
            }
        }

        return $this->grid[$this->row][$this->column];
    }

    private function move(): void
    {
        switch ($this->direction) {
            case 'right':
                $this->column += 1;
                break;
            case 'up':
                $this->row -= 1;
                break;
            case 'left':
                $this->column -= 1;
                break;
            case 'down':
                $this->row += 1;
                break;
        }
    }

    private function writeValue(): void
    {
        $this->grid[$this->row][$this->column] = 0;
        $this->grid[$this->row][$this->column] += $this->grid[$this->row][$this->column - 1] ?? 0;
        $this->grid[$this->row][$this->column] += $this->grid[$this->row][$this->column + 1] ?? 0;
        $this->grid[$this->row][$this->column] += $this->grid[$this->row - 1][$this->column] ?? 0;
        $this->grid[$this->row][$this->column] += $this->grid[$this->row - 1][$this->column - 1] ?? 0;
        $this->grid[$this->row][$this->column] += $this->grid[$this->row - 1][$this->column + 1] ?? 0;
        $this->grid[$this->row][$this->column] += $this->grid[$this->row + 1][$this->column] ?? 0;
        $this->grid[$this->row][$this->column] += $this->grid[$this->row + 1][$this->column - 1] ?? 0;
        $this->grid[$this->row][$this->column] += $this->grid[$this->row + 1][$this->column + 1] ?? 0;
    }

    private function turn(): void
    {
        $this->direction = $this->directions[$this->direction];
    }
}
