<?php


use App\NinetyNineBottles;
use PHPUnit\Framework\TestCase;

class NinetyNineBottlesTest extends TestCase
{

    /** @test */
    public function ninenty_nine_bottles_verse(): void
    {
        $expected = <<<EOT
99 bottles of beer on the wall,
99 bottles of beer!
Take one down,
Pass it around,
98 bottles of beer on the wall!\r\n
EOT;


        $result = (new NinetyNineBottles)->verse(99);

        self::assertEquals($expected, $result);
    }

    /** @test */
    public function ninenty_eight_bottles_verse(): void
    {
        $expected = <<<EOT
98 bottles of beer on the wall,
98 bottles of beer!
Take one down,
Pass it around,
97 bottles of beer on the wall!\r\n
EOT;

        $result = (new NinetyNineBottles)->verse(98);

        self::assertEquals($expected, $result);
    }

    /** @test */
    public function sixty_nine_bottles_verse(): void
    {
        $expected = <<<EOT
69 bottles of beer on the wall,
69 bottles of beer!
Take one down,
Pass it around,
68 bottles of beer on the wall!\r\n
EOT;

        $result = (new NinetyNineBottles)->verse(69);

        self::assertEquals($expected, $result);
    }


    /** @test */
    public function two_bottles_verse(): void
    {
        $expected = <<<EOT
2 bottles of beer on the wall,
2 bottles of beer!
Take one down,
Pass it around,
1 bottle of beer on the wall!\r\n
EOT;

        $result = (new NinetyNineBottles)->verse(2);

        self::assertEquals($expected, $result);
    }

    /** @test */
    public function one_bottle_verse(): void
    {
        $expected = <<<EOT
1 bottle of beer on the wall,
1 bottle of beer!
Take one down,
Pass it around,
No more bottles of beer on the wall!\r\n
EOT;

        $result = (new NinetyNineBottles)->verse(1);

        self::assertEquals($expected, $result);
    }

    /** @test */
    public function it_gets_the_lyrics(): void
    {
        $expected = file_get_contents(__DIR__.'/stubs/lyrics.stub');

        $result = (new NinetyNineBottles)->sing();

        self::assertEquals($expected, $result);
    }

}
