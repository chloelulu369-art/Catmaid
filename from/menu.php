<?php
$menuItems = [
    ['Inicio', '../index/index.php'],
    ['Lista', 'lista.php'],
    ['Alta', 'froam-altas.php'],
    ['Modificar', 'froam-modificacion.php'],
    ['Baja', 'froam-bajas.php'],
];
?>
<nav class="menu-principal">
    <div class="logo">Catmaid</div>
    <div class="menu-links">
        <?php foreach ($menuItems as $item): ?>
            <a href="<?= htmlspecialchars($item[1]); ?>"><?= htmlspecialchars($item[0]); ?></a>
        <?php endforeach; ?>
    </div>
</nav>
