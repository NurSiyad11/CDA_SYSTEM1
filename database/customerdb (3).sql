-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 16, 2023 at 06:28 PM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 8.1.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `customerdb`
--

-- --------------------------------------------------------

--
-- Table structure for table `account`
--

CREATE TABLE `account` (
  `id` int(11) NOT NULL,
  `Acc_name` varchar(50) NOT NULL,
  `Acc_no` bigint(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `account`
--

INSERT INTO `account` (`id`, `Acc_name`, `Acc_no`) VALUES
(1, 'Evc Plus', 613231772),
(2, 'Salam Bank', 32506656),
(3, 'Amal Bank', 34652244521),
(4, 'Primier Bank', 3435652250),
(7, 'Dahabshiil Bank', 3544121544);

-- --------------------------------------------------------

--
-- Table structure for table `cash_payment`
--

CREATE TABLE `cash_payment` (
  `id` int(11) NOT NULL,
  `Acc_id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `PV` int(11) NOT NULL,
  `Amount` decimal(10,2) NOT NULL,
  `Date` varchar(50) NOT NULL,
  `Memo` varchar(200) NOT NULL,
  `Picture` varchar(200) NOT NULL,
  `Status` varchar(50) NOT NULL,
  `empty` varchar(50) NOT NULL,
  `D_PV` varchar(50) DEFAULT 'PV#',
  `RegDate` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `cash_payment`
--

INSERT INTO `cash_payment` (`id`, `Acc_id`, `name`, `PV`, `Amount`, `Date`, `Memo`, `Picture`, `Status`, `empty`, `D_PV`, `RegDate`) VALUES
(54, 1, 'Salary Exp', 1109, '10.00', '2022-09-01', 'Salary Exp', '', '', '', 'PV#', '2022-09-22 10:30:40'),
(55, 2, 'Electrical And water Exp', 1110, '23.00', '2022-09-02', 'Expense', '', '', '', 'PV#', '2022-09-22 10:43:00'),
(56, 2, 'Rent Exp', 1111, '40.00', '2022-09-02', 'Rent', '', '', '', 'PV#', '2022-09-22 10:44:29'),
(58, 1, 'Farax', 12415, '500.00', '2023-02-07', 'ok', '', '', '', 'PV#', '2023-02-07 18:13:01'),
(59, 1, 'ghhghgh', 2420, '100.00', '2023-02-09', 'ghgj', '', '', '', 'PV#', '2023-02-08 05:41:51');

-- --------------------------------------------------------

--
-- Table structure for table `cash_receipt`
--

CREATE TABLE `cash_receipt` (
  `id` int(11) NOT NULL,
  `Acc_id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `RV` int(11) NOT NULL,
  `Date` varchar(50) NOT NULL,
  `Amount` decimal(10,2) NOT NULL,
  `Memo` varchar(200) NOT NULL,
  `Picture` varchar(200) NOT NULL,
  `Status` varchar(50) NOT NULL,
  `empty` varchar(50) NOT NULL,
  `D_RV` varchar(50) NOT NULL DEFAULT 'RV#',
  `RegDate` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `cash_receipt`
--

INSERT INTO `cash_receipt` (`id`, `Acc_id`, `name`, `RV`, `Date`, `Amount`, `Memo`, `Picture`, `Status`, `empty`, `D_RV`, `RegDate`) VALUES
(28, 1, 'BGB ', 0, '2022-08-31', '2500.00', 'BGB From Bank', '', '', '', 'RV#', '2022-09-22 10:24:27'),
(29, 2, 'Transfer From Bank', 0, '2022-09-01', '100.00', 'frm bnk', '', '', '', 'RV#', '2022-09-22 10:26:54'),
(30, 1, 'Al-Naciim ', 6352, '2022-09-03', '250.65', 'AR', '', '', '', 'RV#', '2022-09-22 10:28:14'),
(32, 1, 'Farax', 12556, '2023-02-07', '10.00', 'ok', '', '', '', 'RV#', '2023-02-07 14:58:43'),
(33, 3, 'Maxamed', 2343, '2023-02-09', '3000.00', 'ok', '', '', '', 'RV#', '2023-02-09 11:45:13');

-- --------------------------------------------------------

--
-- Table structure for table `debt_reminder`
--

CREATE TABLE `debt_reminder` (
  `id` int(11) NOT NULL,
  `Cid` int(11) NOT NULL,
  `Date` varchar(20) NOT NULL,
  `Update_date` varchar(20) NOT NULL,
  `Message` varchar(255) NOT NULL,
  `Memo` varchar(200) NOT NULL,
  `Status` varchar(50) NOT NULL,
  `RegDate` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `debt_reminder`
--

INSERT INTO `debt_reminder` (`id`, `Cid`, `Date`, `Update_date`, `Message`, `Memo`, `Status`, `RegDate`) VALUES
(2, 5, '2023-02-15', '0', 'Xasuusin. Asc Geedi Ahmed  , Haraaga xisaabta deynta laguugu leeyahay waa $ 650.65 Wixii faahfaahin ah kala xiriir 2323232\r\n                                                    ', '', 'Show', '2023-02-15 13:34:17'),
(3, 4, '2023-02-14', '2023-02-16 10:51:26 ', 'Xasuusin. Asc Ali Ahmed A/qadir  , Haraaga xisaabta deynta laguugu leeyahay waa $ 300.00 Wixii faahfaahin ah kala xiriir 232323200\r\n                                                     \r\n                                                 \r\n                 ', 'okey bbbb    ', 'Hide', '2023-02-15 14:29:30'),
(4, 4, '2023-02-16', '2023-02-16 10:59:27 ', 'Xasuusin. Asc Ali Ahmed A/qadir  , Haraaga xisaabta deynta laguugu leeyahay waa $ 500.00 Wixii faahfaahin ah kala xiriir 2323232\r\n                                                     \r\n                                                 \r\n                   ', 'fadalan iska clean karee adoo mahadsan   ', 'Show', '2023-02-16 07:39:25');

-- --------------------------------------------------------

--
-- Table structure for table `invoice`
--

CREATE TABLE `invoice` (
  `id` int(11) NOT NULL,
  `Cid` int(11) NOT NULL,
  `Date` varchar(50) NOT NULL,
  `invoice` int(11) NOT NULL,
  `Amount` decimal(10,2) NOT NULL,
  `Memo` varchar(200) NOT NULL,
  `File` varchar(2000) NOT NULL DEFAULT 'No File Found',
  `Status` varchar(50) NOT NULL,
  `empty` varchar(50) NOT NULL,
  `D_INV` varchar(50) NOT NULL DEFAULT 'INV#',
  `RegDate` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `invoice`
--

INSERT INTO `invoice` (`id`, `Cid`, `Date`, `invoice`, `Amount`, `Memo`, `File`, `Status`, `empty`, `D_INV`, `RegDate`) VALUES
(65, 1, '2022-11-27', 1010, '200.00', 'invoice', 'CDA Management System.pdf', 'Approved', '', 'INV#', '2022-11-28 07:54:28'),
(66, 3, '2022-11-28', 1011, '300.00', 'invoice', 'DeskApp - Bootstrap Admin Dashboard HTML Template.pdf', 'Rejected', '', 'INV#', '2022-11-28 07:54:54'),
(67, 4, '2022-11-27', 1012, '400.00', 'invoice', 'CDA Management System.pdf', 'Approved', '', 'INV#', '2022-11-28 07:55:30'),
(68, 3, '2022-11-29', 333, '500.00', 'invoice', 'CDA Management System.pdf', 'Pending', '', 'INV#', '2022-11-28 12:18:39'),
(69, 5, '2022-11-28', 22233, '650.65', 'invoice', 'CDA Management System.pdf', 'Pending', '', 'INV#', '2022-11-28 12:23:53'),
(70, 1, '2022-12-01', 11122, '600.00', 'gggg', '', 'Approved', '', 'INV#', '2022-12-01 09:58:11'),
(71, 1, '2023-01-15', 799, '100.00', 'ufhjm', 'palgrave.dbm.3240248.pdf', 'Pending', '', 'INV#', '2023-01-16 12:38:54'),
(72, 1, '2023-02-08', 11220, '1200.00', '', 'co-creation-final_version.pdf', 'Reject', '', 'INV#', '2023-02-07 08:29:55'),
(73, 4, '2023-02-07', 122, '300.00', 'ok', '10222856.png', 'Pending', '', 'INV#', '2023-02-07 08:32:42');

-- --------------------------------------------------------

--
-- Stand-in structure for view `invoice_receipt`
-- (See below for the actual view)
--
CREATE TABLE `invoice_receipt` (
`id` int(11)
,`Cid` int(20)
,`D_INV` varchar(50)
,`invoice` int(11)
,`File` varchar(2000)
,`Date` varchar(50)
,`Memo` varchar(200)
,`Amount` varchar(50)
,`empty` varchar(50)
,`Status` varchar(50)
);

-- --------------------------------------------------------

--
-- Table structure for table `receipt`
--

CREATE TABLE `receipt` (
  `id` int(11) NOT NULL,
  `Cid` int(20) NOT NULL,
  `Date` varchar(50) NOT NULL,
  `RV` int(11) NOT NULL,
  `Amount` decimal(10,2) NOT NULL,
  `Memo` varchar(200) NOT NULL,
  `Status` varchar(50) NOT NULL,
  `File` varchar(200) NOT NULL,
  `empty` varchar(50) NOT NULL,
  `D_RV` varchar(50) NOT NULL DEFAULT 'RV#',
  `RegDate` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `receipt`
--

INSERT INTO `receipt` (`id`, `Cid`, `Date`, `RV`, `Amount`, `Memo`, `Status`, `File`, `empty`, `D_RV`, `RegDate`) VALUES
(32, 1, '2022-11-28', 5360, '500.00', 'Receipt', 'Pending', 'CDA Management System.pdf', '', 'RV#', '2022-11-28 07:59:01'),
(33, 3, '2022-11-28', 5361, '100.00', 'receipt', 'Pending', 'DeskApp - Bootstrap Admin Dashboard HTML Template.pdf', '', 'RV#', '2022-11-28 07:59:41'),
(34, 4, '2022-11-28', 5362, '200.00', 'Receipt', 'Rejected', 'CDA Management System.pdf', '', 'RV#', '2022-11-28 08:00:28'),
(35, 4, '2022-11-29', 111, '200.00', 'receipt', 'Pending', '18-188243_business-wallpaper-group-data-src-full-656727-consulting.jpg', '', 'RV#', '2022-11-28 12:54:32'),
(36, 1, '2023-01-16', 990, '200.00', 'RV', 'Approved', 'mpdf.pdf', '', 'RV#', '2023-01-16 13:24:23'),
(37, 1, '2023-02-08', 12566, '400.00', 'RV1', 'Pending', 'JMM AA.pdf', '', 'RV#', '2023-02-07 09:15:46');

-- --------------------------------------------------------

--
-- Table structure for table `support`
--

CREATE TABLE `support` (
  `id` int(11) NOT NULL,
  `Cid` int(11) NOT NULL,
  `Admin_id` int(11) NOT NULL,
  `Message` varchar(255) NOT NULL,
  `Reply` varchar(255) NOT NULL,
  `Time_user` varchar(30) NOT NULL,
  `Time_admin` varchar(30) NOT NULL,
  `Status` varchar(50) NOT NULL,
  `RegDate` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `support`
--

INSERT INTO `support` (`id`, `Cid`, `Admin_id`, `Message`, `Reply`, `Time_user`, `Time_admin`, `Status`, `RegDate`) VALUES
(4, 10, 2, '', 'yes diyrin okfb jkdfkjc kldc lkc lknck ', '', '', 'Hide', '2022-09-07 10:16:38'),
(10, 8, 2, '', 'wa la saxay xisabtada  ee iska hubi ', '', '', 'Show', '2022-09-16 13:27:54'),
(11, 8, 2, '', 'Thanks to send ', '', '', 'Show', '2022-09-22 12:18:12'),
(12, 3, 2, '', 'okey', '', '2023-02-16-Thu - 07:42:16 pm', 'Show', '2022-10-27 14:30:05'),
(13, 1, 2, '', '', '', '', '', '2022-12-05 03:50:35'),
(18, 1, 2, 'senbl', '', 'Thu - 06:51:21 pm', '', 'Pending', '2023-02-16 15:51:21');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_order`
--

CREATE TABLE `tbl_order` (
  `id` int(11) NOT NULL,
  `Cid` int(20) NOT NULL,
  `Date` varchar(50) NOT NULL,
  `Reason` varchar(200) NOT NULL,
  `RegDate` timestamp NOT NULL DEFAULT current_timestamp(),
  `Status` varchar(50) NOT NULL,
  `File` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_order`
--

INSERT INTO `tbl_order` (`id`, `Cid`, `Date`, `Reason`, `RegDate`, `Status`, `File`) VALUES
(47, 1, '02-03-2022', 'bfmbdnfbdmbfd', '2022-12-01 07:11:03', 'Approved', 'ap.pdf'),
(48, 1, '2022-12-01', 'fhdf', '2022-12-01 07:24:15', 'Reject', 'CDA Management System (3).pdf'),
(49, 1, '2022-12-01', 'jhg', '2022-12-01 08:04:39', 'Preparing', 'CDA Management System (3).pdf'),
(50, 1, '2023-01-01', 'Dalab Diyaarin', '2022-12-01 08:05:17', 'Reject', 'dollar.png'),
(52, 1, '2023-02-12', 'ok.', '2023-02-12 08:37:18', 'Pending', 'playerofcode.pdf'),
(53, 1, '2023-02-12', 'ok.', '2023-02-12 08:37:19', 'Pending', 'assets_-L9shwSMiocGHpSKcbss_-MID2KejkqTDd0poJbGN_-MID39mWxC-nvaAVfHHH_DFD.webp'),
(54, 1, '2023-02-11', 'dlb', '2023-02-12 09:48:35', 'Pending', 'JMM AA.pdf'),
(55, 4, '2023-02-13', 'Dalab', '2023-02-12 15:03:03', 'Pending', 'assets_-L9shwSMiocGHpSKcbss_-MID2KejkqTDd0poJbGN_-MID39mWxC-nvaAVfHHH_DFD.webp');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `ID` int(11) NOT NULL,
  `Name` varchar(50) NOT NULL,
  `Com_name` varchar(50) NOT NULL,
  `Email` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `Phone` int(11) NOT NULL,
  `Role` varchar(10) NOT NULL,
  `Status` varchar(10) NOT NULL,
  `Address` varchar(50) NOT NULL,
  `Picture` varchar(200) NOT NULL,
  `Login_time` varchar(50) NOT NULL,
  `Login_status` varchar(50) NOT NULL,
  `Reg_date` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`ID`, `Name`, `Com_name`, `Email`, `password`, `Phone`, `Role`, `Status`, `Address`, `Picture`, `Login_time`, `Login_status`, `Reg_date`) VALUES
(1, 'Farax Ali Mohamed', 'Testing Company', 'test@cda.com', '1234', 1231231, 'Customer', 'Active', 'Madiina', 'user3.jpg', 'Thu-16-02-2023 06:13:37 am', '1676568541', '2022-11-24 12:09:33'),
(2, 'Nur Siyad Abdi', 'Al-Marwa General Trading Com', 'nur@cda.com', '1234', 613231772, 'Admin', 'Active', 'Madina', 'profile-pic (8).png', 'Thu-16-02-2023 09:49:11 am', '1676546176', '2022-11-24 14:07:47'),
(3, 'Maxamed Farax Xasan', 'mjjd Company', 'lllll@cda.com', '1234', 61222, 'Customer', 'Inactive', 'wadajir', '', '', '0', '2022-11-24 15:22:59'),
(4, 'Ali Ahmed A/qadir', 'Ali Company', 'ali@cda.com', '1234', 666, 'Customer', 'Active', 'Wadajir', 'user4.jpg', 'Thu-16-02-2023 06:13:53 am', '1676562122', '2022-11-27 10:26:53'),
(5, 'Geedi Ahmed', 'Yes Company', 'gedi@cda.com', '1234', 6112, 'Customer', 'Active', 'Kaaraan ', '', 'Wed-15-02-2023 05:12:29 pm', '1676483765', '2022-11-28 12:22:20'),
(6, 'Ahmed Ali Kaahiye', 'Ahmed General Company', 'ahmed@cda.com', '1234', 333333, 'Vendor', 'Active', 'Howlwadag', '', '', '0', '2022-11-30 03:46:17'),
(7, 'Hashim Muqtar Ali', 'Hashim Gen Company', 'hashim@cda.com', '1234', 1234567, 'Vendor', 'Active', 'wadajir', '', '', '1669988405', '2022-11-30 05:56:07'),
(8, 'ggggggg', 'ggggggg', 'gg@cda.com', '1234', 6555, 'Admin', 'Active', 'kkkk', '', '03-12-2022 08:19:50 am', '1670045757', '2022-12-02 11:07:32'),
(10, 'Manager', 'Al-Mgfsdv hsgf hhmb', 'Manager@cda.com', '1234', 77777, 'HOD', 'Active', 'wadajir', '', '', '', '2022-12-23 04:30:39'),
(11, 'd', 'e', 'ee@re', '', -4656, 'HOD', 'Active', 'd', '', '', '', '2023-02-06 15:30:43'),
(12, 'Farax', 'hasan Comapany', 'hasan@cda.com', '1234', 54, 'Customer', 'Active', 'l', '', '', '', '2023-02-06 15:48:51'),
(13, 'muqtar', 'muqtar Gen company', 'muqtar@cda.com', '1234', 61465, 'Customer', 'Active', 'Wadajir', '', 'Thu-16-02-2023 06:12:33 am', '1676568483', '2023-02-13 13:00:18'),
(18, 'jamac', 'jamac Company', 'jaamac@cda.com', '1234', 2561, 'Customer', 'Active', 'kjuh', '', '', '', '2023-02-16 10:22:36');

-- --------------------------------------------------------

--
-- Table structure for table `ven_invoice`
--

CREATE TABLE `ven_invoice` (
  `id` int(11) NOT NULL,
  `Vid` int(11) NOT NULL,
  `Date` varchar(200) NOT NULL,
  `V_invoice` int(200) NOT NULL,
  `Amount` decimal(10,2) NOT NULL,
  `Memo` varchar(2000) NOT NULL,
  `D_INV` varchar(200) NOT NULL DEFAULT 'INV#',
  `empty` varchar(20) NOT NULL,
  `Reg_date` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `ven_invoice`
--

INSERT INTO `ven_invoice` (`id`, `Vid`, `Date`, `V_invoice`, `Amount`, `Memo`, `D_INV`, `empty`, `Reg_date`) VALUES
(1, 6, '2022-11-30', 222233, '300.00', 'yes hh', 'INV#', '', '2022-11-30 04:55:46'),
(3, 7, '2022-11-29', 11144, '500.00', 'yes', 'INV#', '', '2022-11-30 08:24:46'),
(4, 6, '2023-02-07', 22534, '500.65', 'invoice1', 'INV#', '', '2023-02-07 12:37:38');

-- --------------------------------------------------------

--
-- Table structure for table `ven_payment`
--

CREATE TABLE `ven_payment` (
  `id` int(11) NOT NULL,
  `Vid` int(11) NOT NULL,
  `Date` varchar(200) NOT NULL,
  `V_payment` int(200) NOT NULL,
  `Amount` decimal(10,2) NOT NULL,
  `Memo` varchar(2000) NOT NULL,
  `D_PV` varchar(20) NOT NULL DEFAULT 'PV#',
  `empty` varchar(200) NOT NULL,
  `Reg_date` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `ven_payment`
--

INSERT INTO `ven_payment` (`id`, `Vid`, `Date`, `V_payment`, `Amount`, `Memo`, `D_PV`, `empty`, `Reg_date`) VALUES
(3, 6, '2022-12-01', 0, '100.00', 'no uyyy', 'PV#', '', '2022-11-30 06:39:40'),
(4, 7, '2022-11-30', 111, '500.00', 'sfsf', 'PV#', '', '2022-11-30 06:40:49'),
(5, 6, '2023-02-07', 1262, '100.00', 'okey', 'PV#', '', '2023-02-07 12:44:15');

-- --------------------------------------------------------

--
-- Structure for view `invoice_receipt`
--
DROP TABLE IF EXISTS `invoice_receipt`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `invoice_receipt`  AS SELECT `invoice`.`id` AS `id`, `invoice`.`Cid` AS `Cid`, `invoice`.`D_INV` AS `D_INV`, `invoice`.`invoice` AS `invoice`, `invoice`.`File` AS `File`, `invoice`.`Date` AS `Date`, `invoice`.`Memo` AS `Memo`, `invoice`.`Amount` AS `Amount`, `invoice`.`empty` AS `empty`, `invoice`.`Status` AS `Status` FROM `invoice` union all select `receipt`.`id` AS `id`,`receipt`.`Cid` AS `Cid`,`receipt`.`D_RV` AS `D_RV`,`receipt`.`RV` AS `RV`,`receipt`.`File` AS `File`,`receipt`.`Date` AS `Date`,`receipt`.`Memo` AS `Memo`,`receipt`.`empty` AS `empty`,`receipt`.`Amount` AS `Amount`,`receipt`.`Status` AS `Status` from `receipt`  ;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `account`
--
ALTER TABLE `account`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `cash_payment`
--
ALTER TABLE `cash_payment`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_cash_payment_account` (`Acc_id`);

--
-- Indexes for table `cash_receipt`
--
ALTER TABLE `cash_receipt`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_cash_receipt_account` (`Acc_id`);

--
-- Indexes for table `debt_reminder`
--
ALTER TABLE `debt_reminder`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_debt_reminder_user` (`Cid`);

--
-- Indexes for table `invoice`
--
ALTER TABLE `invoice`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_invoice_user` (`Cid`);

--
-- Indexes for table `receipt`
--
ALTER TABLE `receipt`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_receipt_user` (`Cid`);

--
-- Indexes for table `support`
--
ALTER TABLE `support`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_support_user` (`Cid`),
  ADD KEY `fk_supportadmin_user` (`Admin_id`);

--
-- Indexes for table `tbl_order`
--
ALTER TABLE `tbl_order`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_tbl_order_user` (`Cid`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `ven_invoice`
--
ALTER TABLE `ven_invoice`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_ven_invoice_user` (`Vid`);

--
-- Indexes for table `ven_payment`
--
ALTER TABLE `ven_payment`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_ven_payment_user` (`Vid`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `account`
--
ALTER TABLE `account`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `cash_payment`
--
ALTER TABLE `cash_payment`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=60;

--
-- AUTO_INCREMENT for table `cash_receipt`
--
ALTER TABLE `cash_receipt`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;

--
-- AUTO_INCREMENT for table `debt_reminder`
--
ALTER TABLE `debt_reminder`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `invoice`
--
ALTER TABLE `invoice`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=74;

--
-- AUTO_INCREMENT for table `receipt`
--
ALTER TABLE `receipt`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=38;

--
-- AUTO_INCREMENT for table `support`
--
ALTER TABLE `support`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `tbl_order`
--
ALTER TABLE `tbl_order`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=56;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `ven_invoice`
--
ALTER TABLE `ven_invoice`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `ven_payment`
--
ALTER TABLE `ven_payment`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `cash_payment`
--
ALTER TABLE `cash_payment`
  ADD CONSTRAINT `fk_cash_payment_account` FOREIGN KEY (`Acc_id`) REFERENCES `account` (`id`);

--
-- Constraints for table `cash_receipt`
--
ALTER TABLE `cash_receipt`
  ADD CONSTRAINT `fk_cash_receipt_account` FOREIGN KEY (`Acc_id`) REFERENCES `account` (`id`);

--
-- Constraints for table `debt_reminder`
--
ALTER TABLE `debt_reminder`
  ADD CONSTRAINT `fk_debt_reminder_user` FOREIGN KEY (`Cid`) REFERENCES `user` (`ID`);

--
-- Constraints for table `invoice`
--
ALTER TABLE `invoice`
  ADD CONSTRAINT `fk_invoice_user` FOREIGN KEY (`Cid`) REFERENCES `user` (`ID`);

--
-- Constraints for table `receipt`
--
ALTER TABLE `receipt`
  ADD CONSTRAINT `fk_receipt_user` FOREIGN KEY (`Cid`) REFERENCES `user` (`ID`);

--
-- Constraints for table `support`
--
ALTER TABLE `support`
  ADD CONSTRAINT `fk_support_user` FOREIGN KEY (`Cid`) REFERENCES `user` (`ID`),
  ADD CONSTRAINT `fk_supportadmin_user` FOREIGN KEY (`Admin_id`) REFERENCES `user` (`ID`);

--
-- Constraints for table `tbl_order`
--
ALTER TABLE `tbl_order`
  ADD CONSTRAINT `fk_tbl_order_user` FOREIGN KEY (`Cid`) REFERENCES `user` (`ID`);

--
-- Constraints for table `ven_invoice`
--
ALTER TABLE `ven_invoice`
  ADD CONSTRAINT `fk_ven_invoice_user` FOREIGN KEY (`Vid`) REFERENCES `user` (`ID`);

--
-- Constraints for table `ven_payment`
--
ALTER TABLE `ven_payment`
  ADD CONSTRAINT `fk_ven_payment_user` FOREIGN KEY (`Vid`) REFERENCES `user` (`ID`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
