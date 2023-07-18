-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 18, 2023 at 07:02 PM
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
  `Admin_id` int(11) NOT NULL,
  `Acc_name` varchar(50) NOT NULL,
  `Acc_no` bigint(20) NOT NULL,
  `RegDate` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `account`
--

INSERT INTO `account` (`id`, `Admin_id`, `Acc_name`, `Acc_no`, `RegDate`) VALUES
(1, 1, 'Evc Plus', 613231772, '2023-05-09 16:09:29'),
(2, 1, 'Salaam Somali  Bank', 32506656, '2023-05-09 16:09:29'),
(3, 1, 'Amal Bank', 34652244521, '2023-05-09 16:09:29'),
(4, 2, 'Premier Bank', 3435652250, '2023-05-09 16:09:29'),
(7, 2, 'Dahabshiil Bank', 3544121544, '2023-05-09 16:09:29'),
(8, 1, 'Test', 315255, '2023-05-09 16:09:29'),
(10, 2, 'Test2', 13445, '2023-05-09 16:09:29'),
(11, 1, 'test3', 66330, '2023-06-11 12:20:03'),
(13, 1, 'test4', 654564, '2023-06-26 16:11:12'),
(15, 1, 'tes6', 6545, '2023-06-26 16:45:24'),
(16, 1, 'Salam Bank Manager', 343563331555, '2023-07-13 13:44:40');

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
  `Tell` int(11) NOT NULL,
  `Address` varchar(50) NOT NULL,
  `Memo` varchar(5000) DEFAULT NULL,
  `Status` int(1) NOT NULL,
  `Send_email` int(1) NOT NULL,
  `RegDate` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `apply_form`
--

INSERT INTO `apply_form` (`id`, `Name`, `Company_name`, `Email`, `Phone`, `Tell`, `Address`, `Memo`, `Status`, `Send_email`, `RegDate`) VALUES
(1, 'Maxamed', 'Comapany Name', 'test@gmail.com', 0, 0, 'fhgg', NULL, 2, 0, '2023-03-26 11:59:50'),
(2, 'Ali', 'maxamed Company', 'maxamed@gmail.com', 0, 0, 'madiina', '', 0, 0, '2023-03-26 12:12:53'),
(3, 'Xasan', 'maxamed Company', 'maxamed@gmail.com', 0, 0, 'madiina', 'thanks', 0, 0, '2023-03-26 12:13:37'),
(4, 'maxamed', 'maxamed Company', 'maxamed@gmail.com', 0, 0, 'madiina', 'ok o', 2, 1, '2023-03-26 12:14:02'),
(5, 'hhh', 'fdfdsf', 'dfdsfdsfds', 5454, 0, 'dsfdsf', '', 3, 0, '2023-03-26 12:27:48'),
(7, 'Farax', 'Farax Compay', 'farax@cda.com', 61200000, 0, 'Hodan', '', 1, 0, '2023-04-01 12:18:43'),
(8, 'Ahmed Ali Xassan', 'Ahmed Gen Co', 'ahmed@gmail.com', 61323232, 0, 'Wadajir', '', 0, 0, '2023-04-01 12:31:34'),
(9, 'test', 'test', 'tt@cda.com', 65656, 0, 'ttt', '', 0, 0, '2023-04-01 12:35:18'),
(10, 'nur', 'nur@cda.com', 'nur@cda.com', 5454, 0, 'jfbhgbf', '', 1, 0, '2023-04-01 12:37:06'),
(11, 'Farax Cali', 'Farax Company', 'faraxcali1289@gmail.com', 613231772, 0, 'Madiina', 'okey', 2, 1, '2023-04-01 13:00:52'),
(12, 'Cabdinur', 'Cabdinur Company', 'cabdinur789@gmail.com', 612729414, 0, 'dharkenley', 'Okey', 2, 1, '2023-04-01 13:31:06'),
(13, 'Nur Ali ali', 'companynnnn', 'cccc@cda.com', 1525, 6100, 'hodan', '', 0, 0, '2023-04-24 07:50:44'),
(15, 'nur Siyad Abdi 123 fs', 'sd', 'sd@cda.com', 564, 45, '654', 'waa la hubiyay lakn xog saxan ma ahan ', 3, 0, '2023-04-25 06:22:31'),
(17, 'Ahmed cali  isaaq', 'ahmed com', 'ahmed@cda.com', 655655, 612222, 'jhhgj', 'okey', 2, 0, '2023-05-03 06:34:53'),
(18, 'farax Ali Ahmed', 'farax co', 'varax@cda.com', 454564, 66666, 'dsfsg', 'ok1', 1, 0, '2023-05-17 05:53:12'),
(19, 'xasan cali  ahmed', 'xassan company', 'xasan@cda.com', 2454, 6146546, 'ceelasha', '', 0, 0, '2023-06-27 05:19:18');

-- --------------------------------------------------------

--
-- Table structure for table `cash_payment`
--

