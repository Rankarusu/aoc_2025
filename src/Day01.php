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
    protected function solvePart2(): void {}
}
