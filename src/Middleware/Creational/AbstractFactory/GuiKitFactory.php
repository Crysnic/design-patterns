<?php

declare(strict_types=1);

namespace App\Middleware\Creational\AbstractFactory;

use App\Middleware\Creational\AbstractFactory\Factory\BootstrapFactory;
use App\Middleware\Creational\AbstractFactory\Factory\SemanticUIFactory;
use App\Middleware\Creational\AbstractFactory\Interfaces\GuiFactoryInterface;

class GuiKitFactory
{
    /**
     * @param string $type
     * @return GuiFactoryInterface
     * @throws \Exception
     */
    public function getFactory(string $type): GuiFactoryInterface
    {
        switch ($type) {
            case 'bootstrap':
                $factory = new BootstrapFactory();
                break;
            case 'semantic-ui':
                $factory = new SemanticUIFactory();
                break;
            default:
                throw new \Exception('Неизвестный тип фабрики '.$type);
        }

        return $factory;
    }

    /**
     * @return string[]
     */
    public static function getDescription(): array
    {
        return [
            'шаблон проектирования, который позволяет создавать семейства связанных объектов,
            не привязываясь к конкретным классам создаваемых объектов.'
        ];
    }

    /**
     * @return string
     */
    public static function getUrl(): string
    {
        return 'https://refactoring.guru/ru/design-patterns/abstract-factory';
    }
}
