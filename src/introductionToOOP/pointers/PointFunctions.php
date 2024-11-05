<?php

use Hexlet\App\IntroductionToOOP\Pointers\Point;

require_once __DIR__ . '/../../../vendor/autoload.php';

//Реализуйте функцию dup, которая клонирует переданную точку. Под клонированием подразумевается процесс создания
// нового объекта, с такими же данными как и у старого.
//
//<?php
//
//use function App\PointFunctions\dup;
//
//$point1 = new \App\Point();
//$point2 = dup($point1);
//
//$point1 == $point2; // true
//$point1 === $point2; // false

function dup(Point $p): Point
{
    return clone $p;
}

$point1 = new Point();
$point2 = dup($point1);
var_dump($point1, $point2);