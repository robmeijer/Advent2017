<?php

use Advent2017\Day1\Captcha;
use Advent2017\Day2\Checksum;
use Advent2017\Day3\SpiralMemory;
use Advent2017\Day3\StressTest;
use Advent2017\Day4\PassPhrase;
use Advent2017\Day5\JumpMaze;
use Advent2017\Day6\Reallocation;
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

// -----------------------------------------------------------------------------
// ----------------------------------- DAY 4 -----------------------------------
// -----------------------------------------------------------------------------
$contents = $container->get(Filesystem::class)->read('Day4/input.txt');
preg_match_all('/(?<rows>.+)/', $contents, $matches);

$valid = 0;
$strictValid = 0;
foreach ($matches['rows'] as $phrase) {
    if ($container->get(PassPhrase::class)->isValid($phrase)) {
        $valid++;
    }

    if ($container->get(PassPhrase::class)->isStrictValid($phrase)) {
        $strictValid++;
    }
}

echo 'Day 4 Part 1: ' . $valid . '<br>';
echo 'Day 4 Part 2: ' . $strictValid . '<br>';

// -----------------------------------------------------------------------------
// ----------------------------------- DAY 5 -----------------------------------
// -----------------------------------------------------------------------------
$contents = $container->get(Filesystem::class)->read('Day5/input.txt');
preg_match_all('/(?<maze>.+)/', $contents, $matches);

/** @var JumpMaze $jumpMaze */
$jumpMaze = $container->get(JumpMaze::class, [$matches['maze']]);

do {
    $jumpMaze->updateInstruction($jumpMaze->followInstruction($jumpMaze->instruction()));
    $jumpMaze->addStep();
} while ($jumpMaze->inMaze());

echo 'Day 5 Part 1: ' . $jumpMaze->steps() . '<br>';

/** @var JumpMaze $jumpMaze */
$jumpMaze = $container->get(JumpMaze::class, [$matches['maze']]);

do {
    $jumpMaze->updateInstruction($jumpMaze->followInstruction($jumpMaze->instruction()), true);
    $jumpMaze->addStep();
} while ($jumpMaze->inMaze());

echo 'Day 5 Part 2: ' . $jumpMaze->steps() . '<br>';

// -----------------------------------------------------------------------------
// ----------------------------------- DAY 6 -----------------------------------
// -----------------------------------------------------------------------------
$banks = explode("\t", $container->get(Filesystem::class)->read('Day6/input.txt'));

/** @var Reallocation $reallocation */
$reallocation = $container->get(Reallocation::class, [$banks]);

do {} while ($reallocation->redistribute());

echo 'Day 6 Part 1: ' . count($reallocation->getCycles()) . '<br>';
