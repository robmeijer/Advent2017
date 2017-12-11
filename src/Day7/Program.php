<?php

namespace Advent2017\Day7;

class Program
{
    protected $name;
    protected $weight;
    protected $totalWeight = 0;
    protected $childrenWeight = 0;
    protected $children = [];

    /**
     * Program constructor.
     *
     * @param string $name
     * @param int $weight
     */
    public function __construct(string $name, int $weight)
    {
        $this->name = $name;
        $this->weight = $weight;
    }


    public function calculateWeights()
    {
        /** @var Program $child */
        foreach ($this->getChildren() as $child) {
            $this->totalWeight += $child->calculateWeights();
        }

        $this->childrenWeight += $this->getTotalWeight();
        $this->totalWeight += $this->getWeight();

        return $this->getTotalWeight();
    }

    public function getChildWeights()
    {
        return array_map(function ($child) {
            return $child->getTotalWeight();
        }, $this->getChildren());
    }

    public function addChild(Program $child)
    {
        $this->children[$child->getName()] = $child;
    }

    public function getChild(string $name): Program
    {
        return $this->children[$name];
    }

    public function getName(): string
    {
        return $this->name;
    }

    public function getWeight(): int
    {
        return $this->weight;
    }

    public function getChildren(): array
    {
        return $this->children;
    }

    public function getChildrenWeight(): int
    {
        return $this->childrenWeight;
    }

    public function getTotalWeight(): int
    {
        return $this->totalWeight;
    }
}
