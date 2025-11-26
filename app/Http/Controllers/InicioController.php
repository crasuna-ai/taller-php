<?php

namespace App\Http\Controllers;

use App\Support\View;

class InicioController
{
    public function index(): void
    {
        $exercises = [
            ['route' => '/tareas', 'title' => 'Gestor de tareas'],
            ['route' => '/propinas', 'title' => 'Calculadora de propinas'],
            ['route' => '/contraseñas', 'title' => 'Generador de contraseñas'],
            ['route' => '/cronometro', 'title' => 'Cronómetro'],
            ['route' => '/gastos', 'title' => 'Gastos personales'],
            ['route' => '/reservas', 'title' => 'Reservas'],
            ['route' => '/notas', 'title' => 'Notas rápidas'],
            ['route' => '/calendario', 'title' => 'Eventos del calendario'],
            ['route' => '/recetas', 'title' => 'Recetario'],
            ['route' => '/memoria', 'title' => 'Juego de memoria'],
        ];

        View::render('inicio', [
            'title' => 'Panel de ejercicios en Laravel',
            'exercises' => $exercises,
        ]);
    }
}