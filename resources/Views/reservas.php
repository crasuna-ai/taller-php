<div class="card">
    <h1><?= htmlspecialchars($title); ?></h1>
    <form method="POST" action="/reservas">
        <label for="name">Nombre</label>
        <input id="name" name="name" required placeholder="Ej. Sala de juntas">
        <label for="date">Fecha</label>
        <input id="date" name="date" type="date" required>
        <button class="btn" type="submit">Guardar reserva</button>
    </form>
    <h3>Reservas</h3>
    <ul>
        <?php foreach ($reservas as $reserva): ?>
            <li><strong><?= htmlspecialchars($reserva['nombre']); ?></strong> - <?= htmlspecialchars($reserva['fecha']); ?></li>
        <?php endforeach; ?>
        <?php if (empty($reservas)): ?><li>No hay reservas aún.</li><?php endif; ?>
    </ul>
</div>
