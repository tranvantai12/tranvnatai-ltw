-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 23, 2024 at 12:45 PM
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
-- Database: `tranvantai`
--

-- --------------------------------------------------------

--
-- Table structure for table `bangsanpham`
--

CREATE TABLE `bangsanpham` (
  `ma_sp` int(11) NOT NULL,
  `hinh_anh` varchar(255) DEFAULT NULL,
  `ten_san_pham` varchar(100) DEFAULT NULL,
  `gia_chi_tiet` decimal(10,2) DEFAULT NULL,
  `gia_khuyen_mai` decimal(10,2) DEFAULT NULL,
  `ngay_tao` timestamp NOT NULL DEFAULT current_timestamp(),
  `ngay_cap_nhat` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `blog`
--

CREATE TABLE `blog` (
  `id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `content` text NOT NULL,
  `author` varchar(255) DEFAULT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp(),
  `image` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `blog`
--

INSERT INTO `blog` (`id`, `title`, `content`, `author`, `created_at`, `image`) VALUES
(6, 'aaa', 'aaaa', NULL, '2024-01-06 10:07:45', 'h3.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE `category` (
  `id` int(11) NOT NULL,
  `category_name` varchar(255) NOT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`id`, `category_name`, `created_at`) VALUES
(1, 'Thời trang nữ', '2024-01-13 15:19:53'),
(2, 'Thời trang nam', '2024-01-13 15:19:53'),
(3, 'Fashion victory', '2024-01-13 15:19:53');

-- --------------------------------------------------------

--
-- Table structure for table `oder`
--

CREATE TABLE `oder` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `order_date` date NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `order_detail`
--

CREATE TABLE `order_detail` (
  `order_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `quantity` int(11) DEFAULT NULL,
  `price` float NOT NULL,
  `total_price` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

CREATE TABLE `product` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `cat_id` varchar(50) DEFAULT NULL,
  `image` varchar(255) NOT NULL,
  `price` float NOT NULL,
  `description` text NOT NULL,
  `is_on_sale` tinyint(1) DEFAULT 0,
  `sale_price` float DEFAULT NULL,
  `created_at` datetime DEFAULT current_timestamp(),
  `views` int(11) NOT NULL,
  `Loai` int(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`id`, `name`, `cat_id`, `image`, `price`, `description`, `is_on_sale`, `sale_price`, `created_at`, `views`, `Loai`) VALUES
(1, 'ao thung 1', '3', 't1.png', 12, 'dsdsada', 50, 5000, '2024-12-09 09:39:54', 58, 5),
(2, 'ao thung 2', '3', 't2.png', 12, 'dsdsada', 40, 40000, '2024-12-09 09:39:54', 64, 4),
(3, 'ao thung 3', '3', 't3.png', 12, 'dsdsada', 30, 30000, '2024-12-09 09:39:54', 1, 3),
(4, 'ao thung 4', '3', 't4.png', 12, 'dsdsada', 20, 20000, '2024-12-09 09:39:54', 0, 1),
(5, 'đầm nữ 1', '2', 'n1.jpg', 12, 'dsdsada', 40, 40000, '2024-12-09 09:39:54', 99, 2),
(6, 'đầm nữ 2', '2', 'n2.jpg', 12, 'dsdsada', 40, 40000, '2024-12-09 09:39:54', 99, 3),
(7, 'đầm nữ 3', '2', 'n3.jpg', 12, 'dsdsada', 40, 40000, '2024-12-09 09:39:54', 97, 4),
(8, 'đầm nữ 4', '2', 'n4.jpg', 12, 'dsdsada', 40, 40000, '2024-12-09 09:39:54', 96, 5),
(9, 'quần tây 1', '1', 'h1.jpg', 12, 'dsdsada', 50, 5000, '2023-12-09 09:39:54', 19, 6),
(10, 'quần tây 2', '1', 'h2.jpg', 12, 'dsdsada', 50, 5000, '2023-12-09 09:39:54', 2, 7),
(11, 'quần tây 4', '1', 'h3.jpg', 12, 'dsdsada', 50, 5000, '2023-12-09 09:39:54', 2, 7),
(12, 'quần tây 3', '1', 'h4.jpg', 12, 'dsdsada', 50, 5000, '2023-12-09 09:39:54', 2, 8),
(30, 'tai pro', NULL, 'assets/.jpg', 123, 'dsadad', 0, 3, '2024-01-20 23:25:55', 0, 1);

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `username` varchar(100) DEFAULT NULL,
  `password` varchar(100) NOT NULL,
  `name` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `phone` varchar(100) DEFAULT NULL,
  `address` varchar(100) NOT NULL,
  `gender` tinyint(4) NOT NULL,
  `avatar` varchar(100) DEFAULT NULL,
  `role` varchar(100) NOT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `username`, `password`, `name`, `email`, `phone`, `address`, `gender`, `avatar`, `role`, `created_at`) VALUES
(1, 'kkkkkkkkkkkk', '1111111', 'tran van tai', 'tranvantai12c8@gmail.com', '111111', 'kkkkkkkkkk', 1, 'h3.jpg', 'admin', '2023-12-23 09:08:36'),
(2, 'nguyen ngoc tram', '1', 'hai yen', 'tranvantai12c8@gmail.com', '1111', 'kkkkkkkkkk', 0, 'h2.jpg', 'user', '2023-12-23 09:17:36'),
(3, 'kkkkkkkkkkkk', '$2y$10$Pbs/E3eOhrylxFft8GtFY.tnk.SwINnTn5OF3bFnuxoGc/..4RipK', 'qqqq11111111111', 'tranvantai12c8@gmail.com', '1111', 'kkkkkkkkkk', 1, NULL, '', '2023-12-23 09:26:09'),
(4, 'kkkkkkkkkkkk', '$2y$10$pv9WioIN2PS3I046huOJNendRWRWVFogL8VAHY1hespkK89D.ycPK', '', 'tranvantai12c8@gmail.com', '1111', 'kkkkkkkkkk', 1, NULL, '', '2023-12-23 10:09:11'),
(5, 'bbbbbbbbbbb', '$2y$10$H06vDvBgV0q.cUlEdrDK5uToqptCpDuPhvQDWVQn13dZjkhFDjYem', 'bbbb', 'tranvantai12c8@gmail.com', '1111111111111', 'kkkkkkkkkk', 1, NULL, '', '2023-12-23 10:09:38'),
(6, 'bbbbbbbbbbb', '$2y$10$V72NU2drsHgyPNVYEhd3Oubj4fY6eU404XFyd/Rz91obqm3nJkSUi', 'bbbb', 'tranvantai12c8@gmail.com', '1111111111111', 'kkkkkkkkkk', 1, NULL, '', '2023-12-23 11:11:10'),
(7, 'tran van tài', '$2y$10$0VbJ1jsGjszwzka9R.GFDOlpOCKbVWRYvk5zRs66BMFILA9p2nF2u', 'Nguễn Thành Đồng', 'tao@gmail.com', '0123456', 'tây ninh', 1, NULL, '', '2023-12-23 11:16:15'),
(8, '', '$2y$10$8.tybUDTt900lgPoyeDI.OWuimDz5IeSYlWRUKjD7Q4HuuMaUW8tO', 'Nguễn Thành Đồng', 'tao@gmail.com', '0123456', 'tây ninh', 0, NULL, '', '2023-12-23 11:16:46'),
(9, 'ngo tram', '$2y$10$nR7GI.dyMJ2im0tRIHI1EuFep1zULvmVYJnhyCpB7tDzXoNAXRKI2', 'ngo tram', 'ngotam@gmail.com', '123456', 'tay nihn', 0, 'Screenshot 2023-12-24 093941.png', '', '2023-12-26 22:15:43'),
(10, '', '$2y$10$gfGorWauqGd7lkand4j8xuO5QTwAz2DuP2fbpZVzwYOcPOgpNU5Wq', 'yasuo', 'ngotam@gmail.com', '123456', 'tay nihn', 0, 'Screenshot 2023-12-24 093941.png', '', '2023-12-26 22:16:57'),
(11, '', '$2y$10$Nt0VJKHJ5L7K0d2wY2s6oOichpnjMZKdc2BA53XH/ZMz/r3CQhbee', 'yasuo', 'ngotam@gmail.com', '123456', 'tay nihn', 0, 'Screenshot 2023-12-24 093941.png', '', '2023-12-26 22:22:56'),
(12, '', '$2y$10$.Gvx1qE865w0m/uoFzT92.UcVlb6Kr0uvBupENTkMU3IHwUkhSgNO', 'aaaaaaaaaaaaaa', 'ngotam@gmail.com', '123456', 'tay nihn', 0, 'Screenshot 2023-12-24 093941.png', '', '2023-12-26 22:23:14'),
(13, '', '$2y$10$s19dpmDn9iKIaDtdbGHGWebbE.qSY0oKQx8HVRZCP3uKjQsfo1Dam', 'kkkkkkkkkk', 'ngotam@gmail.com', '123456', 'tay nihn', 0, 'th.jpg', '', '2023-12-26 22:29:11'),
(14, '', '$2y$10$EBgQXz/jwkYLGprcGtgHruM1lBbfUs0eUtAhtVxHHfJ.B/Lepce3K', 'kkkkkkkkkk', 'ngotam@gmail.com', '123456', 'tay nihn', 0, 'th.jpg', '', '2023-12-26 22:47:03'),
(15, 'ngoc tram', '$2y$10$hkf3wdEClgXgNa7moi4A8OoqiOtmcN5vBo.OyIKVEw6XNfPug6Lta', 'Nguyen thi ngoc tram', 'ngoctram@gmail.com', '01675033662', 'truong luu tay ninh', 0, 'th.jpg', '', '2023-12-30 21:59:29'),
(16, '', '$2y$10$Kzm4XBACwly8ikxL1DXuI.v/XZXxIeAEVok188gCZN9dEPvIXa/.a', 'nguyen anh duong', 'ngoctram@gmail.com', '01675033662', 'truong luu tay ninh', 0, 'k1.jpg', '', '2023-12-30 22:02:01'),
(17, 'ngoc tram', '$2y$10$E5ZJyiW3zLnr7mhqhft9bON2N5nGnE5dCdL4WsZY8cu/8rOX7bhu6', 'ngoctram', 'ngoctram@gmail.com', '111111111', 'truong luu tay ninh', 0, 'k1.jpg', '', '2023-12-30 22:19:19'),
(18, 'huu tho', '05281866', 'nguyen huu tho', 'tho@gmail.com', '0123456789', 'tay ninh', 1, 'h1.jpg', '', '2024-01-05 08:25:05'),
(19, 'huu tho', '$2y$10$366usBN2DUNt8NdLGS4TIeHKYVDL0p9dU1Y/eFjU9djkp16RXhZXC', 'kkkkkkkkkkkkkkkkkkkkkkk', 'tho@gmail.com', '1111', 'aa', 0, 'temp.png', '', '2024-01-06 08:20:37'),
(20, 'tran van tai', '1', 'tai', 'tai@gmail.com', '123456789', 'thuy duong', 1, 'h2.jpg', 'admin', '2024-01-13 09:55:26'),
(21, 'Mẫn nhi', '$2y$10$6qzooIMjKHYcd2SUX0LwAODO3tKV6fSMoj5jolrcz.bsZBWf9qoqa', 'Mẫn Nhi', 'mannhi@gmail.com', '0123456789', 'truong luu tay ninh', 0, 'slideshow_1.webp', 'user', '2024-01-16 22:13:07'),
(22, 'haiyen', '123', 'sfdsfdf', 'haiyen@gmail.com', '13213213', 'tây ninh', 1, '.jpg', 'admin', '2024-01-20 23:04:29'),
(23, 'nhu y', '1', 'nguyen thi nhu y', 'nhuy@gmail.com', '1232434', '', 0, 'temp.png', '', '2024-01-22 23:02:08'),
(24, 'taiprofggg', '1', 'tran van tai', 'taipro@gmail.com', '0123456', 'tay ninh', 0, 'k1.jpg', 'user', '2024-01-23 10:49:59');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `bangsanpham`
--
ALTER TABLE `bangsanpham`
  ADD PRIMARY KEY (`ma_sp`);

--
-- Indexes for table `blog`
--
ALTER TABLE `blog`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `oder`
--
ALTER TABLE `oder`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `order_detail`
--
ALTER TABLE `order_detail`
  ADD PRIMARY KEY (`order_id`,`product_id`);

--
-- Indexes for table `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `bangsanpham`
--
ALTER TABLE `bangsanpham`
  MODIFY `ma_sp` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `blog`
--
ALTER TABLE `blog`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `product`
--
ALTER TABLE `product`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
