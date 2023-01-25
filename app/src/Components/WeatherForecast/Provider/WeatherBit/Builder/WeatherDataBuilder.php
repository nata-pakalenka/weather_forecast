<?php

declare(strict_types=1);

namespace App\Components\WeatherForecast\Provider\WeatherBit\Builder;

use App\Components\WeatherForecast\Builder\WeatherDataBuilderInterface;
use App\Components\WeatherForecast\Model\GeoLocation;
use App\Components\WeatherForecast\Model\RestApiClient\ResponseInterface;
use App\Components\WeatherForecast\Model\WeatherData;
use App\Components\WeatherForecast\Provider\WeatherBit\Model\Response;

class WeatherDataBuilder implements WeatherDataBuilderInterface
{
    /**
     * @param Response $response
     * @return WeatherData
     */
    public function build(ResponseInterface $response, GeoLocation $location): WeatherData
    {
        $weatherData = new WeatherData($location);

        $weatherData->setTemperature($response->getTemp());
        $weatherData->setPressure($response->getPres());
        $weatherData->setHumidity($response->getRh());
        $weatherData->setWindSpeed($response->getWindSpd());
        $weatherData->setWindDirection($response->getWindDir());

        return $weatherData;
    }
}
