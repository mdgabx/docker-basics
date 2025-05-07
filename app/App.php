<?php

declare(strict_types=1);

namespace App;

use App\RouteNotFoundException;
use Dotenv\Dotenv;
use Illuminate\Database\Capsule\Manager as Capsule;
use Illuminate\Container\Container;

class App 
{
    private Config $config;

    public function __construct(
        protected Container $container,
        protected ?Router $router = null, 
        protected array $request = []
    ){
    }

    public function initDb(array $config)
    {
        $capsule = new Capsule;

        $capsule->addConnection($config);
        $capsule->setAsGlobal();
        $capsule->bootEloquent();
    }

    public function boot(): static
    {
        $dotenv = Dotenv::createImmutable(dirname(__DIR__));
        $dotenv->load();
     
        $this->config = new Config($_ENV);

        $this->initDb($this->config->db);

       // $this->container->set(MailerInterface::class, fn() => new Cust)
       return $this;
    }


    public function run() 
    {
        if (!$this->router) {
            throw new \RuntimeException("Router instance is missing in App.");
        }
    
        try {
            echo $this->router->resolve(
                $this->request['uri'], 
                strtolower($this->request['method'])
            ); 
        } catch (RouteNotFoundException) {
            http_response_code(404);
            echo View::make('error/404');
        }
    }
}