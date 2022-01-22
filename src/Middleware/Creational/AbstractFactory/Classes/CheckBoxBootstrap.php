<?php

declare(strict_types=1);

namespace App\Middleware\Creational\AbstractFactory\Classes;

use App\Middleware\Creational\AbstractFactory\Interfaces\CheckBoxInterface;

class CheckBoxBootstrap implements CheckBoxInterface
{
    public function draw(): string
    {
        return (new \ReflectionClass($this))->getShortName().': drawn';
    }
}
