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
            foreach ($ranges as [$start, $end]) {
                if ($id >= $start && $id <= $end) {
                    $fresh[] = $id;
                    break;
                }
            }
        }

        var_dump(count($fresh));
    }


    protected function solvePart2(): void
    {
        [$ranges] = explode("\n\n", $this->readFile('05'));
        $ranges = array_map(fn($range) => array_map(fn($i) => floatval($i), explode('-', $range)), explode(PHP_EOL, $ranges));

        // sort by start
        usort($ranges, fn($a, $b) => $a[0] - $b[0]);

        $res = [$ranges[0]];

        for ($i = 1; $i < count($ranges); $i++) {
            $last = &$res[count($res) - 1];
            $cur = $ranges[$i];

            //when start of current range is smaller than the last ones end, we just extend it
            if ($cur[0] <= $last[1]) {
                $last[1] = max($last[1], $cur[1]);
            } else {
                $res[] = $cur;
            }
        }

        // +1 because ranges are inclusive on both ends
        var_dump(array_sum(array_map(fn($i) => $i[1] - $i[0]+1, $res)));
    }
}
