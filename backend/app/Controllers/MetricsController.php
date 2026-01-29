<?php

declare(strict_types=1);

namespace App\Controllers;

use App\Repositories\MetricsRepository;
use App\Services\MetricsService;
use App\Http\Request;
use App\Http\Responses\JsonResponse;
use App\Http\Responses\Response;


final class MetricsController {
    public function index(Request $request): Response{
        $limit = $request->queryInt('limit', 100);
        $limit =max(1, min($limit, 500));


        $service = new MetricsService(new MetricsRepository());

        $data = $service->list($limit);

        return new JsonResponse([
            'status' => 'ok',
            'count' => count($data),
            'data' => $data
        ]);

    }
    }