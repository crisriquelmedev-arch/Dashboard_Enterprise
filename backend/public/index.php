<?php  


declare(strict_types=1);

require_once __DIR__ . '/../vendor/autoload.php';

use App\Infrastructure\Router;
use App\Http\Request;

$routes = require __DIR__ . '/../routes/web.php';

$request = Request::fromGlobals();

$router = new Router();

$router->dispatch($routes, $request);





