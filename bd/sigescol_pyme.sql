-- phpMyAdmin SQL Dump
-- version 4.5.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Dec 04, 2016 at 02:04 PM
-- Server version: 5.7.11
-- PHP Version: 7.0.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `sigescol_pyme`
--

-- --------------------------------------------------------

--
-- Table structure for table `modulos`
--

CREATE TABLE `modulos` (
  `id_modulo` int(11) NOT NULL COMMENT 'Clave Primaria',
  `archivo_modulo` varchar(100) NOT NULL COMMENT 'Archivo del Modulo',
  `icono_modulo` varchar(100) NOT NULL COMMENT 'Icono FA o Glyphicon',
  `nombre_modulo` varchar(100) NOT NULL COMMENT 'Nombre del Modulo',
  `descripcion_modulo` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='Modulos del Sistema';

--
-- Dumping data for table `modulos`
--

INSERT INTO `modulos` (`id_modulo`, `archivo_modulo`, `icono_modulo`, `nombre_modulo`, `descripcion_modulo`) VALUES
(1, 'config.php', 'fa fa-gears fa-fw', 'Configuración', ''),
(2, 'ventas.php', 'fa fa-shopping-cart', 'Ventas', '');

-- --------------------------------------------------------

--
-- Table structure for table `opciones`
--

CREATE TABLE `opciones` (
  `id_opcion` int(11) NOT NULL COMMENT 'Clave Primaria',
  `id_submodulo` int(11) NOT NULL COMMENT 'Clave Forenea Submodulo',
  `opt` varchar(50) NOT NULL COMMENT 'Opcion ADD, EDIT, DELETE',
  `archivo_opt` varchar(100) NOT NULL,
  `icono_opt` varchar(100) NOT NULL,
  `nombre_opt` varchar(100) NOT NULL,
  `descripcion_opt` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='Opciones de los Submodulos';

--
-- Dumping data for table `opciones`
--

INSERT INTO `opciones` (`id_opcion`, `id_submodulo`, `opt`, `archivo_opt`, `icono_opt`, `nombre_opt`, `descripcion_opt`) VALUES
(1, 1, 'add', 'usuario_add.php', 'user-20.png', 'Agregar Usuario', ''),
(2, 1, 'edit', 'usuario_edit.php', 'user-32.png', 'Editar Usuario', ''),
(3, 1, 'view', 'usuario_view.php', 'user-30.png', 'Ver Usuario', ''),
(4, 1, 'delete', 'usuario_delete.php', 'user-22.png', 'Eliminar Usuario', ''),
(5, 3, 'add', 'permiso_add.php', 'add-1.png', 'Agregar Perfil', ''),
(6, 3, 'edit', 'permiso_edit.php', 'edit.png', 'Editar Perfil', ''),
(7, 3, 'view', 'permiso_view.php', 'view-1.png', 'Ver Perfil', '');

-- --------------------------------------------------------

--
-- Table structure for table `perfiles`
--

CREATE TABLE `perfiles` (
  `id_perfil` int(11) NOT NULL COMMENT 'Clave Primaria',
  `descripcion_perfil` varchar(100) NOT NULL COMMENT 'Rol'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='Roles del Sistema';

--
-- Dumping data for table `perfiles`
--

INSERT INTO `perfiles` (`id_perfil`, `descripcion_perfil`) VALUES
(1, 'Administrador'),
(2, 'Usuario');

-- --------------------------------------------------------

--
-- Table structure for table `permisos`
--

CREATE TABLE `permisos` (
  `id_permiso` int(11) NOT NULL COMMENT 'Clave Primaria',
  `id_perfil` int(11) NOT NULL COMMENT 'Clave Foranea Rol',
  `id_modulo` int(11) NOT NULL COMMENT 'Clave Foranea Modulo',
  `ver` tinyint(1) NOT NULL COMMENT 'Ver el Modulo'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='Permisologia del Sistema';

--
-- Dumping data for table `permisos`
--

INSERT INTO `permisos` (`id_permiso`, `id_perfil`, `id_modulo`, `ver`) VALUES
(1, 1, 1, 0),
(2, 1, 2, 0);

-- --------------------------------------------------------

--
-- Table structure for table `submodulos`
--

CREATE TABLE `submodulos` (
  `id_submodulo` int(11) NOT NULL COMMENT 'Clave Primaria',
  `id_modulo` int(11) NOT NULL COMMENT 'Clave Foranea Modulo',
  `archivo_submodulo` varchar(100) NOT NULL,
  `icono_submodulo` varchar(100) NOT NULL,
  `nombre_submodulo` varchar(100) NOT NULL,
  `descripcion_submodulo` varchar(100) NOT NULL COMMENT 'Descripcion del Modulo'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='Submodulos del Sistema';

--
-- Dumping data for table `submodulos`
--

INSERT INTO `submodulos` (`id_submodulo`, `id_modulo`, `archivo_submodulo`, `icono_submodulo`, `nombre_submodulo`, `descripcion_submodulo`) VALUES
(1, 1, 'usuarios.php', 'user-49.png', 'Usuarios', ''),
(2, 1, 'parametros.php', 'settings-4.png', 'Parametros Generales', ''),
(3, 1, 'permisos.php', 'locked-3.png', 'Permisos', '');

-- --------------------------------------------------------

--
-- Table structure for table `usuarios`
--

CREATE TABLE `usuarios` (
  `id_usuario` int(11) NOT NULL COMMENT 'Clave Primaria',
  `login_usuario` varchar(50) NOT NULL COMMENT 'Login del Usuario',
  `pass_usuario` varchar(255) NOT NULL COMMENT 'Contraseña del Usuario',
  `nombre_usuario` varchar(100) NOT NULL COMMENT 'Nombre del Usuario',
  `apellido_usuario` varchar(100) NOT NULL COMMENT 'Apellido del Usuario',
  `cedula_usuario` int(8) NOT NULL COMMENT 'Cedula del Usuario',
  `email_usuario` varchar(100) NOT NULL COMMENT 'Correo del Usuario',
  `id_perfil` int(11) NOT NULL COMMENT 'Clave Foranea Rol'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='Usuarios del Sistema';

--
-- Dumping data for table `usuarios`
--

INSERT INTO `usuarios` (`id_usuario`, `login_usuario`, `pass_usuario`, `nombre_usuario`, `apellido_usuario`, `cedula_usuario`, `email_usuario`, `id_perfil`) VALUES
(1, 'admin', '21232f297a57a5a743894a0e4a801fc3', 'Junior Alexis', 'Ayala Rivas', 18677970, '', 1),
(2, 'user', '202cb962ac59075b964b07152d234b70', 'Jose', 'Perez', 0, '', 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `modulos`
--
ALTER TABLE `modulos`
  ADD PRIMARY KEY (`id_modulo`);

--
-- Indexes for table `opciones`
--
ALTER TABLE `opciones`
  ADD PRIMARY KEY (`id_opcion`),
  ADD KEY `id_submodulo` (`id_submodulo`);

--
-- Indexes for table `perfiles`
--
ALTER TABLE `perfiles`
  ADD PRIMARY KEY (`id_perfil`);

--
-- Indexes for table `permisos`
--
ALTER TABLE `permisos`
  ADD PRIMARY KEY (`id_permiso`),
  ADD KEY `id_rol` (`id_perfil`),
  ADD KEY `id_modulo` (`id_modulo`);

--
-- Indexes for table `submodulos`
--
ALTER TABLE `submodulos`
  ADD PRIMARY KEY (`id_submodulo`),
  ADD KEY `id_modulo` (`id_modulo`);

--
-- Indexes for table `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`id_usuario`),
  ADD UNIQUE KEY `login_usuario` (`login_usuario`),
  ADD KEY `id_rol` (`id_perfil`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `modulos`
--
ALTER TABLE `modulos`
  MODIFY `id_modulo` int(11) NOT NULL AUTO_INCREMENT COMMENT 'Clave Primaria', AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `opciones`
--
ALTER TABLE `opciones`
  MODIFY `id_opcion` int(11) NOT NULL AUTO_INCREMENT COMMENT 'Clave Primaria', AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT for table `perfiles`
--
ALTER TABLE `perfiles`
  MODIFY `id_perfil` int(11) NOT NULL AUTO_INCREMENT COMMENT 'Clave Primaria', AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `permisos`
--
ALTER TABLE `permisos`
  MODIFY `id_permiso` int(11) NOT NULL AUTO_INCREMENT COMMENT 'Clave Primaria', AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `submodulos`
--
ALTER TABLE `submodulos`
  MODIFY `id_submodulo` int(11) NOT NULL AUTO_INCREMENT COMMENT 'Clave Primaria', AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id_usuario` int(11) NOT NULL AUTO_INCREMENT COMMENT 'Clave Primaria', AUTO_INCREMENT=3;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `opciones`
--
ALTER TABLE `opciones`
  ADD CONSTRAINT `opciones_ibfk_1` FOREIGN KEY (`id_submodulo`) REFERENCES `submodulos` (`id_submodulo`);

--
-- Constraints for table `permisos`
--
ALTER TABLE `permisos`
  ADD CONSTRAINT `permisos_ibfk_1` FOREIGN KEY (`id_perfil`) REFERENCES `perfiles` (`id_perfil`),
  ADD CONSTRAINT `permisos_ibfk_2` FOREIGN KEY (`id_modulo`) REFERENCES `modulos` (`id_modulo`);

--
-- Constraints for table `submodulos`
--
ALTER TABLE `submodulos`
  ADD CONSTRAINT `submodulos_ibfk_1` FOREIGN KEY (`id_modulo`) REFERENCES `modulos` (`id_modulo`);

--
-- Constraints for table `usuarios`
--
ALTER TABLE `usuarios`
  ADD CONSTRAINT `usuarios_ibfk_1` FOREIGN KEY (`id_perfil`) REFERENCES `perfiles` (`id_perfil`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
