<?php

namespace App;

class Astar
{
    public int $rows;
    public int $columns;
    public array $grid = [];
    public array $openSet = [];
    public array $closedSet = [];

    public $start;
    public $end;

    public function __construct($rows,$columns)
    {
        $this->rows = $rows;
        $this->columns = $columns;
        $this->grid = [];

        for ($i = 0; $i < $this->columns; $i++) {
            $this->grid[$i] = array_fill(0,$rows,0);
        }

        for ($i = 0; $i < $this->columns; $i++) {
            for ($j = 0; $j < $this->rows; $j++) {
                $this->grid[$i][$j] = new AstarSpot($i,$j,$this->columns,$this->rows);
            }
        }

        for ($i = 0; $i < $this->columns; $i++) {
            for ($j = 0; $j < $this->rows; $j++) {
                $this->grid[$i][$j]->addNeighbours($this->grid);
                echo '<pre>'.print_r($this->grid[$i][$j],true).'</pre>';//die();
            }
            die();
        }

        echo '<pre>'.print_r($this->grid,true).'</pre>';die();
        $this->start = $this->grid[0][0];
        $this->end = $this->grid[$this->columns - 1][$this->rows - 1];

        $this->openSet[] = $this->start;
    }

    public function lookForPath()
    {
        while (!empty($this->openSet)) {

            $winningIndex = 0;
            $openSetCount = count($this->openSet);
            if($openSetCount > 0) {

                for ($i = 0; $i < $openSetCount; $i++) {
                    if($this->openSet[$i]->f < $this->openSet[$winningIndex]->f) {
                        $winningIndex = $i;
                    }
                }

                $current = $this->openSet[$winningIndex];

                if($current === $this->end) {
                    //we are done here
                    return;
                }

                //remove current
                unset($this->openSet[$winningIndex]);
                //add current
                $this->closedSet[] = $current;



            } else {
                //path not found
            }
        }
    }

}