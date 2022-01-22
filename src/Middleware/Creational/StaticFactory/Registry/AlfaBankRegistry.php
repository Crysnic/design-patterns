<?php

declare(strict_types=1);

namespace App\Middleware\Creational\StaticFactory\Registry;

use App\Middleware\Creational\StaticFactory\RegistryInterface;

class AlfaBankRegistry implements RegistryInterface
{
    public function sendToProvider(): string
    {
        return (new \ReflectionClass($this))->getShortName().' not sent :(';
    }
}
