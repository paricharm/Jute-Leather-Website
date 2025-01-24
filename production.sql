-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 22, 2024 at 09:51 PM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `production`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(100) NOT NULL,
  `date_created` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `username`, `password`, `date_created`) VALUES
(1, 'admin', '1234', '2024-10-21 18:30:53');

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `cat_id` int(11) NOT NULL,
  `cat_name` varchar(200) NOT NULL,
  `img` varchar(300) NOT NULL,
  `status` int(11) NOT NULL DEFAULT 0,
  `date_created` timestamp NOT NULL DEFAULT current_timestamp(),
  `date_updated` timestamp NULL DEFAULT NULL ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`cat_id`, `cat_name`, `img`, `status`, `date_created`, `date_updated`) VALUES
(1, 'Lather', 'uploads/645ed3ab218409ce346163235af84973.png', 0, '2024-10-21 20:06:09', '2024-10-22 08:30:45'),
(2, 'Jute', 'uploads/0f1236f027c4150dee73eae4747d20d3.png', 0, '2024-10-21 20:09:18', '2024-10-22 08:30:00');

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

CREATE TABLE `product` (
  `pr_id` int(11) NOT NULL,
  `pr_name` varchar(300) NOT NULL,
  `pr_desc` varchar(120) NOT NULL,
  `cat_id` int(11) DEFAULT NULL,
  `img` varchar(355) NOT NULL,
  `status` int(11) NOT NULL DEFAULT 0,
  `trending` int(11) NOT NULL DEFAULT 1,
  `date_created` timestamp NOT NULL DEFAULT current_timestamp(),
  `date_updated` timestamp NULL DEFAULT NULL ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`pr_id`, `pr_name`, `pr_desc`, `cat_id`, `img`, `status`, `trending`, `date_created`, `date_updated`) VALUES
(1, 'Ladies bag', 'Premium Quality Bag', 2, 'uploads/leather1.jpg.png', 0, 0, '2024-10-22 15:26:37', '2024-10-22 15:28:49'),
(2, 'Man wallet', 'Nice Wallet', 2, 'uploads/leather2.jpg.png', 0, 0, '2024-10-22 15:27:21', '2024-10-22 15:28:16'),
(3, 'Chair', 'Good Chair', 2, 'uploads/leather3.jpg.png', 0, 0, '2024-10-22 15:29:35', NULL),
(4, 'Home decor', ' Carpet ', 2, 'uploads/juteTPOJIBmestajute.webp.png', 0, 0, '2024-10-22 15:30:24', NULL),
(5, 'Ladies dress', ' Nice Dress', 2, 'uploads/jutepuc.jpg.png', 0, 0, '2024-10-22 15:31:15', NULL),
(6, 'Jacket', ' Leather Jacket', 1, 'uploads/leatherproduct2.jpg.png', 0, 0, '2024-10-22 15:33:05', NULL),
(7, 'Wallet', 'Wallet', 1, 'uploads/leatherproduct3.jpg.png', 0, 0, '2024-10-22 15:33:49', NULL),
(8, 'Bag', ' Bag', 1, 'uploads/leatherproduct1.jpg.png', 0, 0, '2024-10-22 15:34:18', NULL),
(9, 'Ladies shoes', 'Shoes', 1, 'uploads/89d2b9f72c4f5b9edb778f6e77424e05.png', 0, 0, '2024-10-22 15:38:39', NULL),
(10, 'Men shoes', 'Shoes', 1, 'uploads/89d2b9f72c4f5b9edb778f6e77424e05.png', 0, 1, '2024-10-22 15:40:05', NULL),
(11, 'Phone cover', 'Phone Cover', 1, 'uploads/645ed3ab218409ce346163235af84973.png', 0, 1, '2024-10-22 15:43:58', NULL),
(12, 'Home decor', 'Decor', 1, 'uploads/e688708bd8503ecbd19ab59a9cce620b.png', 0, 1, '2024-10-22 15:45:51', NULL),
(13, 'Watch (for woman)', ' Watch', 1, 'uploads/3cca39ff65ccb0e3021bb28e12397899.png', 0, 1, '2024-10-22 15:46:58', NULL),
(14, 'Watch (for man)', 'Mens watch', 1, 'uploads/225a9e2cdf9de9ca5606e54f8ff468c6.png', 0, 1, '2024-10-22 15:48:26', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `slider`
--

CREATE TABLE `slider` (
  `s_id` int(11) NOT NULL,
  `file_name` varchar(255) NOT NULL,
  `heading` varchar(255) NOT NULL,
  `description` varchar(355) NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 0,
  `trend` tinyint(1) NOT NULL DEFAULT 1,
  `date_created` timestamp NOT NULL DEFAULT current_timestamp(),
  `date_updated` timestamp NULL DEFAULT NULL ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `slider`
--

INSERT INTO `slider` (`s_id`, `file_name`, `heading`, `description`, `status`, `trend`, `date_created`, `date_updated`) VALUES
(1, 'uploads/21-10-2024-09-52-33.png', 'Slider', 'New Silder ', 0, 1, '2024-10-21 19:30:56', '2024-10-21 19:52:33'),
(2, 'uploads/21-10-2024-09-51-07.png', 'Slider', '', 0, 1, '2024-10-21 19:32:12', '2024-10-21 19:51:07');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`cat_id`);

--
-- Indexes for table `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`pr_id`);

--
-- Indexes for table `slider`
--
ALTER TABLE `slider`
  ADD PRIMARY KEY (`s_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `cat_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `product`
--
ALTER TABLE `product`
  MODIFY `pr_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `slider`
--
ALTER TABLE `slider`
  MODIFY `s_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
