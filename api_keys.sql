CREATE TABLE IF NOT EXISTS api_keys (
    id INT AUTO_INCREMENT PRIMARY KEY,
    api_key VARCHAR(100) NOT NULL UNIQUE,
    keterangan VARCHAR(255),
    is_active TINYINT(1) DEFAULT 1,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

INSERT INTO api_keys (api_key, keterangan, is_active) 
VALUES ('mobile_app_secret_key_12345', 'Mobile App Default Key', 1);
