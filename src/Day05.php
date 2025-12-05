<?php

namespace Rankarusu\Aoc2025;

class Day05 extends Day
{
    protected function solvePart1(): void
    {
        [$ranges, $ids] = explode("\n\n", $this->readFile('05'));
        $ranges = array_map(fn($range) => array_map(fn($i) => floatval($i), explode('-', $range)), explode(PHP_EOL, $ranges));
        $ids = array_map(fn($id) => floatval($id), explode(PHP_EOL, $ids));

        $fresh = [];

        foreach ($ids as $id) {
            foreach ($ranges as [$start, $end]){
                if ($id >= $start && $id <= $end){
                    $fresh[] = $id;
                    break;
                }
            }
        }

        var_dump(count($fresh));
    }


    protected function solvePart2(): void {}
}
