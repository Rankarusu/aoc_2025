<?php

namespace Rankarusu\Aoc2025;

class Day02 extends Day
{
  protected function solvePart1(): void
  {
    $pattern = '/^(\d+)(\1)$/';

    $content = $this->readFile('02-test');
    $ranges = explode(',', $content);
    $result = [];
    foreach ($ranges as $range) {
      [$start, $end] = array_map(fn($a) => floatval($a), explode('-', $range));
      for ($i = $start; $i <= $end; $i++) {
        if (preg_match($pattern, $i) === 1) {
          $result[] = $i;
        }
      }
    }
    var_dump(array_sum($result));
  }

  protected function solvePart2(): void
  {
    $pattern = '/^(\d+)(\1)+$/';

    $content = $this->readFile('02');
    $ranges = explode(',', $content);
    $result = [];
    foreach ($ranges as $range) {
      [$start, $end] = array_map(fn($a) => floatval($a), explode('-', $range));
      for ($i = $start; $i <= $end; $i++) {
        if (preg_match($pattern, $i) === 1) {
          $result[] = $i;
        }
      }
    }
    var_dump(array_sum($result));
  }
}
