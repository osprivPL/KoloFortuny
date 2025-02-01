<?php
session_start();
//    error_reporting(E_ERROR | E_PARSE);

require "scripts/php/generateAns.php";
require "scripts/php/printArr.php";

if (!isset($_SESSION["_correctAns"])) {

    for ($i = 0; $i < $_SESSION["_players"]; $i++) {
        $_SESSION["_playersNames"][] = $_POST["nick" . $i];
    }
    $_SESSION["_actualString"] = str_repeat("_", intval($_SESSION["_wordLength"]));
    $_SESSION["_correctAns"] = generateAns($_SESSION["_wordLength"]);
    $_SESSION["_guessed"] = array();
    $_SESSION["_wrong"] = array();
    $_SESSION["_win"] = 0;
    $_SESSION["_turn"] = -1;

    foreach ($_SESSION["_playersNames"] as $key => $value) {
        $_SESSION["_prizes"][$key] = $value;
    }

}

if ($_SESSION["_turn"] != -2) {
    $_SESSION["_turn"]++;
    if ($_SESSION["_turn"] == $_SESSION["_players"]) {
        $_SESSION["_turn"] = 0;
    }
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
            $_SESSION["__guessed"][] = $guess;
        } else {
            $_SESSION["_wrong"][] = $guess;
        }


        $_POST["guess"] = '';
        $guess = '';
    }
}
if ($_SESSION["_correctAns"] == $_SESSION["_actualString"]) {
    $_SESSION["_turn"]--;
    if ($_SESSION["_turn"] == -1) {
        $_SESSION["_turn"] = $_SESSION["_players"] - 1;
    }
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
<header>
<h1>KOŁO FORTUNY</h1>
<?php
    echo '<table>';
    foreach ($_SESSION["_prizes"] as $key => $value) {
        echo '<tr>';
        echo '<td class = "tdh">' . $key . '</td>';
        echo '</tr>';
    }
    foreach ($_SESSION["_prizes"] as $key => $value) {
        echo '<tr>';
        echo '<td style = "width: 25%" class = "tdh">' . $value . '</td>';
        echo '</tr>';
    }

    echo '</table>';

    echo '<h2>Kolej gracza: ' . $_SESSION["_playersNames"][$_SESSION["_turn"]] . '</h2>';
?>
</header>
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

    <button class="send" id ="losuj" onclick="price()">LOSUJ</button>
    <p id = "valueP"></p>

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
    echo '<input type="submit" class="send" value="STRZEL" id = "strzel" disabled = "true">';
    echo '</form>';

    echo '<div style = "clear:both"></div>';


    echo '<div class="message">';
        echo '<p>POPRAWNE: </p>';
        printArr($_SESSION["__guessed"]);
    echo '</div>';

    echo '<div class="message">';
        echo '<p>NIEPOPRAWNE: </p>';
        printArr($_SESSION["__wrong"]);
    echo '</div>';

    echo '<div style = "clear:both"></div>';
    echo '</main>';

//    echo '<div>';
    printSession();
//    printArr($_COOKIE);
//    echo '</div>';
?>
</body>
<script>
    window.onload = function () {
        document.getElementById('guess').focus();
    };
</script>
</html>
