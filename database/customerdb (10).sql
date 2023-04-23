-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 23, 2023 at 02:48 PM
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
(4, 'Premier Bank', 3435652250),
(7, 'Dahabshiil Bank', 3544121544),
(8, 'Test', 315255);

-- --------------------------------------------------------

--
-- Table structure for table `apply_form`
--

CREATE TABLE `apply_form` (
  `id` int(11) NOT NULL,
  `Name` varchar(50) NOT NULL,
  `Company_name` varchar(50) NOT NULL,
  `Email` varchar(30) NOT NULL,
  `Phone` bigint(20) NOT NULL,
  `Address` varchar(50) NOT NULL,
  `Memo` varchar(2000) NOT NULL,
  `Status` varchar(10) NOT NULL,
  `Send_email` int(1) NOT NULL,
  `RegDate` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `apply_form`
--

INSERT INTO `apply_form` (`id`, `Name`, `Company_name`, `Email`, `Phone`, `Address`, `Memo`, `Status`, `Send_email`, `RegDate`) VALUES
(1, 'Maxamed', 'Comapany Name', 'test@gmail.com', 0, 'fhgg', '', '2', 0, '2023-03-26 11:59:50'),
(2, 'Ali', 'maxamed Company', 'maxamed@gmail.com', 0, 'madiina', '', '0', 0, '2023-03-26 12:12:53'),
(3, 'Xasan', 'maxamed Company', 'maxamed@gmail.com', 0, 'madiina', 'thanks', '0', 0, '2023-03-26 12:13:37'),
(4, 'maxamed', 'maxamed Company', 'maxamed@gmail.com', 0, 'madiina', 'ok o', '2', 1, '2023-03-26 12:14:02'),
(5, 'hhh', 'fdfdsf', 'dfdsfdsfds', 5454, 'dsfdsf', '', '3', 0, '2023-03-26 12:27:48'),
(6, 'ghj', 'ffdgf', 'fgh', 24154, 'dfdsf', '', '1', 0, '2023-03-26 12:30:00'),
(7, 'Farax', 'Farax Compay', 'farax@cda.com', 61200000, 'Hodan', '', '1', 0, '2023-04-01 12:18:43'),
(8, 'Ahmed Ali Xassan', 'Ahmed Gen Co', 'ahmed@gmail.com', 61323232, 'Wadajir', '', '0', 0, '2023-04-01 12:31:34'),
(9, 'test', 'test', 'tt@cda.com', 65656, 'ttt', '', '0', 0, '2023-04-01 12:35:18'),
(10, 'nur', 'nur@cda.com', 'nur@cda.com', 5454, 'jfbhgbf', '', '1', 0, '2023-04-01 12:37:06'),
(11, 'Farax Cali', 'Farax Company', 'faraxcali1289@gmail.com', 613231772, 'Madiina', 'okey', '2', 1, '2023-04-01 13:00:52'),
(12, 'Cabdinur', 'Cabdinur Company', 'cabdinur789@gmail.com', 612729414, 'dharkenley', 'Okey', '2', 1, '2023-04-01 13:31:06');

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
  `empty` int(11) NOT NULL,
  `D_PV` varchar(50) DEFAULT 'PV#',
  `RegDate` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `cash_payment`
--

INSERT INTO `cash_payment` (`id`, `Acc_id`, `name`, `PV`, `Amount`, `Date`, `Memo`, `Picture`, `Status`, `empty`, `D_PV`, `RegDate`) VALUES
(54, 1, 'Salary Exp', 1109, '10.00', '2022-09-01', 'Salary Exp', '', '', 0, 'PV#', '2022-09-22 10:30:40'),
(55, 2, 'Electrical And water Exp', 1110, '23.00', '2022-09-02', 'Expense', '', '', 0, 'PV#', '2022-09-22 10:43:00'),
(56, 2, 'Rent Exp', 1111, '40.00', '2022-09-02', 'Rent', '', '', 0, 'PV#', '2022-09-22 10:44:29'),
(58, 1, 'Farax', 12415, '500.00', '2023-02-07', 'ok', '', '', 0, 'PV#', '2023-02-07 18:13:01'),
(59, 1, 'ghhghgh', 2420, '100.00', '2023-02-09', 'ghgj', '', '', 0, 'PV#', '2023-02-08 05:41:51'),
(60, 1, 'Exp', 1214, '50.00', '2023-03-12', 'Exp', '', '', 0, 'PV#', '2023-03-12 06:59:41'),
(61, 3, 'Transfer Found', 1003, '1000.00', '2023-04-21', 'Transfer From Amal Bank To Slm Bank', '', '', 0, 'PV#', '2023-04-21 13:03:38');

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
  `empty` int(11) NOT NULL,
  `D_RV` varchar(50) NOT NULL DEFAULT 'RV#',
  `RegDate` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `cash_receipt`
--

INSERT INTO `cash_receipt` (`id`, `Acc_id`, `name`, `RV`, `Date`, `Amount`, `Memo`, `empty`, `D_RV`, `RegDate`) VALUES
(28, 1, 'BGB ', 0, '2022-08-31', '2500.00', 'BGB From Bank', 0, 'RV#', '2022-09-22 10:24:27'),
(29, 2, 'Transfer From Bank', 0, '2022-09-01', '100.00', 'frm bnk', 0, 'RV#', '2022-09-22 10:26:54'),
(30, 1, 'Al-Naciim ', 6352, '2022-09-03', '250.65', 'AR', 0, 'RV#', '2022-09-22 10:28:14'),
(32, 1, 'Farax', 12556, '2023-02-07', '10.00', 'ok', 0, 'RV#', '2023-02-07 14:58:43'),
(33, 3, 'Maxamed', 2343, '2023-02-09', '3000.00', 'ok', 0, 'RV#', '2023-02-09 11:45:13'),
(34, 7, 'From Bank Slm Bank', 125541, '2023-03-05', '1200.00', 'K/wareejinn', 0, 'RV#', '2023-02-19 07:35:17'),
(35, 2, 'Transfer Found', 1020, '2023-04-21', '1000.00', 'From Amal Bank', 0, 'RV#', '2023-04-21 13:04:38');

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
(4, 4, '2023-02-16', '2023-02-26 04:05:58 ', 'Xasuusin. Asc Ali Ahmed A/qadir  , Haraaga xisaabta deynta laguugu leeyahay waa $ 500.00 Wixii faahfaahin ah kala xiriir 232323', 'fadalan iska clean karee adoo mahadsan    ', 'Show', '2023-02-16 07:39:25'),
(5, 24, '2023-03-13', '2023-03-12 10:15:31 ', 'Xasuusin. Asc Saciid Ahmed  , Haraaga xisaabta deynta laguugu leeyahay waa $ 700.00 , sida uku dhawsiyaha badan ugu bixi lacahtaas Wixii faahfaahin ah kala xiriir 613231772 \r\n                                                 \r\n                             ', '  ', 'Show', '2023-03-12 07:07:20'),
(6, 22, '2023-04-20', '', 'Xasuusin. Asc Maxamed Xassan Cali  , Haraaga xisaabta deynta laguugu leeyahay waa $ 27,338.68 Wixii faahfaahin ah kala xiriir 2323232', 'mahadsanid.', 'Show', '2023-04-20 06:45:13');

-- --------------------------------------------------------

--
-- Table structure for table `faq`
--

CREATE TABLE `faq` (
  `id` int(11) NOT NULL,
  `Aid` int(11) NOT NULL,
  `Question` varchar(255) NOT NULL,
  `Description` varchar(5000) NOT NULL,
  `Video` varchar(255) NOT NULL,
  `Order_no` int(11) NOT NULL,
  `RedDate` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `faq`
--

INSERT INTO `faq` (`id`, `Aid`, `Question`, `Description`, `Video`, `Order_no`, `RedDate`) VALUES
(1, 2, 'How ejkjk', 'cjkhhhhhhhhhhhhh jk,hcx,', 'm38O12p1_BY', 2, '2023-03-09 05:48:14'),
(2, 2, 'How can I send an order ?', 'Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid. 3 wolf moon officia aute, non cupidatat skateboard dolor brunch. Food truck quinoa nesciunt laborum eiusmod. Brunch 3 wolf moon tempor, sunt aliqua put a bird on it squid single-origin coffee nulla assumenda shoreditch et. Nihil anim keffiyeh helvetica, craft beer labore wes anderson cred nesciunt sapiente ea proident. Ad vegan excepteur butcher vice lomo. Leggings occaecat craft beer farm-to-table, raw denim aesthetic synth nesciunt you probably haven\'t heard of them accusamus labore sustainable VHS.\n', '838-iHZUyXQ', 1, '2023-03-09 05:56:59'),
(3, 0, 'fgvv', 'xdc', 'dg', 3, '2023-03-09 14:33:27'),
(4, 0, 'Hoehnbc hbf ?', 'vghgvjhghgjvjhxjchxvgjxgjxgjxk\r\nhjgv1\r\n1fghfg2fgjkhf\r\n3fgjhbf\r\n.uhiudh\r\nkj', 'jhdfjkdf', 4, '2023-03-12 07:29:12');

-- --------------------------------------------------------

--
-- Table structure for table `invoice`
--

CREATE TABLE `invoice` (
  `id` int(11) NOT NULL,
  `Admin_id` int(11) NOT NULL,
  `Cid` int(11) NOT NULL,
  `Date` date NOT NULL,
  `invoice` int(11) NOT NULL,
  `Amount` decimal(10,2) NOT NULL,
  `Memo` varchar(200) NOT NULL,
  `File` varchar(255) NOT NULL DEFAULT 'No File Found',
  `Status` varchar(50) NOT NULL,
  `empty` int(11) NOT NULL,
  `D_INV` varchar(50) NOT NULL DEFAULT 'INV#',
  `RegDate` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `invoice`
--

INSERT INTO `invoice` (`id`, `Admin_id`, `Cid`, `Date`, `invoice`, `Amount`, `Memo`, `File`, `Status`, `empty`, `D_INV`, `RegDate`) VALUES
(65, 2, 25, '2022-11-27', 1010, '200.00', 'invoice', 'CDA Management System.pdf', 'Approved', 0, 'INV#', '2022-11-28 07:54:28'),
(66, 2, 3, '2022-11-28', 1011, '300.00', 'invoice', 'DeskApp - Bootstrap Admin Dashboard HTML Template.pdf', 'Rejected', 0, 'INV#', '2022-11-28 07:54:54'),
(67, 2, 4, '2022-11-27', 1012, '400.00', 'invoice', 'CDA Management System.pdf', 'Approved', 0, 'INV#', '2022-11-28 07:55:30'),
(68, 2, 3, '2022-11-29', 333, '500.00', 'invoice', 'CDA Management System.pdf', 'Pending', 0, 'INV#', '2022-11-28 12:18:39'),
(69, 2, 5, '2022-11-28', 22233, '650.65', 'invoice', 'CDA Management System.pdf', 'Pending', 0, 'INV#', '2022-11-28 12:23:53'),
(70, 2, 25, '2022-12-01', 11122, '600.00', 'gggg', '', 'Approved', 0, 'INV#', '2022-12-01 09:58:11'),
(71, 2, 25, '2023-01-15', 799, '100.00', 'ufhjm', 'palgrave.dbm.3240248.pdf', 'Pending', 0, 'INV#', '2023-01-16 12:38:54'),
(72, 2, 25, '2023-03-01', 11220, '1200.00', 'ok', '185.27.134.10 _ sql204.byetcluster.com _ epiz_33614320_Customer_DB _ phpMyAdmin 4.9.0.1.pdf', 'Rejected', 0, 'INV#', '2023-02-07 08:29:55'),
(73, 2, 4, '2023-02-07', 122, '300.00', 'okey waye hada           \r\n                                                 \r\n                                                 \r\n                                                ', 'Ahmed _bisafi_statement_Feb-13-2023_07-38.pdf', 'Rejected', 0, 'INV#', '2023-02-07 08:32:42'),
(74, 2, 22, '2022-04-02', 5914, '2866.44', 'invoice \r\n                                                ', 'inv_5914.pdf', 'Approved', 0, 'INV#', '2023-02-28 12:43:12'),
(75, 2, 22, '2022-04-02', 5915, '4057.30', 'invoice \r\n                                                ', 'inv_5915.pdf', 'Approved', 0, 'INV#', '2023-02-28 12:43:57'),
(76, 2, 22, '2022-07-21', 11075, '866.00', 'invoice', 'inv_11075 .pdf', 'Pending', 0, 'INV#', '2023-02-28 12:44:58'),
(77, 2, 22, '2022-03-31', 0, '29548.94', 'BGB \r\n                                                ', 'BGB .pdf', 'Approved', 0, 'INV#', '2023-02-28 12:58:14'),
(78, 2, 4, '2023-03-02', 12452, '200.00', 'invoice', '273.pdf', 'Pending', 0, 'INV#', '2023-03-02 14:30:43'),
(79, 2, 25, '2023-03-05', 6564, '300.00', '', '185.27.134.10 _ sql204.byetcluster.com _ epiz_33614320_Customer_DB _ phpMyAdmin 4.9.0.1.pdf', 'Pending', 0, 'INV#', '2023-03-05 05:02:40'),
(80, 1, 24, '2023-03-12', 121214, '1200.00', 'invoice \r\n                                       \r\n                                                ', 'Pick a Plan.pdf', 'Approved', 0, 'INV#', '2023-03-12 06:41:13'),
(81, 1, 26, '2023-03-23', 0, '1250.00', 'BGB', 'BGB .pdf', 'Pending', 0, 'INV#', '2023-03-23 12:28:25'),
(82, 8, 26, '2023-04-12', 646, '200.00', 'invoice', '4_5818740260040872700.pdf', 'Pending', 0, 'INV#', '2023-04-12 13:23:51');

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
,`File` varchar(255)
,`Date` date
,`Memo` varchar(200)
,`Amount` decimal(12,2)
,`empty` decimal(12,2)
,`Status` varchar(50)
);

-- --------------------------------------------------------

--
-- Table structure for table `receipt`
--

CREATE TABLE `receipt` (
  `id` int(11) NOT NULL,
  `Admin_id` int(11) NOT NULL,
  `Cid` int(20) NOT NULL,
  `Date` date NOT NULL,
  `RV` int(11) NOT NULL,
  `Amount` decimal(10,2) NOT NULL,
  `Memo` varchar(200) NOT NULL,
  `Status` varchar(50) NOT NULL,
  `File` varchar(255) NOT NULL DEFAULT 'No File Found',
  `empty` int(11) NOT NULL,
  `D_RV` varchar(50) NOT NULL DEFAULT 'RV#',
  `RegDate` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `receipt`
--

INSERT INTO `receipt` (`id`, `Admin_id`, `Cid`, `Date`, `RV`, `Amount`, `Memo`, `Status`, `File`, `empty`, `D_RV`, `RegDate`) VALUES
(32, 2, 25, '2022-11-28', 5360, '500.00', 'Receipt', 'Approved', 'CDA Management System.pdf', 0, 'RV#', '2022-11-28 07:59:01'),
(33, 2, 3, '2022-11-28', 5361, '100.00', 'receipt', 'Approved', 'DeskApp - Bootstrap Admin Dashboard HTML Template.pdf', 0, 'RV#', '2022-11-28 07:59:41'),
(34, 2, 4, '2022-11-28', 5362, '200.00', 'Receipt', 'Rejected', 'CDA Management System.pdf', 0, 'RV#', '2022-11-28 08:00:28'),
(35, 2, 4, '2022-11-29', 111, '200.00', 'receipt', 'Pending', '18-188243_business-wallpaper-group-data-src-full-656727-consulting.jpg', 0, 'RV#', '2022-11-28 12:54:32'),
(36, 2, 25, '2023-01-16', 990, '200.00', 'RV', 'Pending', 'mpdf.pdf', 0, 'RV#', '2023-01-16 13:24:23'),
(37, 2, 25, '2023-02-08', 12566, '400.00', 'RV1', 'Pending', 'Ahmed _bisafi_statement_Feb-13-2023_07-38.pdf', 0, 'RV#', '2023-02-07 09:15:46'),
(39, 2, 24, '2023-03-12', 555, '500.00', 'Receipt', 'Approved', 'RV_6377 .pdf', 0, 'RV#', '2023-03-12 06:49:26'),
(70, 2, 22, '2022-04-02', 6377, '10000.00', 'Receipt', 'Pending', 'RV_6377 .pdf', 0, 'RV#', '2023-02-28 13:00:11'),
(78, 2, 26, '2023-03-23', 1266, '100.00', 'Receipt', 'Pending', 'RV_6377 .pdf', 0, 'RV#', '2023-03-23 13:16:23'),
(79, 1, 26, '2023-03-23', 13421, '200.00', 'Receipt', 'Pending', 'No File Found', 0, 'RV#', '2023-03-23 13:20:41');

-- --------------------------------------------------------

--
-- Table structure for table `setting`
--

CREATE TABLE `setting` (
  `id` int(11) NOT NULL,
  `Company_name` varchar(50) NOT NULL,
  `Address` varchar(30) NOT NULL,
  `Email` varchar(20) NOT NULL,
  `Tell` int(11) NOT NULL,
  `Phone` int(11) NOT NULL,
  `Logo` varchar(50) NOT NULL,
  `RegDate` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `setting`
--

INSERT INTO `setting` (`id`, `Company_name`, `Address`, `Email`, `Tell`, `Phone`, `Logo`, `RegDate`) VALUES
(1, 'New General Trading Company', 'Muqdisho, Banaadir', 'Company@gmail.com', 620000, 613000000, 'logo1-02.png', '2023-03-16 16:13:45');

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
(4, 3, 2, '', 'yes diyrin okfb jkdfkjc kldc lkc lknck ', '0000-00-00 00:00:00', '2023-03-03-Fri - 07:37:10 am', 'Hide', '2022-09-07 10:16:38'),
(10, 8, 2, '', 'wa la saxay xisabtada  ee iska hubi ', '0000-00-00 00:00:00', '2023-02-18 00:00:00', 'Show', '2022-09-16 13:27:54'),
(11, 8, 2, '', 'Thanks to send ', '0000-00-00 00:00:00', '2023-03-10-Fri - 04:16:54 pm', 'Show', '2022-09-22 12:18:12'),
(12, 3, 2, '', 'okey', '0000-00-00 00:00:00', '2023-02-16 00:00:00', 'Show', '2022-10-27 14:30:05'),
(13, 25, 2, '', 'th', '0000-00-00 00:00:00', '2023-03-13-Mon - 08:49:09 am', 'Show', '2022-12-05 03:50:35'),
(18, 25, 2, 'senbl', 'ok', '0000-00-00 00:00:00', '2023-03-13-Mon - 08:48:45 am', 'Show', '2023-02-16 15:51:21'),
(19, 4, 2, 'hello', 'xfhbf', '2023-02-17 00:00:00', '2023-03-03-Fri - 07:58:00 am', 'Show', '2023-02-17 16:57:56'),
(20, 24, 2, 'Asc', 'Wcs', '2023-03-12-Sun - 10:17:42 am', '2023-03-12-Sun - 10:18:35 am', 'Show', '2023-03-12 07:17:42'),
(21, 24, 2, 'questrion fhjkhfd', 'welcome jhjkfg', '2023-03-12-Sun - 10:19:13 am', '2023-03-13-Mon - 08:50:50 am', 'Hide', '2023-03-12 07:19:13'),
(22, 24, 1, 'ggg', 'ok', '2023-03-12-Sun - 06:14:10 pm', '2023-04-19-Wed - 02:16:41 pm', 'Show', '2023-03-12 15:14:10'),
(23, 24, 2, 'Huyydsttdsj  syukns djys jksh,mshiolHuyydsttdsj  syukns djys jksh,mshiol Huyydsttdsj  syukns djys jksh,mshiol', '', '2023-03-12-Sun - 06:36:10 pm', '', 'Pending', '2023-03-12 15:36:10'),
(24, 22, 2, 'Asc', '', '2023-03-19-Sun - 07:34:25 pm', '', 'Pending', '2023-03-19 16:34:25'),
(25, 21, 2, 'dfsdfd', '', '2023-03-30-Thu - 03:45:35 pm', '', 'Pending', '2023-03-30 11:45:35'),
(26, 25, 1, 'hello', 'hello', '2023-04-04-Tue - 08:53:28 pm', '2023-04-20-Thu - 11:08:09 am', 'Hide', '2023-04-04 16:53:28');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_order`
--

CREATE TABLE `tbl_order` (
  `id` int(11) NOT NULL,
  `Admin_id` int(11) NOT NULL,
  `Cid` int(11) NOT NULL,
  `Date` date NOT NULL,
  `Reason` varchar(200) NOT NULL,
  `RegDate` timestamp NOT NULL DEFAULT current_timestamp(),
  `Status` varchar(50) NOT NULL,
  `File` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_order`
--

INSERT INTO `tbl_order` (`id`, `Admin_id`, `Cid`, `Date`, `Reason`, `RegDate`, `Status`, `File`) VALUES
(47, 8, 25, '0000-00-00', 'bfmbdnfbdmbfd', '2022-12-01 07:11:03', 'Approved', 'ap.pdf'),
(48, 1, 25, '2022-12-01', 'fhdf', '2022-12-01 07:24:15', 'Reject', 'CDA Management System (3).pdf'),
(49, 1, 25, '2022-12-01', 'jhg', '2022-12-01 08:04:39', 'Preparing', 'CDA Management System (3).pdf'),
(50, 8, 25, '2023-01-01', 'Dalab Diyaarin', '2022-12-01 08:05:17', 'Reject', 'dollar.png'),
(52, 2, 25, '2023-02-12', 'ok.', '2023-02-12 08:37:18', 'Approved', 'playerofcode.pdf'),
(53, 1, 25, '2023-02-12', 'ok.', '2023-02-12 08:37:19', 'Pending', 'assets_-L9shwSMiocGHpSKcbss_-MID2KejkqTDd0poJbGN_-MID39mWxC-nvaAVfHHH_DFD.webp'),
(54, 1, 25, '2023-02-11', 'dlb', '2023-02-12 09:48:35', 'Pending', 'JMM AA.pdf'),
(55, 1, 4, '2023-02-14', 'Dalab oo', '2023-02-12 15:03:03', 'Preparing', '1411535.png'),
(56, 1, 4, '2023-02-15', 'dalab', '2023-02-18 11:09:06', 'Pending', 'palgrave.dbm.3240306 (2).pdf'),
(57, 1, 4, '2023-02-18', 'Dalab', '2023-02-18 13:37:28', 'Pending', 'playerofcode (3).pdf'),
(58, 1, 23, '2023-03-10', 'Order test', '2023-03-10 11:41:29', 'Pending', 'Dalab.pdf'),
(59, 1, 23, '2023-03-10', 'Dalabka labaad ', '2023-03-10 11:46:12', 'Preparing', 'Dalab 2.pdf'),
(60, 8, 25, '2023-04-19', 'Dalabkas So diyaari', '2023-04-19 10:20:17', 'Preparing', 'CDA Management System.pdf2.pdf');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `ID` int(11) NOT NULL,
  `Admin_id` int(11) NOT NULL,
  `Name` varchar(50) NOT NULL,
  `Com_name` varchar(50) NOT NULL,
  `Email` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `Pass_status` int(11) NOT NULL,
  `Phone` int(11) NOT NULL,
  `Role` varchar(20) NOT NULL,
  `Status` varchar(10) NOT NULL,
  `Address` varchar(50) NOT NULL,
  `Picture` varchar(200) NOT NULL,
  `otp` int(6) DEFAULT NULL,
  `otp_expiration` datetime DEFAULT NULL,
  `Login_time` varchar(50) NOT NULL,
  `Login_status` varchar(50) NOT NULL,
  `Reg_date` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`ID`, `Admin_id`, `Name`, `Com_name`, `Email`, `password`, `Pass_status`, `Phone`, `Role`, `Status`, `Address`, `Picture`, `otp`, `otp_expiration`, `Login_time`, `Login_status`, `Reg_date`) VALUES
(1, 1, 'Administrator', 'Test Administrator Com', 'A1@cda.com', '1234', 0, 610001, 'Administrator', 'Active', 'Madiina', '', 301693, '2023-04-06 15:59:00', 'Tue-28-03-2023 12:00:28 pm', '1682254145', '2022-11-24 12:09:33'),
(2, 1, 'Nur Siyad Abdi', 'Al-Marwa General Trading Com', 'nur@cda.com', '1234', 0, 613231772, 'Admin', 'Active', 'Madina', 'profile-pic (8).png', 962819, '2023-04-06 15:50:00', 'Sun-26-03-2023 09:37:00 pm', '1682254140', '2022-11-24 14:07:47'),
(3, 1, 'Maxamed Farax Xasan', 'mjjd Company', 'lllll@cda.com', '123456', 0, 61222, 'Customer', 'Inactive', 'wadajir', '', NULL, NULL, 'Wed-22-02-2023 08:51:14 am', '1677045208', '2022-11-24 15:22:59'),
(4, 1, 'Ali Ahmed A/qadir', 'Ali Company', 'ali@cda.com', '1234', 0, 666, 'Customer', 'Active', 'Wadajir', '1354944.png', 42299, '2023-03-31 19:28:00', 'Sat-18-02-2023 11:29:01 am', '1681929253', '2022-11-27 10:26:53'),
(5, 1, 'Geedi Ahmed', 'Yes Company', 'gedi@cda.com', '1234', 0, 6112, 'Customer', 'Active', 'Kaaraan ', '', NULL, NULL, 'Wed-15-02-2023 05:12:29 pm', '1676483765', '2022-11-28 12:22:20'),
(6, 1, 'Ahmed Ali Kaahiye', 'Ahmed General Company', 'ahmed@cda.com', '1234', 0, 333333, 'Vendor', 'Active', 'Howlwadag', '', NULL, NULL, '', '0', '2022-11-30 03:46:17'),
(7, 1, 'Hashim Muqtar Ali', 'Hashim Gen Company', 'hashim@cda.com', '1234', 0, 1234567, 'Vendor', 'Active', 'wadajir', '', NULL, NULL, '', '1681975205', '2022-11-30 05:56:07'),
(8, 1, 'ggggggg', 'ggggggg', 'gg@cda.com', '1234', 0, 6555, 'Admin', 'Active', 'Wadajir', '', NULL, NULL, 'Tue-21-03-2023 09:33:12 am', '1682254145', '2022-12-02 11:07:32'),
(10, 1, 'Manager', 'Al-xikma GenTrading Co.', 'Manager@cda.com', '1234', 0, 77777, 'HOD', 'Active', 'wadajir', 'user.png', 842145, '2023-03-30 13:48:00', 'Tue-21-03-2023 08:55:24 am', '1681287342', '2022-12-23 04:30:39'),
(11, 1, 'da', 'eee', 'ee@reaaaaaa', '1234', 0, 11111, 'HOD', 'Active', 'dddd', '', NULL, NULL, '', '', '2023-02-06 15:30:43'),
(13, 1, 'muqtar', 'muqtar Gen company', 'muqtar@cda.com', '1234', 0, 61465, 'Customer', 'Inactive', 'Wadajir', '', NULL, NULL, 'Thu-16-02-2023 06:12:33 am', '1676568992', '2023-02-13 13:00:18'),
(18, 1, 'jamac', 'jamac Company', 'jaamac@cda.com', '1234', 0, 2561, 'Customer', 'Active', 'kjuh', '', NULL, NULL, '', '', '2023-02-16 10:22:36'),
(19, 1, 'qadar', 'qadar Company', 'qadar@cda.com', '1234', 0, 65626, 'Customer', 'Active', 'ok', '', NULL, NULL, '', '', '2023-02-18 18:10:16'),
(20, 1, 'asad', 'asad Company', 'asad@cda.com', '1234', 0, 2147483647, 'Customer', 'Active', 'wadajir', '1425812.png', NULL, NULL, 'Sat-18-02-2023 09:22:34 pm', '1676744789', '2023-02-18 18:16:47'),
(21, 1, 'zaka', 'zaka Comapany', 'zaka@cda.com', '1234', 0, 656, 'Customer', 'Active', 'hgfh', '8349206.png', 966783, '2023-03-30 13:52:00', 'Thu-23-02-2023 07:15:27 am', '1680202213', '2023-02-18 18:20:31'),
(22, 1, 'Maxamed Xassan Cali', 'AL-Madiina Pharma Bosaso', 'al-madiina@cda.com', '1234', 0, 6120000, 'Customer', 'Active', 'Bosaso', '', 317116, '2023-03-31 07:44:00', 'Mon-20-03-2023 06:41:13 am', '1682245148', '2023-02-28 12:36:25'),
(23, 1, 'Customer Name', 'Company Name', 'customer@cda.com', '1234', 0, 61220, 'Customer', 'Active', 'None', '', NULL, NULL, 'Sun-26-03-2023 01:07:26 pm', '1680721039', '2023-03-10 11:31:01'),
(24, 1, 'Saciid Ahmed', 'Saciid Company', 'saciid@cda.com', '1234', 0, 66666666, 'Customer', 'Inactive', 'Kaxda', '', NULL, NULL, 'Mon-13-03-2023 08:26:09 am', '1678685253', '2023-03-12 06:33:21'),
(25, 1, 'Farax Ali Mohamed', 'Testing Company', 'test@cda.com', '1234', 0, 610024, 'Customer', 'Active', 'Muqdisho', '', 956845, '2023-04-23 12:19:00', 'Tue-28-03-2023 12:45:41 pm', '1682245649', '2023-03-21 15:56:37'),
(26, 2, 'red', 'red Gen Com', 'red@cda.com', '1234', 0, 610021, 'Customer', 'Active', 'madiina', '', NULL, NULL, 'Thu-23-03-2023 03:29:02 pm', '1679574744', '2023-03-23 06:52:32'),
(28, 1, 'Farax Cali', 'farax Cali Company', 'faraxcali1289@gmail.com', '12345', 1, 612729414, 'Customer', 'Active', 'madiina', '', NULL, NULL, '', '1682187975', '2023-04-21 13:30:55');

-- --------------------------------------------------------

--
-- Table structure for table `user_info`
--

CREATE TABLE `user_info` (
  `id` int(11) NOT NULL,
  `UID` int(11) NOT NULL,
  `Device` varchar(50) NOT NULL,
  `OS` varchar(50) NOT NULL,
  `Browser` varchar(50) NOT NULL,
  `Login_time` varchar(50) NOT NULL,
  `Login_status` varchar(50) NOT NULL,
  `RegDate` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user_info`
--

INSERT INTO `user_info` (`id`, `UID`, `Device`, `OS`, `Browser`, `Login_time`, `Login_status`, `RegDate`) VALUES
(1, 2, 'Computer', 'Windows 10', 'Chrome', '', '', '2023-03-26 18:05:43'),
(2, 1, 'Computer', 'Windows 10', 'Chrome', '', '', '2023-03-26 18:05:43'),
(3, 1, 'Computer', 'Windows 10', 'Chrome', '', '', '2023-03-26 18:05:43'),
(4, 25, 'Computer', 'Windows 10', 'Firefox', '', '', '2023-03-26 18:05:43'),
(5, 2, 'Computer', 'Windows 10', 'Chrome', '', '', '2023-03-26 18:05:43'),
(6, 25, 'Computer', 'Windows 10', 'Firefox', '', '', '2023-03-26 19:10:28'),
(7, 1, 'Computer', 'Windows 10', 'Chrome', '', '', '2023-03-27 06:33:18'),
(8, 1, 'Computer', 'Windows 10', 'Chrome', '', '', '2023-03-28 08:00:28'),
(9, 2, 'Computer', 'Windows 10', 'Chrome', 'Tue-28-03-2023 12:33:24 pm', '1679994204', '2023-03-28 08:33:24'),
(10, 25, 'Computer', 'Windows 10', 'Chrome', '', '', '2023-03-28 08:45:41'),
(11, 25, 'Computer', 'Windows 10', 'Chrome', 'Tue-28-03-2023 12:49:41 pm', '1679995181', '2023-03-28 08:49:41'),
(12, 1, 'Computer', 'Windows 10', 'Chrome', 'Thu-30-03-2023 12:37:57 pm', '1680167277', '2023-03-30 08:37:57'),
(13, 1, 'Computer', 'Windows 10', 'Chrome', 'Thu-30-03-2023 12:50:19 pm', '1680168019', '2023-03-30 08:50:19'),
(14, 25, 'Computer', 'Windows 10', 'Chrome', 'Thu-30-03-2023 02:03:42 pm', '1680172422', '2023-03-30 10:03:42'),
(15, 25, 'Computer', 'Windows 10', 'Chrome', 'Thu-30-03-2023 02:06:46 pm', '1680172606', '2023-03-30 10:06:46'),
(16, 1, 'Computer', 'Windows 10', 'Chrome', 'Thu-30-03-2023 02:11:14 pm', '1680172874', '2023-03-30 10:11:14'),
(17, 8, 'Computer', 'Windows 10', 'Chrome', 'Thu-30-03-2023 03:20:42 pm', '1680177042', '2023-03-30 11:20:42'),
(18, 25, 'Computer', 'Windows 10', 'Chrome', 'Thu-30-03-2023 03:28:11 pm', '1680177491', '2023-03-30 11:28:11'),
(19, 21, 'Computer', 'Windows 10', 'Chrome', 'Thu-30-03-2023 03:50:36 pm', '1680178836', '2023-03-30 11:50:36'),
(20, 25, 'Computer', 'Windows 10', 'Chrome', 'Thu-30-03-2023 03:51:15 pm', '1680178875', '2023-03-30 11:51:15'),
(21, 2, 'Computer', 'Windows 10', 'Chrome', 'Thu-30-03-2023 06:06:53 pm', '1680187013', '2023-03-30 14:06:53'),
(22, 2, 'Computer', 'Windows 10', 'Chrome', 'Thu-30-03-2023 09:06:34 pm', '1680197794', '2023-03-30 17:06:34'),
(23, 2, 'Computer', 'Windows 10', 'Chrome', 'Fri-31-03-2023 09:32:08 pm', '1680285728', '2023-03-31 17:32:08'),
(24, 1, 'Computer', 'Windows 10', 'Chrome', 'Sat-01-04-2023 04:19:20 pm', '1680353360', '2023-04-01 12:19:20'),
(25, 22, 'Computer', 'Windows 10', 'Chrome', 'Tue-04-04-2023 04:10:01 pm', '1680612001', '2023-04-04 12:10:01'),
(26, 25, 'Computer', 'Windows 10', 'Chrome', 'Tue-04-04-2023 05:29:05 pm', '1680616745', '2023-04-04 13:29:05'),
(27, 22, 'Computer', 'Windows 10', 'Chrome', 'Tue-04-04-2023 05:50:55 pm', '1680618055', '2023-04-04 13:50:55'),
(28, 10, 'Computer', 'Windows 10', 'Chrome', 'Tue-04-04-2023 05:56:30 pm', '1680618390', '2023-04-04 13:56:30'),
(29, 10, 'Computer', 'Windows 10', 'Chrome', 'Sun-23-04-2023 02:03:13 pm', '1682245993', '2023-04-23 10:03:13');

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
(4, 7, '2022-11-30', 111, '200.00', 'sfsf', 'PV#', '', '2022-11-30 06:40:49'),
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
-- Indexes for table `apply_form`
--
ALTER TABLE `apply_form`
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
-- Indexes for table `faq`
--
ALTER TABLE `faq`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `Order_no` (`Order_no`);

--
-- Indexes for table `invoice`
--
ALTER TABLE `invoice`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_invoice_user` (`Cid`),
  ADD KEY `fk_Admin_id_invoice_user` (`Admin_id`);

--
-- Indexes for table `receipt`
--
ALTER TABLE `receipt`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `RV` (`RV`),
  ADD KEY `fk_receipt_user` (`Cid`);

--
-- Indexes for table `setting`
--
ALTER TABLE `setting`
  ADD PRIMARY KEY (`id`);

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
  ADD KEY `fk_tbl_order_user` (`Cid`),
  ADD KEY `fk_Admin_id_tbl_order_to_user` (`Admin_id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`ID`),
  ADD UNIQUE KEY `Com_name` (`Com_name`),
  ADD UNIQUE KEY `Email` (`Email`),
  ADD KEY `Admin_id` (`Admin_id`);

--
-- Indexes for table `user_info`
--
ALTER TABLE `user_info`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_user_info_user` (`UID`);

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `apply_form`
--
ALTER TABLE `apply_form`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `cash_payment`
--
ALTER TABLE `cash_payment`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=62;

--
-- AUTO_INCREMENT for table `cash_receipt`
--
ALTER TABLE `cash_receipt`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;

--
-- AUTO_INCREMENT for table `debt_reminder`
--
ALTER TABLE `debt_reminder`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `faq`
--
ALTER TABLE `faq`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `invoice`
--
ALTER TABLE `invoice`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=83;

--
-- AUTO_INCREMENT for table `receipt`
--
ALTER TABLE `receipt`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=80;

--
-- AUTO_INCREMENT for table `setting`
--
ALTER TABLE `setting`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `support`
--
ALTER TABLE `support`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT for table `tbl_order`
--
ALTER TABLE `tbl_order`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=61;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT for table `user_info`
--
ALTER TABLE `user_info`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

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
  ADD CONSTRAINT `fk_Admin_id_invoice_user` FOREIGN KEY (`Admin_id`) REFERENCES `user` (`ID`),
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
  ADD CONSTRAINT `fk_Admin_id_tbl_order_to_user` FOREIGN KEY (`Admin_id`) REFERENCES `user` (`ID`),
  ADD CONSTRAINT `fk_tbl_order_user` FOREIGN KEY (`Cid`) REFERENCES `user` (`ID`);

--
-- Constraints for table `user`
--
ALTER TABLE `user`
  ADD CONSTRAINT `user_ibfk_1` FOREIGN KEY (`Admin_id`) REFERENCES `user` (`ID`);

--
-- Constraints for table `user_info`
--
ALTER TABLE `user_info`
  ADD CONSTRAINT `fk_user_info_user` FOREIGN KEY (`UID`) REFERENCES `user` (`ID`);

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
