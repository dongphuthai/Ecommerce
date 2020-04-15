-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th4 15, 2020 lúc 05:23 PM
-- Phiên bản máy phục vụ: 10.4.6-MariaDB
-- Phiên bản PHP: 7.3.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `laravel_ecommerce`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `admins`
--

CREATE TABLE `admins` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone_no` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `avatar` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'Super Admin' COMMENT 'Admin|Super Admin',
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `admins`
--

INSERT INTO `admins` (`id`, `name`, `email`, `password`, `phone_no`, `avatar`, `type`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Laxus', 'phuthai.lgbg.96.tp@gmail.com', '$2y$10$eajYcP0eoFojAFlKkxlPP.ECvRkcl.wlPKeRGRPASFkDE11XI70ty', '0989748373', NULL, 'Super Admin', 'ZExzwh86NGU6Su1eShDp5FhOki22Nq3MZ6yEY3mqaDW6M5E15aOWL8y6qPWj', '2020-03-12 02:19:00', '2020-03-12 06:31:20');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `brands`
--

CREATE TABLE `brands` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `brands`
--

INSERT INTO `brands` (`id`, `name`, `description`, `image`, `created_at`, `updated_at`) VALUES
(1, 'SAMSUNG', 'samsung', '1585228296.jpg', '2020-03-06 02:15:08', '2020-03-26 06:11:36'),
(3, 'VIVO', 'vivo', '1585228267.jpg', '2020-03-06 04:00:23', '2020-03-26 06:11:07'),
(4, 'OPPO', 'OPPO', '1585228187.png', '2020-03-06 05:17:49', '2020-03-26 06:09:47'),
(5, 'Huawei', 'Huawei', '1585228135.jpg', '2020-03-08 07:06:54', '2020-03-26 06:08:55'),
(6, 'XIAOMI', 'Xiaomi', '1585228124.jpg', '2020-03-08 07:07:35', '2020-03-26 06:10:33'),
(7, 'VsMART', 'Vsmart', '1585228103.png', '2020-03-16 06:25:16', '2020-03-26 06:10:21'),
(8, 'iPhone', 'Iphone', '1585228083.jpg', '2020-03-20 02:54:46', '2020-03-26 06:09:59'),
(9, 'realme', 'realme', '1585228335.png', '2020-03-26 06:12:15', '2020-03-26 06:12:15'),
(10, 'iPad', 'iPad', '1585228372.jpg', '2020-03-26 06:12:52', '2020-03-26 06:12:52'),
(11, 'DELL', 'DELL', '1585228388.jpg', '2020-03-26 06:13:08', '2020-03-26 06:13:08'),
(12, 'ASUS', 'asus', '1585228413.jpg', '2020-03-26 06:13:33', '2020-03-26 06:13:33'),
(13, 'HP', 'hp', '1585228428.jpg', '2020-03-26 06:13:48', '2020-03-26 06:13:48'),
(14, 'Lenovo', 'Lenovo', '1585228489.jpg', '2020-03-26 06:14:49', '2020-03-26 06:14:49'),
(15, 'MacBook', 'Macbook', 'macbook-1585816618.png', '2020-03-26 06:15:19', '2020-04-02 01:36:58'),
(16, 'Bigshop', 'Bigshop', '1585398327.png', '2020-03-28 05:25:27', '2020-03-28 05:25:27'),
(17, 'Apple', 'APPLE', '1585645937.jpg', '2020-03-31 02:12:17', '2020-03-31 02:12:17');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `carts`
--

CREATE TABLE `carts` (
  `id` int(10) UNSIGNED NOT NULL,
  `product_id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `order_id` bigint(20) UNSIGNED DEFAULT NULL,
  `ip_address` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `product_quantity` int(11) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `carts`
--

INSERT INTO `carts` (`id`, `product_id`, `user_id`, `order_id`, `ip_address`, `product_quantity`, `created_at`, `updated_at`) VALUES
(64, 77, 15, NULL, '::1', 1, '2020-04-14 00:35:14', '2020-04-14 00:35:14'),
(65, 98, 15, NULL, '::1', 1, '2020-04-14 00:35:14', '2020-04-14 00:35:14');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `categories`
--

CREATE TABLE `categories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `parent_id` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `categories`
--

INSERT INTO `categories` (`id`, `name`, `description`, `image`, `parent_id`, `created_at`, `updated_at`, `slug`) VALUES
(29, 'Laptop', 'Laptop', 'laptop-1585876660.png', NULL, '2020-03-06 00:50:24', '2020-04-08 04:26:57', 'laptop'),
(30, 'Máy cũ', 'Old machine', 'may-cu-1585876940.png', NULL, '2020-03-06 00:50:40', '2020-04-08 04:27:26', 'may-cu'),
(32, 'Điện thoại', 'Smart Phone', 'dien-thoai-1585876704.png', NULL, '2020-03-06 05:36:08', '2020-04-08 04:27:31', 'dien-thoai'),
(33, 'Tablet', 'Tablet', 'tablet-1585877770.png', NULL, '2020-03-06 05:36:57', '2020-04-08 04:27:36', 'tablet'),
(41, 'Đồng hồ', 'Watches', 'dong-ho-1585876723.png', NULL, '2020-03-18 17:59:52', '2020-04-08 04:27:43', 'dong-ho'),
(42, 'Dell', 'Computer', 'dell-1585986400.png', 29, '2020-03-18 18:14:03', '2020-04-08 04:27:48', 'dell'),
(44, 'Macbook', 'Laptop', 'macbook-1585987646.png', 29, '2020-03-26 05:49:27', '2020-04-08 04:28:29', 'macbook'),
(45, 'Phụ kiện', 'Accessories', 'phu-kien-1585876734.png', NULL, '2020-03-26 05:57:20', '2020-04-08 04:27:53', 'phu-kien'),
(46, 'Thời trang', 'Fashion Watch', '1585230586.png', 41, '2020-03-26 06:03:35', '2020-04-08 04:28:36', 'thoi-trang'),
(47, 'Điện tử', 'Smart Watch', '1585230596.png', 41, '2020-03-26 06:04:57', '2020-04-08 04:28:44', 'dien-tu'),
(48, 'iPhone', NULL, '1585228675.jpg', 32, '2020-03-26 06:17:55', '2020-04-08 04:28:54', 'iphone'),
(49, 'Samsung', NULL, '1585228772.jpg', 32, '2020-03-26 06:19:32', '2020-04-08 04:28:59', 'samsung'),
(50, 'Oppo', NULL, '1585228920.png', 32, '2020-03-26 06:22:00', '2020-03-26 06:22:00', 'oppo'),
(51, 'Lenovo', NULL, 'lenovo-1585987830.png', 29, '2020-03-26 06:22:37', '2020-04-04 01:10:30', 'lenovo'),
(52, 'Realme', NULL, '1585228980.png', 32, '2020-03-26 06:23:00', '2020-03-26 06:23:00', 'realme'),
(53, 'Vsmart', NULL, '1585229032.png', 32, '2020-03-26 06:23:52', '2020-03-26 06:23:52', 'vsmart'),
(54, 'Vivo', NULL, '1585229050.jpg', 32, '2020-03-26 06:24:10', '2020-03-26 06:24:10', 'vivo'),
(55, 'Hp', NULL, 'hp-1585988371.jpg', 29, '2020-03-26 06:25:22', '2020-04-04 01:19:31', 'hp'),
(56, 'Samsung Tablet', NULL, '1585229151.jpg', 33, '2020-03-26 06:25:52', '2020-04-08 04:29:07', 'samsung-tablet'),
(57, 'Ipad', 'ipad', '1585229202.jpg', 33, '2020-03-26 06:26:42', '2020-03-26 06:26:42', 'ipad'),
(58, 'Pin dự phòng', 'pin', '1585398125.png', 45, '2020-03-28 05:07:11', '2020-03-28 05:22:05', 'pin-du-phong'),
(59, 'Tai nghe', 'Tai nghe', '1585398018.png', 45, '2020-03-28 05:20:18', '2020-03-28 05:20:18', 'tai-nghe'),
(60, 'Sạc, Cáp', 'Sạc, Cáp', '1585398512.png', 45, '2020-03-28 05:28:32', '2020-04-10 04:56:55', 'sac-cap'),
(61, 'Thẻ nhớ', 'Thẻ nhớ', '1585398551.png', 45, '2020-03-28 05:29:11', '2020-03-28 05:29:11', 'the-nho'),
(62, 'Chuột', 'Chuột', '1585400660.png', 45, '2020-03-28 06:04:20', '2020-03-28 06:04:20', 'chuot'),
(63, 'Điện thoại cũ', 'Điện thoại cũ', 'dien-thoai-cu-1585988743.png', 30, '2020-03-30 00:24:50', '2020-04-04 01:25:43', 'dien-thoai-cu'),
(64, 'Asus', 'Asus', 'asus-1585988553.png', 29, '2020-03-30 00:38:42', '2020-04-04 01:22:33', 'asus'),
(65, 'Loa', 'Loa', '1585645284.jpg', 45, '2020-03-31 02:01:24', '2020-03-31 02:01:24', 'loa'),
(66, 'Dây đeo', 'Dây đồng hồ', '1585646459.jpg', 41, '2020-03-31 02:20:59', '2020-04-04 07:39:01', 'day-deo'),
(67, 'Công nghệ', '24h Công nghệ', 'cong-nghe-1585878219.png', NULL, '2020-03-31 06:59:36', '2020-04-08 04:28:03', 'cong-nghe'),
(68, 'Xiaomi', 'Xiaomi', 'xiaomi-1585976494.jpg', 32, '2020-04-03 21:57:11', '2020-04-03 22:01:34', 'xiaomi'),
(70, 'BlackBerry', 'BlackBerry', 'blackberry-1585976269.png', 32, '2020-04-03 21:57:49', '2020-04-03 21:57:49', 'blackberry'),
(71, 'Nokia', 'Nokia', 'nokia-1585976405.jpg', 32, '2020-04-03 22:00:05', '2020-04-03 22:00:05', 'nokia'),
(72, 'Masstel', 'Masstel', 'masstel-1585976444.png', 32, '2020-04-03 22:00:44', '2020-04-03 22:00:44', 'masstel'),
(73, 'Định vị trẻ em', 'Định vị trẻ em', 'dinh-vi-tre-em-1585989945.png', 41, '2020-04-04 01:45:45', '2020-04-08 04:29:14', 'dinh-vi-tre-em');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `cmtrates`
--

CREATE TABLE `cmtrates` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `rating_id` int(10) UNSIGNED NOT NULL,
  `cmtrating` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `cmtrates`
--

INSERT INTO `cmtrates` (`id`, `rating_id`, `cmtrating`, `created_at`, `updated_at`, `user_id`) VALUES
(1, 31, 'Hao pin thật ạ.', '2020-04-11 07:30:17', '2020-04-11 07:30:17', 15),
(2, 31, 'Ổn', '2020-04-11 07:47:01', '2020-04-11 07:47:01', 16),
(3, 26, 'Máy ổn', '2020-04-11 07:49:47', '2020-04-11 07:49:47', 19),
(5, 24, 'Máy tốt', '2020-04-11 16:46:05', '2020-04-11 16:46:05', 16),
(7, 24, 'Máy ổn', '2020-04-11 16:47:19', '2020-04-11 16:47:19', 19),
(10, 18, 'Mang đi sửa đi', '2020-04-11 16:49:47', '2020-04-11 16:49:47', 16),
(11, 18, 'Không lỗi nhé', '2020-04-11 17:44:22', '2020-04-11 17:44:22', 20),
(12, 54, 'Cam mình dùng tốt nhé', '2020-04-11 17:45:31', '2020-04-11 17:45:31', 20),
(13, 61, 'chưa dùng thử nên nói vậy, cứ dùng thử đi rồi hãy phán tôi có tự an ủi không', '2020-04-12 01:21:03', '2020-04-12 01:21:03', 16),
(16, 26, 'Không lag', '2020-04-12 05:36:08', '2020-04-12 05:36:08', 20),
(17, 24, 'Máy êm', '2020-04-12 05:43:14', '2020-04-12 05:43:14', 20),
(25, 18, 'Bạn thử mang đến cửa hàng xem sao', '2020-04-12 07:24:08', '2020-04-12 07:24:08', 20),
(56, 56, 'Ngon thật không', '2020-04-12 20:47:03', '2020-04-12 20:47:03', 19),
(57, 56, 'Thấy chụp ảnh cũng đc đấy', '2020-04-12 20:47:18', '2020-04-12 20:47:18', 19),
(58, 37, 'Tốt mà cho 2 sao', '2020-04-13 00:29:14', '2020-04-13 00:29:14', 23),
(59, 37, 'Tốt mà cho 2 sao', '2020-04-13 00:29:41', '2020-04-13 00:29:41', 23),
(60, 37, 'Kì ghê', '2020-04-13 00:31:10', '2020-04-13 00:31:10', 23),
(61, 26, 'Mỗi tội đắt tiền', '2020-04-13 00:50:57', '2020-04-13 00:50:57', 23),
(62, 31, 'Không có gg à', '2020-04-13 00:51:58', '2020-04-13 00:51:58', 23),
(115, 36, 'Sau sẽ nóng nhiều đấy', '2020-04-13 01:55:34', '2020-04-13 01:55:34', 23),
(118, 14, 'Cũng ngon thật', '2020-04-13 01:59:16', '2020-04-13 01:59:16', 23),
(119, 14, 'nhỉ', '2020-04-13 01:59:22', '2020-04-13 01:59:22', 23),
(120, 46, 'Máy xài ok, pin trâu bò, thiết kế đẹp,cam tốt, game mượt mà. Chỉ tội có cái hay tắt nguồn quá, ngày tắt nguồn 2,3 lần. có ai loi giống mình không?', '2020-04-13 02:01:51', '2020-04-13 02:01:51', 23),
(121, 55, 'OK', '2020-04-13 03:09:37', '2020-04-13 03:09:37', 23);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `districts`
--

CREATE TABLE `districts` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `division_id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `districts`
--

