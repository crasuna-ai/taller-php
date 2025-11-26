<?php

namespace App\Http\Controllers;

use App\Support\View;

class NotasController
{
    public function index(): void
    {
        $notas = $_SESSION['notas'] ?? [];
        View::render('notas', [
            'title' => 'Notas rápidas',
            'notas' => $notas,
        ]);
    }

    public function store(): void
    {
        $nota = trim($_POST['note'] ?? '');

        if ($nota !== '') {
            $_SESSION['notas'][] = [
                'contenido' => $nota,
                'creada_en' => date('d/m/Y H:i'),
            ];
        }

        header('Location: /notas');
    }
}