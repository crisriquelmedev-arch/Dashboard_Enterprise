<?php  


declare(strict_types=1);

require_once __DIR__ . '/../vendor/autoload.php';

use App\Infrastructure\Router;

header('Content-Type: application/json');
$router = new Router();
$routes = require __DIR__ . '/../routes/web.php';
$router->dispatch($routes);

;

