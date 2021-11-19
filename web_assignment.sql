-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th10 19, 2021 lúc 07:15 PM
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
-- Cấu trúc bảng cho bảng `invoices`
--

CREATE TABLE `invoices` (
  `invoice_id` int(11) NOT NULL,
  `order_id` int(11) NOT NULL,
  `invoice_total` int(11) NOT NULL DEFAULT 0,
  `invoice_date` date NOT NULL,
  `invoice_time` time NOT NULL,
  `code` varchar(20) DEFAULT NULL,
  `payment_id` int(11) NOT NULL DEFAULT 1
) ;

--
-- Đang đổ dữ liệu cho bảng `invoices`
--

INSERT INTO `invoices` (`invoice_id`, `order_id`, `invoice_total`, `invoice_date`, `invoice_time`, `code`, `payment_id`) VALUES
(1, 1, 138000, '2020-12-24', '11:02:31', NULL, 2),
(2, 2, 551850, '2020-12-24', '11:02:31', NULL, 2),
(3, 3, 22500, '2020-12-24', '12:09:32', NULL, 2),
(4, 4, 140700, '2020-12-24', '14:05:07', NULL, 2),
(5, 5, 209800, '2020-12-24', '14:05:07', NULL, 2),
(6, 6, 1200000, '2020-12-24', '14:43:34', NULL, 2),
(7, 7, 290700, '2021-04-26', '22:08:13', NULL, 2);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `orders`
--

CREATE TABLE `orders` (
  `order_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `order_time` time NOT NULL,
  `order_date` date NOT NULL,
  `order_status_id` int(11) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `orders`
--

INSERT INTO `orders` (`order_id`, `user_id`, `order_time`, `order_date`, `order_status_id`) VALUES
(1, 2, '11:02:31', '2020-12-24', 1),
(2, 2, '11:02:31', '2020-12-24', 1),
(3, 1, '12:09:32', '2020-12-24', 1),
(4, 5, '14:05:07', '2020-12-24', 1),
(5, 5, '14:05:07', '2020-12-24', 1),
(6, 1, '14:43:34', '2020-12-24', 1),
(7, 5, '22:08:13', '2021-04-26', 1);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `order_items`
--

CREATE TABLE `order_items` (
  `order_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `quantity` int(11) NOT NULL DEFAULT 0,
  `unit_price` int(11) NOT NULL DEFAULT 0
) ;

--
-- Đang đổ dữ liệu cho bảng `order_items`
--

INSERT INTO `order_items` (`order_id`, `product_id`, `quantity`, `unit_price`) VALUES
(1, 1, 1, 48000),
(1, 10, 2, 45000),
(2, 1, 1, 24000),
(2, 4, 4, 65700),
(2, 5, 1, 74250),
(2, 6, 2, 72900),
(2, 11, 1, 45000),
(3, 13, 1, 22500),
(4, 2, 3, 25000),
(4, 4, 1, 65700),
(5, 2, 1, 25000),
(5, 6, 2, 72900),
(5, 9, 1, 39000),
(6, 1, 50, 24000),
(7, 6, 3, 72900);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `order_statuses`
--

CREATE TABLE `order_statuses` (
  `order_status_id` int(11) NOT NULL,
  `order_status_name` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `order_statuses`
--

INSERT INTO `order_statuses` (`order_status_id`, `order_status_name`) VALUES
(1, 'Đang Xử Lý'),
(2, 'Đã Sẵn Sàng'),
(3, 'Hết Hàng'),
(4, 'Đã Nhận Hàng');

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
  `stall_id` int(11) NOT NULL,
  `product_status_id` int(11) NOT NULL DEFAULT 1,
  `description` varchar(2000) DEFAULT NULL,
  `image` varchar(50) DEFAULT NULL
) ;

--
-- Đang đổ dữ liệu cho bảng `products`
--

