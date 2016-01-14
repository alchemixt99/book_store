-- phpMyAdmin SQL Dump
-- version 4.5.2
-- http://www.phpmyadmin.net
--
-- Servidor: localhost
-- Tiempo de generación: 14-01-2016 a las 22:52:29
-- Versión del servidor: 10.1.9-MariaDB
-- Versión de PHP: 5.6.15

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `bd_books`
--
CREATE DATABASE IF NOT EXISTS `bd_books` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `bd_books`;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbl_books`
--

CREATE TABLE `tbl_books` (
  `tb_id` int(11) NOT NULL,
  `tb_isbn` varchar(100) NOT NULL,
  `tb_title` varchar(100) NOT NULL,
  `tb_autor` varchar(100) NOT NULL,
  `tb_gender` varchar(50) NOT NULL,
  `tb_released` varchar(15) NOT NULL,
  `tb_timestamp` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `tb_estate` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `tbl_books`
--

INSERT INTO `tbl_books` (`tb_id`, `tb_isbn`, `tb_title`, `tb_autor`, `tb_gender`, `tb_released`, `tb_timestamp`, `tb_estate`) VALUES
(2, '9789588617152', 'Games of thrones, a song of fire and ice vol I', 'George R. R. Martin', 'Awesome Fantasy', '2012', '2016-01-14 19:26:21', 1),
(3, '9788427208063', 'Cuatro (saga Divergente)', 'Roth , VerÃ³nica , 1988- (Autor)', 'AcciÃ³n', '2014', '2016-01-14 19:31:35', 1),
(4, '9789588617169', 'Choque de reyes: canciÃ³n de hielo y fuego (v2)', 'Martin, George R. R. (Autor)', 'Fantasy', '2012', '2016-01-14 19:33:44', 1),
(5, '9789588617190', 'Tormenta de espadas : canciÃ³n de hielo y fuego (v3)', 'Martin, George R. R. (Autor)', 'Fantasy', '2013', '2016-01-14 19:34:47', 1),
(6, '9789584229076', 'El Hobbit', 'Tolkien, John (Autor)', 'Fantasy', '2012', '2016-01-14 21:51:00', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbl_users`
--

CREATE TABLE `tbl_users` (
  `us_id` int(11) NOT NULL,
  `us_usuario` varchar(15) NOT NULL,
  `us_clave` varchar(50) NOT NULL,
  `us_estado` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `tbl_users`
--

INSERT INTO `tbl_users` (`us_id`, `us_usuario`, `us_clave`, `us_estado`) VALUES
(1, 'admin', '90b9aa7e25f80cf4f64e990b78a9fc5ebd6cecad', 1);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `tbl_books`
--
ALTER TABLE `tbl_books`
  ADD PRIMARY KEY (`tb_id`);

--
-- Indices de la tabla `tbl_users`
--
ALTER TABLE `tbl_users`
  ADD PRIMARY KEY (`us_id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `tbl_books`
--
ALTER TABLE `tbl_books`
  MODIFY `tb_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT de la tabla `tbl_users`
--
ALTER TABLE `tbl_users`
  MODIFY `us_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
