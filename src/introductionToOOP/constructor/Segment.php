<?php

namespace Hexlet\App\IntroductionToOOP\constructor;

use Hexlet\App\IntroductionToOOP\Pointers\Point;

class Segment
{
    private Point $beginPoint;
    private Point $endPoint;

    public function __construct(Point $beginPoint, Point $endPoint)
    {
        $this->beginPoint = $beginPoint;
        $this->endPoint = $endPoint;
    }

    public function getBeginPoint(): Point
    {
        return $this->beginPoint;
    }

    public function getEndPoint(): Point
    {
        return $this->endPoint;
    }

    public function __toString(): string
    {
        $beginStr = '(' . $this->getBeginPoint()->x . ', ' . $this->getBeginPoint()->y . ')';
        $endStr = '(' . $this->getEndPoint()->x . ', ' . $this->getEndPoint()->y . ')';

        return '[' . $beginStr . ', ' . $endStr . ']';
    }
}
