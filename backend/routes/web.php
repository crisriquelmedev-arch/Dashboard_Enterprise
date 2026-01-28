<?php   

use App\Controllers\HealthController;

return [
    'GET' => [
        '/' => [HealthController::class, 'index'],
        '/health' => [HealthController::class, 'health']

        ]
];