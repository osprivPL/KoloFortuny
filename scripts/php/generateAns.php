<?php /** @noinspection ALL */
const SLOWA = array(3 => array("kot", "dom", "las", "kij"),
    4 => array("ryba", "pies", "kawa", "mama", "tata", "lato", "zima", "ptak", "koza", "wino", "okno"),
    5 => array("rower", "drzwi", "pomoc", "kwiat", "lampa"),
    6 => array("apteka",  "drzewo", "wiosna", "cukier", "kanapa", "kwiaty"),
    7 => array("fryzjer", "samolot", "traktor", "telefon", "fotelik", "rodzina"),
    8 => array("tygodnik", "komputer", "szklanka", "kwiatowy", "kuchnia", "ceramika", "jedzenie"),
    9 => array("samochody", "telewizor", "kalendarz", "pracowity", "truskawka", "dzieciaki", "nauczyciel", "gospodarz",),
    10 => array("ceramiczna", "mieszkanie", "biblioteka", "niedzielny", "przyjaciel"),
    11 => array("przedszkole", "przedszkola", "telewizyjny", "komputerowy"));

function generateAns($wordLength): string
{
    $slowaXliterowe = SLOWA[$wordLength];
    $slowo = $slowaXliterowe[rand(0, count($slowaXliterowe) - 1)];
    return $slowo;
}