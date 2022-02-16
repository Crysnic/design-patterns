<?php

declare(strict_types=1);

namespace App\DesignPatterns\Creational\AbstractFactory\Factory;

use App\DesignPatterns\Creational\AbstractFactory\Classes\ButtonBootstrap;
use App\DesignPatterns\Creational\AbstractFactory\Classes\CheckBoxBootstrap;
use App\DesignPatterns\Creational\AbstractFactory\Interfaces\ButtonInterface;
use App\DesignPatterns\Creational\AbstractFactory\Interfaces\CheckBoxInterface;
use App\DesignPatterns\Creational\AbstractFactory\Interfaces\GuiFactoryInterface;

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
