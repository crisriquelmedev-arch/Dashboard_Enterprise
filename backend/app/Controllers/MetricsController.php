<?php

declare(strict_types=1);

namespace App\Controllers;

use App\Repositories\MetricsRepository;
use App\Services\MetricsService;

final class MetricsController {
    public function index():void{
        $limit = isset($_GET['limit']) ? (int) $_GET['limit'] : 100;
        $limit = max(1,min($limit, 500));

        $service = new MetricsService(new MetricsRepository());
        $data = $service->list($limit);

        echo json_encode([
            'status' => 'ok',
            'count' => count($data),
            'data' => $data,
        ]
        );

    }
    }