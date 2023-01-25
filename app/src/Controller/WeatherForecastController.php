<?php

declare(strict_types=1);

namespace App\Controller;

use App\Components\WeatherForecast\Model\Coordinates;
use App\Components\WeatherForecast\Model\GeoLocation;
use App\Form\FormData;
use App\Form\LocationFormType;
use App\Service\GeoLocationDetector;
use App\Service\WeatherForecastService;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class WeatherForecastController extends AbstractController
{
    public function __construct(
        private GeoLocationDetector $geoLocationDetector,
        private WeatherForecastService $weatherForecastService,
    ) {}

    #[Route('/index', name: 'app_weather_forecast')]
    public function index(Request $request): Response
    {
        $weatherData = null;
        $form = $this->createForm(LocationFormType::class);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            /** @var FormData $formData */
            $formData = $form->getData();
            $detectedGeoLocation = $this->geoLocationDetector->detect($formData->getCity(), $formData->getCountry());

            //todo remove from here
            $location = new GeoLocation(
                $detectedGeoLocation->getCity(),
                $detectedGeoLocation->getCountryCode(),
                new Coordinates(latitude: $detectedGeoLocation->getLatitude(), longitude: $detectedGeoLocation->getLongitude())
            );
            $weatherData = $this->weatherForecastService->getWeatherData($location);
        }

        return $this->render('weather_forecast/index.html.twig', [
            'form' => $form,
            'weatherData' => $weatherData,
        ]);
    }
}
