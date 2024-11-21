<?php

namespace Hexlet\App\IntroductionToOOP\static;

class Time
{
    private int $hours;
    private int $minutes;

    public function __construct(int $hours, int $minutes)
    {
        $this->hours = $hours;
        $this->minutes = $minutes;
    }

    public static function fromString(string $time): ?self
    {
        if (!self::isValidTime($time)) {
            return null;
        }

        $parts = explode(':', $time);
        $hours = (int)$parts[0];
        $minutes = (int)$parts[1];

        return new self($hours, $minutes);
    }

    public function __toString(): string
    {
        return sprintf('%02d:%02d', $this->hours, $this->minutes);
    }

    private static function isValidTime(string $time): bool
    {
        $pattern = '/^([01]\d|2[0-3]):[0-5]\d$/';

        return preg_match($pattern, $time) === 1;
    }
}
