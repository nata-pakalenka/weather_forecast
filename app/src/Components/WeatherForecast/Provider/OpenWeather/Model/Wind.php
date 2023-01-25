<?php

declare(strict_types=1);

namespace App\Components\WeatherForecast\Provider\OpenWeather\Model;

class Wind
{
    private float $speed;
    private int $deg;
    private float $gust;

    public function getSpeed(): float
    {
        return $this->speed;
    }

    public function setSpeed(float $speed): void
    {
        $this->speed = $speed;
    }

    public function getDeg(): int
    {
        return $this->deg;
    }

    public function setDeg(int $deg): void
    {
        $this->deg = $deg;
    }

    public function getGust(): float
    {
        return $this->gust;
    }

    public function setGust(float $gust): void
    {
        $this->gust = $gust;
    }
}
