-- phpMyAdmin SQL Dump
-- version 4.9.2
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 01-02-2020 a las 04:33:40
-- Versión del servidor: 10.4.11-MariaDB
-- Versión de PHP: 7.2.26

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `dipesca`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `anexo4`
--

CREATE TABLE `anexo4` (
  `id` int(11) NOT NULL,
  `fecha_sistema` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `captura_transformada` int(11) NOT NULL,
  `prod_pesca_transf` int(11) NOT NULL,
  `Contenedor_numero` int(11) NOT NULL,
  `id_empresa` int(11) NOT NULL,
  `id_embarcacion` int(11) NOT NULL,
  `id_usuario` int(11) NOT NULL,
  `id_certificado` int(11) NOT NULL,
  `id_especie` int(11) NOT NULL,
  `Adjunto` longblob NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Disparadores `anexo4`
--
DELIMITER $$
CREATE TRIGGER `Actualiza` AFTER INSERT ON `anexo4` FOR EACH ROW UPDATE certificado_captura, anexo4 SET disponible = disponible - captura_transformada where anexo4.id = (SELECT MAX(id) FROM anexo4)
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `arte_pesca`
--

CREATE TABLE `arte_pesca` (
  `id` int(11) NOT NULL,
  `nombre_arte` varchar(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `arte_pesca`
--

INSERT INTO `arte_pesca` (`id`, `nombre_arte`) VALUES
(1, 'Anzuelo'),
(2, 'Red');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `certificado_captura`
--

CREATE TABLE `certificado_captura` (
  `id` int(11) NOT NULL,
  `fecha_validacion` date NOT NULL,
  `fecha_sistema` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `id_embarcacion` int(11) NOT NULL,
  `codigo_certificado` varchar(30) NOT NULL,
  `peso_total_desemb` int(11) NOT NULL,
  `peso_ingreso_planta` int(11) NOT NULL,
  `disponible` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cert_sanitario`
--

CREATE TABLE `cert_sanitario` (
  `id` int(11) NOT NULL,
  `referencia` varchar(30) DEFAULT NULL,
  `codigo` varchar(30) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `detalle_embarcacion`
--

CREATE TABLE `detalle_embarcacion` (
  `id` int(11) NOT NULL,
  `id_embarcacion` int(11) NOT NULL,
  `id_arte` int(11) NOT NULL,
  `id_tecnica` int(11) NOT NULL,
  `id_marca` int(11) NOT NULL,
  `material` varchar(50) NOT NULL,
  `color` varchar(50) NOT NULL,
  `motor` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `embarcacion`
--

CREATE TABLE `embarcacion` (
  `id` int(11) NOT NULL,
  `nombre_embarcacion` varchar(50) NOT NULL,
  `modelo` varchar(30) NOT NULL,
  `bandera` varchar(30) NOT NULL,
  `id_tipo` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `embarcacion`
--

INSERT INTO `embarcacion` (`id`, `nombre_embarcacion`, `modelo`, `bandera`, `id_tipo`) VALUES
(4, 'Tarpon', '2004', 'Argentina', 2),
(5, 'Negrita', '2006', 'Guatemala', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `empresa`
--

CREATE TABLE `empresa` (
  `id` int(11) NOT NULL,
  `nombre` varchar(50) DEFAULT NULL,
  `nit` varchar(20) DEFAULT NULL,
  `email` varchar(30) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `empresa`
--

INSERT INTO `empresa` (`id`, `nombre`, `nit`, `email`) VALUES
(2, 'Nova Guatemala .S.A', '12345678', 'Nguatemala@gmail.com');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `especie`
--

CREATE TABLE `especie` (
  `id` int(11) NOT NULL,
  `nombre_cientifico` varchar(50) DEFAULT NULL,
  `nombre_comun` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `estado`
--

CREATE TABLE `estado` (
  `id` int(11) NOT NULL,
  `nombre_estado` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `estado`
--

INSERT INTO `estado` (`id`, `nombre_estado`) VALUES
(1, 'impreso'),
(2, 'pendiente');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `genero`
--

CREATE TABLE `genero` (
  `id` int(11) NOT NULL,
  `Nombre_genero` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `genero`
--

INSERT INTO `genero` (`id`, `Nombre_genero`) VALUES
(1, 'Masculino'),
(2, 'Femenino'),
(3, 'No definido');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `litoral`
--

CREATE TABLE `litoral` (
  `id` int(11) NOT NULL,
  `nombre_litoral` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `litoral`
--

INSERT INTO `litoral` (`id`, `nombre_litoral`) VALUES
(1, 'Pacifio'),
(2, 'Atlantico'),
(3, 'Lago de Amatitlan, Guatemala'),
(4, 'Lago de Atitlan, Solola'),
(5, 'LAGUNA DEL PINO');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `lugar_pesca`
--

CREATE TABLE `lugar_pesca` (
  `id` int(11) NOT NULL,
  `nombre_lugar` varchar(30) NOT NULL,
  `id_litoral` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `lugar_pesca`
--

INSERT INTO `lugar_pesca` (`id`, `nombre_lugar`, `id_litoral`) VALUES
(1, 'Lago de Amatitlan, Guatemala', 1),
(2, 'Rio Motagua', 2),
(3, 'San Juan la Laguna', 2),
(4, 'Champerico', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `marca`
--

CREATE TABLE `marca` (
  `id` int(11) NOT NULL,
  `nombre_marca` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `marca`
--

INSERT INTO `marca` (`id`, `nombre_marca`) VALUES
(1, 'Honda'),
(2, 'Suzuki');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `registro_pesca`
--

CREATE TABLE `registro_pesca` (
  `id` int(11) NOT NULL,
  `id_usuario` int(11) NOT NULL,
  `id_embarcacion` int(11) DEFAULT NULL,
  `id_lugar` int(11) DEFAULT NULL,
  `fecha_sistema` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tecnica_pesca`
--

CREATE TABLE `tecnica_pesca` (
  `id` int(11) NOT NULL,
  `nombre_tecnica` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `tecnica_pesca`
--

INSERT INTO `tecnica_pesca` (`id`, `nombre_tecnica`) VALUES
(1, 'jigging '),
(2, 'carpfishing');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tipo`
--

CREATE TABLE `tipo` (
  `id` int(11) NOT NULL,
  `nombre_id` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `tipo`
--

INSERT INTO `tipo` (`id`, `nombre_id`) VALUES
(1, 'admin'),
(2, 'operador');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tipo_embarcacion`
--

CREATE TABLE `tipo_embarcacion` (
  `id` int(11) NOT NULL,
  `nombre_tipo` varchar(30) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `tipo_embarcacion`
--

INSERT INTO `tipo_embarcacion` (`id`, `nombre_tipo`) VALUES
(1, 'pesquera'),
(2, 'camaronera');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuario`
--

CREATE TABLE `usuario` (
  `id` int(11) NOT NULL,
  `primer_nombre` varchar(50) NOT NULL,
  `segundo_nombre` varchar(50) NOT NULL,
  `primer_apellido` varchar(30) NOT NULL,
  `segundo_apellido` varchar(30) NOT NULL,
  `identificacion` varchar(30) NOT NULL,
  `Concesion` varchar(30) NOT NULL,
  `domicilio` varchar(100) NOT NULL,
  `telefono_casa` varchar(30) NOT NULL,
  `id_tipo` int(11) NOT NULL,
  `correo_electronico` varchar(30) NOT NULL,
  `password` varchar(30) DEFAULT NULL,
  `id_estado` int(11) NOT NULL,
  `id_genero` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `usuario`
--

INSERT INTO `usuario` (`id`, `primer_nombre`, `segundo_nombre`, `primer_apellido`, `segundo_apellido`, `identificacion`, `Concesion`, `domicilio`, `telefono_casa`, `id_tipo`, `correo_electronico`, `password`, `id_estado`, `id_genero`) VALUES
(9, 'Yovany', 'Alejandro', 'Alvarez', 'Vasquez', '1244477888', 'N/A', 'Dipesca', '78896545', 2, 'Yovasquez', NULL, 1, 2),
(10, 'Alejandro ', 'Felipe', 'Arroyo', 'Gil', '1938 11952 0115', 'PPCA-2016-096', 'Colonia Mariposa ', '245677', 2, 'Ecolindres@gmail.com', '123', 1, 1),
(15, 'Julio', 'Emilio', 'Lemus', 'Tejeda', '12314567496', 'N/A', 'MIS HUEVOS', '12346578', 1, 'JJuarez@micorreo.com', NULL, 2, 1);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `anexo4`
--
ALTER TABLE `anexo4`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_cert_c` (`id_certificado`);

--
-- Indices de la tabla `arte_pesca`
--
ALTER TABLE `arte_pesca`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `certificado_captura`
--
ALTER TABLE `certificado_captura`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_Emb` (`id_embarcacion`);

--
-- Indices de la tabla `cert_sanitario`
--
ALTER TABLE `cert_sanitario`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `detalle_embarcacion`
--
ALTER TABLE `detalle_embarcacion`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_idDetArte` (`id_arte`),
  ADD KEY `fk_idDetEmb` (`id_embarcacion`),
  ADD KEY `fk_idDetMarca` (`id_marca`),
  ADD KEY `fk_idDetTecnica` (`id_tecnica`);

--
-- Indices de la tabla `embarcacion`
--
ALTER TABLE `embarcacion`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_tipo` (`id_tipo`);

--
-- Indices de la tabla `empresa`
--
ALTER TABLE `empresa`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `especie`
--
ALTER TABLE `especie`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `estado`
--
ALTER TABLE `estado`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `genero`
--
ALTER TABLE `genero`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `litoral`
--
ALTER TABLE `litoral`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `lugar_pesca`
--
ALTER TABLE `lugar_pesca`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_idLugLit` (`id_litoral`);

--
-- Indices de la tabla `marca`
--
ALTER TABLE `marca`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `registro_pesca`
--
ALTER TABLE `registro_pesca`
  ADD PRIMARY KEY (`id`),
  ADD KEY `pf_puser` (`id_usuario`),
  ADD KEY `pf_pemb` (`id_embarcacion`),
  ADD KEY `pf_plugar` (`id_lugar`);

--
-- Indices de la tabla `tecnica_pesca`
--
ALTER TABLE `tecnica_pesca`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `tipo`
--
ALTER TABLE `tipo`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `tipo_embarcacion`
--
ALTER TABLE `tipo_embarcacion`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `usuario`
--
ALTER TABLE `usuario`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_estado` (`id_estado`),
  ADD KEY `fk_tipo` (`id_tipo`),
  ADD KEY `fk_genero` (`id_genero`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `anexo4`
--
ALTER TABLE `anexo4`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT de la tabla `arte_pesca`
--
ALTER TABLE `arte_pesca`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `certificado_captura`
--
ALTER TABLE `certificado_captura`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `cert_sanitario`
--
ALTER TABLE `cert_sanitario`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `detalle_embarcacion`
--
ALTER TABLE `detalle_embarcacion`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `embarcacion`
--
ALTER TABLE `embarcacion`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de la tabla `empresa`
--
ALTER TABLE `empresa`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `especie`
--
ALTER TABLE `especie`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `estado`
--
ALTER TABLE `estado`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `genero`
--
ALTER TABLE `genero`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `litoral`
--
ALTER TABLE `litoral`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de la tabla `lugar_pesca`
--
ALTER TABLE `lugar_pesca`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `marca`
--
ALTER TABLE `marca`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `registro_pesca`
--
ALTER TABLE `registro_pesca`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT de la tabla `tecnica_pesca`
--
ALTER TABLE `tecnica_pesca`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `tipo`
--
ALTER TABLE `tipo`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `tipo_embarcacion`
--
ALTER TABLE `tipo_embarcacion`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `usuario`
--
ALTER TABLE `usuario`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `anexo4`
--
ALTER TABLE `anexo4`
  ADD CONSTRAINT `fk_cert_c` FOREIGN KEY (`id_certificado`) REFERENCES `certificado_captura` (`id`);

--
-- Filtros para la tabla `certificado_captura`
--
ALTER TABLE `certificado_captura`
  ADD CONSTRAINT `fk_Emb` FOREIGN KEY (`id_embarcacion`) REFERENCES `embarcacion` (`id`);

--
-- Filtros para la tabla `detalle_embarcacion`
--
ALTER TABLE `detalle_embarcacion`
  ADD CONSTRAINT `fk_idDetArte` FOREIGN KEY (`id_arte`) REFERENCES `arte_pesca` (`id`),
  ADD CONSTRAINT `fk_idDetEmb` FOREIGN KEY (`id_embarcacion`) REFERENCES `embarcacion` (`id`),
  ADD CONSTRAINT `fk_idDetMarca` FOREIGN KEY (`id_marca`) REFERENCES `marca` (`id`),
  ADD CONSTRAINT `fk_idDetTecnica` FOREIGN KEY (`id_tecnica`) REFERENCES `tecnica_pesca` (`id`);

--
-- Filtros para la tabla `embarcacion`
--
ALTER TABLE `embarcacion`
  ADD CONSTRAINT `embarcacion_ibfk_1` FOREIGN KEY (`id_tipo`) REFERENCES `tipo_embarcacion` (`id`);

--
-- Filtros para la tabla `lugar_pesca`
--
ALTER TABLE `lugar_pesca`
  ADD CONSTRAINT `fk_idLugLit` FOREIGN KEY (`id_litoral`) REFERENCES `litoral` (`id`);

--
-- Filtros para la tabla `registro_pesca`
--
ALTER TABLE `registro_pesca`
  ADD CONSTRAINT `pf_pemb` FOREIGN KEY (`id_embarcacion`) REFERENCES `embarcacion` (`id`),
  ADD CONSTRAINT `pf_plugar` FOREIGN KEY (`id_lugar`) REFERENCES `lugar_pesca` (`id`),
  ADD CONSTRAINT `pf_puser` FOREIGN KEY (`id_usuario`) REFERENCES `usuario` (`id`);

--
-- Filtros para la tabla `usuario`
--
ALTER TABLE `usuario`
  ADD CONSTRAINT `fk_estado` FOREIGN KEY (`id_estado`) REFERENCES `estado` (`id`),
  ADD CONSTRAINT `fk_genero` FOREIGN KEY (`id_genero`) REFERENCES `genero` (`id`),
  ADD CONSTRAINT `fk_tipo` FOREIGN KEY (`id_tipo`) REFERENCES `tipo` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
