function isChecked() {
    const attempts = document.getElementById("attempts");
    const checkBox = document.getElementById("surprise");
    const howLong = document.getElementById("howLong");
    if (checkBox.checked){
        do {
            howLong.value = Math.floor(Math.random() * 8) + 4;
            howLong.readOnly = true;
            attempts.value = Math.floor(Math.random() * 21) + 3;
            attempts.readOnly = true;
        }while (attempts.value < howLong.value);
    } else {
        howLong.value = 5;
        howLong.readOnly = false;
        attempts.value = 5;
        attempts.readOnly = false;
    }
}