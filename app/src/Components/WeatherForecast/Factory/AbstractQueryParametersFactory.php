<?php

declare(strict_types=1);

namespace App\Components\WeatherForecast\Factory;

use App\Components\WeatherForecast\Model\GeoLocation;
use App\Components\WeatherForecast\Model\RestApiClient\QueryParametersInterface;

abstract class AbstractQueryParametersFactory
{
    abstract public function create(GeoLocation $location): QueryParametersInterface;
}
