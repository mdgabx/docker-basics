<?php

namespace App;

use App\Interface\DebtCollector;

class DebtCollectionService 
{
    public function collectDebt(DebtCollector $collector)
    {
        $owedAmount = mt_rand(100, 1000);
        $collectedAmount = $collector->collect($owedAmount);
        
        echo $collectedAmount;
    }
}