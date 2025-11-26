<?php

namespace App\Support;

class View
{
    public static function render(string $view, array $data = []): void
    {
        $viewPath = __DIR__ . '/../../resources/views/' . $view . '.php';

        if (!file_exists($viewPath)) {
            http_response_code(500);
            echo "Vista {$view} no encontrada";
            return;
        }

        extract($data);

        ob_start();
        include $viewPath;
        $content = ob_get_clean();

        include __DIR__ . '/../../resources/views/plantilla.php';
    }
}