<?php

namespace Rankarusu\Aoc2025;

class Day01 extends Day
{
    private const DIAL_SIZE = 100;

    protected function solvePart1(): void
    {
        $content = $this->readFile('01');
        $lines = explode(PHP_EOL, $content);
        $dial = 50;
        $clicks = 0;

        foreach ($lines as $line) {
            $instruction = substr($line, 0, 1);
            $amount = intval(substr($line, 1));

            if ($instruction === "R") {
                $dial = ($dial + $amount) % self::DIAL_SIZE;
            } else {
                $dial = ($dial - $amount + self::DIAL_SIZE) % self::DIAL_SIZE;
            }
            if ($dial === 0) {
                $clicks++;
            }
        }
        var_dump($clicks);
    }

    protected function solvePart2(): void
    {
        // i tried making my p1 solution work for p2 as well and failed miserably covering all edge cases.
        // so here goes a for loop.
        $content = $this->readFile('01');
        $lines = explode(PHP_EOL, $content);
        $dial = 50;
        $zeroes = 0;


        foreach ($lines as $line) {
            $instruction = substr($line, 0, 1);
            $amount = intval(substr($line, 1));

            $step = $instruction === 'L' ?  1 : -1;

            for ($i = 0; $i < $amount; $i++) {
                $dial += $step;
                if ($dial % self::DIAL_SIZE === 0) {
                    $zeroes++;
                }
            }
        }
        var_dump($zeroes);
    }
}
