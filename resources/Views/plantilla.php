<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= htmlspecialchars($title ?? 'Ejercicios Laravel'); ?></title>
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Inter:wght@400;600&display=swap">
    <style>
        :root {
            --primary: #2563eb;
            --bg: #f8fafc;
            --card: #ffffff;
            --text: #0f172a;
            --muted: #475569;
            --border: #e2e8f0;
        }
        * { box-sizing: border-box; }
        body {
            margin: 0;
            font-family: 'Inter', system-ui, -apple-system, sans-serif;
            background: radial-gradient(circle at 20% 20%, #e0f2fe, transparent 25%),
                        radial-gradient(circle at 80% 0%, #e9d5ff, transparent 20%),
                        var(--bg);
            color: var(--text);
        }
        header {
            background: #0f172a;
            color: white;
            padding: 1rem 1.5rem;
            display: flex;
            align-items: center;
            justify-content: space-between;
            position: sticky;
            top: 0;
            z-index: 10;
        }
        header a { color: #bfdbfe; text-decoration: none; font-weight: 600; }
        main { max-width: 1100px; margin: 2rem auto; padding: 0 1rem; }
        .card {
            background: var(--card);
            border: 1px solid var(--border);
            border-radius: 18px;
            padding: 1.5rem;
            box-shadow: 0 10px 40px rgba(15, 23, 42, 0.08);
        }
        h1 { margin-top: 0; }
        .grid { display: grid; grid-template-columns: repeat(auto-fit, minmax(240px, 1fr)); gap: 1rem; }
        .btn {
            display: inline-block;
            background: var(--primary);
            color: white;
            padding: 0.65rem 1rem;
            border-radius: 10px;
            border: none;
            cursor: pointer;
            font-weight: 600;
        }
        .btn.secondary { background: #0ea5e9; }
        .btn.muted { background: #475569; }
        form { margin: 0; }
        input, textarea, select {
            width: 100%;
            padding: 0.7rem;
            border-radius: 10px;
            border: 1px solid var(--border);
            margin-bottom: 0.75rem;
            font-size: 1rem;
        }
        table { width: 100%; border-collapse: collapse; }
        th, td { padding: 0.75rem; border-bottom: 1px solid var(--border); text-align: left; }
        .badge { display: inline-block; padding: 0.25rem 0.6rem; border-radius: 999px; font-size: 0.85rem; background: #e2e8f0; color: #0f172a; }
        nav ul { list-style: none; display: flex; gap: 0.75rem; padding: 0; margin: 0; }
        nav a { color: #cbd5e1; text-decoration: none; font-weight: 600; }
        nav a:hover { color: white; }
    </style>
</head>
<body>
<header>
    <div><a href="/">Taller Laravel</a></div>
    <nav>
        <ul>
            <li><a href="/tareas">Tareas</a></li>
            <li><a href="/gastos">Gastos</a></li>
            <li><a href="/propinas">Propinas</a></li>
            <li><a href="/contrasenas">Contraseñas</a></li>
            <li><a href="/cronometro">Cronómetro</a></li>
        </ul>
    </nav>
</header>
<main>
    <?= $content; ?>
</main>
</body>
</html>