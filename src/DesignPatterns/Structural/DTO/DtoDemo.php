<?php

declare(strict_types=1);

namespace App\DesignPatterns\Structural\DTO;

class DtoDemo
{
    public function run(): object
    {
        $order = new OrderDTO();
        $order->id = 1;
        $order->name = 'Заказ воды';
        $order->price = 100.00;

        return $order;
    }

    /**
     * @return string[]
     */
    public static function getDescription(): array
    {
        return [
            'шаблон проектирования, используется для передачи данных между подсистемами приложения.',
            'Data Transfer Object, не должен содержать какого-либо поведения.'
        ];
    }

    public static function getLink(): string
    {
        return 'https://ru.wikipedia.org/wiki/DTO';
    }
}
