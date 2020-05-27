<?php


use PHPUnit\Framework\TestCase;

class NumberFinderTest extends TestCase
{
    /**
     * @test
     * @dataProvider arrays
     * @param $missing
     * @param $numbers
     */
    function it_finds_missing_number($missing,$numbers)
    {
        $this->assertEquals($missing,\App\NumberFinder::find($numbers));
    }

    public function arrays(): array
    {
        return [
            [2,[1, 3]],
            [1,[2, 3, 4]],
            [4,[2,1, 3]],
            [12,[13, 11, 10, 3, 2, 1, 4, 5, 6, 9, 7, 8]],
            [4,[13, 11, 10, 3, 2,12, 1, 5, 6, 9, 7, 8]],
            [13,[11, 10, 3, 2, 1, 4, 5, 6, 9,12, 7, 8]],
        ];
    }
}
