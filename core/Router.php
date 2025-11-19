<?php

class Router
{
    public function run()
    {
        // home será el controlador por defecto
        $controllerName = $_GET['controller'] ?? 'home';
        $actionName     = $_GET['action'] ?? 'index';

        $controllerClass = ucfirst($controllerName) . 'Controller';

        if (!class_exists($controllerClass)) {
            die('Controlador no encontrado');
        }

        $controller = new $controllerClass();

        if (!method_exists($controller, $actionName)) {
            die('Acción no encontrada');
        }

        $controller->$actionName();
    }
}
