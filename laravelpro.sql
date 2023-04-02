-- phpMyAdmin SQL Dump
-- version 5.1.3
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th4 02, 2023 lúc 06:12 PM
-- Phiên bản máy phục vụ: 10.4.24-MariaDB
-- Phiên bản PHP: 7.4.29

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `laravelpro`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `featured_images`
--

CREATE TABLE `featured_images` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `file` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL,
  `post_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
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
(12, '2014_10_12_000000_create_users_table', 1),
(13, '2023_03_24_172000_create_posts_table', 1),
(14, '2023_03_27_125917_add_gender_to_tbl_users_table', 1),
(15, '2023_03_30_083132_create_tbl_cat_product_table', 1),
(16, '2023_03_30_091606_create_tbl_products_table', 1),
(17, '2023_03_30_162118_add_name_post_to_tbl_posts_table', 1),
(18, '2023_03_31_033044_add_cat_name_to_tbl_cat_product_table', 1),
(19, '2023_03_31_170854_add_softdelete_to_tbl_posts_table', 1),
(23, '2023_04_01_115543_create_featured_images_table', 2),
(28, '2023_04_01_154242_create_tbl_roles_table', 3),
(29, '2023_04_01_154501_create_role_user_table', 3),
(30, '2023_04_02_141236_add_thumb_main_to_tbl_products_table', 4);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `role_user`
--

CREATE TABLE `role_user` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `role_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `role_user`
--

INSERT INTO `role_user` (`id`, `user_id`, `role_id`, `created_at`, `updated_at`) VALUES
(1, 1, 3, NULL, NULL),
(2, 1, 4, NULL, NULL),
(3, 4, 1, NULL, NULL),
(4, 4, 2, NULL, NULL),
(5, 3, 1, NULL, NULL);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tbl_cat_product`
--

CREATE TABLE `tbl_cat_product` (
  `product_cat_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `cat_name` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `tbl_cat_product`
--

INSERT INTO `tbl_cat_product` (`product_cat_id`, `created_at`, `updated_at`, `cat_name`) VALUES
(1, NULL, NULL, 'Điện thoại'),
(2, NULL, NULL, 'Macbook');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tbl_posts`
--

CREATE TABLE `tbl_posts` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `desc` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `creator` bigint(20) UNSIGNED NOT NULL,
  `post_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `tbl_posts`
--

INSERT INTO `tbl_posts` (`id`, `created_at`, `updated_at`, `desc`, `creator`, `post_name`, `deleted_at`) VALUES
(1, NULL, NULL, NULL, 1, 'Tại sao bạn cần phải học', NULL),
(2, NULL, NULL, NULL, 2, 'Tiếng anh quan trọng như nào?', NULL),
(3, NULL, NULL, NULL, 3, 'Sách 10 vạn câu hỏi vì sao', NULL),
(4, NULL, NULL, NULL, 4, 'Sách giáo dục trẻ nhỏ', NULL),
(5, '2023-03-31 11:54:19', '2023-03-31 12:03:04', NULL, 1, 'Trần Quang Quý', NULL);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tbl_products`
--

CREATE TABLE `tbl_products` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name_product` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `content` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `price` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `product_cat_parent` bigint(20) UNSIGNED NOT NULL,
  `creator` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `thumb_main` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `tbl_products`
--

