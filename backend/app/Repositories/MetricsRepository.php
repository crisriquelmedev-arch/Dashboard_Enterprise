<?php
declare(strict_types=1);

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

    public function allWithFilters(
        int $limit, 
        ?string $category,
        ?string $region,
        ?string $from,
        ?string $to
        ): array {
            $pdo = Database::getConnection();

            $sql = "
            SELECT id, name, value, category, region, recorded_at
            FROM metrics
            WHERE 1 = 1";

         $params = [];

        if ($category !==null && $category !== '') {
            $sql .= " AND category = :category";
            $params['category'] = $category;
        }

        if ($region !==null && $region !== '') {
            $sql .= " AND region = :region";
            $params['region'] = $region;
        }
        if ($from !==null && $from !== '') {
            $sql .= " AND recorded_at >= :from";
            $params['from'] = $from;
        }
        if ($to !==null && $to !== '') {
            $sql .= " AND recorded_at <= :to";
            $params['to'] = $to;
        }

        
        

        $sql .= " ORDER BY recorded_at DESC LIMIT :limit";
        
        $stmt = $pdo->prepare($sql);
        
        
        foreach ($params as $key => $value){
            $stmt->bindValue(':' . $key,$value);
        }
            
        $stmt->bindValue(':limit', $limit, \PDO::PARAM_INT);
            
        $stmt->execute();

            
        return $stmt->fetchAll();

    }        
                
}