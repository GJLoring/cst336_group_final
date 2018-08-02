/* Stub just to hold place for now */

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

CREATE TABLE IF NOT EXISTS `category` (
  `catId` smallint(5) unsigned NOT NULL AUTO_INCREMENT,
  `description` varchar(60) NOT NULL,
  `catName` varchar(60) NOT NULL,
  PRIMARY KEY (`catID`),
  UNIQUE KEY `catName` (`catName`)
);

/*
Todo

Table Purchase:
Product
Quantity
Purchase Date


Table Product:
Unit Price
Product Name
Product Description
Category
Product Image
*/
