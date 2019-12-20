CREATE TABLE `clients` (
  `id_client` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `email` varchar(255) NOT NULL DEFAULT '',
  `password` varchar(255) NOT NULL DEFAULT '',
  `name` varchar(255) NOT NULL DEFAULT '',
  `address` text,
  `created_at` DATETIME NOT NULL DEFAULT NOW(),
  `statut` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id_client`),
  UNIQUE KEY `email_unique` (`email`)
) 


-- valeur test par defaut client  
INSERT INTO `clients` (`id`, `email`, `password`, `name`, `address`) 
VALUES (`1`, `jaderons@hotmail.fr`, `aa`, `jade`, `24b`);


-- valeur test admin 
-- montrer fausses commandes déjà en cours etc 

CREATE TABLE `commandes` (
   `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `email` varchar(255) NOT NULL DEFAULT '',
  `password` varchar(255) NOT NULL DEFAULT '',
  `numero` varchar(255) NOT NULL DEFAULT '',
  `address` text,
  `created_at` DATETIME NOT NULL DEFAULT NOW(),
  PRIMARY KEY (`id`),
  UNIQUE KEY `email_unique` (`email`)