-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 23-06-2025 a las 21:55:18
-- Versión del servidor: 10.4.32-MariaDB
-- Versión de PHP: 8.1.25

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `gonzalez_elena`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `perfiles`
--
-- Creación: 18-06-2025 a las 12:27:21
--

CREATE TABLE `perfiles` (
  `id_perfil` int(11) NOT NULL,
  `descripcion` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- RELACIONES PARA LA TABLA `perfiles`:
--

--
-- Volcado de datos para la tabla `perfiles`
--

INSERT INTO `perfiles` (`id_perfil`, `descripcion`) VALUES
(1, 'admin'),
(2, 'cliente');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `reservas`
--
-- Creación: 18-06-2025 a las 12:27:21
-- Última actualización: 23-06-2025 a las 18:54:51
--

CREATE TABLE `reservas` (
  `id_reserva` int(11) NOT NULL,
  `id_servicio` int(11) NOT NULL,
  `id_usuario` int(11) NOT NULL,
  `fecha` date NOT NULL DEFAULT current_timestamp(),
  `origen` varchar(50) NOT NULL,
  `comentario` text DEFAULT NULL,
  `calificacion` int(2) NOT NULL DEFAULT 0,
  `cantidad_asientos` int(3) NOT NULL,
  `total` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- RELACIONES PARA LA TABLA `reservas`:
--   `id_servicio`
--       `servicios` -> `id_servicio`
--   `id_usuario`
--       `usuarios` -> `id_usuario`
--

--
-- Volcado de datos para la tabla `reservas`
--

INSERT INTO `reservas` (`id_reserva`, `id_servicio`, `id_usuario`, `fecha`, `origen`, `comentario`, `calificacion`, `cantidad_asientos`, `total`) VALUES
(1, 1, 1, '2025-03-15', 'bajada del puente', 'No conocía las playas y quedé encantada!! Amé el servicio', 5, 3, 45000),
(2, 4, 1, '2025-06-07', 'bajada del puente', 'Participamos del paseo a Itati con mi familia. Bendiciones para el equipo, gran trabajo!!', 5, 3, 120000),
(3, 2, 2, '2025-06-08', 'bajada del puente', 'Me encanta la naturaleza, por eso elegí conocer los Esteros del Iberá. Quedé facinada!!', 5, 1, 100000),
(4, 3, 3, '2025-06-08', 'bajada del puente', 'Fui a Empedrado. Agradezco la puntualidad y profesionalismo del equipo', 4, 2, 100000),
(5, 3, 2, '2025-06-22', 'bajada del puente', 'Me encanto conocer Empedrado. Tiene un paisaje unico!!    ', 5, 2, 100000),
(6, 2, 6, '2025-06-22', 'bajada del puente', '            Me llegaron buenos comentarios del paseo. Feliz de ir!!', 5, 2, 200000),
(7, 3, 7, '2025-06-14', 'bajada del puente', 'Me gusto mucho el paseo. Volvere a contratarlo el mes que viene       ', 5, 2, 100000),
(8, 4, 6, '2025-06-29', 'bajada del puente', 'Participamos del paseo a Itati con un grupo de amigos. Quedamos super satisfechos!!          ', 5, 1, 40000),
(9, 2, 8, '2025-06-29', 'bajada del puente', ' Me encanto hacer este viaje. Super recomendable!!           ', 5, 3, 300000),
(10, 1, 7, '2025-06-15', 'bajada del puente', NULL, 0, 1, 15000),
(11, 1, 8, '2025-06-14', 'bajada del puente', NULL, 0, 1, 15000),
(12, 2, 4, '2025-06-22', 'bajada del puente', NULL, 0, 2, 200000),
(13, 5, 7, '2024-12-21', 'Bajada del puente', NULL, 0, 3, 150000),
(14, 3, 9, '2025-06-29', 'Bajada del puente', NULL, 0, 1, 50000),
(15, 3, 1, '2025-06-29', 'bajada del puente', 'Muy lindo todo. Muchas gracias', 5, 2, 100000),
(16, 2, 11, '2025-06-29', 'Bajada del puente', NULL, 0, 1, 100000),
(17, 3, 1, '2025-06-29', 'Bajada del puente', NULL, 0, 1, 50000),
(18, 3, 2, '2025-06-28', 'bajada del puente', 'Me gusto la experiencia', 5, 2, 100000);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `servicios`
--
-- Creación: 20-06-2025 a las 19:12:11
-- Última actualización: 23-06-2025 a las 18:42:34
--

CREATE TABLE `servicios` (
  `id_servicio` int(11) NOT NULL,
  `titulo` varchar(50) NOT NULL,
  `descripcion` text NOT NULL,
  `precio` float NOT NULL,
  `iframe` varchar(500) NOT NULL,
  `baja` varchar(2) CHARACTER SET utf8 COLLATE utf8_general_ci DEFAULT 'NO'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- RELACIONES PARA LA TABLA `servicios`:
--

--
-- Volcado de datos para la tabla `servicios`
--

INSERT INTO `servicios` (`id_servicio`, `titulo`, `descripcion`, `precio`, `iframe`, `baja`) VALUES
(1, 'Playas Doradas', 'En este paseo, te llevamos a conocer las mejores playas de Corrientes\r\nCondiciones del Paseo: \r\nTe pasamos a recoger de tu hotel o del aeropuerto y recorremos de toda la costanera de la ciudad, pasando por diversos sitios de interés\r\nBajamos a conocer la Playa Islas Malvinas II - Permanecemos en la misma 1h\r\nContinuamos nuestro recorrido para conocer la Playa Islas Malvinas -  Permanecemos en la misma 1h\r\nFinalmente bajamos a conocer la Playa Arazati - Permanecemos en la misma 2h\r\nRetornamos a tu lugar de partida, habiendo pasado un día inolvidable                                                                           ', 15000, '<iframe src=\"https://www.youtube.com/embed/fQdyioHAXTo?si=rjoZcQHP9YrwSn22\" title=\"YouTube video player\" frameborder=\"0\" allow=\"accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share\" referrerpolicy=\"strict-origin-when-cross-origin\" allowfullscreen></iframe>                                                ', 'NO'),
(2, 'Esteros del Iberá', 'El Parque Iberá o “Agua Brillante” en guaraní, es un lugar de ensueños ubicado en el corazón de la Provincia. Los antiguos cauces del Río Paraná forman una compleja red de humedales, bañados, esteros, lagunas, embalsados y cursos de origen pluvial.\r\nCondiciones del Paseo:\r\nTe pasamos a recoger de tu hotel o del aeropuerto y nos dirigimos a Los Esteros\r\nPasamos al alojamiento a dejar equipaje y seguimos camino a la reserva\r\nContinuamos nuestro recorrido, para hacer avistaje de la flora y fauna local\r\nFinalmente retornamos al hotel para cenar y pasar la noche\r\nAl día siguiente, retornamos a tu lugar de partida, habiendo pasado un día inolvidable                                                                                                    ', 100000, '<iframe src=\"https://www.youtube.com/embed/HYftsexyblE?si=NslkH36Cy48wYVRJ\" title=\"YouTube video player\" frameborder=\"0\" allow=\"accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share\" referrerpolicy=\"strict-origin-when-cross-origin\" allowfullscreen></iframe>                                                                ', 'NO'),
(3, 'Empedrado, la Perla del Paraná', 'Las emblemáticas barrancas de empedrado son el escenario de visita obligatoria cuando se llega a “La perla del Paraná”.\r\nCondiciones del Paseo:\r\nTe pasamos a recoger de tu hotel o del aeropuerto y nos dirigimos a la localidad de Empedrado.\r\nAl llegar a La Perla del Paraná, recorremos sus principales atractivos.\r\nSeguidamente nos acercamos a las barrancas, para conocer su imponente vista.\r\nNos quedamos 3 hs en el lugar, para que puedas conocer los alrededores y degustar comídas típicas.\r\nA las 15hs, retornamos a tu lugar de partida, habiendo pasado un día inolvidable                         ', 50000, '<iframe src=\"https://www.youtube.com/embed/CcofJK5w7vY?si=zU90KeOQNKQ-TBp9\" title=\"YouTube video player\" frameborder=\"0\" allow=\"accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share\" referrerpolicy=\"strict-origin-when-cross-origin\" allowfullscreen></iframe>                ', 'NO'),
(4, 'Visitar la Basílica de Itati', 'Miles de fieles de distintos lugares por año recorren en peregrinación, a pie, caballo y carreta, día y noche para llegar cada 16 de Julio a la Basílica de Itatí, día en que se conmemora la coronación de la Virgen.\r\nCondiciones del Paseo:\r\nTe pasamos a recoger de tu hotel o del aeropuerto y nos dirigimos a la clasa de la Virgen Morena.\r\nAl llegar a Itati, recorremos la casa del peregrino\r\nSeguidamente nos acercamos al templo para participar de la sagrada misa\r\nNos quedamos 3 hs en el lugar, para que puedas conocer los alrededores y degustar comídas típicas\r\nA las 15hs, retornamos a tu lugar de partida, habiendo pasado un día inolvidable', 40000, '<iframe src=\"https://www.youtube.com/embed/aAJFGCXvWag?si=2LUhlN8-kkZJVptB\" title=\"YouTube video player\" frameborder=\"0\" allow=\"accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share\" referrerpolicy=\"strict-origin-when-cross-origin\" allowfullscreen></iframe>', 'NO'),
(5, 'Carnavales Correntinos', 'Los carnavales de Corrientes son un evento turístico importante que atrae a muchos visitantes cada año, ofreciendo espectáculos de comparsas, desfiles y actividades relacionadas con el carnaval en diferentes localidades de la provincia. \r\nLa fiesta se celebra con desfiles en el corsódromo, shows de comparsas, y carnavales barriales en distintos barrios de la ciudad de Corrientes, además de otras localidades de la provincia. \r\n\r\nCondiciones del Paseo:\r\nTe pasamos a recoger de tu hotel o del aeropuerto y recorremos la ciudad, pasando por diversos sitios de interés.\r\nEste paseo incluye translados al corsodromo, entrada para palcos privilegiados, refrigerio a bordo.\r\nAl finalizar el evento, te llevamos a tu hotel o lugar que nos indiques.                                                                                        ', 50000, '<iframe src=\"https://www.youtube.com/embed/Ln-acKacgsU?si=tU5yGoTLYIlv-xt6\" title=\"YouTube video player\" frameborder=\"0\" allow=\"accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share\" referrerpolicy=\"strict-origin-when-cross-origin\" allowfullscreen></iframe>                                              ', 'NO'),
(6, 'Laguna Totora - San Cosme', 'Laguna Totora es un exelente paseo de un dia. A pocos kms de la Ciudad de Corrientes, podes pasar un dia fantastico en familia o con amigos.\r\n\r\nCondiciones del Paseo:\r\nTe pasamos a recoger de tu hotel o del aeropuerto y nos dirigimos a la localidad de Empedrado.\r\nAl llegar a San Cosme, recorremos sus principales atractivos.\r\nSeguidamente nos acercamos al complejo Laguna Totora, para conocer su imponente vista.\r\nNos quedamos 3 hs en el lugar, para que puedas conocer los alrededores y degustar comídas típicas.\r\nA las 15hs, retornamos a tu lugar de partida, habiendo pasado un día inolvidable.                                                                                              ', 25000, '<iframe src=\"https://www.youtube.com/embed/-3um4_S95gU?si=ckQKATs_fi5d1CTN\" title=\"YouTube video player\" frameborder=\"0\" allow=\"accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share\" referrerpolicy=\"strict-origin-when-cross-origin\" allowfullscreen></iframe>            ', 'NO'),
(7, 'Paso de la Patria', 'Paso de la Patria, comúnmente conocida como “El Paso” es una Villa Turística de la provincia argentina de Corrientes, ubicada a unos 35 kilómetros de la capital provincial.\r\n\r\nEs uno de los principales destinos turísticos del nordeste argentino. Abrazada por el imponente Río Paraná y custodiada por el gran pez dorado o “pirayú” esconde un sin ﬁn de bellezas naturales aguardando a ser descubiertas por quienes la visiten\r\n\r\nCondiciones del Servicio:\r\n* Te pasamos a recoger de tu hotel o del aeropuerto y nos dirigimos a Paso de la Patria\r\n* Continuamos nuestro recorrido, para hacer avistaje de la flora y fauna local\r\n* Finalmente nos dirigimos a sus imponentes playas, para pasar un dia maravilloso\r\nLuego de 4hs, retornamos a tu lugar de partida, habiendo pasado un día inolvidable                                                                                       ', 40000, '<iframe src=\"https://www.youtube.com/embed/QKYlKW5SFzA?si=cp1g0MVUq8_dblku\" title=\"YouTube video player\" frameborder=\"0\" allow=\"accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share\" referrerpolicy=\"strict-origin-when-cross-origin\" allowfullscreen></iframe>    ', 'SI');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--
-- Creación: 18-06-2025 a las 12:27:21
-- Última actualización: 23-06-2025 a las 18:41:02
--

CREATE TABLE `usuarios` (
  `id_usuario` int(11) NOT NULL,
  `nombre` varchar(50) NOT NULL,
  `apellido` varchar(50) NOT NULL,
  `usuario` varchar(20) NOT NULL,
  `email` varchar(100) NOT NULL,
  `pass` varchar(100) NOT NULL,
  `id_perfil` int(11) NOT NULL DEFAULT 2,
  `baja` varchar(2) NOT NULL DEFAULT 'NO'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- RELACIONES PARA LA TABLA `usuarios`:
--   `id_perfil`
--       `perfiles` -> `id_perfil`
--

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`id_usuario`, `nombre`, `apellido`, `usuario`, `email`, `pass`, `id_perfil`, `baja`) VALUES
(1, 'Elenas', 'Gonzalez', '', 'ele@gmail.com', '$2y$10$E7I7j9CpP3YuoTNPwKPWF.fg1EyVlkFJ0K2jVB/UnGS6N.rKkKswu', 2, 'NO'),
(2, 'Maia', 'Rolando', '', 'maia@gmail.com', '$2y$10$o3u8TRfgx7eQab2LWIhrtObqbjuEVjQmTBiTNgcv5ollaW9lOnMlO', 2, 'NO'),
(3, 'Mauro', 'Zarate', 'mauro', 'mauro@gmail.com', '$2y$10$7o87R7Z7coto9R5izJDSleoLAEW5cNQ6sno47R4Zs6aSyWmKbrEkO', 2, 'SI'),
(4, 'Enrique', 'Martinez Diaz', 'enrique', 'enrique@gmail.com', '$2y$10$2zPlYJgprHtCJouea2AdpOXAVu.QF9zv9n4rqC/sS9uQKoOb7q0XW', 2, 'NO'),
(5, 'Sebastian', 'Roland', 'seba', 'seba@gmail.com', '$2y$10$WKvNem/QIF74EoUAw6HgwO8ooAbRlBKZvTAsVvrcfMNPHcEzU6JJ2', 1, 'NO'),
(6, 'Pia', 'Recalde', 'pia', 'pia@gmail.com', '$2y$10$9h0hu2SI6gldqVhlff6IgesL4YgO6xUIKUEfqBAOdV5jCmqJkZkWe', 2, 'NO'),
(7, 'Ricardo Agustin', 'Rojas', 'ricardo', 'ricardo@gmail.com', '$2y$10$L7MJXlqJRALxrMTh5OB80euvYDvo4nO4ilVpeHHlpwS32PEB5WJp6', 2, 'NO'),
(8, 'Pedro', 'Recalde', 'pedro', 'pedro@gmail.com', '$2y$10$VTlwY.orduH5T4VLUOrXL.zoLS1yNzhjmZc3pqZVGYhtfyXzb1tO2', 2, 'NO'),
(9, 'Beatriz Lara', 'Gonzalez', '', 'beatriz@gmail.com', '$2y$10$hkAl3uS3Jdls0juSMD9zaexpy9EHsXKIgJ.LqzvxhTME6NGEkEXbm', 2, 'NO'),
(10, 'Antonio', 'Lopez a', '', 'antonio@gmail.com', '$2y$10$i7LRACNa4hI166Hjd8QjsOPTtlLCkEBRIhFtap9GwMcQnCQi8vyk2', 2, 'NO'),
(11, 'Mia', 'Rolando', '', 'mias@gmail.com', '$2y$10$ltgLTNlWx.eog5U1CThEM.JdoAaKtaOZKiRQFHyS8KIMICgd2PYSi', 2, 'NO');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `perfiles`
--
ALTER TABLE `perfiles`
  ADD PRIMARY KEY (`id_perfil`);

--
-- Indices de la tabla `reservas`
--
ALTER TABLE `reservas`
  ADD PRIMARY KEY (`id_reserva`),
  ADD KEY `id_servicio` (`id_servicio`),
  ADD KEY `id_usuario` (`id_usuario`);

--
-- Indices de la tabla `servicios`
--
ALTER TABLE `servicios`
  ADD PRIMARY KEY (`id_servicio`);

--
-- Indices de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`id_usuario`),
  ADD KEY `id_perfil` (`id_perfil`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `perfiles`
--
ALTER TABLE `perfiles`
  MODIFY `id_perfil` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `reservas`
--
ALTER TABLE `reservas`
  MODIFY `id_reserva` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT de la tabla `servicios`
--
ALTER TABLE `servicios`
  MODIFY `id_servicio` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id_usuario` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `reservas`
--
ALTER TABLE `reservas`
  ADD CONSTRAINT `reservas_ibfk_1` FOREIGN KEY (`id_servicio`) REFERENCES `servicios` (`id_servicio`),
  ADD CONSTRAINT `reservas_ibfk_2` FOREIGN KEY (`id_usuario`) REFERENCES `usuarios` (`id_usuario`);

--
-- Filtros para la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD CONSTRAINT `usuarios_ibfk_1` FOREIGN KEY (`id_perfil`) REFERENCES `perfiles` (`id_perfil`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
