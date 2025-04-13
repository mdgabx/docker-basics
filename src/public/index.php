<?php

require_once __DIR__ . '/../vendor/autoload.php';

use App\PaymentGateway\Paddle\Transaction;

$transaction = new Transaction(25.4);

// $ref = new ReflectionProperty(Transaction::class, 'amount');
// $ref->setAccessible(true);
// $transaction->amount;
// setValue;
// $ref->setValue($transaction, '213');
// var_dump($ref->getValue($transaction));

$transaction->process();