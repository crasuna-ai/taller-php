<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Calculadora de propinas</title>
</head>
<body>
    <h1>Calculadora de propinas</h1>

    <p><a href="index.php?controller=home&action=index">← Volver al menú</a></p>

    <form action="index.php?controller=tip&action=index" method="POST">
        <label>
            Total de la cuenta:
            <input type="number" name="total" step="0.01" required>
        </label>
        <br>
        <label>
            Porcentaje de propina (%):
            <input type="number" name="porcentaje" step="1" required>
        </label>
        <br>
        <button type="submit">Calcular</button>
    </form>

    <?php if (!empty($data['propina'])): ?>
        <h2>Resultado</h2>
        <p>Propina: $<?= number_format($data['propina'], 2) ?></p>
        <p>Total a pagar (cuenta + propina): $<?= number_format($data['totalConPropina'], 2) ?></p>
    <?php endif; ?>
</body>
</html>
