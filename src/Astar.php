<?php

namespace App;

class Astar
{
    public int $rows;
    public int $columns;
    public array $grid = [];
    public array $openSet = [];
    public array $closedSet = [];
    public array $path;

    public $start;
    public $end;

    public function __construct($rows, $columns)
    {
        $this->rows = $rows;
        $this->columns = $columns;
        $this->grid = [];

        for ($i = 0; $i < $this->columns; $i++) {
            for ($j = 0; $j < $this->rows; $j++) {
                $this->grid[$i][$j] = new AstarSpot($i, $j, $this->columns, $this->rows);
            }
        }


        for ($i = 0; $i < $this->columns; $i++) {
            for ($j = 0; $j < $this->rows; $j++) {
                $this->grid[$i][$j]->addNeighbours($this->grid);
            }
        }

        $this->start = $this->grid[0][0];
        $this->end = $this->grid[$this->columns - 1][$this->rows - 1];

        $this->openSet[] = $this->start;
    }

    public function lookForPath()
    {
        while (!empty($this->openSet)) {

            $winningIndex = 0;
            $openSetCount = count($this->openSet);
            if ($openSetCount > 0) {

                for ($i = 0; $i < $openSetCount; $i++) {
                    if ($this->openSet[$i]->f < $this->openSet[$winningIndex]->f) {
                        $winningIndex = $i;
                    }
                }

                $current = $this->openSet[$winningIndex];

                /** create array with path, backtrack over path */
                if ($current === $this->end) {
                    $this->path = [];
                    $temp = $current;
                    $this->path[] = $temp;
                    while ($temp->previous) {
                        $this->path[] = $temp->previous;
                        $temp = $temp->previous;
                    }
                    return;
                }

                //remove current
                unset($this->openSet[$winningIndex]);
                //add current
                $this->closedSet[] = $current;
                $neighbors = $current->neighbors;
                $neighborsCount = count($neighbors);
                $neighbor = null;
                $tempG = 0;

                for ($i = 0; $i < $neighborsCount; $i++) {

                    /** here you have to find $neighbors from grid based on index */
                    $neighbor = $this->grid[$neighbors[$i][0]][$neighbors[$i][1]];

                    /*** obstacle check here */
                    if (!in_array($neighbor, $this->closedSet, true)) {
                        $tempG = $current->g + 1;

                        $newPath = false;
                        if (in_array($neighbor, $this->openSet, true)) {
                            if ($tempG < $neighbor->g) {
                                $neighbor->g = $tempG;
                                $newPath = true;
                            }
                        } else {
                            $neighbor->g = $tempG;
                            $newPath = true;
                            $this->openSet[] = $neighbor;
                        }
                        if ($newPath) {
                            $neighbor->h = $this->heuristic($neighbor, $this->end);
                            $neighbor->f = $neighbor->g + $neighbor->h;
                            $neighbor->previous = $current;
                        }

                    }
                }


            } else {
                return;
                //path not found
            }
        }
    }

    private function heuristic(AstarSpot $a, AstarSpot $b): float
    {
        /** taxi driver distance */
        return abs($a->i - $b->i) + abs($a->j - $b->j);

        /** pythagoras */
        //return sqrt(($a->i - $b->i)^2 + ($a->j - $b->j)^2);
    }

}