<?php

declare(strict_types=1);

namespace App\Components\WeatherForecast\Cache;

use App\Components\WeatherForecast\Model\WeatherData;
use Predis\Client;
use Symfony\Component\Serializer\SerializerInterface;
use Webmozart\Assert\Assert;

class WeatherDataRedisCacheStorage
{
    public const CACHE_KEY_PREFIX = 'weather_data_';
    private const EXPIRE_SEC = 1800;

    public function __construct(
        private Client $credisClient,
        private SerializerInterface $serializer,
    ) {}

    public function getWeatherData(string $key): ?WeatherData
    {
        $json = $this->credisClient->get($this->getKey($key));

        $cachedWeatherData = null;
        if ($json !== null) {
            /** @var WeatherData $cachedWeatherData */
            $cachedWeatherData = $this->serializer->deserialize($json, WeatherData::class, 'json');
            Assert::isInstanceOf($cachedWeatherData, WeatherData::class);
        }

        return $cachedWeatherData;
    }

    public function save(WeatherData $weatherData, string $key): void
    {
        $data = $this->serializer->serialize($weatherData, 'json');
        $this->credisClient->set($this->getKey($key), $data);
        $this->credisClient->expire($key, self::EXPIRE_SEC);
        $this->credisClient->save();
    }

    private function getKey(string $key): string
    {
        return self::CACHE_KEY_PREFIX . $key;
    }
}
