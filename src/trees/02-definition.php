<?php

//В этом задании под деревом понимается любой массив элементов, которые в свою очередь могут быть также деревьями
// (массивами). Пример:
//
//[
//    3, // лист
//    [5, 3], // узел
//    [[2]] // узел
//]
//
// removeFirstLevel.php
//
// Реализуйте функцию removeFirstLevel(), которая принимает на вход дерево, и возвращает новое, элементами которого
// являются дети вложенных узлов (см. пример).
//Примеры
//
//<?php
//
//use function App\removeFirstLevel\removeFirstLevel;
//
//// Второй уровень тут: 5, 3, 4

//


function removeFirstLevel(array $tree): array
{
    $res = [];
    foreach ($tree as $item) {
        if (is_array($item)) {
            array_push($res, ...$item);
        }
    }

    return $res;
}

function removeFirstLevelFunc(array $tree): array
{
    return array_reduce(
        $tree,
        static fn($acc, $item) => is_array($item) ? array_merge($acc, $item) : $acc,
        []
    );
}

$tree1 = [[5], 1, [3, 4]];
//print_r(removeFirstLevel($tree1)); // [5, 3, 4]

$tree2 = [1, 2, [3, 5], [[4, 3], 2]];
//print_r(removeFirstLevel($tree2)); // [3, 5, [4, 3], 2]

print_r(removeFirstLevelFunc($tree1));
print_r(removeFirstLevelFunc($tree2));
