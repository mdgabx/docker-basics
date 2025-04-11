<?php


require_once __DIR__ . '/../vendor/autoload.php';

use App\Enums\Status;
use App\PaymentGateway\Paddle\Transaction;

$transaction = new Transaction();

$transaction->setStatus(Status::PAID);

var_dump($transaction);