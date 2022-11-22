<?php declare(strict_types = 1);

namespace App;

class API
{
    private const API_URL = "https://api.openweathermap.org/";
    private string $apiKey;

    public function __construct(string $apiKey)
    {
        $this->apiKey = $apiKey;
    }

    public function getWeather(string $locationName): Weather{

        $location = $this->getLocation($locationName);
        $locationRequest = file_get_contents(self::API_URL . "/data/2.5/weather?lat={$location->getLatitude()}&lon={$location->getLongitude()}&appid={$this->apiKey}&units=metric");
        $data = json_decode($locationRequest);


        $temperature = $data ["main"]["temp"] ?? 0;
        $temperatureFeels= $data['main']['feels_like'] ?? 0;

        return new Weather($location->getName(), $temperature, $temperatureFeels);

    }

    private function getLocation(string $locationName) : Location {
        $locationRequest = file_get_contents(self::API_URL . "/geo/1.0/direct?q={$locationName}&limit=1&appid={$this->apiKey}");
        $data = json_decode($locationRequest);

        $latitude = $data[0]["lat"] ?? 0;
        $longitude = $data[0]["lon"] ?? 0;

        return new Location($locationName, $latitude, $longitude);
    }

}