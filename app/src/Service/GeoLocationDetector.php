<?php

declare(strict_types=1);

namespace App\Service;

use App\Components\Geocoding\QueryParameters;
use App\Components\Geocoding\RestApiClient;
use App\Entity\GeoLocation;
use App\Repository\GeoLocationRepository;

class GeoLocationDetector
{
    public function __construct(
        private GeoLocationRepository $repository,
        private RestApiClient $client
    ){}

    public function detect(string $city, string $countryCode): GeoLocation
    {
        $geoLocation = $this->repository->findOneBy(['city' => $city, 'country_code' => $countryCode]);

        if ($geoLocation === null) {
            $queryParameters = new QueryParameters($city, $countryCode);
            $response = $this->client->sendRequest($queryParameters);

            $geoLocation = new GeoLocation();
            $geoLocation->setCity($city);
            $geoLocation->setCountryCode($countryCode);
            $geoLocation->setLatitude($response->getLat());
            $geoLocation->setLongitude($response->getLng());

            $this->repository->save($geoLocation, true);
        }

        return $geoLocation;
    }
}
