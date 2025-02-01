function isChecked() {
    const checkBox = document.getElementById("surprise");
    const howLong = document.getElementById("howLong");
    const players = document.getElementById("players");

    if (checkBox.checked) {
        howLong.value = getRandomValue(4, 11);
        players.value = getRandomValue(1, 3);
    } else {
        howLong.value = 5;
        players.value = 1;
    }

    howLong.readOnly = checkBox.checked;
    players.readOnly = checkBox.checked;
}

function getRandomValue(min, max) {
    return Math.floor(Math.random() * (max - min)) + min;
}