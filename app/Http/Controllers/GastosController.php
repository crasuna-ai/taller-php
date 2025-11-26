<?php

namespace App\Http\Controllers;

use App\Support\View;

class GastosController
{
    public function index(): void
    {
        $gastos = $_SESSION['gastos'] ?? [];
        $total = array_reduce($gastos, fn($sum, $gasto) => $sum + $gasto['monto'], 0.0);

        View::render('gastos', [
            'title' => 'Control de gastos',
            'gastos' => $gastos,
            'total' => $total,
        ]);
    }

    public function store(): void
    {
        $concepto = trim($_POST['concept'] ?? '');
        $monto = (float) ($_POST['amount'] ?? 0);

        if ($concepto !== '' && $monto > 0) {
            $_SESSION['gastos'][] = [
                'concepto' => $concepto,
                'monto' => $monto,
            ];
        }

        header('Location: /gastos');
    }
}