-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 25-01-2025 a las 01:58:52
-- Versión del servidor: 10.4.27-MariaDB
-- Versión de PHP: 7.4.33

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `gestor_archivos`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `archivos`
--

CREATE TABLE `archivos` (
  `id` int(11) NOT NULL,
  `nombre_archivo` varchar(255) NOT NULL,
  `ruta_archivo` varchar(255) NOT NULL,
  `fecha_subida` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `tipo_archivo` varchar(55) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Volcado de datos para la tabla `archivos`
--

INSERT INTO `archivos` (`id`, `nombre_archivo`, `ruta_archivo`, `fecha_subida`, `tipo_archivo`) VALUES
(601, 'PRUEBA', 'uploads/1736275594_ARTICULOS_PARA_ENTRENAMIENTO_DEL_BOT.docx', '2025-01-07 18:46:34', 'application/vnd.openxmlformats-officedocument.wordproce');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `bitacora`
--

CREATE TABLE `bitacora` (
  `id` int(11) NOT NULL,
  `accion` varchar(255) NOT NULL,
  `fecha_hora` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `usuario_id` varchar(50) NOT NULL,
  `descripcion` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Volcado de datos para la tabla `bitacora`
--

INSERT INTO `bitacora` (`id`, `accion`, `fecha_hora`, `usuario_id`, `descripcion`) VALUES
(1, 'inicio de sesión', '2025-01-04 23:14:02', '5', 'El usuario ha iniciado sesión en el sistema.'),
(2, 'sesion finalizada', '2025-01-04 23:14:02', '5', 'La sesión ha expirado por inactividad.'),
(3, 'inicio de sesión', '2025-01-04 23:14:13', '5', 'El usuario ha iniciado sesión en el sistema.'),
(4, 'inicio de sesión', '2025-01-04 23:14:13', '5', 'El usuario ha iniciado sesión en el sistema.'),
(5, 'inicio de sesión', '2025-01-04 23:17:56', '5', 'El usuario ha iniciado sesión en el sistema.'),
(6, 'inicio de sesión', '2025-01-04 23:19:52', '5', 'El usuario ha iniciado sesión en el sistema.'),
(7, 'inicio de sesión', '2025-01-04 23:20:42', '5', 'El usuario ha iniciado sesión en el sistema.'),
(8, 'sesion finalizada', '2025-01-04 23:29:51', '5', 'La sesión ha expirado por inactividad.'),
(9, 'inicio de sesión', '2025-01-04 23:30:13', '5', 'El usuario ha iniciado sesión en el sistema.'),
(10, 'cierre de sesión', '2025-01-04 23:30:16', '5', 'El usuario ha cerrado sesión en el sistema.'),
(11, 'inicio de sesión', '2025-01-04 23:31:12', '5', 'El usuario ha iniciado sesión en el sistema.'),
(12, 'inicio de sesión', '2025-01-04 23:45:34', '5', 'El usuario ha iniciado sesión en el sistema.'),
(13, 'inicio de sesión', '2025-01-04 23:45:53', '5', 'El usuario ha iniciado sesión en el sistema.'),
(14, 'inicio de sesión', '2025-01-04 23:50:37', '5', 'El usuario ha iniciado sesión en el sistema.'),
(15, 'inicio de sesión', '2025-01-04 23:51:19', '5', 'El usuario ha iniciado sesión en el sistema.'),
(16, 'inicio de sesión', '2025-01-04 23:51:39', '5', 'El usuario ha iniciado sesión en el sistema.'),
(17, 'inicio de sesión', '2025-01-04 23:51:43', '5', 'El usuario ha iniciado sesión en el sistema.'),
(18, 'inicio de sesión', '2025-01-04 23:51:45', '5', 'El usuario ha iniciado sesión en el sistema.'),
(19, 'inicio de sesión', '2025-01-04 23:51:47', '5', 'El usuario ha iniciado sesión en el sistema.'),
(20, 'inicio de sesión', '2025-01-04 23:51:51', '5', 'El usuario ha iniciado sesión en el sistema.'),
(21, 'inicio de sesión', '2025-01-04 23:52:04', '5', 'El usuario ha iniciado sesión en el sistema.'),
(22, 'cierre de sesión', '2025-01-04 23:55:29', '5', 'El usuario ha cerrado sesión en el sistema.'),
(23, 'inicio de sesión', '2025-01-04 23:56:45', '0', 'El usuario ha iniciado sesión en el sistema.'),
(24, 'cierre de sesión', '2025-01-04 23:57:20', '0', 'El usuario ha cerrado sesión en el sistema.'),
(25, 'inicio de sesión', '2025-01-04 23:57:47', '5', 'El usuario ha iniciado sesión en el sistema.'),
(26, 'sesion finalizada', '2025-01-05 00:13:10', '5', 'La sesión ha expirado por inactividad.'),
(27, 'inicio de sesión', '2025-01-05 00:44:48', '0', 'El usuario ha iniciado sesión en el sistema.'),
(28, 'cierre de sesión', '2025-01-05 00:47:59', 'William ', 'El usuario ha cerrado sesión en el sistema.'),
(29, 'inicio de sesión', '2025-01-05 00:49:55', 'katherine ', 'El usuario ha iniciado sesión en el sistema.'),
(30, 'cierre de sesión', '2025-01-05 00:51:07', 'katherine ', 'El usuario ha cerrado sesión en el sistema.'),
(31, 'inicio de sesión', '2025-01-05 00:53:39', 'William ', 'El usuario ha iniciado sesión en el sistema.'),
(32, 'cierre de sesión', '2025-01-05 00:53:59', 'William ', 'El usuario ha cerrado sesión en el sistema.'),
(33, 'inicio de sesión', '2025-01-05 00:55:56', 'William ', 'El usuario ha iniciado sesión en el sistema.'),
(34, 'cierre de sesión', '2025-01-05 01:00:57', 'William ', 'El usuario ha cerrado sesión en el sistema.'),
(35, 'inicio de sesión', '2025-01-05 01:01:14', 'Katherine Hernandez', 'El usuario ha iniciado sesión en el sistema.'),
(36, 'sesion finalizada', '2025-01-05 01:09:05', 'Katherine Hernandez', 'La sesión ha expirado por inactividad.'),
(37, 'inicio de sesión', '2025-01-05 01:09:24', 'Katherine Hernandez', 'El usuario ha iniciado sesión en el sistema.'),
(38, 'registro de usuario', '2025-01-05 01:13:39', 'Katherine Hernandez', 'Un nuevo usuario ha sido registrado en el sistema.'),
(39, 'carga de archivo', '2025-01-05 01:18:19', 'Katherine Hernandez', 'Un nuevo archivo se ha cargado al sistema.'),
(40, 'sesion finalizada', '2025-01-05 01:24:20', 'Katherine Hernandez', 'La sesión ha expirado por inactividad.'),
(41, 'inicio de sesión', '2025-01-05 01:24:43', 'Katherine Hernandez', 'El usuario ha iniciado sesión en el sistema.'),
(42, 'eliminar archivo', '2025-01-05 01:24:51', 'Katherine Hernandez', 'Un archivo se ha eliminado del sistema.'),
(43, 'editar archivo', '2025-01-05 01:25:05', 'Katherine Hernandez', 'Un archivo se ha editado en el sistema.'),
(44, 'eliminar usuario', '2025-01-05 01:25:30', 'Katherine Hernandez', 'Un usuario se ha sido borrado del sistema.'),
(45, 'editar usuario', '2025-01-05 01:25:50', 'Katherine Hernandez', 'Un usuario se ha sido actualizado en el sistema.'),
(46, 'sesion finalizada', '2025-01-05 01:36:58', 'Katherine Hernandez', 'La sesión ha expirado por inactividad.'),
(47, 'inicio de sesión', '2025-01-05 01:39:13', 'Katherine Hernandez', 'El usuario ha iniciado sesión en el sistema.'),
(48, 'inicio de sesión', '2025-01-06 23:09:00', 'Katherine Hernandez', 'El usuario ha iniciado sesión en el sistema.'),
(49, 'cierre de sesión', '2025-01-06 23:09:23', 'Katherine Hernandez', 'El usuario ha cerrado sesión en el sistema.'),
(50, 'inicio de sesión', '2025-01-06 23:09:40', 'Katherine Hernandez', 'El usuario ha iniciado sesión en el sistema.'),
(51, 'cierre de sesión', '2025-01-06 23:09:42', 'Katherine Hernandez', 'El usuario ha cerrado sesión en el sistema.'),
(52, 'inicio de sesión', '2025-01-06 23:19:32', 'Katherine Hernandez', 'El usuario ha iniciado sesión en el sistema.'),
(53, 'cierre de sesión', '2025-01-06 23:20:12', 'Katherine Hernandez', 'El usuario ha cerrado sesión en el sistema.'),
(54, 'inicio de sesión', '2025-01-06 23:33:07', 'Katherine Hernandez', 'El usuario ha iniciado sesión en el sistema.'),
(55, 'sesion finalizada', '2025-01-06 23:39:01', 'Katherine Hernandez', 'La sesión ha expirado por inactividad.'),
(56, 'inicio de sesión', '2025-01-06 23:39:17', 'Katherine Hernandez', 'El usuario ha iniciado sesión en el sistema.'),
(57, 'inicio de sesión', '2025-01-06 23:50:06', 'Katherine Hernandez', 'El usuario ha iniciado sesión en el sistema.'),
(58, 'cierre de sesión', '2025-01-06 23:51:00', 'Katherine Hernandez', 'El usuario ha cerrado sesión en el sistema.'),
(59, 'sesion finalizada', '2025-01-06 23:59:16', 'Katherine Hernandez', 'La sesión ha expirado por inactividad.'),
(60, 'inicio de sesión', '2025-01-06 23:59:49', 'Katherine Hernandez', 'El usuario ha iniciado sesión en el sistema.'),
(61, 'sesion finalizada', '2025-01-07 00:18:00', 'Katherine Hernandez', 'La sesión ha expirado por inactividad.'),
(62, 'inicio de sesión', '2025-01-07 00:24:03', 'Katherine Hernandez', 'El usuario ha iniciado sesión en el sistema.'),
(63, 'cierre de sesión', '2025-01-07 00:25:27', 'Katherine Hernandez', 'El usuario ha cerrado sesión en el sistema.'),
(64, 'inicio de sesión', '2025-01-07 00:26:00', 'Katherine Hernandez', 'El usuario ha iniciado sesión en el sistema.'),
(65, 'sesion finalizada', '2025-01-07 00:31:35', 'Katherine Hernandez', 'La sesión ha expirado por inactividad.'),
(66, 'inicio de sesión', '2025-01-07 00:33:30', 'Katherine Hernandez', 'El usuario ha iniciado sesión en el sistema.'),
(67, 'cierre de sesión', '2025-01-07 00:33:41', 'Katherine Hernandez', 'El usuario ha cerrado sesión en el sistema.'),
(68, 'inicio de sesión', '2025-01-07 00:36:43', 'Katherine Hernandez', 'El usuario ha iniciado sesión en el sistema.'),
(69, 'sesion finalizada', '2025-01-07 00:50:15', 'Katherine Hernandez', 'La sesión ha expirado por inactividad.'),
(70, 'inicio de sesión', '2025-01-07 00:53:59', 'Katherine Hernandez', 'El usuario ha iniciado sesión en el sistema.'),
(71, 'eliminar archivo', '2025-01-07 00:58:07', 'Katherine Hernandez', 'Un archivo se ha eliminado del sistema.'),
(72, 'cierre de sesión', '2025-01-07 01:02:35', 'Katherine Hernandez', 'El usuario ha cerrado sesión en el sistema.'),
(73, 'inicio de sesión', '2025-01-07 01:02:50', 'Katherine Hernandez', 'El usuario ha iniciado sesión en el sistema.'),
(74, 'sesion finalizada', '2025-01-07 01:09:04', 'Katherine Hernandez', 'La sesión ha expirado por inactividad.'),
(75, 'inicio de sesión', '2025-01-07 01:11:03', 'Katherine Hernandez', 'El usuario ha iniciado sesión en el sistema.'),
(76, 'respaldo de archivos', '2025-01-07 01:13:20', 'Katherine Hernandez', 'El usuario ha hecho un backup de los archivos del sistemma.'),
(77, 'respaldo de archivos', '2025-01-07 01:18:48', 'Katherine Hernandez', 'El usuario ha hecho un Backup de los archivos del sistema.'),
(78, 'respaldo de archivos', '2025-01-07 01:22:27', 'Katherine Hernandez', 'El usuario ha hecho un Backup de los archivos del sistema.'),
(79, 'sesion finalizada', '2025-01-07 01:26:23', 'Katherine Hernandez', 'La sesión ha expirado por inactividad.'),
(80, 'inicio de sesión', '2025-01-07 01:26:39', 'Katherine Hernandez', 'El usuario ha iniciado sesión en el sistema.'),
(81, 'respaldo de archivos', '2025-01-07 01:27:48', 'Katherine Hernandez', 'El usuario ha hecho un Backup de los archivos del sistema.'),
(82, 'respaldo de archivos', '2025-01-07 01:30:25', 'Katherine Hernandez', 'El usuario ha hecho un Backup de los archivos del sistema.'),
(83, 'carga de archivo', '2025-01-07 01:33:28', 'Katherine Hernandez', 'Un nuevo archivo se ha cargado al sistema.'),
(84, 'carga de archivo', '2025-01-07 01:34:38', 'Katherine Hernandez', 'Un nuevo archivo se ha cargado al sistema.'),
(85, 'eliminar archivo', '2025-01-07 01:37:39', 'Katherine Hernandez', 'Un archivo se ha eliminado del sistema.'),
(86, 'respaldo de archivos', '2025-01-07 01:37:58', 'Katherine Hernandez', 'El usuario ha hecho un Backup de los archivos del sistema.'),
(87, 'inicio de sesión', '2025-01-07 18:16:53', 'Katherine Hernandez', 'El usuario ha iniciado sesión en el sistema.'),
(88, 'cierre de sesión', '2025-01-07 18:16:59', 'Katherine Hernandez', 'El usuario ha cerrado sesión en el sistema.'),
(89, 'inicio de sesión', '2025-01-07 18:20:22', 'Katherine Hernandez', 'El usuario ha iniciado sesión en el sistema.'),
(90, 'editar archivo', '2025-01-07 18:26:12', 'Katherine Hernandez', 'Un archivo se ha editado en el sistema.'),
(91, 'sesion finalizada', '2025-01-07 18:31:58', 'Katherine Hernandez', 'La sesión ha expirado por inactividad.'),
(92, 'inicio de sesión', '2025-01-07 18:32:11', 'Katherine Hernandez', 'El usuario ha iniciado sesión en el sistema.'),
(93, 'respaldo de archivos', '2025-01-07 18:34:28', 'Katherine Hernandez', 'El usuario ha hecho un Backup de los archivos del sistema.'),
(94, 'sesion finalizada', '2025-01-07 18:43:46', 'Katherine Hernandez', 'La sesión ha expirado por inactividad.'),
(95, 'inicio de sesión', '2025-01-07 18:44:24', 'Katherine Hernandez', 'El usuario ha iniciado sesión en el sistema.'),
(96, 'respaldo de archivos', '2025-01-07 18:44:31', 'Katherine Hernandez', 'El usuario ha hecho un Backup de los archivos del sistema.'),
(97, 'respaldo de archivos', '2025-01-07 18:44:43', 'Katherine Hernandez', 'El usuario ha hecho un Backup de los archivos del sistema.'),
(98, 'respaldo de archivos', '2025-01-07 18:46:00', 'Katherine Hernandez', 'El usuario ha hecho un Backup de los archivos del sistema.'),
(99, 'respaldo de archivos', '2025-01-07 18:46:09', 'Katherine Hernandez', 'El usuario ha hecho un Backup de los archivos del sistema.'),
(100, 'carga de archivo', '2025-01-07 18:46:34', 'Katherine Hernandez', 'Un nuevo archivo se ha cargado al sistema.'),
(101, 'respaldo de archivos', '2025-01-07 18:46:41', 'Katherine Hernandez', 'El usuario ha hecho un Backup de los archivos del sistema.'),
(102, 'respaldo de archivos', '2025-01-07 18:49:55', 'Katherine Hernandez', 'El usuario ha hecho un Backup de los archivos del sistema.'),
(103, 'respaldo de archivos', '2025-01-07 18:53:14', 'Katherine Hernandez', 'El usuario ha hecho un Backup de los archivos del sistema.'),
(104, 'respaldo de archivos', '2025-01-07 18:54:18', 'Katherine Hernandez', 'El usuario ha hecho un Backup de los archivos del sistema.'),
(105, 'respaldo de archivos', '2025-01-07 18:54:44', 'Katherine Hernandez', 'El usuario ha hecho un Backup de los archivos del sistema.'),
(106, 'respaldo de archivos', '2025-01-07 18:55:43', 'Katherine Hernandez', 'El usuario ha hecho un Backup de los archivos del sistema.'),
(107, 'respaldo de archivos', '2025-01-07 18:58:27', 'Katherine Hernandez', 'El usuario ha hecho un Backup de los archivos del sistema.'),
(108, 'respaldo de archivos', '2025-01-07 18:59:23', 'Katherine Hernandez', 'El usuario ha hecho un Backup de los archivos del sistema.'),
(109, 'respaldo de archivos', '2025-01-07 19:04:27', 'Katherine Hernandez', 'El usuario ha hecho un Backup de los archivos del sistema.'),
(110, 'respaldo de archivos', '2025-01-07 19:06:46', 'Katherine Hernandez', 'El usuario ha hecho un Backup de los archivos del sistema.'),
(111, 'respaldo de archivos', '2025-01-07 19:09:56', 'Katherine Hernandez', 'El usuario ha hecho un Backup de los archivos del sistema.'),
(112, 'eliminar usuario', '2025-01-07 19:14:08', 'Katherine Hernandez', 'Un usuario se ha sido borrado del sistema.'),
(113, 'eliminar usuario', '2025-01-07 19:14:22', 'Katherine Hernandez', 'Un usuario se ha sido borrado del sistema.'),
(114, 'cierre de sesión', '2025-01-07 19:21:37', 'Katherine Hernandez', 'El usuario ha cerrado sesión en el sistema.'),
(115, 'inicio de sesión', '2025-01-07 19:32:19', 'Katherine Hernandez', 'El usuario ha iniciado sesión en el sistema.'),
(116, 'sesion finalizada', '2025-01-07 19:46:03', 'Katherine Hernandez', 'La sesión ha expirado por inactividad.'),
(117, 'inicio de sesión', '2025-01-07 19:46:17', 'Katherine Hernandez', 'El usuario ha iniciado sesión en el sistema.'),
(118, 'sesion finalizada', '2025-01-07 19:56:04', 'Katherine Hernandez', 'La sesión ha expirado por inactividad.'),
(119, 'inicio de sesión', '2025-01-07 19:56:49', 'Katherine Hernandez', 'El usuario ha iniciado sesión en el sistema.'),
(120, 'sesion finalizada', '2025-01-07 20:04:38', 'Katherine Hernandez', 'La sesión ha expirado por inactividad.'),
(121, 'inicio de sesión', '2025-01-07 20:04:54', 'Katherine Hernandez', 'El usuario ha iniciado sesión en el sistema.'),
(122, 'respaldo de archivos', '2025-01-07 20:32:49', 'Katherine Hernandez', 'El usuario ha hecho un Backup de los archivos del sistema.'),
(123, 'sesion finalizada', '2025-01-07 20:55:07', 'Katherine Hernandez', 'La sesión ha expirado por inactividad.'),
(124, 'inicio de sesión', '2025-01-07 20:55:20', 'Katherine Hernandez', 'El usuario ha iniciado sesión en el sistema.'),
(125, 'cierre de sesión', '2025-01-07 20:55:37', 'Katherine Hernandez', 'El usuario ha cerrado sesión en el sistema.'),
(126, 'inicio de sesión', '2025-01-07 20:56:09', 'Katherine Hernandez', 'El usuario ha iniciado sesión en el sistema.'),
(127, 'cierre de sesión', '2025-01-07 20:58:03', 'Katherine Hernandez', 'El usuario ha cerrado sesión en el sistema.'),
(128, 'inicio de sesión', '2025-01-07 20:58:28', 'Katherine Hernandez', 'El usuario ha iniciado sesión en el sistema.'),
(129, 'cierre de sesión', '2025-01-07 20:58:44', 'Katherine Hernandez', 'El usuario ha cerrado sesión en el sistema.'),
(130, 'inicio de sesión', '2025-01-07 23:40:57', 'Katherine Hernandez', 'El usuario ha iniciado sesión en el sistema.'),
(131, 'inicio de sesión', '2025-01-07 23:47:38', 'Katherine Hernandez', 'El usuario ha iniciado sesión en el sistema.'),
(132, 'sesion finalizada', '2025-01-07 23:47:38', 'Katherine Hernandez', 'La sesión ha expirado por inactividad.'),
(133, 'inicio de sesión', '2025-01-07 23:47:57', 'Katherine Hernandez', 'El usuario ha iniciado sesión en el sistema.'),
(134, 'cierre de sesión', '2025-01-07 23:48:49', 'Katherine Hernandez', 'El usuario ha cerrado sesión en el sistema.'),
(135, 'inicio de sesión', '2025-01-07 23:49:14', 'Katherine Hernandez', 'El usuario ha iniciado sesión en el sistema.'),
(136, 'cierre de sesión', '2025-01-07 23:49:16', 'Katherine Hernandez', 'El usuario ha cerrado sesión en el sistema.'),
(137, 'inicio de sesión', '2025-01-07 23:49:31', 'Katherine Hernandez', 'El usuario ha iniciado sesión en el sistema.'),
(138, 'cierre de sesión', '2025-01-07 23:49:32', 'Katherine Hernandez', 'El usuario ha cerrado sesión en el sistema.'),
(139, 'inicio de sesión', '2025-01-07 23:59:24', 'Katherine Hernandez', 'El usuario ha iniciado sesión en el sistema.'),
(140, 'sesion finalizada', '2025-01-08 00:21:15', 'Katherine Hernandez', 'La sesión ha expirado por inactividad.'),
(141, 'inicio de sesión', '2025-01-08 00:21:33', 'Katherine Hernandez', 'El usuario ha iniciado sesión en el sistema.'),
(142, 'cierre de sesión', '2025-01-08 00:21:38', 'Katherine Hernandez', 'El usuario ha cerrado sesión en el sistema.'),
(143, 'inicio de sesión', '2025-01-08 00:24:10', 'Katherine Hernandez', 'El usuario ha iniciado sesión en el sistema.'),
(144, 'sesion finalizada', '2025-01-08 00:34:15', 'Katherine Hernandez', 'La sesión ha expirado por inactividad.'),
(145, 'inicio de sesión', '2025-01-08 00:34:30', 'Katherine Hernandez', 'El usuario ha iniciado sesión en el sistema.'),
(146, 'sesion finalizada', '2025-01-08 00:34:30', 'Katherine Hernandez', 'La sesión ha expirado por inactividad.'),
(147, 'inicio de sesión', '2025-01-08 00:35:34', 'Katherine Hernandez', 'El usuario ha iniciado sesión en el sistema.'),
(148, 'sesion finalizada', '2025-01-08 00:35:34', 'Katherine Hernandez', 'La sesión ha expirado por inactividad.'),
(149, 'inicio de sesión', '2025-01-08 00:36:33', 'Katherine Hernandez', 'El usuario ha iniciado sesión en el sistema.'),
(150, 'respaldo de archivos', '2025-01-08 00:37:52', 'Katherine Hernandez', 'El usuario ha hecho un Backup de los archivos del sistema.'),
(151, 'sesion finalizada', '2025-01-08 01:09:27', 'Katherine Hernandez', 'La sesión ha expirado por inactividad.'),
(152, 'inicio de sesión', '2025-01-11 20:38:34', 'Katherine Hernandez', 'El usuario ha iniciado sesión en el sistema.'),
(153, 'sesion finalizada', '2025-01-11 20:45:37', 'Katherine Hernandez', 'La sesión ha expirado por inactividad.'),
(154, 'inicio de sesión', '2025-01-11 20:46:01', 'Katherine Hernandez', 'El usuario ha iniciado sesión en el sistema.'),
(155, 'sesion finalizada', '2025-01-11 20:58:22', 'Katherine Hernandez', 'La sesión ha expirado por inactividad.');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `carpeta`
--

CREATE TABLE `carpeta` (
  `id` int(11) NOT NULL,
  `nombre_carpeta` varchar(255) NOT NULL,
  `fecha_creacion` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `archivos_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `permisos`
--

CREATE TABLE `permisos` (
  `id` int(11) NOT NULL,
  `permiso` varchar(55) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `roles`
--

CREATE TABLE `roles` (
  `id` int(11) NOT NULL,
  `rol` varchar(55) NOT NULL,
  `nivel_acceso` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `roles`
--

INSERT INTO `roles` (`id`, `rol`, `nivel_acceso`) VALUES
(1, 'Admin', 1),
(2, 'SuperAdmin', 1),
(3, 'Personal', 0);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE `usuarios` (
  `id` int(11) NOT NULL,
  `nombre` varchar(32) NOT NULL,
  `apellido` varchar(32) NOT NULL,
  `correo` varchar(64) NOT NULL,
  `telefono` varchar(64) NOT NULL,
  `clave` varchar(512) NOT NULL,
  `codigo_acceso` text NOT NULL,
  `estado` int(11) NOT NULL COMMENT '0=pending,1=confirmed',
  `modifcado_clave` datetime NOT NULL,
  `fecha_creacion` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `id_roles` int(11) NOT NULL,
  `id_permisos` int(11) NOT NULL,
  `intentos_fallidos` int(11) DEFAULT 0,
  `ultimo_intento` datetime DEFAULT NULL,
  `session_active` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci COMMENT='usuarios administradores y empleados';

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`id`, `nombre`, `apellido`, `correo`, `telefono`, `clave`, `codigo_acceso`, `estado`, `modifcado_clave`, `fecha_creacion`, `id_roles`, `id_permisos`, `intentos_fallidos`, `ultimo_intento`, `session_active`) VALUES
(4, 'katherine', '', 'kathernandz97@gmail.com', '', '1b2c04df09478b5b1b366b24819284cc582b375f4aab40f0edda0bf74a9dd847a8da8b76624b906c7dd2451a368a31f5baa160a643a542d52116ed2dc4d36328', '', 0, '0000-00-00 00:00:00', '2024-11-11 03:14:44', 0, 0, 0, NULL, 0),
(6, 'katherine', '', 'katherinehcontact@gmail.com', '', '1b2c04df09478b5b1b366b24819284cc582b375f4aab40f0edda0bf74a9dd847a8da8b76624b906c7dd2451a368a31f5baa160a643a542d52116ed2dc4d36328', '', 0, '0000-00-00 00:00:00', '2024-11-23 21:47:54', 0, 0, 0, NULL, 0),
(7, 'kathy', 'hernandez', 'kathernandz97@gmail.com', '04146555532', '$2y$10$zbxObJweb/KNN/mEld3Wt.BrlUVXiBq23I5VCYVPmo9W4RlMRR0Ka', '', 0, '0000-00-00 00:00:00', '2024-11-25 23:15:11', 0, 0, 0, NULL, 0),
(8, 'katherine', 'hernandez', 'kathernandz97@gmail.com', '04146555532', '$2y$10$R9.IB5tVq4xQ/n.7AOmkJOdcGCIVLTSB.gQor/anz/8Ps4HEEwtM.', '', 0, '0000-00-00 00:00:00', '2024-11-25 02:09:26', 0, 0, 0, NULL, 0),
(9, 'katherine', 'hernandez', 'kathernandz97@gmail.com', '04146555532', '$2y$10$AMVGffca4BJhkBnP9rR7JOY7na.yiFOnvOAMrxozhKRvI2g5n/Du6', '', 0, '0000-00-00 00:00:00', '2024-11-25 02:10:00', 0, 0, 0, NULL, 0),
(10, 'katherine', 'hernandez', 'kathernandz97@gmail.com', '04146555532', '$2y$10$BuPdVQ1HagSaadIehRn3ouYg1PxdIKlc.xBqQXQwNxPm003EqPZEm', '', 0, '0000-00-00 00:00:00', '2024-11-25 02:11:33', 0, 0, 0, NULL, 0),
(13, 'Jose ', 'Lopez', 'katherinehcontact@gmail.com', '04146555532', '$2y$10$Wc/Ue4ssx05OwyUef8wV9.Bng3LCWDhAd9pED8mjhtS.aoCzCzPy2', '', 1, '0000-00-00 00:00:00', '2024-11-25 03:23:29', 1, 0, 0, NULL, 0),
(17, 'Joseph', 'Perez', 'mariamiranda01@gmail.com', '09413342481', '$2y$10$rfsFscpuiyq4qsBPzB1IseD7I9vovNfJQyiRaowgTkCosv/Reshv.', '', 1, '0000-00-00 00:00:00', '2024-11-25 23:08:36', 1, 0, 0, NULL, 0),
(18, 'Joseph', 'Perez', 'johna210.net@gmail.com', '09413342481', '$2y$10$AKka7TZXKN8rVWqPcx6eyul7qSEtyw/C.bvVoFeFEFAtWuldMKwN6', '', 1, '0000-00-00 00:00:00', '2024-11-25 23:13:37', 1, 0, 0, NULL, 0),
(20, 'Katherine', 'Hernandez', 'vacationjrental@gmail.com', '04146555532', '$2y$10$8bhQ9a7vfYgQCN8pAtqlzO8h6XbMXEhePGlM3VDNEU2C9Pn674fKy', '', 1, '0000-00-00 00:00:00', '2025-01-05 00:53:55', 1, 0, 0, NULL, 0),
(21, 'Katherine', 'Hernandez', 'kexingdev@gmail.com', '04146555532', '1b2c04df09478b5b1b366b24819284cc582b375f4aab40f0edda0bf74a9dd847a8da8b76624b906c7dd2451a368a31f5baa160a643a542d52116ed2dc4d36328', '3923b520d6927988808bd3f2436bffc3caee3287fc69ff3f2bd2922c13df81fb81577717dd1f88589db6232d3c14f960b291', 1, '0000-00-00 00:00:00', '2025-01-11 22:11:28', 0, 0, 0, NULL, 0),
(24, 'Maria', 'Lopez', 'marialopez2025090@gmail.com', '21319223231', '1b2c04df09478b5b1b366b24819284cc582b375f4aab40f0edda0bf74a9dd847a8da8b76624b906c7dd2451a368a31f5baa160a643a542d52116ed2dc4d36328', '', 1, '0000-00-00 00:00:00', '2025-01-05 01:13:39', 0, 0, 0, NULL, 0);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `archivos`
--
ALTER TABLE `archivos`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `bitacora`
--
ALTER TABLE `bitacora`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `carpeta`
--
ALTER TABLE `carpeta`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `permisos`
--
ALTER TABLE `permisos`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `archivos`
--
ALTER TABLE `archivos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=602;

--
-- AUTO_INCREMENT de la tabla `bitacora`
--
ALTER TABLE `bitacora`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=156;

--
-- AUTO_INCREMENT de la tabla `carpeta`
--
ALTER TABLE `carpeta`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `permisos`
--
ALTER TABLE `permisos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `roles`
--
ALTER TABLE `roles`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
