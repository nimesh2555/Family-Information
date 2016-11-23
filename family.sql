CREATE DATABASE family;





CREATE TABLE IF NOT EXISTS `bk_parents` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `family_id` int(10) NOT NULL,
  `parents-name` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;



INSERT INTO `bk_parents` (`id`, `family_id`, `parents-name`) VALUES
(1, 1, 'Anindya'),
(2, 1, 'Priyanka'),
(3, 2, 'Suprio'),
(4, 2, 'Soma');



CREATE TABLE IF NOT EXISTS `childern` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `family_id` int(10) NOT NULL,
  `parents_id` int(10) NOT NULL,
  `name` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;



CREATE TABLE IF NOT EXISTS `family_surname` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `surname` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;



CREATE TABLE IF NOT EXISTS `parents` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `family_id` int(10) NOT NULL,
  `parents_name` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

