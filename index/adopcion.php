<?php
require_once __DIR__ . '/../modelo/gato.php';

$modelo = new GatoModel();
$id = isset($_GET['id']) ? (int) $_GET['id'] : 0;
$gato = $id > 0 ? $modelo->obtenerPorId($id) : null;
$gatos = $modelo->listar();
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Adopción - Catmaid</title>
    <link rel="stylesheet" href="../css/index.css">
</head>
<body>
    <header class="site-header">
        <div class="container nav">
            <a class="brand" href="index.php">Catmaid</a>
            <nav class="nav-links">
                <a href="index.php">Inicio</a>
                <a href="adopcion.php">Adoptar</a>
                <a href="donar.php">Donar</a>
                <a href="login.php">Login</a>
                <a href="../from/lista.php">Administrar</a>
            </nav>
        </div>
    </header>

    <main class="container section">
        <?php if ($gato): ?>
            <section class="panel">
                <div class="hero-grid">
                    <div>
                        <?php if (!empty($gato['foto'])): ?>
                            <img src="../<?= htmlspecialchars($gato['foto']); ?>" alt="<?= htmlspecialchars($gato['nombre']); ?>" style="border-radius: 22px;">
                        <?php endif; ?>
                    </div>
                    <div>
                        <p class="eyebrow">Adopción responsable</p>
                        <h1><?= htmlspecialchars($gato['nombre']); ?></h1>
                        <p class="meta">Edad: <?= (int) $gato['edad']; ?> años · <?= htmlspecialchars($gato['genero']); ?> · Castrado: <?= htmlspecialchars($gato['castrado']); ?></p>
                        <p><strong>Estado médico:</strong> <?= htmlspecialchars($gato['estado_medico']); ?></p>
                        <p><strong>Historia:</strong> <?= htmlspecialchars($gato['historia']); ?></p>
                        <p><strong>Ubicación:</strong> <?= htmlspecialchars($gato['direccion']); ?></p>
                        <p><strong>Contacto:</strong> <?= htmlspecialchars($gato['telefono']); ?></p>
                        <div class="hero-actions">
                            <a class="btn btn-primary" href="mailto:adopta@catmaid.org?subject=Adopción%20de%20<?= urlencode($gato['nombre']); ?>">Solicitar adopción</a>
                            <a class="btn btn-secondary" href="adopcion.php">Ver más gatos</a>
                        </div>
                    </div>
                </div>
            </section>
        <?php else: ?>
            <div class="section-heading">
                <p class="eyebrow">Adopta</p>
                <h2>Encuentra a tu mejor amigo</h2>
            </div>
            <div class="catalogo-gatos">
                <?php foreach ($gatos as $item): ?>
                    <article class="card-gato">
                        <?php if (!empty($item['foto'])): ?>
                            <img src="../<?= htmlspecialchars($item['foto']); ?>" alt="<?= htmlspecialchars($item['nombre']); ?>">
                        <?php else: ?>
                            <div class="placeholder-imagen">Sin foto</div>
                        <?php endif; ?>
                        <div class="card-body">
                            <div class="card-head">
                                <h3><?= htmlspecialchars($item['nombre']); ?></h3>
                                <span><?= htmlspecialchars($item['genero']); ?></span>
                            </div>
                            <p class="meta">Edad: <?= (int) $item['edad']; ?> años</p>
                            <p><?= htmlspecialchars($item['historia']); ?></p>
                            <div class="card-actions">
                                <a class="btn btn-primary" href="adopcion.php?id=<?= (int) $item['id_gato']; ?>">Conocer</a>
                            </div>
                        </div>
                    </article>
                <?php endforeach; ?>
            </div>
        <?php endif; ?>
    </main>
</body>
</html>