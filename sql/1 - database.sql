CREATE TABLE IF NOT EXISTS `employees` (
`id` int(11) NOT NULL AUTO_INCREMENT,
`name` varchar(256) NOT NULL,
`email` varchar(50),
`designation` varchar(255) NOT NULL,
`created_At` datetime NOT NULL,
PRIMARY KEY (`id`)
)ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=19;