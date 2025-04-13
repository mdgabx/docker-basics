<?php

namespace App\Fields;

abstract class Field 
{
    public function __construct(protected string $name)
    {
        
    }

    abstract public function render(): string;

}