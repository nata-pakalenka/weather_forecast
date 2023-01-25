<?php

declare(strict_types=1);

namespace App\Components\WeatherForecast\Http;

use App\Components\WeatherForecast\Model\RestApiClient\Config;
use App\Components\WeatherForecast\Model\RestApiClient\ResponseInterface;

interface Client
{
    public function sendRequest(Config $config): ?ResponseInterface;
}
