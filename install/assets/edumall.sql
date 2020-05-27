-- phpMyAdmin SQL Dump
-- version 5.0.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: May 27, 2020 at 07:39 AM
-- Server version: 10.4.11-MariaDB
-- PHP Version: 7.4.3

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
(16, 1, 'Thiếu quản lý coupon', '2019-02-26 23:49:22'),
(17, 1, 'Kiểm soát bình luận của học viên đối với giáo viên', '2019-02-26 23:54:57'),
(18, 1, 'Gửi Email mời quay lại đối với user k đăng nhập quá 5 ngày', '2019-02-28 17:29:49'),
(19, 1, 'Thêm khóa học thì thêm luôn các tập của khóa học', '2019-03-02 23:51:23'),
(20, 1, 'Hoàn thiện website. Sẵn sàng báo cáo!', '2019-04-04 16:32:23');

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
(3, 19, 'Quản trị viên', 'admin@admin.com', 'Đã kiểm tra khóa học OK!', '2019-04-01 14:51:48'),
(4, 28, 'Hoàng Thái Hậu', 'hoangthaihau@gmail.com', 'Tôi đã hoàn thành khóa học này và đã cải thiện khả năng ghi nhớ của tôi. Cảm ơn người đã tạo ra khóa học này!', '2019-04-11 00:21:04'),
(5, 20, 'Hoàng Thái Hậu', 'hoangthaihau@gmail.com', 'Tôi có 1 câu hỏi. Landing page và trang bình thường có điểm gì giống và khác nhau?', '2019-04-11 00:21:56'),
(6, 20, 'Hoàng Công Hữu', 'conghuu_it@gmail.com', 'Câu hỏi của bạn Hậu rất hay! Tôi xin trả lời bạn đó là Landing page giúp website của bạn trở nên đẹp và bắt mắt hơn!', '2019-04-11 00:24:18'),
(7, 28, 'Lê Thẩm Dương', 'lethamduong.online@gmail.com', 'Chào bạn Hậu, rất vui khi đã đem lại được kiến thức dành cho bạn. Chúc bạn tự tin trong cuộc sống!', '2019-04-11 00:26:23'),
(8, 30, 'Hoàng Thái Hậu', 'hoangthaihau@gmail.com', 'Đây là bình luận!', '2019-04-11 08:13:36');

-- --------------------------------------------------------

--
-- Table structure for table `coupon`
--