INSERT INTO `districts` (`id`, `name`, `division_id`, `created_at`, `updated_at`) VALUES
(1, 'Gia Lâm', 1, '2020-03-07 06:37:29', '2020-03-07 06:37:29'),
(2, 'Hai Bà Trưng', 1, '2020-03-07 06:37:50', '2020-03-07 06:37:50'),
(3, 'Lạng Giang', 5, '2020-03-07 06:38:26', '2020-03-07 06:38:26'),
(4, 'Bình Thạnh', 2, '2020-03-07 06:45:43', '2020-03-07 06:45:43'),
(5, 'Hải Phòng', 7, '2020-03-07 06:48:23', '2020-03-07 06:48:23'),
(6, 'Từ Sơn', 6, '2020-03-07 06:48:38', '2020-03-07 06:48:38'),
(7, 'Hiệp Hòa', 5, '2020-03-13 17:31:00', '2020-03-13 17:31:00'),
(8, 'Lục Nam', 5, '2020-03-13 17:31:25', '2020-03-13 17:31:25');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `divisions`
--

CREATE TABLE `divisions` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `priority` tinyint(3) UNSIGNED NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `divisions`
--

INSERT INTO `divisions` (`id`, `name`, `priority`, `created_at`, `updated_at`) VALUES
(1, 'Hà Nội', 1, '2020-03-07 06:29:04', '2020-03-07 06:33:18'),
(2, 'Hồ Chí Minh', 2, '2020-03-07 06:29:20', '2020-03-07 06:33:32'),
(3, 'Cao Bằng', 3, '2020-03-07 06:29:29', '2020-03-07 06:33:49'),
(5, 'Bắc Giang', 4, '2020-03-07 06:34:49', '2020-03-07 06:47:53'),
(6, 'Bắc Ninh', 3, '2020-03-07 06:46:59', '2020-03-07 06:46:59'),
(7, 'Hải Phòng', 2, '2020-03-07 06:47:12', '2020-03-07 06:47:12'),
(8, 'Bình Dương', 4, '2020-03-07 06:47:41', '2020-03-07 06:47:41');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2020_03_03_122753_create_categories_table', 1),
(5, '2020_03_03_123047_create_brands_table', 1),
(6, '2020_03_03_123149_create_products_table', 2),
(8, '2020_03_03_130858_create_product_images_table', 2),
(9, '2014_10_12_000000_create_users_table', 3),
(15, '2020_03_07_123452_create_districts_table', 4),
(16, '2020_03_07_123641_create_divisions_table', 4),
(18, '2020_03_10_022208_create_carts_table', 5),
(19, '2020_03_11_075430_create_settings_table', 6),
(20, '2020_03_11_083359_create_payments_table', 7),
(21, '2020_03_10_022012_create_orders_table', 8),
(22, '2020_03_03_123224_create_admins_table', 9),
(23, '2020_03_14_033045_create_sliders_table', 10),
(24, '2020_03_27_033644_create_ratings_table', 11),
(28, '2020_04_01_103902_create_parameters_table', 12),
(29, '2020_04_04_004250_update_products_table', 13),
(30, '2020_04_08_110935_update_categories_table', 14),
(31, '2020_04_09_120728_add_image_products_table', 15),
(32, '2020_04_11_034415_add_comment_ratings_table', 16),
(33, '2020_04_11_093358_create_cmtrates_table', 17),
(34, '2020_04_11_150921_add_user_id_cmtrates_table', 18),
(37, '2020_04_14_090615_create_paralaptops_table', 19);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `orders`
--

CREATE TABLE `orders` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `payment_id` bigint(20) UNSIGNED DEFAULT NULL,
  `ip_address` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone_no` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `shipping_address` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `message` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `is_paid` tinyint(1) NOT NULL DEFAULT 0,
  `is_completed` tinyint(1) NOT NULL DEFAULT 0,
  `is_seen_by_admin` tinyint(1) NOT NULL DEFAULT 0,
  `transaction_id` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `shipping_charge` int(11) NOT NULL DEFAULT 10000,
  `custom_discount` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `orders`
--

INSERT INTO `orders` (`id`, `user_id`, `payment_id`, `ip_address`, `name`, `phone_no`, `shipping_address`, `email`, `message`, `is_paid`, `is_completed`, `is_seen_by_admin`, `transaction_id`, `created_at`, `updated_at`, `shipping_charge`, `custom_discount`) VALUES
(1, 16, 2, '::1', 'La Xus', '06577278721', 'An Ha, Lang Giang, Bac Giang', 'kensuli.tl@gmail.com', 'Please given', 0, 0, 1, '220222', '2020-03-11 17:20:12', '2020-03-12 17:30:44', 10000, 0),
(2, 16, 2, '::1', 'La Xus', '06577278721', 'An Ha, Lang Giang, Bac Giang', 'kensuli.tl@gmail.com', 'Please given', 0, 0, 1, '220222', '2020-03-11 17:21:23', '2020-03-12 17:48:46', 10000, 0),
(3, 16, 3, '::1', 'La Xus', '06577278721', 'Ha Noi', 'kensuli.tl@gmail.com', 'Real Madrid', 0, 0, 1, '123123', '2020-03-11 17:22:43', '2020-03-17 18:11:39', 20000, 10000),
(4, 15, 2, '::1', 'Phu Thai', '0989748373', 'Bac Ninh', 'dongphuthai.222@gmail.com', 'Inter Milan', 1, 0, 1, '148723', '2020-03-12 03:27:38', '2020-03-18 03:08:12', 10000, 10000),
(5, 15, 2, '::1', 'Phu Thai', '0989748373', 'An Ha', 'dongphuthai.222@gmail.com', 'message', 0, 0, 1, '312301', '2020-03-18 03:06:47', '2020-03-18 03:08:39', 10000, 0),
(6, 15, 2, '::1', 'Phu Thai', '0989748373', 'An Ha', 'dongphuthai.222@gmail.com', 'message', 0, 0, 1, '312301', '2020-03-18 03:06:47', '2020-03-18 03:07:25', 10000, 0),
(7, 15, 1, '::1', 'Phu Thai', '0989748373', 'An Hà', 'dongphuthai.222@gmail.com', 'An Hà', 0, 0, 1, NULL, '2020-04-10 07:47:31', '2020-04-10 08:00:49', 10000, 0);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `paralaptops`
--

CREATE TABLE `paralaptops` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `product_id` bigint(20) UNSIGNED NOT NULL,
  `cpu` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `ram` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `hard_drive` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `screen` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `card_screen` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `connector` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `operating_system` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `design` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `size` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `time_launch` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `paralaptops`
--

INSERT INTO `paralaptops` (`id`, `product_id`, `cpu`, `ram`, `hard_drive`, `screen`, `card_screen`, `connector`, `operating_system`, `design`, `size`, `time_launch`, `image`, `created_at`, `updated_at`) VALUES
(1, 113, 'Intel Core i7 Coffee Lake, 2.60 GHz', '16 GB, DDR4 (1 khe), 2666 MHz', 'SSD 512GB', '16 inch, Retina (3072 x 1920)', 'Card đồ họa rời, Radeon Pro 5300M, 4GB', '4 x Thunderbolt 3 (USB-C)', 'Mac OS', 'Vỏ kim loại nguyên khối, PIN liền', 'Dày 16.2 mm, 2.0 kg', '2019', 'macbook-pro-touch-16-inch-1586855717.jpg', '2020-04-14 02:15:17', '2020-04-14 03:38:59'),
(2, 92, 'Intel Core i5 Coffee Lake, 8265U, 1.60 GHz', '8 GB, DDR4 (On board +1 khe), 2400 MHz', 'SSD: 256 GB M.2 SATA3, Hỗ trợ khe cắm HDD SATA', '15.6 inch, Full HD (1920 x 1080)', 'Card đồ họa rời, NVIDIA GeForce MX110, 2GB', '2 x USB 3.0, HDMI, USB 2.0', 'Windows 10 Home SL', 'Vỏ nhựa, PIN liền', 'Dày 19.9mm, 1.73 kg', '2019', 'lenovo-ideapad-s145-1586860911.jpg', '2020-04-14 03:41:51', '2020-04-14 03:41:51'),
(3, 93, 'Intel Core i5 Coffee Lake, 8265U, 1.60 GHz', '8 GB, DDR4 (On board 4GB +1 khe 4GB), 2133 MHz', 'SSD 256GB NVMe PCIe', '14 inch, Full HD (1920 x 1080)', 'Card đồ họa tích hợp, Intel® UHD Graphics 620', '2 x USB 3.1, HDMI, USB Type-C', 'Windows 10 Home SL', 'Vỏ nhựa, PIN liền', 'Dày 17.9 mm, 1.6 kg', '2019', 'lenovo-ideapad-c340-1586862777.jpg', '2020-04-14 04:12:57', '2020-04-14 04:12:57');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `parameters`
--

CREATE TABLE `parameters` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `product_id` bigint(20) UNSIGNED NOT NULL,
  `screen` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `operating_system` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `cpu` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `rear_camera` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `front_camera` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `ram` int(11) NOT NULL DEFAULT 2,
  `internal_memory` int(11) NOT NULL DEFAULT 32,
  `memory` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `sim` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `pin` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `parameters`
--

INSERT INTO `parameters` (`id`, `product_id`, `screen`, `operating_system`, `cpu`, `rear_camera`, `front_camera`, `ram`, `internal_memory`, `memory`, `sim`, `pin`, `image`, `created_at`, `updated_at`) VALUES
(1, 63, 'Super AMOLED, 6.7\", Full HD+', 'Android 10', 'Snapdragon 855 8 nhân', 'Chính 48 MP & Phụ 12 MP, 5 MP', '32 MP', 8, 128, 'MicroSD, hỗ trợ tối đa 1 TB', '2 SIM Nano (SIM 2 chung khe thẻ nhớ), Hỗ trợ 4G', '4500 mAh, có sạc nhanh', 'samsung-galaxy-s10-1585819587.jpg', '2020-04-02 02:26:27', '2020-04-02 03:13:22'),
(2, 87, 'Dynamic AMOLED 2X, 6.9\", Quad HD+ (2K+)', 'Android 10', 'Exynos 990 8 nhân', 'Chính 108 MP & phụ 48 MP, 12 MP, TOF 3D', '40 MP', 12, 128, 'MicroSD, hỗ trợ tối đa 1 TB', '2 SIM Nano (SIM 2 chung khe thẻ nhớ), Hỗ trợ 4G', '5000 mAh, có sạc nhanh', 'samsung-galaxy-s20-ultra-1585822699.jpg', '2020-04-02 03:18:19', '2020-04-02 03:18:19'),
(3, 68, 'OLED, 6.5\", Super Retina', 'iOS 12', 'Apple A12 Bionic 6 nhân', 'Chính 12 MP & Phụ 12 MP', '7 MP', 4, 256, 'No Memory', '1 eSIM & 1 Nano SIM, Hỗ trợ 4G', '3174 mAh, có sạc nhanh', 'iphone-xs-max-256gb-1585823065.jpg', '2020-04-02 03:24:25', '2020-04-02 03:24:25'),
(4, 117, 'Chính: Dynamic AMOLED, phụ: Super AMOLED, 6.7\", Quad HD (2K)', 'Android 10', 'Snapdragon 855+ 8 nhân', 'Chính 12 MP & Phụ 12 MP', '10 MP', 8, 256, 'No memory', '1 eSIM & 1 Nano SIM, Hỗ trợ 4G', '3300 mAh, có sạc nhanh', 'samsung-galaxy-z-flip-1586338636.jpg', '2020-04-08 02:37:16', '2020-04-08 02:37:16'),
(5, 68, 'OLED, 6.5\", Super Retina XDR', 'iOS 13', 'Apple A13 Bionic 6 nhân', '3 camera 12 MP', '12 MP', 4, 256, 'No memory', '1 eSIM & 1 Nano SIM, Hỗ trợ 4G', '3969 mAh, có sạc nhanh', 'iphone-xs-max-256gb-1586391562.jpg', '2020-04-08 17:19:22', '2020-04-08 17:19:22'),
(6, 67, 'OLED, 6.5\", Super Retina XDR', 'iOs 13', 'Apple A13 Bionic 6 nhân', '3 camera 12 MP', '12 MP', 4, 256, 'No memory', '1 eSIM & 1 Nano SIM, Hỗ trợ 4G', '3969 mAh, có sạc nhanh', 'iphone-11-pro-max-256gb-1586391694.jpg', '2020-04-08 17:21:34', '2020-04-08 17:21:34'),
(7, 108, 'Dynamic AMOLED 2X, 6.7\", Quad HD+ (2K+)', 'Android 10', 'Exynos 990 8 nhân', 'Chính 12 MP & Phụ 64 MP, 12 MP, TOF 3D', '10 MP', 8, 128, 'MicroSD, hỗ trợ tối đa 1 TB', '2 SIM Nano (SIM 2 chung khe thẻ nhớ), Hỗ trợ 4G', '4500 mAh, có sạc nhanh', 'samsung-galaxy-s20-1586393124.jpg', '2020-04-08 17:45:24', '2020-04-08 17:45:24'),
(8, 69, 'AMOLED, 6.78\", Quad HD+ (2K+)', 'Android 10', 'Snapdragon 865 8 nhân', 'Chính 48 MP & Phụ 13 MP, 12 MP', '32 MP', 12, 256, 'No memory', '2 Nano SIM, Hỗ trợ 5G', '4200 mAh, có sạc nhanh', 'oppo-find-x2-1586393293.jpg', '2020-04-08 17:48:13', '2020-04-08 18:17:57'),
(9, 114, 'IPS LCD, 6.1\", Liquid Retina', 'iOS 13', 'Apple A13 Bionic 6 nhân', 'Chính 12 MP & Phụ 12 MP', '12 MP', 4, 256, 'No memory', '1 eSIM & 1 Nano SIM, Hỗ trợ 4G', '3110 mAh, có sạc nhanh', 'iphone-11-256gb-1586400654.jpg', '2020-04-08 19:50:54', '2020-04-08 19:50:54');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `payments`
--

CREATE TABLE `payments` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `priority` tinyint(4) NOT NULL DEFAULT 1,
  `short_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `no` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL COMMENT 'Payment No',
  `type` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL COMMENT 'agent|personal',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `payments`
