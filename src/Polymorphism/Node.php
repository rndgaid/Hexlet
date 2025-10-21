<?php

namespace Hexlet\App\Polymorphism;

class Node
{
    private int $data;
    private ?Node $next;

    public function __construct(int $data, ?Node $next = null)
    {
        $this->data = $data;
        $this->next = $next;
    }

    public function getData(): int
    {
        return $this->data;
    }

    public function getNext(): ?self
    {
        return $this->next;
    }
}
