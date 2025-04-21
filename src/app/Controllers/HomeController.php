<?php

declare(strict_types=1);

namespace App\Controllers;

use App\View;
use PDO;
use PDOException;
use Throwable;

class HomeController 
{
    public function index(): View
    {   
        try {
            $db = new PDO('mysql:host=' . $_ENV['DB_HOST'] . ';dbname=' . $_ENV['DB_DATABASE'], 
            $_ENV['DB_USER'], 
            $_ENV['DB_PASS']);
        } catch (PDOException $e) {
            throw new PDOException($e->getMessage(), (int) $e->getCode());
        }

        $email = 'johASDn@asdoe.com';
        $name = 'john doe';
        $amount = 25;

        try {
            $db->beginTransaction();

            // $query = 'SELECT * FROM users where email=?';
            $userStmt = $db->prepare(
                'INSERT INTO users (email, full_name, is_active, created_at)
                VALUES(?, ?, 1, NOW())'
            );
    
            $invoiceStmt = $db->prepare(
                'INSERT INTO invoices (amount, user_id)
                VALUES (?, ?)'
            );
    
            $userStmt->execute([$email, $name]);
    
            $userId = (int) $db->lastInsertId();
    
            $invoiceStmt->execute([$amount, $userId]);
    
            $db->commit();

        } catch (Throwable $e) {
            if($db->inTransaction()) {
                $db->rollBack();
            }
           
        }


        $fetchStmt = $db->prepare(
            'SELECT invoices.id AS invoice_id, amount, user_id, full_name
            FROM invoices
            INNER JOIN users ON user_id = users.id
            WHERE email = ?'
        );

        $fetchStmt->execute([$email]);

        // $stmt = $db->prepare($query);

        // $stmt->execute([$email]);

        // $stmt = $db->query($query);
        echo '<pre>';
        var_dump($fetchStmt->fetchAll(PDO::FETCH_ASSOC));
        echo '</pre>';

        // foreach($stmt->fetchAll() as $u) {
            // echo '<pre>';
            // var_dump($u);
            // echo '</pre>';
        // }

        // foreach($stmt->fetchAll(PDO::FETCH_OBJ) as $u) {
        //     echo '<pre>';
        //     var_dump($u);
        //     echo '</pre>';
        // }
       
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