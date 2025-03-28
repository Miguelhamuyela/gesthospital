// Script.js

document.addEventListener("DOMContentLoaded", function() {
    const startButton = document.getElementById("startButton");
    const countdownDisplay = document.getElementById("countdown");

    let timeLeft = 600; // 10 minutos em segundos
    let countdownInterval;

    startButton.addEventListener("click", function() {
        document.getElementById("countdownDisplay").style.display = "block"; // Mostrar o contador

        countdownInterval = setInterval(function() {
            timeLeft--;
            if (timeLeft >= 0) {
                let minutes = Math.floor(timeLeft / 60);
                let seconds = timeLeft % 60;
                countdownDisplay.textContent = `${minutes}:${seconds < 10 ? '0' : ''}${seconds}`;
            } else {
                clearInterval(countdownInterval);
                countdownDisplay.textContent = "Tempo esgotado!";
            }
        }, 1000); // Atualiza a cada segundo (1000 milissegundos)
    });
});
