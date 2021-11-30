-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th10 30, 2021 lúc 05:02 AM
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
(6, 'Món Khác'),
(7, 'Test category');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `comments`
--

CREATE TABLE `comments` (
  `id` int(11) NOT NULL,
  `rate` int(11) NOT NULL DEFAULT 0,
  `comment` text DEFAULT NULL,
  `create_at` datetime NOT NULL DEFAULT current_timestamp(),
  `create_by` int(11) NOT NULL,
  `product_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `comments`
--

INSERT INTO `comments` (`id`, `rate`, `comment`, `create_at`, `create_by`, `product_id`) VALUES
(1, 5, 'Hương vị rất ngon, sợi phở mềm, nước dùng dậm đà.', '2021-11-21 21:06:53', 2, 1),
(2, 4, 'Phở tái nhưng thịt bò hơi chín, sẽ quay lại lần sau', '2021-11-29 17:29:35', 3, 1),
(3, 3, 'Test comment', '2021-11-30 10:52:09', 1, 2),
(4, 5, 'Test rate 5 *', '2021-11-30 10:52:36', 1, 2);

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
  `address` text DEFAULT NULL,
  `maintenance_mode` tinyint(1) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `configs`
--

INSERT INTO `configs` (`id`, `company_name`, `site_name`, `email`, `phone`, `address`, `maintenance_mode`) VALUES
(1, 'Smart Food Court System', 'BK Food Court', 'bkfoodcourt@gmail.com', '0123.456.789', 'Đại học Bách Khoa Tp. Hồ Chí Minh, Quận Thủ Đức, Thành phố Hồ Chí Minh', 0);

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
(1, 'Test title', 'test-title', '16381822671179871102.jpg', 'Test short content                                                                        ', '<p>Test full content</p>\r\n', '2021-11-21 21:06:53', 1, 1),
(3, 'McDonald’s chào đón lực lượng tuyến đầu & tình nguyện viện', 'mcdonalds-chao-don-luc-luong-tuyen-dau-tinh-nguyen-vien', '1638182151701845031.jpg', 'Chương trình thực hiện bởi McDonald’s Việt Nam và Trung tâm Công tác Xã Hội Công đoàn Tp.HCM                                                                        ', '<p>Hôm nay, McDonald’s Việt Nam hân hoan đón chào các anh chị y bác sĩ, cán bộ nhân viên, chiến sĩ, các tình nguyện viên thuộc tuyến đầu chống dịch cùng quý báo chí tại cửa hàng McDonald’s Dakao số 2 Điện Biên Phủ, P. Dakao, Quận 1, Tp.HCM. Đây là sự kiện nằm trong khuôn khổ chương trình đồng hành chống dịch Covid-19 của McDonald’s cùng với các tổ chức xã hội từ năm 2020. </p>\r\n\r\n<p><img alt=\"\" src=\"https://mcdonalds.vn/uploads/2018/news/1(1).jpg\" /><br />\r\n </p>\r\n\r\n<p>McDonald\'s rất tự hào khi được ban lãnh đạo Trung tâm công tác xã hội Công Đoàn Liên Đoàn lao động Tp. Hồ Chí Minh tin yêu và giao phó nhiệm vụ đồng hành trong những giai đoạn chống dịch cao điểm của thành phố Hồ Chí Minh. Khởi động với chương trình Tiếp Sức Chống Dịch 50.000 bữa ăn hỗ trợ đã được McDonald’s gửi tặng đến đội ngũ cán bộ tuyến đầu các y bác sĩ, đội hậu cần và các tình nguyện viện...trong giai đoạn từ tháng 7 đến tháng 10/2021. Chương trình Tiếp sức chống dịch đã diễn ra thành công tốt đẹp với sự hỗ trợ từ Liên Đoàn Lao Động và Hiệp Hội Thanh Niên Việt Nam. </p>\r\n\r\n<p>Từ tháng 11/2021, trên tinh thần chào đón bình thường mới, McDonald’s tiếp tục triển khai các dự án hỗ trợ cộng đồng trong giai đoạn 2 với 5000 phần ăn bánh Burger 2 lớp Gà kẹp thịt xông khói sốt Phô Mai vị Cordon Blue kiểu Pháp trị giá 430 triệu đồng. Cụ thể phần ăn nằm trong thực đơn Châu Âu trị giá từ 86.000 đồng không kèm nước trong đó có 3000 phần được gửi đến TTCTXH Công Đoàn  trị giá 258 triệu và 2000 phần gửi đến Hiệp Hội Thanh Niên Việt Nam  trị giá 172 triệu đồng.</p>\r\n\r\n<p><img alt=\"\" src=\"https://mcdonalds.vn/uploads/2018/news/2.jpg\" /><br />\r\n <br />\r\nCác phần ăn miễn phí được tặng thông qua ứng dụng Săn Ưu Đãi McDonald’s từ ngày 8/11 đến ngày 30/11/2021 trên toàn hệ thống các cửa hàng. Khách hàng chỉ cần nhập mã quà tặng vào ứng dụng và sử dụng chức năng quét mã trên máy đặt hàng tự động để lấy phần ăn. Tất cả các thao tác đều thông qua ứng dụng kỹ thuật số, đảm bảo tuân thủ 5K hạn chế tối đa tiếp xúc trong quy tắc phòng chống dịch.</p>\r\n\r\n<p><img alt=\"\" src=\"https://mcdonalds.vn/uploads/2018/news/3.png\" /> <br />\r\n<em>Hình: Hướng dẫn sử dụng mã quà tặng trên ứng dụng McDonald’s</em></p>\r\n\r\n<p>Đại diện McDonald’s Anh Tạ Thái Thiên Đan – Trưởng phòng vận hành McDonald’s Việt Nam chia sẻ “Trong giai đoạn bình thường mới, McDonald\'s vẫn luôn tuân thủ nghiêm túc các biện pháp 5K chống dịch tại cửa hàng và mang tới một không gian an toàn cho khách hàng. McDonald’s cũng luôn theo dõi sát sao tình hình dịch bệnh để có thể góp phần hỗ trợ cộng đồng trong công cuộc phòng dịch và tăng cường sức khoẻ cộng đồng Tuỳ vào từng thời điểm mà McDonald’s sẽ có những kế hoạch hay dự án hỗ trợ phù hợp. Chúng tôi sẽ chia sẻ các chương trình hành động vì cộng đồng ngay khi có thông tin chính thức.”</p>\r\n\r\n<p>Đội ngũ cán bộ nhân viên McDonalds xin được gửi gắm thật nhiều yêu thương cũng như lời cám ơn chân thành nhất đến lực lượng tuyến đầu, đặc biệt là các y bác sĩ đã chung tay góp sức vì một Việt Nam khỏe mạnh.</p>\r\n\r\n<p>Đồng cám ơn đến Trung tâm công tác xã hội Công Đoàn Liên Đoàn lao động Tp. Hồ Chí Minh, Hiệp Hội Thanh Niên Việt Nam đã tạo điều kiện cũng như hỗ trợ McDonald\'s thực hiện các suất ăn gửi đến lực lượng tuyến đầu chống dịch. </p>\r\n\r\n<p>Xin gửi lời cám ơn chân thành đến quý anh chị báo chí đã hỗ trợ lan tỏa yêu thương.</p>\r\n\r\n<p> </p>\r\n\r\n<table border=\"1\" cellpadding=\"1\" cellspacing=\"1\">\r\n	<tbody>\r\n		<tr>\r\n			<td>Thông tin thêm về doanh nghiệp<br />\r\n			Kể từ năm 2014, sứ mệnh của McDonald’s Việt Nam là trở thành điểm đến yêu thích của thực khách. Doanh nghiệp liên tục nâng cao chất lượng dịch vụ để mang đến những trải nghiệm thú vị bằng thực đơn với các món ăn lừng danh thế giới như Khoai tây chiên, Big Mac, Gà McNuggets, và rất nhiều món ăn khác chỉ có tại McDonald’s. Hiện nay, McDonald’s có mặt tại Hồ Chí Minh, Hà Nội và Bình Dương với 22 cửa hàng và các dịch vụ tiện ích như dịch vụ mua hàng không cần đậu xe Drive-thru lần đầu tiên tại Việt Nam, Dịch vụ giao hàng McDelivery, dịch vụ 24/7 và thương hiệu McCafe phụ vụ bánh ngọt và cafe. Đặc biệt ứng dụng Săn ưu đãi McDonald’s mang đến rất nhiều khuyến mãi và quà tặng cho khách hàng.</td>\r\n		</tr>\r\n	</tbody>\r\n</table>\r\n\r\n<p> </p>\r\n\r\n<p>Để liên hệ truyền thông, anh chị vui lòng gửi thông tin đến<br />\r\n<strong>Hồng Nhung(Ms.)</strong> – Đại diện truyền thông McDonald’s Việt Nam<br />\r\nHP: 0972789780<br />\r\nEmail: nhung.vu@vn.mcd.com</p>\r\n                                                                        ', '2021-11-22 17:17:42', 1, 1),
(5, 'Trẻ nhỏ có thể đọc được cảm xúc của bạn ngay cả khi bạn đeo khẩu trang', 'tre-nho-co-the-doc-duoc-cam-xuc-cua-ban-ngay-ca-khi-ban-deo-khau-trang', '', 'Những đứa trẻ nhỏ thường có thể biết mọi người đang cảm thấy thế nào, ngay cả khi người đó đang đeo khẩu trang, một nghiên cứu mới được công bố cho thấy.                                    ', '<p>C&oacute; một số lo ngại rằng khẩu trang được sử dụng ở trường học trong đại dịch c&oacute; thể g&acirc;y tổn hại đến sự ph&aacute;t triển của trẻ nhỏ, nhưng t&agrave;i liệu nghi&ecirc;n cứu được c&ocirc;ng bố tr&ecirc;n JAMA Pediatrics cho thấy rằng trẻ em c&oacute; thể nhận ra cảm x&uacute;c tốt như khi ch&uacute;ng kh&ocirc;ng đeo khẩu trang.</p>\r\n\r\n<p>Đối với nghi&ecirc;n cứu n&agrave;y, c&aacute;c nh&agrave; nghi&ecirc;n cứu từ Bệnh viện Đại học Lausanne ở Thụy Sĩ đ&atilde; hiển thị 90 bức ảnh ngẫu nhi&ecirc;n cho gần 300 trẻ em từ 3 đến 6 tuổi. Nhũng bức ảnh cho thấy c&aacute;c diễn vi&ecirc;n thể hiện niềm vui, tức giận hoặc buồn b&atilde;. Trong một nửa số h&igrave;nh ảnh, c&aacute;c diễn vi&ecirc;n đeo khẩu trang.</p>\r\n\r\n<p>C&aacute;c b&eacute; được y&ecirc;u cầu đặt t&ecirc;n cho cảm x&uacute;c, chỉ v&agrave;o một thẻ hiển thị c&aacute;c biểu tượng cảm x&uacute;c ph&ugrave; hợp những cảm x&uacute;c tr&ecirc;n tranh, n&oacute;i với nh&agrave; nghi&ecirc;n cứu rằng b&eacute; kh&ocirc;ng biết c&acirc;u trả lời hoặc n&oacute;i rằng muốn bỏ thử nghiệm. C&aacute;c bạn nhỏ trả lời đ&uacute;ng hầu hết c&aacute;c c&acirc;u trả lời v&agrave; c&oacute; thể gh&eacute;p c&aacute;c thẻ cảm x&uacute;c với h&igrave;nh ảnh tỷ lệ chuẩn x&aacute;c gần bằng nhau, cho d&ugrave; h&igrave;nh diễn vi&ecirc;n đ&oacute; c&oacute; đeo khẩu trang hay kh&ocirc;ng.</p>\r\n\r\n<p>Trẻ em m&ocirc; tả cảm x&uacute;c ch&iacute;nh x&aacute;c hơn 70% khi diễn vi&ecirc;n kh&ocirc;ng đeo khẩu trang v&agrave; đ&uacute;ng hơn 67% khi diễn vi&ecirc;n đeo khẩu trang. Những đứa trẻ c&agrave;ng lớn, ch&uacute;ng c&agrave;ng c&oacute; nhiều c&acirc;u trả lời đ&uacute;ng hơn. Khoảng một phần tư trẻ mẫu gi&aacute;o gặp kh&oacute; khăn hơn trong việc ph&acirc;n biệt nỗi buồn với sự tức giận v&agrave; khoảng 21% đ&ocirc;i khi nhầm lẫn niềm vui với sự tức giận hoặc buồn b&atilde;.</p>\r\n\r\n<p><a href=\"https://afamilycdn.com/150157425591193600/2021/11/21/khautrang-16374840565361773687610.jpeg\" target=\"_blank\"><img alt=\"Trẻ nhỏ có thể đọc được cảm xúc của bạn ngay cả khi bạn đeo khẩu trang - Ảnh 1.\" src=\"https://afamilycdn.com/thumb_w/650/150157425591193600/2021/11/21/khautrang-16374840565361773687610.jpeg\" /></a></p>\r\n\r\n<p>Nhiều lo lắng rằng việc đeo khẩu trang sẽ ảnh hưởng đến ph&aacute;t triển kỹ năng cảm x&uacute;c x&atilde; hội của trẻ.</p>\r\n\r\n<p>&nbsp;Ashley Ruba, một chuy&ecirc;n gia t&acirc;m l&yacute; học ph&aacute;t triển của Ph&ograve;ng th&iacute; nghiệm Cảm x&uacute;c Trẻ em tại Đại học Wisconsin-Madison, kh&ocirc;ng li&ecirc;n quan đến nghi&ecirc;n cứu n&agrave;y, nhưng đ&atilde; thực hiện c&ocirc;ng việc tương tự trong đại dịch. C&ocirc; ấy n&oacute;i rằng c&ocirc; ấy đ&atilde; nh&igrave;n thấy kết quả tương tự với c&ocirc;ng việc của m&igrave;nh.</p>\r\n\r\n<p>&quot;Ngay cả khi đeo khẩu trang, những đứa trẻ nhỏ vẫn c&oacute; thể suy luận hợp l&yacute; về cảm x&uacute;c của người kh&aacute;c&quot;, Ruba n&oacute;i. &quot;T&ocirc;i muốn chỉ ra rằng khu&ocirc;n mặt kh&ocirc;ng phải l&agrave; c&aacute;ch quan trọng nhất để ch&uacute;ng ta truyền đạt cảm x&uacute;c, đ&oacute; chỉ l&agrave; một c&aacute;ch duy nhất. Ch&uacute;ng ta cũng sử dụng giọng n&oacute;i, ch&uacute;ng ta c&oacute; cử chỉ cơ thể, ch&uacute;ng ta c&oacute; c&aacute;c loại manh mối ngữ cảnh kh&aacute;c m&agrave; trẻ em v&agrave; người lớn c&oacute; thể sử dụng để t&igrave;m hiểu xem mọi người đang cảm thấy như thế n&agrave;o&quot;.</p>\r\n\r\n<p><a href=\"https://afamilycdn.com/150157425591193600/2021/11/21/khautrang4-1637484584326279873908.jpeg\" target=\"_blank\"><img alt=\"Trẻ nhỏ có thể đọc được cảm xúc của bạn ngay cả khi bạn đeo khẩu trang - Ảnh 2.\" src=\"https://afamilycdn.com/thumb_w/650/150157425591193600/2021/11/21/khautrang4-1637484584326279873908.jpeg\" /></a></p>\r\n\r\n<p>Rủi ro gặp phải khi nhiễm Covid c&oacute; thể sẽ lớn hơn bất cứ vấn đề nhỏ n&agrave;o về giao tiếp.</p>\r\n\r\n<p>Đối với qu&aacute; tr&igrave;nh xử l&yacute; ng&ocirc;n ngữ, điều quan trọng l&agrave; trẻ em phải học c&aacute;ch đọc nh&eacute;p, nhưng r&otilde; r&agrave;ng từ nghi&ecirc;n cứu, c&ocirc; n&oacute;i rằng việc đeo khẩu trang sẽ kh&ocirc;ng l&agrave;m tổn hại đến sự ph&aacute;t triển cảm x&uacute;c x&atilde; hội của trẻ.</p>\r\n\r\n<p>&quot;Rủi ro gặp phải khi nhiễm Covid do kh&ocirc;ng đeo khẩu trang c&oacute; thể sẽ lớn hơn bất kỳ vấn đề nhỏ n&agrave;o về giao tiếp m&agrave; trẻ em c&oacute; thể mắc phải&quot;, c&ocirc; n&oacute;i.</p>\r\n\r\n<p>L&agrave; một nh&agrave; t&acirc;m l&yacute; học, c&ocirc; ấy nghĩ rằng c&oacute; nhiều kh&iacute;a cạnh kh&aacute;c của đại dịch c&oacute; thể ảnh hưởng đến sự ph&aacute;t triển của một đứa trẻ, chẳng hạn như từ sự c&ocirc; lập x&atilde; hội m&agrave; ch&uacute;ng đ&atilde; c&oacute; với bạn b&egrave; đồng trang lứa khi phải nghỉ học ở nh&agrave; hoặc nếu cha mẹ mất việc l&agrave;m chẳng hạn.</p>\r\n\r\n<p>C&ocirc; n&oacute;i: &quot;Khẩu trang c&oacute; lẽ nằm ở cuối danh s&aacute;ch những thứ cần quan t&acirc;m&quot;.</p>\r\n\r\n<p>Nguồn:&nbsp;<em>CNN</em></p>\r\n', '2021-11-22 17:22:30', 1, 0);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `orders`
--

CREATE TABLE `orders` (
  `id` int(11) NOT NULL,
  `order_id` varchar(20) NOT NULL,
  `user_id` int(11) NOT NULL,
  `order_time` datetime NOT NULL DEFAULT current_timestamp(),
  `order_status` enum('Initialized','Comfirmed','Processing','Ready','Transporting','Canceled','Refused','Completed') DEFAULT 'Initialized',
  `total` int(11) NOT NULL DEFAULT 0,
  `payment_id` int(11) NOT NULL DEFAULT 1,
  `voucher` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `orders`
--

INSERT INTO `orders` (`id`, `order_id`, `user_id`, `order_time`, `order_status`, `total`, `payment_id`, `voucher`) VALUES
(1, '141638202028', 3, '2021-11-29 23:07:08', 'Initialized', 48000, 2, NULL),
(2, '141638202181', 3, '2021-11-29 23:09:41', 'Initialized', 25000, 2, NULL),
(3, '011638203204', 1, '2021-11-29 23:26:44', 'Initialized', 24000, 2, NULL);

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

--
-- Đang đổ dữ liệu cho bảng `order_items`
--

INSERT INTO `order_items` (`order_id`, `product_id`, `quantity`, `unit_price`) VALUES
(1, 1, 2, 24000),
(2, 2, 1, 25000),
(3, 1, 1, 24000);

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
  `image` varchar(256) DEFAULT NULL,
  `publish` int(11) NOT NULL DEFAULT 0,
  `trash` int(11) NOT NULL DEFAULT 0,
  `rate` int(11) DEFAULT 0,
  `hot` tinyint(1) DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `products`
--

INSERT INTO `products` (`product_id`, `product_name`, `price`, `quantity`, `discount`, `category_id`, `stall_id`, `product_status`, `description`, `attribute`, `image`, `publish`, `trash`, `rate`, `hot`) VALUES
(1, 'Phở Bò Tái Chín', 30000, 0, 20, 1, 3, 'Active', '<p>Phở b&ograve; si&ecirc;u ngon, hấp dẫn</p>\r\n', '[]', '16381815064573684.png', 1, 0, 5, 1),
(2, 'Cơm Gà Xối Mỡ', 25000, 40, 0, 1, 2, 'Active', '', NULL, '1608791315663.jpg', 1, 0, 4, 0),
(3, 'Kimbap', 35000, 40, 0, 6, 9, 'Active', '', NULL, '1608792165625.jpg', 1, 0, 0, 0),
(4, 'Lẩu Cua Cà Ri', 73000, 20, 10, 3, 4, 'Active', '', '[]', '16382440871531324042.jpg', 1, 0, 0, 0),
(5, 'Bò Ba Chỉ Với Trứng', 99000, 30, 25, 6, 8, 'Active', '', '[]', '1638183544626038492.jpg', 0, 0, 0, 0),
(6, 'Combo Gà Giòn Cay', 81000, 27, 10, 2, 9, 'Active', '', '[]', '16382448021002220985.jpg', 1, 0, 0, 0),
(7, 'Pizza Hải Sản', 53000, 35, 15, 2, 6, 'Active', '', '[]', '1638243757880982232.jpg', 0, 0, 0, 0),
(8, 'Burger Bò Phô Mai', 40000, 60, 0, 2, 7, 'Active', '', '[]', '1638183745854196962.jpg', 0, 1, 0, 0),
(9, 'Bánh Crepe Chuối', 39000, 35, 0, 4, 10, 'Active', '', '[]', '16382431611674802117.jpg', 0, 0, 0, 0),
(10, 'Trà Đào Cam Sả', 45000, 40, 0, 5, 11, 'Active', '', '[]', '16382432151840108360.jpg', 0, 0, 0, 0),
(11, 'Trà Sữa Phúc Long (Lạnh)', 45000, 60, 0, 5, 12, 'Active', '', '[]', '1638243228982786477.jpg', 0, 0, 0, 0),
(12, 'Sữa Tươi Trân Châu Đường Hổ', 49000, 45, 28, 5, 11, 'Active', '', '[]', '16382433592076493951.jpg', 1, 0, 0, 0),
(13, 'Mì Spaghetti Chay', 25000, 100, 10, 6, 4, 'Active', '', '[]', '16382434041860258625.jpg', 1, 0, 0, 0),
(14, 'Mì bò', 20000, 25, 10, 6, 5, 'Active', '<p>Mì bò siêu ngon</p>\r\n', '[]', '1638243433559926919.jpeg', 1, 0, 0, 0);

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
  `avatar` varchar(256) DEFAULT NULL,
  `role_id` int(11) NOT NULL DEFAULT 1,
  `balance` int(11) DEFAULT 0,
  `publish` int(11) NOT NULL DEFAULT 0,
  `trash` int(11) NOT NULL DEFAULT 0,
  `token` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `users`
--

INSERT INTO `users` (`id`, `first_name`, `last_name`, `birth_date`, `gender`, `phone`, `email`, `address`, `password`, `avatar`, `role_id`, `balance`, `publish`, `trash`, `token`) VALUES
(1, 'admin', 'admin', '2021-11-22', 'MALE', '', 'admin@gmail.com', '', '7c4a8d09ca3762af61e59520943dc26494f8941b', '1637637504_10.jpg', 2, 0, 1, 0, NULL),
(2, 'Nguyễn Văn ', 'B', '2020-12-03', 'MALE', '0923909321', 'nguyenvana@gmail.com', 'HCM', '7c4a8d09ca3762af61e59520943dc26494f8941b', '1638181586975162336.jpg', 1, 0, 1, 0, NULL),
(3, 'Lê Trung', 'Sơn', '2000-05-20', 'MALE', '0925919727', 'lesonlhld@gmail.com', 'KTX khu A, Đông Hào, Dĩ An, Bình Dương', '7c4a8d09ca3762af61e59520943dc26494f8941b', '1638181966891990187.png', 1, 0, 1, 0, '1638180970442c4cb7e064f2a6c8b17b750af2d76f');

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
-- Chỉ mục cho bảng `comments`
--
ALTER TABLE `comments`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_comments_create_by` (`create_by`),
  ADD KEY `fk_comments_products` (`product_id`);

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
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `fk_orders_id` (`order_id`),
  ADD KEY `fk_orders_users_idx` (`user_id`),
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
  MODIFY `category_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT cho bảng `comments`
--
ALTER TABLE `comments`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT cho bảng `configs`
--
ALTER TABLE `configs`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT cho bảng `news`
--
ALTER TABLE `news`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT cho bảng `orders`
--
ALTER TABLE `orders`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=44;

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- Các ràng buộc cho các bảng đã đổ
--

--
-- Các ràng buộc cho bảng `comments`
--
ALTER TABLE `comments`
  ADD CONSTRAINT `fk_comments_create_by` FOREIGN KEY (`create_by`) REFERENCES `users` (`id`) ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_comments_products` FOREIGN KEY (`product_id`) REFERENCES `products` (`product_id`) ON UPDATE CASCADE;

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
  ADD CONSTRAINT `fk_orders_users` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_orders_vouchers` FOREIGN KEY (`voucher`) REFERENCES `vouchers` (`code`) ON UPDATE CASCADE;

--
-- Các ràng buộc cho bảng `order_items`
--
ALTER TABLE `order_items`
  ADD CONSTRAINT `fk_order_items_order` FOREIGN KEY (`order_id`) REFERENCES `orders` (`id`) ON UPDATE CASCADE,
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
