<?php

declare(strict_types=1);

namespace App\Components\WeatherForecast\Provider\WeatherBit\Model;

use App\Components\WeatherForecast\Model\RestApiClient\ResponseInterface;

class Response implements ResponseInterface
{
    /** temperature  */
    private float $temp;
    /** Pressure  */
    private float $pres;
    /** humidity */
    private int $rh;
    /** Wind speed */
    private float $wind_spd;
    /** Wind direction */
    private int $wind_dir;
    /** Wind gust speed */
    private float $gust;

    public function getTemp(): float
    {
        return $this->temp;
    }

    public function setTemp(float $temp): void
    {
        $this->temp = $temp;
    }

    public function getPres(): float
    {
        return $this->pres;
    }

    public function setPres(float $pres): void
    {
        $this->pres = $pres;
    }

    public function getRh(): int
    {
        return $this->rh;
    }

    public function setRh(int $rh): void
    {
        $this->rh = $rh;
    }

    public function getWindSpd(): float
    {
        return $this->wind_spd;
    }

    public function setWindSpd(float $wind_spd): void
    {
        $this->wind_spd = $wind_spd;
    }

    public function getWindDir(): int
    {
        return $this->wind_dir;
    }

    public function setWindDir(int $wind_dir): void
    {
        $this->wind_dir = $wind_dir;
    }

    public function getGust(): float
    {
        return $this->gust;
    }

    public function setGust(float $gust): void
    {
        $this->gust = $gust;
    }
}
