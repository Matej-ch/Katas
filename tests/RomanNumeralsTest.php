<?php


use App\RomanNumerals;
use PHPUnit\Framework\TestCase;

class RomanNumeralsTest extends TestCase
{
    /**
     * @test
     * @dataProvider checks
     * @param $number
     * @param $expected
     */
    function it_generates_roman_numerals($number,$expected)
    {
        $this->assertEquals($expected,RomanNumerals::generate($number));
    }

    /**
     * @test
     * @dataProvider checksFromRoman
     * @param $roman
     * @param $expected
     */
    function it_generates_number_from_roman_numerals($roman,$expected)
    {
        $this->assertEquals($expected,RomanNumerals::generateNumber($roman));
    }

    /**
     * @test
     */
    function it_cannot_generate_a_roman_numeral_for_less_than_1()
    {
        $this->assertFalse(RomanNumerals::generate(0));
    }

    /**
     * @test
     */
    function it_cannot_generate_a_roman_numeral_for_more_than_3999()
    {
        $this->assertFalse(RomanNumerals::generate(4000));
    }

    public function checks()
    {
        return [
            [1,'I'],
            [2,'II'],
            [3,'III'],
            [4,'IV'],
            [5,'V'],
            [6,'VI'],
            [7,'VII'],
            [8,'VIII'],
            [9,'IX'],
            [10,'X'],
            [40,'XL'],
            [50,'L'],
            [90,'XC'],
            [99,'XCIX'],
            [100,'C'],
            [400,'CD'],
            [500,'D'],
            [900,'CM'],
            [1000,'M'],
            [1990,'MCMXC'],
            [2008,'MMVIII'],
            [3999,'MMMCMXCIX'],
        ];
    }

    public function checksFromRoman()
    {
        return [
            ['I',1],
            ['II',2],
            ['III',3],
            ['IV',4],
            ['V',5],
            ['VI',6],
            ['VII',7],
            ['VIII',8],
            ['IX',9],
            ['X',10],
            ['XL',40],
            ['L',50],
            ['XC',90],
            ['XCIX',99],
            ['C',100],
            ['CD',400],
            ['D',500],
            ['CM',900],
            ['M',1000],
            ['MMMCMXCIX',3999],
            ['MMVII',2007],
            ['MDCLXIX',1669]
        ];
    }
}