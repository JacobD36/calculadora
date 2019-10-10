-- --------------------------------------------------------
-- Host:                         127.0.0.1
-- Versión del servidor:         5.7.27 - MySQL Community Server (GPL)
-- SO del servidor:              Linux
-- HeidiSQL Versión:             10.2.0.5599
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;


-- Volcando estructura de base de datos para calculadora
CREATE DATABASE IF NOT EXISTS `calculadora` /*!40100 DEFAULT CHARACTER SET latin1 */;
USE `calculadora`;

-- Volcando estructura para tabla calculadora.conversion_2
CREATE TABLE IF NOT EXISTS `conversion_2` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `plazo` int(11) NOT NULL,
  `factor` double(11,2) NOT NULL,
  `fechacreacion` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=26 DEFAULT CHARSET=latin1;

-- Volcando datos para la tabla calculadora.conversion_2: ~25 rows (aproximadamente)
/*!40000 ALTER TABLE `conversion_2` DISABLE KEYS */;
INSERT INTO `conversion_2` (`id`, `plazo`, `factor`, `fechacreacion`) VALUES
	(1, 12, 1.00, '2019-10-09 14:59:02'),
	(2, 13, 1.02, '2019-10-09 15:03:01'),
	(3, 14, 1.05, '2019-10-09 15:03:01'),
	(4, 15, 1.08, '2019-10-09 15:03:01'),
	(5, 16, 1.13, '2019-10-09 15:03:01'),
	(6, 17, 1.19, '2019-10-09 15:03:01'),
	(7, 18, 1.24, '2019-10-09 15:03:01'),
	(8, 19, 1.30, '2019-10-09 15:03:01'),
	(9, 20, 1.34, '2019-10-09 15:03:01'),
	(10, 21, 1.40, '2019-10-09 15:03:01'),
	(11, 22, 1.44, '2019-10-09 15:03:01'),
	(12, 23, 1.49, '2019-10-09 15:03:01'),
	(13, 24, 1.53, '2019-10-09 15:03:01'),
	(14, 25, 1.58, '2019-10-09 15:03:01'),
	(15, 26, 1.62, '2019-10-09 15:03:01'),
	(16, 27, 1.66, '2019-10-09 15:03:01'),
	(17, 28, 1.70, '2019-10-09 15:03:01'),
	(18, 29, 1.75, '2019-10-09 15:03:01'),
	(19, 30, 1.78, '2019-10-09 15:03:01'),
	(20, 31, 1.80, '2019-10-09 15:03:01'),
	(21, 32, 1.85, '2019-10-09 15:03:01'),
	(22, 33, 1.88, '2019-10-09 15:03:01'),
	(23, 34, 1.90, '2019-10-09 15:03:01'),
	(24, 35, 1.95, '2019-10-09 15:03:01'),
	(25, 36, 2.00, '2019-10-09 15:03:01');
/*!40000 ALTER TABLE `conversion_2` ENABLE KEYS */;

-- Volcando estructura para tabla calculadora.prestamo_senior
CREATE TABLE IF NOT EXISTS `prestamo_senior` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `plazo` int(11) NOT NULL,
  `factor` double(10,2) NOT NULL,
  `estado` int(11) DEFAULT '1',
  `fechacreacion` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=latin1;

-- Volcando datos para la tabla calculadora.prestamo_senior: ~13 rows (aproximadamente)
/*!40000 ALTER TABLE `prestamo_senior` DISABLE KEYS */;
INSERT INTO `prestamo_senior` (`id`, `plazo`, `factor`, `estado`, `fechacreacion`) VALUES
	(1, 12, 1.00, 1, '2019-10-10 19:13:48'),
	(2, 13, 1.08, 1, '2019-10-10 19:13:48'),
	(3, 14, 1.17, 1, '2019-10-10 19:13:48'),
	(4, 15, 1.25, 1, '2019-10-10 19:13:48'),
	(5, 16, 1.33, 1, '2019-10-10 19:13:48'),
	(6, 17, 1.42, 1, '2019-10-10 19:13:48'),
	(7, 18, 1.50, 1, '2019-10-10 19:13:48'),
	(8, 19, 1.58, 1, '2019-10-10 19:13:48'),
	(9, 20, 1.67, 1, '2019-10-10 19:13:48'),
	(10, 21, 1.75, 1, '2019-10-10 19:13:48'),
	(11, 22, 1.83, 1, '2019-10-10 19:13:48'),
	(12, 23, 1.92, 1, '2019-10-10 19:13:48'),
	(13, 24, 2.00, 1, '2019-10-10 19:13:48');
