CREATE DATABASE Tarjetas;
USE Tarjetas;

CREATE TABLE tarjetas (
    id INT AUTO_INCREMENT PRIMARY KEY,
    numero_tarjeta VARCHAR(16) NOT NULL UNIQUE,
    pin VARCHAR(4) NOT NULL,
    saldo DECIMAL(10, 2) NOT NULL DEFAULT 0.00
);

CREATE TABLE usuarios (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nombre VARCHAR(100) NOT NULL,
    numero_tarjeta VARCHAR(16),
    FOREIGN KEY (numero_tarjeta) REFERENCES tarjetas(numero_tarjeta)
);

INSERT INTO tarjetas (numero_tarjeta, pin, saldo) VALUES
('1234567812345678', '1234', 1000.00),
('8765432187654321', '4321', 500.00),
('1111222233334444', '1111', 750.00);