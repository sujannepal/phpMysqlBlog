-- phpMyAdmin SQL Dump
-- version 5.1.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 12, 2022 at 10:18 AM
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
(2, 'Really a nice article', 4, 3, '2022-07-06 18:46:22'),
(3, 'Wow. Great history', 2, 2, '2022-07-07 09:29:20'),
(4, 'test cmt', 10, 2, '2022-07-07 13:50:18'),
(5, 'nice article', 10, 3, '2022-07-07 14:33:03'),
(6, 'The article is really interesting. Great sample comment is here. n publishing and graphic design, Lorem ipsum is a placeholder text commonly used to demonstrate the visual form of a document or a typeface without relying on meaningful content. Lorem ipsum may be used as a placeholder before final copy is available.', 4, 3, '2022-07-08 06:43:10'),
(7, 'Great content', 1, 2, '2022-07-09 18:42:37'),
(8, 'Wow. Very interesting !!!', 1, 6, '2022-07-10 19:43:18'),
(9, 'excellent content', 1, 2, '2022-07-11 03:55:04'),
(10, 'good article', 1, 2, '2022-07-11 18:11:57'),
(11, 'Nice article', 1, 8, '2022-07-11 18:27:05'),
(12, 'Interesting article', 2, 9, '2022-07-12 10:13:00');

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
(1, 'What is Fog Computing', 'Fog Computing is the term coined by Cisco that refers to extending cloud computing to an edge of the enterprise’s network. Thus, it is also known as Edge Computing or Fogging. It facilitates the operation of computing, storage, and networking services between end devices and computing data centers. \r\nThe devices comprising the fog infrastructure are known as fog nodes.\r\nIn fog computing, all the storage capabilities, computation capabilities, data along with the applications are placed between the cloud and the physical host.\r\nAll these functionalities are placed more towards the host. This makes processing faster as it is done almost at the place where data is created.\r\nIt improves the efficiency of the system and is also used to ensure increased security.', 'uploads/fc1.PNG', '2022-07-06 04:57:31'),
(2, 'History of Fog Computing', 'The term fog computing was coined by Cisco in January 2014. This was because fog is referred to as clouds that are close to the ground in the same way fog computing was related to the nodes which are present near the nodes somewhere in between the host and the cloud. It was intended to bring the computational capabilities of the system close to the host machine. After this gained a little popularity, IBM, in 2015, coined a similar term called “Edge Computing”.', 'uploads/fc2.PNG', '2022-07-06 04:59:38'),
(4, 'Advantages of Fog Computing', 'This approach reduces the amount of data that needs to be sent to the cloud. \r\nSince the distance to be traveled by the data is reduced, it results in saving network bandwidth. \r\nReduces the response time of the system. \r\nIt improves the overall security of the system as the data resides close to the host.\r\nIt provides better privacy as industries can perform analysis on their data locally.', 'uploads/fc4.PNG', '2022-07-06 10:16:01'),
(10, 'Disadvantages of Fog Computing', 'Congestion may occur between the host and the fog node due to increased traffic (heavy data flow). \r\nPower consumption increases when another layer is placed between the host and the cloud. \r\nScheduling tasks between host and fog nodes along with fog nodes and the cloud is difficult. \r\nData management becomes tedious as along with the data stored and computed, the transmission of data involves encryption-decryption too which in turn release data.', 'uploads/fc5.PNG', '2022-07-06 13:22:43'),
(11, 'Challenges of Fog Computing', 'Contrary to popular belief, Lorem Ipsum is not simply random text. It has roots in a piece of classical Latin literature from 45 BC, making it over 2000 years old. Richard McClintock, a Latin professor at Hampden-Sydney College in Virginia, looked up one of the more obscure Latin words, consectetur, from a Lorem Ipsum passage, and going through the cites of the word in classical literature, discovered the undoubtable source. Lorem Ipsum comes from sections 1.10.32 and 1.10.33 of \"de Finibus Bonorum et Malorum\" (The Extremes of Good and Evil) by Cicero, written in 45 BC. This book is a treatise on the theory of ethics, very popular during the Renaissance. The first line of Lorem Ipsum, \"Lorem ipsum dolor sit amet..\", comes from a line in section 1.10.32.\r\n\r\nThe standard chunk of Lorem Ipsum used since the 1500s is reproduced below for those interested. Sections 1.10.32 and 1.10.33 from \"de Finibus Bonorum et Malorum\" by Cicero are also reproduced in their exact original form, accompanied by English versions from the 1914 translation by H. Rackham.', 'uploads/fc1.PNG', '2022-07-08 18:34:04'),
(13, 'Future of Fog Computing', 'According to IDC, 45% of the data worldwide will move closer to the network edge by 2025, and 10% of the data will be produced by edge devices such as phones, smart-watches, connected vehicles, and so on. Fog computing is believed to be the only technology that will stand the test of time and even beat Artificial Intelligence, IoT app development, and 5G in the next five years.\r\n\r\nIt is a highly virtualized platform that offers storage, compute, and networking services between the traditional cloud computing data centers and end devices. Fog computing can be characterized by low latency, location awareness, edge location, interoperability, real-time interaction between data and cloud, and support for online interplay with the cloud.\r\n\r\nFog applications involve real-time interactions instead of batch processing, and they often communicate directly with mobile devices. Fog nodes also come with different form factors, deployed in various environments.', 'uploads/', '2022-07-12 09:02:21'),
(14, 'Scope of Fog Computing', 'Do not be surprised when we tell you there are almost 31 billion IoT devices in use as of today. No wonder we produce 2.5 quintillion bytes of data per day. It is obvious we need an alternative to the traditional method of handling data. That is where fog computing enters the picture.\r\n\r\nWhen an application or a device collects enormous volumes of information, efficient data storage becomes a challenge, not to forget, costly, and complicated. Heavy data puts a load on the network bandwidth. Setting up large data centers to store and organize this data is expensive!\r\n\r\nFog computing gathers and distributes storage, computing, and network connectivity services, reduces energy consumption, enhances the data’s performance and utility, and minimizes space and time complexity. Let us take two IoT examples:', 'uploads/fc4.PNG', '2022-07-12 09:06:41');

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
(1, 'Admin', 'Sharma', 'admin@admin.com', '$2y$10$IZIvqRBtEZynT1L3Qy1rMecLU.g61KG4sRFhY.uwh3h2w6YLA/iZG', 'admin', '2022-07-06 04:40:25'),
(2, 'Ram', 'Thapa', 'ram@test.com', '$2y$10$XDawCl882GAiY5PKy8RkY.W/vlg6mafMAmo2WXbouuMNymczEzoM6', 'user', '2022-07-06 04:40:56'),
(3, 'Shyam', 'Basnet', 'shyam@test.com', '$2y$10$X8bBmWNy3EwVW34WccIVGuOlUaGaY9XrT/bS6Hj1MABEwCZfEwYIm', 'user', '2022-07-06 18:44:58'),
(4, 'Hari ', 'Sharma', 'hari@test.com', '$2y$10$7u/mdijW17W3/PbrUQmizOMtzAezNhkPxEo/KvlqH6r0UnlmW3J8e', 'user', '2022-07-09 19:10:45'),
(5, 'Suraj', 'Gurung', 'suraj@test.com', '$2y$10$fYM50.geLqfvkhSt9nzu5.yPxb6RIxt/1IwxSIpfK/MMcIaNDDree', 'user', '2022-07-10 19:40:24'),
(6, 'Milan', 'Tamang', 'milan@test.com', '$2y$10$E6.XdenaOaDhtzK42oJguucWGm278wqO8nvwhXJfyKEr/7ocL1y.W', 'user', '2022-07-10 19:42:21'),
(7, 'Jaw', 'Basnet', 'ja@test.com', '$2y$10$rXLFWRRLrksuWfeTFXBHguht.MSHqsomCDfpVLwokOjwlt0eAJipe', 'user', '2022-07-11 04:08:23'),
(8, 'Sajan', 'Thapa', 'sajan@test.com', '$2y$10$JtjRu4qE1izXpClOdJTM6u3gHNcnDUiIJ3OVV6Lkbq8Ap1l5WiNYi', 'user', '2022-07-11 18:26:28'),
(9, 'Daman', 'Koirala', 'daman@test.com', '$2y$10$VLQrLD9J6CDjySWx/R0x3upM8126/1V84Vi/0Y/.pBV54JNGIuUpy', 'user', '2022-07-12 10:12:33');

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
-- Dumping data for table `user_feedback`
--