INSERT INTO `tbl_products` (`id`, `name_product`, `content`, `price`, `product_cat_parent`, `creator`, `created_at`, `updated_at`, `thumb_main`) VALUES
(2, 'IPhone 14 Pro Max 128G', NULL, NULL, 1, 1, '2023-04-02 11:39:43', '2023-04-02 11:39:43', 'public/uploads/pc3_thumb_main.png'),
(3, 'IPhone 11 Pro', NULL, NULL, 1, 1, '2023-04-02 11:39:57', '2023-04-02 11:39:57', 'public/uploads/pc3_thumb_main.png'),
(4, 'Macbook m1', NULL, NULL, 2, 1, '2023-04-02 11:40:13', '2023-04-02 11:40:13', 'public/uploads/pk3_thumb_detail4.png'),
(5, 'Macbook m2', NULL, NULL, 2, 1, '2023-04-02 11:41:25', '2023-04-02 11:41:25', 'public/uploads/pk3_thumb_detail4.png'),
(6, 'OPPO A92', NULL, NULL, 2, 1, '2023-04-02 12:03:26', '2023-04-02 12:03:26', 'public/uploads/pk2_thumb_detail1.png'),
(7, 'Macbook m3', NULL, NULL, 2, 3, '2023-04-02 12:04:12', '2023-04-02 12:04:12', 'public/uploads/avtfb.jpg'),
(8, 'Vsmart V1', NULL, NULL, 2, 3, '2023-04-02 13:51:58', '2023-04-02 13:51:58', 'public/uploads/pc9_thumb_detail1.png'),
(9, 'Vinfast Lux A 2.0', NULL, NULL, 2, 3, '2023-04-02 13:56:42', '2023-04-02 13:56:42', 'public/uploads/pc1_thumb_detail1.png'),
(10, 'Vinfast Lux A 2.0', NULL, NULL, 2, 3, '2023-04-02 14:15:09', '2023-04-02 14:15:09', 'public/uploads/pc1_thumb_detail1.png'),
(11, 'Vinfast Lux A 2.0', NULL, NULL, 2, 3, '2023-04-02 14:17:36', '2023-04-02 14:17:36', 'public/uploads/pc1_thumb_detail1.png'),
(12, 'Vinfast e34', NULL, NULL, 2, 3, '2023-04-02 14:41:48', '2023-04-02 14:41:48', 'public/uploads/pk4_thumb_detail3.png'),
(13, 'Vinfast e34', NULL, NULL, 2, 3, '2023-04-02 14:42:03', '2023-04-02 14:42:03', 'public/uploads/pk4_thumb_detail3.png'),
(14, 'Vinfast e34', NULL, NULL, 2, 3, '2023-04-02 15:12:38', '2023-04-02 15:12:38', 'public/uploads/pk4_thumb_detail3.png'),
(15, 'Vinfast e34', NULL, NULL, 2, 3, '2023-04-02 15:14:02', '2023-04-02 15:14:02', 'public/uploads/pk4_thumb_detail3.png'),
(16, 'Vinfast e34', NULL, NULL, 2, 3, '2023-04-02 15:14:16', '2023-04-02 15:14:16', 'public/uploads/pk5_thumb_detail3.png'),
(17, 'Vinfast e34', NULL, NULL, 2, 3, '2023-04-02 15:14:38', '2023-04-02 15:14:38', 'public/uploads/pk5_thumb_detail3.png'),
(18, 'Vinfast e34', NULL, NULL, 2, 3, '2023-04-02 15:15:02', '2023-04-02 15:15:02', 'public/uploads/pk5_thumb_detail3.png'),
(19, 'Vinfast e34', NULL, NULL, 2, 3, '2023-04-02 15:15:16', '2023-04-02 15:15:16', 'public/uploads/pk4_thumb_main.png');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tbl_roles`
--

CREATE TABLE `tbl_roles` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `role_name` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `tbl_roles`
--

INSERT INTO `tbl_roles` (`id`, `role_name`, `created_at`, `updated_at`) VALUES
(1, 'Thêm sản phẩm', NULL, NULL),
(2, 'Xóa sản phẩm', NULL, NULL),
(3, 'Thêm bài viết', NULL, NULL),
(4, 'Xóa bài viết', NULL, NULL);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tbl_users`
--

