<?php

use App\App;
use App\Config;
use App\Router;
use App\Controllers\HomeController;
use App\Controllers\InvoiceController;
use Illuminate\Container\Container;

require_once __DIR__ . '/../vendor/autoload.php';

$dotenv = Dotenv\Dotenv::createImmutable(dirname(__DIR__));
$dotenv->load();

session_start();

define('STORAGE_PATH', __DIR__ . '/../storage');
define('VIEW_PATH', __DIR__ . '/../views');

$container = new Container();
$router = new Router($container);

// $router->registerRoutesFromControllerAttributes(
//     [
//         HomeController::class,
//         GeneratorExampleController::class
//     ]
// );


$router
    ->get('/', [HomeController::class, 'index'])
    // ->get('/invoices', [InvoiceController::class, 'index'])


(new App(
    $container,
    $router, 
    ['uri' => $_SERVER['REQUEST_URI'], 'method' => $_SERVER['REQUEST_METHOD']],
    new Config($_ENV)
    ))->run();
