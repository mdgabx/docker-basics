<?php

namespace App\Fields;

use App\Interface\Renderable;

abstract class Field implements Renderable
{
    public function __construct(protected string $name)
    {
        
    }
}