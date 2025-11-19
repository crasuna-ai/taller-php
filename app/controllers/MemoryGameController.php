<?php

class MemoryGameController
{
    public function index()
    {
        // Solo carga la vista del juego
        require __DIR__ . '/../views/memory/index.php';
    }
}
