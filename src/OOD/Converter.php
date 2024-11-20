<?php

//namespace Hexlet\App\IntroductionToOOP\OOD;

function toStd(array $data): stdClass
{
    $obj = new stdClass();
    array_walk($data, static fn($prop, $value)  => $obj->$prop = $value);

    return $obj;
}

$arr = [
    'key' => 'value',
    'key2' => 'value2',
];

print_r(toStd($arr));

