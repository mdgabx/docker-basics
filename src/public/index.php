<?php

declare(strict_types=1);

require_once '../Transaction.php';

$class = 'Transaction';

//Classes and Objects
$amount = (new $class(100, 'Test'))
				->addTax(8)
				->applyDiscount(4)
				->getAmount();

// var_dump($amount);


//std class

$str = '{"a": 1, "b": 2, "c": 3}';

$arr = json_decode($str, true); // make it an array by setting true

// var_dump($arr);

$arr = [1,2,3];
$obj = (object) $arr;

var_dump($obj->{1});