<?php

declare(strict_types=1);

namespace App\Components\WeatherForecast\Provider\OpenWeather;

use App\Components\WeatherForecast\Builder\WeatherDataBuilderInterface;
use App\Components\WeatherForecast\Factory\ConfigFactory;
use App\Components\WeatherForecast\Http\Client;
use App\Components\WeatherForecast\Model\GeoLocation;
use App\Components\WeatherForecast\Model\WeatherData;
use App\Components\WeatherForecast\Provider\OpenWeather\Model\Response;
use App\Components\WeatherForecast\Provider\WeatherForecastProcessorInterface;

class OpenWeatherProcessor implements WeatherForecastProcessorInterface
{
    public const CODE = 'OPEN_WEATHER';

    public function __construct(
        private Client $client,
        private ConfigFactory $configFactory,
        private WeatherDataBuilderInterface $weatherDataBuilder,
    ) {}

    public function process(GeoLocation $location): ?WeatherData
    {
        $weatherData = null;
        $config = $this->configFactory->create($location, self::CODE, Response::class);

        $weatherResponseData = $this->client->sendRequest($config);
        if ($weatherResponseData !== null) {
            $weatherData = $this->weatherDataBuilder->build($weatherResponseData, $location);
        }

        return $weatherData;
    }
}
