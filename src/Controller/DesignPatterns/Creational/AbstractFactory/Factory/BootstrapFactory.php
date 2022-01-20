<?php

declare(strict_types=1);

namespace App\Controller\DesignPatterns\Creational\AbstractFactory\Factory;

use App\Controller\DesignPatterns\Creational\AbstractFactory\Classes\ButtonBootstrap;
use App\Controller\DesignPatterns\Creational\AbstractFactory\Classes\CheckBoxBootstrap;
use App\Controller\DesignPatterns\Creational\AbstractFactory\Interfaces\ButtonInterface;
use App\Controller\DesignPatterns\Creational\AbstractFactory\Interfaces\CheckBoxInterface;
use App\Controller\DesignPatterns\Creational\AbstractFactory\Interfaces\GuiFactoryInterface;

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
