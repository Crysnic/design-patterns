<?php

declare(strict_types=1);

namespace App\DesignPatterns\Structural\Decorator\Interfaces;

use App\DesignPatterns\Structural\Decorator\Model\Order;

interface OrderUpdateInterface
{
    public function run(Order $order, array $data): Order;
}
