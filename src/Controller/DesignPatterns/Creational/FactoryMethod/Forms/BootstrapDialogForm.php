<?php

declare(strict_types=1);

namespace App\Controller\DesignPatterns\Creational\FactoryMethod\Forms;

use App\Controller\DesignPatterns\Creational\AbstractFactory\Factory\BootstrapFactory;
use App\Controller\DesignPatterns\Creational\AbstractFactory\Interfaces\GuiFactoryInterface;

class BootstrapDialogForm extends AbstractForm
{
    public function createGuiKit(): GuiFactoryInterface
    {
        return new BootstrapFactory();
    }
}
