<?php

namespace Hexlet\App\challenges\IntroductionToOOP;

interface UrlInterface
{
    public function getScheme(): string;
    public function getHost(): string;
    public function getParam(): string;
    public function getParams(): string;
}
