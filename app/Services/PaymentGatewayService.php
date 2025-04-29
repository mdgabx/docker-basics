<?php

namespace App\Services;

use App\Interfaces\PaymentGatewayServiceInterface;

class PaymentGatewayService implements PaymentGatewayServiceInterface
{
    public function charge(array $customer, float $amount, float $tax): bool
    {
        return (bool) mt_rand(0, 1);
    }
}