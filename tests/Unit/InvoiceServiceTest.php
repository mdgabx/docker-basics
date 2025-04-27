<?php

declare(strict_types=1);

use PHPUnit\Framework\TestCase;

class InvoiceServiceTest extends TestCase
{

    public function test_it_process_invoice(): void 
    {
        $this->createMock(SalesTaxService::class);
    }

}