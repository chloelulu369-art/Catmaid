<?php
require_once __DIR__ . '/../modelo/gato.php';

$modelo = new GatoModel();
$gatos = $modelo->listar();
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lista de gatos</title>
    <link rel="stylesheet" href="../css/index.css">
</head>
<body>
    <?php include __DIR__ . '/menu.php'; ?>

    <main class="contenedor-principal admin-panel">
        <section class="panel">
            <div class="encabezado-panel">
                <div>
                    <p class="eyebrow">Administración</p>
                    <h1>Listado de gatos</h1>
                </div>
                <a class="btn btn-primary" href="froam-altas.php">Agregar gato</a>
            </div>

            <?php if (empty($gatos)): ?>
                <div class="alerta-vacia">
                    <p>No hay gatos registrados por el momento.</p>
                </div>
            <?php else: ?>
                <div class="tabla-responsive">
                    <table>
                        <thead>
                            <tr>
                                <th>Foto</th>
                                <th>Nombre</th>
                                <th>Edad</th>
                                <th>Género</th>
                                <th>Teléfono</th>
                                <th>Estado</th>
                                <th>Acciones</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($gatos as $gato): ?>
                                <tr>
                                    <td>
                                        <?php if (!empty($gato['foto'])): ?>
                                            <img src="../<?= htmlspecialchars($gato['foto']); ?>" alt="<?= htmlspecialchars($gato['nombre']); ?>" class="miniatura">
                                        <?php else: ?>
                                            <span class="no-foto">Sin foto</span>
                                        <?php endif; ?>
                                    </td>
                                    <td><?= htmlspecialchars($gato['nombre']); ?></td>
                                    <td><?= (int) $gato['edad']; ?> años</td>
                                    <td><?= htmlspecialchars($gato['genero']); ?></td>
                                    <td><?= htmlspecialchars($gato['telefono']); ?></td>
                                    <td><?= htmlspecialchars($gato['estado_medico']); ?></td>
                                    <td>
                                        <div class="grupo-acciones">
                                            <a class="btn btn-secondary" href="froam-modificacion.php?id=<?= (int) $gato['id_gato']; ?>">Editar</a>
                                            <a class="btn btn-danger" href="froam-bajas.php?id=<?= (int) $gato['id_gato']; ?>">Eliminar</a>
                                        </div>
                                    </td>
                                </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                </div>
            <?php endif; ?>
        </section>
    </main>
</body>
</html>
