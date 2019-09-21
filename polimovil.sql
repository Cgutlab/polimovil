-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 21-09-2019 a las 04:45:04
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
-- Base de datos: `polimovil`
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
(1, 'Pablo', 'pablo', 'admin', 'on', NULL, '$2y$10$oFQ73GQ79EuuI7UqPbFgLujjlkPPE.X7OoUezJa5DG20hat60cSZS', NULL, NULL, NULL),
(2, 'Carlos', 'carlos', 'user', 'on', NULL, '$2y$10$fIMF/A2zSeSqiKds/YJZVuLL..oDSL2gv03ZdKTncegMgr8aR5YcO', NULL, NULL, NULL);

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
(1, 'home', 'AA', '1i-2c', 'La línea más completa de ruedas industriales y para muebles', NULL, '<p>Somos una empresa dedicada hace m&aacute;s de 40 a&ntilde;os a la fabricaci&oacute;n y distribuci&oacute;n de ruedas Industriales, para muebles, equipamiento hospitalario y otros usos m&uacute;ltiples.</p>', '13img1.png', NULL, NULL, '2019-09-11 04:24:13', '2019-09-11 04:24:13'),
(2, 'home', 'BB', '1i-2c', 'Solicite un presupuesto', NULL, '<p>F&aacute;cil, r&aacute;pido y online</p>', '38img2.jpg', NULL, NULL, '2019-09-11 04:24:38', '2019-09-11 04:25:42'),
(3, 'empresa', NULL, '1i-2c', 'Empresa', NULL, '<p>Somos una empresa dedicada a la fabricaci&oacute;n y distribuci&oacute;n de ruedas Industriales, para muebles, equipamiento hospitalario y usos m&uacute;ltiples. Contamos con una amplia variedad de modelos y medidas para todo tipo de necesidad del mercado.</p>\r\n\r\n<p>POLIM&Oacute;VILRUEDAS ofrece 40 a&ntilde;os de experiencia para solucionar sus problemas en la utilizaci&oacute;n de ruedas.</p>\r\n\r\n<p>Contamos con la l&iacute;nea m&aacute;s completa del mercado en ruedas industriales y para muebles.</p>\r\n\r\n<p>Nuestro equipo de personal especializado pone a disposici&oacute;n su amplia experiencia para satisfacer las necesidades de los clientes.</p>', '13c22.jpg', NULL, NULL, '2019-09-13 03:09:13', '2019-09-13 03:09:13');

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
(1, 'direccion', '<p>Tres Arroyos 262, C1414EAD, Ciudad Aut&oacute;noma de Buenos Aires</p>', 'Tres Arroyos 262, C1414EAD, Ciudad Autónoma de Buenos Aires', NULL, '2019-09-11 04:11:41'),
(2, 'telefono1', '<p>(011) 4854-2564</p>', '01148542564', NULL, '2019-09-11 04:11:57'),
(3, 'correo', '<p>info@polimovilruedas.com.ar</p>', 'info@polimovilruedas.com.ar', NULL, '2019-09-11 04:12:08'),
(4, 'whatsappFlotante', '15-2188-1903', '1521881903', NULL, '2019-09-11 04:12:15'),
(5, 'telefono2', '<p>(011) 4856-7266</p>', '01148567266', NULL, '2019-09-11 04:12:34'),
(6, 'whatsapp', '<p>Whats App 15-2188-1903</p>', '1521881903', NULL, '2019-09-11 04:12:48'),
(7, 'info_contacto', 'Términos y condiciones de privacidad...', 'Términos y condiciones de privacidad...', NULL, NULL),
(8, 'info_google', 'api-google', '#', NULL, NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `descargas`
--

CREATE TABLE `descargas` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `image` text COLLATE utf8mb4_unicode_ci,
  `title_es` text COLLATE utf8mb4_unicode_ci,
  `order` text COLLATE utf8mb4_unicode_ci,
  `file` text COLLATE utf8mb4_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `descargas`
--

INSERT INTO `descargas` (`id`, `image`, `title_es`, `order`, `file`, `created_at`, `updated_at`) VALUES
(1, '00d1.jpg', 'Catálogo Global de Productos', 'AA', '00d1.jpg', '2019-09-19 05:23:40', '2019-09-19 05:28:00');

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
(1, 'header', '54default.png', NULL, '2019-09-11 04:10:54'),
(2, 'footer', '45default.png', NULL, '2019-09-11 04:10:45'),
(3, 'favicon', '37default.png', NULL, '2019-09-11 04:10:37'),
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
(1, 'home', 'Palabras Clave', 'Descripcion Para la búsqueda avanzada', NULL, NULL),
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
(11, '2019_07_25_225918_create_novedad_categorias_table', 1),
(12, '2019_07_25_225935_create_novedad_articulos_table', 1),
(19, '2019_09_11_002722_create_usos_table', 2),
(20, '2019_09_11_002947_create_uso_imagens_table', 2),
(21, '2019_09_11_004617_create_descargas_table', 2);

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
  `file` text COLLATE utf8mb4_unicode_ci,
  `novedad_id` bigint(20) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `novedad_articulos`
--

INSERT INTO `novedad_articulos` (`id`, `image`, `extract_es`, `title_es`, `subtitle_es`, `text_es`, `file`, `novedad_id`, `created_at`, `updated_at`) VALUES
(1, 'n1.jpg', 'Estaremos presentes en la ExpoFerretera. Los invitamos a visitarnos del 3 al 6 de Junio en el Centro de Exposiciones Costa Salguero.', 'Eventos', '', '<p><strong>EXPOFERRETERA, La Exposición Internacional de Artículos para Ferreterías, Sanitarios, Pinturerías y Materiales de Construcción</strong></p><p>Estaremos presentes en la ExpoFerretera. Los invitamos a visitarnos del 3 al 6 de Junio en el Centro de Exposiciones Costa Salguero. <br>Consolidada como el evento más relevante del sector en Sudamérica, ExpoFerretera se celebra cada dos años en Buenos Aires englobando a todo el mercado de la fabricación e importación de productos para la construcción y maquinarias de uso domiciliario o industrial. Bienalmente, refleja la situación actual de la industria, exhibe los principales avances tecnológicos e impulsa la capacitación.</p>', NULL, 1, NULL, NULL),
(2, 'n2.jpg', 'Hemos actualizado nuestra sección de distribuidores para que encuentres todo lo que necesitás cerca tuyo.', 'Eventos', '', '', NULL, 1, NULL, NULL),
(3, 'n3.jpg', 'Estaremos presentes en la ExpoFerretera. Los invitamos a visitarnos del 3 al 6 de Junio en el Centro de Exposiciones Costa Salguero.', 'Promociones', '', '', NULL, 2, NULL, NULL),
(4, 'n4.jpg', 'Hemos actualizado nuestra sección de distribuidores para que encuentres todo lo que necesitás cerca tuyo.', 'Productos', '', '', NULL, 3, NULL, NULL);

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
  `document` text COLLATE utf8mb4_unicode_ci,
  `code` text COLLATE utf8mb4_unicode_ci,
  `text_es` text COLLATE utf8mb4_unicode_ci,
  `order` text COLLATE utf8mb4_unicode_ci,
  `outstanding` text COLLATE utf8mb4_unicode_ci,
  `file` text COLLATE utf8mb4_unicode_ci,
  `keyword_es` text COLLATE utf8mb4_unicode_ci,
  `family_id` bigint(20) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `productos`
--

INSERT INTO `productos` (`id`, `title_es`, `document`, `code`, `text_es`, `order`, `outstanding`, `file`, `keyword_es`, `family_id`, `created_at`, `updated_at`) VALUES
(20, 'Base Giratoria', '29e1.jpg', NULL, '<p>&bull; N&uacute;cleo de pol&iacute;mero bada de goma el&aacute;stica azul con rodamiento a rodillo.</p>\r\n\r\n<p>&bull; Antivibraciones</p>\r\n\r\n<p>&bull; Especialmente indicada para equipos de sonido, electr&oacute;nicos y todos aquellos que requieren desplazamiento amortiguado.</p>', 'AA', NULL, NULL, 'Rueda Elástica Goma Giratoria', 1, '2019-09-17 03:29:47', '2019-09-17 03:29:47'),
(28, 'Base Giratoria con Freno', 'C:\\xampp\\tmp\\php79EF.tmp', NULL, '<p>&bull; N&uacute;cleo de pol&iacute;mero bada de goma el&aacute;stica azul con rodamiento a rodillo.</p>\r\n\r\n<p>&bull; Antivibraciones</p>\r\n\r\n<p>&bull; Especialmente indicada para equipos de sonido, electr&oacute;nicos y todos aquellos que requieren desplazamiento amortiguado.</p>', 'BB', NULL, NULL, 'Ruedas Elástica Goma Giratoria Freno', 1, '2019-09-17 03:41:27', '2019-09-17 03:41:27'),
(29, 'Base Fija', '27e3.jpg', NULL, '<p>&bull; N&uacute;cleo de pol&iacute;mero bada de goma el&aacute;stica azul con rodamiento a rodillo.</p>\r\n\r\n<p>&bull; Antivibraciones</p>\r\n\r\n<p>&bull; Especialmente indicada para equipos de sonido, electr&oacute;nicos y todos aquellos que requieren desplazamiento amortiguado.</p>', 'CC', NULL, NULL, 'Ruedas Elástica Goma Base Fija', 1, '2019-09-17 03:43:27', '2019-09-17 03:43:27'),
(30, 'Rueda Suelta', '51e4.jpg', NULL, '<p>&bull; N&uacute;cleo de pol&iacute;mero bada de goma el&aacute;stica azul con rodamiento a rodillo.</p>\r\n\r\n<p>&bull; Antivibraciones</p>\r\n\r\n<p>&bull; Especialmente indicada para equipos de sonido, electr&oacute;nicos y todos aquellos que requieren desplazamiento amortiguado.</p>', 'DD', NULL, NULL, 'Ruedas Elástica Goma Rueda Suelta', 1, '2019-09-17 03:43:51', '2019-09-17 03:43:51');

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
(0, 'default.jpg', 'FAMILIA PRINCIPAL', 'A', '0', NULL, NULL, NULL),
(1, '2707f1.jpg', 'Industrial', 'AA', NULL, 0, '2019-09-13 03:22:07', '2019-09-13 03:27:31'),
(2, '42f2.jpg', 'Muebles', 'BB', NULL, 0, '2019-09-13 03:24:42', '2019-09-13 03:24:42'),
(3, '51f3.jpg', 'Hospitalaria', 'CC', NULL, 0, '2019-09-13 03:24:51', '2019-09-13 03:24:51'),
(4, '58f4.jpg', 'Inoxidables', 'DD', NULL, 0, '2019-09-13 03:24:58', '2019-09-13 03:24:58'),
(5, '05f5.jpg', 'Portones', 'EE', NULL, 0, '2019-09-13 03:25:05', '2019-09-13 03:25:05'),
(6, '13f6.jpg', 'Alta Temperatura', 'FF', NULL, 0, '2019-09-13 03:25:13', '2019-09-13 03:25:13'),
(7, '39f7.jpg', 'Zorras Hidráulicas', 'GG', NULL, 0, '2019-09-13 03:25:39', '2019-09-13 03:25:39'),
(8, '48f8.jpg', 'Cargas Pesadas', 'HH', NULL, 0, '2019-09-13 03:25:48', '2019-09-13 03:25:48'),
(9, '04f9.jpg', 'Neumáticas', 'II', NULL, 0, '2019-09-13 03:26:04', '2019-09-13 03:26:04'),
(10, '14f10.jpg', 'Carritos', 'JJ', NULL, 0, '2019-09-13 03:26:14', '2019-09-13 03:26:14'),
(11, '22f11.jpg', 'Andamios', 'KK', NULL, 0, '2019-09-13 03:26:22', '2019-09-13 03:26:22'),
(12, '29f12.jpg', 'Cortadora de Césped', 'LL', NULL, 0, '2019-09-13 03:26:29', '2019-09-13 03:26:29'),
(14, '08e1.jpg', 'Base Giratoria', 'AA', NULL, 1, '2019-09-13 03:35:08', '2019-09-13 03:35:08'),
(15, '32e2.jpg', 'Base Giratoria con Freno', 'BB', NULL, 1, '2019-09-13 03:35:32', '2019-09-13 03:35:32'),
(16, '51e3.jpg', 'Ruedas de Goma Negra', 'CC', NULL, 1, '2019-09-13 03:35:51', '2019-09-13 03:36:19');

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
(14, '34e1.jpg', 'AA', 20, '2019-09-17 03:29:47', '2019-09-17 03:34:34'),
(20, '27e2.jpg', 'AA', 28, '2019-09-17 03:41:27', '2019-09-17 03:41:27'),
(21, '27e3.jpg', 'AA', 29, '2019-09-17 03:43:27', '2019-09-17 03:43:27'),
(22, '52e4.jpg', 'AA', 30, '2019-09-17 03:43:52', '2019-09-17 03:43:52');

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
(1, 's1.jpg', 'AA', 'home', '1i-1t', '', '<p>Fabricaci&oacute;n y Distribuci&oacute;n de Ruedas Industriales</p>', '', NULL, '2019-09-11 04:28:09'),
(2, 's2.jpg', 'AA', 'empresa', '1i-1t', '', '<p>Ruedas de todo tipo para automotor e industria</p>', '', NULL, '2019-09-11 04:28:20');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usos`
--

CREATE TABLE `usos` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title_es` text COLLATE utf8mb4_unicode_ci,
  `text_es` text COLLATE utf8mb4_unicode_ci,
  `order` text COLLATE utf8mb4_unicode_ci,
  `outstanding` text COLLATE utf8mb4_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `usos`
--

INSERT INTO `usos` (`id`, `title_es`, `text_es`, `order`, `outstanding`, `created_at`, `updated_at`) VALUES
(8, 'Industrial', '<p>La industria&nbsp;necesita soluciones resistentes, livianas y con una terminaci&oacute;n est&eacute;tica cuidada.</p>\r\n\r\n<p>Dise&ntilde;o, innovaci&oacute;n y practicidad se unen en nuestra l&iacute;nea m&aacute;s completa del mercado en ruedas industriales. Nuestro equipo de personal especializado pone a disposici&oacute;n su amplia experiencia para satisfacer las necesidades de los clientes.</p>', 'AA', NULL, '2019-09-19 03:10:56', '2019-09-19 03:10:56'),
(9, 'Muebles', '<p>La industria del mueble necesita soluciones resistentes, livianas y con una terminaci&oacute;n est&eacute;tica cuidada.</p>\r\n\r\n<p>Dise&ntilde;o, innovaci&oacute;n y practicidad se unen en nuestra l&iacute;nea m&aacute;s completa del mercado en ruedas industriales y para muebles. Nuestro equipo de personal especializado pone a disposici&oacute;n su amplia experiencia para satisfacer las necesidades de los clientes.</p>', 'BB', NULL, '2019-09-19 03:13:45', '2019-09-19 04:20:35'),
(10, 'Muebles', '<p>La industria del mueble necesita soluciones resistentes, livianas y con una terminaci&oacute;n est&eacute;tica cuidada.</p>\r\n\r\n<p>Dise&ntilde;o, innovaci&oacute;n y practicidad se unen en nuestra l&iacute;nea m&aacute;s completa del mercado en ruedas industriales y para muebles. Nuestro equipo de personal especializado pone a disposici&oacute;n su amplia experiencia para satisfacer las necesidades de los clientes.</p>', 'CC', NULL, '2019-09-19 03:14:28', '2019-09-19 04:20:53'),
(11, 'Coche de bebé', '<p>La industria del mueble necesita soluciones resistentes, livianas y con una terminaci&oacute;n est&eacute;tica cuidada.</p>\r\n\r\n<p>Dise&ntilde;o, innovaci&oacute;n y practicidad se unen en nuestra l&iacute;nea m&aacute;s completa del mercado en ruedas industriales y para muebles. Nuestro equipo de personal especializado pone a disposici&oacute;n su amplia experiencia para satisfacer las necesidades de los clientes.</p>', 'DD', NULL, '2019-09-19 03:15:16', '2019-09-19 03:15:16'),
(12, 'Portones', '<p>La industria del mueble necesita soluciones resistentes, livianas y con una terminaci&oacute;n est&eacute;tica cuidada.</p>\r\n\r\n<p>Dise&ntilde;o, innovaci&oacute;n y practicidad se unen en nuestra l&iacute;nea m&aacute;s completa del mercado en ruedas industriales y para muebles. Nuestro equipo de personal especializado pone a disposici&oacute;n su amplia experiencia para satisfacer las necesidades de los clientes.</p>', 'EE', NULL, '2019-09-19 03:15:32', '2019-09-19 03:15:32'),
(13, 'Alta Temperatura', '<p>La industria del mueble necesita soluciones resistentes, livianas y con una terminaci&oacute;n est&eacute;tica cuidada.</p>\r\n\r\n<p>Dise&ntilde;o, innovaci&oacute;n y practicidad se unen en nuestra l&iacute;nea m&aacute;s completa del mercado en ruedas industriales y para muebles. Nuestro equipo de personal especializado pone a disposici&oacute;n su amplia experiencia para satisfacer las necesidades de los clientes.</p>', 'FF', NULL, '2019-09-19 03:15:48', '2019-09-19 03:15:48'),
(15, 'Zorras Hidráulicas', '<p>La industria del mueble necesita soluciones resistentes, livianas y con una terminaci&oacute;n est&eacute;tica cuidada.</p>\r\n\r\n<p>Dise&ntilde;o, innovaci&oacute;n y practicidad se unen en nuestra l&iacute;nea m&aacute;s completa del mercado en ruedas industriales y para muebles. Nuestro equipo de personal especializado pone a disposici&oacute;n su amplia experiencia para satisfacer las necesidades de los clientes.</p>', 'GG', NULL, '2019-09-19 03:16:27', '2019-09-19 03:16:27'),
(16, 'Cargas Pesadas', '<p>La industria del mueble necesita soluciones resistentes, livianas y con una terminaci&oacute;n est&eacute;tica cuidada.</p>\r\n\r\n<p>Dise&ntilde;o, innovaci&oacute;n y practicidad se unen en nuestra l&iacute;nea m&aacute;s completa del mercado en ruedas industriales y para muebles. Nuestro equipo de personal especializado pone a disposici&oacute;n su amplia experiencia para satisfacer las necesidades de los clientes.</p>', 'HH', NULL, '2019-09-19 03:16:44', '2019-09-19 03:16:44');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `uso_imagens`
--

CREATE TABLE `uso_imagens` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `image` text COLLATE utf8mb4_unicode_ci,
  `orden` text COLLATE utf8mb4_unicode_ci,
  `uso_id` bigint(20) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `uso_imagens`
--

INSERT INTO `uso_imagens` (`id`, `image`, `orden`, `uso_id`, `created_at`, `updated_at`) VALUES
(5, '46u2.jpg', 'AA', 9, '2019-09-19 03:13:46', '2019-09-19 03:13:46'),
(6, '28u3.jpg', 'AA', 10, '2019-09-19 03:14:28', '2019-09-19 03:14:28'),
(7, '16u4.jpg', 'AA', 11, '2019-09-19 03:15:16', '2019-09-19 03:15:16'),
(8, '33u5.jpg', 'AA', 12, '2019-09-19 03:15:33', '2019-09-19 03:15:33'),
(9, '48u6.jpg', 'AA', 13, '2019-09-19 03:15:48', '2019-09-19 03:15:48'),
(11, '27u7.jpg', 'AA', 15, '2019-09-19 03:16:27', '2019-09-19 03:16:27'),
(12, '44u8.jpg', 'AA', 16, '2019-09-19 03:16:44', '2019-09-19 03:16:44'),
(14, '4613c22.jpg', NULL, NULL, '2019-09-19 04:59:46', '2019-09-19 04:59:46'),
(15, '2713c22.jpg', 'AA', 8, '2019-09-19 05:01:27', '2019-09-19 05:06:49');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `uso_producto`
--

CREATE TABLE `uso_producto` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uso_id` bigint(20) UNSIGNED DEFAULT NULL,
  `producto_id` bigint(20) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `uso_producto`
--

INSERT INTO `uso_producto` (`id`, `uso_id`, `producto_id`, `created_at`, `updated_at`) VALUES
(4, 9, 20, NULL, NULL),
(5, 9, 28, NULL, NULL),
(6, 9, 29, NULL, NULL),
(7, 9, 30, NULL, NULL),
(8, 10, 28, NULL, NULL),
(9, 10, 30, NULL, NULL),
(10, 11, 20, NULL, NULL),
(11, 11, 28, NULL, NULL),
(12, 11, 29, NULL, NULL),
(13, 11, 30, NULL, NULL),
(14, 12, 29, NULL, NULL),
(15, 16, 20, NULL, NULL),
(16, 16, 29, NULL, NULL);

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
-- Indices de la tabla `descargas`
--
ALTER TABLE `descargas`
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
-- Indices de la tabla `usos`
--
ALTER TABLE `usos`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `uso_imagens`
--
ALTER TABLE `uso_imagens`
  ADD PRIMARY KEY (`id`),
  ADD KEY `uso_imagens_uso_id_foreign` (`uso_id`);

--
-- Indices de la tabla `uso_producto`
--
ALTER TABLE `uso_producto`
  ADD PRIMARY KEY (`id`),
  ADD KEY `uso_producto_uso_id_foreign` (`uso_id`),
  ADD KEY `uso_producto_producto_id_foreign` (`producto_id`);

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
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `data`
--
ALTER TABLE `data`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT de la tabla `descargas`
--
ALTER TABLE `descargas`
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
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT de la tabla `novedad_articulos`
--
ALTER TABLE `novedad_articulos`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `novedad_categorias`
--
ALTER TABLE `novedad_categorias`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `productos`
--
ALTER TABLE `productos`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT de la tabla `producto_familias`
--
ALTER TABLE `producto_familias`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT de la tabla `producto_imagens`
--
ALTER TABLE `producto_imagens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

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
-- AUTO_INCREMENT de la tabla `usos`
--
ALTER TABLE `usos`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT de la tabla `uso_imagens`
--
ALTER TABLE `uso_imagens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT de la tabla `uso_producto`
--
ALTER TABLE `uso_producto`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

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
-- Filtros para la tabla `uso_imagens`
--
ALTER TABLE `uso_imagens`
  ADD CONSTRAINT `uso_imagens_uso_id_foreign` FOREIGN KEY (`uso_id`) REFERENCES `usos` (`id`) ON DELETE CASCADE;

--
-- Filtros para la tabla `uso_producto`
--
ALTER TABLE `uso_producto`
  ADD CONSTRAINT `uso_producto_producto_id_foreign` FOREIGN KEY (`producto_id`) REFERENCES `productos` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `uso_producto_uso_id_foreign` FOREIGN KEY (`uso_id`) REFERENCES `usos` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
