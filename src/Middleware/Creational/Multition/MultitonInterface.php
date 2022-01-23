<?php

declare(strict_types=1);

namespace App\Middleware\Creational\Multition;

interface MultitonInterface
{
    public static function getInstance(string $name): self;
}
