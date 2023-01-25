<?php

declare(strict_types=1);

namespace App\Components\WeatherForecast\Provider\WeatherBit\Enum;

enum Units: string
{
    case METRIC = 'M';
    case SCIENTIFIC = 'S';
    case FAHRENHEIT = 'I';
}
