<?php

namespace App;

class AstarSpot
{
    private $f;
    private $g;
    private $h;

    public function __construct($f, $g, $h)
    {

        $this->f = $f;
        $this->g = $g;
        $this->h = $h;
    }
}