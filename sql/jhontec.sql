-- phpMyAdmin SQL Dump
-- version 4.4.14
-- http://www.phpmyadmin.net
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 14-12-2016 a las 04:18:32
-- Versión del servidor: 5.6.26
-- Versión de PHP: 5.6.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `jhontec`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `perfil`
--

CREATE TABLE IF NOT EXISTS `perfil` (
  `id_perfil` int(11) NOT NULL,
  `descripcion` varchar(30) COLLATE utf8_spanish_ci NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `perfil`
--

INSERT INTO `perfil` (`id_perfil`, `descripcion`) VALUES
(1, 'Administrador'),
(2, 'Operador');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `registro`
--

CREATE TABLE IF NOT EXISTS `registro` (
  `id_registro` int(11) NOT NULL,
  `fecha` date NOT NULL,
  `referencia` int(11) NOT NULL,
  `identificacion` int(11) NOT NULL,
  `nombre` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `apellido` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `email` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `telefono` varchar(15) COLLATE utf8_spanish_ci NOT NULL,
  `expediente` int(11) NOT NULL,
  `localidad` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `ciudad` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `direccion` varchar(120) COLLATE utf8_spanish_ci NOT NULL,
  `postal` int(8) NOT NULL,
  `asignado` varchar(50) COLLATE utf8_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuario`
--

CREATE TABLE IF NOT EXISTS `usuario` (
  `id_usuario` int(11) NOT NULL,
  `nombre_u` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `apellido_u` varchar(50) CHARACTER SET latin1 COLLATE latin1_general_ci NOT NULL,
  `telefono_u` varchar(15) COLLATE utf8_spanish_ci NOT NULL,
  `email_u` varchar(70) COLLATE utf8_spanish_ci NOT NULL,
  `clave_u` varchar(8) COLLATE utf8_spanish_ci NOT NULL,
  `localidad_u` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `ciudad_u` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `direccion_u` varchar(250) COLLATE utf8_spanish_ci NOT NULL,
  `postal_u` int(6) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `usuario`
--

INSERT INTO `usuario` (`id_usuario`, `nombre_u`, `apellido_u`, `telefono_u`, `email_u`, `clave_u`, `localidad_u`, `ciudad_u`, `direccion_u`, `postal_u`) VALUES
(1, 'Jhon Jairo ', 'HincapiÃ© Botero', '9999-999-99-99', 'prueba@gmail.com', 'admin', 'Salamanca', 'Madrid', 'EspaÃ±a', 28071);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuario_perfil`
--

CREATE TABLE IF NOT EXISTS `usuario_perfil` (
  `id_usuarioperfil` int(11) NOT NULL,
  `fk_idusuario` int(11) DEFAULT NULL,
  `fk_idperfil` int(11) DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `usuario_perfil`
--

INSERT INTO `usuario_perfil` (`id_usuarioperfil`, `fk_idusuario`, `fk_idperfil`) VALUES
(1, 1, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuario_registro`
--

CREATE TABLE IF NOT EXISTS `usuario_registro` (
  `id_usuarioregistro` int(11) NOT NULL,
  `fk_idusuario` int(11) DEFAULT NULL,
  `fk_idregistro` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `perfil`
--
ALTER TABLE `perfil`
  ADD PRIMARY KEY (`id_perfil`);

--
-- Indices de la tabla `registro`
--
ALTER TABLE `registro`
  ADD PRIMARY KEY (`id_registro`);

--
-- Indices de la tabla `usuario`
--
ALTER TABLE `usuario`
  ADD PRIMARY KEY (`id_usuario`);

--
-- Indices de la tabla `usuario_perfil`
--
ALTER TABLE `usuario_perfil`
  ADD PRIMARY KEY (`id_usuarioperfil`),
  ADD KEY `fk_usuario` (`fk_idusuario`),
  ADD KEY `fk_perfil` (`fk_idperfil`);

--
-- Indices de la tabla `usuario_registro`
--
ALTER TABLE `usuario_registro`
  ADD PRIMARY KEY (`id_usuarioregistro`),
  ADD KEY `fk_idusuario` (`fk_idusuario`),
  ADD KEY `fk_idregistro` (`fk_idregistro`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `perfil`
--
ALTER TABLE `perfil`
  MODIFY `id_perfil` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT de la tabla `registro`
--
ALTER TABLE `registro`
  MODIFY `id_registro` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `usuario`
--
ALTER TABLE `usuario`
  MODIFY `id_usuario` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT de la tabla `usuario_perfil`
--
ALTER TABLE `usuario_perfil`
  MODIFY `id_usuarioperfil` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT de la tabla `usuario_registro`
--
ALTER TABLE `usuario_registro`
  MODIFY `id_usuarioregistro` int(11) NOT NULL AUTO_INCREMENT;
--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `usuario_perfil`
--
ALTER TABLE `usuario_perfil`
  ADD CONSTRAINT `usuario_perfil_ibfk_1` FOREIGN KEY (`fk_idusuario`) REFERENCES `usuario` (`id_usuario`),
  ADD CONSTRAINT `usuario_perfil_ibfk_2` FOREIGN KEY (`fk_idperfil`) REFERENCES `perfil` (`id_perfil`);

--
-- Filtros para la tabla `usuario_registro`
--
ALTER TABLE `usuario_registro`
  ADD CONSTRAINT `usuario_registro_ibfk_1` FOREIGN KEY (`fk_idusuario`) REFERENCES `usuario` (`id_usuario`),
  ADD CONSTRAINT `usuario_registro_ibfk_2` FOREIGN KEY (`fk_idregistro`) REFERENCES `registro` (`id_registro`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
