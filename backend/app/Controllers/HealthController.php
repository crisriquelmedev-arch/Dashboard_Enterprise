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


}