--

INSERT INTO `payments` (`id`, `name`, `image`, `priority`, `short_name`, `no`, `type`, `created_at`, `updated_at`) VALUES
(1, 'Cash In', 'cash_in.jpg', 1, 'cash_in', NULL, NULL, NULL, NULL),
(2, 'Bkash', 'bkash.jpg', 2, 'bkash', '0451854155', 'personal', '2020-03-10 17:00:00', '2020-03-10 17:00:00'),
(3, 'Rocket', 'rocket.jpg', 3, 'rocket', '0451854155wq', 'personal', '2020-03-10 17:00:00', '2020-03-10 17:00:00');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `products`
--

CREATE TABLE `products` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `category_id` int(10) UNSIGNED NOT NULL,
  `brand_id` int(10) UNSIGNED NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `quantity` int(11) NOT NULL DEFAULT 1,
  `price` int(11) NOT NULL,
  `status` tinyint(4) NOT NULL DEFAULT 0,
  `offer_price` int(11) DEFAULT NULL,
  `admin_id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `discount` int(11) NOT NULL DEFAULT 0,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `products`
--

INSERT INTO `products` (`id`, `category_id`, `brand_id`, `title`, `description`, `slug`, `quantity`, `price`, `status`, `offer_price`, `admin_id`, `created_at`, `updated_at`, `discount`, `image`) VALUES
(63, 49, 1, 'Samsung Galaxy S10', 'Samsung Galaxy S10', 'samsung-galaxy-s10', 20, 14990000, 0, 13990000, 1, '2020-03-26 07:00:25', '2020-04-09 06:19:13', 1000000, 'samsung-galaxy-s10-1586438352.jpg'),
(64, 48, 8, 'iPhone 11 64G', 'iPhone 11 64G', 'iphone-11-64g', 20, 21690000, 0, 21690000, 1, '2020-03-26 07:06:54', '2020-04-09 06:19:58', 0, 'iphone-11-64g-1586438398.jpg'),
(65, 52, 6, 'Xiaomi Realme 8', 'Xiaomi Realme 8', 'xiaomi-realme-8', 0, 3190000, 0, 3190000, 1, '2020-03-26 07:20:55', '2020-04-09 06:51:13', 0, 'xiaomi-realme-8-1586440273.jpg'),
(66, 53, 7, 'Vsmart Joy 3', 'Vsmart Joy 3', 'vsmart-joy-3', 10, 3190000, 0, 3190000, 1, '2020-03-26 07:23:17', '2020-04-09 06:51:30', 0, 'vsmart-joy-3-1586440290.jpg'),
(67, 48, 8, 'iPhone 11 Pro Max 256GB', 'iPhone 11 Pro Max 256GB là chiếc iPhone cao cấp nhất trong bộ 3 iPhone Apple giới thiệu trong năm 2019 và quả thực chiếc smartphone này mang trong mình nhiều trang bị xứng đáng với tên gọi \"Pro\".', 'iphone-11-pro-max-256gb', 10, 35990000, 0, 34990000, 1, '2020-03-26 07:25:23', '2020-04-09 08:25:32', 1000000, 'iphone-11-pro-max-256gb-1586445932.jpg'),
(68, 48, 8, 'iPhone Xs Max 256GB', 'iPhone Xs Max 256GB', 'iphone-xs-max-256gb', 10, 28990000, 0, 28990000, 1, '2020-03-26 07:26:52', '2020-04-09 06:20:47', 0, 'iphone-xs-max-256gb-1586438447.jpg'),
(69, 50, 4, 'Oppo Find X2', 'Oppo Find X2', 'oppo-find-x2', 5, 23990000, 0, 23990000, 1, '2020-03-26 07:33:29', '2020-04-09 06:21:10', 0, 'oppo-find-x2-1586438470.jpg'),
(70, 54, 3, 'Vivo V17 Pro', 'vivo', 'vivo-v17-pro', 10, 8990000, 0, 8990000, 1, '2020-03-26 07:36:16', '2020-04-09 06:51:54', 0, 'vivo-v17-pro-1586440314.jpg'),
(71, 57, 10, 'iPad Wifi', 'iPad Wifi', 'ipad-wifi', 10, 11990000, 0, 11990000, 1, '2020-03-26 07:38:42', '2020-04-09 06:53:33', 0, 'ipad-wifi-1586440413.jpg'),
(72, 56, 1, 'Samsung Tab A8', 'Samsung Galaxy Tab A8', 'samsung-tab-a8', 3, 3690000, 0, 3690000, 1, '2020-03-26 07:40:34', '2020-04-09 07:27:44', 0, 'samsung-tab-a8-1586442464.jpg'),
(73, 57, 10, 'iPad Wifi Cellular', 'iPad 10.2 inch Wifi Cellular', 'ipad-wifi-cellular', 10, 15290000, 0, 14290000, 1, '2020-03-26 07:42:22', '2020-04-09 08:16:24', 1000000, 'ipad-wifi-cellular-1586445384.jpg'),
(74, 55, 13, 'HP 15s fq1018TU i5', 'HP 15s fq1018TU i5 1035G1/8GB/512GB/Win10', 'hp-15s-fq1018tu-i5', 5, 16490000, 0, 16490000, 1, '2020-03-26 07:45:12', '2020-04-09 07:14:25', 0, 'hp-15s-fq1018tu-i5-1586441665.jpg'),
(75, 64, 12, 'Laptop Asus VivoBook', 'Laptop Asus VivoBook X507MA N4000/4GB/256GB/Win10', 'laptop-asus-vivobook', 5, 6990000, 0, 6490000, 1, '2020-03-26 07:48:42', '2020-04-09 07:16:07', 500000, 'laptop-asus-vivobook-1586441767.jpg'),
(76, 51, 14, 'Lenovo IdeaPad', 'Lenovo IdeaPad S340 15IIL i5 1035G4/8GB/512GB/Win10', 'lenovo-ideapad', 2, 15790000, 0, 15790000, 1, '2020-03-26 07:52:20', '2020-04-09 07:16:41', 0, 'lenovo-ideapad-1586441801.jpg'),
(77, 58, 1, 'Polymer 10.000mAh', 'Polymer 10.000mAh', 'polymer-10000mah', 5, 790000, 0, 540000, 1, '2020-03-28 05:08:33', '2020-04-13 19:51:17', 250000, 'polymer-10000mah-1586441834.jpg'),
(78, 59, 16, 'Ultra Wireless Dynamic', 'Tai Nghe Bluetooth chụp tai SOUL Ultra Wireless Dynamic SU34BK Đen', 'ultra-wireless-dynamic', 5, 1251000, 0, 1051000, 1, '2020-03-28 05:26:37', '2020-04-13 19:48:28', 200000, 'ultra-wireless-dynamic-1586441851.jpg'),
(79, 61, 16, 'MicroSD 64 GB Lexar', 'Thẻ nhớ MicroSD 64 GB Lexar class 10 UHS-I', 'microsd-64-gb-lexar', 10, 385000, 0, 385000, 1, '2020-03-28 06:06:12', '2020-04-09 07:17:44', 0, 'microsd-64-gb-lexar-1586441864.jpg'),
(80, 62, 16, 'Zadez M356', 'Chuột không dây Zadez M356', 'zadez-m356', 5, 135000, 0, 135000, 1, '2020-03-28 06:07:25', '2020-04-09 07:18:07', 0, 'zadez-m356-1586441887.jpg'),
(81, 60, 16, 'Cáp Lightning', 'Cáp Lightning 1m Xmobile AL01-1000 Trắng', 'cap-lightning', 15, 90000, 0, 90000, 1, '2020-03-28 06:12:53', '2020-04-09 07:18:19', 0, 'cap-lightning-1586441899.jpg'),
(82, 59, 16, 'Awei Q7Ni', 'Tai nghe nhét tai Awei Q7Ni', 'awei-q7ni', 20, 105000, 0, 105000, 1, '2020-03-28 06:13:56', '2020-04-09 07:18:43', 0, 'awei-q7ni-1586441923.jpg'),
(83, 46, 16, 'Jacques du Manoir', 'Đồng hồ Nữ Jacques du Manoir NRO.23', 'jacques-du-manoir', 10, 3174000, 0, 3174000, 1, '2020-03-29 05:54:42', '2020-04-09 07:20:31', 0, 'jacques-du-manoir-1586442031.jpg'),
(84, 47, 16, 'Apple Watch S5 LTE', 'Apple Watch S5 LTE 40mm viền nhôm dây cao su', 'apple-watch-s5-lte', 10, 14990000, 0, 14990000, 1, '2020-03-29 17:35:30', '2020-04-09 07:20:42', 0, 'apple-watch-s5-lte-1586442042.jpg'),
(85, 63, 4, 'OPPO Reno2', 'Điện thoại OPPO Reno2', 'oppo-reno2', 2, 8149000, 0, 8149000, 1, '2020-03-29 17:47:25', '2020-04-09 07:21:00', 0, 'oppo-reno2-1586442060.jpg'),
(86, 64, 12, 'Asus VivoBook X409FA', 'Laptop Asus VivoBook X409FA i3 8145U/4GB/512GB/Win10 (EK306T)', 'asus-vivobook-x409fa', 4, 12390000, 0, 11890000, 1, '2020-03-30 00:40:00', '2020-04-09 07:21:14', 500000, 'asus-vivobook-x409fa-1586442074.jpg'),
(87, 49, 1, 'Samsung Galaxy S20 Ultra', 'Điện thoại Samsung Galaxy S20 Ultra', 'samsung-galaxy-s20-ultra', 5, 29990000, 0, 28990000, 1, '2020-03-30 21:08:20', '2020-04-09 07:21:35', 1000000, 'samsung-galaxy-s20-ultra-1586442095.jpg'),
(88, 57, 10, 'iPad Mini 7.9 inch', 'Máy tính bảng iPad Mini 7.9 inch Wifi 64GB (2019)', 'ipad-mini-79-inch', 4, 10990000, 0, 10990000, 1, '2020-03-31 00:18:23', '2020-04-09 07:21:53', 0, 'ipad-mini-79-inch-1586442113.jpg'),
(89, 56, 10, 'Samsung Galaxy Tab A10', 'Máy tính bảng Samsung Galaxy Tab A 10.1 T515 (2019)', 'samsung-galaxy-tab-a10', 4, 7490000, 0, 7490000, 1, '2020-03-31 00:20:31', '2020-04-09 07:22:12', 0, 'samsung-galaxy-tab-a10-1586442132.jpg'),
(90, 56, 1, 'Samsung Galaxy Tab S P', 'Máy tính bảng Samsung Galaxy Tab with S Pen (P205)', 'samsung-galaxy-tab-s-p', 4, 6990000, 0, 6990000, 1, '2020-03-31 00:23:04', '2020-04-09 06:18:34', 0, 'samsung-galaxy-tab-s-p-1586438314.jpg'),
(91, 56, 1, 'Samsung Galaxy Tab S6', 'Máy tính bảng Samsung Galaxy Tab S6', 'samsung-galaxy-tab-s6', 5, 18490000, 0, 17490000, 1, '2020-03-31 00:24:53', '2020-04-09 07:22:27', 1000000, 'samsung-galaxy-tab-s6-1586442147.jpg'),
(92, 51, 14, 'Lenovo Ideapad S145', 'Laptop Lenovo Ideapad S145 15IWL i7 8565U/8GB/512GB/2GB MX110/Win10 (81MV00TAVN)', 'lenovo-ideapad-s145', 4, 18290000, 0, 18290000, 1, '2020-03-31 01:47:58', '2020-04-09 07:22:52', 0, 'lenovo-ideapad-s145-1586442172.jpg'),
(93, 51, 14, 'Lenovo Ideapad C340', 'Laptop Lenovo Ideapad C340 14IWL i5 8265U/8GB/256GB/Touch/Win10 (81N4003TVN)', 'lenovo-ideapad-c340', 7, 16290000, 0, 16290000, 1, '2020-03-31 01:48:54', '2020-04-09 07:23:30', 0, 'lenovo-ideapad-c340-1586442210.jpg'),
(94, 55, 13, 'HP 15s du0042TX', 'Laptop HP 15s du0042TX i3 7020U/4GB/1TB/2GB MX110/Win10 (6ZF75PA)', 'hp-15s-du0042tx', 3, 11390000, 0, 11390000, 1, '2020-03-31 01:49:52', '2020-04-09 07:23:46', 0, 'hp-15s-du0042tx-1586442226.jpg'),
(95, 42, 11, 'Dell Inspiron N3580', 'Laptop Dell Inspiron N3580 i5 8265U/4GB/1TB/Win10 (P75F106N80I)', 'dell-inspiron-n3580', 4, 14290000, 0, 14290000, 1, '2020-03-31 01:51:55', '2020-04-09 07:23:58', 0, 'dell-inspiron-n3580-1586442238.jpg'),
(96, 51, 14, 'Lenovo Ideapad S540', 'Laptop Lenovo Ideapad S540 15IWL i5 8265U/8GB/1TB+128GB/Win10 (81NE009FVN)', 'lenovo-ideapad-s540', 7, 16490000, 0, 15490000, 1, '2020-03-31 01:53:31', '2020-04-09 07:24:22', 1000000, 'lenovo-ideapad-s540-1586442262.jpg'),
(97, 65, 16, 'Loa Bluetooth eSaver', 'Loa Bluetooth eSaver S12B-2 Đen', 'loa-bluetooth-esaver', 3, 665000, 0, 665000, 1, '2020-03-31 02:00:57', '2020-04-09 07:24:41', 0, 'loa-bluetooth-esaver-1586442281.jpg'),
(98, 59, 16, 'Bluetooth Mozard Flex4', 'Tai nghe Bluetooth Mozard Flex4 Đen Xanh', 'bluetooth-mozard-flex4', 8, 280000, 0, 180000, 1, '2020-03-31 02:02:36', '2020-04-13 20:01:16', 100000, 'bluetooth-mozard-flex4-1586442310.jpg'),
(99, 58, 16, 'Xmobile Gram 6S', 'Pin sạc dự phòng 19.000 mAh Xmobile Gram 6S Trắng', 'xmobile-gram-6s', 8, 829000, 0, 829000, 1, '2020-03-31 02:03:49', '2020-04-09 07:25:53', 0, 'xmobile-gram-6s-1586442353.jpg'),
(100, 46, 16, 'Larmes LM-TF004', 'Đồng hồ Nam Larmes LM-TF004.OT49G.211.4NB - Optimus Prime', 'larmes-lm-tf004', 6, 2538000, 0, 2538000, 1, '2020-03-31 02:18:46', '2020-04-09 07:26:16', 0, 'larmes-lm-tf004-1586442376.jpg'),
(101, 47, 17, 'Apple Watch S3 LTE', 'Apple Watch S3 LTE 42mm viền nhôm dây cao su', 'apple-watch-s3-lte', 9, 9990000, 0, 9990000, 1, '2020-03-31 02:19:55', '2020-04-09 06:13:12', 0, 'apple-watch-s3-lte-1586437992.jpg'),
(102, 66, 16, 'Dây da size 22 mm', 'Dây da đồng hồ size 22 mm nâu G071', 'day-da-size-22-mm', 7, 250000, 0, 250000, 1, '2020-03-31 02:21:53', '2020-04-09 07:26:34', 0, 'day-da-size-22-mm-1586442394.jpg'),
(103, 66, 16, 'Orient RA-AG0003S10B', 'Đồng hồ Nam Orient RA-AG0003S10B - Cơ tự động', 'orient-ra-ag0003s10b', 5, 6858000, 0, 6858000, 1, '2020-03-31 02:22:54', '2020-04-09 06:13:28', 0, 'orient-ra-ag0003s10b-1586438008.jpg'),
(105, 50, 4, 'OPPO A91', 'Điện thoại OPPO A91', 'oppo-a91', 5, 6490000, 0, 6490000, 1, '2020-03-31 04:34:52', '2020-04-09 06:11:33', 0, 'oppo-a91-1586437893.jpg'),
(106, 52, 9, 'Redme Note 9S', 'Redme Note 9S', 'redme-note-9s', 2, 5990000, 0, 5990000, 1, '2020-03-31 04:37:21', '2020-04-12 20:30:59', 0, 'redme-note-9s-1586748659.jpg'),
(107, 46, 16, 'MVMT D-MC02-GUBL', 'Đồng hồ Nam MVMT D-MC02-GUBL', 'mvmt-d-mc02-gubl', 8, 3420000, 0, 3420000, 1, '2020-03-31 06:55:21', '2020-04-09 06:12:35', 0, 'mvmt-d-mc02-gubl-1586437955.jpg'),
(108, 49, 1, 'Samsung Galaxy S20+', 'Điện thoại Samsung Galaxy S20+', 'samsung-galaxy-s20', 10, 23990000, 0, 22990000, 1, '2020-04-01 17:45:28', '2020-04-09 06:12:02', 1000000, 'samsung-galaxy-s20-1586437922.jpg'),
(109, 53, 7, 'Vsmart Star 3', 'Điện thoại Vsmart Star 3', 'vsmart-star-3', 10, 1790000, 0, 1790000, 1, '2020-04-03 18:45:42', '2020-04-09 06:11:06', 0, 'vsmart-star-3-1586437866.jpg'),
(110, 49, 1, 'Samsung Galaxy A10s', 'Điện thoại Samsung Galaxy A10s', 'samsung-galaxy-a10s', 2, 3690000, 0, 3690000, 1, '2020-04-04 07:11:50', '2020-04-09 06:10:44', 0, 'samsung-galaxy-a10s-1586437844.jpg'),
(111, 49, 1, 'Samsung Galaxy A71', 'Điện thoại Samsung Galaxy A71', 'samsung-galaxy-a71', 5, 10490000, 0, 10490000, 1, '2020-04-04 07:31:59', '2020-04-09 06:10:23', 0, 'samsung-galaxy-a71-1586437823.jpg'),
(112, 49, 1, 'Samsung Galaxy A50 64GB', 'Điện thoại Samsung Galaxy A50 64GB', 'samsung-galaxy-a50-64gb', 2, 6490000, 0, 6490000, 1, '2020-04-04 07:33:42', '2020-04-09 06:10:07', 0, 'samsung-galaxy-a50-64gb-1586437807.jpg'),
(113, 44, 15, 'Macbook Pro Touch 16 inch', 'Laptop Macbook Pro Touch 16 inch 2019 i7 2.6GHz/16GB/512GB/4GB Radeon Pro 5300M (MVVJ2SA/A)', 'macbook-pro-touch-16-inch', 5, 58990000, 0, 57990000, 1, '2020-04-07 17:52:45', '2020-04-09 06:09:47', 1000000, 'macbook-pro-touch-16-inch-1586437787.jpg'),
(114, 48, 8, 'iPhone 11 256GB', 'Điện thoại iPhone 11 256GB', 'iphone-11-256gb', 5, 24990000, 0, 23990000, 1, '2020-04-08 00:48:31', '2020-04-09 06:09:21', 1000000, 'iphone-11-256gb-1586437761.jpg'),
(115, 70, 16, 'BlackBerry KEY2', 'Điện thoại BlackBerry KEY2', 'blackberry-key2', 0, 14990000, 0, 14990000, 1, '2020-04-08 01:24:03', '2020-04-09 06:08:51', 0, 'blackberry-key2-1586437731.jpg'),
(116, 68, 6, 'Xiaomi Mi Note 10 Pro', 'Điện thoại Xiaomi Mi Note 10 Pro', 'xiaomi-mi-note-10-pro', 4, 13490000, 0, 13490000, 1, '2020-04-08 01:25:19', '2020-04-09 06:08:41', 0, 'xiaomi-mi-note-10-pro-1586437721.jpg'),
(117, 49, 1, 'Samsung Galaxy Z Flip', 'Điện thoại Samsung Galaxy Z Flip', 'samsung-galaxy-z-flip', 5, 36000000, 0, 35000000, 1, '2020-04-08 01:52:10', '2020-04-09 06:07:58', 1000000, 'samsung-galaxy-z-flip-1586437678.jpg'),
(118, 68, 5, 'Huawei Mate 30 Pro', 'Điện thoại Huawei Mate 30 Pro (Không có Google)', 'huawei-mate-30-pro', 2, 20990000, 0, 20990000, 1, '2020-04-08 02:52:40', '2020-04-09 06:07:42', 0, 'huawei-mate-30-pro-1586437662.jpg'),
(119, 49, 1, 'Samsung Galaxy S10 Plus', 'Điện thoại Samsung Galaxy S10+', 'samsung-galaxy-s10-plus', 5, 19990000, 0, 19990000, 1, '2020-04-08 02:54:34', '2020-04-12 00:23:19', 0, 'samsung-galaxy-s10-1586437559.jpg'),
(123, 71, 16, 'Nokia 7.2', 'Điện thoại Nokia 7.2', 'nokia-72', 5, 4490000, 0, NULL, 1, '2020-04-09 05:45:07', '2020-04-09 05:45:07', 0, 'nokia-72-1586436307.jpg'),
(125, 63, 8, 'iPhone 7 Plus 32GB', 'Điện thoại iPhone 7 Plus 32GB', 'iphone-7-plus-32gb', 3, 10990000, 0, NULL, 1, '2020-04-09 07:57:06', '2020-04-09 07:57:06', 0, 'iphone-7-plus-32gb-1586444226.jpg'),
(126, 48, 8, 'iPhone 8 Plus 64GB', 'iPhone 8 Plus 64GB', 'iphone-8-plus-64gb', 5, 14990000, 0, 13490000, 1, '2020-04-09 08:02:05', '2020-04-09 08:03:54', 1500000, 'iphone-7-plus-64gb-1586444525.jpg');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `product_images`
--

CREATE TABLE `product_images` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `product_id` int(10) UNSIGNED NOT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `product_images`
--

INSERT INTO `product_images` (`id`, `product_id`, `image`, `created_at`, `updated_at`) VALUES
(42, 32, '1583484039.jpg', '2020-03-06 01:40:40', '2020-03-06 01:40:40'),
(44, 33, '1583484070.jpg', '2020-03-06 01:41:10', '2020-03-06 01:41:10'),
(46, 34, '1583484122.jpg', '2020-03-06 01:42:02', '2020-03-06 01:42:02'),
(111, 63, '15852312250.jpg', '2020-03-26 07:00:25', '2020-03-26 07:00:25'),
(115, 65, '15852324550.jpg', '2020-03-26 07:20:55', '2020-03-26 07:20:55'),
(116, 65, '15852324551.png', '2020-03-26 07:20:56', '2020-03-26 07:20:56'),
(117, 66, '15852325970.jpg', '2020-03-26 07:23:17', '2020-03-26 07:23:17'),
(118, 66, '15852325971.png', '2020-03-26 07:23:17', '2020-03-26 07:23:17'),
(119, 66, '15852325972.png', '2020-03-26 07:23:17', '2020-03-26 07:23:17'),
(122, 68, '15852328120.jpg', '2020-03-26 07:26:52', '2020-03-26 07:26:52'),
(123, 68, '15852328121.png', '2020-03-26 07:26:52', '2020-03-26 07:26:52'),
(124, 67, '15852331070.jpg', '2020-03-26 07:31:47', '2020-03-26 07:31:47'),
(125, 67, '15852331071.png', '2020-03-26 07:31:47', '2020-03-26 07:31:47'),
(126, 67, '15852331072.png', '2020-03-26 07:31:47', '2020-03-26 07:31:47'),
(127, 69, '15852332090.jpg', '2020-03-26 07:33:29', '2020-03-26 07:33:29'),
(129, 70, '15852334270.jpg', '2020-03-26 07:37:07', '2020-03-26 07:37:07'),
(130, 71, '15852335370.jpg', '2020-03-26 07:38:57', '2020-03-26 07:38:57'),
(131, 72, '15852336340.jpg', '2020-03-26 07:40:34', '2020-03-26 07:40:34'),
(133, 73, '15852337970.jpg', '2020-03-26 07:43:17', '2020-03-26 07:43:17'),
(134, 74, '15852339120.jpg', '2020-03-26 07:45:12', '2020-03-26 07:45:12'),
(135, 75, '15852341220.jpg', '2020-03-26 07:48:42', '2020-03-26 07:48:42'),
(136, 76, '15852343400.jpg', '2020-03-26 07:52:20', '2020-03-26 07:52:20'),
(137, 77, '15853973130.jpg', '2020-03-28 05:08:33', '2020-03-28 05:08:33'),
(138, 78, '15853983970.jpg', '2020-03-28 05:26:37', '2020-03-28 05:26:37'),
(140, 80, '15854008460.jpg', '2020-03-28 06:07:26', '2020-03-28 06:07:26'),
(141, 79, '15854009580.jpg', '2020-03-28 06:09:18', '2020-03-28 06:09:18'),
(142, 81, '15854011730.jpg', '2020-03-28 06:12:53', '2020-03-28 06:12:53'),
(143, 82, '15854012360.jpg', '2020-03-28 06:13:57', '2020-03-28 06:13:57'),
(144, 83, '15854864820.jpg', '2020-03-29 05:54:42', '2020-03-29 05:54:42'),
(145, 84, '15855285300.jpg', '2020-03-29 17:35:30', '2020-03-29 17:35:30'),
(146, 85, '15855292450.jpg', '2020-03-29 17:47:25', '2020-03-29 17:47:25'),
(147, 86, '15855540000.jpg', '2020-03-30 00:40:00', '2020-03-30 00:40:00'),
(148, 87, '15856277000.jpg', '2020-03-30 21:08:21', '2020-03-30 21:08:21'),
(149, 87, '15856277011.png', '2020-03-30 21:08:21', '2020-03-30 21:08:21'),
(150, 88, '15856391030.jpg', '2020-03-31 00:18:24', '2020-03-31 00:18:24'),
(151, 89, '15856392310.jpg', '2020-03-31 00:20:31', '2020-03-31 00:20:31'),
(152, 89, '15856392311.png', '2020-03-31 00:20:32', '2020-03-31 00:20:32'),
(153, 90, '15856393840.jpg', '2020-03-31 00:23:05', '2020-03-31 00:23:05'),
(154, 91, '15856394930.jpg', '2020-03-31 00:24:53', '2020-03-31 00:24:53'),
(155, 91, '15856394931.png', '2020-03-31 00:24:54', '2020-03-31 00:24:54'),
(156, 64, '15856428710.png', '2020-03-31 01:21:11', '2020-03-31 01:21:11'),
(157, 64, '15856428711.png', '2020-03-31 01:21:11', '2020-03-31 01:21:11'),
(158, 92, '15856444780.jpg', '2020-03-31 01:47:58', '2020-03-31 01:47:58'),
(159, 93, '15856445340.jpg', '2020-03-31 01:48:54', '2020-03-31 01:48:54'),
(160, 95, '15856447150.jpg', '2020-03-31 01:51:55', '2020-03-31 01:51:55'),
(161, 96, '15856448110.jpg', '2020-03-31 01:53:31', '2020-03-31 01:53:31'),
(162, 94, '15856449600.jpg', '2020-03-31 01:56:00', '2020-03-31 01:56:00'),
(163, 97, '15856452580.jpg', '2020-03-31 02:00:58', '2020-03-31 02:00:58'),
(164, 98, '15856453560.jpg', '2020-03-31 02:02:36', '2020-03-31 02:02:36'),
(165, 99, '15856454290.jpg', '2020-03-31 02:03:49', '2020-03-31 02:03:49'),
(166, 100, '15856463260.jpg', '2020-03-31 02:18:46', '2020-03-31 02:18:46'),
(167, 101, '15856463950.jpg', '2020-03-31 02:19:55', '2020-03-31 02:19:55'),
(168, 102, '15856465130.jpg', '2020-03-31 02:21:54', '2020-03-31 02:21:54'),
(169, 103, '15856465740.jpg', '2020-03-31 02:22:54', '2020-03-31 02:22:54'),
(172, 105, '15856544920.jpg', '2020-03-31 04:34:52', '2020-03-31 04:34:52'),
(174, 107, '15856629210.jpg', '2020-03-31 06:55:22', '2020-03-31 06:55:22'),
(177, 108, 'samsung-galaxy-s20-15858162400.jpg', '2020-04-02 01:30:40', '2020-04-02 01:30:40'),
(178, 108, 'samsung-galaxy-s20-15858162401.png', '2020-04-02 01:30:40', '2020-04-02 01:30:40'),
(179, 109, 'vsmart-star-3-15859647420.jpg', '2020-04-03 18:45:43', '2020-04-03 18:45:43'),
(180, 109, 'vsmart-star-3-15859647431.png', '2020-04-03 18:45:43', '2020-04-03 18:45:43'),
(181, 110, 'samsung-galaxy-a10s-15860095100.jpg', '2020-04-04 07:11:51', '2020-04-04 07:11:51'),
(182, 110, 'samsung-galaxy-a10s-15860095111.png', '2020-04-04 07:11:51', '2020-04-04 07:11:51'),
(183, 111, 'samsung-galaxy-a71-15860107190.jpg', '2020-04-04 07:31:59', '2020-04-04 07:31:59'),
(184, 111, 'samsung-galaxy-a71-15860107191.png', '2020-04-04 07:32:00', '2020-04-04 07:32:00'),
(185, 112, 'samsung-galaxy-a50-64gb-15860108220.jpg', '2020-04-04 07:33:42', '2020-04-04 07:33:42'),
(186, 112, 'samsung-galaxy-a50-64gb-15860108221.png', '2020-04-04 07:33:42', '2020-04-04 07:33:42'),
(187, 113, 'macbook-pro-touch-16-inch-15863071650.jpg', '2020-04-07 17:52:46', '2020-04-07 17:52:46'),
(188, 114, 'iphone-11-256gb-15863321110.jpg', '2020-04-08 00:48:32', '2020-04-08 00:48:32'),
(189, 115, 'blackberry-key2-15863342430.jpg', '2020-04-08 01:24:03', '2020-04-08 01:24:03'),
(190, 116, 'xiaomi-mi-note-10-pro-15863343190.jpg', '2020-04-08 01:25:19', '2020-04-08 01:25:19'),
(191, 117, 'samsung-galaxy-z-flip-15863359300.jpg', '2020-04-08 01:52:11', '2020-04-08 01:52:11'),
(192, 118, 'huawei-mate-30-pro-15863395600.jpg', '2020-04-08 02:52:40', '2020-04-08 02:52:40'),
(193, 119, 'samsung-galaxy-s10-15863396740.jpg', '2020-04-08 02:54:34', '2020-04-08 02:54:34'),
(194, 122, 'nokia-72-15864356510.jpg', '2020-04-09 05:34:11', '2020-04-09 05:34:11'),
(195, 122, 'nokia-72-15864356511.png', '2020-04-09 05:34:11', '2020-04-09 05:34:11'),
(196, 123, 'nokia-72-15864363070.jpg', '2020-04-09 05:45:07', '2020-04-09 05:45:07'),
(197, 123, 'nokia-72-15864363071.png', '2020-04-09 05:45:07', '2020-04-09 05:45:07'),
(198, 125, 'iphone-7-plus-32gb-15864442260.jpg', '2020-04-09 07:57:06', '2020-04-09 07:57:06'),
(199, 126, 'iphone-7-plus-64gb-15864445250.jpg', '2020-04-09 08:02:05', '2020-04-09 08:02:05'),
(202, 106, 'redme-note-9s-15867392380.jpg', '2020-04-12 17:53:59', '2020-04-12 17:53:59');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `ratings`
--

CREATE TABLE `ratings` (
  `id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `rating` int(11) NOT NULL,
  `rateable_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `rateable_id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `comment` text COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `ratings`
