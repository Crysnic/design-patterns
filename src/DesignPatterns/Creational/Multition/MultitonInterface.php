<?php

declare(strict_types=1);

namespace App\DesignPatterns\Creational\Multition;

interface MultitonInterface
{
    public static function getInstance(string $name): self;
}
