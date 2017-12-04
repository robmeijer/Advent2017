<?php

use Advent2017\Day1\Captcha;
use Advent2017\Day2\Checksum;
use Advent2017\Day3\SpiralMemory;
use Advent2017\Day3\StressTest;
use League\Flysystem\Filesystem;

require __DIR__ . '/../vendor/autoload.php';

$container = require __DIR__ . '/../bootstrap/container.php';

// -----------------------------------------------------------------------------
// ----------------------------------- DAY 1 -----------------------------------
// -----------------------------------------------------------------------------
$contents = $container->get(Filesystem::class)->read('Day1/input.txt');

echo 'Day 1 Part 1: ' . $container->get(Captcha::class)->sumNext($contents) . '<br>';
echo 'Day 1 Part 2: ' . $container->get(Captcha::class)->sumHalf($contents) . '<br>';

// -----------------------------------------------------------------------------
// ----------------------------------- DAY 2 -----------------------------------
// -----------------------------------------------------------------------------
$contents = $container->get(Filesystem::class)->read('Day2/input.txt');
preg_match_all('/(?<rows>.+)/', $contents, $matches);

echo 'Day 2 Part 1: ' . $container->get(Checksum::class)->calculate($matches['rows']) . '<br>';
echo 'Day 2 Part 2: ' . $container->get(Checksum::class)->calculateDivide($matches['rows']) . '<br>';

// -----------------------------------------------------------------------------
// ----------------------------------- DAY 3 -----------------------------------
// -----------------------------------------------------------------------------
$data = 361527;

echo 'Day 3 Part 1: ' . $container->get(SpiralMemory::class)->calculateSteps($data) . '<br>';

$value = 0;
$i = 1;
while ($value < $data) {
    $value = $container->get(StressTest::class)->valueAtPosition($i);
    $i++;
}

echo 'Day 3 Part 2: ' . $value . '<br>';
