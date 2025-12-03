<?php

namespace Rankarusu\Aoc2025;

class Day03 extends Day
{
    protected function solvePart1(): void
    {
        $content = $this->readFile('03');
        $lines = explode(PHP_EOL, $content);
        $joltSize = 2;

        $result = [];

        foreach ($lines as $line) {
            $jolts = [];

            $highest = 0;
            $highestIndex = -1;
            while (count($jolts) !== $joltSize) {
                // no need to go to the last index if we need more digits anyway
                for ($i = $highestIndex + 1; $i <= strlen($line) - ($joltSize - count($jolts)); $i++) {
                    $current = intval($line[$i]);
                    if ($current > $highest) {
                        $highest = $current;
                        $highestIndex = $i;
                    }
                    if ($current === 9) {
                        break;
                    }
                }

                $jolts[] = $highest;
                //reset
                $highest = 0;
            }
            $result[] = intval(implode("", $jolts));
        }

        var_dump(array_sum($result));
    }

    protected function solvePart2(): void {}
}
