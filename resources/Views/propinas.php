<div class="card">
    <h1><?= htmlspecialchars($title); ?></h1>
    <form method="POST" action="/propinas">
        <label for="amount">Cuenta</label>
        <input type="number" step="0.01" name="amount" id="amount" value="<?= htmlspecialchars($input['monto']); ?>" required>
        <label for="percentage">Propina (%)</label>
        <input type="number" step="1" name="percentage" id="percentage" value="<?= htmlspecialchars($input['porcentaje']); ?>" required>
        <button class="btn" type="submit">Calcular</button>
    </form>
    <?php if ($result): ?>
        <p>Propina: <strong>$<?= number_format($result['propina'], 2); ?></strong></p>
        <p>Total a pagar: <strong>$<?= number_format($result['total'], 2); ?></strong></p>
    <?php endif; ?>
</div>