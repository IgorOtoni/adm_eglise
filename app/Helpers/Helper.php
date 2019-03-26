<?php
/**
* change first char from word to upper
*
* @param $string
*/

function fistCharFromWord_toUpper($string)
{
    $st = '';
    $splitString = explode(' ', $string);
    foreach($splitString as $str){
        $str = ucfirst(strtolower($str));
        $st = $st.' '.$str;
    }
    return $st;   
}