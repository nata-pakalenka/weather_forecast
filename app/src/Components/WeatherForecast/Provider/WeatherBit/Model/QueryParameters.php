<?php

declare(strict_types=1);

namespace App\Components\WeatherForecast\Provider\WeatherBit\Model;

use App\Components\WeatherForecast\Model\RestApiClient\QueryParametersInterface;

class QueryParameters implements QueryParametersInterface
{
    public function __construct(
        private float $lat,
        private float $lon,
        private string $units
    ){}

    public function getLat(): float
    {
        return $this->lat;
    }

    public function getLon(): float
    {
        return $this->lon;
    }

    public function getUnits(): string
    {
        return $this->units;
    }
}
