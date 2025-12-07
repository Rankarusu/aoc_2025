<?php

namespace Rankarusu\Aoc2025;

class Day07 extends Day
{
    protected function solvePart1(): void
    {
        $lines = explode(PHP_EOL, $this->readFile('07'));
        $charMap = array_map(fn($line) => str_split($line), $lines);

        $splits = 0;

        $startX = array_find_key($charMap[0], fn($i) => $i === "S");

        $this->beam($startX, 0, $charMap, $splits);

        // $result = array_map(fn($line) => join("", $line), $charMap);
        var_dump($splits);
    }

    protected function beam(int $x, int $y, array &$map, int &$splits): void
    {
        for ($i = $y; $i < count($map); $i++) {
            $current = $map[$i][$x];

            //overlapping beams
            if ($current === "|") {
                break;
            }

            if ($map[$i][$x] === ".") {
                $map[$i][$x] = "|";
            }

            // $result = array_map(fn($line) => join("", $line), $map);

            if ($current === "^") {
                $splits++;

                // don't create multiple beams in same column
                if ($map[$i][$x - 1] !== "|") {
                    $this->beam($x - 1, $i, $map, $splits);
                }
                if ($map[$i][$x + 1] !== "|") {
                    $this->beam($x + 1, $i, $map, $splits);
                }
                break;
            }
        }
    }


    protected function solvePart2(): void {}
}
