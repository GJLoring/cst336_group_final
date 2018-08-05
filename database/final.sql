/* Stub just to hold place for now */

-- create the database
DROP DATABASE IF EXISTS store;
CREATE DATABASE store;

-- select the database
USE store;

CREATE TABLE IF NOT EXISTS `users` (
  `userId` smallint(5) unsigned NOT NULL AUTO_INCREMENT,
  `fistName` varchar(60) NOT NULL,
  `lastName` varchar(60) NOT NULL,
  `userName` varchar(60) NOT NULL,
  `loginLevel` varchar(8) NOT NULL,
  `password` varchar(40) NOT NULL,
  PRIMARY KEY (`userId`),
  UNIQUE KEY `userName` (`userName`)
);

INSERT INTO `users` (`userId`, `fistName`, `lastName`, `username`, `loginLevel`, `password`) VALUES
(1, 'Jose', 'lastName', 'admin_1', 'admin', '25ab86bed149ca6ca9c1c0d5db7c9a91388ddeab'),
(2, 'Grace', 'lastName', 'admin_2', 'admin', '25ab86bed149ca6ca9c1c0d5db7c9a91388ddeab'),
(3, 'Christian', 'lastName', 'user_1',  'customer', '25ab86bed149ca6ca9c1c0d5db7c9a91388ddeab'),
(4, 'Gabe', 'lastName', 'user_2',  'customer', '25ab86bed149ca6ca9c1c0d5db7c9a91388ddeab');

CREATE TABLE IF NOT EXISTS `category` (
  `catId` smallint(5) unsigned NOT NULL AUTO_INCREMENT,
  `description` varchar(60) NOT NULL,
  `catName` varchar(60) NOT NULL,
  PRIMARY KEY (`catID`),
  UNIQUE KEY `catName` (`catName`)
);

INSERT INTO `category` (`catId`, `catName`, `description`) VALUES
(1, 'Flip Phone', 'Burner Phones'),
(2, 'Car Phone', 'Phones for 80 year old CEOs stuck in the 90s '),
(3, 'iPhone', 'What all the Hip kids want'),
(4, 'Android Phone', 'Nice phones to give to those you hate');

CREATE TABLE IF NOT EXISTS `purchase` (
   `transId` smallint(5) unsigned NOT NULL AUTO_INCREMENT,
   `Product` varchar(60) NOT NULL,
   `Quantity` int NOT NULL,
   `PurchaseDate` varchar(60) NOT NULL,
   PRIMARY KEY (`transId`)
);

INSERT INTO `purchase` (`transId`, `Product`, `Quantity`, `PurchaseDate`) VALUES
(1, 'iphone8', 5, '07/05/2018'),
(2, 'Android', 4, '07/04/2018'),
(3, 'iphone7', 3, '07/03/2018'),
(4, 'Android', 2, '07/02/2018');

CREATE TABLE IF NOT EXISTS `product` (
   `itemId` smallint(5) unsigned NOT NULL AUTO_INCREMENT,
   `UnitPrice` int NOT NULL,
   `productName` varchar(60) NOT NULL,
   `description` varchar(60) NOT NULL,
   `category` varchar(60) NOT NULL,
   `image` varchar(60) NOT NULL,
   PRIMARY KEY (`itemId`)
);

INSERT INTO `product` (`itemId`, `UnitPrice`, `productName`, `description`, `category`, `image`) VALUES
(1, 1000, 'iphone8', 'The best phone ever', 'iPhone','imgage1.png'),
(2,  999, 'iphone7', 'Something found in a time capsule', 'iPhone','imgage1.png'),
(4,  199, 'Android', 'At least it looks like a iPhone from a distance', 'Android','imgage1.png');

