-- phpMyAdmin SQL Dump
-- version 5.1.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 06, 2022 at 07:14 PM
-- Server version: 10.4.22-MariaDB
-- PHP Version: 7.4.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `techblog`
--

-- --------------------------------------------------------

--
-- Table structure for table `comment`
--

CREATE TABLE `comment` (
  `comment_id` int(11) NOT NULL,
  `comment_detail` text NOT NULL,
  `post_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `created_date` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `comment`
--

INSERT INTO `comment` (`comment_id`, `comment_detail`, `post_id`, `user_id`, `created_date`) VALUES
(1, 'The article was really nice.', 4, 2, '2022-07-06 18:41:10'),
(2, 'Really a nice article', 4, 3, '2022-07-06 18:46:22');

-- --------------------------------------------------------

--
-- Table structure for table `post`
--

CREATE TABLE `post` (
  `post_id` int(11) NOT NULL,
  `post_title` varchar(255) NOT NULL,
  `post_desc` text NOT NULL,
  `image_path` varchar(255) NOT NULL,
  `created_date` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `post`
--

INSERT INTO `post` (`post_id`, `post_title`, `post_desc`, `image_path`, `created_date`) VALUES
(1, 'What is Fog Computing', 'Fog computing or fog networking, also known as fogging, is an architecture that uses edge devices to carry out a substantial amount of computation, storage, and communication locally and routed over the Internet backbone. Fog computing or fog networking, also known as fogging, is an architecture that uses edge devices to carry out a substantial amount of computation, storage, and communication locally and routed over the Internet backbone.\r\n\r\nFog computing or fog networking, also known as fogging, is an architecture that uses edge devices to carry out a substantial amount of computation, storage, and communication locally and routed over the Internet backbone.Fog computing or fog networking, also known as fogging, is an architecture that uses edge devices to carry out a substantial amount of computation, storage, and communication locally and routed over the Internet backbone.Fog computing or fog networking, also known as fogging, is an architecture that uses edge devices to carry out a substantial amount of computation, storage, and communication locally and routed over the Internet backbone.\r\nFog computing or fog networking, also known as fogging, is an architecture that uses edge devices to carry out a substantial amount of computation, storage, and communication locally and routed over the Internet backbone.', 'uploads/fc1.PNG', '2022-07-06 04:57:31'),
(2, 'History of Fog Computing', 'Talking about history of Fog computing or fog networking, also known as fogging, is an architecture that uses edge devices to carry out a substantial amount of computation, storage, and communication locally and routed over the Internet backbone', 'uploads/fc2.PNG', '2022-07-06 04:59:38'),
(4, 'About FOG f4', 'This ia bout fog   f4', 'uploads/fc4.PNG', '2022-07-06 10:16:01'),
(10, 'Disadv of FOG', 'this Disadv of FOG', 'uploads/fc5.PNG', '2022-07-06 13:22:43');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `user_id` int(11) NOT NULL,
  `user_fname` varchar(150) NOT NULL,
  `user_lname` varchar(150) NOT NULL,
  `user_email` varchar(200) NOT NULL,
  `user_pwd` varchar(60) NOT NULL,
  `user_role` varchar(50) DEFAULT NULL,
  `created_date` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`user_id`, `user_fname`, `user_lname`, `user_email`, `user_pwd`, `user_role`, `created_date`) VALUES
(1, 'John', 'Sharma', 'admin@admin.com', '$2y$10$IZIvqRBtEZynT1L3Qy1rMecLU.g61KG4sRFhY.uwh3h2w6YLA/iZG', 'admin', '2022-07-06 04:40:25'),
(2, 'Ram', 'Thapa', 'ram@test.com', '$2y$10$XDawCl882GAiY5PKy8RkY.W/vlg6mafMAmo2WXbouuMNymczEzoM6', 'user', '2022-07-06 04:40:56'),
(3, 'Shyam', 'Basnet', 'shyam@test.com', '$2y$10$X8bBmWNy3EwVW34WccIVGuOlUaGaY9XrT/bS6Hj1MABEwCZfEwYIm', 'user', '2022-07-06 18:44:58');

-- --------------------------------------------------------

--
-- Table structure for table `user_feedback`
--

CREATE TABLE `user_feedback` (
  `fb_id` int(11) NOT NULL,
  `fb_by_name` varchar(150) NOT NULL,
  `fb_by_email` varchar(150) DEFAULT NULL,
  `fb_msg` text NOT NULL,
  `created_date` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `comment`
--
ALTER TABLE `comment`
  ADD PRIMARY KEY (`comment_id`);

--
-- Indexes for table `post`
--
ALTER TABLE `post`
  ADD PRIMARY KEY (`post_id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`user_id`);

--
-- Indexes for table `user_feedback`
--
ALTER TABLE `user_feedback`
  ADD PRIMARY KEY (`fb_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `comment`
--
ALTER TABLE `comment`
  MODIFY `comment_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `post`
--
ALTER TABLE `post`
  MODIFY `post_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `user_feedback`
--
ALTER TABLE `user_feedback`
  MODIFY `fb_id` int(11) NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
