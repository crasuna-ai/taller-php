<div class="card">
    <h1><?= htmlspecialchars($title); ?></h1>
    <form method="POST" action="/tareas">
        <label for="title">Nueva tarea</label>
        <input id="title" name="title" required placeholder="Ej. Preparar presentación" />
        <button class="btn" type="submit">Agregar</button>
    </form>
    <h3>Listado</h3>
    <table>
        <thead>
            <tr><th>Tarea</th><th>Estado</th><th>Acciones</th></tr>
        </thead>
        <tbody>
        <?php if (empty($tareas)): ?>
            <tr><td colspan="3">Aún no hay tareas.</td></tr>
        <?php else: ?>
            <?php foreach ($tareas as $index => $tarea): ?>
                <tr>
                    <td><?= htmlspecialchars($tarea['titulo']); ?></td>
                    <td><span class="badge" style="background: <?= $tarea['completada'] ? '#bbf7d0' : '#fef9c3'; ?>;">
                        <?= $tarea['completada'] ? 'Completada' : 'Pendiente'; ?></span></td>
                    <td>
                        <form method="POST" action="/tareas/alternar">
                            <input type="hidden" name="index" value="<?= $index; ?>">
                            <button class="btn secondary" type="submit">Cambiar estado</button>
                        </form>
                    </td>
                </tr>
            <?php endforeach; ?>
        <?php endif; ?>
        </tbody>
    </table>
</div>