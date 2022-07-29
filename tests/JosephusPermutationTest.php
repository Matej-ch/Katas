<?php


use App\JPermutation;
use PHPUnit\Framework\TestCase;

class JosephusPermutationTest extends TestCase
{
    /** @test */
    function it_returns_empty_array_for_empty_array_and__every_n()
    {
        $this->assertEquals([],JPermutation::joshephus([],3));
    }

    /** @test */
    function it_returns_permutated_array_for_array_of_numbers()
    {
        $this->assertEquals([3, 6, 2, 7, 5, 1, 4], JPermutation::joshephus([1, 2, 3, 4, 5, 6, 7], 3));
    }

    /** @test */
    function it_returns_permutated_array_of_characters()
    {
        $this->assertEquals(['e', 's', 'W', 'o', 'C', 'd', 'r', 'a'], JPermutation::joshephus(["C", "o", "d", "e", "W", "a", "r", "s"], 4));
    }

    /** @test */
    function it_returns_same_array_for_k_1()
    {
        $this->assertEquals([1, 2, 3, 4, 5, 6, 7, 8, 9, 10], JPermutation::joshephus([1, 2, 3, 4, 5, 6, 7, 8, 9, 10], 1));
    }

    /** @test */
    function it_returns_even_first_for_numbers_for_k_2()
    {
        $this->assertEquals([2, 4, 6, 8, 10, 3, 7, 1, 9, 5], JPermutation::joshephus([1, 2, 3, 4, 5, 6, 7, 8, 9, 10], 2));
    }
}
