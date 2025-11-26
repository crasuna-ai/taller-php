<?php

require __DIR__ . '/../vendor/autoload.php';

use App\Support\Router;

session_start();

$router = new Router();

require __DIR__ . '/../routes/web.php';

$router->dispatch($_SERVER['REQUEST_METHOD'], $_SERVER['REQUEST_URI']);