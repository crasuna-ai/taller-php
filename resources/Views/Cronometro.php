<div class="card">
    <h1><?= htmlspecialchars($title); ?></h1>
    <p>Controla el tiempo de tus ejercicios prácticos.</p>
    <div style="font-size:3rem; font-weight:700; margin:1rem 0;" id="timer">00:00.0</div>
    <div style="display:flex; gap:0.5rem;">
        <button class="btn" id="start">Iniciar</button>
        <button class="btn secondary" id="pause">Pausar</button>
        <button class="btn muted" id="reset">Reiniciar</button>
    </div>
</div>
<script>
    const timerEl = document.getElementById('timer');
    let startAt = null, elapsed = 0, interval = null;

    function update() {
        const delta = Date.now() - startAt + elapsed;
        const totalSeconds = Math.floor(delta / 1000);
        const minutes = String(Math.floor(totalSeconds / 60)).padStart(2, '0');
        const seconds = String(totalSeconds % 60).padStart(2, '0');
        const tenths = Math.floor((delta % 1000) / 100);
        timerEl.textContent = `${minutes}:${seconds}.${tenths}`;
    }

    document.getElementById('start').onclick = () => {
        if (interval) return;
        startAt = Date.now();
        interval = setInterval(update, 100);
    };

    document.getElementById('pause').onclick = () => {
        if (!interval) return;
        clearInterval(interval);
        interval = null;
        elapsed += Date.now() - startAt;
    };

    document.getElementById('reset').onclick = () => {
        clearInterval(interval);
        interval = null;
        startAt = null;
        elapsed = 0;
        timerEl.textContent = '00:00.0';
    };
</script>