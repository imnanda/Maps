/*
SQLyog Ultimate v11.33 (64 bit)
MySQL - 5.6.24 : Database - atolmap
*********************************************************************
*/

/*!40101 SET NAMES utf8 */;

/*!40101 SET SQL_MODE=''*/;

/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;
CREATE DATABASE /*!32312 IF NOT EXISTS*/`atolmap` /*!40100 DEFAULT CHARACTER SET latin1 */;

USE `atolmap`;

/*Table structure for table `admin` */

DROP TABLE IF EXISTS `admin`;

CREATE TABLE `admin` (
  `username` varchar(10) NOT NULL,
  `password` varchar(50) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `hakAkses` enum('Admin','Super Admin') DEFAULT NULL,
  `registrationDate` datetime DEFAULT NULL,
  `photoPath` varchar(50) DEFAULT NULL,
  `email` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`username`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `admin` */

insert  into `admin`(`username`,`password`,`nama`,`hakAkses`,`registrationDate`,`photoPath`,`email`) values ('alif','a70150f2b7995af2fd70df4d93ef663a','Alif Maulana','Admin','2015-06-06 22:18:59','alif/alif.jpg','alifmaulana25@yahoo.com'),('atta','a70150f2b7995af2fd70df4d93ef663a','Alif Maulana El Fattah Nataly','Super Admin','2015-06-05 02:05:25','alif/alif.jpg','alifmaulana25@yahoo.com');

/*Table structure for table `gambar` */

DROP TABLE IF EXISTS `gambar`;

CREATE TABLE `gambar` (
  `idGambar` int(11) NOT NULL AUTO_INCREMENT,
  `pathGambar` varchar(100) DEFAULT NULL,
  `idUsaha` int(11) DEFAULT NULL,
  PRIMARY KEY (`idGambar`),
  KEY `idLokasi` (`idUsaha`),
  CONSTRAINT `gambar_ibfk_1` FOREIGN KEY (`idUsaha`) REFERENCES `usaha` (`idUsaha`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `gambar` */

/*Table structure for table `kecamatan` */

DROP TABLE IF EXISTS `kecamatan`;

CREATE TABLE `kecamatan` (
  `idKecamatan` int(11) NOT NULL AUTO_INCREMENT,
  `namaKecamatan` varchar(20) DEFAULT NULL,
  `kodePos` varchar(5) DEFAULT NULL,
  PRIMARY KEY (`idKecamatan`)
) ENGINE=InnoDB AUTO_INCREMENT=23 DEFAULT CHARSET=latin1;

/*Data for the table `kecamatan` */

insert  into `kecamatan`(`idKecamatan`,`namaKecamatan`,`kodePos`) values (1,'Lembang','40391'),(2,'Cisarua','40551'),(3,'Ngamprah','40552'),(4,'Padalarang','40553'),(5,'Cipatat','40554'),(6,'Cikalongwetan','40556'),(7,'Cipeundeuy','40558'),(8,'Parongpong','40559'),(9,'Batujajar','40561'),(10,'Cihampelas','40562'),(11,'Sidangkerta','40563'),(12,'Cipongkor','40564'),(13,'Gununghalu','40565'),(14,'Rongga','40566'),(15,'Cililin','40562'),(16,'Saguling','40561');

/*Table structure for table `kelurahan` */

DROP TABLE IF EXISTS `kelurahan`;

CREATE TABLE `kelurahan` (
  `idKelurahan` int(11) NOT NULL AUTO_INCREMENT,
  `namaKelurahan` varchar(20) DEFAULT NULL,
  `idKecamatan` int(11) DEFAULT NULL,
  PRIMARY KEY (`idKelurahan`),
  KEY `idKecamatan` (`idKecamatan`),
  CONSTRAINT `kelurahan_ibfk_1` FOREIGN KEY (`idKecamatan`) REFERENCES `kecamatan` (`idKecamatan`)
) ENGINE=InnoDB AUTO_INCREMENT=170 DEFAULT CHARSET=latin1;

/*Data for the table `kelurahan` */

insert  into `kelurahan`(`idKelurahan`,`namaKelurahan`,`idKecamatan`) values (1,'Batujajar Barat',9),(2,'Batujajar Timur',9),(3,'Cangkorah',9),(4,'Gelanggan',9),(5,'Giriasih',9),(6,'Pangauban',9),(7,'Selacu',9),(8,'Baranangsiang',12),(9,'Cibenda',12),(10,'Cicangkang Hilir',12),(11,'Cijambi',12),(12,'Cijenuk',12),(13,'Cintaasih',12),(14,'Citalem',12),(15,'Girimukti',12),(16,'Karangasih',12),(17,'Mekarsari',12),(18,'Neglasari',12),(19,'Sarinagen',12),(20,'Simagalih',12),(21,'Sukamulya',12),(22,'Bojong',14),(23,'Bojongsalam',14),(24,'Cibedug',14),(25,'Cibitung',14),(26,'Cicadas',14),(27,'Cinengah',14),(28,'Sukamanah',14),(29,'Sukaresmi',14),(30,'Cikalong',6),(31,'Cipada',6),(32,'Ciptagumati',6),(33,'Cisomang Barat',6),(34,'Ganjarsari',6),(35,'Kanangasari',6),(36,'Mandalamukti',6),(37,'Mandalasari',6),(38,'Mekarjaya',6),(39,'Puteran',6),(40,'Rende',6),(41,'Tenjolaut',6),(42,'Wangunjaya',6),(43,'Cipada',2),(44,'Jambudipa',2),(45,'Kertawangi',2),(46,'Padaasih',2),(47,'Pasirhalang',2),(48,'Pasirlangu',2),(49,'Sadangmekar',2),(50,'Tugumukti',2),(51,'Buninagara',11),(52,'Cicangkang Girang',11),(53,'Cikadu',11),(54,'Mekarwangi',11),(55,'Cintakarya',11),(56,'Pasirpogor',11),(57,'Puncaksari',11),(58,'Ranca Senggang',11),(59,'Sindangkerta',11),(60,'Wangusari',11),(61,'Weninggalih',11),(62,'Cihampelas',10),(63,'Cipatik',10),(64,'Citapen',10),(65,'Mekarjaya',10),(66,'Mekarmukti',10),(67,'Pataruman',10),(68,'Singajaya',10),(69,'Situwangi',10),(70,'Tanjungjaya',10),(71,'Tanjungwangi',10),(72,'Bunijaya',13),(73,'Celak',13),(74,'Cilangari',13),(75,'Gununghalu',13),(76,'Sindagjaya',13),(77,'Simajaya',13),(78,'Sukasari',13),(79,'Tamanjaya',13),(80,'Wargasaluyu',13),(82,'Cibogo',1),(83,'Cikahuripan',1),(84,'Cikidang',1),(85,'Cikole',1),(86,'Gudangkahuripan',1),(87,'Jayagiri',1),(88,'Kayuambon',1),(89,'Langensari',1),(90,'Lembang',1),(91,'Mekarwangi',1),(92,'Pagerwangi',1),(93,'Sukajaya',1),(94,'Suntenjaya',1),(95,'Wangunharja',1),(96,'Wangunsari',1),(97,'Batulayang',15),(98,'Bongas',15),(99,'Budiharja',15),(100,'Cililin',15),(101,'Karanganyar',15),(103,'Karangtanjung',15),(105,'Karyamukti',15),(106,'Kidangpananjung',15),(107,'Mukapayung',15),(108,'Nanggerang',15),(109,'Rancapanggung',15),(110,'Bojongkoneng',3),(111,'Cilame',3),(112,'Cimanggu',3),(113,'Cimareme',3),(114,'Gadobangkong',3),(115,'Margajaya',3),(116,'Mekarsari',3),(117,'Ngamprah',3),(118,'Pakuhaji',3),(119,'Sukatani',3),(120,'Tanimulya',3),(121,'Cipangeran',16),(122,'Jati',16),(123,'Cikande',16),(124,'Bojongheulang',16),(125,'Saguling',16),(126,'Girimukti',16),(127,'Cipatat',5),(128,'Ciptaharja',5),(129,'Cirawamekar',5),(130,'Citatah',5),(131,'Gunungmasigit',5),(132,'Kertamukti',5),(133,'Mandalasari',5),(134,'Mandalawangi',5),(135,'Nyalindung',5),(136,'Rajamandala Kulon',5),(137,'Sarimukti',5),(138,'Sumurbandung',5),(139,'Cempakamekar',4),(140,'Ciburuy',4),(141,'Cimerang',4),(142,'Cipeundeuy',4),(143,'Jayamekar',4),(144,'Kertajaya',4),(145,'Kertamulya',4),(146,'Laksanamekar',4),(147,'Padalarang',4),(148,'Tagogapu',4),(149,'Bojongmekar',7),(150,'Ciharashas',7),(151,'Cipeundeuy',7),(152,'Ciroyom',7),(153,'Jatimekar',7),(154,'Margalaksana',7),(155,'Margaluyu',7),(156,'Nanggeleng',7),(157,'Nyenang',7),(158,'Sirnagalih',7),(159,'Sirnaraja',7),(160,'Sukahaji',7),(161,'Cigugur Girang',8),(162,'Cihanjuang Rahayu',8),(163,'Cihanjuang',8),(164,'Cihideung',8),(165,'Ciwaruga',8),(166,'Karyawangi',8),(167,'Sariwangi',8);

/*Table structure for table `pemilikusaha` */

DROP TABLE IF EXISTS `pemilikusaha`;

CREATE TABLE `pemilikusaha` (
  `noKTP` varchar(17) NOT NULL,
  `nama` varchar(50) DEFAULT NULL,
  `email` varchar(50) DEFAULT NULL,
  `noHP` varchar(12) DEFAULT NULL,
  `alamat` varchar(100) DEFAULT NULL,
  `tglLahir` date DEFAULT NULL,
  `tmpLahir` varchar(50) DEFAULT NULL,
  `status` tinyint(1) DEFAULT '0',
  `photo` varchar(100) DEFAULT NULL,
  `pathKTP` varchar(50) DEFAULT NULL,
  `username` varchar(10) DEFAULT NULL,
  `pass` varchar(50) DEFAULT NULL,
  `token` varchar(128) DEFAULT NULL,
  PRIMARY KEY (`noKTP`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `pemilikusaha` */

insert  into `pemilikusaha`(`noKTP`,`nama`,`email`,`noHP`,`alamat`,`tglLahir`,`tmpLahir`,`status`,`photo`,`pathKTP`,`username`,`pass`,`token`) values ('123','alif','123','123','132','2015-06-10','123',0,'alif/alif.jpg','alif/alif.ktp.jpg','123','123','123'),('1234','jainal','1234','1234','1234','2015-06-12','1234',1,'1234','1234','1234','1234','1234'),('12345','imam','12345','12345','12345','2015-05-26','12345',0,'1234','12345','12345','12345','12345');

/*Table structure for table `sektorusaha` */

DROP TABLE IF EXISTS `sektorusaha`;

CREATE TABLE `sektorusaha` (
  `idSektor` int(11) NOT NULL AUTO_INCREMENT,
  `namaSektor` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`idSektor`)
) ENGINE=InnoDB AUTO_INCREMENT=22 DEFAULT CHARSET=latin1;

/*Data for the table `sektorusaha` */

insert  into `sektorusaha`(`idSektor`,`namaSektor`) values (1,'Periklanan'),(2,'Arsitektur'),(3,'Pasar Barang Seni'),(4,'Kerajinan'),(5,'Desain'),(6,'Fashion'),(7,'Video'),(8,'Film dan Fotografi'),(9,'Permainan Interaktif'),(10,'Musik'),(11,'Seni Pertunjukan '),(12,'Penerbitan dan Percetakan'),(13,'Layanan Komputer dan Piranti Lunak'),(14,'Televisi & Radio'),(15,'Riset dan Pengembang'),(16,'Kuliner');

/*Table structure for table `usaha` */

DROP TABLE IF EXISTS `usaha`;

CREATE TABLE `usaha` (
  `idUsaha` int(11) NOT NULL AUTO_INCREMENT,
  `latitude` varchar(20) DEFAULT NULL,
  `longtitude` varchar(20) DEFAULT NULL,
  `namaUsaha` varchar(50) DEFAULT NULL,
  `statusUsaha` tinyint(1) DEFAULT '0',
  `alamatUsaha` varchar(100) DEFAULT NULL,
  `deskripsi` varchar(200) DEFAULT NULL,
  `skalaUsaha` enum('Mikro','Kecil','Menengah') DEFAULT NULL,
  `idSektor` int(11) DEFAULT NULL,
  `idKecamatan` int(11) DEFAULT NULL,
  `idKelurahan` int(11) DEFAULT NULL,
  `noKTP` varchar(16) DEFAULT NULL,
  PRIMARY KEY (`idUsaha`),
  KEY `noKTP` (`noKTP`),
  KEY `idKelurahan` (`idKelurahan`),
  KEY `idKecamatan` (`idKecamatan`),
  KEY `idSektor` (`idSektor`),
  CONSTRAINT `usaha_ibfk_1` FOREIGN KEY (`noKTP`) REFERENCES `pemilikusaha` (`noKTP`),
  CONSTRAINT `usaha_ibfk_2` FOREIGN KEY (`idKecamatan`) REFERENCES `kecamatan` (`idKecamatan`),
  CONSTRAINT `usaha_ibfk_3` FOREIGN KEY (`idKelurahan`) REFERENCES `kelurahan` (`idKelurahan`),
  CONSTRAINT `usaha_ibfk_4` FOREIGN KEY (`idSektor`) REFERENCES `sektorusaha` (`idSektor`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

/*Data for the table `usaha` */

insert  into `usaha`(`idUsaha`,`latitude`,`longtitude`,`namaUsaha`,`statusUsaha`,`alamatUsaha`,`deskripsi`,`skalaUsaha`,`idSektor`,`idKecamatan`,`idKelurahan`,`noKTP`) values (1,'123','123','123',0,'alamat123','123','Kecil',1,1,1,'123'),(2,'1234','1234','1234',1,'alamat1234','1234','Menengah',2,2,43,'1234'),(3,'12345','12345','12345',0,'alamat12345','12345','Mikro',3,3,111,'12345');

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
