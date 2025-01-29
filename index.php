<?php
session_start();
session_unset();
//error_reporting(E_ERROR | E_PARSE);

?>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="author" content="Michał Ożdżyński">

    <link rel="stylesheet" href="styles/index.css">
    <link rel="stylesheet" href="styles/style.css">
    <title>index</title>
</head>
<body>
<div class="container">

    <h1>KOŁO FORTUNY</h1>
    <div class="message">
        <form method="post" action="game.php">
            <label for="howLong">Długość słowa:</label><input style="text-align: center" type="number" name="howLong"
                                                              id="howLong" class="tbx" value="7" min="3" max="11"><br>
            <label for="players">Ilość graczy:</label><input style="text-align: center" type="number"
                                                             name="howMuchPlayers" id="players" class="tbx" value=1
                                                             min=1 max=3><br>
            <label for="surprise" id="lblSurprise">Zaskocz mnie</label><input type="checkbox" name="surprise"
                                                                              id="surprise" onclick="isChecked()"><br>
            <input type="submit" id="send" value="GRAJ">
        </form>
    </div>
</div>
</body>
</html>