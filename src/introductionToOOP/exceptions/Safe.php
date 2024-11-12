<?php

namespace Hexlet\App\IntroductionToOOP\exceptions;

use Exception;

/**
 * @throws Exception
 */
function my_json_decode(string $json, bool $convertToArr = false): mixed
{
    $decode = json_decode($json, $convertToArr);

    if (json_last_error() !== JSON_ERROR_NONE) {
        throw new Exception(json_last_error_msg());
    }

    return $decode;
}

//$json = '{"a"1,"b":2,"c":3,"d":4,"e":5}';
//var_dump(my_json_decode($json, true));
//    $decode = json_decode($json, $convertToArr, 512, JSON_THROW_ON_ERROR);
