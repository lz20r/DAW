-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: localhost:3306
-- Tiempo de generación: 19-12-2024 a las 16:06:43
-- Versión del servidor: 8.0.30
-- Versión de PHP: 8.1.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `parking`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `registros`
--

CREATE TABLE `registros` (
  `id` int NOT NULL,
  `matricula` varchar(7) COLLATE utf8mb3_spanish_ci NOT NULL,
  `entrada` varchar(10) COLLATE utf8mb3_spanish_ci NOT NULL,
  `salida` varchar(10) COLLATE utf8mb3_spanish_ci NOT NULL,
  `esta_en_el_parking` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_spanish_ci;

--
-- Volcado de datos para la tabla `registros`
--

INSERT INTO `registros` (`id`, `matricula`, `entrada`, `salida`, `esta_en_el_parking`) VALUES
(1, '1111JFS', '1734621542', '1734621658', 0),
(2, '1111JFS', '1734621624', '1734621658', 0),
(3, '8875DDS', '1734621794', '', 1),
(4, '1234CAS', '1734621814', '', 1),
(5, '1234AAA', '1734621820', '1734623612', 0),
(6, '1237MPT', '1734621823', '', 1),
(7, '1212LDS', '1734621826', '', 1),
(8, '1111JFS', '1734621829', '', 1);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `registros`
--
ALTER TABLE `registros`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `registros`
--
ALTER TABLE `registros`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
