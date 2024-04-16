<?php

require_once __DIR__ . '/../vendor/autoload.php';

use Dotenv\Dotenv;
use Illuminate\Database\Capsule\Manager as Capsule;
use PicoPHP\Classes\Router;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

$dotenv = Dotenv::createImmutable(__DIR__ . '/..');
$dotenv->load();

ini_set('display_errors', env('APP_ERRORS'));

$db_config = require dirname(__DIR__) . '/config/database.php';
$capsule = new Capsule;
$capsule->addConnection($db_config['connections'][$db_config['default']]);
$capsule->setAsGlobal();
$capsule->bootEloquent();


$router = new Router();
$routes = require dirname(__DIR__) . '/routes/routes.php';
$routes($router);


$request = Request::createFromGlobals();
$response = $router->dispatch($request);
if (!$response instanceof Response) {
    $response = new Response((string) $response);
}

$response->send();
