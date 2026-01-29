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
        $category = $request->queryString('category');
        $region   = $request->queryString('region');
        $from     = $request->queryString('from');
        $to       = $request->queryString('to');

        $service = new MetricsService(new MetricsRepository());

        $data = $service->listWithFilter($limit, $category, $region, $from, $to);

        return new JsonResponse([
            'status' => 'ok',
            'filters' => compact('limit', 'category', 'region', 'from', 'to'),
            'count' => count($data),
            'data' => $data,
        ]);

    }
    }