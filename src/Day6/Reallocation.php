<?php

namespace Advent2017\Day6;

class Reallocation
{
    /**
     * @var array
     */
    protected $cycles = [];

    /**
     * @var array
     */
    protected $banks;

    /**
     * @var int
     */
    protected $sourceBank;

    /**
     * Reallocation constructor.
     *
     * @param $banks
     */
    public function __construct(array $banks)
    {
        $this->banks = $banks;
    }

    /**
     * @return bool
     */
    public function redistribute(): bool
    {
        if (in_array($this->banks, $this->cycles)) {
            return false;
        }

        $this->cycles[] = $this->banks;
        $this->sourceBank = $this->findSourceBank();
        $target = $this->findTargetBank();
        $blocks = $this->getBlocks($this->sourceBank);

        return $this->redistributeBlocks($blocks, $target);
    }

    /**
     * @return int
     */
    private function findSourceBank(): int
    {
        return array_keys($this->banks, max($this->banks))[0];
    }

    /**
     * @return int
     */
    private function findTargetBank(): int
    {
        return ($this->sourceBank === count($this->banks) - 1) ? 0 : $this->sourceBank + 1;
    }

    /**
     * @param int $sourceBank
     *
     * @return int
     */
    private function getBlocks(int $sourceBank): int
    {
        $blocks = $this->banks[$sourceBank];
        $this->banks[$sourceBank] = 0;

        return $blocks;
    }

    /**
     * @param int $blocks
     * @param int $target
     *
     * @return bool
     */
    private function redistributeBlocks(int $blocks, int $target): bool
    {
        while ($blocks) {
            $this->banks[$target]++;
            $blocks--;
            $target = ($target === count($this->banks) - 1) ? 0 : $target + 1;
        }

        return true;
    }

    /**
     * @return array
     */
    public function getCycles(): array
    {
        return $this->cycles;
    }

    /**
     * @return array
     */
    public function getBanks(): array
    {
        return $this->banks;
    }
}
