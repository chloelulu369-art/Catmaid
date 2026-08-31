<?php
require_once __DIR__ . '/../modelo/gato.php';

$modelo = new GatoModel();
$id = isset($_GET['id']) ? (int) $_GET['id'] : 0;
$gato = $id > 0 ? $modelo->obtenerPorId($id) : null;

if (!$gato) {
    header('Location: lista.php');
    exit;
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $modelo->eliminar($id);
    header('Location: lista.php');
    exit;
}
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Eliminar gato</title>
    <link rel="stylesheet" href="../css/index.css">
</head>
<body>
    <?php include __DIR__ . '/menu.php'; ?>

    <main class="contenedor-principal">
        <section class="panel confirmacion-panel">
            <p class="eyebrow">Confirmación</p>
            <h1>Eliminar gato</h1>

            <div class="card-confirmacion">
                <?php if (!empty($gato['foto'])): ?>
                    <img src="../<?= htmlspecialchars($gato['foto']); ?>" alt="<?= htmlspecialchars($gato['nombre']); ?>" class="miniatura grande">
                <?php endif; ?>

                <h2><?= htmlspecialchars($gato['nombre']); ?></h2>
                <p>¿Estás seguro que deseas eliminar este registro?</p>

                <form method="post" class="acciones-formulario">
                    <button class="btn btn-danger" type="submit">Sí, eliminar</button>
                    <a class="btn btn-secondary" href="lista.php">Cancelar</a>
                </form>
            </div>
        </section>
    </main>
</body>
</html>
