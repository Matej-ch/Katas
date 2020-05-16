<?php


use App\Interval;
use PHPUnit\Framework\TestCase;

class SumOfIntervalsTest extends TestCase
{
    /**
     * @test
     */
    function it_returns_4_for_interval_1_5()
    {
        $this->assertEquals(4,Interval::sum([[1,5]]));
    }

    /**
     * @test
     */
    function it_returns_8_for_intervals_1_5_and_6_10()
    {
        $this->assertEquals(8,Interval::sum([[1,5],[6,10]]));
    }

    /**
     * @test
     */
    function it_returns_4_for_intervals_1_5_and_1_5()
    {
        $this->assertEquals(4,Interval::sum([[1,5],[1,5]]));
    }

    /**
     * @test
     */
    function it_returns_5_for_intervals_1_5_and_1_5_and_6_7_and_1_5()
    {
        $this->assertEquals(5,Interval::sum([
            [1,5],
            [1,5],
            [6,7],
            [1,5]
        ]));
    }

    /**
     * @test
     */
    function it_returns_7_for_intervals_1_4_and_7_10_and_3_5()
    {
        $this->assertEquals(7,Interval::sum([
            [1,4],
            [7,10],
            [3,5]
        ]));
    }

    /**
     * @test
     */
    function it_returns_7_for_intervals_3_5_and_7_10_and_1_4()
    {
        $this->assertEquals(7,Interval::sum([
            [3,5],
            [1,4],
            [7,10]
        ]));
    }

    /**
     * @test
     */
    function it_returns_19_for_interval()
    {
        $this->assertEquals(19,Interval::sum([
            [1,20],
            [2, 19],
            [5, 15],
            [8, 12],
        ]));
    }

    /**
     * @test
     */
    function it_returns_19_for_interval2()
    {
        $this->assertEquals(19,Interval::sum([
            [1,5],
            [10, 20],
            [1, 6],
            [16, 19],
            [5, 11]
        ]));
    }
}
