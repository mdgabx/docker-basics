<?php

use App\Invoice;

require_once __DIR__ . '/../vendor/autoload.php';

$invoice = new Invoice(25, 'serialize', '91039');

$str = serialize($invoice);

echo $str . PHP_EOL;