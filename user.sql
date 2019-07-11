/*
 Navicat MySQL Data Transfer

 Source Server         : MyLocalDB
 Source Server Type    : MySQL
 Source Server Version : 50622
 Source Host           : localhost
 Source Database       : crud_database

 Target Server Type    : MySQL
 Target Server Version : 50622
 File Encoding         : utf-8


*/

SET NAMES utf8mb4;
SET FOREIGN_KEY_CHECKS = 0;

-- ----------------------------
--  Table structure for `user`
-- ----------------------------
DROP TABLE IF EXISTS `user`;
CREATE TABLE `user` (
  /*`id` mediumint(8) unsigned NOT NULL AUTO_INCREMENT,*/
  `userid` varchar(255) DEFAULT NULL,
  `FirstName` varchar(255) DEFAULT NULL,
  `LastName` varchar(255) DEFAULT NULL,
  `City` varchar(255) DEFAULT NULL,
  `Zip` varchar(10) DEFAULT NULL,
  `DateOfBirth` varchar(255) DEFAULT NULL,
  `EmailAddress` varchar(255) DEFAULT NULL,
  `Password` varchar(255)DEFAULT NULL,
  `ConfirmPassword` varchar (255) DEFAULT NULL,
  `PhoneNumber` int(12) DEFAULT NULL,
  `Active` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`EmailAddress`)
) ENGINE=InnoDB AUTO_INCREMENT=263 DEFAULT CHARSET=utf8;




-- ----------------------------
--  Records of `allPosts`
-- ----------------------------
DROP TABLE IF EXISTS `allposts`;
CREATE TABLE `allposts` (
  /*`id` mediumint(8) unsigned NOT NULL AUTO_INCREMENT,*/
                   `Email` varchar(255) DEFAULT NULL,
                   `pid` varchar(255) DEFAULT NULL,
                  `ProductName` varchar(255) DEFAULT NULL,
                  `EstimatePrice` varchar(255) DEFAULT NULL,
                  `Category` varchar(255) DEFAULT NULL,
                  `Quality` varchar(255) DEFAULT NULL,
                  `Description` varchar(255) DEFAULT NULL,
                  `YearOfPurchase` varchar(255) DEFAULT NULL,
                  `Warranty` varchar(255) DEFAULT NULL,
                  `TravelDistance` varchar(255) DEFAULT NULL,
                  `Image` blob NOT NULL,
                  PRIMARY KEY (`pid`)
) ENGINE=InnoDB AUTO_INCREMENT=263 DEFAULT CHARSET=utf8;



DROP TABLE IF EXISTS `contactrequest`;
CREATE TABLE `contactrequest` (
  /*`id` mediumint(8) unsigned NOT NULL AUTO_INCREMENT,*/
                          `SenderEmail` varchar(255) DEFAULT NULL,
                          `ReceiverEmail` varchar(255) DEFAULT NULL,
                          `requestid` varchar(255) DEFAULT NULL,
                          `pid` varchar(255) DEFAULT NULL,
                          `Status` varchar(255) DEFAULT NULL,
                          PRIMARY KEY (`requestid`)
) ENGINE=InnoDB AUTO_INCREMENT=263 DEFAULT CHARSET=utf8;


COMMIT;

SET FOREIGN_KEY_CHECKS = 1;
