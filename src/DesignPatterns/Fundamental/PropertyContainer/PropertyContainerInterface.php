<?php

declare(strict_types=1);

namespace App\DesignPatterns\Fundamental\PropertyContainer;

interface PropertyContainerInterface
{
    /**
     * @param string $propertyName
     * @param $value
     * @return void
     */
    public function addProperty(string $propertyName, $value): void;

    /**
     * @param string $propertyName
     * @return void
     */
    public function deleteProperty(string $propertyName): void;

    /**
     * @param string $propertyName
     * @return mixed|null
     */
    public function getProperty(string $propertyName);

    /**
     * @param string $propertyName
     * @param $value
     * @return void
     */
    public function setProperty(string $propertyName, $value): void;
}
