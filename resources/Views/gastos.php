<div class="card">
    <h1><?= htmlspecialchars($title); ?></h1>
    <form method="POST" action="/gastos">
        <label for="concept">Concepto</label>
        <input id="concept" name="concept" required placeholder="Ej. Mercado semanal">
        <label for="amount">Monto</label>
        <input id="amount" type="number" step="0.01" name="amount" required placeholder="0.00">
        <button class="btn" type="submit">Registrar gasto</button>
    </form>
    <h3>Historial</h3>
    <table>
        <thead><tr><th>Concepto</th><th>Monto</th></tr></thead>
        <tbody>
            <?php foreach ($gastos as $gasto): ?>
                <tr>
                    <td><?= htmlspecialchars($gasto['concepto']); ?></td>
                    <td>$<?= number_format($gasto['monto'], 2); ?></td>
                </tr>
            <?php endforeach; ?>
        </tbody>
        <tfoot>
            <tr><th>Total</th><th>$<?= number_format($total, 2); ?></th></tr>
        </tfoot>
    </table>
</div>