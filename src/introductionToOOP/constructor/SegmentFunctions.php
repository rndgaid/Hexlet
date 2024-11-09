<?php

use Hexlet\App\IntroductionToOOP\constructor\Segment;
use Hexlet\App\IntroductionToOOP\Pointers\Point;

require_once __DIR__ . '/../../../vendor/autoload.php';

function reverse(Segment $segment): Segment
{
    $begin = new Point($segment->getBeginPoint()->x, $segment->getBeginPoint()->y);
    $end = new Point($segment->getEndPoint()->x, $segment->getEndPoint()->y);

    return new Segment($end, $begin);
}

$p1 = new Point(1, 10);
$p2 = new Point(11, -3);

$segment = new Segment($p1, $p2);
$reversedSegment = reverse($segment);
echo $segment;
