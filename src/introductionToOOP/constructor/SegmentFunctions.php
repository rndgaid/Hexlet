<?php

use Hexlet\App\IntroductionToOOP\constructor\Segment;
use Hexlet\App\IntroductionToOOP\Pointers\Point;

require_once __DIR__ . '/../../../vendor/autoload.php';

function reverse(Segment $segment): Segment
{
    $begin = new Point($segment->beginPoint->x, $segment->beginPoint->y);
    $end = new Point($segment->endPoint->x, $segment->endPoint->y);

    return new Segment($begin, $end);
}

$p1 = new Point(1, 10);
$p2 = new Point(11, -3);

$segment = new Segment($p1, $p2);
$reversedSegment = reverse($segment);
$p1->y = 125;
//print_r($reversedSegment);
