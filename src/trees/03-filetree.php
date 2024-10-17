<?php

// Реализуйте функцию generator(), которая создает такую файловую систему:
//
// # Обратите внимание на метаданные
//
// php-package # директория (метаданные: ['hidden' => true])
// ├── Makefile # файл
// ├── README.md # файл
// ├── dist # пустая директория
// ├── tests # директория
// │   └── test.php # файл (метаданные: ['type' => 'text/php'])
// |── src #директория
// |   └── index.php # файл (метаданные: ['type' => 'text/php'])
// ├── phpunit.xml # файл (метаданные: ['type' => 'text/xml'])
// └── assets # директория (метаданные: ['owner' => 'root', 'hidden' => false])
//     └── util # директория
//         └── cli # директория
//             └── LICENSE # файл

function makedir(string $name, array $children = [], array $dirProperties = []): array
{
    return [
        'name' => $name,
        'meta' => $dirProperties,
        'children' => $children,
        'type' => 'directory'
    ];
}

function makefile(string $name, array $fileProperties = []): array
{
    return [
        'name' => $name,
        'meta' => $fileProperties,
        'type' => 'file'
    ];
}

function generator(): array
{

    $license = makefile('LICENSE');
    $cli = makedir('cli', [$license]);
    $util = makedir('util', [$cli]);
    $assets = makedir('assets', [$util], ['owner' => 'root', 'hidden' => false]);

    $phpunit = makefile('phpunit.xml', ['type' => 'text/xml']);

    $index = makefile('index.php', ['type' => 'text/php']);
    $src = makedir('src', [$index]);

    $test = makefile('test.php', ['type' => 'text/php']);
    $tests = makedir('tests', [$test]);

    $dist = makedir('dist');
    $readme = makefile('README.md');
    $make = makefile('Makefile');

    return makedir('php-package', [$make, $readme, $dist, $tests, $src, $phpunit, $assets], ['hidden' => true]);
}

print_r(generator());
