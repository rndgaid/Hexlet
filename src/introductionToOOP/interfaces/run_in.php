<?php

use Hexlet\App\IntroductionToOOP\interfaces\User;

require_once __DIR__ . '/../../../vendor/autoload.php';


$user1 = new User(4, 'tolya');
$user2 = new User(1, 'petya');

var_dump($user1->compareTo($user2)); // false
print_r($user1);
print_r($user2);
