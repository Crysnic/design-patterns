<?php

declare(strict_types=1);

namespace App\Middleware\Structural\Adapter;

use App\Middleware\Structural\Adapter\Classes\CoordinatePoint;
use App\Middleware\Structural\Adapter\Library\DistanceCalculator;

/**
 * Adapter https://refactoring.guru/ru/design-patterns/adapter
 */
class DistanceCalculatorAdapter implements CalculateDistanceInterface
{
    private DistanceCalculator $adaptee;

    public function __construct()
    {
        $this->adaptee = new DistanceCalculator();
    }

    /**
     * @param CoordinatePoint $point1
     * @param CoordinatePoint $point2
     * @return float
     */
    public function calculateDistanceBetweenCoordinates(CoordinatePoint $point1, CoordinatePoint $point2): float
    {
        $miles = $this->adaptee->distanceBetweenPoints(
            $point1->getLatitude(),
            $point1->getLongitude(),
            $point2->getLatitude(),
            $point2->getLongitude()
        );

        return $this->milesToMeters($miles);
    }

    /**
     * @param float $miles
     * @return float
     */
    private function milesToMeters(float $miles): float
    {
        return round($miles * 1.609344 * 1000, 6);
    }
}
