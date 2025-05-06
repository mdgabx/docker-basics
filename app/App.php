<?php

declare(strict_types=1);

namespace App;

use App\Interfaces\PaymentGatewayServiceInterface;
use App\RouteNotFoundException;
use App\Services\EmailService;
use App\Services\InvoiceService;
use App\Services\SalesTaxService;
use App\Services\PaymentGatewayService;
use Dotenv\Dotenv;
use Symfony\Component\Mailer\MailerInterface;

class App 
{
    private static DB $db;
    private Config $config;

    public function __construct(
        protected Container $container,
        protected ?Router $router = null, 
        protected array $request = []
    ){
    }

    public function initDb(array $config)
    {
        $dotenv = Dotenv::createImmutable(dirname(__DIR__));
        $dotenv->load();
        
        $capsule = new Manage;

        $params = [
            'host' => 
        ]
    }

    public function boot(): static
    {
     
        $this->config = new Config($_ENV);

        $this->initDb();

       // $this->container->set(MailerInterface::class, fn() => new Cust)
    }


    public function run() 
    {
        try {

            echo $this->router->resolve(
                $this->request['uri'], 
                strtolower($this->request['method'])); 
            
        } catch (RouteNotFoundException) {

            http_response_code(404);
            echo View::make('error/404');
        }
       
    }
}