--

INSERT INTO `ratings` (`id`, `created_at`, `updated_at`, `rating`, `rateable_type`, `rateable_id`, `user_id`, `comment`) VALUES
(2, '2020-03-27 18:14:26', '2020-03-28 01:54:19', 3, 'App\\Models\\Product', 76, 15, 'Máy ngon, mượt, ổn định, pin trâu hình như hiện tại ko bị lỗi gì cả nói chung ngon kkk rất hài lòng về máy này.'),
(7, '2020-03-28 00:23:42', '2020-03-28 00:23:42', 5, 'App\\Models\\Product', 70, 15, 'Cam 48mp nhưng zoom chụp lại bị vỡ hình quá, thế có phải lỗi k ạ, để zoom 2x đã vỡ hình'),
(8, '2020-03-28 00:29:00', '2020-03-28 01:50:14', 4, 'App\\Models\\Product', 73, 16, 'Pin trâu chơi game tác vụ cơ bản nhanh mượt , nhưng mở khóa vân tay lúc sáng màn hình lên chậm và có cuộc gọi đến lướt để nghe cũng rất chậm loa ngoài hơi nhỏ , chắc phải đợi bản cập nhật mới'),
(9, '2020-03-28 01:53:25', '2020-04-07 05:23:40', 2, 'App\\Models\\Product', 75, 16, 'Đã nhận máy 7/4 , đã sử dụng 1 ngày, Pin dai , loa to , camera bắt sáng tốt trong tầm giá, cày game liên tục 7 trận liên quân bật max setting tốn vỏn vẹn khoảng 30 % pin, ko nóng tí nào , thậm chí độ ấm là rất ít, mà nghỉ game cái là sau 2, 3 phút máy mát lạnh lại ngay chắc do mặt lưng kính toả nhiệt tốt , mình bất ngờ điều này vì chắc tại trước giờ sài máy vỏ kim loại nguyên khối nên giờ thấy lạ. Tóm lại fan mi chắc chắn rất hài lòng về c máy này , nó đáp ứng tốt nhu cầu của đa số mi fan, đặc biệt thế mạnh giá rẻ cấu hình cao thì khỏi bàn'),
(10, '2020-03-28 01:53:51', '2020-03-28 01:53:51', 4, 'App\\Models\\Product', 74, 16, 'Có ai đang sử dụng máy này thử làm theo mình vô bật chế độ nền tối rồi vào mục tin nhắn hay những ứng dụng nào mà giao diện hơi sậm màu coi màn hình có lỗi ko nhé, máy mình bị lỗi 1 cái đầu đi ra nhân viên bảo là điểm chết ở màn hình nên đổi cho máy mới, lấy máy mới vẫn bị lỗi như thế'),
(11, '2020-03-28 01:54:30', '2020-03-28 02:26:33', 3, 'App\\Models\\Product', 75, 15, 'Xem video HDR trên Youtube bị mờ mờ con xem video thường không có gì.moi người có bị giống mình không... Các bạn vào link này xem có bị giống mình không.. https://youtu.be/a_L5G_je5y4'),
(12, '2020-03-28 01:54:45', '2020-03-28 01:54:45', 4, 'App\\Models\\Product', 74, 15, 'Máy đẹp, camera được, chơi game khá tốt, pin trâu. Rất ưng ý với số tiền bỏ ra.'),
(13, '2020-03-28 01:54:55', '2020-03-28 01:54:55', 5, 'App\\Models\\Product', 73, 15, 'Máy dùng rất tốt chơi game ko lag pin khoẻ cam ổn màn hình rất mượt nói chung với tầm giá này cấu hình như vậy là ngon rồi'),
(14, '2020-03-28 04:21:48', '2020-04-10 23:29:05', 4, 'App\\Models\\Product', 68, 15, 'Máy ngon đẹp, mượt và ổn định. Cầm đầm và chắc tay. Sạc 19% đến 100% tầm 1h50p là đầy. Ngon trong tầm giá'),
(15, '2020-03-28 06:10:06', '2020-03-28 06:10:09', 3, 'App\\Models\\Product', 78, 15, 'Mua máy dc 1 tuần. Đối với 6 triệu thì máy quá ok. Mọi thứ đều hoạt động mượt mà. Đặc biệt pin trâu. Xài 2 ngày mới cần sạc pin lại. Mình dùng toàn 3G, k dùng wifi, ít chơi game, chỉ Facebook, zalo, Youtube, thỉnh thoảng có xem phim mà đến tối muốn cho hết pin để sạc mà k hết dc. Xứng đáng số tiền bỏ ra.'),
(16, '2020-03-28 06:20:13', '2020-03-28 06:20:13', 4, 'App\\Models\\Product', 82, 15, 'Có cách nào giúp đỡ hao pin k.. con mình pin k ổn.'),
(17, '2020-03-28 06:20:26', '2020-03-28 06:20:26', 2, 'App\\Models\\Product', 80, 15, 'Ms lấy máy về đc 3 ngày.mọi thứ đều ổn.nhưng phần các góc màn hình nhiều khi bị đơ đơ.k biết vấn đề này đưa ra cửa hàng kiểm tra lại đc k vậy'),
(18, '2020-03-29 20:33:47', '2020-04-10 21:20:18', 4, 'App\\Models\\Product', 63, 15, 'Có ai bị lỗi mà hình giống của tôi không. Bật chế độ nền tối sẽ thấy viền sang xung quanh ko.'),
(19, '2020-03-30 00:45:52', '2020-03-30 00:45:52', 4, 'App\\Models\\Product', 86, 15, 'Xem video HDR trên Youtube bị mờ mờ con xem video thường không có gì.moi người có bị giống mình không... Các bạn vào link này xem có bị giống mình không.. https://youtu.be/a_L5G_je5y4'),
(20, '2020-03-30 01:22:19', '2020-03-31 06:11:03', 4, 'App\\Models\\Product', 64, 15, 'Có ai đang sử dụng máy này thử làm theo mình vô bật chế độ nền tối rồi vào mục tin nhắn hay những ứng dụng nào mà giao diện hơi sậm màu coi màn hình có lỗi ko nhé, máy mình bị lỗi 1 cái đầu đi ra nhân viên bảo là điểm chết ở màn hình nên đổi cho máy mới, lấy máy mới vẫn bị lỗi như thế'),
(21, '2020-03-30 04:52:43', '2020-03-30 04:52:43', 2, 'App\\Models\\Product', 85, 15, 'Máy ngon, mượt, ổn định, pin trâu hình như hiện tại ko bị lỗi gì cả nói chung ngon kkk rất hài lòng về máy này.'),
(22, '2020-03-30 06:56:53', '2020-03-30 06:57:53', 3, 'App\\Models\\Product', 67, 15, 'Mua máy dc 1 tuần. Đối với 6 triệu thì máy quá ok. Mọi thứ đều hoạt động mượt mà. Đặc biệt pin trâu. Xài 2 ngày mới cần sạc pin lại. Mình dùng toàn 3G, k dùng wifi, ít chơi game, chỉ Facebook, zalo, Youtube, thỉnh thoảng có xem phim mà đến tối muốn cho hết pin để sạc mà k hết dc. Xứng đáng số tiền bỏ ra.'),
(23, '2020-03-30 06:58:26', '2020-04-12 01:18:13', 3, 'App\\Models\\Product', 67, 16, 'Có cách nào giúp đỡ hao pin k.. con mình pin k ổn.'),
(24, '2020-03-30 23:40:19', '2020-04-11 00:56:48', 5, 'App\\Models\\Product', 63, 16, 'Máy rung khá êm nên nhiều lúc có cuộc gọi không biết! Vì lí đo công việc nên máy chỉ để rung k để chuông nhiều khi lỡ cuộc gọi'),
(25, '2020-03-30 23:40:37', '2020-04-12 00:24:35', 5, 'App\\Models\\Product', 69, 16, 'Ngon, rất ngon, rất rất ngon. Đáng tiền, nv nhiệt tình và dễ thương. Pin, camera theo mình ngang tầm với 11 pro max mình đang sử dụng. Sẽ tiếp tục ủng hộ'),
(26, '2020-03-30 23:40:55', '2020-04-07 19:58:17', 5, 'App\\Models\\Product', 87, 16, 'Máy dùng rất tốt chơi game ko lag pin khoẻ cam ổn màn hình rất mượt nói chung với tầm giá này cấu hình như vậy là ngon rồi'),
(27, '2020-03-31 01:56:52', '2020-03-31 01:56:52', 3, 'App\\Models\\Product', 96, 16, 'Đã nhận máy 7/4 , đã sử dụng 1 ngày, Pin dai , loa to , camera bắt sáng tốt trong tầm giá, cày game liên tục 7 trận liên quân bật max setting tốn vỏn vẹn khoảng 30 % pin, ko nóng tí nào , thậm chí độ ấm là rất ít, mà nghỉ game cái là sau 2, 3 phút máy mát lạnh lại ngay chắc do mặt lưng kính toả nhiệt tốt , mình bất ngờ điều này vì chắc tại trước giờ sài máy vỏ kim loại nguyên khối nên giờ thấy lạ. Tóm lại fan mi chắc chắn rất hài lòng về c máy này , nó đáp ứng tốt nhu cầu của đa số mi fan, đặc biệt thế mạnh giá rẻ cấu hình cao thì khỏi bàn'),
(28, '2020-03-31 01:57:10', '2020-03-31 01:57:10', 4, 'App\\Models\\Product', 91, 16, 'Máy ngon, mượt, ổn định, pin trâu hình như hiện tại ko bị lỗi gì cả nói chung ngon kkk rất hài lòng về máy này.'),
(29, '2020-03-31 01:57:52', '2020-03-31 01:57:52', 4, 'App\\Models\\Product', 96, 15, 'Pin trâu chơi game tác vụ cơ bản nhanh mượt , nhưng mở khóa vân tay lúc sáng màn hình lên chậm và có cuộc gọi đến lướt để nghe cũng rất chậm loa ngoài hơi nhỏ , chắc phải đợi bản cập nhật mới'),
(30, '2020-03-31 01:58:03', '2020-03-31 01:58:03', 5, 'App\\Models\\Product', 91, 15, 'Cam 48mp nhưng zoom chụp lại bị vỡ hình quá, thế có phải lỗi k ạ, để zoom 2x đã vỡ hình'),
(31, '2020-03-31 01:58:11', '2020-04-11 18:47:25', 4, 'App\\Models\\Product', 87, 15, 'Phải nói là rất tuyệt, cài Full Google được xài phê. Pin trâu sạc nhanh, Face ID vân tay nhạy. 1 con máy hội tụ đủ công nghệ.'),
(32, '2020-03-31 04:21:32', '2020-04-14 04:23:43', 4, 'App\\Models\\Product', 93, 15, 'Em vừa mới mua máy nhưng sạc pin thì nó chỉ được 99% ạ, không lên 100% nhưng pin vẫn báo đầy. Và khi sử dụng thì không được quá 4 tiếng ạ.'),
(33, '2020-03-31 04:22:24', '2020-03-31 04:22:24', 3, 'App\\Models\\Product', 101, 15, 'Không biết có ai giống e chưa. Cam bị cấn nhẹ cái nứt một đường ạ. Thiết nghĩ nên mua ốp lưng có bảo vệ cụm cam hoặc dán cường lực. Còn lại mọi thứ đều tốt trong tầm giá! Nv bán hàng nhiệt tình nữa!'),
(34, '2020-03-31 04:35:22', '2020-03-31 04:35:22', 2, 'App\\Models\\Product', 105, 15, 'Mình đã nhận được hàng tại điện máy xanh Ninh Hòa rồi,sau ngày sử dụng mình thấy pin trâu lắm bên cạnh đó thì sóng điện thoại sim 2 tụt quá có lúc có một nất thôi'),
(35, '2020-03-31 05:28:32', '2020-03-31 05:28:32', 2, 'App\\Models\\Product', 83, 15, 'Máy đẹp nhưng khi đổi từ note 8 pro lên thì thấy thất vọng tất cả các tác vụ thông thường đều không mượt bằng note 8pro lướt web chơi game cũng vậy'),
(36, '2020-03-31 17:44:34', '2020-03-31 17:44:34', 5, 'App\\Models\\Product', 87, 19, 'Nói chung dùng OK máy hơi nóng xíu và camera tạm ổn thôi chưa hoàn hảo cho lắm thua xa con Xiaomi mi 9t'),
(37, '2020-03-31 17:51:35', '2020-03-31 17:51:41', 2, 'App\\Models\\Product', 87, 20, 'Nhận máy hôm 3/4 Sản phẩm tốt trong tầm giá, pin trâu, cam đẹp , chíp ok, có điểm do màn hình LCD nên màu sắc ko so dc với Amoled , trước đây dùng Note4x giờ nâng lên Note 9S quá ok luôn'),
(38, '2020-04-01 00:49:11', '2020-04-01 00:49:11', 1, 'App\\Models\\Product', 63, 20, 'Mình đã nhận được hàng tại điện máy xanh Ninh Hòa rồi,sau ngày sử dụng mình thấy pin trâu lắm bên cạnh đó thì sóng điện thoại sim 2 tụt quá có lúc có một nất thôi'),
(39, '2020-04-01 02:27:16', '2020-04-01 02:27:16', 4, 'App\\Models\\Product', 83, 20, 'Không biết có ai giống e chưa. Cam bị cấn nhẹ cái nứt một đường ạ. Thiết nghĩ nên mua ốp lưng có bảo vệ cụm cam hoặc dán cường lực. Còn lại mọi thứ đều tốt trong tầm giá! Nv bán hàng nhiệt tình nữa!'),
(40, '2020-04-05 23:30:33', '2020-04-05 23:38:14', 3, 'App\\Models\\Product', 66, 15, 'Gửi đi bh rồi về xài bt. Nhưng vẫn hao pin. Hỏi nv thì nv tl đt để qua đêm hao 17% là bình thường. Ko xài ứng dụng ko sim'),
(41, '2020-04-06 02:19:08', '2020-04-06 02:19:08', 4, 'App\\Models\\Product', 94, 15, 'Giá quá tuyệt vời. Đẹp và chất số với tầm giá. Máy chơi game mượt. Pin trâu. Nói chung là ngon'),
(42, '2020-04-06 02:20:49', '2020-04-06 02:20:59', 3, 'App\\Models\\Product', 95, 15, 'Gửi đi bh rồi về xài bt. Nhưng vẫn hao pin. Hỏi nv thì nv tl đt để qua đêm hao 17% là bình thường. Ko xài ứng dụng ko sim'),
(43, '2020-04-06 02:22:51', '2020-04-06 02:24:08', 2, 'App\\Models\\Product', 89, 15, 'Máy đẹp nhưng khi đổi từ note 8 pro lên thì thấy thất vọng tất cả các tác vụ thông thường đều không mượt bằng note 8pro lướt web chơi game cũng vậy'),
(44, '2020-04-06 02:28:25', '2020-04-06 02:28:25', 2, 'App\\Models\\Product', 71, 15, 'Nhận máy hôm 3/4 Sản phẩm tốt trong tầm giá, pin trâu, cam đẹp , chíp ok, có điểm do màn hình LCD nên màu sắc ko so dc với Amoled , trước đây dùng Note4x giờ nâng lên Note 9S quá ok luôn'),
(45, '2020-04-06 02:30:30', '2020-04-06 02:30:30', 2, 'App\\Models\\Product', 77, 15, 'Mình đã nhận được hàng tại điện máy xanh Ninh Hòa rồi,sau ngày sử dụng mình thấy pin trâu lắm bên cạnh đó thì sóng điện thoại sim 2 tụt quá có lúc có một nất thôi,,, Lúc đầu mình mua máy xaomi tầm 3tr cũng bị như thế,,, người khác gọi không được nên khi máy này ra mình lại mua máy này vì thấy rất nhiều tính năng rất tốt,,, Mình đang dùng xaomi k20 pro không bị tình trạng như mất sóng,, mình rất ủng hộ xaomi,, nhưng khi nhận thấy tình trạng như vậy rất thất vọng xaomi tầm trung này ,mình có thể đổi máy khác được không,, mình mới dùng 1ngày thôi,, máy xaomi 3tr mình không biết vì sao người khác gọi không được khi tìm hiểu nguyên nhân được thì máy quá ngày đổi rồi nên phải bỏ'),
(46, '2020-04-06 02:32:15', '2020-04-06 02:34:05', 4, 'App\\Models\\Product', 68, 16, 'Mua dc 3 ngày rồi Màu vàng Mới xài bữa đầu ok Bữa thứ 3 là hơi hao pin rồi Để theo dõi tiếp xem sao'),
(47, '2020-04-06 02:34:17', '2020-04-06 02:52:24', 2, 'App\\Models\\Product', 66, 16, 'Máy đẹp nhưng khi đổi từ note 8 pro lên thì thấy thất vọng tất cả các tác vụ thông thường đều không mượt bằng note 8pro lướt web chơi game cũng vậy'),
(48, '2020-04-06 02:52:48', '2020-04-06 03:50:42', 3, 'App\\Models\\Product', 72, 16, 'Máy đẹp, camera được, chơi game khá tốt, pin trâu. Rất ưng ý với số tiền bỏ ra.'),
(49, '2020-04-06 08:03:04', '2020-04-06 08:03:13', 3, 'App\\Models\\Product', 111, 20, 'Mua dc 3 ngày rồi Màu vàng Mới xài bữa đầu ok Bữa thứ 3 là hơi hao pin rồi Để theo dõi tiếp xem sao'),
(50, '2020-04-06 17:04:59', '2020-04-06 17:04:59', 3, 'App\\Models\\Product', 79, 20, 'Nói chung dùng OK máy hơi nóng xíu và camera tạm ổn thôi chưa hoàn hảo cho lắm thua xa con Xiaomi mi 9t'),
(51, '2020-04-06 17:13:36', '2020-04-06 17:13:36', 3, 'App\\Models\\Product', 73, 20, 'Nhận máy hôm 3/4 Sản phẩm tốt trong tầm giá, pin trâu, cam đẹp , chíp ok, có điểm do màn hình LCD nên màu sắc ko so dc với Amoled , trước đây dùng Note4x giờ nâng lên Note 9S quá ok luôn'),
(52, '2020-04-06 17:39:22', '2020-04-06 17:39:22', 3, 'App\\Models\\Product', 106, 20, 'Mua dc 3 ngày rồi Màu vàng Mới xài bữa đầu ok Bữa thứ 3 là hơi hao pin rồi Để theo dõi tiếp xem sao'),
(53, '2020-04-07 02:31:01', '2020-04-07 02:31:01', 4, 'App\\Models\\Product', 65, 16, 'Mua dc 3 ngày rồi Màu vàng Mới xài bữa đầu ok Bữa thứ 3 là hơi hao pin rồi Để theo dõi tiếp xem sao'),
(54, '2020-04-08 01:46:23', '2020-04-08 01:46:23', 3, 'App\\Models\\Product', 115, 16, 'Không biết có ai giống e chưa. Cam bị cấn nhẹ cái nứt một đường ạ. Thiết nghĩ nên mua ốp lưng có bảo vệ cụm cam hoặc dán cường lực. Còn lại mọi thứ đều tốt trong tầm giá! Nv bán hàng nhiệt tình nữa!'),
(55, '2020-04-08 01:52:36', '2020-04-08 01:52:36', 4, 'App\\Models\\Product', 117, 16, 'Giá quá tuyệt vời. Đẹp và chất số với tầm giá. Máy chơi game mượt. Pin trâu. Nói chung là ngon'),
(56, '2020-04-08 03:52:32', '2020-04-12 00:21:15', 5, 'App\\Models\\Product', 64, 16, 'Ngon, rất ngon, rất rất ngon. Đáng tiền, nv nhiệt tình và dễ thương. Pin, camera theo mình ngang tầm với 11 pro max mình đang sử dụng. Sẽ tiếp tục ủng hộ'),
(57, '2020-04-12 01:08:34', '2020-04-12 01:08:34', 3, 'App\\Models\\Product', 114, 16, 'Có cách nào giúp đỡ hao pin k.. con mình pin k ổn.'),
(58, '2020-04-12 01:09:32', '2020-04-12 01:09:32', 3, 'App\\Models\\Product', 108, 16, 'Có cách nào giúp đỡ hao pin k.. con mình pin k ổn.'),
(59, '2020-04-12 01:10:11', '2020-04-12 01:10:39', 4, 'App\\Models\\Product', 119, 16, 'Có cách nào giúp đỡ hao pin k.. con mình pin k ổn.'),
(60, '2020-04-12 01:18:53', '2020-04-12 01:18:53', 3, 'App\\Models\\Product', 81, 16, 'chưa dùng thử nên nói vậy, cứ dùng thử đi rồi hãy phán tôi có tự an ủi không, cười'),
(62, '2020-04-12 01:27:19', '2020-04-12 01:27:19', 4, 'App\\Models\\Product', 88, 16, 'chưa dùng thử nên nói vậy, cứ dùng thử đi rồi hãy phán tôi có tự an ủi không'),
(63, '2020-04-12 02:19:09', '2020-04-12 04:06:03', 4, 'App\\Models\\Product', 97, 20, 'Thấy ok hết, mỗi you tube là phải xem trên web. Còn các mặt khác mình thấy rất tuyệt, các phím cơ học tối giảm, dùng cử chỉ và phím cảm ứng đem lại trải nghiệm khác biệt và thú vị. Chụp ảnh cũng rất ok. Mỗi tội ai thích selfie thì chắc ko thấy quá ưng ý.'),
(64, '2020-04-12 04:41:17', '2020-04-12 04:41:17', 4, 'App\\Models\\Product', 67, 20, 'Thấy ok hết, mỗi you tube là phải xem trên web. Còn các mặt khác mình thấy rất tuyệt, các phím cơ học tối giảm, dùng cử chỉ và phím cảm ứng đem lại trải nghiệm khác biệt và thú vị. Chụp ảnh cũng rất ok. Mỗi tội ai thích selfie thì chắc ko thấy quá ưng ý.'),
(65, '2020-04-12 20:46:45', '2020-04-12 20:46:45', 3, 'App\\Models\\Product', 64, 19, 'Máy ổn định trong tầm giá. chụp ảnh khá OK. nói chung là đẹp'),
(66, '2020-04-13 00:28:36', '2020-04-13 00:28:36', 3, 'App\\Models\\Product', 87, 23, 'Máy mới mua mà sao sạc pin nóng quá vậy, tắt nguồn rồi sạc mà vẫn nóng, máy cũ đang sử dụng ngta cũng đâu có nóng như vậy. không biết sử dụng lâu dài, bị nóng thế này có ảnh hưởng gì không?'),
(67, '2020-04-13 02:01:24', '2020-04-13 02:01:24', 4, 'App\\Models\\Product', 68, 23, 'Tại sao quay video dưới điện tuýp thì video lại có gợn sóng. Máy bắt sóng wifi và sóng điện thoại khá kém. Chụp ảnh bệt màu, ảnh thì vỡ. Ngoài ra thì pin ổn không quá nóng khi sử dụng. Màn hình thì chấp nhận việc không quá nịnh mắt như các hãng khác. Nói chung là bù trừ. Mua máy chỉ vì pin trâu.'),
(68, '2020-04-13 03:08:24', '2020-04-13 03:08:24', 3, 'App\\Models\\Product', 117, 23, 'Máy xài ok, pin trâu bò, thiết kế đẹp,cam tốt, game mượt mà. Chỉ tội có cái hay tắt nguồn quá, ngày tắt nguồn 2,3 lần. có ai loi giống mình không? Nhiêu luc muốn đập luôn máy. Đi máy cho rồi vô kiểm tra so so rồi cầm về tiếp.'),
(69, '2020-04-13 03:30:50', '2020-04-13 03:30:50', 4, 'App\\Models\\Product', 63, 23, 'Máy đẹp , mới lấy hôm nay , cầm chắc tay , màu trắng nhé . Về sau đánh giá thêm @@'),
(70, '2020-04-13 03:32:27', '2020-04-13 03:32:27', 3, 'App\\Models\\Product', 64, 23, 'Máy đẹp , mới lấy hôm nay , cầm chắc tay , màu trắng nhé . Về sau đánh giá thêm @@'),
(71, '2020-04-13 03:33:09', '2020-04-13 03:33:09', 4, 'App\\Models\\Product', 118, 23, 'Mới mua được 2 ngài . thấy Sài cũng tốt .vs tầm giá này thì OK rồi .. còn mấy cha nào muốn cam tốt .loa hay màng hình nhanh mượt thì mua iPhone 10.11 sam sung s9.s10 gì đó mượt muốn pin châu nữa thì vừa sạc vừa chơi bao ko hết pin . xem đánh giá thấy ước chế vá'),
(72, '2020-04-13 03:33:55', '2020-04-13 03:33:55', 3, 'App\\Models\\Product', 119, 23, 'Kết nối mạng kém xem phim cứ bị load . bạn mình cùng cty mua chước 3 hôm dính lỗi này .không biết do phần mềm hay do gì vây.chán quá'),
(73, '2020-04-13 03:48:11', '2020-04-13 03:48:11', 4, 'App\\Models\\Product', 63, 24, 'Mua hồi 8/4. Máy tối, sạc nhanh, pin trâu, game liên quân max setting (ko bật đc HD) mượt..combat fps 59-60, PUBG mình ko chơi nên ko biết đánh giá. Sử dụng vài tháng nữa xem sao rồi đánh giá tiếp. THANKS nv TGDD Cần Đước phục vụ tận tình, dễ thương 😊'),
(74, '2020-04-13 03:48:52', '2020-04-13 03:55:32', 2, 'App\\Models\\Product', 87, 24, 'Máy mới lấy về lúc nhận được cuộc gọi lúc không máy bị lỗi nhận cuộc gọi. Pin thì trâu mọi cái ok trong tầm giá. Không biết phải do phần mềm mà máy bị lỗi nhận cuộc gọi không có ai giống mình không vậy'),
(75, '2020-04-13 03:50:14', '2020-04-13 03:50:14', 3, 'App\\Models\\Product', 64, 24, 'Có bạn nào máy tự động tắt nguồn, sau đó phải bật lại nguồn không, mình đã đổi hai lần mà máy nào cũng bị,'),
(76, '2020-04-13 03:50:59', '2020-04-13 03:50:59', 4, 'App\\Models\\Product', 67, 24, 'Máy mới lấy về lúc nhận được cuộc gọi lúc không máy bị lỗi nhận cuộc gọi. Pin thì trâu mọi cái ok trong tầm giá. Không biết phải do phần mềm mà máy bị lỗi nhận cuộc gọi không có ai giống mình không vậy'),
(77, '2020-04-13 03:51:25', '2020-04-13 03:51:25', 3, 'App\\Models\\Product', 108, 24, 'Máy mới lấy về lúc nhận được cuộc gọi lúc không máy bị lỗi nhận cuộc gọi. Pin thì trâu mọi cái ok trong tầm giá. Không biết phải do phần mềm mà máy bị lỗi nhận cuộc gọi không có ai giống mình không vậy'),
(78, '2020-04-13 03:51:39', '2020-04-13 03:51:39', 5, 'App\\Models\\Product', 114, 24, 'Máy mới lấy về lúc nhận được cuộc gọi lúc không máy bị lỗi nhận cuộc gọi. Pin thì trâu mọi cái ok trong tầm giá. Không biết phải do phần mềm mà máy bị lỗi nhận cuộc gọi không có ai giống mình không vậy'),
(79, '2020-04-13 03:51:46', '2020-04-13 03:51:46', 2, 'App\\Models\\Product', 69, 24, 'Máy mới lấy về lúc nhận được cuộc gọi lúc không máy bị lỗi nhận cuộc gọi. Pin thì trâu mọi cái ok trong tầm giá. Không biết phải do phần mềm mà máy bị lỗi nhận cuộc gọi không có ai giống mình không vậy'),
(80, '2020-04-13 03:54:35', '2020-04-13 03:54:35', 2, 'App\\Models\\Product', 117, 24, 'Máy mới lấy về lúc nhận được cuộc gọi lúc không máy bị lỗi nhận cuộc gọi. Pin thì trâu mọi cái ok trong tầm giá. Không biết phải do phần mềm mà máy bị lỗi nhận cuộc gọi không có ai giống mình không vậy'),
(81, '2020-04-14 03:58:27', '2020-04-14 03:58:27', 3, 'App\\Models\\Product', 113, 15, 'Trong tầm giá thì em này khá ok, có mỗi màn do tầm TN hơi mờ, tác vụ rất nhanh không giật lag, chơi LOL Fps rất cao và mượt tuy nhiên quạt hơi ồn. Ai bị không hiện Camera thì vào Lenovo Vantage chỉnh lại setting nhé'),
(82, '2020-04-14 03:58:27', '2020-04-14 03:58:27', 3, 'App\\Models\\Product', 113, 15, 'Trong tầm giá thì em này khá ok, có mỗi màn do tầm TN hơi mờ, tác vụ rất nhanh không giật lag, chơi LOL Fps rất cao và mượt tuy nhiên quạt hơi ồn. Ai bị không hiện Camera thì vào Lenovo Vantage chỉnh lại setting nhé');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `settings`
--

