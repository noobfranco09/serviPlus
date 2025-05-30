-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 30-05-2025 a las 20:25:57
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
-- Base de datos: `serviplus`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `area`
--

CREATE TABLE `area` (
  `idArea` int NOT NULL,
  `nombreArea` varchar(50) COLLATE utf8mb4_general_ci NOT NULL,
  `descripcion` varchar(300) COLLATE utf8mb4_general_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `area`
--

INSERT INTO `area` (`idArea`, `nombreArea`, `descripcion`) VALUES
(1, 'Electricidad', 'poiuyftdfs'),
(2, 'Mantenimiento', 'iuyhgtfdvn'),
(3, 'Recursos Humanos', 'ytetjyjtb'),
(4, 'Contabilidad', 'utknuykry');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cargo`
--

CREATE TABLE `cargo` (
  `idCargo` int NOT NULL,
  `nombreCargo` varchar(50) COLLATE utf8mb4_general_ci NOT NULL,
  `descripcion` varchar(300) COLLATE utf8mb4_general_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `cargo`
--

INSERT INTO `cargo` (`idCargo`, `nombreCargo`, `descripcion`) VALUES
(1, 'Técnico', 'jiadrhfguipaeirpieurñ'),
(2, 'Administrador', 'ýtreretyukliiñiytrewfwhjhk'),
(3, 'Operario', 'ynebqaervberre'),
(4, 'Asistente', 'uyrtyuiuoiiuy');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `empleado`
--

CREATE TABLE `empleado` (
  `idEmpleado` int NOT NULL,
  `nombre` varchar(50) COLLATE utf8mb4_general_ci NOT NULL,
  `cedula` varchar(25) COLLATE utf8mb4_general_ci NOT NULL,
  `fechaIngreso` date NOT NULL,
  `salario` decimal(14,2) NOT NULL,
  `correo` varchar(50) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `telefono` varchar(20) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `idArea` int NOT NULL,
  `idCargo` int NOT NULL,
  `estado` tinyint NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `empleado`
--

INSERT INTO `empleado` (`idEmpleado`, `nombre`, `cedula`, `fechaIngreso`, `salario`, `correo`, `telefono`, `idArea`, `idCargo`, `estado`) VALUES
(1, 'Angel', '623576142', '2025-04-15', 34324.00, 'hola@gmail.com', '4363663', 1, 1, 1),
(2, 'Roberto', '34523', '2025-04-07', 2222.00, 'dfdghfhfd@hola.com', '43534534', 3, 4, 1),
(3, 'PruebaSelect', '123456677', '2025-05-05', 1000000.00, 'pruebaSelect@gmail.com', '124213', 1, 1, 1),
(4, 'pruebaFoto', '12121', '2025-05-13', 21212112.00, 'pruebaFoto@gmail.com', '3424', 4, 2, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `imagenempleado`
--

CREATE TABLE `imagenempleado` (
  `idImagen` int NOT NULL,
  `url` varchar(500) DEFAULT NULL,
  `idEmpleado` int DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Volcado de datos para la tabla `imagenempleado`
--

INSERT INTO `imagenempleado` (`idImagen`, `url`, `idEmpleado`) VALUES
(1, 'assets/images/imagen_20250502_224353000.jpg', 1);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `area`
--
ALTER TABLE `area`
  ADD PRIMARY KEY (`idArea`);

--
-- Indices de la tabla `cargo`
--
ALTER TABLE `cargo`
  ADD PRIMARY KEY (`idCargo`);

--
-- Indices de la tabla `empleado`
--
ALTER TABLE `empleado`
  ADD PRIMARY KEY (`idEmpleado`),
  ADD UNIQUE KEY `cedula` (`cedula`),
  ADD KEY `empleadoArea` (`idArea`),
  ADD KEY `empleadoCargo` (`idCargo`);

--
-- Indices de la tabla `imagenempleado`
--
ALTER TABLE `imagenempleado`
  ADD PRIMARY KEY (`idImagen`),
  ADD UNIQUE KEY `url` (`url`),
  ADD KEY `idEmpleado` (`idEmpleado`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `area`
--
ALTER TABLE `area`
  MODIFY `idArea` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `cargo`
--
ALTER TABLE `cargo`
  MODIFY `idCargo` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `empleado`
--
ALTER TABLE `empleado`
  MODIFY `idEmpleado` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de la tabla `imagenempleado`
--
ALTER TABLE `imagenempleado`
  MODIFY `idImagen` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `empleado`
--
ALTER TABLE `empleado`
  ADD CONSTRAINT `empleadoArea` FOREIGN KEY (`idArea`) REFERENCES `area` (`idArea`),
  ADD CONSTRAINT `empleadoCargo` FOREIGN KEY (`idCargo`) REFERENCES `cargo` (`idCargo`);

--
-- Filtros para la tabla `imagenempleado`
--
ALTER TABLE `imagenempleado`
  ADD CONSTRAINT `imagenempleado_ibfk_1` FOREIGN KEY (`idEmpleado`) REFERENCES `empleado` (`idEmpleado`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
