<?php

declare(strict_types = 1);

namespace App\PaymentGateway\Paddle;

use App\Enums\Status;
// use Notification\Email;


class Transaction 
{

	private string $status;

	public function __construct() 
	{
		$this->setStatus(Status::DECLINED);
	}

	public function setStatus(string $status): self 
	{
		if(! isset(Status::ALL_STATUSES[$status])) 
		{
			throw new \InvalidArgumentException('invalid status');
		}

		$this->status = $status;

		return $this;
	}
}