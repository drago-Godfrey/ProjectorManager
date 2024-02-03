-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 23, 2024 at 03:53 PM
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
-- Database: `projector`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` int(11) NOT NULL,
  `adminID` varchar(13) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `adminID`, `password`) VALUES
(1, '2102302217767', 'hello'),
(2, '2102302216868', 'acf4b89d3d503d8252c9c4ba75ddbf6d'),
(3, '2102302217502', 'rough'),
(4, '2102302216942', '0935c5b46d452b766f0ce0b37d14f717');

-- --------------------------------------------------------

--
-- Table structure for table `admins`
--

CREATE TABLE `admins` (
  `id` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `adminID` bigint(13) NOT NULL,
  `phone_number` varchar(10) NOT NULL,
  `role` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `admins`
--

INSERT INTO `admins` (`id`, `username`, `password`, `email`, `adminID`, `phone_number`, `role`) VALUES
(1, 'Godfrey Abel Mayila', '$2y$10$ZdzkOuh40cuUEj9xfP3WJeLZKK7FmUFXlBtkZa2L/PN9qf1tR.rrK', 'muncogod@gmail.com', 2102302217767, '0762452062', 'Super Admin'),
(2, 'Jon Snow', '$2y$10$tsAmLAQbkN8Q/wanRCzhFeTtbRGBd86tKgb/mMuwUYYKsRNfyzkMm', 'snow@world.com', 9874563210123, '0789654123', 'Admin'),
(3, 'Brahim Jack', '$2y$10$/l9y4tIxUmooLeF0KUvZwOi5egi74NAGDUm4aCN9hpW9.cPSXsNqS', 'brahim@real.com', 2103456789852, '0654123987', 'Admin'),
(5, 'Jack Ryan', '$2y$10$HBLRwW5sd4iVcG/ZIPI.xORr/dPVCia9cMrckSRqMilGkGhlESETq', 'jack@da.com', 2102302210000, '0786847414', 'Super Admin');

-- --------------------------------------------------------

--
-- Table structure for table `borrowed_projectors`
--

CREATE TABLE `borrowed_projectors` (
  `id` int(11) NOT NULL,
  `employee_id` bigint(13) DEFAULT NULL,
  `projector_model` varchar(255) DEFAULT NULL,
  `comments` text DEFAULT NULL,
  `borrow_date` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `borrowed_projectors`
--

INSERT INTO `borrowed_projectors` (`id`, `employee_id`, `projector_model`, `comments`, `borrow_date`) VALUES
(4, 1111999977773, 'BENT l-0001', 'TT10', '2024-01-22 08:31:30');

-- --------------------------------------------------------

--
-- Table structure for table `borrowed_projectors_alltime`
--

CREATE TABLE `borrowed_projectors_alltime` (
  `id` int(11) NOT NULL,
  `employee_id` bigint(13) DEFAULT NULL,
  `projector_model` varchar(255) DEFAULT NULL,
  `comments` text DEFAULT NULL,
  `borrow_date` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `borrowed_projectors_alltime`
--

INSERT INTO `borrowed_projectors_alltime` (`id`, `employee_id`, `projector_model`, `comments`, `borrow_date`) VALUES
(1, 2102302217767, 'Epson Eb W06', 'Hinge missing', '2024-01-22 08:04:08'),
(2, 1111999977770, 'BENT l-0001', 'A11', '2024-01-22 08:19:41'),
(3, 1526437890643, 'Dell LK235 4000LMS ', 'B15', '2024-01-22 08:20:25'),
(4, 1532807543267, 'BENQ LV435 4000LMS 1080P', 'TT4', '2024-01-22 08:31:09'),
(5, 1111999977773, 'BENT l-0001', 'TT10', '2024-01-22 08:31:30');

-- --------------------------------------------------------

--
-- Table structure for table `projector`
--

CREATE TABLE `projector` (
  `id` int(11) NOT NULL,
  `Model` varchar(255) DEFAULT NULL,
  `Conditions` varchar(255) DEFAULT NULL,
  `SerialNumber` varchar(255) DEFAULT NULL,
  `Colour` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `projector`
--

INSERT INTO `projector` (`id`, `Model`, `Conditions`, `SerialNumber`, `Colour`) VALUES
(1, 'BENQ LH730 4000LMS 1080P LED PROJECTOR', 'New', '7894561230', 'Black'),
(2, 'Epson Eb W06', 'New', '4561230789', 'White'),
(3, 'BENQ LV435 4000LMS 1080P', 'New', '345753257', 'White'),
(4, 'Dell LK235 4000LMS ', 'New', '57448392976', 'Black'),
(5, 'BENT l-0001', 'New ', '025479631', 'Gray'),
(6, 'Optoma UHD55', 'New', '5556660001', 'White'),
(8, 'Hisense PX1-Pro', 'New', '879000123', 'Black');

-- --------------------------------------------------------

--
-- Table structure for table `returned_projectors`
--

CREATE TABLE `returned_projectors` (
  `id` int(11) NOT NULL,
  `borrow_id` bigint(13) DEFAULT NULL,
  `comments` text DEFAULT NULL,
  `return_date` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `returned_projectors`
--

INSERT INTO `returned_projectors` (`id`, `borrow_id`, `comments`, `return_date`) VALUES
(1, 2102302217767, 'Returned with nothing missing', '2024-01-22 08:15:54'),
(2, 1111999977770, 'Perfect', '2024-01-22 08:20:45'),
(3, 1526437890643, 'Well', '2024-01-22 08:28:18'),
(4, 1532807543267, 'Okay', '2024-01-22 08:31:59');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(255) NOT NULL,
  `EmployeeID` varchar(13) DEFAULT NULL,
  `UserName` varchar(255) DEFAULT NULL,
  `Contact` varchar(10) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `EmployeeID`, `UserName`, `Contact`, `email`) VALUES
(1, '1111999977770', 'Drago Khan', '0762777700', 'khan@gmail.com'),
(2, '1111999977771', 'Yan Sommer', '0745012398', 'yan@gmail.com'),
(3, '1111999977773', 'Dan Jonathan', '0775757575', 'dan@gmail.com'),
(4, '1678904236789', 'Draxler Gray', '0765342173', 'drax@gmail.com'),
(5, '1532807543267', 'Grey Swai', '0754321764', 'grey@gmail.com'),
(6, '1542765432904', 'Fred Gibbs', '0743278912', 'gri@gmail.com'),
(7, '1526437890643', 'Herny Vixen', '0756432184', 'hwe@gmail.com'),
(8, '1425789453786', 'Justine Future', '0756432186', 'mre@gmail.com'),
(9, '1326743954673', 'Sia Bianca', '0765432178', 'nwe@gmail.com'),
(10, '1325678435674', 'Harry Michael', '0765543217', 'vre@gmail.com'),
(11, '2102302217767', 'MayilaDrago', '0762452062', 'drago@dit.com'),
(12, '1111123012456', 'TIffah Drago', '0765478945', 'tiffah@gmail.com'),
(14, '2102302218484', 'Chainsmoker The', '0741526398', 'the@gmail.com'),
(15, '2102302211515', 'Vivian John', '0784848484', 'viv@yahoo.com'),
(17, '2102302212020', 'John Henry', '0632154789', 'en@yahoo.com'),
(18, '2102302210010', 'Johnie Walker', '0654123987', 'walker@dit.com');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `adminID` (`adminID`);

--
-- Indexes for table `admins`
--
ALTER TABLE `admins`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `borrowed_projectors`
--
ALTER TABLE `borrowed_projectors`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `borrowed_projectors_alltime`
--
ALTER TABLE `borrowed_projectors_alltime`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `projector`
--
ALTER TABLE `projector`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `returned_projectors`
--
ALTER TABLE `returned_projectors`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `EmployeeID` (`EmployeeID`),
  ADD UNIQUE KEY `email` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `admins`
--
ALTER TABLE `admins`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `borrowed_projectors`
--
ALTER TABLE `borrowed_projectors`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `borrowed_projectors_alltime`
--
ALTER TABLE `borrowed_projectors_alltime`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `projector`
--
ALTER TABLE `projector`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `returned_projectors`
--
ALTER TABLE `returned_projectors`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
