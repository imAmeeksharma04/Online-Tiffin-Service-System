-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 05, 2024 at 04:38 PM
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
-- Database: `tiffindb`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `Admin_Name` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`Admin_Name`, `password`) VALUES
('Admin_1', 'Admin@1');

-- --------------------------------------------------------

--
-- Table structure for table `carts`
--

CREATE TABLE `carts` (
  `Cart_id` int(11) NOT NULL,
  `User_id` int(11) NOT NULL,
  `T_id` int(11) NOT NULL,
  `T_qty` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` int(11) NOT NULL,
  `Name` varchar(50) NOT NULL,
  `slug` varchar(50) NOT NULL,
  `Description` mediumtext NOT NULL,
  `Image` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `Name`, `slug`, `Description`, `Image`) VALUES
(1, 'Veg Breakfast', 'Vegetarian Breakfast tiffin', '100% veg breakfast tiffins available here!!', '1715781474.jpeg'),
(2, 'Veg Lunch', 'Vegetarian Lunch Tiffin', '100% vegetarian lunch tiffins available here.', '1715781553.jpeg'),
(3, 'Veg Dinner', 'Vegetarian dinner tiffin', '100% vegetarian dinner available here', '1715781641.jpeg'),
(4, 'Nonveg Breakfast', 'Non-Vegetarian Breakfast Tiffin', '100% fresh Meat and no added preservatives.', '1715781844.jpeg'),
(5, 'Nonveg Lunch', 'Non-vegetarian lunch tiffin', '100% fresh Meat and no added preservatives.', '1715781913.jpeg'),
(6, 'Nonveg Dinner', 'Non-vegetarian dinner tiffin', '100% fresh Meat and no added preservatives.', '1715782080.jpeg');

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id` int(11) NOT NULL,
  `tracking_no` varchar(191) NOT NULL,
  `user_id` int(191) NOT NULL,
  `name` varchar(191) NOT NULL,
  `email` varchar(191) NOT NULL,
  `phone` varchar(191) NOT NULL,
  `address` mediumtext NOT NULL,
  `pincode` int(191) NOT NULL,
  `total_price` int(191) NOT NULL,
  `payment_mode` varchar(191) NOT NULL,
  `status` tinyint(4) NOT NULL DEFAULT 0,
  `comments` varchar(255) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`id`, `tracking_no`, `user_id`, `name`, `email`, `phone`, `address`, `pincode`, `total_price`, `payment_mode`, `status`, `comments`, `created_at`) VALUES
(1, 'ODI698445654', 7, 'Test Name', 'TestEmail@gmail.com', '1232145654', 'testing address', 765678, 1050, 'COD', 0, NULL, '2024-05-18 04:54:34'),
(2, 'ODI5755922235', 7, 'Ameek Sharma', 'sharmaameek@gmail.com', '09461922235', '104 hiran magri chitrakut vihar sec-14', 313002, 500, 'COD', 0, NULL, '2024-05-18 05:38:50'),
(3, 'ODI955956', 7, 'nitin', 'nitin@gmail.com', '1234456', 'nitin', 12321, 500, 'COD', 0, NULL, '2024-05-20 07:39:51'),
(4, 'ODI3326922235', 9, 'Ameek Sharma', 'sharmaameek@gmail.com', '09461922235', '104 hiran magri chitrakut vihar sec-14', 313002, 550, 'COD', 1, NULL, '2024-05-20 08:06:12'),
(5, 'ODI8804922235', 10, 'Ameek Sharma', 'sharmaameek@gmail.com', '09461922235', '104 hiran magri chitrakut vihar sec-14', 313002, 500, 'COD', 1, NULL, '2024-06-05 13:43:06');

-- --------------------------------------------------------

--
-- Table structure for table `order_items`
--

