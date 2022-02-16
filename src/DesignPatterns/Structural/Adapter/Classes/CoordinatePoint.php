<?php

declare(strict_types=1);

namespace App\DesignPatterns\Structural\Adapter\Classes;

class CoordinatePoint
{
    private float $latitude;

    private float $longitude;

    /**
     * @param float $latitude
     * @param float $longitude
     */
    public function __construct(float $latitude, float $longitude)
    {
        $this->latitude = $latitude;
        $this->longitude = $longitude;
    }

    /**
     * @return float
     */
    public function getLatitude(): float
    {
        return $this->latitude;
    }

    /**
     * @return float
     */
    public function getLongitude(): float
    {
        return $this->longitude;
    }

    public function __toString()
    {
        $result = new \stdClass();
        foreach ($this as $key => $value) {
            $result->$key = $value;
        }
        return json_encode($result, JSON_UNESCAPED_UNICODE);
    }
}
