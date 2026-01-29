<?php

declare(strict_types=1);

namespace App\Controllers;

use App\Http\Request;
use App\Http\Responses\JsonResponse;
use App\Http\Responses\Response;

final class HealthController
{
    public function index(Request $request): Response
    {
        return new JsonResponse([
            'status' => 'ok',
            'service' => 'Dashboard Metrics API',
        ]);
    }

    public function health(Request $request): Response
    {
        return new JsonResponse([
            'uptime' => 'running',
            'timestamp' => time(),
        ]);
    }

    public function db(Request $request): Response
    {
        try {
            $pdo = \App\Infrastructure\Database::getConnection();
            $pdo->query('SELECT 1');

            return new JsonResponse([
                'status' => 'ok',
                'db' => 'up',
            ]);
        } catch (\Throwable $e) {
            return new JsonResponse([
                'status' => 'error',
                'db' => 'down',
            ], 500);
        }
    }
}
