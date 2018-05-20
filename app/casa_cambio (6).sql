-- phpMyAdmin SQL Dump
-- version 4.6.6
-- https://www.phpmyadmin.net/
--
-- Servidor: localhost
-- Tiempo de generación: 21-08-2017 a las 10:03:26
-- Versión del servidor: 5.7.17-log
-- Versión de PHP: 5.6.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `casa_cambio`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cambio`
--

CREATE TABLE `cambio` (
  `id` int(6) NOT NULL,
  `nombre` varchar(255) COLLATE utf8_spanish_ci NOT NULL,
  `moneda1_id` int(6) NOT NULL,
  `valor_moneda1` decimal(10,2) NOT NULL,
  `moneda2_id` int(6) NOT NULL,
  `valor_moneda2` decimal(10,2) NOT NULL,
  `operacion` enum('MULTIPLICAR','DIVIDIR','','') COLLATE utf8_spanish_ci NOT NULL,
  `creado` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `modificado` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00' ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `cambio`
--

INSERT INTO `cambio` (`id`, `nombre`, `moneda1_id`, `valor_moneda1`, `moneda2_id`, `valor_moneda2`, `operacion`, `creado`, `modificado`) VALUES
(6, 'Dolares-Bolivares', 3, '1.00', 2, '15000.00', 'MULTIPLICAR', '2017-08-14 01:29:39', '2017-08-14 01:30:56'),
(7, 'otro cambio', 4, '1.00', 3, '20000.00', 'DIVIDIR', '2017-08-18 07:10:12', '2017-08-18 07:11:22');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `clientes`
--

CREATE TABLE `clientes` (
  `id` int(6) NOT NULL,
  `dni` varchar(20) COLLATE utf8_spanish_ci NOT NULL,
  `nombre` varchar(255) COLLATE utf8_spanish_ci NOT NULL,
  `apellido` varchar(255) COLLATE utf8_spanish_ci NOT NULL,
  `direccion` varchar(255) COLLATE utf8_spanish_ci NOT NULL,
  `pais_id` int(6) NOT NULL,
  `tlf` varchar(20) COLLATE utf8_spanish_ci NOT NULL,
  `tlf2` varchar(20) COLLATE utf8_spanish_ci NOT NULL,
  `correo` varchar(255) COLLATE utf8_spanish_ci NOT NULL,
  `adjunto` varchar(255) COLLATE utf8_spanish_ci NOT NULL,
  `creado` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `modificado` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00' ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `clientes`
--

INSERT INTO `clientes` (`id`, `dni`, `nombre`, `apellido`, `direccion`, `pais_id`, `tlf`, `tlf2`, `correo`, `adjunto`, `creado`, `modificado`) VALUES
(1, '17604411', 'Plablo', 'Torres', 'asddasasddsa', 1, '165116161', '', 'mark777_15@gmail.com', '', '2017-08-13 17:30:25', '2017-08-13 22:02:57'),
(2, '151561561', 'cliente2', 'Cliente 2 AP', 'direccion 2 completa', 2, '111516516', '156165165', 'marcost15@gmail.com', 'DSC02658.jpg', '2017-08-13 21:12:05', '2017-08-18 05:05:27');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `estados_operaciones`
--

CREATE TABLE `estados_operaciones` (
  `id` int(6) NOT NULL,
  `nombre` varchar(255) COLLATE utf8_spanish_ci NOT NULL,
  `descripcion` varchar(255) COLLATE utf8_spanish_ci NOT NULL,
  `creado` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `modificado` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00' ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `estados_operaciones`
--

INSERT INTO `estados_operaciones` (`id`, `nombre`, `descripcion`, `creado`, `modificado`) VALUES
(1, 'Recibido', 'Dinero recibido', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(2, 'Devuelto', 'Fallo de Operacion', '2017-08-13 15:49:13', '0000-00-00 00:00:00'),
(3, 'Entregado', 'Transaccion completada', '2017-08-13 15:49:25', '0000-00-00 00:00:00'),
(4, 'En proceso', 'Esperando Confirmacion Bancaria', '2017-08-13 15:49:42', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `metadatos`
--

CREATE TABLE `metadatos` (
  `id` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `etiqueta` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `ayuda` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `error` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `lista` enum('NO','SI') COLLATE utf8_unicode_ci NOT NULL,
  `ver` enum('NO','SI') COLLATE utf8_unicode_ci NOT NULL,
  `crear` enum('NO','SI') COLLATE utf8_unicode_ci NOT NULL,
  `modificar` enum('NO','SI') COLLATE utf8_unicode_ci NOT NULL,
  `buscar` enum('NO','SI') COLLATE utf8_unicode_ci NOT NULL,
  `borrar` enum('NO','SI') COLLATE utf8_unicode_ci NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci COMMENT='Metadatos';

--
-- Volcado de datos para la tabla `metadatos`
--

INSERT INTO `metadatos` (`id`, `etiqueta`, `ayuda`, `error`, `lista`, `ver`, `crear`, `modificar`, `buscar`, `borrar`) VALUES
('cambio.-', '-', '', '', 'SI', 'SI', 'SI', 'SI', 'SI', 'SI'),
('cambio.id', 'Id', '', '', 'SI', 'SI', 'SI', 'SI', 'SI', 'SI'),
('cambio.moneda1_id', 'Moneda1_id', '', '', 'SI', 'SI', 'SI', 'SI', 'SI', 'SI'),
('cambio.valor_moneda1', 'Valor_moneda1', '', '', 'SI', 'SI', 'SI', 'SI', 'SI', 'SI'),
('cambio.moneda2_id', 'Moneda2_id', '', '', 'SI', 'SI', 'SI', 'SI', 'SI', 'SI'),
('cambio.valor_moneda2', 'Valor_moneda2', '', '', 'SI', 'SI', 'SI', 'SI', 'SI', 'SI'),
('cambio.operacion', 'Operacion', '', '', 'SI', 'SI', 'SI', 'SI', 'SI', 'SI'),
('cambio.creado', 'Creado', '', '', 'SI', 'SI', 'SI', 'SI', 'SI', 'SI'),
('cambio.modificado', 'Modificado', '', '', 'SI', 'SI', 'SI', 'SI', 'SI', 'SI'),
('clientes.-', '-', '', '', 'SI', 'SI', 'SI', 'SI', 'SI', 'SI'),
('clientes.id', 'Id', '', '', 'SI', 'SI', 'SI', 'SI', 'SI', 'SI'),
('clientes.dni', 'Dni', '', '', 'SI', 'SI', 'SI', 'SI', 'SI', 'SI'),
('clientes.nombre', 'Nombre', '', '', 'SI', 'SI', 'SI', 'SI', 'SI', 'SI'),
('clientes.apellido', 'Apellido', '', '', 'SI', 'SI', 'SI', 'SI', 'SI', 'SI'),
('clientes.direccion', 'Direccion', '', '', 'SI', 'SI', 'SI', 'SI', 'SI', 'SI'),
('clientes.pais_id', 'Pais_id', '', '', 'SI', 'SI', 'SI', 'SI', 'SI', 'SI'),
('clientes.tlf', 'Tlf', '', '', 'SI', 'SI', 'SI', 'SI', 'SI', 'SI'),
('clientes.tlf2', 'Tlf2', '', '', 'SI', 'SI', 'SI', 'SI', 'SI', 'SI'),
('clientes.adjunto', 'Adjunto', '', '', 'SI', 'SI', 'SI', 'SI', 'SI', 'SI'),
('clientes.creado', 'Creado', '', '', 'SI', 'SI', 'SI', 'SI', 'SI', 'SI'),
('clientes.modificado', 'Modificado', '', '', 'SI', 'SI', 'SI', 'SI', 'SI', 'SI'),
('estados_operaciones.-', '-', '', '', 'SI', 'SI', 'SI', 'SI', 'SI', 'SI'),
('estados_operaciones.id', 'Id', '', '', 'SI', 'SI', 'SI', 'SI', 'SI', 'SI'),
('estados_operaciones.nombre', 'Nombre', '', '', 'SI', 'SI', 'SI', 'SI', 'SI', 'SI'),
('estados_operaciones.descripcion', 'Descripcion', '', '', 'SI', 'SI', 'SI', 'SI', 'SI', 'SI'),
('estados_operaciones.creado', 'Creado', '', '', 'SI', 'SI', 'SI', 'SI', 'SI', 'SI'),
('estados_operaciones.modificado', 'Modificado', '', '', 'SI', 'SI', 'SI', 'SI', 'SI', 'SI'),
('monedas.-', '-', '', '', 'SI', 'SI', 'SI', 'SI', 'SI', 'SI'),
('monedas.id', 'Id', '', '', 'SI', 'SI', 'SI', 'SI', 'SI', 'SI'),
('monedas.nombre', 'Nombre', '', '', 'SI', 'SI', 'SI', 'SI', 'SI', 'SI'),
('monedas.abreviacion', 'Abreviacion', '', '', 'SI', 'SI', 'SI', 'SI', 'SI', 'SI'),
('monedas.creado', 'Creado', '', '', 'SI', 'SI', 'SI', 'SI', 'SI', 'SI'),
('monedas.modificado', 'Modificado', '', '', 'SI', 'SI', 'SI', 'SI', 'SI', 'SI'),
('niveles.-', '-', '', '', 'SI', 'SI', 'SI', 'SI', 'SI', 'SI'),
('niveles.id', 'Id', '', '', 'SI', 'SI', 'SI', 'SI', 'SI', 'SI'),
('niveles.nombre', 'Nombre', '', '', 'SI', 'SI', 'SI', 'SI', 'SI', 'SI'),
('niveles.creado', 'Creado', '', '', 'SI', 'SI', 'SI', 'SI', 'SI', 'SI'),
('niveles.modificado', 'Modificado', '', '', 'SI', 'SI', 'SI', 'SI', 'SI', 'SI'),
('paises.-', '-', '', '', 'SI', 'SI', 'SI', 'SI', 'SI', 'SI'),
('paises.id', 'Id', '', '', 'SI', 'SI', 'SI', 'SI', 'SI', 'SI'),
('paises.nombre', 'Nombre', '', '', 'SI', 'SI', 'SI', 'SI', 'SI', 'SI'),
('paises.creado', 'Creado', '', '', 'SI', 'SI', 'SI', 'SI', 'SI', 'SI'),
('paises.modificado', 'Modificado', '', '', 'SI', 'SI', 'SI', 'SI', 'SI', 'SI'),
('personal.-', '-', '', '', 'SI', 'SI', 'SI', 'SI', 'SI', 'SI'),
('personal.id', 'Id', '', '', 'SI', 'SI', 'SI', 'SI', 'SI', 'SI'),
('personal.nombre', 'Nombre', '', '', 'SI', 'SI', 'SI', 'SI', 'SI', 'SI'),
('personal.apellido', 'Apellido', '', '', 'SI', 'SI', 'SI', 'SI', 'SI', 'SI'),
('personal.login', 'Login', '', '', 'SI', 'SI', 'SI', 'SI', 'SI', 'SI'),
('personal.clave', 'Clave', '', '', 'SI', 'SI', 'SI', 'SI', 'SI', 'SI'),
('personal.nivel_id', 'Nivel_id', '', '', 'SI', 'SI', 'SI', 'SI', 'SI', 'SI'),
('personal.sucursal_id', 'Sucursal_id', '', '', 'SI', 'SI', 'SI', 'SI', 'SI', 'SI'),
('personal.estado', 'Estado', '', '', 'SI', 'SI', 'SI', 'SI', 'SI', 'SI'),
('personal_datos.-', '-', '', '', 'SI', 'SI', 'SI', 'SI', 'SI', 'SI'),
('personal_datos.personal_id', 'Personal_id', '', '', 'SI', 'SI', 'SI', 'SI', 'SI', 'SI'),
('personal_datos.direccion', 'Direccion', '', '', 'SI', 'SI', 'SI', 'SI', 'SI', 'SI'),
('personal_datos.tlf_fijo', 'Tlf_fijo', '', '', 'SI', 'SI', 'SI', 'SI', 'SI', 'SI'),
('personal_datos.tlf_movil', 'Tlf_movil', '', '', 'SI', 'SI', 'SI', 'SI', 'SI', 'SI'),
('personal_datos.correo', 'Correo', '', '', 'SI', 'SI', 'SI', 'SI', 'SI', 'SI'),
('personal_datos.foto', 'Foto', '', '', 'SI', 'SI', 'SI', 'SI', 'SI', 'SI'),
('privilegios.-', '-', '', '', 'SI', 'SI', 'SI', 'SI', 'SI', 'SI'),
('privilegios.id', 'Id', '', '', 'SI', 'SI', 'SI', 'SI', 'SI', 'SI'),
('privilegios.pagina', 'Pagina', '', '', 'SI', 'SI', 'SI', 'SI', 'SI', 'SI'),
('privilegios.nivel_id', 'Nivel_id', '', '', 'SI', 'SI', 'SI', 'SI', 'SI', 'SI'),
('privilegios.acceso', 'Acceso', '', '', 'SI', 'SI', 'SI', 'SI', 'SI', 'SI'),
('sucursales.-', '-', '', '', 'SI', 'SI', 'SI', 'SI', 'SI', 'SI'),
('sucursales.id', 'Id', '', '', 'SI', 'SI', 'SI', 'SI', 'SI', 'SI'),
('sucursales.nombre', 'Nombre', '', '', 'SI', 'SI', 'SI', 'SI', 'SI', 'SI'),
('sucursales.direccion', 'Direccion', '', '', 'SI', 'SI', 'SI', 'SI', 'SI', 'SI'),
('sucursales.tlf', 'Tlf', '', '', 'SI', 'SI', 'SI', 'SI', 'SI', 'SI'),
('sucursales.tlf2', 'Tlf2', '', '', 'SI', 'SI', 'SI', 'SI', 'SI', 'SI'),
('sucursales.pais_id', 'Pais_id', '', '', 'SI', 'SI', 'SI', 'SI', 'SI', 'SI'),
('sucursales.persona_contacto', 'Persona_contacto', '', '', 'SI', 'SI', 'SI', 'SI', 'SI', 'SI'),
('sucursales.creado', 'Creado', '', '', 'SI', 'SI', 'SI', 'SI', 'SI', 'SI'),
('sucursales.modificado', 'Modificado', '', '', 'SI', 'SI', 'SI', 'SI', 'SI', 'SI'),
('transacciones.-', '-', '', '', 'SI', 'SI', 'SI', 'SI', 'SI', 'SI'),
('transacciones.id', 'Id', '', '', 'SI', 'SI', 'SI', 'SI', 'SI', 'SI'),
('transacciones.cliente_envia_id', 'Cliente_envia_id', '', '', 'SI', 'SI', 'SI', 'SI', 'SI', 'SI'),
('transacciones.cliente_recibe_id', 'Cliente_recibe_id', '', '', 'SI', 'SI', 'SI', 'SI', 'SI', 'SI'),
('transacciones.monto_envia', 'Monto_envia', '', '', 'SI', 'SI', 'SI', 'SI', 'SI', 'SI'),
('transacciones.monto_recibe', 'Monto_recibe', '', '', 'SI', 'SI', 'SI', 'SI', 'SI', 'SI'),
('transacciones.moneda_recibe_id', 'Moneda_recibe_id', '', '', 'SI', 'SI', 'SI', 'SI', 'SI', 'SI'),
('transacciones.moneda_envia_id', 'Moneda_envia_id', '', '', 'SI', 'SI', 'SI', 'SI', 'SI', 'SI'),
('transacciones.sucursal_envia_id', 'Sucursal_envia_id', '', '', 'SI', 'SI', 'SI', 'SI', 'SI', 'SI'),
('transacciones.sucursal_recibe_id', 'Sucursal_recibe_id', '', '', 'SI', 'SI', 'SI', 'SI', 'SI', 'SI'),
('transacciones.estado_id', 'Estado_id', '', '', 'SI', 'SI', 'SI', 'SI', 'SI', 'SI'),
('transacciones.personal_id', 'Personal_id', '', '', 'SI', 'SI', 'SI', 'SI', 'SI', 'SI'),
('transacciones.creado', 'Creado', '', '', 'SI', 'SI', 'SI', 'SI', 'SI', 'SI'),
('transacciones.modificado', 'Modificado', '', '', 'SI', 'SI', 'SI', 'SI', 'SI', 'SI'),
('usuarios.-', '-', '', '', 'SI', 'SI', 'SI', 'SI', 'SI', 'SI'),
('usuarios.id', 'Id', '', '', 'SI', 'SI', 'SI', 'SI', 'SI', 'SI'),
('usuarios.clave', 'Clave', '', '', 'SI', 'SI', 'SI', 'SI', 'SI', 'SI'),
('usuarios.nombre', 'Nombre', '', '', 'SI', 'SI', 'SI', 'SI', 'SI', 'SI'),
('usuarios.nivel', 'Nivel', '', '', 'SI', 'SI', 'SI', 'SI', 'SI', 'SI'),
('usuarios.email', 'Email', '', '', 'SI', 'SI', 'SI', 'SI', 'SI', 'SI'),
('usuarios.activo', 'Activo', '', '', 'SI', 'SI', 'SI', 'SI', 'SI', 'SI');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `metadatos_relaciones`
--

CREATE TABLE `metadatos_relaciones` (
  `id` int(10) UNSIGNED NOT NULL,
  `tabla_maestra` varchar(64) COLLATE utf8_unicode_ci NOT NULL DEFAULT '',
  `campo` varchar(64) COLLATE utf8_unicode_ci NOT NULL DEFAULT '',
  `tabla_extranjera` varchar(64) COLLATE utf8_unicode_ci NOT NULL DEFAULT '',
  `campo_extranjero` varchar(64) COLLATE utf8_unicode_ci NOT NULL DEFAULT ''
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci COMMENT='Relaciones';

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `monedas`
--

CREATE TABLE `monedas` (
  `id` int(6) NOT NULL,
  `nombre` varchar(255) COLLATE utf8_spanish_ci NOT NULL,
  `abreviacion` varchar(255) COLLATE utf8_spanish_ci NOT NULL,
  `creado` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `modificado` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00' ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `monedas`
--

INSERT INTO `monedas` (`id`, `nombre`, `abreviacion`, `creado`, `modificado`) VALUES
(2, 'Bolivares', 'Bs', '2017-08-13 15:33:50', '0000-00-00 00:00:00'),
(3, 'Dolares', '$', '2017-08-13 15:34:03', '0000-00-00 00:00:00'),
(4, 'Pesos Chilesnos', '$$', '2017-08-13 15:34:17', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `niveles`
--

CREATE TABLE `niveles` (
  `id` int(6) NOT NULL,
  `nombre` varchar(255) COLLATE utf8_spanish_ci NOT NULL,
  `creado` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `modificado` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00' ON UPDATE CURRENT_TIMESTAMP
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `niveles`
--

INSERT INTO `niveles` (`id`, `nombre`, `creado`, `modificado`) VALUES
(1, 'Administrator', '2017-08-17 22:07:43', '0000-00-00 00:00:00'),
(2, 'Supervisor', '2017-08-17 22:07:53', '0000-00-00 00:00:00'),
(3, 'Usuario', '2017-08-17 22:07:58', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `paises`
--

CREATE TABLE `paises` (
  `id` int(6) NOT NULL,
  `nombre` varchar(255) COLLATE utf8_spanish_ci NOT NULL,
  `creado` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `modificado` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00' ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `paises`
--

INSERT INTO `paises` (`id`, `nombre`, `creado`, `modificado`) VALUES
(1, 'Venezuela', '2017-08-13 15:37:07', '0000-00-00 00:00:00'),
(2, 'Perú', '2017-08-13 15:37:18', '2017-08-13 15:37:27'),
(3, 'Colombia', '2017-08-19 23:01:23', '0000-00-00 00:00:00'),
(4, 'Ecuador', '2017-08-19 23:05:57', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `personal`
--

CREATE TABLE `personal` (
  `id` int(6) NOT NULL,
  `dni` varchar(255) COLLATE utf8_spanish_ci NOT NULL,
  `nombre` varchar(35) COLLATE utf8_spanish_ci NOT NULL,
  `apellido` varchar(35) COLLATE utf8_spanish_ci NOT NULL,
  `login` varchar(30) COLLATE utf8_spanish_ci NOT NULL,
  `clave` varchar(32) COLLATE utf8_spanish_ci NOT NULL,
  `nivel_id` int(6) NOT NULL,
  `sucursal_id` int(6) NOT NULL,
  `estado` enum('ACTIVO','INACTIVO') COLLATE utf8_spanish_ci NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `personal`
--

INSERT INTO `personal` (`id`, `dni`, `nombre`, `apellido`, `login`, `clave`, `nivel_id`, `sucursal_id`, `estado`) VALUES
(3, '156196156156', 'admin', 'admin', 'admin', '21232f297a57a5a743894a0e4a801fc3', 1, 1, 'ACTIVO'),
(4, '17604411', 'Marcos', 'Torrealba', 'marcost15', '9e95b7a7ea5d0023fa04199e1a9a7da6', 1, 1, 'ACTIVO');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `personal_datos`
--

CREATE TABLE `personal_datos` (
  `personal_id` int(11) NOT NULL,
  `direccion` varchar(255) COLLATE utf8_spanish_ci NOT NULL,
  `tlf_fijo` varchar(11) COLLATE utf8_spanish_ci DEFAULT NULL,
  `tlf_movil` varchar(11) COLLATE utf8_spanish_ci DEFAULT NULL,
  `correo` varchar(50) COLLATE utf8_spanish_ci DEFAULT NULL,
  `foto` varchar(255) COLLATE utf8_spanish_ci NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `personal_datos`
--

INSERT INTO `personal_datos` (`personal_id`, `direccion`, `tlf_fijo`, `tlf_movil`, `correo`, `foto`) VALUES
(3, 'admin', '1', '1', 'admin@gmail.com', ''),
(4, 'Av bolivar con calle 13', '02712210316', '04265655013', 'marcost15@gmail.com', 'GEDC0176.jpg');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `privilegios`
--

CREATE TABLE `privilegios` (
  `id` int(6) NOT NULL,
  `pagina` varchar(255) COLLATE utf8_spanish_ci NOT NULL,
  `nivel_id` int(6) NOT NULL,
  `acceso` enum('CONCEDER','DENEGAR') COLLATE utf8_spanish_ci NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `privilegios`
--

INSERT INTO `privilegios` (`id`, `pagina`, `nivel_id`, `acceso`) VALUES
(1, 'ajax_cambio.php', 1, 'CONCEDER'),
(2, 'ajax_clientes.php', 1, 'CONCEDER'),
(3, 'ajax_estados_operaciones.php', 1, 'CONCEDER'),
(4, 'ajax_monedas.php', 1, 'CONCEDER'),
(5, 'ajax_niveles.php', 1, 'CONCEDER'),
(6, 'ajax_paises.php', 1, 'CONCEDER'),
(7, 'ajax_personal.php', 1, 'CONCEDER'),
(8, 'ajax_personal_datos.php', 1, 'CONCEDER'),
(9, 'ajax_sucursales.php', 1, 'CONCEDER'),
(10, 'ajax_transacciones.php', 1, 'CONCEDER'),
(11, 'ajaxdatatable_cambio.php', 1, 'CONCEDER'),
(12, 'ajaxdatatable_clientes.php', 1, 'CONCEDER'),
(13, 'ajaxdatatable_estados_operaciones.php', 1, 'CONCEDER'),
(14, 'ajaxdatatable_monedas.php', 1, 'CONCEDER'),
(15, 'ajaxdatatable_niveles.php', 1, 'CONCEDER'),
(16, 'ajaxdatatable_paises.php', 1, 'CONCEDER'),
(17, 'ajaxdatatable_personal.php', 1, 'CONCEDER'),
(18, 'ajaxdatatable_personal_datos.php', 1, 'CONCEDER'),
(19, 'ajaxdatatable_sucursales.php', 1, 'CONCEDER'),
(20, 'ajaxdatatable_transacciones.php', 1, 'CONCEDER'),
(21, 'cambio_agregar.php', 1, 'CONCEDER'),
(22, 'cambio_eliminar.php', 1, 'CONCEDER'),
(23, 'cambio_eliminar2.php', 1, 'CONCEDER'),
(24, 'cambio_ficha.php', 1, 'CONCEDER'),
(25, 'cambio_lista.php', 1, 'CONCEDER'),
(26, 'cambio_modificar.php', 1, 'CONCEDER'),
(27, 'clientes_agregar.php', 1, 'CONCEDER'),
(28, 'clientes_eliminar.php', 1, 'CONCEDER'),
(29, 'clientes_eliminar2.php', 1, 'CONCEDER'),
(30, 'clientes_ficha.php', 1, 'CONCEDER'),
(31, 'clientes_lista.php', 1, 'CONCEDER'),
(32, 'clientes_modificar.php', 1, 'CONCEDER'),
(33, 'clientes_transacciones.php', 1, 'CONCEDER'),
(34, 'estados_operaciones_agregar.php', 1, 'CONCEDER'),
(35, 'estados_operaciones_eliminar.php', 1, 'CONCEDER'),
(36, 'estados_operaciones_eliminar2.php', 1, 'CONCEDER'),
(37, 'estados_operaciones_ficha.php', 1, 'CONCEDER'),
(38, 'estados_operaciones_lista.php', 1, 'CONCEDER'),
(39, 'estados_operaciones_modificar.php', 1, 'CONCEDER'),
(40, 'index.php', 1, 'CONCEDER'),
(41, 'mensaje.php', 1, 'CONCEDER'),
(42, 'mensajev.php', 1, 'CONCEDER'),
(43, 'menu.php', 1, 'CONCEDER'),
(44, 'monedas_agregar.php', 1, 'CONCEDER'),
(45, 'monedas_eliminar.php', 1, 'CONCEDER'),
(46, 'monedas_eliminar2.php', 1, 'CONCEDER'),
(47, 'monedas_ficha.php', 1, 'CONCEDER'),
(48, 'monedas_lista.php', 1, 'CONCEDER'),
(49, 'monedas_modificar.php', 1, 'CONCEDER'),
(50, 'negacion_usuario.php', 1, 'CONCEDER'),
(51, 'niveles_agregar.php', 1, 'CONCEDER'),
(52, 'niveles_eliminar.php', 1, 'CONCEDER'),
(53, 'niveles_eliminar2.php', 1, 'CONCEDER'),
(54, 'niveles_ficha.php', 1, 'CONCEDER'),
(55, 'niveles_lista.php', 1, 'CONCEDER'),
(56, 'niveles_modificar.php', 1, 'CONCEDER'),
(57, 'paises_agregar.php', 1, 'CONCEDER'),
(58, 'paises_eliminar.php', 1, 'CONCEDER'),
(59, 'paises_eliminar2.php', 1, 'CONCEDER'),
(60, 'paises_ficha.php', 1, 'CONCEDER'),
(61, 'paises_lista.php', 1, 'CONCEDER'),
(62, 'paises_modificar.php', 1, 'CONCEDER'),
(63, 'personal_agregar.php', 1, 'CONCEDER'),
(64, 'personal_cambiar_clave.php', 1, 'CONCEDER'),
(65, 'personal_eliminar.php', 1, 'CONCEDER'),
(66, 'personal_eliminar2.php', 1, 'CONCEDER'),
(67, 'personal_ficha.php', 1, 'CONCEDER'),
(68, 'personal_lista.php', 1, 'CONCEDER'),
(69, 'personal_modificar.php', 1, 'CONCEDER'),
(70, 'privilegios_agregar.php', 1, 'CONCEDER'),
(71, 'privilegios_eliminar.php', 1, 'CONCEDER'),
(72, 'privilegios_eliminar2.php', 1, 'CONCEDER'),
(73, 'privilegios_lista.php', 1, 'CONCEDER'),
(74, 'privilegios_modificar.php', 1, 'CONCEDER'),
(75, 'rp_cons_caja.php', 1, 'CONCEDER'),
(76, 'rp_frm_caja.php', 1, 'CONCEDER'),
(77, 'sqlelim.php', 1, 'CONCEDER'),
(78, 'sqlguardar.php', 1, 'CONCEDER'),
(79, 'sqlrespaldo.php', 1, 'CONCEDER'),
(80, 'sucursales_agregar.php', 1, 'CONCEDER'),
(81, 'sucursales_eliminar.php', 1, 'CONCEDER'),
(82, 'sucursales_eliminar2.php', 1, 'CONCEDER'),
(83, 'sucursales_ficha.php', 1, 'CONCEDER'),
(84, 'sucursales_lista.php', 1, 'CONCEDER'),
(85, 'sucursales_modificar.php', 1, 'CONCEDER'),
(86, 'transacciones_agregar.php', 1, 'CONCEDER'),
(87, 'transacciones_eliminar.php', 1, 'CONCEDER'),
(88, 'transacciones_eliminar2.php', 1, 'CONCEDER'),
(89, 'transacciones_ficha.php', 1, 'CONCEDER'),
(90, 'transacciones_lista.php', 1, 'CONCEDER'),
(91, 'transacciones_modificar.php', 1, 'CONCEDER'),
(92, 'transacciones_pdf.php', 1, 'CONCEDER'),
(93, 'ventana_cliente_envia.php', 1, 'CONCEDER'),
(94, 'ventana_cliente_recibe.php', 1, 'CONCEDER');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `sucursales`
--

CREATE TABLE `sucursales` (
  `id` int(6) NOT NULL,
  `nombre` varchar(255) COLLATE utf8_spanish_ci NOT NULL,
  `direccion` varchar(255) COLLATE utf8_spanish_ci NOT NULL,
  `tlf` varchar(20) COLLATE utf8_spanish_ci NOT NULL,
  `tlf2` varchar(20) COLLATE utf8_spanish_ci NOT NULL,
  `pais_id` int(6) NOT NULL,
  `persona_contacto` varchar(255) COLLATE utf8_spanish_ci NOT NULL,
  `creado` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `modificado` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00' ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `sucursales`
--

INSERT INTO `sucursales` (`id`, `nombre`, `direccion`, `tlf`, `tlf2`, `pais_id`, `persona_contacto`, `creado`, `modificado`) VALUES
(1, 'Sucursal1', 'Av la paz', '02712210316', '8941816', 1, 'Marcos Torrealba', '2017-08-13 20:57:00', '2017-08-13 21:16:08'),
(2, 'sucursal2', 'asdasdasdasd', '1651651651', '', 2, 'mark', '2017-08-14 01:42:46', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `transacciones`
--

CREATE TABLE `transacciones` (
  `id` int(6) NOT NULL,
  `cliente_envia_id` int(6) NOT NULL,
  `cliente_recibe_id` int(6) NOT NULL,
  `monto_envia` decimal(10,2) NOT NULL,
  `monto_recibe` decimal(10,2) NOT NULL,
  `moneda_recibe_id` int(6) NOT NULL,
  `moneda_envia_id` int(6) NOT NULL,
  `sucursal_envia_id` int(6) NOT NULL,
  `sucursal_recibe_id` int(6) NOT NULL,
  `estado_id` int(6) NOT NULL,
  `personal_id` int(6) NOT NULL,
  `creado` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `modificado` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00' ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `transacciones`
--

INSERT INTO `transacciones` (`id`, `cliente_envia_id`, `cliente_recibe_id`, `monto_envia`, `monto_recibe`, `moneda_recibe_id`, `moneda_envia_id`, `sucursal_envia_id`, `sucursal_recibe_id`, `estado_id`, `personal_id`, `creado`, `modificado`) VALUES
(1, 1, 2, '500.00', '7500000.00', 2, 3, 1, 2, 1, 4, '2017-08-21 02:33:30', '0000-00-00 00:00:00'),
(2, 1, 2, '150.00', '2250000.00', 2, 3, 1, 2, 1, 4, '2017-08-21 02:33:52', '0000-00-00 00:00:00'),
(3, 1, 2, '189.00', '2835000.00', 2, 3, 1, 2, 1, 4, '2017-08-21 02:51:16', '0000-00-00 00:00:00'),
(4, 1, 2, '700.00', '11000000.00', 2, 3, 2, 1, 1, 4, '2017-08-21 02:52:19', '2017-08-21 05:08:34'),
(5, 1, 2, '1500.00', '0.08', 3, 4, 1, 2, 1, 4, '2017-08-21 03:03:24', '0000-00-00 00:00:00'),
(6, 1, 2, '187.00', '2805000.00', 2, 3, 1, 2, 4, 4, '2017-08-21 04:28:24', '0000-00-00 00:00:00');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `cambio`
--
ALTER TABLE `cambio`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `clientes`
--
ALTER TABLE `clientes`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `estados_operaciones`
--
ALTER TABLE `estados_operaciones`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `metadatos`
--
ALTER TABLE `metadatos`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `metadatos_relaciones`
--
ALTER TABLE `metadatos_relaciones`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `monedas`
--
ALTER TABLE `monedas`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `niveles`
--
ALTER TABLE `niveles`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `paises`
--
ALTER TABLE `paises`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `personal`
--
ALTER TABLE `personal`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `personal_datos`
--
ALTER TABLE `personal_datos`
  ADD PRIMARY KEY (`personal_id`);

--
-- Indices de la tabla `privilegios`
--
ALTER TABLE `privilegios`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `sucursales`
--
ALTER TABLE `sucursales`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `transacciones`
--
ALTER TABLE `transacciones`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `cambio`
--
ALTER TABLE `cambio`
  MODIFY `id` int(6) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT de la tabla `clientes`
--
ALTER TABLE `clientes`
  MODIFY `id` int(6) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT de la tabla `estados_operaciones`
--
ALTER TABLE `estados_operaciones`
  MODIFY `id` int(6) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT de la tabla `metadatos_relaciones`
--
ALTER TABLE `metadatos_relaciones`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `monedas`
--
ALTER TABLE `monedas`
  MODIFY `id` int(6) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT de la tabla `niveles`
--
ALTER TABLE `niveles`
  MODIFY `id` int(6) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT de la tabla `paises`
--
ALTER TABLE `paises`
  MODIFY `id` int(6) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT de la tabla `personal`
--
ALTER TABLE `personal`
  MODIFY `id` int(6) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT de la tabla `privilegios`
--
ALTER TABLE `privilegios`
  MODIFY `id` int(6) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=95;
--
-- AUTO_INCREMENT de la tabla `sucursales`
--
ALTER TABLE `sucursales`
  MODIFY `id` int(6) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT de la tabla `transacciones`
--
ALTER TABLE `transacciones`
  MODIFY `id` int(6) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
