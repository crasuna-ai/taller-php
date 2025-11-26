<?php

namespace App\Http\Controllers;

use App\Support\View;

class TareasController
{
    public function index(): void
    {
        $tareas = $_SESSION['tareas'] ?? [];

        View::render('tareas', [
            'title' => 'Gestor de tareas',
            'tareas' => $tareas,
        ]);
    }

    public function store(): void
    {
        $titulo = trim($_POST['title'] ?? '');

        if ($titulo !== '') {
            $_SESSION['tareas'][] = [
                'titulo' => $titulo,
                'completada' => false,
            ];
        }

        header('Location: /tareas');
    }

    public function toggle(): void
    {
        $indice = (int) ($_POST['index'] ?? -1);

        if (isset($_SESSION['tareas'][$indice])) {
            $_SESSION['tareas'][$indice]['completada'] = !$_SESSION['tareas'][$indice]['completada'];
        }

        header('Location: /tareas');
    }
}