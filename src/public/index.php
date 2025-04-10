<?php

// require_once '../PaymentGateway/Paddle/Transaction.php';
// require_once '../PaymentGateway/Stripe/Transaction.php';
// require_once '../PaymentGateway/Paddle/CustomerProfile.php';
// require_once '../Notification/Email.php';

// use PaymentGateway\Paddle\{Transaction, CustomerProfile};
// use PaymentGateway\Stripe\Transaction as StripeTransaction;

// $paddleTransaction = new Transaction();
// $stripeTransaction = new StripeTransaction();
// $paddleCustomerProfile = new CustomerProfile();

// var_dump($paddleTransaction, $stripeTransaction, $paddleCustomerProfile);

// include 'views/layout'; // the use aboove are not applied here need to add it manually

require __DIR__ . '/../vendor/autoload.php';

use App\PaymentGateway\Paddle\Transaction;
use Ramsey\Uuid\UuidFactory;

$paddleTransaction = new Transaction();

$factory = new UuidFactory();
$uuid = $factory->uuid4();

echo $uuid->toString();

var_dump($paddleTransaction);