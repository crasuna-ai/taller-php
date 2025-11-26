<?php

namespace App\Http\Controllers;

use App\Support\View;

class ContrasenasController
{
    public function show(): void
    {
        View::render('contrasenas', [
            'title' => 'Generador de contraseñas',
            'password' => null,
        ]);
    }

    public function generate(): void
    {
        $longitud = (int) ($_POST['length'] ?? 12);
        $caracteres = 'abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789!@#$%^&*()';
        $contraseña = '';

        for ($i = 0; $i < max(4, $longitud); $i++) {
            $contraseña .= $caracteres[random_int(0, strlen($caracteres) - 1)];
        }

        View::render('contrasenas', [
            'title' => 'Generador de contraseñas',
            'password' => $contraseña,
        ]);
    }
}