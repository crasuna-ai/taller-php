<?php

class TipController
{
    public function index()
    {
        $total      = $_POST['total']      ?? null;
        $porcentaje = $_POST['porcentaje'] ?? null;
        $propina    = null;
        $totalConPropina = null;

        if ($total !== null && $porcentaje !== null) {
            $propina        = $total * ($porcentaje / 100);
            $totalConPropina = $total + $propina;
        }

        $data = [
            'total'           => $total,
            'porcentaje'      => $porcentaje,
            'propina'         => $propina,
            'totalConPropina' => $totalConPropina,
        ];

        require __DIR__ . '/../views/tip/index.php';
    }
}
