<?php

namespace App\Controllers;

class HealthController {
    public function index():void {
        $this->json([
            'status' => 'ok',
            'service' => 'Dashboard Metrics API'
        ]);
    }

    public function health():void {
        $this->json([
            'uptime' => 'running',
            'timestamp' => time()
        ]); 
    }

    public function json(array $data): void {
        header('Content-Type: application/json');
        echo json_encode($data);
    }

    public function db(): void {
        try{
            $pdo = \App\Infrastructure\Database::getConnection();
            $pdo->query('SELECT 1');
            echo json_encode(['status' => 'ok', 'db' => 'up']);
        }catch(\Throwable $e){
            http_response_code(500);
            echo json_encode(['status' => 'error', 'db' => 'down']);
        }
    }


}