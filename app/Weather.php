<?php declare(strict_types = 1);

namespace App;

class Weather
{
    private string $locationName;
    private float $temperature;
    private float $feelsLike;
    private int $humidity;
    private float $windSpeed;

    public function __construct(string $locationName, float $temperature, float $feelsLike, int $humidity, float $windSpeed)
    {
        $this->locationName = $locationName;
        $this->temperature = $temperature;
        $this->feelsLike = $feelsLike;
        $this->humidity = $humidity;
        $this->windSpeed = $windSpeed;
    }

    public function getLocationName(): string
    {
        return $this->locationName;
    }

    public function getTemperature(): float{
        return $this->temperature;
    }

    public function getFeelsLike(): float
    {
        return $this->feelsLike;
    }

    public function getHumidity(): int
    {
        return $this->humidity;
    }

    public function getWindSpeed(): float
    {
        return $this->windSpeed;
    }
}