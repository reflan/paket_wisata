/*
SQLyog Ultimate v11.21 (64 bit)
MySQL - 8.0.30 : Database - db_pariwisata
*********************************************************************
*/

/*!40101 SET NAMES utf8 */;

/*!40101 SET SQL_MODE=''*/;

/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;
CREATE DATABASE /*!32312 IF NOT EXISTS*/`db_pariwisata` /*!40100 DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci */ /*!80016 DEFAULT ENCRYPTION='N' */;

USE `db_pariwisata`;

/*Table structure for table `pesanan` */

DROP TABLE IF EXISTS `pesanan`;

CREATE TABLE `pesanan` (
  `id` int NOT NULL AUTO_INCREMENT,
  `nama_pemesanan` varchar(255) DEFAULT NULL,
  `no_hp` varchar(20) DEFAULT NULL,
  `tanggal` date DEFAULT NULL,
  `waktu_pelaksanaan` int DEFAULT NULL,
  `pelayanan` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  `jumlah` int DEFAULT NULL,
  `harga_paket` float DEFAULT NULL,
  `jumlah_tagihan` float DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

/*Data for the table `pesanan` */

insert  into `pesanan`(`id`,`nama_pemesanan`,`no_hp`,`tanggal`,`waktu_pelaksanaan`,`pelayanan`,`jumlah`,`harga_paket`,`jumlah_tagihan`) values (8,'testing','0897111','2025-06-26',1,'penginapan|makan',1,1500000,1500000),(10,'coba1','coba2','2025-06-27',2,'penginapan|transportasi',23,2200000,101200000),(11,'123','123','2025-06-26',2,'penginapan|transportasi|makan',2,2700000,10800000);

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
