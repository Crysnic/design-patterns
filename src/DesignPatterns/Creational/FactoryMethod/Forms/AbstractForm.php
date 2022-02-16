<?php

declare(strict_types=1);

namespace App\DesignPatterns\Creational\FactoryMethod\Forms;

use App\DesignPatterns\Creational\AbstractFactory\Interfaces\GuiFactoryInterface;

abstract class AbstractForm
{
    /**
     * Рисуем форму
     */
    public function render(): array
    {
        $guiKit = $this->createGuiKit();
        $result[] = $guiKit->buildButton()->draw();
        $result[] = $guiKit->buildCheckBox()->draw();

        return $result;
    }

    /**
     * Получаем инструментарий для рисования обьектов формы
     */
    abstract public function createGuiKit(): GuiFactoryInterface;
}
