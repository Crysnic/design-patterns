<?php

declare(strict_types=1);

namespace App\Controller\DesignPatterns\Creational\AbstractFactory\Factory;

use App\Controller\DesignPatterns\Creational\AbstractFactory\Classes\ButtonSemanticUI;
use App\Controller\DesignPatterns\Creational\AbstractFactory\Classes\CheckBoxSemanticUI;
use App\Controller\DesignPatterns\Creational\AbstractFactory\Interfaces\ButtonInterface;
use App\Controller\DesignPatterns\Creational\AbstractFactory\Interfaces\CheckBoxInterface;
use App\Controller\DesignPatterns\Creational\AbstractFactory\Interfaces\GuiFactoryInterface;

/**
 * Абстрактная фабрика для семейства классов SemanticUI
 */
class SemanticUIFactory implements GuiFactoryInterface
{
    public function buildButton(): ButtonInterface
    {
        return new ButtonSemanticUI();
    }

    public function buildCheckBox(): CheckBoxInterface
    {
        return new CheckBoxSemanticUI();
    }
}
