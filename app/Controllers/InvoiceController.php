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

        $status1 = InvoiceStatus::Paid;

        $invoice = new Invoice();
        $invoices = $invoice->all($status1);

        return View::make('invoices/index', ['invoices' => $invoices]);
    }

    // public function create(): View
    // {
    //     return View::make('invoices/create');
    // }

    // public function store()
    // {
    //     $amount = $_POST['amount'];

    //     var_dump($amount);
    // }
}