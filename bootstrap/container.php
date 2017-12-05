<?php

use Advent2017\Day1\Captcha;
use Advent2017\Day2\Checksum;
use Advent2017\Day3\SpiralMemory;
use Advent2017\Day3\StressTest;
use Advent2017\Day4\PassPhrase;
use Advent2017\Day5\JumpMaze;
use League\Container\Argument\RawArgument;
use League\Container\Container;
use League\Flysystem\Adapter\Local;
use League\Flysystem\Filesystem;

$container = new Container();

$container->add(Local::class)->withArgument(new RawArgument(__DIR__ . '/../src'));
$container->add(Filesystem::class)->withArgument(Local::class);
$container->add(Captcha::class);
$container->add(Checksum::class);
$container->add(SpiralMemory::class);
$container->add(StressTest::class);
$container->add(PassPhrase::class);
$container->add(JumpMaze::class);

return $container;
