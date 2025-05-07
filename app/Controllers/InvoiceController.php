<?php

declare(strict_types=1);

namespace App\Controllers;

use App\Model\Invoice;
use App\View;
use App\Attributes\Get;
use App\Enums\InvoiceStatus;

class InvoiceController
{
    #[Get('/invoices')]
    public function index(): View
    {

        $invoices = Invoice::query()
            ->all(InvoiceStatus::Paid)
            ->get()
            ->toArray();

        return View::make('invoices/index', ['invoices' => $invoices]);
    }
}
