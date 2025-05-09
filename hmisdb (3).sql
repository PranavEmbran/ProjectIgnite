-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 06, 2025 at 02:07 PM
-- Server version: 10.4.22-MariaDB
-- PHP Version: 7.3.33

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `hmisdb`
--

-- --------------------------------------------------------

--
-- Table structure for table `login`
--

CREATE TABLE `login` (
  `Userid` varchar(20) NOT NULL,
  `Password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `login`
--

INSERT INTO `login` (`Userid`, `Password`) VALUES
('HemaP', '123'),
('PranavES', '123'),
('SivaDE', '123');

-- --------------------------------------------------------

--
-- Table structure for table `patientdetails`
--

CREATE TABLE `patientdetails` (
  `id` int(11) NOT NULL,
  `firstname` varchar(20) NOT NULL,
  `lastname` varchar(20) NOT NULL,
  `age` int(3) NOT NULL,
  `phoneno` varchar(15) NOT NULL,
  `gender` varchar(3) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `patientdetails`
--

INSERT INTO `patientdetails` (`id`, `firstname`, `lastname`, `age`, `phoneno`, `gender`) VALUES
(9, 'Hema', 'Ammal', 55, '9877654332', 'F'),
(10, 'Vigneshan', 'Sharma', 33, '8947563829', 'M'),
(11, 'Parthasarathi', 'Sharma', 45, '3465789654', 'M'),
(12, 'Abdul', 'Kalam', 40, '2398675432', 'M'),
(13, 'Gopala', 'Krishna', 55, '1265347833', 'M'),
(14, 'Parthasarathi', 'Sharma', 30, '3456789043', 'M'),
(15, 'Aishwarya', 'Ammal', 45, '3459876574', 'F'),
(16, 'Nithin', 'Richard', 23, '3445566778', 'M'),
(17, 'Narayanan', 'Katakada', 55, '2398475647', 'M'),
(18, 'Shiva', 'Shankar', 55, '1234478978', 'M'),
(19, 'Nithin', 'Richard', 40, '2398475647', 'M');

-- --------------------------------------------------------

--
-- Stand-in structure for view `patient visit joined`
-- (See below for the actual view)
--
CREATE TABLE `patient visit joined` (
`visit_id` int(11)
,`patient_id` int(11)
,`firstname` varchar(20)
,`lastname` varchar(20)
,`age` int(3)
,`phoneno` varchar(15)
,`gender` varchar(3)
,`Reason_for_visit` text
,`Discharge_status` varchar(15)
,`IP_OP` varchar(5)
,`Visit_Date` date
);

-- --------------------------------------------------------

--
-- Table structure for table `pharma_items`
--

CREATE TABLE `pharma_items` (
  `Item_id` int(8) NOT NULL,
  `Item_name` varchar(50) NOT NULL,
  `Quantity` int(5) NOT NULL,
  `Expiry_date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `pharma_items`
--

INSERT INTO `pharma_items` (`Item_id`, `Item_name`, `Quantity`, `Expiry_date`) VALUES
(1, 'Pracetamol', 10, '2026-04-30');

-- --------------------------------------------------------

--
-- Table structure for table `visitdetails`
--

CREATE TABLE `visitdetails` (
  `id` int(11) NOT NULL,
  `Patient_id` int(11) NOT NULL,
  `Reason_for_visit` text NOT NULL,
  `Discharge_status` varchar(15) NOT NULL,
  `IP_OP` varchar(5) NOT NULL,
  `Consultation_fee` decimal(10,2) NOT NULL DEFAULT 0.00,
  `Procedure_charge` decimal(10,2) NOT NULL DEFAULT 0.00,
  `Lab_charge` decimal(10,2) NOT NULL,
  `Equipment_charge` decimal(10,2) NOT NULL DEFAULT 0.00,
  `Medicine_charge` decimal(10,2) NOT NULL DEFAULT 0.00,
  `Room_charge` decimal(10,2) NOT NULL DEFAULT 0.00,
  `Miscellaneous_charge` decimal(10,2) NOT NULL DEFAULT 0.00,
  `Visit_Date` date NOT NULL,
  `Bill_Date` date DEFAULT NULL,
  `Total_amount` decimal(10,2) GENERATED ALWAYS AS (`Consultation_fee` + `Procedure_charge` + `Equipment_charge` + `Medicine_charge` + `Room_charge` + `Lab_charge` + `Miscellaneous_charge`) STORED,
  `Payed_amount` decimal(10,2) DEFAULT NULL,
  `Payable_amount` decimal(10,2) GENERATED ALWAYS AS (`Total_amount` - coalesce(`Payed_amount`,0)) STORED
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `visitdetails`
--

INSERT INTO `visitdetails` (`id`, `Patient_id`, `Reason_for_visit`, `Discharge_status`, `IP_OP`, `Consultation_fee`, `Procedure_charge`, `Lab_charge`, `Equipment_charge`, `Medicine_charge`, `Room_charge`, `Miscellaneous_charge`, `Visit_Date`, `Bill_Date`, `Payed_amount`) VALUES
(31, 9, 'Headache', 'Active', 'OP', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '2025-04-21', NULL, NULL),
(33, 11, 'Fever', 'Discharged', 'IP', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '2025-04-21', NULL, NULL),
(34, 10, 'Headache', 'Active', 'OP', '50.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '2025-04-22', '2025-04-22', '0.00'),
(38, 13, 'Headache', 'Active', 'OP', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '2025-04-22', NULL, NULL),
(40, 13, 'Nausea', 'Active', 'OP', '100.00', '0.00', '0.00', '0.00', '0.00', '0.00', '150.00', '2025-04-23', '2025-04-22', '0.00'),
(42, 15, 'Fever', 'Active', 'IP', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '2025-04-24', NULL, NULL),
(44, 17, 'Headache', 'Active', 'OP', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '2025-04-28', NULL, NULL),
(45, 18, 'Cold', 'Active', 'OP', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '2025-04-30', NULL, NULL),
(46, 19, 'Headache', 'Discharged', 'OP', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '2025-04-25', NULL, NULL),
(48, 18, 'Headache', 'Discharged', 'IP', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '2025-03-01', NULL, NULL),
(49, 17, 'Legache', 'Active', 'OP', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '2025-04-30', NULL, NULL);

-- --------------------------------------------------------

--
-- Structure for view `patient visit joined`
--
DROP TABLE IF EXISTS `patient visit joined`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `patient visit joined`  AS SELECT `v`.`id` AS `visit_id`, `p`.`id` AS `patient_id`, `p`.`firstname` AS `firstname`, `p`.`lastname` AS `lastname`, `p`.`age` AS `age`, `p`.`phoneno` AS `phoneno`, `p`.`gender` AS `gender`, `v`.`Reason_for_visit` AS `Reason_for_visit`, `v`.`Discharge_status` AS `Discharge_status`, `v`.`IP_OP` AS `IP_OP`, `v`.`Visit_Date` AS `Visit_Date` FROM (`patientdetails` `p` join `visitdetails` `v` on(`v`.`Patient_id` = `p`.`id`)) ORDER BY `v`.`Visit_Date` DESC ;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `login`
--
ALTER TABLE `login`
  ADD PRIMARY KEY (`Userid`);

--
-- Indexes for table `patientdetails`
--
ALTER TABLE `patientdetails`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pharma_items`
--
ALTER TABLE `pharma_items`
  ADD PRIMARY KEY (`Item_id`);

--
-- Indexes for table `visitdetails`
--
ALTER TABLE `visitdetails`
  ADD PRIMARY KEY (`id`),
  ADD KEY `Patient_id` (`Patient_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `patientdetails`
--
ALTER TABLE `patientdetails`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `pharma_items`
--
ALTER TABLE `pharma_items`
  MODIFY `Item_id` int(8) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `visitdetails`
--
ALTER TABLE `visitdetails`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=50;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `visitdetails`
--
ALTER TABLE `visitdetails`
  ADD CONSTRAINT `visitdetails_ibfk_1` FOREIGN KEY (`Patient_id`) REFERENCES `patientdetails` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
