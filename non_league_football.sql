-- Adminer 4.8.1 MySQL 8.0.30 dump

SET NAMES utf8;
SET time_zone = '+00:00';
SET foreign_key_checks = 0;
SET sql_mode = 'NO_AUTO_VALUE_ON_ZERO';

SET NAMES utf8mb4;

DROP TABLE IF EXISTS `failed_jobs`;
CREATE TABLE `failed_jobs` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `uuid` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;


DROP TABLE IF EXISTS `messages`;
CREATE TABLE `messages` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `player_id` bigint unsigned NOT NULL,
  `body` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `subject` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` int NOT NULL,
  `unread` tinyint(1) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `messages_player_id_foreign` (`player_id`),
  CONSTRAINT `messages_player_id_foreign` FOREIGN KEY (`player_id`) REFERENCES `players` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

INSERT INTO `messages` (`id`, `player_id`, `body`, `email`, `subject`, `user_id`, `unread`, `created_at`, `updated_at`) VALUES
(1,	1,	'hi there',	'scout@test.com',	'hello',	1,	1,	'2024-07-08 12:14:04',	'2024-07-08 12:14:04');

DROP TABLE IF EXISTS `migrations`;
CREATE TABLE `migrations` (
  `id` int unsigned NOT NULL AUTO_INCREMENT,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1,	'2014_10_12_000000_create_users_table',	1),
(2,	'2014_10_12_100000_create_password_resets_table',	1),
(3,	'2019_08_19_000000_create_failed_jobs_table',	1),
(4,	'2019_12_14_000001_create_personal_access_tokens_table',	1),
(5,	'2024_02_17_153329_create_players_table',	1),
(6,	'2024_02_19_192506_create_positions_table',	1),
(7,	'2024_02_28_201426_create_regions_table',	1),
(8,	'2024_03_24_190711_create_messages_table',	1);

DROP TABLE IF EXISTS `password_resets`;
CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;


DROP TABLE IF EXISTS `personal_access_tokens`;
CREATE TABLE `personal_access_tokens` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `tokenable_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tokenable_id` bigint unsigned NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `abilities` text COLLATE utf8mb4_unicode_ci,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `expires_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;


