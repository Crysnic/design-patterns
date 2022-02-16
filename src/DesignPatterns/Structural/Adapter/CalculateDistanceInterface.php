<?php

declare(strict_types=1);

namespace App\DesignPatterns\Structural\Adapter;

use App\DesignPatterns\Structural\Adapter\Classes\CoordinatePoint;

interface CalculateDistanceInterface
{
    /**
     * Возвращает расстояние между двумя точками в метрах
     *
     * @param CoordinatePoint $point1
     * @param CoordinatePoint $point2
     * @return float
     */
    public function calculateDistanceBetweenCoordinates(CoordinatePoint $point1, CoordinatePoint $point2): float;
}
