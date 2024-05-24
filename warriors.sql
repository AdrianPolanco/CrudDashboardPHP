-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1:3306
-- Tiempo de generación: 24-05-2024 a las 22:38:13
-- Versión del servidor: 8.3.0
-- Versión de PHP: 8.2.18

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `warriors`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `habilidades`
--

DROP TABLE IF EXISTS `habilidades`;
CREATE TABLE IF NOT EXISTS `habilidades` (
  `id` int NOT NULL AUTO_INCREMENT,
  `nombre_habilidad` varchar(255) NOT NULL,
  `tipo_habilidad_id` int DEFAULT NULL,
  `nivel_poder` decimal(5,2) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `tipo_habilidad_id` (`tipo_habilidad_id`)
) ;

--
-- Volcado de datos para la tabla `habilidades`
--

INSERT INTO `habilidades` (`id`, `nombre_habilidad`, `tipo_habilidad_id`, `nivel_poder`) VALUES
(1, 'KaiokenXYZ', 1, 19.00),
(2, 'Kamehameha', 3, 50.00),
(8, 'Rayo de la muerte', 3, 95.00),
(7, 'Masenko', 3, 55.00),
(6, 'Ki', 1, 0.00),
(10, 'SSJ', 3, 100.00);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tipos_habilidades`
--

DROP TABLE IF EXISTS `tipos_habilidades`;
CREATE TABLE IF NOT EXISTS `tipos_habilidades` (
  `id` int NOT NULL AUTO_INCREMENT,
  `tipo_habilidad` varchar(70) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=8 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Volcado de datos para la tabla `tipos_habilidades`
--

INSERT INTO `tipos_habilidades` (`id`, `tipo_habilidad`) VALUES
(1, 'Fisica'),
(2, 'Estrategica'),
(3, 'Energetica');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `warriors`
--

DROP TABLE IF EXISTS `warriors`;
CREATE TABLE IF NOT EXISTS `warriors` (
  `id` int NOT NULL AUTO_INCREMENT,
  `nombre` varchar(70) NOT NULL,
  `apellido` varchar(200) NOT NULL,
  `fecha_nacimiento` date NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=585 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Volcado de datos para la tabla `warriors`
--

INSERT INTO `warriors` (`id`, `nombre`, `apellido`, `fecha_nacimiento`) VALUES
(1, 'Adrian Saul', 'Polanco Ferrer', '1995-06-01'),
(584, 'Joe', 'Biden', '2024-05-03'),
(583, 'Joe', 'Biden', '2024-05-02'),
(582, 'Joe', 'Biden', '2024-05-02'),
(581, 'Barack', 'Obama', '2024-05-01'),
(580, 'Vladimir', 'Putin', '2024-02-09'),
(579, 'Erick', 'Himmler', '2024-03-08'),
(578, 'Joseph', 'Goebbels', '1966-06-10'),
(577, 'Herman', 'Goering', '2012-03-02'),
(575, 'Eiichiro', 'Ooda', '1990-07-05'),
(574, 'Guillermo', 'Rotestan', '2002-06-13'),
(573, 'Guillermo', 'Rotestan', '2002-06-13'),
(572, 'Guillermo', 'Rotestan', '2002-06-13'),
(571, 'Guillermo', 'Rotestan', '2002-06-13'),
(570, 'Guillermo', 'Rotestan', '2002-06-13'),
(569, 'Guillermo', 'Rotestan', '2002-06-13'),
(568, 'Guillermo', 'Rotestan', '2002-06-13'),
(567, 'Guillermo', 'Rotestan', '2002-06-13'),
(566, 'Guillermo', 'Rotestan', '2002-06-13'),
(565, 'Guillermo', 'Rotestan', '2002-06-13'),
(564, 'Guillermo', 'Rotestan', '2002-06-13'),
(563, 'Guillermo', 'Rotestan', '2002-06-13'),
(562, 'Guillermo', 'Rotestan', '2002-06-13'),
(561, 'Guillermo', 'Rotestan', '2002-06-13'),
(560, 'Guillermo', 'Rotestan', '2002-06-13'),
(559, 'Guillermo', 'Rotestan', '2002-06-13'),
(558, 'Guillermo', 'Rotestan', '2002-06-13'),
(557, 'Guillermo', 'Rotestan', '2002-06-13'),
(556, 'Guillermo', 'Rotestan', '2002-06-13'),
(555, 'Guillermo', 'Rotestan', '2002-06-13'),
(554, 'Guillermo', 'Rotestan', '2002-06-13'),
(553, 'Guillermo', 'Rotestan', '2002-06-13'),
(552, 'Guillermo', 'Rotestan', '2002-06-13'),
(551, 'Guillermo', 'Rotestan', '2002-06-13'),
(550, 'Guillermo', 'Rotestan', '2002-06-13'),
(549, 'Guillermo', 'Rotestan', '2002-06-13'),
(548, 'Guillermo', 'Rotestan', '2002-06-13'),
(547, 'Guillermo', 'Rotestan', '2002-06-13'),
(546, 'Guillermo', 'Rotestan', '2002-06-13'),
(545, 'Guillermo', 'Rotestan', '2002-06-13'),
(544, 'Guillermo', 'Rotestan', '2002-06-13'),
(543, 'Guillermo', 'Rotestan', '2002-06-13'),
(542, 'Guillermo', 'Rotestan', '2002-06-13'),
(541, 'Guillermo', 'Rotestan', '2002-06-13'),
(540, 'Guillermo', 'Rotestan', '2002-06-13'),
(539, 'Guillermo', 'Rotestan', '2002-06-13'),
(538, 'Guillermo', 'Rotestan', '2002-06-13'),
(537, 'Guillermo', 'Rotestan', '2002-06-13'),
(536, 'Guillermo', 'Rotestan', '2002-06-13'),
(535, 'Guillermo', 'Rotestan', '2002-06-13'),
(534, 'Guillermo', 'Rotestan', '2002-06-13'),
(533, 'Guillermo', 'Rotestan', '2002-06-13'),
(532, 'Guillermo', 'Rotestan', '2002-06-13'),
(531, 'Guillermo', 'Rotestan', '2002-06-13'),
(530, 'Guillermo', 'Rotestan', '2002-06-13'),
(529, 'Guillermo', 'Rotestan', '2002-06-13'),
(528, 'Guillermo', 'Rotestan', '2002-06-13'),
(527, 'Guillermo', 'Rotestan', '2002-06-13'),
(526, 'Guillermo', 'Rotestan', '2002-06-13'),
(525, 'Guillermo', 'Rotestan', '2002-06-13'),
(524, 'Guillermo', 'Rotestan', '2002-06-13'),
(523, 'Guillermo', 'Rotestan', '2002-06-13'),
(522, 'Guillermo', 'Rotestan', '2002-06-13'),
(521, 'Guillermo', 'Rotestan', '2002-06-13'),
(520, 'Guillermo', 'Rotestan', '2002-06-13'),
(519, 'Guillermo', 'Rotestan', '2002-06-13'),
(518, 'Guillermo', 'Rotestan', '2002-06-13'),
(517, 'Guillermo', 'Rotestan', '2002-06-13'),
(516, 'Guillermo', 'Rotestan', '2002-06-13'),
(515, 'Guillermo', 'Rotestan', '2002-06-13'),
(514, 'Guillermo', 'Rotestan', '2002-06-13'),
(513, 'Guillermo', 'Rotestan', '2002-06-13'),
(512, 'Guillermo', 'Rotestan', '2002-06-13'),
(511, 'Guillermo', 'Rotestan', '2002-06-13'),
(510, 'Guillermo', 'Rotestan', '2002-06-13'),
(509, 'Guillermo', 'Rotestan', '2002-06-13'),
(508, 'Guillermo', 'Rotestan', '2002-06-13'),
(507, 'Guillermo', 'Rotestan', '2002-06-13'),
(506, 'Guillermo', 'Rotestan', '2002-06-13'),
(505, 'Guillermo', 'Rotestan', '2002-06-13'),
(504, 'Guillermo', 'Rotestan', '2002-06-13'),
(503, 'Guillermo', 'Rotestan', '2002-06-13'),
(502, 'Guillermo', 'Rotestan', '2002-06-13'),
(501, 'Guillermo', 'Rotestan', '2002-06-13'),
(500, 'Guillermo', 'Rotestan', '2002-06-13'),
(499, 'Guillermo', 'Rotestan', '2002-06-13'),
(498, 'Guillermo', 'Rotestan', '2002-06-13'),
(497, 'Guillermo', 'Rotestan', '2002-06-13'),
(496, 'Guillermo', 'Rotestan', '2002-06-13'),
(495, 'Guillermo', 'Rotestan', '2002-06-13'),
(494, 'Guillermo', 'Rotestan', '2002-06-13'),
(493, 'Guillermo', 'Rotestan', '2002-06-13'),
(492, 'Guillermo', 'Rotestan', '2002-06-13'),
(491, 'Guillermo', 'Rotestan', '2002-06-13'),
(490, 'Guillermo', 'Rotestan', '2002-06-13'),
(489, 'Guillermo', 'Rotestan', '2002-06-13'),
(488, 'Guillermo', 'Rotestan', '2002-06-13'),
(487, 'Guillermo', 'Rotestan', '2002-06-13'),
(486, 'Guillermo', 'Rotestan', '2002-06-13'),
(485, 'Guillermo', 'Rotestan', '2002-06-13'),
(484, 'Guillermo', 'Rotestan', '2002-06-13'),
(483, 'Guillermo', 'Rotestan', '2002-06-13'),
(482, 'Guillermo', 'Rotestan', '2002-06-13'),
(481, 'Guillermo', 'Rotestan', '2002-06-13'),
(480, 'Guillermo', 'Rotestan', '2002-06-13'),
(479, 'Guillermo', 'Rotestan', '2002-06-13'),
(478, 'Guillermo', 'Rotestan', '2002-06-13'),
(477, 'Guillermo', 'Rotestan', '2002-06-13'),
(476, 'Guillermo', 'Rotestan', '2002-06-13'),
(475, 'Guillermo', 'Rotestan', '2002-06-13'),
(474, 'Guillermo', 'Rotestan', '2002-06-13'),
(473, 'Guillermo', 'Rotestan', '2002-06-13'),
(472, 'Guillermo', 'Rotestan', '2002-06-13'),
(471, 'Guillermo', 'Rotestan', '2002-06-13'),
(470, 'Guillermo', 'Rotestan', '2002-06-13'),
(469, 'Guillermo', 'Rotestan', '2002-06-13'),
(468, 'Guillermo', 'Rotestan', '2002-06-13'),
(467, 'Guillermo', 'Rotestan', '2002-06-13'),
(466, 'Guillermo', 'Rotestan', '2002-06-13'),
(465, 'Guillermo', 'Rotestan', '2002-06-13'),
(464, 'Guillermo', 'Rotestan', '2002-06-13'),
(463, 'Guillermo', 'Rotestan', '2002-06-13'),
(462, 'Guillermo', 'Rotestan', '2002-06-13'),
(461, 'Guillermo', 'Rotestan', '2002-06-13'),
(460, 'Guillermo', 'Rotestan', '2002-06-13'),
(459, 'Guillermo', 'Rotestan', '2002-06-13'),
(458, 'Guillermo', 'Rotestan', '2002-06-13'),
(457, 'Guillermo', 'Rotestan', '2002-06-13'),
(456, 'Guillermo', 'Rotestan', '2002-06-13'),
(455, 'Guillermo', 'Rotestan', '2002-06-13'),
(454, 'Guillermo', 'Rotestan', '2002-06-13'),
(453, 'Guillermo', 'Rotestan', '2002-06-13'),
(452, 'Guillermo', 'Rotestan', '2002-06-13'),
(451, 'Guillermo', 'Rotestan', '2002-06-13'),
(450, 'Guillermo', 'Rotestan', '2002-06-13'),
(449, 'Guillermo', 'Rotestan', '2002-06-13'),
(448, 'Guillermo', 'Rotestan', '2002-06-13'),
(447, 'Guillermo', 'Rotestan', '2002-06-13'),
(446, 'Guillermo', 'Rotestan', '2002-06-13'),
(445, 'Guillermo', 'Rotestan', '2002-06-13'),
(444, 'Guillermo', 'Rotestan', '2002-06-13'),
(443, 'Guillermo', 'Rotestan', '2002-06-13'),
(442, 'Guillermo', 'Rotestan', '2002-06-13'),
(441, 'Guillermo', 'Rotestan', '2002-06-13'),
(440, 'Guillermo', 'Rotestan', '2002-06-13'),
(439, 'Guillermo', 'Rotestan', '2002-06-13'),
(438, 'Guillermo', 'Rotestan', '2002-06-13'),
(437, 'Guillermo', 'Rotestan', '2002-06-13'),
(436, 'Guillermo', 'Rotestan', '2002-06-13'),
(435, 'Guillermo', 'Rotestan', '2002-06-13'),
(434, 'Guillermo', 'Rotestan', '2002-06-13'),
(433, 'Guillermo', 'Rotestan', '2002-06-13'),
(432, 'Guillermo', 'Rotestan', '2002-06-13'),
(431, 'Guillermo', 'Rotestan', '2002-06-13'),
(430, 'Guillermo', 'Rotestan', '2002-06-13'),
(429, 'Guillermo', 'Rotestan', '2002-06-13'),
(428, 'Guillermo', 'Rotestan', '2002-06-13'),
(427, 'Guillermo', 'Rotestan', '2002-06-13'),
(426, 'Guillermo', 'Rotestan', '2002-06-13'),
(425, 'Guillermo', 'Rotestan', '2002-06-13'),
(424, 'Guillermo', 'Rotestan', '2002-06-13'),
(423, 'Guillermo', 'Rotestan', '2002-06-13'),
(422, 'Guillermo', 'Rotestan', '2002-06-13'),
(421, 'Guillermo', 'Rotestan', '2002-06-13'),
(420, 'Guillermo', 'Rotestan', '2002-06-13'),
(418, 'Guillermo', 'Rotestan', '2002-06-13'),
(417, 'Guillermo', 'Rotestan', '2002-06-13'),
(416, 'Guillermo', 'Rotestan', '2002-06-13'),
(415, 'Guillermo Lira', 'Rotestan', '2002-06-13'),
(576, 'Sara', 'Ferrer', '2024-05-08'),
(411, 'Guillermo Juan', 'Rotestan Perez', '2001-09-13'),
(410, 'Guillermo', 'Rotestan', '2002-06-13'),
(409, 'Cinthia', 'Rosterdam', '1997-11-07'),
(408, 'Valentina', 'Ramirez', '1993-10-07'),
(407, 'Sofia', 'Sanchez', '1994-07-08'),
(406, 'Diego', 'Torres', '2000-07-14'),
(405, 'Ana', 'Lopez', '1996-07-12'),
(404, 'Pedro', 'Martinez', '1980-10-16'),
(403, 'Laura', 'Gonzalez', '1999-11-26'),
(402, 'Carlos', 'Garcia', '1982-03-12'),
(401, 'Maria  Luisa', 'Perez Rodriguez', '1994-01-07'),
(400, 'Juan', 'Rodriguez', '1985-06-13'),
(398, 'Hency', 'Lara', '2024-01-12');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `warriors_habilidades`
--

DROP TABLE IF EXISTS `warriors_habilidades`;
CREATE TABLE IF NOT EXISTS `warriors_habilidades` (
  `warrior_id` int NOT NULL,
  `habilidad_id` int NOT NULL,
  PRIMARY KEY (`warrior_id`,`habilidad_id`),
  KEY `habilidad_id` (`habilidad_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Volcado de datos para la tabla `warriors_habilidades`
--

INSERT INTO `warriors_habilidades` (`warrior_id`, `habilidad_id`) VALUES
(1, 1),
(1, 2),
(1, 6),
(1, 7),
(398, 6),
(402, 8),
(575, 2),
(581, 6),
(581, 10),
(584, 6),
(584, 8);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
