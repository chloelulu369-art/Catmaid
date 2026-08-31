<?php
require_once __DIR__ . '/../modelo/gato.php';

$modelo = new GatoModel();
$id = isset($_GET['id']) ? (int) $_GET['id'] : 0;
$gato = $id > 0 ? $modelo->obtenerPorId($id) : null;

if (!$gato) {
    header('Location: lista.php');
    exit;
}

$mensaje = '';
$error = '';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $nombre = trim($_POST['nombre'] ?? '');
    $edad = trim($_POST['edad'] ?? '');
    $genero = trim($_POST['genero'] ?? '');
    $estadoMedico = trim($_POST['estado_medico'] ?? '');
    $telefono = trim($_POST['telefono'] ?? '');
    $historia = trim($_POST['historia'] ?? '');
    $direccion = trim($_POST['direccion'] ?? '');
    $castrado = trim($_POST['castrado'] ?? '');

    if ($nombre === '' || $edad === '' || $genero === '' || $estadoMedico === '' || $telefono === '' || $historia === '' || $direccion === '' || $castrado === '') {
        $error = 'Todos los campos son obligatorios.';
    } else {
        $rutaFoto = $gato['foto'] ?? '';

        if (!empty($_FILES['foto']['name'])) {
            $directorio = __DIR__ . '/../imagenes/gatos';
            if (!is_dir($directorio)) {
                mkdir($directorio, 0777, true);
            }

            $nombreArchivo = time() . '_' . basename($_FILES['foto']['name']);
            $rutaDestino = $directorio . '/' . $nombreArchivo;

            if (move_uploaded_file($_FILES['foto']['tmp_name'], $rutaDestino)) {
                $rutaFoto = 'imagenes/gatos/' . $nombreArchivo;
            }
        }

        $actualizado = $modelo->actualizar((int) $id, [
            'nombre' => $nombre,
            'edad' => (int) $edad,
            'genero' => $genero,
            'estado_medico' => $estadoMedico,
            'telefono' => $telefono,
            'historia' => $historia,
            'direccion' => $direccion,
            'castrado' => $castrado,
            'foto_actual' => $gato['foto'] ?? '',
        ], $rutaFoto);

        if ($actualizado) {
            $mensaje = 'Los datos del gato fueron actualizados correctamente.';
            $gato = $modelo->obtenerPorId($id);
        } else {
            $error = 'No se pudieron actualizar los datos.';
        }
    }
}
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Modificar gato</title>
    <link rel="stylesheet" href="../css/index.css">
</head>
<body>
    <?php include __DIR__ . '/menu.php'; ?>

    <main class="contenedor-principal">
        <section class="panel formulario-panel">
            <p class="eyebrow">Panel de administración</p>
            <h1>Modificar gato</h1>

            <?php if ($mensaje !== ''): ?>
                <div class="mensaje exitoso"><?= htmlspecialchars($mensaje); ?></div>
            <?php endif; ?>

            <?php if ($error !== ''): ?>
                <div class="mensaje error"><?= htmlspecialchars($error); ?></div>
            <?php endif; ?>

            <form data-validar="true" method="post" enctype="multipart/form-data" class="formulario">
                <div class="campo-grid">
                    <label>
                        Nombre del gato
                        <input type="text" name="nombre" value="<?= htmlspecialchars($gato['nombre']); ?>" required>
                    </label>

                    <label>
                        Edad (años)
                        <input type="number" name="edad" min="0" max="30" value="<?= (int) $gato['edad']; ?>" required>
                    </label>

                    <label>
                        Género
                        <select name="genero" required>
                            <option value="Macho" <?= $gato['genero'] === 'Macho' ? 'selected' : ''; ?>>Macho</option>
                            <option value="Hembra" <?= $gato['genero'] === 'Hembra' ? 'selected' : ''; ?>>Hembra</option>
                        </select>
                    </label>

                    <label>
                        Castrado
                        <select name="castrado" required>
                            <option value="Si" <?= $gato['castrado'] === 'Si' ? 'selected' : ''; ?>>Sí</option>
                            <option value="No" <?= $gato['castrado'] === 'No' ? 'selected' : ''; ?>>No</option>
                        </select>
                    </label>

                    <label>
                        Teléfono de contacto
                        <input type="tel" name="telefono" value="<?= htmlspecialchars($gato['telefono']); ?>" required>
                    </label>

                    <label>
                        Estado médico
                        <input type="text" name="estado_medico" value="<?= htmlspecialchars($gato['estado_medico']); ?>" required>
                    </label>

                    <label class="campo-amplio">
                        Dirección
                        <input type="text" name="direccion" value="<?= htmlspecialchars($gato['direccion']); ?>" required>
                    </label>

                    <label class="campo-amplio">
                        Historia del gato
                        <textarea name="historia" rows="4" required><?= htmlspecialchars($gato['historia']); ?></textarea>
                    </label>

                    <label class="campo-amplio">
                        Foto
                        <input type="file" name="foto" accept="image/*">
                    </label>
                </div>

                <div class="acciones-formulario">
                    <button class="btn btn-primary" type="submit">Actualizar gato</button>
                    <a class="btn btn-secondary" href="lista.php">Cancelar</a>
                </div>
            </form>
        </section>
    </main>

    <script src="../js/validaciones.js"></script>
</body>
</html>
