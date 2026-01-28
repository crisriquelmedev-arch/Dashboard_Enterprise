<?php

declare(strict_types=1);

namespace App\Infrastructure;

final class Router
{
    public function dispatch(array $routes): void {
        $method = $_SERVER['REQUEST_METHOD'] ?? 'GET';
        $uri = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);

        if(!isset($routes[$method][$uri])){
            http_response_code(404);
            echo json_encode(['error' => 'Route not found']);
            return;
        }

        [$controller, $action] = $routes[$method][$uri];

        $controllerInstance = new $controller();
        $controllerInstance ->$action();
    }
    
    
}