INSERT INTO `products` (`product_id`, `product_name`, `price`, `quantity`, `discount`, `category_id`, `stall_id`, `product_status_id`, `description`, `image`) VALUES
(1, 'Phở Bò Tái Chín', 30000, 0, 20, 1, 2, 2, '', '1608782964521.jpg'),
(2, 'Cơm Gà Xối Mỡ', 25000, 40, 0, 1, 1, 1, '', '1608791315663.jpg'),
(3, 'Kimbap', 35000, 40, 0, 6, 8, 1, '', '1608792165625.jpg'),
(4, 'Lẩu Cua Cà Ri', 73000, 20, 10, 3, 3, 1, '', '1608792180363.jpg'),
(5, 'Bò Ba Chỉ Với Trứng', 99000, 30, 25, 6, 7, 1, '', '1608792205332.jpg'),
(6, 'Combo Gà Giòn Cay', 81000, 27, 10, 2, 4, 1, '', '1608792222820.png'),
(7, 'Pizza Hải Sản', 53000, 35, 15, 2, 5, 1, '', '1608792268122.jpg'),
(8, 'Burger Bò Phô Mai', 40000, 60, 0, 2, 6, 1, '', '1608792290140.jpg'),
(9, 'Bánh Crepe Chuối', 39000, 35, 0, 4, 9, 1, '', '1608792313466.jpg'),
(10, 'Trà Đào Cam Sả', 45000, 40, 0, 5, 10, 1, '', '1608792334761.png'),
(11, 'Trà Sữa Phúc Long (Lạnh)', 45000, 60, 0, 5, 11, 1, '', '1608792847544.jpg'),
(12, 'Sữa Tươi Trân Châu Đường Hổ', 49000, 45, 28, 5, 10, 1, '', '1608792567395.jpg'),
(13, 'Mì Spaghetti Chay', 25000, 100, 10, 6, 3, 1, '', '1608792551817.webp'),
(14, 'Mì bò', 20000, 25, 10, 6, 4, 1, '<p>M&igrave; b&ograve; si&ecirc;u ngon</p>\r\n', '1608793914044.jpg');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `product_statuses`
--

CREATE TABLE `product_statuses` (
  `product_status_id` int(11) NOT NULL,
  `product_status_name` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `product_statuses`
--

INSERT INTO `product_statuses` (`product_status_id`, `product_status_name`) VALUES
(1, 'Còn hàng'),
(2, 'Hết hàng'),
(3, 'Ngừng kinh doanh'),
(4, 'Tạm ngừng bán');

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
(1, 'Cơm Nguyên Ký', 0, '', '1608793031367.jpg'),
(2, 'Phở 10 Lý Quốc Sư', 11, '', '1608793043609.jpg'),
(3, 'Hoàng Yến Cuisine', 0, '', '1608793053215.jpg'),
(4, 'KFC', 0, '', '1608792981678.png'),
(5, 'Pizza Hut', 0, '', '1608792940085.png'),
(6, 'McDonald\'s', 14, '<p>ngon ngon</p>\r\n', '1608786363399.png'),
(7, 'Hotto', 0, '', '1608793106400.jpg'),
(8, 'Hanuri', 0, '', '1608793092809.jpg'),
(9, 'Tous Les Jours', 0, '', '1608793083134.jpg'),
(10, 'The Royal Tea', 0, '', '1608792953501.png'),
(11, 'Phúc Long', 1, '', '1608792969901.png');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `users`
--

CREATE TABLE `users` (
  `user_id` int(11) NOT NULL,
  `first_name` varchar(255) NOT NULL,
  `last_name` varchar(255) NOT NULL,
  `birth_date` date DEFAULT NULL,
  `gender` enum('M','F') DEFAULT NULL,
  `phone` varchar(50) DEFAULT NULL,
  `email` varchar(50) DEFAULT NULL,
  `address` varchar(2000) DEFAULT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `avatar` varchar(30) DEFAULT NULL,
  `role_id` int(11) NOT NULL DEFAULT 1,
  `balance` int(11) DEFAULT 0
) ;

--
-- Đang đổ dữ liệu cho bảng `users`
--

INSERT INTO `users` (`user_id`, `first_name`, `last_name`, `birth_date`, `gender`, `phone`, `email`, `address`, `username`, `password`, `avatar`, `role_id`, `balance`) VALUES
(1, 'admin', 'admin', NULL, NULL, NULL, NULL, NULL, 'admin', '123456', NULL, 2, 0),
(2, 'nguyễn văn ', 'tèo', '2020-12-22', 'M', '0923909321', 'chauthanhtan@gmail.com', 'hcm', 'abc', '1234', '1608791208811.jpg', 1, 0),
(5, 'lê văn', 'tám', '2020-12-24', 'M', '0923909320', 'quynhgiao1402@gmail.com', 'hcm', 'aaa', '1111', '1608793423805.jpg', 1, 0),
(6, 'Lê Trung', 'Sơn', '2020-12-24', 'M', '0912131415', 'leson0310@gmail.com', 'KTX khu A, Linh Trung, Thủ Đức', 'Son.le.lhld', '1111', '1608793747434.jpg', 2, 0);

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
) ;

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
-- Chỉ mục cho bảng `invoices`
--
ALTER TABLE `invoices`
  ADD PRIMARY KEY (`invoice_id`),
  ADD UNIQUE KEY `order_id` (`order_id`),
  ADD KEY `fk_invoices_orders_idx` (`order_id`),
  ADD KEY `fk_invoices_payments_idx` (`payment_id`),
  ADD KEY `fk_invoices_vouchers_codex` (`code`);

