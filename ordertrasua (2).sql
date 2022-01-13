-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 11, 2022 at 03:27 PM
-- Server version: 10.4.22-MariaDB
-- PHP Version: 8.0.13

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ordertrasua`
--

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE `category` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`id`, `name`, `created_at`, `updated_at`) VALUES
(1, 'TRÀ SỮA', NULL, NULL),
(2, 'TRÀ TRÁI CÂY', NULL, NULL),
(5, 'KEM SỮA', NULL, NULL),
(6, 'ĐẶC BIỆT', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `comments`
--

CREATE TABLE `comments` (
  `id` int(11) NOT NULL,
  `customer_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `comment` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `comments`
--

INSERT INTO `comments` (`id`, `customer_id`, `product_id`, `comment`, `created_at`, `updated_at`) VALUES
(1, 18, 3, 'ngon ', NULL, NULL),
(2, 25, 2, 'chat luong', NULL, NULL),
(3, 25, 2, 'chat luong', NULL, NULL),
(4, 25, 2, 'chat luong', NULL, NULL),
(5, 25, 2, 'chat luong', NULL, NULL),
(6, 26, 3, 'chat', NULL, NULL),
(7, 26, 3, 'chat', NULL, NULL),
(8, 26, 3, 'chat', NULL, NULL),
(9, 24, 7, 'siiiii', NULL, NULL),
(10, 24, 7, 'o toke', NULL, NULL),
(11, 24, 7, 'o toke', NULL, NULL),
(12, 24, 7, 'o toke', NULL, NULL),
(13, 25, 1, 'ngon lam nha', NULL, NULL),
(14, 25, 1, 'ngon lam nha', NULL, NULL),
(15, 25, 1, 'ok nha', NULL, NULL),
(16, 25, 7, 'ok nha\r\nddc ma', NULL, NULL),
(17, 25, 6, 'dien', NULL, NULL),
(18, 29, 7, 'dien', NULL, NULL),
(19, 29, 7, 'ok nha', NULL, NULL),
(20, 33, 2, 'ngon lam nha', '2022-01-07 14:55:13', '2022-01-07 14:55:13'),
(21, 36, 7, 'ngon quá nè', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `customers`
--

CREATE TABLE `customers` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(255) NOT NULL,
  `dateOfBirth` date NOT NULL,
  `sex` tinyint(1) NOT NULL,
  `address` varchar(100) NOT NULL,
  `phone` varchar(20) NOT NULL,
  `user_id` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `customers`
--

INSERT INTO `customers` (`id`, `name`, `email`, `password`, `dateOfBirth`, `sex`, `address`, `phone`, `user_id`, `created_at`, `updated_at`) VALUES
(1, 'Trâm Anh', '', '', '2011-11-02', 1, '21 Ngô Gia Tự, Nha Trang, Khánh Hòa', '023456789', 3, NULL, NULL),
(4, 'abcded', '', '', '2021-12-03', 1, '113 Lê Thánh Tôn, Nha Trang, Khánh Hòa', '0123456789', 3, NULL, NULL),
(5, 'thynguyen', 'thy@gmail.com', '', '2000-08-08', 0, '08 Ngô Gia Tự, Nha Trang, Khánh Hòa', '0122016990', 3, NULL, NULL),
(18, 'dien08', 'dien08@gmail.com', '$2y$10$8A/70GGfylJNesriCbbzx.GTuUOaZCAX/wR/0ChN4y7pb2r7r1fMC', '2000-08-08', 0, '08 Ngô Gia Tự, Nha Trang, Khánh Hòa', '0122016994', 3, NULL, NULL),
(21, 'nguyễn diễn', 'dien08082k@gmail.com', '$2y$10$FXcbBlWDCFHkisCpZybz/e7uBp7NtYJbQXF.JsDrfrWuSQ1t0Yxj6', '2000-08-08', 1, 'Khánh Nhơn, Nhơn Hải, Ninh Hải, Ninh Thuận', '012201690', 3, NULL, NULL),
(22, 'nhom33', 'nhom33@gmail.com', '$2y$10$1c8Fji1orihfb1.j2FnaOe6iV1NQU5OdH0G8KwfYO5tRPA0A9KXrS', '2000-08-08', 0, '252KB Cu Lao Thuong, Nha Trang', '01222016990', 33, NULL, NULL),
(23, 'nhom31', 'nhom3@gmail.com', '$2y$10$Fyqd3NaAq5a6qyJhvZmeD.f0VLmpwCJ1glyY20tSc5xLOE2S8MOZW', '2000-08-08', 0, '252KB Cu Lao Thuong, Nha Trang', '01222016990', 34, NULL, NULL),
(24, 'nhom311', 'nhom311@gmail.com', '$2y$10$frB/KGOyVvyGNXOpVfHkVu0sKbYD4m6q8VxMTYVEBaNma4A4CyDeW', '2000-08-08', 0, '252KB Cu Lao Thuong, Nha Trang', '01222016990', 36, NULL, NULL),
(25, 'dien321', 'Dien321@gmail.com', '$2y$10$kpEZy46S0Vl05FMZjQaap.yjz5MB/x5SmFrKkRfllBRQM/LpDejQa', '2000-08-08', 1, '18D-NhaTrang, Khanhhoa, Vietnam', '0916099423', 37, NULL, NULL),
(26, 'dien3211', 'Dien3211@gmail.com', '$2y$10$Z.k8edRenX1Z8swRau7fW.la9K5WTEzr6USoTu5FV1sxJQfE5gZse', '2000-08-08', 1, '18D-NhaTrang, Khanhhoa, Vietnam', '0916099423', 38, NULL, NULL),
(27, 'tu chia ai', 'tuchiaaiii@gmail.com', '$2y$10$nIsWB0u1GldreN80oUFcr.lwoR6JjRMFlKuXVj5ZiiiLOfW4eSKmG', '2000-08-08', 1, 'Khanh Nhon 1', '01222222992', 42, NULL, NULL),
(28, 'tu chia ai', 'tuchiaaiiii@gmail.com', '$2y$10$gMrSGbtnSLtYlV0pqEY29e0Oocq5Ll4vauZxX9rFnVSyC.xF61K6K', '2000-08-08', 1, 'Khanh Nhon 1', '01222222992', 43, NULL, NULL),
(29, 'cuoi nha', 'cuoinha@gmail.com', '$2y$10$Ig54wa66zkFW5cESrGnOdOpcjih/jpMz6LhyLJ1GCxCGAr116kK2u', '2000-08-08', 1, 'VinhTho, NhaTrang, KhanhHoa', '01234444444', 44, NULL, NULL),
(30, 'xaunha', 'xaunha@gmail.com', '$2y$10$6RI.RmH6..pf8x0Cm.SaMOIzsKtFZ/gwsArkdxsMEZomOSBVABoPi', '2000-08-08', 1, 'Vinh tho, nha trang, kahnh ha', '0129999778', 45, NULL, '2022-01-09 04:40:45'),
(31, 'diennha2', 'diennha2@gmail.com', '$2y$10$94sIuKs56Dohx36ozKSiqOlnN47HVNjaavVjfp2F.jFVPbEVWcg46', '2000-08-08', 1, 'vinhtho, nha trang', '01234567822', 46, NULL, NULL),
(32, 'diennha2', 'diennha22@gmail.com', '$2y$10$IkgfWQF0ZsUts6/sAkisY.D.38Ce3NwIUC8DDLvGGE5hvhblksmxm', '2000-08-08', 1, 'vinhtho, nha trang', '01234567822', 47, '2022-01-07 14:33:29', '2022-01-07 14:33:29'),
(33, 'diennhaa', 'diennhaa@gmail.com', '$2y$10$KbEicz4hCVeZzaqovW5LAe.t1O..xyoD3NLu0V5gYpiMjWqXCnZRq', '2000-08-08', 0, 'VinhTho, NhaTrang, KhanhHoa', '0999977777', 48, '2022-01-07 14:52:16', '2022-01-07 14:52:16'),
(34, 'hoangviet', 'viet@gmail.com', '$2y$10$ziaQTgZgo2HXz.JnwCw.SuyN26cNmAeb77bSWKqIbFemkLeot7vYu', '2022-01-11', 1, 'france', '9028374983', 49, '2022-01-09 05:14:16', '2022-01-09 05:14:16'),
(35, 'hoangviet12', 'viet12@gmail.com', '$2y$10$ZWgt2mg/X13sZ9pQ6W/85.jpU7JahEXPDUSALICyzadqgYwbblC72', '2022-01-11', 1, 'france', '9028374983', 50, '2022-01-09 05:15:19', '2022-01-09 05:15:19'),
(36, 'hoangviet', 'viet88@gmail.com', '$2y$10$FyvZ9C3ldHtGIWyQrjtPaOjoshBjIPZVh8t25RgF9rc2APpUYaXXO', '2022-01-03', 1, 'france', '9028374983', 51, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2016_06_01_000001_create_oauth_auth_codes_table', 1),
(2, '2016_06_01_000002_create_oauth_access_tokens_table', 1),
(3, '2016_06_01_000003_create_oauth_refresh_tokens_table', 1),
(4, '2016_06_01_000004_create_oauth_clients_table', 1),
(5, '2016_06_01_000005_create_oauth_personal_access_clients_table', 1),
(6, '2019_12_14_000001_create_personal_access_tokens_table', 1);

-- --------------------------------------------------------

--
-- Table structure for table `oauth_access_tokens`
--

CREATE TABLE `oauth_access_tokens` (
  `id` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `client_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `scopes` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `revoked` tinyint(1) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `expires_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `oauth_auth_codes`
--

CREATE TABLE `oauth_auth_codes` (
  `id` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `client_id` bigint(20) UNSIGNED NOT NULL,
  `scopes` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `revoked` tinyint(1) NOT NULL,
  `expires_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `oauth_clients`
--

CREATE TABLE `oauth_clients` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `secret` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `provider` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `redirect` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `personal_access_client` tinyint(1) NOT NULL,
  `password_client` tinyint(1) NOT NULL,
  `revoked` tinyint(1) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `oauth_personal_access_clients`
--

CREATE TABLE `oauth_personal_access_clients` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `client_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `oauth_refresh_tokens`
--

CREATE TABLE `oauth_refresh_tokens` (
  `id` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `access_token_id` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `revoked` tinyint(1) NOT NULL,
  `expires_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id` int(11) NOT NULL,
  `customer_id` int(11) NOT NULL,
  `table_id` int(10) UNSIGNED DEFAULT NULL,
  `total` int(11) NOT NULL,
  `status` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `address` varchar(100) NOT NULL,
  `phone` varchar(20) NOT NULL,
  `note` varchar(255) NOT NULL,
  `order_date` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`id`, `customer_id`, `table_id`, `total`, `status`, `name`, `address`, `phone`, `note`, `order_date`, `created_at`, `updated_at`) VALUES
(89, 30, 1, 80000, 1, 'xaunha', 'Vinh tho, nha trang, kahnh ha', '0129999778', 'dc hen', '2022-01-08', '2022-01-08 04:29:53', '2022-01-08 04:29:53'),
(90, 30, 1, 80000, 0, 'xaunha', 'Vinh tho, nha trang, kahnh ha', '0129999778', 'dc hen', '2022-01-08', '2022-01-08 04:30:05', '2022-01-08 04:30:05'),
(91, 30, 1, 130000, 1, 'xaunha', 'Vinh tho, nha trang, kahnh ha', '0129999778', 'dc nha', '2022-01-08', '2022-01-08 04:31:15', '2022-01-08 04:31:15'),
(92, 35, 1, 90000, 1, 'hoangviet12', 'france', '9028374983', 'không có', '2022-01-09', '2022-01-09 05:19:37', '2022-01-09 05:19:37'),
(93, 36, 1, 50000, 2, 'hoangviet', 'france', '9028374983', 'không có', '2022-01-09', NULL, NULL),
(94, 36, 1, 40000, 1, 'hoangviet', 'france', '9028374983', 'không có', '2022-01-09', NULL, NULL),
(95, 36, 1, 90000, 1, 'hoangviet', 'france', '9028374983', 'không có', '2022-01-09', NULL, NULL),
(96, 36, 1, 125000, 1, 'hoangviet', 'france', '9028374983', 'không có', '2022-01-09', NULL, NULL),
(97, 36, 1, 115000, 1, 'hoangviet', 'france', '9028374983', 'không có', '2022-01-09', NULL, NULL),
(98, 36, 1, 35000, 0, 'hoangviet', 'france', '9028374983', 'không có', '2022-01-09', NULL, NULL),
(99, 36, 1, 30000, 0, 'hoangviet', 'france', '9028374983', 'không có', '2022-01-09', NULL, NULL),
(100, 36, 1, 30000, 0, 'hoangviet', 'france', '9028374983', 'không có', '2022-01-10', NULL, NULL),
(101, 36, 1, 30000, 1, 'hoangviet', 'france', '9028374983', 'không có', '2022-01-10', NULL, NULL),
(102, 36, 1, 235000, 1, 'hoangviet', 'france', '9028374983', 'không có', '2022-01-11', NULL, NULL),
(103, 36, 1, 20000, 1, 'hoangviet', 'france', '9028374983', 'không có', '2022-01-11', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `order_details`
--

CREATE TABLE `order_details` (
  `order_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `listTopping` varchar(255) NOT NULL,
  `quantity` int(11) NOT NULL,
  `size_id` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `order_details`
--

INSERT INTO `order_details` (`order_id`, `product_id`, `listTopping`, `quantity`, `size_id`, `created_at`, `updated_at`) VALUES
(89, 1, 'Trân châu, Thạch', 2, 2, '2022-01-08 04:29:53', '2022-01-08 04:29:53'),
(90, 1, 'Trân châu, Cream cheese', 2, 2, '2022-01-08 04:30:05', '2022-01-08 04:30:05'),
(91, 1, 'Trân châu, Cream cheese', 2, 2, '2022-01-08 04:31:15', '2022-01-08 04:31:15'),
(92, 2, 'Trân châu,Thạch', 2, 2, NULL, NULL),
(92, 3, 'Không thêm', 2, 2, NULL, NULL),
(92, 5, 'Không thêm', 2, 1, '2022-01-09 05:19:37', '2022-01-09 05:19:37'),
(93, 5, 'Thạch, Cream cheese', 1, 2, NULL, NULL),
(94, 1, 'Trân châu, Đào', 1, 2, NULL, NULL),
(95, 3, 'Thạch, Trân châu, Khúc bạch, Cream cheese, Đào', 1, 1, NULL, NULL),
(95, 6, 'Thạch, Trân châu, Cream cheese', 1, 1, NULL, NULL),
(96, 3, 'Không thêm', 2, 2, NULL, NULL),
(96, 6, 'Thạch', 2, 2, NULL, NULL),
(97, 3, 'Không thêm', 1, 2, NULL, NULL),
(97, 9, 'Thạch, Trân châu, Cream cheese, Đào', 2, 3, NULL, NULL),
(98, 7, 'Thạch, Cream cheese', 1, 2, NULL, NULL),
(99, 9, 'Thạch, Cream cheese', 1, 1, NULL, NULL),
(100, 4, 'Không thêm', 1, 1, NULL, NULL),
(101, 1, 'Thạch, Cream cheese', 1, 2, NULL, NULL),
(102, 5, 'Không thêm', 5, 1, NULL, NULL),
(102, 24, 'Thạch, Trân châu, Khúc bạch, Cream cheese, Đào', 5, 1, NULL, NULL),
(103, 5, 'Không thêm', 1, 1, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) NOT NULL,
  `token` varchar(255) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `password_resets`
--

INSERT INTO `password_resets` (`email`, `token`, `created_at`) VALUES
('dien08082k@gmail.com', '$2y$10$8ap1oTbod8noGWDx5NcjaOGliV4o/sZSP64jQLp/qluBLbd6ytYXa', '2021-12-15 13:51:04');

-- --------------------------------------------------------

--
-- Table structure for table `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tokenable_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `abilities` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `desc` text NOT NULL,
  `price` int(11) NOT NULL,
  `price_cost` int(11) NOT NULL,
  `size_id` int(11) NOT NULL,
  `image` varchar(255) NOT NULL,
  `category_id` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `name`, `desc`, `price`, `price_cost`, `size_id`, `image`, `category_id`, `created_at`, `updated_at`) VALUES
(1, 'Trà sữa hoa lài', 'Thơm,ngon', 15000, 10000, 1, '1641813206.png', 1, NULL, NULL),
(2, 'Trà đào', 'Đào thơm lừng', 27000, 25000, 1, '1641721512.png', 2, NULL, NULL),
(3, 'Trà sữa truyền thống', 'Truyền thống', 20000, 15000, 1, '1641813543.png', 1, '2021-11-20 08:53:15', NULL),
(4, 'Lục trà', 'Lục trà', 30000, 20000, 1, '1641721553.png', 2, '2021-11-10 08:53:15', NULL),
(5, 'Matcha đậu đỏ', 'Matcha đậu đỏ', 20000, 15000, 1, '1641813597.png', 1, '2021-10-06 08:58:29', NULL),
(6, 'Trà sữa ô long', 'Thơm,ngon', 15000, 10000, 1, '1641813343.png', 1, '2021-11-02 08:58:29', NULL),
(7, 'Trà sữa thái xanh', 'Thái xanh', 20000, 15000, 1, '1641721480.png', 1, NULL, NULL),
(9, 'Trà sữa khoai môn', 'thơm,ngon', 20000, 15000, 1, '1641813626.png', 1, NULL, NULL),
(11, 'Trà sen', 'trà sen', 15000, 10000, 1, '1641813826.png', 2, NULL, NULL),
(12, 'Trà ổi hồng', 'trà ổi hồng', 18000, 10000, 1, '1641813880.png', 2, NULL, NULL),
(13, 'Trà ô long vải', 'trà ô long vải', 18000, 10000, 1, '1641813944.png', 2, NULL, NULL),
(14, 'Trà xoài', 'trà xoài', 15000, 10000, 1, '1641813997.png', 2, NULL, NULL),
(15, 'Trà ô long creama', 'trà ô long creama', 22000, 17000, 1, '1641873574.png', 5, NULL, NULL),
(16, 'Trà đen creama', 'trà đen creama', 22000, 17000, 1, '1641873856.png', 5, NULL, NULL),
(17, 'Lục trà creama', 'lục trà creama', 22000, 17000, 1, '1641873898.png', 5, NULL, NULL),
(18, 'Hồng trà creama', 'hồng trà creama', 20000, 15000, 1, '1641873943.png', 5, NULL, NULL),
(19, 'Trà sen creama', 'trà sen creama', 25000, 20000, 1, '1641873988.png', 5, NULL, NULL),
(20, 'Matcha oreo', 'matcha oreo', 22000, 17000, 1, '1641876151.png', 5, NULL, NULL),
(21, 'Trà sữa lài trứng đậu đỏ', 'trà sữa lài trứng đậu đỏ', 25000, 20000, 1, '1641876633.png', 6, NULL, NULL),
(22, 'Lục trà xoài macchiato', 'lục trà xoài macchiato', 25000, 20000, 1, '1641878410.png', 6, NULL, NULL),
(23, 'Hồng trà chanh xí muội', 'hồng trà chanh xí muội', 23000, 18000, 1, '1641878533.png', 6, NULL, NULL),
(24, 'Yogurt việt quất', 'yogurt việt quất', 22000, 17000, 1, '1641878693.png', 6, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `roles`
--

CREATE TABLE `roles` (
  `id` int(11) NOT NULL,
  `name` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `roles`
--

INSERT INTO `roles` (`id`, `name`) VALUES
(1, 'admin'),
(2, 'khách hàng 1'),
(3, 'khách hàng');

-- --------------------------------------------------------

--
-- Table structure for table `size`
--

CREATE TABLE `size` (
  `id` int(11) NOT NULL,
  `name` varchar(20) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `size`
--

INSERT INTO `size` (`id`, `name`, `created_at`, `updated_at`) VALUES
(1, 'M', NULL, NULL),
(2, 'L', NULL, NULL),
(3, 'XL', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `statistical`
--

CREATE TABLE `statistical` (
  `id` int(11) NOT NULL,
  `order_date` varchar(255) NOT NULL,
  `sales` int(11) NOT NULL,
  `profit` int(11) NOT NULL,
  `quantity` int(11) NOT NULL,
  `order_total` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `statistical`
--

INSERT INTO `statistical` (`id`, `order_date`, `sales`, `profit`, `quantity`, `order_total`) VALUES
(6, '2022-01-08', 230000, 40000, 8, 4),
(7, '2022-01-09', 653000, 128000, 22, 13),
(8, '2022-01-11', 280000, 55000, 11, 3),
(9, '2022-01-10', 25000, 5000, 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `tb_table`
--

CREATE TABLE `tb_table` (
  `id` int(11) NOT NULL,
  `name` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `toppings`
--

CREATE TABLE `toppings` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `price` int(11) NOT NULL,
  `image` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `toppings`
--

INSERT INTO `toppings` (`id`, `name`, `price`, `image`, `created_at`, `updated_at`) VALUES
(1, 'Thạch', 5000, '1641721652.jpg', NULL, NULL),
(2, 'Trân châu', 5000, '1641721663.jpg', NULL, NULL),
(3, 'Khúc bạch', 5000, '1641721688.jpg', NULL, NULL),
(4, 'Cream cheese', 5000, '1641721774.jpg', NULL, NULL),
(5, 'Đào', 5000, '1641728780.jpg', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `name` varchar(30) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(255) NOT NULL,
  `remember_token` varchar(100) DEFAULT NULL,
  `roles_id` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `password`, `remember_token`, `roles_id`, `created_at`, `updated_at`) VALUES
(2, 'Dien', 'dien@gmail.com', '$2y$10$cCg3yW8d0S9qVyHExv/F..5tCzU.JYYWocU2Whp68qF6mxb2P0HN.', '', 3, NULL, '2022-01-06 11:05:06'),
(3, 'Trâm Anh', 'tramanh@gmail.com', '$2y$10$9Z3/B6CaUG04vn0Xdzh3HukmIDncnUKtUVFxhgdvTGfwQKcAqqBcW', '', 3, NULL, '2022-01-06 11:22:51'),
(4, 'dien08', 'dien08@gmail.com', '$2y$10$TKAoSFhGnqI1XdHZLRqZV./d0TSURVOwJIjfCyLd1dNlaFbRyAEVK', NULL, 3, '2021-12-08 01:08:31', '2021-12-08 01:08:31'),
(9, 'dien082', 'dien0808@gmail.com', '$2y$10$g6bTXiBq3yamtWOjOlkfCeANszYyfYEtf5ftACrs8yPZgudDh9RUu', NULL, 3, '2021-12-11 07:19:17', '2021-12-11 07:19:17'),
(23, 'dien12', 'dien1323@gmail.com', '$2y$10$9e2dVEpRjdKliufiFA777OIUJ5JP//WnXz7rAshYiJSXAMGNuDPA2', NULL, 3, '2021-12-11 09:15:08', '2021-12-11 09:15:08'),
(25, 'dien11', 'dien11@gmail.com', '$2y$10$/J5V16JUJnNhxMJCVu46Ne/vZNgtwDfChGVtfTUTxLs/VuI/q4XBq', NULL, 3, '2021-12-11 09:17:34', '2021-12-11 09:17:34'),
(29, 'dien12345', 'dien12345@gmail.com', '$2y$10$beErq7nzT92R87QPp81P1ebFhm5PQIamQblXg8KAtgeGUFuM083Im', NULL, 3, '2021-12-20 02:14:51', '2022-01-06 11:24:06'),
(30, 'dienne', 'dienne@gmail.com', '$2y$10$vbz7lQtwOKYRTNtyKaDkuug/IXsvmMNKfXKCjJoc6dbLedCkVsjAG', NULL, 3, '2021-12-20 05:26:50', '2021-12-20 05:26:50'),
(33, 'nhom33', 'nhom33@gmail.com', '$2y$10$1c8Fji1orihfb1.j2FnaOe6iV1NQU5OdH0G8KwfYO5tRPA0A9KXrS', NULL, 3, '2022-01-01 02:45:55', '2022-01-01 02:45:55'),
(34, 'nhom31', 'nhom3@gmail.com', '$2y$10$Fyqd3NaAq5a6qyJhvZmeD.f0VLmpwCJ1glyY20tSc5xLOE2S8MOZW', NULL, 3, '2022-01-01 03:03:56', '2022-01-01 03:03:56'),
(36, 'nhom311', 'nhom311@gmail.com', '$2y$10$frB/KGOyVvyGNXOpVfHkVu0sKbYD4m6q8VxMTYVEBaNma4A4CyDeW', NULL, 3, '2022-01-01 04:06:00', '2022-01-01 04:06:00'),
(37, 'dien321', 'Dien321@gmail.com', '$2y$10$ceWkHiMumKEw17TmAqaU5eW1Wq9H979BTN0zHrwF6WZmtVV4kXi9e', NULL, 3, '2022-01-01 04:06:47', '2022-01-06 10:57:52'),
(38, 'dien3211', 'Dien3211@gmail.com', '$2y$10$Z.k8edRenX1Z8swRau7fW.la9K5WTEzr6USoTu5FV1sxJQfE5gZse', NULL, 3, '2022-01-01 04:08:05', '2022-01-01 04:08:05'),
(39, 'dien nha', 'diennha@gmail.com', '$2y$10$zx32dZMnhaCRxmVqMInxf.BNj.ubdU2BozRe89Rz4OBjZqJqyjqU2', NULL, 3, '2022-01-05 14:05:36', '2022-01-05 14:05:36'),
(40, 'tu chia ai', 'tuchiaai@gmail.com', '$2y$10$/xQTjq.zqkjdd118pXvQnu2F9uvNjW9qKrWOYOu9HWuqQN9yEOj.S', NULL, 3, '2022-01-06 08:26:00', '2022-01-06 08:26:00'),
(41, 'tu chia ai', 'tuchiaaii@gmail.com', '$2y$10$ggu56AyA06M/WTsK5dgc6uPS8cqw7uiYP7tbIp78zOiYzwsQIwOHO', NULL, 3, '2022-01-06 08:27:59', '2022-01-06 08:27:59'),
(42, 'tu chia ai', 'tuchiaaiii@gmail.com', '$2y$10$KIxjzBwUX1LMyxaDBBobgOzybTqN/K4oAx1uF6p0KXCD4rOdaVXja', NULL, 3, '2022-01-06 08:28:48', '2022-01-06 08:28:48'),
(43, 'tu chia ai', 'tuchiaaiiii@gmail.com', '$2y$10$FHWf1D9OeHg/afqkNyEgguy2F..dh8dk9fK0aOyFp.v3laAqOQoTa', NULL, 3, '2022-01-06 08:30:00', '2022-01-06 08:30:00'),
(44, 'cuoi nha', 'cuoinha@gmail.com', '$2y$10$3rNlNdWgnfVaHpBnScFtXO6a3RC5abRIdxTlfMv8YXAW9Y609lo.6', NULL, 3, '2022-01-06 08:39:25', '2022-01-07 01:58:18'),
(45, 'xaunha', 'xaunha@gmail.com', '$2y$10$JWU4nTXVLex.6HAJVh974uRefdOk6tcoaj/HCQRN0Ym3LpsUfpLEi', NULL, 3, '2022-01-07 01:41:04', '2022-01-09 04:40:45'),
(46, 'diennha2', 'diennha2@gmail.com', '$2y$10$XesCuJD8g.SVIlNVKJxl7u2bJqzDxXGZf8OX13rDOio21hfJdGnKy', NULL, 3, '2022-01-07 14:31:34', '2022-01-07 14:31:34'),
(47, 'diennha2', 'diennha22@gmail.com', '$2y$10$PNxlT9ddbOLIPcDdffGANOaI40CVkMgNJ43RvBZQmpx/LQ7lCe6ai', NULL, 3, '2022-01-07 14:33:29', '2022-01-07 14:33:29'),
(48, 'diennhaa', 'diennhaa@gmail.com', '$2y$10$zOQJ45hDGrAnPvZhXa83MecAwJWQkuXvsPcMj6PWUs4QwSnnUBDee', NULL, 3, '2022-01-07 14:52:16', '2022-01-07 14:52:16'),
(49, 'hoangviet', 'viet@gmail.com', '$2y$10$C1XizhYrI3nqXJkeWXLinuR6T1.aZMrEr.yHrqKh15t8dGJsFpSLG', NULL, 3, '2022-01-09 05:14:16', '2022-01-09 05:14:16'),
(50, 'hoangviet12', 'viet12@gmail.com', '$2y$10$23JmzfUy0eH5K98NMbXIV.CwmsVuFAnitji0BKiI1Q4lqP7NKcj0q', NULL, 3, '2022-01-09 05:15:19', '2022-01-09 05:15:19'),
(51, 'hoangviet', 'viet88@gmail.com', '$2y$10$5n67aatcESF2Ylnu2/txzOQ/47pAYGg1d8oRrD.xMUnWe/g9Ox.5m', NULL, 3, '2022-01-09 11:14:30', '2022-01-09 11:14:30');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `comments`
--
ALTER TABLE `comments`
  ADD PRIMARY KEY (`id`),
  ADD KEY `customer_id` (`customer_id`),
  ADD KEY `product_id` (`product_id`);

--
-- Indexes for table `customers`
--
ALTER TABLE `customers`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `oauth_access_tokens`
--
ALTER TABLE `oauth_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD KEY `oauth_access_tokens_user_id_index` (`user_id`);

--
-- Indexes for table `oauth_auth_codes`
--
ALTER TABLE `oauth_auth_codes`
  ADD PRIMARY KEY (`id`),
  ADD KEY `oauth_auth_codes_user_id_index` (`user_id`);

--
-- Indexes for table `oauth_clients`
--
ALTER TABLE `oauth_clients`
  ADD PRIMARY KEY (`id`),
  ADD KEY `oauth_clients_user_id_index` (`user_id`);

--
-- Indexes for table `oauth_personal_access_clients`
--
ALTER TABLE `oauth_personal_access_clients`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `oauth_refresh_tokens`
--
ALTER TABLE `oauth_refresh_tokens`
  ADD PRIMARY KEY (`id`),
  ADD KEY `oauth_refresh_tokens_access_token_id_index` (`access_token_id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`),
  ADD KEY `customer_id` (`customer_id`);

--
-- Indexes for table `order_details`
--
ALTER TABLE `order_details`
  ADD PRIMARY KEY (`order_id`,`product_id`),
  ADD KEY `product_id` (`product_id`),
  ADD KEY `size_id` (`size_id`);

--
-- Indexes for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`),
  ADD KEY `category_id` (`category_id`),
  ADD KEY `size_id` (`size_id`);

--
-- Indexes for table `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `size`
--
ALTER TABLE `size`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `statistical`
--
ALTER TABLE `statistical`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tb_table`
--
ALTER TABLE `tb_table`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `toppings`
--
ALTER TABLE `toppings`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD KEY `roles_id` (`roles_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `comments`
--
ALTER TABLE `comments`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `customers`
--
ALTER TABLE `customers`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `oauth_clients`
--
ALTER TABLE `oauth_clients`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `oauth_personal_access_clients`
--
ALTER TABLE `oauth_personal_access_clients`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=104;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT for table `roles`
--
ALTER TABLE `roles`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `size`
--
ALTER TABLE `size`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `statistical`
--
ALTER TABLE `statistical`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `tb_table`
--
ALTER TABLE `tb_table`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `toppings`
--
ALTER TABLE `toppings`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=52;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `comments`
--
ALTER TABLE `comments`
  ADD CONSTRAINT `comments_ibfk_1` FOREIGN KEY (`customer_id`) REFERENCES `customers` (`id`),
  ADD CONSTRAINT `comments_ibfk_2` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`);

--
-- Constraints for table `customers`
--
ALTER TABLE `customers`
  ADD CONSTRAINT `customers_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

--
-- Constraints for table `orders`
--
ALTER TABLE `orders`
  ADD CONSTRAINT `orders_ibfk_1` FOREIGN KEY (`customer_id`) REFERENCES `customers` (`id`);

--
-- Constraints for table `order_details`
--
ALTER TABLE `order_details`
  ADD CONSTRAINT `order_details_ibfk_1` FOREIGN KEY (`order_id`) REFERENCES `orders` (`id`),
  ADD CONSTRAINT `order_details_ibfk_2` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`),
  ADD CONSTRAINT `order_details_ibfk_3` FOREIGN KEY (`size_id`) REFERENCES `size` (`id`);

--
-- Constraints for table `products`
--
ALTER TABLE `products`
  ADD CONSTRAINT `products_ibfk_1` FOREIGN KEY (`category_id`) REFERENCES `category` (`id`),
  ADD CONSTRAINT `products_ibfk_2` FOREIGN KEY (`size_id`) REFERENCES `size` (`id`);

--
-- Constraints for table `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `users_ibfk_1` FOREIGN KEY (`roles_id`) REFERENCES `roles` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
