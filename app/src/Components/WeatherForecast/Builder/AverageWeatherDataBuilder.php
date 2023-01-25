<?php

declare(strict_types=1);

namespace App\Components\WeatherForecast\Builder;

use App\Components\WeatherForecast\Model\WeatherData;
use ArrayObject;

class AverageWeatherDataBuilder
{
    /**
     * @param ArrayObject<int, WeatherData> $weatherDataItems
     * @return WeatherData
     */
    public function build(ArrayObject $weatherDataItems): WeatherData
    {
        $count = $weatherDataItems->count();

        $iterator = $weatherDataItems->getIterator();
        /** @var WeatherData $weatherData */
        $weatherData = $iterator->current();
        $iterator->next();

        $tempSum = $weatherData->getTemperature();
        while ($iterator->valid()) {
            $item = $iterator->current();
            $tempSum += $item->getTemperature();

            $iterator->next();
        }

        $weatherData->setTemperature($tempSum / $count);

        return $weatherData;
    }
}
