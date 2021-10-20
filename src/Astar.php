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
                $this->grid[$i][$j] = (object)['f' => 0,'g' => 0,'h' => 0];
            }
        }

        $this->start = $this->grid[0][0];
        $this->end = $this->grid[$this->columns - 1][$this->rows - 1];

        $this->openSet[] = $this->start;


        echo '<pre>'.print_r($this->openSet,true).'</pre>';
        echo '<pre>'.print_r($this->grid,true).'</pre>';die();
    }

    public function lookForPath()
    {
        while (!empty($this->openSet)) {

            if(count($this->openSet) > 0) {
                //continue
            } else {
                //path not found
            }
        }
    }

}