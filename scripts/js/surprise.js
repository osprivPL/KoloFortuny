function isChecked() {
    const checkBox = document.getElementById("surprise");
    const howLong = document.getElementById("howLong");
    const players = document.getElementById("players")
    if (checkBox.checked) {
        howLong.value = Math.floor(Math.random() * 8) + 4;
        howLong.readOnly = true;

        players.value = Math.floor(Math.random() * 2) + 1;
        players.readOnly = true;
    } else {
        howLong.value = 5;
        howLong.readOnly = false;

        players.value = 1;
        players.readOnly = false
    }
}