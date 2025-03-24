<?php

//playground for the code snippets

use Core\App;
use Core\Database;
use Core\Container;

$container = new Container();

// First, set the container
App::setContainer($container);

// Then you can use App::bind() anywhere in your application
App::bind('Core\Database', function () {
    $config = require base_path('config.php');
    return new Database($config['database']);
});