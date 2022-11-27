<?php

require_once "vendor/autoload.php";

use App\Model\ApiClient;

$apiKey = ' ';

$chosenLocation = $_GET["city"] ?? "Riga";

$api = new ApiClient($apiKey);

$weatherInRiga = $api->getWeather("Riga");


$weather = $api->getWeather($chosenLocation);

?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="style.css"/>
    <title>Weather</title>
</head>
<body>
<header>
    <nav class = "options">
        <img class = "img" src="../logo.png" alt="logo" width="100" height="100">
        <a href="/" class = option_item>Home</a>
        <a href="/?city=Riga" class = "option_item">Riga</a>
        <a href="/?city=Tallinn" class = "option_item">Tallinn</a>
        <a href="/?city=Vilnius" class = "option_item">Vilnius</a>
    </nav>
</header>
<section class ="intro">
    <div>
        <div> <h1 class = "headline"> Find out the weather in different locations!</h1></div>
        <form action ="index.php" , method="get">
            <label class="entry">Enter the city: </label><input type ="text" placeholder="Search" name="city" required>
            <button type="submit">Find!</button>
        </form>
    </div>
<div>
    <h2 class="headline_second">Here is the weather!</h2>
    <p class = "output">
        <?php echo "The temperature in {$weather->getLocationName()} is {$weather->getTemperature()}°C (feels like {$weather->getFeelsLike()})°C." ?><br>
        <?php echo "The humidity is {$weather->getHumidity()} %, wind speed is {$weather->getWindSpeed()} m/s." ?>
    </p>
</div>
</section>
</body>
</html>


