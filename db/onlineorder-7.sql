-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 14, 2020 at 04:21 PM
-- Server version: 10.4.14-MariaDB
-- PHP Version: 7.4.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `onlineorder`
--

-- --------------------------------------------------------

--
-- Table structure for table `admins`
--

CREATE TABLE `admins` (
  `ad_id` bigint(20) NOT NULL,
  `ad_displayname` varchar(255) NOT NULL,
  `ad_email` varchar(255) NOT NULL,
  `ad_password` varchar(255) NOT NULL,
  `ad_photo` varchar(255) NOT NULL,
  `ad_createdat` datetime NOT NULL,
  `ad_updatedat` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `admins`
--

INSERT INTO `admins` (`ad_id`, `ad_displayname`, `ad_email`, `ad_password`, `ad_photo`, `ad_createdat`, `ad_updatedat`) VALUES
(1, 'Abhinav', 'admin@admin.com', '$2y$10$kmyD4q4BxRiQlgQzRKX7nuUaUPoYEte/G6cyoD0yh5bg491xz.mJq', 'laxman5.png', '2020-08-30 14:14:45', '2020-08-30 14:14:45'),
(5, 'Editor', 'editor@editor.com', '$2y$10$tgFwOx28MHW2ZtjMgZnwaOMuv02hyb.3V5jpVPH7mTSDqgMtuQPm.', '001-512.png', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(12, 'Dupilop', 'dupilop@gmail.com', '$2y$10$PrGo5u1vfD9sTKJkujUWmeERAEU4RSNlK4psGMcLfV1GWWhP2WkHq', 'abhinav.jpg', '0000-00-00 00:00:00', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `carts`
--

CREATE TABLE `carts` (
  `cart_id` bigint(20) NOT NULL,
  `cart_i_id` bigint(20) NOT NULL,
  `qty` double NOT NULL,
  `cart_u_id` bigint(20) NOT NULL,
  `cart_status` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `carts`
--

INSERT INTO `carts` (`cart_id`, `cart_i_id`, `qty`, `cart_u_id`, `cart_status`) VALUES
(109, 34, 3, 3, 'processing'),
(110, 35, 1, 3, 'processing'),
(111, 37, 1, 3, 'Delivered'),
(112, 35, 3, 3, 'Delivered'),
(113, 36, 5, 3, 'Delivered'),
(116, 38, 1, 3, 'Pending');

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `cat_id` bigint(20) NOT NULL,
  `cat_name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`cat_id`, `cat_name`) VALUES
(1, 'Daily'),
(3, 'Dinner');

-- --------------------------------------------------------

--
-- Table structure for table `categoryassigns`
--

CREATE TABLE `categoryassigns` (
  `ca_id` bigint(20) NOT NULL,
  `ca_i_id` bigint(20) NOT NULL,
  `ca_cat_id` bigint(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `categoryassigns`
--

INSERT INTO `categoryassigns` (`ca_id`, `ca_i_id`, `ca_cat_id`) VALUES
(164, 33, 1),
(165, 34, 3),
(166, 35, 1),
(167, 35, 3),
(168, 36, 1),
(169, 36, 3),
(170, 37, 1),
(171, 38, 3);

-- --------------------------------------------------------

--
-- Table structure for table `favouriteitems`
--

CREATE TABLE `favouriteitems` (
  `fi_id` bigint(20) NOT NULL,
  `fi_i_id` bigint(20) NOT NULL,
  `fi_u_id` bigint(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `favouriteitems`
--

INSERT INTO `favouriteitems` (`fi_id`, `fi_i_id`, `fi_u_id`) VALUES
(65, 34, 3),
(70, 38, 3),
(71, 33, 3);

-- --------------------------------------------------------

--
-- Table structure for table `favouriteresturants`
--

CREATE TABLE `favouriteresturants` (
  `fr_id` bigint(20) NOT NULL,
  `fr_r_id` bigint(20) NOT NULL,
  `fr_u_id` bigint(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `favouriteresturants`
--

INSERT INTO `favouriteresturants` (`fr_id`, `fr_r_id`, `fr_u_id`) VALUES
(20, 52, 3);

-- --------------------------------------------------------

--
-- Table structure for table `items`
--

CREATE TABLE `items` (
  `i_id` bigint(20) NOT NULL,
  `i_name` varchar(255) NOT NULL,
  `i_callname` varchar(255) NOT NULL,
  `i_cat_id` longtext NOT NULL,
  `i_r_id` bigint(20) NOT NULL,
  `i_price` float NOT NULL,
  `i_available` varchar(255) NOT NULL,
  `i_description` longtext NOT NULL,
  `i_image1` varchar(255) NOT NULL,
  `i_image2` varchar(255) NOT NULL,
  `i_image3` varchar(255) NOT NULL,
  `i_image4` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `items`
--

INSERT INTO `items` (`i_id`, `i_name`, `i_callname`, `i_cat_id`, `i_r_id`, `i_price`, `i_available`, `i_description`, `i_image1`, `i_image2`, `i_image3`, `i_image4`) VALUES
(33, 'Momo', 'momo', '1', 51, 140, 'yes', '<div class=\"ql-editor\" data-gramm=\"false\" contenteditable=\"true\"><p>This is a popular item you can have</p></div><div class=\"ql-clipboard\" contenteditable=\"true\" tabindex=\"-1\"></div><div class=\"ql-tooltip ql-hidden\"><a class=\"ql-preview\" rel=\"noopener noreferrer\" target=\"_blank\" href=\"about:blank\"></a><input type=\"text\" data-formula=\"e=mc^2\" data-link=\"https://quilljs.com\" data-video=\"Embed URL\"><a class=\"ql-action\"></a><a class=\"ql-remove\"></a></div>', 'chicken-momo.png', '', '', ''),
(34, 'Chawmeen', 'chaumin', '3', 1, 150, 'yes', '<div class=\"ql-editor\" data-gramm=\"false\" contenteditable=\"true\"><p>This is much tasty food</p></div><div class=\"ql-clipboard\" contenteditable=\"true\" tabindex=\"-1\"></div><div class=\"ql-tooltip ql-hidden\"><a class=\"ql-preview\" rel=\"noopener noreferrer\" target=\"_blank\" href=\"about:blank\"></a><input type=\"text\" data-formula=\"e=mc^2\" data-link=\"https://quilljs.com\" data-video=\"Embed URL\"><a class=\"ql-action\"></a><a class=\"ql-remove\"></a></div>', 'chicken-chowmin.png', '', '', ''),
(35, 'Berger', 'Hamberger', '1, 3', 1, 200, 'yes', '<div class=\"ql-editor\" data-gramm=\"false\" contenteditable=\"true\"><p>Much loved food</p></div><div class=\"ql-clipboard\" contenteditable=\"true\" tabindex=\"-1\"></div><div class=\"ql-tooltip ql-hidden\"><a class=\"ql-preview\" rel=\"noopener noreferrer\" target=\"_blank\" href=\"about:blank\"></a><input type=\"text\" data-formula=\"e=mc^2\" data-link=\"https://quilljs.com\" data-video=\"Embed URL\"><a class=\"ql-action\"></a><a class=\"ql-remove\"></a></div>', 'burger.png', '', '', ''),
(36, 'Pizza', 'pijaa', '1, 3', 1, 250, 'yes', '<div class=\"ql-editor\" data-gramm=\"false\" contenteditable=\"true\"><p>This is the much loved and highly taken food</p></div><div class=\"ql-clipboard\" contenteditable=\"true\" tabindex=\"-1\"></div><div class=\"ql-tooltip ql-hidden\"><a class=\"ql-preview\" rel=\"noopener noreferrer\" target=\"_blank\" href=\"about:blank\"></a><input type=\"text\" data-formula=\"e=mc^2\" data-link=\"https://quilljs.com\" data-video=\"Embed URL\"><a class=\"ql-action\"></a><a class=\"ql-remove\"></a></div>', 'pizza.png', '', '', ''),
(37, 'Pasta', 'pasta', '1', 1, 160, 'yes', '<div class=\"ql-editor\" data-gramm=\"false\" contenteditable=\"true\"><p>This is the much loved italian brand </p></div><div class=\"ql-clipboard\" contenteditable=\"true\" tabindex=\"-1\"></div><div class=\"ql-tooltip ql-hidden\"><a class=\"ql-preview\" rel=\"noopener noreferrer\" target=\"_blank\" href=\"about:blank\"></a><input type=\"text\" data-formula=\"e=mc^2\" data-link=\"https://quilljs.com\" data-video=\"Embed URL\"><a class=\"ql-action\"></a><a class=\"ql-remove\"></a></div>', 'pasta.png', '', '', ''),
(38, 'Thakali khana', 'Nepali food', '3', 1, 250, 'yes', '<div class=\"ql-editor\" data-gramm=\"false\" contenteditable=\"true\"><p>This is the most popular dish of nepal. As always <strong>Nepali Thakali Food </strong>is always rated higher</p></div><div class=\"ql-clipboard\" contenteditable=\"true\" tabindex=\"-1\"></div><div class=\"ql-tooltip ql-hidden\"><a class=\"ql-preview\" rel=\"noopener noreferrer\" target=\"_blank\" href=\"about:blank\"></a><input type=\"text\" data-formula=\"e=mc^2\" data-link=\"https://quilljs.com\" data-video=\"Embed URL\"><a class=\"ql-action\"></a><a class=\"ql-remove\"></a></div>', 'dinner.png', '', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `notifications`
--

CREATE TABLE `notifications` (
  `n_id` bigint(20) NOT NULL,
  `n_text` varchar(255) NOT NULL,
  `n_uploaddate` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `notifications`
--

INSERT INTO `notifications` (`n_id`, `n_text`, `n_uploaddate`) VALUES
(10, 'This is the second test', '2020-09-06 13:56:02');

-- --------------------------------------------------------

--
-- Table structure for table `notification_status`
--

CREATE TABLE `notification_status` (
  `ns_id` bigint(20) NOT NULL,
  `n_id` bigint(20) NOT NULL,
  `ns_ad_id` bigint(20) NOT NULL,
  `ns_status` enum('read','unread') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `notification_status`
--

INSERT INTO `notification_status` (`ns_id`, `n_id`, `ns_ad_id`, `ns_status`) VALUES
(5, 10, 5, 'unread'),
(6, 10, 12, 'read');

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `o_id` bigint(20) NOT NULL,
  `o_common_id` varchar(255) NOT NULL,
  `o_i_id` bigint(20) NOT NULL,
  `o_u_id` bigint(20) NOT NULL,
  `o_cart_id` bigint(20) NOT NULL,
  `o_location` longtext NOT NULL,
  `o_deliverytype` varchar(255) NOT NULL,
  `o_note` longtext NOT NULL,
  `o_paymenttype` varchar(255) NOT NULL,
  `o_date` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`o_id`, `o_common_id`, `o_i_id`, `o_u_id`, `o_cart_id`, `o_location`, `o_deliverytype`, `o_note`, `o_paymenttype`, `o_date`) VALUES
(24, '5f5be2f45fdf2', 34, 3, 109, 'Kathmandu, Nepal', 'None', 'Important hai dai xito gardinu hai', 'cashondelivery', '2020-09-12 02:34:56'),
(25, '5f5be2f45fdf2', 35, 3, 110, 'Kathmandu, Nepal', 'None', 'Important hai dai xito gardinu hai', 'cashondelivery', '2020-09-12 02:34:56'),
(26, '5f5beaf3e3877', 37, 3, 111, 'Kathmandu, Nepal', 'None', 'Important one plz note', 'cashondelivery', '2020-09-12 03:09:03'),
(27, '5f5beaf3e3877', 35, 3, 112, 'Kathmandu, Nepal', 'None', 'Important one plz note', 'cashondelivery', '2020-09-12 03:09:03'),
(28, '5f5beaf3e3877', 36, 3, 113, 'Kathmandu, Nepal', 'None', 'Important one plz note', 'cashondelivery', '2020-09-12 03:09:03');

-- --------------------------------------------------------

--
-- Table structure for table `othercharges`
--

CREATE TABLE `othercharges` (
  `oc_id` bigint(20) NOT NULL,
  `oc_name` varchar(255) NOT NULL,
  `oc_percent` bigint(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `othercharges`
--

INSERT INTO `othercharges` (`oc_id`, `oc_name`, `oc_percent`) VALUES
(1, 'Service Charges', 2);

-- --------------------------------------------------------

--
-- Table structure for table `resturants`
--

CREATE TABLE `resturants` (
  `r_id` bigint(20) NOT NULL,
  `r_name` varchar(255) NOT NULL,
  `r_email` varchar(255) NOT NULL,
  `r_contact1` varchar(255) NOT NULL,
  `r_contact2` varchar(255) NOT NULL,
  `r_streetname` varchar(255) NOT NULL,
  `r_city` varchar(255) NOT NULL,
  `r_state` varchar(255) NOT NULL,
  `r_zipcode` varchar(255) NOT NULL,
  `r_available` varchar(255) NOT NULL,
  `r_description` varchar(255) NOT NULL,
  `r_logo` varchar(255) NOT NULL,
  `r_cover` varchar(255) NOT NULL,
  `r_ad_id` bigint(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `resturants`
--

INSERT INTO `resturants` (`r_id`, `r_name`, `r_email`, `r_contact1`, `r_contact2`, `r_streetname`, `r_city`, `r_state`, `r_zipcode`, `r_available`, `r_description`, `r_logo`, `r_cover`, `r_ad_id`) VALUES
(1, 'Admin Restro', 'admin@admin.com', '9800000000', '9800000000', 'Budanilkhantha', 'Kathmandu', '3', '44600', 'yes', 'This is a very good restro and is of admin. You can have whatever you want', 'Banrock Station Merlot 750ML.png', 'restro-banner.png', 1),
(51, 'Joy\'s Cafe', 'joys@gmail.com', '9867170016', '9815447278', 'Horizon Chok', 'Butwal', '5', '44600', 'yes', 'This is a brand new restro. You can have whatever you want', 'courier_scooter_icon.png', 'petpuja.png', 12),
(52, 'Daal Bhaat', 'dd@dd.dd', '123', '123', 'ddd', 'ddd', '3', '123123', 'yes', 'This is a popular restro in fast food. You can have whatever you want', 'daalvhat-logo.png', 'everest.png', 5);

-- --------------------------------------------------------

--
-- Table structure for table `roles`
--

CREATE TABLE `roles` (
  `r_id` bigint(20) NOT NULL,
  `r_name` varchar(255) NOT NULL,
  `r_displayname` varchar(255) NOT NULL,
  `r_createdat` datetime NOT NULL,
  `r_updatedat` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `roles`
--

INSERT INTO `roles` (`r_id`, `r_name`, `r_displayname`, `r_createdat`, `r_updatedat`) VALUES
(1, 'admin', 'Admin', '2020-08-30 14:19:39', '2020-08-30 14:19:39'),
(2, 'editor', 'Editor', '2020-08-30 14:20:02', '2020-08-30 14:20:02');

-- --------------------------------------------------------

--
-- Table structure for table `roles_assign`
--

CREATE TABLE `roles_assign` (
  `ra_id` bigint(20) NOT NULL,
  `role_id` bigint(20) NOT NULL,
  `admin_id` bigint(20) NOT NULL,
  `user_type` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `roles_assign`
--

INSERT INTO `roles_assign` (`ra_id`, `role_id`, `admin_id`, `user_type`) VALUES
(1, 1, 1, 'admin'),
(4, 2, 5, 'editor'),
(6, 2, 12, 'editor');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `u_id` bigint(20) NOT NULL,
  `u_fullname` varchar(255) NOT NULL,
  `u_email` varchar(255) NOT NULL,
  `u_password` varchar(255) NOT NULL,
  `u_phone` varchar(255) NOT NULL,
  `u_location` varchar(255) NOT NULL,
  `u_photo` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`u_id`, `u_fullname`, `u_email`, `u_password`, `u_phone`, `u_location`, `u_photo`) VALUES
(3, 'Abhinav Kaphle', 'abhinav.kafle@gmail.com', '$2y$10$UeM750hjcUlJMoEf4BFekeh892U8dFN9Nmh9/.mg1MmQAU8hwTcPi', '9867170016', 'Kathmandu, Nepal', 'abhinav.jpg'),
(4, 'rojina', 'rojina@gmail.com', '$2y$10$2lt6h3SIrOmEgkptuwYjgu97ex2lnszrcnYv2BulmU7TMUK/W3UIO', '9867170016', 'Butwal, Kalikanagar', 'profile-pic.png');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admins`
--
ALTER TABLE `admins`
  ADD PRIMARY KEY (`ad_id`);

--
-- Indexes for table `carts`
--
ALTER TABLE `carts`
  ADD PRIMARY KEY (`cart_id`),
  ADD KEY `cart_i_id` (`cart_i_id`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`cat_id`);

--
-- Indexes for table `categoryassigns`
--
ALTER TABLE `categoryassigns`
  ADD PRIMARY KEY (`ca_id`),
  ADD KEY `ca_i_id` (`ca_i_id`);

--
-- Indexes for table `favouriteitems`
--
ALTER TABLE `favouriteitems`
  ADD PRIMARY KEY (`fi_id`);

--
-- Indexes for table `favouriteresturants`
--
ALTER TABLE `favouriteresturants`
  ADD PRIMARY KEY (`fr_id`);

--
-- Indexes for table `items`
--
ALTER TABLE `items`
  ADD PRIMARY KEY (`i_id`),
  ADD KEY `i_r_id` (`i_r_id`),
  ADD KEY `i_cat_id` (`i_cat_id`(768));

--
-- Indexes for table `notifications`
--
ALTER TABLE `notifications`
  ADD PRIMARY KEY (`n_id`);

--
-- Indexes for table `notification_status`
--
ALTER TABLE `notification_status`
  ADD PRIMARY KEY (`ns_id`),
  ADD KEY `ns_ad_id` (`ns_ad_id`),
  ADD KEY `n_id` (`n_id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`o_id`);

--
-- Indexes for table `othercharges`
--
ALTER TABLE `othercharges`
  ADD PRIMARY KEY (`oc_id`);

--
-- Indexes for table `resturants`
--
ALTER TABLE `resturants`
  ADD PRIMARY KEY (`r_id`),
  ADD KEY `r_ad_id` (`r_ad_id`);

--
-- Indexes for table `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`r_id`);

--
-- Indexes for table `roles_assign`
--
ALTER TABLE `roles_assign`
  ADD PRIMARY KEY (`ra_id`),
  ADD KEY `role_id` (`role_id`),
  ADD KEY `admin_id` (`admin_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`u_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admins`
--
ALTER TABLE `admins`
  MODIFY `ad_id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `carts`
--
ALTER TABLE `carts`
  MODIFY `cart_id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=117;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `cat_id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `categoryassigns`
--
ALTER TABLE `categoryassigns`
  MODIFY `ca_id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=172;

--
-- AUTO_INCREMENT for table `favouriteitems`
--
ALTER TABLE `favouriteitems`
  MODIFY `fi_id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=72;

--
-- AUTO_INCREMENT for table `favouriteresturants`
--
ALTER TABLE `favouriteresturants`
  MODIFY `fr_id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT for table `items`
--
ALTER TABLE `items`
  MODIFY `i_id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=39;

--
-- AUTO_INCREMENT for table `notifications`
--
ALTER TABLE `notifications`
  MODIFY `n_id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `notification_status`
--
ALTER TABLE `notification_status`
  MODIFY `ns_id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `o_id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT for table `othercharges`
--
ALTER TABLE `othercharges`
  MODIFY `oc_id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `resturants`
--
ALTER TABLE `resturants`
  MODIFY `r_id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=53;

--
-- AUTO_INCREMENT for table `roles`
--
ALTER TABLE `roles`
  MODIFY `r_id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `roles_assign`
--
ALTER TABLE `roles_assign`
  MODIFY `ra_id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `u_id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `categoryassigns`
--
ALTER TABLE `categoryassigns`
  ADD CONSTRAINT `categoryassigns_ibfk_1` FOREIGN KEY (`ca_i_id`) REFERENCES `items` (`i_id`) ON DELETE CASCADE;

--
-- Constraints for table `items`
--
ALTER TABLE `items`
  ADD CONSTRAINT `items_ibfk_1` FOREIGN KEY (`i_r_id`) REFERENCES `resturants` (`r_id`) ON DELETE CASCADE;

--
-- Constraints for table `notification_status`
--
ALTER TABLE `notification_status`
  ADD CONSTRAINT `notification_status_ibfk_1` FOREIGN KEY (`ns_ad_id`) REFERENCES `admins` (`ad_id`) ON DELETE CASCADE,
  ADD CONSTRAINT `notification_status_ibfk_2` FOREIGN KEY (`n_id`) REFERENCES `notifications` (`n_id`) ON DELETE CASCADE;

--
-- Constraints for table `resturants`
--
ALTER TABLE `resturants`
  ADD CONSTRAINT `resturants_ibfk_1` FOREIGN KEY (`r_ad_id`) REFERENCES `admins` (`ad_id`) ON DELETE CASCADE;

--
-- Constraints for table `roles_assign`
--
ALTER TABLE `roles_assign`
  ADD CONSTRAINT `roles_assign_ibfk_1` FOREIGN KEY (`role_id`) REFERENCES `roles` (`r_id`) ON DELETE CASCADE,
  ADD CONSTRAINT `roles_assign_ibfk_2` FOREIGN KEY (`admin_id`) REFERENCES `admins` (`ad_id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