CREATE TABLE `settings` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `phone` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `address` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `shipping_cost` int(10) UNSIGNED NOT NULL DEFAULT 100,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `settings`
--

INSERT INTO `settings` (`id`, `email`, `phone`, `address`, `shipping_cost`, `created_at`, `updated_at`) VALUES
(1, 'test@gmail.com', '0989748373', 'An Ha', 100, NULL, NULL),
(2, NULL, NULL, NULL, 100, NULL, NULL);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `sliders`
--

CREATE TABLE `sliders` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `button_text` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `button_link` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `priority` tinyint(3) UNSIGNED NOT NULL DEFAULT 10,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `sliders`
--

INSERT INTO `sliders` (`id`, `title`, `image`, `button_text`, `button_link`, `priority`, `created_at`, `updated_at`) VALUES
(4, 'Phụ Kiện Tri Ân Giảm Giá Coupon Đến 20%', '1585448894.png', NULL, 'http://localhost/Ecommerce/products/iphone-11-pro-max', 2, '2020-03-14 07:06:15', '2020-03-31 04:44:13'),
(6, 'Sắm IPhone 11 Giảm Đến 2.1 Triệu', '1585448908.png', NULL, 'http://localhost/Ecommerce/products/oppo-find-x2', 3, '2020-03-15 04:16:05', '2020-03-31 04:24:12'),
(8, 'LapTop Ưu Đãi Giảm Ngay 1.2 Triệu', '1585449553.png', NULL, 'http://localhost/Ecommerce/products/redme-note-9s', 1, '2020-03-15 06:56:57', '2020-03-31 04:38:10'),
(124, 'adsds', '1586343371.png', NULL, NULL, 4, '2020-04-08 03:56:12', '2020-04-08 03:56:12');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `first_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `last_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `username` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone_no` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `street_address` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `division_id` int(10) UNSIGNED NOT NULL COMMENT 'Division Table ID',
  `district_id` int(10) UNSIGNED NOT NULL COMMENT 'District Table ID',
  `status` tinyint(3) UNSIGNED NOT NULL DEFAULT 0 COMMENT '0=Inactive|1=Active|2=Ban',
  `ip_address` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `avatar` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `shipping_address` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `users`
--

INSERT INTO `users` (`id`, `first_name`, `last_name`, `username`, `phone_no`, `email`, `email_verified_at`, `password`, `street_address`, `division_id`, `district_id`, `status`, `ip_address`, `avatar`, `shipping_address`, `remember_token`, `created_at`, `updated_at`) VALUES
(15, 'Phú', 'Thái', 'phuthai', '0989748373', 'dongphuthai.222@gmail.com', '2020-03-10 17:18:29', '$2y$10$.x5W5jEt0YtQo3UBVBomMutVsSXT5yDhvIs8pVhAnBkPR/GV.f1kS', 'An Ha', 5, 3, 1, '::1', NULL, NULL, '7lsZHKuAx30XN8AEQ1lYU4fnvNoSqx8UJVoAn10LN9pRD5ebnQ5nFjDR90hF', '2020-03-10 17:17:24', '2020-03-10 17:18:29'),
(16, 'Phú', 'Dương', 'phuduong', '06577278721', 'kensuli.tl@gmail.com', '2020-03-10 17:21:06', '$2y$10$4aGWKLdPLL37O9SG9vKZ9u39E.nb5Mjb/kC6x/e6.lSEEokG5JpRi', 'Nga Tu So', 1, 2, 1, '::1', NULL, NULL, NULL, '2020-03-10 17:20:30', '2020-03-10 17:21:06'),
(19, 'Nguyễn', 'Tuân', 'nguyentuan', '012457346', 'phuthai.lgbg.96.tp@gmail.com', '2020-03-31 17:43:47', '$2y$10$LfvOjOoFz47nRpp1B15mwuMnaRXrLxOX5F/xY5BH2ffiY4RUKL4Qu', 'Hoa Phượng', 7, 5, 1, '::1', NULL, NULL, NULL, '2020-03-31 17:43:26', '2020-03-31 17:43:47'),
(20, 'Hoàng', 'Hải', 'hoanghai', '4457246464', 'phuthaibk96@gmail.com', '2020-03-31 17:50:46', '$2y$10$LS0drHg1qt05mL5BuJ/cwOcuK03Dlemqx0XJiyfOPnfEte1A5oAGW', 'adb', 6, 6, 1, '::1', NULL, NULL, NULL, '2020-03-31 17:50:31', '2020-03-31 17:50:46'),
(23, 'Quang', 'Đăng', 'quangdang', '01657727872', '20144011@student.hust.edu.vn', '2020-04-13 00:27:47', '$2y$10$ckpiA3iskF7wX.4WzsGerOjUNMSH1JtRL1zYx/a5RMSy7vHyRrbLG', 'Gia Lâm', 1, 1, 1, '::1', NULL, NULL, NULL, '2020-04-13 00:27:23', '2020-04-13 00:27:47'),
(24, 'Như', 'Nguyệt', 'nhunguyet', '14275534', 'nhunguyet@gmail.com', '2020-04-12 17:00:00', '$2y$10$oAwtOYYEHYOHtmwyJFETkOdudkbPT73zEiUg74BfSORJM7XkUPVjq', 'Hiệp Hòa', 5, 7, 1, '::1', NULL, NULL, NULL, '2020-04-13 03:45:37', '2020-04-13 03:45:37');

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `admins`
--
ALTER TABLE `admins`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `admins_email_unique` (`email`);

--
-- Chỉ mục cho bảng `brands`
--
ALTER TABLE `brands`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `carts`
--
ALTER TABLE `carts`
  ADD PRIMARY KEY (`id`),
  ADD KEY `carts_user_id_foreign` (`user_id`),
  ADD KEY `carts_product_id_foreign` (`product_id`),
  ADD KEY `carts_order_id_foreign` (`order_id`);

--
-- Chỉ mục cho bảng `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `cmtrates`
--
ALTER TABLE `cmtrates`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `districts`
--
ALTER TABLE `districts`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `divisions`
--
ALTER TABLE `divisions`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`),
  ADD KEY `orders_user_id_foreign` (`user_id`),
  ADD KEY `orders_payment_id_foreign` (`payment_id`);

--
-- Chỉ mục cho bảng `paralaptops`
--
ALTER TABLE `paralaptops`
  ADD PRIMARY KEY (`id`),
  ADD KEY `paralaptops_product_id_foreign` (`product_id`);

--
-- Chỉ mục cho bảng `parameters`
--
ALTER TABLE `parameters`
  ADD PRIMARY KEY (`id`),
  ADD KEY `parameters_product_id_foreign` (`product_id`);

--
-- Chỉ mục cho bảng `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Chỉ mục cho bảng `payments`
--
ALTER TABLE `payments`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `payments_short_name_unique` (`short_name`);