--
-- Chỉ mục cho bảng `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`order_id`),
  ADD KEY `fk_orders_users_idx` (`user_id`),
  ADD KEY `fk_orders_order_statuses_idx` (`order_status_id`);

--
-- Chỉ mục cho bảng `order_items`
--
ALTER TABLE `order_items`
  ADD PRIMARY KEY (`order_id`,`product_id`),
  ADD KEY `fk_order_items_orders_idx` (`order_id`),
  ADD KEY `fk_order_items_products_idx` (`product_id`);

--
-- Chỉ mục cho bảng `order_statuses`
--
ALTER TABLE `order_statuses`
  ADD PRIMARY KEY (`order_status_id`);

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
  ADD KEY `fk_products_stalls_idx` (`stall_id`),
  ADD KEY `fk_products_product_statuses_idx` (`product_status_id`);

--
-- Chỉ mục cho bảng `product_statuses`
--
ALTER TABLE `product_statuses`
  ADD PRIMARY KEY (`product_status_id`);

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
  ADD PRIMARY KEY (`user_id`),
  ADD UNIQUE KEY `UQ_username` (`username`),
  ADD UNIQUE KEY `phone` (`phone`),
  ADD UNIQUE KEY `email` (`email`),
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
-- AUTO_INCREMENT cho bảng `invoices`
--
ALTER TABLE `invoices`
  MODIFY `invoice_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `orders`
--
ALTER TABLE `orders`
  MODIFY `order_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT cho bảng `order_statuses`
--
ALTER TABLE `order_statuses`
  MODIFY `order_status_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT cho bảng `payments`
--
ALTER TABLE `payments`
  MODIFY `payment_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT cho bảng `products`
--
ALTER TABLE `products`
  MODIFY `product_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `product_statuses`
--
ALTER TABLE `product_statuses`
  MODIFY `product_status_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

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
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- Các ràng buộc cho các bảng đã đổ
--

--
-- Các ràng buộc cho bảng `invoices`
--
ALTER TABLE `invoices`
  ADD CONSTRAINT `fk_invoices_orders` FOREIGN KEY (`order_id`) REFERENCES `orders` (`order_id`) ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_invoices_payments` FOREIGN KEY (`payment_id`) REFERENCES `payments` (`payment_id`) ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_invoices_vouchers` FOREIGN KEY (`code`) REFERENCES `vouchers` (`code`) ON UPDATE CASCADE;

--
-- Các ràng buộc cho bảng `orders`
--
ALTER TABLE `orders`
  ADD CONSTRAINT `fk_orders_order_statuses` FOREIGN KEY (`order_status_id`) REFERENCES `order_statuses` (`order_status_id`) ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_orders_users` FOREIGN KEY (`user_id`) REFERENCES `users` (`user_id`) ON UPDATE CASCADE;

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
  ADD CONSTRAINT `fk_products_product_statuses` FOREIGN KEY (`product_status_id`) REFERENCES `product_statuses` (`product_status_id`) ON UPDATE CASCADE,
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
