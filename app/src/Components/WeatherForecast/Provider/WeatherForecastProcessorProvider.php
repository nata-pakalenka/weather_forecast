<?php

declare(strict_types=1);

namespace App\Components\WeatherForecast\Provider;

use App\Components\WeatherForecast\Builder\AverageWeatherDataBuilder;
use App\Components\WeatherForecast\Model\GeoLocation;
use App\Components\WeatherForecast\Model\WeatherData;

class WeatherForecastProcessorProvider implements WeatherForecastProcessorInterface
{
    public function __construct(
        /** @var WeatherForecastProcessorInterface[] */
        private array $processors,
        private AverageWeatherDataBuilder $averageWeatherDataBuilder,
    ) {}

    public function process(GeoLocation $location): WeatherData
    {
        $weatherDataItems = new \ArrayObject();

        /** @var WeatherForecastProcessorInterface $processor */
        foreach ($this->processors as $processor) {
            $weatherDataItem = $processor->process($location);
            if ($weatherDataItem !== null) {
                $weatherDataItems[] = $weatherDataItem;
            }
        }

        return $this->averageWeatherDataBuilder->build($weatherDataItems);
    }
}
