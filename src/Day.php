<?php

declare(strict_types=1);

namespace Rankarusu\Aoc2025;

abstract class Day
{
    abstract protected function solvePart1(): void;
    abstract protected function solvePart2(): void;

    protected function readFile(string $fileName): string
    {
        $path =  __DIR__ . DIRECTORY_SEPARATOR . $fileName . '.txt';

        $content = file_get_contents($path);
        if (!$content) {
            throw new \Exception('Could not read file!');
        }
        return $content;
    }

    public function run(): void
    {
        $this->solvePart1();
        $this->solvePart2();
    }
}
