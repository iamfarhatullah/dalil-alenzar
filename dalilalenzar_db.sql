-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 03, 2021 at 09:43 PM
-- Server version: 10.1.37-MariaDB
-- PHP Version: 7.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `dalilalenzar_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `tbl_achievements`
--

CREATE TABLE `tbl_achievements` (
  `achievement_ID` int(11) NOT NULL,
  `achievement_title_en` varchar(100) NOT NULL,
  `achievement_title_ar` varchar(100) NOT NULL,
  `achievement_pdf` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_achievements`
--

INSERT INTO `tbl_achievements` (`achievement_ID`, `achievement_title_en`, `achievement_title_ar`, `achievement_pdf`) VALUES
(10, 'FilmFare Awards 2020', 'Filmfare awards Riyad KSA', 'achievements/1612383971-3756-CamScanner-01-26-2021-21.00.pdf');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_admin`
--

CREATE TABLE `tbl_admin` (
  `admin_ID` int(11) NOT NULL,
  `admin_name` varchar(30) NOT NULL,
  `admin_username` varchar(30) NOT NULL,
  `admin_password` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_admin`
--

INSERT INTO `tbl_admin` (`admin_ID`, `admin_name`, `admin_username`, `admin_password`) VALUES
(2, 'Ilyas Azeem', 'ilyas', 'ilyas');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_clients`
--

CREATE TABLE `tbl_clients` (
  `client_ID` int(11) NOT NULL,
  `client_name_en` varchar(50) NOT NULL,
  `client_name_ar` varchar(50) NOT NULL,
  `client_address_en` varchar(100) NOT NULL,
  `client_address_ar` varchar(100) NOT NULL,
  `client_contract` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_clients`
--

INSERT INTO `tbl_clients` (`client_ID`, `client_name_en`, `client_name_ar`, `client_address_en`, `client_address_ar`, `client_contract`) VALUES
(33, 'dkfj', 'kdsfj', 'kdsjf', 'lkjslkdf', '');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_employees`
--

CREATE TABLE `tbl_employees` (
  `employee_ID` int(11) NOT NULL,
  `employee_name` varchar(30) NOT NULL,
  `employee_designation` varchar(50) NOT NULL,
  `employee_image` text NOT NULL,
  `employee_description` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_orderdetail`
--

