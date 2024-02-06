-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 05-02-2024 a las 19:23:27
-- Versión del servidor: 10.4.32-MariaDB
-- Versión de PHP: 8.0.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `proiektutxikia`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `captcha`
--

CREATE TABLE `captcha` (
  `id` int(255) NOT NULL,
  `path_img` varchar(255) DEFAULT NULL,
  `result` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `captcha`
--

INSERT INTO `captcha` (`id`, `path_img`, `result`) VALUES
(1, 'img.PNG', '123');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `erabiltzaileak`
--

CREATE TABLE `erabiltzaileak` (
  `idUser` int(10) NOT NULL,
  `erabiltzailea` varchar(255) DEFAULT NULL,
  `pasahitza` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `erabiltzaileak`
--

INSERT INTO `erabiltzaileak` (`idUser`, `erabiltzailea`, `pasahitza`) VALUES
(1, 'aitorleon', 'aitorleon'),
(5, 'aitor', '$2y$10$Nfj/9tF7Dq/fuZDEVsU0VenQpBayJZLfvbRQBcvZLbfnlW8cw6M8a'),
(6, 'aitorle', 'aitorle');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `rutak`
--

CREATE TABLE `rutak` (
  `idRuta` int(10) NOT NULL,
  `idUser` int(10) DEFAULT NULL,
  `Izena` varchar(255) NOT NULL,
  `Luzeera_km` int(10) DEFAULT NULL,
  `Iraupena_h` int(10) DEFAULT NULL,
  `Eginda` tinyint(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `rutak`
--

INSERT INTO `rutak` (`idRuta`, `idUser`, `Izena`, `Luzeera_km`, `Iraupena_h`, `Eginda`) VALUES
(2, 1, 'Kilometro Bertikala', 10, 3, 0);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `captcha`
--
ALTER TABLE `captcha`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `erabiltzaileak`
--
ALTER TABLE `erabiltzaileak`
  ADD PRIMARY KEY (`idUser`);

--
-- Indices de la tabla `rutak`
--
ALTER TABLE `rutak`
  ADD PRIMARY KEY (`idRuta`),
  ADD KEY `idUser` (`idUser`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `captcha`
--
ALTER TABLE `captcha`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `erabiltzaileak`
--
ALTER TABLE `erabiltzaileak`
  MODIFY `idUser` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT de la tabla `rutak`
--
ALTER TABLE `rutak`
  MODIFY `idRuta` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `rutak`
--
ALTER TABLE `rutak`
  ADD CONSTRAINT `rutak_ibfk_1` FOREIGN KEY (`idUser`) REFERENCES `erabiltzaileak` (`idUser`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
