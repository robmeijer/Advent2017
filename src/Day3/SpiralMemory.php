<?php

namespace Advent2017\Day3;

class SpiralMemory
{
    /**
     * @param int $data
     * @return int
     */
    public function calculateSteps(int $data): int
    {
        $square = $this->calculateSquare($data);

        if ($square['steps'] === 0) {
            return 0;
        }

        return $square['steps'] + $this->calculateSide($data, $square);
    }

    /**
     * @param int $data
     * @return array
     */
    private function calculateSquare(int $data): array
    {
        $min = 1;
        $max = 1;
        for ($steps = 0; $min <= $data; $steps++) {
            $max += $steps * 8;
            if ($min <= $data && $data <= $max) {
                break;
            }
            $min = $max + 1;
        }

        return compact('steps', 'min', 'max');
    }

    /**
     * @param int $data
     * @param array $square
     * @return int
     */
    private function calculateSide(int $data, array $square): int
    {
        $current = $square['min'];
        for ($i = 1; $i <= 4; $i++) {
            $side = $this->buildSide($this->getSideCount($square['steps']), $i, $square['max'], $current);

            if (in_array($data, $side)) {
                $mid = (int) floor($this->getSideCount($square['steps']) / 2);
                return abs($data - $side[$mid]);
            }

            $current = $side[$this->getSideCount($square['steps']) - 1];
        }

        return $square['steps'];
    }

    /**
     * @param int $steps
     * @return int
     */
    private function getSideCount($steps): int
    {
        return $steps * 2 + 1;
    }

    /**
     * @param int $sideCount
     * @param int $side
     * @param int $max
     * @param int $current
     * @return array
     */
    private function buildSide($sideCount, $side, $max, $current): array
    {
        return array_map(function ($position) use ($side, $max, $current) {
            if ($side === 1) {
                if ($position === 1) {
                    return $max;
                }
                return $current + $position - 2;
            }
            return $current + $position - 1;
        }, range(1, $sideCount));
    }
}
