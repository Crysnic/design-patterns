<?php

declare(strict_types=1);

namespace App\Middleware\Structural\Facade;

use App\Middleware\Structural\Facade\Classes\Order;
use App\Middleware\Structural\Facade\Subsystem\OrderSaveDates;
use App\Middleware\Structural\Facade\Subsystem\OrderSaveProducts;
use App\Middleware\Structural\Facade\Subsystem\OrderSaveUser;
use Psr\Log\LoggerInterface;

class OrderSaveFacade
{
    private LoggerInterface $logger;

    /**
     * @param LoggerInterface $logger
     */
    public function __construct(LoggerInterface $logger)
    {
        $this->logger = $logger;
    }

    public function save(array $data): void
    {
        $this->logger->debug('Получили данные: '.json_encode($data, JSON_UNESCAPED_UNICODE));
        usleep(11000);
        $order = Order::buildEmpty();

        $this->logger->debug(
            (new OrderSaveProducts())->save($order, $data)
        );
        $this->logger->debug(
            (new OrderSaveDates())->save($order, $data)
        );
        $this->logger->debug(
            (new OrderSaveUser())->save($order, $data)
        );
    }

    /**
     * @return string[]
     */
    public static function getDescription(): array
    {
        return [
            'структурный паттерн проектирования, который предоставляет простой интерфейс к
            сложной системе классов, библиотеке или фреймворку.',
            'Фасад — это простой интерфейс для работы со сложной подсистемой, содержащей множество классов.
            Фасад может иметь урезанный интерфейс, не имеющий 100% функциональности, которой можно достичь,
            используя сложную подсистему напрямую. Но он предоставляет именно те фичи,
            которые нужны клиенту, и скрывает все остальные.'
        ];
    }

    /**
     * @return string
     */
    public static function getLink(): string
    {
        return 'https://refactoring.guru/ru/design-patterns/facade';
    }
}
