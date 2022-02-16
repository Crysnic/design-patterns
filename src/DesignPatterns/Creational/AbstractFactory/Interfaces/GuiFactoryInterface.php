<?php

declare(strict_types=1);

namespace App\DesignPatterns\Creational\AbstractFactory\Interfaces;

/**
 * Интерфейс абстрактной фабрики
 */
interface GuiFactoryInterface
{
    public function buildButton(): ButtonInterface;

    public function buildCheckBox(): CheckBoxInterface;
}
