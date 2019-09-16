-- --------------------------------------------------------
-- Host:                         127.0.0.1
-- Versión del servidor:         5.7.14 - MySQL Community Server (GPL)
-- SO del servidor:              Win64
-- HeidiSQL Versión:             9.3.0.4984
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8mb4 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;

-- Volcando estructura de base de datos para castidavi
CREATE DATABASE IF NOT EXISTS `castidavi` /*!40100 DEFAULT CHARACTER SET latin1 */;
USE `castidavi`;


-- Volcando estructura para tabla castidavi.casas
CREATE TABLE IF NOT EXISTS `casas` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(100) DEFAULT NULL,
  `direccion` varchar(500) DEFAULT NULL,
  `cuartos` int(11) DEFAULT NULL,
  `mts_construc` int(11) DEFAULT NULL,
  `mts_terreno` int(11) DEFAULT NULL,
  `plantas` int(11) DEFAULT NULL,
  `fecha` date DEFAULT NULL,
  `costo` decimal(15,2) DEFAULT NULL,
  `giro_id` bigint(20) DEFAULT NULL,
  `imagen` varchar(50) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `giro_id` (`giro_id`),
  CONSTRAINT `FK_casas_giros` FOREIGN KEY (`giro_id`) REFERENCES `giros` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=30 DEFAULT CHARSET=latin1;

-- Volcando datos para la tabla castidavi.casas: ~5 rows (aproximadamente)
/*!40000 ALTER TABLE `casas` DISABLE KEYS */;
INSERT INTO `casas` (`id`, `nombre`, `direccion`, `cuartos`, `mts_construc`, `mts_terreno`, `plantas`, `fecha`, `costo`, `giro_id`, `imagen`, `created_at`, `updated_at`) VALUES
	(19, 'test4', 'test4', 1, 2, 3, 4, '2019-01-01', 1.00, 1, '1568633709.jpg', '2019-09-16 10:23:00', '2019-09-16 11:35:09'),
	(25, 'test10', 'test10', 5, 100, 200, 2, '2010-10-31', 200000.00, 1, '1568633745.jpg', '2019-09-16 11:35:45', '2019-09-16 11:35:45'),
	(26, 'test11', 'test11', 4, 20000, 200, 2, '2019-01-01', 100.00, 1, '1568633777.jpg', '2019-09-16 11:36:17', '2019-09-16 11:36:17'),
	(27, 'test12', 'test12', 10, 1000, 20000, 3, '2019-12-20', 10000000.00, 1, '1568633868.jpg', '2019-09-16 11:36:44', '2019-09-16 11:37:48'),
	(28, 'test13', 'test13', 3, 100, 200, 2, '2015-10-23', 10000.20, 2, '1568634878.png', '2019-09-16 11:54:38', '2019-09-16 11:56:25'),
	(29, 'test14', 'test14', 3, 1000, 20000, 4, '2002-12-30', 100020.50, 4, '1568635082.jpg', '2019-09-16 11:58:02', '2019-09-16 11:58:02');
/*!40000 ALTER TABLE `casas` ENABLE KEYS */;


-- Volcando estructura para tabla castidavi.files
CREATE TABLE IF NOT EXISTS `files` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `nombre` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tipo` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `extencion` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `fecha` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tiempo` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Volcando datos para la tabla castidavi.files: 0 rows
/*!40000 ALTER TABLE `files` DISABLE KEYS */;
/*!40000 ALTER TABLE `files` ENABLE KEYS */;


-- Volcando estructura para tabla castidavi.giros
CREATE TABLE IF NOT EXISTS `giros` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Volcando datos para la tabla castidavi.giros: ~4 rows (aproximadamente)
/*!40000 ALTER TABLE `giros` DISABLE KEYS */;
INSERT INTO `giros` (`id`, `nombre`, `created_at`, `updated_at`) VALUES
	(1, 'Casas', NULL, NULL),
	(2, 'Hoteles', NULL, NULL),
	(3, 'Hospitales', NULL, NULL),
	(4, 'Restaurantes', NULL, NULL),
	(5, 'Condominios', NULL, NULL);
/*!40000 ALTER TABLE `giros` ENABLE KEYS */;


-- Volcando estructura para tabla castidavi.migrations
CREATE TABLE IF NOT EXISTS `migrations` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `migration` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Volcando datos para la tabla castidavi.migrations: 6 rows
/*!40000 ALTER TABLE `migrations` DISABLE KEYS */;
INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
	(1, '2014_10_12_000000_create_users_table', 1),
	(2, '2014_10_12_100000_create_password_resets_table', 1),
	(3, '2019_09_06_164240_create_files_table', 1),
	(4, '2019_09_08_234406_nations', 1),
	(5, '2019_09_16_083407_casas', 2),
	(6, '2019_09_16_083500_giros', 2);
/*!40000 ALTER TABLE `migrations` ENABLE KEYS */;


-- Volcando estructura para tabla castidavi.nations
CREATE TABLE IF NOT EXISTS `nations` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `nombre` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Volcando datos para la tabla castidavi.nations: 0 rows
/*!40000 ALTER TABLE `nations` DISABLE KEYS */;
/*!40000 ALTER TABLE `nations` ENABLE KEYS */;


-- Volcando estructura para tabla castidavi.password_resets
CREATE TABLE IF NOT EXISTS `password_resets` (
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  KEY `password_resets_email_index` (`email`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Volcando datos para la tabla castidavi.password_resets: 0 rows
/*!40000 ALTER TABLE `password_resets` DISABLE KEYS */;
/*!40000 ALTER TABLE `password_resets` ENABLE KEYS */;


-- Volcando estructura para tabla castidavi.users
CREATE TABLE IF NOT EXISTS `users` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `fecha_nacimiento` date NOT NULL,
  `estatus` tinyint(1) NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_email_unique` (`email`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Volcando datos para la tabla castidavi.users: 0 rows
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
/*!40000 ALTER TABLE `users` ENABLE KEYS */;
/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IF(@OLD_FOREIGN_KEY_CHECKS IS NULL, 1, @OLD_FOREIGN_KEY_CHECKS) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
