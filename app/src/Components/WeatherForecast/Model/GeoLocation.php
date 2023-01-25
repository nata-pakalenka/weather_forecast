<?php

declare(strict_types=1);

namespace App\Components\WeatherForecast\Model;

class GeoLocation
{
    public function __construct(
        private string $city,
        private string $country,
        private Coordinates $coordinates,
    ) {}

    public function getCity(): string
    {
        return $this->city;
    }

    public function getCountry(): string
    {
        return $this->country;
    }

    public function getCoordinates(): Coordinates
    {
        return $this->coordinates;
    }
}
