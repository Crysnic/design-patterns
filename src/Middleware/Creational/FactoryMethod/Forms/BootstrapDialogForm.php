<?php

declare(strict_types=1);

namespace App\Middleware\Creational\FactoryMethod\Forms;

use App\Middleware\Creational\AbstractFactory\Factory\BootstrapFactory;
use App\Middleware\Creational\AbstractFactory\Interfaces\GuiFactoryInterface;

class BootstrapDialogForm extends AbstractForm
{
    public function createGuiKit(): GuiFactoryInterface
    {
        return new BootstrapFactory();
    }
}
