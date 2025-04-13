<?php


require_once __DIR__ . '/../vendor/autoload.php';

use App\PaymentGateway\Paddle\Transaction;

$transaction = new Transaction(25, 'Transaction');

$transaction = new Transaction(25, 'Transaction');

$transaction = new Transaction(25, 'Transaction');

$transaction = new Transaction(25, 'Transaction');

$transaction = new Transaction(25, 'Transaction');

var_dump(Transaction::$count);