<?php

namespace App;

use App\Interface\DebtCollector;

class Rocky implements DebtCollector
{
    public function collect(float $owedAmount): float
    {
        return $owedAmount * 0.65;
    }   
}