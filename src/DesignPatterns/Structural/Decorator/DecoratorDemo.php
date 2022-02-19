<?php

declare(strict_types=1);

namespace App\DesignPatterns\Structural\Decorator;

use App\DesignPatterns\Structural\Decorator\Classes\OrderUpdate;
use App\DesignPatterns\Structural\Decorator\Interfaces\OrderUpdateInterface;
use App\DesignPatterns\Structural\Decorator\Model\Order;
use App\Util\ConfigProcessorInterface;
use App\Util\Exception\LoadConfigException;
use Psr\Log\LoggerInterface;

class DecoratorDemo
{
    private LoggerInterface $logger;

    private ConfigProcessorInterface $configProcessor;

    /**
     * @param LoggerInterface $logger
     */
    public function __construct(LoggerInterface $logger, ConfigProcessorInterface $configProcessor)
    {
        $this->logger = $logger;
        $this->configProcessor = $configProcessor;
    }

    /**
     * @throws LoadConfigException
     */
    public function run(): void
    {
        $settings = $this->configProcessor
            ->loadJson(__DIR__.'/order-updates.json')
            ->getByKey('fromWeb');

        $order = new Order();
        $data = [];

        $this->createUpdater($settings)->run($order, $data);
    }

    /**
     * @param array $settings
     * @return OrderUpdateInterface
     */
    private function createUpdater(array $settings): OrderUpdateInterface
    {
        $updateOrderWorker = new OrderUpdate($this->logger);

        array_walk($settings, function ($setting) use (&$updateOrderWorker) {
            $classname = 'App\DesignPatterns\Structural\Decorator\Decorators\\'.$setting['decoratorClass'];

            $updateOrderWorker = new $classname($updateOrderWorker, $this->logger);
        });

        return $updateOrderWorker;
    }

    /**
     * @return string[]
     */
    public static function getDescription(): array
    {
        return [
            'структурный шаблон проектирования, который позволяет динамически добавлять объектам
            новую функциональность, оборачивая их в полезные «обёртки».'
        ];
    }

    public static function getLink(): string
    {
        return 'https://refactoring.guru/ru/design-patterns/decorator';
    }
}