CREATE TABLE `tbl_orderdetail` (
  `order_detail_ID` int(11) NOT NULL,
  `order_detail_quantity` int(11) NOT NULL,
  `fk_order_ID` int(11) NOT NULL,
  `fk_product_ID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_orderdetail`
--

INSERT INTO `tbl_orderdetail` (`order_detail_ID`, `order_detail_quantity`, `fk_order_ID`, `fk_product_ID`) VALUES
(1, 1, 1, 25),
(2, 1, 2, 25),
(3, 1, 3, 27),
(4, 1, 4, 25),
(5, 1, 4, 26),
(6, 1, 4, 27),
(7, 1, 4, 28),
(8, 1, 4, 29),
(9, 1, 4, 30),
(10, 1, 4, 31),
(11, 1, 4, 32),
(12, 1, 4, 33),
(13, 1, 4, 34),
(14, 1, 4, 35),
(15, 1, 4, 36),
(16, 1, 4, 37),
(17, 1, 4, 38);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_orders`
--

CREATE TABLE `tbl_orders` (
  `order_ID` int(11) NOT NULL,
  `order_date` date NOT NULL,
  `order_vat` double NOT NULL,
  `order_additionalCharges` double NOT NULL,
  `order_invoice_no` varchar(45) NOT NULL,
  `fk_client_ID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_orders`
--

INSERT INTO `tbl_orders` (`order_ID`, `order_date`, `order_vat`, `order_additionalCharges`, `order_invoice_no`, `fk_client_ID`) VALUES
(1, '2021-01-25', 0, 0, '233', 25),
(2, '2021-01-25', 0, 0, '11', 25),
(3, '2021-01-26', 0, 123, '123', 29),
(4, '2021-01-26', 0, 10, '124', 29);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_products`
--

CREATE TABLE `tbl_products` (
  `product_ID` int(11) NOT NULL,
  `product_name_en` varchar(50) NOT NULL,
  `product_name_ar` varchar(50) NOT NULL,
  `product_description_en` text NOT NULL,
  `product_description_ar` text NOT NULL,
  `product_image` text NOT NULL,
  `product_unit_price` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_products`
--

INSERT INTO `tbl_products` (`product_ID`, `product_name_en`, `product_name_ar`, `product_description_en`, `product_description_ar`, `product_image`, `product_unit_price`) VALUES
(25, 'Smoke Detector', '', 'Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat', '', 'productImages/1570374906-1964-smokeDetector.jpg', 100),
(26, 'Sprinkler', '', 'Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat', '', 'productImages/1570374919-7876-sprinkler.jpg', 300),
(27, 'Safety Vest', '', 'Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat', '', 'productImages/1570374976-9608-vest.jpg', 500),
(28, 'Safety Shoes', '', 'Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat', '', 'productImages/1570375008-7206-safetyShoe.jpg', 800),
(29, 'Fire Hose Cabinet', '', 'Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat', '', 'productImages/1570375039-1685-hoseCabinet.jpg', 350),
(30, 'Safety Helmet', '', 'Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat', '', 'productImages/1570375055-3789-helmet.jpg', 250),
(31, 'Fire Pump', '', 'Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat', '', 'productImages/1570375070-4409-firePump.jpg', 550),
(32, 'Fire Extinguisher', '', 'Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat', '', 'productImages/1570375093-8292-fireEx.jpg', 600),
(33, 'Safety Cones', '', 'Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat', '', 'productImages/1570375118-8676-cone.jpg', 300),
(34, 'Break Glass', '', 'Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat', '', 'productImages/1570375135-2019-breakGlass.jpg', 650),
(35, 'Safety Blanket', '', 'Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat', '', 'productImages/1570375151-2133-blanket.jpg', 700),
(36, 'Safety Barrier', '', 'Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat', '', 'productImages/1570375170-8493-barrier.jpg', 150),
(37, 'Fire Alarm Control Panel', '', 'Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat', '', 'productImages/1570375191-4969-alarmCp.jpg', 200),
(38, 'Fire Alarm Bell', 'kdsf sldf lsdkf', 'Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat', 'lksjdfl lkjsdf lksdf lskjdf', 'productImages/1610976100-1921-alarmBell.jpg', 1000);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_projects`
--

CREATE TABLE `tbl_projects` (
  `project_ID` int(11) NOT NULL,
  `project_name` text NOT NULL,
  `project_description` text NOT NULL,
  `project_total_amount` int(11) NOT NULL,
  `project_consumption` int(11) NOT NULL,
  `project_date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tbl_achievements`
--
ALTER TABLE `tbl_achievements`
  ADD PRIMARY KEY (`achievement_ID`);

--
-- Indexes for table `tbl_admin`
--
ALTER TABLE `tbl_admin`
  ADD PRIMARY KEY (`admin_ID`);

--
-- Indexes for table `tbl_clients`
--
ALTER TABLE `tbl_clients`
  ADD PRIMARY KEY (`client_ID`);

--
-- Indexes for table `tbl_employees`
--
ALTER TABLE `tbl_employees`
  ADD PRIMARY KEY (`employee_ID`);

--
-- Indexes for table `tbl_orderdetail`
--
ALTER TABLE `tbl_orderdetail`
  ADD PRIMARY KEY (`order_detail_ID`);

--
-- Indexes for table `tbl_orders`
--
ALTER TABLE `tbl_orders`
  ADD PRIMARY KEY (`order_ID`);

--
-- Indexes for table `tbl_products`
--
ALTER TABLE `tbl_products`
  ADD PRIMARY KEY (`product_ID`);

--
-- Indexes for table `tbl_projects`
--
ALTER TABLE `tbl_projects`
  ADD PRIMARY KEY (`project_ID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tbl_achievements`
--
ALTER TABLE `tbl_achievements`
  MODIFY `achievement_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `tbl_admin`
--
ALTER TABLE `tbl_admin`
  MODIFY `admin_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `tbl_clients`
--
ALTER TABLE `tbl_clients`
  MODIFY `client_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;

--
-- AUTO_INCREMENT for table `tbl_employees`
--
ALTER TABLE `tbl_employees`
  MODIFY `employee_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `tbl_orderdetail`
--
ALTER TABLE `tbl_orderdetail`
  MODIFY `order_detail_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT for table `tbl_orders`
--
ALTER TABLE `tbl_orders`
  MODIFY `order_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `tbl_products`
--
ALTER TABLE `tbl_products`
  MODIFY `product_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=39;

--
-- AUTO_INCREMENT for table `tbl_projects`
--
ALTER TABLE `tbl_projects`
  MODIFY `project_ID` int(11) NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
