<?php
session_start();
//    error_reporting(E_ERROR | E_PARSE);

require "scripts/php/generateAns.php";
require "scripts/php/printArr.php";

if (!isset($_SESSION["_correctAns"])) {
    $_SESSION["guessed"] = array();
    $_SESSION["wrong"] = array();
    $wordLength = $_POST["howLong"];
    $_SESSION["_actualString"] = str_repeat("_", intval($wordLength));
    $_SESSION["_win"] = 0;
    $_SESSION["_correctAns"] = generateAns($wordLength);
}



if ($_SESSION['_actualString'] != $_SESSION['_correctAns']) {
    $guess = $_POST["guess"];
    if ($guess == $_SESSION["_correctAns"]) {
        $_SESSION["_actualString"] = $_SESSION["_correctAns"];

    } else {
        $found = FALSE;
        $guess = strtolower($guess);

        for ($i = 0; $i < strlen($_SESSION["_actualString"]); $i++) {
            if ($_SESSION["_correctAns"][$i] == $guess) {
                $_SESSION["_actualString"][$i] = $guess;
                $found = TRUE;
            }
        }
        if ($found) {
            $_SESSION["guessed"][] = $guess;
        } else {
            $_SESSION["wrong"][] = $guess;
        }


        $_POST["guess"] = '';
        $guess = '';
    }
}
if ($_SESSION["_correctAns"] == $_SESSION["_actualString"]) {
    $_SESSION["_win"] = 1;
}

if ($_SESSION["_win"] == 1) {
    header("Location: end.php");
    exit();
}
?>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="author" content="Michał Ożdżyński">

    <link rel="stylesheet" href="styles/game.css">
    <link rel="stylesheet" href="styles/style.css">
    <script src="scripts/js/price.js"></script>

    <title>game</title>
</head>
<body>
<h1>KOŁO FORTUNY</h1>
<aside>
    <table>
        <thead>
            <tr>
                <th  id = "r0" style="background-color: #808080">CENA</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td  id = "r1">50$</td>
            </tr>
            <tr>
                <td id = "r2">100$</td>
            </tr>
            <tr>
                <td id = "r3">150$</td>
            </tr>
            <tr>
                <td id = "r4">200$</td>
            </tr>
            <tr>
                <td id = "r5">250$</td>
            </tr>
            <tr>
                <td id = "r6">500$</td>
            </tr>
        </tbody>
    </table>

    <button id="send" onclick="price()">LOSUJ</button>
</aside>
<main>
<?php
    echo '<form method = "post">';
        echo '<h3>';
        for ($i = 0; $i < strlen($_SESSION["_actualString"]); $i++) {
            echo $_SESSION["_actualString"][$i] . ' ';
        }
        echo '<br>';
    echo '</h3>';
    echo '<input style="text-align: center" type="text" class="tbx" placeholder="Zgaduj..." id="guess" name = "guess"><br>';
    echo '<input type="submit" id="send" value="STRZEL">';
    echo '</form>';

    echo '<div style = "clear:both"></div>';


    echo '<div class="message">';
        echo '<p>POPRAWNE: </p>';
        printArr($_SESSION["guessed"]);
    echo '</div>';

    echo '<div class="message">';
        echo '<p>NIEPOPRAWNE: </p>';
        printArr($_SESSION["wrong"]);
    echo '</div>';

    echo '<div style = "clear:both"></div>';
    echo '</main>';

    printSession();
?>
</body>
<script>
    window.onload = function () {
        document.getElementById('guess').focus();
    };
</script>
</html>
