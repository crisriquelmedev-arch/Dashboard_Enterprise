<?php

namespace App\Repositories;

use App\Infrastructure\Database;

final class MetricsRepository {
    public function all(int $limit = 100) : array{
        $pdo = Database::getConnection();

        $limit = max(1, min($limit, 500));

        $stmt = $pdo->prepare(
            'SELECT id, name, value, category, region, recorded_at 
            FROM metrics
            ORDER BY recorded_at DESC 
            LIMIT :limit')
        ;

        $stmt->bindValue(':limit', $limit, \PDO::PARAM_INT);
        $stmt->execute();

        return $stmt->fetchAll();
    }
}