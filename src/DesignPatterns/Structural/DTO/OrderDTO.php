<?php

declare(strict_types=1);

namespace App\DesignPatterns\Structural\DTO;

class OrderDTO
{
    public int $id = 0;

    public string $name = '';

    public float $price = 0.00;

    /**
     * Данный метод слегка нарушпет DTO, но так как он слишком элементарный и работает только
     * со свойствами данного DTO, его можно помещать в данный класс
     * @return array
     */
    public function toArray(): array
    {
        $result = [];
        foreach ($this as $key => $value) {
            $result[strtoupper($key)] = $value;
        }
        return $result;
    }
}
