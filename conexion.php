<?php
class Conexion
{
    public static function getConexion(): PDO
    {
        $host = 'localhost';
        $db = 'catmaid';
        $usuario = 'root';
        $password = '';

        try {
            $pdo = new PDO("mysql:host={$host};dbname={$db};charset=utf8mb4", $usuario, $password, [
                PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
                PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
            ]);

            return $pdo;
        } catch (PDOException $e) {
            die('No se pudo conectar a la base de datos: ' . $e->getMessage());
        }
    }
}
?>