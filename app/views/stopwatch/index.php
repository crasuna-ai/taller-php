<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Cronómetro online</title>
    <style>
        body { font-family: Arial, sans-serif; }
        .time { font-size: 3rem; margin-bottom: 10px; }
        button { margin: 5px; padding: 5px 10px; }
        ul { margin-top: 10px; }
    </style>
</head>
<body>
    <h1>Cronómetro online</h1>

    <p><a href="index.php?controller=home&action=index">← Volver al menú</a></p>

    <div class="time" id="display">00:00:00.000</div>

    <button id="startBtn">Iniciar</button>
    <button id="pauseBtn">Pausar</button>
    <button id="resetBtn">Reiniciar</button>
    <button id="lapBtn">Vuelta</button>

    <h3>Vueltas</h3>
    <ul id="laps"></ul>

    <script>
        let startTime = null;
        let elapsed = 0;
        let intervalId = null;

        const display = document.getElementById('display');
        const lapsUl  = document.getElementById('laps');

        function formatTime(ms) {
            const totalSeconds = Math.floor(ms / 1000);
            const milli = ms % 1000;
            const seconds = totalSeconds % 60;
            const minutes = Math.floor(totalSeconds / 60) % 60;
            const hours   = Math.floor(totalSeconds / 3600);

            const pad = n => n.toString().padStart(2, '0');
            const padMs = n => n.toString().padStart(3, '0');

            return `${pad(hours)}:${pad(minutes)}:${pad(seconds)}.${padMs(milli)}`;
        }

        function updateDisplay() {
            const now = Date.now();
            const diff = elapsed + (now - startTime);
            display.textContent = formatTime(diff);
        }

        document.getElementById('startBtn').addEventListener('click', () => {
            if (intervalId !== null) return; // ya corriendo
            startTime = Date.now();
            intervalId = setInterval(updateDisplay, 10);
        });

        document.getElementById('pauseBtn').addEventListener('click', () => {
            if (intervalId === null) return;
            clearInterval(intervalId);
            intervalId = null;
            elapsed += Date.now() - startTime;
        });

        document.getElementById('resetBtn').addEventListener('click', () => {
            clearInterval(intervalId);
            intervalId = null;
            startTime = null;
            elapsed = 0;
            display.textContent = '00:00:00.000';
            lapsUl.innerHTML = '';
        });

        document.getElementById('lapBtn').addEventListener('click', () => {
            const li = document.createElement('li');
            li.textContent = display.textContent;
            lapsUl.appendChild(li);
        });
    </script>
</body>
</html>
