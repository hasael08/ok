-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 06-11-2023 a las 18:25:28
-- Versión del servidor: 10.4.28-MariaDB
-- Versión de PHP: 8.0.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `crud_php`
--
CREATE DATABASE IF NOT EXISTS `crud_php` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;
USE `crud_php`;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `persona`
--
-- Creación: 06-11-2023 a las 05:58:02
-- Última actualización: 06-11-2023 a las 17:22:29
--

CREATE TABLE `persona` (
  `nombre` varchar(255) NOT NULL,
  `apellido` varchar(255) NOT NULL,
  `dni` varchar(255) NOT NULL,
  `fecha_nac` varchar(255) NOT NULL,
  `id_persona` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `persona`
--

INSERT INTO `persona` (`nombre`, `apellido`, `dni`, `fecha_nac`, `id_persona`) VALUES
('PIERO', 'RUIZ  RUIZ', '71089476', '2023-11-01', 6),
('PIERO', 'RUIZ  RUIZ', '71089476', '2023-11-01', 7),
('PIERO', 'RUIZ  RU', '71089476', '2023-11-03', 13),
('PIERO ALEXANDRO', 'RUIZ  RUIZ', '71089479', '2023-11-02', 14);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--
-- Creación: 06-11-2023 a las 05:22:31
-- Última actualización: 06-11-2023 a las 17:22:09
--

CREATE TABLE `usuarios` (
  `id_persona` int(11) NOT NULL,
  `correo` varchar(255) NOT NULL,
  `contrasena` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`id_persona`, `correo`, `contrasena`) VALUES
(2, 'rpieroAlexandro@mail.com', '$2y$10$HZyhU/UqzPSxKBFP1/HO3.3ewGFs/NN7mZiHlsZwOhRP.aDAdZhQ2'),
(10, 'rpieroAlexandro@gmail.com', '$2y$10$iltO13I6A15KV2e856h33OZaHaHQ3tmspN72Bm6g8HlfPiH474C7a'),
(13, 'rpieroAlexandro@gmail.con', '$2y$10$ykYaX6RuuVn2m7wZ/U7R5eovNQ1/KKOIEWv7Ckb6b2Iv9XZgZFqli'),
(14, 'rpieroAlexandro@gmail.com', '$2y$10$5hQovgvVs392vFxlJrY2vOO7TDdLMHRUL4.wrUQBJp161.z2uBr.a');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `persona`
--
ALTER TABLE `persona`
  ADD PRIMARY KEY (`id_persona`);

--
-- Indices de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`id_persona`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `persona`
--
ALTER TABLE `persona`
  MODIFY `id_persona` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id_persona` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
