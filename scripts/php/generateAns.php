<?php
const SLOWA = [
    3 => ["kot", "dom", "las", "kij"],
    4 => ["ryba", "pies", "kawa", "mama", "tata", "lato", "zima", "ptak", "koza", "wino", "okno"],
    5 => ["rower", "drzwi", "pomoc", "kwiat", "lampa"],
    6 => ["apteka", "drzewo", "wiosna", "cukier", "kanapa", "kwiaty"],
    7 => ["fryzjer", "samolot", "traktor", "telefon", "fotelik", "rodzina"],
    8 => ["tygodnik", "komputer", "szklanka", "kwiatowy", "kuchnia", "ceramika", "jedzenie"],
    9 => ["samochody", "telewizor", "kalendarz", "pracowity", "truskawka", "dzieciaki", "nauczyciel", "gospodarz"],
    10 => ["ceramiczna", "mieszkanie", "biblioteka", "niedzielny", "przyjaciel"],
    11 => ["przedszkole", "przedszkola", "telewizyjny", "komputerowy"]
];

function generateAns($wordLength): string {
    $words = SLOWA[$wordLength];
    return $words[array_rand($words)];
}
?>