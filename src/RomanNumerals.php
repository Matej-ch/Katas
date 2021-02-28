<?php

namespace App;


class RomanNumerals
{

    public const NUMERALS = [
        'M' => 1000,
        'CM' => 900,
        'D' => 500,
        'CD' => 400,
        'C' => 100,
        'XC' => 90,
        'L' => 50,
        'XL' => 40,
        'X' => 10,
        'IX' =>9,
        'V' => 5,
        'IV' => 4,
        'I' => 1,
    ];

    public static function generate($number)
    {

        if($number < 1 || $number > 3999) { return false; }

        $result = '';

        foreach (static::NUMERALS as $numeral => $arabic) {
            while ($number >= $arabic) {
                $result .= $numeral;

                $number -= $arabic;
            }
        }

        return $result;
    }

    public static function generateNumber($romanString): int
    {
        $result = 0;

        foreach (static::NUMERALS as $roman => $numeric) {
            while (strpos($romanString, $roman) === 0) {
                $result += $numeric;
                $romanString = substr($romanString, strlen($roman));
            }
        }

        return $result;
    }
}