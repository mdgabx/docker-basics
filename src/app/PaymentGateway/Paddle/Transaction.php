<?php

namespace App\PaymentGateway\Paddle;

class Transaction 
{
	private float $amount;

	public function __construct(float $amount)
	{
		$this->amount = $amount;
	}

	public function process()
	{
		echo 'processing $' . $this->amount . ' transaction';
	}	
}