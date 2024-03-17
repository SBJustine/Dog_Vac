-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 08, 2024 at 04:22 AM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.1.17

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `vaccine`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` int(11) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp(),
  `type` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `email`, `password`, `created_at`, `type`) VALUES
(1, 'kim@gmail.com', 'admin', '2023-09-29 09:29:06', 'admin');

-- --------------------------------------------------------

--
-- Table structure for table `admin_users`
--

CREATE TABLE `admin_users` (
  `admin_id` int(11) NOT NULL,
  `fullname` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `date_added` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `admin_users`
--

INSERT INTO `admin_users` (`admin_id`, `fullname`, `email`, `password`, `date_added`) VALUES
(1, 'Kimchi Concha', 'kim@gmail.com', 'admin', '2024-02-26 02:32:45'),
(2, 'Mashen Geniston', 'mashen@gmail.com', 'mashen', '2024-02-26 02:32:45'),
(3, 'nicole', 'cole@gmail.com', '123', '2024-02-26 02:32:45'),
(4, 'Mash', 'mash@gmail.com', 'mash123', '2024-02-26 02:32:45'),
(5, 'Gardson Binasbas', 'gards@gmail.com', 'gards123', '2024-02-26 02:32:45'),
(6, 'Ste', 'kim@gmail.com', 'admin', '2024-02-25 19:46:00'),
(7, 'Stell Ajero', 'stell@gmail.com', 'stell', '2024-02-26 02:46:00'),
(8, 'Van Van', 'van@gmail.com', 'van123', '2024-03-03 20:53:00');

-- --------------------------------------------------------

--
-- Table structure for table `appointments`
--

CREATE TABLE `appointments` (
  `appointmentId` int(11) NOT NULL,
  `appointmentName` varchar(50) NOT NULL,
  `appointmentPetName` varchar(50) NOT NULL,
  `vaccine` enum('one','two','three') NOT NULL,
  `appointmentDate` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `appointmentContactNumber` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `appointments`
--

INSERT INTO `appointments` (`appointmentId`, `appointmentName`, `appointmentPetName`, `vaccine`, `appointmentDate`, `appointmentContactNumber`) VALUES
(1, 'John Snow', 'Wolf', 'one', '2023-11-05 08:10:26', '09090909099'),
(2, 'John Doe', 'Spike', 'one', '2023-11-08 16:00:00', '09090909099'),
(3, 'Jorge Bugwak', 'Snow', 'two', '2023-11-08 21:34:00', '09090909099'),
(4, 'Jov Geni', 'Mash', 'one', '2024-02-05 06:59:23', '09090909099');

-- --------------------------------------------------------

--
-- Table structure for table `attendance_table`
--

CREATE TABLE `attendance_table` (
  `attendanceID` int(11) NOT NULL,
  `employeeID` int(11) NOT NULL,
  `employeeName` varchar(50) NOT NULL,
  `numOfDaysPresent` int(11) NOT NULL,
  `numOfDaysAbsent` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `client_users`
--

CREATE TABLE `client_users` (
  `client_id` int(11) NOT NULL,
  `client_fullname` varchar(50) NOT NULL,
  `client_address` varchar(50) NOT NULL,
  `phone_number` varchar(50) NOT NULL,
  `client_email` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `sex` enum('Male','Female') NOT NULL,
  `client_status` enum('Active','In-Active') NOT NULL,
  `date_added` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `client_users`
--

INSERT INTO `client_users` (`client_id`, `client_fullname`, `client_address`, `phone_number`, `client_email`, `password`, `sex`, `client_status`, `date_added`) VALUES
(1, 'Jovelyn Geniston', 'Loon', '09127903673', 'jovelyn@gmail.com', 'jovelyn123', 'Female', 'Active', '2023-10-18 01:38:58'),
(2, 'Kim Concha', 'Tubigon', '09127903673', 'kim@gmail.com', 'kim', 'Male', 'Active', '0000-00-00 00:00:00'),
(3, 'Nicole Palwa', 'Tubigon', '09090909090', 'nicole@gmail.com', '12345', 'Male', 'Active', '2023-11-12 16:00:00'),
(4, 'Ken Suson', 'Manila', '09090909090', 'ken@gmail.com', 'ken123', 'Male', 'Active', '2023-11-12 18:03:00'),
(5, 'Do Do Hee', 'Korea', '09090909090', 'dohee@gmail.com', 'dohee', 'Female', 'Active', '2024-01-04 06:59:00'),
(6, 'nicole palwa', 'tubigon', '09090909090', 'cole@gmail.com', 'cole123', 'Female', 'Active', '2024-01-23 22:48:00'),
(7, 'JK ', 'USA', '09090909090', 'jk@gmail.com', 'jk123', 'Male', 'Active', '2024-01-31 18:44:00'),
(8, 'Gardson Binasbas', 'Tubigon', '09090909090', 'gards@gmail.com', '123', 'Male', 'Active', '2024-02-12 01:36:00'),
(9, 'Jay Ar', 'Siquijor', '09127903673', 'jay@gmail.com', 'jay123', 'Male', 'Active', '2024-03-06 18:29:00');

-- --------------------------------------------------------

--
-- Table structure for table `employee_table`
--

CREATE TABLE `employee_table` (
  `employeeID` int(11) NOT NULL,
  `employeeName` varchar(50) NOT NULL,
  `employeePosition` enum('Veterinarian','Groomer') NOT NULL,
  `employeeAddress` varchar(50) NOT NULL,
  `employeeAge` int(11) NOT NULL,
  `employeeSex` enum('Male','Female') NOT NULL,
  `employeePhoneNum` int(11) NOT NULL,
  `employeeStatus` enum('Active','Inactive') NOT NULL,
  `employeeAdded` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `employee_table`
--

INSERT INTO `employee_table` (`employeeID`, `employeeName`, `employeePosition`, `employeeAddress`, `employeeAge`, `employeeSex`, `employeePhoneNum`, `employeeStatus`, `employeeAdded`) VALUES
(1, 'Doc Edu', 'Veterinarian', 'Tagbi', 32, 'Male', 2147483647, 'Active', '2024-02-12 07:36:00'),
(2, 'Gardson Binasbas', 'Groomer', 'Potohan', 30, 'Male', 2147483647, 'Active', '2024-02-25 01:04:00'),
(3, 'Doc Van', 'Veterinarian', 'Tagbi', 21, 'Female', 2147483647, 'Active', '2024-03-03 20:54:00');

-- --------------------------------------------------------

--
-- Table structure for table `owner_users`
--

CREATE TABLE `owner_users` (
  `owner_id` int(11) NOT NULL,
  `client_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `pet_users`
