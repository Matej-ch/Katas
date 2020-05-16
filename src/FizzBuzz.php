<?php


namespace App;


class FizzBuzz
{

    public static function convert($number)
    {
        $result = '';

        if($number % 3 === 0) {
            $result .= 'fizz';
        }

        if($number % 5 === 0) {
            $result .=  'buzz';
        }

        return !empty($result) ? $result : $number;

    }
}