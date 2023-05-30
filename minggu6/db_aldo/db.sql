/*
SQLyog Community v13.1.7 (64 bit)
MySQL - 10.4.27-MariaDB : Database - db_aldo
*********************************************************************
*/

/*!40101 SET NAMES utf8 */;

/*!40101 SET SQL_MODE=''*/;

/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;
CREATE DATABASE /*!32312 IF NOT EXISTS*/`db_aldo` /*!40100 DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci */;

USE `db_aldo`;

/*Table structure for table `barang` */

DROP TABLE IF EXISTS `barang`;

CREATE TABLE `barang` (
  `id` decimal(10,0) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `hrg` float NOT NULL,
  `jml` decimal(11,0) NOT NULL,
  `keterangan` varchar(100) NOT NULL,
  `foto` varchar(225) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

/*Data for the table `barang` */

insert  into `barang`(`id`,`nama`,`hrg`,`jml`,`keterangan`,`foto`) values 
(2,'aglonemaRotundumAceh',30000,10,'','aglonemaRotundumAceh.jpg'),
(3,'aglonemaRoDudAnjamani',65000,10,'','aglonemaRoDudAnjamani.jpg'),
(4,'aglonemaVenus',65000,10,'-','aglonemaVenus.jpg'),
(7,'aglonemaRoDudAnjamani',65000,10,'-','aglonemaRoDudAnjamani.jpg'),
(8,'aglonemaVenus',65000,10,'-','aglonemaVenus.jpg');

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
