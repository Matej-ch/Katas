<?php


namespace App;


class NinetyNineBottles
{

    public function sing(): string
    {
        return $this->verses(99,1);
    }

    public function verses($start,$end): string
    {
        return implode("\r\n",array_map(
            fn($number) => $this->verse($number),
            range($start,$end)));
    }

    public function verse($number): string
    {
        if($number === 2) {
            return "2 bottles of beer on the wall,
2 bottles of beer!
Take one down,
Pass it around,
1 bottle of beer on the wall!\r\n";
        }

        if($number === 1) {
            return "1 bottle of beer on the wall,
1 bottle of beer!
Take one down,
Pass it around,
No more bottles of beer on the wall!\r\n";
        }

        return
            "$number bottles of beer on the wall,\r\n" .
            "$number bottles of beer!\r\n" .
            "Take one down,\r\n" .
            "Pass it around,\r\n" .
            ($number - 1) ." bottles of beer on the wall!\r\n";
    }
}