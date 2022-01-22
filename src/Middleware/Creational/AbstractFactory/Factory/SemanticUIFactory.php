<?php

declare(strict_types=1);

namespace App\Middleware\Creational\AbstractFactory\Factory;

use App\Middleware\Creational\AbstractFactory\Classes\ButtonSemanticUI;
use App\Middleware\Creational\AbstractFactory\Classes\CheckBoxSemanticUI;
use App\Middleware\Creational\AbstractFactory\Interfaces\ButtonInterface;
use App\Middleware\Creational\AbstractFactory\Interfaces\CheckBoxInterface;
use App\Middleware\Creational\AbstractFactory\Interfaces\GuiFactoryInterface;

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
