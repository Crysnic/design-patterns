<?php

declare(strict_types=1);

namespace App\Middleware\Creational\AbstractFactory\Factory;

use App\Middleware\Creational\AbstractFactory\Classes\ButtonBootstrap;
use App\Middleware\Creational\AbstractFactory\Classes\CheckBoxBootstrap;
use App\Middleware\Creational\AbstractFactory\Interfaces\ButtonInterface;
use App\Middleware\Creational\AbstractFactory\Interfaces\CheckBoxInterface;
use App\Middleware\Creational\AbstractFactory\Interfaces\GuiFactoryInterface;

/**
 * Абстрактная фабрика для семейства классов Bootstrap
 */
class BootstrapFactory implements GuiFactoryInterface
{
    public function buildButton(): ButtonInterface
    {
        return new ButtonBootstrap();
    }

    public function buildCheckBox(): CheckBoxInterface
    {
        return new CheckBoxBootstrap();
    }
}
