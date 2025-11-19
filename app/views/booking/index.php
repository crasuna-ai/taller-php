<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Sistema de reservas</title>
    <style>
        table { border-collapse: collapse; width: 100%; margin-top: 10px; }
        th, td { border: 1px solid #ccc; padding: 4px 8px; text-align: left; }
        th { background: #f0f0f0; }
    </style>
</head>
<body>
    <h1>Sistema de reservas de citas/servicios</h1>

    <p><a href="index.php?controller=home&action=index">← Volver al menú</a></p>

    <h2>Nueva reserva</h2>
    <form action="index.php?controller=booking&action=store" method="POST">
        <label>
            Nombre del cliente:
            <input type="text" name="client_name" required>
        </label>
        <br>
        <label>
            Servicio:
            <input type="text" name="service" placeholder="Consulta, Corte, Mantenimiento..." required>
        </label>
        <br>
        <label>
            Fecha:
            <input type="date" name="booking_date" required>
        </label>
        <br>
        <label>
            Hora:
            <input type="time" name="booking_time" required>
        </label>
        <br>
        <label>
            Notas:
            <input type="text" name="notes" placeholder="Opcional">
        </label>
        <br>
        <button type="submit">Crear reserva</button>
    </form>

    <h2>Reservas registradas</h2>
    <table>
        <thead>
            <tr>
                <th>Fecha</th>
                <th>Hora</th>
                <th>Cliente</th>
                <th>Servicio</th>
                <th>Notas</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
        <?php if (empty($data['bookings'])): ?>
            <tr>
                <td colspan="6">No hay reservas registradas.</td>
            </tr>
        <?php else: ?>
            <?php foreach ($data['bookings'] as $booking): ?>
                <tr>
                    <td><?= htmlspecialchars($booking['booking_date']) ?></td>
                    <td><?= htmlspecialchars(substr($booking['booking_time'], 0, 5)) ?></td>
                    <td><?= htmlspecialchars($booking['client_name']) ?></td>
                    <td><?= htmlspecialchars($booking['service']) ?></td>
                    <td><?= htmlspecialchars($booking['notes'] ?? '') ?></td>
                    <td>
                        <a href="index.php?controller=booking&action=destroy&id=<?= $booking['id'] ?>"
                           onclick="return confirm('¿Eliminar esta reserva?');">
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
