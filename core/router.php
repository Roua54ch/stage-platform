<?php

class Router {

    private static $routes = [];

    // ➕ add route
    public static function add($method, $path, $callback) {
        self::$routes[] = [
            'method' => strtoupper($method),
            'path' => $path,
            'callback' => $callback
        ];
    }

    // 🚀 run router
    public static function run() {

        $uri = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);
        $method = $_SERVER['REQUEST_METHOD'];

        foreach (self::$routes as $route) {

            if ($route['method'] == $method && $route['path'] == $uri) {

                $callback = $route['callback'];

                if (is_callable($callback)) {
                    return $callback();
                }

                if (is_array($callback)) {
                    $controller = new $callback[0]();
                    return $controller->{$callback[1]}();
                }
            }
        }

        http_response_code(404);
        echo "404 - Page Not Found";
    }
}