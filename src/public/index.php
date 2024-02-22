<?php

declare(strict_types=1);

use Dotenv\Dotenv;

require __DIR__ . '/../vendor/autoload.php';

$dotenv = Dotenv::createImmutable(__DIR__);

use App\Router;
use App\View;

define('VIEW_PATH', __DIR__ . '/../app/views/');

session_start();

$router = new Router();

try {
    $router
        ->get('/', [App\Controllers\HomeController::class, 'index'])
        ->get('/invoices', [App\Controllers\InvoicesController::class, 'index'])
        ->get('/invoices/create', [App\Controllers\InvoicesController::class, 'create'])
        ->post('/invoices/create', [App\Controllers\InvoicesController::class, 'store']);

    echo $router->resolve($_SERVER['REQUEST_URI'], $_SERVER['REQUEST_METHOD']);
} catch (App\Execptions\RouteNotFoundExecption $e) {
    http_response_code(404);
    echo View::make('error/404')->render();
}
