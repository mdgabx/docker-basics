<?php

require_once __DIR__ . '/../vendor/autoload.php';

// use App\CollectionAgency;
// use App\DebtCollectionService;
// use App\Rocky;

// $service = new DebtCollectionService;

// echo $service->collectDebt(new Rocky(100)) . PHP_EOL;

use App\Coffee\CoffeeMaker;
use App\Coffee\LatteMaker;
use App\Coffee\CappucinoMaker;
use App\Coffee\AllinOneCoffeeMaker;

$coffee = new CoffeeMaker();
$coffee->makeCoffee();

$latte = new LatteMaker();
$latte->makeCoffee();
$latte->makeLatte();

$cappucino = new CappucinoMaker();
$cappucino->makeCoffee();
$cappucino->makeCappucino();

$allinOne = new AllinOneCoffeeMaker();
$allinOne->makeCoffee();
$allinOne->makeLatte();
$allinOne->makeCappucino();

