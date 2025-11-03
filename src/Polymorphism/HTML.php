<?php

declare(strict_types=1);

namespace Hexlet\App\Polymorphism;

$tags = [
    ['name' => 'img', 'src' => 'site.io/assets/logo.png'],
    ['name' => 'div'],
    ['name' => 'link', 'href' => 'site.io/assets/style.css'],
    ['name' => 'a', 'href' => 'site.io/index.php'],
];


/**
 * @param string[][] $tags
 * @return string[]
 */
function getLinks(array $tags): array
{

    $linksByTags = [
        'img' => 'src',
        'a' => 'href',
        'link' => 'href'
    ];

    $links = [];

    foreach ($tags as $tag) {
        $tagName = $tag['name'];

        if (array_key_exists($tagName, $linksByTags)) {
            $link = $linksByTags[$tagName];
            $links[] = $tag[$link];
        }
    }

    return $links;
}

$links = getLinks($tags);
print_r($links);
