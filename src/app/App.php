<?php

declare(strict_types=1);

namespace App;

use App\RouteNotFoundException;
use App\DB;

class App 
{
    private static DB $db;

    public function __construct(protected $router, protected array $request, protected array $config)
    {
        static::$db = new DB($config);
    }

    public static function db(): DB
    {
        return static::$db;
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