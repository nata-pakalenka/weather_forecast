<?php

declare(strict_types=1);

namespace App\Components\Geocoding;

use App\Components\Geocoding\Response as GeocodingResponse;
use GuzzleHttp\Psr7\Request;
use Http\Client\HttpClient;
use Psr\Log\LoggerInterface;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Serializer\Normalizer\UnwrappingDenormalizer;
use Symfony\Component\Serializer\SerializerInterface;

class RestApiClient
{
    public function __construct(
        public HttpClient $client,
        private SerializerInterface $serializer,
        private LoggerInterface $logger,
    ) {}

    public function sendRequest(QueryParameters $queryParameters): GeocodingResponse
    {
        $weatherResponseData = null;

        try {
            $parameters = $this->serializer->normalize($queryParameters);

            $this->logger->debug('Start sending request', [self::class]);
            $request = new Request('GET', '/json?' . http_build_query($parameters));
            $response = $this->client->sendRequest($request);
            $this->logger->debug('Finnish sending request', [self::class]);

            $content = $response->getBody()->getContents();
            if ($response->getStatusCode() !== Response::HTTP_OK) {
                throw new \LogicException('Status code ' . $response->getStatusCode());
            }

            //todo get city/country form response
            $weatherResponseData = $this->serializer->deserialize(
                $content,
                GeocodingResponse::class,
                'json',
                [UnwrappingDenormalizer::UNWRAP_PATH => '[results][0][geometry][location]']
            );
        } catch (\Throwable $exception) {
            $this->logger->error($exception->getMessage(), [self::class]);
        }

        return $weatherResponseData;
    }
}
