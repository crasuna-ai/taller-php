<?php

namespace App\Http\Controllers;

use App\Support\View;

class MemoriaController
{
    public function index(): void
    {
        View::render('memoria', [
            'title' => 'Juego de memoria',
        ]);
    }
}