<?php

namespace Advent2017\Day2;

class Checksum
{
    /**
     * @param array $input
     * @return int
     */
    public function calculate(array $input): int
    {
        $sum = 0;

        foreach ($input as $row) {
            $sum += $this->row($row);
        }

        return $sum;
    }

    /**
     * @param array $input
     * @return int
     */
    public function calculateDivide(array $input): int
    {
        $sum = 0;

        foreach ($input as $row) {
            $sum += $this->rowDivide($row);
        }

        return $sum;
    }

    /**
     * @param $input
     * @return float|int
     */
    public function rowDivide($input)
    {
        $numbers = $this->inputToNumbers($input);

        foreach ($numbers as $position1 => $number1) {
            foreach ($numbers as $position2 => $number2) {
                if ($position1 !== $position2) {
                    if ($number1 % $number2 === 0) {
                        return $number1 / $number2;
                    }
                }
            }
        }

        return 0;
    }

    /**
     * @param string $input
     * @return int
     */
    public function row(string $input): int
    {
        $numbers = $this->inputToNumbers($input);

        return array_values(array_slice($numbers, -1))[0] - $numbers[0];
    }

    /**
     * @param string $input
     * @return array
     */
    private function inputToNumbers(string $input): array
    {
        $numbers = explode("\t", $input);

        sort($numbers);

        return $numbers;
    }
}
