/*
SQLyog Enterprise - MySQL GUI v8.05 
MySQL - 5.1.37 : Database - gudang
*********************************************************************
*/

/*!40101 SET NAMES utf8 */;

/*!40101 SET SQL_MODE=''*/;

/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;

CREATE DATABASE /*!32312 IF NOT EXISTS*/`gudang` /*!40100 DEFAULT CHARACTER SET latin1 */;

USE `gudang`;

/*Table structure for table `t_barang` */

DROP TABLE IF EXISTS `t_barang`;

CREATE TABLE `t_barang` (
  `kd_barang` char(30) NOT NULL,
  `kd_jenis` varchar(30) DEFAULT NULL,
  `nama_barang` varchar(50) DEFAULT NULL,
  `satuan` char(6) DEFAULT NULL,
  `harga` int(100) DEFAULT NULL,
  `stok` int(10) DEFAULT NULL,
  `foto` varchar(50) DEFAULT NULL,
  `kd_supplier` varchar(25) DEFAULT NULL,
  PRIMARY KEY (`kd_barang`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

/*Data for the table `t_barang` */

insert  into `t_barang`(`kd_barang`,`kd_jenis`,`nama_barang`,`satuan`,`harga`,`stok`,`foto`,`kd_supplier`) values ('B001','J001','Rojolele Supers','Karung',360000,30,'beras1.jpg','A003'),('B002','J002','Rojolele AA','Karung',168000,25,'beras2.jpg','A004'),('B003','J003','Rojolele (Biasa)','Karung',156000,20,'beras.jpg','A006'),('B004','J004','Pandan Wangi Super','Karung',246000,25,'beras1.jpg','A001'),('B005','J005','Pandan Wangi','Karung',222000,20,'beras2.jpg','A002'),('B006','J006','Setra Ramos','Karung',138000,40,'beras.jpg','A005'),('B007','J007','Beras Raskin','Karung',120000,0,'beras.jpg','A007'),('B008','J008','Rojoee Super','Karung',240000,0,'beras.jpg','A008');

/*Table structure for table `t_detail_pesanan` */

DROP TABLE IF EXISTS `t_detail_pesanan`;

CREATE TABLE `t_detail_pesanan` (
  `no_pesanan` int(10) DEFAULT NULL,
  `kd_barang` char(10) DEFAULT NULL,
  `tgl_kirim` datetime DEFAULT NULL,
  `jml` int(10) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

/*Data for the table `t_detail_pesanan` */

insert  into `t_detail_pesanan`(`no_pesanan`,`kd_barang`,`tgl_kirim`,`jml`) values (2,'B001','2014-02-23 09:53:31',10),(1,'B002',NULL,1);

/*Table structure for table `t_harga` */

DROP TABLE IF EXISTS `t_harga`;

CREATE TABLE `t_harga` (
  `kd_harga` char(10) NOT NULL,
  `kd_barang` char(30) NOT NULL,
  `harga` int(10) NOT NULL,
  `satuan` varchar(30) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

/*Data for the table `t_harga` */

insert  into `t_harga`(`kd_harga`,`kd_barang`,`harga`,`satuan`) values ('H001','B001',300000,'karung'),('H002','B002',140000,'karung'),('H003','B003',130000,'karung'),('H004','B004',205000,'karung'),('H005','B005',185000,'karung'),('H006','B006',115000,'karung'),('H007','B007',100000,'Karung'),('H008','B008',200000,'Karung');

/*Table structure for table `t_jenis` */

DROP TABLE IF EXISTS `t_jenis`;

CREATE TABLE `t_jenis` (
  `kd_jenis` char(30) NOT NULL,
  `nama_jenis` varchar(50) DEFAULT NULL,
  `ket` text,
  PRIMARY KEY (`kd_jenis`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

/*Data for the table `t_jenis` */

insert  into `t_jenis`(`kd_jenis`,`nama_jenis`,`ket`) values ('J001','Rojolele','KW1, grain medium, wangi, putih, tidak mudah basi dan pulen'),('J002','Rojolele','Kualitas baik,grain medium, wangi, putih, tidak mudah basi dan pulen'),('J003','Rojolele','grain medium, wangi, putih, tidak mudah basi dan pulen'),('J004','Pandan Wangi','long grain, pulen, gurih, putih, bersih, tidak lengket, dan tidak cept basi'),('J005','Pandan Wangi','KW1,long grain, pulen, gurih, putih, bersih, tidak lengket, dan tidak cept basi'),('J006','Setra Ramos','long grain, pulen, gurih, putih'),('J007','Raskin','Teuas, teu ngeunah, loba batuan, serehna loba pisan, matak hoream Napiana'),('J008','Rojoee','Beras Bagus Sekali');

/*Table structure for table `t_kebijakan` */

DROP TABLE IF EXISTS `t_kebijakan`;

CREATE TABLE `t_kebijakan` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `garansi` text,
  `penjualan` text,
  `pemesanan` text,
  `pelanggan` text,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

/*Data for the table `t_kebijakan` */

insert  into `t_kebijakan`(`id`,`garansi`,`penjualan`,`pemesanan`,`pelanggan`) values (1,'<h1>Garansi Pembelian</h1>\r\n<h2>Garansi akan berlaku apabila :<br>\r\n1. Barang telah kadaluwarsa, basi atau tidak layak makan.<br>\r\n2. Barang datang tidak sesuai dengan pembelian.<br>\r\n3. Pelayanan tidak sesuai dengan yang diharapkan.<br>\r\n4. Barang tidak sampai dalam 1 Hari<br><br>\r\nGaransi dengan berdasarkan ketentuan dari pemilik, dan Garansi yang diterima sebesar 100%.</h2>','<h1>Ketentuan dan Kebijakan Penjualan</h1>\r\n<h2>Pelanggan/Bukan Langgan dapat membeli beras dengan ketentuan sebagai berikut:<br>\r\n1. Membeli barang yang siap jual.<br>\r\n2. Membeli barang yang ada dalam daftar jual.<br>\r\n3. Tidak dapat membeli barang yang stoknya dibawah 100.<br>\r\n4. Pemesanan hanya bisa dilakukan oleh Pelanggan.<br>\r\n5. Barang yang sudah dibeli tidak dapat dikembalikan ataupun ditukar.<br><br>\r\nSemua jenis pembelian kami layani sesuai ketentuan dan kebijan yang ada. NO NGANJUK !!</h2>','<h1>Ketentuan dan Kebijakan Pemesanan|</h1>\r\n<h2>Pemesanan/ Pembelian ke Supplier dapat dilakukan dengan kebijakan dan ketentuan sebagai berikut:<br>\r\n1. Membeli beras yang terdaftar.<br>\r\n2. Membeli beras hanya kepada Supplier yang sudah berlangganan.<br>\r\n3. Minimal Pembelian sebesar 50 karung.<br>\r\n4. Konfirmasi data barang setelah barang sampai.<br>\r\n5. Apabila barang datang dengan jumlah yang tidak sesuai, maka kami tidak akan menerima barang tersebut.<br><br>\r\nSemua jenis pemesanan dapatr dilakukan dengan sarat dan ketentuan yang ada.</h2>','<h1>Kebijakan dan Ketentuan Pelanggan<h1>\r\n<h2>Pelanggan memiliki beberapa keunggulan :<br>\r\n1. Pembelian bisa dilakukan dengan SMS.<br>\r\n2. Ongkos pengantaran barang Gratis.<br>\r\n3. Melayani 24 jam pembelian.<br>\r\n4. Melayani pembelian Wilayah Bandung dan sekitarnya.<br><br><br><br>\r\nCara menjadi Pelanggan :<br>\r\n1. Menyertakan KTP.<br>\r\n2. Membayar sebesar Rp 100.000;<br><br>\r\nMasa Aktif pelanggan selama 1 tahun, Setelahnya pelanggan harus membayar kembali.</h2>');

/*Table structure for table `t_keluar` */

DROP TABLE IF EXISTS `t_keluar`;

CREATE TABLE `t_keluar` (
  `kd_keluar` char(30) DEFAULT NULL,
  `kd_barang` char(30) NOT NULL,
  `kd_customer` char(30) NOT NULL,
  `tgl_keluar` date NOT NULL,
  `jml_keluar` int(30) NOT NULL,
  `laba` int(30) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

/*Data for the table `t_keluar` */

insert  into `t_keluar`(`kd_keluar`,`kd_barang`,`kd_customer`,`tgl_keluar`,`jml_keluar`,`laba`) values ('K003','B002','C004','2014-02-23',100,16800000),('K005','B004','C004','2014-02-28',10,2460000),('K005','B001','C004','2014-02-28',10,2400000),('K004','B001','C004','2014-02-23',10,60000),('K003','B006','C004','2014-02-23',100,13800000),('K003','B005','C004','2014-02-23',120,26640000),('K003','B004','C004','2014-02-23',100,24600000),('K003','B003','C004','2014-02-23',110,17160000),('K001','B001','UNKNOW','2014-01-02',1,360000),('K003','B001','C004','2014-02-23',70,25200000),('K002','B006','C004','2014-01-03',60,8280000),('K002','B005','C004','2014-01-03',60,13320000),('K002','B004','C004','2014-01-03',65,15990000),('K002','B003','C004','2014-01-03',70,10920000),('K002','B002','C004','2014-01-03',75,12600000),('K002','B001','C004','2014-01-03',80,28800000);

/*Table structure for table `t_pegawai` */

DROP TABLE IF EXISTS `t_pegawai`;

CREATE TABLE `t_pegawai` (
  `nip` varchar(30) NOT NULL,
  `nama_pegawai` varchar(30) DEFAULT NULL,
  `alamat` varchar(30) DEFAULT NULL,
  `tlp` char(10) DEFAULT NULL,
  `gambar` varchar(30) DEFAULT NULL,
  `username` varchar(35) DEFAULT NULL,
  PRIMARY KEY (`nip`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

/*Data for the table `t_pegawai` */

insert  into `t_pegawai`(`nip`,`nama_pegawai`,`alamat`,`tlp`,`gambar`,`username`) values ('111-111-111','Pegawai Ulet','PasirKoja','089898989','hadi.jpg','pegawai'),('98989898','Hatta Rajasa','Jl Terpasko','0897876','hadi.jpg','Bapak Hatta');

/*Table structure for table `t_pelanggan` */

DROP TABLE IF EXISTS `t_pelanggan`;

CREATE TABLE `t_pelanggan` (
  `kd` char(30) NOT NULL,
  `ktp` varchar(20) DEFAULT NULL,
  `nama_customer` varchar(50) DEFAULT NULL,
  `alamat` varchar(50) DEFAULT NULL,
  `tlp` char(10) DEFAULT NULL,
  `email` varchar(30) DEFAULT NULL,
  `bayar` int(10) DEFAULT NULL,
  PRIMARY KEY (`kd`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

/*Data for the table `t_pelanggan` */

insert  into `t_pelanggan`(`kd`,`ktp`,`nama_customer`,`alamat`,`tlp`,`email`,`bayar`) values ('C004','111222333444','Bapak Karyo','Pasir Koja','0896486867','hadibangbeur@gmail.com',100000),('C002','555666777888','Om Hadi','bandung','0909','j',100000),('C003','999101010111','firman fatur','cigondewah','0897979','fi@tahoo.com',100000),('UNKNOW','-','UNKNOW','BUKAN LANGGAN','-','-',0),('C001','12345678910','Afrizal Herman','Pagarsih','0899937890','afrizal@yahoo.com',100000);

/*Table structure for table `t_permintaan` */

DROP TABLE IF EXISTS `t_permintaan`;

CREATE TABLE `t_permintaan` (
  `no_permintaan` int(30) DEFAULT NULL,
  `tgl_permintaan` date DEFAULT NULL,
  `kd_supplier` char(10) DEFAULT NULL,
  `kd_barang` char(30) DEFAULT NULL,
  `jml_minta` int(10) DEFAULT NULL,
  `status` enum('terima','belum') DEFAULT NULL,
  `konfirmasi` enum('sudah','belum') DEFAULT NULL
) ENGINE=MyISAM AUTO_INCREMENT=23 DEFAULT CHARSET=latin1;

/*Data for the table `t_permintaan` */

insert  into `t_permintaan`(`no_permintaan`,`tgl_permintaan`,`kd_supplier`,`kd_barang`,`jml_minta`,`status`,`konfirmasi`) values (1,'2014-01-01','A001','B001',1,'terima','sudah'),(7,'2014-01-03','A005','B006',100,'terima','sudah'),(6,'2014-01-03','A002','B005',100,'terima','sudah'),(5,'2014-01-03','A001','B004',100,'terima','sudah'),(4,'2014-01-03','A006','B003',100,'terima','sudah'),(3,'2014-01-03','A004','B002',100,'terima','sudah'),(2,'2014-01-03','A003','B001',100,'terima','sudah'),(8,'2014-02-23','A003','B001',100,'terima','sudah'),(9,'2014-02-23','A004','B002',100,'terima','sudah'),(10,'2014-02-23','A006','B003',100,'terima','sudah'),(11,'2014-02-23','A001','B004',100,'terima','sudah'),(12,'2014-02-23','A002','B005',100,'terima','sudah'),(13,'2014-02-23','A005','B006',100,'terima','sudah'),(14,'2014-03-31','A003','B001',5,'belum','belum'),(15,'2014-03-31','A004','B002',5,'belum','belum'),(16,'2014-03-31','A006','B003',5,'belum','belum'),(17,'2014-03-31','A001','B004',5,'belum','belum'),(18,'2014-03-31','A002','B005',5,'belum','belum'),(19,'2014-03-31','A005','B006',5,'belum','belum');

/*Table structure for table `t_pesan` */

DROP TABLE IF EXISTS `t_pesan`;

CREATE TABLE `t_pesan` (
  `no` int(10) NOT NULL AUTO_INCREMENT,
  `username` varchar(35) DEFAULT NULL,
  `perihal` varchar(50) DEFAULT NULL,
  `isi` text,
  `tgl` date DEFAULT NULL,
  `status` enum('dibaca','belum') DEFAULT NULL,
  PRIMARY KEY (`no`)
) ENGINE=MyISAM AUTO_INCREMENT=10 DEFAULT CHARSET=latin1;

/*Data for the table `t_pesan` */

insert  into `t_pesan`(`no`,`username`,`perihal`,`isi`,`tgl`,`status`) values (1,'pegawai','Menjadi Admin','Tolonglah menjadi admin yang baik untuk semua pegawai karena saya mencari admin yang mencintai kita dengan sepenuh hati :(','2013-12-17','dibaca'),(2,'pegawai','jh','h	\r\n\\','2013-12-12','dibaca'),(3,'kepala','Admin Ganteng','Min mau ga jadi pacar aku ?? O:)','2013-12-29','dibaca'),(4,'pegawai','Halaman Rusak','Halaman Produk rusak min','2014-01-01','dibaca'),(8,'pegawai','Halaman Rusak','Admin halaman rusak pada login di google chrome','2014-02-07','dibaca'),(9,'pegawai','tes','ini pengecekan pesan','2014-02-09','dibaca');

/*Table structure for table `t_pesanan` */

DROP TABLE IF EXISTS `t_pesanan`;

CREATE TABLE `t_pesanan` (
  `no_pesanan` int(10) NOT NULL AUTO_INCREMENT,
  `tgl_pesan` date DEFAULT NULL,
  `kd_cust` char(10) DEFAULT NULL,
  `nip` char(20) DEFAULT NULL,
  `kirim` enum('kirim','belum') DEFAULT NULL,
  PRIMARY KEY (`no_pesanan`)
) ENGINE=MyISAM AUTO_INCREMENT=12 DEFAULT CHARSET=latin1;

/*Data for the table `t_pesanan` */

insert  into `t_pesanan`(`no_pesanan`,`tgl_pesan`,`kd_cust`,`nip`,`kirim`) values (2,'2014-02-23','C004','111-111-111','kirim'),(1,'2014-01-01','C004','111-111-111','belum');

/*Table structure for table `t_stok` */

DROP TABLE IF EXISTS `t_stok`;

CREATE TABLE `t_stok` (
  `kd_barang` varchar(25) DEFAULT NULL,
  `bulan` int(2) DEFAULT NULL,
  `tahun` year(4) DEFAULT NULL,
  `stok` int(10) DEFAULT NULL,
  `satuan` varchar(10) DEFAULT NULL,
  `status` enum('Y','N') DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

/*Data for the table `t_stok` */

insert  into `t_stok`(`kd_barang`,`bulan`,`tahun`,`stok`,`satuan`,`status`) values ('B001',1,2014,20,'Karung','Y'),('B002',1,2014,25,'Karung','Y'),('B003',1,2014,30,'Karung','Y'),('B004',1,2014,35,'Karung','Y'),('B005',1,2014,40,'Karung','Y'),('B006',1,2014,40,'Karung','Y'),('B007',1,2014,0,'Karung','Y'),('B008',1,2014,0,'Karung','Y'),('B001',2,2014,40,'Karung','Y'),('B002',2,2014,25,'Karung','Y'),('B003',2,2014,20,'Karung','Y'),('B004',2,2014,35,'Karung','Y'),('B005',2,2014,20,'Karung','Y'),('B006',2,2014,40,'Karung','Y'),('B007',2,2014,0,'Karung','Y'),('B008',2,2014,0,'Karung','Y'),('B001',3,2014,30,'Karung','Y'),('B002',3,2014,25,'Karung','Y'),('B003',3,2014,20,'Karung','Y'),('B004',3,2014,25,'Karung','Y'),('B005',3,2014,20,'Karung','Y'),('B006',3,2014,40,'Karung','Y'),('B007',3,2014,0,'Karung','Y'),('B008',3,2014,0,'Karung','Y');

/*Table structure for table `t_supplier` */

DROP TABLE IF EXISTS `t_supplier`;

CREATE TABLE `t_supplier` (
  `kd_supplier` char(10) NOT NULL,
  `nama_supplier` varchar(50) DEFAULT NULL,
  `alamat_supplier` varchar(100) DEFAULT NULL,
  `tlp` char(10) DEFAULT NULL,
  `email` varchar(30) DEFAULT NULL,
  `kd_jenis` char(30) DEFAULT NULL,
  PRIMARY KEY (`kd_supplier`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

/*Data for the table `t_supplier` */

insert  into `t_supplier`(`kd_supplier`,`nama_supplier`,`alamat_supplier`,`tlp`,`email`,`kd_jenis`) values ('A001','PD. Sumber rejeki','Jl.Hadinata 60 Cianjur','2000341','sumberrejeki@gmail.com','J004'),('A002','PD. Anugerah alam','Jl.Sudirman 01 Cianjur','2989903','Anugrah_alam@yahoo.com','J005'),('A003','PD. Harapan jaya','Jl.Gatot subroto 56 sumedang','9765426','Harapan_jaya@gmail.com','J001'),('A004','PD. Raharja','Jl.Amangkurat 200 subang','8608957','raharja@gmail.com','J002'),('A005','PD.Cipta indah','Jl.Pamoyanan 45 Subang','8965873','ciptaindah@yahoo.com','J006'),('A006','PD. Rojolele Bandung','Pasir Koja','08989800','bangbeur@gmail.com','J003'),('A007','PD Raskin Bandung','Jalan Jendral Sudirman','08989778','raskin@miskin.com','J007'),('A008','PD Alim Rugi Bandung','jalan Terpasko','089898989','alim@yahoo.com','J008');

/*Table structure for table `t_terima` */

DROP TABLE IF EXISTS `t_terima`;

CREATE TABLE `t_terima` (
  `no_faktur` char(20) DEFAULT NULL,
  `no_permintaan` int(30) DEFAULT NULL,
  `tgl_terima` date DEFAULT NULL,
  `kd_barang` char(30) DEFAULT NULL,
  `jml_terima` int(10) DEFAULT NULL,
  `pengeluaran` int(10) DEFAULT NULL,
  `nip` varchar(30) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

/*Data for the table `t_terima` */

insert  into `t_terima`(`no_faktur`,`no_permintaan`,`tgl_terima`,`kd_barang`,`jml_terima`,`pengeluaran`,`nip`) values ('8',13,'2014-02-23','B006',100,11500000,'111-111-111'),('1111',12,'2014-02-23','B005',100,18500000,'111-111-111'),('4',11,'2014-02-23','B004',100,20500000,'111-111-111'),('5',10,'2014-02-23','B003',100,13000000,'111-111-111'),('123',3,'2014-01-03','B002',100,14000000,'111-111-111'),('3',4,'2014-01-03','B003',100,13000000,'111-111-111'),('2',5,'2014-01-03','B004',100,20500000,'111-111-111'),('1',6,'2014-01-03','B005',100,18500000,'111-111-111'),('1231',7,'2014-01-03','B006',100,11500000,'111-111-111'),('9',8,'2014-02-23','B001',100,30000000,'111-111-111'),('6',9,'2014-02-23','B002',100,14000000,'111-111-111'),('12',1,'2014-02-11','B001',1,300000,'111-111-111'),('123',2,'2014-01-03','B001',100,30000000,'111-111-111'),(NULL,14,NULL,'B001',5,NULL,NULL),(NULL,15,NULL,'B002',5,NULL,NULL),(NULL,16,NULL,'B003',5,NULL,NULL),(NULL,17,NULL,'B004',5,NULL,NULL),(NULL,18,NULL,'B005',5,NULL,NULL),(NULL,19,NULL,'B006',5,NULL,NULL);

/*Table structure for table `t_user` */

DROP TABLE IF EXISTS `t_user`;

CREATE TABLE `t_user` (
  `username` varchar(35) NOT NULL,
  `password` varchar(35) NOT NULL,
  `akses` enum('pegawai','kepala','admin') NOT NULL,
  PRIMARY KEY (`username`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 CHECKSUM=1 DELAY_KEY_WRITE=1 ROW_FORMAT=DYNAMIC;

/*Data for the table `t_user` */

insert  into `t_user`(`username`,`password`,`akses`) values ('pegawai','047aeeb234644b9e2d4138ed3bc7976a','pegawai'),('kepala','870f669e4bbbfa8a6fde65549826d1c4','kepala'),('admin','21232f297a57a5a743894a0e4a801fc3','admin'),('ijal','bea631a775f589a6eb371da827631c88','pegawai'),('Bapak Hatta','6f8f57715090da2632453988d9a1501b','pegawai');

/* Trigger structure for table `t_harga` */

DELIMITER $$

/*!50003 DROP TRIGGER*//*!50032 IF EXISTS */ /*!50003 `harga` */$$

/*!50003 CREATE */ /*!50017 DEFINER = 'root'@'localhost' */ /*!50003 TRIGGER `harga` AFTER UPDATE ON `t_harga` FOR EACH ROW BEGIN
UPDATE t_barang
	SET harga=new.harga*20/100+new.harga
WHERE
	kd_barang=new.kd_barang;
    END */$$


DELIMITER ;

/* Trigger structure for table `t_pesanan` */

DELIMITER $$

/*!50003 DROP TRIGGER*//*!50032 IF EXISTS */ /*!50003 `hapus_pesanan` */$$

/*!50003 CREATE */ /*!50017 DEFINER = 'root'@'localhost' */ /*!50003 TRIGGER `hapus_pesanan` AFTER DELETE ON `t_pesanan` FOR EACH ROW BEGIN
DELETE FROM t_detail_pesanan WHERE no_pesanan=old.no_pesanan;
    END */$$


DELIMITER ;

/* Function  structure for function  `harga` */

/*!50003 DROP FUNCTION IF EXISTS `harga` */;
DELIMITER $$

/*!50003 CREATE DEFINER=`root`@`localhost` FUNCTION `harga`(kd varchar(50)) RETURNS int(10)
BEGIN
    DECLARE harga_jadi INT(10);
SELECT harga INTO harga_jadi FROM t_harga WHERE kd_barang=kd;
RETURN harga_jadi;
    END */$$
DELIMITER ;

/* Procedure structure for procedure `harga` */

/*!50003 DROP PROCEDURE IF EXISTS  `harga` */;

DELIMITER $$

/*!50003 CREATE DEFINER=`root`@`localhost` PROCEDURE `harga`(kd char(10),harga int(10))
BEGIN
UPDATE t_harga
	set harga=harga
WHERE
	kd_barang=kd;
    END */$$
DELIMITER ;

/*Table structure for table `barang` */

DROP TABLE IF EXISTS `barang`;

/*!50001 DROP VIEW IF EXISTS `barang` */;
/*!50001 DROP TABLE IF EXISTS `barang` */;

/*!50001 CREATE TABLE `barang` (
  `kd_barang` char(30) NOT NULL,
  `kd_jenis` varchar(30) DEFAULT NULL,
  `nama_barang` varchar(50) DEFAULT NULL,
  `satuan` char(6) DEFAULT NULL,
  `harga` int(100) DEFAULT NULL,
  `stok` int(10) DEFAULT NULL,
  `foto` varchar(50) DEFAULT NULL,
  `nama_jenis` varchar(50) DEFAULT NULL,
  `ket` text
) ENGINE=MyISAM DEFAULT CHARSET=latin1 */;

/*Table structure for table `keluar` */

DROP TABLE IF EXISTS `keluar`;

/*!50001 DROP VIEW IF EXISTS `keluar` */;
/*!50001 DROP TABLE IF EXISTS `keluar` */;

/*!50001 CREATE TABLE `keluar` (
  `total` decimal(32,0) DEFAULT NULL,
  `laba` decimal(32,0) DEFAULT NULL,
  `bulan` int(2) DEFAULT NULL,
  `tahun` int(4) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1 */;

/*Table structure for table `konfirmasi` */

DROP TABLE IF EXISTS `konfirmasi`;

/*!50001 DROP VIEW IF EXISTS `konfirmasi` */;
/*!50001 DROP TABLE IF EXISTS `konfirmasi` */;

/*!50001 CREATE TABLE `konfirmasi` (
  `kd_keluar` char(30) DEFAULT NULL,
  `kd_barang` char(30) NOT NULL,
  `kd` char(30) NOT NULL,
  `nama_barang` varchar(50) DEFAULT NULL,
  `nama_customer` varchar(50) DEFAULT NULL,
  `jml_keluar` int(30) NOT NULL,
  `harga` int(100) DEFAULT NULL,
  `stok` int(10) DEFAULT NULL,
  `foto` varchar(50) DEFAULT NULL,
  `tgl_keluar` date NOT NULL,
  `laba` int(30) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1 */;

/*Table structure for table `minta` */

DROP TABLE IF EXISTS `minta`;

/*!50001 DROP VIEW IF EXISTS `minta` */;
/*!50001 DROP TABLE IF EXISTS `minta` */;

/*!50001 CREATE TABLE `minta` (
  `no_permintaan` int(30) DEFAULT NULL,
  `konfirmasi` enum('sudah','belum') DEFAULT NULL,
  `tgl_permintaan` date DEFAULT NULL,
  `kd_supplier` char(10) DEFAULT NULL,
  `kd_barang` char(30) DEFAULT NULL,
  `jml_minta` int(10) DEFAULT NULL,
  `status` enum('terima','belum') DEFAULT NULL,
  `nama_barang` varchar(50) DEFAULT NULL,
  `stok` int(10) DEFAULT NULL,
  `foto` varchar(50) DEFAULT NULL,
  `nama_supplier` varchar(50) DEFAULT NULL,
  `harga` int(10) NOT NULL,
  `total` decimal(32,0) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1 */;

/*Table structure for table `permintaan` */

DROP TABLE IF EXISTS `permintaan`;

/*!50001 DROP VIEW IF EXISTS `permintaan` */;
/*!50001 DROP TABLE IF EXISTS `permintaan` */;

/*!50001 CREATE TABLE `permintaan` (
  `no_permintaan` int(30) DEFAULT NULL,
  `konfirmasi` enum('sudah','belum') DEFAULT NULL,
  `tgl_permintaan` date DEFAULT NULL,
  `kd_supplier` char(10) DEFAULT NULL,
  `kd_barang` char(30) DEFAULT NULL,
  `jml_minta` int(10) DEFAULT NULL,
  `status` enum('terima','belum') DEFAULT NULL,
  `nama_barang` varchar(50) DEFAULT NULL,
  `stok` int(10) DEFAULT NULL,
  `foto` varchar(50) DEFAULT NULL,
  `nama_supplier` varchar(50) DEFAULT NULL,
  `harga` int(10) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1 */;

/*Table structure for table `r_minta` */

DROP TABLE IF EXISTS `r_minta`;

/*!50001 DROP VIEW IF EXISTS `r_minta` */;
/*!50001 DROP TABLE IF EXISTS `r_minta` */;

/*!50001 CREATE TABLE `r_minta` (
  `no_permintaan` int(30) DEFAULT NULL,
  `tgl_permintaan` date DEFAULT NULL,
  `kd_barang` char(30) DEFAULT NULL,
  `jml_minta` int(10) DEFAULT NULL,
  `status` enum('terima','belum') DEFAULT NULL,
  `no_faktur` char(20) DEFAULT NULL,
  `nip` varchar(30) DEFAULT NULL,
  `pengeluaran` int(10) DEFAULT NULL,
  `nama_barang` varchar(50) DEFAULT NULL,
  `bulan` int(2) DEFAULT NULL,
  `tahun` int(4) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1 */;

/*Table structure for table `r_produk` */

DROP TABLE IF EXISTS `r_produk`;

/*!50001 DROP VIEW IF EXISTS `r_produk` */;
/*!50001 DROP TABLE IF EXISTS `r_produk` */;

/*!50001 CREATE TABLE `r_produk` (
  `kd_keluar` char(30) DEFAULT NULL,
  `kd_barang` char(30) NOT NULL,
  `kd_customer` char(30) NOT NULL,
  `tgl_keluar` date NOT NULL,
  `jml_keluar` int(30) NOT NULL,
  `laba` int(30) NOT NULL,
  `nama_barang` varchar(50) DEFAULT NULL,
  `bulan` int(2) DEFAULT NULL,
  `tahun` int(4) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1 */;

/*Table structure for table `sup` */

DROP TABLE IF EXISTS `sup`;

/*!50001 DROP VIEW IF EXISTS `sup` */;
/*!50001 DROP TABLE IF EXISTS `sup` */;

/*!50001 CREATE TABLE `sup` (
  `kd_supplier` char(10) NOT NULL,
  `nama_supplier` varchar(50) DEFAULT NULL,
  `alamat_supplier` varchar(100) DEFAULT NULL,
  `tlp` char(10) DEFAULT NULL,
  `email` varchar(30) DEFAULT NULL,
  `kd_jenis` char(30) DEFAULT NULL,
  `nama_jenis` varchar(50) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1 */;

/*Table structure for table `terima` */

DROP TABLE IF EXISTS `terima`;

/*!50001 DROP VIEW IF EXISTS `terima` */;
/*!50001 DROP TABLE IF EXISTS `terima` */;

/*!50001 CREATE TABLE `terima` (
  `no_faktur` char(20) DEFAULT NULL,
  `no_permintaan` int(30) DEFAULT NULL,
  `tgl_terima` date DEFAULT NULL,
  `kd_barang` char(30) DEFAULT NULL,
  `jml_terima` int(10) DEFAULT NULL,
  `pengeluaran` int(10) DEFAULT NULL,
  `nip` varchar(30) DEFAULT NULL,
  `nama_barang` varchar(50) DEFAULT NULL,
  `stok` int(10) DEFAULT NULL,
  `foto` varchar(50) DEFAULT NULL,
  `status` enum('terima','belum') DEFAULT NULL,
  `nama_pegawai` varchar(30) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1 */;

/*Table structure for table `v_keluar` */

DROP TABLE IF EXISTS `v_keluar`;

/*!50001 DROP VIEW IF EXISTS `v_keluar` */;
/*!50001 DROP TABLE IF EXISTS `v_keluar` */;

/*!50001 CREATE TABLE `v_keluar` (
  `nama_customer` varchar(50) DEFAULT NULL,
  `total` decimal(32,0) DEFAULT NULL,
  `bulan` bigint(20) DEFAULT NULL,
  `kd` char(30) NOT NULL DEFAULT ''
) ENGINE=MyISAM DEFAULT CHARSET=latin1 */;

/*Table structure for table `v_pesanan` */

DROP TABLE IF EXISTS `v_pesanan`;

/*!50001 DROP VIEW IF EXISTS `v_pesanan` */;
/*!50001 DROP TABLE IF EXISTS `v_pesanan` */;

/*!50001 CREATE TABLE `v_pesanan` (
  `no_pesanan` int(10) NOT NULL DEFAULT '0',
  `tgl_pesan` date DEFAULT NULL,
  `kd_cust` char(10) DEFAULT NULL,
  `nip` char(20) DEFAULT NULL,
  `kirim` enum('kirim','belum') DEFAULT NULL,
  `nama_customer` varchar(50) DEFAULT NULL,
  `kd_barang` char(10) DEFAULT NULL,
  `tgl_kirim` datetime DEFAULT NULL,
  `jml` int(10) DEFAULT NULL,
  `nama_barang` varchar(50) DEFAULT NULL,
  `stok` int(10) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1 */;

/*View structure for view barang */

/*!50001 DROP TABLE IF EXISTS `barang` */;
/*!50001 DROP VIEW IF EXISTS `barang` */;

/*!50001 CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `barang` AS select `a`.`kd_barang` AS `kd_barang`,`a`.`kd_jenis` AS `kd_jenis`,`a`.`nama_barang` AS `nama_barang`,`a`.`satuan` AS `satuan`,`a`.`harga` AS `harga`,`a`.`stok` AS `stok`,`a`.`foto` AS `foto`,`b`.`nama_jenis` AS `nama_jenis`,`b`.`ket` AS `ket` from (`t_barang` `a` join `t_jenis` `b`) where (`a`.`kd_jenis` = `b`.`kd_jenis`) */;

/*View structure for view keluar */

/*!50001 DROP TABLE IF EXISTS `keluar` */;
/*!50001 DROP VIEW IF EXISTS `keluar` */;

/*!50001 CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `keluar` AS select sum(`t_keluar`.`jml_keluar`) AS `total`,sum(`t_keluar`.`laba`) AS `laba`,month(`t_keluar`.`tgl_keluar`) AS `bulan`,year(`t_keluar`.`tgl_keluar`) AS `tahun` from `t_keluar` group by month(`t_keluar`.`tgl_keluar`) */;

/*View structure for view konfirmasi */

/*!50001 DROP TABLE IF EXISTS `konfirmasi` */;
/*!50001 DROP VIEW IF EXISTS `konfirmasi` */;

/*!50001 CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `konfirmasi` AS select `a`.`kd_keluar` AS `kd_keluar`,`c`.`kd_barang` AS `kd_barang`,`b`.`kd` AS `kd`,`c`.`nama_barang` AS `nama_barang`,`b`.`nama_customer` AS `nama_customer`,`a`.`jml_keluar` AS `jml_keluar`,`c`.`harga` AS `harga`,`c`.`stok` AS `stok`,`c`.`foto` AS `foto`,`a`.`tgl_keluar` AS `tgl_keluar`,`a`.`laba` AS `laba` from ((`t_keluar` `a` join `t_pelanggan` `b`) join `t_barang` `c`) where ((`a`.`kd_barang` = `c`.`kd_barang`) and (`b`.`kd` = `a`.`kd_customer`)) */;

/*View structure for view minta */

/*!50001 DROP TABLE IF EXISTS `minta` */;
/*!50001 DROP VIEW IF EXISTS `minta` */;

/*!50001 CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `minta` AS (select `a`.`no_permintaan` AS `no_permintaan`,`a`.`konfirmasi` AS `konfirmasi`,`a`.`tgl_permintaan` AS `tgl_permintaan`,`a`.`kd_supplier` AS `kd_supplier`,`a`.`kd_barang` AS `kd_barang`,`a`.`jml_minta` AS `jml_minta`,`a`.`status` AS `status`,`b`.`nama_barang` AS `nama_barang`,`b`.`stok` AS `stok`,`b`.`foto` AS `foto`,`c`.`nama_supplier` AS `nama_supplier`,`d`.`harga` AS `harga`,sum(`a`.`jml_minta`) AS `total` from (((`t_permintaan` `a` join `t_barang` `b`) join `t_supplier` `c`) join `t_harga` `d`) where ((`a`.`status` = 'belum') and (`a`.`kd_barang` = `b`.`kd_barang`) and (`a`.`kd_supplier` = `c`.`kd_supplier`) and (`b`.`kd_barang` = `d`.`kd_barang`)) group by `b`.`nama_barang`) */;

/*View structure for view permintaan */

/*!50001 DROP TABLE IF EXISTS `permintaan` */;
/*!50001 DROP VIEW IF EXISTS `permintaan` */;

/*!50001 CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `permintaan` AS (select `a`.`no_permintaan` AS `no_permintaan`,`a`.`konfirmasi` AS `konfirmasi`,`a`.`tgl_permintaan` AS `tgl_permintaan`,`a`.`kd_supplier` AS `kd_supplier`,`a`.`kd_barang` AS `kd_barang`,`a`.`jml_minta` AS `jml_minta`,`a`.`status` AS `status`,`b`.`nama_barang` AS `nama_barang`,`b`.`stok` AS `stok`,`b`.`foto` AS `foto`,`c`.`nama_supplier` AS `nama_supplier`,`d`.`harga` AS `harga` from (((`t_permintaan` `a` join `t_barang` `b`) join `t_supplier` `c`) join `t_harga` `d`) where ((`a`.`status` = 'belum') and (`a`.`kd_barang` = `b`.`kd_barang`) and (`a`.`kd_supplier` = `c`.`kd_supplier`) and (`b`.`kd_barang` = `d`.`kd_barang`))) */;

/*View structure for view r_minta */

/*!50001 DROP TABLE IF EXISTS `r_minta` */;
/*!50001 DROP VIEW IF EXISTS `r_minta` */;

/*!50001 CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `r_minta` AS (select `a`.`no_permintaan` AS `no_permintaan`,`a`.`tgl_permintaan` AS `tgl_permintaan`,`a`.`kd_barang` AS `kd_barang`,`a`.`jml_minta` AS `jml_minta`,`a`.`status` AS `status`,`b`.`no_faktur` AS `no_faktur`,`b`.`nip` AS `nip`,`b`.`pengeluaran` AS `pengeluaran`,`c`.`nama_barang` AS `nama_barang`,month(`a`.`tgl_permintaan`) AS `bulan`,year(`a`.`tgl_permintaan`) AS `tahun` from ((`t_permintaan` `a` join `t_terima` `b`) join `t_barang` `c`) where ((`a`.`no_permintaan` = `b`.`no_permintaan`) and (`a`.`kd_barang` = `c`.`kd_barang`))) */;

/*View structure for view r_produk */

/*!50001 DROP TABLE IF EXISTS `r_produk` */;
/*!50001 DROP VIEW IF EXISTS `r_produk` */;

/*!50001 CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `r_produk` AS (select `a`.`kd_keluar` AS `kd_keluar`,`a`.`kd_barang` AS `kd_barang`,`a`.`kd_customer` AS `kd_customer`,`a`.`tgl_keluar` AS `tgl_keluar`,`a`.`jml_keluar` AS `jml_keluar`,`a`.`laba` AS `laba`,`b`.`nama_barang` AS `nama_barang`,month(`a`.`tgl_keluar`) AS `bulan`,year(`a`.`tgl_keluar`) AS `tahun` from (`t_keluar` `a` join `t_barang` `b`) where (`a`.`kd_barang` = `b`.`kd_barang`) order by month(`a`.`tgl_keluar`)) */;

/*View structure for view sup */

/*!50001 DROP TABLE IF EXISTS `sup` */;
/*!50001 DROP VIEW IF EXISTS `sup` */;

/*!50001 CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `sup` AS select `a`.`kd_supplier` AS `kd_supplier`,`a`.`nama_supplier` AS `nama_supplier`,`a`.`alamat_supplier` AS `alamat_supplier`,`a`.`tlp` AS `tlp`,`a`.`email` AS `email`,`a`.`kd_jenis` AS `kd_jenis`,`b`.`nama_jenis` AS `nama_jenis` from (`t_supplier` `a` join `t_jenis` `b`) where (`a`.`kd_jenis` = `b`.`kd_jenis`) */;

/*View structure for view terima */

/*!50001 DROP TABLE IF EXISTS `terima` */;
/*!50001 DROP VIEW IF EXISTS `terima` */;

/*!50001 CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `terima` AS (select `a`.`no_faktur` AS `no_faktur`,`a`.`no_permintaan` AS `no_permintaan`,`a`.`tgl_terima` AS `tgl_terima`,`a`.`kd_barang` AS `kd_barang`,`a`.`jml_terima` AS `jml_terima`,`a`.`pengeluaran` AS `pengeluaran`,`a`.`nip` AS `nip`,`b`.`nama_barang` AS `nama_barang`,`b`.`stok` AS `stok`,`b`.`foto` AS `foto`,`c`.`status` AS `status`,`d`.`nama_pegawai` AS `nama_pegawai` from (((`t_terima` `a` join `t_barang` `b`) join `t_permintaan` `c`) join `t_pegawai` `d`) where ((`a`.`kd_barang` = `b`.`kd_barang`) and (`a`.`no_permintaan` = `c`.`no_permintaan`) and (`c`.`status` = 'terima') and (`a`.`nip` = `d`.`nip`))) */;

/*View structure for view v_keluar */

/*!50001 DROP TABLE IF EXISTS `v_keluar` */;
/*!50001 DROP VIEW IF EXISTS `v_keluar` */;

/*!50001 CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `v_keluar` AS select `b`.`nama_customer` AS `nama_customer`,sum(`a`.`jml_keluar`) AS `total`,month(`a`.`tgl_keluar`) AS `bulan`,`b`.`kd` AS `kd` from (`t_keluar` `a` join `t_pelanggan` `b`) where ((`a`.`kd_customer` = `b`.`kd`) and (month(`a`.`tgl_keluar`) = '1')) group by `b`.`nama_customer` union select `b`.`nama_customer` AS `nama_customer`,sum(`a`.`jml_keluar`) AS `total`,month(`a`.`tgl_keluar`) AS `bulan`,`b`.`kd` AS `kd` from (`t_keluar` `a` join `t_pelanggan` `b`) where ((`a`.`kd_customer` = `b`.`kd`) and (month(`a`.`tgl_keluar`) = '2')) group by `b`.`nama_customer` union select `b`.`nama_customer` AS `nama_customer`,sum(`a`.`jml_keluar`) AS `total`,month(`a`.`tgl_keluar`) AS `bulan`,`b`.`kd` AS `kd` from (`t_keluar` `a` join `t_pelanggan` `b`) where ((`a`.`kd_customer` = `b`.`kd`) and (month(`a`.`tgl_keluar`) = '3')) group by `b`.`nama_customer` */;

/*View structure for view v_pesanan */

/*!50001 DROP TABLE IF EXISTS `v_pesanan` */;
/*!50001 DROP VIEW IF EXISTS `v_pesanan` */;

/*!50001 CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `v_pesanan` AS (select `a`.`no_pesanan` AS `no_pesanan`,`a`.`tgl_pesan` AS `tgl_pesan`,`a`.`kd_cust` AS `kd_cust`,`a`.`nip` AS `nip`,`a`.`kirim` AS `kirim`,`b`.`nama_customer` AS `nama_customer`,`c`.`kd_barang` AS `kd_barang`,`c`.`tgl_kirim` AS `tgl_kirim`,`c`.`jml` AS `jml`,`d`.`nama_barang` AS `nama_barang`,`d`.`stok` AS `stok` from (((`t_pesanan` `a` join `t_pelanggan` `b`) join `t_detail_pesanan` `c`) join `t_barang` `d`) where ((`a`.`kd_cust` = `b`.`kd`) and (`a`.`no_pesanan` = `c`.`no_pesanan`) and (`c`.`kd_barang` = `d`.`kd_barang`))) */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
