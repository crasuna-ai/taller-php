<div class="card">
    <h1><?= htmlspecialchars($title); ?></h1>
    <form method="POST" action="/notas">
        <label for="note">Nueva nota</label>
        <textarea id="note" name="note" rows="3" required placeholder="Ideas, pendientes o recordatorios"></textarea>
        <button class="btn" type="submit">Guardar</button>
    </form>
    <h3>Notas guardadas</h3>
    <ul>
        <?php foreach ($notas as $nota): ?>
            <li><strong><?= htmlspecialchars($nota['creada_en']); ?>:</strong> <?= htmlspecialchars($nota['contenido']); ?></li>
        <?php endforeach; ?>
        <?php if (empty($notas)): ?><li>Aún no has agregado notas.</li><?php endif; ?>
    </ul>
</div>