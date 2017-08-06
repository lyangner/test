
/*
Navicat MySQL Data Transfer

Source Server         : intexsoft
Source Server Version : 50634
Source Host           : localhost:3306
Source Database       : Bus

Target Server Type    : MYSQL
Target Server Version : 50634
File Encoding         : 65001

Date: 2017-08-07 01:09:21
*/

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for bus
-- ----------------------------
DROP TABLE IF EXISTS `bus`;
CREATE TABLE `bus` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(255) DEFAULT NULL,
  `startStation` varchar(255) DEFAULT NULL,
  `endStation` varchar(255) DEFAULT NULL,
  `stationArray` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of bus
-- ----------------------------
INSERT INTO `bus` VALUES ('1', '1', '1', '8', '1');
INSERT INTO `bus` VALUES ('2', '1', '8', '1', '2');
INSERT INTO `bus` VALUES ('3', '5', '9', '15', '3');
INSERT INTO `bus` VALUES ('4', '5', '15', '9', '4');
INSERT INTO `bus` VALUES ('5', '6', '16', '5', '5');

-- ----------------------------
-- Table structure for routes
-- ----------------------------
DROP TABLE IF EXISTS `routes`;
CREATE TABLE `routes` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `bus` int(255) DEFAULT NULL,
  `route` varchar(255) DEFAULT NULL,
  `way` int(1) DEFAULT NULL,
  `kolvo_stations` int(6) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of routes
-- ----------------------------
INSERT INTO `routes` VALUES ('1', '1', '1, 2, 3, 4, 5, 6, 7, 8', '1', '8');
INSERT INTO `routes` VALUES ('2', '2', '8, 7, 6, 5, 4, 3, 2, 1', '2', '8');
INSERT INTO `routes` VALUES ('3', '3', '9, 10, 11, 12, 13, 14, 15', '1', '7');
INSERT INTO `routes` VALUES ('4', '4', '15, 14, 13, 12, 11, 10,  9', '2', '7');
INSERT INTO `routes` VALUES ('5', '5', '16, 17, 18, 19, 20, 9, 5', '2', '7');

-- ----------------------------
-- Table structure for station
-- ----------------------------
DROP TABLE IF EXISTS `station`;
CREATE TABLE `station` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(255) DEFAULT NULL,
  `latitude` varchar(255) DEFAULT NULL,
  `longitude` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=21 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of station
-- ----------------------------
INSERT INTO `station` VALUES ('1', 'Фолюш', '4', '4');
INSERT INTO `station` VALUES ('2', '1000 мелочей', '1', '7');
INSERT INTO `station` VALUES ('3', 'Октябрь ', '1', '12');
INSERT INTO `station` VALUES ('4', 'Филармония ', '5', '17');
INSERT INTO `station` VALUES ('5', 'Корона ', '10', '17');
INSERT INTO `station` VALUES ('6', 'Брест ', '13', '14');
INSERT INTO `station` VALUES ('7', 'Тринити', '16', '12');
INSERT INTO `station` VALUES ('8', 'Кабяка ', '20', '9');
INSERT INTO `station` VALUES ('9', 'Тропа здоровья', '8', '19');
INSERT INTO `station` VALUES ('10', 'Форты', '10', '15');
INSERT INTO `station` VALUES ('11', 'Роддом', '7', '12');
INSERT INTO `station` VALUES ('12', 'Красное знамя', '6', '9');
INSERT INTO `station` VALUES ('13', 'Ленина ', '6', '5');
INSERT INTO `station` VALUES ('14', 'Табачка ', '10', '2');
INSERT INTO `station` VALUES ('15', 'Суворова ', '15', '2');
INSERT INTO `station` VALUES ('16', 'Девятовка', '20', '17');
INSERT INTO `station` VALUES ('17', 'Олдсити', '15', '15');
INSERT INTO `station` VALUES ('18', 'Пушкина', '10', '10');
INSERT INTO `station` VALUES ('19', 'Центр-занятости', '5', '10');
INSERT INTO `station` VALUES ('20', 'Советская', '2', '15');

