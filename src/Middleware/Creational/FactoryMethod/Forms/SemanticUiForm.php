<?php

declare(strict_types=1);

namespace App\Middleware\Creational\FactoryMethod\Forms;

use App\Middleware\Creational\AbstractFactory\Factory\SemanticUIFactory;
use App\Middleware\Creational\AbstractFactory\Interfaces\GuiFactoryInterface;

class SemanticUiForm extends AbstractForm
{
    public function createGuiKit(): GuiFactoryInterface
    {
        return new SemanticUIFactory();
    }
}
