<?php

return [
    
    'host' => getenv('DB_HOST') ?: 'mysql',
    
    'port' => (int)(getenv('DB_PORT') ?: 3306),
    
    'database' => getenv('DB_DATABASE') ?: 'dashboard',
    
    'user' => getenv('DB_USER') ?: 'dashboard',
    
    'password' => getenv('DB_PASSWORD') ?: 'dashboard',
    
    
];