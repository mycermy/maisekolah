<?php

// return [
//     '/' => 'home.php',
//     '/team' => 'team.php',

//     '/projects' => 'projects/index.php',
//     '/project' => 'projects/show.php',
//     '/project/create' => 'projects/create.php',

//     '/calendar' => 'calendar.php',
//     '/reports' => 'reports.php',
// ];

// Basic routes
$router->get('/', 'home.php');
$router->get('/team', 'team.php');
$router->get('/calendar', 'calendar.php');
$router->get('/reports', 'reports.php');


$router->get('/projects', 'projects/index.php')->only('auth');

$router->get('/project', 'projects/show.php')->only('auth');
$router->delete('/project', 'projects/destroy.php');

$router->get('/project/create', 'projects/create.php')->only('auth');
$router->post('/project/create', 'projects/create.php');

$router->get('/project/edit', 'projects/edit.php')->only('auth');
$router->patch('/project/edit', 'projects/edit.php');

$router->get('/login', 'auth/signin.php')->only('guest');
$router->group('/auth', function ($router) {
    $router->post('/login', 'auth/signin.php');
    $router->delete('/logout', 'auth/signout.php');
});

// $router->get('/account/register', 'auth/signup.php')->only('guest');
// $router->post('/account/register', 'auth/store.php');

// $router->get('/account/recover', 'auth/recover.php')->only('guest');

// Account routes
$router->group('/account', function ($router) {
    $router->get('/register', 'auth/signup.php')->only('guest');
    $router->post('/register', 'auth/store.php');
    $router->get('/recover', 'auth/recover.php')->only('guest');
});
