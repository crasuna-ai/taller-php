<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Generador de contraseñas seguras</title>
</head>
<body>
    <h1>Generador de contraseñas seguras</h1>

    <p><a href="index.php?controller=home&action=index">← Volver al menú</a></p>

    <form action="index.php?controller=password&action=index" method="POST">
        <label>
            Longitud:
            <input type="number" name="length" min="4" max="64"
                   value="<?= htmlspecialchars($data['length']) ?>">
        </label>
        <br>

        <label>
            <input type="checkbox" name="lower" <?= $data['useLower'] ? 'checked' : '' ?>>
            Minúsculas (a-z)
        </label><br>

        <label>
            <input type="checkbox" name="upper" <?= $data['useUpper'] ? 'checked' : '' ?>>
            Mayúsculas (A-Z)
        </label><br>

        <label>
            <input type="checkbox" name="numbers" <?= $data['useNumbers'] ? 'checked' : '' ?>>
            Números (0-9)
        </label><br>

        <label>
            <input type="checkbox" name="symbols" <?= $data['useSymbols'] ? 'checked' : '' ?>>
            Símbolos (!@#$...)
        </label><br>

        <button type="submit">Generar</button>
    </form>

    <?php if (!empty($data['generatedPass'])): ?>
        <h2>Contraseña generada</h2>
        <p><strong><?= htmlspecialchars($data['generatedPass']) ?></strong></p>
    <?php elseif ($_SERVER['REQUEST_METHOD'] === 'POST'): ?>
        <p style="color: red;">Selecciona al menos un tipo de carácter.</p>
    <?php endif; ?>
</body>
</html>
