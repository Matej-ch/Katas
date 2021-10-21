<?php

namespace App;

class AstarSpot
{
    private $f;
    private $g;
    private $h;
    private array $neighbours;
    private int $i;
    private int $j;
    private int $cols;
    private int $rows;

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
    }

    public function addNeighbours($grid)
    {
        $i = $this->i;
        $j = $this->j;

        if($i < $this->cols - 1) {
            $this->neighbours[] = $grid[$this->i + 1][$this->j];
        }

        if($i > 0) {
            $this->neighbours[] = $grid[$this->i - 1][$this->j];
        }

        if($j < $this->rows - 1) {
            $this->neighbours[] = $grid[$this->i][$this->j + 1];
        }

        if($j > 0) {
            $this->neighbours[] = $grid[$this->i][$this->j - 1];
        }
    }
}