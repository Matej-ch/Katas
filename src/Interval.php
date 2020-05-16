<?php


namespace App;


class Interval
{

    public static function sum(array $intervals): int
    {
        $intervalLengths = [];

        // remove duplicates
        $uniqueI = array_unique($intervals, SORT_REGULAR);

        //sort from low to high based on first element
        usort($uniqueI, static function ($a, $b) { return $a[0] - $b[0]; });

        $index = 0; // Stores index of last element
        // check all input Intervals
        $uniqueCount = count($uniqueI);
        for ($i = 0; $i < $uniqueCount; $i++) {
            // If this is not first Interval and overlaps
            // with the previous one
            if ($index !== 0 && $uniqueI[$index-1][1] > $uniqueI[$i][0]) {
                while ($index !== 0 && $uniqueI[$index-1][1] > $uniqueI[$i][0]) {
                    // Merge previous and current Intervals
                    $uniqueI[$index-1][1] = max($uniqueI[$index-1][1], $uniqueI[$i][1]);
                    $uniqueI[$index-1][0] = min($uniqueI[$index-1][0], $uniqueI[$i][0]);
                    $index--;
                }
            } else { // Doesn't overlap with previous, add to solution
                $uniqueI[$index] = $uniqueI[$i];
            }
            $index++;
        }

        for ($i=0; $i < $index; $i++) {
            $intervalLengths[] = $uniqueI[$i][1] - $uniqueI[$i][0];
        }

        return array_sum($intervalLengths);
    }
}