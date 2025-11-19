<?php

class StopwatchController
{
    public function index()
    {
        // Solo carga la vista del cronómetro
        require __DIR__ . '/../views/stopwatch/index.php';
    }
}
