<?php

declare(strict_types=1);

namespace App\Components\WeatherForecast\Builder;

use App\Components\WeatherForecast\Model\GeoLocation;
use App\Components\WeatherForecast\Model\RestApiClient\ResponseInterface;
use App\Components\WeatherForecast\Model\WeatherData;

interface WeatherDataBuilderInterface
{
    public function build(ResponseInterface $response, GeoLocation $location): WeatherData;
}
