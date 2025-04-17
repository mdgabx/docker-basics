<?php

namespace App\Coffee;

use App\Traits\CappucinoTrait;
use App\Traits\LatteTrait;

class AllinOneCoffeeMaker extends CoffeeMaker
{
    use LatteTrait;
    use CappucinoTrait {
        CappucinoTrait::makeCappucino as public;
    }
}