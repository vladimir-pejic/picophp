<?php
use App\Controllers\UserController;
use App\Middleware\IdCheckMiddleware;
use PicoPHP\Classes\Router;
use Symfony\Component\HttpFoundation\Response;

return function (Router $router) {
    $router->get('/', function() {return new Response('Welcome to PicoPHP!');});
    $router->get('/env', function() {return new Response(json_encode(require dirname(__DIR__) . '/config/database.php'), 200);});
    $router->get('/user/{id}', [UserController::class, 'show'], [new IdCheckMiddleware()]);
};
