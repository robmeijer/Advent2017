<?php

use Advent2017\Day1\Captcha;
use Advent2017\Day2\Checksum;
use League\Flysystem\Filesystem;

require __DIR__ . '/../vendor/autoload.php';

$container = require __DIR__ . '/../bootstrap/container.php';

// -----------------------------------------------------------------------------
// ----------------------------------- DAY 1 -----------------------------------
// -----------------------------------------------------------------------------
$contents = $container->get(Filesystem::class)->read('Day1/input.txt');

echo $container->get(Captcha::class)->sumNext($contents) . '<br>';
echo $container->get(Captcha::class)->sumHalf($contents) . '<br>';

// -----------------------------------------------------------------------------
// ----------------------------------- DAY 2 -----------------------------------
// -----------------------------------------------------------------------------
$contents = $container->get(Filesystem::class)->read('Day2/input.txt');
preg_match_all('/(?<rows>.+)/', $contents, $matches);

echo $container->get(Checksum::class)->calculate($matches['rows']) . '<br>';
echo $container->get(Checksum::class)->calculateDivide($matches['rows']) . '<br>';
