-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th8 24, 2018 lúc 11:52 AM
-- Phiên bản máy phục vụ: 10.1.30-MariaDB
-- Phiên bản PHP: 7.2.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `htprshop`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `attributes`
--

CREATE TABLE `attributes` (
  `id` int(11) NOT NULL,
  `name` varchar(150) COLLATE utf8mb4_unicode_ci NOT NULL,
  `value` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `type` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` datetime DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `banner`
--

CREATE TABLE `banner` (
  `id` int(11) NOT NULL,
  `name` varchar(200) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `link_image` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL,
  `link` varchar(200) COLLATE utf8mb4_unicode_ci DEFAULT '#',
  `ordering` int(11) DEFAULT '0',
  `status` tinyint(4) DEFAULT '0',
  `created_at` datetime DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `banner`
--

INSERT INTO `banner` (`id`, `name`, `link_image`, `link`, `ordering`, `status`, `created_at`) VALUES
(2, 'brands 1', 'brands_1.jpg', 'http://localhost:88/C1709I/', 1, 1, '2018-08-08 23:29:34'),
(3, 'brands GG', 'brands_2.jpg', 'http://localhost:88/C1709I/', 2, 1, '2018-08-08 23:30:03'),
(4, 'brands mi', 'brands_3.jpg', 'http://localhost:88/C1709I/', 3, 1, '2018-08-08 23:30:39'),
(5, 'brands ss', 'brands_4.jpg', 'http://localhost:88/C1709I/', 4, 1, '2018-08-08 23:31:00'),
(6, 'brands apple', 'brands_5.jpg', 'http://localhost:88/C1709I/', 5, 1, '2018-08-08 23:31:20'),
(7, 'brands sony', 'brands_6.jpg', 'http://localhost:88/C1709I/', 6, 1, '2018-08-08 23:31:40'),
(8, 'brands oneplus', 'brands_7.jpg', 'http://localhost:88/C1709I/', 7, 1, '2018-08-08 23:32:11'),
(9, 'brands meizu', 'brands_8.jpg', 'http://localhost:88/C1709I/', 8, 1, '2018-08-08 23:32:35'),
(10, 'banner bg', 'banner_background.jpg', 'http://localhost:88/C1709I/', 9, 1, '2018-08-08 23:34:26'),
(11, 'Banner bg 2', 'banner_2_background.jpg', 'http://localhost:8888/c1709i/', 10, 1, '2018-08-11 02:29:17'),
(13, 'Smartphones & Tablets', 'popular_1.png', '', 0, 1, '2018-08-16 22:21:17'),
(14, 'Computers & Laptops', 'popular_2.png', '', 0, 1, '2018-08-16 22:21:46'),
(15, 'Gadgets', 'popular_3.png', '', 0, 1, '2018-08-16 22:22:02'),
(16, 'Video Games & Consoles', 'popular_4.png', '', 0, 1, '2018-08-16 22:22:15'),
(17, 'Accessories', 'popular_5.png', '', 0, 1, '2018-08-16 22:22:29');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `category`
--

CREATE TABLE `category` (
  `id` int(11) NOT NULL,
  `name` varchar(150) COLLATE utf8mb4_unicode_ci NOT NULL,
  `parent` int(11) DEFAULT '0',
  `status` tinyint(4) DEFAULT '1',
  `created_at` datetime DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `category`
--

INSERT INTO `category` (`id`, `name`, `parent`, `status`, `created_at`) VALUES
(1, 'Computers & Laptops', 0, 1, '2018-08-02 13:58:10'),
(2, 'Cameras & Photos', 0, 1, '2018-08-02 13:58:19'),
(3, 'Hardware', 0, 1, '2018-08-02 13:58:32'),
(4, 'Smartphones & Tablets', 0, 1, '2018-08-02 13:58:42'),
(5, 'TV & Audio', 0, 1, '2018-08-02 13:58:53'),
(6, 'Gadgets', 0, 1, '2018-08-02 13:59:45'),
(7, 'Car Electronics', 0, 1, '2018-08-02 13:59:59'),
(8, 'Video Games & Consoles', 0, 1, '2018-08-02 14:00:15'),
(9, 'Accessories', 0, 1, '2018-08-02 14:01:47');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `orders`
--

CREATE TABLE `orders` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `status` tinyint(4) DEFAULT '0',
  `created_at` datetime DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `orders`
--

INSERT INTO `orders` (`id`, `user_id`, `status`, `created_at`) VALUES
(1, 3, 2, '2018-08-22 18:19:55'),
(2, 3, 2, '2018-08-24 11:17:50'),
(3, 3, 1, '2018-08-24 15:51:49');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `order_detail`
--

CREATE TABLE `order_detail` (
  `order_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `quantity` int(11) NOT NULL,
  `price` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `order_detail`
--

INSERT INTO `order_detail` (`order_id`, `product_id`, `quantity`, `price`) VALUES
(1, 15, 1, 379),
(2, 45, 1, 2000),
(3, 4, 1, 255),
(3, 3, 1, 225);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `post`
--

CREATE TABLE `post` (
  `id` int(11) NOT NULL,
  `name` varchar(200) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `image` varchar(200) COLLATE utf8mb4_unicode_ci DEFAULT '#',
  `description` text COLLATE utf8mb4_unicode_ci,
  `status` tinyint(4) DEFAULT '0',
  `created_at` datetime DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `post`
--

INSERT INTO `post` (`id`, `name`, `image`, `description`, `status`, `created_at`) VALUES
(1, 'Vivamus sed nunc in arcu cursus mollis quis et orci. Interdum et malesuada.', 'blog_1.jpg', '', 1, '2018-08-18 21:30:17'),
(2, 'Cras lobortis nisl nec libero pulvinar lacinia. Nunc sed ullamcorper massa.', 'blog_2.jpg', '', 1, '2018-08-18 21:31:22'),
(3, 'Fusce tincidunt nulla magna, ac euismod quam viverra id. Fusce eget metus feugiat', 'blog_3.jpg', '', 1, '2018-08-18 21:31:32'),
(4, 'Etiam leo nibh, consectetur nec orci et, tempus tempus ex', 'blog_4.jpg', '', 1, '2018-08-18 21:31:45'),
(5, 'Sed viverra pellentesque dictum. Aenean ligula justo, viverra in lacus porttitor', 'blog_5.jpg', '', 1, '2018-08-18 21:32:00'),
(6, 'In nisl tortor, tempus nec ex vitae, bibendum rutrum mi. Integer tempus nisi', 'blog_6.jpg', '', 1, '2018-08-18 21:32:11'),
(7, 'Make Life Easier on Yourself by Accepting “Good Enough.” Don’t Pursue Perfection.', 'blog_7.jpg', '', 1, '2018-08-18 21:32:27'),
(8, '13 Reasons You Are Failing At Life And Becoming A Bum', 'blog_8.jpg', '', 1, '2018-08-18 21:32:39'),
(9, '4 Steps to Getting Anything You Want In Life<', 'blog_9.jpg', '', 1, '2018-08-18 21:32:59');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `product`
--

CREATE TABLE `product` (
  `id` int(11) NOT NULL,
  `name` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL,
  `category_id` int(11) NOT NULL,
  `image` varchar(200) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description` text COLLATE utf8mb4_unicode_ci,
  `note` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `price` float DEFAULT NULL,
  `sale_price` float DEFAULT NULL,
  `status` tinyint(4) DEFAULT '1',
  `created_at` datetime DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `product`
--

INSERT INTO `product` (`id`, `name`, `category_id`, `image`, `description`, `note`, `price`, `sale_price`, `status`, `created_at`) VALUES
(1, 'Canon STM Kit', 2, 'featured_5.png', 'A camera is an optical instrument for recording or capturing images, which may be stored locally, transmitted to another location, or both. The images may be individual still photographs or sequences of images constituting videos or movies. The camera is a remote sensing device as it senses subjects without any contact . ', 'sale', 349, 300, 1, '2018-08-06 22:27:28'),
(2, 'Canon IXUS 175', 2, 'new_10.jpg', 'A camera is an optical instrument for recording or capturing images, which may be stored locally, transmitted to another location, or both. The images may be individual still photographs or sequences of images constituting videos or movies. The camera is a remote sensing device as it senses subjects without any contact . ', 'new', 379, 0, 1, '2018-08-06 22:28:33'),
(3, 'Samsung J330F', 4, 'best_4.png', 'A camera is an optical instrument for recording or capturing images, which may be stored locally, transmitted to another location, or both. The images may be individual still photographs or sequences of images constituting videos or movies. The camera is a remote sensing device as it senses subjects without any contact . ', 'sale', 300, 225, 1, '2018-08-06 22:29:24'),
(4, 'Lenovo IdeaPad', 1, 'featured_7.png', 'A camera is an optical instrument for recording or capturing images, which may be stored locally, transmitted to another location, or both. The images may be individual still photographs or sequences of images constituting videos or movies. The camera is a remote sensing device as it senses subjects without any contact . ', '', 255, 0, 1, '2018-08-06 22:30:01'),
(5, 'Digitus EDNET...', 9, 'featured_8.png', 'A smartphone is a handheld personal computer. It possesses extensive computing capabilities, including high-speed access to the Internet using both Wi-Fi and mobile broadband. Most, if not all, smartphones are also built with support for Bluetooth and satellite navigation.', '', 379, 0, 1, '2018-08-06 22:32:00'),
(6, 'Astro M2 Black', 5, 'new_1.jpg', 'A smartphone is a handheld personal computer. It possesses extensive computing capabilities, including high-speed access to the Internet using both Wi-Fi and mobile broadband. Most, if not all, smartphones are also built with support for Bluetooth and satellite navigation.', 'new', 255, 0, 1, '2018-08-06 22:32:48'),
(7, 'Transcend T.Sonic', 9, 'new_2.jpg', 'A smartphone is a handheld personal computer. It possesses extensive computing capabilities, including high-speed access to the Internet using both Wi-Fi and mobile broadband. Most, if not all, smartphones are also built with support for Bluetooth and satellite navigation.', 'new', 255, 0, 1, '2018-08-06 22:34:16'),
(8, 'Xiaomi Band 2...', 9, 'new_3.jpg', 'A smartphone is a handheld personal computer. It possesses extensive computing capabilities, including high-speed access to the Internet using both Wi-Fi and mobile broadband. Most, if not all, smartphones are also built with support for Bluetooth and satellite navigation.', 'new', 255, 0, 1, '2018-08-06 22:35:07'),
(9, 'Rapoo T8 White', 6, 'new_4.jpg', 'A smartphone is a handheld personal computer. It possesses extensive computing capabilities, including high-speed access to the Internet using both Wi-Fi and mobile broadband. Most, if not all, smartphones are also built with support for Bluetooth and satellite navigation.', 'new', 379, 0, 1, '2018-08-06 22:37:28'),
(10, 'Huawei MediaPad...', 4, 'best_6.png', 'A smartphone is a handheld personal computer. It possesses extensive computing capabilities, including high-speed access to the Internet using both Wi-Fi and mobile broadband. Most, if not all, smartphones are also built with support for Bluetooth and satellite navigation.', 'sale', 300, 225, 1, '2018-08-06 22:38:56'),
(11, 'Nokia 3310 (2017)', 4, 'new_6.jpg', 'A smartphone is a handheld personal computer. It possesses extensive computing capabilities, including high-speed access to the Internet using both Wi-Fi and mobile broadband. Most, if not all, smartphones are also built with support for Bluetooth and satellite navigation.', 'new', 379, 0, 1, '2018-08-06 22:40:06'),
(12, 'Rapoo 7100p Gray', 9, 'new_7.jpg', 'A smartphone is a handheld personal computer. It possesses extensive computing capabilities, including high-speed access to the Internet using both Wi-Fi and mobile broadband. Most, if not all, smartphones are also built with support for Bluetooth and satellite navigation.', 'new', 255, 0, 1, '2018-08-06 22:45:04'),
(13, 'Canon EF', 2, 'new_8.jpg', 'A camera is an optical instrument for recording or capturing images, which may be stored locally, transmitted to another location, or both. The images may be individual still photographs or sequences of images constituting videos or movies. The camera is a remote sensing device as it senses subjects without any contact . ', 'new', 379, 0, 1, '2018-08-06 22:45:35'),
(14, 'Gembird SPK-103', 6, 'new_9.jpg', 'A camera is an optical instrument for recording or capturing images, which may be stored locally, transmitted to another location, or both. The images may be individual still photographs or sequences of images constituting videos or movies. The camera is a remote sensing device as it senses subjects without any contact . ', 'new', 255, 0, 1, '2018-08-06 22:46:31'),
(15, 'Canon STM Kit...', 2, 'featured_5.png', 'A camera is an optical instrument for recording or capturing images, which may be stored locally, transmitted to another location, or both. The images may be individual still photographs or sequences of images constituting videos or movies. The camera is a remote sensing device as it senses subjects without any contact . ', '', 379, 0, 1, '2018-08-06 22:46:57'),
(16, 'Philips BT6900A', 9, 'new_5.jpg', 'A smartphone is a handheld personal computer. It possesses extensive computing capabilities, including high-speed access to the Internet using both Wi-Fi and mobile broadband. Most, if not all, smartphones are also built with support for Bluetooth and satellite navigation.', 'new', 255, 0, 1, '2018-08-06 22:47:25'),
(17, 'Huawei MediaPad...', 4, 'view_4.jpg', 'A smartphone is a handheld personal computer. It possesses extensive computing capabilities, including high-speed access to the Internet using both Wi-Fi and mobile broadband. Most, if not all, smartphones are also built with support for Bluetooth and satellite navigation.', 'sale', 300, 255, 1, '2018-08-06 22:47:59'),
(18, 'Apple iPod shuffle', 5, 'featured_2.png', 'A smartphone is a handheld personal computer. It possesses extensive computing capabilities, including high-speed access to the Internet using both Wi-Fi and mobile broadband. Most, if not all, smartphones are also built with support for Bluetooth and satellite navigation.', 'new', 379, 0, 1, '2018-08-06 22:48:58'),
(19, 'Sony MDRZX310W', 5, 'featured_3.png', 'A camera is an optical instrument for recording or capturing images, which may be stored locally, transmitted to another location, or both. The images may be individual still photographs or sequences of images constituting videos or movies. The camera is a remote sensing device as it senses subjects without any contact . ', 'new', 255, 0, 1, '2018-08-06 22:49:23'),
(20, 'LUNA Smartphone', 4, 'featured_4.png', 'A smartphone is a handheld personal computer. It possesses extensive computing capabilities, including high-speed access to the Internet using both Wi-Fi and mobile broadband. Most, if not all, smartphones are also built with support for Bluetooth and satellite navigation.', '', 379, 0, 1, '2018-08-06 22:49:46'),
(21, 'Jump White', 6, 'trends_1.jpg', 'A camera is an optical instrument for recording or capturing images, which may be stored locally, transmitted to another location, or both. The images may be individual still photographs or sequences of images constituting videos or movies. The camera is a remote sensing device as it senses subjects without any contact . ', 'trends', 379, 0, 1, '2018-08-08 23:28:41'),
(22, 'Samsung Charm ...', 6, 'best_5.png', 'A smartphone is a handheld personal computer. It possesses extensive computing capabilities, including high-speed access to the Internet using both Wi-Fi and mobile broadband. Most, if not all, smartphones are also built with support for Bluetooth and satellite navigation.', 'best', 379, 0, 1, '2018-08-08 23:29:46'),
(23, 'DJI Phantom 3 ...', 6, 'trends_3.jpg', 'A smartphone is a handheld personal computer. It possesses extensive computing capabilities, including high-speed access to the Internet using both Wi-Fi and mobile broadband. Most, if not all, smartphones are also built with support for Bluetooth and satellite navigation.', 'trends', 379, 0, 1, '2018-08-08 23:30:27'),
(24, 'Xiaomi Redmi Note 4', 4, 'best_1.png', 'A smartphone is a handheld personal computer. It possesses extensive computing capabilities, including high-speed access to the Internet using both Wi-Fi and mobile broadband. Most, if not all, smartphones are also built with support for Bluetooth and satellite navigation.', 'best', 300, 255, 1, '2018-08-08 23:31:27'),
(25, 'Samsung Charm Gold', 4, 'best_4.png', 'A smartphone is a handheld personal computer. It possesses extensive computing capabilities, including high-speed access to the Internet using both Wi-Fi and mobile broadband. Most, if not all, smartphones are also built with support for Bluetooth and satellite navigation.', 'best', 300, 255, 1, '2018-08-08 23:33:31'),
(26, 'Beoplay H7', 3, 'best_3.png', 'A smartphone is a handheld personal computer. It possesses extensive computing capabilities, including high-speed access to the Internet using both Wi-Fi and mobile broadband. Most, if not all, smartphones are also built with support for Bluetooth and satellite navigation.', 'best', 300, 255, 1, '2018-08-08 23:36:07'),
(27, 'MacBook Air 13', 1, 'banner_2_product.png', 'MacBook Pro elevates the notebook to a whole new level of performance and portability. Wherever your ideas take you, you’ll get there faster than ever with high‑performance processors and memory, advanced graphics, blazing‑fast storage, and more.', 'banner', 379, 300, 1, '2018-08-08 23:38:34'),
(28, 'Trends 2018', 3, 'adv_1.png', '', 'adv', 300, 255, 1, '2018-08-08 23:39:05'),
(29, 'Trends 2018', 3, 'adv_2.png', '', 'adv', 255, 0, 1, '2018-08-08 23:39:24'),
(30, 'Trends 2018', 3, 'adv_3.png', '', 'adv', 255, 0, 1, '2018-08-08 23:39:44'),
(31, 'Brandon Flowers', 8, 'review_2.jpg', 'A smartphone is a handheld personal computer. It possesses extensive computing capabilities, including high-speed access to the Internet using both Wi-Fi and mobile broadband. Most, if not all, smartphones are also built with support for Bluetooth and satellite navigation.', '', 349, 0, 1, '2018-08-08 23:40:28'),
(43, 'Beoplay H7', 5, 'deals.png', '', 'deals', 300, 225, 1, '2018-08-09 19:05:01'),
(44, 'Bracelet', 6, 'trends_2.jpg', '', 'trends', 500, 0, 1, '2018-08-09 19:13:41'),
(45, 'Macbook Pro', 1, 'single_4.jpg', 'MacBook Pro elevates the notebook to a whole new level of performance and portability. Wherever your ideas take you, you’ll get there faster than ever with high‑performance processors and memory, advanced graphics, blazing‑fast storage, and more.', '', 2000, 0, 1, '2018-08-09 22:45:39'),
(46, 'Huawei MediaPad...', 4, 'featured_1.png', '', 'sale', 300, 225, 1, '2018-08-11 01:27:14'),
(47, 'Apple Iphone 6s', 4, 'banner_product.png', '', '', 530, 460, 1, '2018-08-16 21:53:59'),
(48, 'Macbook Pro', 1, 'banner_2_product.png', 'Now equipped with seventh-generation Intel Core processors, MacBook is snappier than ever.', '', 2000, 0, 1, '2018-08-16 22:44:52'),
(49, 'Macbook Pro ', 1, 'banner_2_product1.png', 'Now equipped with seventh-generation Intel Core processors, MacBook is snappier than ever.', '', 2000, 0, 1, '2018-08-16 22:45:33'),
(50, 'Macbook Pro', 1, 'banner_2_product2.jpg', 'Now equipped with seventh-generation Intel Core processors, MacBook is snappier than ever.', '', 2000, 0, 1, '2018-08-16 22:46:07'),
(51, 'Luna smart Phone', 4, 'new_single.png', '', 'new_single', 379, 0, 1, '2018-08-17 16:22:10');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `product_attribute`
--

CREATE TABLE `product_attribute` (
  `product_id` int(11) NOT NULL,
  `attribute_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `product_image`
--

CREATE TABLE `product_image` (
  `id` int(11) NOT NULL,
  `link_img` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL,
  `product_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `product_image`
--

INSERT INTO `product_image` (`id`, `link_img`, `product_id`) VALUES
(1, 'single_1.jpg', 45),
(2, 'single_2.jpg', 45),
(3, 'single_3.jpg', 45);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `receiver`
--

CREATE TABLE `receiver` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `order_id` int(11) NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `address` varchar(10000) COLLATE utf8mb4_unicode_ci NOT NULL,
  `payment_method` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `receiver`
--

INSERT INTO `receiver` (`id`, `user_id`, `order_id`, `name`, `email`, `phone`, `address`, `payment_method`) VALUES
(1, 3, 3, 'Hoàng', 'trungdt@gmail.com', '01234260199', 'Nghệ An', 1);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` varchar(20) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `image` varchar(250) COLLATE utf8mb4_unicode_ci NOT NULL,
  `address` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `gender` tinyint(4) DEFAULT '1',
  `birthday` date DEFAULT NULL,
  `password` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `group_name` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT 'customer',
  `created_at` datetime DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `users`
--

INSERT INTO `users` (`id`, `username`, `name`, `email`, `phone`, `image`, `address`, `gender`, `birthday`, `password`, `group_name`, `created_at`) VALUES
(1, 'admin', 'Nguyễn Hoàng Trung', 'admin_1tech@gmail.com', '01234260199', '', 'Nghệ An', 1, '1999-01-26', 'admin', 'admin', '2018-08-09 00:36:08'),
(3, 'hoangtrung9937', 'Hoàng Trung', 'trung9937@gmail.com', '01684693524', '', 'Nghệ An', 1, '1999-01-26', 'trung9937', 'customer', '2018-08-09 13:42:49'),
(6, 'phucmnp11', 'Mai Nhân phúc', 'phucmnp@gmail.com', '0968608169', '', 'Thái Thụy, Thái Bình', 1, '1999-05-01', '123456', 'admin', '2018-08-22 21:06:35');

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `attributes`
--
ALTER TABLE `attributes`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `name` (`name`);

--
-- Chỉ mục cho bảng `banner`
--
ALTER TABLE `banner`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `name` (`name`);

--
-- Chỉ mục cho bảng `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`),
  ADD KEY `FK_orders_user` (`user_id`);

--
-- Chỉ mục cho bảng `order_detail`
--
ALTER TABLE `order_detail`
  ADD KEY `FK_order_detail_orders` (`order_id`),
  ADD KEY `FK_order_detail_product` (`product_id`);

--
-- Chỉ mục cho bảng `post`
--
ALTER TABLE `post`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`id`),
  ADD KEY `FK_product_category` (`category_id`);

--
-- Chỉ mục cho bảng `product_attribute`
--
ALTER TABLE `product_attribute`
  ADD KEY `FK_product_attribute_product` (`product_id`),
  ADD KEY `FK_product_attribute_attributes` (`attribute_id`);

--
-- Chỉ mục cho bảng `product_image`
--
ALTER TABLE `product_image`
  ADD PRIMARY KEY (`id`),
  ADD KEY `FK_product_img_product` (`product_id`);

--
-- Chỉ mục cho bảng `receiver`
--
ALTER TABLE `receiver`
  ADD PRIMARY KEY (`id`),
  ADD KEY `FK_receiver_user` (`user_id`),
  ADD KEY `FK_receiver_order` (`order_id`);

--
-- Chỉ mục cho bảng `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`),
  ADD UNIQUE KEY `username` (`username`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `attributes`
--
ALTER TABLE `attributes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `banner`
--
ALTER TABLE `banner`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT cho bảng `category`
--
ALTER TABLE `category`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT cho bảng `orders`
--
ALTER TABLE `orders`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT cho bảng `post`
--
ALTER TABLE `post`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT cho bảng `product`
--
ALTER TABLE `product`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=52;

--
-- AUTO_INCREMENT cho bảng `product_image`
--
ALTER TABLE `product_image`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT cho bảng `receiver`
--
ALTER TABLE `receiver`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT cho bảng `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- Các ràng buộc cho các bảng đã đổ
--

--
-- Các ràng buộc cho bảng `orders`
--
ALTER TABLE `orders`
  ADD CONSTRAINT `FK_orders_user` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

--
-- Các ràng buộc cho bảng `order_detail`
--
ALTER TABLE `order_detail`
  ADD CONSTRAINT `FK_order_detail_orders` FOREIGN KEY (`order_id`) REFERENCES `orders` (`id`),
  ADD CONSTRAINT `FK_order_detail_product` FOREIGN KEY (`product_id`) REFERENCES `product` (`id`);

--
-- Các ràng buộc cho bảng `product`
--
ALTER TABLE `product`
  ADD CONSTRAINT `FK_product_category` FOREIGN KEY (`category_id`) REFERENCES `category` (`id`) ON DELETE CASCADE;

--
-- Các ràng buộc cho bảng `product_attribute`
--
ALTER TABLE `product_attribute`
  ADD CONSTRAINT `FK_product_attribute_attributes` FOREIGN KEY (`attribute_id`) REFERENCES `attributes` (`id`),
  ADD CONSTRAINT `FK_product_attribute_product` FOREIGN KEY (`product_id`) REFERENCES `product` (`id`) ON DELETE CASCADE;

--
-- Các ràng buộc cho bảng `product_image`
--
ALTER TABLE `product_image`
  ADD CONSTRAINT `FK_product_img_product` FOREIGN KEY (`product_id`) REFERENCES `product` (`id`) ON DELETE CASCADE;

--
-- Các ràng buộc cho bảng `receiver`
--
ALTER TABLE `receiver`
  ADD CONSTRAINT `FK_receiver_order` FOREIGN KEY (`order_id`) REFERENCES `orders` (`id`),
  ADD CONSTRAINT `FK_receiver_user` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
