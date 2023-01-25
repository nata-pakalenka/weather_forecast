<?php

declare(strict_types=1);

namespace App\Components\WeatherForecast\Provider\OpenWeather\Model;

class Main
{
    private float $temp;
    private int $pressure;
    private int $humidity;

    public function getTemp(): float
    {
        return $this->temp;
    }

    public function setTemp(float $temp): void
    {
        $this->temp = $temp;
    }

    public function getPressure(): int
    {
        return $this->pressure;
    }

    public function setPressure(int $pressure): void
    {
        $this->pressure = $pressure;
    }

    public function getHumidity(): int
    {
        return $this->humidity;
    }

    public function setHumidity(int $humidity): void
    {
        $this->humidity = $humidity;
    }
}
