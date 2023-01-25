<?php

declare(strict_types=1);

namespace App\Components\WeatherForecast\Http;

use App\Components\WeatherForecast\Model\RestApiClient\Config;
use App\Components\WeatherForecast\Model\RestApiClient\ResponseInterface;
use GuzzleHttp\Psr7\Request;
use Http\Client\HttpClient;
use Psr\Log\LoggerInterface;
use Symfony\Component\Serializer\SerializerInterface;
use Webmozart\Assert\Assert;

class RestApiClient implements Client
{
    protected static SerializerInterface $serializer;

    public function __construct(
        private readonly HttpClient $client,
        private readonly LoggerInterface $logger,
        SerializerInterface $serializer,
    ) {
        self::$serializer = $serializer;
    }

    public function sendRequest(Config $config): ?ResponseInterface
    {
        $weatherResponseData = null;

        try {
            $parameters = self::$serializer->normalize($config->getQueryParameters());
            $this->logger->debug('Start sending request to ' . $config->getCode());
            $request = new Request('GET', '/?' . http_build_query($parameters));
            $response = $this->client->sendRequest($request);
            $this->logger->debug('Finnish sending request to ' . $config->getCode());

            $content = $response->getBody()->getContents();

            $weatherResponseData = static::deserializeContent($content, $config->getResponseClass());
        } catch (\Throwable $exception) {
            $this->logger->error($exception->getMessage());
        }

        return $weatherResponseData;
    }

    protected static function deserializeContent(mixed $content, string $responseClass): ResponseInterface
    {
        $weatherResponseData = self::$serializer->deserialize(
            $content,
            $responseClass,
            'json',
        );
        Assert::isInstanceOf($weatherResponseData, ResponseInterface::class);

        return $weatherResponseData;
    }
}
