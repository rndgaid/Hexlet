<?php

namespace Hexlet\App\IntroductionToOOP\interfaces;

class User implements Comparable
{
    private int $id;
    private string $name;

    public function __construct(int $id, string $name)
    {
        $this->id = $id;
        $this->name = $name;
    }

    public function getId(): int
    {
        return $this->id;
    }

    public function getName(): string
    {
        return $this->name;
    }

    public function compareTo(Comparable $user): bool
    {
        return $this->getId() === $user->getId();
    }
}
