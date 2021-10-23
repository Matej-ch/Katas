<?php

use PHPUnit\Framework\TestCase;

class AStarTest extends TestCase
{
    /**
     * @test
     */
    public function it_returns_path()
    {
        $aStar = new \App\Astar(5,5);

        $aStar->lookForPath();
    }
}