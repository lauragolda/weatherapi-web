<?php

require_once "vendor/autoload.php";

use App\API;

$apiKey = ' ';

$chosenLocation = readline('Enter the city: ');

$api = new API($apiKey);

$weatherInRiga = $api->getWeather("Riga");


$weather = $api->getWeather($chosenLocation);

//echo "Temperature in {$weather->getLocationName()} is {$weather->getTemperature()}, feels like {$weather->getFeelsLike()}" . PHP_EOL;
?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Weather</title>
</head>
<body>
<h1><?= "🌦Find out the weather in any location." ?></h1>
<h2><a href="/">Home</a>
    <a href="/?city=Riga">Riga</a>
    <a href="/?city=Tallinn">Tallinn</a>
    <a href="/?city=Vilnius">Vilnius</a></h2>
<form action="index.php" method="get">
    Enter the city <input type="text" name="city"><br>
    <input type="submit" value="Search">
    <br>
    <br>
    <?php $weather = $api->getWeather($_GET['city']); ?>
    <?php echo "Temperature in {$weather->getLocationName()} is {$weather->getTemperature()}°C (feels like {$weather->getFeelsLike()}°C)"; ?>
    <br>
</body>
</html>
