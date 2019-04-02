/*
Navicat MySQL Data Transfer

Source Server         : localhost
Source Server Version : 50552
Source Host           : localhost:3306
Source Database       : localsys

Target Server Type    : MYSQL
Target Server Version : 50552
File Encoding         : 65001

Date: 2019-04-02 16:32:29
*/

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for akseskelasusia
-- ----------------------------
DROP TABLE IF EXISTS `akseskelasusia`;
CREATE TABLE `akseskelasusia` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `kelasusia` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1 ROW_FORMAT=COMPACT;

-- ----------------------------
-- Records of akseskelasusia
-- ----------------------------
INSERT INTO `akseskelasusia` VALUES ('1', '3 - 8');

-- ----------------------------
-- Table structure for kelasusiauser
-- ----------------------------
DROP TABLE IF EXISTS `kelasusiauser`;
CREATE TABLE `kelasusiauser` (
  `userid` int(11) NOT NULL,
  `aksesid` int(11) DEFAULT NULL,
  PRIMARY KEY (`userid`) USING BTREE
) ENGINE=InnoDB DEFAULT CHARSET=latin1 ROW_FORMAT=COMPACT;

-- ----------------------------
-- Records of kelasusiauser
-- ----------------------------
INSERT INTO `kelasusiauser` VALUES ('14', '1');

-- ----------------------------
-- Table structure for masteranak
-- ----------------------------
DROP TABLE IF EXISTS `masteranak`;
CREATE TABLE `masteranak` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `NoSG` varchar(25) DEFAULT NULL,
  `NamaAnak` varchar(255) DEFAULT NULL,
  `SponsorID` int(11) DEFAULT NULL,
  `KeluargaID` int(11) DEFAULT NULL,
  `KelasUsiaID` int(11) DEFAULT NULL,
  `Alamat` varchar(255) DEFAULT NULL,
  `Tempatahir` varchar(50) DEFAULT NULL,
  `TanggalLahir` date DEFAULT NULL,
  `Email` varchar(50) DEFAULT NULL,
  `NoTlp` varchar(25) DEFAULT NULL,
  `Status` bit(1) DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE=InnoDB DEFAULT CHARSET=latin1 ROW_FORMAT=COMPACT;

-- ----------------------------
-- Records of masteranak
-- ----------------------------

-- ----------------------------
-- Table structure for mastermentor
-- ----------------------------
DROP TABLE IF EXISTS `mastermentor`;
CREATE TABLE `mastermentor` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `NamaMentor` varchar(255) DEFAULT NULL,
  `KelasUsiaID` int(11) DEFAULT NULL,
  `Email` varchar(50) DEFAULT NULL,
  `NoTlp` varchar(25) DEFAULT NULL,
  `Alamat` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE=InnoDB DEFAULT CHARSET=latin1 ROW_FORMAT=COMPACT;

-- ----------------------------
-- Records of mastermentor
-- ----------------------------

-- ----------------------------
-- Table structure for masterppa
-- ----------------------------
DROP TABLE IF EXISTS `masterppa`;
CREATE TABLE `masterppa` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `IOPPA` varchar(15) DEFAULT NULL,
  `NamaPPA` varchar(255) DEFAULT NULL,
  `AlamatPPA` varchar(255) DEFAULT NULL,
  `Email` varchar(35) DEFAULT NULL,
  `NoTlp` varchar(20) DEFAULT NULL,
  `Koordinat` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1 ROW_FORMAT=COMPACT;

-- ----------------------------
-- Records of masterppa
-- ----------------------------
INSERT INTO `masterppa` VALUES ('1', 'IO-0994', 'Kalvari', null, null, null, null);

-- ----------------------------
-- Table structure for mastersponsor
-- ----------------------------
DROP TABLE IF EXISTS `mastersponsor`;
CREATE TABLE `mastersponsor` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `KodeSponsor` varchar(255) DEFAULT NULL,
  `NamaSponsor` varchar(255) DEFAULT NULL,
  `AsalSponsor` varchar(50) DEFAULT NULL,
  `StartSponsoring` date DEFAULT NULL,
  `EndSponsoring` date DEFAULT NULL,
  `ReasonEnded` varchar(255) DEFAULT NULL,
  `Status` bit(1) DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE=InnoDB DEFAULT CHARSET=latin1 ROW_FORMAT=COMPACT;

