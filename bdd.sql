CREATE TABLE `command` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `image` varchar(255) NOT NULL DEFAULT '',
  `titre` varchar(255) NOT NULL DEFAULT '',
  `description` varchar(255) NOT NULL DEFAULT '',
  `identifiantclient` text,
  `etat` int(11) unsigned NOT NULL DEFAULT '1',
  `created_at` DATETIME NOT NULL DEFAULT NOW(),
  PRIMARY KEY (`id`)
);

INSERT INTO `command` (`id`, `image`, `titre`, `description`, `identifiantclient`)
VALUES
	(1, 'photo1.jpg', 'Box Artiste', 'Box artiste, composer desoutils plume caligraphie, boitier, mine deplomb, futre epais et fin', 'client1');


