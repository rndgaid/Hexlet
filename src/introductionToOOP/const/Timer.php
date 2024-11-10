<?php

namespace Hexlet\App\IntroductionToOOP\const;

class Timer
{
    private const SEC_PER_MIN = 60;
    private const SEC_PER_HOUR = 3600;
    private int $secondsCount;

    public function __construct(int $sec, int $min = 0, int $hour = 0)
    {
        $this->secondsCount = ($sec + $min * self::SEC_PER_MIN + $hour * self::SEC_PER_HOUR);
    }

    public function start(): void
    {
        while ($this->secondsCount > 0) {
            echo $this->secondsCount . "\n";
            $this->tick();
            sleep(1);
        }
    }

    public function getLeftSeconds(): int
    {
        return $this->secondsCount;
    }

    public function tick(): void
    {
        if ($this->secondsCount > 0) {
            --$this->secondsCount;
        }
    }
}