--
-- Chỉ mục cho bảng `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `product_images`
--
ALTER TABLE `product_images`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `ratings`
--
ALTER TABLE `ratings`
  ADD PRIMARY KEY (`id`),
  ADD KEY `ratings_rateable_type_rateable_id_index` (`rateable_type`,`rateable_id`),
  ADD KEY `ratings_rateable_id_index` (`rateable_id`),
  ADD KEY `ratings_rateable_type_index` (`rateable_type`),
  ADD KEY `ratings_user_id_foreign` (`user_id`);

--
-- Chỉ mục cho bảng `settings`
--
ALTER TABLE `settings`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `sliders`
--
ALTER TABLE `sliders`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_username_unique` (`username`),
  ADD UNIQUE KEY `users_phone_no_unique` (`phone_no`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `admins`
--
ALTER TABLE `admins`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT cho bảng `brands`
--
ALTER TABLE `brands`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT cho bảng `carts`
--
ALTER TABLE `carts`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=66;

--
-- AUTO_INCREMENT cho bảng `categories`
--
ALTER TABLE `categories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=74;

--
-- AUTO_INCREMENT cho bảng `cmtrates`
--
ALTER TABLE `cmtrates`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=122;

--
-- AUTO_INCREMENT cho bảng `districts`
--
ALTER TABLE `districts`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT cho bảng `divisions`
--
ALTER TABLE `divisions`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT cho bảng `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=38;

--
-- AUTO_INCREMENT cho bảng `orders`
--
ALTER TABLE `orders`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT cho bảng `paralaptops`
--
ALTER TABLE `paralaptops`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT cho bảng `parameters`
--
ALTER TABLE `parameters`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT cho bảng `payments`
--
ALTER TABLE `payments`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT cho bảng `products`
--
ALTER TABLE `products`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=128;

--
-- AUTO_INCREMENT cho bảng `product_images`
--
ALTER TABLE `product_images`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=203;

--
-- AUTO_INCREMENT cho bảng `ratings`
--
ALTER TABLE `ratings`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=83;

--
-- AUTO_INCREMENT cho bảng `settings`
--
ALTER TABLE `settings`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT cho bảng `sliders`
--
ALTER TABLE `sliders`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=125;

--
-- AUTO_INCREMENT cho bảng `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- Các ràng buộc cho các bảng đã đổ
--

--
-- Các ràng buộc cho bảng `carts`
--
ALTER TABLE `carts`
  ADD CONSTRAINT `carts_order_id_foreign` FOREIGN KEY (`order_id`) REFERENCES `orders` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `carts_product_id_foreign` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `carts_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Các ràng buộc cho bảng `orders`
--
ALTER TABLE `orders`
  ADD CONSTRAINT `orders_payment_id_foreign` FOREIGN KEY (`payment_id`) REFERENCES `payments` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `orders_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Các ràng buộc cho bảng `paralaptops`
--
ALTER TABLE `paralaptops`
  ADD CONSTRAINT `paralaptops_product_id_foreign` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`) ON DELETE CASCADE;

--
-- Các ràng buộc cho bảng `parameters`
--
ALTER TABLE `parameters`
  ADD CONSTRAINT `parameters_product_id_foreign` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`) ON DELETE CASCADE;

--
-- Các ràng buộc cho bảng `ratings`
--
ALTER TABLE `ratings`
  ADD CONSTRAINT `ratings_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
