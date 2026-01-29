<?php

declare(strict_types=1);

namespace App\Infrastructure;

use App\Http\Request;
use App\Http\Responses\Response;
use App\Http\Responses\JsonResponse;
use App\Http\Exceptions\HttpException;


final class Router
{
    public function dispatch(array $routes, Request $request): void {
        $method = $request->method();
        $path = $request-> path();

        try{
        if(!isset($routes[$method][$path])){
            throw new HttpException('Route not found', 404);
        }

        [$controller, $action] = $routes[$method][$path];

        $controllerInstance = new $controller();
        

        $response = $controllerInstance ->$action($request);

        $response->send();
        }catch(HttpException $e){
            (new JsonResponse(['status' => 'error', 'message' => $e-> getMessage()], $e->statusCode()))->send();
        }catch(\Throwable $e){
            $debug = (getenv('APP_DEBUG') === true);

            (new \App\Http\Responses\JsonResponse([
                'status' => 'error',
                'message' => $debug ? $e->getMessage() : 'Internal Server Error',
        ], 500))->send();
        }
    }
    
}