<?php  


declare(strict_types=1);

require_once __DIR__ . '/../vendor/autoload.php';


http_response_code(200);
header('Content-Type: application/json');

echo json_encode([
    'status' => 'ok',
    'message' => 'Dashboard Metrics API running'
]);

