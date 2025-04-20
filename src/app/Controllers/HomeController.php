<?php

declare(strict_types=1);

namespace App\Controllers;

use App\View;

class HomeController 
{
    public function index(): View
    {
        return View::make('index', ['foo' => 'bar']);
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

        // echo '<pre>';
        // var_dump(pathinfo($filePath));
        // echo '</pre>';

        header('Location: /');
        exit;

        // unlink(STORAGE_PATH . '/chrome_cjLzcbTBdm.png');
    }
}