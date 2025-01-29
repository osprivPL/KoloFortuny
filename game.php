<?php
session_start();
//    error_reporting(E_ERROR | E_PARSE);

require "scripts/php/generateAns.php";
require "scripts/php/printArr.php";

if (!isset($_SESSION["_actualAttempts"])) {
    $_SESSION["guessed"] = array();
    $_SESSION["wrong"] = array();
    $wordLength = $_POST["howLong"];
    $_SESSION["_actualAttempts"] = -1;
    $_SESSION["_actualString"] = str_repeat("_", intval($wordLength));
    $_SESSION["_attempts"] = $_POST["attempts"];
    $_SESSION["_win"] = 0;
    $_SESSION["_correctAns"] = generateAns($wordLength);
}


if ($_SESSION["_actualAttempts"] != -20) {
    $_SESSION["_actualAttempts"]++;
}

if ($_SESSION['_actualAttempts'] > 0) {
    $guess = $_POST["guess"];
    if ($guess == '') {
        $_SESSION["_actualAttempts"]--;
    } else if (strlen($guess) > 1) {
        if ($guess == $_SESSION["_correctAns"]) {
            $_SESSION["_actualString"] = $_SESSION["_correctAns"];
        }
    } else {
        $found = FALSE;
        $guess = strtolower($guess);
        if (in_array($guess, $_SESSION["guessed"]) || in_array($guess, $_SESSION["wrong"])) {
            $_SESSION["_actualAttempts"]--;
        } else {
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

        }
        $_POST["guess"] = '';
        $guess = '';
    }
}
if ($_SESSION["_correctAns"] == $_SESSION["_actualString"]) {
    $_SESSION["_win"] = 1;
}

if ($_SESSION["_attempts"] == $_SESSION["_actualAttempts"] || $_SESSION["_win"] == 1) {
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

    <title>WISIELEC</title>
</head>
<body>
<h1>WISIELEC</h1>
<?php
echo '<h2>POZOSTAŁO ' . ($_SESSION["_attempts"] - $_SESSION["_actualAttempts"]) . ' PRÓB</h2>';
echo '<form method = "post">';
echo '<h3>';
for ($i = 0; $i < strlen($_SESSION["_actualString"]); $i++) {
    echo $_SESSION["_actualString"][$i] . ' ';
}
echo '<br>';
echo '</h3>';
echo '<input style="text-align: center" type="text" class="tbx" placeholder="Enter text here..." id="guess" name = "guess"><br>';
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

//        printArr($_SESSION); podglad danych z sesji nie potrzebny, a funkcja została zmieniona
?>
</body>
<script>
    window.onload = function () {
        document.getElementById('guess').focus();
    };
</script>
</html>
