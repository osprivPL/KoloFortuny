<?php
    session_start();
    require "scripts/php/printArr.php";
//    error_reporting(E_ERROR | E_PARSE);
?>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <meta name="author" content="Michał Ożdżyński">
    <link rel="stylesheet" href="styles/style.css">
<!--    <link rel="stylesheet" href ="styles/end.css">-->
    <title>WISIELEC</title>

</head>
<body>
<div class="container">
    <h1>WISIELEC</h1>
    <div class="message">Gra zakończona!</div>
    <?php
        if ($_SESSION["_win"] == 1){
            echo '<div class="message">';
                echo "Udało ci się wygrać w ".$_SESSION["_actualAttempts"]." próbach!";
            echo '</div>';
        }
        else{
            echo '<div class="message">PRZEGRANA!</div>';
        }
        echo "<div class='message'>Poprawna odpowiedź: ".$_SESSION["_correctAns"]."</div>";
        
//        printArr($_SESSION);
    ?>


    <a href="index.php" id="send">Zagraj ponownie</a>
</div>
</body>
</html>
