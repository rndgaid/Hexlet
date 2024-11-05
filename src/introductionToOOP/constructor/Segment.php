<?php

namespace Hexlet\App\IntroductionToOOP\constructor;

use Hexlet\App\IntroductionToOOP\Pointers\Point;

class Segment
{
    public Point $beginPoint;
    public Point $endPoint;

    public function __construct(Point $beginPoint, Point $endPoint)
    {
        $this->beginPoint = $beginPoint;
        $this->endPoint = $endPoint;
    }
}
