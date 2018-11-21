-- phpMyAdmin SQL Dump
-- version 4.6.5.2
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 23-05-2018 a las 21:21:12
-- Versión del servidor: 10.1.21-MariaDB
-- Versión de PHP: 5.6.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `php_busqueda`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `alumnos`
--

/*CREATE TABLE `alumnos` (
  `id_alumn` int(11) NOT NULL,
  `nombres` varchar(200) NOT NULL,
  `celular` varchar(80) NOT NULL,
  `email` varchar(120) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 ROW_FORMAT=COMPACT;
*/
--
-- Volcado de datos para la tabla `alumnos`
--
/*
INSERT INTO `alumnos` (`id_alumn`, `nombres`, `celular`, `email`) VALUES
(2, 'Flores Gutierrez', '00-98277-0', 'mimail2@dominio2.com'),
(3, 'Mena Garcia, Maria Fernanda', '00-985654', 'mi-correo2@mi-dominio.com'),
(4, 'Flores Figueroa, Luis Armando', '00-985654', 'floresfilu@mi-dominio.com');
*/
--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `alumnos`
--
/*
ALTER TABLE `alumnos`
  ADD PRIMARY KEY (`id_alumn`);
*/
--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `alumnos`
--
/*
ALTER TABLE `alumnos`
  MODIFY `id_alumn` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
  */
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
