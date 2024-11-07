-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 03, 2024 at 08:44 AM
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
-- Database: `hospital`
--

-- --------------------------------------------------------

--
-- Table structure for table `appointment`
--

CREATE TABLE `appointment` (
  `Appointment_id` int(11) NOT NULL,
  `patient_id` text NOT NULL,
  `patient_name` text NOT NULL,
  `email_address` text NOT NULL,
  `patient_contact` text NOT NULL,
  `Doctor_id` text NOT NULL,
  `Doctor_name` text NOT NULL,
  `Specialization` text NOT NULL,
  `appointment_date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `appointment`
--

INSERT INTO `appointment` (`Appointment_id`, `patient_id`, `patient_name`, `email_address`, `patient_contact`, `Doctor_id`, `Doctor_name`, `Specialization`, `appointment_date`) VALUES
(1, '1', 'mo', 'mohitdutta@gmail.com', '2147483647', '102', 'Dr. Rajesh Kumar', 'Cardiologist', '2024-11-05'),
(2, '4', 'Ankit', 'ankit@gmail.com', '1234567890', '104', 'Dr.Prabhjot Singh', 'Ophthalmology', '2024-11-08'),
(3, '4', 'Ankit', 'ankit@gmail.com', '1234567890', '104', 'Dr.Prabhjot Singh', 'Ophthalmology', '2024-11-13');

-- --------------------------------------------------------

--
-- Table structure for table `contact`
--

CREATE TABLE `contact` (
  `ID` int(11) NOT NULL,
  `Name` text NOT NULL,
  `EMail` varchar(30) NOT NULL,
  `Message` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `contact`
--

INSERT INTO `contact` (`ID`, `Name`, `EMail`, `Message`) VALUES
(1, 'Prabhjot singh', 'lprabh096@gmail.com', 'hello');

-- --------------------------------------------------------

--
-- Table structure for table `doctor_register`
--

CREATE TABLE `doctor_register` (
  `Doctor_id` int(10) NOT NULL,
  `Doctor_name` text NOT NULL,
  `Specialization` text NOT NULL,
  `Contact_number` text NOT NULL,
  `Email` varchar(30) NOT NULL,
  `Available_days` varchar(30) NOT NULL,
  `FROM_TIME` time(6) NOT NULL DEFAULT current_timestamp(),
  `TO_TIME` time NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `doctor_register`
--

INSERT INTO `doctor_register` (`Doctor_id`, `Doctor_name`, `Specialization`, `Contact_number`, `Email`, `Available_days`, `FROM_TIME`, `TO_TIME`) VALUES
(102, 'Dr. Rajesh Kumar', 'Cardiologist', '9876543210', 'rajesh.kumar@gmail.com', 'Monday to Wednesday', '02:00:00.000000', '11:01:26'),
(103, 'Dr.Moksh mehra', 'Gynologist', '1234567789', 'moksh@gmail.com', 'Monday to Wednesday', '10:00:00.000000', '12:00:00'),
(104, 'Dr.Prabhjot Singh', 'Ophthalmology', '8196931152', 'lprabh096@gmail.com', 'Monday to Wednesday', '10:00:00.000000', '14:30:00');

-- --------------------------------------------------------

--
-- Table structure for table `patient`
--

CREATE TABLE `patient` (
  `patient_id` int(11) NOT NULL,
  `patient_name` varchar(20) NOT NULL,
  `email_address` varchar(20) NOT NULL,
  `age` int(11) NOT NULL,
  `gender` enum('MALE','FEMALE','OTHER','') NOT NULL,
  `contact` int(10) NOT NULL,
  `blood_group` enum('A+','B+','A-','B-','0+','0-','AB+','AB-') NOT NULL,
  `medical_history` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `patient`
--

INSERT INTO `patient` (`patient_id`, `patient_name`, `email_address`, `age`, `gender`, `contact`, `blood_group`, `medical_history`) VALUES
(1, 'mo', 'mohitdutta@gmail.com', 21, 'MALE', 2147483647, 'A+', 'A+'),
(2, 'Mohit', 'mohitdutta@gmail.com', 21, 'MALE', 2147483647, 'A+', 'A+'),
(3, 'Moksh', 'moksh@gmail.com', 20, 'MALE', 2147483647, 'B+', 'B+'),
(4, 'Ankit', 'ankit@gmail.com', 22, 'MALE', 1234567890, '', 'Vision problem');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `appointment`
--
ALTER TABLE `appointment`
  ADD PRIMARY KEY (`Appointment_id`);

--
-- Indexes for table `contact`
--
ALTER TABLE `contact`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `doctor_register`
--
ALTER TABLE `doctor_register`
  ADD PRIMARY KEY (`Doctor_id`);

--
-- Indexes for table `patient`
--
ALTER TABLE `patient`
  ADD PRIMARY KEY (`patient_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `appointment`
--
ALTER TABLE `appointment`
  MODIFY `Appointment_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `contact`
--
ALTER TABLE `contact`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `doctor_register`
--
ALTER TABLE `doctor_register`
  MODIFY `Doctor_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=105;

--
-- AUTO_INCREMENT for table `patient`
--
ALTER TABLE `patient`
  MODIFY `patient_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
