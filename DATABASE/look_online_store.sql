-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 29, 2019 at 02:30 PM
-- Server version: 10.3.16-MariaDB
-- PHP Version: 7.3.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `look_online_store`
--

-- --------------------------------------------------------

--
-- Table structure for table `catbackup`
--

CREATE TABLE `catbackup` (
  `id` mediumint(8) UNSIGNED NOT NULL,
  `cat_id` mediumint(8) UNSIGNED NOT NULL,
  `cat_Name` varchar(50) NOT NULL,
  `changetype` enum('NEW','EDIT','DELETE') NOT NULL,
  `changetime` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `catbackup`
--

INSERT INTO `catbackup` (`id`, `cat_id`, `cat_Name`, `changetype`, `changetime`) VALUES
(1, 1, 'Jellwery', 'NEW', '2019-10-21 12:15:51'),
(2, 2, 'Makeup', 'NEW', '2019-10-21 12:15:51'),
(3, 3, 'Cosmetics', 'NEW', '2019-10-26 08:21:17'),
(4, 3, 'Cosmetics', 'DELETE', '2019-10-26 08:22:02');

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE `category` (
  `ID` int(11) NOT NULL,
  `NAME` varchar(50) DEFAULT NULL,
  `deleted` tinyint(1) UNSIGNED NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`ID`, `NAME`, `deleted`) VALUES
(1, 'Jellwery', 0),
(2, 'Makeup', 0);

--
-- Triggers `category`
--
DELIMITER $$
CREATE TRIGGER `category_after_delete` AFTER DELETE ON `category` FOR EACH ROW BEGIN
IF OLD.deleted THEN 
SET @changetype = 'EDIT'; 
ELSE SET @changetype = 'DELETE';
END IF;
  INSERT INTO catbackup(cat_id,cat_Name,changetype) VALUES ( OLD.ID, OLD.NAME,@changetype); 

END
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `category_after_insert` AFTER INSERT ON `category` FOR EACH ROW BEGIN
	
		IF NEW.deleted THEN
			SET @changetype = 'DELETE';
		ELSE
			SET @changetype = 'NEW';
		END IF;
    
		INSERT INTO catBackup (cat_id,cat_Name,changetype) VALUES (NEW.ID,NEW.NAME, @changetype);
		
   END
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `category_after_update` AFTER UPDATE ON `category` FOR EACH ROW BEGIN 
IF NEW.deleted THEN 
SET @changetype = 'DELETE'; 
ELSE SET @changetype = 'EDIT';
END IF; 
INSERT INTO catBackup(cat_id,cat_Name,changetype) VALUES (NEW.ID,NEW.NAME, @changetype); 

END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `feedback`
--

CREATE TABLE `feedback` (
  `F_ID` int(11) NOT NULL,
  `NAME` varchar(50) NOT NULL,
  `EMAIL` varchar(50) NOT NULL,
  `SUBJECT` varchar(50) NOT NULL,
  `MESSAGE` varchar(250) NOT NULL,
  `DATE` varchar(50) NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `feedback`
--

INSERT INTO `feedback` (`F_ID`, `NAME`, `EMAIL`, `SUBJECT`, `MESSAGE`, `DATE`) VALUES
(2, 'SHAZIA KHAN', 'SHAZIA@GMAIL.COM', 'ABC', 'MY NAME IS SHAZIA KHAN', 'current_timestamp()'),
(3, 'ERUM ', 'ERUM@HOTMAIL.COM', 'XYZ', 'THIS IS A MESSAGE', 'current_timestamp()');

-- --------------------------------------------------------

--
-- Table structure for table `order_detail`
--

CREATE TABLE `order_detail` (
  `ORDER_ID` varchar(50) NOT NULL,
  `ORDER_DATE` varchar(50) NOT NULL DEFAULT current_timestamp(),
  `U_ID` int(11) NOT NULL,
  `ORDER_COST` float NOT NULL,
  `Status` int(11) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `order_detail`
--

INSERT INTO `order_detail` (`ORDER_ID`, `ORDER_DATE`, `U_ID`, `ORDER_COST`, `Status`) VALUES
('5db6cf8a44c61', '2019-10-28', 1, 166, 1),
('5db6cf90c7aa4', '2019-10-28', 1, 166, 1),
('5db6cfa7076a7', '2019-10-28', 1, 166, 1),
('5db6d12204f5d', '2019-10-28', 1, 166, 2),
('5db6d8735f763', '2019-10-28', 1, 4, 2),
('5db7d43f06986', '2019-10-29', 1, 145, 1);

-- --------------------------------------------------------

--
-- Table structure for table `order_done`
--

CREATE TABLE `order_done` (
  `OD_ID` int(11) NOT NULL,
  `OR_ID` varchar(50) NOT NULL,
  `PRO_ID` int(11) NOT NULL,
  `PRO_QTY` varchar(50) NOT NULL,
  `PRO_AMOUNT` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `order_done`
--

INSERT INTO `order_done` (`OD_ID`, `OR_ID`, `PRO_ID`, `PRO_QTY`, `PRO_AMOUNT`) VALUES
(3, '5db6d12204f5d', 8, '3', '12'),
(4, '5db6d12204f5d', 2, '1', '6'),
(5, '5db6d12204f5d', 33, '1', '145'),
(6, '5db6d12204f5d', 7, '1', '3'),
(7, '5db6d8735f763', 8, '1', '4'),
(8, '5db7d43f06986', 33, '1', '145');

-- --------------------------------------------------------

--
-- Table structure for table `payment`
--

CREATE TABLE `payment` (
  `PAY_ID` int(11) NOT NULL,
  `P_M_ID` int(11) NOT NULL,
  `OR_ID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Triggers `payment`
--
DELIMITER $$
CREATE TRIGGER `payment_after_insert` AFTER INSERT ON `payment` FOR EACH ROW BEGIN
	
		IF deleted THEN
			SET @changetype = 'DELETE';
		ELSE
			SET @changetype = 'NEW';
		END IF;
    
		INSERT INTO payment_bkup (pay_id, changetype) VALUES (id, @changetype);
		
    END
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `payment_after_update` AFTER UPDATE ON `payment` FOR EACH ROW BEGIN
	
		IF deleted THEN
			SET @changetype = 'DELETE';
		ELSE
			SET @changetype = 'EDIT';
		END IF;
    
		INSERT INTO audit (pay_id, changetype) VALUES (id, @changetype);
		
    END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `payment_method`
--

CREATE TABLE `payment_method` (
  `PAY_WAY_ID` int(11) NOT NULL,
  `PAY_WAY_NAME` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `probackup`
--

CREATE TABLE `probackup` (
  `id` int(11) NOT NULL,
  `pro_id` int(11) NOT NULL,
  `pro_name` varchar(50) NOT NULL,
  `pro_image` varchar(50) NOT NULL,
  `pro_price` float NOT NULL,
  `sub_cat_id` int(11) NOT NULL,
  `changetime` timestamp NOT NULL DEFAULT current_timestamp(),
  `changetype` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `PRO_ID` int(11) NOT NULL,
  `PRO_NAME` varchar(50) NOT NULL,
  `PRO_PRICE` float NOT NULL,
  `PRO_IMAGE` varchar(150) NOT NULL,
  `SUB_C_ID` int(11) NOT NULL,
  `deleted` tinyint(3) UNSIGNED NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`PRO_ID`, `PRO_NAME`, `PRO_PRICE`, `PRO_IMAGE`, `SUB_C_ID`, `deleted`) VALUES
(1, 'RING BRACELET', 5, 'Images/JEWELRY/BRACELET/download (2).jpg', 1, 0),
(2, 'STYLISH BRACELET', 6, 'Images/JEWELRY/BRACELET/images (20).jpg', 1, 0),
(3, 'PEACOCK EARRINGS', 7, 'Images/JEWELRY/EARINGS/images.png', 2, 0),
(4, 'TRADITIONAL EARRINGS', 8, 'Images/JEWELRY/EARINGS/images (47).jpg', 2, 0),
(5, 'FLOWER NECKLACE', 7, 'Images/JEWELRY/NECKLACE/images (10).jpg', 3, 0),
(6, 'STYLISH NECKLACE', 9, 'Images/JEWELRY/NECKLACE/images (48).jpg', 3, 0),
(7, 'LOVE RING', 3, 'Images/JEWELRY/RINGS/images (18).jpg', 5, 0),
(8, 'BALL RING', 4, 'Images/JEWELRY/RINGS/download (5).jpg', 5, 0),
(9, 'HEAVY PEARL NECKLACE', 12, 'Images/JEWELRY/PEARL/images.jpg', 10, 0),
(10, 'CLASSY PEARL SET', 10, 'Images/JEWELRY/PEARL/images (21).jpg', 10, 0),
(11, 'STYLISH GOLD BENGAL', 60, 'Images/JEWELRY/GOLD/images (29).jpg', 9, 0),
(31, 'CLASSY GOLD RING', 54, 'Images/JEWELRY/GOLD/images (6).jpg', 9, 0),
(33, 'HEAVY GOLD SET', 145, 'Images/JEWELRY/GOLD/images (14).jpg', 9, 0),
(34, 'GRACEFUL GOLD NECKLACE', 82, 'Images/JEWELRY/GOLD/images (31).jpg', 9, 0),
(35, 'COOL SCALP PENDANT', 65, 'Images/JEWELRY/GOLD/images (34).jpg', 9, 0),
(37, 'GOLD NAME PENDANT', 60, 'Images/JEWELRY/GOLD/images (3).jpg', 9, 0),
(38, 'UNIQUE GOLD RING', 99, 'Images/JEWELRY/GOLD/images (13).jpg', 9, 0),
(39, 'WHITE GOLD EARRING', 110, 'Images/JEWELRY/GOLD/images (21).jpg', 9, 0),
(40, 'PINK BEADS BLUSH ON', 10, 'Images/MAKEUP/BLUSH_ON/images (15).jpg', 15, 0),
(41, 'MULTI COLOR BEADS', 8, 'Images/MAKEUP/BLUSH_ON/images (13).jpg', 15, 0),
(42, 'PINK CAKE BLUSH ON', 4, 'Images/MAKEUP/BLUSH_ON/images (2).jpg', 15, 0),
(43, 'LIQUID BLUSH ON', 9, 'Images/MAKEUP/BLUSH_ON/images (7).jpg', 15, 0),
(44, 'LIQUID GLAM BLUSH ON', 8, 'Images/MAKEUP/BLUSH_ON/images (11).jpg', 15, 0),
(45, 'BABY PINK BEADS', 12, 'Images/MAKEUP/BLUSH_ON/download (2).jpg', 15, 0),
(46, 'CAKE BLUCH ON', 3, 'Images/MAKEUP/BLUSH_ON/download (5).jpg', 15, 0),
(47, 'MULTI COLOR CAKE KIT', 6, 'Images/MAKEUP/BLUSH_ON/download.jpg', 15, 0);

-- --------------------------------------------------------

--
-- Table structure for table `role`
--

CREATE TABLE `role` (
  `R_ID` int(11) NOT NULL,
  `R_NAME` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `role`
--

INSERT INTO `role` (`R_ID`, `R_NAME`) VALUES
(1, 'Admin'),
(2, 'User');

-- --------------------------------------------------------

--
-- Table structure for table `shipping`
--

CREATE TABLE `shipping` (
  `SHIP_ID` int(11) NOT NULL,
  `OR_ID` int(11) NOT NULL,
  `RECVR_NAME` varchar(50) NOT NULL,
  `RECVR_EMAIL` varchar(50) NOT NULL,
  `RECVR_ADRES` varchar(150) NOT NULL,
  `RECVR_PHONE` varchar(13) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `status`
--

CREATE TABLE `status` (
  `S_ID` int(11) NOT NULL,
  `S_Name` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `status`
--

INSERT INTO `status` (`S_ID`, `S_Name`) VALUES
(1, 'Pending'),
(2, 'Approved'),
(3, 'Deliverd'),
(4, 'Completed'),
(5, 'Canceled');

-- --------------------------------------------------------

--
-- Table structure for table `sub_catagory`
--

CREATE TABLE `sub_catagory` (
  `SUB_CAT_ID` int(11) NOT NULL,
  `SUB_CAT_NAME` varchar(50) NOT NULL,
  `CAT_ID` int(11) NOT NULL,
  `deleted` tinyint(1) UNSIGNED NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `sub_catagory`
--

INSERT INTO `sub_catagory` (`SUB_CAT_ID`, `SUB_CAT_NAME`, `CAT_ID`, `deleted`) VALUES
(1, 'BRACELET', 1, 0),
(2, 'EARINGS', 1, 0),
(3, 'NECKLACE', 1, 0),
(4, 'PENDANT', 1, 0),
(5, 'RINGS', 1, 0),
(6, 'WATCHES', 1, 0),
(7, 'DESIGNER', 1, 0),
(8, 'DIAMOND', 1, 0),
(9, 'GOLD', 1, 0),
(10, 'PEARL', 1, 0),
(11, 'BRIDAL', 1, 0),
(12, 'HANDMADE', 1, 0),
(13, 'TRADITIONAL', 1, 0),
(14, 'WEDDING', 1, 0),
(15, 'BLUSH ON', 2, 0),
(16, 'BODY SPRAY', 2, 0),
(17, 'EYE LINER', 2, 0),
(18, 'EYE SHADE', 2, 0),
(19, 'FACE POWDER', 2, 0),
(20, 'FACE SHINER', 2, 0),
(21, 'FOUNDATION', 2, 0),
(22, 'HAIR JEL', 2, 0),
(23, 'LENSES', 2, 0),
(24, 'LIP PENCILS', 2, 0),
(25, 'LIPSTICK', 2, 0),
(26, 'MASKARA', 2, 0),
(27, 'NAIL PAINTS', 2, 0),
(28, 'PERFUMES', 2, 0);

--
-- Triggers `sub_catagory`
--
DELIMITER $$
CREATE TRIGGER `subcatagory_after_insert` AFTER INSERT ON `sub_catagory` FOR EACH ROW BEGIN
	
		IF NEW.deleted THEN
			SET @changetype = 'DELETE';
		ELSE
			SET @changetype = 'NEW';
		END IF;
    
		INSERT INTO sub_catbackup(changetype,cat_id,sub_cat_id,sub_cat_name) VALUES (@changetype, NEW.CAT_ID, NEW.SUB_CAT_ID, NEW.SUB_CAT_NAME); 
		
   END
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `subcategory_after_delete` AFTER DELETE ON `sub_catagory` FOR EACH ROW BEGIN
IF OLD.deleted THEN 
SET @changetype = 'EDIT'; 
ELSE SET @changetype = 'DELETE';
END IF;
  INSERT INTO sub_catbackup(changetype,cat_id,sub_cat_id,sub_cat_name) VALUES (@changetype, OLD.CAT_ID, OLD.SUB_CAT_ID, OLD.SUB_CAT_NAME); 
		
END
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `subcategory_after_update` AFTER UPDATE ON `sub_catagory` FOR EACH ROW BEGIN 
IF NEW.deleted THEN 
SET @changetype = 'DELETE'; 
ELSE SET @changetype = 'EDIT';
END IF;
INSERT INTO sub_catbackup(changetype,cat_id,sub_cat_id,sub_cat_name) VALUES (@changetype, NEW.CAT_ID, NEW.SUB_CAT_ID, NEW.SUB_CAT_NAME); 

END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `sub_catbackup`
--

CREATE TABLE `sub_catbackup` (
  `id` int(11) NOT NULL,
  `cat_id` int(11) NOT NULL,
  `sub_cat_id` int(11) NOT NULL,
  `sub_cat_name` varchar(50) NOT NULL,
  `changetime` timestamp NOT NULL DEFAULT current_timestamp(),
  `changetype` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `sub_catbackup`
--

INSERT INTO `sub_catbackup` (`id`, `cat_id`, `sub_cat_id`, `sub_cat_name`, `changetime`, `changetype`) VALUES
(1, 1, 1, 'Diamond', '2019-10-21 12:28:29', 'NEW'),
(2, 2, 2, 'Lipstick', '2019-10-21 12:28:29', 'NEW'),
(3, 1, 3, 'khdkahs', '2019-10-21 12:36:19', 'NEW'),
(4, 1, 4, 'kjdhskjdhsa', '2019-10-21 12:36:19', 'NEW'),
(5, 1, 1, 'BRACELET', '2019-10-22 15:04:51', 'NEW'),
(6, 1, 2, 'EARINGS', '2019-10-22 15:04:51', 'NEW'),
(7, 1, 3, 'NECKLACE', '2019-10-22 15:04:51', 'NEW'),
(8, 1, 4, 'PENDANT', '2019-10-22 15:04:51', 'NEW'),
(9, 1, 5, 'RINGS', '2019-10-22 15:04:51', 'NEW'),
(10, 1, 6, 'WATCHES', '2019-10-22 15:12:41', 'NEW'),
(11, 1, 7, 'DESIGNER', '2019-10-22 15:12:41', 'NEW'),
(12, 1, 8, 'DIAMOND', '2019-10-22 15:12:41', 'NEW'),
(13, 1, 9, 'GOLD', '2019-10-22 15:12:41', 'NEW'),
(14, 1, 10, 'PEARL', '2019-10-22 15:12:41', 'NEW'),
(15, 1, 11, 'BRIDAL', '2019-10-22 15:15:03', 'NEW'),
(16, 1, 12, 'HANDMADE', '2019-10-22 15:15:03', 'NEW'),
(17, 1, 13, 'TRADITIONAL', '2019-10-22 15:15:03', 'NEW'),
(18, 1, 14, 'WEDDING', '2019-10-22 15:15:03', 'NEW'),
(19, 2, 15, 'BLUSH_ON', '2019-10-26 06:08:49', 'NEW'),
(20, 2, 16, 'BODY_SPRAY', '2019-10-26 06:08:49', 'NEW'),
(21, 2, 17, 'EYE_LINER', '2019-10-26 06:08:49', 'NEW'),
(22, 2, 18, 'EYE_SHADE', '2019-10-26 06:08:49', 'NEW'),
(23, 2, 19, 'FACE_POWDER', '2019-10-26 06:08:49', 'NEW'),
(24, 2, 20, 'FACE_SHINER', '2019-10-26 06:08:49', 'NEW'),
(25, 2, 21, 'FOUNDATION', '2019-10-26 06:08:49', 'NEW'),
(26, 2, 22, 'HAIR_JEL', '2019-10-26 06:08:49', 'NEW'),
(27, 2, 23, 'LENSES', '2019-10-26 06:08:49', 'NEW'),
(28, 2, 24, 'LIP_PENCILS', '2019-10-26 06:08:49', 'NEW'),
(29, 2, 25, 'LIPSTICK', '2019-10-26 06:08:49', 'NEW'),
(30, 2, 26, 'MASKARA', '2019-10-26 06:08:49', 'NEW'),
(31, 2, 27, 'NAIL_PAINT', '2019-10-26 06:08:49', 'NEW'),
(32, 2, 28, 'PERFUMES', '2019-10-26 06:08:49', 'NEW'),
(33, 2, 16, 'BODY SPRAY', '2019-10-26 06:10:53', 'EDIT'),
(34, 2, 15, 'BLUSH ON', '2019-10-26 06:11:05', 'EDIT'),
(35, 2, 17, 'EYE LINER', '2019-10-26 06:11:19', 'EDIT'),
(36, 2, 18, 'EYE SHADE', '2019-10-26 06:12:53', 'EDIT'),
(37, 2, 19, 'FACE POWDER', '2019-10-26 06:13:05', 'EDIT'),
(38, 2, 20, 'FACE SHINER', '2019-10-26 06:13:18', 'EDIT'),
(39, 2, 22, 'HAIR JEL', '2019-10-26 06:13:36', 'EDIT'),
(40, 2, 24, 'LIP PENCILS', '2019-10-26 06:13:56', 'EDIT'),
(41, 2, 27, 'NAIL PAINTS', '2019-10-26 06:14:13', 'EDIT'),
(42, 1, 29, 'dadas', '2019-10-26 08:26:29', 'NEW'),
(43, 1, 29, 'dadas', '2019-10-26 08:29:23', 'DELETE');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `USER_ID` int(11) NOT NULL,
  `USER_NAME` varchar(50) NOT NULL,
  `USER_EMAIL` varchar(50) NOT NULL,
  `USER_CONTACT` varchar(20) NOT NULL,
  `USER_PASS` varchar(20) NOT NULL,
  `ROLE_ID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`USER_ID`, `USER_NAME`, `USER_EMAIL`, `USER_CONTACT`, `USER_PASS`, `ROLE_ID`) VALUES
(1, 'Sana Azmat Khan', 'sana@gmail.com', '09007860134', 'password', 1),
(4, 'asad', 'asaf', '2312', '1234', 2),
(5, 'sdsda', 'adasd', '23122', 'dsadsa', 2),
(6, 'someone', 'someone@gmil.com', '090078601', '12345', 2);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `catbackup`
--
ALTER TABLE `catbackup`
  ADD PRIMARY KEY (`id`),
  ADD KEY `ix_cat_id` (`cat_id`),
  ADD KEY `ix_changetype` (`changetype`),
  ADD KEY `ix_changetime` (`changetime`);

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `ix_deleted` (`deleted`);

--
-- Indexes for table `feedback`
--
ALTER TABLE `feedback`
  ADD PRIMARY KEY (`F_ID`);

--
-- Indexes for table `order_detail`
--
ALTER TABLE `order_detail`
  ADD PRIMARY KEY (`ORDER_ID`),
  ADD KEY `U_ID` (`U_ID`),
  ADD KEY `Status` (`Status`);

--
-- Indexes for table `order_done`
--
ALTER TABLE `order_done`
  ADD PRIMARY KEY (`OD_ID`),
  ADD KEY `PRO_ID` (`PRO_ID`),
  ADD KEY `order_done_ibfk_2` (`OR_ID`);

--
-- Indexes for table `payment`
--
ALTER TABLE `payment`
  ADD PRIMARY KEY (`PAY_ID`),
  ADD KEY `P_M_ID` (`P_M_ID`);

--
-- Indexes for table `payment_method`
--
ALTER TABLE `payment_method`
  ADD PRIMARY KEY (`PAY_WAY_ID`);

--
-- Indexes for table `probackup`
--
ALTER TABLE `probackup`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`PRO_ID`),
  ADD KEY `SUB_C_ID` (`SUB_C_ID`);

--
-- Indexes for table `role`
--
ALTER TABLE `role`
  ADD PRIMARY KEY (`R_ID`);

--
-- Indexes for table `shipping`
--
ALTER TABLE `shipping`
  ADD PRIMARY KEY (`SHIP_ID`);

--
-- Indexes for table `status`
--
ALTER TABLE `status`
  ADD PRIMARY KEY (`S_ID`);

--
-- Indexes for table `sub_catagory`
--
ALTER TABLE `sub_catagory`
  ADD PRIMARY KEY (`SUB_CAT_ID`),
  ADD KEY `CAT_ID` (`CAT_ID`);

--
-- Indexes for table `sub_catbackup`
--
ALTER TABLE `sub_catbackup`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`USER_ID`),
  ADD UNIQUE KEY `USER_EMAIL` (`USER_EMAIL`),
  ADD UNIQUE KEY `USER_CONTACT` (`USER_CONTACT`),
  ADD KEY `ROLE_ID` (`ROLE_ID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `catbackup`
--
ALTER TABLE `catbackup`
  MODIFY `id` mediumint(8) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `feedback`
--
ALTER TABLE `feedback`
  MODIFY `F_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `order_done`
--
ALTER TABLE `order_done`
  MODIFY `OD_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `payment`
--
ALTER TABLE `payment`
  MODIFY `PAY_ID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `payment_method`
--
ALTER TABLE `payment_method`
  MODIFY `PAY_WAY_ID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `probackup`
--
ALTER TABLE `probackup`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `PRO_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=48;

--
-- AUTO_INCREMENT for table `role`
--
ALTER TABLE `role`
  MODIFY `R_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `shipping`
--
ALTER TABLE `shipping`
  MODIFY `SHIP_ID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `status`
--
ALTER TABLE `status`
  MODIFY `S_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `sub_catagory`
--
ALTER TABLE `sub_catagory`
  MODIFY `SUB_CAT_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- AUTO_INCREMENT for table `sub_catbackup`
--
ALTER TABLE `sub_catbackup`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=44;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `USER_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `order_detail`
--
ALTER TABLE `order_detail`
  ADD CONSTRAINT `order_detail_ibfk_1` FOREIGN KEY (`U_ID`) REFERENCES `user` (`USER_ID`),
  ADD CONSTRAINT `order_detail_ibfk_2` FOREIGN KEY (`Status`) REFERENCES `status` (`S_ID`);

--
-- Constraints for table `order_done`
--
ALTER TABLE `order_done`
  ADD CONSTRAINT `order_done_ibfk_1` FOREIGN KEY (`PRO_ID`) REFERENCES `products` (`PRO_ID`),
  ADD CONSTRAINT `order_done_ibfk_2` FOREIGN KEY (`OR_ID`) REFERENCES `order_detail` (`ORDER_ID`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `payment`
--
ALTER TABLE `payment`
  ADD CONSTRAINT `payment_ibfk_2` FOREIGN KEY (`P_M_ID`) REFERENCES `payment_method` (`PAY_WAY_ID`);

--
-- Constraints for table `products`
--
ALTER TABLE `products`
  ADD CONSTRAINT `products_ibfk_1` FOREIGN KEY (`SUB_C_ID`) REFERENCES `sub_catagory` (`SUB_CAT_ID`);

--
-- Constraints for table `sub_catagory`
--
ALTER TABLE `sub_catagory`
  ADD CONSTRAINT `sub_catagory_ibfk_1` FOREIGN KEY (`CAT_ID`) REFERENCES `category` (`ID`);

--
-- Constraints for table `user`
--
ALTER TABLE `user`
  ADD CONSTRAINT `user_ibfk_1` FOREIGN KEY (`ROLE_ID`) REFERENCES `role` (`R_ID`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
