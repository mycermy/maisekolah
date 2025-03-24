<?php

function dd($value)
{
    echo "<pre>";
    var_dump($value);
    echo "</pre>";

    die();
}

function urlIs($value)
{
    return $_SERVER['REQUEST_URI'] === $value;
}

function authorize($condition, $status = \Core\Response::FORBIDDEN)
{
    if (! $condition) {
        abort($status);
    }
}

function isAuthorized($owner)
{
    $currUserId = $_SESSION['user']['email'] ?? '';
    return $owner == $currUserId;
}

function isAuthenticated()
{
    return isset($_SESSION['user']);
}

function abort($code = 404)
{
    http_response_code($code);

    view("{$code}.view.php");

    die();
}

function base_path($path)
{
    return BASE_PATH . $path;
}

function view($path, $attributes = [])
{
    extract($attributes);
    require base_path('views/' . $path);
}

function redirect($path)
{
    header("Location: {$path}");
    exit();
}

function redirectDashboard()
{
    $path = '/projects';
    redirect($path);
}

function redirectLogin()
{
    $path = '/login';
    redirect($path);
}

function old($key, $default = '')
{
    return Core\Session::get('old')[$key] ?? $default;
}
