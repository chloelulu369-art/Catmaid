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
    <title>Catmaid</title>
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

    <main>
        <section class="hero">
            <div class="container hero-grid">
                <div class="hero-copy">
                    <p class="eyebrow">Refugio de gatos</p>
                    <h1>¡Bienvenidos a Catmaid!</h1>
                    <p>
                        Somos una ONG que conecta refugios de gatos con familias adoptantes,
                        ayuda a cubrir su cuidado y les da una segunda oportunidad para vivir en un hogar lleno de amor.
                    </p>
                    <div class="hero-actions">
                        <a class="btn btn-primary" href="../from/lista.php">Ver gatos</a>
                        <a class="btn btn-secondary" href="donar.php">Apoyar con donación</a>
                    </div>
                </div>
                <div class="hero-visual">
                    <div class="card-hero">
                        <img src="../imagenes/gatos/cat-hero.jpg" alt="Gato en adopción">
                    </div>
                </div>
            </div>
        </section>

        <section class="container section">
            <div class="section-heading">
                <p class="eyebrow">Adopciones</p>
                <h2>Gatos disponibles</h2>
            </div>

            <div class="catalogo-gatos">
                <?php if (empty($gatos)): ?>
                    <div class="alerta-vacia">
                        <p>Aún no hay gatos registrados en la base de datos.</p>
                    </div>
                <?php else: ?>
                    <?php foreach ($gatos as $gato): ?>
                        <article class="card-gato">
                            <?php if (!empty($gato['foto'])): ?>
                                <img src="../<?= htmlspecialchars($gato['foto']); ?>" alt="<?= htmlspecialchars($gato['nombre']); ?>">
                            <?php else: ?>
                                <div class="placeholder-imagen">Sin foto</div>
                            <?php endif; ?>

                            <div class="card-body">
                                <div class="card-head">
                                    <h3><?= htmlspecialchars($gato['nombre']); ?></h3>
                                    <span><?= htmlspecialchars($gato['genero']); ?></span>
                                </div>
                                <p class="meta">Edad: <?= (int) $gato['edad']; ?> años</p>
                                <p class="meta">Estado médico: <?= htmlspecialchars($gato['estado_medico']); ?></p>
                                <p><?= htmlspecialchars($gato['historia']); ?></p>
                                <div class="card-actions">
                                    <a class="btn btn-primary" href="adopcion.php?id=<?= (int) $gato['id_gato']; ?>">Adóptame</a>
                                </div>
                            </div>
                        </article>
                    <?php endforeach; ?>
                <?php endif; ?>
            </div>
        </section>
    </main>

    <footer class="site-footer">
        <div class="container footer-inner">
            <p>© 2026 Catmaid</p>
            <p>Adopta, cuida y comparte.</p>
        </div>
    </footer>
</body>
</html>