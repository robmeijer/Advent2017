<?php

use Advent2017\Day1\Captcha;
use League\Container\Argument\RawArgument;
use League\Container\Container;
use League\Flysystem\Adapter\Local;
use League\Flysystem\Filesystem;

$container = new Container();

$container->add(Local::class)->withArgument(new RawArgument(__DIR__ . '/../src'));
$container->add(Filesystem::class)->withArgument(Local::class);
$container->add(Captcha::class);

return $container;
