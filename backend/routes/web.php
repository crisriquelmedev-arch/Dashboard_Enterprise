<?php   

use App\Controllers\HealthController;
use App\Controllers\MetricsController;

return [
    'GET' => [
        '/' => [HealthController::class, 'index'],
        '/health' => [HealthController::class, 'health'],
        '/health/db' => [HealthController::class, 'db'],
        '/metrics' => [MetricsController::class, 'index'],

        ]
];