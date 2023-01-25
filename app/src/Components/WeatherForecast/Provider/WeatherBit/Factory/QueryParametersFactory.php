<?php

declare(strict_types=1);

namespace App\Components\WeatherForecast\Provider\WeatherBit\Factory;

use App\Components\WeatherForecast\Factory\AbstractQueryParametersFactory;
use App\Components\WeatherForecast\Model\GeoLocation;
use App\Components\WeatherForecast\Model\RestApiClient\QueryParametersInterface;
use App\Components\WeatherForecast\Provider\WeatherBit\Enum\Units;
use App\Components\WeatherForecast\Provider\WeatherBit\Model\QueryParameters;

class QueryParametersFactory extends AbstractQueryParametersFactory
{
    public function create(GeoLocation $location): QueryParametersInterface
    {
        return new QueryParameters(
            $location->getCoordinates()->getLatitude(),
            $location->getCoordinates()->getLongitude(),
            Units::METRIC->value
        );
    }
}