/*!40000 ALTER TABLE `prestamo_senior` ENABLE KEYS */;

-- Volcando estructura para tabla calculadora.pya_cdd
CREATE TABLE IF NOT EXISTS `pya_cdd` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `plazo` int(11) NOT NULL,
  `factor` double(10,2) NOT NULL,
  `estado` int(11) DEFAULT '1',
  `fechacreacion` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=37 DEFAULT CHARSET=latin1;

-- Volcando datos para la tabla calculadora.pya_cdd: ~36 rows (aproximadamente)
/*!40000 ALTER TABLE `pya_cdd` DISABLE KEYS */;
INSERT INTO `pya_cdd` (`id`, `plazo`, `factor`, `estado`, `fechacreacion`) VALUES
	(1, 12, 1.00, 1, '2019-10-10 19:09:42'),
	(2, 13, 1.02, 1, '2019-10-10 19:09:42'),
	(3, 14, 1.05, 1, '2019-10-10 19:09:42'),
	(4, 15, 1.08, 1, '2019-10-10 19:09:42'),
	(5, 16, 1.13, 1, '2019-10-10 19:09:42'),
	(6, 17, 1.19, 1, '2019-10-10 19:09:42'),
	(7, 18, 1.24, 1, '2019-10-10 19:09:42'),
	(8, 19, 1.30, 1, '2019-10-10 19:09:42'),
	(9, 20, 1.34, 1, '2019-10-10 19:09:42'),
	(10, 21, 1.40, 1, '2019-10-10 19:09:42'),
	(11, 22, 1.44, 1, '2019-10-10 19:09:42'),
	(12, 23, 1.49, 1, '2019-10-10 19:09:42'),
	(13, 24, 1.53, 1, '2019-10-10 19:09:42'),
	(14, 25, 1.58, 1, '2019-10-10 19:09:42'),
	(15, 26, 1.62, 1, '2019-10-10 19:09:42'),
	(16, 27, 1.66, 1, '2019-10-10 19:09:42'),
	(17, 29, 1.75, 1, '2019-10-10 19:09:42'),
	(18, 30, 1.78, 1, '2019-10-10 19:09:42'),
	(19, 31, 1.80, 1, '2019-10-10 19:09:42'),
	(20, 32, 1.85, 1, '2019-10-10 19:09:42'),
	(21, 33, 1.88, 1, '2019-10-10 19:09:42'),
	(22, 34, 1.90, 1, '2019-10-10 19:09:42'),
	(23, 35, 1.95, 1, '2019-10-10 19:09:42'),
	(24, 36, 2.00, 1, '2019-10-10 19:09:42'),
	(25, 37, 2.00, 1, '2019-10-10 19:09:42'),
	(26, 38, 2.00, 1, '2019-10-10 19:09:42'),
	(27, 39, 2.00, 1, '2019-10-10 19:09:42'),
	(28, 40, 2.00, 1, '2019-10-10 19:09:42'),
	(29, 41, 2.00, 1, '2019-10-10 19:09:42'),
	(30, 42, 2.00, 1, '2019-10-10 19:09:42'),
	(31, 43, 2.00, 1, '2019-10-10 19:09:42'),
	(32, 44, 2.00, 1, '2019-10-10 19:09:42'),
	(33, 45, 2.00, 1, '2019-10-10 19:09:42'),
	(34, 46, 2.00, 1, '2019-10-10 19:09:42'),
	(35, 47, 2.00, 1, '2019-10-10 19:09:42'),
	(36, 48, 2.00, 1, '2019-10-10 19:09:42');
/*!40000 ALTER TABLE `pya_cdd` ENABLE KEYS */;

/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IF(@OLD_FOREIGN_KEY_CHECKS IS NULL, 1, @OLD_FOREIGN_KEY_CHECKS) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