CREATE TABLE `cash_payment` (
  `id` int(11) NOT NULL,
  `Admin_id` int(11) NOT NULL,
  `Acc_id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `PV` int(11) NOT NULL,
  `Amount` decimal(10,2) NOT NULL,
  `Date` varchar(50) NOT NULL,
  `Memo` varchar(5000) DEFAULT NULL,
  `empty` int(11) NOT NULL,
  `D_PV` varchar(50) DEFAULT 'PV#',
  `RegDate` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `cash_payment`
--

INSERT INTO `cash_payment` (`id`, `Admin_id`, `Acc_id`, `name`, `PV`, `Amount`, `Date`, `Memo`, `empty`, `D_PV`, `RegDate`) VALUES
(54, 1, 1, 'Salary Exp', 1109, '10.00', '2022-09-01', 'Salary Exp', 0, 'PV#', '2022-09-22 10:30:40'),
(55, 2, 2, 'Electrical And water Exp', 1110, '23.00', '2022-09-02', 'Expense', 0, 'PV#', '2022-09-22 10:43:00'),
(56, 1, 2, 'Rent Exp', 1111, '40.00', '2022-09-02', 'Rent', 0, 'PV#', '2022-09-22 10:44:29'),
(58, 2, 1, 'Farax', 12415, '500.00', '2023-02-07', 'ok', 0, 'PV#', '2023-02-07 18:13:01'),
(59, 1, 1, 'ghhghgh', 2420, '100.00', '2023-02-09', 'ghgj', 0, 'PV#', '2023-02-08 05:41:51'),
(60, 1, 1, 'Exp', 1214, '50.00', '2023-03-12', 'Exp', 0, 'PV#', '2023-03-12 06:59:41'),
(61, 1, 3, 'Transfer Found', 1003, '1000.00', '2023-04-21', 'Transfer From Amal Bank To Slm Bank', 0, 'PV#', '2023-04-21 13:03:38'),
(62, 2, 3, 'test', 5647, '150.00', '2023-05-04', 'PV', 0, 'PV#', '2023-05-04 08:16:10'),
(63, 1, 7, 'Transfer Found', 1545456, '1200.00', '2023-06-20', 'lacag laga warejinyo test loo warejinaayo Amal Bank', 0, 'PV#', '2023-06-20 06:50:05'),
(64, 2, 3, 'Vendor', 5456, '2150.00', '2023-06-26', 'PV', 0, 'PV#', '2023-06-26 08:58:18'),
(65, 1, 8, 'Cali ', 546, '200.00', '2023-06-26', 'PV', 0, 'PV#', '2023-06-26 15:59:02'),
(66, 1, 3, 'ahmed', 654, '50.00', '2023-06-27', 'PV', 0, 'PV#', '2023-06-27 04:32:57'),
(67, 1, 16, 'Ahmed General Company', 32, '100.00', '2022-01-12', 'PV Lasiiyay Vendor', 0, 'PV#', '2023-07-13 13:50:00');

-- --------------------------------------------------------

--
-- Table structure for table `cash_receipt`
--

CREATE TABLE `cash_receipt` (
  `id` int(11) NOT NULL,
  `Admin_id` int(11) NOT NULL,
  `Acc_id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `RV` int(11) NOT NULL,
  `Date` varchar(50) NOT NULL,
  `Amount` decimal(10,2) NOT NULL,
  `Memo` varchar(5000) DEFAULT NULL,
  `empty` int(11) NOT NULL,
  `D_RV` varchar(50) NOT NULL DEFAULT 'RV#',
  `RegDate` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `cash_receipt`
--

INSERT INTO `cash_receipt` (`id`, `Admin_id`, `Acc_id`, `name`, `RV`, `Date`, `Amount`, `Memo`, `empty`, `D_RV`, `RegDate`) VALUES
(28, 1, 1, 'BGB ', 65, '2022-08-31', '2500.00', 'BGB From Bank', 0, 'RV#', '2022-09-22 10:24:27'),
(29, 2, 2, 'Transfer From Bank', 54123, '2022-09-01', '100.00', 'frm bnk', 0, 'RV#', '2022-09-22 10:26:54'),
(30, 2, 1, 'Al-Naciim ', 6352, '2022-09-03', '250.65', 'AR', 0, 'RV#', '2022-09-22 10:28:14'),
(32, 1, 1, 'Farax', 12556, '2023-02-07', '10.00', 'ok', 0, 'RV#', '2023-02-07 14:58:43'),
(33, 1, 3, 'Maxamed', 2343, '2023-02-09', '3000.00', 'ok', 0, 'RV#', '2023-02-09 11:45:13'),
(34, 2, 7, 'From Bank Slm Bank', 125541, '2023-03-05', '1200.00', 'K/wareejinn', 0, 'RV#', '2023-02-19 07:35:17'),
(35, 2, 2, 'Transfer Found', 1020, '2023-04-21', '1000.00', 'From Amal Bank', 0, 'RV#', '2023-04-21 13:04:38'),
(36, 2, 1, 'Cash Customer', 656, '2023-05-04', '100.00', 'from ', 0, 'RV#', '2023-05-04 08:07:46'),
(37, 1, 8, 'test', 121, '2023-05-12', '200.00', 'RV', 0, 'RV#', '2023-05-12 08:54:31'),
(38, 1, 3, 'Nur Siyad Abdi', 1234, '2023-05-14', '100.00', 'dsf', 0, 'RV#', '2023-05-14 06:48:29'),
(39, 1, 3, 'Transfer Found', 154, '2023-06-20', '200.00', 'Lacag Ka timid Test Bank', 0, 'RV#', '2023-06-20 06:51:25'),
(40, 1, 3, 'Farax Cali', 56465, '2023-06-27', '100.00', 'RV', 0, 'RV#', '2023-06-27 04:31:31'),
(41, 1, 16, 'Ex-Hilaac Pharma', 6335, '2022-01-05', '112.00', 'RV', 0, 'RV#', '2023-07-13 13:45:29');

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
  `Memo` mediumtext NOT NULL,
  `Status` varchar(10) NOT NULL,
  `RegDate` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `debt_reminder`
--

INSERT INTO `debt_reminder` (`id`, `Cid`, `Date`, `Update_date`, `Message`, `Memo`, `Status`, `RegDate`) VALUES
(2, 5, '2023-07-04', '2023-07-04 05:52:59 ', 'Xasuusin. Al-Marwa Pharmacy (2) Kismayo  , Haraaga xisaabta deynta laguugu leeyahay waa $19,377.82 Wixii faahfaahin ah kala xiriir 2323232\r\n                                                     \r\n                                                 \r\n         ', '   ', 'Show', '2023-02-15 13:34:17'),
(3, 4, '2023-02-14', '2023-07-04 05:49:46 ', 'Xasuusin. Al-Marwa (4) Pharmacy (Saakow) , Haraaga xisaabta deynta laguugu leeyahay waa $ 300.00 Wixii faahfaahin ah kala xiriir 232323200\r\n                                                     \r\n                                                 \r\n         ', 'okey bbbb       ', 'Hide', '2023-02-15 14:29:30'),
(4, 4, '2023-02-16', '2023-07-04 05:51:11 ', 'Xasuusin. Al-Marwa (4) Pharmacy (Saakow)  , Haraaga xisaabta deynta laguugu leeyahay waa $ 6,258.55 Wixii faahfaahin ah kala xiriir 232323 \r\n                                                ', 'fadalan iska clean karee adoo mahadsan     ', 'Show', '2023-02-16 07:39:25'),
(5, 24, '2023-03-13', '2023-03-12 10:15:31 ', 'Xasuusin. Asc Saciid Ahmed  , Haraaga xisaabta deynta laguugu leeyahay waa $ 700.00 , sida uku dhawsiyaha badan ugu bixi lacahtaas Wixii faahfaahin ah kala xiriir 613231772 \r\n                                                 \r\n                             ', '  ', 'Show', '2023-03-12 07:07:20'),
(7, 25, '2023-05-17', '2023-06-18 12:28:45 ', 'Xasuusin. Asc Farax Ali Mohamed  , Haraaga xisaabta deynta laguugu leeyahay waa $ 1,300.00 Wixii faahfaahin ah kala xiriir 2323232\r\n                                                 \r\n                                                 \r\n                    \r', 'Fadalan Iska Niil Karee okey.    ', 'Hide', '2023-05-17 14:33:41'),
(8, 25, '2023-06-16', '2023-07-01 12:15:48 ', 'Xasuusin. Asc Farax Ali Mohamed  , Haraaga xisaabta deynta laguugu leeyahay waa $ 1,300.00  Wixii faahfaahin ah kala xiriir +252613231772\r\n                                                 \r\n                                                 \r\n             \r', 'okey    ', 'Show', '2023-06-16 14:17:16'),
(10, 25, '2023-07-01', '2023-07-01 12:15:13 ', 'Raali Galin. Asc Farax Ali Mohamed, waxaa laga rali galinayaa xisabta qaldaneyd ee aad horay u soo gudbisay lkn aan laguu xalinin. Haraaga xisaabta deynta hada  laguugu leeyahay waa $ 1,300.00  Wixii faahfaahin ah kala xiriir +252613231772 \r\n             ', 'raali galin Done ', 'Show', '2023-07-01 08:13:02');

-- --------------------------------------------------------

--
-- Table structure for table `faq`
--

CREATE TABLE `faq` (
  `id` int(11) NOT NULL,
  `Aid` int(11) NOT NULL,
  `Question` varchar(255) NOT NULL,
  `Description` mediumtext NOT NULL,
  `Video` varchar(255) NOT NULL,
  `RedDate` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `faq`
--

INSERT INTO `faq` (`id`, `Aid`, `Question`, `Description`, `Video`, `RedDate`) VALUES
(1, 1, 'How ejkjk', 'cjkhhhhhhhhhhhhh jk,hcx,', 'm38O12p1_BY', '2023-03-09 05:48:14'),
(2, 1, 'How can I send an order ?', 'Customers can send orders using a form available on our website. However, they must first prepare their orders by writing them out in Word or Excel, then converting them to PDFs. This helps to reduce the risk of errors and omissions and ensures that the necessary information is included and organized in a logical manner.\r\n\r\nTo send an order, follow these steps:\r\n\r\n   1: Prepare your order in a Word or Excel document using a standardized format or template.\r\n   2: Convert the order to a PDF to preserve the original format and make it easy for us to read and \r\n       understand.\r\n   3: Fill out the order form available on our System, including the date and a description of the order.\r\n   4: Attach the PDF file containing your order to the form.\r\n   5: Submit the form and wait for confirmation that your order has been received.\r\n\r\nIf you have any questions or concerns regarding the ordering process, please do not hesitate to contact our customer support team for assistance.\r\n', '838-iHZUyXQ', '2023-03-09 05:56:59'),
(3, 1, 'How can i use the support part ?', 'Customer support involves providing assistance and solutions to customers who have questions, concerns, or issues. To use customer support, follow these steps:\r\n\r\n  1: Identify the problem or issue you are experiencing.\r\n  2: Visit our website and look for the customer support section.\r\n  3: Send a message to customer support, providing as much information as possible about the problem or \r\n     issue you are experiencing. Be sure to include any relevant details, such as order numbers, product \r\n     names, and error messages.\r\n  4: Wait for a reply from customer support. Replies can be displayed through chat or email. \r\n  5: Follow any instructions provided by customer support to resolve the issue.\r\n\r\nIf you have any questions or concerns regarding customer support, please do not hesitate to contact us for assistance. Our support team is dedicated to providing the best possible support to our customers.', 'hdfjhdh', '2023-03-09 14:33:27'),
(4, 1, 'Hoehnbc hbf ?llhgj', 'kkk', ' iujkhkj', '2023-03-12 07:29:12');

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
  `Memo` varchar(5000) DEFAULT NULL,
  `File` varchar(255) NOT NULL DEFAULT 'No File Found',
  `Status` varchar(50) NOT NULL,
  `Reason` varchar(500) DEFAULT NULL,
  `empty` int(11) NOT NULL,
  `D_INV` varchar(50) NOT NULL DEFAULT 'INV#',
  `RegDate` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `invoice`
--

INSERT INTO `invoice` (`id`, `Admin_id`, `Cid`, `Date`, `invoice`, `Amount`, `Memo`, `File`, `Status`, `Reason`, `empty`, `D_INV`, `RegDate`) VALUES
(65, 2, 5, '2022-03-14', 5912, '1260.38', 'invoice', 'invoice_5912.pdf', 'Pending', NULL, 0, 'INV#', '2022-11-28 07:54:28'),
(66, 2, 5, '2022-03-12', 11061, '1210.00', 'invoice', 'invoice_11061.JPG', 'Rejected', NULL, 0, 'INV#', '2022-11-28 07:54:54'),
(67, 2, 4, '2021-12-31', 1, '1590.00', 'BGB', 'BGB_Al-marwa4sk.pdf', 'Pending', NULL, 0, 'INV#', '2022-11-28 07:55:30'),
(68, 2, 5, '2022-03-07', 11059, '4200.00', 'invoice', 'invoice_11059.JPG', 'Pending', NULL, 0, 'INV#', '2022-11-28 12:18:39'),
(69, 2, 5, '2022-02-28', 2, '2291.10', 'BGB', 'BGB_Al-marwa2k.pdf', 'Pending', NULL, 0, 'INV#', '2022-11-28 12:23:53'),
(70, 2, 5, '2022-03-30', 11067, '1042.50', 'invoice', 'invoice_11067.JPG', 'Pending', NULL, 0, 'INV#', '2022-12-01 09:58:11'),
(71, 2, 5, '2022-04-02', 5913, '4917.80', 'invoice\r\n                                                 \r\n                                                ', 'invoice_5913.pdf', 'Pending', NULL, 0, 'INV#', '2023-01-16 12:38:54'),
(72, 2, 5, '2022-04-09', 11068, '1496.04', 'Invoice\r\n                                           \r\n                                                 \r\n                                                 \r\n        ', 'invoice_11068.JPG', 'Pending', 'okey lkn soo hubi wa ku sugaa okey', 0, 'INV#', '2023-02-07 08:29:55'),
(73, 2, 4, '2022-02-14', 11054, '648.00', 'Invoice                                                \r\n                                                 \r\n                                                ', 'invoice 11054.JPG', 'Rejected', NULL, 0, 'INV#', '2023-02-07 08:32:42'),
(74, 2, 22, '2022-04-02', 5914, '2866.44', 'invoice \r\n                                                ', 'inv_5914.pdf', 'Approved', NULL, 0, 'INV#', '2023-02-28 12:43:12'),
(75, 2, 22, '2022-04-02', 5915, '4057.30', 'invoice \r\n                                                ', 'inv_5915.pdf', 'Approved', NULL, 0, 'INV#', '2023-02-28 12:43:57'),
(76, 2, 22, '2022-07-21', 11075, '866.00', 'invoice \r\n                                                ', 'inv_11075 .pdf', 'Pending', NULL, 0, 'INV#', '2023-02-28 12:44:58'),
(77, 2, 22, '2022-03-31', 5454, '29548.94', 'BGB \r\n                                                ', 'BGB_Al-Madiina.pdf', 'Approved', NULL, 0, 'INV#', '2023-02-28 12:58:14'),
(78, 2, 4, '2022-03-10', 11060, '1584.00', 'invoice', 'invoice_11060.JPG', 'Pending', NULL, 0, 'INV#', '2023-03-02 14:30:43'),
(79, 2, 5, '2022-04-09', 11069, '420.00', 'invoice', 'invoice_11069.JPG', 'Pending', '', 0, 'INV#', '2023-03-05 05:02:40'),
(80, 1, 24, '2023-03-03', 11079, '1200.00', 'invoice \r\n                                       \r\n                                                ', 'invoice_11079.JPG', 'Pending', NULL, 0, 'INV#', '2023-03-12 06:41:13'),
(81, 1, 5, '2022-03-02', 11057, '2540.00', 'invoice', 'invoice_11057.JPG', 'Pending', NULL, 0, 'INV#', '2023-03-23 12:28:25'),
(82, 8, 26, '2021-12-20', 11018, '112.80', 'invoice', 'invoice_11018.JPG', 'Pending', NULL, 0, 'INV#', '2023-04-12 13:23:51'),
(83, 1, 29, '2023-05-29', 11080, '13200.00', 'invoice \r\n                                                ', 'invoice_11080.JPG', 'Pending', NULL, 0, 'INV#', '2023-05-29 08:50:53'),
(86, 2, 32, '2023-06-24', 11078, '76000.00', 'invoice', 'invoice11078 .pdf', 'Approved', 'invoice khalad', 0, 'INV#', '2023-06-24 11:03:28'),
(87, 1, 23, '2022-09-22', 11076, '200.00', 'Invoice', 'invoice 11076.pdf', 'Pending', NULL, 0, 'INV#', '2023-06-28 16:03:21'),
(89, 1, 4, '2022-03-16', 11062, '596.00', 'Invoice', 'invoice_11062.JPG', 'Pending', NULL, 0, 'INV#', '2023-07-04 11:29:51'),
(90, 1, 4, '2022-03-26', 11065, '530.00', 'invoice', 'invoice_11065.JPG', 'Pending', NULL, 0, 'INV#', '2023-07-04 11:30:40'),
(91, 1, 4, '2022-06-06', 11073, '1303.50', 'invoice', 'invoice_11073.JPG', 'Pending', NULL, 0, 'INV#', '2023-07-04 11:38:34'),
(92, 1, 4, '2022-07-12', 11074, '88.85', 'invoice', 'invoice_11074.JPG', 'Pending', NULL, 0, 'INV#', '2023-07-04 11:39:28'),
(93, 1, 4, '2022-07-13', 110730, '7.04', 'invoice', 'invoice_110730.JPG', 'Pending', NULL, 0, 'INV#', '2023-07-04 11:41:19'),
(94, 1, 26, '2022-01-10', 11035, '89.30', 'invoice', 'invoice_11035.JPG', 'Pending', NULL, 0, 'INV#', '2023-07-04 15:51:41'),
(95, 1, 20, '2022-01-30', 4, '7978.73', 'BGB', 'BGB_yuusuf.pdf', 'Pending', NULL, 0, 'INV#', '2023-07-05 04:41:59'),
(96, 1, 20, '2022-02-05', 5898, '2423.78', 'invoice', 'invoice_5898.pdf', 'Pending', NULL, 0, 'INV#', '2023-07-05 04:43:07'),
(97, 1, 20, '2022-02-09', 11058, '310.00', 'invoice', 'invoice_11058.JPG', 'Pending', NULL, 0, 'INV#', '2023-07-05 04:43:58'),
(98, 1, 31, '2022-01-31', 5, '11941.45', 'BGB', 'BGB_horseed.pdf', 'Pending', NULL, 0, 'INV#', '2023-07-05 05:17:03'),
(99, 1, 31, '2022-02-19', 5903, '973.90', 'invoice', 'invoice_5903.JPG', 'Pending', NULL, 0, 'INV#', '2023-07-05 05:23:01'),
(100, 1, 31, '2022-02-19', 11055, '285.00', 'invoice', 'invoice_11055.JPG', 'Pending', NULL, 0, 'INV#', '2023-07-05 05:23:45'),
(101, 1, 3, '2023-06-12', 11077, '21500.00', 'invoice', 'invoice_11077.JPG', 'Pending', NULL, 0, 'INV#', '2023-07-05 06:41:52');

-- --------------------------------------------------------

--
-- Table structure for table `limit_customer_bal`
--

CREATE TABLE `limit_customer_bal` (
  `id` int(11) NOT NULL,
  `Cid` int(11) NOT NULL,
  `Admin_id` int(11) NOT NULL,
  `Limit_bal` decimal(10,2) NOT NULL,
  `Memo` varchar(255) NOT NULL,
  `RegDate` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `limit_customer_bal`
--

INSERT INTO `limit_customer_bal` (`id`, `Cid`, `Admin_id`, `Limit_bal`, `Memo`, `RegDate`) VALUES
(4, 3, 1, '20000.00', 'Limited', '2023-07-18 04:03:08');

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
  `Reason` varchar(500) DEFAULT NULL,
  `File` varchar(255) NOT NULL DEFAULT 'No File Found',
  `empty` int(11) NOT NULL,
  `D_RV` varchar(50) NOT NULL DEFAULT 'RV#',
  `RegDate` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `receipt`
--

INSERT INTO `receipt` (`id`, `Admin_id`, `Cid`, `Date`, `RV`, `Amount`, `Memo`, `Status`, `Reason`, `File`, `empty`, `D_RV`, `RegDate`) VALUES
(96, 2, 31, '2022-02-06', 6349, '1000.00', 'AR', 'Pending', NULL, 'No File Found', 0, 'RV#', '2023-07-04 11:11:17'),
(97, 2, 26, '2022-01-05', 6335, '112.80', 'RV', 'Approved', '', 'No File Found', 0, 'RV#', '2023-07-04 11:26:07'),
(99, 2, 4, '2022-07-12', 6400, '88.84', 'RV', 'Pending', NULL, 'No File Found', 0, 'RV#', '2023-07-04 11:28:09'),
(103, 1, 20, '2022-02-09', 6351, '1000.00', 'AR', 'Pending', NULL, 'No File Found', 0, 'RV#', '2023-07-05 05:02:47'),
(104, 1, 20, '2022-02-23', 6359, '1000.00', 'AR', 'Pending', NULL, 'No File Found', 0, 'RV#', '2023-07-05 05:04:32'),
(105, 1, 20, '2022-03-02', 6361, '1000.00', 'AR', 'Pending', NULL, 'No File Found', 0, 'RV#', '2023-07-05 05:05:12'),
(106, 1, 20, '2022-03-09', 6364, '1000.00', 'AR', 'Pending', NULL, 'No File Found', 0, 'RV#', '2023-07-05 05:05:40'),
(107, 1, 20, '2022-03-20', 6369, '1000.00', 'AR', 'Pending', NULL, 'No File Found', 0, 'RV#', '2023-07-05 05:06:06'),
(108, 1, 20, '2022-03-31', 6376, '1000.00', 'AR', 'Pending', NULL, 'No File Found', 0, 'RV#', '2023-07-05 05:06:31'),
(109, 2, 31, '2022-02-12', 6353, '800.00', 'AR', 'Pending', NULL, 'No File Found', 0, 'RV#', '2023-07-05 05:25:55'),
(110, 2, 31, '2022-02-14', 6354, '200.00', 'AR', 'Pending', NULL, 'No File Found', 0, 'RV#', '2023-07-05 05:26:45'),
(111, 2, 31, '2022-02-16', 6362, '200.00', 'AR', 'Pending', NULL, 'No File Found', 0, 'RV#', '2023-07-05 05:27:21'),
(112, 2, 31, '2022-02-19', 6357, '400.00', 'AR', 'Pending', NULL, 'No File Found', 0, 'RV#', '2023-07-05 05:27:48'),
(113, 2, 31, '2022-03-06', 6367, '500.00', 'AR', 'Pending', NULL, 'No File Found', 0, 'RV#', '2023-07-05 05:28:15'),
(114, 2, 31, '2022-03-10', 6368, '400.00', 'AR', 'Pending', NULL, 'No File Found', 0, 'RV#', '2023-07-05 05:28:55'),
(115, 2, 31, '2022-03-20', 6372, '400.00', 'AR', 'Pending', NULL, 'No File Found', 0, 'RV#', '2023-07-05 05:29:23'),
(116, 1, 22, '2022-04-02', 6377, '10000.00', 'AR', 'Pending', NULL, 'No File Found', 0, 'RV#', '2023-07-05 06:48:21');

-- --------------------------------------------------------

--
-- Table structure for table `setting`
--

CREATE TABLE `setting` (
  `id` int(11) NOT NULL,
  `Company_name` varchar(50) NOT NULL,
  `Address` varchar(30) NOT NULL,
  `Email` varchar(20) NOT NULL,
  `Tell` bigint(20) NOT NULL,
  `Phone` bigint(20) NOT NULL,
  `Logo` varchar(50) NOT NULL,
  `RegDate` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `setting`
--

INSERT INTO `setting` (`id`, `Company_name`, `Address`, `Email`, `Tell`, `Phone`, `Logo`, `RegDate`) VALUES
(1, 'New General Trading Company', 'Muqdisho, Banaadir', 'Company@gmail.com', 620000, 252613231772, '', '2023-03-16 16:13:45');

-- --------------------------------------------------------

--
-- Table structure for table `support`
--

CREATE TABLE `support` (
  `id` int(11) NOT NULL,
  `Cid` int(11) NOT NULL,
  `Admin_id` int(11) NOT NULL,
  `Title` varchar(50) NOT NULL,
  `Message` mediumtext NOT NULL,
  `Reply` mediumtext DEFAULT NULL,
  `Time_user` varchar(30) NOT NULL,
  `Time_admin` varchar(30) DEFAULT NULL,
  `Status` varchar(10) NOT NULL,
  `RegDate` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `support`
--

INSERT INTO `support` (`id`, `Cid`, `Admin_id`, `Title`, `Message`, `Reply`, `Time_user`, `Time_admin`, `Status`, `RegDate`) VALUES
(4, 3, 2, '', '', 'yes diyrin okfb jkdfkjc kldc lkc lknck ', '0000-00-00 00:00:00', '2023-03-03-Fri - 07:37:10 am', 'Hide', '2022-09-07 10:16:38'),
(10, 8, 2, '', '', 'wa la saxay xisabtada  ee iska hubi ', '0000-00-00 00:00:00', '2023-02-18 00:00:00', 'Show', '2022-09-16 13:27:54'),
(11, 8, 2, '', '', 'Thanks to send ', '0000-00-00 00:00:00', '2023-03-10-Fri - 04:16:54 pm', 'Show', '2022-09-22 12:18:12'),
(12, 3, 2, '', '', 'okey', '0000-00-00 00:00:00', '2023-02-16 00:00:00', 'Show', '2022-10-27 14:30:05'),
(13, 25, 2, '', '', 'th', '0000-00-00 00:00:00', '2023-03-13-Mon - 08:49:09 am', 'Show', '2022-12-05 03:50:35'),
(18, 25, 2, '', 'senbl', 'ok', '0000-00-00 00:00:00', '2023-03-13-Mon - 08:48:45 am', 'Show', '2023-02-16 15:51:21'),
(19, 4, 2, '', 'hello', 'xfhbf', '2023-02-17 00:00:00', '2023-03-03-Fri - 07:58:00 am', 'Show', '2023-02-17 16:57:56'),
(20, 24, 2, '', 'Asc', 'Wcs', '2023-03-12-Sun - 10:17:42 am', '2023-03-12-Sun - 10:18:35 am', 'Show', '2023-03-12 07:17:42'),
(21, 24, 2, '', 'questrion fhjkhfd', 'welcome jhjkfg', '2023-03-12-Sun - 10:19:13 am', '2023-06-29-Thu - 07:52:10 pm', 'Hide', '2023-03-12 07:19:13'),
(22, 24, 1, '', 'ggg', 'ok', '2023-03-12-Sun - 06:14:10 pm', '2023-04-19-Wed - 02:16:41 pm', 'Pending', '2023-03-12 15:14:10'),
(23, 24, 2, '', 'Huyydsttdsj  syukns djys jksh,mshiolHuyydsttdsj  syukns djys jksh,mshiol Huyydsttdsj  syukns djys jksh,mshiol', 'ryiojt', '2023-03-12-Sun - 06:36:10 pm', '', 'Hide', '2023-03-12 15:36:10'),
(24, 22, 1, '', 'Asc', 'Wcs', '2023-03-19-Sun - 07:34:25 pm', '2023-05-02-Tue - 01:58:57 pm', 'Show', '2023-03-19 16:34:25'),
(25, 21, 1, '', 'dfsdfd', 'trkhhn', '2023-03-30-Thu - 03:45:35 pm', '2023-06-20-Tue - 08:58:32 pm', 'Hide', '2023-03-30 11:45:35'),
(26, 25, 1, '', 'hello', 'hello', '2023-04-04-Tue - 08:53:28 pm', '2023-04-20-Thu - 11:08:09 am', 'Hide', '2023-04-04 16:53:28'),
(28, 25, 1, 'test', 'okey wel done', 'jhfgmf', '2023-04-27-Thu - 11:46:40 am', '2023-05-07-Sun - 04:56:15 pm', 'Hide', '2023-04-27 07:44:03'),
(29, 25, 1, 'Test2', 'welcome', '', '2023-04-27-Thu - 11:46:50 am', '', 'Pending', '2023-04-27 07:46:50'),
(31, 25, 1, 'Test 3', 'JHgjhfdsg jkahfjkhak jkshakjsan', NULL, '2023-04-27-Thu - 12:15:40 pm', '', 'Pending', '2023-04-27 08:15:40'),
(32, 25, 2, 'Test 4', 'hgfadhsgd il kjsdlkjsk sahldskl djlsa ls kljskldj', 'okey', '2023-04-27-Thu - 12:22:08 pm', '2023-06-16-Fri - 10:23:45 am', 'Show', '2023-04-27 08:22:08'),
(33, 25, 1, 'Test 5', 'jhcv', NULL, '2023-04-27-Thu - 12:28:17 pm', '', 'Hide', '2023-04-27 08:28:17'),
(34, 28, 1, 'Codsi', 'tijaabo ', NULL, '2023-05-02-Tue - 10:33:41 am', '', 'Pending', '2023-05-02 06:33:41'),
(35, 22, 1, 'Hello', 'ttttt', NULL, '2023-05-02-Tue - 02:00:17 pm', '', 'Pending', '2023-05-02 10:00:17'),
(36, 22, 1, 'Hello 2', 'ASC WR', NULL, '2023-05-02-Tue - 02:11:45 pm', '', 'Pending', '2023-05-02 10:11:45'),
(37, 22, 1, 'Cabasho Test', 'Video provides a powerful way to help you prove your point. When you click Online Video, you can paste in the embed code for the video you want to add. You can also type a keyword to search online for the video that best fits your document.\r\nTo make your ', 'way to help you prove your point. When you click Online Video, you can paste in the embed code for the video you want to add. You can also type a keyword to search online for the video that best fits your document.', '2023-05-02-Tue - 03:36:50 pm', '2023-06-12-Mon - 04:36:00 pm', 'Show', '2023-05-02 11:36:50'),
(38, 22, 1, 'test 2', 'Video provides a powerful way to help you prove your point. When you click Online Video, you can paste in the embed code for the video you want to add. You can also type a keyword to search online for the video that best fits your document.\r\nTo make your document look professionally produced, Word provides header, footer, cover page, and text box designs that complement each other. For example, you can add a matching cover page, header, and sidebar. Click Insert and then choose the elements you want from the different galleries.\r\n', 'Video provides a powerful way to help you prove your point. When you click Online Video, you can paste in the embed code for the video you want to add. You can also type a keyword to search online for the video that best fits your document.\r\nTo make your document look professionally produced, Word provides header, footer, cover page, and text box designs that complement each other. For example, you can add a matching cover page, header, and sidebar. Click Insert and then choose the elements you want from the different galleries.\r\nThanks...', '2023-05-02-Tue - 03:40:00 pm', '2023-05-02-Tue - 03:43:18 pm', 'Show', '2023-05-02 11:40:00'),
(39, 23, 1, 'Test 1', 'Testing Message', NULL, '2023-05-11-Thu - 05:54:50 pm', '', 'Pending', '2023-05-11 13:54:50'),
(40, 25, 1, 'test 5', 'ok', NULL, '2023-05-16-Tue - 09:13:23 pm', '', 'Pending', '2023-05-16 17:13:23'),
(41, 25, 1, 'test 5', 'ok', NULL, '2023-05-16-Tue - 09:14:02 pm', '', 'Pending', '2023-05-16 17:14:02'),
(42, 25, 1, 'Test6', 'fjkf', NULL, '2023-05-16-Tue - 09:15:38 pm', '', 'Pending', '2023-05-16 17:15:38'),
(43, 25, 1, 'test7', 'fhdhgf', NULL, '2023-05-16-Tue - 09:16:38 pm', '', 'Pending', '2023-05-16 17:16:38'),
(44, 25, 1, 'test8', 'gdgfd', 'okey 1111', '2023-05-16-Tue - 09:17:01 pm', '2023-06-25-Sun - 06:43:51 pm', 'Show', '2023-05-16 17:17:01'),
(45, 29, 1, 'cabasho', 'hdfhjhdgbnmbb bskmsbn', 'okey diyar wye', '2023-05-29-Mon - 01:12:24 pm', '2023-06-16-Fri - 05:37:50 pm', 'Show', '2023-05-29 09:12:24'),
(46, 29, 1, 'hello', 'jhgasjhgsajhgsajk kjhsakjh', 'okey 12', '2023-06-13-Tue - 08:56:19 am', '2023-06-16-Fri - 05:36:07 pm', 'Show', '2023-06-13 04:56:19');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_order`
--

CREATE TABLE `tbl_order` (
  `id` int(11) NOT NULL,
  `Admin_id` int(11) NOT NULL,
  `Cid` int(11) NOT NULL,
  `Date` varchar(50) NOT NULL,
  `Reason` varchar(5000) NOT NULL,
  `RegDate` timestamp NOT NULL DEFAULT current_timestamp(),
  `Status` varchar(20) NOT NULL,
  `Reason_RJ` varchar(5000) DEFAULT NULL,
  `File` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_order`
--

INSERT INTO `tbl_order` (`id`, `Admin_id`, `Cid`, `Date`, `Reason`, `RegDate`, `Status`, `Reason_RJ`, `File`) VALUES
(47, 8, 25, '0000-00-00', 'bfmbdnfbdmbfd', '2022-12-01 07:11:03', 'Approved', NULL, 'ap.pdf'),
(50, 8, 25, '2023-01-01', 'Dalab Diyaarin', '2022-12-01 08:05:17', 'Reject', NULL, 'dollar.png'),
(52, 2, 25, '2023-02-12', 'ok.', '2023-02-12 08:37:18', 'Preparing', NULL, 'playerofcode.pdf'),
(53, 2, 25, '2023-02-12', 'ok', '2023-02-12 08:37:19', 'Reject', 'okey ', 'CDA Management System (21).pdf'),
(54, 1, 25, '2023-02-11', 'dlb', '2023-02-12 09:48:35', 'Pending', NULL, 'JMM AA.pdf'),
(55, 1, 4, '2023-02-14', 'Dalab oo', '2023-02-12 15:03:03', 'Preparing', NULL, '1411535.png'),
(56, 1, 4, '2023-02-15', 'dalab', '2023-02-18 11:09:06', 'Pending', NULL, 'palgrave.dbm.3240306 (2).pdf'),
(57, 1, 4, '2023-02-18', 'Dalab', '2023-02-18 13:37:28', 'Pending', NULL, 'playerofcode (3).pdf'),
(58, 1, 23, '2023-03-10', 'Order test', '2023-03-10 11:41:29', 'Pending', NULL, 'Dalab.pdf'),
(59, 1, 23, '2023-03-10', 'Dalabka labaad ', '2023-03-10 11:46:12', 'Preparing', NULL, 'Dalab 2.pdf'),
(60, 1, 25, '2023-04-19', 'Dalabkas So diyaari', '2023-04-19 10:20:17', 'Preparing', NULL, 'CDA Management System.pdf6346542.pdf'),
(63, 2, 25, '0000-00-00', 'efr', '2023-05-16 14:25:49', 'Approved', '', 'Scheduling Algorithms Assignment (CA19_full-time).pdf'),
(64, 1, 25, '2023-05-17', 'ordernb', '2023-05-16 14:28:05', 'Preparing', NULL, 'Scheduling Algorithms54564 Assignment (CA19_full-time).pdf'),
(65, 1, 25, '18-05-2023', 'fffff', '2023-05-18 06:55:56', 'Reject', 'hgsjhds', '_1.pdf'),
(66, 1, 25, 'Thu-18-05-2023 10:07:41 am', 'oder test 1', '2023-05-18 07:07:57', 'Pending', NULL, 'test_pdf.pdf'),
(67, 1, 25, 'Thu-18-05-2023 10:09:04 am', 'oder test 2', '2023-05-18 07:09:15', 'Pending', NULL, '_2.pdf'),
(68, 1, 25, 'Thu-18-05-2023 10:19:06 am', 'order test 3', '2023-05-18 07:19:27', 'Pending', NULL, 'test_pdf_2.pdf'),
(69, 1, 25, 'Thu-18-05-2023 10:25:52 am', 'order test 4', '2023-05-18 07:26:08', 'Pending', NULL, 'test_pdf_3.pdf'),
(70, 1, 25, 'Thu-18-05-2023 10:31:39 am', 'order test 5', '2023-05-18 07:31:50', 'Pending', NULL, 'test_pdf1.pdf'),
(71, 1, 25, 'Thu-18-05-2023 10:33:57 am', 'order test 6', '2023-05-18 07:34:16', 'Pending', NULL, 'test_pdf_4.pdf'),
(72, 1, 25, 'Thu-18-05-2023 10:41:13 am', 'order test 7', '2023-05-18 07:41:24', 'Pending', NULL, '1209.312155.pdf'),
(73, 1, 25, 'Thu-18-05-2023 10:45:48 am', 'order test 8', '2023-05-18 07:46:10', 'Reject', 'waa dhamaaday', 'Scheduling 64556Assignment (CA19_part-time).pdf'),
(74, 1, 29, 'Mon-29-05-2023 12:01:18 pm', 'dalab', '2023-05-29 09:01:46', 'Approved', 'okey iska sax wdjjkdjkshjks ', 'CDA Management System (78).pdf'),
(75, 1, 29, 'Tue-13-06-2023 07:56:38 am', 'Dalab', '2023-06-13 04:56:57', 'Approved', NULL, 'CDA Management System (223).pdf'),
(76, 1, 31, 'Tue-20-06-2023 01:14:32 pm', 'dalab', '2023-06-20 10:14:52', 'Pending', NULL, 'playerofcode (2321).pdf'),
(77, 1, 32, 'Sat-24-06-2023 01:19:57 pm', 'Dalab', '2023-06-24 10:21:32', 'Approved', 'dalabkaas waa dhamaday sory ', 'oredr 5454test.pdf'),
(78, 1, 32, 'Tue-27-06-2023 10:05:41 am', 'order2', '2023-06-27 07:06:12', 'Pending', '', 'oredr test123.pdf'),
(79, 1, 25, 'Wed-05-07-2023 12:58:21 pm', 'ffff', '2023-07-05 09:58:36', 'Pending', NULL, 'playerofcode (2) (1).pdf'),
(80, 1, 25, 'Wed-05-07-2023 12:58:38 pm', 'lkkl', '2023-07-05 09:58:47', 'Pending', NULL, 'playerofcode (2) (1)_2.pdf'),
(81, 1, 25, 'Wed-05-07-2023 01:09:36 pm', 'order testing 1', '2023-07-05 10:11:07', 'Pending', NULL, 'testing.pdf'),
(82, 1, 25, 'Wed-05-07-2023 01:09:36 pm', 'order testing 1', '2023-07-05 10:11:31', 'Pending', NULL, 'DeskApp - Bootstrap Admin Dashboard HTML Template (2).pdf');

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
  `password` varchar(50) DEFAULT NULL,
  `Pass_status` int(1) NOT NULL,
  `Phone` int(11) NOT NULL,
  `Role` varchar(20) NOT NULL,
  `Status` varchar(10) NOT NULL,
  `Gmail_sent` int(1) NOT NULL,
  `Address` varchar(50) NOT NULL,
  `Picture` varchar(200) DEFAULT NULL,
  `otp` int(6) DEFAULT NULL,
  `otp_expiration` int(1) NOT NULL,
  `Login_time` varchar(50) DEFAULT NULL,
  `Login_status` varchar(50) DEFAULT NULL,
  `Reg_date` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`ID`, `Admin_id`, `Name`, `Com_name`, `Email`, `password`, `Pass_status`, `Phone`, `Role`, `Status`, `Gmail_sent`, `Address`, `Picture`, `otp`, `otp_expiration`, `Login_time`, `Login_status`, `Reg_date`) VALUES
(1, 1, 'Administrator', 'Test Administrator Company', 'A1@cda.com', '81dc9bdb52d04dc20036dbd8313ed055', 1, 610001, 'Administrator', 'Active', 0, 'Madiina', NULL, 652152, 0, 'Tue-18-07-2023 02:48:40 pm', '1689699647', '2022-11-24 12:09:33'),
(2, 1, 'Admin', 'Admin Company', 'admin@cda.com', '81dc9bdb52d04dc20036dbd8313ed055', 1, 6122121, 'Admin', 'Active', 1, 'Howlwadaag', NULL, 123499, 1, 'Mon-17-07-2023 01:10:14 pm', '1689594992', '2022-11-24 14:07:47'),
(3, 1, 'Nur Siyad Abdi', 'Nur Company', 'nursiyad2022@gmail.com', '81dc9bdb52d04dc20036dbd8313ed055', 1, 613231772, 'Customer', 'Active', 1, 'Banaadir', 'user3.png', 273528, 0, 'Tue-18-07-2023 08:05:47 am', '1689659285', '2022-11-24 15:22:59'),
(4, 1, 'Al-Marwa (4) Pharmacy (Saakow)', 'Al-Marwa (4) Pharmacy (Saakow)', 'Al-marwa4sk@cda.com', '81dc9bdb52d04dc20036dbd8313ed055', 1, 610000, 'Customer', 'Active', 1, 'Saakow', '1354944.png', 42299, 0, 'Wed-05-07-2023 08:22:31 am', '1688531041', '2022-11-27 10:26:53'),
(5, 1, 'Al-Marwa Pharmacy (2) Kismayo', 'Al-Marwa Pharmacy (2) Kismayo', 'al-marwa2k@cda.com', '81dc9bdb52d04dc20036dbd8313ed055', 1, 612222, 'Customer', 'Active', 0, 'Kismaayo', NULL, NULL, 0, 'Fri-14-07-2023 10:29:06 am', '1689345966', '2022-11-28 12:22:20'),
(6, 1, 'Ahmed Ali Kaahiye', 'Ahmed General Company', 'ahmed@cda.com', '81dc9bdb52d04dc20036dbd8313ed055', 1, 3333311, 'Vendor', 'Inactive', 1, 'Howlwadag', NULL, 884003, 0, '', '0', '2022-11-30 03:46:17'),
(7, 1, 'Hashim Muqtar Ali', 'Hashim Gen Company', 'hashim@cda.com', '81dc9bdb52d04dc20036dbd8313ed055', 1, 1234567, 'Vendor', 'Active', 0, 'wadajir', NULL, NULL, 0, '', '1681975205', '2022-11-30 05:56:07'),
(8, 1, 'ggggggg', 'ggggggg', 'gg@cda.com', '81dc9bdb52d04dc20036dbd8313ed055', 1, 6555, 'Admin', 'Active', 0, 'Wadajir', NULL, NULL, 0, 'Tue-21-03-2023 09:33:12 am', '1687593618', '2022-12-02 11:07:32'),
(10, 1, 'Manager', 'Company Gen Trading Co.', 'Manager@cda.com', '81dc9bdb52d04dc20036dbd8313ed055', 1, 66665554, 'HOD', 'Active', 0, 'wadajir', 'user3.jpg', 694273, 1, 'Sat-15-07-2023 08:35:20 am', '1689397520', '2022-12-23 04:30:39'),
(11, 1, 'Dahir', 'Dahir Company', 'dahir@cda.com', '81dc9bdb52d04dc20036dbd8313ed055', 1, 13456456, 'HOD', 'Active', 0, 'Madiina', NULL, NULL, 0, '', '', '2023-02-06 15:30:43'),
(13, 1, 'muqtar', 'muqtar Gen company', 'muqtar@cda.com', '81dc9bdb52d04dc20036dbd8313ed055', 1, 61465, 'Customer', 'Inactive', 0, 'Wadajir', NULL, NULL, 0, 'Thu-16-02-2023 06:12:33 am', '1676568992', '2023-02-13 13:00:18'),
(18, 1, 'jamac', 'jamac Company', 'jaamac@cda.com', '81dc9bdb52d04dc20036dbd8313ed055', 1, 2561, 'Customer', 'Active', 0, 'kjuh', NULL, NULL, 0, '', '', '2023-02-16 10:22:36'),
(19, 1, 'qadar', 'qadar Company', 'qadar@cda.com', '81dc9bdb52d04dc20036dbd8313ed055', 1, 65626, 'Customer', 'Active', 0, 'ok', NULL, NULL, 0, '', '', '2023-02-18 18:10:16'),
(20, 1, 'Yuususf Horseed Pharma', 'Yuususf Horseed Pharma', 'yusufh@cda.com', '81dc9bdb52d04dc20036dbd8313ed055', 1, 456456, 'Customer', 'Active', 0, 'Kismaayo', '1425812.png', NULL, 0, 'Wed-05-07-2023 08:40:14 am', '1688534073', '2023-02-18 18:16:47'),
(21, 1, 'zaka', 'zaka Comapany', 'zaka@cda.com', '81dc9bdb52d04dc20036dbd8313ed055', 1, 656, 'Customer', 'Active', 0, 'hgfh', '8349206.png', 966783, 0, 'Thu-23-02-2023 07:15:27 am', '1686634169', '2023-02-18 18:20:31'),
(22, 1, 'AL-Madiina Pharma Bosaso', 'AL-Madiina Pharma Bosaso', 'al-madiina@cda.com', '81dc9bdb52d04dc20036dbd8313ed055', 1, 6120000, 'Customer', 'Active', 0, 'Bosaso', NULL, 287896, 0, 'Mon-20-03-2023 06:41:13 am', '1688119762', '2023-02-28 12:36:25'),
(23, 1, 'Customer Name', 'Company Name', 'customer@cda.com', '81dc9bdb52d04dc20036dbd8313ed055', 1, 61220, 'Customer', 'Active', 0, 'None', 'user2.png', NULL, 0, 'Sun-26-03-2023 01:07:26 pm', '1687968767', '2023-03-10 11:31:01'),
(24, 1, 'Saciid Ahmed', 'Saciid Company', 'saciid@cda.com', '81dc9bdb52d04dc20036dbd8313ed055', 1, 66666666, 'Customer', 'Active', 0, 'Kaxda', NULL, NULL, 0, 'Mon-13-03-2023 08:26:09 am', '1687440764', '2023-03-12 06:33:21'),
(25, 1, 'Farax Ali Mohamed', 'Testing Company', 'test@cda.com', '81dc9bdb52d04dc20036dbd8313ed055', 1, 610024, 'Customer', 'Active', 0, 'Muqdisho', 'user1.png', 229674, 1, 'Mon-17-07-2023 02:17:48 pm', '1689597308', '2023-03-21 15:56:37'),
(26, 2, 'Ex-Hilaac Pharma ', 'Ex-Hilaac Pharma ', 'Ex_hilaac@cda.com', '81dc9bdb52d04dc20036dbd8313ed055', 1, 6100210, 'Customer', 'Active', 0, 'Howlwadaag', NULL, NULL, 0, 'Tue-04-07-2023 07:40:51 pm', '1688488918', '2023-03-23 06:52:32'),
(28, 2, 'Farax Cali', 'farax Cali Company', 'faraxcali1289@gmail.com', '81dc9bdb52d04dc20036dbd8313ed055', 1, 612729414, 'Customer', 'Active', 1, 'madiina', NULL, NULL, 0, '', '1688130797', '2023-04-21 13:30:55'),
(29, 1, 'Sacdiyo', 'sacdiyo company', 'sacdiyo@cda.com', '81dc9bdb52d04dc20036dbd8313ed055', 1, 675776776, 'Customer', 'Active', 0, 'Hodan', NULL, 708868, 1, 'Tue-04-07-2023 02:08:09 pm', '1688466688', '2023-05-29 08:38:52'),
(31, 1, 'Horseed Dhukow Pharma', 'Horseed Dhukow Pharma', 'horseddhk@cda.com', '81dc9bdb52d04dc20036dbd8313ed055', 1, 56456464, 'Customer', 'Active', 1, 'Kismaayo', 'user4.jpg', NULL, 0, 'Wed-05-07-2023 09:13:50 am', '1688539378', '2023-06-20 10:11:51'),
(32, 1, 'mohamed Khalid', 'mohamed khalid Company ', 'moha@cda.com', '827ccb0eea8a706c4c34a16891f84e7b', 1, 613778517, 'Customer', 'Active', 1, 'Madiin', NULL, NULL, 0, 'Sun-16-07-2023 08:01:51 pm', '1689526697', '2023-06-24 08:53:03'),
(33, 1, 'aadan', 'aadan Company', 'aadan@cda.com', '81dc9bdb52d04dc20036dbd8313ed055', 1, 6134576, 'HOD', 'Active', 1, 'hodan', NULL, NULL, 0, '', '1687607773', '2023-06-24 11:43:12');

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
(1, 2, 'Computer', 'Windows 10', 'Chrome', 'Tue-28-03-2023 12:49:41 pm', '1679994204', '2023-03-26 18:05:43'),
(2, 1, 'Computer', 'Windows 10', 'Chrome', 'Tue-28-03-2023 12:49:41 pm', '1679994204', '2023-03-26 18:05:43'),
(3, 1, 'Computer', 'Windows 10', 'Chrome', 'Tue-28-03-2023 12:49:41 pm', '1679994204', '2023-03-26 18:05:43'),
(4, 25, 'Computer', 'Windows 10', 'Firefox', 'Tue-28-03-2023 12:49:41 pm', '1679994204', '2023-03-26 18:05:43'),
(5, 2, 'Computer', 'Windows 10', 'Chrome', 'Tue-28-03-2023 12:49:41 pm', '1679994204', '2023-03-26 18:05:43'),
(6, 25, 'Computer', 'Windows 10', 'Firefox', 'Tue-28-03-2023 12:49:41 pm', '1679994204', '2023-03-26 19:10:28'),
(7, 1, 'Computer', 'Windows 10', 'Chrome', 'Tue-28-03-2023 12:49:41 pm', '1679994204', '2023-03-27 06:33:18'),
(8, 1, 'Computer', 'Windows 10', 'Chrome', 'Tue-28-03-2023 12:49:41 pm', '1679994204', '2023-03-28 08:00:28'),
(9, 2, 'Computer', 'Windows 10', 'Chrome', 'Tue-28-03-2023 12:33:24 pm', '1679994204', '2023-03-28 08:33:24'),
(10, 25, 'Computer', 'Windows 10', 'Chrome', 'Tue-28-03-2023 12:49:41 pm', '1679994204', '2023-03-28 08:45:41'),
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
(29, 10, 'Computer', 'Windows 10', 'Chrome', 'Sun-23-04-2023 02:03:13 pm', '1682245993', '2023-04-23 10:03:13'),
(30, 10, 'Computer', 'Windows 10', 'Chrome', 'Tue-02-05-2023 07:56:34 pm', '1683044794', '2023-05-02 15:56:34'),
(31, 10, 'Computer', 'Windows 10', 'Chrome', 'Fri-05-05-2023 07:50:09 pm', '1683303609', '2023-05-05 15:50:09'),
(32, 10, 'Computer', 'Windows 10', 'Chrome', 'Thu-11-05-2023 01:07:56 pm', '1683797876', '2023-05-11 09:07:56'),
(33, 10, 'Computer', 'Windows 10', 'Chrome', 'Thu-11-05-2023 03:57:28 pm', '1683808048', '2023-05-11 11:57:28'),
(34, 10, 'Computer', 'Windows 10', 'Chrome', 'Mon-15-05-2023 08:37:35 pm', '1684170455', '2023-05-15 16:37:35'),
(35, 11, 'Computer', 'Windows 10', 'Chrome', 'Mon-15-05-2023 08:37:35 pm', '1684170455', '2023-05-15 16:37:35'),
(36, 10, 'Computer', 'Windows 10', 'Chrome', 'Mon-15-05-2023 08:37:46 pm', '1684170466', '2023-05-15 16:37:46'),
(37, 11, 'Computer', 'Windows 10', 'Chrome', 'Mon-15-05-2023 08:37:46 pm', '1684170466', '2023-05-15 16:37:46'),
(38, 10, 'Computer', 'Windows 10', 'Chrome', 'Mon-15-05-2023 08:38:00 pm', '1684170480', '2023-05-15 16:38:00'),
(39, 11, 'Computer', 'Windows 10', 'Chrome', 'Mon-15-05-2023 08:38:00 pm', '1684170480', '2023-05-15 16:38:00'),
(40, 10, 'Computer', 'Windows 10', 'Chrome', 'Mon-15-05-2023 08:39:37 pm', '1684170577', '2023-05-15 16:39:37'),
(41, 11, 'Computer', 'Windows 10', 'Chrome', 'Mon-15-05-2023 08:39:37 pm', '1684170577', '2023-05-15 16:39:37'),
(42, 10, 'Computer', 'Windows 10', 'Chrome', 'Mon-15-05-2023 08:40:13 pm', '1684170613', '2023-05-15 16:40:13'),
(43, 11, 'Computer', 'Windows 10', 'Chrome', 'Mon-15-05-2023 08:40:13 pm', '1684170613', '2023-05-15 16:40:13'),
(44, 10, 'Computer', 'Windows 10', 'Chrome', 'Mon-15-05-2023 09:02:31 pm', '1684171951', '2023-05-15 17:02:31'),
(45, 11, 'Computer', 'Windows 10', 'Chrome', 'Mon-15-05-2023 09:02:31 pm', '1684171951', '2023-05-15 17:02:31'),
(46, 10, 'Computer', 'Windows 10', 'Chrome', 'Mon-15-05-2023 09:34:20 pm', '1684173860', '2023-05-15 17:34:20'),
(47, 11, 'Computer', 'Windows 10', 'Chrome', 'Mon-15-05-2023 09:34:20 pm', '1684173860', '2023-05-15 17:34:20'),
(48, 10, 'Computer', 'Windows 10', 'Chrome', 'Mon-15-05-2023 09:35:08 pm', '1684173908', '2023-05-15 17:35:08'),
(49, 11, 'Computer', 'Windows 10', 'Chrome', 'Mon-15-05-2023 09:35:08 pm', '1684173908', '2023-05-15 17:35:08'),
(50, 2, 'Computer', 'Windows 10', 'Chrome', 'Wed-17-05-2023 05:14:14 pm', '1684331054', '2023-05-17 13:14:14'),
(51, 2, 'Computer', 'Windows 10', 'Chrome', 'Thu-18-05-2023 08:23:54 am', '1684385634', '2023-05-18 04:23:54'),
(52, 2, 'Computer', 'Windows 10', 'Chrome', 'Thu-18-05-2023 08:24:48 am', '1684385688', '2023-05-18 04:24:48'),
(53, 2, 'Computer', 'Windows 10', 'Chrome', 'Thu-18-05-2023 09:39:21 am', '1684390161', '2023-05-18 05:39:21'),
(54, 2, 'Computer', 'Windows 10', 'Chrome', 'Thu-18-05-2023 09:40:18 am', '1684390218', '2023-05-18 05:40:18'),
(55, 2, 'Computer', 'Windows 10', 'Chrome', 'Thu-18-05-2023 09:47:47 am', '1684390667', '2023-05-18 05:47:47'),
(56, 2, 'Computer', 'Windows 10', 'Chrome', 'Thu-18-05-2023 05:01:09 pm', '1684416669', '2023-05-18 13:01:09'),
(57, 10, 'Computer', 'Windows 10', 'Chrome', 'Thu-18-05-2023 05:21:26 pm', '1684417886', '2023-05-18 13:21:26'),
(58, 2, 'Computer', 'Windows 10', 'Chrome', 'Tue-23-05-2023 03:28:24 pm', '1684843104', '2023-05-23 11:28:24'),
(59, 2, 'Computer', 'Windows 10', 'Chrome', 'Sun-28-05-2023 10:39:13 am', '1685257753', '2023-05-28 06:39:13'),
(60, 2, 'Computer', 'Windows 10', 'Chrome', 'Sun-28-05-2023 05:44:59 pm', '1685283299', '2023-05-28 13:44:59'),
(61, 2, 'Computer', 'Windows 10', 'Chrome', 'Mon-29-05-2023 12:29:40 pm', '1685350780', '2023-05-29 08:29:40'),
(62, 2, 'Computer', 'Windows 10', 'Chrome', 'Tue-30-05-2023 07:45:00 pm', '1685463300', '2023-05-30 15:45:00'),
(63, 2, 'Computer', 'Windows 10', 'Chrome', 'Sat-10-06-2023 06:23:44 pm', '1686408824', '2023-06-10 14:23:44'),
(64, 10, 'Computer', 'Windows 10', 'Chrome', 'Sat-10-06-2023 06:38:55 pm', '1686409735', '2023-06-10 14:38:55'),
(65, 2, 'Computer', 'Windows 10', 'Chrome', 'Sun-11-06-2023 04:20:24 pm', '1686487824', '2023-06-11 12:20:24'),
(66, 2, 'Computer', 'Windows 10', 'Chrome', 'Mon-12-06-2023 04:39:42 pm', '1686575382', '2023-06-12 12:39:42'),
(67, 10, 'Computer', 'Windows 10', 'Chrome', 'Tue-13-06-2023 08:46:34 am', '1686633394', '2023-06-13 04:46:34'),
(68, 10, 'Computer', 'Windows 10', 'Chrome', 'Tue-13-06-2023 09:32:21 am', '1686636141', '2023-06-13 05:32:21'),
(69, 10, 'Computer', 'Windows 10', 'Chrome', 'Tue-13-06-2023 07:49:52 pm', '1686673192', '2023-06-13 15:49:52'),
(70, 10, 'Computer', 'Windows 10', 'Chrome', 'Wed-14-06-2023 09:10:22 pm', '1686764422', '2023-06-14 17:10:22'),
(71, 2, 'Computer', 'Windows 10', 'Chrome', 'Thu-15-06-2023 08:58:59 am', '1686806939', '2023-06-15 04:58:59'),
(72, 10, 'Computer', 'Windows 10', 'Chrome', 'Thu-15-06-2023 09:01:57 am', '1686807117', '2023-06-15 05:01:57'),
(73, 11, 'Computer', 'Windows 10', 'Chrome', 'Thu-15-06-2023 01:14:49 pm', '1686822289', '2023-06-15 09:14:49'),
(74, 2, 'Computer', 'Windows 10', 'Chrome', 'Thu-15-06-2023 02:21:44 pm', '1686826304', '2023-06-15 10:21:44'),
(75, 10, 'Computer', 'Windows 10', 'Chrome', 'Thu-15-06-2023 04:04:45 pm', '1686832485', '2023-06-15 12:04:45'),
(76, 2, 'Computer', 'Windows 10', 'Chrome', 'Fri-16-06-2023 10:05:33 am', '1686897333', '2023-06-16 06:05:33'),
(77, 10, 'Computer', 'Windows 10', 'Chrome', 'Fri-16-06-2023 10:08:05 am', '1686897485', '2023-06-16 06:08:05'),
(78, 2, 'Computer', 'Windows 10', 'Chrome', 'Fri-16-06-2023 10:53:32 am', '1686900212', '2023-06-16 06:53:32'),
(79, 2, 'Computer', 'Windows 10', 'Chrome', 'Sat-17-06-2023 06:24:54 pm', '1687013694', '2023-06-17 14:24:54'),
(80, 2, 'Computer', 'Windows 10', 'Chrome', 'Sun-18-06-2023 08:36:14 am', '1687064774', '2023-06-18 04:36:14'),
(81, 10, 'Computer', 'Windows 10', 'Chrome', 'Sun-18-06-2023 08:39:08 am', '1687064948', '2023-06-18 04:39:08'),
(82, 2, 'Computer', 'Windows 10', 'Chrome', 'Sun-18-06-2023 09:38:51 am', '1687068531', '2023-06-18 05:38:51'),
(83, 10, 'Computer', 'Windows 10', 'Chrome', 'Mon-19-06-2023 08:33:35 am', '1687151015', '2023-06-19 04:33:35'),
(84, 2, 'Computer', 'Windows 10', 'Chrome', 'Mon-19-06-2023 08:34:00 am', '1687151040', '2023-06-19 04:34:00'),
(85, 2, 'Computer', 'Windows 10', 'Chrome', 'Tue-20-06-2023 10:29:06 am', '1687244346', '2023-06-20 06:29:06'),
(86, 10, 'Computer', 'Windows 10', 'Chrome', 'Tue-20-06-2023 10:46:06 am', '1687245366', '2023-06-20 06:46:06'),
(87, 10, 'Computer', 'Windows 10', 'Chrome', 'Tue-20-06-2023 02:09:19 pm', '1687257559', '2023-06-20 10:09:19'),
(88, 2, 'Computer', 'Windows 10', 'Chrome', 'Wed-21-06-2023 10:24:45 am', '1687330485', '2023-06-21 06:24:45'),
(89, 10, 'Computer', 'Windows 10', 'Chrome', 'Wed-21-06-2023 10:26:15 am', '1687330575', '2023-06-21 06:26:15'),
(90, 2, 'Computer', 'Windows 10', 'Chrome', 'Thu-22-06-2023 10:14:26 am', '1687416266', '2023-06-22 06:14:26'),
(91, 10, 'Computer', 'Windows 10', 'Chrome', 'Thu-22-06-2023 12:52:17 pm', '1687425737', '2023-06-22 08:52:17'),
(92, 10, 'Computer', 'Windows 10', 'Chrome', 'Thu-22-06-2023 03:21:39 pm', '1687434699', '2023-06-22 11:21:39'),
(93, 10, 'Computer', 'Windows 10', 'Chrome', 'Thu-22-06-2023 05:01:20 pm', '1687440680', '2023-06-22 13:01:20'),
(94, 10, 'Computer', 'Windows 10', 'Chrome', 'Fri-23-06-2023 06:27:38 pm', '1687532258', '2023-06-23 14:27:38'),
(95, 8, 'Computer', 'Windows 10', 'Chrome', 'Sat-24-06-2023 11:31:58 am', '1687593718', '2023-06-24 07:31:58'),
(96, 2, 'Computer', 'Windows 10', 'Chrome', 'Sat-24-06-2023 01:58:50 pm', '1687602530', '2023-06-24 09:58:50'),
(97, 2, 'Computer', 'Windows 10', 'Chrome', 'Sat-24-06-2023 02:00:26 pm', '1687602626', '2023-06-24 10:00:26'),
(98, 2, 'Computer', 'Windows 10', 'Chrome', 'Sat-24-06-2023 02:04:46 pm', '1687602886', '2023-06-24 10:04:46'),
(99, 10, 'Computer', 'Windows 10', 'Chrome', 'Sat-24-06-2023 03:31:28 pm', '1687608088', '2023-06-24 11:31:28'),
(100, 33, 'Computer', 'Windows 10', 'Chrome', 'Sat-24-06-2023 03:48:09 pm', '1687609089', '2023-06-24 11:48:09'),
(101, 10, 'Computer', 'Windows 10', 'Chrome', 'Sat-24-06-2023 03:58:14 pm', '1687609694', '2023-06-24 11:58:14'),
(102, 2, 'Computer', 'Windows 10', 'Chrome', 'Sun-25-06-2023 02:45:33 pm', '1687691733', '2023-06-25 10:45:33'),
(103, 10, 'Computer', 'Windows 10', 'Chrome', 'Sun-25-06-2023 03:12:24 pm', '1687693344', '2023-06-25 11:12:24'),
(104, 10, 'Computer', 'Windows 10', 'Chrome', 'Sun-25-06-2023 07:00:28 pm', '1687707028', '2023-06-25 15:00:28'),
(105, 2, 'Computer', 'Windows 10', 'Chrome', 'Mon-26-06-2023 09:54:08 am', '1687760648', '2023-06-26 05:54:08'),
(106, 10, 'Computer', 'Windows 10', 'Chrome', 'Mon-26-06-2023 09:55:34 am', '1687760734', '2023-06-26 05:55:34'),
(107, 10, 'Computer', 'Windows 10', 'Chrome', 'Mon-26-06-2023 12:30:05 pm', '1687770005', '2023-06-26 08:30:05'),
(108, 2, 'Computer', 'Windows 10', 'Chrome', 'Mon-26-06-2023 12:42:53 pm', '1687770773', '2023-06-26 08:42:53'),
(109, 2, 'Computer', 'Windows 10', 'Chrome', 'Tue-27-06-2023 08:22:47 am', '1687841567', '2023-06-27 04:22:47'),
(110, 10, 'Computer', 'Windows 10', 'Chrome', 'Tue-27-06-2023 08:23:31 am', '1687841611', '2023-06-27 04:23:31'),
(111, 10, 'Computer', 'Windows 10', 'Chrome', 'Tue-27-06-2023 11:03:02 am', '1687851182', '2023-06-27 07:03:02'),
(112, 10, 'Computer', 'Windows 10', 'Chrome', 'Tue-27-06-2023 05:45:33 pm', '1687875333', '2023-06-27 13:45:33'),
(113, 2, 'Computer', 'Windows 10', 'Chrome', 'Wed-28-06-2023 11:13:37 am', '1687938217', '2023-06-28 07:13:37'),
(114, 2, 'Computer', 'Windows 10', 'Chrome', 'Wed-28-06-2023 11:17:28 am', '1687938448', '2023-06-28 07:17:28'),
(115, 2, 'Computer', 'Windows 10', 'Chrome', 'Wed-28-06-2023 11:18:18 am', '1687938498', '2023-06-28 07:18:18'),
(116, 10, 'Computer', 'Windows 10', 'Chrome', 'Wed-28-06-2023 11:19:13 am', '1687938553', '2023-06-28 07:19:13'),
(117, 10, 'Computer', 'Windows 10', 'Chrome', 'Wed-28-06-2023 11:20:43 am', '1687938643', '2023-06-28 07:20:43'),
(118, 10, 'Computer', 'Windows 10', 'Chrome', 'Wed-28-06-2023 03:06:01 pm', '1687952161', '2023-06-28 11:06:01'),
(119, 10, 'Computer', 'Windows 10', 'Chrome', 'Wed-28-06-2023 08:08:00 pm', '1687970280', '2023-06-28 16:08:00'),
(120, 2, 'Computer', 'Windows 10', 'Chrome', 'Thu-29-06-2023 03:16:15 pm', '1688039175', '2023-06-29 11:16:15'),
(121, 2, 'Computer', 'Windows 10', 'Chrome', 'Fri-30-06-2023 09:43:14 am', '1688105594', '2023-06-30 05:43:14'),
(122, 10, 'Computer', 'Windows 10', 'Chrome', 'Fri-30-06-2023 10:56:01 am', '1688109961', '2023-06-30 06:56:01'),
(123, 10, 'Computer', 'Windows 10', 'Chrome', 'Fri-30-06-2023 02:41:19 pm', '1688123479', '2023-06-30 10:41:19'),
(124, 10, 'Computer', 'Windows 10', 'Chrome', 'Fri-30-06-2023 07:31:53 pm', '1688140913', '2023-06-30 15:31:53'),
(125, 10, 'Computer', 'Windows 10', 'Chrome', 'Fri-30-06-2023 07:42:21 pm', '1688141541', '2023-06-30 15:42:21'),
(126, 2, 'Computer', 'Windows 10', 'Chrome', 'Fri-30-06-2023 07:43:21 pm', '1688141601', '2023-06-30 15:43:21'),
(127, 2, 'Computer', 'Windows 10', 'Chrome', 'Sat-01-07-2023 09:35:58 am', '1688191558', '2023-07-01 05:35:58'),
(128, 10, 'Computer', 'Windows 10', 'Chrome', 'Sat-01-07-2023 09:38:49 am', '1688191729', '2023-07-01 05:38:49'),
(129, 10, 'Computer', 'Windows 10', 'Chrome', 'Sat-01-07-2023 02:15:28 pm', '1688208328', '2023-07-01 10:15:28'),
(130, 10, 'Computer', 'Windows 10', 'Chrome', 'Sat-01-07-2023 06:12:36 pm', '1688222556', '2023-07-01 14:12:36');

-- --------------------------------------------------------

--
-- Table structure for table `ven_invoice`
--

CREATE TABLE `ven_invoice` (
  `id` int(11) NOT NULL,
  `Admin_id` int(11) NOT NULL,
  `Vid` int(11) NOT NULL,
  `Date` varchar(50) NOT NULL,
  `V_invoice` int(11) NOT NULL,
  `Amount` decimal(10,2) NOT NULL,
  `Memo` varchar(2000) NOT NULL,
  `D_INV` varchar(10) NOT NULL DEFAULT 'INV#',
  `empty` int(10) NOT NULL,
  `Reg_date` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `ven_invoice`
--

INSERT INTO `ven_invoice` (`id`, `Admin_id`, `Vid`, `Date`, `V_invoice`, `Amount`, `Memo`, `D_INV`, `empty`, `Reg_date`) VALUES
(1, 1, 6, '2022-11-30', 222233, '300.00', 'yes hh', 'INV#', 0, '2022-11-30 04:55:46'),
(3, 2, 7, '2022-11-29', 11144, '500.00', 'yes', 'INV#', 0, '2022-11-30 08:24:46'),
(4, 2, 6, '2023-02-07', 22534, '500.65', 'invoice1', 'INV#', 0, '2023-02-07 12:37:38'),
(5, 2, 6, '2023-05-04', 56456, '500.00', 'invoice', 'INV#', 0, '2023-05-04 06:27:14'),
(6, 1, 6, '2023-05-04', 6564, '600.00', 'invoice', 'INV#', 0, '2023-05-04 06:28:00'),
(7, 1, 7, '2023-06-15', 5646, '100.00', 'V.Invoice', 'INV#', 0, '2023-06-15 13:53:56'),
(8, 1, 6, '2023-07-12', 4564, '100.00', 'invoice vn', 'INV#', 0, '2023-07-12 11:35:55');

-- --------------------------------------------------------

--
-- Table structure for table `ven_payment`
--

CREATE TABLE `ven_payment` (
  `id` int(11) NOT NULL,
  `Admin_id` int(11) NOT NULL,
  `Vid` int(11) NOT NULL,
  `Date` varchar(50) NOT NULL,
  `V_payment` int(11) NOT NULL,
  `Amount` decimal(10,2) NOT NULL,
  `Memo` varchar(2000) NOT NULL,
  `D_PV` varchar(10) NOT NULL DEFAULT 'PV#',
  `empty` int(10) NOT NULL,
  `Reg_date` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `ven_payment`
--

INSERT INTO `ven_payment` (`id`, `Admin_id`, `Vid`, `Date`, `V_payment`, `Amount`, `Memo`, `D_PV`, `empty`, `Reg_date`) VALUES
(3, 2, 6, '2022-12-01', 32, '100.00', 'no uyyy', 'PV#', 0, '2022-11-30 06:39:40'),
(4, 1, 7, '2022-11-30', 111, '200.00', 'sfsf', 'PV#', 0, '2022-11-30 06:40:49'),
(5, 1, 6, '2023-02-07', 1262, '100.00', 'okey', 'PV#', 0, '2023-02-07 12:44:15'),
(6, 2, 6, '2023-05-03', 1901, '600.65', 'PV', 'PV#', 0, '2023-05-04 06:46:46'),
(7, 1, 7, '2023-05-04', 3255, '30.00', 'PV', 'PV#', 0, '2023-05-04 06:47:35'),
(8, 1, 7, '2023-06-15', 330, '100.00', 'PV', 'PV#', 0, '2023-06-15 13:51:20');

-- --------------------------------------------------------

--
-- Table structure for table `web_contact`
--

CREATE TABLE `web_contact` (
  `id` int(11) NOT NULL,
  `Name` varchar(50) NOT NULL,
  `Email` varchar(50) NOT NULL,
  `Phone` bigint(20) NOT NULL,
  `Message` mediumtext NOT NULL,
  `Status` int(1) NOT NULL,
  `Memo` mediumtext NOT NULL,
  `RegDate` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `web_contact`
--

INSERT INTO `web_contact` (`id`, `Name`, `Email`, `Phone`, `Message`, `Status`, `Memo`, `RegDate`) VALUES
(1, 'ali', 'ali@gmail.com', 6666, 'jkshadjk', 1, 'waa loo shaqeyay', '2023-06-17 14:11:46'),
(2, 'Nur', 'nur@gmail.com', 61355856, 'Test', 1, 'kkk', '2023-06-17 14:11:46'),
(3, 'Nur1', 'nur@gmail.com1', 613558565, 'Test1', 1, 'okkkk41', '2023-06-17 14:11:46'),
(4, 'test', 'test@gmail.com', 635656, 'oke waa Tijabiaaye', 1, 'lllll', '2023-06-17 14:12:27'),
(5, 'Farax', 'farax@gmail.com', 61646563, 'hjhsddjkhds', 0, '', '2023-06-17 14:13:36'),
(6, 'Dahir', 'dahir@gmail.com', 654654564, 'dsfadsaad', 0, '', '2023-06-17 14:14:13'),
(7, 'Abdiqadir', 'abdiqadi@gmail.com', 610000, 'Test Cabasho ', 0, '', '2023-07-01 09:25:17');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `account`
--
ALTER TABLE `account`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `Acc_name` (`Acc_name`),
  ADD KEY `fk_Account_user` (`Admin_id`);

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
  ADD UNIQUE KEY `PV` (`PV`),
  ADD KEY `fk_cash_payment_account` (`Acc_id`),
  ADD KEY `fk_Admin_id_cash_payment_to_user` (`Admin_id`);

--
-- Indexes for table `cash_receipt`
--
ALTER TABLE `cash_receipt`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `RV` (`RV`),
  ADD KEY `fk_cash_receipt_account` (`Acc_id`),
  ADD KEY `fk_Admin_id_cash_receipt_to_user` (`Admin_id`);

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
  ADD KEY `fk_faq_user` (`Aid`);

--
-- Indexes for table `invoice`
--
ALTER TABLE `invoice`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `invoice` (`invoice`),
  ADD UNIQUE KEY `File` (`File`),
  ADD KEY `fk_invoice_user` (`Cid`),
  ADD KEY `fk_Admin_id_invoice_user` (`Admin_id`);

--
-- Indexes for table `limit_customer_bal`
--
ALTER TABLE `limit_customer_bal`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `Cid` (`Cid`),
  ADD KEY `fk_Limit_bal__user_Admin_id` (`Admin_id`);

--
-- Indexes for table `receipt`
--
ALTER TABLE `receipt`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `RV` (`RV`),
  ADD KEY `fk_receipt_user` (`Cid`),
  ADD KEY `fk_Admin_id_receipt_to_user` (`Admin_id`);

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
  ADD UNIQUE KEY `File` (`File`),
  ADD KEY `fk_tbl_order_user` (`Cid`),
  ADD KEY `fk_Admin_id_tbl_order_to_user` (`Admin_id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`ID`),
  ADD UNIQUE KEY `Com_name` (`Com_name`),
  ADD UNIQUE KEY `Email` (`Email`),
  ADD UNIQUE KEY `Picture` (`Picture`),
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
  ADD KEY `fk_ven_invoice_user` (`Vid`),
  ADD KEY `fk_Admin_id_Ven_invoice_to_user` (`Admin_id`);

--
-- Indexes for table `ven_payment`
--
ALTER TABLE `ven_payment`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_ven_payment_user` (`Vid`),
  ADD KEY `fk_Admin_id_Ven_payment_to_user` (`Admin_id`);

--
-- Indexes for table `web_contact`
--
ALTER TABLE `web_contact`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `account`
--
ALTER TABLE `account`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `apply_form`
--
ALTER TABLE `apply_form`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `cash_payment`
--
ALTER TABLE `cash_payment`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=68;

--
-- AUTO_INCREMENT for table `cash_receipt`
--
ALTER TABLE `cash_receipt`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=42;

--
-- AUTO_INCREMENT for table `debt_reminder`
--
ALTER TABLE `debt_reminder`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `faq`
--
ALTER TABLE `faq`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `invoice`
--
ALTER TABLE `invoice`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=103;

--
-- AUTO_INCREMENT for table `limit_customer_bal`
--
ALTER TABLE `limit_customer_bal`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `receipt`
--
ALTER TABLE `receipt`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=117;

--
-- AUTO_INCREMENT for table `setting`
--
ALTER TABLE `setting`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `support`
--
ALTER TABLE `support`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=47;

--
-- AUTO_INCREMENT for table `tbl_order`
--
ALTER TABLE `tbl_order`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=85;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;

--
-- AUTO_INCREMENT for table `user_info`
--
ALTER TABLE `user_info`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=131;

--
-- AUTO_INCREMENT for table `ven_invoice`
--
ALTER TABLE `ven_invoice`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `ven_payment`
--
ALTER TABLE `ven_payment`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `web_contact`
--
ALTER TABLE `web_contact`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `account`
--
ALTER TABLE `account`
  ADD CONSTRAINT `fk_Account_user` FOREIGN KEY (`Admin_id`) REFERENCES `user` (`ID`);

--
-- Constraints for table `cash_payment`
--
ALTER TABLE `cash_payment`
  ADD CONSTRAINT `fk_Admin_id_cash_payment_to_user` FOREIGN KEY (`Admin_id`) REFERENCES `user` (`ID`),
  ADD CONSTRAINT `fk_cash_payment_account` FOREIGN KEY (`Acc_id`) REFERENCES `account` (`id`);

--
-- Constraints for table `cash_receipt`
--
ALTER TABLE `cash_receipt`
  ADD CONSTRAINT `fk_Admin_id_cash_receipt_to_user` FOREIGN KEY (`Admin_id`) REFERENCES `user` (`ID`),
  ADD CONSTRAINT `fk_cash_receipt_account` FOREIGN KEY (`Acc_id`) REFERENCES `account` (`id`);

--
-- Constraints for table `debt_reminder`
--
ALTER TABLE `debt_reminder`
  ADD CONSTRAINT `fk_debt_reminder_user` FOREIGN KEY (`Cid`) REFERENCES `user` (`ID`);

--
-- Constraints for table `faq`
--
ALTER TABLE `faq`
  ADD CONSTRAINT `fk_faq_user` FOREIGN KEY (`Aid`) REFERENCES `user` (`ID`);

--
-- Constraints for table `invoice`
--
ALTER TABLE `invoice`
  ADD CONSTRAINT `fk_Admin_id_invoice_user` FOREIGN KEY (`Admin_id`) REFERENCES `user` (`ID`),
  ADD CONSTRAINT `fk_invoice_user` FOREIGN KEY (`Cid`) REFERENCES `user` (`ID`);

--
-- Constraints for table `limit_customer_bal`
--
ALTER TABLE `limit_customer_bal`
  ADD CONSTRAINT `fk_Limit_bal__user` FOREIGN KEY (`Cid`) REFERENCES `user` (`ID`),
  ADD CONSTRAINT `fk_Limit_bal__user_Admin_id` FOREIGN KEY (`Admin_id`) REFERENCES `user` (`ID`);

--
-- Constraints for table `receipt`
--
ALTER TABLE `receipt`
  ADD CONSTRAINT `fk_Admin_id_receipt_to_user` FOREIGN KEY (`Admin_id`) REFERENCES `user` (`ID`),
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
  ADD CONSTRAINT `fk_Admin_id_Ven_invoice_to_user` FOREIGN KEY (`Admin_id`) REFERENCES `user` (`ID`),
  ADD CONSTRAINT `fk_ven_invoice_user` FOREIGN KEY (`Vid`) REFERENCES `user` (`ID`);

--
-- Constraints for table `ven_payment`
--
ALTER TABLE `ven_payment`
  ADD CONSTRAINT `fk_Admin_id_Ven_payment_to_user` FOREIGN KEY (`Admin_id`) REFERENCES `user` (`ID`),
  ADD CONSTRAINT `fk_ven_payment_user` FOREIGN KEY (`Vid`) REFERENCES `user` (`ID`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
