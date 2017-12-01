<?php

use Advent2017\Day1\Captcha;
use League\Flysystem\Filesystem;

require __DIR__ . '/../vendor/autoload.php';

$container = require __DIR__ . '/../bootstrap/container.php';

$contents = $container->get(Filesystem::class)->read('Day1/input.txt');

echo $container->get(Captcha::class)->sumNext($contents) . '<br>';
echo $container->get(Captcha::class)->sumHalf($contents) . '<br>';
