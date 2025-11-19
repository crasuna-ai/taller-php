<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Plataforma de recetas de cocina</title>
    <style>
        .layout {
            display: flex;
            gap: 16px;
            align-items: flex-start;
        }
        .form-panel, .list-panel {
            width: 50%;
        }
        .recipe-card {
            border: 1px solid #ccc;
            padding: 8px;
            margin-bottom: 8px;
        }
        .recipe-title {
            font-weight: bold;
            font-size: 1.1rem;
        }
        .meta {
            font-size: 0.85rem;
            color: #555;
        }
        pre {
            white-space: pre-wrap;
        }
    </style>
</head>
<body>
    <h1>Plataforma de recetas de cocina</h1>

    <p><a href="index.php?controller=home&action=index">← Volver al menú</a></p>

    <div class="layout">
        <div class="form-panel">
            <h2>Nueva receta</h2>
            <form action="index.php?controller=recipes&action=store" method="POST">
                <label>
                    Título:
                    <input type="text" name="title" required>
                </label>
                <br>
                <label>
                    Categoría:
                    <input type="text" name="category" placeholder="Postre, Desayuno, Almuerzo..." required>
                </label>
                <br>
                <label>
                    Dificultad:
                    <select name="difficulty" required>
                        <option value="Fácil">Fácil</option>
                        <option value="Media">Media</option>
                        <option value="Difícil">Difícil</option>
                    </select>
                </label>
                <br>
                <label>
                    Tiempo de preparación (min):
                    <input type="number" name="prep_time" min="1" required>
                </label>
                <br>
                <label>
                    Ingredientes (un ingrediente por línea):
                    <br>
                    <textarea name="ingredients" rows="5" cols="40" required></textarea>
                </label>
                <br>
                <label>
                    Instrucciones:
                    <br>
                    <textarea name="instructions" rows="6" cols="40" required></textarea>
                </label>
                <br>
                <button type="submit">Guardar receta</button>
            </form>
        </div>

        <div class="list-panel">
            <h2>Recetas guardadas</h2>

            <?php if (empty($data['recipes'])): ?>
                <p>No hay recetas aún.</p>
            <?php else: ?>
                <?php foreach ($data['recipes'] as $recipe): ?>
                    <div class="recipe-card">
                        <div class="recipe-title">
                            <?= htmlspecialchars($recipe['title']) ?>
                        </div>
                        <div class="meta">
                            Categoría: <?= htmlspecialchars($recipe['category']) ?> |
                            Dificultad: <?= htmlspecialchars($recipe['difficulty']) ?> |
                            Tiempo: <?= (int)$recipe['prep_time_minutes'] ?> min
                        </div>

                        <h4>Ingredientes</h4>
                        <pre><?= htmlspecialchars($recipe['ingredients']) ?></pre>

                        <h4>Instrucciones</h4>
                        <pre><?= htmlspecialchars($recipe['instructions']) ?></pre>

                        <div>
                            <a href="index.php?controller=recipes&action=destroy&id=<?= $recipe['id'] ?>"
                               onclick="return confirm('¿Eliminar esta receta?');">
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
