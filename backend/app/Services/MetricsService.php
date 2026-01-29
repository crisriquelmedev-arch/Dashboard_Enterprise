<?php
declare(strict_types=1);

namespace App\Services;

use App\Repositories\MetricsRepository;

class MetricsService {
    public function __construct (
        private MetricsRepository $repository
        ){}
        
        public function list(int $limit = 100): array{
            return $this->repository->all($limit);
        }
        
        public function listWithFilter(
            int $limit,
            ?string $category,
            ?string $region,
            ?string $from,
            ?string $to
        ): array{
            return $this->repository->allWithFilters($limit, $category, $region, $from, $to);
        }
        
    }
