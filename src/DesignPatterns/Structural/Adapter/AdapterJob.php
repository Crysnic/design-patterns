<?php

declare(strict_types=1);

namespace App\DesignPatterns\Structural\Adapter;

use App\DesignPatterns\Structural\Adapter\Classes\CoordinatePoint;
use Psr\Log\LoggerInterface;

class AdapterJob
{
    private LoggerInterface $logger;

    private CalculateDistanceInterface $calculateDistance;

    /**
     * @param LoggerInterface $logger
     * @param CalculateDistanceInterface $calculateDistance
     */
    public function __construct(LoggerInterface $logger, CalculateDistanceInterface $calculateDistance)
    {
        $this->logger = $logger;
        $this->calculateDistance = $calculateDistance;
    }

    /**
     * @return void
     */
    public function run(): void
    {
        $point1 = new CoordinatePoint(40.770623, -73.964367);
        $point2 = new CoordinatePoint(40.758224, -73.917404);

        $meters = $this->calculateDistance->calculateDistanceBetweenCoordinates($point1, $point2);

        $this->logger->debug("Distance between {$point1} and {$point2} - {$meters} meters");
    }

    /**
     * @return string[]
     */
    public static function getDescription(): array
    {
        return [
            'структурный паттерн проектирования, который позволяет объектам с несовместимыми интерфейсами
            работать вместе. Адаптеры могут не только переводить данные из одного формата в другой,
            но и помогать объектам с разными интерфейсами работать сообща. Это работает так:',
            'Адаптер имеет интерфейс, который совместим с одним из объектов.',
            'Поэтому этот объект может свободно вызывать методы адаптера.',
            'Адаптер получает эти вызовы и перенаправляет их второму объекту,
            но уже в том формате и последовательности, которые понятны второму объекту.'
        ];
    }

    /**
     * @return string
     */
    public static function getLink(): string
    {
        return 'https://refactoring.guru/ru/design-patterns/adapter';
    }
}
