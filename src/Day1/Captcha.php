<?php

namespace Advent2017\Day1;

class Captcha
{
    /**
     * @var array
     */
    private $input = [];

    /**
     * @var int
     */
    private $sum = 0;

    /**
     * @param mixed $input
     *
     * @return int
     */
    public function sumNext($input): int
    {
        $this->setInput($input);
        $this->resetSum();

        array_walk($this->input, function ($number, $position) {
            $this->updateSum($number, $this->getNextTarget($position));
        });

        return $this->sum;
    }

    /**
     * @param mixed $input
     *
     * @return int
     */
    public function sumHalf($input): int
    {
        $this->setInput($input);
        $this->resetSum();

        array_walk($this->input, function ($number, $position) {
            $this->updateSum($number, $this->getHalfTarget($position));
        });

        return $this->sum;
    }

    /**
     * @param int $position
     *
     * @return int
     */
    private function getNextTarget(int $position): int
    {
        $position++;

        return $position < count($this->input) ? $position : 0;
    }

    /**
     * @param int $number
     * @param int $target
     */
    private function updateSum(int $number, int $target): void
    {
        if ($number == $this->input[$target]) {
            $this->sum += $number;
        }
    }

    /**
     * @param int $position
     *
     * @return int
     */
    private function getHalfTarget($position): int
    {
        $target = $position + round(count($this->input) / 2);

        return $target < count($this->input) ? $target : $target - count($this->input);
    }

    /**
     * @param mixed $input
     */
    private function setInput($input): void
    {
        $this->input = str_split($input);
    }

    private function resetSum(): void
    {
        $this->sum = 0;
    }
}
