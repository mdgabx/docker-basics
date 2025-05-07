<?php

declare(strict_types=1);

namespace App\Controllers;

use App\View;
use App\Services\InvoiceService;
use App\Attributes\Route;

class HomeController 
{
    public function __construct(private InvoiceService $invoiceService)
    {
    }

    // // attributes
    // #[Route('/')]
    public function index(): View
    {   
        $this->invoiceService->process([], 25);

        return View::make('index');
    }

    // #[Route('/', 'post')]
    public function store()
    {

    }

    // #[Route('/', 'put')]
    public function update()
    {
        
    }

    // public function download() 
    // {
    //     header('Content-Type: application/png');
    //     header('Content-Disposition: attachment;filename="myfile.png"');

    //     readfile(STORAGE_PATH . '/chrome_cjLzcbTBdm.png');
    // }

    // public function upload()
    // { 
    //     $filePath = STORAGE_PATH . '/' . $_FILES['receipt']['name'];
    //     move_uploaded_file($_FILES['receipt']['tmp_name'], $filePath);

    //     header('Location: /');
    //     exit;

    // }
}