CREATE TABLE `tbl_users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `gender` enum('male','female') COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `tbl_users`
--

INSERT INTO `tbl_users` (`id`, `name`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`, `gender`) VALUES
(1, 'Quycute2003', 'tranquy52003@gmail.com', NULL, '$2y$10$RW9g/V5VgqVM9xg6qBrCvuLlcT1u.VUHRllTstS5uGSafPYk5SL8.', NULL, NULL, NULL, NULL),
(2, 'Tungcute2003', 'tranquy52003@gmail.com', NULL, '$2y$10$.fUyFKs/Iow59cNj54qD8OF6NPVTMEwFIm8vQXQrA8V7tukebFGLi', NULL, NULL, NULL, NULL),
(3, 'Cuongcute2003', 'tranquy52003@gmail.com', NULL, '$2y$10$mPrsaNclrRHNw99mXayFJ.72EghSHWkQa8p8bk3oAMf60vUizA08u', NULL, NULL, NULL, NULL),
(4, 'Huancute2003', 'tranquy52003@gmail.com', NULL, '$2y$10$CHOjjf8EdXOkuZxAWdeQfeTbP5aOu4ZmWWrKU3QtajwrHDZI7YqnW', NULL, NULL, NULL, NULL);

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `featured_images`
--
ALTER TABLE `featured_images`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `role_user`
--
ALTER TABLE `role_user`
  ADD PRIMARY KEY (`id`),
  ADD KEY `role_user_user_id_foreign` (`user_id`),
  ADD KEY `role_user_role_id_foreign` (`role_id`);

--
-- Chỉ mục cho bảng `tbl_cat_product`
--
ALTER TABLE `tbl_cat_product`
  ADD PRIMARY KEY (`product_cat_id`);

--
-- Chỉ mục cho bảng `tbl_posts`
--
ALTER TABLE `tbl_posts`
  ADD PRIMARY KEY (`id`),
  ADD KEY `tbl_posts_creator_foreign` (`creator`);

--
-- Chỉ mục cho bảng `tbl_products`
--
ALTER TABLE `tbl_products`
  ADD PRIMARY KEY (`id`),
  ADD KEY `tbl_products_product_cat_parent_foreign` (`product_cat_parent`),
  ADD KEY `tbl_products_creator_foreign` (`creator`);

--
-- Chỉ mục cho bảng `tbl_roles`
--
ALTER TABLE `tbl_roles`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `tbl_users`
--
ALTER TABLE `tbl_users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `featured_images`
--
ALTER TABLE `featured_images`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT cho bảng `role_user`
--
ALTER TABLE `role_user`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT cho bảng `tbl_cat_product`
--
ALTER TABLE `tbl_cat_product`
  MODIFY `product_cat_id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT cho bảng `tbl_posts`
--
ALTER TABLE `tbl_posts`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT cho bảng `tbl_products`
--
ALTER TABLE `tbl_products`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT cho bảng `tbl_roles`
--
ALTER TABLE `tbl_roles`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT cho bảng `tbl_users`
--
ALTER TABLE `tbl_users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- Các ràng buộc cho các bảng đã đổ
--

--
-- Các ràng buộc cho bảng `role_user`
--
ALTER TABLE `role_user`
  ADD CONSTRAINT `role_user_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `tbl_roles` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `role_user_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `tbl_users` (`id`) ON DELETE CASCADE;

--
-- Các ràng buộc cho bảng `tbl_posts`
--
ALTER TABLE `tbl_posts`
  ADD CONSTRAINT `tbl_posts_creator_foreign` FOREIGN KEY (`creator`) REFERENCES `tbl_users` (`id`) ON DELETE CASCADE;

--
-- Các ràng buộc cho bảng `tbl_products`
--
ALTER TABLE `tbl_products`
  ADD CONSTRAINT `tbl_products_creator_foreign` FOREIGN KEY (`creator`) REFERENCES `tbl_users` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `tbl_products_product_cat_parent_foreign` FOREIGN KEY (`product_cat_parent`) REFERENCES `tbl_cat_product` (`product_cat_id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
