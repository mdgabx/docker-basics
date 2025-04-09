<?php

class Transaction 
{
	// access modifier: - public private protected
	// private float $amount;
	// private string $description;

	// constructor magic method - creates every instance the class is called
	public function __construct(
		private float $amount, 
		private string $description)
	{
		$this->amount = $amount;
		$this->description = $description;
	}

	public function addTax(float $rate): Transaction
	{
		$this->amount += $this->amount * $rate / 100;

		return $this;
	}

	public function applyDiscount(float $rate): Transaction
	{
		$this->amount -= $this->amount * $rate / 100;

		return $this;
	}

	public function getAmount(): float
	{
		return $this->amount;
	}

	// destructures: also a magic method
	public function __destruct()
	{
		echo 'Destruct' . $this->description . '<br />';
	}
}