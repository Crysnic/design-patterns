<?php

declare(strict_types=1);

namespace App\DesignPatterns\Creational\FactoryMethod\Forms;

use App\DesignPatterns\Creational\AbstractFactory\Factory\BootstrapFactory;
use App\DesignPatterns\Creational\AbstractFactory\Interfaces\GuiFactoryInterface;

class BootstrapDialogForm extends AbstractForm
{
    public function createGuiKit(): GuiFactoryInterface
    {
        return new BootstrapFactory();
    }
}
