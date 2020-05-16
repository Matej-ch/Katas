<?php


use App\Determinant;
use PHPUnit\Framework\TestCase;

class DeterminantTest extends TestCase
{
    /**
     * @test
     */
    function for_matrix_1_x_1_returns_its_one_and_only_element()
    {
        $determinant = new Determinant([[1]]);

        $this->assertEquals(1, $determinant->calculate(),'Determinant of a 1 x 1 matrix should equal the value of its one and only element');
    }

    /**
     * @test
     */
    function determinant_for_matrix_2_x_2()
    {
        $determinant = new Determinant([
            [1, 3],
            [2, 5]
        ]);

        $this->assertEquals(-1,$determinant->calculate(),"Should return 1 * 5 - 3 * 2, i.e., -1");
    }

    /**
     * @test
     */
    function determinant_for_matrix_3_x_3()
    {
        $determinant = new Determinant([
            [2, 5, 3],
            [1, -2, -1],
            [1, 3, 4]
        ]);

        $this->assertEquals(-20,$determinant->calculate(),'Should work for a 3 x 3 matrix and return -20');
    }

    /**
     * @test
     */
    function determinant_for_matrix_4_x_4()
    {
        $determinant = new Determinant([
            [1, 0, 2, -1],
            [3, 0, 0, 5],
            [2, 1, 4, -3],
            [1, 0, 5, 0]
        ]);

        $this->assertEquals(30,$determinant->calculate(),'Should work for a 4 x 4 matrix and return 30');
    }

    /**
     * @test
     */
    function determinant_for_matrix_5_x_5()
    {
        $determinant = new Determinant([
            [1,6,1,6,3],
            [2,7,5,7,9],
            [3,8,1,13,8],
            [4,4,4,4,2],
            [5,6,5,8,1]
        ]);

        $this->assertEquals(1520,$determinant->calculate(),'Should work for a 5 x 5 matrix and return 1520');
    }
}
