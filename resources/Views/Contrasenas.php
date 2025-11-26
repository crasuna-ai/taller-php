<div class="card">
    <h1><?= htmlspecialchars($title); ?></h1>
    <form method="POST" action="/contrasenas">
        <label for="length">Longitud</label>
        <input type="number" name="length" id="length" value="12" min="4" max="64">
        <button class="btn" type="submit">Generar</button>
    </form>
    <?php if ($password): ?>
        <p>Nueva contraseña segura:</p>
        <p class="badge" style="background:#dcfce7;"><?= htmlspecialchars($password); ?></p>
    <?php endif; ?>
</div>