DROP TABLE IF EXISTS `players`;
CREATE TABLE `players` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `position_id` bigint unsigned NOT NULL,
  `region_id` bigint unsigned NOT NULL,
  `user_id` bigint unsigned NOT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `player_name` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `player_image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `player_dob` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `player_bio` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `player_height` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `player_preferred_foot` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `player_status` tinyint(1) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `players_slug_unique` (`slug`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

INSERT INTO `players` (`id`, `position_id`, `region_id`, `user_id`, `slug`, `player_name`, `player_image`, `player_dob`, `player_bio`, `player_height`, `player_preferred_foot`, `player_status`, `created_at`, `updated_at`) VALUES
(1,	2,	2,	1,	'george-smith-1',	'George Smith',	'images/51Xa48uvDAHtx0NfTLoS.webp',	'2001-06-20',	'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aliquam interdum ex libero, et blandit magna tincidunt vel. Vestibulum a turpis eget dui euismod vehicula. Morbi a augue sodales urna rutrum laoreet a at ipsum. Proin dapibus vel odio sed condimentum. Sed eu urna fringilla, volutpat tortor vel, bibendum nulla. Aliquam erat volutpat. Nam sit amet purus nec neque condimentum convallis. Proin ac eleifend ipsum. Sed ultricies ac risus eu condimentum. Integer lacinia nunc in augue vehicula, tempor eleifend purus placerat. Phasellus hendrerit velit elementum sapien sagittis posuere. Nulla metus tortor, malesuada eu facilisis eu, mollis vitae ipsum.',	'200',	'Left',	1,	'2024-07-08 12:13:37',	'2024-07-08 17:48:03'),
(2,	1,	2,	1,	'adam-slater',	'Adam Slater',	'images/tWFnOD115dPLGfNoRu5g.webp',	'1991-01-30',	'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aliquam interdum ex libero, et blandit magna tincidunt vel. Vestibulum a turpis eget dui euismod vehicula. Morbi a augue sodales urna rutrum laoreet a at ipsum. Proin dapibus vel odio sed condimentum. Sed eu urna fringilla, volutpat tortor vel, bibendum nulla. Aliquam erat volutpat. Nam sit amet purus nec neque condimentum convallis. Proin ac eleifend ipsum. Sed ultricies ac risus eu condimentum. Integer lacinia nunc in augue vehicula, tempor eleifend purus placerat. Phasellus hendrerit velit elementum sapien sagittis posuere. Nulla metus tortor, malesuada eu facilisis eu, mollis vitae ipsum.',	'192',	'Left',	1,	'2024-07-08 17:49:04',	'2024-07-08 17:49:04'),
(3,	3,	2,	1,	'sam-jackson',	'Sam Jackson',	'images/4qjO4hLgFab2aTJnIqQK.webp',	'1998-06-20',	'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aliquam interdum ex libero, et blandit magna tincidunt vel. Vestibulum a turpis eget dui euismod vehicula. Morbi a augue sodales urna rutrum laoreet a at ipsum. Proin dapibus vel odio sed condimentum. Sed eu urna fringilla, volutpat tortor vel, bibendum nulla. Aliquam erat volutpat. Nam sit amet purus nec neque condimentum convallis. Proin ac eleifend ipsum. Sed ultricies ac risus eu condimentum. Integer lacinia nunc in augue vehicula, tempor eleifend purus placerat. Phasellus hendrerit velit elementum sapien sagittis posuere. Nulla metus tortor, malesuada eu facilisis eu, mollis vitae ipsum.',	'155',	'Right',	1,	'2024-07-08 17:50:49',	'2024-07-08 17:50:49'),
(4,	4,	2,	1,	'will-humphrey',	'Will Humphrey',	'images/1sW6vXSIz6puORgYzchG.webp',	'1997-02-19',	'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aliquam interdum ex libero, et blandit magna tincidunt vel. Vestibulum a turpis eget dui euismod vehicula. Morbi a augue sodales urna rutrum laoreet a at ipsum. Proin dapibus vel odio sed condimentum. Sed eu urna fringilla, volutpat tortor vel, bibendum nulla. Aliquam erat volutpat. Nam sit amet purus nec neque condimentum convallis. Proin ac eleifend ipsum. Sed ultricies ac risus eu condimentum. Integer lacinia nunc in augue vehicula, tempor eleifend purus placerat. Phasellus hendrerit velit elementum sapien sagittis posuere. Nulla metus tortor, malesuada eu facilisis eu, mollis vitae ipsum.',	'163',	'Right',	1,	'2024-07-08 17:55:47',	'2024-07-08 17:55:47'),
(5,	1,	1,	1,	'wilford-fox',	'Wilford Fox',	'images/uL5w2kg4rIWokbGDYvDG.webp',	'2001-12-13',	'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aliquam interdum ex libero, et blandit magna tincidunt vel. Vestibulum a turpis eget dui euismod vehicula. Morbi a augue sodales urna rutrum laoreet a at ipsum. Proin dapibus vel odio sed condimentum. Sed eu urna fringilla, volutpat tortor vel, bibendum nulla. Aliquam erat volutpat. Nam sit amet purus nec neque condimentum convallis. Proin ac eleifend ipsum. Sed ultricies ac risus eu condimentum. Integer lacinia nunc in augue vehicula, tempor eleifend purus placerat. Phasellus hendrerit velit elementum sapien sagittis posuere. Nulla metus tortor, malesuada eu facilisis eu, mollis vitae ipsum.',	'170',	'Left',	1,	'2024-07-08 17:56:37',	'2024-07-08 17:56:37'),
(6,	2,	1,	1,	'darrell-ayala',	'Darrell Ayala',	'images/BBvLsJKvjUdg3H5cpSAi.webp',	'2003-01-15',	'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aliquam interdum ex libero, et blandit magna tincidunt vel. Vestibulum a turpis eget dui euismod vehicula. Morbi a augue sodales urna rutrum laoreet a at ipsum. Proin dapibus vel odio sed condimentum. Sed eu urna fringilla, volutpat tortor vel, bibendum nulla. Aliquam erat volutpat. Nam sit amet purus nec neque condimentum convallis. Proin ac eleifend ipsum. Sed ultricies ac risus eu condimentum. Integer lacinia nunc in augue vehicula, tempor eleifend purus placerat. Phasellus hendrerit velit elementum sapien sagittis posuere. Nulla metus tortor, malesuada eu facilisis eu, mollis vitae ipsum.',	'150',	'Right',	1,	'2024-07-08 17:57:18',	'2024-07-08 17:57:18'),
(7,	3,	1,	1,	'timothy-hunter',	'Timothy Hunter',	'images/Tl1l49JQCbRmb6X7Es2U.webp',	'1997-06-04',	'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aliquam interdum ex libero, et blandit magna tincidunt vel. Vestibulum a turpis eget dui euismod vehicula. Morbi a augue sodales urna rutrum laoreet a at ipsum. Proin dapibus vel odio sed condimentum. Sed eu urna fringilla, volutpat tortor vel, bibendum nulla. Aliquam erat volutpat. Nam sit amet purus nec neque condimentum convallis. Proin ac eleifend ipsum. Sed ultricies ac risus eu condimentum. Integer lacinia nunc in augue vehicula, tempor eleifend purus placerat. Phasellus hendrerit velit elementum sapien sagittis posuere. Nulla metus tortor, malesuada eu facilisis eu, mollis vitae ipsum.',	'181',	'Left',	1,	'2024-07-08 17:58:08',	'2024-07-08 17:58:08'),
(8,	4,	1,	1,	'darrin-simpson',	'Darrin Simpson',	'images/oPOKKp7c2pbeAI8yjTNr.webp',	'2002-06-12',	'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aliquam interdum ex libero, et blandit magna tincidunt vel. Vestibulum a turpis eget dui euismod vehicula. Morbi a augue sodales urna rutrum laoreet a at ipsum. Proin dapibus vel odio sed condimentum. Sed eu urna fringilla, volutpat tortor vel, bibendum nulla. Aliquam erat volutpat. Nam sit amet purus nec neque condimentum convallis. Proin ac eleifend ipsum. Sed ultricies ac risus eu condimentum. Integer lacinia nunc in augue vehicula, tempor eleifend purus placerat. Phasellus hendrerit velit elementum sapien sagittis posuere. Nulla metus tortor, malesuada eu facilisis eu, mollis vitae ipsum.',	'169',	'Left',	1,	'2024-07-08 17:58:55',	'2024-07-08 17:58:55'),
(9,	1,	3,	1,	'ollie-underwood',	'Ollie Underwood',	'images/YPI7LGgpgiUcYITKiEpr.webp',	'1999-08-20',	'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aliquam interdum ex libero, et blandit magna tincidunt vel. Vestibulum a turpis eget dui euismod vehicula. Morbi a augue sodales urna rutrum laoreet a at ipsum. Proin dapibus vel odio sed condimentum. Sed eu urna fringilla, volutpat tortor vel, bibendum nulla. Aliquam erat volutpat. Nam sit amet purus nec neque condimentum convallis. Proin ac eleifend ipsum. Sed ultricies ac risus eu condimentum. Integer lacinia nunc in augue vehicula, tempor eleifend purus placerat. Phasellus hendrerit velit elementum sapien sagittis posuere. Nulla metus tortor, malesuada eu facilisis eu, mollis vitae ipsum.',	'205',	'Right',	1,	'2024-07-08 17:59:46',	'2024-07-08 17:59:46'),
(10,	2,	3,	1,	'edmundo-mckenzie',	'Edmundo Mckenzie',	'images/GEvd2gMHZcM3cJ26vUec.webp',	'2005-06-08',	'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aliquam interdum ex libero, et blandit magna tincidunt vel. Vestibulum a turpis eget dui euismod vehicula. Morbi a augue sodales urna rutrum laoreet a at ipsum. Proin dapibus vel odio sed condimentum. Sed eu urna fringilla, volutpat tortor vel, bibendum nulla. Aliquam erat volutpat. Nam sit amet purus nec neque condimentum convallis. Proin ac eleifend ipsum. Sed ultricies ac risus eu condimentum. Integer lacinia nunc in augue vehicula, tempor eleifend purus placerat. Phasellus hendrerit velit elementum sapien sagittis posuere. Nulla metus tortor, malesuada eu facilisis eu, mollis vitae ipsum.',	'180',	'Right',	1,	'2024-07-08 18:00:39',	'2024-07-08 18:00:39'),
(11,	3,	3,	1,	'maurice-mullen',	'Maurice Mullen',	'images/NaYDfakcGzX4BGhOIao0.webp',	'2001-09-17',	'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aliquam interdum ex libero, et blandit magna tincidunt vel. Vestibulum a turpis eget dui euismod vehicula. Morbi a augue sodales urna rutrum laoreet a at ipsum. Proin dapibus vel odio sed condimentum. Sed eu urna fringilla, volutpat tortor vel, bibendum nulla. Aliquam erat volutpat. Nam sit amet purus nec neque condimentum convallis. Proin ac eleifend ipsum. Sed ultricies ac risus eu condimentum. Integer lacinia nunc in augue vehicula, tempor eleifend purus placerat. Phasellus hendrerit velit elementum sapien sagittis posuere. Nulla metus tortor, malesuada eu facilisis eu, mollis vitae ipsum.',	'155',	'Left',	1,	'2024-07-08 18:01:34',	'2024-07-08 18:01:34'),
(12,	4,	3,	1,	'luther-matthews',	'Luther Matthews',	'images/CmWFa93xHYiP9lFXgvxu.webp',	'1996-03-13',	'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aliquam interdum ex libero, et blandit magna tincidunt vel. Vestibulum a turpis eget dui euismod vehicula. Morbi a augue sodales urna rutrum laoreet a at ipsum. Proin dapibus vel odio sed condimentum. Sed eu urna fringilla, volutpat tortor vel, bibendum nulla. Aliquam erat volutpat. Nam sit amet purus nec neque condimentum convallis. Proin ac eleifend ipsum. Sed ultricies ac risus eu condimentum. Integer lacinia nunc in augue vehicula, tempor eleifend purus placerat. Phasellus hendrerit velit elementum sapien sagittis posuere. Nulla metus tortor, malesuada eu facilisis eu, mollis vitae ipsum.',	'191',	'Right',	1,	'2024-07-08 18:02:08',	'2024-07-08 18:02:08'),
(13,	1,	4,	1,	'jayson-mullins',	'Jayson Mullins',	'images/ZY9HGFKLqXeBLxxg1ucD.webp',	'1994-05-26',	'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aliquam interdum ex libero, et blandit magna tincidunt vel. Vestibulum a turpis eget dui euismod vehicula. Morbi a augue sodales urna rutrum laoreet a at ipsum. Proin dapibus vel odio sed condimentum. Sed eu urna fringilla, volutpat tortor vel, bibendum nulla. Aliquam erat volutpat. Nam sit amet purus nec neque condimentum convallis. Proin ac eleifend ipsum. Sed ultricies ac risus eu condimentum. Integer lacinia nunc in augue vehicula, tempor eleifend purus placerat. Phasellus hendrerit velit elementum sapien sagittis posuere. Nulla metus tortor, malesuada eu facilisis eu, mollis vitae ipsum.',	'195',	'Left',	1,	'2024-07-08 18:03:05',	'2024-07-08 18:03:05'),
(14,	2,	4,	1,	'deandre-mckinney',	'Deandre Mckinney',	'images/bDMLfd8RIl2Zd1JLvHrk.webp',	'1995-02-09',	'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aliquam interdum ex libero, et blandit magna tincidunt vel. Vestibulum a turpis eget dui euismod vehicula. Morbi a augue sodales urna rutrum laoreet a at ipsum. Proin dapibus vel odio sed condimentum. Sed eu urna fringilla, volutpat tortor vel, bibendum nulla. Aliquam erat volutpat. Nam sit amet purus nec neque condimentum convallis. Proin ac eleifend ipsum. Sed ultricies ac risus eu condimentum. Integer lacinia nunc in augue vehicula, tempor eleifend purus placerat. Phasellus hendrerit velit elementum sapien sagittis posuere. Nulla metus tortor, malesuada eu facilisis eu, mollis vitae ipsum.',	'175',	'Left',	1,	'2024-07-08 18:04:09',	'2024-07-08 18:04:09'),
(15,	3,	4,	1,	'dana-lewis',	'Dana Lewis',	'images/7EHkXeamM67xga29YE6O.webp',	'1992-01-29',	'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aliquam interdum ex libero, et blandit magna tincidunt vel. Vestibulum a turpis eget dui euismod vehicula. Morbi a augue sodales urna rutrum laoreet a at ipsum. Proin dapibus vel odio sed condimentum. Sed eu urna fringilla, volutpat tortor vel, bibendum nulla. Aliquam erat volutpat. Nam sit amet purus nec neque condimentum convallis. Proin ac eleifend ipsum. Sed ultricies ac risus eu condimentum. Integer lacinia nunc in augue vehicula, tempor eleifend purus placerat. Phasellus hendrerit velit elementum sapien sagittis posuere. Nulla metus tortor, malesuada eu facilisis eu, mollis vitae ipsum.',	'150',	'Left',	1,	'2024-07-08 18:05:07',	'2024-07-08 18:05:07'),
(16,	4,	4,	1,	'alex-curtis',	'Alex Curtis',	'images/PksO8MRPPYqcEmtHfS0A.webp',	'1991-06-12',	'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aliquam interdum ex libero, et blandit magna tincidunt vel. Vestibulum a turpis eget dui euismod vehicula. Morbi a augue sodales urna rutrum laoreet a at ipsum. Proin dapibus vel odio sed condimentum. Sed eu urna fringilla, volutpat tortor vel, bibendum nulla. Aliquam erat volutpat. Nam sit amet purus nec neque condimentum convallis. Proin ac eleifend ipsum. Sed ultricies ac risus eu condimentum. Integer lacinia nunc in augue vehicula, tempor eleifend purus placerat. Phasellus hendrerit velit elementum sapien sagittis posuere. Nulla metus tortor, malesuada eu facilisis eu, mollis vitae ipsum.',	'190',	'Left',	1,	'2024-07-08 18:05:50',	'2024-07-08 18:05:50');

DROP TABLE IF EXISTS `positions`;
CREATE TABLE `positions` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `positions_name_unique` (`name`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

INSERT INTO `positions` (`id`, `name`, `slug`, `created_at`, `updated_at`) VALUES
(1,	'Goalkeeper',	'goalkeeper',	NULL,	NULL),
(2,	'Defender',	'defender',	NULL,	NULL),
(3,	'Midfielder',	'midfielder',	NULL,	NULL),
(4,	'Forward',	'forward',	NULL,	NULL);

DROP TABLE IF EXISTS `regions`;
CREATE TABLE `regions` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `regions_name_unique` (`name`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

INSERT INTO `regions` (`id`, `name`, `slug`, `created_at`, `updated_at`) VALUES
(1,	'England',	'england',	NULL,	NULL),
(2,	'Wales',	'wales',	NULL,	NULL),
(3,	'Scotland',	'scotland',	NULL,	NULL),
(4,	'Northern Ireland',	'northern-ireland',	NULL,	NULL);

DROP TABLE IF EXISTS `users`;
CREATE TABLE `users` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_email_unique` (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1,	'Harry',	'harry@shopblocks.com',	NULL,	'$2y$10$ekue0AUqF0ZeUOKe745Pe.VhOYIyVZQZOVjHEGjYLb8H/Aqv7hiQi',	NULL,	'2024-07-08 12:04:40',	'2024-07-08 12:04:40');

-- 2024-07-08 18:08:44
