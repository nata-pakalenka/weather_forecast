<?php

declare(strict_types=1);

namespace App\Components\WeatherForecast\Provider\OpenWeather\Enum;

enum Exclude: string
{
    case CURRENT = 'current';
    case MINUTELY = 'minutely';
    case HOURLY = 'hourly';
    case DAILY = 'daily';
    case ALERTS = 'alerts';
}
