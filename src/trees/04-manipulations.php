<?php

// Реализуйте функцию compressImages(), которая принимает на вход директорию, находит внутри нее картинки и "сжимает"
// их.
// Под сжиманием понимается уменьшение свойства size в метаданных в два раза.
// Функция должна вернуть обновленную директорию со сжатыми картинками и всеми остальными данными, которые были
// внутри этой директории.
//
//Картинками считаются все файлы заканчивающиеся на .jpg.

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

function getMeta(array $node): array
{
    return $node['meta'];
}

function getName(array $node): string
{
    return $node['name'];
}

function getChildren(array $node): array
{
    return $node['children'];
}

function isDirectory(array $node): bool
{
    return $node['type'] === 'directory';
}

function isFile(array $node): bool
{
    return $node['type'] === 'file';
}

function isPicture(string $fileName): bool
{
    $parts = pathinfo($fileName);
    $ext = $parts['extension'] ?? '';

    return $ext === 'jpg';
}

function compressImages(array $dir): array
{
    if (!isDirectory($dir)) {
        throw new InvalidArgumentException('Param $dir is not a directory');
    }

    $children = getChildren($dir);

    foreach ($children as $idx => $child) {
        if (isFile($child) && isPicture($child['name'])) {
            $meta = getMeta($child);
            $children[$idx]['meta']['size'] = round($meta['size'] / 2, 2);
        } elseif (isDirectory($child)) {
            $children[$idx] = compressImages($child);
        }
    }

    return [
        'name' => getName($dir),
        'meta' => getMeta($dir),
        'children' => $children,
        'type' => 'directory'
    ];
}

$tree = makedir(
    'my documents',
    [
        makefile('avatar.jpg', ['size' => 100]),
        makefile('passport.jpg', ['size' => 200]),
        makefile('family.jpg', ['size' => 150]),
        makefile('addresses', ['size' => 125]),
        makedir(
            'presentations',
            [
                makefile('cats.jpg', ['size' => 333])
            ]
        )
    ]
);

$newTree = compressImages($tree);
print_r($newTree);
