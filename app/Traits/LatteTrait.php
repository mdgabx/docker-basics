<?php

namespace App\Traits;

trait LatteTrait 
{
    protected string $milkType = "whole-milk";

    public function makeLatte()
    {
        echo static::class . ' is making latte '. $this->milkType . PHP_EOL;
    }

    public function setMilkType(string $milkType)
    {
        $this->milkType = $milkType;

        return $this;
    }
}