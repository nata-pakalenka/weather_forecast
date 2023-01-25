<?php

declare(strict_types=1);

namespace App\Components\WeatherForecast\Provider\OpenWeather\Model;

use App\Components\WeatherForecast\Model\RestApiClient\ResponseInterface;

class Response implements ResponseInterface
{
    private int $timezone;
    private Main $main;
    private Wind $wind;

    public function getTimezone(): int
    {
        return $this->timezone;
    }

    public function setTimezone(int $timezone): void
    {
        $this->timezone = $timezone;
    }

    public function getMain(): Main
    {
        return $this->main;
    }

    public function setMain(Main $main): void
    {
        $this->main = $main;
    }

    public function getWind(): Wind
    {
        return $this->wind;
    }

    public function setWind(Wind $wind): void
    {
        $this->wind = $wind;
    }
}
