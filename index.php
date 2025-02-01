<?php
session_start();
session_unset();
require "scripts/php/printArr.php";

if (isset($_SERVER['HTTP_COOKIE'])) {
    foreach (explode(';', $_SERVER['HTTP_COOKIE']) as $cookie) {
        $name = trim(explode('=', $cookie)[0]);
        setcookie($name, '', time() - 3600, '/');
        setcookie($name, '', time() - 3600, '/', $_SERVER['HTTP_HOST'], true, true);
    }
}
?>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="author" content="Michał Ożdżyński">
    <link rel="stylesheet" href="styles/index.css">
    <link rel="stylesheet" href="styles/style.css">
    <title>KOŁO FORTUNY</title>
    <script src="scripts/js/surprise.js"></script>
</head>
<body>
<div class="container">
    <h1>KOŁO FORTUNY</h1>
    <div class="message">
        <form method="post" action="nicknames.php">
            <label for="howLong">Długość słowa:</label>
            <input style="text-align: center" type="number" name="howLong" id="howLong" class="tbx" value="7" min="3"
                   max="11"><br>
            <label for="players">Ilość graczy:</label>
            <input style="text-align: center" type="number" name="howMuchPlayers" id="players" class="tbx" value="1"
                   min="1" max="3"><br>
            <label for="surprise" id="lblSurprise">Zaskocz mnie</label>
            <input type="checkbox" name="surprise" id="surprise" onclick="isChecked()"><br>
            <input type="submit" class="send" value="GRAJ">
        </form>
    </div>
</div>
</body>
</html>