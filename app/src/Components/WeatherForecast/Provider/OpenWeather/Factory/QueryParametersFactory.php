<?php

declare(strict_types=1);

namespace App\Components\WeatherForecast\Provider\OpenWeather\Factory;

use App\Components\WeatherForecast\Factory\AbstractQueryParametersFactory;
use App\Components\WeatherForecast\Model\GeoLocation;
use App\Components\WeatherForecast\Model\RestApiClient\QueryParametersInterface;
use App\Components\WeatherForecast\Provider\OpenWeather\Enum\Exclude;
use App\Components\WeatherForecast\Provider\OpenWeather\Enum\Units;
use App\Components\WeatherForecast\Provider\OpenWeather\Model\QueryParameters;

class QueryParametersFactory extends AbstractQueryParametersFactory
{
    public function create(GeoLocation $location): QueryParametersInterface
    {
        return new QueryParameters(
            $location->getCoordinates()->getLatitude(),
            $location->getCoordinates()->getLongitude(),
            sprintf('%s,%s,%s', Exclude::DAILY->value, Exclude::HOURLY->value, Exclude::MINUTELY->value),
            Units::METRIC->value,
        );
    }
}
