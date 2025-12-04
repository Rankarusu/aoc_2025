<?php

namespace Rankarusu\Aoc2025;

class Day04 extends Day
{
    protected function solvePart1(): void
    {
        $content = $this->readFile('04');
        $lines = array_map(fn($line) => str_split($line), explode(PHP_EOL, $content));

        $rolls = 0;

        for ($i = 0; $i < count($lines); $i++) {
            for ($j = 0; $j < count($lines[$i]); $j++) {
                $current = $lines[$i][$j];
                if ($current === '@' && $this->checkPosition($i, $j, $lines)) {
                    $rolls++;
                }
            }
        }
        var_dump($rolls);
    }

    private function checkPosition(int $x, int $y, array $grid): bool
    {
        $neighbors = [];

        $offsets = [
            [-1, -1],
            [-1, 0],
            [-1, 1],
            [0, -1],
            [0, 1],
            [1, -1],
            [1, 0],
            [1, 1],
        ];

        $maxX = count($grid) - 1;
        $maxY = count($grid[0]) - 1;

        foreach ($offsets as [$dx, $dy]) {
            $nx = $x + $dx;
            $ny = $y + $dy;

            if ($nx < 0 || $ny < 0 || $nx > $maxX || $ny > $maxY) {
                continue;
            }
            $value = $grid[$nx][$ny];

            if ($value === '@') {
                $neighbors[] = [
                    $nx,
                    $ny,
                ];
            }
        }

        return count($neighbors) < 4;
    }

    protected function solvePart2(): void
    {
        $content = $this->readFile('04');
        $lines = array_map(fn($line) => str_split($line), explode(PHP_EOL, $content));

        $rolls = 0;


        do {
            $removableRolls = [];
            for ($i = 0; $i < count($lines); $i++) {
                for ($j = 0; $j < count($lines[$i]); $j++) {
                    $current = $lines[$i][$j];
                    if ($current === '@' && $this->checkPosition($i, $j, $lines)) {
                        $removableRolls[] = [$i, $j];
                        $rolls++;
                    }
                }
            }
            foreach ($removableRolls as $r) {
                $lines[$r[0]][$r[1]] = '.';
            }
        } while (count($removableRolls) > 0);


        var_dump($rolls);
    }
}
