CREATE DATABASE Tarjetas;
USE Tarjetas;

CREATE TABLE usuarios (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nombre VARCHAR(100) NOT NULL,
    apellido VARCHAR(100) NOT NULL,
    contrasenia VARCHAR(255) NOT NULL,
    fecha_creacion TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

CREATE TABLE tarjetas (
    id INT AUTO_INCREMENT PRIMARY KEY,
    numero_tarjeta VARCHAR(16) NOT NULL UNIQUE,
    marca ENUM('Visa', 'MasterCard', 'American Express', 'Prex') NOT NULL,
    pin VARCHAR(4) NOT NULL,
    saldo DECIMAL(10, 2) NOT NULL DEFAULT 0.00,
    id_usuario INT NOT NULL,
    fecha_emision DATE NOT NULL,
    fecha_vencimiento DATE NOT NULL,
    FOREIGN KEY (id_usuario) REFERENCES usuarios(id) ON DELETE CASCADE,
    INDEX idx_usuario (id_usuario),
    INDEX idx_numero_tarjeta (numero_tarjeta)
);

INSERT INTO usuarios (nombre, apellido, contrasenia) VALUES
('Juan', 'Perez', '1234'),
('Maria', 'Garcia', 'admin'),
('Carlos', 'Rodriguez', '0000'),
('Ana', 'Martinez', 'test'),
('Luis', 'Gonzalez', 'demo');

INSERT INTO tarjetas (numero_tarjeta, marca, pin, saldo, id_usuario, fecha_emision, fecha_vencimiento) VALUES
-- Tarjetas de Juan Perez (usuario 1)
('4539148803436467', 'Visa', '1234', 1500.00, 1, '2023-01-15', '2028-01-31'),
('5425233430109903', 'MasterCard', '5678', 750.00, 1, '2023-06-10', '2028-06-30'),
('378593847562910', 'American Express', '7890', 3200.00, 1, '2024-04-20', '2029-04-30'),
('6062745891237456', 'Prex', '2580', 680.00, 1, '2024-07-15', '2029-07-31'),

-- Tarjetas de Maria Garcia (usuario 2)
('4916592289993918', 'Visa', '4321', 2200.00, 2, '2022-11-20', '2027-11-30'),

-- Tarjetas de Carlos Rodriguez (usuario 3)
('5284730591864205', 'MasterCard', '1111', 890.50, 3, '2024-03-05', '2029-03-31'),
('378734493671000', 'American Express', '2222', 1750.00, 3, '2024-01-12', '2029-01-31'),

-- Tarjetas de Ana Martinez (usuario 4)
('6062820524845321', 'Prex', '9999', 320.00, 4, '2023-09-18', '2028-09-30'),

-- Tarjetas de Luis Gonzalez (usuario 5)
('4485040371536584', 'Visa', '3333', 4500.00, 5, '2024-02-28', '2029-02-28'),
('5105827394619342', 'MasterCard', '4444', 1200.00, 5, '2023-12-01', '2028-12-31');