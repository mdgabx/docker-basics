<?php

namespace App;

class Invoice
{
    public string $id;
    
    
    public function __construct(
        public float $amount,
        public string $description,
        public string $creditCardNumber
    )
    {
        $this->id = uniqid('invoice_');
    }

    public function __sleep(): array
    {
        return ['id', 'amount'];
    }

    public function __wakeup(): void
    {
        
    }



    // public static function create(): static
    // {
    //     return new static();
    // }

    // cloning magic method
    // public function __clone()
    // {
    //     $this->id = uniqid('invoice_');
    // }
}