SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";

CREATE TABLE `gato` (
  `id_Gato` int(11) NOT NULL,
  `nombre` varchar(50) NOT NULL,
  `edad` varchar(2)  NULL,
  `genero` varchar(10) NOT NULL, CHECK (género IN ('Macho', 'Hembra')) 
  `foto` longblob NOT NULL,
  `estado_Medico` varchar(70) NOT NULL,
  `telefono` varchar(10)  NULL,
  `historia` varchar(70) NOT NULL,
  `direccion` varchar(70) NOT NULL,
  `castracion` varchar(3) NOT NULL CHECK (activo IN ('Sí', 'No')) 
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

CREATE TABLE `persona` (
  `id` int(4) NOT NULL,
  `apellido` varchar(50) NOT NULL,
  `nombre` varchar(50) NOT NULL,
  `fecha` date NOT NULL,
  `foto` longblob NOT NULL,
  `usuario` varchar(50) NOT NULL,
  `clave` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--indice persona
ALTER TABLE `persona`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `usuario` (`usuario`);
--- indice gato
ALTER TABLE `gato`
  ADD PRIMARY KEY (`id_Gato`),
  ADD UNIQUE KEY `clave` (`clave`);