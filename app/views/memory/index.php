<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Juego de memoria con cartas</title>
    <style>
        body {
            font-family: Arial, sans-serif;
        }
        .top-bar {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 10px;
        }
        .board {
            display: grid;
            grid-template-columns: repeat(4, 80px);
            grid-gap: 10px;
            margin-top: 10px;
        }
        .card {
            width: 80px;
            height: 80px;
            background: #1976d2;
            color: white;
            display: flex;
            justify-content: center;
            align-items: center;
            font-size: 2rem;
            cursor: pointer;
            border-radius: 6px;
            user-select: none;
            transition: background 0.2s, transform 0.2s;
        }
        .card.revealed {
            background: #eeeeee;
            color: #333;
            cursor: default;
            transform: scale(1.02);
        }
        .card.matched {
            background: #66bb6a;
            color: #fff;
            cursor: default;
        }
        .disabled {
            pointer-events: none;
            opacity: 0.6;
        }
        button {
            padding: 4px 10px;
        }
    </style>
</head>
<body>
    <h1>Juego de memoria con cartas</h1>

    <p><a href="index.php?controller=home&action=index">← Volver al menú</a></p>

    <div class="top-bar">
        <div>
            Intentos: <span id="moves">0</span> |
            Aciertos: <span id="matches">0</span>/8
        </div>
        <div>
            <button id="resetBtn">Reiniciar juego</button>
        </div>
    </div>

    <div class="board" id="board"></div>

    <script>
        const boardEl = document.getElementById('board');
        const movesEl = document.getElementById('moves');
        const matchesEl = document.getElementById('matches');
        const resetBtn = document.getElementById('resetBtn');

        let cards = [];
        let firstCard = null;
        let secondCard = null;
        let lockBoard = false;
        let moves = 0;
        let matches = 0;

        function generateCards() {
            // 8 pares = 16 cartas; usamos letras A-H
            const values = ['A','B','C','D','E','F','G','H'];
            const pairValues = values.concat(values); // duplicamos
            // barajar
            for (let i = pairValues.length - 1; i > 0; i--) {
                const j = Math.floor(Math.random() * (i + 1));
                [pairValues[i], pairValues[j]] = [pairValues[j], pairValues[i]];
            }
            return pairValues;
        }

        function createBoard() {
            boardEl.innerHTML = '';
            const values = generateCards();
            cards = [];

            values.forEach((val, index) => {
                const cardEl = document.createElement('div');
                cardEl.classList.add('card');
                cardEl.dataset.value = val;
                cardEl.dataset.index = index;
                cardEl.textContent = ''; // oculta al inicio

                cardEl.addEventListener('click', () => handleCardClick(cardEl));

                boardEl.appendChild(cardEl);
                cards.push(cardEl);
            });

            moves = 0;
            matches = 0;
            movesEl.textContent = moves;
            matchesEl.textContent = matches;
            firstCard = null;
            secondCard = null;
            lockBoard = false;
        }

        function handleCardClick(cardEl) {
            if (lockBoard) return;
            if (cardEl === firstCard) return;
            if (cardEl.classList.contains('matched')) return;

            revealCard(cardEl);

            if (!firstCard) {
                firstCard = cardEl;
                return;
            }

            secondCard = cardEl;
            moves++;
            movesEl.textContent = moves;
            checkMatch();
        }

        function revealCard(cardEl) {
            cardEl.classList.add('revealed');
            cardEl.textContent = cardEl.dataset.value;
        }

        function hideCard(cardEl) {
            cardEl.classList.remove('revealed');
            cardEl.textContent = '';
        }

        function checkMatch() {
            if (!firstCard || !secondCard) return;

            const isMatch = firstCard.dataset.value === secondCard.dataset.value;

            if (isMatch) {
                firstCard.classList.add('matched');
                secondCard.classList.add('matched');
                matches++;
                matchesEl.textContent = matches;

                resetTurn();

                if (matches === 8) {
                    setTimeout(() => {
                        alert(`¡Ganaste! Intentos: ${moves}`);
                    }, 300);
                }
            } else {
                lockBoard = true;
                setTimeout(() => {
                    hideCard(firstCard);
                    hideCard(secondCard);
                    resetTurn();
                }, 800);
            }
        }

        function resetTurn() {
            [firstCard, secondCard] = [null, null];
            lockBoard = false;
        }

        resetBtn.addEventListener('click', () => {
            createBoard();
        });

        // Inicializar
        createBoard();
    </script>
</body>
</html>
