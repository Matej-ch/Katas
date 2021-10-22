<?php

namespace App;

class AstarSpot
{
    public $f;
    public $g;
    public $h;
    public array $neighbours;
    public int $i;
    public int $j;
    public int $cols;
    public int $rows;
    public ?AstarSpot $previous;
    public bool $obstacle;

    public function __construct(int $i,int $j,int $cols,int $rows)
    {

        $this->f = 0;
        $this->g = 0;
        $this->h = 0;
        $this->neighbours = [];
        $this->i = $i;
        $this->j = $j;
        $this->cols = $cols;
        $this->rows = $rows;
        $this->previous = null;
        $this->obstacle = false;
    }

    public function addNeighbours($grid): void
    {
        $i = $this->i;
        $j = $this->j;
        $this->neighbours = [];

        if($i < $this->cols - 1) {
            $this->neighbours[] = [$this->i + 1,$this->j];
        }

        if($i > 0) {
            $this->neighbours[] = [$this->i - 1,$this->j];
        }

        if($j < $this->rows - 1) {
            $this->neighbours[] = [$this->i,$this->j + 1];
        }

        if($j > 0) {
            $this->neighbours[] = [$this->i,$this->j - 1];
        }
    }
}