-- ----------------------------
-- Records of mastersponsor
-- ----------------------------

-- ----------------------------
-- Table structure for permission
-- ----------------------------
DROP TABLE IF EXISTS `permission`;
CREATE TABLE `permission` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `permissionname` varchar(255) DEFAULT NULL,
  `link` varchar(255) DEFAULT NULL,
  `ico` varchar(255) DEFAULT NULL,
  `menusubmenu` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=latin1 ROW_FORMAT=COMPACT;

-- ----------------------------
-- Records of permission
-- ----------------------------
INSERT INTO `permission` VALUES ('1', 'Master', '#', 'fa-info', '1');
INSERT INTO `permission` VALUES ('2', 'Anak', 'Home/ViewAnak', 'fa-smile-o', '1.1');
INSERT INTO `permission` VALUES ('3', 'Mentor', 'Home/ViewMentor', 'fa-laptop', '1.2');
INSERT INTO `permission` VALUES ('4', 'Sponsor', 'Home/ViewSponsor', 'fa-credit-card', '1.3');
INSERT INTO `permission` VALUES ('5', 'Kelas Usia', 'Home/ViewKelasUsia', 'fa-list-ol', '1.4');
INSERT INTO `permission` VALUES ('6', 'LKPA', '#', 'fa-file-o', '2');
INSERT INTO `permission` VALUES ('7', 'Input LKPA', 'Home/ViewLKPA', 'fa-pencil', '2.1');

-- ----------------------------
-- Table structure for permissionrole
-- ----------------------------
DROP TABLE IF EXISTS `permissionrole`;
CREATE TABLE `permissionrole` (
  `roleid` int(11) NOT NULL,
  `permissionid` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 ROW_FORMAT=COMPACT;

-- ----------------------------
-- Records of permissionrole
-- ----------------------------
INSERT INTO `permissionrole` VALUES ('1', '1');
INSERT INTO `permissionrole` VALUES ('1', '2');
INSERT INTO `permissionrole` VALUES ('1', '3');
INSERT INTO `permissionrole` VALUES ('1', '4');
INSERT INTO `permissionrole` VALUES ('1', '5');
INSERT INTO `permissionrole` VALUES ('1', '6');
INSERT INTO `permissionrole` VALUES ('1', '7');

-- ----------------------------
-- Table structure for roles
-- ----------------------------
DROP TABLE IF EXISTS `roles`;
CREATE TABLE `roles` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `rolename` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1 ROW_FORMAT=COMPACT;

-- ----------------------------
-- Records of roles
-- ----------------------------
INSERT INTO `roles` VALUES ('1', 'Mentor');

-- ----------------------------
-- Table structure for userrole
-- ----------------------------
DROP TABLE IF EXISTS `userrole`;
CREATE TABLE `userrole` (
  `userid` int(11) NOT NULL,
  `roleid` int(11) DEFAULT NULL,
  PRIMARY KEY (`userid`) USING BTREE
) ENGINE=InnoDB DEFAULT CHARSET=latin1 ROW_FORMAT=COMPACT;

-- ----------------------------
-- Records of userrole
-- ----------------------------
INSERT INTO `userrole` VALUES ('14', '1');

-- ----------------------------
-- Table structure for users
-- ----------------------------
DROP TABLE IF EXISTS `users`;
CREATE TABLE `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(75) DEFAULT NULL,
  `nama` varchar(75) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  `createdby` varchar(255) DEFAULT NULL,
  `createdon` datetime DEFAULT NULL,
  `HakAkses` int(255) DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE=InnoDB AUTO_INCREMENT=15 DEFAULT CHARSET=latin1 ROW_FORMAT=COMPACT;

-- ----------------------------
-- Records of users
-- ----------------------------
INSERT INTO `users` VALUES ('14', 'admin', 'admin', 'a9bdd47d7321d4089b3b00561c9c621848bd6f6e2f745a53d54913d613789c23945b66de6ded1eb336a7d526f9349a9d964d6f6c3a40e2ac90b4b16c0121f7895Xg53McbkyQ/NmW60Sf4cu3wJsi/8cyZXxeXV7g6b04=', 'mnl', null, '1');
