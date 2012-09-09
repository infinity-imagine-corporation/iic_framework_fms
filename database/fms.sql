-- --------------------------------------------------------
-- Host:                         127.0.0.1
-- Server version:               5.1.63-community - MySQL Community Server (GPL)
-- Server OS:                    Win64
-- HeidiSQL version:             7.0.0.4174
-- Date/time:                    2012-09-09 05:18:31
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;

-- Dumping structure for table davance_cloud.fms_file
DROP TABLE IF EXISTS `fms_file`;
CREATE TABLE IF NOT EXISTS `fms_file` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `description` text COLLATE utf8_unicode_ci,
  `file_name` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL COMMENT 'The name of the file that was uploaded including the file extension.',
  `file_type` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL COMMENT 'The file''s Mime type',
  `file_path` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL COMMENT 'The absolute server path to the file',
  `full_path` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL COMMENT 'The absolute server path including the file name',
  `raw_name` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL COMMENT 'The file name without the extension',
  `orig_name` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL COMMENT 'The original file name. This is only useful if you use the encrypted name option.',
  `client_name` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL COMMENT 'The file name as supplied by the client user agent, prior to any file name preparation or incrementing.',
  `file_ext` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL COMMENT 'The file extension with period',
  `file_size` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL COMMENT 'The file size in kilobytes',
  `is_image` tinyint(1) unsigned NOT NULL DEFAULT '0' COMMENT 'Whether the file is an image or not. 1 = image. 0 = not.',
  `image_width` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL COMMENT 'Image width.',
  `image_height` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL COMMENT 'Image height',
  `image_type` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL COMMENT 'Image type. Typically the file extension without the period.',
  `image_size_str` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL COMMENT 'A string containing the width and height. Useful to put into an image tag.',
  `is_enable` int(10) unsigned NOT NULL DEFAULT '1',
  `date_create` datetime DEFAULT NULL,
  `date_update` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- Dumping data for table davance_cloud.fms_file: ~0 rows (approximately)
DELETE FROM `fms_file`;
/*!40000 ALTER TABLE `fms_file` DISABLE KEYS */;
/*!40000 ALTER TABLE `fms_file` ENABLE KEYS */;
/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IF(@OLD_FOREIGN_KEY_CHECKS IS NULL, 1, @OLD_FOREIGN_KEY_CHECKS) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
