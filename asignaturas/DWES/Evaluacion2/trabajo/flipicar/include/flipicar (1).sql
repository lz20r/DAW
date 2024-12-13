-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: localhost:3306
-- Tiempo de generación: 13-12-2024 a las 11:21:48
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
-- Base de datos: `flipicar`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `clientes`
--

CREATE TABLE `clientes` (
  `id` int NOT NULL,
  `nombre` varchar(255) COLLATE utf8mb4_spanish_ci NOT NULL,
  `dni` varchar(9) COLLATE utf8mb4_spanish_ci NOT NULL,
  `fecha_nacimiento` date NOT NULL,
  `fecha_obtencion_permiso_conducir` date NOT NULL,
  `fecha_expiracion_permiso_conducir` date NOT NULL,
  `foto_anverso_carnet_conducir` text COLLATE utf8mb4_spanish_ci NOT NULL,
  `foto_reverso_carnet_conducir` text COLLATE utf8mb4_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `coches`
--

CREATE TABLE `coches` (
  `id` int NOT NULL,
  `marca` varchar(255) COLLATE utf8mb4_spanish_ci NOT NULL,
  `modelo` varchar(255) COLLATE utf8mb4_spanish_ci NOT NULL,
  `kilometros` int NOT NULL,
  `color` varchar(255) COLLATE utf8mb4_spanish_ci NOT NULL,
  `precio` float NOT NULL,
  `deposito` decimal(10,2) NOT NULL,
  `kms_incluidos` int NOT NULL,
  `costo_km_extra` decimal(10,2) NOT NULL,
  `foto` text COLLATE utf8mb4_spanish_ci NOT NULL,
  `gallery` json DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish_ci;

--
-- Volcado de datos para la tabla `coches`
--

INSERT INTO `coches` (`id`, `marca`, `modelo`, `kilometros`, `color`, `precio`, `deposito`, `kms_incluidos`, `costo_km_extra`, `foto`, `gallery`) VALUES
(1, 'Ferrari', 'GTC 4 Lusso', 3000, 'negro', 4000, 5000.00, 300, 9.00, 'https://gtrentals.es/wp-content/uploads/2024/06/6-IMG_4754-scaled.jpg', '[{\"alt_text\": \"Vista lateral\", \"image_url\": \"https://gtrentals.es/wp-content/uploads/2024/06/4-IMG_4720-scaled.jpg\"}, {\"alt_text\": \"Vista frontal\", \"image_url\": \"https://gtrentals.es/wp-content/uploads/2024/06/5-IMG_4745-scaled.jpg\"}]'),
(2, 'Rolls Royce', 'R8 Spyder', 3000, 'negro', 3000, 0.00, 0, 0.00, 'https://gtrentals.es/wp-content/uploads/2023/01/8-IMG_3627-scaled.jpg', NULL);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `clientes`
--
ALTER TABLE `clientes`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `coches`
--
ALTER TABLE `coches`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `clientes`
--
ALTER TABLE `clientes`
  MODIFY `id` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `coches`
--
ALTER TABLE `coches`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
