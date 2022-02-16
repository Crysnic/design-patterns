<?php

declare(strict_types=1);

namespace App\DesignPatterns\Structural\Adapter\Library;

class DistanceCalculator
{
    /**
     * Возвращает длину между двумя точками в милях
     *
     * @param float $latitude1
     * @param float $longitude1
     * @param float $latitude2
     * @param float $longitude2
     * @return float
     */
    public function distanceBetweenPoints(
        float $latitude1,
        float $longitude1,
        float $latitude2,
        float $longitude2
    ): float
    {
        $theta = $longitude1 - $longitude2;
        $miles = (sin(deg2rad($latitude1)) * sin(deg2rad($latitude2)))
            + (cos(deg2rad($latitude1)) * cos(deg2rad($latitude2)) * cos(deg2rad($theta)));
        $miles = acos($miles);
        $miles = rad2deg($miles);

        return $miles * 60 * 1.1515;
    }
}
