-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 08-08-2019 a las 08:53:03
-- Versión del servidor: 10.1.36-MariaDB
-- Versión de PHP: 7.2.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `luber`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `admins`
--

CREATE TABLE `admins` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` text COLLATE utf8mb4_unicode_ci,
  `username` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `type` enum('user','admin') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'admin',
  `status` enum('on','off') COLLATE utf8mb4_unicode_ci DEFAULT 'on',
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` text COLLATE utf8mb4_unicode_ci,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `admins`
--

INSERT INTO `admins` (`id`, `name`, `username`, `type`, `status`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Pablo', 'pablo', 'admin', 'on', NULL, '$2y$10$4MTloh/YISIaCotaWXn6pupTblUX9y5upamlXagvsNkQ5sodO9p/S', NULL, NULL, NULL),
(2, 'Carlos', 'carlos', 'user', 'on', NULL, '$2y$10$ivOq5xu3uIeNz4msEL7gj.wDG/gCYqe4svtyJ7g7dN3eWMYdYXvna', NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `contents`
--

CREATE TABLE `contents` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `section` text COLLATE utf8mb4_unicode_ci,
  `order` text COLLATE utf8mb4_unicode_ci,
  `type` text COLLATE utf8mb4_unicode_ci,
  `title_es` text COLLATE utf8mb4_unicode_ci,
  `subtitle_es` text COLLATE utf8mb4_unicode_ci,
  `text_es` text COLLATE utf8mb4_unicode_ci,
  `image1` text COLLATE utf8mb4_unicode_ci,
  `image2` text COLLATE utf8mb4_unicode_ci,
  `image3` text COLLATE utf8mb4_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `contents`
--

INSERT INTO `contents` (`id`, `section`, `order`, `type`, `title_es`, `subtitle_es`, `text_es`, `image1`, `image2`, `image3`, `created_at`, `updated_at`) VALUES
(1, 'home', 'AA', '1i-1t', 'ALTA CALIDAD', '', '', 'icon1.png', '', '', NULL, NULL),
(2, 'home', 'BB', '1i-1t', 'AMPLIA GAMA DE MODELOS', '', '', 'icon2.png', '', '', NULL, NULL),
(3, 'home', 'CC', '1i-1t', 'MÁS DE 40 AÑOS DE TRAYECTORIA', '', '', 'icon3.png', '', '', NULL, NULL),
(4, 'home', 'DD', '1i-1t', 'TECNOLOGÍA AVANZADA', '', '', 'icon4.png', '', '', NULL, NULL),
(5, 'empresa', '', '1i-1c', '', '', '<p><span style=\"font-size:14px\"><strong>LUBER</strong>es una pujante Empresa Argentina, que comercializa Cerraduras El&eacute;ctricas y Cerrojos de Seguridad de muy alta calidad y una importante gama de modelos.</span></p><p><span style=\"font-size:14px\">LUBER da comienzo a su actividad en el a&ntilde;o 1980, especializ&aacute;ndose en la fabricaci&oacute;n de destrabadores el&eacute;ctricos, siendo esta una peque&ntilde;a empresa familiar. A medida que transcurrieron los a&ntilde;os, nos fuimos renovando en cuanto a la incorporaci&oacute;n de una importante gama de productos como los cerrojos, picaportes para puertas blindex y cerraduras, acorde a las distintas necesidades.</span></p>', 'empresa.jpg', '', '', NULL, NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `data`
--

CREATE TABLE `data` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `type` text COLLATE utf8mb4_unicode_ci,
  `text` text COLLATE utf8mb4_unicode_ci,
  `route` text COLLATE utf8mb4_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `data`
--

INSERT INTO `data` (`id`, `type`, `text`, `route`, `created_at`, `updated_at`) VALUES
(1, 'address', '<p>Maestra Gachet 3677/79 - CP 1712 -&nbsp;</p>\r\n\r\n<p>Castelar - Buenos Aires - Argentina</p>', 'Maestra Gachet 3677/79 - CP 1712 - Castelar - Buenos Aires - Argentina', NULL, '2019-08-04 06:53:38'),
(2, 'phone', '<p>Tel. /Fax. (+54 11) 4692-3950 / (+54 11) 4692-5107</p>', '541146923950', NULL, '2019-08-04 06:53:22'),
(3, 'email', '<p>info@lubercerraduras.com.ar &nbsp;| &nbsp;www.lubercerraduras.com.ar</p>', 'info@lubercerraduras.com.ar', NULL, '2019-08-04 06:52:33'),
(4, 'website', 'www.lubercerraduras.com.ar', 'www.lubercerraduras.com.ar', NULL, NULL),
(5, 'whatsapp1', '<p>(011) 15 3231-1627</p>', '0111532311627', NULL, '2019-08-02 06:23:13'),
(6, 'whatsapp2', '(011) 15 3231-1627', '0111532311627', NULL, NULL),
(7, 'info_contacto', 'Términos y condiciones de privacidad...', 'Términos y condiciones de privacidad...', NULL, NULL),
(8, 'info_google', 'api-google', '#', NULL, NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `distribuidors`
--

CREATE TABLE `distribuidors` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `local` text COLLATE utf8mb4_unicode_ci,
  `direction` text COLLATE utf8mb4_unicode_ci,
  `phone` text COLLATE utf8mb4_unicode_ci,
  `altitude` text COLLATE utf8mb4_unicode_ci,
  `length` text COLLATE utf8mb4_unicode_ci,
  `order` text COLLATE utf8mb4_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `distribuidors`
--

INSERT INTO `distribuidors` (`id`, `local`, `direction`, `phone`, `altitude`, `length`, `order`, `created_at`, `updated_at`) VALUES
(1, 'Mi Local', 'Mi Dirección', 'Mi Teléfono', '-34.6006021', '-58.4069496', 'Orden', '2019-07-29 08:20:47', '2019-08-06 23:28:47');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `logos`
--

CREATE TABLE `logos` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `type` text COLLATE utf8mb4_unicode_ci,
  `image` text COLLATE utf8mb4_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `logos`
--

INSERT INTO `logos` (`id`, `type`, `image`, `created_at`, `updated_at`) VALUES
(1, 'header', 'header.png', NULL, '2019-07-28 10:00:06'),
(2, 'footer', 'footer.png', NULL, NULL),
(3, 'favicon', 'favicon.png', NULL, NULL),
(4, 'default', 'default.png', NULL, NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `metadata`
--

CREATE TABLE `metadata` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `section` text COLLATE utf8mb4_unicode_ci,
  `keyword_es` text COLLATE utf8mb4_unicode_ci,
  `description_es` text COLLATE utf8mb4_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `metadata`
--

INSERT INTO `metadata` (`id`, `section`, `keyword_es`, `description_es`, `created_at`, `updated_at`) VALUES
(1, 'home', 'Palabras Clave', 'Descripcion Para la búsqueda avanzada', NULL, '2019-07-28 09:21:23'),
(2, 'empresa', 'Palabras Clave', 'Descripcion Para la búsqueda avanzada', NULL, NULL),
(3, 'productos', 'Palabras Clave', 'Descripcion Para la búsqueda avanzada', NULL, NULL),
(4, 'distribuidores', 'Palabras Clave', 'Descripcion Para la búsqueda avanzada', NULL, NULL),
(5, 'novedades', 'Palabras Clave', 'Descripcion Para la búsqueda avanzada', NULL, NULL),
(6, 'contacto', 'Palabras Clave', 'Descripcion Para la búsqueda avanzada', NULL, NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2019_04_10_012122_create_admins_table', 1),
(2, '2019_04_10_012128_create_data_table', 1),
(3, '2019_04_10_012133_create_metadata_table', 1),
(4, '2019_04_10_012136_create_logos_table', 1),
(5, '2019_04_10_012144_create_sliders_table', 1),
(6, '2019_04_10_012147_create_contents_table', 1),
(7, '2019_04_10_064818_create_reds_table', 1),
(8, '2019_07_25_225716_create_producto_familias_table', 1),
(9, '2019_07_25_225753_create_productos_table', 1),
(10, '2019_07_25_225818_create_producto_imagens_table', 1),
(11, '2019_07_25_225831_create_producto_planos_table', 1),
(12, '2019_07_25_225845_create_producto_colors_table', 1),
(13, '2019_07_25_225902_create_distribuidors_table', 1),
(14, '2019_07_25_225918_create_novedad_categorias_table', 1),
(15, '2019_07_25_225935_create_novedad_articulos_table', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `novedad_articulos`
--

CREATE TABLE `novedad_articulos` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `image` text COLLATE utf8mb4_unicode_ci,
  `extract_es` text COLLATE utf8mb4_unicode_ci,
  `title_es` text COLLATE utf8mb4_unicode_ci,
  `subtitle_es` text COLLATE utf8mb4_unicode_ci,
  `text_es` text COLLATE utf8mb4_unicode_ci,
  `novedad_id` bigint(20) UNSIGNED DEFAULT NULL,
  `order` text COLLATE utf8mb4_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `novedad_articulos`
--

INSERT INTO `novedad_articulos` (`id`, `image`, `extract_es`, `title_es`, `subtitle_es`, `text_es`, `novedad_id`, `order`, `created_at`, `updated_at`) VALUES
(1, 'n1.jpg', 'Estaremos presentes en la ExpoFerretera. Los invitamos a visitarnos del 3 al 6 de Junio en el Centro de Exposiciones Costa Salguero.', 'Eventos', '', '<p><strong>EXPOFERRETERA, La Exposición Internacional de Artículos para Ferreterías, Sanitarios, Pinturerías y Materiales de Construcción</strong></p><p>Estaremos presentes en la ExpoFerretera. Los invitamos a visitarnos del 3 al 6 de Junio en el Centro de Exposiciones Costa Salguero. <br>Consolidada como el evento más relevante del sector en Sudamérica, ExpoFerretera se celebra cada dos años en Buenos Aires englobando a todo el mercado de la fabricación e importación de productos para la construcción y maquinarias de uso domiciliario o industrial. Bienalmente, refleja la situación actual de la industria, exhibe los principales avances tecnológicos e impulsa la capacitación.</p>', 1, NULL, NULL, NULL),
(2, 'n2.jpg', 'Hemos actualizado nuestra sección de distribuidores para que encuentres todo lo que necesitás cerca tuyo.', 'Eventos', '', '<p><strong>EXPOFERRETERA, La Exposici&oacute;n Internacional de Art&iacute;culos para Ferreter&iacute;as, Sanitarios, Pinturer&iacute;as y Materiales de Construcci&oacute;n</strong></p>\r\n\r\n<p>Estaremos presentes en la ExpoFerretera. Los invitamos a visitarnos del 3 al 6 de Junio en el Centro de Exposiciones Costa Salguero.&nbsp;<br />\r\nConsolidada como el evento m&aacute;s relevante del sector en Sudam&eacute;rica, ExpoFerretera se celebra cada dos a&ntilde;os en Buenos Aires englobando a todo el mercado de la fabricaci&oacute;n e importaci&oacute;n de productos para la construcci&oacute;n y maquinarias de uso domiciliario o industrial. Bienalmente, refleja la situaci&oacute;n actual de la industria, exhibe los principales avances tecnol&oacute;gicos e impulsa la capacitaci&oacute;n.</p>', 1, NULL, NULL, '2019-08-08 09:29:43'),
(3, 'n3.jpg', 'Estaremos presentes en la ExpoFerretera. Los invitamos a visitarnos del 3 al 6 de Junio en el Centro de Exposiciones Costa Salguero.', 'Promociones', '', '<p><strong>EXPOFERRETERA, La Exposici&oacute;n Internacional de Art&iacute;culos para Ferreter&iacute;as, Sanitarios, Pinturer&iacute;as y Materiales de Construcci&oacute;n</strong></p>\r\n\r\n<p>Estaremos presentes en la ExpoFerretera. Los invitamos a visitarnos del 3 al 6 de Junio en el Centro de Exposiciones Costa Salguero.&nbsp;<br />\r\nConsolidada como el evento m&aacute;s relevante del sector en Sudam&eacute;rica, ExpoFerretera se celebra cada dos a&ntilde;os en Buenos Aires englobando a todo el mercado de la fabricaci&oacute;n e importaci&oacute;n de productos para la construcci&oacute;n y maquinarias de uso domiciliario o industrial. Bienalmente, refleja la situaci&oacute;n actual de la industria, exhibe los principales avances tecnol&oacute;gicos e impulsa la capacitaci&oacute;n.</p>', 2, NULL, NULL, '2019-08-08 09:29:20'),
(4, 'n4.jpg', 'Hemos actualizado nuestra sección de distribuidores para que encuentres todo lo que necesitás cerca tuyo.', 'Productos', '', '<p><strong>EXPOFERRETERA, La Exposici&oacute;n Internacional de Art&iacute;culos para Ferreter&iacute;as, Sanitarios, Pinturer&iacute;as y Materiales de Construcci&oacute;n</strong></p>\r\n\r\n<p>Estaremos presentes en la ExpoFerretera. Los invitamos a visitarnos del 3 al 6 de Junio en el Centro de Exposiciones Costa Salguero.&nbsp;<br />\r\nConsolidada como el evento m&aacute;s relevante del sector en Sudam&eacute;rica, ExpoFerretera se celebra cada dos a&ntilde;os en Buenos Aires englobando a todo el mercado de la fabricaci&oacute;n e importaci&oacute;n de productos para la construcci&oacute;n y maquinarias de uso domiciliario o industrial. Bienalmente, refleja la situaci&oacute;n actual de la industria, exhibe los principales avances tecnol&oacute;gicos e impulsa la capacitaci&oacute;n.</p>', 3, NULL, NULL, '2019-08-08 09:29:53');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `novedad_categorias`
--

CREATE TABLE `novedad_categorias` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title_es` text COLLATE utf8mb4_unicode_ci,
  `order` text COLLATE utf8mb4_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `novedad_categorias`
--

INSERT INTO `novedad_categorias` (`id`, `title_es`, `order`, `created_at`, `updated_at`) VALUES
(1, 'Eventos', 'AA', NULL, NULL),
(2, 'Productos', 'BB', NULL, NULL),
(3, 'Promociones', 'CC', NULL, NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `productos`
--

CREATE TABLE `productos` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title_es` text COLLATE utf8mb4_unicode_ci,
  `code` text COLLATE utf8mb4_unicode_ci,
  `text_es` text COLLATE utf8mb4_unicode_ci,
  `order` text COLLATE utf8mb4_unicode_ci,
  `outstanding` text COLLATE utf8mb4_unicode_ci,
  `family_id` bigint(20) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `productos`
--

INSERT INTO `productos` (`id`, `title_es`, `code`, `text_es`, `order`, `outstanding`, `family_id`, `created_at`, `updated_at`) VALUES
(1, 'Cerrojo de aplicar con cerradura eléctrica y picaporte', '830', '<p>&middot; Cuerpo de bronce inyectado de 2,5 mm de espesor</p>\r\n\r\n<p>&middot; Contrachapa de bronce. Yale laminada</p>\r\n\r\n<p>&middot; Pasador con pernos giratorios</p>\r\n\r\n<p>&middot; Mano derecha e izquierda</p>\r\n\r\n<p>&middot; Traba de picaporte interior</p>\r\n\r\n<p>&middot; 2 llaves</p>', 'AA', 'off', 3, '2019-08-08 06:59:14', '2019-08-08 06:59:14'),
(5, 'Cerrojo de aplicar postiza bronce platil', '995', '<p>&middot; Cuerpo de bronce inyectado de 2,5 mm de espesor</p>\r\n\r\n<p>&middot; Contrachapa de bronce. Yale laminada</p>\r\n\r\n<p>&middot; Pasador con pernos giratorios</p>\r\n\r\n<p>&middot; Mano derecha e izquierda</p>\r\n\r\n<p>&middot; Traba de picaporte interior</p>\r\n\r\n<p>&middot; 2 llaves</p>', 'CC', 'on', 3, '2019-08-08 07:15:47', '2019-08-08 08:15:25'),
(6, 'Chapón y contrachapa plateado', '84', '<p>&middot; Cuerpo de bronce inyectado de 2,5 mm de espesor</p>\r\n\r\n<p>&middot; Contrachapa de bronce. Yale laminada</p>\r\n\r\n<p>&middot; Pasador con pernos giratorios</p>\r\n\r\n<p>&middot; Mano derecha e izquierda</p>\r\n\r\n<p>&middot; Traba de picaporte interior</p>\r\n\r\n<p>&middot; 2 llaves</p>', 'DD', 'on', 3, '2019-08-08 07:17:18', '2019-08-08 08:15:43'),
(7, 'Cerrojo de aplicar postiza bronce pulido', '994', '<p>&middot; Cuerpo de bronce inyectado de 2,5 mm de espesor</p>\r\n\r\n<p>&middot; Contrachapa de bronce. Yale laminada</p>\r\n\r\n<p>&middot; Pasador con pernos giratorios</p>\r\n\r\n<p>&middot; Mano derecha e izquierda</p>\r\n\r\n<p>&middot; Traba de picaporte interior</p>\r\n\r\n<p>&middot; 2 llaves</p>', 'BB', 'on', 3, '2019-08-08 07:17:53', '2019-08-08 08:15:09'),
(8, 'Cerrojo de aplicar con cerradura eléctrica y picaporte', '830', '<p>&middot; Cuerpo de bronce inyectado de 2,5 mm de espesor</p>\r\n\r\n<p>&middot; Contrachapa de bronce. Yale laminada</p>\r\n\r\n<p>&middot; Pasador con pernos giratorios</p>\r\n\r\n<p>&middot; Mano derecha e izquierda</p>\r\n\r\n<p>&middot; Traba de picaporte interior</p>\r\n\r\n<p>&middot; 2 llaves</p>', 'EE', 'off', 3, '2019-08-08 07:29:47', '2019-08-08 07:30:17'),
(9, 'Cerrojo de aplicar postiza bronce pulido', '994', '<p>&middot; Cuerpo de bronce inyectado de 2,5 mm de espesor</p>\r\n\r\n<p>&middot; Contrachapa de bronce. Yale laminada</p>\r\n\r\n<p>&middot; Pasador con pernos giratorios</p>\r\n\r\n<p>&middot; Mano derecha e izquierda</p>\r\n\r\n<p>&middot; Traba de picaporte interior</p>\r\n\r\n<p>&middot; 2 llaves</p>', 'FF', 'off', 3, '2019-08-08 07:29:52', '2019-08-08 07:30:30'),
(10, 'Cerrojo de aplicar postiza bronce platil', '995', '<p>&middot; Cuerpo de bronce inyectado de 2,5 mm de espesor</p>\r\n\r\n<p>&middot; Contrachapa de bronce. Yale laminada</p>\r\n\r\n<p>&middot; Pasador con pernos giratorios</p>\r\n\r\n<p>&middot; Mano derecha e izquierda</p>\r\n\r\n<p>&middot; Traba de picaporte interior</p>\r\n\r\n<p>&middot; 2 llaves</p>', 'GG', 'off', 3, '2019-08-08 07:29:58', '2019-08-08 07:30:37'),
(11, 'Chapón y contrachapa plateado', '84', '<p>&middot; Cuerpo de bronce inyectado de 2,5 mm de espesor</p>\r\n\r\n<p>&middot; Contrachapa de bronce. Yale laminada</p>\r\n\r\n<p>&middot; Pasador con pernos giratorios</p>\r\n\r\n<p>&middot; Mano derecha e izquierda</p>\r\n\r\n<p>&middot; Traba de picaporte interior</p>\r\n\r\n<p>&middot; 2 llaves</p>', 'HH', 'off', 3, '2019-08-08 07:30:02', '2019-08-08 07:31:04'),
(12, '1 D-01 / 1 D-05 / 1 D-11  / 2 D-17', 'KIT-100', '<p>&middot; Z&oacute;calo para freno con vuelo</p>\r\n\r\n<p>&middot; &nbsp;Z&oacute;calo con pivote y vuelo</p>\r\n\r\n<p>&middot; Buje de pivotaci&oacute;n superior</p>\r\n\r\n<p>&middot; Cerradura tipo z&oacute;calo con mecanismo a piso o techo</p>\r\n\r\n<p>&middot; Material: Lat&oacute;n</p>\r\n\r\n<p>&middot; Observaciones: Sin mano</p>', 'AA', 'on', 6, '2019-08-08 08:42:29', '2019-08-08 08:42:39'),
(13, '1 D-01 / 1 D-05 / 1 D-11  / 2 D-17', 'KIT-100', '<p>&middot; Z&oacute;calo para freno con vuelo</p>\r\n\r\n<p>&middot; &nbsp;Z&oacute;calo con pivote y vuelo</p>\r\n\r\n<p>&middot; Buje de pivotaci&oacute;n superior</p>\r\n\r\n<p>&middot; Cerradura tipo z&oacute;calo con mecanismo a piso o techo</p>\r\n\r\n<p>&middot; Material: Lat&oacute;n</p>\r\n\r\n<p>&middot; Observaciones: Sin mano</p>', 'AA', 'on', 6, '2019-08-08 08:46:42', '2019-08-08 08:46:42'),
(14, '1 D-01 / 1 D-05 / 1 D-11  / 2 D-17', 'KIT-100', '<p>&middot; Z&oacute;calo para freno con vuelo</p>\r\n\r\n<p>&middot; &nbsp;Z&oacute;calo con pivote y vuelo</p>\r\n\r\n<p>&middot; Buje de pivotaci&oacute;n superior</p>\r\n\r\n<p>&middot; Cerradura tipo z&oacute;calo con mecanismo a piso o techo</p>\r\n\r\n<p>&middot; Material: Lat&oacute;n</p>\r\n\r\n<p>&middot; Observaciones: Sin mano</p>', 'AA', 'on', 6, '2019-08-08 08:46:43', '2019-08-08 08:46:43'),
(15, '1 D-01 / 1 D-05 / 1 D-11  / 2 D-17', 'KIT-100', '<p>&middot; Z&oacute;calo para freno con vuelo</p>\r\n\r\n<p>&middot; &nbsp;Z&oacute;calo con pivote y vuelo</p>\r\n\r\n<p>&middot; Buje de pivotaci&oacute;n superior</p>\r\n\r\n<p>&middot; Cerradura tipo z&oacute;calo con mecanismo a piso o techo</p>\r\n\r\n<p>&middot; Material: Lat&oacute;n</p>\r\n\r\n<p>&middot; Observaciones: Sin mano</p>', 'AA', 'on', 6, '2019-08-08 08:46:44', '2019-08-08 08:46:44');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `producto_colors`
--

CREATE TABLE `producto_colors` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `image` text COLLATE utf8mb4_unicode_ci,
  `order` text COLLATE utf8mb4_unicode_ci,
  `title_es` text COLLATE utf8mb4_unicode_ci,
  `product_id` bigint(20) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `producto_colors`
--

INSERT INTO `producto_colors` (`id`, `image`, `order`, `title_es`, `product_id`, `created_at`, `updated_at`) VALUES
(2, '30p1-pulido.jpg', 'AA', 'Pulido', 1, '2019-08-08 07:09:30', '2019-08-08 07:09:30'),
(3, '41p1-niquel.jpg', 'BB', 'Niquel', 1, '2019-08-08 07:09:41', '2019-08-08 07:09:41'),
(6, '30p1-pulido.jpg', 'AA', 'Pulido', 5, '2019-08-08 07:15:47', '2019-08-08 07:15:47'),
(7, '41p1-niquel.jpg', 'BB', 'Niquel', 5, '2019-08-08 07:15:47', '2019-08-08 07:15:47'),
(8, '30p1-pulido.jpg', 'AA', 'Pulido', 6, '2019-08-08 07:17:20', '2019-08-08 07:17:20'),
(9, '41p1-niquel.jpg', 'BB', 'Niquel', 6, '2019-08-08 07:17:20', '2019-08-08 07:17:20'),
(10, '30p1-pulido.jpg', 'AA', 'Pulido', 7, '2019-08-08 07:17:53', '2019-08-08 07:17:53'),
(11, '41p1-niquel.jpg', 'BB', 'Niquel', 7, '2019-08-08 07:17:53', '2019-08-08 07:17:53'),
(12, '30p1-pulido.jpg', 'AA', 'Pulido', 8, '2019-08-08 07:29:47', '2019-08-08 07:29:47'),
(13, '41p1-niquel.jpg', 'BB', 'Niquel', 8, '2019-08-08 07:29:47', '2019-08-08 07:29:47'),
(14, '30p1-pulido.jpg', 'AA', 'Pulido', 9, '2019-08-08 07:29:53', '2019-08-08 07:29:53'),
(15, '41p1-niquel.jpg', 'BB', 'Niquel', 9, '2019-08-08 07:29:53', '2019-08-08 07:29:53'),
(16, '30p1-pulido.jpg', 'AA', 'Pulido', 10, '2019-08-08 07:29:59', '2019-08-08 07:29:59'),
(17, '41p1-niquel.jpg', 'BB', 'Niquel', 10, '2019-08-08 07:29:59', '2019-08-08 07:29:59'),
(18, '30p1-pulido.jpg', 'AA', 'Pulido', 11, '2019-08-08 07:30:03', '2019-08-08 07:30:03'),
(19, '41p1-niquel.jpg', 'BB', 'Niquel', 11, '2019-08-08 07:30:03', '2019-08-08 07:30:03'),
(20, '37KITS.jpg', 'AA', 'Pulido', 12, '2019-08-08 08:43:37', '2019-08-08 08:43:37'),
(21, '37KITS.jpg', 'BB', 'Niquel', 12, '2019-08-08 08:43:42', '2019-08-08 08:43:42'),
(22, '37KITS.jpg', 'AA', 'Pulido', 13, '2019-08-08 08:46:42', '2019-08-08 08:46:42'),
(23, '37KITS.jpg', 'BB', 'Niquel', 13, '2019-08-08 08:46:42', '2019-08-08 08:46:42'),
(24, '37KITS.jpg', 'AA', 'Pulido', 14, '2019-08-08 08:46:43', '2019-08-08 08:46:43'),
(25, '37KITS.jpg', 'BB', 'Niquel', 14, '2019-08-08 08:46:43', '2019-08-08 08:46:43'),
(26, '37KITS.jpg', 'AA', 'Pulido', 15, '2019-08-08 08:46:44', '2019-08-08 08:46:44'),
(27, '37KITS.jpg', 'BB', 'Niquel', 15, '2019-08-08 08:46:44', '2019-08-08 08:46:44');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `producto_familias`
--

CREATE TABLE `producto_familias` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `image` text COLLATE utf8mb4_unicode_ci,
  `title_es` text COLLATE utf8mb4_unicode_ci,
  `order` text COLLATE utf8mb4_unicode_ci,
  `level` text COLLATE utf8mb4_unicode_ci,
  `family_id` bigint(20) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `producto_familias`
--

INSERT INTO `producto_familias` (`id`, `image`, `title_es`, `order`, `level`, `family_id`, `created_at`, `updated_at`) VALUES
(0, NULL, 'CATEGORIA PRINCIPAL', 'A', NULL, NULL, NULL, NULL),
(1, '38AA.jpg', 'Cerraduras eléctricas', 'AA', NULL, 0, '2019-08-08 06:44:38', '2019-08-08 06:44:38'),
(2, '48BB.jpg', 'Postizos para puerta de cristal', 'BB', NULL, 0, '2019-08-08 06:44:48', '2019-08-08 06:44:48'),
(3, '59CC.jpg', 'Cerrojos para puerta de cristal', 'CC', NULL, 0, '2019-08-08 06:44:59', '2019-08-08 06:44:59'),
(4, '10DD.jpg', 'Herrajes para blindex', 'DD', NULL, 0, '2019-08-08 06:45:10', '2019-08-08 06:45:10'),
(5, '21EE.jpg', 'Productos especiales', 'EE', NULL, 0, '2019-08-08 06:45:21', '2019-08-08 06:45:21'),
(6, '08KITS.jpg', 'KITS', 'AA', NULL, 5, '2019-08-08 08:41:08', '2019-08-08 08:41:08'),
(7, '08KITS.jpg', 'LÍNEA D', 'BB', NULL, 5, '2019-08-08 08:41:19', '2019-08-08 08:41:19'),
(8, '08KITS.jpg', 'LÍNEA P', 'CC', NULL, 5, '2019-08-08 08:41:27', '2019-08-08 08:41:27');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `producto_imagens`
--

CREATE TABLE `producto_imagens` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `image` text COLLATE utf8mb4_unicode_ci,
  `order` text COLLATE utf8mb4_unicode_ci,
  `product_id` bigint(20) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `producto_imagens`
--

INSERT INTO `producto_imagens` (`id`, `image`, `order`, `product_id`, `created_at`, `updated_at`) VALUES
(1, '53AA.jpg', 'AA', 1, '2019-08-08 06:59:15', '2019-08-08 07:12:53'),
(2, '52e.jpg', 'BB', 1, '2019-08-08 07:11:52', '2019-08-08 07:11:52'),
(5, '36CC.jpg', 'AA', 5, '2019-08-08 07:15:47', '2019-08-08 07:21:36'),
(6, '52e.jpg', 'BB', 5, '2019-08-08 07:15:47', '2019-08-08 07:15:47'),
(7, '58DD.jpg', 'AA', 6, '2019-08-08 07:17:19', '2019-08-08 07:21:58'),
(8, '52e.jpg', 'BB', 6, '2019-08-08 07:17:20', '2019-08-08 07:17:20'),
(9, '32BB.jpg', 'AA', 7, '2019-08-08 07:17:53', '2019-08-08 07:18:32'),
(10, '52e.jpg', 'BB', 7, '2019-08-08 07:17:53', '2019-08-08 07:17:53'),
(11, '53AA.jpg', 'AA', 8, '2019-08-08 07:29:47', '2019-08-08 07:29:47'),
(12, '52e.jpg', 'BB', 8, '2019-08-08 07:29:47', '2019-08-08 07:29:47'),
(13, '32BB.jpg', 'AA', 9, '2019-08-08 07:29:53', '2019-08-08 07:29:53'),
(14, '52e.jpg', 'BB', 9, '2019-08-08 07:29:53', '2019-08-08 07:29:53'),
(15, '36CC.jpg', 'AA', 10, '2019-08-08 07:29:58', '2019-08-08 07:29:58'),
(16, '52e.jpg', 'BB', 10, '2019-08-08 07:29:59', '2019-08-08 07:29:59'),
(17, '58DD.jpg', 'AA', 11, '2019-08-08 07:30:02', '2019-08-08 07:30:02'),
(18, '52e.jpg', 'BB', 11, '2019-08-08 07:30:02', '2019-08-08 07:30:02'),
(19, '58KITS.jpg', 'AA', 12, '2019-08-08 08:42:29', '2019-08-08 08:42:58'),
(20, '58KITS.jpg', 'AA', 13, '2019-08-08 08:46:42', '2019-08-08 08:46:42'),
(21, '58KITS.jpg', 'AA', 14, '2019-08-08 08:46:43', '2019-08-08 08:46:43'),
(22, '58KITS.jpg', 'AA', 15, '2019-08-08 08:46:44', '2019-08-08 08:46:44');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `producto_planos`
--

CREATE TABLE `producto_planos` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `image` text COLLATE utf8mb4_unicode_ci,
  `order` text COLLATE utf8mb4_unicode_ci,
  `product_id` bigint(20) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `producto_planos`
--

INSERT INTO `producto_planos` (`id`, `image`, `order`, `product_id`, `created_at`, `updated_at`) VALUES
(1, '14p1.jpg', 'AA', 1, '2019-08-08 07:10:14', '2019-08-08 07:10:14'),
(2, '22p2.png', 'BB', 1, '2019-08-08 07:10:22', '2019-08-08 07:10:22'),
(5, '14p1.jpg', 'AA', 5, '2019-08-08 07:15:48', '2019-08-08 07:15:48'),
(6, '22p2.png', 'BB', 5, '2019-08-08 07:15:48', '2019-08-08 07:15:48'),
(7, '14p1.jpg', 'AA', 6, '2019-08-08 07:17:20', '2019-08-08 07:17:20'),
(8, '22p2.png', 'BB', 6, '2019-08-08 07:17:20', '2019-08-08 07:17:20'),
(9, '14p1.jpg', 'AA', 7, '2019-08-08 07:17:54', '2019-08-08 07:17:54'),
(10, '22p2.png', 'BB', 7, '2019-08-08 07:17:54', '2019-08-08 07:17:54'),
(11, '14p1.jpg', 'AA', 8, '2019-08-08 07:29:47', '2019-08-08 07:29:47'),
(12, '22p2.png', 'BB', 8, '2019-08-08 07:29:47', '2019-08-08 07:29:47'),
(13, '14p1.jpg', 'AA', 9, '2019-08-08 07:29:53', '2019-08-08 07:29:53'),
(14, '22p2.png', 'BB', 9, '2019-08-08 07:29:53', '2019-08-08 07:29:53'),
(15, '14p1.jpg', 'AA', 10, '2019-08-08 07:29:59', '2019-08-08 07:29:59'),
(16, '22p2.png', 'BB', 10, '2019-08-08 07:29:59', '2019-08-08 07:29:59'),
(17, '14p1.jpg', 'AA', 11, '2019-08-08 07:30:03', '2019-08-08 07:30:03'),
(18, '22p2.png', 'BB', 11, '2019-08-08 07:30:03', '2019-08-08 07:30:03'),
(19, '25p10.jpg', 'AA', 12, '2019-08-08 08:44:25', '2019-08-08 08:44:25'),
(20, '43p20.jpg', 'BB', 12, '2019-08-08 08:44:43', '2019-08-08 08:44:43'),
(21, '25p10.jpg', 'AA', 13, '2019-08-08 08:46:43', '2019-08-08 08:46:43'),
(22, '43p20.jpg', 'BB', 13, '2019-08-08 08:46:43', '2019-08-08 08:46:43'),
(23, '25p10.jpg', 'AA', 14, '2019-08-08 08:46:43', '2019-08-08 08:46:43'),
(24, '43p20.jpg', 'BB', 14, '2019-08-08 08:46:44', '2019-08-08 08:46:44'),
(25, '25p10.jpg', 'AA', 15, '2019-08-08 08:46:44', '2019-08-08 08:46:44'),
(26, '43p20.jpg', 'BB', 15, '2019-08-08 08:46:44', '2019-08-08 08:46:44');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `reds`
--

CREATE TABLE `reds` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `image` text COLLATE utf8mb4_unicode_ci,
  `route` text COLLATE utf8mb4_unicode_ci,
  `order` text COLLATE utf8mb4_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `reds`
--

INSERT INTO `reds` (`id`, `image`, `route`, `order`, `created_at`, `updated_at`) VALUES
(1, 'facebook.png', 'https://www.facebook.com/', 'AA', NULL, NULL),
(2, 'instagram.png', 'https://www.instagram.com/?hl=es-la', 'BB', NULL, NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `sliders`
--

CREATE TABLE `sliders` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `image` text COLLATE utf8mb4_unicode_ci,
  `order` text COLLATE utf8mb4_unicode_ci,
  `section` text COLLATE utf8mb4_unicode_ci,
  `type` text COLLATE utf8mb4_unicode_ci,
  `title_es` text COLLATE utf8mb4_unicode_ci,
  `text_es` text COLLATE utf8mb4_unicode_ci,
  `subtitle_es` text COLLATE utf8mb4_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `sliders`
--

INSERT INTO `sliders` (`id`, `image`, `order`, `section`, `type`, `title_es`, `text_es`, `subtitle_es`, `created_at`, `updated_at`) VALUES
(1, 's1.jpg', 'AA', 'home', '1i-1t', '', '<p><strong>CERRADURAS ELECTRICAS</strong></p>\r\n\r\n<p>Y CERROJOS DE SEGURIDAD</p>', '', NULL, '2019-07-29 05:59:29'),
(2, 's2.jpg', 'AA', 'empresa', '1i-1t', '', '<p>A disposición de nuestros clientes todo nuestro conocimiento y la gran vocación de atención y servicio que nos caracteriza como empresa familiar.</p>', '', NULL, NULL);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `admins`
--
ALTER TABLE `admins`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `admins_username_unique` (`username`);

--
-- Indices de la tabla `contents`
--
ALTER TABLE `contents`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `data`
--
ALTER TABLE `data`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `distribuidors`
--
ALTER TABLE `distribuidors`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `logos`
--
ALTER TABLE `logos`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `metadata`
--
ALTER TABLE `metadata`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `novedad_articulos`
--
ALTER TABLE `novedad_articulos`
  ADD PRIMARY KEY (`id`),
  ADD KEY `novedad_articulos_novedad_id_foreign` (`novedad_id`);

--
-- Indices de la tabla `novedad_categorias`
--
ALTER TABLE `novedad_categorias`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `productos`
--
ALTER TABLE `productos`
  ADD PRIMARY KEY (`id`),
  ADD KEY `productos_family_id_foreign` (`family_id`);

--
-- Indices de la tabla `producto_colors`
--
ALTER TABLE `producto_colors`
  ADD PRIMARY KEY (`id`),
  ADD KEY `producto_colors_product_id_foreign` (`product_id`);

--
-- Indices de la tabla `producto_familias`
--
ALTER TABLE `producto_familias`
  ADD PRIMARY KEY (`id`),
  ADD KEY `producto_familias_family_id_foreign` (`family_id`);

--
-- Indices de la tabla `producto_imagens`
--
ALTER TABLE `producto_imagens`
  ADD PRIMARY KEY (`id`),
  ADD KEY `producto_imagens_product_id_foreign` (`product_id`);

--
-- Indices de la tabla `producto_planos`
--
ALTER TABLE `producto_planos`
  ADD PRIMARY KEY (`id`),
  ADD KEY `producto_planos_product_id_foreign` (`product_id`);

--
-- Indices de la tabla `reds`
--
ALTER TABLE `reds`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `sliders`
--
ALTER TABLE `sliders`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `admins`
--
ALTER TABLE `admins`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `contents`
--
ALTER TABLE `contents`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de la tabla `data`
--
ALTER TABLE `data`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT de la tabla `distribuidors`
--
ALTER TABLE `distribuidors`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `logos`
--
ALTER TABLE `logos`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `metadata`
--
ALTER TABLE `metadata`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT de la tabla `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT de la tabla `novedad_articulos`
--
ALTER TABLE `novedad_articulos`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT de la tabla `novedad_categorias`
--
ALTER TABLE `novedad_categorias`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `productos`
--
ALTER TABLE `productos`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT de la tabla `producto_colors`
--
ALTER TABLE `producto_colors`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT de la tabla `producto_familias`
--
ALTER TABLE `producto_familias`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT de la tabla `producto_imagens`
--
ALTER TABLE `producto_imagens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT de la tabla `producto_planos`
--
ALTER TABLE `producto_planos`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT de la tabla `reds`
--
ALTER TABLE `reds`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `sliders`
--
ALTER TABLE `sliders`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `novedad_articulos`
--
ALTER TABLE `novedad_articulos`
  ADD CONSTRAINT `novedad_articulos_novedad_id_foreign` FOREIGN KEY (`novedad_id`) REFERENCES `novedad_categorias` (`id`) ON DELETE CASCADE;

--
-- Filtros para la tabla `productos`
--
ALTER TABLE `productos`
  ADD CONSTRAINT `productos_family_id_foreign` FOREIGN KEY (`family_id`) REFERENCES `producto_familias` (`id`) ON DELETE CASCADE;

--
-- Filtros para la tabla `producto_colors`
--
ALTER TABLE `producto_colors`
  ADD CONSTRAINT `producto_colors_product_id_foreign` FOREIGN KEY (`product_id`) REFERENCES `productos` (`id`) ON DELETE CASCADE;

--
-- Filtros para la tabla `producto_familias`
--
ALTER TABLE `producto_familias`
  ADD CONSTRAINT `producto_familias_family_id_foreign` FOREIGN KEY (`family_id`) REFERENCES `producto_familias` (`id`) ON DELETE CASCADE;

--
-- Filtros para la tabla `producto_imagens`
--
ALTER TABLE `producto_imagens`
  ADD CONSTRAINT `producto_imagens_product_id_foreign` FOREIGN KEY (`product_id`) REFERENCES `productos` (`id`) ON DELETE CASCADE;

--
-- Filtros para la tabla `producto_planos`
--
ALTER TABLE `producto_planos`
  ADD CONSTRAINT `producto_planos_product_id_foreign` FOREIGN KEY (`product_id`) REFERENCES `productos` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
