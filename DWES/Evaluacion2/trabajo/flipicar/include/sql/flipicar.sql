-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 18-12-2024 a las 21:53:03
-- Versión del servidor: 8.0.30
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
  `id` int NOT NULL,
  `nombre` varchar(255) COLLATE utf8mb4_spanish_ci NOT NULL,
  `dni` varchar(9) COLLATE utf8mb4_spanish_ci NOT NULL,
  `fecha_nacimiento` date NOT NULL,
  `fecha_obtencion_permiso_conducir` date NOT NULL,
  `fecha_expiracion_permiso_conducir` date NOT NULL,
  `foto_anverso_carnet_conducir` text COLLATE utf8mb4_spanish_ci NOT NULL,
  `foto_reverso_carnet_conducir` text COLLATE utf8mb4_spanish_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_spanish_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_spanish_ci NOT NULL,
  `telefono` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish_ci;

--
-- Volcado de datos para la tabla `clientes`
--

INSERT INTO `clientes` (`id`, `nombre`, `dni`, `fecha_nacimiento`, `fecha_obtencion_permiso_conducir`, `fecha_expiracion_permiso_conducir`, `foto_anverso_carnet_conducir`, `foto_reverso_carnet_conducir`, `email`, `password`, `telefono`) VALUES
(1, 'admin', '', '0000-00-00', '0000-00-00', '0000-00-00', '', '', 'adminFlipicar@gmail.com', '$2y$10$w2YYubpMKnpwDBkK3doIVuJvIPEXarwMrnrEWhDuymyhvgg8l9n0m', 611132086);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `coches`
--

CREATE TABLE `coches` (
  `id` int NOT NULL,
  `marca_id` int NOT NULL,
  `modelo` varchar(255) NOT NULL,
  `kilometros` int NOT NULL,
  `color` varchar(50) NOT NULL,
  `precio` decimal(10,2) NOT NULL,
  `foto` varchar(255) DEFAULT NULL,
  `deposito` decimal(10,2) NOT NULL,
  `kms_incluidos` int NOT NULL,
  `costo_km_extra` decimal(10,2) NOT NULL,
  `gallery` json DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Volcado de datos para la tabla `coches`
--

INSERT INTO `coches` (`id`, `marca_id`, `modelo`, `kilometros`, `color`, `precio`, `foto`, `deposito`, `kms_incluidos`, `costo_km_extra`, `gallery`) VALUES
(1, 4, '718 Spyder RS', 308, 'gris', 4000.00, 'https://images-porsche.imgix.net/-/media/DA04524ED073403CBC8DA3E50AEF792F_0ADD510F2A8F4A86B510E6F30DFE883F_718-spyder-rs-side?w=600&q=85&crop=faces%2Centropy%2Cedges&auto=format', 400.00, 200, 200.00, '[{\"alt_text\": \"Vista frontal\", \"image_url\": \"https://images-porsche.imgix.net/-/media/A3D98F5AED994FCF9F2A444CE78A839F_A58DD203A6AF48B587D3BB5C11426AEC_718-spyder-rs-front?w=622&q=85&auto=format\"}, {\"alt_text\": \"Vista trasera\", \"image_url\": \"https://images-porsche.imgix.net/-/media/FE99FC0EBC284173A8ABDEA0849D4E3A_24B0CBAF60114E1EAB3C8452E9BE93CD_BX24I3HOX0023-718-spyder-rs-rear?w=600&q=85&crop=faces%2Centropy%2Cedges&auto=format\"}]');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `marcas`
--

CREATE TABLE `marcas` (
  `id` int NOT NULL,
  `nombre` varchar(255) COLLATE utf8mb4_spanish2_ci NOT NULL,
  `imagen` varchar(255) COLLATE utf8mb4_spanish2_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish2_ci;

--
-- Volcado de datos para la tabla `marcas`
--

INSERT INTO `marcas` (`id`, `nombre`, `imagen`) VALUES
(4, 'Porsche', 'https://i.pinimg.com/originals/e2/84/9b/e2849bd260a2481da6f0684bfefe2bdf.png'),
(8, 'Maserati', 'https://www.logo-voiture.com/wp-content/uploads/2023/08/Maserati-Logo-2006-768x434-1.png');

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
  ADD PRIMARY KEY (`id`),
  ADD KEY `marca_id` (`marca_id`);

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
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT de la tabla `coches`
--
ALTER TABLE `coches`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `coches`
--
ALTER TABLE `coches`
  ADD CONSTRAINT `coches_ibfk_1` FOREIGN KEY (`marca_id`) REFERENCES `marcas` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
