<?php

namespace Advent2017\Day7;

class Programs
{
    protected $programs = [];

    public function addProgram(Program $program)
    {
        $this->programs[$program->getName()] = $program;
    }

    public function addChildren(array $childrenData)
    {
        foreach ($childrenData as $parent => $children) {
            foreach ($children as $child) {
                $this->programs[$parent]->addChild($this->programs[$child]);
            }
        }

        foreach ($childrenData as $parent => $children) {
            foreach ($children as $child) {
                unset($this->programs[$child]);
            }
        }
    }

    /**
     * @return array
     */
    public function getPrograms(): array
    {
        return $this->programs;
    }
}
