-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 27-08-2020 a las 03:04:24
-- Versión del servidor: 10.4.11-MariaDB
-- Versión de PHP: 7.4.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `clinica`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `ingreso`
--

CREATE TABLE `ingreso` (
  `id_i` int(10) NOT NULL,
  `nhistorial` int(10) NOT NULL,
  `id_m` int(10) NOT NULL,
  `fecha` date NOT NULL,
  `obser` varchar(60) NOT NULL,
  `estado` varchar(20) NOT NULL,
  `hora` time NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `ingreso`
--

INSERT INTO `ingreso` (`id_i`, `nhistorial`, `id_m`, `fecha`, `obser`, `estado`, `hora`) VALUES
(1, 1, 1002, '2020-08-05', 'Ninguna', 'Pendiente', '10:30:00'),
(3, 1, 1001, '2020-08-07', 'Ninguna', 'Cancelada', '20:28:00'),
(5, 1, 1001, '2020-08-20', 'Ninguna', 'Pendiente', '18:56:00'),
(6, 1, 1001, '2020-08-21', 'Ninguna', 'Pendiente', '11:20:00'),
(7, 1, 1001, '2020-08-12', 'Ninguna', 'Pendiente', '11:20:00'),
(8, 1, 1001, '2020-08-20', 'Ninguna', 'Pendiente', '11:20:00'),
(9, 1, 1001, '2020-08-21', 'Ninguna', 'Pendiente', '12:20:00'),
(10, 1, 1001, '2020-08-21', 'Ninguna', 'Pendiente', '11:21:00'),
(11, 1, 1001, '2020-08-14', 'Ninguna', 'Pendiente', '12:21:00'),
(12, 1, 1001, '2020-08-28', 'Ninguna', 'Pendiente', '12:22:00'),
(13, 1, 1001, '2020-08-26', 'Ninguna', 'Pendiente', '14:22:00'),
(16, 1, 1003, '2020-08-21', 'Hola', 'Pendiente', '21:58:00'),
(17, 2, 1002, '2020-08-26', 'Ninguna', 'Pendiente', '19:16:00'),
(19, 1, 10101, '2020-08-26', 'Ninguna', 'Pendiente', '19:31:00'),
(21, 1, 1002, '2020-08-25', 'Hola', 'Cancelada', '19:34:00');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `medico`
--

CREATE TABLE `medico` (
  `id_m` int(10) NOT NULL,
  `nombreM` varchar(60) NOT NULL,
  `especialidad` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `medico`
--

INSERT INTO `medico` (`id_m`, `nombreM`, `especialidad`) VALUES
(1001, 'Miguel Pachon', 'Pediátria'),
(1002, 'Kala', 'Dermatología'),
(1003, 'Juan Felipe', 'Endocrinología'),
(10101, 'Julian Andres', 'Ortodoncia');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `paciente`
--

CREATE TABLE `paciente` (
  `id_p` int(10) NOT NULL,
  `nombre` varchar(60) NOT NULL,
  `direccion` varchar(30) NOT NULL,
  `tel` int(10) NOT NULL,
  `nhistorial` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `paciente`
--

INSERT INTO `paciente` (`id_p`, `nombre`, `direccion`, `tel`, `nhistorial`) VALUES
(10101, 'Rafael Hernandez', 'calle 39 30#-21', 57775, 1),
(10102, 'Natalia Leon', 'calle 40 34-30', 55555, 2),
(10103, 'Juanito prueba', 'calle 39 30#-22', 77777, 3);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `users`
--

CREATE TABLE `users` (
  `user` varchar(20) NOT NULL,
  `correo` varchar(20) NOT NULL,
  `pass` varchar(20) NOT NULL,
  `permissions` varchar(10) NOT NULL,
  `imagen` varchar(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `users`
--

INSERT INTO `users` (`user`, `correo`, `pass`, `permissions`, `imagen`) VALUES
('admin', 'admin@gmail.com', 'admin', 'admin', NULL),
('invitado', 'invitado@gmail.com', '12345', 'Invitado', 'user.png');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `ingreso`
--
ALTER TABLE `ingreso`
  ADD PRIMARY KEY (`id_i`),
  ADD KEY `ingreso_ibfk_1` (`id_m`),
  ADD KEY `ingreso_ibfk_2` (`nhistorial`);

--
-- Indices de la tabla `medico`
--
ALTER TABLE `medico`
  ADD PRIMARY KEY (`id_m`);

--
-- Indices de la tabla `paciente`
--
ALTER TABLE `paciente`
  ADD PRIMARY KEY (`nhistorial`);

--
-- Indices de la tabla `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `ingreso`
--
ALTER TABLE `ingreso`
  MODIFY `id_i` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT de la tabla `paciente`
--
ALTER TABLE `paciente`
  MODIFY `nhistorial` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `ingreso`
--
ALTER TABLE `ingreso`
  ADD CONSTRAINT `ingreso_ibfk_1` FOREIGN KEY (`id_m`) REFERENCES `medico` (`id_m`),
  ADD CONSTRAINT `ingreso_ibfk_2` FOREIGN KEY (`nhistorial`) REFERENCES `paciente` (`nhistorial`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
