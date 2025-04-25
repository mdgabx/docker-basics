<?php

namespace App\Traits;

trait CappucinoTrait
{
    use LatteTrait;

    public function makeCappucino()
    {
        echo static::class . '  making cappucino ' . PHP_EOL;
    }
}