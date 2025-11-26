<div class="card">
    <h1><?= htmlspecialchars($title); ?></h1>
    <p>Todos los ejercicios están organizados con una estructura inspirada en Laravel: rutas dedicadas, controladores y vistas en <code>resources/views</code>. Puedes navegar cada reto desde aquí.</p>
    <div class="grid">
        <?php foreach ($exercises as $exercise): ?>
            <a class="card" style="text-decoration:none; color:inherit;" href="<?= $exercise['route']; ?>">
                <h3><?= htmlspecialchars($exercise['title']); ?></h3>
                <p class="badge">Ir al ejercicio</p>
            </a>
        <?php endforeach; ?>
    </div>
</div>