<?php

declare(strict_types=1);

namespace App\Components\WeatherForecast\Factory;

use App\Components\WeatherForecast\Model\GeoLocation;
use App\Components\WeatherForecast\Model\RestApiClient\Config;

class ConfigFactory
{
    public function __construct(
        private AbstractQueryParametersFactory $queryParametersFactory,
    ) {}

    public function create(GeoLocation $location, string $code, string $responseClass): Config
    {
        $queryParameters = $this->queryParametersFactory->create($location);

        return new Config($code, $queryParameters, $responseClass);
    }
}
