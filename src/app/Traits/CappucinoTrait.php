<?php

namespace App\Traits;

trait CappucinoTrait
{
    public function makeCappucino()
    {
        echo static::class . '  making cappucino ' . PHP_EOL;
    }
}