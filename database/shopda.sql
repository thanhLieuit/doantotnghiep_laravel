-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th6 11, 2019 lúc 05:07 AM
-- Phiên bản máy phục vụ: 10.1.38-MariaDB
-- Phiên bản PHP: 7.3.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `shopda`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `banners`
--

CREATE TABLE `banners` (
  `id` int(10) UNSIGNED NOT NULL,
  `name_banner` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `Image` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `active` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `banners`
--

INSERT INTO `banners` (`id`, `name_banner`, `Image`, `active`, `created_at`, `updated_at`) VALUES
(1, 'hinh1', 'banner-1.png', 'active', '2019-05-11 05:07:27', '2019-05-11 05:07:27'),
(2, 'hinh2', 'banner-2.jpg', 'not', '2019-05-11 07:04:20', '2019-05-11 07:04:20'),
(4, 'hinh3', 'slide1.jpg', 'not', '2019-05-11 07:11:11', '2019-05-11 07:11:11'),
(5, 'hinh4', 'slide2.jpg', 'not', '2019-05-11 07:11:27', '2019-05-11 07:11:27');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `comments`
--

CREATE TABLE `comments` (
  `id` int(10) UNSIGNED NOT NULL,
  `name_c` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `id_product` int(10) UNSIGNED DEFAULT NULL,
  `comment` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `danhgia` int(20) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `comments`
--

INSERT INTO `comments` (`id`, `name_c`, `id_product`, `comment`, `danhgia`, `created_at`, `updated_at`) VALUES
(9, 'lieu', 4, 'tốt', 5, '2019-05-14 23:31:49', '2019-05-14 23:31:49'),
(13, 'hung', 19, 'tốt', 5, '2019-05-21 00:50:54', '2019-05-21 00:50:54'),
(14, 'lieu', 53, 'sanr phẩm chất lượng', 5, '2019-06-04 21:13:03', '2019-06-04 21:13:03');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `customers`
--

CREATE TABLE `customers` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `phone` int(11) NOT NULL,
  `address` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `customers`
--

INSERT INTO `customers` (`id`, `name`, `email`, `password`, `phone`, `address`, `created_at`, `updated_at`) VALUES
(20, 'thanh lieu', 'lieu@gmail.com', NULL, 767130156, '04nam tho 3', '2019-05-29 23:16:42', '2019-06-09 04:34:04'),
(21, 'hung', 'hung@gmail.com', NULL, 764031551, 'dedasd', '2019-06-02 23:15:36', '2019-06-02 23:15:36');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `kho`
--

CREATE TABLE `kho` (
  `id` int(10) UNSIGNED NOT NULL,
  `soluong` int(11) DEFAULT NULL,
  `trangthai` varchar(225) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `id_product` int(10) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `kho`
--

INSERT INTO `kho` (`id`, `soluong`, `trangthai`, `id_product`, `created_at`, `updated_at`) VALUES
(1, 10, 'conhang', 50, '2019-05-22 18:37:54', '2019-05-22 18:37:54'),
(5, 11, 'conhang', 7, NULL, '2019-05-27 00:09:54'),
(6, 10, 'conhang', 52, '2019-05-22 18:50:05', '2019-05-22 18:50:05'),
(7, 11, 'conhang', 8, NULL, '2019-05-24 04:51:48'),
(8, 100, 'conhang', 9, NULL, NULL),
(9, 100, 'conhang', 10, NULL, NULL),
(10, 100, 'conhang', 11, NULL, NULL),
(11, 10, 'conhang', 12, NULL, '2019-05-24 05:06:39'),
(12, 11, 'conhang', 15, NULL, '2019-06-09 04:35:05'),
(13, 996, 'conhang', 16, NULL, '2019-06-07 19:52:33'),
(14, 98, 'conhang', 17, NULL, '2019-05-26 19:26:55'),
(15, 10, 'conhang', 18, NULL, '2019-06-03 02:38:39'),
(16, 96, 'conhang', 19, NULL, '2019-06-03 18:29:07'),
(17, 100, 'conhang', 20, NULL, NULL),
(18, 93, 'conhang', 53, '2019-05-22 20:53:38', '2019-06-05 23:58:03'),
(19, 100, 'conhang', 13, NULL, NULL),
(20, 100, 'conhang', 14, NULL, NULL),
(22, 100, 'conhang', 21, NULL, NULL),
(23, 100, 'conhang', 22, NULL, NULL),
(24, 100, 'conhang', 23, NULL, '2019-05-24 02:44:42'),
(25, 99, 'conhang', 24, NULL, '2019-06-03 02:38:41'),
(26, 100, 'conhang', 25, NULL, NULL),
(43, 100, 'conhang', 26, NULL, NULL),
(44, 100, 'conhang', 27, NULL, NULL),
(45, 100, 'conhang', 28, NULL, NULL),
(46, 100, 'conhang', 29, NULL, NULL),
(47, 100, 'conhang', 30, NULL, NULL),
(48, 100, 'conhang', 31, NULL, NULL),
(49, 100, 'conhang', 32, NULL, NULL),
(50, 100, 'conhang', 33, NULL, NULL),
(51, 100, 'conhang', 34, NULL, NULL),
(52, 100, 'conhang', 35, NULL, NULL),
(53, 100, 'conhang', 36, NULL, NULL),
(54, 100, 'conhang', 37, NULL, NULL),
(55, 100, 'conhang', 38, NULL, NULL),
(56, 100, 'conhang', 39, NULL, NULL),
(57, 100, 'conhang', 40, NULL, NULL),
(58, 100, 'conhang', 41, NULL, NULL),
(59, 100, 'conhang', 42, NULL, NULL),
(60, 100, 'conhang', 43, NULL, NULL),
(61, 100, 'conhang', 44, NULL, NULL),
(62, 100, 'conhang', 45, NULL, NULL),
(63, 100, 'conhang', 46, NULL, NULL),
(64, 100, 'conhang', 47, NULL, NULL),
(65, 100, 'conhang', 48, NULL, NULL),
(66, 100, 'conhang', 49, NULL, NULL),
(68, 100, 'conhang', 51, NULL, NULL),
(69, 20, 'conhang', 54, '2019-05-27 20:37:35', '2019-05-27 20:37:35'),
(70, 11, 'conhang', 55, '2019-05-27 20:38:55', '2019-05-27 20:38:55'),
(71, 220, 'conhang', 56, '2019-05-27 20:40:13', '2019-05-27 20:40:13'),
(72, 100, 'conhang', 57, '2019-06-05 23:29:46', '2019-06-05 23:29:46'),
(73, 100, 'conhang', 58, '2019-06-05 23:30:43', '2019-06-05 23:30:43'),
(74, 100, 'conhang', 59, '2019-06-05 23:32:50', '2019-06-05 23:32:50'),
(75, 100, 'conhang', 60, '2019-06-05 23:33:41', '2019-06-05 23:33:41'),
(76, 100, 'conhang', 61, '2019-06-05 23:40:51', '2019-06-05 23:40:51'),
(77, 100, 'conhang', 62, '2019-06-05 23:43:17', '2019-06-05 23:43:17');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `lienhes`
--

CREATE TABLE `lienhes` (
  `id` int(10) UNSIGNED NOT NULL,
  `Name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `Email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `vande` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `noidung` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tinhtrang` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `id_u` int(10) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `lienhes`
--

INSERT INTO `lienhes` (`id`, `Name`, `Email`, `vande`, `noidung`, `tinhtrang`, `id_u`, `created_at`, `updated_at`) VALUES
(1, 'lieu', 'lieu@gmail.com', 'bánh keo', 'ưed', 'daduyet', 1, '2019-05-28 00:22:03', '2019-05-28 23:21:13');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `loaiproducts`
--

CREATE TABLE `loaiproducts` (
  `id` int(10) UNSIGNED NOT NULL,
  `id_menu` int(10) UNSIGNED NOT NULL,
  `name_loai` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `loaiproducts`
--

INSERT INTO `loaiproducts` (`id`, `id_menu`, `name_loai`, `created_at`, `updated_at`) VALUES
(1, 1, 'Bánh kẹo, đồ ăn vặt', '2019-05-07 20:06:39', '2019-05-07 20:06:39'),
(2, 1, 'Hóa mỹ phẩm', '2019-05-07 20:06:54', '2019-05-07 20:06:54'),
(3, 1, 'Vali, balo, túi du lịch', '2019-05-07 20:07:00', '2019-05-07 20:07:00'),
(4, 1, 'Đồ hộp, đồ khô', '2019-05-07 20:07:06', '2019-05-07 20:07:06'),
(5, 1, 'Đồ uống giải khát', '2019-05-07 20:07:12', '2019-05-07 20:07:12'),
(8, 2, 'Chăm sóc da mặt', '2019-05-07 20:07:42', '2019-05-07 20:07:42'),
(10, 3, 'Tã & Dụng cụ vệ sinh', '2019-05-07 20:08:03', '2019-05-07 20:08:03'),
(11, 3, 'Xe & Ghế', '2019-05-07 20:08:11', '2019-05-07 20:08:11'),
(12, 3, 'Đồ chơi thú nhồi bông', '2019-05-07 20:08:19', '2019-05-07 20:08:19'),
(13, 3, 'Đồ dùng uống sữa & ăn dặm', '2019-05-07 20:08:27', '2019-05-07 20:08:27'),
(14, 4, 'Kính Mắt', '2019-05-07 20:08:38', '2019-05-07 20:08:38'),
(15, 4, 'Thời trang Nam', '2019-05-07 20:08:48', '2019-05-07 20:08:48'),
(16, 4, 'Thời trang Nữ', '2019-05-07 20:08:56', '2019-05-07 20:08:56'),
(17, 4, 'Túi xách', '2019-05-07 20:09:07', '2019-05-07 20:09:07'),
(18, 4, 'Đồng Hồ', '2019-05-07 20:09:16', '2019-05-07 20:09:16'),
(19, 5, 'Máy tính và linh kiện máy tính', '2019-05-07 20:09:32', '2019-05-07 20:09:32'),
(20, 5, 'Thiết bị âm thanh', '2019-05-07 20:09:41', '2019-05-07 20:09:41'),
(21, 5, 'Thiết bị mạng và Lưu trữ', '2019-05-07 20:10:01', '2019-05-07 20:10:01'),
(22, 5, 'Điện thoại - Máy tính bảng', '2019-05-07 20:10:12', '2019-05-07 20:10:12'),
(23, 6, 'Bếp & Phòng ăn', '2019-05-07 20:10:22', '2019-05-07 20:10:22'),
(24, 6, 'Trang trí nội thất & nhà cửa', '2019-05-07 20:10:32', '2019-05-07 20:10:32'),
(25, 6, 'Điện gia dụng', '2019-05-07 20:10:46', '2019-05-07 20:10:46'),
(26, 2, 'Chăm sóc răng miệng', '2019-05-15 20:25:17', '2019-05-15 20:25:17'),
(27, 2, 'Trang điểm', '2019-05-15 20:29:23', '2019-05-15 20:29:23');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `menuchas`
--

CREATE TABLE `menuchas` (
  `id` int(10) UNSIGNED NOT NULL,
  `name_menu` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `menuchas`
--

INSERT INTO `menuchas` (`id`, `name_menu`, `created_at`, `updated_at`) VALUES
(1, 'Bách hóa Online', '2019-05-07 19:56:03', '2019-05-07 19:56:03'),
(2, 'Chăm sóc sức khỏe và làm đẹp', '2019-05-07 19:56:25', '2019-05-07 19:56:25'),
(3, 'Thế giới cho bé', '2019-05-07 19:56:30', '2019-05-07 19:56:30'),
(4, 'Thời trang và phụ kiện', '2019-05-07 19:56:35', '2019-05-07 19:56:35'),
(5, 'Tin học và Thiết bị số', '2019-05-07 19:56:40', '2019-05-07 19:56:40'),
(6, 'Đồ gia dụng', '2019-05-07 19:56:50', '2019-05-07 19:56:50');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2019_05_08_015319_create_table_customers_table', 1),
(4, '2019_05_08_015351_create_table_orders_table', 1),
(5, '2019_05_08_015416_create_table_menuchas_table', 1),
(6, '2019_05_08_020516_create_table_loaiproducts_table', 1),
(8, '2019_05_08_020606_create_table_order_products_table', 1),
(9, '2019_05_09_104947_create_table_banners_table', 2),
(10, '2019_03_07_064901_create_roles_table', 3),
(11, '2019_03_07_065154_create_roleusers_table', 3),
(12, '2019_03_07_070021_create_permissions_table', 3),
(13, '2019_03_13_022030_create_rolepermission_table', 3),
(15, '2019_05_13_013558_create_table_comments_table', 4),
(16, '2019_05_14_031314_create_table_nhanviens_table', 5),
(17, '2019_05_08_020541_create_table_products_table', 6),
(18, '2019_05_22_054617_create_table_kho_table', 7),
(19, '2019_05_27_024159_create_table_nccs_table', 8),
(21, '2019_05_28_015336_create_table_truycaps_table', 9),
(22, '2019_05_28_063920_create_table_lienhes_table', 10);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `nccs`
--

CREATE TABLE `nccs` (
  `id` int(10) UNSIGNED NOT NULL,
  `tenncc` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` int(11) NOT NULL,
  `address` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `note` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `nccs`
--

INSERT INTO `nccs` (`id`, `tenncc`, `phone`, `address`, `note`, `created_at`, `updated_at`) VALUES
(1, 'bánh kẹo', 1231241, '04nam tho 3', 'banh keo', '2019-05-26 20:44:07', '2019-05-26 20:44:07'),
(2, 'nước hoa', 66515165, '1213', 'nước hoa ba lo', '2019-05-26 21:22:16', '2019-05-26 21:22:16');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `nhanviens`
--

CREATE TABLE `nhanviens` (
  `id` int(10) UNSIGNED NOT NULL,
  `fullname` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `phone` int(20) DEFAULT NULL,
  `age` int(11) DEFAULT NULL,
  `cmnd` int(11) DEFAULT NULL,
  `address` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `Image` text COLLATE utf8mb4_unicode_ci,
  `user_id` int(10) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `nhanviens`
--

INSERT INTO `nhanviens` (`id`, `fullname`, `phone`, `age`, `cmnd`, `address`, `Image`, `user_id`, `created_at`, `updated_at`) VALUES
(1, 'trần quang thanh liêu', 767130156, 21, 201121240, '04nam tho 3', '28279859_798218740388072_7415963014588792832_n.jpg', 1, '2019-05-13 22:08:40', '2019-05-21 20:34:05'),
(6, 'châu quốc hùng', 1515141, 22, 2011212121, '123', '4.jpg', 6, '2019-05-20 19:20:18', '2019-05-20 19:20:18'),
(18, NULL, NULL, NULL, NULL, NULL, NULL, 22, '2019-06-04 21:03:19', '2019-06-04 21:03:19'),
(19, NULL, NULL, NULL, NULL, NULL, NULL, 24, '2019-06-04 21:04:06', '2019-06-04 21:04:06'),
(20, NULL, NULL, NULL, NULL, NULL, NULL, 25, '2019-06-05 20:22:57', '2019-06-05 20:22:57');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `orders`
--

CREATE TABLE `orders` (
  `id` int(10) UNSIGNED NOT NULL,
  `id_c` int(10) UNSIGNED NOT NULL,
  `ngaydat` date DEFAULT NULL,
  `total` int(11) DEFAULT NULL,
  `Note` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `pay` varchar(225) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `id_u` int(10) UNSIGNED DEFAULT NULL,
  `xacnhan` varchar(225) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `orders`
--

INSERT INTO `orders` (`id`, `id_c`, `ngaydat`, `total`, `Note`, `pay`, `id_u`, `xacnhan`, `created_at`, `updated_at`) VALUES
(25, 20, '2019-05-30', 110000, 'nhanh', 'COD', 1, 'dahoanthanh', '2019-05-29 23:16:42', '2019-06-03 02:38:39'),
(26, 20, '2019-05-30', 15000, 'nhanh', 'COD', 1, 'dahoanthanh', '2019-05-29 23:27:06', '2019-06-03 02:38:40'),
(27, 21, '2019-06-03', 42000, 'nhanh', 'COD', 1, 'dahoanthanh', '2019-06-02 23:15:36', '2019-06-03 02:38:41'),
(28, 20, '2019-06-03', 15000, 'nhanh', 'COD', 1, 'dahoanthanh', '2019-06-02 23:35:28', '2019-06-03 02:38:42'),
(29, 20, '2019-06-03', 15000, 'nhanh', 'COD', 1, 'dahoanthanh', '2019-06-02 23:38:28', '2019-06-03 02:38:43'),
(30, 20, '2019-06-03', 42000, 'tutu', 'COD', 1, 'dahoanthanh', '2019-06-03 06:43:27', '2019-06-03 18:29:07'),
(31, 20, '2019-06-04', 15000, 'ship cẩ thân nha', 'ATM', 1, 'dahoanthanh', '2019-06-03 18:17:31', '2019-06-03 18:18:57'),
(32, 20, '2019-06-04', 179000, 'ship nhanh', 'COD', 1, 'dahoanthanh', '2019-06-03 21:28:08', '2019-06-03 21:28:49'),
(33, 20, '2019-06-05', 15000, 'ship nhanh', 'COD', 1, 'dahoanthanh', '2019-06-04 21:15:10', '2019-06-05 23:58:03'),
(34, 20, '2019-06-06', 20000, 'as', 'COD', 1, 'dangchuyenhang', '2019-06-05 23:54:03', '2019-06-05 23:56:02'),
(37, 20, '2019-06-06', 180000, 'asa', 'COD', 1, 'dahoanthanh', '2019-06-06 00:05:21', '2019-06-06 00:06:06'),
(38, 20, '2019-06-09', 179000, 'dsffds', 'COD', 1, 'dahoanthanh', '2019-06-09 04:34:04', '2019-06-09 04:34:21');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `order_products`
--

CREATE TABLE `order_products` (
  `id` int(10) UNSIGNED NOT NULL,
  `id_order` int(10) UNSIGNED NOT NULL,
  `id_product` int(10) UNSIGNED NOT NULL,
  `qty` int(11) NOT NULL,
  `Price` int(50) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `order_products`
--

INSERT INTO `order_products` (`id`, `id_order`, `id_product`, `qty`, `Price`, `created_at`, `updated_at`) VALUES
(30, 25, 19, 1, 42000, '2019-05-29 23:16:42', '2019-05-29 23:16:42'),
(31, 25, 18, 1, 68000, '2019-05-29 23:16:42', '2019-05-29 23:16:42'),
(32, 26, 53, 1, 15000, '2019-05-29 23:27:06', '2019-05-29 23:27:06'),
(33, 27, 24, 1, 42000, '2019-06-02 23:15:37', '2019-06-02 23:15:37'),
(34, 28, 53, 1, 15000, '2019-06-02 23:35:28', '2019-06-02 23:35:28'),
(35, 29, 53, 1, 15000, '2019-06-02 23:38:28', '2019-06-02 23:38:28'),
(36, 30, 19, 1, 42000, '2019-06-03 06:43:27', '2019-06-03 06:43:27'),
(37, 31, 53, 1, 15000, '2019-06-03 18:17:31', '2019-06-03 18:17:31'),
(38, 32, 15, 1, 179000, '2019-06-03 21:28:08', '2019-06-03 21:28:08'),
(39, 33, 53, 1, 15000, '2019-06-04 21:15:10', '2019-06-04 21:15:10'),
(40, 34, 61, 1, 20000, '2019-06-05 23:54:03', '2019-06-05 23:54:03'),
(43, 37, 16, 1, 180000, '2019-06-06 00:05:21', '2019-06-06 00:05:21'),
(44, 38, 15, 1, 179000, '2019-06-09 04:34:04', '2019-06-09 04:34:04');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `permissions`
--

CREATE TABLE `permissions` (
  `id` int(10) UNSIGNED NOT NULL,
  `Name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `Description` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `permissions`
--

INSERT INTO `permissions` (`id`, `Name`, `Description`, `created_at`, `updated_at`) VALUES
(1, 'user-list', 'Danh Sách User', '2019-05-09 23:37:16', '2019-05-09 23:37:16'),
(2, 'user-edit', 'Sửa User', '2019-05-09 23:37:42', '2019-05-09 23:37:42'),
(3, 'user-delete', 'Xóa User', '2019-05-09 23:37:53', '2019-05-09 23:37:53'),
(4, 'role-list', 'Danh Sách Role', '2019-05-09 23:38:04', '2019-05-09 23:38:04'),
(5, 'role-add', 'Thêm Role', '2019-05-09 23:39:05', '2019-05-09 23:39:05'),
(6, 'role-edit', 'Sửa Role', '2019-05-09 23:39:22', '2019-05-09 23:39:22'),
(7, 'role-delete', 'Xóa Role', '2019-05-09 23:39:35', '2019-05-09 23:39:35'),
(8, 'product_list', 'danh sách sản phẩm', '2019-05-09 23:39:50', '2019-05-09 23:39:50'),
(9, 'product_add', 'thêm sản phẩm', '2019-05-09 23:40:01', '2019-05-09 23:40:01'),
(10, 'product_edit', 'sửa sản phẩm', '2019-05-09 23:40:10', '2019-05-09 23:40:10'),
(11, 'product_delete', 'xóa sản phẩm', '2019-05-09 23:40:26', '2019-05-09 23:40:26'),
(12, 'user-add', 'Thêm user', '2019-05-10 16:57:13', '2019-05-10 16:57:13'),
(13, 'permission-add', 'Thêm vai trò', '2019-05-10 17:02:12', '2019-05-10 17:02:12'),
(14, 'banner-add', 'thêm banner', '2019-05-10 17:40:42', '2019-05-10 17:40:42'),
(15, 'menu-add', 'thêm menu', '2019-05-11 04:28:53', '2019-05-11 04:28:53'),
(16, 'loaiproduct_add', 'thêm loại sản phẩm', '2019-05-11 04:29:43', '2019-05-11 04:29:43'),
(17, 'hoa-don', 'Hóa Đơn', '2019-05-27 01:27:59', '2019-05-27 01:27:59'),
(18, 'comment', 'bình luận', '2019-05-27 01:28:12', '2019-05-27 01:28:12'),
(19, 'giao-hang', 'Giao Hàng', '2019-05-27 01:28:28', '2019-05-27 01:28:28'),
(20, 'kho', 'Kho', '2019-05-27 01:28:37', '2019-05-27 01:28:37'),
(21, 'ncc', 'Nhà cung cấp', '2019-05-27 01:28:52', '2019-05-27 01:28:52');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `products`
--

CREATE TABLE `products` (
  `id` int(10) UNSIGNED NOT NULL,
  `id_loai` int(10) UNSIGNED NOT NULL,
  `Name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `Image` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `Price` int(11) NOT NULL,
  `Promotion_price` int(11) NOT NULL,
  `Detail` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `Hansd` date NOT NULL,
  `id_u` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `products`
--

INSERT INTO `products` (`id`, `id_loai`, `Name`, `Image`, `Price`, `Promotion_price`, `Detail`, `Hansd`, `id_u`, `created_at`, `updated_at`) VALUES
(4, 5, 'Hồng Trà Tắc', 'd76ab663-231c-4c50-15b4-5919ec5fa010.jpg', 39000, 0, 'doi-cap-nhat', '2019-05-16', 1, '2019-05-15 19:50:41', '2019-05-15 20:18:39'),
(5, 5, 'Cà phê SỮA (vừa)', '404a8512-a43e-4067-32cf-052ef5724645.jpg', 39000, 0, 'doi-cap-nhat', '2019-05-16', 1, '2019-05-15 19:51:22', '2019-05-24 04:38:23'),
(6, 5, 'Bạc Xỉu (vừa)', '2018416101056-2017317145330-bac-siu.jpg', 39000, 0, 'doi-cap-nhat', '2019-05-16', 1, '2019-05-15 19:51:52', '2019-05-15 20:19:00'),
(7, 1, 'Crepe Cầu Vồng', '2018515152415-crepe-rainbow-4.jpg', 45000, 40000, 'đợi cập nhật', '2019-05-16', 1, '2019-05-15 19:52:31', '2019-05-27 00:09:49'),
(8, 2, 'Bộ Pond’s chống lão hóa kem 50g/sửa rửa mặt 100ml', '5142019-48.jpg', 435000, 373800, 'bộ ponds chống lão hoá kem 50g sửa rửa mặt 100ml', '2019-05-16', 1, '2019-05-15 19:56:53', '2019-05-23 00:38:40'),
(9, 2, 'Dầu gội Pantene 900g các loại', '5142019-35.jpg', 159000, 122900, 'dau-goi-pantene-900g-cac-loai', '2019-05-16', 1, '2019-05-15 19:58:08', '2019-05-15 19:58:08'),
(10, 8, 'Dầu gội Sunsilk óng mượt rạng ngời/mềm mượt diệu kỳ 900g', '5142019-34.jpg', 151500, 119000, 'dầu gọi sunsilk ống mượt mềm mượt diệu kỳ 900g', '2019-05-16', 1, '2019-05-15 19:59:20', '2019-05-23 00:37:04'),
(11, 2, 'Kem chống nắng Sunplay 30g', '5142019-47.jpg', 80000, 70000, 'kem-chong-nang-sunplay-30g', '2019-05-16', 1, '2019-05-15 20:00:31', '2019-05-15 20:00:31'),
(12, 3, 'Vali Prince 7284_25 M Grey THƯƠNG HIỆU: PRINCE', 'prince-7284-25-m-grey_240.jpg', 3990000, 0, 'vali-keo-prince-7284-25-m-grey-la-dong-vali-cao-cap-cua-thuong-hieu-prince-be-mat-nham-chong-tray-lam-tu-chat-lieu-nhua-abs-cung-nhung-gam-mau-trang-nha-phu-hop-nhu-cau-cua-nguoi-su-dung-vali-keo-prince-7284-noi-bat-voi-thiet-ke-khoa-khung-chac-chan-ket-hop-khoa-so-tsa-an-toan-4-banh-xe-tren-4-truc-xoay-linh-hoat-3600-de-dang-di-chuyen-tren-cac-dia-hinh-khac-nhau-ngan-chua-do-rong-rai-dai-chu-x-co-dinh-hanh-ly-va-trang-bi-them-2-moc-nhua-treo-do-tien-loi-cho-nhung-chuyen-di', '2019-05-16', 1, '2019-05-15 20:02:55', '2019-05-24 05:05:14'),
(13, 3, 'Vali Rovigo Horizo IQ_20 S Red THƯƠNG HIỆU: ROVIGO', 'rovigo-horizo-iq-20-s-red_240.jpg', 2390000, 0, 'rovigo-horizo-iq-20-s-red-la-dong-san-pham-moi-ra-mat-thi-truong-cua-thuong-hieu-rovigo-vali-thoi-trang-rat-sang-trong-va-hien-dai-vali-duoc-lam-tu-chat-lieu-100-pp-deo-dai-do-ben-cao-can-va-dap-tot-thiet-ke-day-khoa-keo-duoc-che-kin-han-che-tham-nuoc-toi-da-8-banh-xe-xoay-linh-hoat-360-do-giup-vali-de-dang-di-chuyen-tren-nhieu-dia-hinh-khac-nhau', '2019-05-16', 1, '2019-05-15 20:03:47', '2019-05-15 20:03:47'),
(14, 3, 'Vali Rovigo Ginelli 8281B_20 S Black Carbon THƯƠNG HIỆU: ROVIGO', 'rovigo-ginelli-8281b-20-s-black-carbon_240.jpg', 2000000, 0, 'rovigo-ginelli-8281b-20-s-black-carbon-la-san-pham-vua-moi-cap-ben-tai-mia-trong-thang-3-vali-mang-nhieu-mau-sac-noi-bat-do-xanh-va-den-ginelli-duoc-thiet-ke-tich-hop-nhieu-tinh-nang-noi-bat-nhu-khoa-doi-chong-rach-hay-khoa-noi-rong-sieu-tien-loi-dam-bao-day-se-la-san-pham-se-lam-mua-lam-gio-tai-mia-nhe', '2019-05-16', 1, '2019-05-15 20:04:46', '2019-05-15 20:12:35'),
(15, 3, 'Balo Laptop BL418 - Chính Hãng Phân Phối 5.0', 'f797e4f5c40313e83d4ab0564057ec89.jpg', 179000, 0, 'kich-thuoc-cao-40cm-rong-9cm-ngang-30cm', '2019-05-16', 1, '2019-05-15 20:06:42', '2019-06-09 04:34:56'),
(16, 1, 'Bánh phồng tôm Âu - Á Foods hộp 180g', 'phong-tom-aufood-180g-210x210.jpg', 20000, 18000, 'đợi cập nhật', '2019-05-16', 1, '2019-05-15 20:15:35', '2019-06-07 19:52:33'),
(17, 4, 'Thịt bò khô xé sợi Tiến Nga hộp 125g', 'kho-bo-tien-nga-soi-125g-210x210.jpg', 65900, 0, 'doi-cap-nhat', '2019-05-16', 1, '2019-05-15 20:16:35', '2019-05-15 20:16:35'),
(18, 4, 'Cá đù cháy tỏi', 'ca-du-chay-toi-120g-210x210.jpg', 68000, 0, 'hu-120-g', '2019-05-16', 1, '2019-05-15 20:17:08', '2019-05-27 00:07:50'),
(19, 4, 'Khô bò Gia Định hộp 100g', 'gia-dinh-kho-bo-soi-al-100g-2243-210x210.jpg', 42000, 0, 'hop-100-g', '2019-05-16', 1, '2019-05-15 20:17:52', '2019-05-15 20:17:52'),
(20, 8, 'Bọt rửa mặt Cosmia cho da nhạy cảm chai 150ml', 'cosmia-bot-rm-da-n-cam-150ml-60727-210x210.jpg', 68000, 34000, 'chai 150 ml', '2019-05-16', 1, '2019-05-15 20:21:50', '2019-05-23 00:37:14'),
(21, 8, 'Gel rửa mặt Cosmia tinh khiết với D-Panthenol tuýp 150ml', 'cosmia-gel-rm-dpanthenol-150ml-60743-210x210.jpg', 58000, 29000, 'tuyp 150 ml', '2019-05-16', 1, '2019-05-15 20:22:38', '2019-05-23 00:37:23'),
(22, 8, 'Mặt nạ giấy Puffme bịch 20 cái', 'mat-na-kho-puffme-20m-210x210.jpg', 14000, 11000, 'bich 20 cai', '2019-05-16', 1, '2019-05-15 20:23:22', '2019-05-23 00:37:32'),
(23, 26, 'Bàn chải đánh răng cao cấp Oral Clean Carbon Slim Soft vỉ', 'bcdr-oral-clean-carbon-x2-210x210.jpg', 59000, 35000, 'vỉ 2 cái', '2019-05-16', 1, '2019-05-15 20:27:57', '2019-05-23 00:37:47'),
(24, 26, 'Nước súc miệng Listerine Cool Mint chai 250ml', 'nsm-listerine-coolmint-250ml-210x210.jpg', 58000, 42000, 'chai 250 ml', '2019-05-16', 1, '2019-05-15 20:28:35', '2019-05-23 00:37:58'),
(25, 27, 'Bông trang điểm Pop-Puf hộp 100 miếng', 'bong-ttrang-poppuf-2cdung-100m-20164-210x210.jpg', 25000, 22000, 'hop-100-mieng', '2019-05-16', 1, '2019-05-15 20:30:15', '2019-05-15 20:30:15'),
(26, 27, 'Nước tẩy trang sạch nhờn và ngừa mụn Nivea chai 125ml', 'dd-nivea-tay-trang-ngmun-125ml-210x210.jpg', 53000, 0, 'chai-125-ml', '2019-05-16', 1, '2019-05-15 20:30:48', '2019-05-15 20:30:48'),
(27, 27, 'Nước tẩy trang Nivea tinh chất ngọc trai sáng da chai 200ml', 'nivea-nuoc-ttrang-sang-da200ml-52944-210x210.jpg', 85000, 70000, 'chai-200-ml', '2019-05-16', 1, '2019-05-15 20:31:32', '2019-05-15 20:31:32'),
(28, 13, 'Bánh ăn dặm Gerber Lil\' Crunchies vị phô mai hộp 42g', 'gerber-ban-dam-pho-mai-42g-38570-210x210.jpg', 65000, 53000, 'hop-42-g', '2019-05-16', 1, '2019-05-15 20:33:50', '2019-05-15 20:33:50'),
(29, 13, 'Bột ăn dặm gà hầm và cà rốt Cerelac hộp 200g', 'bad-ga-ca-rot-cerelac-200g-210x210.jpg', 71000, 0, 'hop-200-g', '2019-05-16', 1, '2019-05-15 20:34:43', '2019-05-15 20:34:43'),
(30, 13, 'Núm vú cổ hẹp Agi silicone size S hộp 2 cái', 'num-vu-agi-co-hep-size-s-210x210.jpg', 25900, 0, 'doi-cap-nhat', '2019-05-16', 1, '2019-05-15 20:35:44', '2019-05-15 20:35:44'),
(31, 12, 'Đồ chơi Búp bê Cupcake Emco', 'dc-emco-bup-be-banh-ngot-1088-210x210.jpg', 129000, 0, '1-cai', '2019-05-16', 1, '2019-05-15 20:36:27', '2019-05-15 20:36:27'),
(32, 12, 'Đồ chơi Hộp búp bê', 'hop-bup-be-vn010102008-210x210.jpg', 61000, 0, 'doi-cap-nhat', '2019-05-16', 1, '2019-05-15 20:37:05', '2019-05-15 20:37:05'),
(33, 11, 'Xe jeep trẻ em', 'xe-jeep-210x210.jpg', 63000, 0, 'doi-cap-nhat', '2019-05-16', 1, '2019-05-15 20:37:43', '2019-05-15 20:37:43'),
(34, 10, 'Bàn chải đánh răng Oral Clean Royal Kid Soft', 'bcdr-oral-clean-carbon-x2-210x210.jpg', 45000, 29000, 'hop-1-cay', '2019-05-16', 1, '2019-05-15 20:39:24', '2019-05-15 20:39:24'),
(35, 10, 'Tã quần Bobby L36 gói 36 miếng', 'ta-quan-bobby-l36-210x210.jpg', 224000, 169000, 'bich-36-mieng', '2019-05-16', 1, '2019-05-15 20:40:03', '2019-05-15 20:40:03'),
(36, 10, 'Sữa tắm Johnson\'s Baby chứa sữa và tinh chất gạo 500ml', 'st-johnsons-baby-sua-gao-500ml-210x210.jpg', 90000, 0, 'chai-500-ml', '2019-05-16', 1, '2019-05-15 20:40:53', '2019-05-15 20:40:53'),
(37, 14, 'Kính mát nam Exfash EF 4026 C33 Đen vàng-tròng xanh đen', '1708701_M.png', 940000, 846000, 'doi-cap-nhat', '2019-05-16', 1, '2019-05-15 20:43:02', '2019-05-15 20:43:02'),
(38, 14, 'Kính mát nữ Exfash - EF27751_A08', '1899940_M.jpg', 800000, 0, 'doi-cap-nhat', '2019-05-16', 1, '2019-05-15 20:43:34', '2019-05-15 20:43:34'),
(39, 14, 'Kính mát Unisex Exfash EF4025 C51', '2007090_M.jpg', 324000, 285000, 'doi-cap-nhat', '2019-05-16', 1, '2019-05-15 20:44:09', '2019-05-15 20:44:09'),
(40, 15, 'Quần Jean Nam Form Loose Fit - QJ218002', 'mausac_xanh_qj218002.2_29ea78cd37f744bea3f1c27e0bd2e663_1024x1024.jpg', 450000, 0, 'chat-lieu-100-cotton-dac-tinh-co-do-tham-hut-mo-hoi-va-hut-am-cao-thoang-mat-huong-dan-su-dung-giat-o-nhiet-do-binh-thuong-voi-do-co-mau-tuong-tu-khong-duoc-dung-hoa-chat-tay-han-che-su-dung-may-say-ui-o-nhiet-do-binh-thuong', '2019-05-16', 1, '2019-05-15 20:45:46', '2019-05-16 23:20:41'),
(41, 15, 'Áo Sơ Mi Nam Tay Dài Jean Form Oversize - SM1042067', 'mausac_xanh_sm1042067_5_7e4d532df6bf4141930c03d50eeceff2_master.jpg', 480000, 0, 'doi-cap-nhat', '2019-05-16', 1, '2019-05-15 20:46:37', '2019-05-15 20:46:37'),
(42, 16, 'ĐẦM THÔ SƠ MI CỘT EO', 'den-1_ca93d658930e436e8019bf29b6a06c31_grande.jpg', 500000, 0, 'sap-ve', '2019-05-16', 1, '2019-05-15 20:47:48', '2019-05-15 20:47:48'),
(43, 16, 'ĐẦM A THÔ CA RÔ XOẮN EO', 'vang-1_ef902603bca74613891f2e013b708aa6_master.jpg', 550000, 0, 'hang-sap-ve', '2019-05-16', 1, '2019-05-15 20:48:51', '2019-05-15 20:48:51'),
(44, 16, 'ÁO VOAN SÁT NÁCH LAI XÉO', 'den-1_ea337500e50e44a29f77714d559d322f_master.jpg', 400000, 0, 'sap-ve', '2019-05-16', 1, '2019-05-15 20:49:43', '2019-05-15 20:49:43'),
(45, 17, 'CLUTH CẦM TAY HB1904079HH', 'bo_7_24fedd78fc074a19ab062f516b28e2f6_master.jpg', 590000, 0, 'doi-cap-nhat', '2019-05-16', 1, '2019-05-15 20:50:49', '2019-05-15 20:50:49'),
(46, 17, 'TÚI HỘP DA HB1904077HH', 'den_3_6bb43449c5ce46e3bdf1adb0f7d84df0_master.jpg', 700000, 0, 'doi-cap-nhat', '2019-05-16', 1, '2019-05-15 20:52:55', '2019-05-15 20:52:55'),
(47, 18, 'Đồng hồ Bering 13436-166', '13436-166_1532597221.png', 3870000, 1900000, 'bao-hanh-quoc-te-3-nam-quoc-te-thoi-gian-nhan-va-tra-bao-hanh-trong-gio-hanh-chinh-tu-08h30-den-17h00-cac-ngay-trong-tuan-tru-ngay-le-va-chu-nhat', '2019-05-16', 1, '2019-05-15 20:55:29', '2019-05-15 20:55:29'),
(48, 19, 'Intel I340-T4 (IBM 49Y4242), 4 port 1Gbps, PCI-E 4x', '4238195hp-nc365t-it365-jpeg-c86b82f9-6f5c-4cb1-840a-5d19a810cc79.jpg', 750000, 740000, 'intel-i340-t4-ibm-49y4242-4-port-1gbps-pci-e-4x-tuong-thich-tot-mainboard-thuong-va-server-hang-moi-99-bh-3-thang-1-doi-1', '2019-05-23', 1, '2019-05-22 18:29:21', '2019-05-22 18:29:21'),
(49, 19, 'Cáp nối dài sata kèm nguồn', 'tb2fax0oqowbunjssppxxxpgpxa-749144912.jpg', 100000, 0, 'cap-noi-dai-sata-kem-nguon-hang-moi-100-dai-40cm', '2019-05-23', 1, '2019-05-22 18:33:30', '2019-05-22 18:33:30'),
(50, 19, 'CPU Intel Xeon E-2136 3.3 GHz Turbo up to 4.5GHz / 12MB / 6 Cores, 12 Threads / LGA 1151', '250_43202_cpu_intel_xeon_e2100_series.jpg', 8300000, 8200000, 'tiep-can-nhung-khach-hang-may-tram-da-phuong-tien-va-cad-chuyen-nghiep-doi-hoi-hinh-anh-va-hieu-nang-can-thiet-trai-nghiem-su-khac-biet-cua-may-tram-chay-tren-bo-xu-ly-intel-xeon-e-voi-hieu-nang-dien-toan-chuyen-nghiep-cung-cac-chuc-nang-bo-nho-nang-cao-cac-tinh-nang-ve-do-tin-cay-va-bao-mat-tang-cuong-nho-phan-cung-cung-nhu-ho-tro-cong-nghe-do-hoa-intel-moi-nhat', '2019-05-23', 1, '2019-05-22 18:37:54', '2019-05-22 18:37:54'),
(51, 20, 'DÀN ÂM THANH KARAOKE GIA ĐÌNH BM-10 (LOA BOSE 301 DIRECT/REFLECTING + AMPLY JARGUAR PA-203N GOLD BLUETOOTH + MICRO GUINNESS MU-116)', 'dan-am-thanh-karaoke-gia-dinh-bm-10.jpg', 18500000, 0, 'dan-am-thanh-karaoke-gia-dinh-bm-10-bao-gom-loa-bose-301-directreflecting-ampli-jarguar-pa-203n-gold-bluetooth-micro-guinness-mu-116', '2019-05-23', 1, '2019-05-22 18:47:31', '2019-05-22 18:47:31'),
(52, 20, 'Loa di động JBL Flip 3', '710sb3fiefl._sl1234__1.jpg', 1300000, 1000000, 'thiet-ke-tinh-te-voi-kha-nang-chong-nuoc-chat-am-an-tuong', '2019-05-23', 1, '2019-05-22 18:50:05', '2019-05-22 18:50:38'),
(53, 1, 'Trà Dâu Yogurt', '2b-500x515-500x500.jpg', 15000, 0, 'đợi cập nhật', '2019-05-23', 1, '2019-05-22 20:53:38', '2019-05-23 00:36:01'),
(54, 21, 'Business Access Point Wireless AC1200 Dual-band with PoE LINKSYS LAPAC1200', 'p_16216_mini_LINKSYS-LAPAC1200.jpg', 6400000, 0, 'wireless-access-point-chuan-n-hoat-dong-voi-tan-so-24-ghz', '2019-05-28', 6, '2019-05-27 20:37:35', '2019-05-27 20:37:35'),
(55, 21, 'Dual Wan Business Gigabit VPN Router LINKSYS LRT224', 'p_16220_mini_LINKSYS-LRT224.jpg', 5700000, 5500000, '2-port-wan-gb-2-port-wan-gb-hoat-dong-theo-co-che-load-balancing', '2019-05-28', 6, '2019-05-27 20:38:55', '2019-05-27 20:38:55'),
(56, 22, 'Điện thoại không dây Panasonic KX-TGC310CX', 'p_14616_mini_PANASONIC-KX-TGC310.jpg', 800000, 800000, 'nho-10-so-goi-di-6-phim-goi-nhanh-loa-ngoai-hai-chieu', '2019-05-28', 6, '2019-05-27 20:40:13', '2019-05-27 20:40:13'),
(57, 5, 'Chocolatea', '69f17e38-5687-4bee-8f94-afcaabc41094.jpg', 49000, 45000, 'doi-cap-nhat', '2019-06-06', 1, '2019-06-05 23:29:46', '2019-06-05 23:29:46'),
(58, 5, 'Xoài matcha sữa tươi', '201861193122-xoai-matcha-sua-tuoi.jpg', 53000, 50000, 'doi-cap-nhat', '2019-06-06', 1, '2019-06-05 23:30:43', '2019-06-05 23:30:43'),
(59, 23, 'Cán tháo rời Miris', 'Can-Thao-Roi-Miris_bf28a6db-28b7-42fd-8de9-8a33c2615624_295x.png', 220000, 210000, 'can-thao-roi-miris-la-mot-sang-tao-cua-hang-neoflam-can-bang-nhua-bakelite-chiu-nhiet-dau-kep-de-khop-voi-thanh-noi-chao-boc-silicone-day-giup-khop-em-chong-tray-ruot-la-bo-truyen-dong-co-khi-bang-inox-khong-gi', '2019-06-06', 1, '2019-06-05 23:32:50', '2019-06-05 23:32:50'),
(60, 23, 'Nồi sâu cán rời Miris 18cm', '18_720x.png', 620000, 600000, 'noi-co-kich-thuoc-nho-than-thang-de-day-hap-thu-va-giu-nhiet-lau-giup-nau-ngon-nhung-mon-an-can-nhiet-luong-am-i-nhu-nau-com-co-chay-kieu-nieu-dat-thit-kho-tau-ca-kho-thich-hop-de-ham-nong-cac-thuc-an-duoc-nau-tu-truoc-nhu-mon-canh-bo-duong-an-nong-ngay-tai-ban-thay-to-lon-noi-co-vung-thuy-tinh-vien-silicone-va-nap-nhua-kin-dung-de-cat-tru-thuc-pham-sau-nau-trong-tu-lanh', '2019-06-06', 1, '2019-06-05 23:33:41', '2019-06-05 23:33:41'),
(61, 1, 'kem óc quế', 'kem.jpg', 20000, 0, 'doi-cap-nhat', '2019-06-06', 1, '2019-06-05 23:40:51', '2019-06-05 23:40:51'),
(62, 25, 'Tủ lạnh 2 ngăn GN-D602BL', 'md06041696-350x350.jpg', 17000000, 0, 'doi-cap-nhat', '2019-06-06', 1, '2019-06-05 23:43:17', '2019-06-05 23:43:17');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `roles`
--

CREATE TABLE `roles` (
  `id` int(10) UNSIGNED NOT NULL,
  `Name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `Description` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `Status` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `roles`
--

INSERT INTO `roles` (`id`, `Name`, `Description`, `Status`, `created_at`, `updated_at`) VALUES
(1, 'admin', 'quản trị', NULL, '2019-06-03 23:33:14', '2019-06-03 23:35:41'),
(4, 'Admin', 'quản lý', NULL, NULL, '2019-05-27 01:29:15'),
(5, 'nhanvien', 'nhân viên', NULL, '2019-05-21 20:50:45', '2019-05-27 20:35:09');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `role_permission`
--

CREATE TABLE `role_permission` (
  `id` int(10) UNSIGNED NOT NULL,
  `role_id` int(10) UNSIGNED NOT NULL,
  `permission_id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `role_permission`
--

INSERT INTO `role_permission` (`id`, `role_id`, `permission_id`, `created_at`, `updated_at`) VALUES
(1, 1, 3, NULL, NULL),
(2, 1, 4, NULL, NULL),
(205, 4, 1, NULL, NULL),
(206, 4, 2, NULL, NULL),
(207, 4, 3, NULL, NULL),
(208, 4, 4, NULL, NULL),
(209, 4, 5, NULL, NULL),
(210, 4, 6, NULL, NULL),
(211, 4, 7, NULL, NULL),
(212, 4, 8, NULL, NULL),
(213, 4, 9, NULL, NULL),
(214, 4, 10, NULL, NULL),
(215, 4, 11, NULL, NULL),
(216, 4, 12, NULL, NULL),
(217, 4, 13, NULL, NULL),
(218, 4, 14, NULL, NULL),
(219, 4, 15, NULL, NULL),
(220, 4, 16, NULL, NULL),
(221, 4, 17, NULL, NULL),
(222, 4, 18, NULL, NULL),
(223, 4, 19, NULL, NULL),
(224, 4, 20, NULL, NULL),
(225, 4, 21, NULL, NULL),
(226, 5, 8, NULL, NULL),
(227, 5, 9, NULL, NULL),
(228, 5, 10, NULL, NULL),
(229, 5, 14, NULL, NULL),
(230, 5, 17, NULL, NULL),
(231, 5, 18, NULL, NULL),
(232, 5, 19, NULL, NULL),
(233, 5, 20, NULL, NULL),
(234, 5, 21, NULL, NULL);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `role_users`
--

CREATE TABLE `role_users` (
  `id` int(10) UNSIGNED NOT NULL,
  `User_id` int(10) UNSIGNED NOT NULL,
  `Role_id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `role_users`
--

INSERT INTO `role_users` (`id`, `User_id`, `Role_id`, `created_at`, `updated_at`) VALUES
(11, 1, 4, NULL, NULL),
(25, 6, 5, NULL, NULL),
(26, 25, 5, NULL, NULL);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `truycaps`
--

CREATE TABLE `truycaps` (
  `id` int(10) UNSIGNED NOT NULL,
  `dem` int(11) NOT NULL,
  `ngay` date NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `truycaps`
--

INSERT INTO `truycaps` (`id`, `dem`, `ngay`, `created_at`, `updated_at`) VALUES
(3, 1, '2019-05-28', '2019-05-27 19:38:50', '2019-05-27 19:38:50'),
(4, 158, '2019-05-29', '2019-05-28 23:33:21', '2019-05-29 16:06:22'),
(5, 53, '2019-05-30', '2019-05-29 17:57:27', '2019-05-29 23:27:55'),
(6, 6, '2019-06-02', '2019-06-02 15:46:59', '2019-06-02 15:48:18'),
(7, 200, '2019-06-03', '2019-06-02 22:43:59', '2019-06-03 06:48:31'),
(8, 26, '2019-06-04', '2019-06-03 18:12:45', '2019-06-03 21:29:17'),
(9, 57, '2019-06-05', '2019-06-04 20:52:15', '2019-06-05 01:44:41'),
(10, 31, '2019-06-06', '2019-06-05 23:27:41', '2019-06-06 00:05:21'),
(11, 17, '2019-06-08', '2019-06-07 19:16:30', '2019-06-08 16:38:13'),
(12, 8, '2019-06-09', '2019-06-09 04:33:50', '2019-06-09 04:35:08');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `users`
--

CREATE TABLE `users` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'lieu', 'lieu1@gmail.com', '$2y$10$ibJjyFaqOYg9.4lrfDMBIOPKlnnD1YOIObX4XJfmNB7f3nsdvI/Qy', NULL, '2019-05-07 19:31:41', '2019-05-10 17:37:11'),
(6, 'hung', 'hung@gmail.com', '$2y$10$7ZAFprQt0H3aXqAbY0JpN.yhnHG3HlzjbT5jG4b1Xn5NuZ6lWuFFq', NULL, '2019-05-20 18:53:35', '2019-06-04 00:03:17'),
(22, 'suppor', 'suppor@gmail.com', '$2y$10$mm7JIh3R4m0o0AmljkiPBuXoYxF2YrPToDhSOpcy2V8t.MXLZ3pK.', NULL, '2019-05-20 19:54:05', '2019-05-20 19:54:05'),
(24, 'hau', 'hau@gmail.com', '$2y$10$Gud80/YBSK084gRS9zTfNeLuYuQgxjVA1GODOXaKVLHaUh/3WdjQi', NULL, '2019-06-04 21:04:06', '2019-06-04 21:04:06'),
(25, 'hau1', 'hau123@gmail.com', '$2y$10$Tig/mGKqMqk3bzzAq.lKBuiCJNVlhrdocf6JSRtyJYgLM0SfsoTg2', NULL, '2019-06-05 20:22:57', '2019-06-05 20:23:04');

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `banners`
--
ALTER TABLE `banners`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `comments`
--
ALTER TABLE `comments`
  ADD PRIMARY KEY (`id`),
  ADD KEY `comments_id_product_foreign` (`id_product`);

--
-- Chỉ mục cho bảng `customers`
--
ALTER TABLE `customers`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `kho`
--
ALTER TABLE `kho`
  ADD PRIMARY KEY (`id`),
  ADD KEY `kho_id_product_foreign` (`id_product`);

--
-- Chỉ mục cho bảng `lienhes`
--
ALTER TABLE `lienhes`
  ADD PRIMARY KEY (`id`),
  ADD KEY `lienhes_id_u_foreign` (`id_u`);

--
-- Chỉ mục cho bảng `loaiproducts`
--
ALTER TABLE `loaiproducts`
  ADD PRIMARY KEY (`id`),
  ADD KEY `loaiproducts_id_menu_foreign` (`id_menu`);

--
-- Chỉ mục cho bảng `menuchas`
--
ALTER TABLE `menuchas`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `nccs`
--
ALTER TABLE `nccs`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `nhanviens`
--
ALTER TABLE `nhanviens`
  ADD PRIMARY KEY (`id`),
  ADD KEY `nhanviens_id_u_foreign` (`user_id`);

--
-- Chỉ mục cho bảng `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`),
  ADD KEY `orders_id_c_foreign` (`id_c`),
  ADD KEY `orders_id_u_foreign` (`id_u`);

--
-- Chỉ mục cho bảng `order_products`
--
ALTER TABLE `order_products`
  ADD PRIMARY KEY (`id`),
  ADD KEY `order_products_id_order_foreign` (`id_order`),
  ADD KEY `order_products_id_product_foreign` (`id_product`);

--
-- Chỉ mục cho bảng `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Chỉ mục cho bảng `permissions`
--
ALTER TABLE `permissions`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`),
  ADD KEY `products_id_loai_foreign` (`id_loai`),
  ADD KEY `products_id_u_foreign` (`id_u`);

--
-- Chỉ mục cho bảng `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `role_permission`
--
ALTER TABLE `role_permission`
  ADD PRIMARY KEY (`id`),
  ADD KEY `role_permission_role_id_foreign` (`role_id`),
  ADD KEY `role_permission_permission_id_foreign` (`permission_id`);

--
-- Chỉ mục cho bảng `role_users`
--
ALTER TABLE `role_users`
  ADD PRIMARY KEY (`id`),
  ADD KEY `role_users_role_id_foreign` (`Role_id`),
  ADD KEY `role_users_user_id_foreign` (`User_id`);

--
-- Chỉ mục cho bảng `truycaps`
--
ALTER TABLE `truycaps`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `banners`
--
ALTER TABLE `banners`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT cho bảng `comments`
--
ALTER TABLE `comments`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT cho bảng `customers`
--
ALTER TABLE `customers`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT cho bảng `kho`
--
ALTER TABLE `kho`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=78;

--
-- AUTO_INCREMENT cho bảng `lienhes`
--
ALTER TABLE `lienhes`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT cho bảng `loaiproducts`
--
ALTER TABLE `loaiproducts`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT cho bảng `menuchas`
--
ALTER TABLE `menuchas`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT cho bảng `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT cho bảng `nccs`
--
ALTER TABLE `nccs`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT cho bảng `nhanviens`
--
ALTER TABLE `nhanviens`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT cho bảng `orders`
--
ALTER TABLE `orders`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=39;

--
-- AUTO_INCREMENT cho bảng `order_products`
--
ALTER TABLE `order_products`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=45;

--
-- AUTO_INCREMENT cho bảng `permissions`
--
ALTER TABLE `permissions`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT cho bảng `products`
--
ALTER TABLE `products`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=63;

--
-- AUTO_INCREMENT cho bảng `roles`
--
ALTER TABLE `roles`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT cho bảng `role_permission`
--
ALTER TABLE `role_permission`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=235;

--
-- AUTO_INCREMENT cho bảng `role_users`
--
ALTER TABLE `role_users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT cho bảng `truycaps`
--
ALTER TABLE `truycaps`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT cho bảng `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- Các ràng buộc cho các bảng đã đổ
--

--
-- Các ràng buộc cho bảng `comments`
--
ALTER TABLE `comments`
  ADD CONSTRAINT `comments_id_product_foreign` FOREIGN KEY (`id_product`) REFERENCES `products` (`id`) ON DELETE CASCADE;

--
-- Các ràng buộc cho bảng `kho`
--
ALTER TABLE `kho`
  ADD CONSTRAINT `kho_id_product_foreign` FOREIGN KEY (`id_product`) REFERENCES `products` (`id`) ON DELETE CASCADE;

--
-- Các ràng buộc cho bảng `lienhes`
--
ALTER TABLE `lienhes`
  ADD CONSTRAINT `lienhes_id_u_foreign` FOREIGN KEY (`id_u`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Các ràng buộc cho bảng `loaiproducts`
--
ALTER TABLE `loaiproducts`
  ADD CONSTRAINT `loaiproducts_id_menu_foreign` FOREIGN KEY (`id_menu`) REFERENCES `menuchas` (`id`) ON DELETE CASCADE;

--
-- Các ràng buộc cho bảng `nhanviens`
--
ALTER TABLE `nhanviens`
  ADD CONSTRAINT `nhanviens_id_u_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Các ràng buộc cho bảng `orders`
--
ALTER TABLE `orders`
  ADD CONSTRAINT `orders_id_c_foreign` FOREIGN KEY (`id_c`) REFERENCES `customers` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `orders_id_u_foreign` FOREIGN KEY (`id_u`) REFERENCES `users` (`id`);

--
-- Các ràng buộc cho bảng `order_products`
--
ALTER TABLE `order_products`
  ADD CONSTRAINT `order_products_id_order_foreign` FOREIGN KEY (`id_order`) REFERENCES `orders` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `order_products_id_product_foreign` FOREIGN KEY (`id_product`) REFERENCES `products` (`id`) ON DELETE CASCADE;

--
-- Các ràng buộc cho bảng `products`
--
ALTER TABLE `products`
  ADD CONSTRAINT `products_id_loai_foreign` FOREIGN KEY (`id_loai`) REFERENCES `loaiproducts` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `products_id_u_foreign` FOREIGN KEY (`id_u`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Các ràng buộc cho bảng `role_permission`
--
ALTER TABLE `role_permission`
  ADD CONSTRAINT `role_permission_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `role_permission_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE;

--
-- Các ràng buộc cho bảng `role_users`
--
ALTER TABLE `role_users`
  ADD CONSTRAINT `role_users_role_id_foreign` FOREIGN KEY (`Role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `role_users_user_id_foreign` FOREIGN KEY (`User_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
