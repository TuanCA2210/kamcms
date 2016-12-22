-- phpMyAdmin SQL Dump
-- version 4.6.5.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Dec 22, 2016 at 06:03 PM
-- Server version: 5.5.50-MariaDB
-- PHP Version: 5.6.14

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
-- Table structure for table `en_banner_images`
--

CREATE TABLE `en_banner_images` (
  `id` int(10) UNSIGNED NOT NULL,
  `title` varchar(255) DEFAULT NULL,
  `alias` varchar(255) DEFAULT NULL,
  `description` text CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `link` varchar(255) DEFAULT '',
  `images` varchar(255) DEFAULT NULL,
  `note` text,
  `create_time` varchar(255) DEFAULT NULL,
  `update_time` varchar(255) DEFAULT NULL,
  `author_create` int(10) DEFAULT NULL,
  `author_update` int(10) DEFAULT NULL,
  `sort` tinyint(4) UNSIGNED DEFAULT '0',
  `status` tinyint(4) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `en_banner_images`
--

INSERT INTO `en_banner_images` (`id`, `title`, `alias`, `description`, `link`, `images`, `note`, `create_time`, `update_time`, `author_create`, `author_update`, `sort`, `status`) VALUES
(18, 'Offline Facebook: Lột trần bí mật quảng cáo Facebook', NULL, '																																												 Offline SEO 2016: Lột trần vũ khí bí mật SEO 2016 																																																					', '#', '', NULL, '1463451184', NULL, 23, NULL, 3, 1),
(27, 'Offline Facebook: Lột trần bí mật quảng cáo Facebook', NULL, '																																												Offline SEO 2016: Lột trần vũ khí bí mật SEO 2016 																																																									', '#', '', NULL, '1463641029', NULL, 23, NULL, 6, 1),
(28, 'Offline Facebook: Lột trần bí mật quảng cáo Facebook', NULL, '																																												Offline SEO 2016: Lột trần vũ khí bí mật SEO 2016 																																																					', '#', '', NULL, '1463641185', NULL, 23, NULL, 7, 1),
(29, 'Offline Facebook: Lột trần bí mật quảng cáo Facebook', NULL, '																																	Offline SEO 2016: Lột trần vũ khí bí mật SEO 2016 																																										', '#', '', NULL, '1463642269', NULL, 23, NULL, 0, 1),
(30, 'Offline Facebook: Lột trần bí mật quảng cáo Facebook', NULL, '																																	Offline SEO 2016: Lột trần vũ khí bí mật SEO 2016 																																										', '#', '', NULL, '1465958007', NULL, 23, NULL, 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `en_brand`
--

CREATE TABLE `en_brand` (
  `id` int(11) UNSIGNED NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `alias` varchar(255) DEFAULT NULL,
  `background` varchar(255) DEFAULT NULL,
  `icon` varchar(255) DEFAULT NULL,
  `avatar` varchar(255) DEFAULT NULL,
  `info` text,
  `sort` smallint(5) UNSIGNED DEFAULT NULL,
  `status` tinyint(1) UNSIGNED DEFAULT '1',
  `meta_title` varchar(255) DEFAULT NULL,
  `meta_keyword` varchar(255) DEFAULT NULL,
  `meta_description` text,
  `create_time` int(11) UNSIGNED DEFAULT NULL,
  `create_author` bigint(20) UNSIGNED DEFAULT NULL,
  `update_time` int(11) UNSIGNED DEFAULT NULL,
  `update_author` bigint(20) UNSIGNED DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

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
-- Table structure for table `en_category`
--

CREATE TABLE `en_category` (
  `id` int(11) UNSIGNED NOT NULL,
  `parent_id` int(11) UNSIGNED DEFAULT '0',
  `title` varchar(255) DEFAULT NULL,
  `alias` varchar(255) DEFAULT NULL,
  `description` text CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `background` varchar(255) DEFAULT NULL,
  `icon` varchar(255) DEFAULT NULL,
  `avatar` varchar(255) DEFAULT NULL,
  `show_home` tinyint(1) UNSIGNED DEFAULT '0',
  `info` text,
  `number_home` tinyint(5) UNSIGNED DEFAULT '0' COMMENT 'số lượng sản phẩm hiển thị ở trang chủ',
  `sort` smallint(5) UNSIGNED DEFAULT NULL,
  `status` tinyint(1) UNSIGNED DEFAULT '1',
  `number_product` smallint(5) UNSIGNED DEFAULT '0' COMMENT 'số lượng sản phẩm thuộc danh mục',
  `meta_title` varchar(255) DEFAULT NULL,
  `meta_keyword` varchar(255) DEFAULT NULL,
  `meta_description` text,
  `note` text CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `create_time` int(11) UNSIGNED DEFAULT NULL,
  `create_author` bigint(20) UNSIGNED DEFAULT NULL,
  `update_time` int(11) UNSIGNED DEFAULT NULL,
  `update_author` bigint(20) UNSIGNED DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `en_comments_posts`
--

CREATE TABLE `en_comments_posts` (
  `id` int(10) UNSIGNED NOT NULL,
  `username` varchar(255) CHARACTER SET utf8 DEFAULT NULL,
  `email` varchar(255) CHARACTER SET utf8 DEFAULT NULL,
  `content` text CHARACTER SET utf8,
  `post_id` int(11) DEFAULT NULL,
  `create_time` varchar(20) COLLATE utf8_unicode_ci DEFAULT NULL,
  `status` tinyint(4) DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `en_manager_view_home`
--

CREATE TABLE `en_manager_view_home` (
  `id` int(10) NOT NULL,
  `title` varchar(255) CHARACTER SET utf8 DEFAULT NULL,
  `content` longtext CHARACTER SET utf8,
  `type` varchar(255) CHARACTER SET utf8 DEFAULT NULL,
  `position` int(11) DEFAULT '0',
  `status` tinyint(4) DEFAULT '0',
  `create_author` int(11) DEFAULT NULL,
  `create_time` varchar(255) CHARACTER SET utf8 DEFAULT NULL,
  `update_author` int(11) DEFAULT NULL,
  `update_time` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

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
(2, 'ttttttttttttt', NULL, NULL, '<p>hhhhhhhhhhhhhh</p>', '', '<form action=\"http://localhost/fwtome/cadmin//lien-he\" method=\"POST\" role=\"form\">\\r\\n				    <div class=\"row\">\\r\\n				        <div class=\"col-xs-12 col-md-6\">\\r\\n				            <label for=\"\">Họ và tên</label>\\r\\n				            <div class=\"form-group\">\\r\\n				                <input type=\"text\" placeholder=\"Họ tên\" class=\"form-control\" id=\"\" name=\"name\" required=\"\">\\r\\n				            </div>\\r\\n\\r\\n				            <label for=\"\">Số điện thoại</label>\\r\\n				            <div class=\"form-group\">\\r\\n				                <input name=\"phone\" placeholder=\"Số điện thoại\" class=\"form-control\" type=\"text\" required=\"\">\\r\\n				            </div>\\r\\n\\r\\n				            <label for=\"\">Email</label>\\r\\n				            <div class=\"form-group\">\\r\\n				                <input name=\"email\" placeholder=\"E-Mail\" class=\"form-control\" type=\"email\" required=\"\">\\r\\n				            </div>\\r\\n				            <button type=\"submit\" class=\"btn btn-primary checkout-info-submit-button\" name=\"send_mess\">GỬI TIN</button>\\r\\n				        </div>\\r\\n\\r\\n				        <div class=\"col-xs-12 col-md-6\">\\r\\n				            <label for=\"\">Ghi chú</label>\\r\\n				            <div class=\"form-group\">\\r\\n				                <textarea class=\"form-control\" name=\"mess\" placeholder=\"Nội dung\" required=\"\"></textarea>\\r\\n				            </div>\\r\\n				        </div>\\r\\n				    </div>\\r\\n				</form>', NULL, 'logo-bottom.png', NULL, NULL, NULL, NULL, NULL),
(10, 'nam moi', 'nam-moi', NULL, '<p>Hello</p>\\r\\n', '', '', 'tieng-anh', '', 23, 23, 1, '1476418051', '1476418743');

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
-- Table structure for table `en_product_basic`
--

CREATE TABLE `en_product_basic` (
  `id` int(11) UNSIGNED NOT NULL,
  `category` char(255) DEFAULT NULL,
  `name` varchar(255) DEFAULT NULL,
  `alias` varchar(255) DEFAULT NULL,
  `code` char(20) DEFAULT NULL COMMENT 'mã sản phẩm',
  `unit` char(20) DEFAULT NULL COMMENT 'đơn vị tính',
  `price` varchar(255) NOT NULL DEFAULT '0',
  `price_market` varchar(255) NOT NULL DEFAULT '0' COMMENT 'giá thị trường',
  `saleoff` int(11) DEFAULT NULL,
  `time_start` int(11) UNSIGNED DEFAULT NULL COMMENT 'thời gian bắt đầu khuyến mãi',
  `time_end` int(11) UNSIGNED DEFAULT NULL COMMENT 'thời gian kết thúc khuyến mãi',
  `number_repeat` smallint(5) UNSIGNED NOT NULL DEFAULT '0' COMMENT 'số lần lặp lại khuyến mãi',
  `status_size` tinyint(1) UNSIGNED NOT NULL DEFAULT '0' COMMENT 'tình trạng size, nếu có thì join sang bảng size',
  `status_vat` tinyint(1) UNSIGNED NOT NULL DEFAULT '0' COMMENT '0: không hiển thị tình trạng, 1: có VAT, 2: chưa có VAT',
  `status` tinyint(1) UNSIGNED DEFAULT '1',
  `state` char(50) DEFAULT '' COMMENT '1: nổi bật, 2: sắp về, 3: Hàng mới, 4: cũ, 5: hết hàng',
  `quantity` smallint(5) UNSIGNED NOT NULL DEFAULT '0',
  `quantity_shop` text COMMENT 'số lượng theo từng shop',
  `other_info` text,
  `short_info` text NOT NULL COMMENT 'đặc tính sản phẩm',
  `number_payment` smallint(5) UNSIGNED NOT NULL DEFAULT '0' COMMENT 'lượt mua',
  `view` smallint(5) UNSIGNED NOT NULL DEFAULT '0' COMMENT 'lượt xem',
  `type` char(50) DEFAULT '' COMMENT 'loại sản phẩm',
  `sort` smallint(5) UNSIGNED DEFAULT NULL,
  `create_time` int(11) UNSIGNED DEFAULT NULL,
  `create_author` bigint(20) UNSIGNED DEFAULT NULL,
  `update_time` int(11) UNSIGNED DEFAULT NULL,
  `update_author` bigint(20) UNSIGNED DEFAULT NULL,
  `image` varchar(255) DEFAULT NULL,
  `color` text COMMENT 'lưu dưới dạng json',
  `id_group_color` int(11) UNSIGNED NOT NULL DEFAULT '0',
  `properties` varchar(255) DEFAULT NULL,
  `brand` varchar(255) DEFAULT NULL,
  `supplier` varchar(255) DEFAULT NULL COMMENT 'Nhà cung cấp',
  `time_post` int(11) UNSIGNED NOT NULL DEFAULT '0' COMMENT 'hẹn giờ đăng',
  `number_refresh` int(5) UNSIGNED NOT NULL DEFAULT '0' COMMENT 'số lần làm mới',
  `file_download` text,
  `time_interval_refesh` int(5) UNSIGNED DEFAULT '0' COMMENT 'khoảng thời gian làm mới',
  `time_refresh` time DEFAULT NULL COMMENT 'thời gian làm mới',
  `length_class` varchar(256) DEFAULT NULL,
  `weigh_class` varchar(256) DEFAULT NULL,
  `link_` varchar(255) DEFAULT NULL,
  `sale_time_start` int(10) DEFAULT NULL,
  `sale_time_end` int(10) DEFAULT NULL,
  `youtube_link` varchar(255) DEFAULT NULL,
  `note` text CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `status_feature` tinyint(4) NOT NULL DEFAULT '0' COMMENT 'Check status này để xuất hiện ngoài trang chủ(Sản phẩm nổi bật)	'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `en_product_detail`
--

CREATE TABLE `en_product_detail` (
  `id` int(11) UNSIGNED NOT NULL,
  `id_product` int(11) UNSIGNED NOT NULL,
  `full_info` text,
  `tags` varchar(255) DEFAULT NULL,
  `id_field` int(11) UNSIGNED DEFAULT '0',
  `form_field` text,
  `form_default` tinyint(1) UNSIGNED DEFAULT '1' COMMENT '1: form default, 0: form custom',
  `meta_title` varchar(255) DEFAULT NULL,
  `meta_keyword` varchar(255) DEFAULT NULL,
  `meta_description` text,
  `related_product` text
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `en_product_image`
--

CREATE TABLE `en_product_image` (
  `id` int(11) UNSIGNED NOT NULL,
  `id_product` int(11) UNSIGNED NOT NULL DEFAULT '0',
  `avatar` varchar(255) NOT NULL DEFAULT '0',
  `image` text
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

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
(23, 'thumb.png', 'Cường', 'Lê Ngọc', 'cuongle', 'cuongle.dev@gmail.com', '045f4e486371d2fe4d86b5cbb6f134db', 'Thanh hóa', '1620061200', '0987535656', 0, '', '', '', '', '', '', '', 1, NULL, 1, '1474624112', '1476334080', 23),
(37, 'thumb.png', 'cuòn', 'le', 'cuongleon630', 'cuongleon630@gmail.com', '314567463f70c39ce083523b8530db8f', 'ha', NULL, '', 0, '', '', '', '', '', '', '', 1, NULL, 1, '1479065376', '', 0);

-- --------------------------------------------------------

--
-- Table structure for table `vi_banner_images`
--

CREATE TABLE `vi_banner_images` (
  `id` int(10) UNSIGNED NOT NULL,
  `title` varchar(255) DEFAULT NULL,
  `alias` varchar(255) DEFAULT NULL,
  `description` text CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `link` varchar(255) DEFAULT '',
  `images` varchar(255) DEFAULT NULL,
  `note` text,
  `create_time` varchar(255) DEFAULT NULL,
  `update_time` varchar(255) DEFAULT NULL,
  `author_create` int(10) DEFAULT NULL,
  `author_update` int(10) DEFAULT NULL,
  `sort` tinyint(4) UNSIGNED DEFAULT '0',
  `status` tinyint(4) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `vi_banner_images`
--

INSERT INTO `vi_banner_images` (`id`, `title`, `alias`, `description`, `link`, `images`, `note`, `create_time`, `update_time`, `author_create`, `author_update`, `sort`, `status`) VALUES
(18, 'Mua b&igrave;nh n&oacute;ng lạnh', 'mua-b-igrave-nh-n-oacute-ng-lanh', '			                        				                        				                        				                        				                        				                        																																									Offline SEO 2016: Lột trần vũ kh&iacute; b&iacute; mật SEO 2016 																																																								                        			                        			                        			                        			                        			                        ', '#', 'products/bannes/ngang-1478885156001-1-0-501-800-crop-1478885282958.jpg', '			                        				                        				                        				                        	OK                      				                        				                        			                        			                        			                        			                        			                        ', '1463451184', '1479048338', 23, 23, 3, 1),
(27, 'Khuyến m&atilde;i', 'khuyen-m-atilde-i', '			                        				                        				                        				                        				                        																																									Offline SEO 2016: Lột trần vũ kh&iacute; b&iacute; mật SEO 2016 																																																								                        			                        			                        			                        			                        ', '#', 'huhu.jpg', '			                        				                        				                        	OK                      				                        				                        			                        			                        			                        			                        ', '1463641029', '1477543775', 23, 23, 6, 1),
(28, 'Bộ d&acirc;y c&aacute;p nước', 'bo-d-acirc-y-c-aacute-p-nuoc', '			                        				                        				                        				                        																																									Offline SEO 2016: Lột trần vũ kh&iacute; b&iacute; mật SEO 2016 																																																								                        			                        			                        			                        ', '#', 'huhu.jpg', '			                        				                        	OK                      				                        				                        			                        			                        			                        ', '1463641185', '1477543835', 23, 23, 7, 1),
(29, 'Mua b&igrave;nh n&oacute;ng lạnh', 'mua-b-igrave-nh-n-oacute-ng-lanh', '			                        				                        				                        																																									Offline SEO 2016: Lột trần vũ kh&iacute; b&iacute; mật SEO 2016 																																																								                        			                        			                        ', '#', 'chovui.png', '			                        	OK                      				                        				                        			                        			                        ', '1463642269', '1477543586', 23, 23, 0, 1);

-- --------------------------------------------------------

--
-- Table structure for table `vi_brand`
--

CREATE TABLE `vi_brand` (
  `id` int(11) UNSIGNED NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `alias` varchar(255) DEFAULT NULL,
  `background` varchar(255) DEFAULT NULL,
  `icon` varchar(255) DEFAULT NULL,
  `avatar` varchar(255) DEFAULT NULL,
  `info` text,
  `sort` smallint(5) UNSIGNED DEFAULT NULL,
  `status` tinyint(1) UNSIGNED DEFAULT '1',
  `meta_title` varchar(255) DEFAULT NULL,
  `meta_keyword` varchar(255) DEFAULT NULL,
  `meta_description` text,
  `create_time` int(11) UNSIGNED DEFAULT NULL,
  `create_author` bigint(20) UNSIGNED DEFAULT NULL,
  `update_time` int(11) UNSIGNED DEFAULT NULL,
  `update_author` bigint(20) UNSIGNED DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `vi_brand`
--

INSERT INTO `vi_brand` (`id`, `name`, `alias`, `background`, `icon`, `avatar`, `info`, `sort`, `status`, `meta_title`, `meta_keyword`, `meta_description`, `create_time`, `create_author`, `update_time`, `update_author`) VALUES
(1, 'Zalora', 'zalora', NULL, NULL, NULL, NULL, NULL, 1, NULL, NULL, NULL, NULL, 23, NULL, NULL),
(2, 'FOREVER 21', 'forevar21', NULL, NULL, NULL, NULL, NULL, 1, NULL, NULL, NULL, NULL, 23, NULL, NULL),
(3, 'Durango', NULL, NULL, NULL, NULL, NULL, NULL, 1, NULL, NULL, NULL, 1480630679, 23, NULL, NULL),
(4, 'NEM', 'nem', NULL, NULL, NULL, NULL, NULL, 1, NULL, NULL, NULL, 1480631195, 23, NULL, NULL),
(5, 'Faction', 'faction', NULL, NULL, NULL, NULL, NULL, 1, NULL, NULL, NULL, 1480631242, 23, NULL, NULL);

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
(1, 'Chưa phân loại', 'chua-phan-loai', '', '', 'products/banner1.png', 0, 0, 23, 23, 1, NULL, '1479053363'),
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
-- Table structure for table `vi_category`
--

CREATE TABLE `vi_category` (
  `id` int(11) UNSIGNED NOT NULL,
  `parent_id` int(11) UNSIGNED DEFAULT '0',
  `title` varchar(255) DEFAULT NULL,
  `alias` varchar(255) DEFAULT NULL,
  `description` text CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `background` varchar(255) DEFAULT NULL,
  `icon` varchar(255) DEFAULT NULL,
  `avatar` varchar(255) DEFAULT NULL,
  `show_home` tinyint(1) UNSIGNED DEFAULT '0',
  `info` text,
  `number_home` tinyint(5) UNSIGNED DEFAULT '0' COMMENT 'số lượng sản phẩm hiển thị ở trang chủ',
  `sort` smallint(5) UNSIGNED DEFAULT NULL,
  `status` tinyint(1) UNSIGNED DEFAULT '1',
  `number_product` smallint(5) UNSIGNED DEFAULT '0' COMMENT 'số lượng sản phẩm thuộc danh mục',
  `meta_title` varchar(255) DEFAULT NULL,
  `meta_keyword` varchar(255) DEFAULT NULL,
  `meta_description` text,
  `note` text CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `create_time` int(11) UNSIGNED DEFAULT NULL,
  `create_author` bigint(20) UNSIGNED DEFAULT NULL,
  `update_time` int(11) UNSIGNED DEFAULT NULL,
  `update_author` bigint(20) UNSIGNED DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `vi_category`
--

INSERT INTO `vi_category` (`id`, `parent_id`, `title`, `alias`, `description`, `background`, `icon`, `avatar`, `show_home`, `info`, `number_home`, `sort`, `status`, `number_product`, `meta_title`, `meta_keyword`, `meta_description`, `note`, `create_time`, `create_author`, `update_time`, `update_author`) VALUES
(81, 0, 'THỜI TRANG NỮ', 'thoi-trang-nu', 'Đây là thời trang nữ', NULL, NULL, 'category-product/dREVtI_simg_70aaf2_700x700_maxb.jpg', 1, '', 0, 1, 1, 0, 'THỜI TRANG NỮ', 'thời trang nữ', 'Đây là thời trang nữ', '', 1425610576, 23, 1479410776, 23),
(82, 0, 'THỜI TRANG CHO PHÁI MẠNH', 'thoi-trang-cho-phai-manh', 'Đây là thơi trang cho phái mạnh.', NULL, NULL, 'category-product/71c60f_simg_81f506_180x180_maxb.jpg', 1, '', 0, 2, 1, 0, 'THỜI TRANG CHO PHÁI MẠNH', 'thời trang phái mạnh', 'Đây là thơi trang cho phái mạnh.', '', 1425610619, 23, 1479410958, 23),
(83, 0, 'GIÀY DÉP', 'giay-dep', 'Giày dép', NULL, NULL, 'category-product/NqQ9eJ_simg_63a662_340x340_maxb.jpg', 1, '', 0, 3, 1, 0, 'GIÀY DÉP', 'Giày dép', 'Giày dép', '', 1425610727, 23, 1479411116, 23),
(94, 81, 'ÁO NỮ', 'ao-nu', 'Áo nữ', NULL, NULL, 'category-product/iJxeG8_simg_70aaf2_700x700_maxb.jpg', 1, '', 0, 0, 1, 0, 'ÁO NỮ', 'Áo nữ', 'Áo nữ', '', 1426135878, 23, 1479411223, 23),
(95, 81, 'ĐẦM, VÁY', 'dam-vay', 'Đầm váy', NULL, NULL, 'category-product/dREVtI_simg_70aaf2_700x700_maxb.jpg', 1, '', 0, 0, 1, 0, 'ĐẦM, VÁY', 'Đầm váy', 'Đầm váy', '', 1426135982, 23, 1479411327, 23),
(96, 81, 'CHÂN VÁY', 'chan-vay', 'Chân váy', NULL, NULL, 'category-product/tLp6la_simg_739c92_762-762-0-0_cropf_simg_70aaf2_700x700_maxb.jpg', 1, '', 0, 0, 1, 0, 'CHÂN VÁY', 'Chân váy', 'Chân váy', '', 1426136035, 23, 1479412848, 23),
(97, 81, 'QUẦN NỮ', 'quan-nu', 'Quần nữ', NULL, NULL, 'category-product/0BwXOE_simg_b5529c_250x250_maxb.jpg', 1, '', 0, 0, 1, 0, 'QUẦN NỮ', 'Quần nữ', 'Quần nữ', '', 1426136057, 23, 1479412921, 23),
(98, 81, 'GIÀY, DÉP NỮ', 'giay-dep-nu', 'Giày dép nữ', NULL, NULL, 'category-product/b50p7u_simg_b5529c_250x250_maxb.jpg', 1, '', 0, 0, 1, 0, 'GIÀY, DÉP NỮ', 'Giày dép nữ', 'Giày dép nữ', '', 1426136080, 23, 1479415086, 23),
(99, 0, 'PHỤ KIỆN', 'phu-kien', 'Phụ kiện', NULL, NULL, 'category-product/1IriDP_simg_b5529c_250x250_maxb.jpg', 1, '', 0, 0, 1, 0, 'PHỤ KIỆN', 'Phụ kiện', 'Phụ kiện', '', 1426136100, 23, 1479415144, 23),
(100, 81, 'TRANG SỨC', 'trang-suc', 'Trang sức', NULL, NULL, 'category-product/krrTyN_simg_b5529c_250x250_maxb.jpg', 1, '', 0, 0, 1, 0, 'TRANG SỨC', 'Trang sức', 'Trang sức', '', 1426136140, 23, 1479415203, 23),
(101, 81, 'TRANG PHỤC CƯỚI', 'trang-phuc-cuoi', 'Trang phục cưới', 'chovui.png', NULL, 'category-product/01_copy3.jpg', 1, '', 0, 0, 1, 0, 'TRANG PHỤC CƯỚI', 'Trang phục cưới', 'Trang phục cưới', 'abc', 1426136159, 23, 1479505726, 23);

-- --------------------------------------------------------

--
-- Table structure for table `vi_comments_posts`
--

CREATE TABLE `vi_comments_posts` (
  `id` int(10) UNSIGNED NOT NULL,
  `username` varchar(255) CHARACTER SET utf8 DEFAULT NULL,
  `email` varchar(255) CHARACTER SET utf8 DEFAULT NULL,
  `content` text CHARACTER SET utf8,
  `post_id` int(11) DEFAULT NULL,
  `create_time` varchar(20) COLLATE utf8_unicode_ci DEFAULT NULL,
  `status` tinyint(4) DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `vi_comments_posts`
--

INSERT INTO `vi_comments_posts` (`id`, `username`, `email`, `content`, `post_id`, `create_time`, `status`) VALUES
(15, 'cuongle.dev', 'cuongle.dev@gmail.com', 'Hay lắm.', 1, '1477389955', 1),
(16, 'Lê Ngọc Cường', 'cuongleon630@gmail.com', 'Bài viết hay không chê vào đâu được.', 1, '1477390076', 1),
(17, 'RocioXRuma', 'rocioxruma@mail.ru', 'Hi! Where I can download the XRumer 12? This URL is not working - http://freecheapxrumer.com/ :(', 1, '1480724688', 0),
(18, 'MaryMJ', 'marymarkova@gmail.com', 'Hello! My name is MaryMarkova, our compane need to advertise on your website. What is your prices? Thank you. Best regards, Mary.', 1, '1481988445', 0),
(19, 'AnnaMJ', 'annamarkova@gmail.com', 'Hello! My name is AnnaMarkova, our company need to advertise on your website. What is your prices? Thank you. Best regards, Mary.', 1, '1482066164', 0),
(20, 'Melindahag', 'melindaDiuck@gmail.com', 'Hello) \\r\\nXRumer16.0 is coming soon \\r\\nGood luck!', 1, '1482165789', 0);

-- --------------------------------------------------------

--
-- Table structure for table `vi_manager_view_home`
--

CREATE TABLE `vi_manager_view_home` (
  `id` int(10) NOT NULL,
  `title` varchar(255) CHARACTER SET utf8 DEFAULT NULL,
  `content` longtext CHARACTER SET utf8,
  `type` varchar(255) CHARACTER SET utf8 DEFAULT NULL,
  `position` int(11) DEFAULT '0',
  `status` tinyint(4) DEFAULT '0',
  `create_author` int(11) DEFAULT NULL,
  `create_time` varchar(255) CHARACTER SET utf8 DEFAULT NULL,
  `update_author` int(11) DEFAULT NULL,
  `update_time` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `vi_manager_view_home`
--

INSERT INTO `vi_manager_view_home` (`id`, `title`, `content`, `type`, `position`, `status`, `create_author`, `create_time`, `update_author`, `update_time`) VALUES
(5, 'NEW ARRIVALS', '[{\"id\":26,\"category\":\",81,94,95,96,97,\",\"name\":\"Model Ch\\u1ea5t\",\"alias\":\"model-chat\",\"code\":\"MD21\",\"unit\":null,\"price\":\"1100000\",\"price_market\":\"0\",\"saleoff\":0,\"time_start\":0,\"time_end\":0,\"number_repeat\":0,\"status_size\":0,\"status_vat\":0,\"status\":1,\"state\":\"|1|\",\"quantity\":0,\"quantity_shop\":null,\"other_info\":\"[{\\\"title\\\":\\\"\\\",\\\"content\\\":\\\"\\\"}]\",\"short_info\":\"Lorem ipsum dolor sit amet, consectetur adipisicing elit. Officiis est ipsum soluta ducimus enim, perferendis rem sint similique amet, aspernatur quod repellendus dolor quas eveniet. Nisi odio inventore at ipsa.\",\"number_payment\":0,\"view\":0,\"type\":\"\",\"sort\":null,\"create_time\":1482006216,\"create_author\":23,\"update_time\":1482308489,\"update_author\":23,\"image\":\"products\\/model4.jpg\",\"color\":null,\"id_group_color\":0,\"properties\":null,\"brand\":\"\",\"supplier\":null,\"time_post\":0,\"number_refresh\":0,\"file_download\":null,\"time_interval_refesh\":0,\"time_refresh\":null,\"length_class\":null,\"weigh_class\":null,\"link_\":null,\"sale_time_start\":null,\"sale_time_end\":null,\"youtube_link\":null,\"note\":\"\",\"status_feature\":0},{\"id\":25,\"category\":\",81,94,95,96,97,\",\"name\":\"\\u00c1o so deep\",\"alias\":\"ao-so-deep\",\"code\":\"AB323\",\"unit\":null,\"price\":\"950000\",\"price_market\":\"0\",\"saleoff\":0,\"time_start\":0,\"time_end\":0,\"number_repeat\":0,\"status_size\":0,\"status_vat\":0,\"status\":1,\"state\":\"|1|\",\"quantity\":0,\"quantity_shop\":null,\"other_info\":\"[{\\\"title\\\":\\\"ghjghj\\\",\\\"content\\\":\\\"ghjghj\\\"},{\\\"title\\\":\\\"ghjghj\\\",\\\"content\\\":\\\"ghjghj\\\"}]\",\"short_info\":\"Lorem ipsum dolor sit amet, consectetur adipisicing elit. Officiis est ipsum soluta ducimus enim, perferendis rem sint similique amet, aspernatur quod repellendus dolor quas eveniet. Nisi odio inventore at ipsa.\",\"number_payment\":0,\"view\":0,\"type\":\"\",\"sort\":null,\"create_time\":1482006166,\"create_author\":23,\"update_time\":1482308479,\"update_author\":23,\"image\":\"products\\/model5.jpg\",\"color\":null,\"id_group_color\":0,\"properties\":null,\"brand\":\"|1|\",\"supplier\":null,\"time_post\":0,\"number_refresh\":0,\"file_download\":null,\"time_interval_refesh\":0,\"time_refresh\":null,\"length_class\":null,\"weigh_class\":null,\"link_\":null,\"sale_time_start\":null,\"sale_time_end\":null,\"youtube_link\":null,\"note\":\"\",\"status_feature\":0},{\"id\":24,\"category\":\",81,94,95,\",\"name\":\"V\\u00e1y hoa\",\"alias\":\"vay-hoa\",\"code\":\"VH01\",\"unit\":null,\"price\":\"800000\",\"price_market\":\"0\",\"saleoff\":0,\"time_start\":0,\"time_end\":0,\"number_repeat\":0,\"status_size\":0,\"status_vat\":0,\"status\":1,\"state\":\"|3|\",\"quantity\":0,\"quantity_shop\":null,\"other_info\":\"[{\\\"title\\\":\\\"\\\",\\\"content\\\":\\\"\\\"}]\",\"short_info\":\"Lorem ipsum dolor sit amet, consectetur adipisicing elit. Officiis est ipsum soluta ducimus enim, perferendis rem sint similique amet, aspernatur quod repellendus dolor quas eveniet. Nisi odio inventore at ipsa.\",\"number_payment\":0,\"view\":0,\"type\":\"\",\"sort\":null,\"create_time\":1482006064,\"create_author\":23,\"update_time\":1482308468,\"update_author\":23,\"image\":\"products\\/model6.jpg\",\"color\":null,\"id_group_color\":0,\"properties\":null,\"brand\":\"|1|\",\"supplier\":null,\"time_post\":0,\"number_refresh\":0,\"file_download\":null,\"time_interval_refesh\":0,\"time_refresh\":null,\"length_class\":null,\"weigh_class\":null,\"link_\":null,\"sale_time_start\":null,\"sale_time_end\":null,\"youtube_link\":null,\"note\":\"\",\"status_feature\":0},{\"id\":21,\"category\":\",81,95,\",\"name\":\"\\u00c1o deep 221\",\"alias\":\"ao-deep-221\",\"code\":\"DRC221\",\"unit\":null,\"price\":\"580000\",\"price_market\":\"0\",\"saleoff\":0,\"time_start\":0,\"time_end\":0,\"number_repeat\":0,\"status_size\":0,\"status_vat\":0,\"status\":1,\"state\":\"|3|\",\"quantity\":0,\"quantity_shop\":null,\"other_info\":\"[{\\\"title\\\":\\\"\\\",\\\"content\\\":\\\"\\\"}]\",\"short_info\":\"Lorem ipsum dolor sit amet, consectetur adipisicing elit. Officiis est ipsum soluta ducimus enim, perferendis rem sint similique amet, aspernatur quod repellendus dolor quas eveniet. Nisi odio inventore at ipsa.\",\"number_payment\":0,\"view\":0,\"type\":\"\",\"sort\":null,\"create_time\":1480866843,\"create_author\":23,\"update_time\":1482310582,\"update_author\":23,\"image\":\"products\\/maxb.jpg\",\"color\":null,\"id_group_color\":0,\"properties\":null,\"brand\":\"|1|\",\"supplier\":null,\"time_post\":0,\"number_refresh\":0,\"file_download\":null,\"time_interval_refesh\":0,\"time_refresh\":null,\"length_class\":null,\"weigh_class\":null,\"link_\":null,\"sale_time_start\":null,\"sale_time_end\":null,\"youtube_link\":null,\"note\":\"\",\"status_feature\":0},{\"id\":20,\"category\":\",81,95,\",\"name\":\"\\u0110\\u1ea7m x\\u1ebfp ly ph\\u1ed1i ren h\\u1ed3ng d\\u1ecbu ng\\u1ecdt\",\"alias\":\"dam-xep-ly-phoi-ren-hong-diu-ngot\",\"code\":\"DXN00982\",\"unit\":null,\"price\":\"390000\",\"price_market\":\"0\",\"saleoff\":300000,\"time_start\":1481885020,\"time_end\":1483267420,\"number_repeat\":0,\"status_size\":0,\"status_vat\":0,\"status\":1,\"state\":\"|6|\",\"quantity\":0,\"quantity_shop\":null,\"other_info\":\"[{\\\"title\\\":\\\"\\\",\\\"content\\\":\\\"\\\"}]\",\"short_info\":\"Lorem ipsum dolor sit amet, consectetur adipisicing elit. Officiis est ipsum soluta ducimus enim, perferendis rem sint similique amet, aspernatur quod repellendus dolor quas eveniet. Nisi odio inventore at ipsa.\",\"number_payment\":0,\"view\":0,\"type\":\"\",\"sort\":null,\"create_time\":1480866553,\"create_author\":23,\"update_time\":1482403420,\"update_author\":23,\"image\":\"products\\/model7.jpg\",\"color\":null,\"id_group_color\":0,\"properties\":null,\"brand\":\"|1|\",\"supplier\":null,\"time_post\":0,\"number_refresh\":0,\"file_download\":null,\"time_interval_refesh\":0,\"time_refresh\":null,\"length_class\":null,\"weigh_class\":null,\"link_\":null,\"sale_time_start\":null,\"sale_time_end\":null,\"youtube_link\":null,\"note\":\"\",\"status_feature\":0}]', NULL, 0, 1, 23, '1481232758', 23, '1482005789'),
(14, 'THREE ITEMS', '[{\"id\":29,\"category\":\",81,99,\",\"name\":\"Bao tay\",\"alias\":\"bao-tay\",\"code\":\"BT12\",\"unit\":null,\"price\":\"450000\",\"price_market\":\"0\",\"saleoff\":0,\"time_start\":0,\"time_end\":0,\"number_repeat\":0,\"status_size\":0,\"status_vat\":0,\"status\":1,\"state\":\"|1|\",\"quantity\":0,\"quantity_shop\":null,\"other_info\":\"[{\\\"title\\\":\\\"\\\",\\\"content\\\":\\\"\\\"}]\",\"short_info\":\"Lorem ipsum dolor sit amet, consectetur adipisicing elit. Officiis est ipsum soluta ducimus enim, perferendis rem sint similique amet, aspernatur quod repellendus dolor quas eveniet. Nisi odio inventore at ipsa.\",\"number_payment\":0,\"view\":0,\"type\":\"\",\"sort\":null,\"create_time\":1481953221,\"create_author\":23,\"update_time\":1482308534,\"update_author\":23,\"image\":\"products\\/k1.jpg\",\"color\":null,\"id_group_color\":0,\"properties\":null,\"brand\":\"|2|\",\"supplier\":null,\"time_post\":0,\"number_refresh\":0,\"file_download\":null,\"time_interval_refesh\":0,\"time_refresh\":null,\"length_class\":null,\"weigh_class\":null,\"link_\":null,\"sale_time_start\":null,\"sale_time_end\":null,\"youtube_link\":null,\"note\":\"\",\"status_feature\":0},{\"id\":22,\"category\":\",81,94,\",\"name\":\"\\u00c1o kho\\u00e1c bomber\",\"alias\":\"ao-khoac-bomber\",\"code\":\"FrancisB\",\"unit\":null,\"price\":\"436000\",\"price_market\":\"0\",\"saleoff\":0,\"time_start\":0,\"time_end\":0,\"number_repeat\":0,\"status_size\":0,\"status_vat\":0,\"status\":1,\"state\":\"|1|\",\"quantity\":0,\"quantity_shop\":null,\"other_info\":\"[{\\\"title\\\":\\\"\\\",\\\"content\\\":\\\"\\\"}]\",\"short_info\":\"\\u00c1o kho\\u00e1c bomber FrancisB ch\\u1ea7n ch\\u1ec9 WM JACKET 021 \\u0111\\u01b0\\u1ee3c may t\\u1eeb ch\\u1ea5t li\\u1ec7u v\\u1ea3i b\\u1ec1n \\u0111\\u1eb9p, thi\\u1ebft k\\u1ebf d\\u00e1ng bomber th\\u1eddi th\\u01b0\\u1ee3ng mang \\u0111\\u1ebfn cho ph\\u00e1i \\u0111\\u1eb9p n\\u00e9t tr\\u1ebb trung, c\\u00e1 t\\u00ednh.\\r\\nCh\\u1ea5t li\\u1ec7u v\\u1ea3i Polyester cao c\\u1ea5p\\r\\nThi\\u1ebft k\\u1ebf 2 l\\u1edbp nh\\u1eb9 v\\u00e0 \\u1ea5m\\r\\nD\\u00e1ng bomber, c\\u1ea1p chun bo g\\u1ea5u\\r\\nXu\\u1ea5t x\\u1ee9: Vi\\u1ec7t Nam\\r\\nSize ng\\u01b0\\u1eddi m\\u1eabu m\\u1eb7c: Freesize. S\\u1ed1 \\u0111o ng\\u01b0\\u1eddi m\\u1eabu: 81 - 60 - 90 - 171 (cm)\",\"number_payment\":0,\"view\":0,\"type\":\"\",\"sort\":null,\"create_time\":1480867148,\"create_author\":23,\"update_time\":1482310711,\"update_author\":23,\"image\":\"products\\/k4.jpg\",\"color\":null,\"id_group_color\":0,\"properties\":null,\"brand\":\"|1|\",\"supplier\":null,\"time_post\":0,\"number_refresh\":0,\"file_download\":null,\"time_interval_refesh\":0,\"time_refresh\":null,\"length_class\":null,\"weigh_class\":null,\"link_\":null,\"sale_time_start\":null,\"sale_time_end\":null,\"youtube_link\":null,\"note\":\"\",\"status_feature\":0},{\"id\":28,\"category\":\",82,99,\",\"name\":\"Kh\\u0103n qu\\u00e0ng\",\"alias\":\"khan-quang\",\"code\":\"KQ21\",\"unit\":null,\"price\":\"155000\",\"price_market\":\"0\",\"saleoff\":0,\"time_start\":0,\"time_end\":0,\"number_repeat\":0,\"status_size\":0,\"status_vat\":0,\"status\":1,\"state\":\"|2|\",\"quantity\":0,\"quantity_shop\":null,\"other_info\":\"[{\\\"title\\\":\\\"\\\",\\\"content\\\":\\\"\\\"}]\",\"short_info\":\"Lorem ipsum dolor sit amet, consectetur adipisicing elit. Officiis est ipsum soluta ducimus enim, perferendis rem sint similique amet, aspernatur quod repellendus dolor quas eveniet. Nisi odio inventore at ipsa.\",\"number_payment\":0,\"view\":0,\"type\":\"\",\"sort\":null,\"create_time\":1481953154,\"create_author\":23,\"update_time\":1482308519,\"update_author\":23,\"image\":\"products\\/k2.jpg\",\"color\":null,\"id_group_color\":0,\"properties\":null,\"brand\":\"|4|\",\"supplier\":null,\"time_post\":0,\"number_refresh\":0,\"file_download\":null,\"time_interval_refesh\":0,\"time_refresh\":null,\"length_class\":null,\"weigh_class\":null,\"link_\":null,\"sale_time_start\":null,\"sale_time_end\":null,\"youtube_link\":null,\"note\":\"\",\"status_feature\":0},{\"id\":27,\"category\":\",82,99,\",\"name\":\"K\\u00ednh m\\u1eaft\",\"alias\":\"kinh-mat\",\"code\":\"KM21\",\"unit\":null,\"price\":\"799000\",\"price_market\":\"0\",\"saleoff\":0,\"time_start\":0,\"time_end\":0,\"number_repeat\":0,\"status_size\":0,\"status_vat\":0,\"status\":1,\"state\":\"|1|3|\",\"quantity\":0,\"quantity_shop\":null,\"other_info\":\"[{\\\"title\\\":\\\"\\\",\\\"content\\\":\\\"\\\"}]\",\"short_info\":\"Lorem ipsum dolor sit amet, consectetur adipisicing elit. Officiis est ipsum soluta ducimus enim, perferendis rem sint similique amet, aspernatur quod repellendus dolor quas eveniet. Nisi odio inventore at ipsa.\",\"number_payment\":0,\"view\":0,\"type\":\"\",\"sort\":null,\"create_time\":1481953102,\"create_author\":23,\"update_time\":1482308510,\"update_author\":23,\"image\":\"products\\/k3.jpg\",\"color\":null,\"id_group_color\":0,\"properties\":null,\"brand\":\"|5|\",\"supplier\":null,\"time_post\":0,\"number_refresh\":0,\"file_download\":null,\"time_interval_refesh\":0,\"time_refresh\":null,\"length_class\":null,\"weigh_class\":null,\"link_\":null,\"sale_time_start\":null,\"sale_time_end\":null,\"youtube_link\":null,\"note\":\"\",\"status_feature\":0}]', NULL, 1, 1, 23, '1481952927', NULL, NULL),
(15, 'TWO ITEMS', '[{\"id\":28,\"category\":\",82,99,\",\"name\":\"Kh\\u0103n qu\\u00e0ng\",\"alias\":\"khan-quang\",\"code\":\"KQ21\",\"unit\":null,\"price\":\"155000\",\"price_market\":\"0\",\"saleoff\":0,\"time_start\":0,\"time_end\":0,\"number_repeat\":0,\"status_size\":0,\"status_vat\":0,\"status\":1,\"state\":\"|2|\",\"quantity\":0,\"quantity_shop\":null,\"other_info\":\"[{\\\"title\\\":\\\"\\\",\\\"content\\\":\\\"\\\"}]\",\"short_info\":\"Lorem ipsum dolor sit amet, consectetur adipisicing elit. Officiis est ipsum soluta ducimus enim, perferendis rem sint similique amet, aspernatur quod repellendus dolor quas eveniet. Nisi odio inventore at ipsa.\",\"number_payment\":0,\"view\":0,\"type\":\"\",\"sort\":null,\"create_time\":1481953154,\"create_author\":23,\"update_time\":1482308519,\"update_author\":23,\"image\":\"products\\/k2.jpg\",\"color\":null,\"id_group_color\":0,\"properties\":null,\"brand\":\"|4|\",\"supplier\":null,\"time_post\":0,\"number_refresh\":0,\"file_download\":null,\"time_interval_refesh\":0,\"time_refresh\":null,\"length_class\":null,\"weigh_class\":null,\"link_\":null,\"sale_time_start\":null,\"sale_time_end\":null,\"youtube_link\":null,\"note\":\"\",\"status_feature\":0},{\"id\":29,\"category\":\",81,99,\",\"name\":\"Bao tay\",\"alias\":\"bao-tay\",\"code\":\"BT12\",\"unit\":null,\"price\":\"450000\",\"price_market\":\"0\",\"saleoff\":0,\"time_start\":0,\"time_end\":0,\"number_repeat\":0,\"status_size\":0,\"status_vat\":0,\"status\":1,\"state\":\"|1|\",\"quantity\":0,\"quantity_shop\":null,\"other_info\":\"[{\\\"title\\\":\\\"\\\",\\\"content\\\":\\\"\\\"}]\",\"short_info\":\"Lorem ipsum dolor sit amet, consectetur adipisicing elit. Officiis est ipsum soluta ducimus enim, perferendis rem sint similique amet, aspernatur quod repellendus dolor quas eveniet. Nisi odio inventore at ipsa.\",\"number_payment\":0,\"view\":0,\"type\":\"\",\"sort\":null,\"create_time\":1481953221,\"create_author\":23,\"update_time\":1482308534,\"update_author\":23,\"image\":\"products\\/k1.jpg\",\"color\":null,\"id_group_color\":0,\"properties\":null,\"brand\":\"|2|\",\"supplier\":null,\"time_post\":0,\"number_refresh\":0,\"file_download\":null,\"time_interval_refesh\":0,\"time_refresh\":null,\"length_class\":null,\"weigh_class\":null,\"link_\":null,\"sale_time_start\":null,\"sale_time_end\":null,\"youtube_link\":null,\"note\":\"\",\"status_feature\":0},{\"id\":22,\"category\":\",81,94,\",\"name\":\"\\u00c1o kho\\u00e1c bomber\",\"alias\":\"ao-khoac-bomber\",\"code\":\"FrancisB\",\"unit\":null,\"price\":\"436000\",\"price_market\":\"0\",\"saleoff\":0,\"time_start\":0,\"time_end\":0,\"number_repeat\":0,\"status_size\":0,\"status_vat\":0,\"status\":1,\"state\":\"|1|\",\"quantity\":0,\"quantity_shop\":null,\"other_info\":\"[{\\\"title\\\":\\\"\\\",\\\"content\\\":\\\"\\\"}]\",\"short_info\":\"\\u00c1o kho\\u00e1c bomber FrancisB ch\\u1ea7n ch\\u1ec9 WM JACKET 021 \\u0111\\u01b0\\u1ee3c may t\\u1eeb ch\\u1ea5t li\\u1ec7u v\\u1ea3i b\\u1ec1n \\u0111\\u1eb9p, thi\\u1ebft k\\u1ebf d\\u00e1ng bomber th\\u1eddi th\\u01b0\\u1ee3ng mang \\u0111\\u1ebfn cho ph\\u00e1i \\u0111\\u1eb9p n\\u00e9t tr\\u1ebb trung, c\\u00e1 t\\u00ednh.\\r\\nCh\\u1ea5t li\\u1ec7u v\\u1ea3i Polyester cao c\\u1ea5p\\r\\nThi\\u1ebft k\\u1ebf 2 l\\u1edbp nh\\u1eb9 v\\u00e0 \\u1ea5m\\r\\nD\\u00e1ng bomber, c\\u1ea1p chun bo g\\u1ea5u\\r\\nXu\\u1ea5t x\\u1ee9: Vi\\u1ec7t Nam\\r\\nSize ng\\u01b0\\u1eddi m\\u1eabu m\\u1eb7c: Freesize. S\\u1ed1 \\u0111o ng\\u01b0\\u1eddi m\\u1eabu: 81 - 60 - 90 - 171 (cm)\",\"number_payment\":0,\"view\":0,\"type\":\"\",\"sort\":null,\"create_time\":1480867148,\"create_author\":23,\"update_time\":1482310711,\"update_author\":23,\"image\":\"products\\/k4.jpg\",\"color\":null,\"id_group_color\":0,\"properties\":null,\"brand\":\"|1|\",\"supplier\":null,\"time_post\":0,\"number_refresh\":0,\"file_download\":null,\"time_interval_refesh\":0,\"time_refresh\":null,\"length_class\":null,\"weigh_class\":null,\"link_\":null,\"sale_time_start\":null,\"sale_time_end\":null,\"youtube_link\":null,\"note\":\"\",\"status_feature\":0}]', NULL, 2, 1, 23, '1481952954', NULL, NULL);

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
(351, 'Mô hình 3', 'mo-hinh-3', '', 349, '', NULL, 1, NULL, '1', 'Tùy chỉnh liên kết', 1),
(356, 'áddsad', 'addsad', '', 350, '', NULL, 1, NULL, '0', 'Tùy chỉnh liên kết', 1);

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
(9, 'Liên hệ', 'lien-he', NULL, '<p><iframe frameborder=\"0\" height=\"450\" src=\"https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3725.7969415409234!2d105.79845781536055!3d20.960668186035303!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3135ad215b3d1e2d%3A0xbd6f8ae8d8605262!2zQ1Q2QSBYYSBMYSwgQ-G6p3UgQsawxqF1LCBLaeG6v24gSMawbmcsIFRoYW5oIFRyw6wsIEjDoCBO4buZaSwgVmlldG5hbQ!5e0!3m2!1sen!2s!4v1476087173806\" style=\"border:0\" width=\"100%\"></iframe></p>\\r\\n', '', '<form action=\"\" method=\"POST\" role=\"form\">\\r\\n				    <div class=\"row\">\\r\\n				        <div class=\"col-xs-12 col-md-6\">\\r\\n				            <label for=\"\">Họ và tên</label>\\r\\n				            <div class=\"form-group\">\\r\\n				                <input type=\"text\" placeholder=\"Họ tên\" class=\"form-control\" id=\"\" name=\"name\" required=\"\">\\r\\n				            </div>\\r\\n\\r\\n				            <label for=\"\">Số điện thoại</label>\\r\\n				            <div class=\"form-group\">\\r\\n				                <input name=\"phone\" placeholder=\"Số điện thoại\" class=\"form-control\" type=\"text\" required=\"\">\\r\\n				            </div>\\r\\n\\r\\n				            <label for=\"\">Email</label>\\r\\n				            <div class=\"form-group\">\\r\\n				                <input name=\"email\" placeholder=\"E-Mail\" class=\"form-control\" type=\"email\" required=\"\">\\r\\n				            </div>\\r\\n				            <button type=\"submit\" class=\"btn btn-primary checkout-info-submit-button\" name=\"send_mess\">GỬI TIN</button>\\r\\n				        </div>\\r\\n\\r\\n				        <div class=\"col-xs-12 col-md-6\">\\r\\n				            <label for=\"\">Ghi chú</label>\\r\\n				            <div class=\"form-group\">\\r\\n				                <textarea class=\"form-control\" name=\"mess\" placeholder=\"Nội dung\" required=\"\"></textarea>\\r\\n				            </div>\\r\\n				        </div>\\r\\n				    </div>\\r\\n				</form>', 'lien-he', '', 23, 23, 1, '1476087226', '1476696871'),
(11, 'Giới thiệu', 'gioi-thieu', NULL, '&lt;h1&gt;Giới thiệu chung về 4G&lt;/h1&gt;\\r\\n\\r\\n&lt;p&gt;&lt;strong&gt;MobiFone thử nghiệm th&amp;agrave;nh c&amp;ocirc;ng c&amp;ocirc;ng nghệ 4G&lt;/strong&gt;&lt;/p&gt;\\r\\n\\r\\n&lt;p&gt;&amp;nbsp;&lt;/p&gt;\\r\\n\\r\\n&lt;p&gt;Từ th&amp;aacute;ng 12/2015 tới nay, MobiFone đ&amp;atilde; thử nghiệm th&amp;agrave;nh c&amp;ocirc;ng c&amp;ocirc;ng nghệ 4G/LTE-A về kỹ thuật nội bộ với 200 thu&amp;ecirc; bao nội bộ. Mạng 4G của MobiFone đạt tốc độ dowload/upload tối đa 225Mbps/75Mbps.&lt;/p&gt;\\r\\n\\r\\n&lt;p&gt;&amp;nbsp;&lt;/p&gt;\\r\\n\\r\\n&lt;p&gt;Trong qu&amp;aacute; tr&amp;igrave;nh thử nghiệm nội bộ, MobiFone đ&amp;atilde; n&amp;acirc;ng cấp hệ thống cơ sở vật chất, mạng lưới tạo nền m&amp;oacute;ng vững chắc để đưa c&amp;ocirc;ng nghệ mới đến với kh&amp;aacute;ch h&amp;agrave;ng. B&amp;ecirc;n cạnh đ&amp;oacute;, MobiFone cũng ho&amp;agrave;n th&amp;agrave;nh việc đ&amp;aacute;nh gi&amp;aacute; trải nghiệm c&amp;aacute;c dịch vụ mới của 4G/LTE-A với kết quả khả quan.&lt;/p&gt;\\r\\n\\r\\n&lt;p&gt;&amp;nbsp;&lt;/p&gt;\\r\\n\\r\\n&lt;p&gt;C&amp;ocirc;ng nghệ 4G/LTE-A cung cấp băng th&amp;ocirc;ng rộng hơn, truyền tải dữ liệu nhanh hơn, dung lượng lớn hơn, được đ&amp;aacute;nh gi&amp;aacute; l&amp;agrave; điều kiện l&amp;yacute; tưởng để triển khai c&amp;aacute;c dịch vụ gi&amp;aacute; trị gia tăng hấp dẫn. Ch&amp;iacute;nh v&amp;igrave; vậy, khi triển khai cung cấp c&amp;ocirc;ng nghệ 4G, kh&amp;aacute;c với c&amp;aacute;c nh&amp;agrave; mạng đối thủ, MobiFone sẽ đem lại c&amp;aacute;c dịch vụ nội dung hấp dẫn tr&amp;ecirc;n nền c&amp;ocirc;ng nghệ 4G cho kh&amp;aacute;ch h&amp;agrave;ng như: Trải nghiệm xem c&amp;aacute;c k&amp;ecirc;nh truyền h&amp;igrave;nh AVG, dịch vụ data, SMS, dịch vụ truyền h&amp;igrave;nh Broadcast tr&amp;ecirc;n nền tảng eMBMS, dịch vụ truyền h&amp;igrave;nh Unicast, dịch vụ Video 4K...&lt;/p&gt;\\r\\n\\r\\n&lt;p&gt;&amp;quot;Cuộc đua&amp;quot; 4G hiện đang bước v&amp;agrave;o giai đoạn nước r&amp;uacute;t, đ&amp;ograve;i hỏi c&amp;aacute;c nh&amp;agrave; mạng khẩn trương ho&amp;agrave;n tất thử nghiệm nhằm r&amp;uacute;t ngắn khoảng c&amp;aacute;ch giữa thực tế v&amp;agrave; l&amp;yacute; thuyết. Kết quả thử nghiệm của MobiFone đ&amp;atilde; vượt qua cột mốc tốc độ đề ra (200Mbps) cho giai đoạn ban đầu chứng tỏ Tổng c&amp;ocirc;ng ty đ&amp;atilde; c&amp;oacute; những bước tiến vững chắc về chất lượng v&amp;agrave; nội dung sản phẩm, dịch vụ tr&amp;ecirc;n nền c&amp;ocirc;ng nghệ mới.&lt;/p&gt;\\r\\n\\r\\n&lt;p&gt;Thời gian tới, để sớm mang c&amp;ocirc;ng nghệ mới ra thị trường, MobiFone đ&amp;atilde; ho&amp;agrave;n th&amp;agrave;nh c&amp;aacute;c kịch bản kinh doanh với nhiều chương tr&amp;igrave;nh hấp dẫn d&amp;agrave;nh cho kh&amp;aacute;ch h&amp;agrave;ng. Sau khi tối ưu ho&amp;aacute; chất lượng mạng lưới để đảm bảo trải nghiệm người d&amp;ugrave;ng, Tổng c&amp;ocirc;ng ty Viễn th&amp;ocirc;ng MobiFone sẽ đưa dịch vụ 4G/LTE-A cung cấp thử nghiệm trong th&amp;aacute;ng 6 năm 2016 tại H&amp;agrave; Nội, Đ&amp;agrave; Nẵng v&amp;agrave; Tp. Hồ Ch&amp;iacute; Minh.&lt;/p&gt;\\r\\n', '			                        				                        				                        				                        				                        			                        			                        			                        ', '', 'gioi-thieu', 'products/vhoang-1478844929553.jpg', 23, 23, 1, '1476697000', '1481041088');

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
(1, 'Vụ thu tiền hỗ trợ lũ lụt: Trưởng th&ocirc;n &quot;buồn, mất ngủ cả đ&ecirc;m&quot; &lt;script&gt;alert(234)&lt;/script&gt;', 'vu-thu-tien-ho-tro-lu-lut-truong-th-ocirc-n-quot-buon-mat-ngu-ca-d-ecirc-m-quot-lt-script-gt-alert-234-lt-script-gt', 'Trưởng th&ocirc;n Trung Th&ocirc;n, nơi xảy ra việc thu tiền hỗ trợ lũ lụt của người d&acirc;n, khẳng định việc l&agrave;m đ&oacute; kh&ocirc;ng v&igrave; mục đ&iacute;ch tư lợi v&agrave; cảm thấy buồn, mất ngủ cả đ&ecirc;m.', '&lt;h2&gt;Trưởng th&amp;ocirc;n Trung Th&amp;ocirc;n, nơi xảy ra việc thu tiền hỗ trợ lũ lụt của người d&amp;acirc;n, khẳng định việc l&amp;agrave;m đ&amp;oacute; kh&amp;ocirc;ng v&amp;igrave; mục đ&amp;iacute;ch tư lợi v&amp;agrave; cảm thấy buồn, mất ngủ cả đ&amp;ecirc;m.&lt;/h2&gt;\\r\\n\\r\\n&lt;p&gt;&lt;a href=&quot;http://kenh14cdn.com/2016/photo-1-1477470149753.jpg&quot; rel=&quot;img-lightbox&quot; target=&quot;_blank&quot; title=&quot;C&aacute;c c&aacute;n bộ th&ocirc;n l&agrave; người rất vất vả để gi&uacute;p c&aacute;c đo&agrave;n cứu trợ về với b&agrave; con&quot;&gt;&lt;img alt=&quot;Vụ thu tiền hỗ trợ lũ lụt: Trưởng th&ocirc;n buồn, mất ngủ cả đ&ecirc;m - Ảnh 1.&quot; id=&quot;img_5be4b720-9b55-11e6-b939-01b8b69b7923&quot; src=&quot;http://kenh14cdn.com/thumb_w/650/2016/photo-1-1477470149753.jpg&quot; title=&quot;Vụ thu tiền hỗ trợ lũ lụt: Trưởng th&ocirc;n buồn, mất ngủ cả đ&ecirc;m - Ảnh 1.&quot; /&gt;&lt;/a&gt;&lt;/p&gt;\\r\\n\\r\\n&lt;p&gt;C&amp;aacute;c c&amp;aacute;n bộ th&amp;ocirc;n l&amp;agrave; người rất vất vả để gi&amp;uacute;p c&amp;aacute;c đo&amp;agrave;n cứu trợ về với b&amp;agrave; con&lt;/p&gt;\\r\\n\\r\\n&lt;p&gt;&lt;strong&gt;&amp;quot;T&amp;ocirc;i đ&amp;atilde; đi xin lỗi b&amp;agrave; con nhưng vẫn rất buồn&amp;quot;&lt;/strong&gt;&lt;/p&gt;\\r\\n\\r\\n&lt;p&gt;Ng&amp;agrave;y 26/10, một ng&amp;agrave;y sau sự việc th&amp;ocirc;n Trung Th&amp;ocirc;n (x&amp;atilde; Quảng Trung, Thị x&amp;atilde; Ba Đồn, tỉnh Quảng B&amp;igrave;nh) bị phản &amp;aacute;nh thu tiền hỗ trợ lũ lụt g&amp;acirc;y x&amp;ocirc;n xao dư luận th&amp;igrave; c&amp;aacute;c c&amp;aacute;n bộ ở đ&amp;acirc;y vẫn đang tiếp tục tiếp nhận v&amp;agrave; ph&amp;acirc;n phối h&amp;agrave;ng cứu trợ đến người d&amp;acirc;n.&lt;/p&gt;\\r\\n\\r\\n&lt;p&gt;&amp;Ocirc;ng L&amp;ecirc; Hồng Qu&amp;acirc;n, Trưởng th&amp;ocirc;n Trung Th&amp;ocirc;n, cho hay trong buổi s&amp;aacute;ng c&amp;ugrave;ng ng&amp;agrave;y đ&amp;atilde; tổ chức họp người d&amp;acirc;n trong th&amp;ocirc;n để xin &amp;yacute; kiến về việc ph&amp;acirc;n phối h&amp;agrave;ng cứu trợ cho những đợt tới.&lt;/p&gt;\\r\\n\\r\\n&lt;p&gt;Tất cả b&amp;agrave; con đều th&amp;ocirc;ng cảm cho việc l&amp;agrave;m của th&amp;ocirc;n. Người d&amp;acirc;n cũng nhất tr&amp;iacute; c&amp;aacute;c đợt h&amp;agrave;ng tới sẽ ph&amp;acirc;n chia đều, v&amp;igrave; ai cũng bị thiệt hại.&lt;/p&gt;\\r\\n\\r\\n&lt;p&gt;&amp;quot;&lt;em&gt;N&amp;oacute;i thật l&amp;agrave; c&amp;aacute;c đo&amp;agrave;n cứu trợ về anh em c&amp;aacute;n bộ th&amp;ocirc;n ch&amp;uacute;ng t&amp;ocirc;i cũng rất vất vả, chạy li&amp;ecirc;n tục để lo cho b&amp;agrave; con&lt;/em&gt;&amp;quot;, &amp;ocirc;ng Qu&amp;acirc;n chia sẻ.&lt;/p&gt;\\r\\n\\r\\n&lt;p&gt;N&amp;oacute;i về sự việc g&amp;acirc;y phẫn nộ dư luận vừa qua, &amp;ocirc;ng Qu&amp;acirc;n khẳng định rằng, việc c&amp;aacute;n bộ th&amp;ocirc;n đi thu lại tiền của c&amp;aacute;c hộ d&amp;acirc;n được 1 đo&amp;agrave;n từ thiện trao tặng l&amp;agrave; để đảm bảo c&amp;ocirc;ng bằng cho c&amp;aacute;c hộ d&amp;acirc;n c&amp;oacute; phần qu&amp;agrave; &amp;iacute;t hơn.&lt;/p&gt;\\r\\n\\r\\n&lt;p&gt;&amp;quot;&lt;em&gt;Ch&amp;uacute;ng t&amp;ocirc;i chỉ muốn điều tiết lại cho c&amp;ocirc;ng bằng. Ch&amp;uacute;ng t&amp;ocirc;i kh&amp;ocirc;ng c&amp;oacute; 1 ch&amp;uacute;t vụ lợi n&amp;agrave;o trong đ&amp;oacute;.&amp;nbsp;Ch&amp;uacute;ng t&amp;ocirc;i th&amp;ocirc;ng qua c&amp;aacute;c ban, mặt trận th&amp;ocirc;n, qua tập thể chứ kh&amp;ocirc;ng phải do 1 c&amp;aacute; nh&amp;acirc;n n&amp;agrave;o quyết định cả.&lt;/em&gt;&lt;/p&gt;\\r\\n\\r\\n&lt;p&gt;&lt;em&gt;C&amp;aacute;i sai của ch&amp;uacute;ng t&amp;ocirc;i l&amp;agrave; chưa th&amp;ocirc;ng qua b&amp;agrave; con m&amp;agrave; chỉ mới th&amp;ocirc;ng qua ban c&amp;ocirc;ng t&amp;aacute;c mặt trận.&amp;nbsp;Một phần l&amp;yacute; do l&amp;agrave; h&amp;agrave;ng cứu trợ về gấp qu&amp;aacute; n&amp;ecirc;n kh&amp;ocirc;ng c&amp;oacute; thời gian rảnh để b&amp;agrave;n với b&amp;agrave; con.&lt;/em&gt;&lt;/p&gt;\\r\\n\\r\\n&lt;p&gt;&lt;em&gt;T&amp;ocirc;i khẳng định lần nữa l&amp;agrave; kh&amp;ocirc;ng c&amp;oacute; tư lợi g&amp;igrave; cả m&amp;agrave; chỉ muốn điều tiết c&amp;aacute;c phần qu&amp;agrave; cho c&amp;ocirc;ng bằng.&lt;/em&gt;&lt;/p&gt;\\r\\n\\r\\n&lt;p&gt;&lt;em&gt;C&amp;aacute;c hộ d&amp;acirc;n n&amp;agrave;y cũng đ&amp;atilde; được ưu ti&amp;ecirc;n nhận hỗ trợ từ c&amp;aacute;c đo&amp;agrave;n trước rồi&lt;/em&gt;&amp;quot;, &amp;ocirc;ng Qu&amp;acirc;n chia sẻ.&lt;/p&gt;\\r\\n\\r\\n&lt;p&gt;Theo &amp;ocirc;ng Qu&amp;acirc;n, ngay khi dư luận phản ứng th&amp;igrave; c&amp;aacute;c c&amp;aacute;n bộ đ&amp;atilde; đ&amp;iacute;ch th&amp;acirc;n tới nh&amp;agrave; trả lại số tiền đ&amp;atilde; thu v&amp;agrave; xin lỗi người d&amp;acirc;n. Tuy nhi&amp;ecirc;n, &amp;ocirc;ng Qu&amp;acirc;n v&amp;agrave; c&amp;aacute;c c&amp;aacute;n bộ kh&amp;aacute;c đều cảm thấy buồn.&lt;/p&gt;\\r\\n\\r\\n&lt;p&gt;&amp;quot;&lt;em&gt;Từ h&amp;ocirc;m qua đến giờ, t&amp;ocirc;i cảm thấy buồn, buồn rất nhiều, mất ngủ cả đ&amp;ecirc;m. T&amp;ocirc;i đ&amp;atilde; đi xin lỗi b&amp;agrave; con nhưng vẫn rất buồn v&amp;igrave; b&amp;agrave; con kh&amp;ocirc;ng hiểu cho việc l&amp;agrave;m của ch&amp;uacute;ng t&amp;ocirc;i.&lt;/em&gt;&lt;/p&gt;\\r\\n\\r\\n&lt;p&gt;&lt;em&gt;Người d&amp;acirc;n phản ứng như vậy khiến b&amp;acirc;y giờ anh em ch&amp;uacute;ng t&amp;ocirc;i l&amp;agrave;m việc cũng kh&amp;ocirc;ng được thoải m&amp;aacute;i. Một số c&amp;aacute;n bộ th&amp;ocirc;n sau sự việc về ốm lu&amp;ocirc;n&lt;/em&gt;&amp;quot;, &amp;ocirc;ng Qu&amp;acirc;n t&amp;acirc;m sự.&lt;/p&gt;\\r\\n\\r\\n&lt;p&gt;&lt;strong&gt;Chưa vội xử l&amp;yacute; vụ việc&lt;/strong&gt;&lt;/p&gt;\\r\\n\\r\\n&lt;p&gt;&amp;Ocirc;ng Phạm Nguy&amp;ecirc;n Tố, B&amp;iacute; thư x&amp;atilde; Quảng Trung (thị x&amp;atilde; Ba Đồn, tỉnh Quảng B&amp;igrave;nh), cho biết th&amp;ocirc;n Trung Th&amp;ocirc;n đ&amp;atilde; trả lại to&amp;agrave;n bộ số tiền cho người d&amp;acirc;n. C&amp;aacute;n bộ th&amp;ocirc;n cũng đ&amp;atilde; xin lỗi b&amp;agrave; con.&lt;/p&gt;\\r\\n\\r\\n&lt;p&gt;&amp;quot;&lt;em&gt;C&amp;aacute;n bộ th&amp;ocirc;n thu lại tiền l&amp;agrave; sai. Tuy nhi&amp;ecirc;n, c&amp;aacute;c c&amp;aacute;n bộ n&amp;agrave;y thu tiền lại để san sẻ cho c&amp;aacute;c hộ d&amp;acirc;n kh&amp;aacute;c trong th&amp;ocirc;n chưa c&amp;oacute;. Việc l&amp;agrave;m n&amp;agrave;y l&amp;agrave; sai khi chưa được người d&amp;acirc;n th&amp;ocirc;ng qua.&lt;/em&gt;&lt;/p&gt;\\r\\n\\r\\n&lt;p&gt;&lt;em&gt;L&amp;yacute; do người d&amp;acirc;n phản ứng l&amp;agrave; c&amp;aacute;n bộ th&amp;ocirc;n cũng chưa họp d&amp;acirc;n để b&amp;agrave;n bạc xem c&amp;oacute; thống nhất với phương &amp;aacute;n n&amp;agrave;y hay kh&amp;ocirc;ng m&amp;agrave; đ&amp;atilde; tự &amp;yacute; thực hiện&lt;/em&gt;&amp;quot;, &amp;ocirc;ng Tố nhận định.&lt;/p&gt;\\r\\n\\r\\n&lt;p&gt;Theo &amp;ocirc;ng Tố, người d&amp;acirc;n hiểu lầm rằng c&amp;aacute;n bộ th&amp;ocirc;n thu lại tiền để bỏ t&amp;uacute;i cho c&amp;aacute; nh&amp;acirc;n c&amp;aacute;n bộ n&amp;ecirc;n phản ứng v&amp;agrave; bức x&amp;uacute;c.&lt;/p&gt;\\r\\n\\r\\n&lt;p&gt;&amp;quot;&lt;em&gt;Nếu giả sử th&amp;ocirc;n đ&amp;atilde; tổ chức họp d&amp;acirc;n trước để b&amp;agrave;n bạc thực hiện việc n&amp;agrave;y, lấy &amp;yacute; kiến người d&amp;acirc;n trước th&amp;igrave; b&amp;agrave; con sẽ kh&amp;ocirc;ng phản ứng.&amp;nbsp;&lt;/em&gt;&lt;em&gt;Vấn đề quan trọng nhất đ&amp;atilde; khắc phục. X&amp;atilde; cũng đ&amp;atilde; tổ chức họp v&amp;agrave; kiểm điểm c&amp;aacute;n bộ th&amp;ocirc;n Trung&lt;/em&gt;&amp;nbsp;&lt;em&gt;Th&amp;ocirc;n&lt;/em&gt;&amp;quot;, &amp;ocirc;ng Tố cho hay.&lt;/p&gt;\\r\\n\\r\\n&lt;p&gt;B&amp;iacute; thư x&amp;atilde; Quảng Trung cũng cho biết đ&amp;atilde; tổ chức họp với c&amp;aacute;n bộ c&amp;aacute;c th&amp;ocirc;n để r&amp;uacute;t kinh nghiệm việc tiếp nhận cứu trợ, ph&amp;acirc;n phối h&amp;agrave;ng của c&amp;aacute;c đo&amp;agrave;n từ thiện cho thật chu đ&amp;aacute;o, c&amp;ocirc;ng bằng với tất cả người d&amp;acirc;n.&lt;/p&gt;\\r\\n\\r\\n&lt;p&gt;&amp;Ocirc;ng Tố cho biết, trước mắt chỉ kiểm điểm c&amp;aacute;n bộ th&amp;ocirc;n Trung Th&amp;ocirc;n. Sau n&amp;agrave;y x&amp;atilde; sẽ r&amp;agrave; so&amp;aacute;t lại để n&amp;oacute;i r&amp;otilde; với d&amp;acirc;n. B&amp;acirc;y giờ, x&amp;atilde; đang tập trung tiếp nhận v&amp;agrave; ph&amp;acirc;n phối h&amp;agrave;ng cứu trợ để hỗ trợ cho b&amp;agrave; con.&lt;/p&gt;\\r\\n\\r\\n&lt;p&gt;&amp;quot;&lt;em&gt;C&amp;aacute;n bộ ở th&amp;ocirc;n, ở cơ sở rất kh&amp;oacute; khăn. Việc bầu trưởng th&amp;ocirc;n cũng kh&amp;oacute;, rất &amp;iacute;t người muốn l&amp;agrave;m hay tham gia c&amp;aacute;n bộ th&amp;ocirc;n. Họ l&amp;agrave;m v&amp;igrave; nhiệt t&amp;igrave;nh, gi&amp;uacute;p đỡ b&amp;agrave; con chứ tiền lương cũng chỉ vừa đủ tiền xăng xe&lt;/em&gt;&amp;quot;, &amp;ocirc;ng Tố chia sẻ.&lt;/p&gt;\\r\\n', ',3,', 'products/bannes/ngang-1478885156001-1-0-501-800-crop-1478885282958.jpg', '', '			                        				                        				                        			                        ', 23, 23, 1, NULL, '1479050976'),
(2, 'Bài viết số 2', 'bai-viet-so-2', 'hay lắm', '<p><strong>Note:</strong>&nbsp;The implode() function accept its parameters in either order. However, for consistency with&nbsp;<a href=\\\"http://www.w3schools.com/php/func_string_explode.asp\\\">explode()</a>, you should use the documented order of arguments.</p>\\r\\n\\r\\n<p><strong>Note:</strong>&nbsp;The separator parameter of implode() is optional. However, it is recommended to always use two parameters for backwards compatibility.</p>\\r\\n\\r\\n<p><strong>Note:</strong>&nbsp;This function is binary-safe.</p>', ',3,', 'dt2_1.png', 'note,hay,tu,te', '', 23, NULL, 1, '1475204145', NULL),
(3, 'Bài viết số 345', 'bai-viet-so-345', 'hay hay', '<p><strong>Note:</strong>&nbsp;The implode() function accept its parameters in either order. However, for consistency with&nbsp;<a href=\\\"\\\\\\\">explode()</a>, you should use the documented order of arguments.</p>\\r\\n\\r\\n<p><strong>Note:</strong>&nbsp;The separator parameter of implode() is optional. However, it is recommended to always use two parameters for backwards compatibility.</p>\\r\\n\\r\\n<p><strong>Note:</strong>&nbsp;This function is binary-safe.</p>', ',2,3,4,', 'dt3.png', 'hay,tuyệt', '', 23, 23, 1, '1475204188', '1475207689'),
(4, 'dfgdfg', 'dfgdfg', 'dfgdfg', '', ',1,', '', '', '', 23, NULL, 1, '1476248427', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `vi_product_basic`
--

CREATE TABLE `vi_product_basic` (
  `id` int(11) UNSIGNED NOT NULL,
  `category` char(255) DEFAULT NULL,
  `name` varchar(255) DEFAULT NULL,
  `alias` varchar(255) DEFAULT NULL,
  `code` char(20) DEFAULT NULL COMMENT 'mã sản phẩm',
  `unit` char(20) DEFAULT NULL COMMENT 'đơn vị tính',
  `price` varchar(255) NOT NULL DEFAULT '0',
  `price_market` varchar(255) NOT NULL DEFAULT '0' COMMENT 'giá thị trường',
  `saleoff` int(11) DEFAULT NULL,
  `time_start` int(11) UNSIGNED DEFAULT NULL COMMENT 'thời gian bắt đầu khuyến mãi',
  `time_end` int(11) UNSIGNED DEFAULT NULL COMMENT 'thời gian kết thúc khuyến mãi',
  `number_repeat` smallint(5) UNSIGNED NOT NULL DEFAULT '0' COMMENT 'số lần lặp lại khuyến mãi',
  `status_size` tinyint(1) UNSIGNED NOT NULL DEFAULT '0' COMMENT 'tình trạng size, nếu có thì join sang bảng size',
  `status_vat` tinyint(1) UNSIGNED NOT NULL DEFAULT '0' COMMENT '0: không hiển thị tình trạng, 1: có VAT, 2: chưa có VAT',
  `status` tinyint(1) UNSIGNED DEFAULT '1',
  `state` char(50) DEFAULT '' COMMENT '1: nổi bật, 2: sắp về, 3: Hàng mới, 4: cũ, 5: hết hàng',
  `quantity` smallint(5) UNSIGNED NOT NULL DEFAULT '0',
  `quantity_shop` text COMMENT 'số lượng theo từng shop',
  `other_info` text,
  `short_info` text NOT NULL COMMENT 'đặc tính sản phẩm',
  `number_payment` smallint(5) UNSIGNED NOT NULL DEFAULT '0' COMMENT 'lượt mua',
  `view` smallint(5) UNSIGNED NOT NULL DEFAULT '0' COMMENT 'lượt xem',
  `type` char(50) DEFAULT '' COMMENT 'loại sản phẩm',
  `sort` smallint(5) UNSIGNED DEFAULT NULL,
  `create_time` int(11) UNSIGNED DEFAULT NULL,
  `create_author` bigint(20) UNSIGNED DEFAULT NULL,
  `update_time` int(11) UNSIGNED DEFAULT NULL,
  `update_author` bigint(20) UNSIGNED DEFAULT NULL,
  `image` varchar(255) DEFAULT NULL,
  `color` text COMMENT 'lưu dưới dạng json',
  `id_group_color` int(11) UNSIGNED NOT NULL DEFAULT '0',
  `properties` varchar(255) DEFAULT NULL,
  `brand` varchar(255) DEFAULT NULL,
  `supplier` varchar(255) DEFAULT NULL COMMENT 'Nhà cung cấp',
  `time_post` int(11) UNSIGNED NOT NULL DEFAULT '0' COMMENT 'hẹn giờ đăng',
  `number_refresh` int(5) UNSIGNED NOT NULL DEFAULT '0' COMMENT 'số lần làm mới',
  `file_download` text,
  `time_interval_refesh` int(5) UNSIGNED DEFAULT '0' COMMENT 'khoảng thời gian làm mới',
  `time_refresh` time DEFAULT NULL COMMENT 'thời gian làm mới',
  `length_class` varchar(256) DEFAULT NULL,
  `weigh_class` varchar(256) DEFAULT NULL,
  `link_` varchar(255) DEFAULT NULL,
  `sale_time_start` int(10) DEFAULT NULL,
  `sale_time_end` int(10) DEFAULT NULL,
  `youtube_link` varchar(255) DEFAULT NULL,
  `note` text CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `status_feature` tinyint(4) NOT NULL DEFAULT '0' COMMENT 'Check status này để xuất hiện ngoài trang chủ(Sản phẩm nổi bật)'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `vi_product_basic`
--

INSERT INTO `vi_product_basic` (`id`, `category`, `name`, `alias`, `code`, `unit`, `price`, `price_market`, `saleoff`, `time_start`, `time_end`, `number_repeat`, `status_size`, `status_vat`, `status`, `state`, `quantity`, `quantity_shop`, `other_info`, `short_info`, `number_payment`, `view`, `type`, `sort`, `create_time`, `create_author`, `update_time`, `update_author`, `image`, `color`, `id_group_color`, `properties`, `brand`, `supplier`, `time_post`, `number_refresh`, `file_download`, `time_interval_refesh`, `time_refresh`, `length_class`, `weigh_class`, `link_`, `sale_time_start`, `sale_time_end`, `youtube_link`, `note`, `status_feature`) VALUES
(20, ',81,95,', 'Đầm xếp ly phối ren hồng dịu ngọt', 'dam-xep-ly-phoi-ren-hong-diu-ngot', 'DXN00982', NULL, '390000', '0', 300000, 1481885020, 1483267420, 0, 0, 0, 1, '|6|', 0, NULL, '[{\"title\":\"\",\"content\":\"\"}]', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Officiis est ipsum soluta ducimus enim, perferendis rem sint similique amet, aspernatur quod repellendus dolor quas eveniet. Nisi odio inventore at ipsa.', 0, 0, '', NULL, 1480866553, 23, 1482403420, 23, 'products/model7.jpg', NULL, 0, NULL, '|1|', NULL, 0, 0, NULL, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', 0),
(21, ',81,95,', 'Áo deep 221', 'ao-deep-221', 'DRC221', NULL, '580000', '0', 0, 0, 0, 0, 0, 0, 1, '|3|', 0, NULL, '[{\"title\":\"\",\"content\":\"\"}]', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Officiis est ipsum soluta ducimus enim, perferendis rem sint similique amet, aspernatur quod repellendus dolor quas eveniet. Nisi odio inventore at ipsa.', 0, 0, '', NULL, 1480866843, 23, 1482310582, 23, 'products/maxb.jpg', NULL, 0, NULL, '|1|', NULL, 0, 0, NULL, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', 0),
(22, ',81,94,', 'Áo khoác bomber', 'ao-khoac-bomber', 'FrancisB', NULL, '436000', '0', 0, 0, 0, 0, 0, 0, 1, '|1|', 0, NULL, '[{\"title\":\"\",\"content\":\"\"}]', 'Áo khoác bomber FrancisB chần chỉ WM JACKET 021 được may từ chất liệu vải bền đẹp, thiết kế dáng bomber thời thượng mang đến cho phái đẹp nét trẻ trung, cá tính.\\r\\nChất liệu vải Polyester cao cấp\\r\\nThiết kế 2 lớp nhẹ và ấm\\r\\nDáng bomber, cạp chun bo gấu\\r\\nXuất xứ: Việt Nam\\r\\nSize người mẫu mặc: Freesize. Số đo người mẫu: 81 - 60 - 90 - 171 (cm)', 0, 0, '', NULL, 1480867148, 23, 1482310711, 23, 'products/k4.jpg', NULL, 0, NULL, '|1|', NULL, 0, 0, NULL, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', 0),
(23, ',81,94,', 'Áo khoác kiểu nữ Zenic', 'ao-khoac-kieu-nu-zenic', 'Zenic63575', NULL, '710000', '0', 0, 0, 0, 0, 0, 0, 1, '|1|', 0, NULL, '[{\"title\":\"\",\"content\":\"\"}]', 'Áo khoác kiểu nữ Zenic 63575 được may từ chất liệu vải cao cấp và mềm mại đem đến cảm giác thoải mái khi mặc. Áo có thiết kế trẻ trung, dáng suông cho bạn vẻ ngoài cá tính, phong cách và tràn đầy sức sống.\\r\\nChất liệu Polyester pha cao cấp, mềm mại\\r\\nÁo cổ tròn xẻ phối dáng dài trẻ trung\\r\\nKhóa kéo chắc chắn\\r\\nTúi mổ 2 bên\\r\\nXuất xứ: Việt Nam\\r\\nSize người mẫu mặc: 34. Số đo người mẫu: 80 - 65 - 94 - 170 (cm)', 0, 0, '', NULL, 1480867387, 23, NULL, NULL, 'products/1480585523573_1253704.jpg', NULL, 0, NULL, '|1|', NULL, 0, 0, NULL, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', 0),
(24, ',81,94,95,', 'Váy hoa', 'vay-hoa', 'VH01', NULL, '800000', '0', 0, 0, 0, 0, 0, 0, 1, '|3|', 0, NULL, '[{\"title\":\"\",\"content\":\"\"}]', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Officiis est ipsum soluta ducimus enim, perferendis rem sint similique amet, aspernatur quod repellendus dolor quas eveniet. Nisi odio inventore at ipsa.', 0, 0, '', NULL, 1482006064, 23, 1482308468, 23, 'products/model6.jpg', NULL, 0, NULL, '|1|', NULL, 0, 0, NULL, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', 0),
(25, ',81,94,95,96,97,', 'Áo so deep', 'ao-so-deep', 'AB323', NULL, '950000', '0', 0, 0, 0, 0, 0, 0, 1, '|1|', 0, NULL, '[{\"title\":\"ghjghj\",\"content\":\"ghjghj\"},{\"title\":\"ghjghj\",\"content\":\"ghjghj\"}]', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Officiis est ipsum soluta ducimus enim, perferendis rem sint similique amet, aspernatur quod repellendus dolor quas eveniet. Nisi odio inventore at ipsa.', 0, 0, '', NULL, 1482006166, 23, 1482308479, 23, 'products/model5.jpg', NULL, 0, NULL, '|1|', NULL, 0, 0, NULL, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', 0),
(26, ',81,94,95,96,97,', 'Model Chất', 'model-chat', 'MD21', NULL, '1100000', '0', 0, 0, 0, 0, 0, 0, 1, '|1|', 0, NULL, '[{\"title\":\"\",\"content\":\"\"}]', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Officiis est ipsum soluta ducimus enim, perferendis rem sint similique amet, aspernatur quod repellendus dolor quas eveniet. Nisi odio inventore at ipsa.', 0, 0, '', NULL, 1482006216, 23, 1482308489, 23, 'products/model4.jpg', NULL, 0, NULL, '', NULL, 0, 0, NULL, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', 0),
(27, ',82,99,', 'Kính mắt', 'kinh-mat', 'KM21', NULL, '799000', '0', 0, 0, 0, 0, 0, 0, 1, '|1|3|', 0, NULL, '[{\"title\":\"\",\"content\":\"\"}]', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Officiis est ipsum soluta ducimus enim, perferendis rem sint similique amet, aspernatur quod repellendus dolor quas eveniet. Nisi odio inventore at ipsa.', 0, 0, '', NULL, 1481953102, 23, 1482308510, 23, 'products/k3.jpg', NULL, 0, NULL, '|5|', NULL, 0, 0, NULL, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', 0),
(28, ',82,99,', 'Khăn quàng', 'khan-quang', 'KQ21', NULL, '155000', '0', 0, 0, 0, 0, 0, 0, 1, '|2|', 0, NULL, '[{\"title\":\"\",\"content\":\"\"}]', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Officiis est ipsum soluta ducimus enim, perferendis rem sint similique amet, aspernatur quod repellendus dolor quas eveniet. Nisi odio inventore at ipsa.', 0, 0, '', NULL, 1481953154, 23, 1482308519, 23, 'products/k2.jpg', NULL, 0, NULL, '|4|', NULL, 0, 0, NULL, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', 0),
(29, ',81,99,', 'Bao tay', 'bao-tay', 'BT12', NULL, '450000', '0', 0, 0, 0, 0, 0, 0, 1, '|1|', 0, NULL, '[{\"title\":\"\",\"content\":\"\"}]', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Officiis est ipsum soluta ducimus enim, perferendis rem sint similique amet, aspernatur quod repellendus dolor quas eveniet. Nisi odio inventore at ipsa.', 0, 0, '', NULL, 1481953221, 23, 1482308534, 23, 'products/k1.jpg', NULL, 0, NULL, '|2|', NULL, 0, 0, NULL, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', 0),
(30, ',81,95,', 'Váy tomato', 'vay-tomato', 'vtmt22', NULL, '3500000', '0', 0, 0, 0, 0, 0, 0, 1, '|3|', 0, NULL, '[{\"title\":\"\",\"content\":\"\"}]', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Officiis est ipsum soluta ducimus enim, perferendis rem sint similique amet, aspernatur quod repellendus dolor quas eveniet. Nisi odio inventore at ipsa.', 0, 0, '', NULL, 1482402155, 23, NULL, NULL, 'products/p1.jpg', NULL, 0, NULL, '|4|', NULL, 0, 0, NULL, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', 0);

-- --------------------------------------------------------

--
-- Table structure for table `vi_product_detail`
--

CREATE TABLE `vi_product_detail` (
  `id` int(11) UNSIGNED NOT NULL,
  `id_product` int(11) UNSIGNED NOT NULL,
  `full_info` text,
  `tags` varchar(255) DEFAULT NULL,
  `id_field` int(11) UNSIGNED DEFAULT '0',
  `form_field` text,
  `form_default` tinyint(1) UNSIGNED DEFAULT '1' COMMENT '1: form default, 0: form custom',
  `meta_title` varchar(255) DEFAULT NULL,
  `meta_keyword` varchar(255) DEFAULT NULL,
  `meta_description` text,
  `related_product` text
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `vi_product_detail`
--

INSERT INTO `vi_product_detail` (`id`, `id_product`, `full_info`, `tags`, `id_field`, `form_field`, `form_default`, `meta_title`, `meta_keyword`, `meta_description`, `related_product`) VALUES
(15, 20, '&lt;p&gt;ĐẦM X&amp;Ograve;E 2 LỚP T&amp;Ugrave;NG DẬP LI&lt;/p&gt;\\r\\n\\r\\n&lt;p&gt;Kiểu d&amp;aacute;ng: đầm x&amp;ograve;e, cổ tr&amp;ograve;n, s&amp;aacute;t n&amp;aacute;ch, th&amp;acirc;n tr&amp;ecirc;n 2 lớp, t&amp;ugrave;ng v&amp;aacute;y dập li lơn, d&amp;acirc;y k&amp;eacute;o b&amp;ecirc;n h&amp;ocirc;ng&lt;/p&gt;\\r\\n\\r\\n&lt;p&gt;M&amp;agrave;u sắc: hồng nhạt, trắng&lt;/p&gt;\\r\\n\\r\\n&lt;p&gt;Chất liệu: chiffon, co gi&amp;atilde;n nhẹ&lt;/p&gt;\\r\\n\\r\\n&lt;p&gt;K&amp;iacute;ch thước: một size (44~50kg ngực 86 eo 66 d&amp;agrave;i 88)&lt;/p&gt;\\r\\n', 'Đầm xòe,Váy xòe,Thời trang nữ', 0, NULL, 1, 'Đầm xếp ly phối ren hồng dịu ngọt', 'Đầm xòe,Váy xòe,Thời trang nữ', '', '{\"category\":{\"status\":\"0\",\"sort\":\"1\",\"display\":\"list\",\"order_by\":\"new\",\"number\":\"1\"},\"brand\":{\"status\":\"0\",\"sort\":\"1\",\"display\":\"list\",\"order_by\":\"new\",\"number\":\"1\"},\"price\":{\"status\":\"0\",\"sort\":\"1\",\"display\":\"list\",\"order_by\":\"new\",\"number\":\"1\",\"range\":\"\"},\"select\":{\"status\":\"0\",\"sort\":\"1\",\"display\":\"list\",\"order_by\":\"new\",\"id_related\":\"\"}}'),
(16, 21, '&lt;p&gt;Lorem ipsum dolor sit amet, consectetur adipisicing elit. Officiis est ipsum soluta ducimus enim, perferendis rem sint similique amet, aspernatur quod repellendus dolor quas eveniet. Nisi odio inventore at ipsa.&lt;/p&gt;\\r\\n', 'Đầm đuôi ren cá,Đầm', 0, NULL, 1, 'Áo deep 221', 'Đầm đuôi ren cá,Đầm', '', '{\"category\":{\"status\":\"0\",\"sort\":\"1\",\"display\":\"list\",\"order_by\":\"new\",\"number\":\"1\"},\"brand\":{\"status\":\"0\",\"sort\":\"1\",\"display\":\"list\",\"order_by\":\"new\",\"number\":\"1\"},\"price\":{\"status\":\"0\",\"sort\":\"1\",\"display\":\"list\",\"order_by\":\"new\",\"number\":\"1\",\"range\":\"\"},\"select\":{\"status\":\"0\",\"sort\":\"1\",\"display\":\"list\",\"order_by\":\"new\",\"id_related\":\"\"}}'),
(17, 22, '&lt;h2&gt;Th&amp;ocirc;ng tin sản phẩm&lt;/h2&gt;\\r\\n\\r\\n&lt;h3&gt;&amp;Aacute;o kho&amp;aacute;c bomber FrancisB chần chỉ WM JACKET 021&lt;/h3&gt;\\r\\n\\r\\n&lt;p&gt;M&amp;ugrave;a đ&amp;ocirc;ng l&amp;agrave; một m&amp;ugrave;a đầy hấp dẫn, quyến rũ đối với những c&amp;ocirc; n&amp;agrave;ng m&amp;ecirc; thời trang. Trong tiết trời lạnh gi&amp;aacute;, những chiếc &amp;aacute;o&amp;nbsp;kho&amp;aacute;c&amp;nbsp;trở th&amp;agrave;nh một phần kh&amp;ocirc;ng thể thiếu trong tủ đồ của ph&amp;aacute;i đẹp.&amp;nbsp;&lt;strong&gt;&amp;Aacute;o kho&amp;aacute;c bomber FrancisB chần chỉ WM JACKET 021​​​&amp;nbsp;&lt;/strong&gt;được may từ chất liệu vải Polyester&amp;nbsp;cao cấp với nhiều ưu điểm như nhẹ, kh&amp;oacute; b&amp;aacute;m bẩn, nhanh kh&amp;ocirc;. Sản phẩm c&amp;oacute; chỉ may tỉ mỉ, đường cắt tinh tế&amp;nbsp;đem&amp;nbsp;đến cho ph&amp;aacute;i đẹp vẻ ngo&amp;agrave;i trẻ trung&amp;nbsp;m&amp;agrave; vẫn v&amp;ocirc; c&amp;ugrave;ng s&amp;agrave;nh điệu v&amp;agrave; hợp thời trang.&lt;/p&gt;\\r\\n\\r\\n&lt;p&gt;&lt;img alt=&quot;&Aacute;o kho&aacute;c bomber FrancisB chần chỉ WM JACKET 021 đen&quot; src=&quot;https://cdn02.static-adayroi.com/0/2016/12/01/1480581011873_1886873.jpg&quot; title=&quot;&Aacute;o kho&aacute;c bomber FrancisB chần chỉ WM JACKET 021 đen&quot; /&gt;&lt;/p&gt;\\r\\n\\r\\n&lt;p&gt;&lt;img src=&quot;https://cdn02.static-adayroi.com/0/2016/12/01/1480582777327_7321459.jpg&quot; /&gt;&lt;/p&gt;\\r\\n\\r\\n&lt;p&gt;&lt;img src=&quot;https://cdn02.static-adayroi.com/0/2016/12/01/1480582785259_8648913.jpg&quot; /&gt;&lt;/p&gt;\\r\\n\\r\\n&lt;p&gt;&lt;img src=&quot;https://cdn02.static-adayroi.com/0/2016/12/01/1480582796253_4387518.jpg&quot; /&gt;&lt;/p&gt;\\r\\n\\r\\n&lt;p&gt;&lt;strong&gt;Hướng dẫn bảo quản&lt;/strong&gt;&lt;/p&gt;\\r\\n\\r\\n&lt;ul&gt;\\r\\n	&lt;li&gt;Giặt tay ở nhiệt độ kh&amp;ocirc;ng qu&amp;aacute; 30 độ C&lt;/li&gt;\\r\\n	&lt;li&gt;Kh&amp;ocirc;ng sử dụng thuốc tẩy hoặc h&amp;oacute;a chất&lt;/li&gt;\\r\\n	&lt;li&gt;Tr&amp;aacute;nh phơi dưới &amp;aacute;nh nắng trực tiếp&lt;/li&gt;\\r\\n	&lt;li&gt;Kh&amp;ocirc;ng ủi (l&amp;agrave;) dưới nhiệt độ cao&lt;/li&gt;\\r\\n&lt;/ul&gt;\\r\\n\\r\\n&lt;p&gt;&lt;strong&gt;Th&amp;ocirc;ng tin thương hiệu&lt;/strong&gt;&lt;/p&gt;\\r\\n\\r\\n&lt;p&gt;FrancisB l&amp;agrave; thương hiệu chuy&amp;ecirc;n cung cấp c&amp;aacute;c sản phẩm thời trang nam nữ. Với những mẫu thiết kế trẻ trung, chất lượng tốt c&amp;ugrave;ng gi&amp;aacute; th&amp;agrave;nh hợp l&amp;yacute;, sản phẩm mang thương hiệu FrancisB đang ng&amp;agrave;y c&amp;agrave;ng được giới trẻ ưa chuộng. FrancisB cam kết kh&amp;ocirc;ng ngừng thay đổi v&amp;agrave; cải tiến, đ&amp;aacute;p ứng nhu cầu thị trường v&amp;agrave; l&amp;agrave;m h&amp;agrave;i l&amp;ograve;ng kh&amp;aacute;ch h&amp;agrave;ng.&lt;/p&gt;\\r\\n', 'Áo khoác', 0, NULL, 1, 'Áo khoác bomber', 'Áo khoác', '', '{\"category\":{\"status\":\"0\",\"sort\":\"1\",\"display\":\"list\",\"order_by\":\"new\",\"number\":\"1\"},\"brand\":{\"status\":\"0\",\"sort\":\"1\",\"display\":\"list\",\"order_by\":\"new\",\"number\":\"1\"},\"price\":{\"status\":\"0\",\"sort\":\"1\",\"display\":\"list\",\"order_by\":\"new\",\"number\":\"1\",\"range\":\"\"},\"select\":{\"status\":\"0\",\"sort\":\"1\",\"display\":\"list\",\"order_by\":\"new\",\"id_related\":\"\"}}'),
(18, 23, '&lt;h3&gt;&amp;Aacute;o kho&amp;aacute;c kiểu nữ Zenic 63575&lt;/h3&gt;\\r\\n\\r\\n&lt;p&gt;&amp;Aacute;o kho&amp;aacute;c kiểu nữ Zenic 63575 được may từ chất liệu vải cao cấp v&amp;agrave; mềm mại đem đến cảm gi&amp;aacute;c thoải m&amp;aacute;i khi mặc. &amp;Aacute;o c&amp;oacute; kiểu d&amp;aacute;ng trẻ trung, cổ tr&amp;ograve;n&amp;nbsp;cho bạn vẻ ngo&amp;agrave;i c&amp;aacute; t&amp;iacute;nh, phong c&amp;aacute;ch v&amp;agrave; tr&amp;agrave;n đầy sức sống.&lt;/p&gt;\\r\\n\\r\\n&lt;p&gt;&lt;img src=&quot;https://cdn02.static-adayroi.com/0/2016/12/01/1480584265513_4402728.jpg&quot; /&gt;&lt;/p&gt;\\r\\n\\r\\n&lt;p&gt;&lt;img src=&quot;https://cdn02.static-adayroi.com/0/2016/12/01/1480585207377_1105804.jpg&quot; /&gt;&lt;/p&gt;\\r\\n\\r\\n&lt;p&gt;&lt;img alt=&quot;&Aacute;o kho&aacute;c kiểu nữ Zenic 63575&quot; src=&quot;https://cdn02.static-adayroi.com/0/2016/12/01/148058521954_2542798.jpg&quot; title=&quot;&Aacute;o kho&aacute;c kiểu nữ Zenic 63575&quot; /&gt;&lt;/p&gt;\\r\\n\\r\\n&lt;p&gt;&lt;strong&gt;Hướng dẫn bảo quản&lt;/strong&gt;&lt;/p&gt;\\r\\n\\r\\n&lt;ul&gt;\\r\\n	&lt;li&gt;Kh&amp;ocirc;ng n&amp;ecirc;n giặt với nước n&amp;oacute;ng&lt;/li&gt;\\r\\n	&lt;li&gt;Kh&amp;ocirc;ng sử dụng chất tẩy&lt;/li&gt;\\r\\n	&lt;li&gt;Kh&amp;ocirc;ng ng&amp;acirc;m x&amp;agrave; ph&amp;ograve;ng qu&amp;aacute; l&amp;acirc;u&lt;/li&gt;\\r\\n	&lt;li&gt;Phơi mặt tr&amp;aacute;i, tr&amp;aacute;nh &amp;aacute;nh nắng mặt trời trực tiếp&lt;/li&gt;\\r\\n&lt;/ul&gt;\\r\\n\\r\\n&lt;p&gt;&lt;strong&gt;Th&amp;ocirc;ng tin thương hiệu&lt;/strong&gt;&lt;/p&gt;\\r\\n\\r\\n&lt;p&gt;Zenic l&amp;agrave; một trong những thương hiệu thời trang nổi tiếng được biết đến ở Việt Nam trong thời gian gần đ&amp;acirc;y. Những sản phẩm của Zenic c&amp;oacute; thiết kế thời thượng, thoải m&amp;aacute;i, tiện dụng nhưng vẫn giữ nguy&amp;ecirc;n được n&amp;eacute;t thanh lịch, nữ t&amp;iacute;nh vốn c&amp;oacute; của ph&amp;aacute;i nữ. Tuy c&amp;aacute;c sản phẩm được Zenic đặt h&amp;agrave;ng tại Việt Nam nhưng tất cả sản phẩm đều phải đạt ti&amp;ecirc;u chuẩn quy định của ch&amp;acirc;u &amp;Acirc;u về chất lượng v&amp;agrave; độ an to&amp;agrave;n cho sức khỏe người d&amp;ugrave;ng. Nhờ vậy, Zenic đ&amp;atilde; v&amp;agrave; đang tạo được sự tin tưởng của kh&amp;aacute;ch h&amp;agrave;ng tr&amp;ecirc;n khắp thế giới.&lt;/p&gt;\\r\\n', 'Áo dạ', 0, NULL, 1, 'Áo khoác kiểu nữ Zenic', 'Áo dạ', '', '{\"category\":{\"status\":\"0\",\"sort\":\"1\",\"display\":\"list\",\"order_by\":\"new\",\"number\":\"1\"},\"brand\":{\"status\":\"0\",\"sort\":\"1\",\"display\":\"list\",\"order_by\":\"new\",\"number\":\"1\"},\"price\":{\"status\":\"0\",\"sort\":\"1\",\"display\":\"list\",\"order_by\":\"new\",\"number\":\"1\",\"range\":\"\"},\"select\":{\"status\":\"0\",\"sort\":\"1\",\"display\":\"list\",\"order_by\":\"new\",\"id_related\":\"\"}}'),
(19, 24, '&lt;p&gt;Lorem ipsum dolor sit amet, consectetur adipisicing elit. Officiis est ipsum soluta ducimus enim, perferendis rem sint similique amet, aspernatur quod repellendus dolor quas eveniet. Nisi odio inventore at ipsa.&lt;/p&gt;\\r\\n', '', 0, NULL, 1, 'Váy hoa', '', '', '{\"category\":{\"status\":\"0\",\"sort\":\"1\",\"display\":\"list\",\"order_by\":\"new\",\"number\":\"1\"},\"brand\":{\"status\":\"0\",\"sort\":\"1\",\"display\":\"list\",\"order_by\":\"new\",\"number\":\"1\"},\"price\":{\"status\":\"0\",\"sort\":\"1\",\"display\":\"list\",\"order_by\":\"new\",\"number\":\"1\",\"range\":\"\"},\"select\":{\"status\":\"0\",\"sort\":\"1\",\"display\":\"list\",\"order_by\":\"new\",\"id_related\":\"20|21\"}}'),
(20, 25, '&lt;p&gt;Lorem ipsum dolor sit amet, consectetur adipisicing elit. Officiis est ipsum soluta ducimus enim, perferendis rem sint similique amet, aspernatur quod repellendus dolor quas eveniet. Nisi odio inventore at ipsa.&lt;/p&gt;\\r\\n', '', 0, NULL, 1, 'Áo so deep', '', '', '{\"category\":{\"status\":\"0\",\"sort\":\"1\",\"display\":\"list\",\"order_by\":\"new\",\"number\":\"1\"},\"brand\":{\"status\":\"0\",\"sort\":\"1\",\"display\":\"list\",\"order_by\":\"new\",\"number\":\"1\"},\"price\":{\"status\":\"0\",\"sort\":\"1\",\"display\":\"list\",\"order_by\":\"new\",\"number\":\"1\",\"range\":\"\"},\"select\":{\"status\":\"0\",\"sort\":\"1\",\"display\":\"list\",\"order_by\":\"new\",\"id_related\":\"22|21\"}}'),
(21, 26, '&lt;p&gt;Lorem ipsum dolor sit amet, consectetur adipisicing elit. Officiis est ipsum soluta ducimus enim, perferendis rem sint similique amet, aspernatur quod repellendus dolor quas eveniet. Nisi odio inventore at ipsa.&lt;/p&gt;\\r\\n', '', 0, NULL, 1, 'Model Chất', '', '', '{\"category\":{\"status\":\"0\",\"sort\":\"1\",\"display\":\"list\",\"order_by\":\"new\",\"number\":\"1\"},\"brand\":{\"status\":\"0\",\"sort\":\"1\",\"display\":\"list\",\"order_by\":\"new\",\"number\":\"1\"},\"price\":{\"status\":\"0\",\"sort\":\"1\",\"display\":\"list\",\"order_by\":\"new\",\"number\":\"1\",\"range\":\"\"},\"select\":{\"status\":\"0\",\"sort\":\"1\",\"display\":\"list\",\"order_by\":\"new\",\"id_related\":\"22|23|20\"}}'),
(22, 27, '&lt;p&gt;Lorem ipsum dolor sit amet, consectetur adipisicing elit. Officiis est ipsum soluta ducimus enim, perferendis rem sint similique amet, aspernatur quod repellendus dolor quas eveniet. Nisi odio inventore at ipsa.&lt;/p&gt;\\r\\n', '', 0, NULL, 1, 'Kính mắt', '', '', '{\"category\":{\"status\":\"0\",\"sort\":\"1\",\"display\":\"list\",\"order_by\":\"new\",\"number\":\"1\"},\"brand\":{\"status\":\"0\",\"sort\":\"1\",\"display\":\"list\",\"order_by\":\"new\",\"number\":\"1\"},\"price\":{\"status\":\"0\",\"sort\":\"1\",\"display\":\"list\",\"order_by\":\"new\",\"number\":\"1\",\"range\":\"\"},\"select\":{\"status\":\"0\",\"sort\":\"1\",\"display\":\"list\",\"order_by\":\"new\",\"id_related\":\"\"}}'),
(23, 28, '&lt;p&gt;Lorem ipsum dolor sit amet, consectetur adipisicing elit. Officiis est ipsum soluta ducimus enim, perferendis rem sint similique amet, aspernatur quod repellendus dolor quas eveniet. Nisi odio inventore at ipsa.&lt;/p&gt;\\r\\n', '', 0, NULL, 1, 'Khăn quàng', '', '', '{\"category\":{\"status\":\"0\",\"sort\":\"1\",\"display\":\"list\",\"order_by\":\"new\",\"number\":\"1\"},\"brand\":{\"status\":\"0\",\"sort\":\"1\",\"display\":\"list\",\"order_by\":\"new\",\"number\":\"1\"},\"price\":{\"status\":\"0\",\"sort\":\"1\",\"display\":\"list\",\"order_by\":\"new\",\"number\":\"1\",\"range\":\"\"},\"select\":{\"status\":\"0\",\"sort\":\"1\",\"display\":\"list\",\"order_by\":\"new\",\"id_related\":\"\"}}'),
(24, 29, '&lt;p&gt;Lorem ipsum dolor sit amet, consectetur adipisicing elit. Officiis est ipsum soluta ducimus enim, perferendis rem sint similique amet, aspernatur quod repellendus dolor quas eveniet. Nisi odio inventore at ipsa.&lt;/p&gt;\\r\\n', '', 0, NULL, 1, 'Bao tay', '', '', '{\"category\":{\"status\":\"0\",\"sort\":\"1\",\"display\":\"list\",\"order_by\":\"new\",\"number\":\"1\"},\"brand\":{\"status\":\"0\",\"sort\":\"1\",\"display\":\"list\",\"order_by\":\"new\",\"number\":\"1\"},\"price\":{\"status\":\"0\",\"sort\":\"1\",\"display\":\"list\",\"order_by\":\"new\",\"number\":\"1\",\"range\":\"\"},\"select\":{\"status\":\"0\",\"sort\":\"1\",\"display\":\"list\",\"order_by\":\"new\",\"id_related\":\"\"}}'),
(25, 30, '&lt;p&gt;Lorem ipsum dolor sit amet, consectetur adipisicing elit. Officiis est ipsum soluta ducimus enim, perferendis rem sint similique amet, aspernatur quod repellendus dolor quas eveniet. Nisi odio inventore at ipsa.&lt;/p&gt;\\r\\n', '', 0, NULL, 1, 'Váy tomato', '', '', '{\"category\":{\"status\":\"0\",\"sort\":\"1\",\"display\":\"list\",\"order_by\":\"new\",\"number\":\"1\"},\"brand\":{\"status\":\"0\",\"sort\":\"1\",\"display\":\"list\",\"order_by\":\"new\",\"number\":\"1\"},\"price\":{\"status\":\"0\",\"sort\":\"1\",\"display\":\"list\",\"order_by\":\"new\",\"number\":\"1\",\"range\":\"\"},\"select\":{\"status\":\"0\",\"sort\":\"1\",\"display\":\"list\",\"order_by\":\"new\",\"id_related\":\"\"}}');

-- --------------------------------------------------------

--
-- Table structure for table `vi_product_image`
--

CREATE TABLE `vi_product_image` (
  `id` int(11) UNSIGNED NOT NULL,
  `id_product` int(11) UNSIGNED NOT NULL DEFAULT '0',
  `avatar` varchar(255) NOT NULL DEFAULT '0',
  `image` text
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `vi_product_image`
--

INSERT INTO `vi_product_image` (`id`, `id_product`, `avatar`, `image`) VALUES
(16, 20, 'products/model7.jpg', '[{\"name\":\"products\\/model7.jpg\",\"att_title\":\"\",\"att_alt\":\"\\t\\t\\t\\t\\t\\t\\t    \\t\\t\\t\\t\\t\\t\\t    \\t\\t\\t\\t\\t\\t\\t    \\t\\t\\t\\t\\t\\t\\t    \\t\\t\\t\\t\\t\\t\\t    \"},{\"name\":\"products\\/model4.jpg\",\"att_title\":\"\",\"att_alt\":\"\\t\\t\\t\\t\\t\\t\\t    \\t\\t\\t\\t\\t\\t\\t    \\t\\t\\t\\t\\t\\t\\t    \\t\\t\\t\\t\\t\\t\\t    \\t\\t\\t\\t\\t\\t\\t    \"},{\"name\":\"products\\/p1.jpg\",\"att_title\":\"\",\"att_alt\":\"\\t\\t\\t\\t\\t\\t\\t    \\t\\t\\t\\t\\t\\t\\t    \\t\\t\\t\\t\\t\\t\\t    \\t\\t\\t\\t\\t\\t\\t    \\t\\t\\t\\t\\t\\t\\t    \"}]'),
(17, 21, 'products/maxb.jpg', '[{\"name\":\"products\\/maxb.jpg\",\"att_title\":\"\",\"att_alt\":\"\"}]'),
(18, 22, 'products/k4.jpg', '[{\"name\":\"products\\/k4.jpg\",\"att_title\":\"\",\"att_alt\":\"\\t\\t\\t\\t\\t\\t\\t    \"},{\"name\":\"products\\/model2.jpg\",\"att_title\":\"\",\"att_alt\":\"\\t\\t\\t\\t\\t\\t\\t    \"},{\"name\":\"products\\/maxb.jpg\",\"att_title\":\"\",\"att_alt\":\"\"}]'),
(19, 23, 'products/1480585523573_1253704.jpg', '[{\"name\":\"products\\/1480585523573_1253704.jpg\",\"att_title\":\"\",\"att_alt\":\"\"},{\"name\":\"products\\/1480585524106_6262311.jpg\",\"att_title\":\"\",\"att_alt\":\"\"}]'),
(20, 24, 'products/model6.jpg', '[{\"name\":\"products\\/model6.jpg\",\"att_title\":\"\",\"att_alt\":\"\\t\\t\\t\\t\\t\\t\\t    \\t\\t\\t\\t\\t\\t\\t    \"},{\"name\":\"products\\/model5.jpg\",\"att_title\":\"\",\"att_alt\":\"\\t\\t\\t\\t\\t\\t\\t    \\t\\t\\t\\t\\t\\t\\t    \"},{\"name\":\"products\\/model3.jpg\",\"att_title\":\"\",\"att_alt\":\"\\t\\t\\t\\t\\t\\t\\t    \\t\\t\\t\\t\\t\\t\\t    \"},{\"name\":\"products\\/model4.jpg\",\"att_title\":\"\",\"att_alt\":\"\\t\\t\\t\\t\\t\\t\\t    \\t\\t\\t\\t\\t\\t\\t    \"}]'),
(21, 25, 'products/model5.jpg', '[{\"name\":\"products\\/model5.jpg\",\"att_title\":\"\",\"att_alt\":\"\\t\\t\\t\\t\\t\\t\\t    \"},{\"name\":\"products\\/model3.jpg\",\"att_title\":\"\",\"att_alt\":\"\\t\\t\\t\\t\\t\\t\\t    \"},{\"name\":\"products\\/model4.jpg\",\"att_title\":\"\",\"att_alt\":\"\\t\\t\\t\\t\\t\\t\\t    \"},{\"name\":\"products\\/model6.jpg\",\"att_title\":\"\",\"att_alt\":\"\\t\\t\\t\\t\\t\\t\\t    \"}]'),
(22, 26, 'products/model4.jpg', '[{\"name\":\"products\\/model3.jpg\",\"att_title\":\"\",\"att_alt\":\"\\t\\t\\t\\t\\t\\t\\t    \"},{\"name\":\"products\\/model4.jpg\",\"att_title\":\"\",\"att_alt\":\"\\t\\t\\t\\t\\t\\t\\t    \"},{\"name\":\"products\\/model5.jpg\",\"att_title\":\"\",\"att_alt\":\"\\t\\t\\t\\t\\t\\t\\t    \"},{\"name\":\"products\\/model6.jpg\",\"att_title\":\"\",\"att_alt\":\"\\t\\t\\t\\t\\t\\t\\t    \"}]'),
(23, 27, 'products/k3.jpg', '[{\"name\":\"products\\/k3.jpg\",\"att_title\":\"\",\"att_alt\":\"\\t\\t\\t\\t\\t\\t\\t    \\t\\t\\t\\t\\t\\t\\t    \\t\\t\\t\\t\\t\\t\\t    \"},{\"name\":\"products\\/k2.jpg\",\"att_title\":\"\",\"att_alt\":\"\\t\\t\\t\\t\\t\\t\\t    \\t\\t\\t\\t\\t\\t\\t    \\t\\t\\t\\t\\t\\t\\t    \"}]'),
(24, 28, 'products/k2.jpg', '[{\"name\":\"products\\/k2.jpg\",\"att_title\":\"\",\"att_alt\":\"\\t\\t\\t\\t\\t\\t\\t    \"},{\"name\":\"products\\/k4.jpg\",\"att_title\":\"\",\"att_alt\":\"\\t\\t\\t\\t\\t\\t\\t    \"}]'),
(25, 29, 'products/k1.jpg', '[{\"name\":\"products\\/k1.jpg\",\"att_title\":\"\",\"att_alt\":\"\\t\\t\\t\\t\\t\\t\\t    \"},{\"name\":\"products\\/k2.jpg\",\"att_title\":\"\",\"att_alt\":\"\\t\\t\\t\\t\\t\\t\\t    \"},{\"name\":\"products\\/k3.jpg\",\"att_title\":\"\",\"att_alt\":\"\\t\\t\\t\\t\\t\\t\\t    \"},{\"name\":\"products\\/k4.jpg\",\"att_title\":\"\",\"att_alt\":\"\\t\\t\\t\\t\\t\\t\\t    \"}]'),
(26, 30, 'products/p1.jpg', '[{\"name\":\"products\\/model6.jpg\",\"att_title\":\"\",\"att_alt\":\"\"},{\"name\":\"products\\/model7.jpg\",\"att_title\":\"\",\"att_alt\":\"\"},{\"name\":\"products\\/p1.jpg\",\"att_title\":\"\",\"att_alt\":\"\"}]');

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
(8, 'Lê Ngọc Cường8', '0981700268', 'cuongle.dev8@gmail.com', 'hghjh', '1476512947', 0);

-- --------------------------------------------------------

--
-- Table structure for table `web_options`
--

CREATE TABLE `web_options` (
  `id` int(10) UNSIGNED NOT NULL,
  `pagination_number` int(11) NOT NULL,
  `comment` tinyint(4) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `web_options`
--

INSERT INTO `web_options` (`id`, `pagination_number`, `comment`) VALUES
(1, 2, 1);

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
  `google_file_json` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
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

INSERT INTO `web_settings` (`id`, `name`, `logo`, `slogan`, `icon`, `phone`, `hotline`, `email`, `email_support`, `address`, `districtid`, `provinceid`, `link_facebook`, `link_google`, `link_youtube`, `link_tt`, `seo_title`, `seo_description`, `seo_keywords`, `google_analytics`, `google_site_verification`, `google_file_json`, `bank_user`, `bank_code`, `bank_name`, `bank_chinhanh`, `bank_tp`, `link_google_map`, `title_sidebar`, `content_sidebar`, `contact_thumbnail`) VALUES
(2, 'Cuongle', 'logo/logo-shop-red.png', 'dfgd', 'favicon.ico', '+84 941 068 949', '+84 941 068 949', 'cuongle.dev@gmail.com', 'cuongle.dev@gmail.com', 'CT6A Xa La, Kiến Hưng, Hanoi, Vietnam', '', '', 'https://fb.com.vn', 'https://google.com.vn', 'https://youtube.com', 'https://twitter.com', 'PHP platform base on Cuongle Framework', 'Cuongle Platform - PHP platform base on Cuongle Framework', 'Cuongle, Cuongle team, Cuongle platform, php platform, php framework, web development', 'UA-86525361-1', '132550957', 'client_secret_916949212857-l1racku3pi9585qptafu9b03vv0feman.apps.googleusercontent.com.json', NULL, NULL, NULL, NULL, NULL, 'https://maps.google.com', NULL, NULL, NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `en_banner_images`
--
ALTER TABLE `en_banner_images`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `en_brand`
--
ALTER TABLE `en_brand`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `en_categories_posts`
--
ALTER TABLE `en_categories_posts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `en_category`
--
ALTER TABLE `en_category`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `en_comments_posts`
--
ALTER TABLE `en_comments_posts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `en_manager_view_home`
--
ALTER TABLE `en_manager_view_home`
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
-- Indexes for table `en_product_basic`
--
ALTER TABLE `en_product_basic`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `en_product_detail`
--
ALTER TABLE `en_product_detail`
  ADD PRIMARY KEY (`id`),
  ADD KEY `index` (`id_product`);

--
-- Indexes for table `en_product_image`
--
ALTER TABLE `en_product_image`
  ADD PRIMARY KEY (`id`),
  ADD KEY `index` (`id_product`);

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
-- Indexes for table `vi_banner_images`
--
ALTER TABLE `vi_banner_images`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `vi_brand`
--
ALTER TABLE `vi_brand`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `vi_categories_posts`
--
ALTER TABLE `vi_categories_posts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `vi_category`
--
ALTER TABLE `vi_category`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `vi_comments_posts`
--
ALTER TABLE `vi_comments_posts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `vi_manager_view_home`
--
ALTER TABLE `vi_manager_view_home`
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
-- Indexes for table `vi_product_basic`
--
ALTER TABLE `vi_product_basic`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `vi_product_detail`
--
ALTER TABLE `vi_product_detail`
  ADD PRIMARY KEY (`id`),
  ADD KEY `index` (`id_product`);

--
-- Indexes for table `vi_product_image`
--
ALTER TABLE `vi_product_image`
  ADD PRIMARY KEY (`id`),
  ADD KEY `index` (`id_product`);

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
-- AUTO_INCREMENT for table `en_banner_images`
--
ALTER TABLE `en_banner_images`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;
--
-- AUTO_INCREMENT for table `en_brand`
--
ALTER TABLE `en_brand`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `en_categories_posts`
--
ALTER TABLE `en_categories_posts`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `en_category`
--
ALTER TABLE `en_category`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `en_comments_posts`
--
ALTER TABLE `en_comments_posts`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `en_manager_view_home`
--
ALTER TABLE `en_manager_view_home`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT;
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
-- AUTO_INCREMENT for table `en_product_basic`
--
ALTER TABLE `en_product_basic`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `en_product_detail`
--
ALTER TABLE `en_product_detail`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `en_product_image`
--
ALTER TABLE `en_product_image`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT;
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
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=38;
--
-- AUTO_INCREMENT for table `vi_banner_images`
--
ALTER TABLE `vi_banner_images`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;
--
-- AUTO_INCREMENT for table `vi_brand`
--
ALTER TABLE `vi_brand`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `vi_categories_posts`
--
ALTER TABLE `vi_categories_posts`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;
--
-- AUTO_INCREMENT for table `vi_category`
--
ALTER TABLE `vi_category`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=102;
--
-- AUTO_INCREMENT for table `vi_comments_posts`
--
ALTER TABLE `vi_comments_posts`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;
--
-- AUTO_INCREMENT for table `vi_manager_view_home`
--
ALTER TABLE `vi_manager_view_home`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;
--
-- AUTO_INCREMENT for table `vi_menu`
--
ALTER TABLE `vi_menu`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=357;
--
-- AUTO_INCREMENT for table `vi_pages`
--
ALTER TABLE `vi_pages`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
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
-- AUTO_INCREMENT for table `vi_product_basic`
--
ALTER TABLE `vi_product_basic`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;
--
-- AUTO_INCREMENT for table `vi_product_detail`
--
ALTER TABLE `vi_product_detail`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;
--
-- AUTO_INCREMENT for table `vi_product_image`
--
ALTER TABLE `vi_product_image`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;
--
-- AUTO_INCREMENT for table `web_contacts`
--
ALTER TABLE `web_contacts`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
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
