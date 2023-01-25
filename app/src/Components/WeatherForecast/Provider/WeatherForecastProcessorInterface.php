<?php

declare(strict_types=1);

namespace App\Components\WeatherForecast\Provider;

use App\Components\WeatherForecast\Model\GeoLocation;
use App\Components\WeatherForecast\Model\WeatherData;

interface WeatherForecastProcessorInterface
{
    public function process(GeoLocation $location): ?WeatherData;
}
