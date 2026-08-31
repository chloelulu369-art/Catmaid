<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login - Catmaid</title>
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
        <section class="panel formulario-panel">
            <p class="eyebrow">Acceso</p>
            <h1>Iniciar sesión</h1>
            <form class="formulario" method="post" data-validar="true">
                <div class="campo-grid">
                    <label class="campo-amplio">
                        Usuario
                        <input type="text" name="usuario" placeholder="admin@catmaid.org" required>
                    </label>

                    <label class="campo-amplio">
                        Contraseña
                        <input type="password" name="password" placeholder="••••••••" required>
                    </label>
                </div>

                <div class="acciones-formulario">
                    <button type="submit" class="btn btn-primary">Entrar</button>
                    <a href="index.php" class="btn btn-secondary">Volver</a>
                </div>
            </form>
        </section>
    </main>

    <script src="../js/validaciones.js"></script>
</body>
</html>