<?php

declare(strict_types=1);

namespace App\Service;

use App\Components\WeatherForecast\Cache\WeatherDataRedisCacheStorage;
use App\Components\WeatherForecast\Model\GeoLocation;
use App\Components\WeatherForecast\Model\WeatherData;
use App\Components\WeatherForecast\Provider\WeatherForecastProcessorProvider;

class WeatherForecastService
{
    public function __construct(
        private WeatherForecastProcessorProvider $processorProvider,
        private WeatherDataRedisCacheStorage $storage,
    ){}

    public function getWeatherData(GeoLocation $location): WeatherData
    {
        $key = (string) $location->getCoordinates();
        $weatherData = $this->storage->getWeatherData($key);

        if ($weatherData === null) {
            $weatherData = $this->processorProvider->process($location);
            $this->storage->save($weatherData, $key);
        }

        return $weatherData;
    }
}
