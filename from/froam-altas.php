<?php
require_once __DIR__ . '/../modelo/gato.php';

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
        $rutaFoto = '';

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

        $modelo = new GatoModel();
        $guardado = $modelo->guardar([
            'nombre' => $nombre,
            'edad' => (int) $edad,
            'genero' => $genero,
            'estado_medico' => $estadoMedico,
            'telefono' => $telefono,
            'historia' => $historia,
            'direccion' => $direccion,
            'castrado' => $castrado,
        ], $rutaFoto);

        if ($guardado) {
            $mensaje = 'El gato fue registrado correctamente.';
        } else {
            $error = 'No se pudo guardar el registro.';
        }
    }
}
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Alta de gato</title>
    <link rel="stylesheet" href="../css/index.css">
</head>
<body>
    <?php include __DIR__ . '/menu.php'; ?>

    <main class="contenedor-principal">
        <section class="panel formulario-panel">
            <p class="eyebrow">Panel de administración</p>
            <h1>Alta de gato</h1>

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
                        <input type="text" name="nombre" placeholder="Ej. Luna" required>
                    </label>

                    <label>
                        Edad (años)
                        <input type="number" name="edad" min="0" max="30" required>
                    </label>

                    <label>
                        Género
                        <select name="genero" required>
                            <option value="">Selecciona</option>
                            <option value="Macho">Macho</option>
                            <option value="Hembra">Hembra</option>
                        </select>
                    </label>

                    <label>
                        Castrado
                        <select name="castrado" required>
                            <option value="">Selecciona</option>
                            <option value="Si">Sí</option>
                            <option value="No">No</option>
                        </select>
                    </label>

                    <label>
                        Teléfono de contacto
                        <input type="tel" name="telefono" placeholder="Ej. 5551234567" required>
                    </label>

                    <label>
                        Estado médico
                        <input type="text" name="estado_medico" placeholder="Vacunado, esterilizado..." required>
                    </label>

                    <label class="campo-amplio">
                        Dirección
                        <input type="text" name="direccion" placeholder="Calle, colonia, ciudad" required>
                    </label>

                    <label class="campo-amplio">
                        Historia del gato
                        <textarea name="historia" rows="4" placeholder="Cuéntanos cómo llegó a refugio..." required></textarea>
                    </label>

                    <label class="campo-amplio">
                        Foto
                        <input type="file" name="foto" accept="image/*">
                    </label>
                </div>

                <div class="acciones-formulario">
                    <button class="btn btn-primary" type="submit">Guardar gato</button>
                    <a class="btn btn-secondary" href="lista.php">Volver al listado</a>
                </div>
            </form>
        </section>
    </main>

    <script src="../js/validaciones.js"></script>
</body>
</html>
