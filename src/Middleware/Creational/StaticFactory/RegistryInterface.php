<?php

declare(strict_types=1);

namespace App\Middleware\Creational\StaticFactory;

interface RegistryInterface
{
    public function sendToProvider(): string;
}
