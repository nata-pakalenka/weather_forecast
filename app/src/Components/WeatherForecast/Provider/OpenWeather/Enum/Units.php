<?php

declare(strict_types=1);

namespace App\Components\WeatherForecast\Provider\OpenWeather\Enum;

enum Units: string
{
    case STANDARD = 'standard';
    case METRIC = 'metric';
    case IMPERIAL = 'imperial';
}
