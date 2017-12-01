<?php

namespace Advent2017\Day1;

class Captcha
{
    public function sum($input)
    {
        $input = str_split($input);
        $input[] = $input[0];

        $sum = 0;
        $previous = null;

        foreach ($input as $number) {
            if ($previous && $number == $previous) {
                $sum += $number;
            }
            $previous = $number;
        }

        return $sum;
    }
}
