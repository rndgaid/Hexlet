<?php

namespace Hexlet\App\challenges\IntroductionToOOP;

use InvalidArgumentException;

class Url
{
    private ?string $scheme;

    private ?string $host;

    private ?string $query;

    public function __construct(string $url)
    {
        $url = filter_var($url, FILTER_VALIDATE_URL) ?:
            throw new InvalidArgumentException('Incorrect url');

        $parts = parse_url($url);

        $this->scheme = $parts['scheme'] ?? null;
        $this->host = $parts['host'] ?? null;
        $this->query = $parts['query'] ?? null;
    }

    public function getScheme(): ?string
    {
        return $this->scheme;
    }

    public function getHost(): ?string
    {
        return $this->host;
    }

    public function getQueryParams(): mixed
    {
        if ($this->query === null) {
            return [];
        }

        $params = [];
        parse_str($this->query, $params);

        return $params;
    }

    public function getQueryParam(string|int $key, mixed $default = null): mixed
    {
        $qParams = $this->getQueryParams();

        return $qParams[$key] ?? $default;
    }
}

//$url = new Url('https://google.com?key=value&key2=value2&15=key3');
//echo $url->getScheme() . "\n"; // https
//echo $url->getHost() . "\n"; // google.com
//var_dump($url->getQueryParams());
// [
//     'key' => 'value',
//     'key2' => 'value2'
// ];

//var_dump($url->getQueryParam('key')); // value
//// второй параметр - значение по умолчанию
//echo $url->getQueryParam('key2', 'lala'); // value2
//echo $url->getQueryParam('new', 'ehu'); // ehu
