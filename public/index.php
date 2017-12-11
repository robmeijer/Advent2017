<?php

use Advent2017\Day1\Captcha;
use Advent2017\Day2\Checksum;
use Advent2017\Day3\SpiralMemory;
use Advent2017\Day3\StressTest;
use Advent2017\Day4\PassPhrase;
use Advent2017\Day5\JumpMaze;
use Advent2017\Day6\Reallocation;
use Advent2017\Day7\Program;
use Advent2017\Day7\Programs;
use League\Flysystem\Filesystem;

require __DIR__ . '/../vendor/autoload.php';

$container = require __DIR__ . '/../bootstrap/container.php';

// -----------------------------------------------------------------------------
// ----------------------------------- DAY 7 -----------------------------------
// -----------------------------------------------------------------------------
$contents = $container->get(Filesystem::class)->read('Day7/input.txt');
preg_match_all('/(?<rows>.+)/', $contents, $matches);

/** @var Programs $programs */
$programs = $container->get(Programs::class);
$childrenData = [];
foreach ($matches['rows'] as $row) {
    preg_match('/(?<name>[a-z]+) \((?<weight>\d+)\)(?: -> )?(?<children>.+)?/', $row, $input);
    $programs->addProgram(new Program($input['name'], $input['weight']));
    if (isset($input['children'])) {
        $childrenData[$input['name']] = explode(', ', $input['children']);
    }
};

$programs->addChildren($childrenData);

/** @var Program $program wiapi */
$program = current($programs->getPrograms());
$program->calculateWeights();

$unbalanced = true;

do {
    $counts = array_count_values($program->getChildWeights());
    $counts = array_flip($counts);

    if (isset($counts[1])) {
        $parent = $program;
        $childName = array_search($counts[1], $program->getChildWeights());
        /** @var Program $child */
        foreach ($parent->getChildren() as $child) {
            if ($child->getName() !== $childName) {
                $goodWeight = $child->getTotalWeight();
            }
        }

        $program = $program->getChild($childName);
    } else {
        $unbalanced = false;
    }
} while ($unbalanced);

echo '<pre>';
print_r($program->getWeight() + ($goodWeight - $program->getTotalWeight()));
exit();
