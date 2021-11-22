-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th10 22, 2021 lúc 07:11 PM
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
(1, 'test title 2', 'test-title-2', '', 'short content', '<p><img alt=\"test editor\" src=\"https://i1-dulich.vnecdn.net/2021/07/16/1-1626437591.jpg?w=1200&h=0&q=100&dpr=1&fit=crop&s=BWzFqMmUWVFC1OfpPSUqMA\" style=\"height:218px; width:200px\" /> tét hình ảnh trong editor</p>\r\n                                    ', '2021-11-21 21:06:53', 1, 1),
(2, '12345', '12345', NULL, 'abc', '<table border=\"1\" cellpadding=\"1\" cellspacing=\"1\" style=\"width:500px\">\r\n	<tbody>\r\n		<tr>\r\n			<td>1</td>\r\n			<td>2</td>\r\n		</tr>\r\n		<tr>\r\n			<td>3</td>\r\n			<td>4</td>\r\n		</tr>\r\n		<tr>\r\n			<td>5</td>\r\n			<td>66</td>\r\n		</tr>\r\n	</tbody>\r\n</table>\r\n\r\n<p>&nbsp;</p>\r\n', '2021-11-22 10:56:23', 1, 0),
(3, 'McDonald’s chào đón lực lượng tuyến đầu & tình nguyện viện', 'mcdonalds-chao-don-luc-luong-tuyen-dau-tinh-nguyen-vien', NULL, 'Chương trình thực hiện bởi McDonald’s Việt Nam và Trung tâm Công tác Xã Hội Công đoàn Tp.HCM', '<p>H&ocirc;m nay, McDonald&rsquo;s Việt Nam h&acirc;n hoan đ&oacute;n ch&agrave;o c&aacute;c anh chị y b&aacute;c sĩ, c&aacute;n bộ nh&acirc;n vi&ecirc;n, chiến sĩ, c&aacute;c t&igrave;nh nguyện vi&ecirc;n thuộc tuyến đầu chống dịch c&ugrave;ng qu&yacute; b&aacute;o ch&iacute; tại cửa h&agrave;ng McDonald&rsquo;s Dakao số 2 Điện Bi&ecirc;n Phủ, P. Dakao, Quận 1, Tp.HCM. Đ&acirc;y l&agrave; sự kiện nằm trong khu&ocirc;n khổ chương tr&igrave;nh đồng h&agrave;nh chống dịch Covid-19 của McDonald&rsquo;s c&ugrave;ng với c&aacute;c tổ chức x&atilde; hội từ năm 2020.&nbsp;</p>\n\n<p><img alt=\"\" src=\"https://mcdonalds.vn/uploads/2018/news/1(1).jpg\" /><br />\n&nbsp;</p>\n\n<p>McDonald&#39;s rất tự h&agrave;o khi được ban l&atilde;nh đạo Trung t&acirc;m c&ocirc;ng t&aacute;c x&atilde; hội C&ocirc;ng Đo&agrave;n Li&ecirc;n Đo&agrave;n lao động Tp. Hồ Ch&iacute; Minh tin y&ecirc;u v&agrave; giao ph&oacute; nhiệm vụ đồng h&agrave;nh trong những giai đoạn chống dịch cao điểm của th&agrave;nh phố Hồ Ch&iacute; Minh. Khởi động với chương tr&igrave;nh Tiếp Sức Chống Dịch 50.000 bữa ăn hỗ trợ đ&atilde; được McDonald&rsquo;s gửi tặng đến đội ngũ c&aacute;n bộ tuyến đầu c&aacute;c y b&aacute;c sĩ, đội hậu cần v&agrave; c&aacute;c t&igrave;nh nguyện viện...trong giai đoạn từ th&aacute;ng 7 đến th&aacute;ng 10/2021. Chương tr&igrave;nh Tiếp sức chống dịch đ&atilde; diễn ra th&agrave;nh c&ocirc;ng tốt đẹp với sự hỗ trợ từ Li&ecirc;n Đo&agrave;n Lao Động v&agrave; Hiệp Hội Thanh Ni&ecirc;n Việt Nam.&nbsp;</p>\n\n<p>Từ th&aacute;ng 11/2021, tr&ecirc;n tinh thần ch&agrave;o đ&oacute;n b&igrave;nh thường mới, McDonald&rsquo;s tiếp tục triển khai c&aacute;c dự &aacute;n hỗ trợ cộng đồng trong giai đoạn 2 với 5000 phần ăn b&aacute;nh Burger 2 lớp G&agrave; kẹp thịt x&ocirc;ng kh&oacute;i sốt Ph&ocirc; Mai vị Cordon Blue kiểu Ph&aacute;p trị gi&aacute; 430 triệu đồng. Cụ thể phần ăn nằm trong thực đơn Ch&acirc;u &Acirc;u trị gi&aacute; từ 86.000 đồng kh&ocirc;ng k&egrave;m nước trong đ&oacute; c&oacute; 3000 phần được gửi đến TTCTXH C&ocirc;ng Đo&agrave;n&nbsp; trị gi&aacute; 258 triệu v&agrave; 2000 phần gửi đến Hiệp Hội Thanh Ni&ecirc;n Việt Nam&nbsp; trị gi&aacute; 172 triệu đồng.</p>\n\n<p><img alt=\"\" src=\"https://mcdonalds.vn/uploads/2018/news/2.jpg\" /><br />\n&nbsp;<br />\nC&aacute;c phần ăn miễn ph&iacute; được tặng th&ocirc;ng qua ứng dụng Săn Ưu Đ&atilde;i McDonald&rsquo;s từ ng&agrave;y 8/11 đến ng&agrave;y 30/11/2021 tr&ecirc;n to&agrave;n hệ thống c&aacute;c cửa h&agrave;ng. Kh&aacute;ch h&agrave;ng chỉ cần nhập m&atilde; qu&agrave; tặng v&agrave;o ứng dụng v&agrave; sử dụng chức năng qu&eacute;t m&atilde; tr&ecirc;n m&aacute;y đặt h&agrave;ng tự động để lấy phần ăn. Tất cả c&aacute;c thao t&aacute;c đều th&ocirc;ng qua ứng dụng kỹ thuật số, đảm bảo tu&acirc;n thủ 5K hạn chế tối đa tiếp x&uacute;c trong quy tắc ph&ograve;ng chống dịch.</p>\n\n<p><img alt=\"\" src=\"https://mcdonalds.vn/uploads/2018/news/3.png\" />&nbsp;<br />\n<em>H&igrave;nh: Hướng dẫn sử dụng m&atilde; qu&agrave; tặng tr&ecirc;n ứng dụng McDonald&rsquo;s</em></p>\n\n<p>Đại diện McDonald&rsquo;s Anh Tạ Th&aacute;i Thi&ecirc;n Đan &ndash; Trưởng ph&ograve;ng vận h&agrave;nh McDonald&rsquo;s Việt Nam chia sẻ &ldquo;Trong giai đoạn b&igrave;nh thường mới, McDonald&#39;s vẫn lu&ocirc;n tu&acirc;n thủ nghi&ecirc;m t&uacute;c c&aacute;c biện ph&aacute;p 5K chống dịch tại cửa h&agrave;ng v&agrave; mang tới một kh&ocirc;ng gian an to&agrave;n cho kh&aacute;ch h&agrave;ng. McDonald&rsquo;s cũng lu&ocirc;n theo d&otilde;i s&aacute;t sao t&igrave;nh h&igrave;nh dịch bệnh để c&oacute; thể g&oacute;p phần hỗ trợ cộng đồng trong c&ocirc;ng cuộc ph&ograve;ng dịch v&agrave; tăng cường sức khoẻ cộng đồng Tuỳ v&agrave;o từng thời điểm m&agrave; McDonald&rsquo;s sẽ c&oacute; những kế hoạch hay dự &aacute;n hỗ trợ ph&ugrave; hợp. Ch&uacute;ng t&ocirc;i sẽ chia sẻ c&aacute;c chương tr&igrave;nh h&agrave;nh động v&igrave; cộng đồng ngay khi c&oacute; th&ocirc;ng tin ch&iacute;nh thức.&rdquo;</p>\n\n<p>Đội ngũ c&aacute;n bộ nh&acirc;n vi&ecirc;n McDonalds xin được gửi gắm thật nhiều y&ecirc;u thương cũng như lời c&aacute;m ơn ch&acirc;n th&agrave;nh nhất đến lực lượng tuyến đầu, đặc biệt l&agrave; c&aacute;c y b&aacute;c sĩ đ&atilde; chung tay g&oacute;p sức v&igrave; một Việt Nam khỏe mạnh.</p>\n\n<p>Đồng c&aacute;m ơn đến Trung t&acirc;m c&ocirc;ng t&aacute;c x&atilde; hội C&ocirc;ng Đo&agrave;n Li&ecirc;n Đo&agrave;n lao động Tp. Hồ Ch&iacute; Minh, Hiệp Hội Thanh Ni&ecirc;n Việt Nam đ&atilde; tạo điều kiện cũng như hỗ trợ McDonald&#39;s thực hiện c&aacute;c suất ăn gửi đến lực lượng tuyến đầu chống dịch.&nbsp;</p>\n\n<p>Xin gửi lời c&aacute;m ơn ch&acirc;n th&agrave;nh đến qu&yacute; anh chị b&aacute;o ch&iacute; đ&atilde; hỗ trợ lan tỏa y&ecirc;u thương.</p>\n\n<p>&nbsp;</p>\n\n<table border=\"1\" cellpadding=\"1\" cellspacing=\"1\">\n	<tbody>\n		<tr>\n			<td>Th&ocirc;ng tin th&ecirc;m về doanh nghiệp<br />\n			Kể từ năm 2014, sứ mệnh của McDonald&rsquo;s Việt Nam l&agrave; trở th&agrave;nh điểm đến y&ecirc;u th&iacute;ch của thực kh&aacute;ch. Doanh nghiệp li&ecirc;n tục n&acirc;ng cao chất lượng dịch vụ để mang đến những trải nghiệm th&uacute; vị bằng thực đơn với c&aacute;c m&oacute;n ăn lừng danh thế giới như Khoai t&acirc;y chi&ecirc;n, Big Mac, G&agrave; McNuggets, v&agrave; rất nhiều m&oacute;n ăn kh&aacute;c chỉ c&oacute; tại McDonald&rsquo;s. Hiện nay, McDonald&rsquo;s c&oacute; mặt tại Hồ Ch&iacute; Minh, H&agrave; Nội v&agrave; B&igrave;nh Dương với 22 cửa h&agrave;ng v&agrave; c&aacute;c dịch vụ tiện &iacute;ch như dịch vụ mua h&agrave;ng kh&ocirc;ng cần đậu xe Drive-thru lần đầu ti&ecirc;n tại Việt Nam, Dịch vụ giao h&agrave;ng McDelivery, dịch vụ 24/7 v&agrave; thương hiệu McCafe phụ vụ b&aacute;nh ngọt v&agrave; cafe. Đặc biệt ứng dụng Săn ưu đ&atilde;i McDonald&rsquo;s mang đến rất nhiều khuyến m&atilde;i v&agrave; qu&agrave; tặng cho kh&aacute;ch h&agrave;ng.</td>\n		</tr>\n	</tbody>\n</table>\n\n<p>&nbsp;</p>\n\n<p>Để li&ecirc;n hệ truyền th&ocirc;ng, anh chị vui l&ograve;ng gửi th&ocirc;ng tin đến<br />\n<strong>Hồng Nhung(Ms.)</strong>&nbsp;&ndash; Đại diện truyền th&ocirc;ng McDonald&rsquo;s Việt Nam<br />\nHP: 0972789780<br />\nEmail: nhung.vu@vn.mcd.com</p>\n', '2021-11-22 17:17:42', 1, 1),
(5, 'Trẻ nhỏ có thể đọc được cảm xúc của bạn ngay cả khi bạn đeo khẩu trang', 'tre-nho-co-the-doc-duoc-cam-xuc-cua-ban-ngay-ca-khi-ban-deo-khau-trang', NULL, 'Những đứa trẻ nhỏ thường có thể biết mọi người đang cảm thấy thế nào, ngay cả khi người đó đang đeo khẩu trang, một nghiên cứu mới được công bố cho thấy.', '<h2>Những đứa trẻ nhỏ thường c&oacute; thể biết mọi người đang cảm thấy thế n&agrave;o, ngay cả khi người đ&oacute; đang đeo khẩu trang, một nghi&ecirc;n cứu mới được c&ocirc;ng bố cho thấy.</h2>\r\n\r\n<p>C&oacute; một số lo ngại rằng khẩu trang được sử dụng ở trường học trong đại dịch c&oacute; thể g&acirc;y tổn hại đến sự ph&aacute;t triển của trẻ nhỏ, nhưng t&agrave;i liệu nghi&ecirc;n cứu được c&ocirc;ng bố tr&ecirc;n JAMA Pediatrics cho thấy rằng trẻ em c&oacute; thể nhận ra cảm x&uacute;c tốt như khi ch&uacute;ng kh&ocirc;ng đeo khẩu trang.</p>\r\n\r\n<p>Đối với nghi&ecirc;n cứu n&agrave;y, c&aacute;c nh&agrave; nghi&ecirc;n cứu từ Bệnh viện Đại học Lausanne ở Thụy Sĩ đ&atilde; hiển thị 90 bức ảnh ngẫu nhi&ecirc;n cho gần 300 trẻ em từ 3 đến 6 tuổi. Nhũng bức ảnh cho thấy c&aacute;c diễn vi&ecirc;n thể hiện niềm vui, tức giận hoặc buồn b&atilde;. Trong một nửa số h&igrave;nh ảnh, c&aacute;c diễn vi&ecirc;n đeo khẩu trang.</p>\r\n\r\n<p>C&aacute;c b&eacute; được y&ecirc;u cầu đặt t&ecirc;n cho cảm x&uacute;c, chỉ v&agrave;o một thẻ hiển thị c&aacute;c biểu tượng cảm x&uacute;c ph&ugrave; hợp những cảm x&uacute;c tr&ecirc;n tranh, n&oacute;i với nh&agrave; nghi&ecirc;n cứu rằng b&eacute; kh&ocirc;ng biết c&acirc;u trả lời hoặc n&oacute;i rằng muốn bỏ thử nghiệm. C&aacute;c bạn nhỏ trả lời đ&uacute;ng hầu hết c&aacute;c c&acirc;u trả lời v&agrave; c&oacute; thể gh&eacute;p c&aacute;c thẻ cảm x&uacute;c với h&igrave;nh ảnh tỷ lệ chuẩn x&aacute;c gần bằng nhau, cho d&ugrave; h&igrave;nh diễn vi&ecirc;n đ&oacute; c&oacute; đeo khẩu trang hay kh&ocirc;ng.</p>\r\n\r\n<p>Trẻ em m&ocirc; tả cảm x&uacute;c ch&iacute;nh x&aacute;c hơn 70% khi diễn vi&ecirc;n kh&ocirc;ng đeo khẩu trang v&agrave; đ&uacute;ng hơn 67% khi diễn vi&ecirc;n đeo khẩu trang. Những đứa trẻ c&agrave;ng lớn, ch&uacute;ng c&agrave;ng c&oacute; nhiều c&acirc;u trả lời đ&uacute;ng hơn. Khoảng một phần tư trẻ mẫu gi&aacute;o gặp kh&oacute; khăn hơn trong việc ph&acirc;n biệt nỗi buồn với sự tức giận v&agrave; khoảng 21% đ&ocirc;i khi nhầm lẫn niềm vui với sự tức giận hoặc buồn b&atilde;.</p>\r\n\r\n<p><a href=\"https://afamilycdn.com/150157425591193600/2021/11/21/khautrang-16374840565361773687610.jpeg\" target=\"_blank\"><img alt=\"Trẻ nhỏ có thể đọc được cảm xúc của bạn ngay cả khi bạn đeo khẩu trang - Ảnh 1.\" src=\"https://afamilycdn.com/thumb_w/650/150157425591193600/2021/11/21/khautrang-16374840565361773687610.jpeg\" /></a></p>\r\n\r\n<p>Nhiều lo lắng rằng việc đeo khẩu trang sẽ ảnh hưởng đến ph&aacute;t triển kỹ năng cảm x&uacute;c x&atilde; hội của trẻ.</p>\r\n\r\n<p>&nbsp;Ashley Ruba, một chuy&ecirc;n gia t&acirc;m l&yacute; học ph&aacute;t triển của Ph&ograve;ng th&iacute; nghiệm Cảm x&uacute;c Trẻ em tại Đại học Wisconsin-Madison, kh&ocirc;ng li&ecirc;n quan đến nghi&ecirc;n cứu n&agrave;y, nhưng đ&atilde; thực hiện c&ocirc;ng việc tương tự trong đại dịch. C&ocirc; ấy n&oacute;i rằng c&ocirc; ấy đ&atilde; nh&igrave;n thấy kết quả tương tự với c&ocirc;ng việc của m&igrave;nh.</p>\r\n\r\n<p>&quot;Ngay cả khi đeo khẩu trang, những đứa trẻ nhỏ vẫn c&oacute; thể suy luận hợp l&yacute; về cảm x&uacute;c của người kh&aacute;c&quot;, Ruba n&oacute;i. &quot;T&ocirc;i muốn chỉ ra rằng khu&ocirc;n mặt kh&ocirc;ng phải l&agrave; c&aacute;ch quan trọng nhất để ch&uacute;ng ta truyền đạt cảm x&uacute;c, đ&oacute; chỉ l&agrave; một c&aacute;ch duy nhất. Ch&uacute;ng ta cũng sử dụng giọng n&oacute;i, ch&uacute;ng ta c&oacute; cử chỉ cơ thể, ch&uacute;ng ta c&oacute; c&aacute;c loại manh mối ngữ cảnh kh&aacute;c m&agrave; trẻ em v&agrave; người lớn c&oacute; thể sử dụng để t&igrave;m hiểu xem mọi người đang cảm thấy như thế n&agrave;o&quot;.</p>\r\n\r\n<p><a href=\"https://afamilycdn.com/150157425591193600/2021/11/21/khautrang4-1637484584326279873908.jpeg\" target=\"_blank\"><img alt=\"Trẻ nhỏ có thể đọc được cảm xúc của bạn ngay cả khi bạn đeo khẩu trang - Ảnh 2.\" src=\"https://afamilycdn.com/thumb_w/650/150157425591193600/2021/11/21/khautrang4-1637484584326279873908.jpeg\" /></a></p>\r\n\r\n<p>Rủi ro gặp phải khi nhiễm Covid c&oacute; thể sẽ lớn hơn bất cứ vấn đề nhỏ n&agrave;o về giao tiếp.</p>\r\n\r\n<p>Đối với qu&aacute; tr&igrave;nh xử l&yacute; ng&ocirc;n ngữ, điều quan trọng l&agrave; trẻ em phải học c&aacute;ch đọc nh&eacute;p, nhưng r&otilde; r&agrave;ng từ nghi&ecirc;n cứu, c&ocirc; n&oacute;i rằng việc đeo khẩu trang sẽ kh&ocirc;ng l&agrave;m tổn hại đến sự ph&aacute;t triển cảm x&uacute;c x&atilde; hội của trẻ.</p>\r\n\r\n<p>&quot;Rủi ro gặp phải khi nhiễm Covid do kh&ocirc;ng đeo khẩu trang c&oacute; thể sẽ lớn hơn bất kỳ vấn đề nhỏ n&agrave;o về giao tiếp m&agrave; trẻ em c&oacute; thể mắc phải&quot;, c&ocirc; n&oacute;i.</p>\r\n\r\n<p>L&agrave; một nh&agrave; t&acirc;m l&yacute; học, c&ocirc; ấy nghĩ rằng c&oacute; nhiều kh&iacute;a cạnh kh&aacute;c của đại dịch c&oacute; thể ảnh hưởng đến sự ph&aacute;t triển của một đứa trẻ, chẳng hạn như từ sự c&ocirc; lập x&atilde; hội m&agrave; ch&uacute;ng đ&atilde; c&oacute; với bạn b&egrave; đồng trang lứa khi phải nghỉ học ở nh&agrave; hoặc nếu cha mẹ mất việc l&agrave;m chẳng hạn.</p>\r\n\r\n<p>C&ocirc; n&oacute;i: &quot;Khẩu trang c&oacute; lẽ nằm ở cuối danh s&aacute;ch những thứ cần quan t&acirc;m&quot;.</p>\r\n\r\n<p>Nguồn:&nbsp;<em>CNN</em></p>\r\n', '2021-11-22 17:22:30', 1, 0),
(6, 'Cách chế biến các món ăn ngon từ khoai tây Mỹ cho ngày se lạnh', 'cach-che-bien-cac-mon-an-ngon-tu-khoai-tay-my-cho-ngay-se-lanh', NULL, 'Vào những ngày chuyển đông như thế này thì việc cung cấp dinh dưỡng để giữ gìn sức khoẻ là rất quan trọng cho gia đình mình. Các món ăn vừa tiện lợi, dễ nấu nhưng có đủ dinh dưỡng cho các thành viên trong gia đình rất được các bà nội trợ quan tâm.', '<p>Vừa qua, chị Helen Le &ndash; một food blogger đam m&ecirc; chia sẻ c&aacute;c m&oacute;n ăn của m&igrave;nh cho hơn 800,000 người theo d&otilde;i tr&ecirc;n trang Helen&rsquo;s Recipes &ndash; đ&atilde; chia sẻ 2 m&oacute;n ăn hấp dẫn, dinh dưỡng v&agrave; quan trọng l&agrave; c&aacute;ch nấu đơn giản cho c&aacute;c b&agrave; nội trợ tham khảo. Th&agrave;nh phần ch&iacute;nh của 2 m&oacute;n n&agrave;y l&agrave; khoai t&acirc;y đ&ocirc;ng lạnh của Mỹ c&oacute; b&aacute;n tại c&aacute;c si&ecirc;u thị hay k&ecirc;nh b&aacute;n h&agrave;ng online. Chị Helen chia sẻ l&yacute; do chị chọn giới thiệu 2 m&oacute;n ăn si&ecirc;u ngon si&ecirc;u dễ l&agrave;m lần n&agrave;y với khoai t&acirc;y Mỹ l&agrave; v&igrave; khoai t&acirc;y l&agrave; một loại rau củ chứa nhiều dưỡng chất. &Iacute;t người biết được một củ khoai t&acirc;y trung b&igrave;nh (khoảng 148g) chứa tới 27mg Vitamin C, tương đương với 30% lượng Vitamin C cơ thể ch&uacute;ng ta cần bổ sung trong một ng&agrave;y, nhiều hơn của một quả c&agrave; chua (27%) hay một củ khoai lang (20%).&nbsp;Vitamin C gi&uacute;p hỗ trợ khả năng miễn dịch cho cơ thể v&agrave; khoai t&acirc;y l&agrave; nguồn cung cấp Vitamin C tuyệt vời. Ngo&agrave;i ra khoai t&acirc;y c&ograve;n gi&agrave;u Kali, vi chất dinh dưỡng gi&uacute;p duy tr&igrave; huyết &aacute;p ổn định. Một củ khoai t&acirc;y trung b&igrave;nh c&oacute; chứa tới 620mg vi chất kali, nhiều hơn lượng kali trong một quả chuối.</p>\n\n<p><strong>B&aacute;nh khoai t&acirc;y Mỹ sốt mắm rong biển</strong></p>\n\n<p><em><strong>Nguy&ecirc;n liệu</strong></em></p>\n\n<p>- B&aacute;nh khoai t&acirc;y Mỹ (Hashbrown)</p>\n\n<p>- Rong biến sấy gi&ograve;n</p>\n\n<p>- 5gr ớt bột</p>\n\n<p>- 3 t&eacute;p tỏi</p>\n\n<p>- 2 tr&aacute;i ớt</p>\n\n<p>- Nước mắm, đường, cốt tắc, tương ớt</p>\n\n<p><img alt=\"Cách chế biến các món ăn ngon từ khoai tây Mỹ cho ngày se lạnh - 1\" src=\"https://cdn.24h.com.vn/upload/4-2021/images/2021-11-08/0-1636343126-886-width600height450.jpg\" /></p>\n\n<p><em><strong>C&aacute;ch thực hiện:</strong></em></p>\n\n<p>B&aacute;nh khoai t&acirc;y Mỹ kh&ocirc;ng cần r&atilde; đ&ocirc;ng, chỉ cần qu&eacute;t 1 lớp dầu ăn mỏng, nếu bạn c&oacute; chai xịt dầu ăn c&agrave;ng tốt, xịt 1 lớp dầu ăn mỏng v&agrave; chi&ecirc;n trong nồi chi&ecirc;n kh&ocirc;ng dầu cho gi&ograve;n ở 200 độ C cỡ 12p.&nbsp;</p>\n\n<p><em><strong>C&aacute;ch pha nước xốt:</strong></em></p>\n\n<p>- 2 muỗng canh nước mắm,</p>\n\n<p>- 2 muỗng canh tương ớt,</p>\n\n<p>- 1/2 muỗng canh ớt bột,</p>\n\n<p>- 2 muỗng canh tắc,</p>\n\n<p>- 2 muỗng canh đường</p>\n\n<p>Khuấy đều, cho th&ecirc;m tỏi ớt băm.</p>\n\n<p>Lấy b&aacute;nh khoai t&acirc;y ra v&agrave; phết nước sốt mắm l&ecirc;n 1 mặt rồi cho v&agrave;o chi&ecirc;n 1-2 ph&uacute;t cho sốt mắm b&aacute;m v&agrave;o khoai.</p>\n\n<p>Rong biển gi&ograve;n đem b&oacute;p vụn.</p>\n\n<p>Rắc rong biển l&ecirc;n khoai t&acirc;y l&agrave; xong, thưởng thức m&oacute;n ngon n&oacute;ng hổi, gi&ograve;n tan trong từng miếng m&agrave; ko c&oacute; bị ng&aacute;n như c&aacute;ch chi&ecirc;n ngập dầu.</p>\n\n<p><img alt=\"Cách chế biến các món ăn ngon từ khoai tây Mỹ cho ngày se lạnh - 2\" src=\"https://cdn.24h.com.vn/upload/4-2021/images/2021-11-08/2-1636343126-147-width600height450.jpg\" /></p>\n\n<p><strong>Sợi khoai t&acirc;y Mỹ phủ phomai sốt chua cay kiểu Th&aacute;i</strong></p>\n\n<p>- Sợi khoai t&acirc;y đ&ocirc;ng lạnh của Mỹ</p>\n\n<p>- Phomai cheddar cắt nhỏ</p>\n\n<p>- 1 củ h&agrave;nh t&iacute;m, 3 l&aacute; chanh th&aacute;i chỉ, 1 kh&uacute;c sả</p>\n\n<p>- Sốt Sriracha</p>\n\n<p>- Sốt mayonnaise</p>\n\n<p>- Nước cốt chanh</p>\n\n<p>- Đậu phộng</p>\n\n<p>- Ng&ograve; r&iacute;</p>\n\n<p><img alt=\"Cách chế biến các món ăn ngon từ khoai tây Mỹ cho ngày se lạnh - 3\" src=\"https://cdn.24h.com.vn/upload/4-2021/images/2021-11-08/Cach-che-bien-cac-mon-an-ngon-tu-khoai-tay-My-cho-ngay-se-lanh-3-1636343560-122-width600height1067.jpg\" /></p>\n\n<p><em><strong>C&aacute;ch thực hiện:</strong></em></p>\n\n<p>Sợi khoai t&acirc;y đ&ocirc;ng lạnh của Mỹ kh&ocirc;ng cần r&atilde; đ&ocirc;ng, qu&eacute;t 1 lớp dầu ăn mỏng hay xịt 1 lớp dầu ăn, v&agrave; chi&ecirc;n trong nồi chi&ecirc;n kh&ocirc;ng dầu cho gi&ograve;n ở 200 độ C cỡ 10p.&nbsp;&nbsp;&nbsp;</p>\n\n<p>D&ugrave;ng tiếp ch&eacute;n sốt mắm m&oacute;n trước, th&ecirc;m ng&ograve; r&iacute; băm, 1 mcf h&agrave;nh t&iacute;m, sả v&agrave; l&aacute; chanh băm nhuyễn</p>\n\n<p>Sợi khoai t&acirc;y Mỹ sau khi &ldquo;nướng&rdquo; gi&ograve;n th&igrave; cho ra dĩa sứ hay kim loại chịu nhiệt, qu&eacute;t một lớp sốt mắm Th&aacute;i, rắc phomai cheddar vụn l&ecirc;n v&agrave; tiếp tục cho v&agrave;o nồi chi&ecirc;n kh&ocirc;ng dầu ở 200 độ trong 2-3 ph&uacute;t cho phomai tan chảy v&agrave; thấm sốt mắm.&nbsp;</p>\n\n<p>Pha sốt sriracha v&agrave; mayyonaise cho v&agrave;o t&uacute;i bắt b&ocirc;ng kem/b&igrave;nh xịt phun l&ecirc;n tr&ecirc;n mặt khoai t&acirc;y, rắc đậu phộng rang đập dập, h&agrave;nh l&aacute; cắt x&eacute;o v&agrave;&nbsp;trang tr&iacute; với v&agrave;i l&aacute;t chanh v&agrave; l&aacute; ng&ograve; rồi thưởng thức th&ocirc;i.</p>\n\n<p>Sử dụng nồi chi&ecirc;n kh&ocirc;ng dầu để &ldquo;nướng&rdquo; khoai t&acirc;y đ&ocirc;ng lạnh Mỹ, m&oacute;n ăn kh&ocirc;ng bị ngấy dầu v&agrave; nhất l&agrave; c&aacute;c b&agrave; nội trợ kh&ocirc;ng phải đi lau dọn bếp sau khi chi&ecirc;n theo c&aacute;ch chi&ecirc;n ngập dầu.</p>\n\n<p>Khoai t&acirc;y cung cấp carb, kali v&agrave; năng lượng m&agrave; c&ocirc; thể ch&uacute;ng ta cần để hoạt động tốt nhất.</p>\n\n<p><img alt=\"Cách chế biến các món ăn ngon từ khoai tây Mỹ cho ngày se lạnh - 4\" src=\"https://cdn.24h.com.vn/upload/4-2021/images/2021-11-08/Cach-che-bien-cac-mon-an-ngon-tu-khoai-tay-My-cho-ngay-se-lanh-1-1636343560-633-width600height450.jpg\" /></p>\n', '2021-11-22 17:29:00', 1, 0);

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
  `image` varchar(256) DEFAULT NULL,
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
  `avatar` varchar(256) DEFAULT NULL,
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
