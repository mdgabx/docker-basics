<?php

declare(strict_types = 1);

namespace App\PaymentGateway\Paddle;

class Transaction 
{

	public static int $count = 0;

	public function __construct(
		public float $amount,
		public string $description
	) 
	{
		self::$count++;
	}

	public function process() 
	{
		echo 'Processning paddle transaction';
	}

	
}