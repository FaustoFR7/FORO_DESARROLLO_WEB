CREATE DATABASE IF NOT EXISTS login_system;
USE login_system;

CREATE TABLE IF NOT EXISTS users (
    id INT AUTO_INCREMENT PRIMARY KEY,
    username VARCHAR(50) NOT NULL UNIQUE,
    password VARCHAR(20) NOT NULL,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

-- Insertar un usuario inicial (contraseña: 'password12345')
INSERT INTO users (username, password) VALUES
('admin', '12345');