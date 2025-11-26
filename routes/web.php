<?php

use App\Http\Controllers\CalendarioController;
use App\Http\Controllers\CronometroController;
use App\Http\Controllers\GastosController;
use App\Http\Controllers\InicioController;
use App\Http\Controllers\MemoriaController;
use App\Http\Controllers\NotasController;
use App\Http\Controllers\PropinasController;
use App\Http\Controllers\RecetasController;
use App\Http\Controllers\ReservasController;
use App\Http\Controllers\TareasController;
use App\Http\Controllers\ContrasenasController;
use App\Support\Router;

/** @var Router $router */

$router->get('/', [InicioController::class, 'index']);

$router->get('/tareas', [TareasController::class, 'index']);
$router->post('/tareas', [TareasController::class, 'store']);
$router->post('/tareas/alternar', [TareasController::class, 'toggle']);

$router->get('/propinas', [PropinasController::class, 'create']);
$router->post('/propinas', [PropinasController::class, 'store']);

$router->get('/contrasenas', [ContrasenasController::class, 'show']);
$router->post('/contrasenas', [ContrasenasController::class, 'generate']);

$router->get('/cronometro', [CronometroController::class, 'index']);

$router->get('/gastos', [GastosController::class, 'index']);
$router->post('/gastos', [GastosController::class, 'store']);

$router->get('/reservas', [ReservasController::class, 'index']);
$router->post('/reservas', [ReservasController::class, 'store']);

$router->get('/notas', [NotasController::class, 'index']);
$router->post('/notas', [NotasController::class, 'store']);

$router->get('/calendario', [CalendarioController::class, 'index']);
$router->post('/calendario', [CalendarioController::class, 'store']);

$router->get('/recetas', [RecetasController::class, 'index']);
$router->post('/recetas', [RecetasController::class, 'store']);

$router->get('/memoria', [MemoriaController::class, 'index']);