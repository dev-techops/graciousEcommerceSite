-- MySQL Workbench Forward Engineering

SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0;
SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0;
SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='TRADITIONAL,ALLOW_INVALID_DATES';

-- -----------------------------------------------------
-- Schema graciousstore
-- -----------------------------------------------------

-- -----------------------------------------------------
-- Schema graciousstore
-- -----------------------------------------------------
CREATE SCHEMA IF NOT EXISTS `graciousstore` DEFAULT CHARACTER SET utf8 ;
USE `graciousstore`;

-- -----------------------------------------------------
-- Table `graciousstore`.`CATEGORY`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `graciousstore`.`CATEGORY` (
  `category_id` INT NOT NULL AUTO_INCREMENT,
  `category_name` VARCHAR(255) NOT NULL,
  `description` VARCHAR(500) NOT NULL,
  PRIMARY KEY (`category_id`),
  UNIQUE INDEX `product_it_UNIQUE` (`category_id` ASC))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `graciousstore`.`SUPPLIER`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `graciousstore`.`SUPPLIER` (
  `suppl_id` INT NOT NULL AUTO_INCREMENT,
  `suppl_name` VARCHAR(255) NOT NULL,
  `location` VARCHAR(500) NOT NULL,
  `business_phone` VARCHAR(15) NULL,
  `business_email` VARCHAR(500) NULL,
  PRIMARY KEY (`suppl_id`),
  UNIQUE INDEX `product_it_UNIQUE` (`suppl_id` ASC))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `graciousstore`.`PRODUCTS`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `graciousstore`.`PRODUCTS` (
  `product_id` INT NOT NULL AUTO_INCREMENT,
  `category_id` INT NOT NULL,
  `suppl_id` INT NOT NULL,
  `brand_name` VARCHAR(255) NOT NULL,
  `product_name` VARCHAR(255) NOT NULL,
  `product_ingredients` VARCHAR(2000) NOT NULL,
  `directions` VARCHAR(2000) NULL,
  `product_img1` VARCHAR(255) NOT NULL,
  `product_img2` VARCHAR(255) NOT NULL,
  `product_img3` VARCHAR(255) NULL,
  `tax` DOUBLE(10,2) NOT NULL,
  `product_price` DOUBLE(19,2) NOT NULL,
  PRIMARY KEY (`product_id`),
  UNIQUE INDEX `product_it_UNIQUE` (`product_id` ASC),
  INDEX `category_id_idx` (`category_id` ASC),
  INDEX `suppl_id_idx` (`suppl_id` ASC),
  CONSTRAINT `category_id`
    FOREIGN KEY (`category_id`)
    REFERENCES `graciousstore`.`CATEGORY` (`category_id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `suppl_id`
    FOREIGN KEY (`suppl_id`)
    REFERENCES `graciousstore`.`SUPPLIER` (`suppl_id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `graciousstore`.`CUSTOMER`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `graciousstore`.`CUSTOMER` (
  `cust_id` INT NOT NULL AUTO_INCREMENT,
  `cust_firstname` VARCHAR(100) NOT NULL,
  `cust_lastname` VARCHAR(100) NOT NULL,
  `cust_phone` VARCHAR(15) NOT NULL,
  `streetaddress` VARCHAR(500) NOT NULL,
  `suburb` VARCHAR(255) NULL,
  `city` VARCHAR(255) NOT NULL,
  `province` VARCHAR(255) NOT NULL,
  `cust_email` VARCHAR(500) NOT NULL,
  `cust_pwd` VARCHAR(255) NOT NULL,
  `pwd_hash` VARCHAR(255) NOT NULL,
  `regTimestamp` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`cust_id`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `graciousstore`.`SHOPPING_CART`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `graciousstore`.`SHOPPING_CART` (
  `invoice_no` INT NOT NULL AUTO_INCREMENT,
  `product_id` INT NOT NULL,
  `cust_id` INT NOT NULL,
  `qty` INT NOT NULL,
  `discount` DOUBLE(10,2) NOT NULL,
  `amount_due` DOUBLE(19,2) NOT NULL,
  `shipping_fee` DOUBLE(19,2) NULL,
  `shipping_address` VARCHAR(500) NULL,
  `shipping_city` VARCHAR(255) NULL,
  `shipping_province` VARCHAR(255) NULL,
  `paymentOption` VARCHAR(45) NOT NULL,
  `transaction_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`invoice_no`),
  INDEX `cust_id_idx` (`cust_id` ASC),
  INDEX `product_id_idx` (`product_id` ASC),
  CONSTRAINT `cust_id`
    FOREIGN KEY (`cust_id`)
    REFERENCES `graciousstore`.`CUSTOMER` (`cust_id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `product_id`
    FOREIGN KEY (`product_id`)
    REFERENCES `graciousstore`.`PRODUCTS` (`product_id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `graciousstore`.`SALES_HISTORY`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `graciousstore`.`SALES_HISTORY` (
  `transaction_no` INT NOT NULL AUTO_INCREMENT,
  `invoice_no` INT NOT NULL,
  `numProducts` INT NOT NULL,
  `paid` BOOLEAN NOT NULL DEFAULT 0,
  `totalPaid` DOUBLE(19,2) NOT NULL,
  `transactionDate` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`transaction_no`),
  INDEX `invoice_no_idx` (`invoice_no` ASC),
  CONSTRAINT `invoice_no`
    FOREIGN KEY (`invoice_no`)
    REFERENCES `graciousstore`.`SHOPPING_CART` (`invoice_no`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `graciousstore`.`BOOKINGS`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `graciousstore`.`BOOKINGS` (
  `booking_id` INT NOT NULL AUTO_INCREMENT,
  `firstName` VARCHAR(100) NOT NULL,
  `lastName` VARCHAR(100) NOT NULL,
  `contactNo` VARCHAR(15) NOT NULL,
  `emailAddress` VARCHAR(500) NOT NULL,
  `appointment_date` DATE NOT NULL,
  `service_desc` VARCHAR(500) NOT NULL,
  `booking_timestamp` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`booking_id`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Customer Booking Stored Procedure
-- -----------------------------------------------------

DELIMITER //
CREATE DEFINER=`root`@`localhost` 
PROCEDURE `makeBooking`
	(fName VARCHAR(50), 
	 lName VARCHAR(50),
	 contact VARCHAR(15),
	 emailAdd VARCHAR(500), 
	 appmntDate DATE, 
	 serviceDesc VARCHAR(500))
BEGIN
    #Retrieve the details for the clients booking and store in the db
    
	INSERT INTO  `graciousstore`.`bookings`
    (`firstName`, 
	 `lastName`,
	 `contactNo`,
	 `emailAddress`, 
	 `appointment_date`, 
	 `service_desc`)
    VALUES
    (fName, 
	 lName,
	 contact,
	 emailAdd, 
	 appmntDate, 
	 serviceDesc);
END
//
DELIMITER ;


-- -----------------------------------------------------
-- Customer Registration Stored Procedure
-- -----------------------------------------------------

DELIMITER //
CREATE DEFINER=`root`@`localhost` 
PROCEDURE `customerReg`
	(firstName VARCHAR(100), 
	 lastName VARCHAR(100), 
	 contact VARCHAR(15), 
	 address VARCHAR(500), 
	 suburb VARCHAR(255),
     city VARCHAR(255),
     province VARCHAR(255),
     emailAdd VARCHAR(500),
     pwd VARCHAR(255),
	 pwd_hash VARCHAR(255))
BEGIN
    #Store the customers registration details
    
	INSERT INTO  `graciousstore`.`customer`
    (`cust_firstname`,
	 `cust_lastname`,
	 `cust_phone`,
	 `streetaddress`,
	 `suburb`,
	 `city`,
	 `province`,
	 `cust_email`,
	 `cust_pwd`,
	 `pwd_hash`)
    VALUES
    (firstName, 
	 lastName, 
	 contact, 
	 address, 
	 suburb,
     city,
     province,
     emailAdd,
     pwd,
	 pwd_hash);
END
//
DELIMITER ;


-- -----------------------------------------------------
-- Check Stored Procedure
-- -----------------------------------------------------

DELIMITER //
CREATE DEFINER=`root`@`localhost` 
PROCEDURE `checkCustomer` (emailAdd VARCHAR(500)) 
	BEGIN 

#Checks whether customer exists using their email address
	SELECT * 
	FROM `customer` 
	WHERE (cust_email = emailAdd); 
	END

//
DELIMITER ;


-- -----------------------------------------------------
-- Reset Password Member verification Stored Procedure
-- -----------------------------------------------------
DELIMITER //
CREATE DEFINER=`root`@`localhost` 
PROCEDURE `verifyRegCust` 
	(emailAdd VARCHAR(500), 
	 pwdHash VARCHAR(255)) 
BEGIN 
	
	#Checks if customer is registered and retrieves hash
	SELECT *
	FROM `customer` 
	WHERE (`cust_email` = emailAdd AND `pwd_hash` = pwdHash); 
	
END
//
DELIMITER ;


-- -----------------------------------------------------
-- Fetch product details Stored Procedure
-- -----------------------------------------------------

DELIMITER //
CREATE DEFINER=`root`@`localhost` 
PROCEDURE `getProductDetails` 
	(productID INT) 
	BEGIN 

	SELECT * 
	FROM `products` 
	WHERE (product_id = productID); 
	END

//
DELIMITER ;


-- -----------------------------------------------------
-- Product Category Stored Procedure
-- -----------------------------------------------------

DELIMITER //
CREATE DEFINER=`root`@`localhost` 
PROCEDURE `productCategories` (categoryID INT) 
	BEGIN 

	SELECT * 
	FROM `category` 
	WHERE (category_id = categoryID); 
	END

//
DELIMITER ;


-- -----------------------------------------------------
-- Product Item Stored Procedure
-- -----------------------------------------------------

DELIMITER //
CREATE DEFINER=`root`@`localhost` 
PROCEDURE `productItem` (productID INT) 
	BEGIN 

	SELECT * 
	FROM `products` 
	WHERE (product_id = productID); 
	END

//
DELIMITER ;


-- -----------------------------------------------------
-- Reset Password Stored Procedure
-- -----------------------------------------------------
DELIMITER //
CREATE DEFINER=`root`@`localhost` 
PROCEDURE `passwordReset` 
	(emailAdd VARCHAR(500),
	 newPwd VARCHAR(255),
	 pwdHash VARCHAR(255)) 
BEGIN 
	
	#Reset the customers password
	UPDATE `customer` 
	SET `cust_pwd` = newPwd, `pwd_hash` = pwdHash 
	WHERE (`cust_email` = emailAdd); 
	
END
//
DELIMITER ;


SET SQL_MODE=@OLD_SQL_MODE;
SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;
SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS;
