<?php
session_start();
require "scripts/php/printArr.php";
?>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="author" content="Michał Ożdżyński">
    <link rel="stylesheet" href="styles/style.css">
    <title>WISIELEC</title>
</head>
<body>
<div class="container">
    <h1>WISIELEC</h1>
    <div class="message">Gra zakończona!</div>
        <div class="message">
            <h5>NAGRODĘ W WYSOKOŚCI <?php echo $_SESSION["_prizes"][$_SESSION["_playersNames"][$_SESSION["_turn"]]] ?> PLN WYGRYWA GRACZ: <?= $_SESSION["_playersNames"][$_SESSION["_turn"]] ?></h5><br>
        </div>
    <div class="message">Poprawna odpowiedź: <?php echo $_SESSION["_correctAns"] ?></div>
    <a href="index.php" class="send">Zagraj ponownie</a>
</div>
</body>
</html>