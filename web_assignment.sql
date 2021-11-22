-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th10 22, 2021 lúc 05:54 AM
-- Phiên bản máy phục vụ: 10.4.21-MariaDB
-- Phiên bản PHP: 7.3.31

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `web_assignment`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `categories`
--

CREATE TABLE `categories` (
  `category_id` int(11) NOT NULL,
  `category_name` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `categories`
--

INSERT INTO `categories` (`category_id`, `category_name`) VALUES
(1, 'Ẩm thực Việt'),
(2, 'Thức ăn nhanh'),
(3, 'Lẩu & Nướng'),
(4, 'Món tráng miệng'),
(5, 'Thức uống'),
(6, 'Món Khác');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `configs`
--

CREATE TABLE `configs` (
  `id` int(11) NOT NULL,
  `company_name` text DEFAULT NULL,
  `site_name` text DEFAULT NULL,
  `email` text DEFAULT NULL,
  `phone` varchar(15) DEFAULT NULL,
  `address` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `configs`
--

INSERT INTO `configs` (`id`, `company_name`, `site_name`, `email`, `phone`, `address`) VALUES
(1, 'Smart Food Court System', 'BK Food Court', 'bkfoodcourt@gmail.com', '0123.456.789', 'Đại học Bách Khoa Tp. Hồ Chí Minh, Quận Thủ Đức, Thành phố Hồ Chí Minh');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `news`
--

CREATE TABLE `news` (
  `id` int(11) NOT NULL,
  `title` varchar(256) NOT NULL,
  `slug` varchar(256) NOT NULL,
  `image` text DEFAULT NULL,
  `short_content` text NOT NULL,
  `content` text NOT NULL,
  `create_at` datetime NOT NULL DEFAULT current_timestamp(),
  `create_by` int(11) NOT NULL,
  `publish` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `news`
--

INSERT INTO `news` (`id`, `title`, `slug`, `image`, `short_content`, `content`, `create_at`, `create_by`, `publish`) VALUES
(1, 'test title 2', 'test-title-2', '', 'short content', '<p><img alt=\"test editor\" src=\"https://i1-dulich.vnecdn.net/2021/07/16/1-1626437591.jpg?w=1200&amp;h=0&amp;q=100&amp;dpr=1&amp;fit=crop&amp;s=BWzFqMmUWVFC1OfpPSUqMA\" style=\"height:218px; width:200px\" />&nbsp;t&eacute;t h&igrave;nh ảnh trong editor</p>\r\n', '2021-11-21 21:06:53', 1, 1),
(2, '12345', '12345', NULL, 'abc', '<table border=\"1\" cellpadding=\"1\" cellspacing=\"1\" style=\"width:500px\">\r\n	<tbody>\r\n		<tr>\r\n			<td>1</td>\r\n			<td>2</td>\r\n		</tr>\r\n		<tr>\r\n			<td>3</td>\r\n			<td>4</td>\r\n		</tr>\r\n		<tr>\r\n			<td>5</td>\r\n			<td>66</td>\r\n		</tr>\r\n	</tbody>\r\n</table>\r\n\r\n<p>&nbsp;</p>\r\n', '2021-11-22 10:56:23', 1, 0);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `orders`
--

CREATE TABLE `orders` (
  `order_id` int(11) NOT NULL,
  `id` int(11) NOT NULL,
  `order_time` datetime NOT NULL,
  `order_status` enum('Initialized','Comfirmed','Processing','Ready','Transporting','Canceled','Refused','Completed') DEFAULT 'Initialized',
  `total` int(11) NOT NULL DEFAULT 0,
  `payment_id` int(11) NOT NULL DEFAULT 1,
  `voucher` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `order_items`
--

CREATE TABLE `order_items` (
  `order_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `quantity` int(11) NOT NULL DEFAULT 0,
  `unit_price` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `payments`
--

CREATE TABLE `payments` (
  `payment_id` int(11) NOT NULL,
  `payment_method` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `payments`
--

INSERT INTO `payments` (`payment_id`, `payment_method`) VALUES
(1, 'Tài Khoản SFCS'),
(2, 'Ví Momo'),
(3, 'Tiền mặt');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `products`
--

CREATE TABLE `products` (
  `product_id` int(11) NOT NULL,
  `product_name` varchar(255) NOT NULL,
  `price` int(11) NOT NULL DEFAULT 0,
  `quantity` int(11) NOT NULL DEFAULT 0,
  `discount` float DEFAULT 0,
  `category_id` int(11) NOT NULL,
  `stall_id` int(11) NOT NULL DEFAULT 1,
  `product_status` enum('Active','Stop','Pause') DEFAULT 'Active',
  `description` varchar(2000) DEFAULT NULL,
  `attribute` text DEFAULT NULL,
  `image` varchar(50) DEFAULT NULL,
  `publish` int(11) NOT NULL DEFAULT 0,
  `trash` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `products`
--

INSERT INTO `products` (`product_id`, `product_name`, `price`, `quantity`, `discount`, `category_id`, `stall_id`, `product_status`, `description`, `attribute`, `image`, `publish`, `trash`) VALUES
(1, 'Phở Bò Tái Chín', 30000, 0, 20, 1, 3, 'Active', '', NULL, '1608782964521.jpg', 1, 0),
(2, 'Cơm Gà Xối Mỡ', 25000, 40, 0, 1, 2, 'Active', '', NULL, '1608791315663.jpg', 1, 0),
(3, 'Kimbap', 35000, 40, 0, 6, 9, 'Active', '', NULL, '1608792165625.jpg', 1, 0),
(4, 'Lẩu Cua Cà Ri', 73000, 20, 10, 3, 4, 'Active', '', NULL, '1608792180363.jpg', 1, 0),
(5, 'Bò Ba Chỉ Với Trứng', 99000, 30, 25, 6, 8, 'Active', '', NULL, NULL, 1, 0),
(6, 'Combo Gà Giòn Cay', 81000, 27, 10, 2, 9, 'Active', '', NULL, '1608792222820.png', 0, 0),
(7, 'Pizza Hải Sản', 53000, 35, 15, 2, 6, 'Active', '', NULL, '1608792268122.jpg', 0, 0),
(8, 'Burger Bò Phô Mai', 40000, 60, 0, 2, 7, 'Active', '', NULL, '1608792290140.jpg', 0, 0),
(9, 'Bánh Crepe Chuối', 39000, 35, 0, 4, 10, 'Active', '', NULL, '1608792313466.jpg', 0, 0),
(10, 'Trà Đào Cam Sả', 45000, 40, 0, 5, 11, 'Active', '', NULL, '1608792334761.png', 0, 0),
(11, 'Trà Sữa Phúc Long (Lạnh)', 45000, 60, 0, 5, 12, 'Active', '', NULL, '1608792847544.jpg', 0, 0),
(12, 'Sữa Tươi Trân Châu Đường Hổ', 49000, 45, 28, 5, 11, 'Active', '', NULL, '1608792567395.jpg', 0, 0),
(13, 'Mì Spaghetti Chay', 25000, 100, 10, 6, 4, 'Active', '', NULL, '1608792551817.webp', 0, 0),
(14, 'Mì bò', 20000, 25, 10, 6, 5, 'Active', '<p>M&igrave; b&ograve; si&ecirc;u ngon</p>\r\n', NULL, '1608793914044.jpg', 0, 0),
(15, 'san pham 1', 10000, 100, 0, 1, 1, 'Active', '', '[{\"name\":\"size\",\"value\":\"12\"},{\"name\":\"test\",\"value\":\"av\"}]', NULL, 1, 0);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `roles`
--

CREATE TABLE `roles` (
  `role_id` int(11) NOT NULL,
  `role_name` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `roles`
--

INSERT INTO `roles` (`role_id`, `role_name`) VALUES
(1, 'customer'),
(2, 'admin'),
(3, 'cook'),
(4, 'vendor'),
(5, 'manager');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `stalls`
--

CREATE TABLE `stalls` (
  `stall_id` int(11) NOT NULL,
  `stall_name` varchar(255) NOT NULL,
  `item_quantity` int(11) NOT NULL DEFAULT 0,
  `description` varchar(2000) DEFAULT NULL,
  `image` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `stalls`
--

INSERT INTO `stalls` (`stall_id`, `stall_name`, `item_quantity`, `description`, `image`) VALUES
(1, 'SFCS', 0, '', ''),
(2, 'Cơm Nguyên Ký', 0, '', '1608793031367.jpg'),
(3, 'Phở 10 Lý Quốc Sư', 11, '', '1608793043609.jpg'),
(4, 'Hoàng Yến Cuisine', 0, '', '1608793053215.jpg'),
(5, 'KFC', 0, '', '1608792981678.png'),
(6, 'Pizza Hut', 0, '', '1608792940085.png'),
(7, 'McDonald\'s', 14, '<p>ngon ngon</p>\r\n', '1608786363399.png'),
(8, 'Hotto', 0, '', '1608793106400.jpg'),
(9, 'Hanuri', 0, '', '1608793092809.jpg'),
(10, 'Tous Les Jours', 0, '', '1608793083134.jpg'),
(11, 'The Royal Tea', 0, '', '1608792953501.png'),
(12, 'Phúc Long', 1, '', '1608792969901.png');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `first_name` varchar(255) NOT NULL,
  `last_name` varchar(255) NOT NULL,
  `birth_date` date DEFAULT NULL,
  `gender` enum('MALE','FEMALE') DEFAULT NULL,
  `phone` varchar(50) DEFAULT NULL,
  `email` varchar(50) NOT NULL,
  `address` varchar(2000) DEFAULT NULL,
  `password` varchar(50) NOT NULL,
  `avatar` varchar(30) DEFAULT NULL,
  `role_id` int(11) NOT NULL DEFAULT 1,
  `balance` int(11) DEFAULT 0,
  `publish` int(11) NOT NULL DEFAULT 0,
  `trash` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `users`
--

INSERT INTO `users` (`id`, `first_name`, `last_name`, `birth_date`, `gender`, `phone`, `email`, `address`, `password`, `avatar`, `role_id`, `balance`, `publish`, `trash`) VALUES
(1, 'admin', 'admin', NULL, NULL, NULL, 'admin@gmail.com', NULL, '7c4a8d09ca3762af61e59520943dc26494f8941b', NULL, 2, 0, 1, 0),
(2, 'Nguyễn Văn ', 'B', '2020-12-03', 'MALE', '0923909321', 'nguyenvana@gmail.com', 'HCM', '7c4a8d09ca3762af61e59520943dc26494f8941b', NULL, 1, 0, 1, 0);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `vouchers`
--

CREATE TABLE `vouchers` (
  `code` varchar(20) NOT NULL,
  `start_date` date NOT NULL,
  `end_date` date NOT NULL,
  `discount` float NOT NULL DEFAULT 0,
  `quantity` int(11) NOT NULL DEFAULT 0,
  `max_value` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `vouchers`
--

INSERT INTO `vouchers` (`code`, `start_date`, `end_date`, `discount`, `quantity`, `max_value`) VALUES
('WELCOMESFCS', '2020-11-10', '2020-11-15', 50, 100, 200000);

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`category_id`);

--
-- Chỉ mục cho bảng `configs`
--
ALTER TABLE `configs`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `news`
--
ALTER TABLE `news`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_news_create_by` (`create_by`);

--
-- Chỉ mục cho bảng `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`order_id`),
  ADD KEY `fk_orders_users_idx` (`id`),
  ADD KEY `fk_orders_payments_idx` (`payment_id`),
  ADD KEY `fk_orders_vouchers_codex` (`voucher`);

--
-- Chỉ mục cho bảng `order_items`
--
ALTER TABLE `order_items`
  ADD PRIMARY KEY (`order_id`,`product_id`),
  ADD KEY `fk_order_items_orders_idx` (`order_id`),
  ADD KEY `fk_order_items_products_idx` (`product_id`);

--
-- Chỉ mục cho bảng `payments`
--
ALTER TABLE `payments`
  ADD PRIMARY KEY (`payment_id`);

--
-- Chỉ mục cho bảng `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`product_id`),
  ADD KEY `fk_products_categories_idx` (`category_id`),
  ADD KEY `fk_products_stalls_idx` (`stall_id`);

--
-- Chỉ mục cho bảng `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`role_id`);

--
-- Chỉ mục cho bảng `stalls`
--
ALTER TABLE `stalls`
  ADD PRIMARY KEY (`stall_id`);

--
-- Chỉ mục cho bảng `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `UQ_email` (`email`),
  ADD UNIQUE KEY `phone` (`phone`),
  ADD KEY `fk_users_roles_idx` (`role_id`);

--
-- Chỉ mục cho bảng `vouchers`
--
ALTER TABLE `vouchers`
  ADD PRIMARY KEY (`code`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `categories`
--
ALTER TABLE `categories`
  MODIFY `category_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT cho bảng `configs`
--
ALTER TABLE `configs`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT cho bảng `news`
--
ALTER TABLE `news`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT cho bảng `orders`
--
ALTER TABLE `orders`
  MODIFY `order_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT cho bảng `payments`
--
ALTER TABLE `payments`
  MODIFY `payment_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT cho bảng `products`
--
ALTER TABLE `products`
  MODIFY `product_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT cho bảng `roles`
--
ALTER TABLE `roles`
  MODIFY `role_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT cho bảng `stalls`
--
ALTER TABLE `stalls`
  MODIFY `stall_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT cho bảng `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- Các ràng buộc cho các bảng đã đổ
--

--
-- Các ràng buộc cho bảng `news`
--
ALTER TABLE `news`
  ADD CONSTRAINT `fk_news_create_by` FOREIGN KEY (`create_by`) REFERENCES `users` (`id`) ON UPDATE CASCADE;

--
-- Các ràng buộc cho bảng `orders`
--
ALTER TABLE `orders`
  ADD CONSTRAINT `fk_orders_payments` FOREIGN KEY (`payment_id`) REFERENCES `payments` (`payment_id`) ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_orders_users` FOREIGN KEY (`id`) REFERENCES `users` (`id`) ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_orders_vouchers` FOREIGN KEY (`voucher`) REFERENCES `vouchers` (`code`) ON UPDATE CASCADE;

--
-- Các ràng buộc cho bảng `order_items`
--
ALTER TABLE `order_items`
  ADD CONSTRAINT `fk_order_items_orders` FOREIGN KEY (`order_id`) REFERENCES `orders` (`order_id`) ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_order_items_products` FOREIGN KEY (`product_id`) REFERENCES `products` (`product_id`) ON UPDATE CASCADE;

--
-- Các ràng buộc cho bảng `products`
--
ALTER TABLE `products`
  ADD CONSTRAINT `fk_products_categories` FOREIGN KEY (`category_id`) REFERENCES `categories` (`category_id`) ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_products_stalls` FOREIGN KEY (`stall_id`) REFERENCES `stalls` (`stall_id`) ON UPDATE CASCADE;

--
-- Các ràng buộc cho bảng `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `fk_users_roles` FOREIGN KEY (`role_id`) REFERENCES `roles` (`role_id`) ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
