<?php

namespace Hexlet\App\challenges\IntroductionToOOP;

class Random implements Randomable
{
    private const MULTIPLIER = 5;
    private const INCREMENT = 3;
    private const MODULUS = 2 ** 32;

    private int $seed;
    private int $current;

    public function __construct(int $seed)
    {
        $this->seed = $seed;
        $this->current = $seed;
    }

    public function getNext(): int
    {
        $this->current = (self::MULTIPLIER * $this->current + self::INCREMENT) % self::MODULUS;

        return $this->current;
    }

    public function reset(): void
    {
        $this->current = $this->seed;
    }
}

