<?php

declare(strict_types=1);

namespace App\Components\Geocoding;

class Response
{
    private float $lat;
    private float $lng;

    public function getLat(): float
    {
        return $this->lat;
    }

    public function setLat(float $lat): void
    {
        $this->lat = $lat;
    }

    public function getLng(): float
    {
        return $this->lng;
    }

    public function setLng(float $lng): void
    {
        $this->lng = $lng;
    }
}
