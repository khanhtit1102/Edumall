-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 13, 2018 at 09:55 AM
-- Server version: 10.1.36-MariaDB
-- PHP Version: 7.1.23

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `edumall`
--

-- --------------------------------------------------------

--
-- Table structure for table `adminchat`
--

CREATE TABLE `adminchat` (
  `id_chat` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `content_chat` text COLLATE utf8_unicode_ci NOT NULL,
  `date_chat` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `adminchat`
--

INSERT INTO `adminchat` (`id_chat`, `id_user`, `content_chat`, `date_chat`) VALUES
(1, 1, 'Xin chào tất cả các Admin', '2018-09-18 09:29:00'),
(2, 1, 'Trong ngày mai tất cả những vấn đề còn tồn đọng sẽ được báo cáo lại cho tôi và giải quyết! Thân', '2018-09-18 22:53:12'),
(3, 1, 'Hello', '2018-12-13 13:59:03'),
(4, 1, 'Các bạn đã được chưa', '2018-12-13 15:48:20');

-- --------------------------------------------------------

--
-- Table structure for table `cart`
--

CREATE TABLE `cart` (
  `id_gh` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `id_cs` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE `category` (
  `stt_cate` int(11) NOT NULL,
  `id_cate` varchar(255) NOT NULL,
  `name_cate` varchar(255) NOT NULL,
  `icon_cate` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`stt_cate`, `id_cate`, `name_cate`, `icon_cate`) VALUES
(1, 'cntt', 'Công nghệ thông tin', 'fa fa-code'),
(5, 'kdkn', 'Kinh doanh & Khởi nghiệp', 'fa fa-line-chart'),
(7, 'mkt', 'Marketing', 'fa fa-bullhorn'),
(3, 'ndc', 'Nuôi dạy con', 'fa fa-grav'),
(6, 'nn', 'Ngoại ngữ', 'fa fa-comments'),
(4, 'ptbt', 'Phát triển bản thân', 'fa fa-black-tie'),
(8, 'thvp', 'Tin học văn phòng', 'fa fa-desktop'),
(2, 'tk', 'Thiết kế', 'fa fa-google-wallet');

-- --------------------------------------------------------

--
-- Table structure for table `cmt`
--

CREATE TABLE `cmt` (
  `id_cmt` int(11) NOT NULL,
  `id_cs` int(11) NOT NULL,
  `ten_cmt` varchar(255) NOT NULL,
  `email_cmt` varchar(255) NOT NULL,
  `nd_cmt` text NOT NULL,
  `ngay_cmt` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `cmt`
--

INSERT INTO `cmt` (`id_cmt`, `id_cs`, `ten_cmt`, `email_cmt`, `nd_cmt`, `ngay_cmt`) VALUES
(1, 12, 'Tài khoản 1', 'thanhvien1@mail.com', 'Học rất ổn định\r\n', '2018-12-13 15:45:33'),
(2, 12, 'Tài khoản 1', 'thanhvien1@mail.com', 'tiếp thu kiến thức rất nhanh', '2018-12-13 15:46:18');

-- --------------------------------------------------------

--
-- Table structure for table `course`
--

CREATE TABLE `course` (
  `id_cs` int(11) NOT NULL,
  `ten_cs` varchar(255) NOT NULL,
  `info_cs` varchar(255) NOT NULL,
  `thumb_cs` varchar(255) NOT NULL,
  `id_user` int(11) NOT NULL,
  `mota_cs` text NOT NULL,
  `giaotrinh_cs` text NOT NULL,
  `id_cate` varchar(255) NOT NULL,
  `gia_cs` int(11) NOT NULL,
  `sobh_cs` int(11) NOT NULL,
  `time_cs` varchar(255) NOT NULL,
  `playlist_key` varchar(255) NOT NULL,
  `created_date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `course`
--

INSERT INTO `course` (`id_cs`, `ten_cs`, `info_cs`, `thumb_cs`, `id_user`, `mota_cs`, `giaotrinh_cs`, `id_cate`, `gia_cs`, `sobh_cs`, `time_cs`, `playlist_key`, `created_date`) VALUES
(1, 'Tiếng Trung thương mại cho doanh nhân làm việc tại Trung Quốc', 'Chủ động giao dịch và trao đổi với đối tác Trung Quốc, tránh lệ thuộc vào phiên dịch.', 'eb2ae42967fcc7eeb0308484e49bb427.jpg', 1, '<p>Kh&oacute;a học sẽ trang bị cho c&aacute;c bạn kiến thức cơ bản về ph&aacute;t &acirc;m tiếng Trung, số lượng từ, c&aacute;ch biểu đạt số tiền, c&aacute;ch hỏi gi&aacute;, mặc cả, đ&agrave;m ph&aacute;n v&agrave; từ vựng tiếng Trung thương mại. Kh&oacute;a học được chia l&agrave;m 8 chủ điểm, đ&oacute; l&agrave;: L&agrave;m quen, c&ocirc;ng t&aacute;c chuẩn bị trước khi sang Trung Quốc, hỏi đường đi lại, ng&acirc;n h&agrave;ng v&agrave; tiền tệ, mua quần &aacute;o gi&agrave;y d&eacute;p, mua đồ điện tử gia dụng, mua đồ nội thất v&agrave; vận chuyển h&agrave;ng h&oacute;a từ Trung Quốc về Việt Nam. Mỗi chủ điểm sẽ gồm nhiều b&agrave;i học nhỏ, mỗi b&agrave;i học sẽ cung cấp b&agrave;i kh&oacute;a tương ứng với ngữ cảnh cụ thể, từ vựng về thương mại v&agrave; phần luyện tập để gi&uacute;p c&aacute;c bạn nhớ l&acirc;u hơn.</p>\r\n\r\n<p><a href=\"https://d1nzpkv5wwh1xf.cloudfront.net/640/kelley-577a160c047c994bb7e5b397/20170307-thanhmaihskanh/chinesemarketstreet.jpg\" target=\"\"><img alt=\"Alternative Text\" src=\"https://d1nzpkv5wwh1xf.cloudfront.net/640/kelley-577a160c047c994bb7e5b397/20170307-thanhmaihskanh/chinesemarketstreet.jpg\" style=\"height:434px; width:640px\" /></a></p>\r\n', '<ol>\r\n	<li>\r\n	<h3>L&agrave;m quen</h3>\r\n	</li>\r\n	<li>\r\n	<h3>C&ocirc;ng t&aacute;c chuẩn bị trước khi sang Trung Quốc</h3>\r\n	</li>\r\n	<li>\r\n	<h3>Hỏi đường</h3>\r\n	</li>\r\n	<li>\r\n	<h3>Ng&acirc;n h&agrave;ng v&agrave; tiền tệ</h3>\r\n	</li>\r\n	<li>\r\n	<h3>Mua quần &aacute;o gi&agrave;y d&eacute;p</h3>\r\n	</li>\r\n	<li>\r\n	<h3>Mua đồ điện, đồ gia dụng</h3>\r\n	</li>\r\n	<li>\r\n	<h3>Mua đồ nội thất</h3>\r\n	</li>\r\n	<li>\r\n	<h3>Vận chuyển h&agrave;ng h&oacute;a</h3>\r\n	</li>\r\n</ol>\r\n', 'nn', 599000, 42, '05:39:30', 'PL33lvabfss1zfGxCcTIYr5IjsyweWWtAO', '2018-12-13'),
(2, 'Học Thiết kế qua Banner cho người mới bắt đầu và không chuyên', 'Có được những mẹo vặt trong học và xây dựng sản phẩm thiết kế', '4f95edb2deaa5ed2dc6837827883bd0a.jpg', 1, '<p>Thiết kế Đồ họa l&agrave; một bộ m&ocirc;n khoa học của sự tổ chức sắp xếp c&aacute;c th&agrave;nh phần tr&ecirc;n một bản thiết kế. Để c&oacute; thể tạo ra một bản thiết kế, trước ti&ecirc;n người l&agrave;m thiết kế cần phải sở hữu cho m&igrave;nh những c&ocirc;ng cụ thiết kế nhất định như Illustrator, photoshop hay indesign .v.v. Việc th&agrave;nh thạo c&aacute;c c&ocirc;ng cụ sẽ l&agrave;m tăng khả năng truyền đạt, x&acirc;y dựng, m&ocirc; tả, thể hiện những &yacute; tưởng cho một bản thiết kế hiệu quả v&agrave; nhanh ch&oacute;ng. Tuy nhi&ecirc;n nếu chỉ giỏi c&ocirc;ng cụ m&agrave; thiếu đi những kiến thức cơ bản về c&aacute;c nguy&ecirc;n tắc (nguy&ecirc;n l&yacute;) thiết kế sẽ khiến rất nhiều bạn cảm thấy bối rối khi phải x&acirc;y dựng một sản phẩm v&igrave; kh&ocirc;ng biết bắt đầu từ đ&acirc;u.</p>\r\n\r\n<p>Thiết kế l&agrave; tập hợp của h&agrave;ng loạt c&aacute;c quy tr&igrave;nh, giải ph&aacute;p, &yacute; tưởng để nhằm mục đ&iacute;ch truyền đạt được th&ocirc;ng điệp của sản phẩm th&ocirc;ng qua ng&ocirc;n ngữ h&igrave;nh ảnh hướng tới người xem. Một bản thiết kế đẹp l&agrave; một bản thiết kế truyền đạt được th&ocirc;ng điệp một c&aacute;ch ấn tượng, độc đ&aacute;o, dễ hiểu,... c&oacute; t&iacute;nh th&uacute;c đẩy người xem h&agrave;nh động theo th&ocirc;ng điệp m&agrave; n&oacute; mang lại. Khoa học của việc tổ chức sắp xếp ch&iacute;nh l&agrave; bản chất của nghề thiết kế đồ họa. C&aacute;c vấn đề được giải quyết một c&aacute;ch logic v&agrave; khoa học nhằm thỏa m&atilde;n được những h&agrave;nh vi v&agrave; th&oacute;i quen của người xem, được đ&uacute;c kết qua thời gian th&ocirc;ng qua con đường thị gi&aacute;c từ đ&oacute; chi phối trực tiếp tới nhận thức v&agrave; tư duy. Thiết kế đồ họa l&agrave; một m&ocirc;n học th&uacute; vị ờ ở đ&oacute; người học sẽ phải t&igrave;m hiểu kh&ocirc;ng chỉ c&aacute;c kỹ năng về minh họa, tạo h&igrave;nh, phối m&agrave;u, bố cục... m&agrave; c&ograve;n phải t&igrave;m hiểu về c&aacute;c h&agrave;nh vi, t&acirc;m l&yacute;, th&oacute;i quen x&atilde; hội của người xem...</p>\r\n\r\n<p>Đ&atilde; c&oacute; rất nhiều bạn gửi y&ecirc;u cầu về cho m&igrave;nh (sau khi tham gia c&aacute;c kh&oacute;a học về phần mềm Illustrator, Photoshop, Indesign m&agrave; m&igrave;nh đ&atilde; ph&aacute;t h&agrave;nh tr&ecirc;n cổng của nh&agrave; ph&aacute;t h&agrave;nh Edumall) n&oacute;i rằng c&aacute;c bạn gặp phải nhiều kh&oacute; khăn khi kh&ocirc;ng nắm vững được c&aacute;c nguy&ecirc;n tắc thiết kế v&agrave; bối rối kh&ocirc;ng biết bắt đầu từ đ&acirc;u, thiết kế một sản phẩm th&igrave; phải bắt đầu từ những bước như n&agrave;o. Từ trước tới nay việc dạy thiết kế lu&ocirc;n được diễn ra bằng sự tương t&aacute;c trực tiếp giữa người hướng dẫn v&agrave; người học, nhằm mục đ&iacute;ch kh&ocirc;ng chỉ truyền đạt c&aacute;c l&yacute; thuyết thiết kế, m&agrave; người học c&ograve;n được chỉ r&otilde; những lỗi mắc phải tr&ecirc;n bản thiết kế của m&igrave;nh để từ đ&oacute; r&uacute;t ra kinh nghiệm bản th&acirc;n. Tuy nhi&ecirc;n khoảng c&aacute;ch v&agrave; thời gian lu&ocirc;n l&agrave; r&agrave;o cản với nhiều người để kh&ocirc;ng thể tới một lớp học n&agrave;o đ&oacute;. Ch&iacute;nh v&igrave; thế m&igrave;nh x&acirc;y dựng l&ecirc;n kh&oacute;a học n&agrave;y với mục đ&iacute;ch từng bước mang lại những kiến thức cơ bản của m&ocirc;n thiết kế đồ họa, gi&uacute;p cho những bạn mới bắt đầu hoặc những bạn kh&ocirc;ng chuy&ecirc;n hoặc đang muốn thử sức trong một c&ocirc;ng việc mới l&agrave;m quen với quy tr&igrave;nh x&acirc;y dựng một bản thiết kế c&ugrave;ng với những nguy&ecirc;n tắc cần thiết để gi&uacute;p bản thiết kế của m&igrave;nh trở n&ecirc;n tiến bộ hơn. Do đặc th&ugrave; của việc học online l&agrave; tự học n&ecirc;n phương ph&aacute;p được m&igrave;nh đưa ra trong kh&oacute;a học n&agrave;y sẽ nhấn mạnh v&agrave;o sự đơn giản, kh&ocirc;ng mang qu&aacute; nhiều yếu tố học thuật. Việc học sẽ được bắt đầu với t&igrave;nh huống sản phẩm thực tế l&agrave; Banner. C&aacute;c nguy&ecirc;n tắc được m&igrave;nh đưa v&agrave;o trong thiết kế Banner cũng ch&iacute;nh l&agrave; những nguy&ecirc;n tắc chung cho việc thiết kế một sản phẩm n&agrave;o đ&oacute;. Ch&iacute;nh v&igrave; thế t&ecirc;n kh&oacute;a học l&agrave; Thiết kế Banner nhưng thực tế bạn c&oacute; thể ứng dụng n&oacute; v&agrave;o nhiều sản phẩm cụ thể kh&aacute;c.</p>\r\n', '', 'tk', 699000, 43, '04:55:49', 'PL33lvabfss1zfGxCcTIYr5IjsyweWWtAO', '2018-12-13'),
(3, 'Kế toán trong các doanh nghiệp', 'Có được những kiến thức nhất định về đặc điểm hoạt động kinh doanh ,sự khác nhau giữa các loại doanh nghiệp và đặc điểm kế toán tại các doanh nghiệp đó.', '75077c79bb7f495dbc42271a974c1546.jpg', 1, '<p>Hoạt đ&ocirc;̣ng k&ecirc;́ to&aacute;n c&oacute; th&ecirc;̉ n&oacute;i l&agrave; m&ocirc;̣t trong những hoạt đ&ocirc;̣ng quan trọng nh&acirc;́t đ&ocirc;́i với c&aacute;c doanh nghi&ecirc;̣p. Th&ocirc;ng qua hoạt đ&ocirc;̣ng k&ecirc;́ to&aacute;n, nh&agrave; quản l&yacute; c&oacute; th&ecirc;̉ nắm bắt được t&igrave;nh h&igrave;nh sản xu&acirc;́t kinh doanh của doanh nghi&ecirc;̣p cũng như di&ecirc;̃n bi&ecirc;́n của thị trường.</p>\r\n\r\n<p>Kh&oacute;a học &quot;K&ecirc;́ to&aacute;n trong c&aacute;c doanh nghi&ecirc;̣p&quot; n&agrave;y g&ocirc;̀m 5 chương, với 15 b&agrave;i giảng k&eacute;o d&agrave;i khoảng 185 ph&uacute;t cung c&acirc;́p cho bạn những ki&ecirc;́n thức cơ bản v&ecirc;̀ nghi&ecirc;̣p vụ k&ecirc;́ to&aacute;n trong doanh nghi&ecirc;̣p, những đặc đi&ecirc;̉m hoạt đ&ocirc;̣ng kinh doanh kh&aacute;c nhau tại c&aacute;c loại doanh nghi&ecirc;̣p, cũng như ch&ecirc;́ đ&ocirc;̣ k&ecirc;́ to&aacute;n được &aacute;p dụng trong c&aacute;c loại doanh nghi&ecirc;̣p n&agrave;y. Sau khi ho&agrave;n th&agrave;nh kh&oacute;a học, bạn sẽ c&oacute; được những ki&ecirc;́n thức, khả năng v&acirc;̣n dụng linh hoạt trong hoạt đ&ocirc;̣ng k&ecirc;́ to&aacute;n tại c&aacute;c doanh nghi&ecirc;̣p.</p>\r\n\r\n<p>N&ecirc;́u bạn đang l&agrave; m&ocirc;̣t k&ecirc;́ to&aacute;n vi&ecirc;n, mu&ocirc;́n củng c&ocirc;́ th&ecirc;m những kỹ năng nghi&ecirc;̣p vụ của m&igrave;nh, b&ocirc;̉ sung ki&ecirc;́n thức đ&ecirc;̉ c&oacute; th&ecirc;̉ th&iacute;ch ứng với c&ocirc;ng vi&ecirc;̣c m&ocirc;̣t c&aacute;ch nhanh ch&oacute;ng trong trường hợp thay đ&ocirc;̉i m&ocirc;i trường l&agrave;m vi&ecirc;̣c hay định hướng ngh&ecirc;̀ nghi&ecirc;̣p của bạn l&agrave; k&ecirc;́ to&aacute;n trong c&aacute;c doanh nghi&ecirc;̣p th&igrave; kh&oacute;a học n&agrave;y d&agrave;nh ri&ecirc;ng cho bạn.</p>\r\n\r\n<p>H&atilde;y đăng k&iacute; ngay h&ocirc;m nay bởi đ&acirc;y sẽ l&agrave; lựa chọn ho&agrave;n to&agrave;n s&aacute;ng su&ocirc;́t của bạn!</p>\r\n', '', 'tk', 299000, 15, '03:04:51', 'PL33lvabfss1zfGxCcTIYr5IjsyweWWtAO', '2018-12-13'),
(4, 'Tuyệt chiêu nuôi dạy con thành tài', 'Biết cách vận dụng dạy con mọi lúc mọi nơi thông qua các hoạt động hàng ngày.', '0e4bff5e7c7d2d6e92405f425ea3d09d.png', 1, '<p>Việc nu&ocirc;i dạy con thời hiện l&agrave; v&ocirc; c&ugrave;ng kh&oacute; khăn, rất nhiều yếu tố t&aacute;c động đến sự ph&aacute;t triển của một đứa trẻ. Nếu cha mẹ kh&ocirc;ng đủ kiến thức kỹ năng để gi&aacute;o dục con c&aacute;i th&igrave; sẽ kh&ocirc;ng nắm bắt được t&acirc;m l&yacute; v&agrave; phương ph&aacute;p gi&aacute;o dục đ&uacute;ng cho con. Ngay từ nhỏ việc &aacute;p dụng đ&uacute;ng phương ph&aacute;p gi&uacute;p cha mẹ ph&aacute;t huy được tiềm năng của con. Cha mẹ cần phải hiểu r&otilde; thế n&agrave;o l&agrave; &quot;Dạy con từ thuở c&ograve;n thơ&quot; để biết c&aacute;ch khai mở những điều con c&oacute; thể ph&aacute;t huy được khi c&ograve;n b&eacute;. B&ecirc;n cạnh đ&oacute; cha mẹ cũng hiểu c&aacute;ch dạy con mọi l&uacute;c mọi nơi th&ocirc;ng qua c&aacute;c tr&ograve; chơi. Người học trong v&ocirc; thức, người dạy c&oacute; chủ &yacute;. Từ đ&oacute; ph&aacute;t huy t&iacute;nh s&aacute;ng tạo của con th&ocirc;ng qua tr&ograve; chơi.</p>\r\n\r\n<p>Hiện nay rất nhiều phụ huynh ph&agrave;n n&agrave;n về việc kh&ocirc;ng thể n&oacute;i chuyện được với con khi con lớn. L&yacute; do l&agrave; cha mẹ chưa biết c&aacute;ch l&agrave;m bạn với con. Cha mẹ cần lắng nghe con m&igrave;nh n&oacute;i để khi m&igrave;nh n&oacute;i con m&igrave;nh nghe. C&oacute; như vậy mới mong thấu hiểu con v&agrave; l&agrave;m bạn với con được. Cha mẹ cũng k&ecirc;u ca nhiều về việc con m&igrave;nh kh&ocirc;ng chịu l&agrave;m việc nh&agrave;, việc n&agrave;y cũng do lỗi của cha mẹ đ&atilde; kh&ocirc;ng tạo t&iacute;nh tự lập cho con. Hiện nay với ciệc ph&aacute;t triển của c&ocirc;ng nghệ th&ocirc;ng tin việc con c&aacute;i hay sử dụng một c&aacute;ch tho&aacute;i qu&aacute; khiến cho việc hoc h&agrave;nh, vui chơi bị ảnh hưởng, nặng hơn l&agrave; t&igrave;nh trạng nghiện game. Cha mẹ cần quản l&yacute; con đ&uacute;ng c&aacute;ch hơn l&agrave; cấm đo&aacute;n con m&igrave;nh.</p>\r\n\r\n<p>Một t&igrave;nh trạng kh&aacute; phổ biến hiện nay đ&oacute; l&agrave; vai tr&ograve; của cha mẹ trong việc nu&ocirc;i dạy con. Rất nhiều &ocirc;ng bố vẫn nghĩ việc nu&ocirc;i dạy con l&agrave; việc của mẹ. Nhưng thực tế vai tr&ograve; của người cha l&agrave; v&ocirc; c&ugrave;ng quan trọng đến sự h&igrave;nh th&agrave;nh v&agrave; ph&aacute;t triển nh&acirc;n c&aacute;ch của con. Quan niệm lạc hậu mới lu&ocirc;n nghĩ &quot;Con hư tại mẹ&quot;. Do x&atilde; hội ph&aacute;t triển n&ecirc;n con c&aacute;i cũng hiếm được tham gia c&aacute;c tr&ograve; chơi d&acirc;n gian. Cha mẹ cần thường xuy&ecirc;n chia sẻ với con về những gi&aacute; trị truyền thống để con hiểu về cuội nguồn. Đồng thời cho con tham gia sinh hoạt những hoạt đ&ocirc;ng hướng t&acirc;m linh để con hướng đến l&ograve;ng tư bi, nh&acirc;n hậu. Một thực tế hiện nay đang gặp phải l&agrave; việc định hướng nghề nghiệp cho con c&aacute;i của c&aacute;c bậc phụ huynh đang chủ yếu dựa v&agrave;o cha mẹ chứ chưa dựa v&agrave;o năng lực, đam m&ecirc; của con&nbsp;n&ecirc;n dẫn đến t&iacute;nh trạng ch&aacute;n nản khi học trường đại học con kh&ocirc;ng th&iacute;ch, ra trường kh&ocirc;ng l&agrave;m việc m&igrave;nh đam m&ecirc; hiệu quả c&ocirc;ng việc kh&ocirc;ng cao. T&igrave;nh trạng thất nghiệp nhiều g&acirc;y t&igrave;nh trạng tốn k&eacute;m. V&igrave; vậy định hướng nghề nghiệp cho con cần dựa v&agrave;o năng lực v&agrave; đam m&ecirc; của con. Cha mẹ cũng cần biết c&aacute;ch động vi&ecirc;n, khen ngợi, ghi nhận những g&igrave; con đ&atilde; l&agrave;m được. Kh&ocirc;ng so s&aacute;nh, ch&ecirc; bai con m&igrave;nh l&agrave;m con tự ti sẽ hạn chế sự ph&aacute;t triển của con.</p>\r\n', '', 'ndc', 599000, 12, '02:11:45', 'PL33lvabfss1zfGxCcTIYr5IjsyweWWtAO', '2018-12-13'),
(5, 'DẠY CON TỪ TIỀM THỨC', 'Học viên không bao giờ biết hành vi thái độ của con có nguồn gốc từ LỜI NÓI và THÁI ĐỘ của mình. Khi đó phụ huynh sẽ tìm cách đổ lỗi cho gen tính cách, hoặc môi trường bạn bè, thầy cô giáo... hoặc một yếu tố khác.', 'dbdaed22ec064d913ab3769a07271b08.jpg', 1, '<p>Kh&oacute;a học n&agrave;y sẽ mang đến cho c&aacute;c phụ huynh: C&aacute;c mẫu ng&ocirc;n ngữ m&agrave; thế hệ trước đ&atilde; c&agrave;i đặt sai cho bố mẹ về c&aacute;ch dạy con. C&aacute;c mẫu ng&ocirc;n ngữ đ&uacute;ng đắn, gi&agrave;u cảm x&uacute;c m&agrave; c&aacute;c phương ph&aacute;p gi&aacute;o dục hiện đại đang &aacute;p dụng gợi &yacute; để dạy con: Glenn Doman, Shichida, Montessori, NLP,... C&aacute;c mẫu n&agrave;y chủ yếu dựa tr&ecirc;n hệ thống kiến thức khoa học của Hiệp hội Lập tr&igrave;nh Ng&ocirc;n ngữ tư duy (hệ thần kinh) Hoa Kỳ.</p>\r\n\r\n<p>Lộ tr&igrave;nh kh&oacute;a học: Đi từ chỗ phụ huynh nhận diện vấn đề hiện tại của m&igrave;nh v&agrave; con; t&igrave;m được nguy&ecirc;n nh&acirc;n gốc rễ của những vấn đề đ&oacute;; xem c&aacute;ch chuy&ecirc;n gia l&agrave;m mẫu những mẫu ng&ocirc;n ngữ đ&uacute;ng; luyện tập n&oacute;i theo v&agrave; &aacute;p dụng với con h&agrave;ng ng&agrave;y; đến đạt được kết quả l&agrave; sự thay đổi ngoạn mục của con về cả cảm x&uacute;c lẫn h&agrave;nh vi.</p>\r\n\r\n<p>Học vi&ecirc;n được lợi &iacute;ch khi mua: Học vi&ecirc;n gỡ bỏ được kh&uacute;c mắc trong l&ograve;ng về ch&iacute;nh vấn đề nu&ocirc;i dạy con của m&igrave;nh. Phụ huynh hiểu r&otilde; tại sao con c&oacute; h&agrave;nh vi phản ứng v&agrave; cảm x&uacute;c như vậy. Phụ huynh c&oacute; quyền chủ động d&ugrave;ng ng&ocirc;n từ v&agrave; cảm x&uacute;c để c&agrave;i đặt lại h&agrave;nh vi cho con.</p>\r\n\r\n<p>Phương thức giảng dạy:&nbsp;Chủ&nbsp;yếu l&agrave; L&Agrave;M MẪU TRỰC QUAN SINH ĐỘNG học vi&ecirc;n chỉ cần, nh&igrave;n, nghe,&nbsp;bắt chước. Học vi&ecirc;n c&oacute; thể đặt c&acirc;u hỏi ở b&ecirc;n dưới, giảng vi&ecirc;n sẽ tận t&igrave;nh trả lời v&agrave; hỗ trợ.</p>\r\n\r\n<p>Kh&oacute;a học đặc biệt: Sau khi mua th&igrave; học vi&ecirc;n được tham gia cộng đồng cha mẹ dạy con từ tiềm thức để c&ugrave;ng nhau trưởng th&agrave;nh tr&ecirc;n h&agrave;nh tr&igrave;nh l&agrave;m cha mẹ mỗi ng&agrave;y.</p>\r\n', '', 'ndc', 699000, 18, '02:36:29', 'PL33lvabfss1zfGxCcTIYr5IjsyweWWtAO', '2018-12-13'),
(6, 'TS Lê Thẩm Dương - Thẩm định lòng tin', 'Hiểu được khách hàng là gì, nhu cầu khách hàng như thế nào và mong muốn thực sự của khách hàng', 'a1a533a0f00728b6cb4cf3540c5039fa.png', 1, '<p>Kh&oacute;a học độc quyền giữa Edumal v&agrave; TS. L&ecirc; Thẩm Dương về chủ đề &quot;Thẩm định l&ograve;ng tin (độ tin cậy) của đối t&aacute;c trong kinh doanh. To&agrave;n bộ hệ thống kiến thức được dựa tr&ecirc;n kinh nghiệm c&ocirc;ng t&aacute;c v&agrave; giảng dạy của TS L&ecirc; Thẩm Dương, từng trải qua rất nhiều buổi huấn luyện cho c&aacute;c doanh nghiệp, tập đo&agrave;n lớn v&agrave; cả những đ&uacute;c kết từ kinh nghiệm kinh doanh tr&ecirc;n thế giới</p>\r\n', '', 'ptbt', 269000, 13, '01:58:38', 'PL33lvabfss1zfGxCcTIYr5IjsyweWWtAO', '2018-12-13'),
(7, 'Học làm lãnh đạo', 'Học viên nắm vững được những kiến thức cơ bản về lãnh đạo', 'ca045483f7327ab667366a88e25e476f.png', 1, '<p>Bạn muốn trở th&agrave;nh một nh&agrave; L&atilde;nh Đạo hiệu quả, bạn muốn được người kh&aacute;c t&ocirc;n trọng v&agrave; t&iacute;n nhiệm, bạn muốn giao tiếp hiệu quả hơn với người kh&aacute;c để kh&aacute;m ph&aacute; ra năng lực của bản th&acirc;n v&agrave; khai th&aacute;c tiềm năng của những người xung quanh, hay đơn giản bạn chỉ muốn bổ sung, sắp xếp lại những kiến thức về L&atilde;nh Đạo của m&igrave;nh để chuẩn bị cho một vị tr&iacute;, nhiệm vụ mới&hellip;Nếu bạn c&oacute; đang băn khoăn về một hoặc tất cả những điều tr&ecirc;n. Th&igrave; chương tr&igrave;nh &ldquo;Học l&agrave;m L&atilde;nh Đạo&rdquo; l&agrave; để d&agrave;nh cho bạn. Cho d&ugrave; bạn c&oacute; đang l&agrave; học sinh, sinh vi&ecirc;n người đi l&agrave;m hay đ&atilde; l&agrave; những nh&agrave; quản l&yacute; trong tổ chức hoặc c&ocirc;ng ty đi chăng nữa.<br />\r\nSau chương tr&igrave;nh bạn sẽ hiểu được những kiến thức cơ bản về L&atilde;nh đạo, biết v&agrave; tr&aacute;nh những sai lầm thường gặp phải của hầu hết mọi người khi nghĩ về L&atilde;nh Đạo,h&igrave;nh dung ra Ch&acirc;n dung của một nh&agrave; L&atilde;nh Đạo được t&iacute;n nhiệm trong thời đại ng&agrave;ynay, cần những th&oacute;i quen, kỹ năng g&igrave; để trở th&agrave;nh một nh&agrave; L&atilde;nh Đạo hiệu quả&hellip;.. V&agrave; đạt được những kết quả cụ thể trong Vai tr&ograve; l&agrave;m L&atilde;nh Đạo trong tương lai tại nơi m&igrave;nh đang l&agrave;m việc</p>\r\n', '', 'ptbt', 599000, 21, '02:31:13', 'PL33lvabfss1zfGxCcTIYr5IjsyweWWtAO', '2018-12-13'),
(8, 'Xây Dựng Hệ Thống Kiếm Tiền Bền Vững Với Dropshipping eBay', 'Tìm hiểu các khái niệm, thuật ngữ của MMO đặc biệt là dropshipping', 'b83e2a3630b7ccfa52be51367c36fc03.jpg', 1, '<p>Kh&oacute;a học sẽ gi&uacute;p bạn:&nbsp;</p>\r\n\r\n<p>- T&igrave;m hiểu c&aacute;c kh&aacute;i niệm, thuật ngữ của MMO đặc biệt l&agrave; dropshipping<br />\r\n- X&acirc;y dựng hệ thống dropshipping cho ri&ecirc;ng bạn<br />\r\n- Ph&acirc;n t&iacute;ch chọn sản phẩm tiềm năng<br />\r\n- C&aacute;c bước list h&agrave;ng l&ecirc;n eBay v&agrave; xử l&yacute; đơn h&agrave;ng<br />\r\n- Một số nh&agrave; cung cấp rất chất lượng<br />\r\n- Bạn kh&ocirc;ng chỉ được học về c&aacute;c kiến thức dropship v&agrave; kiếm tiền sau kh&oacute;a học m&agrave; sau kh&oacute;a học sẽ gi&uacute;p ch&uacute;ng ta tăng khả năng tư duy kinh doanh đặc biệt cho những ai đang kinh doanh truyền thống sẽ được bước ra một ch&acirc;n trời kinh doanh mới.</p>\r\n', '', 'kdkn', 699000, 35, '03:08:49', 'PL33lvabfss1zfGxCcTIYr5IjsyweWWtAO', '2018-12-13'),
(9, 'Xây dựng Đạo đức - Văn hóa', 'Hiểu được tầm quan trọng của đạo đức kinh doanh đối với hoạt động của doanh nghiệp, áp dụng những kiến thức về đạo đức kinh doanh trong quá trình doanh nghiệp hoạt động.', 'a930fbd9794ee10608c011f285bb4da2.jpg', 1, '<p>Đạo đức kinh doanh v&agrave; văn h&oacute;a doanh nghiệp đ&atilde; v&agrave; đang trở th&agrave;nh một nh&acirc;n tố c&oacute; t&aacute;c động tới mọi kh&iacute;a cạnh hoạt động kinh doanh của doanh nghiệp.</p>\r\n\r\n<p>Đạo đức kinh doanh g&ocirc;̀m nhi&ecirc;̀u y&ecirc;́u t&ocirc;́, từ tổ chức quản l&yacute; hoạt động kinh doanh, c&aacute;c quan hệ trong v&agrave; ngo&agrave;i doanh nghiệp cho đến phong th&aacute;i, phong c&aacute;ch của người l&atilde;nh đạo v&agrave; c&aacute;ch ứng xử giữa c&aacute;c th&agrave;nh vi&ecirc;n trong doanh nghiệp.</p>\r\n\r\n<p>Ch&iacute;nh v&igrave; vậy, nghi&ecirc;n cứu v&agrave; học tập đạo đức v&agrave; văn h&oacute;a doanh nghiệp l&agrave; một biện ph&aacute;p để n&acirc;ng cao nhận thức về vai tr&ograve; của đạo đức v&agrave; văn h&oacute;a trong hoạt động kinh doanh, tạo dựng những kỹ năng cần thiết để vận dụng c&aacute;c nh&acirc;n tố đạo đức v&agrave; văn h&oacute;a v&agrave;o hoạt động kinh doanh của doanh nghiệp.</p>\r\n\r\n<p>Kh&oacute;a học n&agrave;y đề cập đến to&agrave;n bộ những kiến thức cơ bản về đạo đức kinh doanh v&agrave; văn h&oacute;a doanh nghiệp cũng như c&aacute;c kỹ năng gi&uacute;p học vi&ecirc;n c&oacute; thể tự ph&acirc;n t&iacute;ch, đ&aacute;nh gi&aacute;, x&acirc;y dựng đạo đức kinh doanh v&agrave; văn h&oacute;a doanh nghiệp tr&ecirc;n thực tế.</p>\r\n\r\n<p>N&ecirc;́u bạn l&agrave; doanh nh&acirc;n hoặc chủ doanh nghi&ecirc;̣p, kh&oacute;a học n&agrave;y được thi&ecirc;́t k&ecirc;́ d&agrave;nh ri&ecirc;ng cho bạn. H&atilde;y đăng k&iacute; tham gia kh&oacute;a học đ&ecirc;̉ c&oacute; th&ecirc;m những hi&ecirc;̉u bi&ecirc;́t v&ecirc;̀ những nh&acirc;n t&ocirc;́ C&Acirc;̀N-PHẢI-C&Oacute; của m&ocirc;̣t doanh nghi&ecirc;̣p!</p>\r\n', '', 'kdkn', 299000, 12, '04:55:49', 'PL33lvabfss1zfGxCcTIYr5IjsyweWWtAO', '2018-12-13'),
(10, 'Luyện thi TOEIC 500+ ', 'Tăng từ vựng và khả năng đọc, hiểu', '2653b7f110cd13f4a70ced12271745fd.png', 1, '<p>Kh&oacute;a học chia ra th&agrave;nh 2 phần ch&iacute;nh: Nghe v&agrave; đọc. Phần nghe gồm c&oacute; 4 phần: part 1,2,3,4 sẽ cung cấp cho học vi&ecirc;n c&aacute;c mẹo l&agrave;m b&agrave;i, từng dạng đề để c&oacute; thể học &iacute;t nhưng điểm số vẫn cao. Phần đọc: part 5,6 v&agrave; part 7 sẽ dạy lại ngữ ph&aacute;p căn bản v&agrave; c&aacute;c mẹo thi, cung cấp từ vựng phương ph&aacute;p ra đề v&agrave; giải quyết đề trong part 7.</p>\r\n\r\n<p>Sau kh&oacute;a học, học vi&ecirc;n sẽ lấy lại được gốc Tiếng Anh, tăng vốn từ vựng v&agrave; khả năng đọc, hiểu để từ đ&oacute; đạt được tối thiểu 500 điểm thi TOEIC.</p>\r\n', '', 'cntt', 599000, 56, '07:22:18', 'PL33lvabfss1zfGxCcTIYr5IjsyweWWtAO', '2018-12-13'),
(11, 'Mindset for IELTS - Foundation', 'Khóa học giúp học viên có nền tảng vững chắc ở cả 4 kỹ năng, là cơ sở để học viên tự tin bước vào các khóa học ở cấp độ cao hơn', '1f9fce2f43c3772c7bb8194e42fcfc76.jpg', 1, '<p>Cả 4 kỹ năng được lồng gh&eacute;p trong từng b&agrave;i học, gi&uacute;p học sinh l&agrave;m quen v&agrave; ph&aacute;t triển dần c&aacute;c kỹ năng:</p>\r\n\r\n<p>Reading gi&uacute;p ph&aacute;t triển &yacute; tưởng v&agrave; k&yacute; năng phục vụ cho việc ho&agrave;n th&agrave;nh c&aacute;c b&agrave;i tập ở phần Writing.&nbsp;<br />\r\nListening gi&uacute;p ph&aacute;t triển &yacute; tưởng v&agrave; kỹ năng phục vụ cho việc ho&agrave;n th&agrave;nh tốt phần Speaking</p>\r\n\r\n<p>Mindset for IELTS Foundation l&agrave; kh&oacute;a học đầu ti&ecirc;n của bộ gi&aacute;o tr&igrave;nh 4 cấp độ Mindset for IELTS, bao gồm Foundation, Level 1, 2 &amp; 3 d&agrave;nh cho c&aacute;c học vi&ecirc;n từ cấp độ A2 tới IELTS 7.5+. Đ&acirc;y l&agrave; bộ gi&aacute;o tr&igrave;nh IELTS đầu ti&ecirc;n của Nh&agrave; xuất bản Cambridge &aacute;p dụng phương ph&aacute;p blended-learning, kết hợp c&aacute;c b&agrave;i giảng v&agrave; việc &ocirc;n luyện trực tuyến qua hệ thống LMS (Learning Management System) của Cambridge.</p>\r\n\r\n<p><br />\r\nCambridge MLS gi&uacute;p học vi&ecirc;n tối ưu hiệu quả học tập th&ocirc;ng qua việc kết hợp b&agrave;i học v&agrave; c&aacute;c b&agrave;i luyện trực tuyến, đồng thời cung cấp TestBank gi&uacute;p học vi&ecirc;n &ocirc;n luyện với c&aacute;c b&agrave;i thi IELTS thực tế.</p>\r\n', '', 'nn', 799000, 90, '12:29:36', 'PL33lvabfss1zfGxCcTIYr5IjsyweWWtAO', '2018-12-13'),
(12, 'Marketing liên kết', 'Làm chủ kiến thức marketing liên kết nền tảng', '74f6f68117da8e53ea9f62b0fad027bc.png', 1, '<p>Sự ph&aacute;t triển vũ b&atilde;o của internet tạo đ&agrave; cho nhiều doanh nh&acirc;n x&acirc;y dựng doanh nghiệp th&agrave;nh c&ocirc;ng với nguồn thu nhập online ổn định. Họ thậm ch&iacute; kh&ocirc;ng sở hữu sản phẩm, kh&ocirc;ng cung cấp dịch vụ giao h&agrave;ng m&agrave; vẫn đạt được mức doanh thu khủng ch&iacute;nh l&agrave; do họ tham gia v&agrave;o mạng lưới marketing li&ecirc;n kết.&nbsp;<br />\r\n<br />\r\nTừ marketer, doanh nh&acirc;n, nh&agrave; sản suất đến người c&oacute; website ri&ecirc;ng, c&oacute; sẵn traffic v&agrave; danh s&aacute;ch kh&aacute;ch h&agrave;ng hay ch&iacute;nh bạn đều l&agrave; những mắt x&iacute;ch quan trọng trong mạng lưới Marketing li&ecirc;n kết. Tuy nhi&ecirc;n để l&agrave;m chủ v&agrave; tạo ra nguồn thu nhập online ổn định th&igrave; cần t&igrave;m hiểu v&agrave; thực h&agrave;nh Marketing li&ecirc;n kết theo lộ tr&igrave;nh b&agrave;i bản, thực tiễn v&agrave; x&aacute;c thực.&nbsp;<br />\r\n<br />\r\nHiểu được điều đ&oacute;, t&ocirc;i đ&atilde; x&acirc;y dựng kh&oacute;a học &quot;Marketing li&ecirc;n kết&quot;. Với nội dung b&agrave;i giảng được sắp xếp hợp l&iacute; kết hợp c&ugrave;ng với case study, b&agrave;i tập thực tiễn v&agrave; thực h&agrave;nh trải nghiệm, mục ti&ecirc;u của t&ocirc;i l&agrave; gi&uacute;p c&aacute;c bạn: Nắm vững kiến thức nền về Marketing li&ecirc;n kết, chọn được mạng lưới tiềm năng, tr&aacute;nh được sai lầm v&agrave; định hướng kinh doanh để tham gia v&agrave;o mạng lưới marketing li&ecirc;n kết.<br />\r\n<br />\r\nBạn c&ograve;n chần chừ g&igrave; nữa? H&atilde;y tham gia kh&oacute;a học n&agrave;y ngay b&acirc;y giờ để bắt đầu h&agrave;nh tr&igrave;nh tạo ra nguồn thu nhập online khổng lồ cho ch&iacute;nh m&igrave;nh v&agrave; học hỏi những điều l&yacute;&nbsp;th&uacute;, tuyệt vời!</p>\r\n', '', 'mkt', 399000, 18, '02:17:22', 'PL33lvabfss1zfGxCcTIYr5IjsyweWWtAO', '2018-12-13'),
(13, 'THÀNH THẠO SEO CÙNG CHUYÊN GIA', 'Nắm vững kiến thức nền và sử dụng thành thạo các công cụ SEO', '9f4462cbcd201e469bfd58fc5833f99f.png', 1, '<p>Hiểu được kiến thức nền v&agrave; sử dụng th&agrave;nh thạo c&aacute;c c&ocirc;ng cụ SEO, Biết c&aacute;ch chuẩn SEO v&agrave; định hướng chiến lược SEO đ&uacute;ng hướng.</p>\r\n\r\n<p>&bull; Hiểu được c&aacute;ch thức hoạt động của Google v&agrave; sử dụng th&agrave;nh thao c&aacute;c c&ocirc;ng cụ Seo&nbsp;<br />\r\n&bull; Nắm vững kiến thức nền v&agrave; sử dụng th&agrave;nh thạo c&aacute;c c&ocirc;ng cụ SEO&nbsp;<br />\r\n&bull; Biết c&aacute;ch lập kế hoạch SEO chuẩn để website của bạn đặt được thứ hạng cao tr&ecirc;n Google&nbsp;<br />\r\n&bull; Biết c&aacute;ch thu h&uacute;t lượng kh&aacute;ch h&agrave;ng tiềm năng cho Website v&agrave; sản phẩm của bạn&nbsp;<br />\r\n&bull; Định hướng chiến lược SEO đ&uacute;ng đắn</p>\r\n', '', 'mkt', 499000, 74, '10:42:40', 'PL33lvabfss1zfGxCcTIYr5IjsyweWWtAO', '2018-12-13'),
(14, 'Trở thành cao thủ Hàm Excel trong 10 giờ', 'Sử dụng thành thạo các nhóm hàm Excel thông dụng trong thực tế và thi chứng chỉ cho học sinh, sinh viên.', '3455ca2555fe2ad103baade4e4afd050.jpg', 1, '<p>Với thời lượng k&eacute;o d&agrave;i 10 giờ, kh&oacute;a học sẽ n&oacute;i r&otilde; r&agrave;ng chi tiết về c&aacute;ch sử dụng c&aacute;c h&agrave;m cơ bản đến n&acirc;ng cao như h&agrave;m Vlookup, IF, Index, Match, Offset&hellip; trong Excel.<br />\r\nCộng với một lượng lớn b&agrave;i tập thực h&agrave;nh, học xong l&agrave;m ngay sẽ cực kỳ hiệu quả:<br />\r\n- Kh&oacute;a học sẽ tập trung đi s&acirc;u v&agrave;o giảng dạy c&aacute;ch sử dụng từng nh&oacute;m h&agrave;m Excel v&agrave; ứng dụng n&oacute; v&agrave;o thực tế để xử l&yacute;, ph&acirc;n t&iacute;ch, thống k&ecirc; dữ liệu một c&aacute;ch nhanh ch&oacute;ng.<br />\r\n- Giải b&agrave;i tập tổng hợp, luyện thi chứng chỉ Excel.</p>\r\n', '', 'thvp', 599000, 68, '05:39:30', 'PL33lvabfss1zfGxCcTIYr5IjsyweWWtAO', '2018-12-13'),
(15, 'Giải pháp tối ưu công việc trên Excel', 'Quản lý cơ sở dữ liệu trên Excel. Cụ thể, học viên có thể dễ dàng quản lý thông tin nhân viên, khách hàng, học sinh, sinh viên, quản lý nhập xuất tồn hàng hóa trong kho, theo dõi công nợ.', 'feac061c34c9a39d286a9fca983bac1b.jpg', 1, '<p>- Bạn đ&atilde; sử dụng hết mọi chức năng cao cấp của Excel như: Data Validation, Conditional Formating, Pivot Tables, Goal Seek thậm ch&iacute; cả Solver nhưng vẫn chưa đủ để xử l&yacute; những t&aacute;c vụ c&ocirc;ng việc phức tạp nơi văn ph&ograve;ng. Khối lượng v&agrave; y&ecirc;u cầu c&ocirc;ng việc ng&agrave;y c&agrave;ng ph&igrave;nh to ra khiến bạn phải tốn nhiều thời gian v&agrave; sức lực hơn để giải quyết.</p>\r\n\r\n<p>- Đặc biệt l&agrave; những c&ocirc;ng việc c&oacute; t&iacute;nh chất lặp lại như nhập số liệu, lọc số liệu, quản l&yacute; cơ sở dữ liệu nh&acirc;n vi&ecirc;n, quản l&yacute; kho h&agrave;ng h&oacute;a, lập b&aacute;o c&aacute;o li&ecirc;n tục, in ấn h&agrave;ng loạt, quản l&yacute; kh&aacute;ch h&agrave;ng, thống k&ecirc; v&agrave; ph&acirc;n t&iacute;ch b&aacute;n h&agrave;ng... Excel vẫn l&agrave;m được c&aacute;c c&ocirc;ng việc tr&ecirc;n nhưng sẽ tốn rất nhiều thời gian xử l&yacute; khi dữ liệu ng&agrave;y c&agrave;ng nhiều hơn, mức độ phức tạp tăng l&ecirc;n, t&iacute;nh chất lặp đi lặp lại nhiều hơn trong khi đ&oacute; sếp của bạn, kh&aacute;ch h&agrave;ng của bạn, doanh nghiệp của bạn lại muốn tiến độ c&ocirc;ng việc nhanh hơn, hiệu quả hơn.</p>\r\n\r\n<p>- R&otilde; r&agrave;ng những y&ecirc;u cầu tr&ecirc;n đang dần vượt qu&aacute; sức chịu đựng của Microsoft Excel. Tuy nhi&ecirc;n, c&oacute; một giải ph&aacute;p để tăng cường sức mạnh cho Excel. Đ&oacute; ch&iacute;nh l&agrave; VBA - lập tr&igrave;nh Visual Basic d&agrave;nh cho ứng dụng văn ph&ograve;ng.</p>\r\n', '', 'thvp', 699000, 52, '04:55:49', 'PL33lvabfss1zfGxCcTIYr5IjsyweWWtAO', '2018-12-13');

-- --------------------------------------------------------

--
-- Table structure for table `own`
--

CREATE TABLE `own` (
  `id_own` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `id_cs` int(11) NOT NULL,
  `date_own` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `own`
--

INSERT INTO `own` (`id_own`, `id_user`, `id_cs`, `date_own`) VALUES
(17, 1, 1, '2018-12-13'),
(18, 43, 12, '2018-12-13');

-- --------------------------------------------------------

--
-- Table structure for table `teacherchat`
--

CREATE TABLE `teacherchat` (
  `id_chat` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `content_chat` text COLLATE utf8_unicode_ci NOT NULL,
  `date_chat` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `teacherchat`
--

INSERT INTO `teacherchat` (`id_chat`, `id_user`, `content_chat`, `date_chat`) VALUES
(1, 44, 'Xin chào các giáo viên', '2018-12-13 15:53:28');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id_user` int(11) NOT NULL,
  `email_user` varchar(255) NOT NULL,
  `pass_user` varchar(255) NOT NULL,
  `name_user` varchar(255) NOT NULL,
  `job_user` varchar(255) NOT NULL,
  `sex_user` tinyint(4) NOT NULL COMMENT '0-Female, 1-Male',
  `about_user` varchar(255) NOT NULL,
  `permission_user` int(11) NOT NULL DEFAULT '0' COMMENT '0 là chưa kích hoạt mail  -  1 là tv đã active  -  2 là GV  -  3 là ADMIN',
  `code_user` varchar(255) NOT NULL,
  `coin_user` int(11) NOT NULL,
  `avatar_user` varchar(255) NOT NULL DEFAULT 'default.jpg',
  `created_date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id_user`, `email_user`, `pass_user`, `name_user`, `job_user`, `sex_user`, `about_user`, `permission_user`, `code_user`, `coin_user`, `avatar_user`, `created_date`) VALUES
(1, 'admin@admin.com', 'e10adc3949ba59abbe56e057f20f883e', 'Fullname Admin', 'Admin Edumall.vn', 1, 'Gioi thieu ban than Admin', 3, '', 1401000, 'default.jpg', '0000-00-00'),
(43, 'thanhvien1@mail.com', 'e10adc3949ba59abbe56e057f20f883e', 'Tài khoản 1', 'Sinh Viên', 0, 'Đẹp trai', 1, '', 101000, 'd7a05dd09a2de5d5969d1b6d89403a33.png', '2018-12-13'),
(44, 'giaovien1@mail.com', 'e10adc3949ba59abbe56e057f20f883e', 'Giáo Viên 1', 'Giảng viên', 1, 'Dạy giỏi', 2, '', 0, 'default.jpg', '2018-12-13');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `adminchat`
--
ALTER TABLE `adminchat`
  ADD PRIMARY KEY (`id_chat`),
  ADD KEY `id_user` (`id_user`);

--
-- Indexes for table `cart`
--
ALTER TABLE `cart`
  ADD PRIMARY KEY (`id_gh`),
  ADD UNIQUE KEY `id_user` (`id_user`,`id_cs`),
  ADD KEY `id_cs` (`id_cs`);

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`id_cate`);

--
-- Indexes for table `cmt`
--
ALTER TABLE `cmt`
  ADD PRIMARY KEY (`id_cmt`),
  ADD KEY `id_cs` (`id_cs`);

--
-- Indexes for table `course`
--
ALTER TABLE `course`
  ADD PRIMARY KEY (`id_cs`),
  ADD KEY `id_cate` (`id_cate`),
  ADD KEY `id_cate_2` (`id_cate`),
  ADD KEY `id_user` (`id_user`);

--
-- Indexes for table `own`
--
ALTER TABLE `own`
  ADD PRIMARY KEY (`id_own`),
  ADD UNIQUE KEY `id_user` (`id_user`,`id_cs`),
  ADD KEY `id_cs` (`id_cs`);

--
-- Indexes for table `teacherchat`
--
ALTER TABLE `teacherchat`
  ADD PRIMARY KEY (`id_chat`),
  ADD KEY `id_user` (`id_user`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id_user`),
  ADD UNIQUE KEY `email_user` (`email_user`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `adminchat`
--
ALTER TABLE `adminchat`
  MODIFY `id_chat` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `cart`
--
ALTER TABLE `cart`
  MODIFY `id_gh` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `cmt`
--
ALTER TABLE `cmt`
  MODIFY `id_cmt` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `course`
--
ALTER TABLE `course`
  MODIFY `id_cs` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `own`
--
ALTER TABLE `own`
  MODIFY `id_own` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `teacherchat`
--
ALTER TABLE `teacherchat`
  MODIFY `id_chat` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=45;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `adminchat`
--
ALTER TABLE `adminchat`
  ADD CONSTRAINT `adminchat_ibfk_1` FOREIGN KEY (`id_user`) REFERENCES `user` (`id_user`);

--
-- Constraints for table `cart`
--
ALTER TABLE `cart`
  ADD CONSTRAINT `cart_ibfk_1` FOREIGN KEY (`id_cs`) REFERENCES `course` (`id_cs`),
  ADD CONSTRAINT `cart_ibfk_2` FOREIGN KEY (`id_user`) REFERENCES `user` (`id_user`);

--
-- Constraints for table `cmt`
--
ALTER TABLE `cmt`
  ADD CONSTRAINT `cmt_ibfk_1` FOREIGN KEY (`id_cs`) REFERENCES `course` (`id_cs`);

--
-- Constraints for table `course`
--
ALTER TABLE `course`
  ADD CONSTRAINT `course_ibfk_1` FOREIGN KEY (`id_user`) REFERENCES `user` (`id_user`);

--
-- Constraints for table `own`
--
ALTER TABLE `own`
  ADD CONSTRAINT `own_ibfk_1` FOREIGN KEY (`id_cs`) REFERENCES `course` (`id_cs`),
  ADD CONSTRAINT `own_ibfk_2` FOREIGN KEY (`id_user`) REFERENCES `user` (`id_user`);

--
-- Constraints for table `teacherchat`
--
ALTER TABLE `teacherchat`
  ADD CONSTRAINT `teacherchat_ibfk_1` FOREIGN KEY (`id_user`) REFERENCES `user` (`id_user`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
