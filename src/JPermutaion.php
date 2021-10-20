<?php


namespace App;

/**
 * https://en.wikipedia.org/wiki/Josephus_problem
 *
 * https://www.codewars.com/kata/5550d638a99ddb113e0000a2/train
*/
class JPermutaion
{

    public static function joshephus(array $items, int $k): array
    {
        $permutation = [];
        if(empty($items)) { return $permutation; }

        if($k === 1) { return $items; }

        $size = count($items);

        return $permutation;
    }
}