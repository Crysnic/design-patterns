<?php

declare(strict_types=1);

namespace App\Middleware\Structural\Adapter;

use App\Middleware\Structural\Adapter\Classes\CoordinatePoint;

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