--

CREATE TABLE `pet_users` (
  `pet_id` int(11) NOT NULL,
  `client_id` int(11) NOT NULL,
  `pet_name` varchar(50) NOT NULL,
  `pet_breed` varchar(50) NOT NULL,
  `pet_age` int(11) NOT NULL,
  `pet_gender` enum('Male','Female') NOT NULL,
  `pet_species` enum('Dog','Cat') NOT NULL,
  `pet_color` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `pet_users`
--

INSERT INTO `pet_users` (`pet_id`, `client_id`, `pet_name`, `pet_breed`, `pet_age`, `pet_gender`, `pet_species`, `pet_color`) VALUES
(6, 1, 'Trixie', 'Dobberman', 3, 'Male', 'Dog', 'Black, Brown'),
(7, 2, 'Stark', 'Belgian', 2, 'Male', 'Dog', 'Black'),
(8, 1, 'Stark', 'Belgian', 2, 'Male', 'Dog', 'Black'),
(9, 2, 'Browny', 'Askal', 2, 'Male', 'Dog', 'White'),
(10, 1, 'Tanny', 'Askal', 5, 'Female', 'Dog', 'Brown, Black'),
(21, 3, 'Cici', 'Askal', 2, 'Male', 'Dog', 'Brown, Black'),
(22, 3, 'Kiki', 'Askal', 2, 'Male', 'Dog', 'White'),
(23, 4, 'Kenny', 'Dalmasian', 2, 'Male', 'Dog', 'White'),
(24, 4, 'Kens', 'Dalmasian', 5, 'Male', 'Dog', 'Black'),
(25, 7, 'JACK', 'Dalmasian', 11, 'Male', 'Dog', 'Brown');

-- --------------------------------------------------------

--
-- Table structure for table `product_table`
--

CREATE TABLE `product_table` (
  `productID` int(11) NOT NULL,
  `productName` varchar(50) NOT NULL,
  `cost` int(11) NOT NULL,
  `quantity` int(11) NOT NULL,
  `category` enum('Dog','Cat') NOT NULL,
  `dateAdded` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `product_table`
--

INSERT INTO `product_table` (`productID`, `productName`, `cost`, `quantity`, `category`, `dateAdded`) VALUES
(1, 'royal dog food', 165, 2, 'Dog', '2024-02-12 08:01:00'),
(2, 'toys', 100, 5, 'Dog', '2024-02-12 01:46:00'),
(3, 'Pet Food', 150, 50, 'Cat', '2024-03-01 22:53:00');

-- --------------------------------------------------------

--
-- Table structure for table `purchase_table`
--

CREATE TABLE `purchase_table` (
  `purchaseID` int(11) NOT NULL,
  `productID` int(11) NOT NULL,
  `date_purchased` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `quantity_purchased` int(11) NOT NULL,
  `total_cost` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `purchase_table`
--

INSERT INTO `purchase_table` (`purchaseID`, `productID`, `date_purchased`, `quantity_purchased`, `total_cost`) VALUES
(1, 1, '2024-03-04 02:14:00', 2, 50),
(2, 2, '2024-03-04 02:26:00', 9, 50),
(3, 1, '2024-03-06 17:55:00', 10, 20);

-- --------------------------------------------------------

--
-- Table structure for table `reports`
--

CREATE TABLE `reports` (
  `report_id` int(11) NOT NULL,
  `report_appointment` varchar(50) NOT NULL,
  `report_client` varchar(50) NOT NULL,
  `report_pet` varchar(50) NOT NULL,
  `report_admin` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `salary_table`
--

CREATE TABLE `salary_table` (
  `salaryID` int(11) NOT NULL,
  `attendanceID` int(11) NOT NULL,
  `employeeSalary` float NOT NULL,
  `employeeSalStat` enum('Paid','Not Paid') NOT NULL,
  `datePaid` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `fullname` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `vaccination_records`
--

CREATE TABLE `vaccination_records` (
  `id` int(11) NOT NULL,
  `dog_name` varchar(255) NOT NULL,
  `vaccination_name` varchar(255) NOT NULL,
  `vaccination_date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `website_info`
--

CREATE TABLE `website_info` (
  `id` int(1) NOT NULL,
  `site_name` varchar(100) NOT NULL,
  `about` varchar(5000) NOT NULL,
  `contact` varchar(15) NOT NULL,
  `email` varchar(100) NOT NULL,
  `location` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `website_info`
--

INSERT INTO `website_info` (`id`, `site_name`, `about`, `contact`, `email`, `location`) VALUES
(3, 'DOG VACCINE 2023', 'VACCINATION', '09095215152', 'kim05@gmail.com', 'Tubigon, Bohol');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `admin_users`
--
ALTER TABLE `admin_users`
  ADD PRIMARY KEY (`admin_id`);

--
-- Indexes for table `appointments`
--
ALTER TABLE `appointments`
  ADD PRIMARY KEY (`appointmentId`);

--
-- Indexes for table `attendance_table`
--
ALTER TABLE `attendance_table`
  ADD PRIMARY KEY (`attendanceID`),
  ADD KEY `employeeID` (`employeeID`);

--
-- Indexes for table `client_users`
--
ALTER TABLE `client_users`
  ADD PRIMARY KEY (`client_id`);

--
-- Indexes for table `employee_table`
--
ALTER TABLE `employee_table`
  ADD PRIMARY KEY (`employeeID`);

--
-- Indexes for table `owner_users`
--
ALTER TABLE `owner_users`
  ADD PRIMARY KEY (`owner_id`),
  ADD KEY `client_id` (`client_id`);

--
-- Indexes for table `pet_users`
--
ALTER TABLE `pet_users`
  ADD PRIMARY KEY (`pet_id`),
  ADD KEY `client_id` (`client_id`);

--
-- Indexes for table `product_table`
--
ALTER TABLE `product_table`
  ADD PRIMARY KEY (`productID`);

--
-- Indexes for table `purchase_table`
--
ALTER TABLE `purchase_table`
  ADD PRIMARY KEY (`purchaseID`),
  ADD KEY `productID` (`productID`);

--
-- Indexes for table `reports`
--
ALTER TABLE `reports`
  ADD PRIMARY KEY (`report_id`);

--
-- Indexes for table `salary_table`
--
ALTER TABLE `salary_table`
  ADD PRIMARY KEY (`salaryID`),
  ADD KEY `attendanceID` (`attendanceID`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `vaccination_records`
--
ALTER TABLE `vaccination_records`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `website_info`
--
ALTER TABLE `website_info`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `admin_users`
--
ALTER TABLE `admin_users`
  MODIFY `admin_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `appointments`
--
ALTER TABLE `appointments`
  MODIFY `appointmentId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `attendance_table`
--
ALTER TABLE `attendance_table`
  MODIFY `attendanceID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `client_users`
--
ALTER TABLE `client_users`
  MODIFY `client_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `employee_table`
--
ALTER TABLE `employee_table`
  MODIFY `employeeID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `owner_users`
--
ALTER TABLE `owner_users`
  MODIFY `owner_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `pet_users`
--
ALTER TABLE `pet_users`
  MODIFY `pet_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT for table `product_table`
--
ALTER TABLE `product_table`
  MODIFY `productID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `purchase_table`
--
ALTER TABLE `purchase_table`
  MODIFY `purchaseID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `reports`
--
ALTER TABLE `reports`
  MODIFY `report_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `salary_table`
--
ALTER TABLE `salary_table`
  MODIFY `salaryID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `vaccination_records`
--
ALTER TABLE `vaccination_records`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `website_info`
--
ALTER TABLE `website_info`
  MODIFY `id` int(1) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `attendance_table`
--
ALTER TABLE `attendance_table`
  ADD CONSTRAINT `attendance_table_ibfk_1` FOREIGN KEY (`employeeID`) REFERENCES `employee_table` (`employeeID`);

--
-- Constraints for table `owner_users`
--
ALTER TABLE `owner_users`
  ADD CONSTRAINT `owner_users_ibfk_1` FOREIGN KEY (`client_id`) REFERENCES `client_users` (`client_id`);

--
-- Constraints for table `pet_users`
--
ALTER TABLE `pet_users`
  ADD CONSTRAINT `pet_users_ibfk_1` FOREIGN KEY (`client_id`) REFERENCES `client_users` (`client_id`);

--
-- Constraints for table `purchase_table`
--
ALTER TABLE `purchase_table`
  ADD CONSTRAINT `purchase_table_ibfk_4` FOREIGN KEY (`productID`) REFERENCES `product_table` (`productID`);

--
-- Constraints for table `salary_table`
--
ALTER TABLE `salary_table`
  ADD CONSTRAINT `salary_table_ibfk_1` FOREIGN KEY (`attendanceID`) REFERENCES `attendance_table` (`attendanceID`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
