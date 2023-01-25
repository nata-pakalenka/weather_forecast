<?php

declare(strict_types=1);

namespace App\Components\WeatherForecast\Provider\OpenWeather\Model;

use App\Components\WeatherForecast\Model\RestApiClient\QueryParametersInterface;

class QueryParameters implements QueryParametersInterface
{
    public function __construct(
        private float $lat,
        private float $lon,
        private string $exclude,
        private string $units,
    ){}

    public function getLat(): float
    {
        return $this->lat;
    }

    public function getLon(): float
    {
        return $this->lon;
    }

    public function getExclude(): string
    {
        return $this->exclude;
    }

    public function getUnits(): string
    {
        return $this->units;
    }
}
