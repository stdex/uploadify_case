CREATE DATABASE `test` /*!40100 DEFAULT CHARACTER SET utf8 */;

CREATE TABLE `zz_images` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `filename` tinytext,
  `type` int(11) DEFAULT NULL,
  `code` int(11) DEFAULT NULL,
  `filepath` tinytext,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
