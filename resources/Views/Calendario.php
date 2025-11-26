<div class="card">
    <h1><?= htmlspecialchars($title); ?></h1>
    <form method="POST" action="/calendario">
        <label for="title">Título</label>
        <input id="title" name="title" required placeholder="Ej. Reunión con cliente">
        <label for="date">Fecha</label>
        <input id="date" type="date" name="date" required>
        <button class="btn" type="submit">Agregar evento</button>
    </form>
    <h3>Eventos</h3>
    <ul>
        <?php foreach ($eventos as $evento): ?>
            <li><strong><?= htmlspecialchars($evento['fecha']); ?>:</strong> <?= htmlspecialchars($evento['titulo']); ?></li>
        <?php endforeach; ?>
        <?php if (empty($eventos)): ?><li>Sin eventos en el calendario.</li><?php endif; ?>
    </ul>
</div>