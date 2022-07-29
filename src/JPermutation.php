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
        $k--;

        $index = 0;

        if($k === 1) {
            return $n;
        }

        self::josh($n, $k, $index, $result);

        return $result;
        echo '<pre>' . print_r($result, true) . '</pre>';
        die();
    }

    public static function josh(array $n, int $k, int $index, &$result): void
    {
        if (count($n) === 1) {
            $result[] = $n[0];
            return;
        }

        $index = (($index + $k) % count($n));

        /*if($index <= count($n)) {
            return;
        }*/

        echo '<pre>'.print_r($result,true).'</pre>';
        echo '<pre>'.print_r($index,true). "\n";
        $result[] = $n[$index];
        unset($n[$index]);

        self::josh($n, $k, $index, $result);
        //if($index > -1) {

        //}


        /*echo '<pre>$result: '.print_r($result,true)."\n";
        echo '<pre>$index: '.print_r($index,true)."\n";
        echo '<pre>$k: '.print_r($k,true)."\n";
        echo '<pre>$n: '.print_r(array_values($n),true)."\n";die();*/


    }
}