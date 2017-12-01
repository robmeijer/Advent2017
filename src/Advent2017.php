<?php

namespace Advent2017;

use League\Flysystem\FilesystemInterface;

class Advent2017
{
    /**
     * @var FilesystemInterface
     */
    protected $filesystem;

    /**
     * @var array
     */
    protected $input = [];

    /**
     * Advent2016 constructor
     *
     * @param   FilesystemInterface $filesystem
     */
    public function __construct(FilesystemInterface $filesystem)
    {
        $this->filesystem = $filesystem;
    }

    /**
     * Import input
     *
     * @param   string $file
     *
     * @throws \League\Flysystem\FileNotFoundException
     */
    public function import($file)
    {
        $this->input = $this->getLines($this->filesystem->read($file));
    }

    /**
     * Return the imported input
     *
     * @return  array
     */
    public function input()
    {
        return $this->input;
    }

    /**
     * Get lines from given file contents
     *
     * @param   string  $contents
     * @return  array
     */
    protected function getLines($contents)
    {
        preg_match_all('/.+/', $contents, $matches);

        return $matches[0];
    }
}
