CREATE TABLE IF NOT EXISTS `halo_block` (
  `id` varchar(32) NOT NULL DEFAULT '',
  `title` varchar(250) DEFAULT NULL,
  `html` text,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

INSERT INTO `halo_block` (`id`, `title`, `html`) VALUES
	('welcome', 'Welcome to Halo CMS', '<p><strong>Welcome friend!</strong></p><p>:)</p>');

CREATE TABLE IF NOT EXISTS `halo_page` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `uri` varchar(250) NOT NULL,
  `title` varchar(250) NOT NULL,
  `created_at` int(11) NOT NULL,
  `updated_at` int(11) NOT NULL,
  `html` text NOT NULL,
  `meta_keywords` varchar(1024) NOT NULL,
  `meta_description` varchar(1024) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `uri` (`uri`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

INSERT INTO `halo_page` (`id`, `uri`, `title`, `created_at`, `updated_at`, `html`, `meta_keywords`, `meta_description`) VALUES
	(1, 'testme', 'kjhkjhkj hkj hkjh', 0, 0, '<p>lj lkj lkjl kjlk j</p>', 'kjlkj', 'kljlkj');

CREATE TABLE IF NOT EXISTS `migration` (
  `version` varchar(180) NOT NULL,
  `apply_time` int(11) DEFAULT NULL,
  PRIMARY KEY (`version`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

INSERT INTO `migration` (`version`, `apply_time`) VALUES
	('m000000_000000_base', 1449452218),
	('m140209_132017_init', 1449631081),
	('m140403_174025_create_account_table', 1449631081),
	('m140504_113157_update_tables', 1449631082),
	('m140504_130429_create_token_table', 1449631082),
	('m140830_171933_fix_ip_field', 1449631082),
	('m140830_172703_change_account_table_name', 1449631082),
	('m141222_110026_update_ip_field', 1449631082),
	('m141222_135246_alter_username_length', 1449631082),
	('m150614_103145_update_social_account_table', 1449631082),
	('m150623_212711_fix_username_notnull', 1449631082),
	('m151206_223218_install', 1449464120),
	('m151209_032228_default_admin', 1449631792);

CREATE TABLE IF NOT EXISTS `user` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password_hash` varchar(60) NOT NULL,
  `auth_key` varchar(32) NOT NULL,
  `confirmed_at` int(11) DEFAULT NULL,
  `unconfirmed_email` varchar(255) DEFAULT NULL,
  `blocked_at` int(11) DEFAULT NULL,
  `registration_ip` varchar(45) DEFAULT NULL,
  `created_at` int(11) NOT NULL,
  `updated_at` int(11) NOT NULL,
  `flags` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`),
  UNIQUE KEY `user_unique_email` (`email`),
  UNIQUE KEY `user_unique_username` (`username`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

INSERT INTO `user` (`id`, `username`, `email`, `password_hash`, `auth_key`, `confirmed_at`, `unconfirmed_email`, `blocked_at`, `registration_ip`, `created_at`, `updated_at`, `flags`) VALUES
    (1, 'admin', 'admin@example.com', '$2y$10$43crCa04GdiCqsn4UyjLbeBjg8j2DoTvyGTFm6wDTAUyzbTdPBzRq', '_lGcDsCKPXzafKqPQxRkh46ph_Bg7nIe', 1449631792, NULL, NULL, '127.0.0.1', 1449631792, 1449631792, 0);
    
    
CREATE TABLE IF NOT EXISTS `profile` (
  `user_id` int(11) NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `public_email` varchar(255) DEFAULT NULL,
  `gravatar_email` varchar(255) DEFAULT NULL,
  `gravatar_id` varchar(32) DEFAULT NULL,
  `location` varchar(255) DEFAULT NULL,
  `website` varchar(255) DEFAULT NULL,
  `bio` text,
  PRIMARY KEY (`user_id`),
  CONSTRAINT `fk_user_profile` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

INSERT INTO `profile` (`user_id`, `name`, `public_email`, `gravatar_email`, `gravatar_id`, `location`, `website`, `bio`) VALUES
	(1, NULL, NULL, NULL, NULL, NULL, NULL, NULL);

CREATE TABLE IF NOT EXISTS `social_account` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) DEFAULT NULL,
  `provider` varchar(255) NOT NULL,
  `client_id` varchar(255) NOT NULL,
  `data` text,
  `code` varchar(32) DEFAULT NULL,
  `created_at` int(11) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `username` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `account_unique` (`provider`,`client_id`),
  UNIQUE KEY `account_unique_code` (`code`),
  KEY `fk_user_account` (`user_id`),
  CONSTRAINT `fk_user_account` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

CREATE TABLE IF NOT EXISTS `system_plugin` (
  `id` char(32) NOT NULL,
  `version` varchar(32) NOT NULL,
  `is_disabled` tinyint(1) NOT NULL,
  `is_locked` tinyint(1) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

CREATE TABLE IF NOT EXISTS `token` (
  `user_id` int(11) NOT NULL,
  `code` varchar(32) NOT NULL,
  `created_at` int(11) NOT NULL,
  `type` smallint(6) NOT NULL,
  UNIQUE KEY `token_unique` (`user_id`,`code`,`type`),
  CONSTRAINT `fk_user_token` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
   