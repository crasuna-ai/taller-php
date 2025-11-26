<?php

namespace App\Http\Controllers;

use App\Support\View;

class ReservasController
{
    public function index(): void
    {
        $reservas = $_SESSION['reservas'] ?? [];
        View::render('reservas', [
            'title' => 'Reservas',
            'reservas' => $reservas,
        ]);
    }

    public function store(): void
    {
        $nombre = trim($_POST['name'] ?? '');
        $fecha = trim($_POST['date'] ?? '');

        if ($nombre !== '' && $fecha !== '') {
            $_SESSION['reservas'][] = [
                'nombre' => $nombre,
                'fecha' => $fecha,
            ];
        }

        header('Location: /reservas');
    }
}