<?php

declare(strict_types=1);

namespace App\Controller\DesignPatterns\Fundamental\PropertyContainer;

/**
 * Подключаем в классе где нужно его использовать
 */
trait PropertyContainerTrait
{
    private PropertyContainerInterface $propertyContainer;

    /**
     * @return PropertyContainerInterface
     */
    public function getPropertyContainer(): PropertyContainerInterface
    {
        return $this->propertyContainer;
    }

    /**
     * @param PropertyContainerInterface $propertyContainer
     */
    public function setPropertyContainer(PropertyContainerInterface $propertyContainer): void
    {
        $this->propertyContainer = $propertyContainer;
    }
}
