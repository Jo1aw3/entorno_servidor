-- Crear la base de datos
CREATE DATABASE IF NOT EXISTS biblioteca;

-- Usar la base de datos
USE biblioteca;

-- Crear la tabla de usuarios
CREATE TABLE IF NOT EXISTS usuarios (
    id INT AUTO_INCREMENT PRIMARY KEY,
    username VARCHAR(255) NOT NULL,
    password VARCHAR(255) NOT NULL,
    admin BOOLEAN NOT NULL DEFAULT 0
);

-- Crear la tabla de libros
CREATE TABLE IF NOT EXISTS libros (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nombre VARCHAR(255) NOT NULL,
    autor VARCHAR(255) NOT NULL
);

-- Datos de ejemplo para la tabla usuarios
INSERT INTO usuarios (username, password, admin) VALUES
('admin', 'admin123', 1),  -- El administrador
('usuario1', 'pass123', 0), -- Un usuario normal
('usuario2', 'pass456', 0); -- Otro usuario normal

-- Datos de ejemplo para la tabla libros
INSERT INTO libros (nombre, autor) VALUES
('El Señor de los Anillos', 'J.R.R. Tolkien'),
('Cien años de soledad', 'Gabriel García Márquez'),
('1984', 'George Orwell');