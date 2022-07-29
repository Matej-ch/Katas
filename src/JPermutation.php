<?php


namespace App;

/**
 * https://en.wikipedia.org/wiki/Josephus_problem
 *
 * https://www.codewars.com/kata/5550d638a99ddb113e0000a2/train
 */
class JPermutation
{

    public static function joshephus(array $n, int $k): array
    {
        if(empty($n)) {
            return [];
        }

        --$k;
        $index = $k;

        $result = [];

        while (count($n) > 1) {
            $result[] = $n[$index];
            unset($n[$index]);
            $n = array_values($n);

            $index = ($index + $k) % count($n);
        }

        $result[] = $n[0];
        return $result;
    }
}