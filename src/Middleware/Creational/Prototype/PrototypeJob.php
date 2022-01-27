<?php

declare(strict_types=1);

namespace App\Middleware\Creational\Prototype;

use DateTime;

class PrototypeJob
{
    public function run(): Client
    {
        $client = new Client(1, 'Вася Пупкин');

        $order = new Order(
            1,
            'Вода 1л.',
            DateTime::createFromFormat('Y-m-d', '2029-12-31')
        );
        $client->addOrder($order);

        $orderCopy = clone $order;
        $orderCopy->getDeliveredAt()->modify('+1 day');

        return $client;
    }

    public static function getUrl(): string
    {
        return 'https://refactoring.guru/ru/design-patterns/prototype';
    }

    /**
     * @return string[]
     */
    public static function getDescription(): array
    {
        return [
            'это порождающий паттерн проектирования, который позволяет копировать объекты,
            не вдаваясь в подробности их реализации.'
        ];
    }
}
