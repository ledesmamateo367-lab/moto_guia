-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 08-10-2025 a las 18:36:40
-- Versión del servidor: 10.4.32-MariaDB
-- Versión de PHP: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `moto_guia`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `formulario`
--

CREATE TABLE `formulario` (
  `id_formulario` int(11) NOT NULL,
  `nombre` varchar(100) NOT NULL,
  `correo` varchar(150) NOT NULL,
  `telefono` varchar(20) NOT NULL,
  `asunto` varchar(100) NOT NULL,
  `mensaje` varchar(2000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `formulario`
--

INSERT INTO `formulario` (`id_formulario`, `nombre`, `correo`, `telefono`, `asunto`, `mensaje`) VALUES
(1, 'Mateo Ledesma Tobón', 'mateo897gmail.com', '3137248184', 'necesito plata.', 'lo mismo que arriba'),
(2, 'rodolfo', 'yulianapatino876@gmail.com', '+34 854 574 958', 'moto', 'ayuda'),
(4, '00', '00', '00', '00', '00'),
(5, '', '', '', '', ''),
(8, 'mateo', 'mateo897@gmail.com', '3137248184', 'ayuda', 'ayudame'),
(15, 'mateo', 'ledesmamateo367@gmail.com', '3137248184', 'necesito plata', 'lo mismo que arriba'),
(19, 'mateo', 'ledes567@gmail.com', '3137248184', 'necesito plata', 'lo mismo que arriba'),
(20, 'mateo', 'pavillegas08@itagui.edu.com', '3137248184', 'necesito plata', 'ayuda\r\n'),
(22, 'mateo', 'tobonteo8@gmail.com', '3137248184', 'necesito plata', 'ayuda\r\n'),
(23, 'mateo', 'karge@gmail.com', '3137248184', 'necesito plata', 'ayuda');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `formulario`
--
ALTER TABLE `formulario`
  ADD PRIMARY KEY (`id_formulario`),
  ADD UNIQUE KEY `correo` (`correo`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `formulario`
--
ALTER TABLE `formulario`
  MODIFY `id_formulario` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