-- ----------------------------
-- Table structure for Time
-- ----------------------------
DROP TABLE IF EXISTS `Time`;
CREATE TABLE `Time` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_bus` int(11) DEFAULT NULL,
  `id_ost` int(11) DEFAULT NULL,
  `budni` varchar(255) DEFAULT NULL,
  `vyhodnye` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=38 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of Time
-- ----------------------------
INSERT INTO `Time` VALUES ('1', '1', '1', '5:30, 6:30, 7:30, 19:30, 20:30', '15:00, 17:00');
INSERT INTO `Time` VALUES ('2', '2', '1', '15:00, 17:00', '5:30, 6:30, 7:30, 19:30, 20:30');
INSERT INTO `Time` VALUES ('3', '1', '2', '15:00, 17:00', '5:30, 6:30, 7:30, 19:30, 20:30');
INSERT INTO `Time` VALUES ('4', '2', '2', '5:30, 6:30, 7:30, 19:30, 20:30', '15:00, 17:00');
INSERT INTO `Time` VALUES ('5', '1', '3', '5:30, 6:30, 15:00, 17:00', '19:30, 20:30');
INSERT INTO `Time` VALUES ('6', '2', '3', '19:30, 20:30, 15:00, 17:00', '5:30, 6:30');
INSERT INTO `Time` VALUES ('7', '1', '4', '19:30, 20:30', '5:30, 6:30, 7:30, 19:30, 20:30');
INSERT INTO `Time` VALUES ('8', '2', '4', '5:30, 6:30, 7:30, 19:30, 20:30', '19:30, 20:30');
INSERT INTO `Time` VALUES ('9', '1', '5', '19:30, 20:30, 15:00, 17:00', '15:00, 17:00');
INSERT INTO `Time` VALUES ('10', '2', '5', '19:30, 20:30', '19:30, 20:30, 15:00, 17:00');
INSERT INTO `Time` VALUES ('11', '5', '5', '19:30, 20:30, 15:00, 17:00', '19:30, 20:30');
INSERT INTO `Time` VALUES ('12', '1', '6', '5:30, 6:30, 7:30, 19:30, 20:30', '19:30, 20:30');
INSERT INTO `Time` VALUES ('13', '2', '6', '19:30, 20:30', '5:30, 6:30, 7:30, 19:30, 20:30');
INSERT INTO `Time` VALUES ('14', '1', '7', '19:30, 20:30', '15:00, 17:00');
INSERT INTO `Time` VALUES ('15', '2', '7', '15:00, 17:00', '5:30, 6:30, 7:30, 19:30, 20:30');
INSERT INTO `Time` VALUES ('16', '1', '8', '5:30, 6:30, 7:30, 19:30, 20:30', '5:30, 6:30, 7:30, 19:30, 20:30');
INSERT INTO `Time` VALUES ('17', '2', '8', '5:30, 6:30, 7:30, 19:30, 20:30', '5:30, 6:30, 7:30, 19:30, 20:30');
INSERT INTO `Time` VALUES ('18', '3', '9', '19:30, 20:30, 15:00, 17:00', '5:30, 6:30, 7:30, 19:30, 20:30');
INSERT INTO `Time` VALUES ('19', '4', '9', '5:30, 6:30, 7:30, 19:30, 20:30', '19:30, 20:30, 15:00, 17:00');
INSERT INTO `Time` VALUES ('20', '5', '9', '19:30, 20:30, 15:00, 17:00', '5:30, 6:30, 7:30, 19:30, 20:30');
INSERT INTO `Time` VALUES ('21', '3', '10', '15:00, 17:00', '19:30');
INSERT INTO `Time` VALUES ('22', '4', '10', '15:00, 17:00', '19:30');
INSERT INTO `Time` VALUES ('23', '3', '11', '15:00, 17:00', '19:30, 20:30, 15:00, 17:00');
INSERT INTO `Time` VALUES ('24', '4', '11', '19:30, 20:30, 15:00, 17:00', '15:00, 17:00');
INSERT INTO `Time` VALUES ('25', '3', '12', '19:30, 20:30, 15:00, 17:00', '19:30, 20:30, 15:00, 17:00');
INSERT INTO `Time` VALUES ('26', '4', '12', '19:30, 20:30, 15:00, 17:00', '19:30, 20:30, 15:00, 17:00');
INSERT INTO `Time` VALUES ('27', '3', '13', '5:30, 6:30, 7:30, 19:30, 20:30', '5:30, 6:30, 7:30, 19:30, 20:30');
INSERT INTO `Time` VALUES ('28', '4', '13', '5:30, 6:30, 7:30, 19:30, 20:30', '5:30, 6:30, 7:30, 19:30, 20:30');
INSERT INTO `Time` VALUES ('29', '3', '14', '19:30, 20:30, 15:00, 17:00', '19:30, 20:30, 15:00, 17:00');
INSERT INTO `Time` VALUES ('30', '4', '14', '19:30, 20:30, 15:00, 17:00', ' 20:30, 15:00, 17:00');
INSERT INTO `Time` VALUES ('31', '3', '15', '19:30, 20:30, 15:00, 17:00', '20:30, 15:00, 17:00');
INSERT INTO `Time` VALUES ('32', '4', '15', '19:30, 20:30, 15:00, 17:00', '19:30, 20:30, 15:00');
INSERT INTO `Time` VALUES ('33', '5', '16', '19:30, 20:30, 15:00, 17:00', '15:00, 17:00');
INSERT INTO `Time` VALUES ('34', '5', '17', '15:00, 17:00', '19:30, 20:30, 15:00, 17:00');
INSERT INTO `Time` VALUES ('35', '5', '18', '19:30, 20:30, 15:00, 17:00', '15:00, 17:00');
INSERT INTO `Time` VALUES ('36', '5', '19', '15:00, 17:00', '19:30, 20:30, 15:00, 17:00');
INSERT INTO `Time` VALUES ('37', '5', '20', '19:30, 20:30, 15:00, 17:00', '15:00, 17:00');
SET FOREIGN_KEY_CHECKS=1;
