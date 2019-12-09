DROP TABLE IF EXISTS `peserta`;

CREATE TABLE `peserta` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_rt` int(11) DEFAULT NULL,
  `nama` varchar(50) DEFAULT NULL,
  `no_ktp` int(11) DEFAULT NULL,
  `pendapatan` varchar(50) DEFAULT NULL,
  `pekerjaan` varchar(50) DEFAULT NULL,
  `jumlah_tanggungan` varchar(11) DEFAULT NULL,
  `rumah` varchar(50) DEFAULT NULL,
  `pendidikan` varchar(50) DEFAULT NULL,
  `alamat` varchar(100) DEFAULT NULL,
  `kirim` varchar(5) DEFAULT NULL,
  `nilai` double DEFAULT NULL,
  `status` varchar(50) DEFAULT NULL,
  `updated_at` date DEFAULT NULL,
  `created_at` date DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `id_rt` (`id_rt`),
  CONSTRAINT `peserta_ibfk_1` FOREIGN KEY (`id_rt`) REFERENCES `user` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

/*Data for the table `peserta` */

insert  into `peserta`(`id`,`id_rt`,`nama`,`no_ktp`,`pendapatan`,`pekerjaan`,`jumlah_tanggungan`,`rumah`,`pendidikan`,`alamat`,`kirim`,`nilai`,`status`,`updated_at`,`created_at`) values 
(1,2,'Iqbal Hidayat',1323424,'3.000.000 - 4.000.000','PNS','2','Layak','S1','Perum Palem Putri R/3 Balonggabus Candi Sidoarjo',NULL,NULL,NULL,'2019-11-24','2019-11-24'),
(2,2,'Rosida',2346790,'2.000.000 - 3.000.000','Wirausaha','3','Cukup Layak','S1','qtyuidfghjkvbn',NULL,NULL,NULL,'2019-11-24','2019-11-24');

/*Table structure for table `user` */

DROP TABLE IF EXISTS `user`;

CREATE TABLE `user` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nama` varchar(50) DEFAULT NULL,
  `dari_rt` varchar(50) NOT NULL,
  `alamat` varchar(100) DEFAULT NULL,
  `no_ktp` int(11) DEFAULT NULL,
  `username` varchar(50) DEFAULT NULL,
  `password` varchar(50) DEFAULT NULL,
  `jabatan` varchar(10) DEFAULT NULL,
  `status` varchar(20) DEFAULT 'nonaktif',
  `updated_at` date DEFAULT NULL,
  `created_at` date DEFAULT NULL,
  PRIMARY KEY (`id`,`dari_rt`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

/*Data for the table `user` */

insert  into `user`(`id`,`nama`,`dari_rt`,`alamat`,`no_ktp`,`username`,`password`,`jabatan`,`status`,`updated_at`,`created_at`) values 
(1,'admin','desa','Sobontoro',1111,'admin','admin','Desa','nonaktif',NULL,NULL),
(2,'Rian Dwi Susanto','RT01','qwerajshdk',123456788,'rian','1234','rt','nonaktif','2019-11-24','2019-11-24'),
(3,'Sulistyanto Laili R','RT02','qwertyuio',23456789,'sulis','1234','rt','nonaktif','2019-11-24','2019-11-24');

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
