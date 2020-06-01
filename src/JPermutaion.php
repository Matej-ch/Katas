<?php


namespace App;


class JPermutaion
{

    public static function joshephus(array $items, int $k): array
    {
            $permutation = [];
            if(empty($items)) { return $permutation; }

            if($k === 1) { return $items; }

            $i = $k - 1;

            $itemsSize = count($items);

            while (!empty($items)) {

                if($i >= $itemsSize) {
                    $items = array_values($items);
                    $itemsSize = count($items);
                    echo "items reset: ". print_r($items,true) . "\n";
                    echo "i ($i) is bigger than array " . print_r($i,true)."\n";//die();
                    $i = $k - 1;
                    echo "new i ($i) is: " . print_r($i,true)."\n";//die();
                }

                $permutation[] = $items[$i];

                if(isset($items[$i])) { unset($items[$i]); }

                echo "items with unset: " . print_r($items,true)."\n";
                echo "permutation: " . print_r($permutation,true)."\n";
                echo "----------------------------------------------------\n";

                $i += $k;
            }

            echo "last permutation: " . print_r($permutation,true)."\n";die();

            return $permutation;
    }
}