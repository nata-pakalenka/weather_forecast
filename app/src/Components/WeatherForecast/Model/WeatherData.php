<?php

declare(strict_types=1);

namespace App\Components\WeatherForecast\Model;

class WeatherData
{
    public function __construct(
        private GeoLocation $location,
        private ?float $temperature = null,
        private ?float $pressure = null,
        private ?int $humidity = null,
        private ?float $windSpeed = null,
        private ?int $windDirection = null,
    ) {}

    public function getLocation(): GeoLocation
    {
        return $this->location;
    }

    public function getTemperature(): ?float
    {
        return $this->temperature;
    }

    public function setTemperature(?float $temperature): void
    {
        $this->temperature = $temperature;
    }

    public function getPressure(): ?float
    {
        return $this->pressure;
    }

    public function setPressure(?float $pressure): void
    {
        $this->pressure = $pressure;
    }

    public function getHumidity(): ?int
    {
        return $this->humidity;
    }

    public function setHumidity(?int $humidity): void
    {
        $this->humidity = $humidity;
    }

    public function getWindSpeed(): ?float
    {
        return $this->windSpeed;
    }

    public function setWindSpeed(?float $windSpeed): void
    {
        $this->windSpeed = $windSpeed;
    }

    public function getWindDirection(): ?int
    {
        return $this->windDirection;
    }

    public function setWindDirection(?int $windDirection): void
    {
        $this->windDirection = $windDirection;
    }
}
