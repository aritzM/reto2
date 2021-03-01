-- phpMyAdmin SQL Dump
-- version 4.6.6deb5ubuntu0.5
-- https://www.phpmyadmin.net/
--
-- Servidor: localhost:3306
-- Tiempo de generación: 01-03-2021 a las 03:55:14
-- Versión del servidor: 5.7.33-0ubuntu0.18.04.1
-- Versión de PHP: 7.2.24-0ubuntu0.18.04.7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `discografia`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `artista`
--

CREATE TABLE `artista` (
  `id_artista` int(11) NOT NULL,
  `nombre` varchar(55) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `artista`
--

INSERT INTO `artista` (`id_artista`, `nombre`) VALUES
(1, 'cool'),
(2, 'shafir');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `asisten`
--

CREATE TABLE `asisten` (
  `id_asistencia` int(11) NOT NULL,
  `id_cliente` int(11) NOT NULL,
  `id_Evento` int(11) NOT NULL,
  `fecha` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `carteleras`
--

CREATE TABLE `carteleras` (
  `id_cartelera` int(11) NOT NULL,
  `id_evento` int(11) NOT NULL,
  `id_tema` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `clientes`
--

CREATE TABLE `clientes` (
  `id_Cliente` int(11) NOT NULL,
  `nombre` varchar(55) NOT NULL,
  `apellidos` varchar(55) NOT NULL,
  `genero` varchar(55) NOT NULL,
  `telefono` int(11) NOT NULL,
  `email` varchar(55) NOT NULL,
  `password` varchar(256) NOT NULL,
  `passwordtext` varchar(55) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `clientes`
--

INSERT INTO `clientes` (`id_Cliente`, `nombre`, `apellidos`, `genero`, `telefono`, `email`, `password`, `passwordtext`) VALUES
(3, 'a', 'a', 'masculino', 2, 'b@a.com', '$2y$10$60AGLDK9tefr8F/y1SG6KO8778PjPZ7v4E/Pv47tsRTJVzjEika5C', 'Almi123'),
(4, 'algo', 'algo', 'masculino', 1, 'algo@a.com', '$2y$10$keSAAwvM7B0l.ApnSvKFHeL1DOjpWhxkTV2I8P3i/OI4bCgqMgBIS', 'Almi123');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `compran`
--

CREATE TABLE `compran` (
  `id_compra` int(11) NOT NULL,
  `id_instrumento` int(11) NOT NULL,
  `id_cliente` int(11) NOT NULL,
  `fecha` date NOT NULL,
  `unidades` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `compran`
--

INSERT INTO `compran` (`id_compra`, `id_instrumento`, `id_cliente`, `fecha`, `unidades`) VALUES
(1, 1, 1, '1999-12-12', 2);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `compuestos`
--

CREATE TABLE `compuestos` (
  `id_compuesto` int(11) NOT NULL,
  `id_tema` int(11) NOT NULL,
  `id_maqueta` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `conciertos`
--

CREATE TABLE `conciertos` (
  `id_Evento` int(11) NOT NULL,
  `nombre` varchar(55) NOT NULL,
  `descripcion` varchar(55) NOT NULL,
  `ubicacion` varchar(55) NOT NULL,
  `fechaEvento` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `conciertos`
--

INSERT INTO `conciertos` (`id_Evento`, `nombre`, `descripcion`, `ubicacion`, `fechaEvento`) VALUES
(1, 'eventos', 'aaaaaa', 'enmicasa', '1999-12-12'),
(2, 'eventoasas', 'aaaaaa', 'enmicasa', '1999-12-12'),
(3, 'eventos', 'aaaaaa', 'enmicasa', '1999-12-12'),
(4, 'chupala', 'aaaaaa', 'enmicasa', '1999-12-12');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `instrumentos`
--

CREATE TABLE `instrumentos` (
  `id_instrumentos` int(11) NOT NULL,
  `nombre` varchar(55) NOT NULL,
  `tamaño` varchar(55) NOT NULL,
  `color` varchar(55) NOT NULL,
  `precio` decimal(10,0) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `instrumentos`
--

INSERT INTO `instrumentos` (`id_instrumentos`, `nombre`, `tamaño`, `color`, `precio`) VALUES
(1, 'flauta', '150cm', 'negro', '15');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `maquetas`
--

CREATE TABLE `maquetas` (
  `id_maquetas` int(11) NOT NULL,
  `nombre` varchar(55) NOT NULL,
  `id_artista` int(11) NOT NULL,
  `descripcion` varchar(55) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `maquetas`
--

INSERT INTO `maquetas` (`id_maquetas`, `nombre`, `id_artista`, `descripcion`) VALUES
(1, 'shars 2019', 1, 'aaaaaaaa'),
(2, 'maquetassss', 1, 'aaaaaa'),
(12, 'kartuuuuuuu111', 1, 'asadasdads');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `organizan`
--

CREATE TABLE `organizan` (
  `id_organiza` int(11) NOT NULL,
  `id_concierto` int(11) NOT NULL,
  `id_trabajador` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `organizan`
--

INSERT INTO `organizan` (`id_organiza`, `id_concierto`, `id_trabajador`) VALUES
(1, 2, 1),
(2, 4, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tema`
--

CREATE TABLE `tema` (
  `id_tema` int(11) NOT NULL,
  `nombre` varchar(55) NOT NULL,
  `fechaCreacion` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `trajadores`
--

CREATE TABLE `trajadores` (
  `id_trabajador` int(11) NOT NULL,
  `dni` varchar(9) NOT NULL,
  `nombre` varchar(55) NOT NULL,
  `apellidos` varchar(55) NOT NULL,
  `direccion` varchar(55) NOT NULL,
  `telefono` int(11) NOT NULL,
  `email` varchar(55) NOT NULL,
  `password` varchar(256) NOT NULL,
  `passwordtext` varchar(55) NOT NULL,
  `sexo` varchar(55) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `trajadores`
--

INSERT INTO `trajadores` (`id_trabajador`, `dni`, `nombre`, `apellidos`, `direccion`, `telefono`, `email`, `password`, `passwordtext`, `sexo`) VALUES
(1, '11111111M', 'aritz1', 'martin', 'm', 1, 'aa@a.com', 'Almi123', '', 'masculino'),
(2, '11111111F', 'aritz2', 'martin', 'm', 2, 'a@a.com', 'Almi123', '', 'masculino');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `artista`
--
ALTER TABLE `artista`
  ADD PRIMARY KEY (`id_artista`);

--
-- Indices de la tabla `asisten`
--
ALTER TABLE `asisten`
  ADD PRIMARY KEY (`id_asistencia`);

--
-- Indices de la tabla `carteleras`
--
ALTER TABLE `carteleras`
  ADD PRIMARY KEY (`id_cartelera`);

--
-- Indices de la tabla `clientes`
--
ALTER TABLE `clientes`
  ADD PRIMARY KEY (`id_Cliente`),
  ADD UNIQUE KEY `email` (`email`);

--
-- Indices de la tabla `compran`
--
ALTER TABLE `compran`
  ADD PRIMARY KEY (`id_compra`);

--
-- Indices de la tabla `compuestos`
--
ALTER TABLE `compuestos`
  ADD PRIMARY KEY (`id_compuesto`);

--
-- Indices de la tabla `conciertos`
--
ALTER TABLE `conciertos`
  ADD PRIMARY KEY (`id_Evento`);

--
-- Indices de la tabla `instrumentos`
--
ALTER TABLE `instrumentos`
  ADD PRIMARY KEY (`id_instrumentos`);

--
-- Indices de la tabla `maquetas`
--
ALTER TABLE `maquetas`
  ADD PRIMARY KEY (`id_maquetas`);

--
-- Indices de la tabla `organizan`
--
ALTER TABLE `organizan`
  ADD PRIMARY KEY (`id_organiza`);

--
-- Indices de la tabla `tema`
--
ALTER TABLE `tema`
  ADD PRIMARY KEY (`id_tema`);

--
-- Indices de la tabla `trajadores`
--
ALTER TABLE `trajadores`
  ADD PRIMARY KEY (`id_trabajador`),
  ADD UNIQUE KEY `email` (`email`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `artista`
--
ALTER TABLE `artista`
  MODIFY `id_artista` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT de la tabla `asisten`
--
ALTER TABLE `asisten`
  MODIFY `id_asistencia` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `carteleras`
--
ALTER TABLE `carteleras`
  MODIFY `id_cartelera` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `clientes`
--
ALTER TABLE `clientes`
  MODIFY `id_Cliente` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT de la tabla `compran`
--
ALTER TABLE `compran`
  MODIFY `id_compra` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT de la tabla `compuestos`
--
ALTER TABLE `compuestos`
  MODIFY `id_compuesto` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `conciertos`
--
ALTER TABLE `conciertos`
  MODIFY `id_Evento` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT de la tabla `instrumentos`
--
ALTER TABLE `instrumentos`
  MODIFY `id_instrumentos` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT de la tabla `maquetas`
--
ALTER TABLE `maquetas`
  MODIFY `id_maquetas` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
--
-- AUTO_INCREMENT de la tabla `organizan`
--
ALTER TABLE `organizan`
  MODIFY `id_organiza` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT de la tabla `tema`
--
ALTER TABLE `tema`
  MODIFY `id_tema` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `trajadores`
--
ALTER TABLE `trajadores`
  MODIFY `id_trabajador` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
