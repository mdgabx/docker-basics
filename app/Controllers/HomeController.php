<?php

declare(strict_types=1);

namespace App\Controllers;

use App\App;
use App\View;
use App\Model\User;
use App\Model\Invoice;
use App\Model\SignUp;
use App\Services\InvoiceService;

class HomeController 
{
    public function index(): View
    {   
        App::$container->get(InvoiceService::class)->process([], 25);

        return View::make('index');

        // $email = 'johASasdasdasn@asdoe.com';
        // $name = 'johnaadasd doe';
        // $amount = 25;

        // $userModel = new User();
        // $invoiceModel = new Invoice();

        // $invoiceId = (new SignUp($userModel, $invoiceModel))->register(
        //     [   
        //         'email' => $email,
        //         'name'  => $name,
        //     ],
        //     [
        //         'amount' => $amount,
        //     ]
        // );

        // return View::make('index', ['invoice' => $invoiceModel->find($invoiceId)]);
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