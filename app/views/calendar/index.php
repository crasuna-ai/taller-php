<?php
// Datos básicos del mes
$year  = $data['year'];
$month = $data['month'];

// Nombre del mes
setlocale(LC_TIME, 'es_ES.UTF-8', 'es_ES', 'es');
$monthName = strftime('%B', mktime(0, 0, 0, $month, 1, $year));

// Primer día del mes
$firstDayTime = mktime(0, 0, 0, $month, 1, $year);
$daysInMonth  = (int)date('t', $firstDayTime);
$startWeekday = (int)date('N', $firstDayTime); // 1 (lunes) - 7 (domingo)

$prevMonth = $month - 1;
$prevYear  = $year;
$nextMonth = $month + 1;
$nextYear  = $year;

if ($prevMonth < 1) {
    $prevMonth = 12;
    $prevYear--;
}
if ($nextMonth > 12) {
    $nextMonth = 1;
    $nextYear++;
}
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Calendario de eventos</title>
    <style>
        table.calendar {
            border-collapse: collapse;
            width: 100%;
            margin-top: 10px;
        }
        .calendar th, .calendar td {
            border: 1px solid #ccc;
            width: 14.28%;
            vertical-align: top;
            padding: 4px;
            font-size: 0.9rem;
        }
        .calendar th {
            background: #f0f0f0;
            text-align: center;
        }
        .day-number {
            font-weight: bold;
        }
        .event-item {
            background: #e3f2fd;
            margin-top: 2px;
            padding: 2px 4px;
            font-size: 0.8rem;
        }
    </style>
</head>
<body>
    <h1>Calendario de eventos</h1>

    <p><a href="index.php?controller=home&action=index">← Volver al menú</a></p>

    <h2>
        <a href="index.php?controller=calendar&action=index&year=<?= $prevYear ?>&month=<?= $prevMonth ?>">«</a>
        <?= ucfirst($monthName) ?> <?= $year ?>
        <a href="index.php?controller=calendar&action=index&year=<?= $nextYear ?>&month=<?= $nextMonth ?>">»</a>
    </h2>

    <h3>Nuevo evento</h3>
    <form action="index.php?controller=calendar&action=store&year=<?= $year ?>&month=<?= $month ?>" method="POST">
        <label>
            Título:
            <input type="text" name="title" required>
        </label>
        <br>
        <label>
            Descripción:
            <br>
            <textarea name="description" rows="3" cols="40"></textarea>
        </label>
        <br>
        <label>
            Fecha:
            <input type="date" name="event_date" required>
        </label>
        <br>
        <label>
            Hora:
            <input type="time" name="event_time">
        </label>
        <br>
        <button type="submit">Crear evento</button>
    </form>

    <h3>Vista mensual</h3>
    <table class="calendar">
        <thead>
            <tr>
                <th>Lun</th>
                <th>Mar</th>
                <th>Mié</th>
                <th>Jue</th>
                <th>Vie</th>
                <th>Sáb</th>
                <th>Dom</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <?php
                // celdas vacías antes del primer día
                for ($i = 1; $i < $startWeekday; $i++): ?>
                    <td></td>
                <?php endfor; ?>

                <?php
                $currentWeekday = $startWeekday;
                for ($day = 1; $day <= $daysInMonth; $day++):
                    if ($currentWeekday > 7) {
                        $currentWeekday = 1;
                        echo '</tr><tr>';
                    }
                    ?>
                    <td>
                        <div class="day-number"><?= $day ?></div>
                        <?php if (!empty($data['eventsByDay'][$day])): ?>
                            <?php foreach ($data['eventsByDay'][$day] as $event): ?>
                                <div class="event-item">
                                    <strong><?= htmlspecialchars($event['title']) ?></strong><br>
                                    <?php if (!empty($event['event_time'])): ?>
                                        <small><?= substr($event['event_time'], 0, 5) ?> - </small>
                                    <?php endif; ?>
                                    <?php if (!empty($event['description'])): ?>
                                        <small><?= htmlspecialchars(mb_strimwidth($event['description'], 0, 40, '...')) ?></small><br>
                                    <?php endif; ?>
                                    <a href="index.php?controller=calendar&action=destroy&id=<?= $event['id'] ?>&year=<?= $year ?>&month=<?= $month ?>"
                                       onclick="return confirm('¿Eliminar este evento?');">
                                        Eliminar
                                    </a>
                                </div>
                            <?php endforeach; ?>
                        <?php endif; ?>
                    </td>
                    <?php
                    $currentWeekday++;
                endfor;

                // celdas vacías al final
                while ($currentWeekday <= 7) {
                    echo '<td></td>';
                    $currentWeekday++;
                }
                ?>
            </tr>
        </tbody>
    </table>
</body>
</html>
