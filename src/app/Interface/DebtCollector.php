<?php

namespace App\Interface;

interface DebtCollector 
{
    public function collect(float $owedAmount): float;
}