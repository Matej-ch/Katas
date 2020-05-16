<?php


namespace App;


class Determinant
{
    private $matrix;
    private $matrixSize;

    public function __construct($matrix)
    {
        $this->matrix = $matrix;
        $this->matrixSize = count($matrix);
    }

    public function calculate(): int
    {
        $determinant = 1;
        $total = 1;
        $helperArray = [];

        $matrix = $this->matrix;

        for ($i = 0;$i < $this->matrixSize;$i++) { // traversing diagonal elements
            $index = $i;

            //find index with non zero value
            while($matrix[$index][$i] == 0 && $index < $this->matrixSize) {
                $index++;
            }

            if($index === $this->matrixSize) continue;

            if($index !== $i) {
                for($j = 0; $j < $this->matrixSize; $j++) {
                    $temp = $matrix[$index][$j];
                    $matrix[$index][$j] = $matrix[$i][$j];
                    $matrix[$i][$j] = $temp;
                }

                $determinant *= -1 ** ($index - $i);
            }

            //storing the values of diagonal row elements
            for($j = 0; $j < $this->matrixSize; $j++) {
                $helperArray[$j] = $matrix[$i][$j];
            }

            //traversing every row below the diagonal element
            for($j = $i+1; $j < $this->matrixSize; $j++) {
                $num1 = $helperArray[$i]; //value of diagonal element
                $num2 = $matrix[$j][$i]; //value of next row element

                //traversing every column of row
                // and multiplying to every row
                for($k = 0; $k < $this->matrixSize; $k++) {
                    //multiplying to make the diagonal
                    // element and next row element equal
                    $matrix[$j][$k] = ($num1 * $matrix[$j][$k]) - ($num2 * $helperArray[$k]);

                }
                $total *= $num1; // Det(kA)=kDet(A);
            }
        }

        //multiply the diagonal elements to get determinant
        for($i = 0; $i < $this->matrixSize; $i++) {
            $determinant *= $matrix[$i][$i];
        }

        return ($determinant/$total);
    }
}