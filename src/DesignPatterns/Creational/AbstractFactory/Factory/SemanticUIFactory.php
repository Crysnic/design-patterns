<?php

declare(strict_types=1);

namespace App\DesignPatterns\Creational\AbstractFactory\Factory;

use App\DesignPatterns\Creational\AbstractFactory\Classes\ButtonSemanticUI;
use App\DesignPatterns\Creational\AbstractFactory\Classes\CheckBoxSemanticUI;
use App\DesignPatterns\Creational\AbstractFactory\Interfaces\ButtonInterface;
use App\DesignPatterns\Creational\AbstractFactory\Interfaces\CheckBoxInterface;
use App\DesignPatterns\Creational\AbstractFactory\Interfaces\GuiFactoryInterface;

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
