<?php
session_start();
//error_reporting(E_ERROR | E_PARSE);
    $_SESSION["_wordLength"] = $_POST["howLong"];
    $_SESSION["_players"] = $_POST["howMuchPlayers"];
    $_SESSION["_playersNames"] = array();
?>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="author" content="Michał Ożdżyński">

    <link rel="stylesheet" href="styles/style.css">
    <title>KOŁO FORTUNY</title>
</head>
<body>
<div class="container">

    <h1>KOŁO FORTUNY</h1>
    <div class="message">
        <form method="post" action="game.php">
            <?php
            for ($i = 0; $i < $_SESSION["_players"]; $i++) {
                echo '<label for="nick' . $i . '">Gracz' . ($i + 1).': </label>';
                echo '<input type="text" name="nick' . $i . '" id="nick' . $i . '" class="tbx"><br>';
            }
            ?>
            <input type="submit" class="send" value="GRAJ">
        </form>
    </div>
</div>
</body>
</html>