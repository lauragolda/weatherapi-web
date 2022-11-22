<?php declare(strict_types = 1);

namespace App;

class Weather
{
    private string $locationName;
    private float $temperature;
    private float $feelsLike;

    public function __construct(string $locationName, float $temperature, float $feelsLike)
    {
        $this->locationName = $locationName;
        $this->temperature = $temperature;
        $this->feelsLike = $feelsLike;
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
}