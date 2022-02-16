<?php

declare(strict_types=1);

namespace App\DesignPatterns\Creational\StaticFactory\Registry;

use App\DesignPatterns\Creational\StaticFactory\RegistryInterface;

class AlfaBankRegistry implements RegistryInterface
{
    public function sendToProvider(): string
    {
        return (new \ReflectionClass($this))->getShortName().' not sent :(';
    }
}
