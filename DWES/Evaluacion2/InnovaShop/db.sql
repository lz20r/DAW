-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 21-01-2025 a las 14:13:18
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
-- Base de datos: `shop`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `productos`
--

CREATE TABLE `productos` (
  `id` int(11) NOT NULL,
  `nombre` varchar(255) NOT NULL,
  `descripcion` text DEFAULT NULL,
  `precio` decimal(10,2) DEFAULT NULL,
  `stock` int(11) DEFAULT 0,
  `categoria` varchar(100) DEFAULT NULL,
  `image` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `productos`
--

INSERT INTO `productos` (`id`, `nombre`, `descripcion`, `precio`, `stock`, `categoria`, `image`) VALUES
(1, 'Laptop HP Pavilion', 'Laptop ligera con procesador Intel Core i5 y 8GB de RAM', 750.99, 0, 'Informática', 'https://encrypted-tbn1.gstatic.com/shopping?q=tbn:ANd9GcRN5n0rgTIZDoriT6fDAUuu1L7FYGoWKc4TkbC-_NXifFbdSoYUepdYYfrwkusTy4gbK7LLF0zSfa8GpyphhCTBs2rmpCIaYeLmzEFNcXKSgV_DunUujgUr3Q'),
(2, 'Monitor LG UltraGear', 'Monitor gaming de 27 pulgadas con 144Hz y 1ms', 320.50, 20, 'Informática', 'https://encrypted-tbn0.gstatic.com/shopping?q=tbn:ANd9GcTkxxk_eN-irCPJWb0vRIiregxQErokwR3OfrVUvD4tJ0YVsZ0tWfl1pMDEgDgY454IHYLaVdLSbdKhM-ihg6kOrbA2Sd9YM7Q35z1DGN_yjzAjZO9iucob'),
(3, 'Teclado Mecánico Razer', 'Teclado mecánico retroiluminado con switches Razer Green', 150.00, 25, 'Informática', 'https://img.pccomponentes.com/articles/39/391974/1803-razer-blackwidow-v3-tenkeyless-teclado-gaming-retroiluminado-green-switch-us-layout.jpg'),
(4, 'Mouse Logitech G502', 'Mouse óptico con sensor de alta precisión y pesos ajustables', 85.75, 30, 'Informática', 'https://thumb.pccomponentes.com/w-530-530/articles/21/210655/1677-logitech-g502-lightspeed-raton-gaming-inalambrico-16000dpi-comprar.jpg'),
(5, 'Disco Duro Externo Seagate', 'Disco duro externo portátil de 2TB con USB 3.0', 100.99, 50, 'PC', 'https://m.media-amazon.com/images/I/71AYysTr-nL.__AC_SX300_SY300_QL70_ML2_.jpg');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `name` varchar(100) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `users`
--

INSERT INTO `users` (`id`, `email`, `password`, `name`, `created_at`, `updated_at`) VALUES
(1, 'support@innovashop.com', '1234', 'innovashop', '2025-01-21 09:36:15', '2025-01-21 09:36:15');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `productos`
--
ALTER TABLE `productos`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `productos`
--
ALTER TABLE `productos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de la tabla `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
