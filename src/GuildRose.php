<?php


namespace App;


class GuildRose
{

    public $name;

    public $quality;

    public $sellIn;

    public function __construct($name, $quality, $sellIn)
    {
        $this->name = $name;
        $this->quality = $quality;
        $this->sellIn = $sellIn;
    }

    public static function of($name, $quality, $sellIn): GuildRose
    {
        return new static($name, $quality, $sellIn);
    }

    public function tick()
    {
        switch ($this->name) {
            case 'normal':
                $this->normalTick();
                break;
            case 'Aged Brie':
                $this->cheeseTick();
                break;
            case 'Sulfuras, Hand of Ragnaros':
                $this->sulfurTick();
                break;
            case 'Backstage passes to a TAFKAL80ETC concert':
                $this->backstageTick();
                break;
            case 'Conjured Mana Cake':
                $this->manaCakeTick();
                break;
        }
    }

    private function normalTick(): void
    {
        --$this->sellIn;

        if($this->quality <= 0) { return; }
        --$this->quality;

        if($this->sellIn <= 0 && $this->quality > 0) {
            --$this->quality;
        }
    }

    private function cheeseTick(): void
    {
        --$this->sellIn;
        ++$this->quality;

        if ($this->sellIn <= 0) {
            ++$this->quality;
        }

        if($this->quality > 50) { $this->quality = 50; }
    }

    private function sulfurTick(): void
    {

    }

    private function backstageTick()
    {
        ++$this->quality;

        if ($this->sellIn <= 10) {
            ++$this->quality;
        }

        if ($this->sellIn <= 5) {
            ++$this->quality;
        }

        if ($this->sellIn <= 0) {
            $this->quality = 0;
        }

        if($this->quality > 50) { $this->quality = 50; }

        --$this->sellIn;
    }

    private function manaCakeTick()
    {
        --$this->sellIn;
        $this->quality -= 2;

        if($this->sellIn <= 0) {
            $this->quality -= 2;
        }

        if($this->quality < 0) { $this->quality = 0; }
    }
}