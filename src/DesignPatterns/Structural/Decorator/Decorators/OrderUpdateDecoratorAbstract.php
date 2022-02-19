<?php

declare(strict_types=1);

namespace App\DesignPatterns\Structural\Decorator\Decorators;

use App\DesignPatterns\Structural\Decorator\Interfaces\OrderUpdateInterface;
use App\DesignPatterns\Structural\Decorator\Model\Order;
use Psr\Log\LoggerInterface;

abstract class OrderUpdateDecoratorAbstract implements OrderUpdateInterface
{
    protected OrderUpdateInterface $orderUpdate;

    protected LoggerInterface $logger;

    /**
     * @param OrderUpdateInterface $orderUpdate
     */
    public function __construct(OrderUpdateInterface $orderUpdate, LoggerInterface $logger)
    {
        $this->orderUpdate = $orderUpdate;
        $this->logger = $logger;
    }

    public function run(Order $order, array $data): Order
    {
        $this->actionBefore();

        $this->actionMain($order, $data);

        $this->actionAfter();

        return $order;
    }

    protected function actionBefore()
    {

    }

    protected function actionMain(Order $order, array $data): Order
    {
        return $this->orderUpdate->run($order, $data);
    }

    protected function actionAfter()
    {

    }
}
