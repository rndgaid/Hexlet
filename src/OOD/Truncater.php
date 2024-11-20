<?php

namespace Hexlet\App\IntroductionToOOP\OOD;

use InvalidArgumentException;

class Truncater
{
    private const DEFAULT_OPTIONS = [
        'separator' => '...',
        'length' => 6,
    ];

    /** @var array<string, string|int> */
    private array $options;

    /** @param array<string, string|int> $opt */
    public function __construct(array $opt = [])
    {
        if (!$this->isValidOptions($opt)) {
            throw new InvalidArgumentException('Invalid option names provided');
        }

        $this->options = array_merge(self::DEFAULT_OPTIONS, $opt);
    }

    /** @param array<string, string|int> $opt */
    public function truncate(string $text, array $opt = []): string
    {
        if (!$this->isValidOptions($opt)) {
            throw new InvalidArgumentException('Invalid option names provided');
        }

        $length = abs((int)($opt['length'] ?? $this->options['length']));
        $separator = (string)($opt['separator'] ?? $this->options['separator']);

        return mb_strlen($text) <= $length ?
            $text :
            mb_substr($text, 0, $length) . $separator;
    }

    /** @param array<string, string|int> $params */
    private function isValidOptions(array $params): bool
    {
        if (empty($params)) {
            return true;
        }

        $validKeys = array_keys(self::DEFAULT_OPTIONS);
        $paramKeys = array_keys($params);

        return empty(array_diff($paramKeys, $validKeys));
    }
}
