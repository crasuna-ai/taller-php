<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Gestor de gastos</title>
    <style>
        table { border-collapse: collapse; width: 100%; margin-top: 10px; }
        th, td { border: 1px solid #ccc; padding: 4px 8px; text-align: left; }
        th { background: #f0f0f0; }
    </style>
</head>
<body>
    <h1>Gestor de gastos</h1>

    <p><a href="index.php?controller=home&action=index">← Volver al menú</a></p>

    <h2>Registrar gasto</h2>
    <form action="index.php?controller=expense&action=store" method="POST">
        <label>
            Descripción:
            <input type="text" name="description" required>
        </label>
        <br>
        <label>
            Monto:
            <input type="number" name="amount" step="0.01" required>
        </label>
        <br>
        <label>
            Categoría:
            <input type="text" name="category" placeholder="Comida, Transporte, etc." required>
        </label>
        <br>
        <label>
            Fecha:
            <input type="date" name="expense_date" required>
        </label>
        <br>
        <button type="submit">Guardar gasto</button>
    </form>

    <h2>Resumen</h2>
    <p><strong>Total gastado:</strong> $<?= number_format($data['total'], 2) ?></p>

    <h2>Listado de gastos</h2>
    <table>
        <thead>
            <tr>
                <th>Fecha</th>
                <th>Descripción</th>
                <th>Categoría</th>
                <th>Monto</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
        <?php if (empty($data['expenses'])): ?>
            <tr>
                <td colspan="5">No hay gastos registrados.</td>
            </tr>
        <?php else: ?>
            <?php foreach ($data['expenses'] as $expense): ?>
                <tr>
                    <td><?= htmlspecialchars($expense['expense_date']) ?></td>
                    <td><?= htmlspecialchars($expense['description']) ?></td>
                    <td><?= htmlspecialchars($expense['category']) ?></td>
                    <td>$<?= number_format($expense['amount'], 2) ?></td>
                    <td>
                        <a href="index.php?controller=expense&action=destroy&id=<?= $expense['id'] ?>"
                           onclick="return confirm('¿Eliminar este gasto?');">
                           Eliminar
                        </a>
                    </td>
                </tr>
            <?php endforeach; ?>
        <?php endif; ?>
        </tbody>
    </table>
</body>
</html>
