<?php

class Database
{
    private static ?PDO $instance = null;

    public static function getConnection(): PDO
    {
        if (self::$instance === null) {
            $host = 'localhost';
            $db   = 'taller_mvc';   // nombre de tu BD
            $user = 'root';         // usuario por defecto en XAMPP
            $pass = '';             // normalmente vacío

            $dsn  = "mysql:host=$host;dbname=$db;charset=utf8mb4";

            self::$instance = new PDO($dsn, $user, $pass, [
                PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
            ]);
        }

        return self::$instance;
    }
}
