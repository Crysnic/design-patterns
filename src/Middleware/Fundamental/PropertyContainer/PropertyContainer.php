<?php

declare(strict_types=1);

namespace App\Middleware\Fundamental\PropertyContainer;

/**
 * Шаблон: Контейнер свойств
 * url https://ru.wikipedia.org/wiki/%D0%9A%D0%BE%D0%BD%D1%82%D0%B5%D0%B9%D0%BD%D0%B5%D1%80_%D1%81%D0%B2%D0%BE%D0%B9%D1%81%D1%82%D0%B2_(%D1%88%D0%B0%D0%B1%D0%BB%D0%BE%D0%BD_%D0%BF%D1%80%D0%BE%D0%B5%D0%BA%D1%82%D0%B8%D1%80%D0%BE%D0%B2%D0%B0%D0%BD%D0%B8%D1%8F)
 */
class PropertyContainer implements PropertyContainerInterface
{
    private array $propertyContainer = [];

    /**
     * @param string $propertyName
     * @param $value
     * @return void
     * @throws \Exception
     */
    public function addProperty(string $propertyName, $value): void
    {
        if (isset($this->propertyContainer[$propertyName])) {
            throw new \Exception("Property [{$propertyName}] already exists");
        }
        $this->propertyContainer[$propertyName] = $value;
    }

    /**
     * @param string $propertyName
     * @return void
     */
    public function deleteProperty(string $propertyName): void
    {
        unset($this->propertyContainer[$propertyName]);
    }

    /**
     * @param string $propertyName
     * @return mixed|null
     */
    public function getProperty(string $propertyName)
    {
        return $this->propertyContainer[$propertyName] ?? null;
    }

    /**
     * @param string $propertyName
     * @param $value
     * @return void
     * @throws \Exception
     */
    public function setProperty(string $propertyName, $value): void
    {
        if (!isset($this->propertyContainer[$propertyName])) {
            throw new \Exception("Property [{$propertyName}] not found");
        }
        $this->propertyContainer[$propertyName] = $value;
    }

    /**
     * Описание шаблона для отображения на странице
     *
     * @return string[]
     */
    public static function getDescription(): array
    {
        return [
            'Фундаментальный шаблон проектирования, который служит для обеспечения возможности
                    уже построеннного и развернутого приложения динамически раширять свои свойства,
                    а в общем случае, функциональность.',
            'Это достигается путем добавления допольнительных свойств непосредственно самому обьекту
                    в некоторый контейнер свойств, вместо расширения класса обьекта новыми свойствами.'
        ];
    }

    /**
     * Ссылка для отображения на странице
     *
     * @return string
     */
    public static function getLink(): string
    {
        return 'https://ru.wikipedia.org/wiki/%D0%9A%D0%BE%D0%BD%D1%82%D0%B5%D0%B9%D0%BD%D0%B5%D1%80_%D1%81%D0%B2%D0%BE%D0%B9%D1%81%D1%82%D0%B2_(%D1%88%D0%B0%D0%B1%D0%BB%D0%BE%D0%BD_%D0%BF%D1%80%D0%BE%D0%B5%D0%BA%D1%82%D0%B8%D1%80%D0%BE%D0%B2%D0%B0%D0%BD%D0%B8%D1%8F)#:~:text=%D0%9A%D0%BE%D0%BD%D1%82%D0%B5%D0%B9%D0%BD%D0%B5%D1%80%20%D1%81%D0%B2%D0%BE%D0%B9%D1%81%D1%82%D0%B2%2C%20%D0%BF%D1%80%D0%B5%D0%B4%D0%BE%D1%81%D1%82%D0%B0%D0%B2%D0%BB%D1%8F%D0%B5%D1%82%20%D0%BC%D0%B5%D1%85%D0%B0%D0%BD%D0%B8%D0%B7%D0%BC%20%D0%B4%D0%BB%D1%8F,%D0%B4%D0%BE%D0%BF%D0%BE%D0%BB%D0%BD%D0%B8%D1%82%D0%B5%D0%BB%D1%8C%D0%BD%D1%8B%D0%BC%D0%B8%20%D0%B0%D1%82%D1%80%D0%B8%D0%B1%D1%83%D1%82%D0%B0%D0%BC%D0%B8%20%D0%B2%D0%BE%20%D0%B2%D1%80%D0%B5%D0%BC%D1%8F%20%D0%B2%D1%8B%D0%BF%D0%BE%D0%BB%D0%BD%D0%B5%D0%BD%D0%B8%D1%8F.&text=%D0%9F%D0%BE%D1%81%D0%BB%D0%B5%20%D1%81%D0%BE%D0%B7%D0%B4%D0%B0%D0%BD%D0%B8%D1%8F%20%D0%BD%D0%B5%D1%81%D0%BA%D0%BE%D0%BB%D1%8C%D0%BA%D0%B8%D1%85%20%D0%BE%D0%B1%D1%8A%D0%B5%D0%BA%D1%82%D0%BE%D0%B2%20MovieImplementation,%D0%BD%D0%B5%D0%BA%D0%BE%D1%82%D0%BE%D1%80%D1%8B%D0%B5%20%D1%84%D0%B8%D0%BB%D1%8C%D0%BC%D1%8B%20%D0%B8%D0%BC%D0%B5%D1%8E%D1%82%20%D0%B4%D0%BE%D0%BF%D0%BE%D0%BB%D0%BD%D0%B8%D1%82%D0%B5%D0%BB%D1%8C%D0%BD%D1%8B%D0%B5%20%D0%B0%D1%82%D1%80%D0%B8%D0%B1%D1%83%D1%82%D1%8B.';
    }
}
