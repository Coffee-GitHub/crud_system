-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 04, 2022 at 07:42 AM
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
-- Database: `user_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `user_form`
--

CREATE TABLE `user_form` (
  `id` int(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `contactNumber` int(255) DEFAULT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `user_type` varchar(255) NOT NULL DEFAULT 'user'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user_form`
--

INSERT INTO `user_form` (`id`, `name`, `contactNumber`, `email`, `password`, `user_type`) VALUES
(1, 'master', 2147483647, 'master@admin.dev', 'eb0a191797624dd3a48fa681d3061212', 'admin'),
(2, 'user', 2147483647, 'user@user.dev', 'ee11cbb19052e40b07aac0ca060c23ee', 'user'),
(3, 'user2', 2147483647, 'user2@user.dev', '7e58d63b60197ceb55a1c487989a3720', 'user'),
(4, 'admin', 2147483647, 'admin@admin.dev', '21232f297a57a5a743894a0e4a801fc3', 'admin'),
(5, 'user3', 2147483647, 'user3@user.dev', '92877af70a45fd6a2ed7fe81e1236b78', 'user'),
(7, 'user4', 2147483647, 'user4@user.dev', '3f02ebe3d7929b091e3d8ccfde2f3bc6', 'user'),
(8, 'admin2', 2147483647, 'admin2@admin.com', 'c84258e9c39059a89ab77d846ddab909', 'admin'),
(9, 'sadboy', NULL, 'sadboy@user.dev', '49f0bad299687c62334182178bfd75d8', 'user'),
(10, 'sadboy2', NULL, 'sadboy2@user.dev', 'e86c4c2846589c72530fd6094029163e', 'user'),
(11, 'sadboy3', NULL, 'sadboy3@user.dev', 'bbcab738991ed91ce27d23213c54dd9d', 'user'),
(12, 'sadboy4', NULL, 'sadboy4@user.dev', 'f6674ed2932beaf7ad5aef9a196b12e7', 'user'),
(13, 'haha', NULL, 'haha@user.dev', '4e4d6c332b6fe62a63afe56171fd3725', 'user'),
(14, 'asa', 2147483647, 'asa@user.dev', '457391c9c82bfdcbb4947278c0401e41', 'user'),
(15, 'success', 2147483647, 'success@user.dev', '260ca9dd8a4577fc00b7bd5810298076', 'user'),
(16, 'failed', 987689, 'failed@user.dev', 'e11185b6e35c1b767174dc988aa0f179', 'user'),
(17, 'testing', 987650, 'testing@user.dev', '098f6bcd4621d373cade4e832627b4f6', 'user');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `user_form`
--
ALTER TABLE `user_form`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `user_form`
--
ALTER TABLE `user_form`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
