<?php

namespace Hexlet\App\challenges\IntroductionToOOP;

class Circle
{
    private float $radius;

    public function __construct(float $radius)
    {
        $this->radius = abs($radius);
    }

    public function getArea(): float
    {
        return M_PI * $this->radius ** 2;
    }

    public function getCircumference(): float
    {
        return 2 * M_PI * $this->radius;
    }

}

//$obj = new Circle(-10.2);
//echo $obj->getArea() . "\n";
//echo $obj->getCircumference() . "\n";
