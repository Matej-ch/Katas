<?php


use App\StringCalculator;
use PHPUnit\Framework\TestCase;

class StringCalculatorTest extends TestCase
{
    /**
     * @test
     */
    function it_evaluates_an_empty_string_to_0()
    {
        $calculator = new StringCalculator();

        $this->assertSame(0,$calculator->add(''));
    }

    /**
     * @test
     */
    function it_finds_sum_of_one_number()
    {
        $calculator = new StringCalculator();

        $this->assertSame(5,$calculator->add('5'));
    }

    /**
     * @test
     */
    function it_finds_sum_of_two_numbers()
    {
        $calculator = new StringCalculator();

        $this->assertSame(8,$calculator->add('5,3'));
    }

    /**
     * @test
     */
    function it_finds_sum_of_any_amount_of_numbers()
    {
        $calculator = new StringCalculator();

        $this->assertSame(38,$calculator->add('5,3,3,5,9,5,8'));
    }

    /**
     * @test
     */
    function it_can_take_new_line_as_delimiter()
    {
        $calculator = new StringCalculator();

        $this->assertSame(8,$calculator->add("5\n3"));
    }

    /**
     * @test
     */
    function negative_numbers_are_not_allowed()
    {
        $calculator = new StringCalculator();

        $this->expectException(\Exception::class);

        $calculator->add('5,-3');
    }

    /**
     * @test
     */
    function numbers_greater_than_1000_are_ignored()
    {
        $calculator = new StringCalculator();

        $this->assertEquals(9,$calculator->add('5,3,1001,1'));
    }

    /**
     * @test
     */
    function it_supports_custom_delimiters()
    {
        $calculator = new StringCalculator();

        $this->assertEquals(9,$calculator->add("//:\n5:3:1"));
    }

}
