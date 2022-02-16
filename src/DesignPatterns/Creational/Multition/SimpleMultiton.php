<?php

declare(strict_types=1);

namespace App\DesignPatterns\Creational\Multition;

class SimpleMultiton implements MultitonInterface
{
    use MultitonTrait;

    private string $test = '';

    /**
     * @return string
     */
    public function getTest(): string
    {
        return $this->test;
    }

    /**
     * @param string $test
     * @return SimpleMultiton
     */
    public function setTest(string $test): self
    {
        $this->test = $test;

        return $this;
    }

    public static function getDescription(): array
    {
        return [
            'порождающий шаблон проектирования, который обобщает шаблон "Одиночка".
            В то время, как "Одиночка" разрешает создание лишь одного экземпляра класса, мультитон позволяет
            создавать несколько экземпляров, которые управляются через ассоциативный массив.',
            'Создаётся лишь один экземпляр для каждого из ключей ассоциативного массива, что позволяет контролировать уникальность объекта по какому-либо признаку.'
        ];
    }

    public static function getUrl(): string
    {
        return 'https://ru.wikipedia.org/wiki/%D0%9C%D1%83%D0%BB%D1%8C%D1%82%D0%B8%D1%82%D0%BE%D0%BD_(%D1%88%D0%B0%D0%B1%D0%BB%D0%BE%D0%BD_%D0%BF%D1%80%D0%BE%D0%B5%D0%BA%D1%82%D0%B8%D1%80%D0%BE%D0%B2%D0%B0%D0%BD%D0%B8%D1%8F)';
    }
}
