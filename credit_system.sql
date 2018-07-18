-- phpMyAdmin SQL Dump
-- version 4.8.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 18, 2018 at 07:02 PM
-- Server version: 10.1.32-MariaDB
-- PHP Version: 5.6.36

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `credit_system`
--

-- --------------------------------------------------------

--
-- Table structure for table `transfers`
--

CREATE TABLE `transfers` (
  `user_from` varchar(25) DEFAULT NULL,
  `user_to` varchar(25) DEFAULT NULL,
  `credits` int(4) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `transfers`
--

INSERT INTO `transfers` (`user_from`, `user_to`, `credits`) VALUES
('Arjun Reddy', 'Jennie', 2),
('Bhanu Shree', 'Arjun Reddy', 1),
('Fatima', 'Arjun Reddy', 5),
('Arjun Reddy', 'Shanvi', 2),
('Arjun Reddy', 'Ronnie', 1),
('Arjun Reddy', 'Sameera', 1),
('Rakshith', 'Bhanu Shree', 1);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `Name` varchar(25) NOT NULL,
  `Email` varchar(25) DEFAULT NULL,
  `Phone_No` bigint(10) DEFAULT NULL,
  `current_credits` int(4) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`Name`, `Email`, `Phone_No`, `current_credits`) VALUES
('Arjun Reddy', 'arjunreddy@gmail.com', 7745903411, 78),
('Bhanu Shree', 'bhanushree@gmail.com', 7689054311, 103),
('Fatima', 'fatima@gmail.com', 8907734528, 100),
('Jennie', 'jennie@gmail.com', 8907654321, 46),
('Rakesh', 'rakesh@gmail.com', 9087654321, 190),
('Rakshith', 'rakshith@gmail.com', 9880121666, 70),
('Ronnie', 'ronnie@gmail.com', 7890776522, 141),
('Sameera', 'sameera@gmail.com', 9876543210, 84),
('Shanvi', 'shanvi@gmail.com', 8894510345, 90),
('Trishala', 'trishala@gmail.com', 9987006893, 68);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`Name`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
