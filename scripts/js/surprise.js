function isChecked() {
    const checkBox = document.getElementById("surprise");
    const howLong = document.getElementById("howLong");
    if (checkBox.checked) {
        howLong.value = Math.floor(Math.random() * 8) + 4;
        howLong.readOnly = true;
    } else {
        howLong.value = 5;
        howLong.readOnly = false;
    }
}