-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 07, 2025 at 06:09 PM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.0.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `nutritious_food`
--

-- --------------------------------------------------------

--
-- Table structure for table `account_login`
--

CREATE TABLE `account_login` (
  `id` int(11) NOT NULL,
  `identifier` varchar(255) NOT NULL,
  `password` varchar(50) NOT NULL,
  `role` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `account_login`
--

INSERT INTO `account_login` (`id`, `identifier`, `password`, `role`) VALUES
(1, 'admin', 'admin', 'admin'),
(7, '1234567892', '12345', 'teacher'),
(8, '9876543210', '12345', 'beneficiary'),
(10, '8765432190', '12345', 'beneficiary');

-- --------------------------------------------------------

--
-- Table structure for table `anganwadi_centers`
--

CREATE TABLE `anganwadi_centers` (
  `id` int(11) NOT NULL,
  `anganwadi_name` varchar(255) NOT NULL,
  `location` varchar(255) NOT NULL,
  `district` varchar(255) NOT NULL,
  `taluk` varchar(160) NOT NULL,
  `address` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `anganwadi_centers`
--

INSERT INTO `anganwadi_centers` (`id`, `anganwadi_name`, `location`, `district`, `taluk`, `address`) VALUES
(2, 'Sample name', 'Haveri', 'Haveri', 'Haveri', 'Address will goes');

-- --------------------------------------------------------

--
-- Table structure for table `anganwadi_teachers`
--

CREATE TABLE `anganwadi_teachers` (
  `teacher_id` int(11) NOT NULL,
  `anganwadi_id` int(11) NOT NULL,
  `teacher_name` varchar(50) NOT NULL,
  `contact_number` double NOT NULL,
  `gender` varchar(20) NOT NULL,
  `DOB` varchar(30) NOT NULL,
  `created_date` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `anganwadi_teachers`
--

INSERT INTO `anganwadi_teachers` (`teacher_id`, `anganwadi_id`, `teacher_name`, `contact_number`, `gender`, `DOB`, `created_date`) VALUES
(2, 2, 'Laxmi', 1234567892, 'female', '2025-06-05', '2025-06-07 11:15:00');

-- --------------------------------------------------------

--
-- Table structure for table `beneficiaries`
--

CREATE TABLE `beneficiaries` (
  `beneficiary_id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `DOB` varchar(20) NOT NULL,
  `adhar_number` double NOT NULL,
  `contact_number` double NOT NULL,
  `anganwadi_center_id` int(11) NOT NULL,
  `husband_name` varchar(50) NOT NULL,
  `mother_card_id` double NOT NULL,
  `prenatal_weight` int(11) DEFAULT NULL,
  `postnatal_weight` int(11) DEFAULT NULL,
  `baby_birth_date` varchar(11) DEFAULT NULL,
  `baby_birth_weight` int(11) DEFAULT NULL,
  `_3Years` int(11) DEFAULT NULL,
  `_6Years` int(11) DEFAULT NULL,
  `registered_date` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `beneficiaries`
--

INSERT INTO `beneficiaries` (`beneficiary_id`, `name`, `DOB`, `adhar_number`, `contact_number`, `anganwadi_center_id`, `husband_name`, `mother_card_id`, `prenatal_weight`, `postnatal_weight`, `baby_birth_date`, `baby_birth_weight`, `_3Years`, `_6Years`, `registered_date`) VALUES
(7, 'Pooja', '2025-06-07', 123456789012, 9876543210, 2, 'R', 123456, 1, 2, '2025-06-07', 3, 4, 5, '2025-06-07 11:33:16');

-- --------------------------------------------------------

--
-- Table structure for table `items_data`
--

CREATE TABLE `items_data` (
  `item_id` int(11) NOT NULL,
  `item_name` varchar(100) NOT NULL,
  `prenatal_qty` float NOT NULL,
  `postnatal_qty` float NOT NULL,
  `3Years_qty` float NOT NULL,
  `6Years_qty` float NOT NULL,
  `created_date_time` datetime NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `items_data`
--

INSERT INTO `items_data` (`item_id`, `item_name`, `prenatal_qty`, `postnatal_qty`, `3Years_qty`, `6Years_qty`, `created_date_time`) VALUES
(9, 'Rice', 2, 2, 1, 2, '2025-06-07 16:15:54'),
(10, 'Wheat', 1, 3, 2.5, 3, '2025-06-07 16:36:00');

-- --------------------------------------------------------

--
-- Table structure for table `items_history`
--

CREATE TABLE `items_history` (
  `history_id` int(11) NOT NULL,
  `item_name` varchar(255) NOT NULL,
  `item_quantity` double NOT NULL,
  `beneficiary_id` int(11) NOT NULL,
  `current_stage` varchar(50) NOT NULL,
  `created_date_time` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `items_history`
--

INSERT INTO `items_history` (`history_id`, `item_name`, `item_quantity`, `beneficiary_id`, `current_stage`, `created_date_time`) VALUES
(12, 'Wheat', 1, 7, 'Prenatal', '2025-06-07 16:36:12'),
(13, 'Rice', 2, 7, 'Postnatal', '2025-06-07 16:36:20');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `account_login`
--
ALTER TABLE `account_login`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `anganwadi_centers`
--
ALTER TABLE `anganwadi_centers`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `anganwadi_teachers`
--
ALTER TABLE `anganwadi_teachers`
  ADD PRIMARY KEY (`teacher_id`),
  ADD KEY `anganwadi_id` (`anganwadi_id`);

--
-- Indexes for table `beneficiaries`
--
ALTER TABLE `beneficiaries`
  ADD PRIMARY KEY (`beneficiary_id`);

--
-- Indexes for table `items_data`
--
ALTER TABLE `items_data`
  ADD PRIMARY KEY (`item_id`);

--
-- Indexes for table `items_history`
--
ALTER TABLE `items_history`
  ADD PRIMARY KEY (`history_id`),
  ADD KEY `beneficiary_id` (`beneficiary_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `account_login`
--
ALTER TABLE `account_login`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `anganwadi_centers`
--
ALTER TABLE `anganwadi_centers`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `anganwadi_teachers`
--
ALTER TABLE `anganwadi_teachers`
  MODIFY `teacher_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `beneficiaries`
--
ALTER TABLE `beneficiaries`
  MODIFY `beneficiary_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `items_data`
--
ALTER TABLE `items_data`
  MODIFY `item_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `items_history`
--
ALTER TABLE `items_history`
  MODIFY `history_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `anganwadi_teachers`
--
ALTER TABLE `anganwadi_teachers`
  ADD CONSTRAINT `anganwadi_teachers_ibfk_1` FOREIGN KEY (`anganwadi_id`) REFERENCES `anganwadi_centers` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `items_history`
--
ALTER TABLE `items_history`
  ADD CONSTRAINT `items_history_ibfk_1` FOREIGN KEY (`beneficiary_id`) REFERENCES `beneficiaries` (`beneficiary_id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
