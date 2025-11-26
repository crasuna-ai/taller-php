<?php

namespace App\Http\Controllers;

use App\Support\View;

class PropinasController
{
    public function create(): void
    {
        View::render('propinas', [
            'title' => 'Calculadora de propinas',
            'result' => null,
            'input' => ['monto' => '', 'porcentaje' => '10'],
        ]);
    }

    public function store(): void
    {
        $monto = (float) ($_POST['amount'] ?? 0);
        $porcentaje = (float) ($_POST['percentage'] ?? 0);

        $propina = $monto * ($porcentaje / 100);
        $total = $monto + $propina;

        View::render('propinas', [
            'title' => 'Calculadora de propinas',
            'result' => [
                'propina' => $propina,
                'total' => $total,
            ],
            'input' => ['monto' => $monto, 'porcentaje' => $porcentaje],
        ]);
    }
}