<div class="card">
    <h1><?= htmlspecialchars($title); ?></h1>
    <p>Voltea las cartas y encuentra las parejas. Cada recarga mezcla nuevamente el tablero.</p>
    <div id="grid" class="grid"></div>
</div>
<script>
    const icons = ['🍎','🍌','🍇','🍊','🍉','🍒'];
    const pairs = [...icons, ...icons].sort(() => Math.random() - 0.5);
    const grid = document.getElementById('grid');
    let first = null;

    pairs.forEach((icon, index) => {
        const card = document.createElement('button');
        card.className = 'card btn muted';
        card.style.height = '90px';
        card.dataset.icon = icon;
        card.textContent = '❓';
        card.onclick = () => flip(card);
        grid.appendChild(card);
    });

    function flip(card) {
        if (card.classList.contains('found') || card === first) return;
        card.textContent = card.dataset.icon;
        if (!first) { first = card; return; }
        if (first.dataset.icon === card.dataset.icon) {
            first.classList.add('found');
            card.classList.add('found');
        } else {
            setTimeout(() => { first.textContent = '❓'; card.textContent = '❓'; }, 600);
        }
        first = null;
    }
</script>