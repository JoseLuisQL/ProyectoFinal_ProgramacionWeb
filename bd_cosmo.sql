-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 05-02-2021 a las 05:48:58
-- Versión del servidor: 10.4.11-MariaDB
-- Versión de PHP: 7.4.5

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `bd_cosmo`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `distribuidora`
--

CREATE TABLE `distribuidora` (
  `idDistribuidora` int(11) NOT NULL,
  `nombreDistribuidora` varchar(50) COLLATE utf8_spanish2_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;

--
-- Volcado de datos para la tabla `distribuidora`
--

INSERT INTO `distribuidora` (`idDistribuidora`, `nombreDistribuidora`) VALUES
(1, 'Sin confirmar'),
(7, 'EPIC GAMES'),
(8, 'Sony'),
(9, 'Nintendo'),
(10, 'EA'),
(11, 'Square Enix'),
(12, 'Capcom'),
(13, 'Activision Blizzard'),
(14, 'Paradox Interactive'),
(15, 'Annapurna Interactive'),
(16, 'Humble Bundle'),
(17, 'Devolver Digital '),
(18, 'Rockstar Games'),
(19, 'Konami'),
(20, 'Xbox'),
(21, 'Ubisoft');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `edicion`
--

CREATE TABLE `edicion` (
  `idEdicion` int(11) NOT NULL,
  `nombreEdicion` varchar(50) COLLATE utf8_spanish2_ci NOT NULL,
  `descripcion` varchar(255) COLLATE utf8_spanish2_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;

--
-- Volcado de datos para la tabla `edicion`
--

INSERT INTO `edicion` (`idEdicion`, `nombreEdicion`, `descripcion`) VALUES
(13, 'NORMAL', 'FORMATO DIGITAL KEY'),
(14, 'STANDAR', 'VIDEOJUEGO FORMATO FISICO/DIGITAL'),
(15, 'GIFT CARDS', 'Tarjetas de regalo'),
(16, 'CONSOLAS', 'Equipos de videojuego');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `estado`
--

CREATE TABLE `estado` (
  `idEstado` int(3) NOT NULL,
  `estado` varchar(11) COLLATE utf8_spanish2_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;

--
-- Volcado de datos para la tabla `estado`
--

INSERT INTO `estado` (`idEstado`, `estado`) VALUES
(1, 'pendiente'),
(2, 'pagado'),
(3, 'completado'),
(4, 'cancelado');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `mensaje`
--

CREATE TABLE `mensaje` (
  `idMesaje` int(11) NOT NULL,
  `idUser` int(11) NOT NULL,
  `nombre` varchar(255) COLLATE utf8_spanish2_ci NOT NULL,
  `correo` varchar(255) COLLATE utf8_spanish2_ci NOT NULL,
  `mensaje` varchar(255) COLLATE utf8_spanish2_ci NOT NULL,
  `fecha` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;

--
-- Volcado de datos para la tabla `mensaje`
--

INSERT INTO `mensaje` (`idMesaje`, `idUser`, `nombre`, `correo`, `mensaje`, `fecha`) VALUES
(7, 1, 'LUIS', 'jquispe.leon30@gmail.com', 'Cual es tu consulta: Tengo problemas a la hora de realizar el pago.', '2021-02-03'),
(8, 103, 'tomi', 'tomy@gmail.com', '¿Cúal es tu consulta? : problemas con el buscador', '2021-02-04');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pedido`
--

CREATE TABLE `pedido` (
  `idPedido` int(255) NOT NULL,
  `idLocalizador` varchar(255) NOT NULL,
  `idUsuario` int(16) NOT NULL,
  `nombre` varchar(255) CHARACTER SET utf8 COLLATE utf8_spanish2_ci NOT NULL,
  `apellidos` varchar(255) CHARACTER SET utf8 COLLATE utf8_spanish2_ci NOT NULL,
  `dni` varchar(9) NOT NULL,
  `calle` varchar(255) CHARACTER SET utf8 COLLATE utf8_spanish2_ci NOT NULL,
  `numeroCalle` varchar(15) CHARACTER SET utf8 COLLATE utf8_spanish2_ci NOT NULL,
  `ciudad` varchar(255) CHARACTER SET utf8 COLLATE utf8_spanish2_ci NOT NULL,
  `provincia` varchar(255) CHARACTER SET utf8 COLLATE utf8_spanish2_ci NOT NULL,
  `codigoPostal` int(5) NOT NULL,
  `telefono` int(15) NOT NULL,
  `metodoCorreo` varchar(255) CHARACTER SET utf8 COLLATE utf8_spanish2_ci NOT NULL,
  `numeroTarjeta` int(30) DEFAULT NULL,
  `mesTarjeta` int(11) DEFAULT NULL,
  `anoCumplido` int(4) DEFAULT NULL,
  `nombreTitular` varchar(255) CHARACTER SET utf8 COLLATE utf8_spanish2_ci DEFAULT NULL,
  `ccTarjeta` int(3) DEFAULT NULL,
  `fechaPedido` date NOT NULL,
  `fechaFinPedido` date DEFAULT NULL,
  `idEstado` int(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `pedido`
--

INSERT INTO `pedido` (`idPedido`, `idLocalizador`, `idUsuario`, `nombre`, `apellidos`, `dni`, `calle`, `numeroCalle`, `ciudad`, `provincia`, `codigoPostal`, `telefono`, `metodoCorreo`, `numeroTarjeta`, `mesTarjeta`, `anoCumplido`, `nombreTitular`, `ccTarjeta`, `fechaPedido`, `fechaFinPedido`, `idEstado`) VALUES
(261, '10220210203035331', 102, 'JOSE LUIS', 'LEON', '75066503', 'Jr Bolognesi pasaje1', '43', 'Oficina Serpost Andahuaylas', 'Andahuaylas ', 3701, 2147483647, 'correos', NULL, NULL, NULL, NULL, NULL, '2021-02-03', NULL, 1),
(265, '220210203035747', 2, 'ljose', 'quispe', '73843424', 'sdfs', 'adad', 'andahuaylas', 'andahuaylas', 3701, 943748342, 'correos', NULL, NULL, NULL, NULL, NULL, '2021-02-03', '2021-02-03', 4),
(266, '220210203040109', 2, 'luis', 'quispe', '75066503', 'av jsfsefe', '232', 'andahuaylas', 'andahuyaylas', 35434, 364565464, 'correos', NULL, NULL, NULL, NULL, NULL, '2021-02-03', '2021-02-03', 3),
(267, '220210203061605', 2, 'jose', 'quispe', '75066503', 'jr bolognesi pasje 1', '24', 'andahuaylas', 'andahuaylas', 3701, 2147483647, 'correos', NULL, NULL, NULL, NULL, NULL, '2021-02-03', '2021-02-03', 3),
(268, '220210204050314', 2, 'jose', 'quispe', '75066503', 'av las palmeras', '322', 'andahuaylas', 'andahuaylas', 3701, 929174440, 'correos', NULL, NULL, NULL, NULL, NULL, '2021-02-04', '2021-02-04', 4),
(269, '220210204050521', 2, 'luis', 'leon', '75066503', 'av los olivos', '23', 'andahuaylas', 'andahuaylas', 3701, 2147483647, 'correos', NULL, NULL, NULL, NULL, NULL, '2021-02-04', '2021-02-04', 3),
(270, '10320210204055502', 103, 'tomas', 'casa', '75647586', 'av gool', '232', 'andahuaylas', 'andahuaylas', 73434, 943864734, 'correos', NULL, NULL, NULL, NULL, NULL, '2021-02-04', '2021-02-04', 3),
(271, '10920210205031258', 109, 'luis', 'ramirez', '75064384', 'aaa bb', '23', 'andahuaylas', 'andahuaylas', 232, 987654242, 'correos', NULL, NULL, NULL, NULL, NULL, '2021-02-05', '2021-02-05', 3),
(272, '220210205054038', 2, 'Jose', 'Quispe', '756475845', 'av bolognesi', '23', 'andahuaylas', 'andahuaylas', 3434, 34556456, 'correos', NULL, NULL, NULL, NULL, NULL, '2021-02-05', '2021-02-05', 3);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `plataforma`
--

CREATE TABLE `plataforma` (
  `idPlataforma` int(11) NOT NULL,
  `nombrePlataforma` varchar(25) COLLATE utf8_spanish2_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;

--
-- Volcado de datos para la tabla `plataforma`
--

INSERT INTO `plataforma` (`idPlataforma`, `nombrePlataforma`) VALUES
(11, 'PC'),
(12, 'PS'),
(26, 'XBOX'),
(33, 'TARJETAS DE REGALO'),
(34, 'LICENCIAS DE SOFTWARE'),
(36, 'NSW'),
(37, 'ACCESORIOS');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `productoscomprados`
--

CREATE TABLE `productoscomprados` (
  `idPedido` int(11) NOT NULL,
  `idProducto` int(11) NOT NULL,
  `cantidad` int(11) NOT NULL,
  `precio` int(11) NOT NULL COMMENT 'Precio en el que estaba el producto el dia que lo compro'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;

--
-- Volcado de datos para la tabla `productoscomprados`
--

INSERT INTO `productoscomprados` (`idPedido`, `idProducto`, `cantidad`, `precio`) VALUES
(256, 94, 1, 53),
(257, 97, 1, 57),
(261, 108, 1, 199),
(265, 107, 1, 149),
(266, 107, 1, 149),
(267, 108, 1, 199),
(268, 110, 1, 189),
(269, 107, 1, 149),
(270, 97, 1, 57),
(271, 107, 1, 149),
(272, 106, 1, 169);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `resetpasswords`
--

CREATE TABLE `resetpasswords` (
  `id` int(11) NOT NULL,
  `code` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `resetpasswords`
--

INSERT INTO `resetpasswords` (`id`, `code`, `email`) VALUES
(0, '1600e333c988bb', 'jquispe.leon30@gmail.com'),
(0, '160162758583e8', 'jquispe.leon20@gmail.com'),
(0, '16016278763f34', 'jquispe.leon20@gmail.com'),
(0, '1601627b00f9c1', 'jquispe.leon20@gmail.com'),
(0, '1601627fec09c9', 'jquispe.leon20@gmail.com'),
(0, '16016281102594', 'jquispe.leon20@gmail.com'),
(0, '1601628dc754e0', 'jquispe.leon20@gmail.com'),
(0, '1601a3df06c28c', 'jquispe.leon30@gmail.com'),
(0, '1601b76ba34023', 'jquispe.leon30@gmail.com'),
(0, '1601b7dc2996a2', 'tomy@gmail.com'),
(0, '1601c83fe7d81a', 'jquispe.leon30@gmail.com'),
(0, '1601ccbd84af5d', 'jquispe.leon30@gmail.com');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuario`
--

CREATE TABLE `usuario` (
  `idUsuario` int(20) NOT NULL,
  `nombreUsuario` varchar(20) CHARACTER SET utf8 COLLATE utf8_spanish2_ci NOT NULL,
  `contrasena` varchar(255) CHARACTER SET utf8 COLLATE utf8_spanish2_ci NOT NULL,
  `nombre` varchar(16) CHARACTER SET utf8 COLLATE utf8_spanish2_ci NOT NULL,
  `apellido` varchar(30) CHARACTER SET utf8 COLLATE utf8_spanish2_ci DEFAULT NULL,
  `direccion` varchar(30) CHARACTER SET utf8 COLLATE utf8_spanish2_ci DEFAULT NULL,
  `telefono` int(15) DEFAULT NULL,
  `admin` tinyint(1) DEFAULT NULL,
  `fechaRegistro` date DEFAULT NULL,
  `ultimoLog` date DEFAULT NULL,
  `email` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `usuario`
--

INSERT INTO `usuario` (`idUsuario`, `nombreUsuario`, `contrasena`, `nombre`, `apellido`, `direccion`, `telefono`, `admin`, `fechaRegistro`, `ultimoLog`, `email`) VALUES
(1, 'admin', '21232f297a57a5a743894a0e4a801fc3', 'administrador', NULL, NULL, NULL, 1, '2021-01-19', '2021-02-05', 'cosmo.store4@gmail.com'),
(2, 'luis', '25bf2c365f27d025963c112076ed7a87', 'Jose Luis', 'Quispe Leon', 'AV. LOS OLIVOS 343', 974536473, 0, '2021-01-08', '2021-02-05', 'jquispe.leon20@gmail.com'),
(102, 'jose', '25bf2c365f27d025963c112076ed7a87', 'jose', 'leon', NULL, 929174442, 0, '2021-01-31', '2021-02-03', 'jquispe.leon30@gmail.com'),
(103, 'tomas', '4b506c2968184be185f6282f5dcac238', '', NULL, NULL, NULL, 0, '2021-02-04', '2021-02-04', NULL),
(104, 'raul', 'bc7a844476607e1a59d8eb1b1f311830', 'raul', 'leon', NULL, 987654321, 0, '2021-02-05', '2021-02-05', 'raul@gmail.com'),
(107, 'maria', '263bce650e68ab4e23f28263760b9fa5', 'maria', 'huaman', NULL, 964756475, 0, '2021-02-05', '2021-02-05', 'maria@gmail.com'),
(109, 'lucho', 'fc3d0c00117ff1ccae9d3103e573c9c3', 'lucho', 'ramirez', NULL, 975647564, 0, '2021-02-05', '2021-02-05', 'lucho@gmail.com');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `versionjuego`
--

CREATE TABLE `versionjuego` (
  `idVersion` int(11) NOT NULL,
  `idJuego` int(11) NOT NULL,
  `idPlataforma` int(11) NOT NULL,
  `idEdicion` int(11) NOT NULL,
  `idDistribuidora` int(11) DEFAULT NULL,
  `precio` int(11) NOT NULL,
  `stock` int(11) NOT NULL,
  `ventas` int(11) NOT NULL DEFAULT 0,
  `fechaSalida` date NOT NULL,
  `activo` tinyint(1) NOT NULL COMMENT 'Bolean de activo o deshabilitado',
  `img` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `versionjuego`
--

INSERT INTO `versionjuego` (`idVersion`, `idJuego`, `idPlataforma`, `idEdicion`, `idDistribuidora`, `precio`, `stock`, `ventas`, `fechaSalida`, `activo`, `img`) VALUES
(94, 75, 11, 14, 7, 53, 4, 4, '2021-01-20', 1, 'hitman3.png'),
(95, 76, 26, 14, 13, 50, 9, 1, '2020-09-08', 1, 'codxbox.png'),
(96, 77, 11, 14, 11, 38, 5, 5, '2020-12-18', 1, 'cyberpunk.png'),
(97, 78, 11, 14, 15, 57, 3, 2, '2019-11-14', 1, 'tarkov.png'),
(98, 79, 11, 14, 17, 70, 9, 6, '2021-01-28', 1, 'medium.png'),
(99, 80, 11, 14, 15, 31, 8, 1, '2021-02-17', 1, 'biomutant.png'),
(100, 81, 11, 14, 18, 38, 13, 0, '2013-12-05', 1, 'gta5.png'),
(101, 82, 12, 14, 16, 62, 7, 0, '2020-03-11', 1, 'werewolf.png'),
(104, 84, 33, 15, 8, 49, 15, 0, '2021-02-01', 1, 'psplus1mes.png'),
(105, 86, 36, 13, 9, 199, 20, 0, '2020-09-16', 1, 'animalnsw.png'),
(106, 87, 36, 13, 9, 169, 29, 1, '2020-02-06', 1, 'supernsw.png'),
(107, 88, 36, 13, 9, 149, 11, 5, '2020-08-20', 1, 'tsubasansw.png'),
(108, 89, 36, 13, 9, 199, 13, 2, '2021-01-21', 1, 'xenobladensw.png'),
(109, 90, 36, 13, 9, 199, 20, 0, '2020-05-15', 1, 'mario8nsw.png'),
(110, 91, 12, 13, 21, 189, 9, 1, '2020-09-10', 1, 'assassinsvalhallaps4.png'),
(111, 92, 12, 13, 19, 89, 10, 0, '2019-12-19', 1, 'acecombat7ps4.png'),
(112, 93, 12, 13, 10, 159, 10, 0, '2020-12-17', 1, 'fifa21ps4.png'),
(113, 94, 12, 13, 13, 199, 15, 0, '2020-09-17', 1, 'coldwarps4.png'),
(114, 95, 12, 13, 16, 249, 20, 0, '2021-01-14', 1, 'demonsps5.png'),
(115, 96, 12, 13, 21, 199, 20, 0, '2021-01-29', 1, 'immortalsps5.png'),
(116, 97, 12, 13, 8, 259, 10, 0, '2021-01-13', 1, 'smps5.png'),
(117, 98, 12, 16, 8, 2099, 5, 0, '0000-00-00', 1, 'ps4pro.png'),
(118, 99, 12, 16, 8, 2999, 10, 0, '2021-12-03', 1, 'ps5.png');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `videojuego`
--

CREATE TABLE `videojuego` (
  `idJuego` int(11) NOT NULL,
  `nombreJuego` varchar(50) CHARACTER SET utf8 COLLATE utf8_spanish2_ci NOT NULL,
  `descripJuego` varchar(255) CHARACTER SET utf8 COLLATE utf8_spanish2_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `videojuego`
--

INSERT INTO `videojuego` (`idJuego`, `nombreJuego`, `descripJuego`) VALUES
(75, 'HITMAN 3', 'Hitman 3 es la próxima entrega para un jugador de una excelente serie de juegos dedicada a la historia del asesino pagado más emblemático del mundo. Desarrollado por IO Interactive Studio y lanzado en 2021, el juego presenta soluciones mecánicas completam'),
(76, 'Call of Duty Black Ops: Cold War', 'Call of Duty: Black Ops Cold War  es el próximo juego de la serie Call of Duty, creado por las personas que trabajan en CoD: BO desde 2010, estudio Treyarch, actuando bajo la atenta mirada de Activision Blizzard. El Black Ops original es considerado por m'),
(77, 'Cyberpunk 2077', 'Cyberpunk 2077 (PC) es un RPG de acción en perspectiva para un único jugador y en primera persona desarrollado por CD Projekt Red, el desarrollador de la serie The Witcher. Basado en un juego de mesa desenvuelto por Michael Pondsmith en la década de 1980,'),
(78, 'Escape From Tarkov', 'Ubicado en una región ficticia de Norvinsk en el noroeste de Rusia, Escape from Tarkov es un juego de disparos en primera persona altamente realista con elementos sustanciales de supervivencia MMO. Toma el control de uno de los mercenarios que sobrevivier'),
(79, 'The Medium', 'Descubre un oscuro misterio que solo un médium puede resolver. Explore el mundo real y el mundo espiritual al mismo tiempo. Usa tus habilidades psíquicas para resolver acertijos que abarcan ambos mundos, descubre secretos profundamente inquietantes y sobr'),
(80, 'Biomutant', 'BIOMUTANT® es un juego de rol de fábula de Kung-Fu post-apocalíptico de mundo abierto, con un sistema de combate de artes marciales único que te permite mezclar acción cuerpo a cuerpo, disparos y habilidades mutantes.\n\nUna plaga está arruinando la tierra '),
(81, 'Grand Theft Auto V', 'Bienvenido de nuevo al soleado estado de San Andreas, donde surgen oportunidades y la gente cae. La serie Grand Theft Auto vuelve a visitar a San Andreas en el formato de triple A por primera vez desde el GTA: San Andreas. Entre en los zapatos de tres pro'),
(82, 'Werewolf: The Apocalypse — Earthblood', 'Werewolf: The Apocalypse - Earthblood es una experiencia única llena de combates salvajes y aventuras místicas, inspirada en el famoso juego de rol.\n\nEres Cahal, un poderoso Garou que decidió exiliarse después de perder el control de su furia destructiva.'),
(83, 'aaa', 'aaaaaaaaa aaa'),
(84, 'TARJETA PLAYSTATION PLUS 1 MES', 'PlayStation Plus te conecta con la mejor comunidad online de jugadores. ¡Forma un equipo o compite con tus amigos en todos tus juegos multijugador favoritos para la consola PS4! Amplía tus horizontes de entretenimiento con una creciente colección de juego'),
(85, 'TARJETA PLAYSTATION STORE 10 USD', 'PlayStation Network permite a los usuarios conectarse de forma online para poder jugar entre ellos, de tal forma que la experiencia de juego sea mejor que jugando contra el juego o con otra persona. La tienda online PlayStation Store ofrece una gran colec'),
(86, 'ANIMAL CROSSING: NEW HORIZONS', 'Animal Crossing: New Horizons es la nueva secuela de la saga Animal Crossing para Nintendo Switch. Desarrollada por Nintendo, se trata de un capítulo más en la serie de gestión, recolección, decoración y simulación de vida de la empresa japonesa, que se h'),
(87, 'SUPER DRAGON BALL HEROES WORLD MISSION', 'Super Dragon Ball Heroes: World Mission es la nueva entrega de la saga de cartas coleccionables basada en Dragon Ball. De gran éxito en las recreativas japonesas, la serie basada en los héroes y villanos de Akira Toriyama se adapta a Nintendo Switch con t'),
(88, 'CAPTAIN TSUBASA: RISE OF NEW CHAMPIONS', 'Captain Tsubasa: Rise of New Champions es el nuevo videojuego de fútbol arcade desarrollado por Tamsoft y Bandai Namco para consolas y PC. Basándose en la popular serie de animación conocido en latinoamerica como Super Campeones, nos presentará una propue'),
(89, 'XENOBLADE CHRONICLES DEFINITIVE EDITION', 'La saga Xenogears, uno de los juegos de rol de culto en Japón, llega a esta generación con esta entrega, que finalmente ha llegado a Latinoamerica con su contenido en español. Un título que combina rol y acción en tiempo real con la exploración de escenar'),
(90, 'MARIO KART 8', 'Nuevamente Mario, Luigi, Princess Peach, Bowser, Toad, Yoshi y otros personajes del mundo de Super Mario Bros se enfrentan en carreras a toda velocidad, donde cada piloto usará toda su habilidad y artimañas para liderar la carrera hasta la meta; en esta o'),
(91, 'ASSASSIN’S CREED VALHALLA', 'Assassin’s Creed Valhalla es la nueva entrega de acción, rol y exploración en tercera persona en mundo abierto de Ubisoft para consolas y PC. Siguiendo con la historia de los vikingos, su credo y su constante lucha contra los enemigos de la libertad a lo '),
(92, 'ACE COMBAT 7 SKIES UNKNOWN', 'Ace Combat vuelve a los videojuegos con una entrega numerada de la serie tras varios años de inactividad. Ace Combat 7: Skies Unknown presentará de nuevo grandes combates áreos, una historia intrincada y con fuerte énfasis en la narrativa, espectaculares '),
(93, 'FIFA 21', 'FIFA 21 destacará por unos tiempos de carga mucho más rápidos, cuestión de segundos, un nuevo sistema de iluminación realista que hará los estadios más naturales, cuerpos de jugadores actualizados con más definición, mejores físicas, más detalle en rostro'),
(94, 'CALL OF DUTY BLACK OPS COLD WAR', 'Black Ops Cold War, la secuela directa de Call of Duty: Black Ops, transportará a los jugadores al centro de la volátil contienda geopolítica , a principios de los 80. Nada es lo que parece en la fascinante Campaña para un jugador, donde los jugadores se '),
(95, 'DEMONS SOULS', 'Demon’s Souls Remake es la puesta al día del clásico videojuego de rol y acción en tercera persona de FromSoftware para PlayStation 5. Desarrollado por Bluepoint Games se trata de una ambiciosa actualización del título que inició el fenómeno Souls, que a '),
(96, 'IMMORTALS FENYX RISING', 'Gods and Monsters es un videojuego de acción y aventura de mundo abierto que nos narrará las andanzas de un olvidado héroe que tendrá que salvar a los dioses de la mitología griega. Para ello, tendremos que demostrar nuestro heroísmo enfrentándonos a peli'),
(97, 'SPIDERMAN MILES MORALES ULTIMATE EDITION', 'Descubre la historia arácnida completa con Marvel’s Spider-Man: Miles Morales Edición Definitiva. Este paquete imperdible incluye Marvel’s Spider-Man Remasterizado, el galardonado juego completo, con los tres capítulos de contenido descargable de la avent'),
(98, 'PRO 1TB', 'La nueva PlayStation 4 Pro soporta resolución 4K para una mejor resolución de imagen y HDR para una luminosidad más realista, aunque todas aquellas personas que todavía no dispongan de televisores capaces de ofrecer esta calidad de imagen también se benef'),
(99, 'CONSOLA PLAYSTATION 5 EDICIÓN ESTÁNDAR', 'La consola PS5 hace posibles nuevas formas de juego que jamás habías imaginado.\n\nExperimenta cargas super rápidas gracias a una unidad de estado sólido (SSD) de alta velocidad, una inmersión más profunda con retroalimentación háptica, gatillos adaptables ');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `distribuidora`
--
ALTER TABLE `distribuidora`
  ADD PRIMARY KEY (`idDistribuidora`);

--
-- Indices de la tabla `edicion`
--
ALTER TABLE `edicion`
  ADD PRIMARY KEY (`idEdicion`);

--
-- Indices de la tabla `estado`
--
ALTER TABLE `estado`
  ADD PRIMARY KEY (`idEstado`);

--
-- Indices de la tabla `mensaje`
--
ALTER TABLE `mensaje`
  ADD PRIMARY KEY (`idMesaje`),
  ADD KEY `iduser` (`idUser`);

--
-- Indices de la tabla `pedido`
--
ALTER TABLE `pedido`
  ADD PRIMARY KEY (`idPedido`),
  ADD KEY `idUsuario` (`idUsuario`),
  ADD KEY `pedido-estado` (`idEstado`);

--
-- Indices de la tabla `plataforma`
--
ALTER TABLE `plataforma`
  ADD PRIMARY KEY (`idPlataforma`);

--
-- Indices de la tabla `usuario`
--
ALTER TABLE `usuario`
  ADD PRIMARY KEY (`idUsuario`);

--
-- Indices de la tabla `versionjuego`
--
ALTER TABLE `versionjuego`
  ADD PRIMARY KEY (`idVersion`),
  ADD KEY `idJuego` (`idJuego`),
  ADD KEY `edicion` (`idEdicion`),
  ADD KEY `plataforma` (`idPlataforma`),
  ADD KEY `distri` (`idDistribuidora`);

--
-- Indices de la tabla `videojuego`
--
ALTER TABLE `videojuego`
  ADD PRIMARY KEY (`idJuego`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `distribuidora`
--
ALTER TABLE `distribuidora`
  MODIFY `idDistribuidora` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT de la tabla `edicion`
--
ALTER TABLE `edicion`
  MODIFY `idEdicion` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT de la tabla `estado`
--
ALTER TABLE `estado`
  MODIFY `idEstado` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=75;

--
-- AUTO_INCREMENT de la tabla `mensaje`
--
ALTER TABLE `mensaje`
  MODIFY `idMesaje` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT de la tabla `pedido`
--
ALTER TABLE `pedido`
  MODIFY `idPedido` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=273;

--
-- AUTO_INCREMENT de la tabla `plataforma`
--
ALTER TABLE `plataforma`
  MODIFY `idPlataforma` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=38;

--
-- AUTO_INCREMENT de la tabla `usuario`
--
ALTER TABLE `usuario`
  MODIFY `idUsuario` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=110;

--
-- AUTO_INCREMENT de la tabla `versionjuego`
--
ALTER TABLE `versionjuego`
  MODIFY `idVersion` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=119;

--
-- AUTO_INCREMENT de la tabla `videojuego`
--
ALTER TABLE `videojuego`
  MODIFY `idJuego` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=100;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `mensaje`
--
ALTER TABLE `mensaje`
  ADD CONSTRAINT `iduser` FOREIGN KEY (`idUser`) REFERENCES `usuario` (`idUsuario`);

--
-- Filtros para la tabla `pedido`
--
ALTER TABLE `pedido`
  ADD CONSTRAINT `pedido-estado` FOREIGN KEY (`idEstado`) REFERENCES `estado` (`idEstado`),
  ADD CONSTRAINT `pedido_ibfk_1` FOREIGN KEY (`idUsuario`) REFERENCES `usuario` (`idUsuario`);

--
-- Filtros para la tabla `versionjuego`
--
ALTER TABLE `versionjuego`
  ADD CONSTRAINT `distri` FOREIGN KEY (`idDistribuidora`) REFERENCES `distribuidora` (`idDistribuidora`),
  ADD CONSTRAINT `edicion` FOREIGN KEY (`idEdicion`) REFERENCES `edicion` (`idEdicion`),
  ADD CONSTRAINT `idJuego` FOREIGN KEY (`idJuego`) REFERENCES `videojuego` (`idJuego`),
  ADD CONSTRAINT `plataforma` FOREIGN KEY (`idPlataforma`) REFERENCES `plataforma` (`idPlataforma`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