INSERT INTO `user_feedback` (`fb_id`, `fb_by_name`, `fb_by_email`, `fb_msg`, `created_date`) VALUES
(1, 'John Sharma', 'john@test.com', 'Great site', '2022-07-07 09:45:48'),
(2, 'Milan Guring', '', 'Wow! Interesting blog. Keep going.', '2022-07-07 09:46:47'),
(3, 'Bimal Thapa', 'bimal@test.com', 'Hello everyone', '0000-00-00 00:00:00'),
(4, 'Subash Pandey', 'subash@test.com', 'Exciting blog', '2022-07-09 18:45:06'),
(5, 'Gopal Sharma', 'gopal@test.com', 'Keep posting new articles', '2022-07-09 18:59:35'),
(6, 'Bishal', 'bishal@test.com', 'Great site', '0000-00-00 00:00:00'),
(7, 'Manoj Pantha', 'manoj@test.com', 'Amazing blog', '2022-07-09 19:07:51'),
(8, 'Milan', 'milan@test.com', 'I really enjoyed your blog', '2022-07-10 19:43:53'),
(9, 'Satyen', 'sat@test.com', 'great site', '2022-07-11 04:01:41');

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
  MODIFY `comment_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `post`
--
ALTER TABLE `post`
  MODIFY `post_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `user_feedback`
--
ALTER TABLE `user_feedback`
  MODIFY `fb_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
