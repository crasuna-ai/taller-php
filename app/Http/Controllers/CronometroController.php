<?php

namespace App\Http\Controllers;

use App\Support\View;

class CronometroController
{
    public function index(): void
    {
        View::render('cronometro', [
            'title' => 'Cronómetro en Laravel',
        ]);
    }
}