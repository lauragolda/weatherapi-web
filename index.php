<?php

use App\Controller\WeatherController;

$dispatcher = FastRoute\simpleDispatcher(function (FastRoute\RouteCollector $route) {

    $route->addRoute('GET', '/weather?city=', WeatherController::class, 'weather');
    $route->addRoute('GET', '/weather?city=', WeatherController::class, 'location');
    // METHOD + URL
});

// Fetch method and URI from somewhere
$httpMethod = $_SERVER['REQUEST_METHOD'];
$uri = $_SERVER['REQUEST_URI'];

// Strip query string (?foo=bar) and decode URI
if (false !== $pos = strpos($uri, '?')) {
    $uri = substr($uri, 0, $pos);
}
$uri = rawurldecode($uri);

$routeInfo = $dispatcher->dispatch($httpMethod, $uri);
switch ($routeInfo[0]) {
    case FastRoute\Dispatcher::NOT_FOUND:
        // ... 404 Not Found
        break;
    case FastRoute\Dispatcher::METHOD_NOT_ALLOWED:
        $allowedMethods = $routeInfo[1];
        // ... 405 Method Not Allowed
        break;
    case FastRoute\Dispatcher::FOUND:
        $handler = $routeInfo[1];
        $vars = $routeInfo[2];

        [$controllers, $methods] = $handler;

        $response = (new $controllers)->{$methods}();
        var_dump($response);

        break;
}
