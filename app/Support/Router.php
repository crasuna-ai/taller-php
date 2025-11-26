<?php

namespace App\Support;

class Router
{
    private array $routes = [];

    public function get(string $uri, callable $action): void
    {
        $this->addRoute('GET', $uri, $action);
    }

    public function post(string $uri, callable $action): void
    {
        $this->addRoute('POST', $uri, $action);
    }

    private function addRoute(string $method, string $uri, callable $action): void
    {
        $this->routes[$method][$this->normalizeUri($uri)] = $action;
    }

    public function dispatch(string $method, string $uri): void
    {
        $normalizedUri = $this->normalizeUri($uri);
        $action = $this->routes[$method][$normalizedUri] ?? null;

        if ($action === null) {
            http_response_code(404);
            echo 'Ruta no encontrada';
            return;
        }

        $this->callAction($action);
    }

    private function callAction(callable $action): void
    {
        if (is_array($action)) {
            [$class, $method] = $action;
            $instance = new $class();
            $instance->$method();
            return;
        }

        $action();
    }

    private function normalizeUri(string $uri): string
    {
        $uri = strtok($uri, '?') ?: '/';
        return rtrim($uri, '/') ?: '/';
    }
}