<?php

declare(strict_types=1);

namespace App\DesignPatterns\Creational\AbstractFactory\Classes;

use App\DesignPatterns\Creational\AbstractFactory\Interfaces\CheckBoxInterface;

class CheckBoxBootstrap implements CheckBoxInterface
{
    public function draw(): string
    {
        return (new \ReflectionClass($this))->getShortName().': drawn';
    }
}
