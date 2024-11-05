<?php

//src\Point.php
//
//Реализуйте класс Point с публичными свойствами $x и $y.
//src\PointFunctions.php
//
//Реализуйте функцию getMidpoint, которая принимает на вход две точки (объекты) и возвращает точку (объект)
// лежащую между ними (поиск середины отрезка).
//
//<?php
//
//$point1 = new Point();
//$point1->x = 1;
//$point1->y = 10;
//$point2 = new Point();
//$point2->x = 10;
//$point2->y = 1;
//
//$midpoint = getMidpoint($point1, $point2);
//$midpoint->x; // 5.5
//$midpoint->y; // 5.5

class Point
{
    public float $x;
    public float $y;
}

function getMidpoint(Point $point1, Point $point2): Point
{
    $x1 = $point1->x;
    $y1 = $point1->y;

    $x2 = $point2->x;
    $y2 = $point2->y;

    $midX = ($x1 + $x2) / 2;
    $midY = ($y1 + $y2) / 2;

    $midPoint = new Point();
    $midPoint->x = $midX;
    $midPoint->y = $midY;

    return $midPoint;
}

$p1 = new Point();
$p1->x = 1;
$p1->y = 10;

$p2 = new Point();
$p2->x = 10;
$p2->y = 1;

$mid = getMidpoint($p1, $p2);
