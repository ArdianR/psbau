/*
Navicat MySQL Data Transfer

Source Server         : localhost_3306
Source Server Version : 50505
Source Host           : 127.0.0.1:3306
Source Database       : psbau

Target Server Type    : MYSQL
Target Server Version : 50505
File Encoding         : 65001

Date: 2017-01-07 06:31:32
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
INSERT INTO `psb_admin` VALUES ('psbpesantren', '3da1f08470ccad5365f1eac006655260', 'maumbisurabaya@gmail.com', 'MAU-MBI Amanatul Ummah', 'Amanatul Ummah', '2016-12-25 06:09:40');

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
INSERT INTO `psb_agama` VALUES ('1', 'Islam', '1', '2016-12-05 01:39:04');
INSERT INTO `psb_agama` VALUES ('2', 'Katolik', '2', '2016-12-05 01:39:40');
INSERT INTO `psb_agama` VALUES ('3', 'Protestan', '3', '2016-12-05 01:39:58');
INSERT INTO `psb_agama` VALUES ('4', 'Hindu', '4', '2016-12-05 01:40:27');
INSERT INTO `psb_agama` VALUES ('5', 'Budha', '5', '2016-12-05 01:40:31');
INSERT INTO `psb_agama` VALUES ('6', 'Kristen', '6', '2016-12-05 01:40:48');

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
) ENGINE=InnoDB AUTO_INCREMENT=57 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of psb_calonsiswa
-- ----------------------------
INSERT INTO `psb_calonsiswa` VALUES ('00051', '0001', 'PSBMAUG117002', 'MA Unggulan Amanatul Ummah', 'Gelombang 1', '2017', 'mainkannisn', 'mainkannik', 'fwefwef', 'Jabir', 'jabir', 'L', 'svfsdevfs', '2016-12-13', 'Islam', 'Jawa', 'Berkecukupan', 'WNI', '4', '5', 'alamat lengkap', '', '0', '0', '', '', '', '', '0', '0897557877867', 'jabiralhayyan07@gmail.com', '', '', '', '', '', '0.0', '0.0', '0', '', '0', '', '', '', '0', '0', 'Ortu Kandung', 'Ortu Kandung', '', '', '', '', 'D1', 'D1', '--Pilih--', '--Pilih--', '--Pilih--', '--Pilih--', '', '', '', '09876543', '', '', '0', '0', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '', '2016-12-25 03:15:28', 'y');
INSERT INTO `psb_calonsiswa` VALUES ('00055', '0005', 'PSBMAUG117003', 'MA Unggulan Amanatul Ummah', 'Gelombang 1', '2017', '', '', '', 'Jabir Al Hayyan', 'heyyon', 'L', 'Surabaya', '2016-12-21', 'Islam', 'Jawa', 'Berkecukupan', 'WNI', '0', '0', 'dwdwdwd', '', '0', '0', '', '', '', '', '0', '0985432', 'jabiralhayyan27@gmail.com', '', '', '', '', '', '0.0', '0.0', '0', '', '0', '', '', '', '0', '0', 'Ortu Kandung', 'Ortu Kandung', '', '', '', '', 'D1', 'D1', '--Pilih--', '--Pilih--', '--Pilih--', '--Pilih--', '', '', '', '098765432', '', 'PSBMAUG117003-Jabir_Al_Hayyan-1483001793.jpg', '0', '0', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '', '2016-12-29 15:56:33', 'n');
INSERT INTO `psb_calonsiswa` VALUES ('00056', '0006', '', 'MA Unggulan Amanatul Ummah', 'Gelombang 1', '2017', null, null, null, 'Jabir Al Hayyan', 'jabir', null, null, null, '', null, null, '', '0', '0', null, null, null, null, null, null, null, null, '0', null, 'jabiralhaiyan@gmail.com', null, null, null, null, null, '0.0', '0.0', null, null, null, null, null, null, '0', '0', null, null, null, null, null, null, null, null, null, null, '0', '0', null, null, null, null, null, null, '0', '0', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', null, '2016-12-28 01:24:35', 'y');

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
INSERT INTO `psb_jenispekerjaan` VALUES ('1', 'PNS', '2016-12-05 11:45:54');
INSERT INTO `psb_jenispekerjaan` VALUES ('2', 'Wiraswasta', '2016-12-05 11:45:56');
INSERT INTO `psb_jenispekerjaan` VALUES ('3', 'Swasta', '2016-12-05 11:45:58');
INSERT INTO `psb_jenispekerjaan` VALUES ('4', 'Lainnya', '2016-12-05 11:46:01');

-- ----------------------------
-- Table structure for psb_kelompokcalonsiswa
-- ----------------------------
DROP TABLE IF EXISTS `psb_kelompokcalonsiswa`;
CREATE TABLE `psb_kelompokcalonsiswa` (
  `idkelompok` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `kelompok` varchar(100) NOT NULL,
  `idprosespenerimaan` int(10) unsigned DEFAULT NULL,
  `kapasitas` int(10) NOT NULL,
  `tglmulai` date DEFAULT NULL,
  `tglselesai` date DEFAULT NULL,
  `keterangan` varchar(255) DEFAULT NULL,
  `ts` timestamp NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`idkelompok`),
  KEY `psb_kelompokcalonsiswa_ts` (`ts`) USING BTREE
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of psb_kelompokcalonsiswa
-- ----------------------------
INSERT INTO `psb_kelompokcalonsiswa` VALUES ('1', 'Gelombang 1', '1', '100', '2016-12-01', '2017-01-01', 'Gelombang 1 MA Unggulan Amanatul Ummah', '2016-12-28 18:09:09');
INSERT INTO `psb_kelompokcalonsiswa` VALUES ('2', 'Gelombang 2', '1', '100', null, null, 'Gelombang 2 MA Unggulan Amanatul Ummah', '2016-12-28 18:09:23');
INSERT INTO `psb_kelompokcalonsiswa` VALUES ('3', 'Gelombang 1', '2', '100', null, null, 'Gelombang 1 MBI Amanatul Ummah', '2016-12-28 18:09:32');
INSERT INTO `psb_kelompokcalonsiswa` VALUES ('4', 'Gelombang 2', '2', '100', null, null, 'Gelombang 2 MBI Amanatul Ummah', '2016-12-28 18:09:40');

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
INSERT INTO `psb_kondisisiswa` VALUES ('1', 'Berkecukupan', '1', '2016-12-05 11:36:38');
INSERT INTO `psb_kondisisiswa` VALUES ('2', 'Kurang Mampu', '2', '2016-12-05 11:36:40');
INSERT INTO `psb_kondisisiswa` VALUES ('3', 'Kaya Raya', '3', '2016-12-05 11:36:42');

-- ----------------------------
-- Table structure for psb_lembaga
-- ----------------------------
DROP TABLE IF EXISTS `psb_lembaga`;
CREATE TABLE `psb_lembaga` (
  `idlembaga` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `lembaga` varchar(50) NOT NULL,
  `urutan` tinyint(2) NOT NULL,
  `keterangan` varchar(255) DEFAULT NULL,
  `aktif` char(1) NOT NULL,
  `ts` timestamp NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`idlembaga`),
  KEY `psb_lembaga_ts` (`ts`) USING BTREE
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of psb_lembaga
-- ----------------------------
INSERT INTO `psb_lembaga` VALUES ('1', 'MA Unggulan Amanatul Ummah', '1', 'Lembaga MA Unggulan Amanatul Ummah Surabaya', '1', '2016-12-31 03:09:03');
INSERT INTO `psb_lembaga` VALUES ('2', 'MBI Amanatul Ummah', '2', 'Lembaga MBI Amanatul Ummah Surabaya', '1', '2016-12-31 03:09:20');

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
) ENGINE=InnoDB AUTO_INCREMENT=59 DEFAULT CHARSET=latin1;

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
INSERT INTO `psb_log` VALUES ('24', '19', 'Nur Haula Muna', 'Telah Login', '1', '2016-12-21', '23:59:35');
INSERT INTO `psb_log` VALUES ('25', '35', 'Nur Haula', 'Telah Login', '1', '2016-12-22', '20:17:40');
INSERT INTO `psb_log` VALUES ('26', '19', 'Nur Haula Muna', 'Telah Login', '1', '2016-12-23', '22:11:38');
INSERT INTO `psb_log` VALUES ('27', '1', 'Jabir', 'Telah Login', '1', '2016-12-24', '13:59:13');
INSERT INTO `psb_log` VALUES ('28', '1', 'Jabir', 'Telah Login', '1', '2016-12-24', '14:26:14');
INSERT INTO `psb_log` VALUES ('29', '1', 'Jabir', 'Telah Login', '1', '2016-12-24', '14:33:10');
INSERT INTO `psb_log` VALUES ('30', '1', 'Jabir', 'Telah Login', '1', '2016-12-24', '14:37:13');
INSERT INTO `psb_log` VALUES ('31', '1', 'Jabir', 'Telah Login', '1', '2016-12-24', '14:54:39');
INSERT INTO `psb_log` VALUES ('32', '1', 'Jabir', 'Telah Login', '1', '2016-12-24', '23:53:31');
INSERT INTO `psb_log` VALUES ('33', '1', 'Jabir', 'Telah Login', '1', '2016-12-24', '23:56:06');
INSERT INTO `psb_log` VALUES ('34', '1', 'Jabir', 'Telah Login', '1', '2016-12-24', '23:57:24');
INSERT INTO `psb_log` VALUES ('35', '1', 'Jabir', 'Telah Login', '1', '2016-12-25', '02:35:20');
INSERT INTO `psb_log` VALUES ('36', '4', 'juibg', 'Telah Login', '1', '2016-12-25', '05:59:55');
INSERT INTO `psb_log` VALUES ('37', '5', 'hgvhj', 'Telah Login', '1', '2016-12-26', '19:05:08');
INSERT INTO `psb_log` VALUES ('38', '5', 'hgvhj', 'Telah Login', '1', '2016-12-26', '19:07:08');
INSERT INTO `psb_log` VALUES ('39', '5', 'hgvhj', 'Telah Login', '1', '2016-12-26', '19:22:42');
INSERT INTO `psb_log` VALUES ('40', '5', 'hgvhj', 'Telah Login', '1', '2016-12-27', '12:14:20');
INSERT INTO `psb_log` VALUES ('41', '5', 'hgvhj', 'Telah Login', '1', '2016-12-27', '12:52:34');
INSERT INTO `psb_log` VALUES ('42', '5', 'hgvhj', 'Telah Login', '1', '2016-12-27', '18:38:24');
INSERT INTO `psb_log` VALUES ('43', '5', 'hgvhj', 'Telah Login', '1', '2016-12-27', '18:59:41');
INSERT INTO `psb_log` VALUES ('44', '5', 'hgvhj', 'Telah Login', '1', '2016-12-27', '20:06:56');
INSERT INTO `psb_log` VALUES ('45', '5', 'hgvhj', 'Telah Login', '1', '2016-12-27', '20:07:36');
INSERT INTO `psb_log` VALUES ('46', '5', 'hgvhj', 'Telah Login', '1', '2016-12-27', '20:10:00');
INSERT INTO `psb_log` VALUES ('47', '5', 'hgvhj', 'Telah Login', '1', '2016-12-27', '20:24:11');
INSERT INTO `psb_log` VALUES ('48', '5', 'Muhammad Jabir Al Haiyan', 'Telah Login', '1', '2016-12-27', '20:26:22');
INSERT INTO `psb_log` VALUES ('49', '5', 'Muhammad Jabir Al Haiyan', 'Telah Login', '1', '2016-12-27', '20:29:31');
INSERT INTO `psb_log` VALUES ('50', '5', 'Muhammad Jabir Al Haiyan', 'Telah Login', '1', '2016-12-27', '20:31:50');
INSERT INTO `psb_log` VALUES ('51', '5', 'jabir', 'Telah Login', '1', '2016-12-27', '20:40:34');
INSERT INTO `psb_log` VALUES ('52', '5', 'Jabir Al Hayyan', 'Telah Login', '1', '2016-12-27', '20:46:00');
INSERT INTO `psb_log` VALUES ('53', '5', 'Jabir Al Hayyan', 'Telah Login', '1', '2016-12-28', '00:32:47');
INSERT INTO `psb_log` VALUES ('54', '6', 'Jabir Al Hayyan', 'Telah Login', '1', '2016-12-28', '01:25:30');
INSERT INTO `psb_log` VALUES ('55', '5', 'Jabir Al Hayyan', 'Telah Login', '1', '2016-12-28', '18:52:17');
INSERT INTO `psb_log` VALUES ('56', '5', 'Jabir Al Hayyan', 'Telah Login', '1', '2016-12-29', '14:32:12');
INSERT INTO `psb_log` VALUES ('57', '5', 'Jabir Al Hayyan', 'Telah Login', '1', '2016-12-29', '14:39:23');
INSERT INTO `psb_log` VALUES ('58', '5', 'Jabir Al Hayyan', 'Telah Login', '1', '2016-12-29', '15:54:29');

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
INSERT INTO `psb_penghasilan` VALUES ('1', 'dibawah Rp. 500.000,-', '1', '2016-12-05 11:48:16');
INSERT INTO `psb_penghasilan` VALUES ('2', 'Rp. 500.000,- s.d Rp. 1.000.000,-', '2', '2016-12-05 11:48:38');
INSERT INTO `psb_penghasilan` VALUES ('3', 'Rp. 1.000.000,- s.d Rp. 2.000.000,-', '3', '2016-12-05 11:49:01');
INSERT INTO `psb_penghasilan` VALUES ('4', 'Rp. 2.000.000,- s.d Rp. 3.000.000,-', '4', '2016-12-05 11:49:16');
INSERT INTO `psb_penghasilan` VALUES ('5', 'Rp. 3.000.000,- s.d Rp. 5.000.000,-', '5', '2016-12-05 11:49:36');
INSERT INTO `psb_penghasilan` VALUES ('6', 'diatas Rp. 5.000.000,-', '6', '2016-12-05 11:49:53');

-- ----------------------------
-- Table structure for psb_prosespenerimaan
-- ----------------------------
DROP TABLE IF EXISTS `psb_prosespenerimaan`;
CREATE TABLE `psb_prosespenerimaan` (
  `idprosespenerimaan` int(5) unsigned NOT NULL AUTO_INCREMENT,
  `proses` varchar(100) NOT NULL,
  `kodeawalan` varchar(8) NOT NULL,
  `lembaga` varchar(50) NOT NULL,
  `aktif` char(1) NOT NULL,
  `keterangan` varchar(255) DEFAULT NULL,
  `ts` timestamp NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`idprosespenerimaan`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of psb_prosespenerimaan
-- ----------------------------
INSERT INTO `psb_prosespenerimaan` VALUES ('1', 'Pendaftaran MAU 2017', 'PSBMAU17', 'MA Unggulan Amanatul Ummah', '1', 'Pendaftaran MA Unggulan Amanatul Ummah tahun masuk 2017', '2016-12-28 03:18:16');
INSERT INTO `psb_prosespenerimaan` VALUES ('2', 'Pendaftaran MBI 2017', 'PSBMBI17', 'MBI Amanatul Ummah', '1', 'Pendaftaran MBI Amanatul Ummah tahun masuk 2017', '2016-12-28 03:22:01');
INSERT INTO `psb_prosespenerimaan` VALUES ('6', 'Pendaftaran Tahun 2018', 'PSBMAU18', 'MA Unggulan Amanatul Ummah', '', 'Penerimaan Siswa Baru MA Unggulan Tahun 2018', '2016-12-31 22:25:00');

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
INSERT INTO `psb_statusortu` VALUES ('1', 'Ortu Kandung', '1', '2016-12-05 11:41:22');
INSERT INTO `psb_statusortu` VALUES ('2', 'Ortu Tiri', '2', '2016-12-05 11:41:03');
INSERT INTO `psb_statusortu` VALUES ('3', 'Ortu Angkat', '3', '2016-12-05 11:41:05');
INSERT INTO `psb_statusortu` VALUES ('4', 'Lainnya', '4', '2016-12-05 11:41:25');

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
INSERT INTO `psb_suku` VALUES ('1', 'Jawa', '1', '2016-12-05 11:31:15');
INSERT INTO `psb_suku` VALUES ('2', 'Sunda', '2', '2016-12-05 11:31:28');
INSERT INTO `psb_suku` VALUES ('3', 'Madura', '3', '2016-12-05 11:31:46');
INSERT INTO `psb_suku` VALUES ('4', 'Minang', '4', '2016-12-05 11:31:48');
INSERT INTO `psb_suku` VALUES ('5', 'Batak', '5', '2016-12-05 11:32:27');
INSERT INTO `psb_suku` VALUES ('6', 'Kerinci', '6', '2016-12-05 11:32:35');
INSERT INTO `psb_suku` VALUES ('7', 'Melayu', '7', '2016-12-05 11:32:44');
INSERT INTO `psb_suku` VALUES ('8', 'Betawi', '8', '2016-12-05 11:33:19');
INSERT INTO `psb_suku` VALUES ('9', 'Bima', '9', '2016-12-05 11:33:30');
INSERT INTO `psb_suku` VALUES ('10', 'Dayak', '10', '2016-12-05 11:33:39');
INSERT INTO `psb_suku` VALUES ('11', 'Banjar', '11', '2016-12-05 11:34:14');
INSERT INTO `psb_suku` VALUES ('12', 'Bali', '12', '2016-12-05 11:34:22');
INSERT INTO `psb_suku` VALUES ('13', 'Toraja', '13', '2016-12-05 11:34:29');
INSERT INTO `psb_suku` VALUES ('14', 'Bugis', '14', '2016-12-05 11:34:38');

-- ----------------------------
-- Table structure for psb_tahunmasuk
-- ----------------------------
DROP TABLE IF EXISTS `psb_tahunmasuk`;
CREATE TABLE `psb_tahunmasuk` (
  `idtahunmasuk` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `tahunmasuk` varchar(50) NOT NULL,
  `lembaga` varchar(200) DEFAULT NULL,
  `keterangan` varchar(255) DEFAULT NULL,
  `aktif` char(1) NOT NULL,
  `ts` timestamp NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`idtahunmasuk`),
  KEY `psb_tahunmasuk_ts` (`ts`) USING BTREE
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of psb_tahunmasuk
-- ----------------------------
INSERT INTO `psb_tahunmasuk` VALUES ('1', '2017', 'MA Unggulan Amanatul Ummah', 'Tahun masuk 2017 lembaga MA Unggulan Amanatul Ummah', '1', '2017-01-01 04:58:28');
INSERT INTO `psb_tahunmasuk` VALUES ('2', '2017', 'MBI Amanatul Ummah', 'Tahun masuk 2017 lembaga MBI Amanatul Ummah', '1', '2017-01-01 00:38:44');
INSERT INTO `psb_tahunmasuk` VALUES ('6', '2019', 'MA Unggulan Amanatul Ummah', 'Tahun gajah', '0', '2017-01-01 04:58:28');

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
INSERT INTO `psb_tingkatpendidikan` VALUES ('1', 'D1', '2016-12-05 11:42:39');
INSERT INTO `psb_tingkatpendidikan` VALUES ('2', 'D2', '2016-12-05 11:42:41');
INSERT INTO `psb_tingkatpendidikan` VALUES ('3', 'D3', '2016-12-05 11:42:44');
INSERT INTO `psb_tingkatpendidikan` VALUES ('4', 'D4', '2016-12-05 11:42:46');
INSERT INTO `psb_tingkatpendidikan` VALUES ('5', 'S1', '2016-12-05 11:42:48');
INSERT INTO `psb_tingkatpendidikan` VALUES ('6', 'S2', '2016-12-05 11:42:50');
INSERT INTO `psb_tingkatpendidikan` VALUES ('7', 'S3', '2016-12-05 11:42:52');
INSERT INTO `psb_tingkatpendidikan` VALUES ('8', 'SD', '2016-12-05 11:42:54');
INSERT INTO `psb_tingkatpendidikan` VALUES ('9', 'SMP', '2016-12-05 11:42:57');
INSERT INTO `psb_tingkatpendidikan` VALUES ('10', 'SMA', '2016-12-05 11:42:59');

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
  `aktif` char(1) NOT NULL,
  `ts` timestamp NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`iduser`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of psb_user
-- ----------------------------
INSERT INTO `psb_user` VALUES ('0001', 'Jabir', 'jabir', 'jabiralhayyan07@gmail.com', '0d61130a6dd5eea85c2c5facfe1c15a7', 'b4b984c0f05324bc24047c545eb48221', 'y', '1', '2016-12-25 05:36:50');
INSERT INTO `psb_user` VALUES ('0005', 'Jabir Al Hayyan', 'heyyon', 'jabiralhayyan27@gmail.com', '36d72c6a679b5992c42238425d2632cd', '7f9810db8d15f8a015c145f3132b7766', 'y', '1', '2016-12-29 14:32:31');
INSERT INTO `psb_user` VALUES ('0006', 'Jabir Al Hayyan', 'jabir', 'jabiralhaiyan@gmail.com', '0d61130a6dd5eea85c2c5facfe1c15a7', '573e697146be957346c20e74750b6a8c', 'n', '1', '2016-12-28 01:25:19');
