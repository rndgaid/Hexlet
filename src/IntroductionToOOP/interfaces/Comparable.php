<?php

namespace Hexlet\App\IntroductionToOOP\interfaces;

interface Comparable
{
    public function compareTo(User $user): bool;

    public function getId(): int;
}
