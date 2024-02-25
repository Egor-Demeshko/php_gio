<?php

declare(strict_types=1);

use Dotenv\Dotenv;
use App\App as mainApp;

require __DIR__ . '/../vendor/autoload.php';

$dotenv = Dotenv::createImmutable(__DIR__ . '/../');
$dotenv->load();

use App\Router;
use App\View;
use App\Config;

define('VIEW_PATH', __DIR__ . '/../app/views/');

session_start();

$router = new Router();

try {
    $router
        ->get('/', [App\Controllers\HomeController::class, 'index'])
        ->get('/invoices', [App\Controllers\InvoicesController::class, 'index'])
        ->get('/invoices/create', [App\Controllers\InvoicesController::class, 'create'])
        ->post('/invoices/create', [App\Controllers\InvoicesController::class, 'store']);
} catch (App\Execptions\RouteNotFoundExecption $e) {
    http_response_code(404);
    echo View::make('error/404')->render();
}


(new mainApp(
    $router,
    [
        'uri' => $_SERVER['REQUEST_URI'],
        'method' => $_SERVER['REQUEST_METHOD'],
    ],
    new Config($_ENV)
))->run();
