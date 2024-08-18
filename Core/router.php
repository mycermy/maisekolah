<?php

$routes = require base_path('routes.php');

function routeToController($uri, $routes) {
    if (array_key_exists($uri, $routes)) {
        require base_path($routes[$uri]);
    } else {
        abort();
    }
}

function abort($code = 404) {
    http_response_code($code);
    
    view ("{$code}.view.php");
    
    die();
}


$uri = parse_url($_SERVER['REQUEST_URI'])['path'];

// dd($uri);

routeToController($uri, $routes);