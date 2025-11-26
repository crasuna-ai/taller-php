<div class="card">
    <h1><?= htmlspecialchars($title ?? 'Memorama'); ?></h1>
    <p>Encuentra todas las parejas.</p>
    <div id="grid" class="grid"></div>
</div>

<style>
    .grid {
        display: grid;
        grid-template-columns: repeat(4, minmax(80px, 1fr));
        gap: 10px;
        margin-top: 1rem;
    }

    .grid button {
        height: 100px;
        font-size: 2rem;
        border-radius: 8px;
        border: 1px solid #ccc;
        cursor: pointer;
    }

    .grid button.found {
        background: #4caf50;
        color: #fff;
    }
</style>

<script>
document.addEventListener('DOMContentLoaded', () => {
    const icons = ['A','B','C','D','E','F'];
    const pairs = [...icons, ...icons].sort(() => Math.random() - 0.5);
    const grid = document.getElementById('grid');

    let first = null;
    let lock = false;
    let foundCount = 0;

    pairs.forEach(icon => {
        const card = document.createElement('button');
        card.dataset.icon = icon;
        card.textContent = '❓';
        card.addEventListener('click', () => flip(card));
        grid.appendChild(card);
    });

    function flip(card) {
        if (lock || card.classList.contains('found') || card === first) return;

        card.textContent = card.dataset.icon;

        
        if (!first) {
            first = card;
            return;
        }

        if (first.dataset.icon === card.dataset.icon) {
            first.classList.add('found');
            card.classList.add('found');
            foundCount += 2;

            if (foundCount === pairs.length) {
                alert('¡Ganaste!');
            }

            first = null;
        } else {
            lock = true;
            setTimeout(() => {
                first.textContent = '❓';
                card.textContent = '❓';
                first = null;
                lock = false;
            }, 600);
        }
    }
});
</script>
