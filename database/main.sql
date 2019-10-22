-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Servidor: db
-- Tiempo de generación: 21-10-2019 a las 00:53:48
-- Versión del servidor: 5.7.11
-- Versión de PHP: 7.2.14

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `main`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `idea`
--

CREATE TABLE `idea` (
  `id_user` int(11) NOT NULL,
  `id` int(11) NOT NULL,
  `creation` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `content` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_520_ci
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `idea`
--

INSERT INTO `idea` (`id_user`, `id`, `creation`, `date`, `content`) VALUES
(8, 132, '2019-10-20 19:53:12', '2019-10-20 19:53:12', 'Hola CÃ³mo est'),
(8, 133, '2019-10-20 19:53:36', '2019-10-20 19:53:36', '<br>'),
(8, 134, '2019-10-20 19:53:38', '2019-10-20 19:53:12', 'CÃ³mo estÃ¡s?'),
(8, 139, '2019-10-20 20:04:02', '2019-10-20 19:53:12', 'Hola 1.5'),
(8, 140, '2019-10-20 20:04:15', '2019-10-20 19:53:12', 'Hola 2.5'),
(8, 141, '2019-10-20 20:04:44', '2019-10-20 20:04:44', 'Sub Idea Test'),
(8, 143, '2019-10-20 20:11:09', '2019-10-20 20:11:09', 'Yujuuu'),
(8, 144, '2019-10-20 20:11:16', '2019-10-20 20:11:16', 'Ultra chidoo!'),
(8, 145, '2019-10-20 20:11:23', '2019-10-20 20:11:23', 'Algo mÃ¡s que bien!'),
(8, 146, '2019-10-20 20:11:34', '2019-10-20 20:11:34', 'Una sub tarea desde el 2.5'),
(8, 147, '2019-10-20 20:11:44', '2019-10-20 20:11:44', 'Puede parecer muy extraÃ±o!'),
(8, 149, '2019-10-20 20:28:05', '2019-10-20 20:28:05', 'Sub Idea Test'),
(8, 150, '2019-10-20 20:28:09', '2019-10-20 20:28:09', 'Sub Idea Test'),
(8, 151, '2019-10-20 20:28:13', '2019-10-20 20:28:13', 'Sub Idea Test'),
(8, 152, '2019-10-20 20:30:58', '2019-10-20 20:30:58', 'Sub Idea Test'),
(8, 153, '2019-10-20 20:31:27', '2019-10-20 20:31:27', ''),
(8, 155, '2019-10-20 20:32:28', '2019-10-20 19:53:12', 'asdfasdfasdfasdf'),
(8, 156, '2019-10-20 20:32:30', '2019-10-20 19:53:12', ''),
(8, 159, '2019-10-20 20:33:01', '2019-10-20 20:01:11', 'Hola 8'),
(8, 164, '2019-10-20 20:35:37', '2019-10-20 20:35:37', 'jijijasdfij aoisdjf'),
(8, 165, '2019-10-20 20:35:39', '2019-10-20 20:35:39', ';lkjadsf;lkj asdf;lkj asdf;lkj asdf'),
(8, 166, '2019-10-20 20:35:42', '2019-10-20 20:35:42', ';lkasjdf ;lkjas df;lkj asdf;lkj asdf;lkj asdf'),
(8, 167, '2019-10-20 20:35:47', '2019-10-20 20:35:47', ''),
(8, 168, '2019-10-20 20:35:50', '2019-10-20 20:35:50', ';lkajs df;lkj asdf;lkj asd;flkj asdf;lkj asdf'),
(8, 169, '2019-10-20 20:35:53', '2019-10-20 20:35:53', ';lkajsdf;lkj asdf;lkj asdf'),
(8, 170, '2019-10-20 20:35:57', '2019-10-20 20:35:57', ';lkajsdf;lk jasdf;lkj asd;flkj asdf<div>;lkjas df;lkj asdf;lkj asdf;lkj asdf</div><div>;lkajs df;lkj asd;flkj asdf</div>'),
(8, 173, '2019-10-20 20:36:21', '2019-10-20 20:36:21', ';lkajsd f;lkajsd f'),
(8, 174, '2019-10-20 20:36:37', '2019-10-20 20:36:37', 'Teslksdf'),
(8, 175, '2019-10-20 20:36:41', '2019-10-20 20:36:41', 'ayuasdf'),
(8, 186, '2019-10-20 23:15:05', '2019-10-20 23:15:05', ''),
(8, 188, '2019-10-20 23:18:16', '2019-10-20 20:01:11', ''),
(8, 190, '2019-10-20 23:18:28', '2019-10-20 23:18:28', 'Bien y tu?'),
(8, 191, '2019-10-20 23:18:33', '2019-10-20 23:18:33', 'Algo mÃ¡s que niceee'),
(8, 192, '2019-10-20 23:18:38', '2019-10-20 23:18:38', 'Casi! jaja'),
(8, 195, '2019-10-20 23:20:26', '2019-10-20 23:20:26', ''),
(8, 196, '2019-10-20 23:20:30', '2019-10-20 23:20:30', 'No se que sea pero no se ve bien'),
(8, 197, '2019-10-20 23:20:34', '2019-10-20 23:20:34', 'Tal vez sea...'),
(8, 198, '2019-10-20 23:20:38', '2019-10-20 23:20:38', 'Caca con pus!'),
(8, 200, '2019-10-20 23:23:09', '2019-10-20 23:23:09', 'Con ganzo'),
(8, 201, '2019-10-20 23:23:12', '2019-10-20 23:23:12', 'jijij'),
(8, 203, '2019-10-20 23:23:57', '2019-10-20 23:23:57', 'jejejeje'),
(8, 204, '2019-10-20 23:23:59', '2019-10-20 23:23:59', 'Â¿CÃ³mo estÃ¡s? :D'),
(8, 223, '2019-10-20 23:27:24', '2019-10-20 23:27:24', ''),
(8, 232, '2019-10-20 23:30:28', '2019-10-20 23:30:28', 'La primera vez funciona'),
(8, 235, '2019-10-20 23:30:49', '2019-10-20 23:30:49', 'A ver que pedo'),
(8, 241, '2019-10-20 23:38:47', '2019-10-20 23:38:47', 'Hola'),
(8, 246, '2019-10-20 23:39:26', '2019-10-20 20:01:11', 'Trabajo'),
(8, 247, '2019-10-20 23:39:30', '2019-10-20 20:01:11', 'Pensamientos'),
(8, 248, '2019-10-20 23:39:34', '2019-10-20 23:39:34', 'Sobre cosas que me pasaron'),
(8, 249, '2019-10-20 23:39:43', '2019-10-20 23:39:43', 'Sobre cosas que me van a apasar'),
(8, 250, '2019-10-20 23:39:48', '2019-10-20 23:39:48', 'a;sdlfk'),
(8, 251, '2019-10-20 23:39:56', '2019-10-20 23:39:56', 'Alguna vez te vi irte'),
(8, 252, '2019-10-20 23:40:05', '2019-10-20 23:40:05', 'Y cuando te vi irte sentÃ­ que me desmayaba'),
(8, 253, '2019-10-20 23:40:14', '2019-10-20 23:40:05', 'Por que sabÃ­a que te extraÃ±arÃ­a para siempre'),
(8, 254, '2019-10-20 23:40:23', '2019-10-20 23:40:05', 'Y como el para siempre es para estar asustada'),
(8, 255, '2019-10-20 23:40:32', '2019-10-20 23:40:32', 'Pero no lo estÃ©s, por favor'),
(8, 256, '2019-10-20 23:40:39', '2019-10-20 23:40:39', 'NomÃ¡s estoy escribiendo para testear jaja'),
(8, 257, '2019-10-20 23:40:50', '2019-10-20 23:40:05', 'Ya, olvÃ­dalo!'),
(8, 258, '2019-10-20 23:41:04', '2019-10-20 23:40:05', 'Pero no se que paso'),
(8, 259, '2019-10-20 23:41:06', '2019-10-20 23:40:05', 'Este probablemente desaparezca'),
(8, 260, '2019-10-20 23:41:14', '2019-10-20 23:40:05', 'Este si se va a quedar'),
(8, 261, '2019-10-20 23:41:18', '2019-10-20 23:40:05', 'Este nel'),
(8, 262, '2019-10-20 23:46:31', '2019-10-20 23:40:05', 'Este se va a quedar otra vez'),
(8, 263, '2019-10-20 23:46:35', '2019-10-20 23:40:05', 'Este tambien!'),
(8, 264, '2019-10-20 23:46:37', '2019-10-20 23:40:05', 'AjÃºuuuaa'),
(8, 265, '2019-10-20 23:47:17', '2019-10-20 23:40:05', 'Ahorita vemos que pedo'),
(8, 266, '2019-10-20 23:47:26', '2019-10-20 23:40:05', 'ahorita vemos que pedo'),
(8, 267, '2019-10-20 23:47:32', '2019-10-20 23:47:32', 'HabÃ­a una vez una niÃ±a'),
(8, 268, '2019-10-20 23:47:47', '2019-10-20 23:47:47', 'Que le gustaba jugar futbol! :D');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `idea_relation`
--

CREATE TABLE `idea_relation` (
  `id_father` int(11) NOT NULL DEFAULT '0',
  `id_children` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `id` int(11) NOT NULL,
  `position` int(11) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `idea_relation`
--

INSERT INTO `idea_relation` (`id_father`, `id_children`, `id_user`, `id`, `position`) VALUES
(0, 132, 8, 46, 1),
(132, 133, 8, 47, 0),
(0, 139, 8, 52, 6),
(0, 140, 8, 53, 7),
(46, 141, 8, 54, 0),
(54, 143, 8, 56, 0),
(56, 144, 8, 57, 0),
(54, 145, 8, 58, 0),
(53, 146, 8, 59, 0),
(59, 147, 8, 60, 0),
(132, 149, 8, 62, 0),
(132, 150, 8, 63, 0),
(132, 151, 8, 64, 0),
(132, 152, 8, 65, 0),
(132, 153, 8, 66, 0),
(132, 164, 8, 74, 0),
(133, 167, 8, 75, 0),
(169, 170, 8, 76, 0),
(132, 174, 8, 79, 0),
(149, 186, 8, 90, 0),
(0, 188, 8, 92, 0),
(188, 189, 8, 93, 0),
(190, 191, 8, 94, 0),
(197, 198, 8, 98, 0),
(195, 199, 8, 99, 0),
(203, 204, 8, 101, 0),
(188, 208, 8, 105, 0),
(188, 209, 8, 106, 0),
(188, 210, 8, 107, 0),
(188, 211, 8, 108, 0),
(188, 212, 8, 109, 0),
(188, 213, 8, 110, 0),
(188, 214, 8, 111, 0),
(188, 215, 8, 112, 0),
(188, 216, 8, 113, 0),
(188, 217, 8, 114, 0),
(133, 223, 8, 120, 0),
(167, 230, 8, 127, 0),
(167, 231, 8, 128, 0),
(140, 232, 8, 129, 0),
(232, 235, 8, 132, 0),
(132, 241, 8, 138, 0),
(0, 245, 8, 142, 0),
(247, 248, 8, 143, 0),
(247, 249, 8, 144, 0),
(247, 250, 8, 145, 0),
(248, 251, 8, 146, 0),
(251, 252, 8, 147, 0),
(254, 255, 8, 148, 0),
(254, 256, 8, 149, 0),
(251, 258, 8, 150, 0),
(251, 260, 8, 151, 0),
(251, 262, 8, 152, 0),
(251, 263, 8, 153, 0),
(251, 264, 8, 154, 0),
(251, 265, 8, 155, 0),
(251, 266, 8, 156, 0),
(266, 267, 8, 157, 0),
(267, 268, 8, 158, 0),
(0, 269, 8, 159, 0),
(188, 270, 8, 160, 0),
(188, 271, 8, 161, 0),
(188, 272, 8, 162, 0),
(188, 273, 8, 163, 0),
(188, 274, 8, 164, 0),
(188, 275, 8, 165, 0),
(188, 276, 8, 166, 0),
(188, 277, 8, 167, 0),
(188, 278, 8, 168, 0),
(188, 279, 8, 169, 0);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pomodoro`
--

CREATE TABLE `pomodoro` (
  `id` int(11) NOT NULL,
  `id_task` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `time` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `task`
--

CREATE TABLE `task` (
  `id` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `position` int(11) NOT NULL,
  `title` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `type` varchar(4) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` varchar(4) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `task`
--

INSERT INTO `task` (`id`, `id_user`, `position`, `title`, `description`, `type`, `status`) VALUES
(82, 8, 1, 'Start writing a poem', 'Maybe tell Audrey about her horrible tatoo', 'task', 'done'),
(83, 8, 2, 'Think about eating pasta', 'This is a very important task', 'task', 'done'),
(84, 8, 3, '\'\'', 'it seems rather fun', 'task', NULL),
(85, 8, 5, 'Keeping up with the Kardashians', '', 'task', NULL),
(86, 8, 4, 'Rest', '', 'rest', NULL),
(87, 8, 6, 'You know what, Fuck it', 'I love first world problems being fixed with money and drama', 'task', NULL),
(88, 8, 7, 'Rest', '', 'rest', NULL),
(89, 8, 8, 'You had a long day, take a rest!', '', 'task', NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `name` varchar(40) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_520_ci NOT NULL,
  `email` varchar(40) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_520_ci NOT NULL,
  `password` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_520_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `user`
--

INSERT INTO `user` (`id`, `name`, `email`, `password`) VALUES
(6, 'ismael', 'isma@el.com', '56437ee14d804bfa14762e0b1782827e'),
(8, 'Ismael Villegas', 'jesismaelv@gmail.com', '56437ee14d804bfa14762e0b1782827e');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `user_option`
--

CREATE TABLE `user_option` (
  `id_user` int(11) NOT NULL,
  `slug` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_520_ci NOT NULL,
  `val` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_520_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `user_option`
--

INSERT INTO `user_option` (`id_user`, `slug`, `val`) VALUES
(8, 'autorest', 'true'),
(8, 'autorest_minutes', '5'),
(8, 'move_to_next_task', 'true'),
(8, 'hide_clock', 'false'),
(8, 'hide_progressbar', 'true'),
(8, 'pomodoro_time', '30'),
(8, 'rest_time', '20'),
(8, 'done', 'true');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `idea`
--
ALTER TABLE `idea`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `idea_relation`
--
ALTER TABLE `idea_relation`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `pomodoro`
--
ALTER TABLE `pomodoro`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `task`
--
ALTER TABLE `task`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `idea`
--
ALTER TABLE `idea`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=282;

--
-- AUTO_INCREMENT de la tabla `idea_relation`
--
ALTER TABLE `idea_relation`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=172;

--
-- AUTO_INCREMENT de la tabla `pomodoro`
--
ALTER TABLE `pomodoro`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `task`
--
ALTER TABLE `task`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=90;

--
-- AUTO_INCREMENT de la tabla `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
