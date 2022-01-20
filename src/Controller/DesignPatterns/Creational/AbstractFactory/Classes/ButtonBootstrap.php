<?php

declare(strict_types=1);

namespace App\Controller\DesignPatterns\Creational\AbstractFactory\Classes;

use App\Controller\DesignPatterns\Creational\AbstractFactory\Interfaces\ButtonInterface;

class ButtonBootstrap implements ButtonInterface
{
    public function draw(): string
    {
        return (new \ReflectionClass($this))->getShortName().' drawn!';
    }
}
