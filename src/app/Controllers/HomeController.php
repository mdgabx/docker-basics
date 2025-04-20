<?php

declare(strict_types=1);

namespace App\Controllers;

use App\View;
use PDO;
use PDOException;

class HomeController 
{
    public function index(): View
    {   
        try {
            $db = new PDO('mysql:host=db;dbname=my_db', 'root', 'root', [
            ]);
            
            $email = $_GET['email'];
            $query = 'SELECT * FROM users where email=?';

            $stmt = $db->prepare($query);

            $stmt->execute([$email]);

            // $stmt = $db->query($query);

            foreach($stmt->fetchAll() as $u) {
                echo '<pre>';
                var_dump($u);
                echo '</pre>';
            }

            // foreach($stmt->fetchAll(PDO::FETCH_OBJ) as $u) {
            //     echo '<pre>';
            //     var_dump($u);
            //     echo '</pre>';
            // }
            
        } catch (PDOException $e) {
            throw new PDOException($e->getMessage(), $e->getCode());
        }
       
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

        // echo '<pre>';
        // var_dump(pathinfo($filePath));
        // echo '</pre>';

        header('Location: /');
        exit;

        // unlink(STORAGE_PATH . '/chrome_cjLzcbTBdm.png');
    }
}