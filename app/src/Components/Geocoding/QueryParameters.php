<?php

declare(strict_types=1);

namespace App\Components\Geocoding;

class QueryParameters
{
    public function __construct(
        private string $address,
        private string $region,
    ) {}

    public function getAddress(): string
    {
        return $this->address;
    }

    public function setAddress(string $address): void
    {
        $this->address = $address;
    }

    public function getRegion(): string
    {
        return $this->region;
    }

    public function setRegion(string $region): void
    {
        $this->region = $region;
    }
}
