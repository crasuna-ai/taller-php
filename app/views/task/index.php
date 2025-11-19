<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Lista de tareas</title>
</head>
<body>
    <h1>Lista de tareas</h1>

    <p><a href="index.php?controller=home&action=index">← Volver al menú</a></p>

    <form action="index.php?controller=task&action=store" method="POST">
        <input type="text" name="title" placeholder="Nueva tarea" required>
        <button type="submit">Agregar</button>
    </form>

    <ul>
        <?php foreach ($tasks as $task): ?>
            <li>
                <span style="<?= $task['is_completed'] ? 'text-decoration: line-through;' : '' ?>">
                    <?= htmlspecialchars($task['title']) ?>
                </span>

                <a href="index.php?controller=task&action=toggle&id=<?= $task['id'] ?>">
                    <?= $task['is_completed'] ? 'Desmarcar' : 'Completar' ?>
                </a>

                <a href="index.php?controller=task&action=destroy&id=<?= $task['id'] ?>"
                   onclick="return confirm('¿Eliminar tarea?')">
                    Eliminar
                </a>
            </li>
        <?php endforeach; ?>
    </ul>
</body>
</html>
