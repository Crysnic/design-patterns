<?php

declare(strict_types=1);

namespace App\DesignPatterns\Structural\Decorator\Classes;

use App\DesignPatterns\Structural\Decorator\Interfaces\OrderUpdateInterface;
use App\DesignPatterns\Structural\Decorator\Model\Order;
use App\DesignPatterns\Structural\Decorator\Traits\LoggerTrait;

class OrderUpdate implements OrderUpdateInterface
{
    use LoggerTrait;

    public function run(Order $order, array $data): Order
    {
        $this->logger->info('Base update');
        usleep(1100);

        return $order;
    }
}
