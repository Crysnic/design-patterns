<?php

declare(strict_types=1);

namespace App\Controller\DesignPatterns\Creational\StaticFactory\Registry;

use App\Controller\DesignPatterns\Creational\StaticFactory\RegistryInterface;

class MonoBankRegistry implements RegistryInterface
{
    public function sendToProvider(): string
    {
        return (new \ReflectionClass($this))->getShortName().' sent';
    }
}