CREATE TABLE `coupon` (
  `id_cp` int(11) NOT NULL,
  `code_cp` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `percent_discount` int(11) NOT NULL,
  `expiration_date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `coupon`
--

INSERT INTO `coupon` (`id_cp`, `code_cp`, `percent_discount`, `expiration_date`) VALUES
(2, 'coupon20', 20, '2019-03-31'),
(3, 'kmgg20', 20, '2019-04-30'),
(4, 'quocteld45', 45, '2019-06-01');

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
  `created_date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `course`
--

INSERT INTO `course` (`id_cs`, `ten_cs`, `info_cs`, `thumb_cs`, `id_user`, `mota_cs`, `giaotrinh_cs`, `id_cate`, `gia_cs`, `sobh_cs`, `time_cs`, `created_date`) VALUES
(19, 'Khóa học lập trình C# Cơ bản', 'Khoá học lần này sẽ mang đến toàn bộ những kiến thức cơ bản về C#. Chào mừng các bạn đã đến với khoá học LẬP TRÌNH C# CƠ BẢN của Kteam.', '9e440bede9cd23fb97b6bd89fe7da7a9.jpg', 44, '<p>Bạn mới bắt đầu học lập tr&igrave;nh? Bạn đang muốn học th&ecirc;m ng&ocirc;n ngữ lập tr&igrave;nh mới? C# l&agrave; lựa chọn ho&agrave;n hảo để đ&aacute;p ứng c&aacute;c nhu cầu tr&ecirc;n.</p>\r\n\r\n<p><strong>Ng&ocirc;n ngữ C#&nbsp;</strong>l&agrave; một ng&ocirc;n ngữ mới, cấu tr&uacute;c r&otilde; r&agrave;ng, dễ hiểu v&agrave; dễ học. C# thừa hưởng những ưu việt từ ng&ocirc;n ngữ Java, C, C++ cũng như khắc phục được những hạn chế của c&aacute;c ng&ocirc;n ngữ n&agrave;y. C# l&agrave; ng&ocirc;n ngữ lập tr&igrave;nh hướng đối tượng được ph&aacute;t triển bởi Microsoft, được x&acirc;y dựng dựa tr&ecirc;n C++ v&agrave; Java.</p>\r\n\r\n<p>Kho&aacute; học lần n&agrave;y sẽ mang đến to&agrave;n bộ những kiến thức cơ bản về C#. Ch&agrave;o mừng c&aacute;c bạn đ&atilde; đến với kho&aacute; học&nbsp;<strong>LẬP TR&Igrave;NH C# CƠ BẢN</strong>&nbsp;của Kteam.</p>\r\n\r\n<h2>Ứng dụng kiến thức</h2>\r\n\r\n<p>Kteam hy vọng sau kh&oacute;a học, bạn sẽ nắm được c&aacute;c kiến thức:</p>\r\n\r\n<ul>\r\n	<li>C&aacute;i nh&igrave;n tổng quan về ng&ocirc;n ngữ lập tr&igrave;nh C#.</li>\r\n	<li>Nắm vững kiến thức nền tảng về C# để học những kh&oacute;a chuy&ecirc;n s&acirc;u hơn&nbsp;</li>\r\n	<li>Nắm vững c&aacute;c coding convention, naming convention</li>\r\n	<li>Th&agrave;nh thạo c&aacute;c thao t&aacute;c lập tr&igrave;nh tr&ecirc;n visual studio</li>\r\n	<li>Biết c&aacute;ch t&igrave;m ra lỗi v&agrave; gỡ lỗi trong lập tr&igrave;nh</li>\r\n	<li>V&agrave; c&ograve;n nhiều thứ kh&aacute;c chờ c&aacute;c bạn kh&aacute;m ph&aacute;</li>\r\n	<li>L&agrave; kiến thức nền tảng để tiếp cận c&aacute;c c&ocirc;ng nghệ hay ho của C# như Winform, WPF, ASP.NET, WCF, Xamarin,&hellip;</li>\r\n</ul>\r\n', '<p>B&agrave;i 1: C# l&agrave; g&igrave;</p>\r\n\r\n<p>B&agrave;i 2: Cấu tr&uacute;c lệnh cơ bản</p>\r\n\r\n<p>B&agrave;i 3: Nhập xuất cơ bản</p>\r\n\r\n<p>B&agrave;i 4: Biến trong C#</p>\r\n\r\n<p>B&agrave;i 5: Kiểu dữ liệu trong C#</p>\r\n\r\n<p>B&agrave;i 6: To&aacute;n tử trong C#&nbsp;</p>\r\n\r\n<p>B&agrave;i 7: Hằng</p>\r\n\r\n<p>B&agrave;i 8: &Eacute;p kiểu trong C#</p>\r\n\r\n<p>B&agrave;i 9: If else trong C#&nbsp;</p>\r\n\r\n<p>B&agrave;i 10: Switch case trong C#</p>\r\n', 'cntt', 599000, 10, '02:10:23', '2019-04-01'),
(20, 'Lập trình Front-End với Landing page', 'Nếu bạn yêu thích lập trình web nhưng còn lơ ngơ không biết bắt đầu từ đâu hay đã biết cơ bản mà chưa làm được một sản phẩm nhất định nào, thì đây chính là khóa học dành cho bạn', '561f533f4eac0dfb07a36bc0974659cd.jpg', 44, '<p>Một số h&igrave;nh ảnh về Website Landing Page m&agrave; ch&uacute;ng ta sẽ c&ugrave;ng&nbsp;thực hiện trong kh&oacute;a&nbsp;<strong>Lập tr&igrave;nh Front End cơ bản với Website Landing Page</strong></p>\r\n\r\n<p><img alt=\"\" src=\"https://drive.google.com/uc?id=1OjU6ftX0ONqiUPQ5Tz99TlCxOwme7ynK\" style=\"height:410px; width:730px\" /></p>\r\n\r\n<p><img alt=\"\" src=\"https://drive.google.com/uc?id=1LxMMnOZknY4-5_EnFJ-R0Ppd_NEvQNAa\" style=\"height:410px; width:730px\" /></p>\r\n\r\n<p><img alt=\"\" src=\"https://drive.google.com/uc?id=1NZA59s6gdqOxAE-v1Uw1D9XhrjojIKvk\" style=\"height:410px; width:730px\" /></p>\r\n\r\n<p>Responsive Web</p>\r\n\r\n<p><img alt=\"\" src=\"https://drive.google.com/uc?id=1DL2gJWnOiM4J6Km26Dkl44-MCN-9vxeY\" style=\"height:395px; width:300px\" />&nbsp; &nbsp;&nbsp;<img alt=\"\" src=\"https://drive.google.com/uc?id=19HARcI2td2CHnKn8fWAzbSVihcTTAgqa\" style=\"height:392px; width:300px\" /></p>\r\n', '<p>B&agrave;i 0: Tổng quan kh&oacute;a học</p>\r\n\r\n<p>B&agrave;i 1: Tổng quan HTML</p>\r\n\r\n<p>B&agrave;i 2: Tổng quan CSS</p>\r\n\r\n<p>B&agrave;i 3: C&aacute;ch d&ugrave;ng m&agrave;u trong CSS</p>\r\n\r\n<p>B&agrave;i 4: CSS model box</p>\r\n\r\n<p>B&agrave;i 5: ID, class v&agrave; float</p>\r\n\r\n<p>B&agrave;i 6: Position trong CSS</p>\r\n\r\n<p>B&agrave;i 7: Ho&agrave;n thiện trang blog</p>\r\n', 'cntt', 349000, 7, '1:12:10', '2019-04-10'),
(24, 'Tiếng anh giao tiếp cho trẻ em từ 04-12 tuổi', 'Giao tiếp tất cả các tình huống cơ bản phổ biến hàng ngày cho trẻ em, làm tiền đề vững chắc cho các bé khi bắt đầu học môn tiếng Anh.', '43e98541bd6a2011b2de378179565d18.jpg', 47, '<p>Với c&aacute;c h&igrave;nh ảnh sinh động, hấp dẫn, c&ugrave;ng c&aacute;c b&agrave;i h&aacute;t giọng Mỹ v&agrave; c&aacute;c c&acirc;u chuyện tiếng Anh r&egrave;n luyện cả nghe, n&oacute;i, đọc, viết gi&uacute;p c&aacute;c b&eacute; y&ecirc;u th&iacute;ch tiếng Anh ngay từ khi c&ograve;n nhỏ.</p>\r\n\r\n<p>C&aacute;c con c&ugrave;ng bố mẹ sẽ được thực h&agrave;nh kh&ocirc;ng chỉ giao tiếp m&agrave; c&ograve;n nhớ từ vựng, cấu tr&uacute;c hơn qua c&aacute;c phiếu b&agrave;i tập được c&ocirc; Hương Elena bi&ecirc;n soạn với c&aacute;c h&igrave;nh ảnh hấp dẫn, l&ocirc;i cuốn.</p>\r\n\r\n<p>Tất cả c&aacute;c phiếu b&agrave;i tập, t&agrave;i liệu đ&iacute;nh k&egrave;m v&agrave; file hướng dẫn của kh&oacute;a học được gắn tại tab T&agrave;i liệu của b&agrave;i 1, bố mẹ c&oacute; thể tải về v&agrave; học c&ugrave;ng c&aacute;c con nh&eacute; !</p>\r\n\r\n<ol>\r\n	<li>\r\n	<p>C&aacute;c con sẽ quen dần với giọng Mỹ v&agrave; n&oacute;i tiếng Anh chuẩn giọng Mỹ nhanh ch&oacute;ng.</p>\r\n	</li>\r\n	<li>\r\n	<p>C&aacute;c con sẽ y&ecirc;u th&iacute;ch tiếng Anh hơn bởi những h&igrave;nh ảnh sinh động qua những c&acirc;u chuyện tiếng Anh l&agrave;m phong ph&uacute; c&aacute;c kiến thức x&atilde; hội xung quanh.</p>\r\n	</li>\r\n	<li>\r\n	<p>C&aacute;c con sẽ biết nghe lời, k&iacute;nh tr&ecirc;n nhường dưới, ngoan ngo&atilde;n hơn qua c&aacute;c b&agrave;i học tiếng Anh với những c&acirc;u chuyện ngắn th&uacute; vị.</p>\r\n	</li>\r\n	<li>\r\n	<p>Con sẽ th&iacute;ch th&uacute; với những b&agrave;i học qua c&aacute;c b&agrave;i h&aacute;t tiếng Anh đ&aacute;ng y&ecirc;u.</p>\r\n	</li>\r\n	<li>\r\n	<p>Bố mẹ v&agrave; c&aacute;c con sẽ lu&ocirc;n được c&ocirc; Hương Elena hỗ trợ trả lời c&aacute;c c&acirc;u hỏi sau mỗi b&agrave;i học.</p>\r\n	</li>\r\n</ol>\r\n', '<p>B&agrave;i 1: What&#39;s your name?</p>\r\n\r\n<p>B&agrave;i 2: The Alphabet song</p>\r\n\r\n<p>B&agrave;i 3: How are you?</p>\r\n\r\n<p>B&agrave;i 4: Number and How old are you?</p>\r\n\r\n<p>B&agrave;i 5: School supplies - part 1</p>\r\n\r\n<p>B&agrave;i 6: School supplies - part 2</p>\r\n\r\n<p>B&agrave;i 7: Shapes</p>\r\n\r\n<p>B&agrave;i 8: Art Supplies</p>\r\n\r\n<p>B&agrave;i 9: Colors - part 1</p>\r\n\r\n<p>B&agrave;i 10: Colors - part 2</p>\r\n\r\n<p>B&agrave;i 11: Toys - part 1</p>\r\n\r\n<p>B&agrave;i 12: Toys - part 2</p>\r\n\r\n<p>B&agrave;i 13: Family</p>\r\n\r\n<p>B&agrave;i 14: Nature</p>\r\n\r\n<p>B&agrave;i 15: Playtime</p>\r\n', 'nn', 690000, 15, '1:12:52', '2019-04-10'),
(25, 'Tiếng Anh giao tiếp cho người mới bắt đầu', 'Bất kỳ ai muốn củng cố phản xạ giao tiếp bằng tiếng Anh đồng thời nâng cao khả năng phát âm và nắm vững vốn từ vựng, ngữ pháp cơ bản tiếng Anh.', '78324d6a3ac9ea98f7f44fac0a65edb3.jpg', 47, '<p>Bạn đang:</p>\r\n\r\n<p>Mất gốc tiếng Anh v&agrave; kh&ocirc;ng biết n&ecirc;n học tiếng Anh như thế n&agrave;o sao cho hiệu quả?</p>\r\n\r\n<p>Học tiếng Anh đ&atilde; l&acirc;u rồi nhưng chưa thể n&oacute;i ra th&agrave;nh phản xạ c&aacute;c chủ đề th&ocirc;ng dụng trong giao tiếp h&agrave;ng ng&agrave;y?</p>\r\n\r\n<p>Bạn bối rối v&agrave; kh&ocirc;ng biết n&oacute;i g&igrave; khi giao tiếp với người nước ngo&agrave;i?</p>\r\n\r\n<p>Mất tự tin khi sử dụng tiếng Anh trong học tập cũng như c&ocirc;ng việc h&agrave;ng ng&agrave;y?</p>\r\n', '<p>B&agrave;i 1: Introduce yourself (Giới thiệu bản th&acirc;n)</p>\r\n\r\n<p>B&agrave;i 2: Numbers in English (Số trong tiếng Anh)</p>\r\n\r\n<p>B&agrave;i 3: Numbers and age in English (Số v&agrave; c&aacute;ch n&oacute;i tuổi)</p>\r\n\r\n<p>B&agrave;i 4: Jobs/What do you do? (C&aacute;ch n&oacute;i về nghề nghiệp)</p>\r\n\r\n<p>B&agrave;i 5: Family (Gia đ&igrave;nh)</p>\r\n\r\n<p>B&agrave;i 6: Hobbies (Diễn tả sở th&iacute;ch)</p>\r\n\r\n<p>B&agrave;i 7: What do you like? ( C&aacute;ch diễn tả sở th&iacute;ch )</p>\r\n\r\n<p>B&agrave;i 8: Daily Activities at Home</p>\r\n\r\n<p>B&agrave;i 9: Ordinal numbers (Số thứ tự)</p>\r\n\r\n<p>B&agrave;i 10: Days of the week (C&aacute;c ng&agrave;y trong tuần)</p>\r\n\r\n<p>B&agrave;i 11: Months of the year (C&aacute;c th&aacute;ng trong năm)</p>\r\n\r\n<p>B&agrave;i 12: Months and dates (C&aacute;ch n&oacute;i ng&agrave;y th&aacute;ng trong tiếng Anh)</p>\r\n\r\n<p>B&agrave;i 13: Frequency adverbs in English (Trạng từ chỉ tần suất)</p>\r\n\r\n<p>B&agrave;i 14: Tổng kết kh&oacute;a học</p>\r\n', 'nn', 789000, 14, '02:30:17', '2019-04-10'),
(26, 'Quét sạch 100 từ vựng mỗi ngày với 6 phương pháp siêu tốc', 'Bạn sẽ biết, hiểu và vận dụng thành thạo 6 phương pháp độc đáo đã giúp hàng ngàn người ghi nhớ từ vựng siêu tốc (100 từ mỗi ngày và bất cứ ngoại ngữ nào).', '53279e3c0f5ad57ed3eb784f917b9200.png', 47, '<p>D&agrave;nh cho:</p>\r\n\r\n<ul>\r\n	<li>Học sinh để tăng cường vốn từ vựng để đạt điểm cao.</li>\r\n</ul>\r\n\r\n<ul>\r\n	<li>Sinh vi&ecirc;n để vượt qua m&ocirc;n tiếng Anh, tiếng Nhật, tiếng H&agrave;n... v&agrave; bất cứ ng&ocirc;n ngữ n&agrave;o một c&aacute;ch dễ d&agrave;ng.</li>\r\n</ul>\r\n\r\n<ul>\r\n	<li>Người đi l&agrave;m muốn n&acirc;ng cao vốn ngoại ngữ để thuận đường thăng tiến trong c&ocirc;ng việc.</li>\r\n</ul>\r\n\r\n<ul>\r\n	<li>Gi&aacute;m đốc, chủ doanh nghiệp n&acirc;ng cấp Ngoại ngữ để c&ocirc;ng việc kinh doanh đầu tư với nước ngo&agrave;i được thuận tiện, dễ d&agrave;ng v&agrave; nhanh ch&oacute;ng.</li>\r\n</ul>\r\n\r\n<ul>\r\n</ul>\r\n\r\n<p>Vấn đề của học vi&ecirc;n:</p>\r\n\r\n<p>- Bạn tốn rất nhiều thời gian học đi học lại từ vựng ngoại ngữ m&agrave; kh&ocirc;ng thuộc nổi.</p>\r\n\r\n<p>- Bạn chỉ c&oacute; 1 phương ph&aacute;p duy nhất để học từ vựng l&agrave; viết đi viết lại thật nhiều lần, hết trang giấy n&agrave;y đến trang giấy kh&aacute;c nhưng vẫn nhanh ch&oacute;ng qu&ecirc;n ngay sau đ&oacute;.</p>\r\n\r\n<p>- Bạn kh&ocirc;ng c&oacute; nhiều thời gian để học th&ecirc;m 1 ngoại ngữ mới.</p>\r\n\r\n<p>- Điểm m&ocirc;n ngoại ngữ của bạn qu&aacute; lẹt đẹt v&igrave; qu&ecirc;n hết từ vựng đ&atilde; học.</p>\r\n', '<p>B&agrave;i 1: Ph&aacute; tan r&agrave;o cản 1. T&igrave;m lộ tr&igrave;nh đ&uacute;ng</p>\r\n\r\n<p>B&agrave;i 2: Ph&aacute; tan r&agrave;o cản 2. T&igrave;m phương ph&aacute;p đ&uacute;ng</p>\r\n\r\n<p>B&agrave;i 3: Ph&aacute; tan r&agrave;o cản 3. T&igrave;m ra m&ocirc;i trường thuận lợi</p>\r\n\r\n<p>B&agrave;i 4: Ph&aacute; tan r&agrave;o cản 4. Vượt qua sự lười biếng</p>\r\n\r\n<p>B&agrave;i 5: Ph&aacute; tan r&agrave;o cản thứ 5. Tạo động lực cho ch&iacute;nh m&igrave;nh</p>\r\n\r\n<p>B&agrave;i 6: Ph&aacute; tan r&agrave;o cản 6. L&agrave;m g&igrave; để đạt được mục ti&ecirc;u to lớn?</p>\r\n\r\n<p>B&agrave;i 7: Vũ kh&iacute; 1 - Phương ph&aacute;p Chơi c&oacute; Bạn - Học c&oacute; B&egrave;</p>\r\n\r\n<p>B&agrave;i 8: Vũ kh&iacute; 2 - Phương ph&aacute;p Tẩy n&atilde;o</p>\r\n\r\n<p>B&agrave;i 9: Vũ kh&iacute; 3 - Phương ph&aacute;p POB</p>\r\n\r\n<p>B&agrave;i 10: Vũ kh&iacute; 4 - Phương ph&aacute;p T&acirc;y n&oacute;i g&agrave; - Ta n&oacute;i vịt (phần 1)</p>\r\n\r\n<p>B&agrave;i 11: Vũ kh&iacute; 4 - Phương ph&aacute;p T&acirc;y n&oacute;i g&agrave; - Ta n&oacute;i vịt (phần 2)</p>\r\n\r\n<p>B&agrave;i 12: Vũ kh&iacute; 5 - Phương ph&aacute;p R&acirc;u &ocirc;ng Việt cắm cằm b&agrave; T&acirc;y</p>\r\n\r\n<p>B&agrave;i 13: Vũ kh&iacute; 6 - Phương ph&aacute;p Mưa dầm thấm s&acirc;u - Mưa l&acirc;u&nbsp;</p>\r\n\r\n<p>B&agrave;i 14: Quy tr&igrave;nh 6 bước học từ vựng si&ecirc;u tốc</p>\r\n\r\n<p>B&agrave;i 15: Nuốt chửng 20 từ vựng tiếng Hoa (phần 1)</p>\r\n\r\n<p>B&agrave;i 16: Nuốt chửng 20 từ vựng tiếng Hoa (phần 2)</p>\r\n\r\n<p>B&agrave;i 17: T&oacute;m gọn 30 từ vựng tiếng H&agrave;n (phần 1)</p>\r\n\r\n<p>B&agrave;i 18: T&oacute;m gọn 30 từ vựng tiếng H&agrave;n (phần 2)</p>\r\n\r\n<p>B&agrave;i 19: Tổng kết kh&oacute;a học v&agrave; lời dặn d&ograve; ch&acirc;n th&agrave;nh từ t&aacute;c giả</p>\r\n', 'nn', 980000, 19, '02:28:41', '2019-04-10'),
(27, 'Xây dựng mô hình bán hàng - Tiếp thị - Giao hàng và thanh toán', 'Ngay sau khi học xong người học có thể áp dụng được trực tiếp vào việc mở công ty vận hành và tự thân quản lý công ty.', '705426cd393888a310b936f2fedb9c75.jpg', 50, '<p>Đối tượng mục ti&ecirc;u</p>\r\n\r\n<ul>\r\n	<li>Từ 22 đến 65 tuổi, c&aacute;c chủ cửa h&agrave;ng nhỏ, c&aacute;c chủ cửa h&agrave;ng b&aacute;n h&agrave;ng online v&agrave; offline, c&aacute;c cơ sở sản xuất, b&aacute;n bu&ocirc;n c&aacute;c loại h&agrave;ng h&oacute;a, c&aacute;c quản l&yacute; v&agrave; trưởng ph&oacute; ph&ograve;ng kinh doanh, marketing , kế to&aacute;n t&agrave;i ch&aacute;nh đang c&ocirc;ng t&aacute;c tại c&aacute;c cơ quan, đơn vị v&agrave; c&oacute; mong muốn x&acirc;y dựng c&aacute;cdoanh nghiệp cho ri&ecirc;ng m&igrave;nh, c&aacute;c doanh nghiệp khởi nghiệp kinh doanh hoặc c&aacute;c nh&agrave; quản l&yacute; tại c&aacute;c tổ chức, những người c&oacute; khao kh&aacute;t mở cửa h&agrave;ng kinh doanh.</li>\r\n</ul>\r\n\r\n<ul>\r\n	<li>Nghề nghiệp: trợ l&yacute; thương mại,chuy&ecirc;n vi&ecirc;n hợp đồng, trưởng/ph&oacute; ph&ograve;ng/ ban trong doanh nghiệp, c&aacute;c chủ cửa h&agrave;ng, doanh nghiệp vừa v&agrave; nhỏ muốn l&agrave;m chủ cửa h&agrave;ng hay doanh nghiệp để đảm bảo thực hiện v&agrave; c&oacute; quy tr&igrave;nh để thực hiện chiến lược sale v&agrave; marketing. Thể hiện hệ thống chuy&ecirc;n nghiệp v&agrave; g&acirc;y dựng l&ograve;ng tin cho kh&aacute;ch h&agrave;ng.</li>\r\n</ul>\r\n\r\n<p>- Kh&oacute;a học được thiết kế dựa tr&ecirc;n nội dung của c&aacute;c c&aacute;c h&ecirc;̣ th&ocirc;́ng v&agrave; m&ocirc; h&igrave;nh kinh doanh thực tế trong qu&aacute; tr&igrave;nh l&agrave;m việc v&agrave; tiếp x&uacute;c c&aacute;c đối t&aacute;c nước ngo&agrave;i đến từ WB, ADB, JICA, Nhật, Đức, Ph&aacute;p, Singapore v&agrave; c&aacute;c tập đo&agrave;n lớn như PV, EVN tại Việt Nam trong c&aacute;c ng&agrave;nh thương mại thiết bị, dịch vụ cho h&agrave;ng h&oacute;a, m&aacute;y m&oacute;c thiết bị tại c&aacute;c c&ocirc;ng ty nổi tiếng như Schneider, Sumitomo, Phoenix Mecano, Mitsubishi Electric, Supermec...v&agrave; tập đo&agrave;n lớn của Việt Nam như Electric of Viet Nam (EVN), Petro Việt Nam ( PV) v&agrave; c&aacute;c c&ocirc;ng ty thương mại ở Việt Nam như Trần Anh Nhi&ecirc;n ( TANCO).<br />\r\n- Dựa tr&ecirc;n c&aacute;c h&ecirc;̣ th&ocirc;́ng chuẩn h&oacute;a c&aacute;c h&ecirc;̣ th&ocirc;́ng c&ocirc;ng ty v&agrave; chỉnh sửa cho ph&ugrave; hợp với t&igrave;nh h&igrave;nh thực tế tại Việt Nam nhằm cung c&acirc;́p cho người học những b&agrave;i học, c&ocirc;ng cụ v&agrave; phương ph&aacute;p dễ &aacute;p dụng nhất v&agrave; đem lại kết quả th&agrave;nh c&ocirc;ng cao.</p>\r\n\r\n<p>N&ocirc;̣i dung ch&iacute;nh kh&oacute;a học cung c&acirc;́p<br />\r\n- T&igrave;m hi&ecirc;̉u qu&aacute; tr&igrave;nh chuẩn bị th&agrave;nh l&acirc;̣p c&ocirc;ng ty/ cửa h&agrave;ng/ shop b&aacute;n h&agrave;ng<br />\r\n- T&igrave;m hi&ecirc;̉u quy tr&igrave;nh sale - x&acirc;y dựng h&ecirc;̣ th&ocirc;́ng quản l&yacute; n&ocirc;̣i b&ocirc;̣ của shop<br />\r\n- X&acirc;y dựng v&agrave; ph&aacute;t triển chiến lược Sale Online +Offline đỉnh cao cho c&ocirc;ng ty/ chủ Shop.<br />\r\n- X&acirc;y dựng v&agrave; ph&aacute;t triển chiến lược Marketing Online +Offline to&agrave;n diện.<br />\r\n- X&acirc;y dựng v&agrave; ph&aacute;t triển kế hoạch giao nh&acirc;̣n - vận chuy&ecirc;̉n tinh gọn v&agrave; hiệu quả<br />\r\n- X&acirc;y dựng v&agrave; phương &aacute;n thanh to&aacute;n hi&ecirc;̣u quả<br />\r\n- C&aacute;c phương &aacute;n điều chỉnh để tối đa h&oacute;a hiệu quả hoạt động của shop/ c&ocirc;ng ty trong qu&aacute; tr&igrave;nh vận h&agrave;nh. &quot;&quot;<br />\r\n- Ph&acirc;n t&iacute;ch c&aacute;c m&ocirc; h&igrave;nh mẫu.<br />\r\n- Phương &aacute;n xử l&yacute; khủng hoảng v&agrave; những vấn đề ph&aacute;t sinh trong qu&aacute; tr&igrave;nh hoạt động.<br />\r\n- T&igrave;m hiểu qu&aacute; tr&igrave;nh chăm s&oacute;c kh&aacute;ch h&agrave;ng<br />\r\n- B&agrave;i t&acirc;̣p &aacute;p dụng t&igrave;nh huống tại một số doanh nghiệp - trao đổi kinh nghiệm</p>\r\n\r\n<p>Điểm kh&aacute;c biệt của kh&oacute;a học:<br />\r\n- T&aacute;c giả đ&atilde; được những trải nghiệm thực tế tại nhi&ecirc;̀u c&ocirc;ng ty ở Việt Nam v&agrave; c&ugrave;ng với c&aacute;c doanh nghiệp của nước ngo&agrave;i tại Việt Nam đ&atilde; &aacute;p dụng v&agrave; đạt được hiệu quả trong thực tế.<br />\r\n- Được thiết kế dựa tr&ecirc;n những kinh nghiệm thực tế của những doanh nghiệp đưa ra v&agrave; &aacute;p dụng thực tế cho doanh nghiệp</p>\r\n', '<p>&nbsp;</p>\r\n\r\n<p>B&agrave;i 1: Tìm hi&ecirc;̉u v&ecirc;̀ quy trình Marketing</p>\r\n\r\n<p>B&agrave;i 2: Quy trình Marketing (X&acirc;y dựng đề xuất)</p>\r\n\r\n<p>B&agrave;i 3: T&igrave;m hiểu về Marketing Online</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>B&agrave;i 4: C&aacute;c c&ocirc;ng cụ thực hiện Marketing Online</p>\r\n\r\n<p>B&agrave;i 5: Cách thành l&acirc;̣p website và giới thi&ecirc;̣u sản ph&acirc;̉m</p>\r\n\r\n<p>B&agrave;i 6: T&igrave;m hiểu về Marketing tr&ecirc;n Website - Lan truyền - Email ...</p>\r\n\r\n<p>B&agrave;i 7: Case study: Marketing truyền thống hay Marketing online</p>\r\n\r\n<p>B&agrave;i 8: Tìm hi&ecirc;̉u v&ecirc;̀ quy trình bán hàng</p>\r\n\r\n<p>B&agrave;i 9: T&igrave;m hiểu về c&aacute;c phương ph&aacute;p b&aacute;n h&agrave;ng</p>\r\n\r\n<p>B&agrave;i 10: Case study: Phát tri&ecirc;̉n đ&ocirc;̣i ngũ sale</p>\r\n\r\n<p>B&agrave;i 11: Tìm hi&ecirc;̉u v&ecirc;̀ các quy trình giao nh&acirc;̣n</p>\r\n\r\n<p>B&agrave;i 12: Tìm hi&ecirc;̉u v&ecirc;̀ các quy trình thanh toán</p>\r\n', 'mkt', 599000, 12, '01:25:30', '2019-04-10'),
(28, 'Bí quyết cải thiện khả năng ghi nhớ cho người đi làm', 'Khóa học này sẽ giúp cho các bạn học viên nắm rõ được kiến thức cũng như tầm quan trọng của việc ghi nhớ.', '668a3bc80b916b6272d4c2246709c44c.jpg', 49, '<p>- Mất ch&igrave;a kh&oacute;a, l&ecirc;n ph&ograve;ng để lấy đồ th&igrave; lại qu&ecirc;n t&ecirc;n m&oacute;n đồ. Tất cả ch&uacute;ng ta đều c&oacute; l&uacute;c như thế. L&yacute; do c&oacute; phải l&agrave; tuổi t&aacute;c? Theo c&aacute;c nghi&ecirc;n cứu gần đ&acirc;y, những người trẻ ng&agrave;y c&agrave;ng trở n&ecirc;n đ&atilde;ng tr&iacute;, thường l&agrave; do họ l&agrave;m qu&aacute; nhiều việc c&ugrave;ng một l&uacute;c. Hầu hết mọi người c&oacute; th&oacute;i quen l&agrave;m nhiều việc c&ugrave;ng l&uacute;c. Về l&acirc;u d&agrave;i, điều n&agrave;y c&oacute; thể dẫn đến rối loạn t&acirc;m thần, căng thẳng v&agrave; suy giảm tr&iacute; nhớ.</p>\r\n\r\n<p>- Tr&aacute;i với suy nghĩ của số đ&ocirc;ng cho rằng tr&iacute; nhớ k&eacute;m l&agrave; vấn đề của tuổi gi&agrave;, tr&ecirc;n thực tế, bạn sẽ ngạc nhi&ecirc;n khi biết một số trẻ em c&oacute; xu hướng hay qu&ecirc;n nếu ch&uacute;ng phải sống trong m&ocirc;i trường căng thẳng triền mi&ecirc;n. Đ&acirc;y l&agrave; vấn đề kh&ocirc;ng n&ecirc;n xem nhẹ. Cho d&ugrave; ở tuổi 16 hay 60, bạn phải đấu tranh để kh&ocirc;ng bị suy giảm tr&iacute; nhớ. Quan trọng l&agrave; hiểu được nguy&ecirc;n nh&acirc;n l&agrave;m cho tr&iacute; nhớ của bạn giảm đi, từ đ&oacute; bạn sẽ biết c&aacute;ch ngăn chặn trước khi t&igrave;nh h&igrave;nh trở n&ecirc;n tồi tệ hơn.</p>\r\n\r\n<p>- Kh&oacute;a học n&agrave;y sẽ chia sẻ đ&ecirc;́n c&aacute;c bạn những nguy&ecirc;n nh&acirc;n cũng như phương ph&aacute;p đ&ecirc;̉ cải thi&ecirc;̣n được khả năng ghi nhớ v&agrave; c&aacute;c b&agrave;i t&acirc;̣p r&egrave;n luy&ecirc;̣n như th&ecirc;́ n&agrave;o đ&ecirc;̉ cho hi&ecirc;̣u quả.</p>\r\n', '<p>&nbsp;</p>\r\n\r\n<p>B&agrave;i 1: Điều kiện cần : Sức khỏe bộ n&atilde;o</p>\r\n\r\n<p>B&agrave;i 2: Quy luật &quot;Nghĩa&quot; v&agrave; phương ph&aacute;p Personal Meaning (Phần 1)</p>\r\n\r\n<p>B&agrave;i 3: Quy luật &quot;Nghĩa&quot; v&agrave; phương ph&aacute;p Personal Meaning (Phần 2)</p>\r\n\r\n<p>B&agrave;i 4: Quy luật &quot;H&igrave;nh&quot; v&agrave; Phương ph&aacute;p Picture - Mind (Phần 1)</p>\r\n\r\n<p>B&agrave;i 5: Quy luật &quot;H&igrave;nh&quot; v&agrave; Phương ph&aacute;p Picture - Mind (Phần 2)</p>\r\n\r\n<p>B&agrave;i 6: Phương ph&aacute;p translate để ghi nhớ mọi số liệu (Phần 1)</p>\r\n\r\n<p>B&agrave;i 7: Phương ph&aacute;p translate để ghi nhớ mọi số liệu (Phần 2)</p>\r\n\r\n<p>B&agrave;i 8: Phương ph&aacute;p Keywords - Chain - Journey (Phần 1)</p>\r\n\r\n<p>B&agrave;i 9: Phương ph&aacute;p Keywords - Chain - Journey (Phần 2)</p>\r\n\r\n<p>B&agrave;i 10: Quy luật Đầu - cuối</p>\r\n\r\n<p>B&agrave;i 11: Quy luật cảm x&uacute;c &amp; Quy luật &yacute; thức (Phần 1)</p>\r\n\r\n<p>B&agrave;i 12: Quy luật cảm x&uacute;c &amp; Quy luật &yacute; thức (Phần 2)</p>\r\n\r\n<p>B&agrave;i 13: Quy luật thuật nhớ &amp; Quy luật ức chế</p>\r\n\r\n<p>B&agrave;i 14: Quy luật Keywords &amp; Quy luật tốc độ qu&ecirc;n</p>\r\n\r\n<p>B&agrave;i 15: Quy luật hứng th&uacute; &amp; Quy luật &ocirc;n tập</p>\r\n\r\n<p>B&agrave;i 16: Quy luật vận dụng</p>\r\n\r\n<p>B&agrave;i 17: 10 b&agrave;i luyện tập</p>\r\n', 'ptbt', 390000, 17, '02:09:46', '2019-04-10'),
(29, 'Trở thành chuyên gia Excel trong 8 giờ', 'Biết biến những thao tác thực hiện hàng giờ rút ngắn lại trong vòng vài phút khi thực hiện với Excel.', '804219acf33718693c50b5b37acb0dc9.jpg', 44, '<p>Đối tượng mục ti&ecirc;u</p>\r\n\r\n<ul>\r\n	<li>Nh&agrave; quản l&yacute; muốn n&acirc;ng cao kỹ năng Excel trong thực tế</li>\r\n</ul>\r\n\r\n<ul>\r\n	<li>Nh&acirc;n vi&ecirc;n văn ph&ograve;ng c&ograve;n yếu về Excel muốn n&acirc;ng cao tay nghề v&agrave; tuyệt vời</li>\r\n</ul>\r\n\r\n<ul>\r\n	<li>Học sinh sinh vi&ecirc;n muốn &ocirc;n luyện thi Excel</li>\r\n</ul>\r\n\r\n<ul>\r\n	<li>Người kinh doanh muốn ứng dụng excel v&agrave;o quản l&yacute; v&agrave; kinh doanh</li>\r\n</ul>\r\n\r\n<ul>\r\n	<li>Tất cả những ai muốn c&ocirc;ng việc trở n&ecirc;n nhẹ nh&agrave;ng, nhanh gọn v&agrave; linh hoạt hơn</li>\r\n</ul>\r\n\r\n<ul>\r\n</ul>\r\n', '<p>B&agrave;i 1: Hướng dẫn download v&agrave; c&agrave;i đặt bộ Office 2013</p>\r\n\r\n<p>B&agrave;i 2: T&igrave;m hiểu giao diện Excel 2013, thanh c&ocirc;ng cụ, lưu file Excel</p>\r\n\r\n<p>B&agrave;i 3: 10 thao t&aacute;c cơ bản tr&ecirc;n Excel</p>\r\n\r\n<p>B&agrave;i 4: 10 thao t&aacute;c cơ bản tr&ecirc;n Excel (Phần 2)</p>\r\n\r\n<p>B&agrave;i 5: Kiểu dữ liệu th&ocirc;ng dụng tr&ecirc;n Excel</p>\r\n\r\n<p>B&agrave;i 6: H&agrave;m Sum v&agrave; c&aacute;ch t&iacute;nh to&aacute;n đơn giản</p>\r\n\r\n<p>B&agrave;i 7: Nối chuỗi trong Excel</p>\r\n\r\n<p>B&agrave;i 8: Cố định &ocirc; trong Excel l&agrave; g&igrave;?</p>\r\n\r\n<p>B&agrave;i 9: Sao ch&eacute;p trong Excel c&oacute; g&igrave; th&uacute; vị?</p>\r\n\r\n<p>B&agrave;i 10: 6 thao t&aacute;c cơ bản trước khi x&acirc;y dựng một form chuẩn</p>\r\n\r\n<p>B&agrave;i 11: Sort - Sắp xếp dữ liệu</p>\r\n\r\n<p>B&agrave;i 12: R&uacute;t tr&iacute;ch dữ liệu</p>\r\n\r\n<p>B&agrave;i 13: T&aacute;ch họ v&agrave; t&ecirc;n si&ecirc;u tốc trong Excel</p>\r\n\r\n<p>B&agrave;i 14: H&agrave;m Average, Max, Min</p>\r\n\r\n<p>B&agrave;i 15: H&agrave;m xếp hạng Rank</p>\r\n\r\n<p>B&agrave;i 16: H&agrave;m l&agrave;m tr&ograve;n số Round</p>\r\n\r\n<p>B&agrave;i 17: H&agrave;m điều kiện If</p>\r\n\r\n<p>B&agrave;i 18: H&agrave;m tham chiếu Vlookup</p>\r\n\r\n<p>B&agrave;i 19: H&agrave;m tham chiếu Hlookup</p>\r\n\r\n<p>B&agrave;i 20: Vẽ biểu đồ cơ bản</p>\r\n\r\n<p>B&agrave;i 21: Hiệu chỉnh biểu đồ</p>\r\n\r\n<p>B&agrave;i 22: Định dạng trang in</p>\r\n\r\n<p>B&agrave;i 23: Bảo mật bảng t&iacute;nh</p>\r\n', 'thvp', 899000, 23, '05:15:57', '2019-04-10'),
(30, 'YOGA trẻ hóa - Làm đẹp cho khuôn mặt', 'Làm đẹp cho khuôn mặt gồm các bài tập tác động trực tiếp lên khuôn mặt giúp làm đẹp cho làn da, loại trừ nếp nhăn, kéo dài sự trẻ trung cho làn da của bạn.', 'a0f152258952d34ebf8970170f708e9f.png', 47, '<p>Đối tượng mục ti&ecirc;u</p>\r\n\r\n<ul>\r\n	<li>Tất cả những ai c&oacute; nhu cầu luyện tập yoga r&egrave;n luyện sức khỏe.</li>\r\n</ul>\r\n\r\n<ul>\r\n	<li>C&aacute;c bạn c&oacute; nhu cầu giữ d&aacute;ng, giảm c&acirc;n l&agrave;m đẹp cơ thể.</li>\r\n</ul>\r\n\r\n<ul>\r\n	<li>D&acirc;n văn ph&ograve;ng, bận rộn, sức khỏe kh&ocirc;ng tốt.</li>\r\n</ul>\r\n\r\n<ul>\r\n	<li>Những ai y&ecirc;u th&iacute;ch tập yoga nhưng kh&ocirc;ng c&oacute; thời gian đến trung t&acirc;m luyện tập.</li>\r\n</ul>\r\n\r\n<p>Tổng qu&aacute;t</p>\r\n\r\n<p>- Cung cấp những th&ocirc;ng tin cơ bản nhất về nội dung, thời lượng học, c&aacute;ch thức &aacute;p dụng trong thực tế,...<br />\r\n- Chia sẻ của bản th&acirc;n giảng vi&ecirc;n về những trải nghiệm đ&uacute;c r&uacute;t được từ thực tế cuộc sống.<br />\r\n- &Yacute; nghĩa v&agrave; tầm quan trọng của việc học &amp; &aacute;p dụng những kỹ năng / kiến thức trong kh&oacute;a học đối với mục ti&ecirc;u c&aacute; nh&acirc;n của học vi&ecirc;n.</p>\r\n\r\n<ul>\r\n</ul>\r\n', '<p>B&agrave;i 1: Động t&aacute;c số 1</p>\r\n\r\n<p>B&agrave;i 2: Động t&aacute;c số 2, số 3 v&agrave; số 4</p>\r\n\r\n<p>B&agrave;i 3: Động t&aacute;c số 5, số 6 v&agrave; số 7</p>\r\n\r\n<p>B&agrave;i 4: Động t&aacute;c số 8, số 9 v&agrave; số 10</p>\r\n\r\n<p>B&agrave;i 5: B&agrave;i tập 1: Trẻ h&oacute;a to&agrave;n th&acirc;n (Phần 1)</p>\r\n\r\n<p>B&agrave;i 6: Trẻ h&oacute;a to&agrave;n th&acirc;n (Phần 2)</p>\r\n\r\n<p>B&agrave;i 7: B&agrave;i tập 2: Kh&iacute; sắc hồng h&agrave;o</p>\r\n\r\n<p>B&agrave;i 8: B&agrave;i tập 3: Trẻ h&oacute;a cho mặt v&agrave; cổ</p>\r\n\r\n<p>B&agrave;i 9: B&agrave;i tập 4: Yoga k&eacute;o d&agrave;i tuổi thanh xu&acirc;n</p>\r\n', 'ptbt', 289000, 9, '01:02:06', '2019-04-10'),
(31, 'TS. Lê Thẩm Dương: Lãnh đạo là một nghề phải học', '26 bài học súc tích, hấp dẫn, đúc kết từ kinh nghiệm của TS Lê Thẩm Dương ', '9055d1a0af738b2dd4284d0e9f1213bd.png', 49, '<p><strong>Đối tượng mục ti&ecirc;u</strong></p>\r\n\r\n<ul>\r\n	<li>Những người đang l&agrave;m l&atilde;nh đạo</li>\r\n</ul>\r\n\r\n<ul>\r\n	<li>Những người c&oacute; mong muốn l&agrave;m l&atilde;nh đạo</li>\r\n</ul>\r\n\r\n<p><strong>Tổng qu&aacute;t</strong></p>\r\n\r\n<p>TS L&ecirc; Thẩm Dương sẽ gi&uacute;p bạn hiểu kỹ hơn về &quot;Nghề L&atilde;nh đạo&quot;</p>\r\n\r\n<p>- Kh&ocirc;ng ai c&oacute; thể th&agrave;nh c&ocirc;ng m&agrave; kh&ocirc;ng cần sự hỗ trợ từ người kh&aacute;c</p>\r\n\r\n<p>- Một người rất giỏi nhưng kh&ocirc;ng c&oacute; qu&acirc;n sẽ sớm thua một người c&oacute; một đội qu&acirc;n h&ugrave;ng mạnh trong tay</p>\r\n\r\n<p>- 100% người th&agrave;nh c&ocirc;ng đều c&oacute; một đội ngũ đứng ph&iacute;a sau</p>\r\n\r\n<p>- &quot;L&atilde;nh đạo kh&ocirc;ng phải t&agrave;i trời sinh, cũng kh&ocirc;ng phải h&agrave;nh động cảm t&iacute;nh. L&atilde;nh đạo cần phải được học b&agrave;i bản từ những kinh nghiệm xương m&aacute;u của những người đi trước. Thế mới mau th&agrave;nh t&agrave;i!&quot;</p>\r\n', '<p>B&agrave;i 1: Đặt vấn đề: L&atilde;nh đạo l&agrave; g&igrave;</p>\r\n\r\n<p>B&agrave;i 2: Vị tr&iacute; của l&atilde;nh đạo v&agrave; c&aacute;c nguy&ecirc;n nh&acirc;n thất bại</p>\r\n\r\n<p>B&agrave;i 3: Giải ph&aacute;p biến nguồn lực th&agrave;nh mục ti&ecirc;u</p>\r\n\r\n<p>B&agrave;i 4: C&aacute;c kh&aacute;i niệm về nghề l&atilde;nh đạo</p>\r\n\r\n<p>B&agrave;i 5: Kh&aacute;i niệm: Nh&acirc;n sự</p>\r\n\r\n<p>B&agrave;i 6: Thực h&agrave;nh tương t&aacute;c về kh&aacute;i niệm nh&acirc;n sự</p>\r\n\r\n<p>B&agrave;i 7: Kh&aacute;i niệm: L&atilde;nh đạo</p>\r\n\r\n<p>B&agrave;i 8: Sản phẩm của nghề l&atilde;nh đạo</p>\r\n\r\n<p>B&agrave;i 9: C&aacute;c th&agrave;nh tố của nghề l&atilde;nh đạo</p>\r\n\r\n<p>B&agrave;i 10: Năng lực (căn) l&agrave; g&igrave;</p>\r\n\r\n<p>B&agrave;i 11: 6 mức độ của tầm (cốt)</p>\r\n', 'ptbt', 349000, 11, '02:32:02', '2019-04-10'),
(32, 'DẠY CON THEO PHONG CÁCH NGƯỜI NHẬT BẢN', 'Sửa chữa, thay thế những sai lầm bằng phương pháp nuôi dạy con đúng đắn.', 'dc6286fb55909f25af4d20f13a28d3af.jpg', 50, '<p>Đối tượng mục ti&ecirc;u</p>\r\n\r\n<ul>\r\n	<li>Người c&oacute; con từ 0 12 tuổi.</li>\r\n</ul>\r\n\r\n<ul>\r\n	<li>Người đ&atilde; lập gia đ&igrave;nh, đang c&oacute; bầu.</li>\r\n</ul>\r\n\r\n<p>Tổng qu&aacute;t</p>\r\n\r\n<p>- Chỉ ra c&aacute;c quan điểm gi&aacute;o dục độc đ&aacute;o của Nhật Bản so với c&aacute;c nước kh&aacute;c.</p>\r\n\r\n<p>- Gi&uacute;p trẻ tự tin đối diện với những th&aacute;ch thức của cuộc sống.</p>\r\n\r\n<p>- Gi&uacute;p con tự lập ngay từ nhỏ bằng c&aacute;ch tập trao quyền.</p>\r\n\r\n<p>- Gợi &yacute; những phương c&aacute;ch hữu hiệu để phụ huynh c&oacute; thể uyển chuyển &aacute;p dụng những phương ph&aacute;p gi&aacute;o dục Nhật Bản v&agrave;o mỗi gia đ&igrave;nh Việt.</p>\r\n\r\n<p>- C&ugrave;ng con giải quyết những sự cố trong cuộc sống.</p>\r\n\r\n<ul>\r\n</ul>\r\n', '<p>B&agrave;i 1: N&eacute;t độc đ&aacute;o của văn ho&aacute; Nhật</p>\r\n\r\n<p>B&agrave;i 2: Thanh lịch từ c&aacute;ch c&uacute;i ch&agrave;o</p>\r\n\r\n<p>B&agrave;i 3: &Yacute; nghĩa của tr&agrave; đạo trong nghệ thuật tu th&acirc;n</p>\r\n\r\n<p>B&agrave;i 4: Tinh thần v&otilde; sĩ đạo trong văn ho&aacute; Nhật</p>\r\n\r\n<p>B&agrave;i 5: Tinh thần cha mẹ Nhật Bản</p>\r\n\r\n<p>B&agrave;i 6: Ba mẹ đang &quot;nu&ocirc;ng chiều&quot; hay &quot;y&ecirc;u chiều&quot; trẻ?</p>\r\n\r\n<p>B&agrave;i 7: C&oacute; đ&aacute;ng lo khi trẻ hay l&agrave;m nũng?</p>\r\n\r\n<p>B&agrave;i 8: Trẻ kh&ocirc;ng l&agrave;m nũng c&oacute; phải l&agrave; đ&atilde; biết tự lập?</p>\r\n\r\n<p>B&agrave;i 9: L&agrave;m g&igrave; khi mẹ kh&ocirc;ng thể c&oacute; cảm gi&aacute;c thương con?</p>\r\n\r\n<p>B&agrave;i 10: Bật m&iacute; NGUY&Ecirc;N NH&Acirc;N GỐC của những biểu hiện đ&aacute;ng lo ở trẻ</p>\r\n\r\n<p>B&agrave;i 11: Kỹ năng cha mẹ Nhật Bản</p>\r\n\r\n<p>B&agrave;i 12: Lắng nghe con kh&ocirc;ng kh&oacute;!</p>\r\n', 'ndc', 319000, 12, '02:26:42', '2019-04-10'),
(33, '3DsMax - Vray Online Cơ Bản', 'Thành thạo 3DsMax Vray mức cơ bản và đủ khả năng làm việc tại các công ty Kiến trúc Nội thất.', '6d5e8acd5e5f4929325dda3615ada508.jpg', 44, '<p>Đối tượng mục ti&ecirc;u</p>\r\n\r\n<ul>\r\n	<li>Sinh vi&ecirc;n c&aacute;c trường Nội thất Kiến tr&uacute;c.</li>\r\n</ul>\r\n\r\n<ul>\r\n	<li>Người đi l&agrave;m trong c&aacute;c ng&agrave;nh nghề Nội thất Kiến tr&uacute;c.</li>\r\n</ul>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>Tổng qu&aacute;t</p>\r\n\r\n<ul>\r\n</ul>\r\n\r\n<p>3DS Max l&agrave; một trong những chương tr&igrave;nh gi&uacute;p tạo ra v&agrave; diễn hoạt c&aacute;c vật thể 3 chiều. N&oacute; c&oacute; khả năng dựng m&ocirc; h&igrave;nh mạnh mẽ, k&egrave;m theo một tập hợp c&aacute;c modun phần mềm gh&eacute;p th&ecirc;m v&agrave;o c&oacute; cấu tr&uacute;c mềm dẻo v&agrave; một nền tảng tương th&iacute;ch với Microsoft Windows.<br />\r\nNội dung ch&iacute;nh kh&oacute;a học vi&ecirc;n sẽ nắm được:<br />\r\n- Vật liệu Vray v&agrave; c&aacute;c kh&aacute;i niệm cơ bản.<br />\r\n- &Aacute;nh s&aacute;ng Vray trong m&ocirc;i trường thực.<br />\r\n- Nguy&ecirc;n l&iacute; v&agrave; th&ocirc;ng số của Vray Render.<br />\r\n- Xử l&iacute; hậu k&igrave; m&agrave;u sắc.<br />\r\n- Diễn hoạt chuyển động của Camera.<br />\r\n- Dựng h&igrave;nh trong 3DsMax.<br />\r\n- Tốc độ, thực dụng, hiệu quả.</p>\r\n', '<p>B&agrave;i 1: Bắt đầu với 3DsMax</p>\r\n\r\n<p>B&agrave;i 2: Hướng dẫn tải t&agrave;i liệu</p>\r\n\r\n<p>B&agrave;i 3: C&aacute;c lệnh cơ bản trong 3DsMax</p>\r\n\r\n<p>B&agrave;i 4: Select and Place - C&ocirc;ng cụ gi&uacute;p di chuyển sắp sếp đồ vật</p>\r\n\r\n<p>B&agrave;i 5: Editable Spline l&agrave; g&igrave;?</p>\r\n\r\n<p>B&agrave;i 6: Đối tượng Spline dựng ghế sắt trong 3DsMax</p>\r\n\r\n<p>B&agrave;i 7: Đối tượng Editable Spline</p>\r\n\r\n<p>B&agrave;i 8: T&igrave;m hiểu đối tượng Editable Poly trong 3DsMax</p>\r\n\r\n<p>B&agrave;i 9: Editable Poly dựng b&agrave;n học</p>\r\n\r\n<p>B&agrave;i 10: Hướng dẫn dựng tủ gỗ cơ bản</p>\r\n\r\n<p>B&agrave;i 11: Hướng dẫn sử dụng lệnh Lathe trong 3DsMax</p>\r\n\r\n<p>B&agrave;i 12: Lệnh Extrude trong 3DsMax</p>\r\n\r\n<p>B&agrave;i 13: Hướng dẫn dựng tủ gỗ ho&agrave;n chỉnh</p>\r\n', 'tk', 6790000, 13, '03:59:57', '2019-04-10'),
(34, 'Bí quyết để tự mua hàng TaoBao', 'Tự mình tạo lập một tài khoản trên TaoBao. Biết cách tự tính giá vận chuyển của sản phẩm một cách chính xác nhất', '9fc0dc41b941ab5991384edd0ef5e16a.jpg', 49, '<p>Đối tượng mục ti&ecirc;u</p>\r\n\r\n<ul>\r\n	<li>D&agrave;nh cho người c&oacute; nhu cầu mua sắm tr&ecirc;n trang TaoBao, kh&ocirc;ng biết tiếng Trung</li>\r\n</ul>\r\n\r\n<ul>\r\n	<li>C&aacute;c chủ shop b&aacute;n h&agrave;ng, c&aacute;c chủ doanh nghiệp thương mại h&agrave;ng h&oacute;a</li>\r\n</ul>\r\n\r\n<p>Tổng qu&aacute;t</p>\r\n\r\n<p>Vấn đề của bạn:<br />\r\n1. Bạn muốn mua h&agrave;ng từ Trung Quốc nhưng kh&ocirc;ng biết t&igrave;m nguồn h&agrave;ng ở đ&acirc;u<br />\r\n2. Bạn kh&ocirc;ng biết tiếng Trung v&agrave; nghĩ rằng kh&ocirc;ng thể giao dịch được<br />\r\n4. Bạn nhập h&agrave;ng nhưng kh&ocirc;ng biết khi n&agrave;o h&agrave;ng về, kh&ocirc;ng tự kiến so&aacute;t được h&agrave;ng h&oacute;a<br />\r\n5. Bạn kh&ocirc;ng giao dịch được trực tiếp với shop Trung Quốc kh&ocirc;ng trực tiếp đ&agrave;m ph&aacute;n được gi&aacute; cả v&agrave; ưu đ&atilde;i từ nh&agrave; cung cấp bạn cũng kh&ocirc;ng được hưởng<br />\r\n6. Bị người b&aacute;n gửi sai mẫu h&agrave;ng h&oacute;a, h&agrave;ng k&eacute;m chất lượng m&agrave; kh&ocirc;ng biết l&agrave;m thế n&agrave;o.</p>\r\n\r\n<p>Kh&oacute;a học n&agrave;y sẽ gi&uacute;p bạn giải quyết được hết những kh&uacute;c mắc tr&ecirc;n!</p>\r\n\r\n<ul>\r\n</ul>\r\n', '<p>B&agrave;i 1: Giới thiệu hệ thống thương mại điện tử Trung Quốc</p>\r\n\r\n<p>B&agrave;i 2: Giới thiệu về taobao - Tmall - Alipay</p>\r\n\r\n<p>B&agrave;i 3: Giới thi&ecirc;̣u v&ecirc;̀ trang web Taobao.com</p>\r\n\r\n<p>B&agrave;i 4: Cách đăng nh&acirc;̣p và m&ocirc;̣t s&ocirc;́ chú ý</p>\r\n\r\n<p>B&agrave;i 5: Tìm ki&ecirc;́m ph&ocirc;̉ th&ocirc;ng</p>\r\n\r\n<p>B&agrave;i 6: Tải aliwangwang</p>\r\n\r\n<p>B&agrave;i 7: Các bước đặt hàng</p>\r\n\r\n<p>B&agrave;i 8: C&aacute;ch thức mua h&agrave;ng để giảm tối đa chi ph&iacute;</p>\r\n\r\n<p>B&agrave;i 9: Xử lý khi gặp sự c&ocirc;́</p>\r\n\r\n<p>B&agrave;i 10: Cách xem v&acirc;̣n chuy&ecirc;̉n và tính tiền v&acirc;̣n chuy&ecirc;̉n</p>\r\n\r\n<p>B&agrave;i 11: Sự kh&aacute;c nhau giữa Taobao, Tmall v&agrave; 1688</p>\r\n\r\n<p>B&agrave;i 12: Quản lý giỏ hàng</p>\r\n\r\n<p>B&agrave;i 13: V&acirc;̣n chuy&ecirc;̉n hàng hóa</p>\r\n', 'kdkn', 189000, 13, '01:34:02', '2019-04-10');

-- --------------------------------------------------------

--
-- Table structure for table `episodes_course`
--

CREATE TABLE `episodes_course` (
  `id_ep` int(11) NOT NULL,
  `id_cs` int(11) NOT NULL,
  `ep_number` int(11) DEFAULT NULL,
  `ep_title` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `video_name` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `episodes_course`
--

INSERT INTO `episodes_course` (`id_ep`, `id_cs`, `ep_number`, `ep_title`, `video_name`) VALUES
(38, 19, 1, 'C# là gì', '61dfbff31ca337a775a99a65a5a40524.mp4'),
(39, 19, 2, 'Cấu trúc lệnh cơ bản', '61dfbff31ca337a775a99a65a5a40524.mp4'),
(40, 19, 3, 'Nhập xuất cơ bản', '61dfbff31ca337a775a99a65a5a40524.mp4'),
(41, 19, 4, 'Biến trong C#', '61dfbff31ca337a775a99a65a5a40524.mp4'),
(42, 19, 5, 'Kiểu dữ liệu trong C#', '61dfbff31ca337a775a99a65a5a40524.mp4'),
(43, 19, 6, 'Toán tử trong C#', '61dfbff31ca337a775a99a65a5a40524.mp4'),
(44, 19, 7, 'Hằng', '61dfbff31ca337a775a99a65a5a40524.mp4'),
(45, 19, 8, 'Ép kiểu trong C#', '61dfbff31ca337a775a99a65a5a40524.mp4'),
(46, 19, 9, 'If else trong C#', '61dfbff31ca337a775a99a65a5a40524.mp4'),
(47, 19, 10, 'Switch case trong C#', '61dfbff31ca337a775a99a65a5a40524.mp4'),
(48, 20, 1, 'Tổng quan HTML', '61dfbff31ca337a775a99a65a5a40524.mp4'),
(49, 20, 2, 'Tổng quan CSS', '61dfbff31ca337a775a99a65a5a40524.mp4'),
(50, 20, 3, 'Cách dùng màu trong CSS ', '61dfbff31ca337a775a99a65a5a40524.mp4'),
(51, 20, 4, 'CSS model box', '61dfbff31ca337a775a99a65a5a40524.mp4'),
(52, 20, 5, 'ID, class và float ', '61dfbff31ca337a775a99a65a5a40524.mp4'),
(53, 20, 6, 'Position trong CSS ', '61dfbff31ca337a775a99a65a5a40524.mp4'),
(54, 20, 7, 'Hoàn thiện trang blog', '61dfbff31ca337a775a99a65a5a40524.mp4'),
(57, 24, 1, 'What\'s your name?', '61dfbff31ca337a775a99a65a5a40524.mp4'),
(58, 24, 2, 'The Alphabet song', '61dfbff31ca337a775a99a65a5a40524.mp4'),
(59, 24, 3, 'How are you?', '61dfbff31ca337a775a99a65a5a40524.mp4'),
(60, 24, 4, 'Number and How old are you?', '61dfbff31ca337a775a99a65a5a40524.mp4'),
(61, 24, 5, 'School supplies - part 1', '61dfbff31ca337a775a99a65a5a40524.mp4'),
(62, 24, 6, 'School supplies - part 2', '61dfbff31ca337a775a99a65a5a40524.mp4'),
(63, 24, 7, 'Shapes', '61dfbff31ca337a775a99a65a5a40524.mp4'),
(64, 24, 8, 'Art Supplies', '61dfbff31ca337a775a99a65a5a40524.mp4'),
(65, 24, 9, 'Colors - part 1', '61dfbff31ca337a775a99a65a5a40524.mp4'),
(66, 24, 10, 'Colors - part 2', '61dfbff31ca337a775a99a65a5a40524.mp4'),
(67, 24, 11, 'Toys - part 1', '61dfbff31ca337a775a99a65a5a40524.mp4'),
(68, 24, 12, 'Toys - part 2', '61dfbff31ca337a775a99a65a5a40524.mp4'),
(69, 24, 13, 'Family', '61dfbff31ca337a775a99a65a5a40524.mp4'),
(70, 24, 14, 'Nature', '61dfbff31ca337a775a99a65a5a40524.mp4'),
(71, 24, 15, 'Playtime', '61dfbff31ca337a775a99a65a5a40524.mp4'),
(72, 25, 1, 'Introduce yourself (Giới thiệu bản thân)', '61dfbff31ca337a775a99a65a5a40524.mp4'),
(73, 25, 2, 'Numbers in English (Số trong tiếng Anh)', '61dfbff31ca337a775a99a65a5a40524.mp4'),
(74, 25, 3, 'Numbers and age in English (Số và cách nói tuổi)', '61dfbff31ca337a775a99a65a5a40524.mp4'),
(75, 25, 4, 'Jobs/What do you do? (Cách nói về nghề nghiệp)', '61dfbff31ca337a775a99a65a5a40524.mp4'),
(76, 25, 5, 'Family (Gia đình)', '61dfbff31ca337a775a99a65a5a40524.mp4'),
(77, 25, 6, 'Hobbies (Diễn tả sở thích)', '61dfbff31ca337a775a99a65a5a40524.mp4'),
(78, 25, 7, 'What do you like? ( Cách diễn tả sở thích )', '61dfbff31ca337a775a99a65a5a40524.mp4'),
(79, 25, 8, 'Daily Activities at Home', '61dfbff31ca337a775a99a65a5a40524.mp4'),
(80, 25, 9, 'Ordinal numbers (Số thứ tự)', '61dfbff31ca337a775a99a65a5a40524.mp4'),
(81, 25, 10, 'Days of the week (Các ngày trong tuần)', '61dfbff31ca337a775a99a65a5a40524.mp4'),
(82, 25, 11, 'Months of the year (Các tháng trong năm)', '61dfbff31ca337a775a99a65a5a40524.mp4'),
(83, 25, 12, 'Months and dates (Cách nói ngày tháng trong tiếng Anh)', '61dfbff31ca337a775a99a65a5a40524.mp4'),
(84, 25, 13, 'Frequency adverbs in English (Trạng từ chỉ tần suất)', '61dfbff31ca337a775a99a65a5a40524.mp4'),
(85, 25, 14, 'Tổng kết khóa học', '61dfbff31ca337a775a99a65a5a40524.mp4'),
(86, 26, 1, 'Phá tan rào cản 1. Tìm lộ trình đúng', '61dfbff31ca337a775a99a65a5a40524.mp4'),
(87, 26, 2, 'Phá tan rào cản 2. Tìm phương pháp đúng', '61dfbff31ca337a775a99a65a5a40524.mp4'),
(88, 26, 3, 'Phá tan rào cản 3. Tìm ra môi trường thuận lợi', '61dfbff31ca337a775a99a65a5a40524.mp4'),
(89, 26, 4, 'Phá tan rào cản 4. Vượt qua sự lười biếng', '61dfbff31ca337a775a99a65a5a40524.mp4'),
(90, 26, 5, 'Phá tan rào cản thứ 5. Tạo động lực cho chính mình', '61dfbff31ca337a775a99a65a5a40524.mp4'),
(91, 26, 6, 'Phá tan rào cản 6. Làm gì để đạt được mục tiêu to lớn?', '61dfbff31ca337a775a99a65a5a40524.mp4'),
(92, 26, 7, 'Vũ khí 1 - Phương pháp Chơi có Bạn - Học có Bè', '61dfbff31ca337a775a99a65a5a40524.mp4'),
(93, 26, 8, 'Vũ khí 2 - Phương pháp Tẩy não', '61dfbff31ca337a775a99a65a5a40524.mp4'),
(94, 26, 9, 'Vũ khí 3 - Phương pháp POB', '61dfbff31ca337a775a99a65a5a40524.mp4'),
(95, 26, 10, 'Vũ khí 4 - Phương pháp Tây nói gà - Ta nói vịt (phần 1)', '61dfbff31ca337a775a99a65a5a40524.mp4'),
(96, 26, 11, 'Vũ khí 4 - Phương pháp Tây nói gà - Ta nói vịt (phần 2)', '61dfbff31ca337a775a99a65a5a40524.mp4'),
(97, 26, 12, 'Vũ khí 5 - Phương pháp Râu ông Việt cắm cằm bà Tây', '61dfbff31ca337a775a99a65a5a40524.mp4'),
(98, 26, 13, 'Vũ khí 6 - Phương pháp Mưa dầm thấm sâu - Mưa lâu ', '61dfbff31ca337a775a99a65a5a40524.mp4'),
(99, 26, 14, 'Quy trình 6 bước học từ vựng siêu tốc', '61dfbff31ca337a775a99a65a5a40524.mp4'),
(100, 26, 15, 'Nuốt chửng 20 từ vựng tiếng Hoa (phần 1)', '61dfbff31ca337a775a99a65a5a40524.mp4'),
(101, 26, 16, 'Nuốt chửng 20 từ vựng tiếng Hoa (phần 2)', '61dfbff31ca337a775a99a65a5a40524.mp4'),
(102, 26, 17, 'Tóm gọn 30 từ vựng tiếng Hàn (phần 1)', '61dfbff31ca337a775a99a65a5a40524.mp4'),
(103, 26, 18, 'Tóm gọn 30 từ vựng tiếng Hàn (phần 2)', '61dfbff31ca337a775a99a65a5a40524.mp4'),
(104, 26, 19, 'Tổng kết khóa học và lời dặn dò chân thành từ tác giả', '61dfbff31ca337a775a99a65a5a40524.mp4'),
(105, 27, 1, 'Tìm hiểu về quy trình Marketing', '61dfbff31ca337a775a99a65a5a40524.mp4'),
(106, 27, 2, 'Quy trình Marketing (Xây dựng đề xuất)', '61dfbff31ca337a775a99a65a5a40524.mp4'),
(107, 27, 3, 'Tìm hiểu về Marketing Online', '61dfbff31ca337a775a99a65a5a40524.mp4'),
(108, 27, 4, 'Các công cụ thực hiện Marketing Online', '61dfbff31ca337a775a99a65a5a40524.mp4'),
(109, 27, 5, 'Cách thành lập website và giới thiệu sản phẩm', '61dfbff31ca337a775a99a65a5a40524.mp4'),
(110, 27, 6, 'Tìm hiểu về Marketing trên Website - Lan truyền - Email ...', '61dfbff31ca337a775a99a65a5a40524.mp4'),
(111, 27, 7, 'Case study: Marketing truyền thống hay Marketing online', '61dfbff31ca337a775a99a65a5a40524.mp4'),
(112, 27, 8, 'Tìm hiểu về quy trình bán hàng', '61dfbff31ca337a775a99a65a5a40524.mp4'),
(113, 27, 9, 'Tìm hiểu về các phương pháp bán hàng', '61dfbff31ca337a775a99a65a5a40524.mp4'),
(114, 27, 10, 'Case study: Phát triển đội ngũ sale', '61dfbff31ca337a775a99a65a5a40524.mp4'),
(115, 27, 11, 'Tìm hiểu về các quy trình giao nhận', '61dfbff31ca337a775a99a65a5a40524.mp4'),
(116, 27, 12, 'Tìm hiểu về các quy trình thanh toán', '61dfbff31ca337a775a99a65a5a40524.mp4'),
(117, 28, 1, 'Điều kiện cần : Sức khỏe bộ não', '61dfbff31ca337a775a99a65a5a40524.mp4'),
(118, 28, 2, 'Quy luật Nghĩa và phương pháp Personal Meaning (Phần 1)', '61dfbff31ca337a775a99a65a5a40524.mp4'),
(119, 28, 3, 'Quy luật Nghĩa và phương pháp Personal Meaning (Phần 2)', '61dfbff31ca337a775a99a65a5a40524.mp4'),
(120, 28, 4, 'Quy luật Hình và Phương pháp Picture - Mind (Phần 1)', '61dfbff31ca337a775a99a65a5a40524.mp4'),
(121, 28, 5, 'Quy luật Hình và Phương pháp Picture - Mind (Phần 2)', '61dfbff31ca337a775a99a65a5a40524.mp4'),
(122, 28, 6, 'Phương pháp translate để ghi nhớ mọi số liệu (Phần 1)', '61dfbff31ca337a775a99a65a5a40524.mp4'),
(123, 28, 7, 'Phương pháp translate để ghi nhớ mọi số liệu (Phần 2)', '61dfbff31ca337a775a99a65a5a40524.mp4'),
(124, 28, 8, 'Phương pháp Keywords - Chain - Journey (Phần 1)', '61dfbff31ca337a775a99a65a5a40524.mp4'),
(125, 28, 9, 'Phương pháp Keywords - Chain - Journey (Phần 2)', '61dfbff31ca337a775a99a65a5a40524.mp4'),
(126, 28, 10, 'Quy luật Đầu - cuối', '61dfbff31ca337a775a99a65a5a40524.mp4'),
(127, 28, 11, 'Quy luật cảm xúc & Quy luật ý thức (Phần 1)', '61dfbff31ca337a775a99a65a5a40524.mp4'),
(128, 28, 12, 'Quy luật cảm xúc & Quy luật ý thức (Phần 2)', '61dfbff31ca337a775a99a65a5a40524.mp4'),
(129, 28, 13, 'Quy luật thuật nhớ & Quy luật ức chế', '61dfbff31ca337a775a99a65a5a40524.mp4'),
(130, 28, 14, 'Quy luật Keywords & Quy luật tốc độ quên', '61dfbff31ca337a775a99a65a5a40524.mp4'),
(131, 28, 15, 'Quy luật hứng thú & Quy luật ôn tập', '61dfbff31ca337a775a99a65a5a40524.mp4'),
(132, 28, 16, 'Quy luật vận dụng', '61dfbff31ca337a775a99a65a5a40524.mp4'),
(133, 28, 17, '10 bài luyện tập', '61dfbff31ca337a775a99a65a5a40524.mp4'),
(134, 29, 1, 'Hướng dẫn download và cài đặt bộ Office 2013', '61dfbff31ca337a775a99a65a5a40524.mp4'),
(135, 29, 2, 'Tìm hiểu giao diện Excel 2013, thanh công cụ, lưu file Excel', '61dfbff31ca337a775a99a65a5a40524.mp4'),
(136, 29, 3, '10 thao tác cơ bản trên Excel', '61dfbff31ca337a775a99a65a5a40524.mp4'),
(137, 29, 4, '10 thao tác cơ bản trên Excel (Phần 2)', '61dfbff31ca337a775a99a65a5a40524.mp4'),
(138, 29, 5, 'Kiểu dữ liệu thông dụng trên Excel', '61dfbff31ca337a775a99a65a5a40524.mp4'),
(139, 29, 6, 'Hàm Sum và cách tính toán đơn giản', '61dfbff31ca337a775a99a65a5a40524.mp4'),
(140, 29, 7, 'Nối chuỗi trong Excel', '61dfbff31ca337a775a99a65a5a40524.mp4'),
(141, 29, 8, 'Cố định ô trong Excel là gì?', '61dfbff31ca337a775a99a65a5a40524.mp4'),
(142, 29, 9, 'Sao chép trong Excel có gì thú vị?', '61dfbff31ca337a775a99a65a5a40524.mp4'),
(143, 29, 10, '6 thao tác cơ bản trước khi xây dựng một form chuẩn', '61dfbff31ca337a775a99a65a5a40524.mp4'),
(144, 29, 11, 'Sort - Sắp xếp dữ liệu', '61dfbff31ca337a775a99a65a5a40524.mp4'),
(145, 29, 12, 'Rút trích dữ liệu', '61dfbff31ca337a775a99a65a5a40524.mp4'),
(146, 29, 13, 'Tách họ và tên siêu tốc trong Excel', '61dfbff31ca337a775a99a65a5a40524.mp4'),
(147, 29, 14, 'Hàm Average, Max, Min', '61dfbff31ca337a775a99a65a5a40524.mp4'),
(148, 29, 15, 'Hàm xếp hạng Rank', '61dfbff31ca337a775a99a65a5a40524.mp4'),
(149, 29, 16, 'Hàm làm tròn số Round', '61dfbff31ca337a775a99a65a5a40524.mp4'),
(150, 29, 17, 'Hàm điều kiện If', '61dfbff31ca337a775a99a65a5a40524.mp4'),
(151, 29, 18, 'Hàm tham chiếu Vlookup', '61dfbff31ca337a775a99a65a5a40524.mp4'),
(152, 29, 19, 'Hàm tham chiếu Hlookup', '61dfbff31ca337a775a99a65a5a40524.mp4'),
(153, 29, 20, 'Vẽ biểu đồ cơ bản', '61dfbff31ca337a775a99a65a5a40524.mp4'),
(154, 29, 21, 'Hiệu chỉnh biểu đồ', '61dfbff31ca337a775a99a65a5a40524.mp4'),
(155, 29, 22, 'Định dạng trang in', '61dfbff31ca337a775a99a65a5a40524.mp4'),
(156, 29, 23, 'Bảo mật bảng tính', '61dfbff31ca337a775a99a65a5a40524.mp4'),
(157, 30, 1, 'Động tác số 1', '61dfbff31ca337a775a99a65a5a40524.mp4'),
(158, 30, 2, 'Động tác số 2, số 3 và số 4', '61dfbff31ca337a775a99a65a5a40524.mp4'),
(159, 30, 3, 'Động tác số 5, số 6 và số 7', '61dfbff31ca337a775a99a65a5a40524.mp4'),
(160, 30, 4, 'Động tác số 8, số 9 và số 10', '61dfbff31ca337a775a99a65a5a40524.mp4'),
(161, 30, 5, 'Bài tập 1: Trẻ hóa toàn thân (Phần 1)', '61dfbff31ca337a775a99a65a5a40524.mp4'),
(162, 30, 6, 'Trẻ hóa toàn thân (Phần 2)', '61dfbff31ca337a775a99a65a5a40524.mp4'),
(163, 30, 7, 'Bài tập 2: Khí sắc hồng hào', '61dfbff31ca337a775a99a65a5a40524.mp4'),
(164, 30, 8, 'Bài tập 3: Trẻ hóa cho mặt và cổ', '61dfbff31ca337a775a99a65a5a40524.mp4'),
(165, 30, 9, 'Bài tập 4: Yoga kéo dài tuổi thanh xuân', '61dfbff31ca337a775a99a65a5a40524.mp4'),
(166, 31, 1, 'Đặt vấn đề: Lãnh đạo là gì', '61dfbff31ca337a775a99a65a5a40524.mp4'),
(167, 31, 2, 'Vị trí của lãnh đạo và các nguyên nhân thất bại', '61dfbff31ca337a775a99a65a5a40524.mp4'),
(168, 31, 3, 'Giải pháp biến nguồn lực thành mục tiêu', '61dfbff31ca337a775a99a65a5a40524.mp4'),
(169, 31, 4, 'Các khái niệm về nghề lãnh đạo', '61dfbff31ca337a775a99a65a5a40524.mp4'),
(170, 31, 5, 'Khái niệm: Nhân sự', '61dfbff31ca337a775a99a65a5a40524.mp4'),
(171, 31, 6, 'Thực hành tương tác về khái niệm nhân sự', '61dfbff31ca337a775a99a65a5a40524.mp4'),
(172, 31, 7, 'Khái niệm: Lãnh đạo', '61dfbff31ca337a775a99a65a5a40524.mp4'),
(173, 31, 8, 'Sản phẩm của nghề lãnh đạo', '61dfbff31ca337a775a99a65a5a40524.mp4'),
(174, 31, 9, 'Các thành tố của nghề lãnh đạo', '61dfbff31ca337a775a99a65a5a40524.mp4'),
(175, 31, 10, 'Năng lực (căn) là gì', '61dfbff31ca337a775a99a65a5a40524.mp4'),
(176, 31, 11, '6 mức độ của tầm (cốt)', '61dfbff31ca337a775a99a65a5a40524.mp4'),
(177, 32, 1, 'Nét độc đáo của văn hoá Nhật', '61dfbff31ca337a775a99a65a5a40524.mp4'),
(178, 32, 2, 'Thanh lịch từ cách cúi chào', '61dfbff31ca337a775a99a65a5a40524.mp4'),
(179, 32, 3, 'Ý nghĩa của trà đạo trong nghệ thuật tu thân', '61dfbff31ca337a775a99a65a5a40524.mp4'),
(180, 32, 4, 'Tinh thần võ sĩ đạo trong văn hoá Nhật', '61dfbff31ca337a775a99a65a5a40524.mp4'),
(181, 32, 5, 'Tinh thần cha mẹ Nhật Bản', '61dfbff31ca337a775a99a65a5a40524.mp4'),
(182, 32, 6, 'Ba mẹ đang \'nuông chiều\' hay \'yêu chiều\' trẻ?', '61dfbff31ca337a775a99a65a5a40524.mp4'),
(183, 32, 7, 'Có đáng lo khi trẻ hay làm nũng?', '61dfbff31ca337a775a99a65a5a40524.mp4'),
(184, 32, 8, 'Trẻ không làm nũng có phải là đã biết tự lập?', '61dfbff31ca337a775a99a65a5a40524.mp4'),
(185, 32, 9, 'Làm gì khi mẹ không thể có cảm giác thương con?', '61dfbff31ca337a775a99a65a5a40524.mp4'),
(186, 32, 10, 'Bật mí NGUYÊN NHÂN GỐC của những biểu hiện đáng lo ở trẻ', '61dfbff31ca337a775a99a65a5a40524.mp4'),
(187, 32, 11, 'Kỹ năng cha mẹ Nhật Bản', '61dfbff31ca337a775a99a65a5a40524.mp4'),
(188, 32, 12, 'Lắng nghe con không khó!', '61dfbff31ca337a775a99a65a5a40524.mp4'),
(189, 33, 1, 'Bắt đầu với 3DsMax', '61dfbff31ca337a775a99a65a5a40524.mp4'),
(190, 33, 2, 'Hướng dẫn tải tài liệu', '61dfbff31ca337a775a99a65a5a40524.mp4'),
(191, 33, 3, 'Các lệnh cơ bản trong 3DsMax', '61dfbff31ca337a775a99a65a5a40524.mp4'),
(192, 33, 4, 'Select and Place - Công cụ giúp di chuyển sắp sếp đồ vật', '61dfbff31ca337a775a99a65a5a40524.mp4'),
(193, 33, 5, 'Editable Spline là gì?', '61dfbff31ca337a775a99a65a5a40524.mp4'),
(194, 33, 6, 'Đối tượng Spline dựng ghế sắt trong 3DsMax', '61dfbff31ca337a775a99a65a5a40524.mp4'),
(195, 33, 7, 'Đối tượng Editable Spline', '61dfbff31ca337a775a99a65a5a40524.mp4'),
(196, 33, 8, 'Tìm hiểu đối tượng Editable Poly trong 3DsMax', '61dfbff31ca337a775a99a65a5a40524.mp4'),
(197, 33, 9, 'Editable Poly dựng bàn học', '61dfbff31ca337a775a99a65a5a40524.mp4'),
(198, 33, 10, 'Hướng dẫn dựng tủ gỗ cơ bản', '61dfbff31ca337a775a99a65a5a40524.mp4'),
(199, 33, 11, 'Hướng dẫn sử dụng lệnh Lathe trong 3DsMax', '61dfbff31ca337a775a99a65a5a40524.mp4'),
(200, 33, 12, 'Lệnh Extrude trong 3DsMax', '61dfbff31ca337a775a99a65a5a40524.mp4'),
(201, 33, 13, 'Hướng dẫn dựng tủ gỗ hoàn chỉnh', '61dfbff31ca337a775a99a65a5a40524.mp4'),
(202, 34, 1, 'Giới thiệu hệ thống thương mại điện tử Trung Quốc', '61dfbff31ca337a775a99a65a5a40524.mp4'),
(203, 34, 2, 'Giới thiệu về taobao - Tmall - Alipay', '61dfbff31ca337a775a99a65a5a40524.mp4'),
(204, 34, 3, 'Giới thiệu về trang web Taobao.com', '61dfbff31ca337a775a99a65a5a40524.mp4'),
(205, 34, 4, 'Cách đăng nhập và một số chú ý', '61dfbff31ca337a775a99a65a5a40524.mp4'),
(206, 34, 5, 'Tìm kiếm phổ thông', '61dfbff31ca337a775a99a65a5a40524.mp4'),
(207, 34, 6, 'Tải aliwangwang', '61dfbff31ca337a775a99a65a5a40524.mp4'),
(208, 34, 7, 'Các bước đặt hàng', '61dfbff31ca337a775a99a65a5a40524.mp4'),
(209, 34, 8, 'Cách thức mua hàng để giảm tối đa chi phí', '61dfbff31ca337a775a99a65a5a40524.mp4'),
(210, 34, 9, 'Xử lý khi gặp sự cố', '61dfbff31ca337a775a99a65a5a40524.mp4'),
(211, 34, 10, 'Cách xem vận chuyển và tính tiền vận chuyển', '61dfbff31ca337a775a99a65a5a40524.mp4'),
(212, 34, 11, 'Sự khác nhau giữa Taobao, Tmall và 1688', '61dfbff31ca337a775a99a65a5a40524.mp4'),
(213, 34, 12, 'Quản lý giỏ hàng', '61dfbff31ca337a775a99a65a5a40524.mp4'),
(214, 34, 13, 'Vận chuyển hàng hóa', '61dfbff31ca337a775a99a65a5a40524.mp4');

-- --------------------------------------------------------

--
-- Table structure for table `money_history`
--

CREATE TABLE `money_history` (
  `id_mh` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `menh_gia` int(11) NOT NULL,
  `ma_nap` varchar(255) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `money_history`
--

INSERT INTO `money_history` (`id_mh`, `id_user`, `menh_gia`, `ma_nap`) VALUES
(1, 1, 500000, '1234556'),
(2, 1, 500000, '123546'),
(3, 1, 500000, '23456'),
(4, 44, 500000, '61'),
(5, 44, 50000, 'ádfgdsa'),
(6, 44, 50000, 'sdfhg'),
(7, 44, 200000, 'addfgh'),
(8, 44, 100000, 'trỵuikjl'),
(9, 44, 200000, '23456u'),
(10, 44, 100000, '34567'),
(11, 44, 200000, 'i'),
(12, 44, 100000, 'oi'),
(13, 43, 500000, '123123'),
(14, 43, 500000, 'ádasda'),
(15, 44, 500000, '123123'),
(16, 43, 500000, '1'),
(17, 48, 500000, '855501154410'),
(18, 48, 500000, '8422200368654'),
(19, 43, 200000, '5441123650600'),
(20, 43, 500000, '45153000056498'),
(21, 48, 100000, '7845650061061'),
(22, 43, 500000, '156511135444'),
(23, 43, 500000, '1236454786465'),
(24, 1, 500000, 'a');

-- --------------------------------------------------------

--
-- Table structure for table `own`
--

CREATE TABLE `own` (
  `id_own` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `id_cs` int(11) NOT NULL,
  `id_cp` int(11) DEFAULT NULL,
  `date_own` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `own`
--

INSERT INTO `own` (`id_own`, `id_user`, `id_cs`, `id_cp`, `date_own`) VALUES
(23, 48, 19, 3, '2019-04-02'),
(24, 43, 20, NULL, '2019-04-10'),
(25, 43, 28, NULL, '2019-04-11'),
(26, 43, 30, 4, '2019-04-11'),
(27, 47, 34, NULL, '2020-05-16'),
(28, 1, 34, NULL, '2020-05-19'),
(29, 1, 20, NULL, '2020-05-21'),
(30, 1, 19, NULL, '2020-05-21'),
(31, 1, 24, NULL, '2020-05-21'),
(32, 1, 32, NULL, '2020-05-22');

-- --------------------------------------------------------

--
-- Table structure for table `payment_request`
--

CREATE TABLE `payment_request` (
  `id_payreq` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `method_payreq` varchar(255) COLLATE utf8_unicode_ci NOT NULL COMMENT 'Loại ngân hàng',
  `name_holder` varchar(255) COLLATE utf8_unicode_ci NOT NULL COMMENT 'Chủ thẻ',
  `number_cart` varchar(255) COLLATE utf8_unicode_ci NOT NULL COMMENT 'Số tài khoản',
  `amount_payreq` int(11) NOT NULL COMMENT 'Số tiền rút',
  `message_payreq` text COLLATE utf8_unicode_ci NOT NULL COMMENT 'Tin nhắn kèm theo',
  `state_payreq` tinyint(4) NOT NULL DEFAULT 0 COMMENT '0 là chưa thanh toán - 1 là đã thanh toán',
  `date_payreq` datetime NOT NULL,
  `date_payment` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `payment_request`
--

INSERT INTO `payment_request` (`id_payreq`, `id_user`, `method_payreq`, `name_holder`, `number_cart`, `amount_payreq`, `message_payreq`, `state_payreq`, `date_payreq`, `date_payment`) VALUES
(6, 44, 'AgriBank', 'Nông Văn Khánh', '1000 0109 0440', 60000, 'Cảm ơn Admin rất nhiều', 1, '2019-01-09 23:42:01', '2019-01-11 00:09:03'),
(7, 44, 'VietcomBank', 'Hoàng Công Hữu', '10024888165', 500000, 'Rút 500.000đ trên hệ thống.', 0, '2019-04-11 00:31:47', NULL);

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
(1, 44, 'Xin chào các giáo viên', '2018-12-13 15:53:28'),
(2, 44, 'Chào mọi người?', '2019-03-31 16:34:29');

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
  `permission_user` int(11) NOT NULL DEFAULT 0 COMMENT '0 là chưa kích hoạt mail  -  1 là tv đã active  -  2 là GV  -  3 là ADMIN',
  `code_user` varchar(255) NOT NULL,
  `coin_user` int(11) NOT NULL,
  `avatar_user` varchar(255) NOT NULL DEFAULT 'default.jpg',
  `created_date` date NOT NULL,
  `last_login` date NOT NULL,
  `last_ip` varchar(191) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id_user`, `email_user`, `pass_user`, `name_user`, `job_user`, `sex_user`, `about_user`, `permission_user`, `code_user`, `coin_user`, `avatar_user`, `created_date`, `last_login`, `last_ip`) VALUES
(1, 'quantrivien-web@gmail.com', 'e10adc3949ba59abbe56e057f20f883e', 'Quản trị viên', 'Quản lý hệ thống Edumall', 1, 'Gioi thieu ban than Admin', 3, '', 56800, 'default.jpg', '2018-12-01', '2020-05-27', NULL),
(43, 'hoangthaihau@gmail.com', 'e10adc3949ba59abbe56e057f20f883e', 'Hoàng Thái Hậu', 'Sinh Viên', 0, 'Chăm chỉ học hành', 1, '', 527250, 'd7a05dd09a2de5d5969d1b6d89403a33.png', '2018-12-13', '2019-04-11', NULL),
(44, 'conghuu_it@gmail.com', 'e10adc3949ba59abbe56e057f20f883e', 'Hoàng Công Hữu', 'Giảng viên', 1, 'Dạy giỏi', 3, '', 1142400, 'default.jpg', '2018-12-13', '2019-04-11', NULL),
(47, 'ngochai_gvnn@gmail.com', 'e10adc3949ba59abbe56e057f20f883e', 'Quang Ngọc Hải', 'Giảng viên', 1, 'Dạy giỏi', 2, '', 903200, 'default.jpg', '2018-12-13', '2020-05-16', NULL),
(48, 'khanhtit132@gmail.com', 'e10adc3949ba59abbe56e057f20f883e', 'Nguyễn Công Hoan', 'Công nhân', 0, 'Là người ham học hỏi', 1, '', 21800, 'default.jpg', '2019-04-02', '2019-04-02', NULL),
(49, 'lethamduong.online@gmail.com', 'e10adc3949ba59abbe56e057f20f883e', 'Lê Thẩm Dương', 'Giáo viên', 1, 'Học vị Tiến Sĩ', 2, '', 460800, 'default.jpg', '2019-04-10', '2019-04-11', NULL),
(50, 'manhhoangvuong@gmail.com', 'e10adc3949ba59abbe56e057f20f883e', 'Vương Mạnh Hoàng ', 'Doanh nhân', 1, 'Chủ 5 doanh nghiệp', 2, '', 191400, 'default.jpg', '2019-04-10', '2019-04-10', NULL),
(51, 'tranganhpham@gmail.com', 'e10adc3949ba59abbe56e057f20f883e', 'Phạm Trang Anh', 'Học sinh cấp 3', 0, 'Đang học tại Cấp 3 Thái Nguyên', 1, '', 0, 'default.jpg', '2019-04-10', '2019-04-10', NULL),
(52, 'quyen.0298@gmail.com', 'e10adc3949ba59abbe56e057f20f883e', 'Phùng Diễm Quyên', 'Sinh viên tại ICTU', 0, 'Học tập và làm việc tại Thái Nguyên', 1, '', 0, 'default.jpg', '2019-04-10', '2019-04-10', NULL),
(53, 'khanhtitictu@gmail.com', 'e10adc3949ba59abbe56e057f20f883e', 'Nông Văn Khánh', 'Administrator', 0, '', 3, '', 0, 'default.jpg', '2019-04-10', '2019-04-10', NULL);

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
-- Indexes for table `coupon`
--
ALTER TABLE `coupon`
  ADD PRIMARY KEY (`id_cp`,`code_cp`);

--
-- Indexes for table `course`
--
ALTER TABLE `course`
  ADD PRIMARY KEY (`id_cs`),
  ADD KEY `id_cate` (`id_cate`),
  ADD KEY `id_cate_2` (`id_cate`),
  ADD KEY `id_user` (`id_user`);

--
-- Indexes for table `episodes_course`
--
ALTER TABLE `episodes_course`
  ADD PRIMARY KEY (`id_ep`),
  ADD KEY `id_cs` (`id_cs`);

--
-- Indexes for table `money_history`
--
ALTER TABLE `money_history`
  ADD PRIMARY KEY (`id_mh`),
  ADD KEY `id_user` (`id_user`);

--
-- Indexes for table `own`
--
ALTER TABLE `own`
  ADD PRIMARY KEY (`id_own`),
  ADD UNIQUE KEY `id_user` (`id_user`,`id_cs`),
  ADD KEY `id_cs` (`id_cs`),
  ADD KEY `id_cp` (`id_cp`);

--
-- Indexes for table `payment_request`
--
ALTER TABLE `payment_request`
  ADD PRIMARY KEY (`id_payreq`),
  ADD KEY `id_user` (`id_user`);

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
  MODIFY `id_chat` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `cart`
--
ALTER TABLE `cart`
  MODIFY `id_gh` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `cmt`
--
ALTER TABLE `cmt`
  MODIFY `id_cmt` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `coupon`
--
ALTER TABLE `coupon`
  MODIFY `id_cp` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `course`
--
ALTER TABLE `course`
  MODIFY `id_cs` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;

--
-- AUTO_INCREMENT for table `episodes_course`
--
ALTER TABLE `episodes_course`
  MODIFY `id_ep` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=215;

--
-- AUTO_INCREMENT for table `money_history`
--
ALTER TABLE `money_history`
  MODIFY `id_mh` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT for table `own`
--
ALTER TABLE `own`
  MODIFY `id_own` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;

--
-- AUTO_INCREMENT for table `payment_request`
--
ALTER TABLE `payment_request`
  MODIFY `id_payreq` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `teacherchat`
--
ALTER TABLE `teacherchat`
  MODIFY `id_chat` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=54;

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
-- Constraints for table `episodes_course`
--
ALTER TABLE `episodes_course`
  ADD CONSTRAINT `episodes_course_ibfk_1` FOREIGN KEY (`id_cs`) REFERENCES `course` (`id_cs`);

--
-- Constraints for table `money_history`
--
ALTER TABLE `money_history`
  ADD CONSTRAINT `money_history_ibfk_1` FOREIGN KEY (`id_user`) REFERENCES `user` (`id_user`);

--
-- Constraints for table `own`
--
ALTER TABLE `own`
  ADD CONSTRAINT `own_ibfk_1` FOREIGN KEY (`id_cs`) REFERENCES `course` (`id_cs`),
  ADD CONSTRAINT `own_ibfk_2` FOREIGN KEY (`id_user`) REFERENCES `user` (`id_user`),
  ADD CONSTRAINT `own_ibfk_3` FOREIGN KEY (`id_cp`) REFERENCES `coupon` (`id_cp`);

--
-- Constraints for table `payment_request`
--
ALTER TABLE `payment_request`
  ADD CONSTRAINT `payment_request_ibfk_1` FOREIGN KEY (`id_user`) REFERENCES `user` (`id_user`);

--
-- Constraints for table `teacherchat`
--
ALTER TABLE `teacherchat`
  ADD CONSTRAINT `teacherchat_ibfk_1` FOREIGN KEY (`id_user`) REFERENCES `user` (`id_user`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
