<?php


use App\TennisMatch;
use PHPUnit\Framework\TestCase;

class TennisMatchTest extends TestCase
{
    /**
     * @test
     * @dataProvider scores
     * @param $playerOnePoints
     * @param $playerTwoPoints
     * @param $score
     */
    function it_scores_a_tennis_match($playerOnePoints,$playerTwoPoints,$score)
    {
        $match = new TennisMatch();

        for ($i =0; $i < $playerOnePoints ;$i++) {
            $match->pointsToPlayerOne();
        }

        for ($i =0; $i < $playerTwoPoints ;$i++) {
            $match->pointsToPlayerTwo();
        }

        $this->assertEquals($score,$match->score());
    }

    public function scores()
    {
        return [
            [0,0,'love-love'],
            [1,0,'fifteen-love'],
            [1,1,'fifteen-fifteen'],
            [2,0,'thirty-love'],
            [0,1,'love-fifteen'],
            [0,2,'love-thirty'],
            [3,0,'forty-love'],
            [3,3,'Deuce'],
            [4,0,'Winner: Player 1'],
            [0,4,'Winner: Player 2'],
            [4,4,'Deuce'],
            [4,3,'Advantage: Player 1'],
            [4,5,'Advantage: Player 2'],
        ];
    }
}
