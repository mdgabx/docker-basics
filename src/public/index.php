<?php

require_once __DIR__ . '/../vendor/autoload.php';

use App\CollectionAgency;
use App\DebtCollectionService;
use App\Rocky;

$service = new DebtCollectionService;

echo $service->collectDebt(new Rocky(100)) . PHP_EOL;