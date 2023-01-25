<?php

declare(strict_types=1);

namespace App\Components\WeatherForecast\Provider\WeatherBit\Http;

use App\Components\WeatherForecast\Http\RestApiClient as BaseRestApiClient;
use App\Components\WeatherForecast\Model\RestApiClient\ResponseInterface;
use Symfony\Component\Serializer\Normalizer\UnwrappingDenormalizer;
use Webmozart\Assert\Assert;

class RestApiClient extends BaseRestApiClient
{
    protected static function deserializeContent(mixed $content, string $responseClass): ResponseInterface
    {
        $weatherResponseData = self::$serializer->deserialize(
            $content,
            $responseClass,
            'json',
            [UnwrappingDenormalizer::UNWRAP_PATH => '[data][0]']
        );
        Assert::isInstanceOf($weatherResponseData, ResponseInterface::class);

        return $weatherResponseData;
    }
}
