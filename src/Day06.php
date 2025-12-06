<?php

namespace Rankarusu\Aoc2025;

class Day06 extends Day
{
    protected function solvePart1(): void
    {
        $content = explode(PHP_EOL, $this->readFile('06'));
        $split = array_map(fn($i) => preg_split('/\s+/', $i), $content);
        // array_values necessary because keys are preserved
        $filtered = array_map(fn($line) => array_values(array_filter($line, fn($i) => !empty($i))), $split);
        $numbers = array_map(fn($line) => array_map(fn($i) => floatval($i), $line), array_slice($filtered, 0, count($filtered) - 1));
        $operations = array_slice($filtered, count($filtered)  - 1, 1)[0];

        $result = 0;

        foreach ($operations as $i => $op) {
            $col = array_column($numbers, $i);
            if ($op === "+") {
                $result += array_sum($col);
            } else {
                $result += array_product($col);
            }
        }

        var_dump($result);
    }


    protected function solvePart2(): void
    {
    }
}
