CREATE TABLE IF NOT EXISTS metrics (
    id BIGINT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(120) NOT NULL,
    value DECIMAL(12,2) NOT NULL,
    category VARCHAR(80) NOT NULL,
    region VARCHAR(80) NOT NULL,
    recorded_at DATETIME NOT NULL,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

INSERT INTO metrics (name, value, category, region, recorded_at) VALUES (
    'revenue', 12500.50, 'finance', 'ES', NOW()),
    ('orders', 320, 'sales', 'ES', NOW()),
    ('active_users', 842, 'product', 'FR', NOW()
);