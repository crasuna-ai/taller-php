<?php

namespace App\Http\Controllers;

use App\Support\View;

class CalendarioController
{
    public function index(): void
    {
        $eventos = $_SESSION['eventos'] ?? [];
        View::render('calendario', [
            'title' => 'Calendario de eventos',
            'eventos' => $eventos,
        ]);
    }

    public function store(): void
    {
        $titulo = trim($_POST['title'] ?? '');
        $fecha = trim($_POST['date'] ?? '');

        if ($titulo !== '' && $fecha !== '') {
            $_SESSION['eventos'][] = [
                'titulo' => $titulo,
                'fecha' => $fecha,
            ];
        }

        header('Location: /calendario');
    }
}