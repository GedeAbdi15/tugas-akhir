/*
SQLyog Professional v12.5.1 (64 bit)
MySQL - 10.4.22-MariaDB : Database - db_arsip
*********************************************************************
*/

/*!40101 SET NAMES utf8 */;

/*!40101 SET SQL_MODE=''*/;

/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;
CREATE DATABASE /*!32312 IF NOT EXISTS*/`db_arsip` /*!40100 DEFAULT CHARACTER SET utf8mb4 */;

USE `db_arsip`;

/*Table structure for table `cores` */

DROP TABLE IF EXISTS `cores`;

CREATE TABLE `cores` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `cores` */

/*Table structure for table `data_masuks` */

DROP TABLE IF EXISTS `data_masuks`;

CREATE TABLE `data_masuks` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `asal_dokumen` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `perihal` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nomor_dokumen` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tgl_masuk` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `file` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `keterangan` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `data_masuks` */

insert  into `data_masuks`(`id`,`asal_dokumen`,`perihal`,`nomor_dokumen`,`tgl_masuk`,`file`,`keterangan`,`created_at`,`updated_at`) values 
(1,'kantor walikota','undangan','1/msk/2023/005','18 mei 2023',NULL,'none','2023-05-18 03:42:33','2023-05-18 05:56:37'),
(2,'kantor pajak','surat','1/klr/2023/000','18 mei 2023','assets/uploads/documents/masuk/1/klr/2023/000.pdf','awdad','2023-05-18 05:44:42','2023-05-18 05:44:42'),
(3,'kantor lurah fatubesi','asdgaskdfaksfd','1/msk/2023/003','20 mei 2023','assets/uploads/documents/masuk/1/msk/2023/003.pdf','adawddawdawdawdawdadaegwgw','2023-05-19 02:13:50','2023-05-19 02:13:50'),
(4,'kantor camat alak','surat','1/msk/2023/010','20 mei 2023','assets/uploads/documents/masuk/1/msk/2023/010.pdf','tes','2023-05-19 02:33:02','2023-05-19 02:33:02'),
(5,'kantor walikota','undangan','1/msk/2023/011','20 mei 2023','assets/uploads/documents/masuk/1/msk/2023/011.pdf','tes2','2023-05-19 02:33:31','2023-05-19 02:33:31'),
(6,'telkom','tagihan','1/msk/2023/012','20 mei 2023','assets/uploads/documents/masuk/1/msk/2023/012.pdf','tes3','2023-05-19 02:34:11','2023-05-19 02:34:11'),
(7,'kantor walikota','surat','1/klr/2023/079','20 mei 2023','Project 3.pdf.pdf','tes','2023-06-04 00:47:22','2023-06-04 00:47:22');

/*Table structure for table `data_models` */

DROP TABLE IF EXISTS `data_models`;

CREATE TABLE `data_models` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `nomor_dokumen` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `keterangan_khusus` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `file` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `kategori` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `data_models` */

insert  into `data_models`(`id`,`nomor_dokumen`,`keterangan_khusus`,`file`,`kategori`,`created_at`,`updated_at`) values 
(1,'1/klr/2023/002','dokumen milik ibu jenab lodo',NULL,'Keterangan Ahli Waris','2023-05-09 00:45:18','2023-05-18 06:17:25'),
(3,'1/klr/2023/003','dokumen milik pak markus','assets/uploads/documents/keluar/1/klr/2023/003.pdf','Keterangan Domisili Usaha','2023-05-19 00:22:22','2023-05-19 00:22:22'),
(4,'1/klr/2023/006','ddawdwadaw',NULL,'Keterangan Usaha','2023-05-19 00:32:34','2023-05-19 00:57:23'),
(5,'1/klr/2023/001','fgdfgdfhdf','assets/uploads/documents/keluar/1/klr/2023/001.pdf','Keterangan SKCK','2023-05-19 00:33:22','2023-05-19 00:33:22'),
(6,'1/klr/2023/004','fghfhfghfg','assets/uploads/documents/keluar/1/klr/2023/004.pdf','Keterangan Kematian','2023-05-19 00:33:51','2023-05-19 00:33:51'),
(7,'1/klr/2023/005','hghghghghghgh','assets/uploads/documents/keluar/1/klr/2023/005.pdf','Keterangan Kelahiran','2023-05-19 00:34:14','2023-05-19 00:34:14'),
(8,'1/klr/2023/060','tes','assets/uploads/documents/keluar/Project 3.pdf.pdf','Surat Keluar Umum','2023-06-04 00:31:52','2023-06-04 00:31:52'),
(9,'1/klr/2023/078','tes','Project 1.pdf.pdf','Keterangan IMB','2023-06-04 00:36:13','2023-06-04 00:36:33'),
(11,'111111111111','tes','Doc1.pdf.pdf','Surat Keluar Umum','2023-06-19 02:58:37','2023-06-19 02:58:37');

/*Table structure for table `failed_jobs` */

DROP TABLE IF EXISTS `failed_jobs`;

CREATE TABLE `failed_jobs` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `uuid` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp(),
  PRIMARY KEY (`id`),
  UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `failed_jobs` */

/*Table structure for table `master` */

DROP TABLE IF EXISTS `master`;

CREATE TABLE `master` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `master` */

/*Table structure for table `migrations` */

DROP TABLE IF EXISTS `migrations`;

CREATE TABLE `migrations` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `migrations` */

insert  into `migrations`(`id`,`migration`,`batch`) values 
(1,'2014_10_12_000000_create_users_table',1),
(2,'2014_10_12_100000_create_password_resets_table',1),
(3,'2019_08_19_000000_create_failed_jobs_table',1),
(4,'2019_12_14_000001_create_personal_access_tokens_table',1),
(5,'2023_01_10_010632_create_cores_table',1),
(6,'2023_04_19_024747_create_data_models_table',1),
(7,'2023_04_29_132622_create_data_masuks_table',1),
(8,'2023_05_09_002509_master',1);

/*Table structure for table `password_resets` */

DROP TABLE IF EXISTS `password_resets`;

CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `password_resets` */

/*Table structure for table `personal_access_tokens` */

DROP TABLE IF EXISTS `personal_access_tokens`;

CREATE TABLE `personal_access_tokens` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `tokenable_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tokenable_id` bigint(20) unsigned NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `abilities` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `expires_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `personal_access_tokens` */

/*Table structure for table `users` */

DROP TABLE IF EXISTS `users`;

CREATE TABLE `users` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `role` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `NIP` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_nip_unique` (`NIP`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `users` */

insert  into `users`(`id`,`name`,`role`,`NIP`,`password`,`remember_token`,`created_at`,`updated_at`) values 
(1,'Admin','Admin','Adm1','$2y$10$OG.yKvSDBMgHiyGlXI1ce.YO2CXsaXQ2Qe2xLgGJntO4bBrxjH4Ni',NULL,'2023-05-09 00:27:52','2023-05-09 00:27:52'),
(2,'Staf','Staf','staf1','$2y$10$.zoXTWMemBqICOIjViAx5eppo9qRzEP3IHVIIQx/xePQmgyR3by12',NULL,'2023-05-09 00:27:52','2023-05-09 00:27:52'),
(4,'Gede Abdi','Staf','staf2','$2y$10$BLxvjAugUD2fhvc8GwYMcOyfkGv0ieW6tjs0X/UoVPP627tydB65e','bgmRFiJUbnslZRiJ7bhepF8HNVjUbQxm9SKsbU6yQ7R7P3FYgy8D5u8Qkt7d','2023-06-19 02:48:04','2023-06-19 02:48:04');

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