CREATE TABLE `order_items` (
  `id` int(11) NOT NULL,
  `order_id` int(191) NOT NULL,
  `t_id` int(191) NOT NULL,
  `t_qty` int(191) NOT NULL,
  `price` int(191) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `order_items`
--

INSERT INTO `order_items` (`id`, `order_id`, `t_id`, `t_qty`, `price`, `created_at`) VALUES
(1, 1, 2, 1, 550, '2024-05-18 04:54:34'),
(2, 1, 1, 1, 500, '2024-05-18 04:54:34'),
(3, 2, 1, 1, 500, '2024-05-18 05:38:50'),
(4, 3, 1, 1, 500, '2024-05-20 07:39:51'),
(5, 4, 2, 1, 550, '2024-05-20 08:06:12'),
(6, 5, 1, 1, 500, '2024-06-05 13:43:06');

-- --------------------------------------------------------

--
-- Table structure for table `registrations`
--

CREATE TABLE `registrations` (
  `sno` int(1) NOT NULL,
  `Name` varchar(50) NOT NULL,
  `Mobile Number` bigint(10) NOT NULL,
  `Email` varchar(50) NOT NULL,
  `Password` varchar(255) NOT NULL,
  `role_as` tinyint(4) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `registrations`
--

INSERT INTO `registrations` (`sno`, `Name`, `Mobile Number`, `Email`, `Password`, `role_as`) VALUES
(2, 'Ameek Sharma', 9461922235, 'sharmaameek@gmail.com', '$2y$10$Zgi5xPOqVUybxcAXN2ykieFHLq7va3dJq6crVcNl2BdvZmBgWYmkO', 0),
(3, 'Intel', 9461922232, 'ask.intel@yahoo.com', '$2y$10$sl9ys1PgeOhmyLk/VVVIvufXJ/P0fHrAvWQZ1TdX63qvXG3K74WRe', 0),
(4, 'chirag sukhwal', 9511512486, 'k@gmail.com', '$2y$10$wkLXgqmYXTYLlw9M2BWVIuqpwGS9oJ6F7Bj.fcabb3iHm50l3PtAK', 0),
(5, 'nitin sir PIET', 1234567890, 'nitin@gmail.com', '$2y$10$M8ORKYGG7ydzXUN2AoD8xOtoL6XeiP0IzHsqjdhsOE54WW9nz9jOu', 0),
(6, 'abc', 1234599999, 'abc@gmail.com', '$2y$10$wRGsAoYYvW4E5t89Uj.g/OVVqDtVG/sSHv.zuA8njkh5NReQJwiEu', 0),
(7, 'abcd', 1234567890, 'abcd@gmail.com', '$2y$10$U6Fa.xCxE3BGrfnJphs39et0xeRWLTWzoMGIPRbH7XTm111Txf/yi', 0),
(8, 'anirudh', 3434524524, 'bwhjebdxhygexy@gmail.com', '$2y$10$r/LkA0RlxIz.CTdBee9INOpL.u.OOtN/zC90NW62vCJRB/sDyY.sO', 0),
(9, 'ani', 762701160, 'ab1cd@gmail.com', '$2y$10$R4S9WlQjnjXWrm8nvn1iF.DVNMCzjaL47J9L3ZGFD1/zMgtp879y2', 0),
(10, 'QWE', 12334, '123@gmail.com', '$2y$10$qqY6pGm.PFSrPBGwryh7xu7gQL3AtfEolBipaAAJAmkvJTGu1wtgu', 0);

-- --------------------------------------------------------

--
-- Table structure for table `tiffins`
--

CREATE TABLE `tiffins` (
  `Id` int(11) NOT NULL,
  `Category_Id` int(11) NOT NULL,
  `Name` varchar(191) NOT NULL,
  `Slug` varchar(100) NOT NULL,
  `Description` mediumtext NOT NULL,
  `Image` varchar(191) NOT NULL,
  `Price` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tiffins`
--

INSERT INTO `tiffins` (`Id`, `Category_Id`, `Name`, `Slug`, `Description`, `Image`, `Price`) VALUES
(1, 1, 'Small Tiffin', 'Veg tiffin small', 'Breakfast', '1715782161.jpg', 500),
(2, 1, 'Medium Tiffin', 'Veg tiffin medium', 'Medium Breakfast', '1715782248.jpeg', 550);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `carts`
--
ALTER TABLE `carts`
  ADD PRIMARY KEY (`Cart_id`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `order_items`
--
ALTER TABLE `order_items`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `registrations`
--
ALTER TABLE `registrations`
  ADD PRIMARY KEY (`sno`),
  ADD UNIQUE KEY `Name` (`Name`),
  ADD UNIQUE KEY `Email` (`Email`),
  ADD UNIQUE KEY `sno` (`sno`),
  ADD UNIQUE KEY `Email_2` (`Email`);

--
-- Indexes for table `tiffins`
--
ALTER TABLE `tiffins`
  ADD PRIMARY KEY (`Id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `carts`
--
ALTER TABLE `carts`
  MODIFY `Cart_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `order_items`
--
ALTER TABLE `order_items`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `registrations`
--
ALTER TABLE `registrations`
  MODIFY `sno` int(1) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `tiffins`
--
ALTER TABLE `tiffins`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
