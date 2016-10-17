-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Oct 17, 2016 at 10:11 AM
-- Server version: 10.1.13-MariaDB
-- PHP Version: 5.6.23

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `core_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `en_categories_posts`
--

CREATE TABLE `en_categories_posts` (
  `id` int(10) UNSIGNED NOT NULL,
  `title` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `alias` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `description` text COLLATE utf8_unicode_ci,
  `note` text COLLATE utf8_unicode_ci,
  `thumbnail` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `parent_id` int(10) DEFAULT '0',
  `sort` int(10) DEFAULT '0',
  `author_create` int(10) DEFAULT NULL,
  `author_update` int(10) DEFAULT NULL,
  `status` tinyint(2) DEFAULT NULL,
  `create_time` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `update_time` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `en_categories_posts`
--

INSERT INTO `en_categories_posts` (`id`, `title`, `alias`, `description`, `note`, `thumbnail`, `parent_id`, `sort`, `author_create`, `author_update`, `status`, `create_time`, `update_time`) VALUES
(1, 'Uncategorized', 'uncategorized', NULL, NULL, NULL, 0, 0, 23, NULL, 1, NULL, NULL),
(2, 'Sports', 'sports', NULL, NULL, NULL, 0, 0, 23, NULL, 1, NULL, NULL),
(3, 'Showbiz', 'showbiz', NULL, NULL, NULL, 0, 0, 23, NULL, 1, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `en_menu`
--

CREATE TABLE `en_menu` (
  `id` int(10) UNSIGNED NOT NULL,
  `title` varchar(255) DEFAULT NULL,
  `alias` varchar(255) DEFAULT NULL,
  `link` varchar(255) DEFAULT NULL,
  `parent_id` int(11) DEFAULT NULL,
  `css_class` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `icon_font` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `status` tinyint(4) DEFAULT '1',
  `id_lang` int(11) DEFAULT NULL,
  `sort` varchar(45) DEFAULT NULL,
  `type` varchar(255) DEFAULT NULL,
  `position` int(10) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `en_menu`
--

INSERT INTO `en_menu` (`id`, `title`, `alias`, `link`, `parent_id`, `css_class`, `icon_font`, `status`, `id_lang`, `sort`, `type`, `position`) VALUES
(263, 'Home', 'home', '#', 0, NULL, NULL, 0, NULL, '0', 'Pages', 1),
(264, 'About', 'about', '#', 0, NULL, NULL, 0, NULL, '1', 'Pages', 1),
(287, 'Product', 'product', '#', 0, NULL, NULL, 0, NULL, '2', 'Pages', 1),
(279, 'Contact', 'contact', '#', 0, NULL, NULL, 0, NULL, '4', 'Pages', 1),
(288, 'News', 'news', '#', 0, NULL, NULL, 0, NULL, '3', 'Pages', 1);

-- --------------------------------------------------------

--
-- Table structure for table `en_pages`
--

CREATE TABLE `en_pages` (
  `id` int(10) UNSIGNED NOT NULL,
  `title` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `alias` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `description` text COLLATE utf8_unicode_ci,
  `content` text COLLATE utf8_unicode_ci,
  `note` text COLLATE utf8_unicode_ci NOT NULL,
  `contact_form` text COLLATE utf8_unicode_ci NOT NULL,
  `old_url` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `thumbnail` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `author_create` int(11) DEFAULT NULL,
  `author_update` int(11) DEFAULT NULL,
  `status` tinyint(2) DEFAULT NULL,
  `create_time` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `update_time` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `en_pages`
--

INSERT INTO `en_pages` (`id`, `title`, `alias`, `description`, `content`, `note`, `contact_form`, `old_url`, `thumbnail`, `author_create`, `author_update`, `status`, `create_time`, `update_time`) VALUES
(1, 'Love Alone', 'love-alone', 'Love Alone', '<p>Love Alone</p>', '', '', NULL, 'dt3.png', 23, NULL, NULL, NULL, NULL),
(2, 'ttttttttttttt', NULL, NULL, '<p>hhhhhhhhhhhhhh</p>', '', '<form action="http://localhost/fwtome/cadmin//lien-he" method="POST" role="form">\r\n				    <div class="row">\r\n				        <div class="col-xs-12 col-md-6">\r\n				            <label for="">Họ và tên</label>\r\n				            <div class="form-group">\r\n				                <input type="text" placeholder="Họ tên" class="form-control" id="" name="name" required="">\r\n				            </div>\r\n\r\n				            <label for="">Số điện thoại</label>\r\n				            <div class="form-group">\r\n				                <input name="phone" placeholder="Số điện thoại" class="form-control" type="text" required="">\r\n				            </div>\r\n\r\n				            <label for="">Email</label>\r\n				            <div class="form-group">\r\n				                <input name="email" placeholder="E-Mail" class="form-control" type="email" required="">\r\n				            </div>\r\n				            <button type="submit" class="btn btn-primary checkout-info-submit-button" name="send_mess">GỬI TIN</button>\r\n				        </div>\r\n\r\n				        <div class="col-xs-12 col-md-6">\r\n				            <label for="">Ghi chú</label>\r\n				            <div class="form-group">\r\n				                <textarea class="form-control" name="mess" placeholder="Nội dung" required=""></textarea>\r\n				            </div>\r\n				        </div>\r\n				    </div>\r\n				</form>', NULL, 'logo-bottom.png', NULL, NULL, NULL, NULL, NULL),
(10, 'nam moi', 'nam-moi', NULL, '<p>Hello</p>\r\n', '', '', 'tieng-anh', '', 23, 23, 1, '1476418051', '1476418743');

-- --------------------------------------------------------

--
-- Table structure for table `en_position_menu`
--

CREATE TABLE `en_position_menu` (
  `id` int(10) UNSIGNED NOT NULL,
  `title` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `status` tinyint(4) DEFAULT NULL,
  `author_create` int(11) DEFAULT NULL,
  `author_update` int(11) DEFAULT NULL,
  `create_time` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `update_time` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `en_position_menu`
--

INSERT INTO `en_position_menu` (`id`, `title`, `status`, `author_create`, `author_update`, `create_time`, `update_time`) VALUES
(1, 'Main menu', 1, 23, NULL, '1475741244', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `en_posts`
--

CREATE TABLE `en_posts` (
  `id` int(10) UNSIGNED NOT NULL,
  `title` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `alias` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `description` text COLLATE utf8_unicode_ci,
  `content` text COLLATE utf8_unicode_ci,
  `cate_id` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `thumbnail` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `tags` text COLLATE utf8_unicode_ci,
  `note` text COLLATE utf8_unicode_ci,
  `author_create` int(11) DEFAULT NULL,
  `author_update` int(11) DEFAULT NULL,
  `status` tinyint(2) DEFAULT NULL,
  `create_time` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `update_time` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `frontend_user`
--

CREATE TABLE `frontend_user` (
  `id` int(10) UNSIGNED NOT NULL,
  `avatar` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL DEFAULT 'thumb.png',
  `firstname` varchar(255) DEFAULT NULL,
  `lastname` varchar(255) DEFAULT NULL,
  `username` varchar(255) DEFAULT NULL,
  `email` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  `address` text,
  `birthday` varchar(100) DEFAULT NULL,
  `phone` varchar(20) NOT NULL,
  `gender` int(1) NOT NULL,
  `about` text CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `job` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `skype` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `facebook` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `twitter` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `github` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `website` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `status` tinyint(1) DEFAULT NULL,
  `ordering` int(11) DEFAULT NULL,
  `create_time` varchar(255) NOT NULL,
  `update_time` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `frontend_user`
--

INSERT INTO `frontend_user` (`id`, `avatar`, `firstname`, `lastname`, `username`, `email`, `password`, `address`, `birthday`, `phone`, `gender`, `about`, `job`, `skype`, `facebook`, `twitter`, `github`, `website`, `status`, `ordering`, `create_time`, `update_time`) VALUES
(24, 'thumb.png', 'Hòa', 'Lê', 'botble', 'hoale@gmail.com', '314567463f70c39ce083523b8530db8f', '701 CT1 Skylight 125D Minh Khai', '862765200', '', 0, '', '', '', '', '', '', '', 1, NULL, '1474624270', '1474624684'),
(32, 'thumb.png', 'ggg', 'hhhh', 'bolexx', 'fsdfsdf@gmail.com', '314567463f70c39ce083523b8530db8f', '701 CT1 Skylight 125D Minh Khai', NULL, '', 0, '', '', '', '', '', '', '', 1, NULL, '1474871739', ''),
(33, 'thumb.png', 'cuong', 'le', 'cuongttt@gmail', 'cuosdfev@gmail.com', '314567463f70c39ce083523b8530db8f', '701 CT1 Skylight 125D Minh Khai', NULL, '', 0, '', '', '', '', '', '', '', 1, NULL, '1474871768', ''),
(34, 'thumb.png', 'bam', 'bo', 'bamboo', 'bamboo@gmail.com', '314567463f70c39ce083523b8530db8f', '701 CT1 Skylight 125D Minh Khai', NULL, '', 0, '', '', '', '', '', '', '', 1, NULL, '1474871804', ''),
(35, 'thumb.png', 'Boott', 'le', 'botttt', 'fddd@gmail.com', '314567463f70c39ce083523b8530db8f', '701 CT1 Skylight 125D Minh Khai', NULL, '', 0, '', '', '', '', '', '', '', 1, NULL, '1474871861', ''),
(37, 'thumb.png', NULL, NULL, 'botble', 'cuongle.dev@gmail.com', '02febdaea6cb9fe17ab0133386c8cb65', NULL, NULL, '', 0, '', '', '', '', '', '', '', 1, NULL, '1476179831', '');

-- --------------------------------------------------------

--
-- Table structure for table `group`
--

CREATE TABLE `group` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `status` tinyint(1) DEFAULT NULL,
  `ordering` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `group`
--

INSERT INTO `group` (`id`, `name`, `status`, `ordering`) VALUES
(1, 'superadmin', 1, NULL),
(2, 'admin', 1, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `online`
--

CREATE TABLE `online` (
  `id` int(10) UNSIGNED NOT NULL,
  `ip` varchar(45) DEFAULT NULL,
  `url` varchar(255) DEFAULT NULL,
  `time` int(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `online`
--

INSERT INTO `online` (`id`, `ip`, `url`, `time`) VALUES
(2, '192.168.226.2', '/php_lab2/useronline.php', 1470848496);

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(10) UNSIGNED NOT NULL,
  `avatar` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL DEFAULT 'thumb.png',
  `firstname` varchar(255) DEFAULT NULL,
  `lastname` varchar(255) DEFAULT NULL,
  `username` varchar(255) DEFAULT NULL,
  `email` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  `address` text,
  `birthday` varchar(100) DEFAULT NULL,
  `phone` varchar(20) NOT NULL,
  `gender` int(1) NOT NULL,
  `about` text CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `job` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `skype` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `facebook` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `twitter` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `github` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `website` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `status` tinyint(1) DEFAULT NULL,
  `ordering` int(11) DEFAULT NULL,
  `group_id` int(11) DEFAULT NULL,
  `create_time` varchar(255) NOT NULL,
  `update_time` varchar(50) NOT NULL,
  `author` int(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `avatar`, `firstname`, `lastname`, `username`, `email`, `password`, `address`, `birthday`, `phone`, `gender`, `about`, `job`, `skype`, `facebook`, `twitter`, `github`, `website`, `status`, `ordering`, `group_id`, `create_time`, `update_time`, `author`) VALUES
(23, 'thumb.png', 'Cường', 'Lê Ngọc', 'cuongle', 'cuongle.dev@gmail.com', '314567463f70c39ce083523b8530db8f', 'Thanh hóa', '1620061200', '0987535656', 0, '', '', '', '', '', '', '', 1, NULL, 1, '1474624112', '1476334080', 23),
(24, 'thumb.png', 'Hòa', 'Lê', 'botble', 'hoale@gmail.com', '314567463f70c39ce083523b8530db8f', '701 CT1 Skylight 125D Minh Khai', '862765200', '', 0, '', '', '', '', '', '', '', 1, NULL, 2, '1474624270', '1474624684', 1),
(32, 'thumb.png', 'ggg', 'hhhh', 'bolexx', 'fsdfsdf@gmail.com', '314567463f70c39ce083523b8530db8f', '701 CT1 Skylight 125D Minh Khai', NULL, '', 0, '', '', '', '', '', '', '', 1, NULL, 1, '1474871739', '', 0),
(33, 'thumb.png', 'cuong', 'le', 'cuongttt@gmail', 'cuosdfev@gmail.com', '314567463f70c39ce083523b8530db8f', '701 CT1 Skylight 125D Minh Khai', NULL, '', 0, '', '', '', '', '', '', '', 1, NULL, 1, '1474871768', '', 0),
(35, 'thumb.png', 'Boott', 'le', 'botttt', 'fddd@gmail.com', '314567463f70c39ce083523b8530db8f', '701 CT1 Skylight 125D Minh Khai', NULL, '', 0, '', '', '', '', '', '', '', 0, NULL, 1, '1474871861', '', 0);

-- --------------------------------------------------------

--
-- Table structure for table `vi_categories_posts`
--

CREATE TABLE `vi_categories_posts` (
  `id` int(10) UNSIGNED NOT NULL,
  `title` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `alias` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `description` text COLLATE utf8_unicode_ci,
  `note` text COLLATE utf8_unicode_ci,
  `thumbnail` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `parent_id` int(10) DEFAULT '0',
  `sort` int(10) DEFAULT '0',
  `author_create` int(10) DEFAULT NULL,
  `author_update` int(10) DEFAULT NULL,
  `status` tinyint(2) DEFAULT NULL,
  `create_time` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `update_time` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `vi_categories_posts`
--

INSERT INTO `vi_categories_posts` (`id`, `title`, `alias`, `description`, `note`, `thumbnail`, `parent_id`, `sort`, `author_create`, `author_update`, `status`, `create_time`, `update_time`) VALUES
(1, 'Chưa phân loại', 'chua-phan-loai', '', '', '', 0, 0, 23, 23, 1, NULL, '1475138868'),
(2, 'Thể thao', 'the-thao', '', '', '', 0, 0, 23, 23, 0, NULL, '1475138886'),
(3, 'Giải trí', 'giai-tri', NULL, NULL, NULL, 0, 0, 23, NULL, 1, NULL, NULL),
(4, 'Giày nữ thời thượng', 'giay-nu-thoi-thuong', 'Giày cao cấp', 'ok', 'dt3.png', 0, 2, 23, 23, 1, '1475136509', '1475139433'),
(5, 'Giày bệt nữ thời thượng', 'giay-bet-nu-thoi-thuong', 'Giày bệt nữ thời thượng', '', '', 4, 0, 23, NULL, 1, '1475138355', NULL),
(6, 'Giày cao guốc thời thượng', 'giay-cao-guoc-thoi-thuong', 'Giày cao guốc thời thượng', '', '', 4, 0, 23, NULL, 1, '1475138456', NULL),
(7, 'Giày nam thời thượng', 'giay-nam-thoi-thuong', 'Giày nam thời thượng', '', 'logo-bottom.png', 0, 0, 23, NULL, 1, '1475139550', NULL),
(8, 'Giày bệt nam thời thượng', 'giay-bet-nam-thoi-thuong', 'Giày bệt nam thời thượng', '', '', 7, 1, 23, NULL, 0, '1475139583', NULL),
(9, 'Giày cao nam thời thượng', 'giay-cao-nam-thoi-thuong', 'Giày cao nam thời thượng', '', '', 7, 0, 23, NULL, 1, '1475139606', NULL),
(13, 'gffdfg', 'gffdfg', 'fdgfdgfdgdfg', '', '', 0, 0, 23, NULL, 1, '1475141738', NULL),
(14, 'jhkjhkjhk', 'jhkjhkjhk', 'hjkhj', '', '', 0, 0, 23, NULL, 1, '1475141744', NULL),
(15, 'hjkhjkhjk', 'hjkhjkhjk', 'bnmnbmbnm', '', '', 0, 0, 23, NULL, 1, '1475141748', NULL),
(16, 'eeeeeeeeeeeeee', 'eeeeeeeeeeeeee', 'fghghgfhfgh', '', '', 5, 0, 23, 23, 1, '1475141752', '1476155408');

-- --------------------------------------------------------

--
-- Table structure for table `vi_menu`
--

CREATE TABLE `vi_menu` (
  `id` int(10) UNSIGNED NOT NULL,
  `title` varchar(255) DEFAULT NULL,
  `alias` varchar(255) DEFAULT NULL,
  `link` varchar(255) DEFAULT NULL,
  `parent_id` int(11) DEFAULT NULL,
  `css_class` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `icon_font` varchar(255) DEFAULT NULL,
  `status` tinyint(4) DEFAULT '1',
  `id_lang` int(11) DEFAULT NULL,
  `sort` varchar(45) DEFAULT NULL,
  `type` varchar(255) DEFAULT NULL,
  `position` int(10) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `vi_menu`
--

INSERT INTO `vi_menu` (`id`, `title`, `alias`, `link`, `parent_id`, `css_class`, `icon_font`, `status`, `id_lang`, `sort`, `type`, `position`) VALUES
(352, 'Liên hệ', NULL, 'http://localhost/fwtome/lien-he.htm', 0, '', NULL, 1, NULL, '4', 'Trang', 1),
(353, 'Giới thiệu', NULL, 'http://localhost/fwtome/gioi-thieu.htm', 0, '', NULL, 1, NULL, '1', 'Trang', 1),
(335, 'Trang Chủ', '', 'http://localhost/fwtome/', 0, '', NULL, 1, NULL, '0', 'Tùy chỉnh liên kết', 1),
(349, 'Mô Hình', NULL, '#', 0, '', NULL, 1, NULL, '2', 'Trang', 1),
(350, 'Mô hình 2', 'mo-hinh-2', '', 349, '', NULL, 1, NULL, '0', 'Tùy chỉnh liên kết', 1),
(351, 'Mô hình 3', 'mo-hinh-3', '', 349, '', NULL, 1, NULL, '1', 'Tùy chỉnh liên kết', 1);

-- --------------------------------------------------------

--
-- Table structure for table `vi_pages`
--

CREATE TABLE `vi_pages` (
  `id` int(10) UNSIGNED NOT NULL,
  `title` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `alias` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `description` text COLLATE utf8_unicode_ci,
  `content` text COLLATE utf8_unicode_ci,
  `note` text COLLATE utf8_unicode_ci NOT NULL,
  `contact_form` text COLLATE utf8_unicode_ci NOT NULL,
  `old_url` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `thumbnail` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `author_create` int(11) DEFAULT NULL,
  `author_update` int(11) DEFAULT NULL,
  `status` tinyint(2) DEFAULT NULL,
  `create_time` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `update_time` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `vi_pages`
--

INSERT INTO `vi_pages` (`id`, `title`, `alias`, `description`, `content`, `note`, `contact_form`, `old_url`, `thumbnail`, `author_create`, `author_update`, `status`, `create_time`, `update_time`) VALUES
(1, 'bai vet 1', 'bai-vet-1', 'Tình đơn côi', '<p>dfgdgdffg</p>', 'dgfdgffdgdfg', '', 'dai-tieu', '', 23, 23, 1, NULL, '1475143054'),
(6, 'Giới thiệu', 'gioi-thieu', NULL, '<h1>Giới thiệu chung về 4G</h1>\r\n\r\n<p><strong>MobiFone thử nghiệm th&agrave;nh c&ocirc;ng c&ocirc;ng nghệ 4G</strong></p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>Từ th&aacute;ng 12/2015 tới nay, MobiFone đ&atilde; thử nghiệm th&agrave;nh c&ocirc;ng c&ocirc;ng nghệ 4G/LTE-A về kỹ thuật nội bộ với 200 thu&ecirc; bao nội bộ. Mạng 4G của MobiFone đạt tốc độ dowload/upload tối đa 225Mbps/75Mbps.</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>Trong qu&aacute; tr&igrave;nh thử nghiệm nội bộ, MobiFone đ&atilde; n&acirc;ng cấp hệ thống cơ sở vật chất, mạng lưới tạo nền m&oacute;ng vững chắc để đưa c&ocirc;ng nghệ mới đến với kh&aacute;ch h&agrave;ng. B&ecirc;n cạnh đ&oacute;, MobiFone cũng ho&agrave;n th&agrave;nh việc đ&aacute;nh gi&aacute; trải nghiệm c&aacute;c dịch vụ mới của 4G/LTE-A với kết quả khả quan.</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>C&ocirc;ng nghệ 4G/LTE-A cung cấp băng th&ocirc;ng rộng hơn, truyền tải dữ liệu nhanh hơn, dung lượng lớn hơn, được đ&aacute;nh gi&aacute; l&agrave; điều kiện l&yacute; tưởng để triển khai c&aacute;c dịch vụ gi&aacute; trị gia tăng hấp dẫn. Ch&iacute;nh v&igrave; vậy, khi triển khai cung cấp c&ocirc;ng nghệ 4G, kh&aacute;c với c&aacute;c nh&agrave; mạng đối thủ, MobiFone sẽ đem lại c&aacute;c dịch vụ nội dung hấp dẫn tr&ecirc;n nền c&ocirc;ng nghệ 4G cho kh&aacute;ch h&agrave;ng như: Trải nghiệm xem c&aacute;c k&ecirc;nh truyền h&igrave;nh AVG, dịch vụ data, SMS, dịch vụ truyền h&igrave;nh Broadcast tr&ecirc;n nền tảng eMBMS, dịch vụ truyền h&igrave;nh Unicast, dịch vụ Video 4K...</p>\r\n\r\n<p>&quot;Cuộc đua&quot; 4G hiện đang bước v&agrave;o giai đoạn nước r&uacute;t, đ&ograve;i hỏi c&aacute;c nh&agrave; mạng khẩn trương ho&agrave;n tất thử nghiệm nhằm r&uacute;t ngắn khoảng c&aacute;ch giữa thực tế v&agrave; l&yacute; thuyết. Kết quả thử nghiệm của MobiFone đ&atilde; vượt qua cột mốc tốc độ đề ra (200Mbps) cho giai đoạn ban đầu chứng tỏ Tổng c&ocirc;ng ty đ&atilde; c&oacute; những bước tiến vững chắc về chất lượng v&agrave; nội dung sản phẩm, dịch vụ tr&ecirc;n nền c&ocirc;ng nghệ mới.</p>\r\n\r\n<p>Thời gian tới, để sớm mang c&ocirc;ng nghệ mới ra thị trường, MobiFone đ&atilde; ho&agrave;n th&agrave;nh c&aacute;c kịch bản kinh doanh với nhiều chương tr&igrave;nh hấp dẫn d&agrave;nh cho kh&aacute;ch h&agrave;ng. Sau khi tối ưu ho&aacute; chất lượng mạng lưới để đảm bảo trải nghiệm người d&ugrave;ng, Tổng c&ocirc;ng ty Viễn th&ocirc;ng MobiFone sẽ đưa dịch vụ 4G/LTE-A cung cấp thử nghiệm trong th&aacute;ng 6 năm 2016 tại H&agrave; Nội, Đ&agrave; Nẵng v&agrave; Tp. Hồ Ch&iacute; Minh.</p>\r\n', 'dfdfd', '', 'gioi-thieu', '', 23, 23, 1, '1475033598', '1476090901'),
(8, 'Bài ca dao', 'bai-ca-dao', NULL, '<p>sdfsdf</p>', '', '', NULL, '', 23, NULL, 0, '1476082133', NULL),
(9, 'Liên hệ', 'lien-he', NULL, '<p><iframe frameborder="0" height="450" src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3725.7969415409234!2d105.79845781536055!3d20.960668186035303!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3135ad215b3d1e2d%3A0xbd6f8ae8d8605262!2zQ1Q2QSBYYSBMYSwgQ-G6p3UgQsawxqF1LCBLaeG6v24gSMawbmcsIFRoYW5oIFRyw6wsIEjDoCBO4buZaSwgVmlldG5hbQ!5e0!3m2!1sen!2s!4v1476087173806" style="border:0" width="100%"></iframe></p>\r\n', '', '<form action="" method="POST" role="form">\r\n				    <div class="row">\r\n				        <div class="col-xs-12 col-md-6">\r\n				            <label for="">Họ và tên</label>\r\n				            <div class="form-group">\r\n				                <input type="text" placeholder="Họ tên" class="form-control" id="" name="name" required="">\r\n				            </div>\r\n\r\n				            <label for="">Số điện thoại</label>\r\n				            <div class="form-group">\r\n				                <input name="phone" placeholder="Số điện thoại" class="form-control" type="text" required="">\r\n				            </div>\r\n\r\n				            <label for="">Email</label>\r\n				            <div class="form-group">\r\n				                <input name="email" placeholder="E-Mail" class="form-control" type="email" required="">\r\n				            </div>\r\n				            <button type="submit" class="btn btn-primary checkout-info-submit-button" name="send_mess">GỬI TIN</button>\r\n				        </div>\r\n\r\n				        <div class="col-xs-12 col-md-6">\r\n				            <label for="">Ghi chú</label>\r\n				            <div class="form-group">\r\n				                <textarea class="form-control" name="mess" placeholder="Nội dung" required=""></textarea>\r\n				            </div>\r\n				        </div>\r\n				    </div>\r\n				</form>', 'lien-he', '', 23, 23, 1, '1476087226', '1476088814'),
(10, 'nam moi', 'nam-moi', NULL, '<p>Xin ch&agrave;o</p>\r\n', '', '', 'chuyen-nho', '', 23, 23, 1, '1476418001', '1476418753');

-- --------------------------------------------------------

--
-- Table structure for table `vi_position_menu`
--

CREATE TABLE `vi_position_menu` (
  `id` int(10) UNSIGNED NOT NULL,
  `title` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `status` tinyint(4) DEFAULT NULL,
  `author_create` int(11) DEFAULT NULL,
  `author_update` int(11) DEFAULT NULL,
  `create_time` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `update_time` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `vi_position_menu`
--

INSERT INTO `vi_position_menu` (`id`, `title`, `status`, `author_create`, `author_update`, `create_time`, `update_time`) VALUES
(1, 'Điều hướng chính', 1, 23, 23, NULL, '1475661429'),
(2, 'Chân trang', 1, 23, 23, '1475661400', '1475661579');

-- --------------------------------------------------------

--
-- Table structure for table `vi_posts`
--

CREATE TABLE `vi_posts` (
  `id` int(10) UNSIGNED NOT NULL,
  `title` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `alias` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `description` text COLLATE utf8_unicode_ci,
  `content` text COLLATE utf8_unicode_ci,
  `cate_id` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `thumbnail` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `tags` text COLLATE utf8_unicode_ci,
  `note` text COLLATE utf8_unicode_ci,
  `author_create` int(11) DEFAULT NULL,
  `author_update` int(11) DEFAULT NULL,
  `status` tinyint(2) DEFAULT NULL,
  `create_time` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `update_time` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `vi_posts`
--

INSERT INTO `vi_posts` (`id`, `title`, `alias`, `description`, `content`, `cate_id`, `thumbnail`, `tags`, `note`, `author_create`, `author_update`, `status`, `create_time`, `update_time`) VALUES
(1, 'bai vet 1', 'bai-viet-1', 'sdfsdf', 'dfgdgdffg', '1', NULL, NULL, NULL, 23, NULL, 1, NULL, NULL),
(2, 'Bài viết số 2', 'bai-viet-so-2', 'hay lắm', '<p><strong>Note:</strong>&nbsp;The implode() function accept its parameters in either order. However, for consistency with&nbsp;<a href=\\"http://www.w3schools.com/php/func_string_explode.asp\\">explode()</a>, you should use the documented order of arguments.</p>\r\n\r\n<p><strong>Note:</strong>&nbsp;The separator parameter of implode() is optional. However, it is recommended to always use two parameters for backwards compatibility.</p>\r\n\r\n<p><strong>Note:</strong>&nbsp;This function is binary-safe.</p>', ',3,', 'dt2_1.png', 'note,hay,tu,te', '', 23, NULL, 1, '1475204145', NULL),
(3, 'Bài viết số 345', 'bai-viet-so-345', 'hay hay', '<p><strong>Note:</strong>&nbsp;The implode() function accept its parameters in either order. However, for consistency with&nbsp;<a href=\\"\\\\\\">explode()</a>, you should use the documented order of arguments.</p>\r\n\r\n<p><strong>Note:</strong>&nbsp;The separator parameter of implode() is optional. However, it is recommended to always use two parameters for backwards compatibility.</p>\r\n\r\n<p><strong>Note:</strong>&nbsp;This function is binary-safe.</p>', ',2,3,4,', 'dt3.png', 'hay,tuyệt', '', 23, 23, 1, '1475204188', '1475207689'),
(4, 'dfgdfg', 'dfgdfg', 'dfgdfg', '', ',1,', '', '', '', 23, NULL, 1, '1476248427', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `web_contacts`
--

CREATE TABLE `web_contacts` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) CHARACTER SET utf8 DEFAULT NULL,
  `phone` varchar(20) COLLATE utf8_unicode_ci DEFAULT NULL,
  `email` varchar(255) CHARACTER SET utf8 DEFAULT NULL,
  `content` text CHARACTER SET utf8,
  `create_time` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `status` tinyint(4) DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `web_contacts`
--

INSERT INTO `web_contacts` (`id`, `name`, `phone`, `email`, `content`, `create_time`, `status`) VALUES
(1, 'Lê Ngọc Cường1', '0981700268', 'cuongle.dev1@gmail.com', 'dsđssddsdsds', '1476508309', 1),
(2, 'Lê Ngọc Cường2', '0981700268', 'cuongle.dev2@gmail.com', 'dđ', '1476512130', 1),
(3, 'Lê Ngọc Cường3', '0981700268', 'cuongleon630@gmail.com', 'dddddddd', '1476512190', 1),
(8, 'Lê Ngọc Cường8', '0981700268', 'cuongle.dev8@gmail.com', 'hghjh', '1476512947', 0),
(12, 'Cường', '0987654321', 'cuosdfev@gmail.com', 'Hey!\r\nXin chào bạn.\r\nTôi muốn hỏi bạn 1 số câu.', '1476679659', 1);

-- --------------------------------------------------------

--
-- Table structure for table `web_options`
--

CREATE TABLE `web_options` (
  `id` int(10) UNSIGNED NOT NULL,
  `pagination_number` int(11) NOT NULL,
  `debug` tinyint(4) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `web_options`
--

INSERT INTO `web_options` (`id`, `pagination_number`, `debug`) VALUES
(1, 2, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `web_settings`
--

CREATE TABLE `web_settings` (
  `id` int(11) NOT NULL,
  `name` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `logo` varchar(255) DEFAULT NULL,
  `slogan` text,
  `icon` varchar(255) DEFAULT NULL,
  `phone` varchar(16) DEFAULT NULL,
  `hotline` varchar(100) NOT NULL,
  `email` varchar(255) DEFAULT NULL,
  `email_support` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `address` text,
  `districtid` varchar(10) NOT NULL,
  `provinceid` varchar(3) NOT NULL,
  `link_facebook` varchar(255) DEFAULT NULL,
  `link_google` varchar(255) DEFAULT NULL,
  `link_youtube` varchar(255) DEFAULT NULL,
  `link_tt` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `seo_title` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `seo_description` text CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `seo_keywords` text CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `google_analytics` text CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `google_site_verification` text CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `bank_user` varchar(255) DEFAULT NULL,
  `bank_code` varchar(100) DEFAULT NULL,
  `bank_name` varchar(255) DEFAULT NULL,
  `bank_chinhanh` varchar(255) DEFAULT NULL,
  `bank_tp` varchar(255) DEFAULT NULL,
  `link_google_map` text,
  `title_sidebar` varchar(255) DEFAULT NULL,
  `content_sidebar` text,
  `contact_thumbnail` text
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `web_settings`
--

INSERT INTO `web_settings` (`id`, `name`, `logo`, `slogan`, `icon`, `phone`, `hotline`, `email`, `email_support`, `address`, `districtid`, `provinceid`, `link_facebook`, `link_google`, `link_youtube`, `link_tt`, `seo_title`, `seo_description`, `seo_keywords`, `google_analytics`, `google_site_verification`, `bank_user`, `bank_code`, `bank_name`, `bank_chinhanh`, `bank_tp`, `link_google_map`, `title_sidebar`, `content_sidebar`, `contact_thumbnail`) VALUES
(2, 'Cuongle', 'logo.png', 'dfgd', '114x114.png', '+84 941 068 949', '+84 941 068 949', 'cuongle.dev@gmail.com', 'cuongle.dev@gmail.com', 'CT6A Xa La, Kiến Hưng, Hanoi, Vietnam', '', '', 'https://fb.com.vn', 'https://google.com.vn', 'https://youtube.com', 'https://twitter.com', 'PHP platform base on Cuongle Framework', 'Cuongle Platform - PHP platform base on Cuongle Framework', 'Cuongle, Cuongle team, Cuongle platform, php platform, php framework, web development', 'UA-42586526-15', 'hs2Js3WGGpf1pzyhUNehvVDSIrmO3XZpm7PggNZECxE', NULL, NULL, NULL, NULL, NULL, 'https://maps.google.com', NULL, NULL, NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `en_categories_posts`
--
ALTER TABLE `en_categories_posts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `en_menu`
--
ALTER TABLE `en_menu`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `en_pages`
--
ALTER TABLE `en_pages`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `en_position_menu`
--
ALTER TABLE `en_position_menu`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `en_posts`
--
ALTER TABLE `en_posts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `frontend_user`
--
ALTER TABLE `frontend_user`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `group`
--
ALTER TABLE `group`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `online`
--
ALTER TABLE `online`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `vi_categories_posts`
--
ALTER TABLE `vi_categories_posts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `vi_menu`
--
ALTER TABLE `vi_menu`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `vi_pages`
--
ALTER TABLE `vi_pages`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `vi_position_menu`
--
ALTER TABLE `vi_position_menu`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `vi_posts`
--
ALTER TABLE `vi_posts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `web_contacts`
--
ALTER TABLE `web_contacts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `web_options`
--
ALTER TABLE `web_options`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `web_settings`
--
ALTER TABLE `web_settings`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `en_categories_posts`
--
ALTER TABLE `en_categories_posts`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `en_menu`
--
ALTER TABLE `en_menu`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=289;
--
-- AUTO_INCREMENT for table `en_pages`
--
ALTER TABLE `en_pages`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
--
-- AUTO_INCREMENT for table `en_position_menu`
--
ALTER TABLE `en_position_menu`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `en_posts`
--
ALTER TABLE `en_posts`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `frontend_user`
--
ALTER TABLE `frontend_user`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=38;
--
-- AUTO_INCREMENT for table `group`
--
ALTER TABLE `group`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `online`
--
ALTER TABLE `online`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;
--
-- AUTO_INCREMENT for table `vi_categories_posts`
--
ALTER TABLE `vi_categories_posts`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;
--
-- AUTO_INCREMENT for table `vi_menu`
--
ALTER TABLE `vi_menu`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=356;
--
-- AUTO_INCREMENT for table `vi_pages`
--
ALTER TABLE `vi_pages`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
--
-- AUTO_INCREMENT for table `vi_position_menu`
--
ALTER TABLE `vi_position_menu`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `vi_posts`
--
ALTER TABLE `vi_posts`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `web_contacts`
--
ALTER TABLE `web_contacts`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
--
-- AUTO_INCREMENT for table `web_options`
--
ALTER TABLE `web_options`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `web_settings`
--
ALTER TABLE `web_settings`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
