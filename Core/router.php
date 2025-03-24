<?php

namespace Core;

use Core\Middleware\Middleware;

class Router
{
    protected $routes = [];
    protected $prefix = '';
    protected const VALID_METHODS = ['GET', 'POST', 'PUT', 'DELETE', 'PATCH'];

    public function route($uri, $method)
    {
        // Add this to index.php after the routes are loaded but before routing
        // echo "Requested URI: " . $uri . "<br>";
        // echo "Method: " . $method . "<br>";
        // echo "Routes:<br>";
        // foreach ($this->routes as $route) {
        //     echo "- {$route['method']} {$route['uri']} -> {$route['controller']}<br>";
        // }
        // die();

        foreach ($this->routes as $route) {
            // For simple exact matching (no route parameters)
            if ($route['uri'] === $uri && $route['method'] === strtoupper($method)) {
                // Apply middleware
                Middleware::resolve($route['middleware']);
                
                // Load the controller
                return require base_path('Http/controllers/' . $route['controller']);
            }
            
            // For routes with parameters
            $pattern = $this->convertRouteToRegex($route['uri']);
            
            if (preg_match($pattern, $uri, $matches) && $route['method'] === strtoupper($method)) {
                // Remove the full match from the matches array
                array_shift($matches);
                
                // Apply middleware
                Middleware::resolve($route['middleware']);
                
                // Pass the parameters to the controller
                return $this->callController($route['controller'], $matches);
            }
        }

        $this->abort();
    }

    public function add($method, $uri, $controller)
    {
        $method = strtoupper($method);
        if (!in_array($method, self::VALID_METHODS)) {
            throw new \InvalidArgumentException("Invalid HTTP method: {$method}");
        }

        // Ensure the URI has a leading slash if it's not empty
        if (!empty($uri) && $uri[0] !== '/') {
            $uri = '/' . $uri;
        }

        // Apply the prefix to the URI
        $prefixedUri = $this->prefix . $uri;

        // echo "Adding route: {$method} {$prefixedUri} -> {$controller}<br>";

        $this->routes[] = [
            'uri' => $prefixedUri,
            'controller' => $controller,
            'method' => $method,
            'middleware' => null,
        ];

        return $this;
    }

    public function get($uri, $controller)
    {
        return $this->add('GET', $uri, $controller);
    }

    public function post($uri, $controller)
    {
        return $this->add('POST', $uri, $controller);
    }

    public function put($uri, $controller)
    {
        return $this->add('PUT', $uri, $controller);
    }

    public function delete($uri, $controller)
    {
        return $this->add('DELETE', $uri, $controller);
    }

    public function patch($uri, $controller)
    {
        return $this->add('PATCH', $uri, $controller);
    }

    public function previousUrl()
    {
        return $_SERVER['HTTP_REFERER'];
    }

    private function abort($code = 404)
    {
        http_response_code($code);
        view("{$code}.view.php");
        die();
    }

    public function only($key)
    {
        $this->routes[array_key_last($this->routes)]['middleware'] = $key;

        return $this;
    }

    public function group($prefix, $callback)
    {
        // echo "Starting group with prefix: {$prefix}<br>";
        // echo "Current prefix: {$this->prefix}<br>";

        // Ensure the prefix has a leading slash if it's not empty
        if (!empty($prefix) && $prefix[0] !== '/') {
            $prefix = '/' . $prefix;
        }

        // Store the current prefix
        $previousPrefix = $this->prefix;

        // Set the new prefix by combining the current prefix with the new one
        $this->prefix = $previousPrefix . $prefix;

        // echo "New prefix: {$this->prefix}<br>";

        // Execute the callback with $this as the router instance
        $callback($this);

        // Restore the previous prefix
        $this->prefix = $previousPrefix;

        // echo "Restored prefix: {$this->prefix}<br>";

        return $this;
    }

    public function resource($name, $controller)
    {
        $this->get("/{$name}", "{$controller}/index.php");
        $this->get("/{$name}/create", "{$controller}/create.php");
        $this->post("/{$name}", "{$controller}/store.php");
        $this->get("/{$name}/{id}", "{$controller}/show.php");
        $this->get("/{$name}/{id}/edit", "{$controller}/edit.php");
        $this->patch("/{$name}/{id}", "{$controller}/update.php");
        $this->delete("/{$name}/{id}", "{$controller}/destroy.php");

        return $this;
    }

    private function convertRouteToRegex($route)
    {
        // Escape forward slashes for the regex pattern
        $route = str_replace('/', '\/', $route);

        // Replace route parameters with regex patterns
        $route = preg_replace('/\{([^}]+)\}/', '([^\/]+)', $route);

        return "/^" . $route . "$/";
    }

    private function callController($controller, $params = [])
    {
        // Store parameters in a global variable or pass them to the controller
        $_REQUEST['route_params'] = $params;

        return require base_path('Http/controllers/' . $controller);
    }
}
