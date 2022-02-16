<?php

declare(strict_types=1);

namespace App\DesignPatterns\Structural\Facade\Subsystem;

use App\DesignPatterns\Structural\Facade\Classes\Order;

class OrderSaveProducts
{
    public function save(Order $order, array $data): string
    {
        return static::class.': order products saved';
    }
}
