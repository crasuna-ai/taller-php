<div class="card">
    <h1><?= htmlspecialchars($title); ?></h1>
    <form method="POST" action="/recetas">
        <label for="name">Receta</label>
        <input id="name" name="name" required placeholder="Ej. Brownies rápidos">
        <label for="description">Descripción</label>
        <textarea id="description" name="description" rows="2" required></textarea>
        <button class="btn" type="submit">Guardar receta</button>
    </form>
    <div class="grid" style="margin-top:1rem;">
        <?php foreach ($recetas as $receta): ?>
            <div class="card">
                <h3><?= htmlspecialchars($receta['nombre']); ?></h3>
                <p><?= htmlspecialchars($receta['descripcion']); ?></p>
            </div>
        <?php endforeach; ?>
    </div>
</div>