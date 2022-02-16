<?php

declare(strict_types=1);

namespace App\DesignPatterns\Creational\StaticFactory;

interface RegistryInterface
{
    public function sendToProvider(): string;
}
