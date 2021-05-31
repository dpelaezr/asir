-- phpMyAdmin SQL Dump
-- version 5.0.3
-- https://www.phpmyadmin.net/
--
-- Servidor: localhost:3306
-- Tiempo de generación: 28-05-2021 a las 12:31:17
-- Versión del servidor: 5.7.24
-- Versión de PHP: 7.4.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `asir`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `admin`
--

CREATE TABLE `admin` (
  `id` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `email` varchar(100) NOT NULL,
  `nombre` varchar(100) NOT NULL,
  `apellidos` varchar(100) NOT NULL,
  `img` varchar(50) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `estado` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `admin`
--

INSERT INTO `admin` (`id`, `username`, `password`, `email`, `nombre`, `apellidos`, `img`, `created_at`, `updated_at`, `estado`) VALUES
(1, 'alex', '90b9aa7e25f80cf4f64e990b78a9fc5ebd6cecad', 'alex@gmail.com', 'Alex', 'Bueno', 'alex22-05-21-05-2021alm4.png', NULL, NULL, 'activo');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `alumnos`
--

CREATE TABLE `alumnos` (
  `dni` varchar(9) NOT NULL,
  `nombre` varchar(100) NOT NULL,
  `apellidos` varchar(100) NOT NULL,
  `aciclo` varchar(1) NOT NULL,
  `ciudad` varchar(25) NOT NULL,
  `telefono` varchar(9) NOT NULL,
  `email` varchar(50) NOT NULL,
  `img` varchar(50) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `alumnos`
--

INSERT INTO `alumnos` (`dni`, `nombre`, `apellidos`, `aciclo`, `ciudad`, `telefono`, `email`, `img`, `created_at`, `updated_at`) VALUES
('111111111', 'Irina', 'Kilichenko', '1', 'Tenerife', '678567780', 'irina@gmail.com', '1111111112021-05-28-05-49.png', NULL, NULL),
('222222222', 'Paula', 'Piero', '2', 'Alicante', '645009189', 'paula@gmail.com', '2222222222021-05-28-05-46.png', NULL, NULL),
('333333333', 'Bruno', 'Zambrano', '2', 'Burgos', '654779908', 'bruno@gmail.com', '3333333332021-05-28-05-49.png', NULL, NULL),
('444444444', 'Ander', 'Campano', '1', 'Sevilla', '690092314', 'ander@gmail.com', '4444444442021-05-28-05-21.png', NULL, NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `asignaturas`
--

CREATE TABLE `asignaturas` (
  `id` int(11) NOT NULL,
  `nombre_asig` varchar(100) NOT NULL,
  `dni_prof` varchar(9) NOT NULL,
  `aciclo` varchar(100) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `asignaturas`
--

INSERT INTO `asignaturas` (`id`, `nombre_asig`, `dni_prof`, `aciclo`, `created_at`, `updated_at`) VALUES
(1, 'Seguridad y Alta Disponibilidad', '112233445', '1', NULL, NULL),
(2, 'Servicios de Red e Internet', '334523180', '1', NULL, NULL),
(3, 'Sistemas Operativos', '223344123', '1', NULL, NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `profesores`
--

CREATE TABLE `profesores` (
  `dni` varchar(9) NOT NULL,
  `nombre` varchar(100) NOT NULL,
  `apellidos` varchar(100) NOT NULL,
  `asignatura` varchar(100) NOT NULL,
  `ciudad` varchar(25) NOT NULL,
  `telefono` varchar(9) NOT NULL,
  `email` varchar(50) NOT NULL,
  `img` varchar(50) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `profesores`
--

INSERT INTO `profesores` (`dni`, `nombre`, `apellidos`, `asignatura`, `ciudad`, `telefono`, `email`, `img`, `created_at`, `updated_at`) VALUES
('112233445', 'Alberto', 'Jimenez', 'Seguridad y Alta Disponibilidad', 'Elche', '654231109', 'alberto@gmail.com', '1122334452021-05-28-05-25.png', NULL, NULL),
('223344123', 'Cristina', 'Perez', 'Sistemas Operativos', 'Valencia', '687002612', 'cristina@gmail.com', '2233441232021-05-28-05-58.png', NULL, NULL),
('334523180', 'Mercedes', 'Ruiz', 'Servicios de Red e Internet', 'Barcelona', '623986656', 'mercedes@gmail.com', '3345231802021-05-28-05-55.png', NULL, NULL);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `alumnos`
--
ALTER TABLE `alumnos`
  ADD PRIMARY KEY (`dni`);

--
-- Indices de la tabla `asignaturas`
--
ALTER TABLE `asignaturas`
  ADD PRIMARY KEY (`id`),
  ADD KEY `asignaturas_dniprof_foreign` (`dni_prof`) USING BTREE;

--
-- Indices de la tabla `profesores`
--
ALTER TABLE `profesores`
  ADD PRIMARY KEY (`dni`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `asignaturas`
--
ALTER TABLE `asignaturas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `asignaturas`
--
ALTER TABLE `asignaturas`
  ADD CONSTRAINT `profesores_dni_foreign` FOREIGN KEY (`dni_prof`) REFERENCES `profesores` (`dni`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
