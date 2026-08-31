<?php
require_once __DIR__ . '/conexion.php';

class GatoModel
{
    private PDO $conexion;

    public function __construct()
    {
        $this->conexion = Conexion::getConexion();
    }

    public function listar(): array
    {
        $sql = 'SELECT * FROM gato ORDER BY id_gato DESC';
        $stmt = $this->conexion->query($sql);
        return $stmt->fetchAll();
    }

    public function obtenerPorId(int $id): ?array
    {
        $sql = 'SELECT * FROM gato WHERE id_gato = :id';
        $stmt = $this->conexion->prepare($sql);
        $stmt->execute(['id' => $id]);
        $gato = $stmt->fetch();

        return $gato ?: null;
    }

    public function guardar(array $datos, ?string $rutaFoto = null): bool
    {
        $sql = 'INSERT INTO gato (nombre, edad, genero, foto, estado_medico, telefono, historia, direccion, castrado)
                VALUES (:nombre, :edad, :genero, :foto, :estado_medico, :telefono, :historia, :direccion, :castrado)';

        $stmt = $this->conexion->prepare($sql);
        $stmt->execute([
            'nombre' => $datos['nombre'],
            'edad' => $datos['edad'],
            'genero' => $datos['genero'],
            'foto' => $rutaFoto ?? '',
            'estado_medico' => $datos['estado_medico'],
            'telefono' => $datos['telefono'],
            'historia' => $datos['historia'],
            'direccion' => $datos['direccion'],
            'castrado' => $datos['castrado'],
        ]);

        return $stmt->rowCount() > 0;
    }

    public function actualizar(int $id, array $datos, ?string $rutaFoto = null): bool
    {
        $sql = 'UPDATE gato SET nombre = :nombre, edad = :edad, genero = :genero, foto = :foto,
                estado_medico = :estado_medico, telefono = :telefono, historia = :historia,
                direccion = :direccion, castrado = :castrado WHERE id_gato = :id';

        $stmt = $this->conexion->prepare($sql);
        $stmt->execute([
            'id' => $id,
            'nombre' => $datos['nombre'],
            'edad' => $datos['edad'],
            'genero' => $datos['genero'],
            'foto' => $rutaFoto ?? $datos['foto_actual'],
            'estado_medico' => $datos['estado_medico'],
            'telefono' => $datos['telefono'],
            'historia' => $datos['historia'],
            'direccion' => $datos['direccion'],
            'castrado' => $datos['castrado'],
        ]);

        return $stmt->rowCount() > 0;
    }

    public function eliminar(int $id): bool
    {
        $sql = 'DELETE FROM gato WHERE id_gato = :id';
        $stmt = $this->conexion->prepare($sql);
        $stmt->execute(['id' => $id]);

        return $stmt->rowCount() > 0;
    }
}
