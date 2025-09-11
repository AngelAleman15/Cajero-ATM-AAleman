CREATE DATABASE Tarjetas;
USE Tarjetas;

CREATE TABLE tarjetas (
    id INT AUTO_INCREMENT PRIMARY KEY,
    numero_tarjeta VARCHAR(16) NOT NULL UNIQUE,
    marca VARCHAR(50),
    pin VARCHAR(4) NOT NULL,
    saldo DECIMAL(10, 2) NOT NULL DEFAULT 0.00
);

CREATE TABLE usuarios (
    id INT AUTO_INCREMENT PRIMARY KEY,
    contrasenia VARCHAR(255) NOT NULL,
    nombre VARCHAR(100) NOT NULL,
    numero_tarjeta VARCHAR(16),
    FOREIGN KEY (numero_tarjeta) REFERENCES tarjetas(numero_tarjeta)
);

INSERT INTO tarjetas (numero_tarjeta, marca, pin, saldo) VALUES
('1234567812345678', 'Visa', '1234', 1000.00),
('8765432187654321', 'MasterCard', '4321', 500.00),
('1111222233334444', 'American Express', '1111', 750.00),
('5555666677778888', 'Visa', '5555', 2500.00),
('9999000011112222', 'Prex', '9999', 1800.00);

INSERT INTO usuarios (id, contrasenia, nombre, numero_tarjeta) VALUES
(1, '1234', 'Juan Perez', '1234567812345678'),
(2, 'admin', 'Admin User', '8765432187654321'),
(3, '0000', 'Maria Garcia', '1111222233334444'),
(4, 'test', 'Carlos Rodriguez', '5555666677778888'),
(5, 'demo', 'Ana Martinez', '9999000011112222');