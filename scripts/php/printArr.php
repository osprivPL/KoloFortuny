<?php
error_reporting(E_ERROR | E_PARSE);

function printArr(&$arr): void
{
    foreach ($arr as $key => $value) {
        if (is_array($value)) {
            echo $key.'=>';
            printArr($value);
            echo '<br>';
        } else {
            echo $key.'=>'.$value.'<br>';
        }
    }
}

function printSession(): void
{
    foreach ($_SESSION as $key => $value) {
        if (is_array($value)) {
            echo $key.'=>';
            printArr($value);
            echo '<br>';
        } else {
            echo $key.'=>'.$value.'<br>';
        }
    }
}
