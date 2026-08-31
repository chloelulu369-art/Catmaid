DROP DATABASE IF EXISTS catmaid;
CREATE DATABASE catmaid CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci;
USE catmaid;

CREATE TABLE persona (
    id INT AUTO_INCREMENT PRIMARY KEY,
    apellido VARCHAR(60) NOT NULL,
    nombre VARCHAR(60) NOT NULL,
    fecha_nacimiento DATE NOT NULL,
    usuario VARCHAR(80) NOT NULL UNIQUE,
    clave VARCHAR(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

CREATE TABLE gato (
    id_gato INT AUTO_INCREMENT PRIMARY KEY,
    nombre VARCHAR(80) NOT NULL,
    edad INT NOT NULL,
    genero ENUM('Macho', 'Hembra') NOT NULL,
    foto VARCHAR(255) DEFAULT NULL,
    estado_medico VARCHAR(150) NOT NULL,
    telefono VARCHAR(20) NOT NULL,
    historia TEXT NOT NULL,
    direccion VARCHAR(200) NOT NULL,
    castrado ENUM('Si', 'No') NOT NULL,
    fecha_registro TIMESTAMP DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

INSERT INTO persona (apellido, nombre, fecha_nacimiento, usuario, clave) VALUES
('Admin', 'Catmaid', '2020-01-01', 'admin@catmaid.org', '$2y$10$9jY33uD9a7.3vP086hVCWuy6F9L7fTsvzAxy1TQ6dYl6Y.S2w7lVu');

INSERT INTO gato (nombre, edad, genero, foto, estado_medico, telefono, historia, direccion, castrado) VALUES
('Luna', 2, 'Hembra', 'imagenes/gatos/luna.jpg', 'Vacunada y esterilizada', '5512345678', 'Llegó al refugio tras ser rescatada de la calle y ahora busca una familia cariñosa.', 'Colonia Centro, CDMX', 'Si'),
('Tom', 1, 'Macho', 'imagenes/gatos/tom.jpg', 'En tratamiento de control', '5523456789', 'Es muy sociable y juguetón. Le encanta dormir junto a la gente.', 'San Miguel, CDMX', 'No'),
('Milo', 4, 'Macho', 'imagenes/gatos/milo.jpg', 'Vacunado y saludable', '5534567890', 'Milo es calmado y muy noble con niños y adultos.', 'Coyoacán, CDMX', 'Si');