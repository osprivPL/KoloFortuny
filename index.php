<?php
session_start();
session_unset();
error_reporting(E_ERROR | E_PARSE);

?>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="author" content="Michał Ożdżyński">

    <link rel="stylesheet" href="styles/index.css">
    <link rel="stylesheet" href="styles/style.css">
    <script src="scripts/js/surprise.js"></script>
    <title>WISIELEC</title>
</head>
<body>
<div class="container">

    <h1>WISIELEC</h1>
    <div class="message">
        <form method="post" action="game.php">
            <label for="howLong">Długość słowa:</label><input style="text-align: center" type="number" name="howLong"
                                                              id="howLong" class="tbx" value="7" min="3" max="11"><br>
            <label for="attempts">Ilość prób: </label><input style="text-align: center" type="number" name="attempts"
                                                             id="attempts" class="tbx" value="10" min="3" max="23"><br>
            <label for="surprise" id="lblSurprise">Zaskocz mnie</label><input type="checkbox" name="surprise"
                                                                              id="surprise" onclick="isChecked()"><br>
            <input type="submit" id="send" value="GRAJ">
        </form>
    </div>
</div>
</body>
</html>