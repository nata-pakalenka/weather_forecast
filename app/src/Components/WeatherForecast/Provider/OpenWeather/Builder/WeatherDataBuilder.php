<?php

declare(strict_types=1);

namespace App\Components\WeatherForecast\Provider\OpenWeather\Builder;

use App\Components\WeatherForecast\Builder\WeatherDataBuilderInterface;
use App\Components\WeatherForecast\Model\GeoLocation;
use App\Components\WeatherForecast\Model\RestApiClient\ResponseInterface;
use App\Components\WeatherForecast\Model\WeatherData;
use App\Components\WeatherForecast\Provider\OpenWeather\Model\Response;

class WeatherDataBuilder implements WeatherDataBuilderInterface
{
    /**
     * @param Response $response
     * @return WeatherData
     */
    public function build(ResponseInterface $response, GeoLocation $location): WeatherData
    {
        $weatherData = new WeatherData($location);

        $weatherData->setTemperature($response->getMain()->getTemp());
        $weatherData->setPressure($response->getMain()->getPressure());
        $weatherData->setHumidity($response->getMain()->getHumidity());
        $weatherData->setWindSpeed($response->getWind()->getSpeed());
        $weatherData->setWindDirection($response->getWind()->getDeg());

        return $weatherData;
    }
}
