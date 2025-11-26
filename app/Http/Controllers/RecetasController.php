<?php

namespace App\Http\Controllers;

use App\Support\View;

class RecetasController
{
    public function index(): void
    {
        $recetas = $_SESSION['recetas'] ?? [
            ['nombre' => 'Tostadas francesas', 'descripcion' => 'Huevos, pan y canela en 10 minutos.'],
            ['nombre' => 'Pasta al pesto', 'descripcion' => 'Fácil, fresca y lista en 15 minutos.'],
        ];
        $_SESSION['recetas'] = $recetas;

        View::render('recetas', [
            'title' => 'Recetario',
            'recetas' => $recetas,
        ]);
    }

    public function store(): void
    {
        $nombre = trim($_POST['name'] ?? '');
        $descripcion = trim($_POST['description'] ?? '');

        if ($nombre !== '' && $descripcion !== '') {
            $_SESSION['recetas'][] = [
                'nombre' => $nombre,
                'descripcion' => $descripcion,
            ];
        }

        header('Location: /recetas');
    }
}