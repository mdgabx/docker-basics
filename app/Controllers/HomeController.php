<?php

declare(strict_types=1);

namespace App\Controllers;

use App\App;
use App\View;
use App\Model\User;
use App\Model\Invoice;
use App\Model\SignUp;
use App\Services\InvoiceService;
use App\Container;

class HomeController 
{
    public function __construct(private InvoiceService $invoiceService)
    {
    }

    public function index(): View
    {   
        $this->invoiceService->process([], 25);

        return View::make('index');
    }

    public function download() 
    {
        header('Content-Type: application/png');
        header('Content-Disposition: attachment;filename="myfile.png"');

        readfile(STORAGE_PATH . '/chrome_cjLzcbTBdm.png');
    }

    public function upload()
    { 
        $filePath = STORAGE_PATH . '/' . $_FILES['receipt']['name'];
        move_uploaded_file($_FILES['receipt']['tmp_name'], $filePath);

        header('Location: /');
        exit;

    }
}