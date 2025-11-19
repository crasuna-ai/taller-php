<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Gestor de notas</title>
    <style>
        .notes-container {
            display: flex;
            gap: 16px;
            align-items: flex-start;
        }
        .form-panel, .list-panel {
            width: 50%;
        }
        .note-card {
            border: 1px solid #ccc;
            padding: 8px;
            margin-bottom: 8px;
        }
        .note-title {
            font-weight: bold;
        }
    </style>
</head>
<body>
    <h1>Gestor de notas</h1>

    <p><a href="index.php?controller=home&action=index">← Volver al menú</a></p>

    <div class="notes-container">
        <div class="form-panel">
            <h2>Nueva nota</h2>
            <form action="index.php?controller=notes&action=store" method="POST">
                <label>
                    Título:
                    <input type="text" name="title" required>
                </label>
                <br>
                <label>
                    Contenido:
                    <br>
                    <textarea name="content" rows="5" cols="40" required></textarea>
                </label>
                <br>
                <button type="submit">Guardar nota</button>
            </form>
        </div>

        <div class="list-panel">
            <h2>Notas guardadas</h2>

            <?php if (empty($data['notes'])): ?>
                <p>No hay notas aún.</p>
            <?php else: ?>
                <?php foreach ($data['notes'] as $note): ?>
                    <div class="note-card">
                        <div class="note-title">
                            <?= htmlspecialchars($note['title']) ?>
                        </div>
                        <div class="note-content">
                            <?= nl2br(htmlspecialchars($note['content'])) ?>
                        </div>
                        <div class="note-meta">
                            <small>Creada: <?= htmlspecialchars($note['created_at']) ?></small>
                        </div>
                        <div>
                            <a href="index.php?controller=notes&action=destroy&id=<?= $note['id'] ?>"
                               onclick="return confirm('¿Eliminar esta nota?');">
                                Eliminar
                            </a>
                        </div>
                    </div>
                <?php endforeach; ?>
            <?php endif; ?>
        </div>
    </div>
</body>
</html>
