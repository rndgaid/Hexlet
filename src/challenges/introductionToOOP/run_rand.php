<?php

use Hexlet\App\challenges\IntroductionToOOP\Random;

require_once __DIR__ . '/../../../vendor/autoload.php';


$num = new Random(7);

for ($i = 0; $i < 10; $i++) {
    echo $num->getNext() . "\n";
}

$num->reset();
echo "\n";

for ($i = 0; $i < 10; $i++) {
    echo $num->getNext() . "\n";
}

$seq = new Random(100);
$result1 = $seq->getNext();
$result2 = $seq->getNext();
echo "\n";

var_dump($result1 !== $result2); // true

$seq->reset();

$result21 = $seq->getNext();
$result22 = $seq->getNext();

var_dump($result1 === $result21); // true
var_dump($result2 === $result22); // true
