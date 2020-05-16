<?php


namespace App;


class TennisMatch
{

    private $playerOnePoints = 0;
    private $playerTwoPoints = 0;

    public function score(): string
    {
        if($this->hasWinner()) {
            return 'Winner: ' . $this->leader();
        }

        if($this->hasAdvantage()) {
            return 'Advantage: ' . $this->leader();
        }

        if($this->isDeuce()) {
            return 'Deuce';
        }

        return sprintf(
            "%s-%s",
            $this->pointsToScore($this->playerOnePoints),
            $this->pointsToScore($this->playerTwoPoints));
    }

    public function pointsToPlayerOne(): void
    {
        $this->playerOnePoints++;
    }

    public function pointsToPlayerTwo(): void
    {
        $this->playerTwoPoints++;
    }

    public function pointsToScore($points): ?string
    {
        switch ($points)
        {
            case 0:
                return 'love';
            case 1:
                return 'fifteen';
            case 2:
                return 'thirty';
            case 3:
                return 'forty';
        }

        return '';
    }

    public function hasWinner(): bool
    {
        if($this->playerOnePoints > 3 && $this->playerOnePoints >=$this->playerTwoPoints + 2) {
            return true;
        }

        if($this->playerTwoPoints > 3 && $this->playerTwoPoints >=$this->playerOnePoints + 2) {
            return true;
        }

        return false;
    }

    private function leader(): string
    {
        return $this->playerOnePoints > $this->playerTwoPoints ? 'Player 1' : 'Player 2';
    }

    private function isDeuce(): bool
    {
        return $this->canBeWon() && $this->playerOnePoints === $this->playerTwoPoints;
    }

    private function hasAdvantage(): bool
    {
        if(!$this->canBeWon()) {
            return false;
        }

        return !$this->isDeuce();
    }

    private function canBeWon(): bool
    {
        return $this->playerOnePoints >= 3 && $this->playerTwoPoints >= 3;
    }
}