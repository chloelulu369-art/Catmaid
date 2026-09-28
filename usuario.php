<?php
require_once __DIR__ . '/conexion.php';

class UsuarioModel
{
    private PDO $conexion;

    public function __construct()
    {
        $this->conexion = Conexion::getConexion();
    }

    public function obtenerPorUsuario(string $usuario): ?array
    {
        $sql = 'SELECT * FROM persona WHERE usuario = :usuario LIMIT 1';
        $stmt = $this->conexion->prepare($sql);
        $stmt->execute(['usuario' => $usuario]);
        $usuarioEncontrado = $stmt->fetch();

        return $usuarioEncontrado ?: null;
    }
}
