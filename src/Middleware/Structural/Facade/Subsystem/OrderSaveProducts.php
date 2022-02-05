<?php

declare(strict_types=1);

namespace App\Middleware\Structural\Facade\Subsystem;

use App\Middleware\Structural\Facade\Classes\Order;

class OrderSaveProducts
{
    public function save(Order $order, array $data): string
    {
        return static::class.': order products saved';
    }
}
