<?php

namespace App\Controllers;

use App\View;
use Symfony\Component\Mailer\Mailer;
use Symfony\Component\Mailer\Transport;
use Symfony\Component\Mime\Email;

class UserController 
{
    public function create(): View
    {
        return View::make('users/register');
    }

    public function register()
    {
          $name = 'teast';
          $email = 'adex@gmail.com';
          $firstname = explode(' ', $name)[0];

          $text = <<<Body
            Hello $firstname,

            Thank you for signing up!
            Body;

          $html = <<<HTMLBody
                <h1>Welcome</h1>
          HTMLBody;

            $email = (new Email())
                    ->from('support@example.com')
                    ->to($email)
                    ->subject('Welcome!')
                    ->text($text)
                    ->html($html);

            $dsn = 'smtp://mailhog:1025';

            $transport = Transport::fromDsn($dsn);

            $mailer = new Mailer($transport);

            $mailer->send($email);

            // DriverManaer
    }
}