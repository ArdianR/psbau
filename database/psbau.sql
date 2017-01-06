/*
Navicat MySQL Data Transfer

Source Server         : localhost_3306
Source Server Version : 50505
Source Host           : localhost:3306
Source Database       : psbau

Target Server Type    : MYSQL
Target Server Version : 50505
File Encoding         : 65001

Date: 2016-12-21 17:00:55
*/

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for psb_admin
-- ----------------------------
DROP TABLE IF EXISTS `psb_admin`;
CREATE TABLE `psb_admin` (
  `username` varchar(50) NOT NULL,
  `password` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `nama` varchar(255) DEFAULT NULL,
  `panggilan` varchar(255) DEFAULT NULL,
  `ts` timestamp NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`username`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of psb_admin
-- ----------------------------
INSERT INTO `psb_admin` VALUES ('admin', 'adminpsbau', 'maumbisurabaya@gmail.com', 'MA Amanatul Ummah', null, '2016-12-18 20:47:06');

-- ----------------------------
-- Table structure for psb_agama
-- ----------------------------
DROP TABLE IF EXISTS `psb_agama`;
CREATE TABLE `psb_agama` (
  `idagama` int(10) NOT NULL,
  `agama` varchar(20) CHARACTER SET latin1 NOT NULL,
  `urutan` tinyint(2) NOT NULL,
  `ts` timestamp NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`idagama`),
  KEY `psb_agama_ts` (`ts`) USING BTREE
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of psb_agama
-- ----------------------------
INSERT INTO `psb_agama` VALUES ('1', 'Islam', '1', '2016-12-04 10:39:04');
INSERT INTO `psb_agama` VALUES ('2', 'Katolik', '2', '2016-12-04 10:39:40');
INSERT INTO `psb_agama` VALUES ('3', 'Protestan', '3', '2016-12-04 10:39:58');
INSERT INTO `psb_agama` VALUES ('4', 'Hindu', '4', '2016-12-04 10:40:27');
INSERT INTO `psb_agama` VALUES ('5', 'Budha', '5', '2016-12-04 10:40:31');
INSERT INTO `psb_agama` VALUES ('6', 'Kristen', '6', '2016-12-04 10:40:48');

-- ----------------------------
-- Table structure for psb_calonsiswa
-- ----------------------------
DROP TABLE IF EXISTS `psb_calonsiswa`;
CREATE TABLE `psb_calonsiswa` (
  `idcalonsiswa` int(5) unsigned zerofill NOT NULL AUTO_INCREMENT,
  `iduser` int(4) unsigned zerofill DEFAULT NULL,
  `nopendaftaran` varchar(20) NOT NULL,
  `lembaga` varchar(100) NOT NULL,
  `kelompok` varchar(100) NOT NULL,
  `tahunmasuk` int(10) unsigned NOT NULL,
  `nisn` varchar(50) DEFAULT NULL,
  `nik` varchar(50) DEFAULT NULL,
  `noun` varchar(50) DEFAULT NULL,
  `nama` varchar(100) NOT NULL,
  `panggilan` varchar(30) DEFAULT NULL,
  `jeniskelamin` varchar(1) DEFAULT NULL,
  `tmplahir` varchar(50) DEFAULT NULL,
  `tgllahir` date DEFAULT NULL,
  `agama` varchar(20) NOT NULL,
  `suku` varchar(20) DEFAULT NULL,
  `kondisi` varchar(100) DEFAULT NULL,
  `warga` varchar(5) NOT NULL,
  `anakke` tinyint(2) unsigned NOT NULL DEFAULT '0',
  `jsaudara` tinyint(2) unsigned DEFAULT '0',
  `alamatsiswa` varchar(255) DEFAULT NULL,
  `desa` varchar(100) CHARACTER SET latin1 DEFAULT NULL,
  `rt` int(3) DEFAULT NULL,
  `rw` int(3) DEFAULT NULL,
  `kecamatan` varchar(50) CHARACTER SET latin1 DEFAULT NULL,
  `kota` varchar(30) CHARACTER SET latin1 DEFAULT NULL,
  `provinsi` varchar(50) CHARACTER SET latin1 DEFAULT NULL,
  `kodepos` varchar(8) CHARACTER SET latin1 DEFAULT NULL,
  `jarak` tinyint(1) unsigned DEFAULT '0',
  `hpsiswa` varchar(20) DEFAULT NULL,
  `emailsiswa` varchar(100) DEFAULT NULL,
  `asalsekolah` varchar(100) DEFAULT NULL,
  `noijasah` varchar(25) DEFAULT NULL,
  `tglijasah` varchar(25) DEFAULT NULL,
  `ketsekolah` varchar(100) DEFAULT NULL,
  `darah` varchar(2) DEFAULT NULL,
  `berat` decimal(4,1) unsigned DEFAULT '0.0',
  `tinggi` decimal(4,1) unsigned DEFAULT '0.0',
  `ukuransepatu` int(2) DEFAULT NULL,
  `ukuranbaju` char(5) CHARACTER SET latin1 DEFAULT NULL,
  `ukurancelana` int(2) DEFAULT NULL,
  `kesehatan` varchar(150) DEFAULT NULL,
  `namaayah` varchar(60) DEFAULT NULL,
  `namaibu` varchar(60) DEFAULT NULL,
  `almayah` tinyint(1) unsigned NOT NULL DEFAULT '0',
  `almibu` tinyint(1) unsigned NOT NULL DEFAULT '0',
  `statusayah` varchar(20) DEFAULT NULL,
  `statusibu` varchar(20) DEFAULT NULL,
  `tmplahirayah` varchar(35) DEFAULT NULL,
  `tmplahiribu` varchar(35) DEFAULT NULL,
  `tgllahirayah` varchar(35) DEFAULT NULL,
  `tgllahiribu` varchar(35) DEFAULT NULL,
  `pendidikanayah` varchar(20) DEFAULT NULL,
  `pendidikanibu` varchar(20) DEFAULT NULL,
  `pekerjaanayah` varchar(60) DEFAULT NULL,
  `pekerjaanibu` varchar(60) DEFAULT NULL,
  `penghasilanayah` varchar(70) DEFAULT '0',
  `penghasilanibu` varchar(70) DEFAULT '0',
  `emailayah` varchar(50) DEFAULT NULL,
  `emailibu` varchar(50) DEFAULT NULL,
  `alamatortu` varchar(100) DEFAULT NULL,
  `hportu` varchar(20) DEFAULT NULL,
  `hobi` text,
  `foto` varchar(255) DEFAULT NULL,
  `sum1` decimal(10,0) NOT NULL DEFAULT '0',
  `sum2` decimal(10,0) NOT NULL DEFAULT '0',
  `binsmt1` decimal(5,2) NOT NULL DEFAULT '0.00',
  `binsmt2` decimal(5,2) NOT NULL DEFAULT '0.00',
  `binsmt3` decimal(5,2) NOT NULL DEFAULT '0.00',
  `binsmt4` decimal(5,2) NOT NULL DEFAULT '0.00',
  `binsmt5` decimal(5,2) NOT NULL DEFAULT '0.00',
  `bingsmt1` decimal(5,2) NOT NULL,
  `bingsmt2` decimal(5,2) NOT NULL,
  `bingsmt3` decimal(5,2) NOT NULL,
  `bingsmt4` decimal(5,2) NOT NULL,
  `bingsmt5` decimal(5,2) NOT NULL,
  `matsmt1` decimal(5,2) NOT NULL,
  `matsmt2` decimal(5,2) NOT NULL,
  `matsmt3` decimal(5,2) NOT NULL,
  `matsmt4` decimal(5,2) NOT NULL,
  `matsmt5` decimal(5,2) NOT NULL,
  `ipasmt1` decimal(5,2) NOT NULL,
  `ipasmt2` decimal(5,2) NOT NULL,
  `ipasmt3` decimal(5,2) NOT NULL,
  `ipasmt4` decimal(5,2) NOT NULL,
  `ipasmt5` decimal(5,2) NOT NULL,
  `ipssmt1` decimal(5,2) NOT NULL,
  `ipssmt2` decimal(5,2) NOT NULL,
  `ipssmt3` decimal(5,2) NOT NULL,
  `ipssmt4` decimal(5,2) NOT NULL,
  `ipssmt5` decimal(5,2) NOT NULL,
  `agamasmt1` decimal(5,2) NOT NULL,
  `agamasmt2` decimal(5,2) NOT NULL,
  `agamasmt3` decimal(5,2) NOT NULL,
  `agamasmt4` decimal(5,2) NOT NULL,
  `agamasmt5` decimal(5,2) NOT NULL,
  `ppknsmt1` decimal(5,2) NOT NULL,
  `ppknsmt2` decimal(5,2) NOT NULL,
  `ppknsmt3` decimal(5,2) NOT NULL,
  `ppknsmt4` decimal(5,2) NOT NULL,
  `ppknsmt5` decimal(5,2) NOT NULL,
  `penjassmt1` decimal(5,2) NOT NULL,
  `penjassmt2` decimal(5,2) NOT NULL,
  `penjassmt3` decimal(5,2) NOT NULL,
  `penjassmt4` decimal(5,2) NOT NULL,
  `penjassmt5` decimal(5,2) NOT NULL,
  `senismt1` decimal(5,2) NOT NULL,
  `senismt2` decimal(5,2) NOT NULL,
  `senismt3` decimal(5,2) NOT NULL,
  `senismt4` decimal(5,2) NOT NULL,
  `senismt5` decimal(5,2) NOT NULL,
  `prestasi` varchar(255) DEFAULT NULL,
  `ts` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `statusfinalisasi` char(2) DEFAULT '',
  PRIMARY KEY (`idcalonsiswa`),
  KEY `iduser` (`iduser`) USING BTREE,
  KEY `nopendaftaran` (`nopendaftaran`) USING BTREE
) ENGINE=InnoDB AUTO_INCREMENT=38 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of psb_calonsiswa
-- ----------------------------
INSERT INTO `psb_calonsiswa` VALUES ('00021', '0016', 'psbmau1700016', 'MA Unggulan Amanatul Ummah', 'Gelombang 1', '2017', '', '', '', 'wewe', 'wewe', '', '', '0000-00-00', 'Islam', 'Jawa', 'Berkecukupan', '', '0', '0', '', '', '0', '0', '', 'Surabaya', '', '', '0', '', 'wewe@wewe.com', '', '', '', '', '', '0.0', '0.0', '0', '', '0', '', '', '', '0', '0', 'Ortu Kandung', 'Ortu Kandung', '', '', '', '', 'D1', 'D1', '--Pilih--', '--Pilih--', '--Pilih--', '--Pilih--', '', '', 'alamatku', '', '', '', '0', '0', '55.60', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', 'Menjadi seorang profesionalis', '2016-12-12 10:13:05', null);
INSERT INTO `psb_calonsiswa` VALUES ('00022', '0017', '', 'MA Unggulan Amanatul Ummah', 'Gelombang 1', '2017', '678', '678', '6554', 'Yayan Ruhiyan', 'Yayan', 'L', 'Surabaya', '2016-12-27', 'Islam', 'Jawa', 'Berkecukupan', 'WNI', '4', '5', '', '', '0', '0', '', '', '', '', '0', '', '', '', '', '', '', '', '0.0', '0.0', '0', '', '0', '', '', '', '0', '0', '', '', '', '', '', '', 'SMA', 'SMA', '--Pilih--', '--Pilih--', '0', '0', '', '', '', '', '', '', '0', '0', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '', '2016-12-12 03:24:53', '');
INSERT INTO `psb_calonsiswa` VALUES ('00023', '0018', '', '', '', '0', null, null, null, '', '', null, null, null, '', null, null, '', '0', '0', null, null, null, null, null, null, null, null, '0', null, '', null, null, null, null, null, '0.0', '0.0', null, null, null, null, null, null, '0', '0', null, null, null, null, null, null, null, null, null, null, '0', '0', null, null, null, null, null, null, '0', '0', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', null, '2016-12-12 10:15:06', '');
INSERT INTO `psb_calonsiswa` VALUES ('00024', '0019', 'PSBMAUG1170019', 'MA Unggulan Amanatul Ummah', 'Gelombang 1', '2017', '345', '345345', '43534534', 'Nur Haula Muna', 'Muna', 'P', 'Sidoarjo', '2016-12-14', 'Islam', 'Jawa', 'Berkecukupan', 'WNI', '2', '4', 'alamat muna', 'desa', '3', '3', 'kecamatan', 'kab', 'prov', 'kode', '6', '0875665765', 'muna@gmail.com', 'asal sekolah', 'no ijasah', '2016-12-07', 'ketsekolah', 'B', '20.0', '170.0', '21', 'S', '32', 'kesehatan', 'mambangil', 'ernawati', '1', '1', 'Ortu Kandung', 'Ortu Kandung', 'Surabaya', 'Surabaya', '2016-12-14', '2016-12-11', 'S1', 'S1', 'Swasta', 'Wiraswasta', 'Rp. 500.000,- s.d Rp. 1.000.000,-', 'Rp. 1.000.000,- s.d Rp. 2.000.000,-', 'emailortu@gmail.com', 'emailayah@gmail.com', 'alamatortu', '089878767', 'hobi gue', '', '0', '0', '55.55', '55.55', '55.55', '55.55', '55.55', '55.55', '55.55', '55.55', '55.55', '55.55', '55.55', '55.55', '55.55', '55.55', '55.55', '55.55', '55.55', '55.55', '55.55', '55.55', '55.55', '55.55', '55.55', '55.55', '55.55', '55.55', '55.55', '55.55', '55.55', '55.55', '55.55', '55.55', '55.55', '55.55', '55.55', '55.55', '55.55', '55.55', '55.55', '55.55', '55.55', '55.55', '55.55', '55.55', '55.55', 'lomba makan kerupuk', '2016-12-21 16:49:05', 'n');
INSERT INTO `psb_calonsiswa` VALUES ('00033', '0030', '', 'MBI Amanatul Ummah', 'Gelombang 1', '2017', '67778', null, null, 'Tandurane', 'Sumilir', null, null, null, '', null, null, '', '0', '0', null, null, null, null, null, null, null, null, '0', null, 'jabiralhaiyan@gmail.com', null, null, null, null, null, '0.0', '0.0', null, null, null, null, null, null, '0', '0', null, null, null, null, null, null, null, null, null, null, '0', '0', null, null, null, null, null, null, '0', '0', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', null, '2016-12-14 23:37:45', 'y');
INSERT INTO `psb_calonsiswa` VALUES ('00036', '0033', '', 'MBI Amanatul Ummah', 'Gelombang 2', '2017', '98698', null, null, 'uyguif', 'iugig', null, null, null, '', null, null, '', '0', '0', null, null, null, null, null, null, null, null, '0', null, 'jabiralhayyan27@gmail.com', null, null, null, null, null, '36.0', '0.0', null, null, null, null, null, null, '0', '0', null, null, null, null, null, null, null, null, null, null, '0', '0', null, null, null, null, null, null, '0', '0', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', null, '2016-12-15 00:18:19', 'y');
INSERT INTO `psb_calonsiswa` VALUES ('00037', '0034', 'PSBMAUG1170034', 'MA Unggulan Amanatul Ummah', 'Gelombang 1', '2017', '546456564', '6456565645', '5654645645654', 'Jabir Al Hayyan', 'Jabir', 'L', 'Surabaya', '2000-06-13', 'Islam', 'Jawa', 'Berkecukupan', 'WNI', '3', '4', 'Jalan Smea 27, Wonokromo, Surabaya', '', '5', '5', 'Wonokromo', 'Surabaya', 'Jawa Timur', '60243', '10', '089679093686', 'jabiralhayyan07@gmail.com', 'SMP Khadijah', '', '', '', 'O', '50.0', '160.0', '38', 'M', '30', '', '', '', '0', '0', 'Ortu Kandung', 'Ortu Kandung', '', '', '', '', 'D1', 'D1', '--Pilih--', '--Pilih--', '--Pilih--', '--Pilih--', '', '', '', '', '', 'assets/profpic/0034-Jabir_Al_Hayyan-1482293491.jpg', '0', '0', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '', '2016-12-20 20:14:27', 'y');

-- ----------------------------
-- Table structure for psb_jenispekerjaan
-- ----------------------------
DROP TABLE IF EXISTS `psb_jenispekerjaan`;
CREATE TABLE `psb_jenispekerjaan` (
  `idpekerjaan` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `pekerjaan` varchar(100) NOT NULL,
  `ts` timestamp NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`idpekerjaan`),
  KEY `psb_jenispekerjaan_ts` (`ts`) USING BTREE
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of psb_jenispekerjaan
-- ----------------------------
INSERT INTO `psb_jenispekerjaan` VALUES ('1', 'PNS', '2016-12-04 20:45:54');
INSERT INTO `psb_jenispekerjaan` VALUES ('2', 'Wiraswasta', '2016-12-04 20:45:56');
INSERT INTO `psb_jenispekerjaan` VALUES ('3', 'Swasta', '2016-12-04 20:45:58');
INSERT INTO `psb_jenispekerjaan` VALUES ('4', 'Lainnya', '2016-12-04 20:46:01');

-- ----------------------------
-- Table structure for psb_kelompokcalonsiswa
-- ----------------------------
DROP TABLE IF EXISTS `psb_kelompokcalonsiswa`;
CREATE TABLE `psb_kelompokcalonsiswa` (
  `idkelompok` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `kelompok` varchar(100) NOT NULL,
  `urut` int(1) NOT NULL,
  `kapasitas` int(10) NOT NULL,
  `tglmulai` date DEFAULT NULL,
  `tglselesai` date DEFAULT NULL,
  `keterangan` varchar(255) DEFAULT NULL,
  `ts` timestamp NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`idkelompok`),
  KEY `psb_kelompokcalonsiswa_ts` (`ts`) USING BTREE
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of psb_kelompokcalonsiswa
-- ----------------------------
INSERT INTO `psb_kelompokcalonsiswa` VALUES ('1', 'Gelombang 1', '1', '100', '2016-12-01', '2017-01-01', null, '2016-12-14 15:08:00');
INSERT INTO `psb_kelompokcalonsiswa` VALUES ('2', 'Gelombang 2', '2', '100', null, null, null, '2016-12-14 15:06:00');

-- ----------------------------
-- Table structure for psb_kondisisiswa
-- ----------------------------
DROP TABLE IF EXISTS `psb_kondisisiswa`;
CREATE TABLE `psb_kondisisiswa` (
  `idkondisi` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `kondisi` varchar(50) NOT NULL,
  `urutan` tinyint(2) NOT NULL,
  `ts` timestamp NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`idkondisi`),
  KEY `psb_kondisisiswa_ts` (`ts`) USING BTREE
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of psb_kondisisiswa
-- ----------------------------
INSERT INTO `psb_kondisisiswa` VALUES ('1', 'Berkecukupan', '1', '2016-12-04 20:36:38');
INSERT INTO `psb_kondisisiswa` VALUES ('2', 'Kurang Mampu', '2', '2016-12-04 20:36:40');
INSERT INTO `psb_kondisisiswa` VALUES ('3', 'Kaya Raya', '3', '2016-12-04 20:36:42');

-- ----------------------------
-- Table structure for psb_lembaga
-- ----------------------------
DROP TABLE IF EXISTS `psb_lembaga`;
CREATE TABLE `psb_lembaga` (
  `idlembaga` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `lembaga` varchar(50) NOT NULL,
  `kependekan` char(5) DEFAULT NULL,
  `urutan` tinyint(2) NOT NULL,
  `keterangan` varchar(255) DEFAULT NULL,
  `ts` timestamp NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`idlembaga`),
  KEY `psb_lembaga_ts` (`ts`) USING BTREE
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of psb_lembaga
-- ----------------------------
INSERT INTO `psb_lembaga` VALUES ('1', 'MA Unggulan Amanatul Ummah', 'mau', '1', null, '2016-12-12 09:45:33');
INSERT INTO `psb_lembaga` VALUES ('2', 'MBI Amanatul Ummah', 'mbi', '2', null, '2016-12-12 09:45:38');

-- ----------------------------
-- Table structure for psb_log
-- ----------------------------
DROP TABLE IF EXISTS `psb_log`;
CREATE TABLE `psb_log` (
  `idlog` int(5) NOT NULL AUTO_INCREMENT,
  `iduser` int(4) DEFAULT NULL,
  `nama` varchar(100) DEFAULT NULL,
  `notifikasi` varchar(20) DEFAULT NULL,
  `tipe` int(2) DEFAULT NULL,
  `tanggal` date DEFAULT NULL,
  `waktu` time DEFAULT NULL,
  PRIMARY KEY (`idlog`)
) ENGINE=InnoDB AUTO_INCREMENT=24 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of psb_log
-- ----------------------------
INSERT INTO `psb_log` VALUES ('1', '19', 'Nur Haula Muna', 'Telah Login', '1', '2016-12-19', '13:23:46');
INSERT INTO `psb_log` VALUES ('2', '33', 'uyfy', 'Telah Login', '1', '2016-12-20', '14:07:45');
INSERT INTO `psb_log` VALUES ('3', '78', 'gvu', 'Telah Login', '1', '2016-12-21', '14:08:15');
INSERT INTO `psb_log` VALUES ('4', '3434', 'ergerger', 'Telah Login', '1', '2016-12-19', '14:14:39');
INSERT INTO `psb_log` VALUES ('5', '76', 'grgr', 'Telah Login', '1', '2016-12-23', '14:15:49');
INSERT INTO `psb_log` VALUES ('6', '565', 'grgr', 'Telah Login', '1', '2016-12-22', '14:16:08');
INSERT INTO `psb_log` VALUES ('7', '4354', 'gdfg', 'Telah Login', '1', '2016-12-24', '14:17:18');
INSERT INTO `psb_log` VALUES ('8', '345', 'dgdgsd', 'Telah Login', '1', '2016-12-28', '14:17:35');
INSERT INTO `psb_log` VALUES ('9', '3423', 'svfsbf', 'Telah Login', '1', '2016-12-29', '14:17:57');
INSERT INTO `psb_log` VALUES ('10', '56', 'fes', 'Telah Login', '1', '2016-12-30', '14:18:19');
INSERT INTO `psb_log` VALUES ('11', '28', 'Jabir Al Hayyan', 'Telah Login', '1', '2016-12-20', '01:02:57');
INSERT INTO `psb_log` VALUES ('12', '28', 'Jabir Al Hayyan', 'Telah Login', '1', '2016-12-20', '01:27:52');
INSERT INTO `psb_log` VALUES ('13', '28', 'Jabir Al Hayyan', 'Telah Login', '1', '2016-12-20', '01:41:25');
INSERT INTO `psb_log` VALUES ('14', '28', 'Jabir Al Hayyan', 'Telah Login', '1', '2016-12-20', '01:42:57');
INSERT INTO `psb_log` VALUES ('15', '28', 'Jabir Al Hayyan', 'Telah Login', '1', '2016-12-20', '15:57:38');
INSERT INTO `psb_log` VALUES ('16', '28', 'Jabir Al Hayyan', 'Telah Login', '1', '2016-12-20', '17:05:40');
INSERT INTO `psb_log` VALUES ('17', '34', 'Jabir Al Hayyan', 'Telah Login', '1', '2016-12-20', '20:05:12');
INSERT INTO `psb_log` VALUES ('18', '19', 'Nur Haula Muna', 'Telah Login', '1', '2016-12-21', '13:07:44');
INSERT INTO `psb_log` VALUES ('19', '34', 'Jabir Al Hayyan', 'Telah Login', '1', '2016-12-21', '16:25:41');
INSERT INTO `psb_log` VALUES ('20', '34', 'Jabir Al Hayyan', 'Telah Login', '1', '2016-12-21', '16:28:40');
INSERT INTO `psb_log` VALUES ('21', '34', 'Jabir Al Hayyan', 'Telah Login', '1', '2016-12-21', '16:28:40');
INSERT INTO `psb_log` VALUES ('22', '19', 'Nur Haula Muna', 'Telah Login', '1', '2016-12-21', '16:37:16');
INSERT INTO `psb_log` VALUES ('23', '19', 'Nur Haula Muna', 'Telah Login', '1', '2016-12-21', '16:38:46');

-- ----------------------------
-- Table structure for psb_penghasilan
-- ----------------------------
DROP TABLE IF EXISTS `psb_penghasilan`;
CREATE TABLE `psb_penghasilan` (
  `idpenghasilan` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `penghasilan` varchar(100) NOT NULL,
  `urutan` tinyint(2) NOT NULL,
  `ts` timestamp NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`idpenghasilan`),
  KEY `psb_penghasilan_ts` (`ts`) USING BTREE
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of psb_penghasilan
-- ----------------------------
INSERT INTO `psb_penghasilan` VALUES ('1', 'dibawah Rp. 500.000,-', '1', '2016-12-04 20:48:16');
INSERT INTO `psb_penghasilan` VALUES ('2', 'Rp. 500.000,- s.d Rp. 1.000.000,-', '2', '2016-12-04 20:48:38');
INSERT INTO `psb_penghasilan` VALUES ('3', 'Rp. 1.000.000,- s.d Rp. 2.000.000,-', '3', '2016-12-04 20:49:01');
INSERT INTO `psb_penghasilan` VALUES ('4', 'Rp. 2.000.000,- s.d Rp. 3.000.000,-', '4', '2016-12-04 20:49:16');
INSERT INTO `psb_penghasilan` VALUES ('5', 'Rp. 3.000.000,- s.d Rp. 5.000.000,-', '5', '2016-12-04 20:49:36');
INSERT INTO `psb_penghasilan` VALUES ('6', 'diatas Rp. 5.000.000,-', '6', '2016-12-04 20:49:53');

-- ----------------------------
-- Table structure for psb_statusortu
-- ----------------------------
DROP TABLE IF EXISTS `psb_statusortu`;
CREATE TABLE `psb_statusortu` (
  `idstatusortu` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `statusortu` varchar(50) NOT NULL,
  `urutan` tinyint(2) NOT NULL,
  `ts` timestamp NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`idstatusortu`),
  KEY `psb_statusortu_ts` (`ts`) USING BTREE
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of psb_statusortu
-- ----------------------------
INSERT INTO `psb_statusortu` VALUES ('1', 'Ortu Kandung', '1', '2016-12-04 20:41:22');
INSERT INTO `psb_statusortu` VALUES ('2', 'Ortu Tiri', '2', '2016-12-04 20:41:03');
INSERT INTO `psb_statusortu` VALUES ('3', 'Ortu Angkat', '3', '2016-12-04 20:41:05');
INSERT INTO `psb_statusortu` VALUES ('4', 'Lainnya', '4', '2016-12-04 20:41:25');

-- ----------------------------
-- Table structure for psb_suku
-- ----------------------------
DROP TABLE IF EXISTS `psb_suku`;
CREATE TABLE `psb_suku` (
  `idsuku` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `suku` varchar(50) NOT NULL,
  `urutan` tinyint(2) NOT NULL,
  `ts` timestamp NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`idsuku`),
  KEY `psb_suku_ts` (`ts`) USING BTREE
) ENGINE=InnoDB AUTO_INCREMENT=15 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of psb_suku
-- ----------------------------
INSERT INTO `psb_suku` VALUES ('1', 'Jawa', '1', '2016-12-04 20:31:15');
INSERT INTO `psb_suku` VALUES ('2', 'Sunda', '2', '2016-12-04 20:31:28');
INSERT INTO `psb_suku` VALUES ('3', 'Madura', '3', '2016-12-04 20:31:46');
INSERT INTO `psb_suku` VALUES ('4', 'Minang', '4', '2016-12-04 20:31:48');
INSERT INTO `psb_suku` VALUES ('5', 'Batak', '5', '2016-12-04 20:32:27');
INSERT INTO `psb_suku` VALUES ('6', 'Kerinci', '6', '2016-12-04 20:32:35');
INSERT INTO `psb_suku` VALUES ('7', 'Melayu', '7', '2016-12-04 20:32:44');
INSERT INTO `psb_suku` VALUES ('8', 'Betawi', '8', '2016-12-04 20:33:19');
INSERT INTO `psb_suku` VALUES ('9', 'Bima', '9', '2016-12-04 20:33:30');
INSERT INTO `psb_suku` VALUES ('10', 'Dayak', '10', '2016-12-04 20:33:39');
INSERT INTO `psb_suku` VALUES ('11', 'Banjar', '11', '2016-12-04 20:34:14');
INSERT INTO `psb_suku` VALUES ('12', 'Bali', '12', '2016-12-04 20:34:22');
INSERT INTO `psb_suku` VALUES ('13', 'Toraja', '13', '2016-12-04 20:34:29');
INSERT INTO `psb_suku` VALUES ('14', 'Bugis', '14', '2016-12-04 20:34:38');

-- ----------------------------
-- Table structure for psb_tahunmasuk
-- ----------------------------
DROP TABLE IF EXISTS `psb_tahunmasuk`;
CREATE TABLE `psb_tahunmasuk` (
  `idtahunmasuk` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `tahunmasuk` varchar(50) NOT NULL,
  `ts` timestamp NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`idtahunmasuk`),
  KEY `psb_tahunmasuk_ts` (`ts`) USING BTREE
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of psb_tahunmasuk
-- ----------------------------
INSERT INTO `psb_tahunmasuk` VALUES ('1', '2017', '2016-12-04 20:30:59');

-- ----------------------------
-- Table structure for psb_tingkatpendidikan
-- ----------------------------
DROP TABLE IF EXISTS `psb_tingkatpendidikan`;
CREATE TABLE `psb_tingkatpendidikan` (
  `idpendidikan` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `pendidikan` varchar(20) NOT NULL,
  `ts` timestamp NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`idpendidikan`),
  KEY `psb_tingkatpendidikan_ts` (`ts`) USING BTREE
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of psb_tingkatpendidikan
-- ----------------------------
INSERT INTO `psb_tingkatpendidikan` VALUES ('1', 'D1', '2016-12-04 20:42:39');
INSERT INTO `psb_tingkatpendidikan` VALUES ('2', 'D2', '2016-12-04 20:42:41');
INSERT INTO `psb_tingkatpendidikan` VALUES ('3', 'D3', '2016-12-04 20:42:44');
INSERT INTO `psb_tingkatpendidikan` VALUES ('4', 'D4', '2016-12-04 20:42:46');
INSERT INTO `psb_tingkatpendidikan` VALUES ('5', 'S1', '2016-12-04 20:42:48');
INSERT INTO `psb_tingkatpendidikan` VALUES ('6', 'S2', '2016-12-04 20:42:50');
INSERT INTO `psb_tingkatpendidikan` VALUES ('7', 'S3', '2016-12-04 20:42:52');
INSERT INTO `psb_tingkatpendidikan` VALUES ('8', 'SD', '2016-12-04 20:42:54');
INSERT INTO `psb_tingkatpendidikan` VALUES ('9', 'SMP', '2016-12-04 20:42:57');
INSERT INTO `psb_tingkatpendidikan` VALUES ('10', 'SMA', '2016-12-04 20:42:59');

-- ----------------------------
-- Table structure for psb_user
-- ----------------------------
DROP TABLE IF EXISTS `psb_user`;
CREATE TABLE `psb_user` (
  `iduser` int(4) unsigned zerofill NOT NULL AUTO_INCREMENT,
  `nama` varchar(100) DEFAULT NULL,
  `panggilan` varchar(50) DEFAULT NULL,
  `email` varchar(50) DEFAULT NULL,
  `password` varchar(50) DEFAULT NULL,
  `verifikasi` varchar(200) NOT NULL,
  `statusdaftar` char(2) DEFAULT NULL,
  `aktif` char(1) DEFAULT NULL,
  `ts` timestamp NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`iduser`)
) ENGINE=InnoDB AUTO_INCREMENT=35 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of psb_user
-- ----------------------------
INSERT INTO `psb_user` VALUES ('0016', 'wewe', 'wewe', 'wewe@wewe.com', 'wewe', '', 'n', null, '2016-12-09 00:47:48');
INSERT INTO `psb_user` VALUES ('0017', 'Yayan Ruhiyan', 'Yayan', 'yayan@gmail.com', 'yayan', '', 'n', null, null);
INSERT INTO `psb_user` VALUES ('0018', '', '', '', '', '', 'n', null, '2016-12-20 01:18:28');
INSERT INTO `psb_user` VALUES ('0019', 'Nur Haula Muna', 'Muna', 'muna@gmail.com', 'muna', '', 'y', '1', '2016-12-21 16:49:05');
INSERT INTO `psb_user` VALUES ('0034', 'Jabir Al Hayyan', 'Jabir', 'jabiralhayyan07@gmail.com', 'jabir', 'c4ca4238a0b923820dcc509a6f75849b', 'y', '1', '2016-12-20 20:14:27');
