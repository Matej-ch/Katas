<?php


namespace App;


class NumberFinder
{
    public static function find(array $a): int
    {
        sort($a);

        $count = count($a);

        if($count === $a[$count-1]) {
            return $count + 1;
        }
        
        $result = 1;
        foreach ($a as $i => $iValue) {
            if(!isset($a[$i+1])) { break; }
            if(abs($iValue - $a[$i+1]) > 1) {
                $result = $iValue + 1;
            }
        }

        return $result;
    }
}