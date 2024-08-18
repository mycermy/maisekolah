<?php

const BASE_PATH = __DIR__ . '/../';

require BASE_PATH . 'Core/functions.php';


spl_autoload_register(function ($class) {
    $class = str_replace('\\','/',$class);
    // dd($class . '.php');
    require base_path("{$class}.php");
});

// require base_path('Core/Database.php');
// require base_path('Core/Response.php');


require base_path('Core/router.php');
