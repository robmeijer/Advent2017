<?php

namespace Advent2017\Day4;

class PassPhrase
{
    /**
     * @var array
     */
    protected $words;

    /**
     * @param string $phrase
     * @return bool
     */
    public function isValid(string $phrase): bool
    {
        $this->words = [];

        $words = explode(' ', $phrase);
        foreach ($words as $word) {
            if (isset($this->words[$word])) {
                return false;
            }

            $this->words[$word] = 1;
        }

        return true;
    }

    /**
     * @param string $phrase
     * @return bool
     */
    public function isStrictValid(string $phrase): bool
    {
        return $this->isValid(implode(' ', array_map(function ($word) {
            return $this->normalise($word);
        }, explode(' ', $phrase))));
    }

    /**
     * @param string $word
     * @return string
     */
    private function normalise(string $word): string
    {
        $letters = str_split($word);
        sort($letters);

        return implode('', $letters);
    }
}
