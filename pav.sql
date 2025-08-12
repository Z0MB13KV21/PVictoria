-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 16-06-2025 a las 05:53:04
-- Versión del servidor: 10.4.32-MariaDB
-- Versión de PHP: 8.3.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `pav`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `categoriassub`
--

CREATE TABLE `categoriassub` (
  `id` int(11) NOT NULL,
  `nombreCategoria` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish_ci;

--
-- Volcado de datos para la tabla `categoriassub`
--

INSERT INTO `categoriassub` (`id`, `nombreCategoria`) VALUES
(1, 'Llaveros'),
(2, 'Botellas'),
(3, 'Stickers'),
(4, 'Textiles'),
(5, 'Jarras'),
(6, 'Mascotas'),
(7, 'Otros');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `fondopagina`
--

CREATE TABLE `fondopagina` (
  `id` int(11) NOT NULL,
  `NombreFondo` varchar(255) DEFAULT NULL,
  `RutaFondo` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish_ci;

--
-- Volcado de datos para la tabla `fondopagina`
--

INSERT INTO `fondopagina` (`id`, `NombreFondo`, `RutaFondo`) VALUES
(1, 'CatalogoFondo', 'ruta/a/fondo1.jpg'),
(2, 'EstudianteFondo', 'ruta/a/fondo2.jpg'),
(3, 'KVSFondo', 'ruta/a/fondo3.jpg'),
(4, 'KVCFondo', 'ruta/a/fondo4.jpg');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `iconopagina`
--

CREATE TABLE `iconopagina` (
  `id` int(11) NOT NULL,
  `nombreIcon` varchar(255) DEFAULT NULL,
  `rutaIcon` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish_ci;

--
-- Volcado de datos para la tabla `iconopagina`
--

INSERT INTO `iconopagina` (`id`, `nombreIcon`, `rutaIcon`) VALUES
(1, 'CatalogoIcon', 'ruta/a/icono1.png'),
(2, 'EstudianteIcon', 'ruta/a/icono2.png'),
(3, 'KVSIcon', 'ruta/a/icono3.png'),
(4, 'KVCIcon', 'ruta/a/icono4.png');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `logopagina`
--

CREATE TABLE `logopagina` (
  `id` int(11) NOT NULL,
  `nombreLogo` varchar(255) DEFAULT NULL,
  `rutaLogo` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish_ci;

--
-- Volcado de datos para la tabla `logopagina`
--

INSERT INTO `logopagina` (`id`, `nombreLogo`, `rutaLogo`) VALUES
(1, 'CatalogoLogo', 'ruta/a/logo1.png'),
(2, 'EstudianteLogo', 'ruta/a/logo2.png'),
(3, 'KVSLogo', 'ruta/a/logo3.png'),
(4, 'KVCLogo', 'ruta/a/logo4.png');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `materialessub`
--

CREATE TABLE `materialessub` (
  `id` int(11) NOT NULL,
  `nombreMaterial` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish_ci;

--
-- Volcado de datos para la tabla `materialessub`
--

INSERT INTO `materialessub` (`id`, `nombreMaterial`) VALUES
(1, 'Vinil'),
(2, 'Sublimable'),
(3, 'Sublimable y Vinil'),
(4, 'Otro');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pagina`
--

CREATE TABLE `pagina` (
  `id` int(11) NOT NULL,
  `nombrePagina` varchar(255) DEFAULT NULL,
  `rutaRecursos` varchar(255) DEFAULT NULL,
  `rutaIconBack` varchar(255) DEFAULT NULL,
  `rutaDescargas` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish_ci;

--
-- Volcado de datos para la tabla `pagina`
--

INSERT INTO `pagina` (`id`, `nombrePagina`, `rutaRecursos`, `rutaIconBack`, `rutaDescargas`) VALUES
(1, 'estudiante', 'estudiante/Recursos', 'estudiante/iconBack', 'estudiante/Down'),
(2, 'catalogos', 'catalogos/recursos', 'catalogos/iconback', 'catalogos/Down'),
(3, 'Amigurumis', 'catalogos/KVC/a/recursos', 'catalogos/KVC/a/iconback', 'catalogos/KVC/a/down'),
(4, 'Bordados', 'catalogos/KVC/b/recursos', 'catalogos/KVC/b/iconback', 'catalogos/KVC/b/down'),
(5, 'Bolsos', 'catalogos/KVC/c/recursos', 'catalogos/KVC/c/iconback', 'catalogos/KVC/c/down'),
(6, 'KV Sublimación', 'catalogos/KVS/Recursos', 'catalogos/KVS/iconBack', 'catalogos/KVS/Down'),
(7, 'KV Tejido', 'catalogos/KVC/Recursos', 'catalogos/KVC/iconBack', 'catalogos/KVC/Down');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `productostej`
--

CREATE TABLE `productostej` (
  `Id` int(11) NOT NULL,
  `NombreTej` varchar(255) DEFAULT NULL,
  `Pagina` varchar(20) DEFAULT NULL,
  `Descripcion` text DEFAULT NULL,
  `Tamaño` text DEFAULT NULL,
  `Precio` decimal(10,2) DEFAULT NULL,
  `Galeria` varchar(255) DEFAULT NULL,
  `Pdf` varchar(255) DEFAULT NULL,
  `ContraseñaPDF` varchar(16) DEFAULT NULL,
  `Activo` varchar(12) DEFAULT NULL,
  `Mostrar` varchar(12) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish_ci;

--
-- Volcado de datos para la tabla `productostej`
--

INSERT INTO `productostej` (`Id`, `NombreTej`, `Pagina`, `Descripcion`, `Tamaño`, `Precio`, `Galeria`, `Pdf`, `ContraseñaPDF`, `Activo`, `Mostrar`) VALUES
(8, 'asda', 'amigurumis', 'asdasd', 'asdasd', 1231.00, 'Catalogos/KVC/amigurumis/recursos/asda-KVC.webp', 'Catalogos/KVC/amigurumis/down/asda-KVC.pdf', 'xv19aJa2', 'activo', 'mostrar'),
(9, 'asdasd', 'bordados', 'asdasd', 'asdasd', 12.00, 'Catalogos/KVC/amigurumis/recursos/asdasd-KVC.webp', 'Catalogos/KVC/amigurumis/down/asdasd-KVC.pdf', 'f8Z4ufx5', 'activo', 'mostrar'),
(10, 'asdaaaa', 'bolsos', 'asdas', 'asdasd', 1231.00, 'Catalogos/KVC/bordados/recursos/asdaaaa-KVC.webp', 'Catalogos/KVC/bordados/down/asdaaaa-KVC.pdf', '95pRx0aX', 'activo', 'mostrar'),
(13, 'prueba', 'bolsos', 'asdasdasd', 'asdasdasdasd', 12312123.00, 'Catalogos/KVC/bolsos/recursos/prueba-KVC.webp', 'Catalogos/KVC/bolsos/down/prueba-KVC.pdf', '277skGbq', 'activo', 'mostrar');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `productosub`
--

CREATE TABLE `productosub` (
  `id` int(11) NOT NULL,
  `nombreSub` varchar(255) DEFAULT NULL,
  `descripcionSub` text DEFAULT NULL,
  `precioSub` decimal(10,2) DEFAULT NULL,
  `tamaño` varchar(50) DEFAULT NULL,
  `Especificaciones` text DEFAULT NULL,
  `categoriaSub` varchar(255) DEFAULT NULL,
  `materialesSub` varchar(255) DEFAULT NULL,
  `Galeria` varchar(255) DEFAULT NULL,
  `activo` varchar(12) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish_ci;

--
-- Volcado de datos para la tabla `productosub`
--

INSERT INTO `productosub` (`id`, `nombreSub`, `descripcionSub`, `precioSub`, `tamaño`, `Especificaciones`, `categoriaSub`, `materialesSub`, `Galeria`, `activo`) VALUES
(14, 'meloow', 'asd', 123.00, 'S', 'asd', 'Llaveros', 'Vinil', 'Catalogos/KVS/Recursos/meloow-KVS.webp', 'activo'),
(18, 'asasdasdq', 'asdsaasd', 12.00, 'S', 'asdas', 'Llaveros', 'Vinil', 'Catalogos/KVS/Recursos/asasdasdq-KVS.png', 'activo'),
(19, 'qwerty', 'dfdfsdfsd', 34234432.00, 'S', 'ddfssdf', 'Stickers', 'Sublimable', 'Catalogos/KVS/Recursos/qwerty-KVS.jpg', 'activo');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `redes`
--

CREATE TABLE `redes` (
  `id` int(11) NOT NULL,
  `nombreRS` varchar(255) DEFAULT NULL,
  `pagina` varchar(255) DEFAULT NULL,
  `enlace` varchar(255) DEFAULT NULL,
  `logoRS` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish_ci;

--
-- Volcado de datos para la tabla `redes`
--

INSERT INTO `redes` (`id`, `nombreRS`, `pagina`, `enlace`, `logoRS`) VALUES
(52, 'whatsapp', 'Estudiante', 'https://whatsapp.com', 'whatsappKVS.webp'),
(55, 'instagram', 'KV Tejido', 'https://whatsapp.com', 'instagramKVC.webp'),
(56, 'instagram', 'KV Sublimación', 'https://whatsapp.com', 'instagramKVS.webp');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `roles`
--

CREATE TABLE `roles` (
  `rol` varchar(32) NOT NULL,
  `acceso` varchar(32) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish_ci;

--
-- Volcado de datos para la tabla `roles`
--

INSERT INTO `roles` (`rol`, `acceso`) VALUES
('admin', 'Admin.0624'),
('amigurumis', 'Amig.0424'),
('bolsos', 'Bols.0324'),
('crochet', 'Croc.0224');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `rutapagina`
--

CREATE TABLE `rutapagina` (
  `id` int(11) NOT NULL,
  `nombrePagina` varchar(255) NOT NULL,
  `rutaRecursos` varchar(255) NOT NULL,
  `rutaIconBack` varchar(255) NOT NULL,
  `rutaDescargas` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish_ci;

--
-- Volcado de datos para la tabla `rutapagina`
--

INSERT INTO `rutapagina` (`id`, `nombrePagina`, `rutaRecursos`, `rutaIconBack`, `rutaDescargas`) VALUES
(1, 'estudiante', 'estudiante/Recursos', 'estudiante/iconBack', 'estudiante/Down'),
(2, 'catalogos', 'catalogos/recursos', 'catalogos/iconback', 'catalogos/Down'),
(3, 'Amigurumis', 'catalogos/KVC/a/recursos', 'catalogos/KVC/a/iconback', 'catalogos/KVC/a/down'),
(4, 'Bordados', 'catalogos/KVC/b/recursos', 'catalogos/KVC/b/iconback', 'catalogos/KVC/b/down'),
(5, 'Bolsos', 'catalogos/KVC/c/recursos', 'catalogos/KVC/c/iconback', 'catalogos/KVC/c/down'),
(6, 'KV Sublimación', 'catalogos/KVS/Recursos', 'catalogos/KVS/iconBack', 'catalogos/KVS/Down'),
(7, 'KV Tejido', 'catalogos/KVC/Recursos', 'catalogos/KVC/iconBack', 'catalogos/KVC/Down');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tamañomaterialsub`
--

CREATE TABLE `tamañomaterialsub` (
  `id` int(11) NOT NULL,
  `Tamaño` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish_ci;

--
-- Volcado de datos para la tabla `tamañomaterialsub`
--

INSERT INTO `tamañomaterialsub` (`id`, `Tamaño`) VALUES
(1, 'S'),
(2, 'M'),
(3, 'L'),
(4, 'XL'),
(5, 'Otro');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE `usuarios` (
  `id` int(11) NOT NULL,
  `usuario` varchar(16) NOT NULL,
  `nombre` varchar(32) NOT NULL,
  `apellido` varchar(32) NOT NULL,
  `contraseña` varchar(150) DEFAULT NULL,
  `rol` varchar(32) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish_ci;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`id`, `usuario`, `nombre`, `apellido`, `contraseña`, `rol`) VALUES
(16, 'Patitow', 'Keisy Valeria', 'Castillo Flores', '$2y$10$5.jDw85Iw5e90tAz2qgjDuXHySuNkzU7b05m5Av4pfBllfrnX4sXC', 'bolsos'),
(19, 'Patitowa', 'Keisy Valeria', 'Castillo Flores', '$2y$10$iWlgZ9bZLinPqdj2f7H7HudKa6qBtBrXPexdbFNZmOo6EXi4g3/Gq', 'admin'),
(21, 'dedomalo', 'Carlos', 'ardon', '$2y$10$IOlUIxktgmg5OD.FUrYZsO1A6e6QOnPhIVV9LUEFO51IdONeO34D2', 'admin');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `categoriassub`
--
ALTER TABLE `categoriassub`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `fondopagina`
--
ALTER TABLE `fondopagina`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `iconopagina`
--
ALTER TABLE `iconopagina`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `logopagina`
--
ALTER TABLE `logopagina`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `materialessub`
--
ALTER TABLE `materialessub`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `pagina`
--
ALTER TABLE `pagina`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `productostej`
--
ALTER TABLE `productostej`
  ADD PRIMARY KEY (`Id`);

--
-- Indices de la tabla `productosub`
--
ALTER TABLE `productosub`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `redes`
--
ALTER TABLE `redes`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`rol`);

--
-- Indices de la tabla `rutapagina`
--
ALTER TABLE `rutapagina`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `tamañomaterialsub`
--
ALTER TABLE `tamañomaterialsub`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`id`),
  ADD KEY `rol` (`rol`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `categoriassub`
--
ALTER TABLE `categoriassub`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT de la tabla `fondopagina`
--
ALTER TABLE `fondopagina`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `iconopagina`
--
ALTER TABLE `iconopagina`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `logopagina`
--
ALTER TABLE `logopagina`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `materialessub`
--
ALTER TABLE `materialessub`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `pagina`
--
ALTER TABLE `pagina`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT de la tabla `productostej`
--
ALTER TABLE `productostej`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT de la tabla `productosub`
--
ALTER TABLE `productosub`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT de la tabla `redes`
--
ALTER TABLE `redes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=57;

--
-- AUTO_INCREMENT de la tabla `rutapagina`
--
ALTER TABLE `rutapagina`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT de la tabla `tamañomaterialsub`
--
ALTER TABLE `tamañomaterialsub`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD CONSTRAINT `usuarios_ibfk_1` FOREIGN KEY (`rol`) REFERENCES `roles` (`rol`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
