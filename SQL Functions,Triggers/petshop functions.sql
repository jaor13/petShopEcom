-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 06, 2025 at 05:08 PM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `petshop`
--
USE petshop;

DELIMITER $$
--
-- Functions
--
DROP FUNCTION IF EXISTS `get_lowest_variant_price`$$
CREATE DEFINER=`root`@`localhost` FUNCTION `get_lowest_variant_price` (`product_id` INT) RETURNS DECIMAL(10,2) DETERMINISTIC BEGIN
    DECLARE lowest_price DECIMAL(10,2);

    SELECT MIN(price) INTO lowest_price 
    FROM product_variants 
    WHERE product_variants.product_id = product_id;

    RETURN COALESCE(lowest_price, 0); -- If no variants exist, return 0
END$$

DROP FUNCTION IF EXISTS `has_stock`$$
CREATE DEFINER=`root`@`localhost` FUNCTION `has_stock` (`product_id` INT) RETURNS TINYINT(4) DETERMINISTIC BEGIN
    DECLARE stock_count INT;

    SELECT COUNT(*) INTO stock_count 
    FROM product_variants 
    WHERE product_variants.product_id = product_id 
    AND product_variants.stock_quantity > 0;

    RETURN IF(stock_count > 0, 1, 0); -- Returns 1 if stock exists, otherwise 0
END$$

DROP FUNCTION IF EXISTS `has_variants`$$
CREATE DEFINER=`root`@`localhost` FUNCTION `has_variants` (`product_id` INT) RETURNS TINYINT(4) DETERMINISTIC BEGIN
    DECLARE variant_count INT;

    SELECT COUNT(*) INTO variant_count 
    FROM product_variants 
    WHERE product_variants.product_id = product_id;

    RETURN IF(variant_count > 0, 1, 0); -- Returns 1 if variants exist, otherwise 0
END$$

DELIMITER ;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
