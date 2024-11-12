<?php

namespace Hexlet\App\challenges\IntroductionToOOP;

interface Randomable
{
    public function __construct(int $seed);
    public function getNext(): int;
    public function reset(): void;
}
