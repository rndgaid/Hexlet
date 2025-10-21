<?php

declare(strict_types=1);

namespace Hexlet\App\Polymorphism;

require_once __DIR__ . '/../../vendor/autoload.php';

function reverse(Node $list): Node
{
    $reversed = null;

    while ($list !== null) {
        $reversed = new Node($list->getData(), $reversed);
        $list = $list->getNext();
    }

    return $reversed;
}

$numbers = new Node(1, new Node(2, new Node(3)));

$reversedNumbers = reverse($numbers);
print_r($reversedNumbers);
