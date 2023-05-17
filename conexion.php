<?php
define('DB_HOST', 'localhost');
define('DB_NAME', 'tesis');
define('DB_USER', 'root');
define('DB_PASSWORD', '');

class Conexion
{
    public function conectar()
    {
        try {
            $PDO = new PDO('mysql:host=' . DB_HOST . ';dbname=' . DB_NAME, DB_USER, DB_PASSWORD);
            $PDO->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            return $PDO;
        } catch (PDOException $e) {
            echo "Error: " . $e->getMessage();
        }
    }
}
