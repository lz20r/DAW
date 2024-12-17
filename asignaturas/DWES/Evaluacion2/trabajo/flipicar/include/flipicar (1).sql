-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 16-12-2024 a las 09:42:03
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
-- Base de datos: `flipicar`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `clientes`
--

CREATE TABLE `clientes` (
  `id` int(11) NOT NULL,
  `nombre` varchar(255) NOT NULL,
  `dni` varchar(9) NOT NULL,
  `fecha_nacimiento` date NOT NULL,
  `fecha_obtencion_permiso_conducir` date NOT NULL,
  `fecha_expiracion_permiso_conducir` date NOT NULL,
  `foto_anverso_carnet_conducir` text NOT NULL,
  `foto_reverso_carnet_conducir` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `coches`
--

CREATE TABLE `coches` (
  `id` int(11) NOT NULL,
  `marca` varchar(255) NOT NULL,
  `modelo` varchar(255) NOT NULL,
  `kilometros` int(11) NOT NULL,
  `color` varchar(255) NOT NULL,
  `precio` float NOT NULL,
  `deposito` decimal(10,2) NOT NULL,
  `kms_incluidos` int(11) NOT NULL,
  `costo_km_extra` decimal(10,2) NOT NULL,
  `foto` text NOT NULL,
  `gallery` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin DEFAULT NULL CHECK (json_valid(`gallery`))
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish_ci;

--
-- Volcado de datos para la tabla `coches`
--

INSERT INTO `coches` (`id`, `marca`, `modelo`, `kilometros`, `color`, `precio`, `deposito`, `kms_incluidos`, `costo_km_extra`, `foto`, `gallery`) VALUES
(1, 'Ferrari', 'GTC 4 Lusso', 3000, 'negro', 4000, 5000.00, 300, 9.00, 'https://gtrentals.es/wp-content/uploads/2024/06/6-IMG_4754-scaled.jpg', '[{\"alt_text\": \"Vista lateral\", \"image_url\": \"https://gtrentals.es/wp-content/uploads/2024/06/4-IMG_4720-scaled.jpg\"}, {\"alt_text\": \"Vista frontal\", \"image_url\": \"https://gtrentals.es/wp-content/uploads/2024/06/5-IMG_4745-scaled.jpg\"}]'),
(2, 'Rolls Royce', 'R8 Spyder', 3000, 'negro', 3000, 0.00, 0, 0.00, 'https://gtrentals.es/wp-content/uploads/2023/01/8-IMG_3627-scaled.jpg', NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `marcas`
--

CREATE TABLE `marcas` (
  `id` int(11) NOT NULL,
  `nombre` varchar(255) NOT NULL,
  `imagen` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish2_ci;

--
-- Volcado de datos para la tabla `marcas`
--

INSERT INTO `marcas` (`id`, `nombre`, `imagen`) VALUES
(2, 'Ferrari', 'img/ferrari.png'),
(3, 'Maybach', 'img/mercedes.png'),
(4, 'Porsche', 'img/porsche.png'),
(5, 'Spyker', 'img/spyker.png'),
(6, 'Koenigsegg', 'img/Koenigsegg.png'),
(7, 'Pagani', 'img/Pagani.png'),
(8, 'Maserati', 'img/Maserati.png'),
(9, 'Lamborghini', 'img/Lamborghini.png');

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
-- Indices de la tabla `marcas`
--
ALTER TABLE `marcas`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `clientes`
--
ALTER TABLE `clientes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `coches`
--
ALTER TABLE `coches`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
