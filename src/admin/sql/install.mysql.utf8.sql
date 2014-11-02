CREATE TABLE IF NOT EXISTS `#__etd` (
 `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
 `catid` int(11) NOT NULL DEFAULT '0',
 `state` tinyint(1) NOT NULL default '0',
 `nivel` tinyint(1) NOT NULL default '0',
 `titulo` varchar(255) COLLATE utf8_unicode_ci NOT NULL DEFAULT '',
 `autor` varchar(255) COLLATE utf8_unicode_ci NOT NULL DEFAULT '',
 `director` varchar(255) COLLATE utf8_unicode_ci NOT NULL DEFAULT '',
 `co_director` varchar(255) COLLATE utf8_unicode_ci NOT NULL DEFAULT '',
 `jurado` text COLLATE utf8_unicode_ci NOT NULL DEFAULT '',
 `resumen` text COLLATE utf8_unicode_ci NOT NULL DEFAULT '',
 `presentada` enum('Si','No') COLLATE utf8_unicode_ci NOT NULL DEFAULT 'No',
 `fecha` date DEFAULT NULL,
 PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1;
