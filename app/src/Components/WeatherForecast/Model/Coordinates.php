<?php

declare(strict_types=1);

namespace App\Components\WeatherForecast\Model;

class Coordinates
{
    public function __construct(
        private float $latitude,
        private float $longitude,
    ) {}

    public function __toString(): string
    {
        return $this->latitude . '_' . $this->longitude;
    }

    public function getLatitude(): float
    {
        return $this->latitude;
    }

    public function getLongitude(): float
    {
        return $this->longitude;
    }
}
