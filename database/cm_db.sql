-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 04, 2026 at 08:46 AM
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
-- Database: `cm_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `password`) VALUES
(1, 'jsp', '$2y$10$fR.dcukD4vptF6vVPKC1h.low.hNScnZjiaTlHITpu5VoF7o1IZDu'),
(3, 'inaya', '$2y$10$DxD20ghuV/UInLqvebekXunRv1a8Mh44Ur3uKz/nXGv..xKjw/axi'),
(4, 'yanuar', '$2y$10$tJotmtO/kL/VmT1IQqsfMeOrR5ulgruE2xW7T/jhWBqIk.pQ7/WS.'),
(5, 'yan', '$2y$10$iUiTmqzuFgmk4Y84xorA3uUkW4W4tCL6sHmq2z8HIN6IiVg39ZVem'),
(7, 'yans', '$2y$10$ZHTDwsWgPv4YcbbkWF.8ZuVIwPesv0lJRPJdE5Lq/nl3Sao95iP5a'),
(8, 'yans12', '$2y$10$NrekMWGaK8HbYP3sRxhqWOUh/qiMbJbYvW5Gmf2ftPi.QyyBLMjGi');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username` (`username`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
