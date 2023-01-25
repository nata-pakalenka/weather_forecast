<?php

declare(strict_types=1);

namespace App\Components\WeatherForecast\Model\RestApiClient;

class Config
{
    public function __construct(
        private string $code,
        private QueryParametersInterface $queryParameters,
        private string $responseClass,
    ){}

    public function getCode(): string
    {
        return $this->code;
    }

    public function getQueryParameters(): QueryParametersInterface
    {
        return $this->queryParameters;
    }

    public function getResponseClass(): string
    {
        return $this->responseClass;
    }
}
