-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: May 25, 2022 at 07:48 AM
-- Server version: 10.2.43-MariaDB
-- PHP Version: 7.2.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `workhuno_work`
--

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE `category` (
  `id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `create_at` datetime NOT NULL DEFAULT current_timestamp(),
  `update_at` datetime NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`id`, `title`, `create_at`, `update_at`) VALUES
(1, 'Tiêu đề 1', '2022-04-23 14:12:13', '2022-04-23 14:13:47'),
(2, 'Tiêu đề 2', '2022-04-23 14:12:19', '2022-04-23 14:12:19'),
(3, 'Tiêu đề 3', '2022-04-23 14:12:21', '2022-04-23 14:12:21');

-- --------------------------------------------------------

--
-- Table structure for table `comment`
--

CREATE TABLE `comment` (
  `id` int(11) NOT NULL,
  `content` text NOT NULL,
  `user_id_create` int(11) NOT NULL,
  `data_type` varchar(50) NOT NULL COMMENT 'comment of: tasks, news,...',
  `data_id` int(11) NOT NULL COMMENT 'id of post',
  `create_at` datetime NOT NULL DEFAULT current_timestamp(),
  `update_at` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `comment`
--

INSERT INTO `comment` (`id`, `content`, `user_id_create`, `data_type`, `data_id`, `create_at`, `update_at`) VALUES
(1, 'Noi dung binh luan', 13482, 'news', 1, '2022-05-14 15:47:57', '2022-05-14 15:47:57'),
(3, 'Phía Sau Lưng Anh Kìa Đúng Người Ấy Đấy Phải Không Remix 1', 111, 'news', 5, '2022-05-16 14:42:44', '2022-05-16 14:42:44'),
(4, 'Liêm xác nhận nghi phạm nữ châm lửa đốt xe máy tại tầng 1, khu nhà trọ trên địa bàn phường Phú Đô, quận Nam Từ Liêm gây ra vụ cháy hậu quả đặc biệt nghiêm trọng, đã bị CAQ Nam Từ Liêm phối hợp với Phòng CSHS và các đơn vị nghiệp vụ CATP bắt giữ vào lúc 0h30 sáng 1/4.', 111, 'news', 5, '2022-05-16 15:03:24', '2022-05-16 15:03:24'),
(5, 'Hello ae', 111, 'news', 5, '2022-05-17 14:08:09', '2022-05-17 14:08:09');

-- --------------------------------------------------------

--
-- Table structure for table `departments`
--

CREATE TABLE `departments` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `create_at` datetime NOT NULL DEFAULT current_timestamp(),
  `update_at` datetime NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `departments`
--

INSERT INTO `departments` (`id`, `name`, `create_at`, `update_at`) VALUES
(1, 'Research & Development', '2022-04-23 14:09:57', '2022-04-23 14:09:57');

-- --------------------------------------------------------

--
-- Table structure for table `meeting`
--

CREATE TABLE `meeting` (
  `id` int(11) NOT NULL,
  `title` text NOT NULL,
  `content` text NOT NULL,
  `result` text NOT NULL,
  `start_at` datetime NOT NULL,
  `user_id_create` int(11) NOT NULL,
  `create_at` datetime NOT NULL DEFAULT current_timestamp(),
  `update_at` datetime NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `news`
--

CREATE TABLE `news` (
  `id` int(11) NOT NULL,
  `user_id_create` int(11) NOT NULL,
  `cate_id` int(11) NOT NULL,
  `title` text NOT NULL,
  `content` text CHARACTER SET utf8mb4 COLLATE utf8mb4_vietnamese_ci NOT NULL,
  `images` text NOT NULL COMMENT 'Json arr link images',
  `files` text NOT NULL COMMENT 'Json arr link file',
  `video` text NOT NULL COMMENT 'url video',
  `allow_comment` tinyint(1) NOT NULL,
  `pin` int(11) NOT NULL COMMENT 'ghim bai',
  `create_at` datetime NOT NULL DEFAULT current_timestamp(),
  `update_at` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `news`
--

INSERT INTO `news` (`id`, `user_id_create`, `cate_id`, `title`, `content`, `images`, `files`, `video`, `allow_comment`, `pin`, `create_at`, `update_at`) VALUES
(3, 13482, 1, 'Thong bao moi', '💥Kính gửi quý đối tác  👉 Mời quý khách bấm vào links dưới để xem hoặc tải về các 👉 👉 👉 https://bit.ly/anh_san_pham_hunonic --- 💥Khi có bất kỳ sản phẩm mới, chúng tôi sẽ tự động update và thông báo đến quý đối tác. ❤️ XIN CHÂN THÀNH CẢM ƠN ----  🇻🇳 HUNONIC - NHÀ THÔNG MINH CỦA NGƯỜI VIỆT', '[\"https://www.also.com/ec/cms5/6000/blog/future-technologies/woman-uses-tablet-surrounded-by-iot-security-graphics-227780092_800px.jpg\",\"https://hunonic.com/wp-content/uploads/2021/07/nong-nghiep-thong-minh.jpg\"]', '[]', 'https://www.youtube.com/watch?v=psZ1g9fMfeo', 0, 0, '2022-04-28 08:59:02', '2022-04-28 08:59:02'),
(4, 13482, 1, 'Thong bao so 1', '✅ XU HƯỚNG\n\n➖ Với sự phát triển của khoa học công nghệ và đô thị hóa, yêu cầu của con người về môi trường sống và điều khiển thiết bị ngày càng cao. \n➖ Chính vì vậy nhu cầu về nhà thông minh ngày càng phát triển.  So với nhà thông thường, nhà thông minh không chỉ có các chức năng dân dụng truyền thống mà còn liên kết và tự động hóa thiết bị, thậm chí tiết kiệm các chi phí năng lượng khác nhau.\n ➖ Với Smarthome, mọi đồ vật, không gian trong nhà đều có thể kiểm soát chỉ bằng một chiếc điện thoại thông qua Bluetooth, hồng ngoại, sóng siêu âm, Wifi,…Người dùng cũng có thể ra lệnh bằng giọng nói để bật/tắt nhạc, tivi, điều hòa, mở đóng rèm, ...\n\n✅ THỊ TRƯỜNG VIỆT NAM\n➖ Tại Việt Nam, theo dự báo của Statista (Đức), thị trường smart home sẽ đạt doanh thu đạt 183,9 triệu USD vào năm 2021 và 251 triệu USD vào năm 2022. Với tốc độ tăng trưởng 25%/năm trong giai đoạn 2021-2025, dự kiến đến năm 2025, tổng doanh thu thị trường smart home Việt Nam đạt 449,1 triệu USD.\n➖ Với khoảng 10,5% hộ gia đình trang bị smart home, Việt Nam trở thành thị trường smart home đứng thứ 28 trên toàn cầu.\n➖  Tính năng tự động hóa, hay tạo ngữ cảnh bằng cách kết hợp các thiết bị thông minh hoạt động đồng thời mới là tính năng đặc sắc và toàn diện nhất khi nói đến Nhà thông minh.\n➖ Nhưng trên thực tế tại thị trường Việt Nam, người dùng có xu hướng quan tâm đến các thiết bị thông minh riêng lẻ hơn là một hệ thống nhà thông minh toàn diện.\n\n✅ LỢI THẾ\n➖ Điểm hạn chế lớn nhất của các sản phẩm smart home Việt Nam chính là quan niệm của khách hàng, bởi nhiều người không tin vào công nghệ Việt. \n➖ Nhưng trên thực tế, smart home của Việt Nam không thua kém, thậm chí vượt trội về công nghệ, với giá thành rẻ hơn các nhà cung cấp nước ngoài.\n➖ Với xu hướng người trẻ bận rộn, yêu thích công nghệ như ở Việt Nam, công nghệ nhà thông minh sẽ giúp họ quản lý mọi thứ đơn giản và dễ dàng hơn.\n\n✅ CƠ HỘI\n\n➖ Thị trường smart home Việt Nam hiện nay vô cùng tiềm năng. Các thiết bị công tắc thông minh sẽ dần thay thế hoàn toàn các công tắc truyền thống.\n➖ Smart home sẽ sớm bùng nổ trong tương lai gần. Đây là cơ hội cho các doanh nghiệp, công ty,  nhà phát triển công nghệ Việt Nam. \n----\n👉 XEM THÊM: https://hunonic.com/xu-huong-nha-thong-minh/', '[\"https://www.also.com/ec/cms5/6000/blog/future-technologies/woman-uses-tablet-surrounded-by-iot-security-graphics-227780092_800px.jpg\",\"https://hunonic.com/wp-content/uploads/2021/07/nong-nghiep-thong-minh.jpg\"]', '[]', 'https://www.youtube.com/watch?v=psZ1g9fMfeo', 0, 0, '2022-04-28 09:01:24', '2022-04-28 09:01:24'),
(5, 13482, 1, 'Thong bao so 1', '💥Kính gửi quý đối tác \n👉 Mời quý khách bấm vào links dưới để xem hoặc tải về các\n👉 👉 👉 https://bit.ly/anh_san_pham_hunonic\n---\n💥Khi có bất kỳ sản phẩm mới, chúng tôi sẽ tự động update và thông báo đến quý đối tác.\n❤️ XIN CHÂN THÀNH CẢM ƠN\n----\n 🇻🇳 HUNONIC - NHÀ THÔNG MINH CỦA NGƯỜI VIỆT\n', '[\"https://www.also.com/ec/cms5/6000/blog/future-technologies/woman-uses-tablet-surrounded-by-iot-security-graphics-227780092_800px.jpg\",\"https://hunonic.com/wp-content/uploads/2021/07/nong-nghiep-thong-minh.jpg\"]', '[]', '', 0, 0, '2022-04-28 09:02:12', '2022-04-28 09:02:12');

-- --------------------------------------------------------

--
-- Table structure for table `notify`
--

CREATE TABLE `notify` (
  `id` int(11) NOT NULL,
  `key_data` varchar(20) NOT NULL COMMENT 'tasks, metting, Suggestions',
  `user_id` int(11) NOT NULL,
  `data_id` int(11) NOT NULL,
  `content` text NOT NULL,
  `was_read` int(11) NOT NULL,
  `create_at` datetime NOT NULL DEFAULT current_timestamp(),
  `update_at` datetime NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `projects`
--

CREATE TABLE `projects` (
  `id` int(11) NOT NULL,
  `user_id_create` int(11) NOT NULL,
  `title` text NOT NULL,
  `description` text NOT NULL,
  `department_id` int(11) NOT NULL,
  `status` int(11) NOT NULL COMMENT 'trang thai',
  `status_percent` int(11) NOT NULL COMMENT '% hoan thanh',
  `start_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `end_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `create_at` datetime NOT NULL DEFAULT current_timestamp(),
  `update_at` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `projects`
--

INSERT INTO `projects` (`id`, `user_id_create`, `title`, `description`, `department_id`, `status`, `status_percent`, `start_at`, `end_at`, `create_at`, `update_at`) VALUES
(1, 13482, 'Project 1', 'Project 1 description', 1, 2, 10, '2022-05-19 07:53:09', '2022-05-19 07:53:09', '2022-04-27 11:12:47', '2022-04-27 11:12:47'),
(2, 111, 'Dao Ly online', 'MUỐN SỐNG SÓT, BẮT BUỘC CÁC BẠN PHẢI TỰ HỌC KIẾN THỨC MỚI!\n\"Những người mù chữ trong thế kỷ 21 sẽ không phải là những người không biết đọc, biết viết, mà là những người không có khả năng học, rồi quên đi chính những thứ mình đã học và tiếp tục học cái mới”MUỐN SỐNG SÓT, BẮT BUỘC CÁC BẠN PHẢI TỰ HỌC KIẾN THỨC MỚI!', 1, 1, 0, '2022-05-19 07:53:09', '2022-05-19 07:53:09', '2022-05-19 10:37:03', '2022-05-19 10:37:03'),
(3, 111, 'Project 1', 'Project 1 description', 1, 1, 0, '2022-05-19 07:53:09', '2022-05-19 07:53:09', '2022-05-19 14:12:20', '2022-05-19 14:12:20'),
(4, 4519, 'Project 123', 'Project 1 description', 1, 2, 10, '2022-05-19 08:08:24', '2022-05-19 08:08:24', '2022-05-19 15:08:24', '2022-05-19 15:08:24');

-- --------------------------------------------------------

--
-- Table structure for table `suggestions`
--

CREATE TABLE `suggestions` (
  `id` int(11) NOT NULL,
  `title` text NOT NULL,
  `content` text NOT NULL,
  `status` int(11) NOT NULL,
  `user_id_create` int(11) NOT NULL,
  `create_at` datetime NOT NULL DEFAULT current_timestamp(),
  `update_at` datetime NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `tasks`
--

CREATE TABLE `tasks` (
  `id` int(11) NOT NULL,
  `type` int(11) NOT NULL COMMENT '1-viec trong du an, 2-viec ca nhan',
  `tag` varchar(50) DEFAULT NULL COMMENT 'task, bug,...',
  `name` text NOT NULL,
  `content` text NOT NULL,
  `user_id_create` int(11) NOT NULL,
  `images` text DEFAULT NULL COMMENT 'Json arr link images',
  `files` text DEFAULT NULL COMMENT 'Json arr link file',
  `start_at_tmp` datetime DEFAULT NULL COMMENT 'thoi gian du kien bat dau',
  `end_at_tmp` datetime DEFAULT NULL COMMENT 'thoi gian du kien ket thuc',
  `start_at` datetime DEFAULT NULL COMMENT 'thoi gian thuc te bat dau',
  `end_at` datetime DEFAULT NULL COMMENT 'thoi gian thuc te ket thuc',
  `status` int(11) NOT NULL COMMENT '1-moi tao, 2-dang lam, 3-da xong',
  `status_percent` int(11) NOT NULL COMMENT '% hoan thanh',
  `department_id` int(11) NOT NULL COMMENT 'phong ban',
  `priority` int(11) NOT NULL COMMENT 'do uu tien, 1 - binh thuong, 2 - gap',
  `project_id` int(11) NOT NULL COMMENT 'du an',
  `task_parent_id` int(11) NOT NULL COMMENT 'id cong viec cha, 0 la ko co',
  `create_at` datetime NOT NULL DEFAULT current_timestamp(),
  `update_at` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tasks`
--

INSERT INTO `tasks` (`id`, `type`, `tag`, `name`, `content`, `user_id_create`, `images`, `files`, `start_at_tmp`, `end_at_tmp`, `start_at`, `end_at`, `status`, `status_percent`, `department_id`, `priority`, `project_id`, `task_parent_id`, `create_at`, `update_at`) VALUES
(2, 1, 'bug', '0', '0', 13482, '[]', '[]', '2022-03-11 00:00:00', '2022-03-12 00:00:00', NULL, NULL, 1, 0, 1, 1, 1, 0, '2022-04-27 14:36:37', '2022-04-27 14:36:37'),
(3, 1, 'bug', '0', '0', 13482, '[]', '[]', '2022-03-11 00:00:00', '2022-03-12 00:00:00', NULL, NULL, 1, 0, 1, 1, 1, 0, '2022-04-27 15:55:56', '2022-04-27 15:55:56'),
(4, 1, 'bug', '0', '0', 13482, '[]', '[]', '2022-03-11 00:00:00', '2022-03-12 00:00:00', NULL, NULL, 1, 0, 1, 1, 1, 0, '2022-04-27 15:58:37', '2022-04-27 15:58:37'),
(5, 1, 'bug', '0', '0', 13482, '[]', '[]', '2022-03-11 00:00:00', '2022-03-12 00:00:00', NULL, NULL, 1, 0, 1, 1, 1, 0, '2022-04-27 15:59:43', '2022-04-27 15:59:43'),
(6, 1, 'bug', '0', '0', 13482, '[]', '[]', '2022-03-11 00:00:00', '2022-03-12 00:00:00', NULL, NULL, 1, 0, 1, 1, 1, 0, '2022-04-27 16:00:09', '2022-04-27 16:00:09'),
(7, 1, 'bug', '0', '0', 13482, '[\"https://www.also.com/ec/cms5/6000/blog/future-technologies/woman-uses-tablet-surrounded-by-iot-security-graphics-227780092_800px.jpg\",\"https://hunonic.com/wp-content/uploads/2021/07/nong-nghiep-thong-minh.jpg\"]', '[]', '2022-03-11 00:00:00', '2022-03-12 00:00:00', NULL, NULL, 1, 0, 1, 1, 1, 0, '2022-04-27 16:02:16', '2022-04-27 16:02:16'),
(8, 1, 'bug', '0', '0', 13482, '[\"https://www.also.com/ec/cms5/6000/blog/future-technologies/woman-uses-tablet-surrounded-by-iot-security-graphics-227780092_800px.jpg\",\"https://hunonic.com/wp-content/uploads/2021/07/nong-nghiep-thong-minh.jpg\"]', '[]', '2022-03-11 00:00:00', '2022-03-12 00:00:00', NULL, NULL, 1, 0, 1, 1, 1, 0, '2022-04-27 16:03:47', '2022-04-27 16:03:47'),
(9, 1, 'bug', 'Fix bug ble', 'Noi dung cong viec', 13482, '[\"https://www.also.com/ec/cms5/6000/blog/future-technologies/woman-uses-tablet-surrounded-by-iot-security-graphics-227780092_800px.jpg\",\"https://hunonic.com/wp-content/uploads/2021/07/nong-nghiep-thong-minh.jpg\"]', '[]', '2022-03-11 00:00:00', '2022-03-12 00:00:00', NULL, NULL, 1, 0, 1, 1, 1, 0, '2022-05-25 08:40:13', '2022-05-25 08:40:13'),
(10, 1, 'bug', 'Fix bug ble', 'Noi dung cong viec', 13482, '[\"https://www.also.com/ec/cms5/6000/blog/future-technologies/woman-uses-tablet-surrounded-by-iot-security-graphics-227780092_800px.jpg\",\"https://hunonic.com/wp-content/uploads/2021/07/nong-nghiep-thong-minh.jpg\"]', '[]', '2022-03-11 00:00:00', '2022-03-12 00:00:00', NULL, NULL, 1, 0, 0, 1, 1, 0, '2022-05-25 08:43:01', '2022-05-25 08:43:01'),
(11, 1, 'task', 'Ádad', '\nĐác GDC', 111, NULL, NULL, '2022-05-24 00:00:00', '2022-06-24 00:00:00', NULL, NULL, 1, 0, 0, 1, 2, 0, '2022-05-25 08:43:08', '2022-05-25 08:43:08'),
(12, 1, 'task', 'Du an 12345', 'Á đá đá đá đá đa đá đấy đá đa đá ấy đá đá đa Á đã Á đã à Á đa đấy ', 111, NULL, NULL, '2022-05-25 00:00:00', '2022-07-25 00:00:00', NULL, NULL, 1, 0, 0, 2, 2, 0, '2022-05-25 09:45:38', '2022-05-25 09:45:38'),
(13, 1, 'task', '81723184518741', 'Asdadadacvzv', 111, NULL, NULL, '2022-05-25 00:00:00', '2022-05-27 00:00:00', NULL, NULL, 1, 0, 0, 1, 1, 0, '2022-05-25 09:48:11', '2022-05-25 09:48:11'),
(14, 1, 'task', 'Dddd', 'Dddd', 111, NULL, NULL, '2022-05-25 00:00:00', '2022-05-25 00:00:00', NULL, NULL, 1, 0, 0, 1, 1, 0, '2022-05-25 09:58:00', '2022-05-25 09:58:00'),
(15, 1, 'task', 'Dddd', 'Dddd', 111, NULL, NULL, '2022-05-25 00:00:00', '2022-05-25 00:00:00', NULL, NULL, 1, 0, 0, 1, 1, 0, '2022-05-25 09:58:04', '2022-05-25 09:58:04'),
(16, 1, 'task', 'Dddd', 'Dddd', 111, NULL, NULL, '2022-05-25 00:00:00', '2022-05-25 00:00:00', NULL, NULL, 1, 0, 1, 1, 1, 0, '2022-05-25 10:00:22', '2022-05-25 10:00:22'),
(17, 1, 'task', 'Dddd', 'Dddd', 111, NULL, NULL, '2022-05-25 00:00:00', '2022-05-25 00:00:00', NULL, NULL, 1, 0, 1, 1, 1, 0, '2022-05-25 10:00:59', '2022-05-25 10:00:59'),
(18, 1, 'task', 'Vvvv', 'Vvvv', 111, NULL, NULL, '2022-05-25 00:00:00', '2022-05-25 00:00:00', NULL, NULL, 1, 0, 0, 1, 1, 0, '2022-05-25 10:13:32', '2022-05-25 10:13:32'),
(19, 1, 'task', 'Erwe', 'Werner', 111, NULL, NULL, '2022-05-25 00:00:00', '2022-05-25 00:00:00', NULL, NULL, 1, 0, 0, 1, 1, 0, '2022-05-25 10:16:01', '2022-05-25 10:16:01'),
(20, 2, 'task', 'Hai 1234', 'Testa asd adds da sad', 111, NULL, NULL, '2022-05-25 00:00:00', '2022-07-25 00:00:00', NULL, NULL, 1, 0, 0, 1, 0, 0, '2022-05-25 10:25:08', '2022-05-25 10:25:08'),
(21, 2, 'task', 'Hai 1234', 'Testa asd adds da sad', 111, NULL, NULL, '2022-05-25 00:00:00', '2022-07-25 00:00:00', NULL, NULL, 1, 0, 0, 1, 0, 0, '2022-05-25 10:25:45', '2022-05-25 10:25:45'),
(22, 2, 'bug', 'Fix bug ble', 'Noi dung cong viec', 4519, '[\"https://www.also.com/ec/cms5/6000/blog/future-technologies/woman-uses-tablet-surrounded-by-iot-security-graphics-227780092_800px.jpg\",\"https://hunonic.com/wp-content/uploads/2021/07/nong-nghiep-thong-minh.jpg\"]', '[]', '2022-03-11 00:00:00', '2022-03-12 00:00:00', NULL, NULL, 1, 0, 0, 1, 1, 0, '2022-05-25 10:42:02', '2022-05-25 10:42:02'),
(23, 2, 'bug', 'Fix bug ble', 'Noi dung cong viec', 4519, '[\"https://www.also.com/ec/cms5/6000/blog/future-technologies/woman-uses-tablet-surrounded-by-iot-security-graphics-227780092_800px.jpg\",\"https://hunonic.com/wp-content/uploads/2021/07/nong-nghiep-thong-minh.jpg\"]', '[]', '2022-03-11 00:00:00', '2022-03-12 00:00:00', NULL, NULL, 1, 0, 0, 1, 1, 0, '2022-05-25 10:42:15', '2022-05-25 10:42:15'),
(24, 2, 'bug', 'Fix bug ble', 'Noi dung cong viec', 4519, '[\"https://www.also.com/ec/cms5/6000/blog/future-technologies/woman-uses-tablet-surrounded-by-iot-security-graphics-227780092_800px.jpg\",\"https://hunonic.com/wp-content/uploads/2021/07/nong-nghiep-thong-minh.jpg\"]', '[]', '2022-03-11 00:00:00', '2022-03-12 00:00:00', NULL, NULL, 1, 0, 0, 1, 1, 0, '2022-05-25 10:43:48', '2022-05-25 10:43:48'),
(25, 2, 'task', 'Hai 1234', 'Testa asd adds da sad', 111, NULL, NULL, '2022-05-25 00:00:00', '2022-07-25 00:00:00', NULL, NULL, 1, 0, 0, 1, 0, 0, '2022-05-25 10:44:26', '2022-05-25 10:44:26'),
(26, 2, 'task', 'Hai 1234', 'Testa asd adds da sad', 111, NULL, NULL, '2022-05-25 00:00:00', '2022-07-25 00:00:00', NULL, NULL, 1, 0, 0, 1, 0, 0, '2022-05-25 10:44:31', '2022-05-25 10:44:31'),
(27, 1, 'task', 'Getydfgdfg', 'Dfgdf', 111, NULL, NULL, '2022-05-25 00:00:00', '2022-05-25 00:00:00', NULL, NULL, 1, 0, 0, 1, 2, 0, '2022-05-25 11:16:43', '2022-05-25 11:16:43');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `role` int(11) NOT NULL COMMENT '1 admin, 2 manager, 3 user',
  `position_id` int(11) NOT NULL COMMENT 'id chuc vu',
  `position_name` varchar(255) NOT NULL COMMENT 'ten chuc vu',
  `department_id` int(11) NOT NULL,
  `active` int(11) NOT NULL COMMENT 'kich hoat user',
  `create_at` datetime NOT NULL DEFAULT current_timestamp(),
  `update_at` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `role`, `position_id`, `position_name`, `department_id`, `active`, `create_at`, `update_at`) VALUES
(5, 1, 1, 'Developer', 1, 1, '2022-04-23 14:10:29', '2022-04-23 14:10:29'),
(111, 1, 1, 'Quan', 1, 1, '2022-04-23 14:10:29', '2022-04-23 14:10:29'),
(4519, 1, 1, 'Quan', 1, 1, '2022-04-23 14:10:29', '2022-04-23 14:10:29'),
(13482, 1, 1, 'Quan', 1, 1, '2022-04-23 14:10:29', '2022-04-23 14:10:29'),
(40867, 1, 1, 'Developer', 1, 1, '2022-04-23 14:10:29', '2022-04-23 14:10:29');

-- --------------------------------------------------------

--
-- Table structure for table `user_assign_data`
--

CREATE TABLE `user_assign_data` (
  `id` int(11) NOT NULL,
  `key_data` varchar(20) NOT NULL COMMENT 'tasks, metting, Suggestions',
  `user_id` int(11) NOT NULL,
  `data_id` int(11) NOT NULL,
  `create_at` datetime NOT NULL DEFAULT current_timestamp(),
  `update_at` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `user_assign_data`
--

INSERT INTO `user_assign_data` (`id`, `key_data`, `user_id`, `data_id`, `create_at`, `update_at`) VALUES
(3, 'tasks_assign', 5, 6, '2022-04-27 16:00:09', '2022-04-27 16:00:09'),
(4, 'tasks_assign', 5, 7, '2022-04-27 16:02:16', '2022-04-27 16:02:16'),
(5, 'tasks_assign', 13482, 7, '2022-04-27 16:03:47', '2022-04-27 16:03:47'),
(6, 'tasks_assign', 5, 9, '2022-05-25 08:40:13', '2022-05-25 08:40:13'),
(7, 'tasks_assign', 5, 10, '2022-05-25 08:43:01', '2022-05-25 08:43:01'),
(8, 'tasks_assign', 111, 11, '2022-05-25 08:43:08', '2022-05-25 08:43:08'),
(9, 'tasks_assign', 111, 12, '2022-05-25 09:45:38', '2022-05-25 09:45:38'),
(10, 'tasks_assign', 5, 13, '2022-05-25 09:48:11', '2022-05-25 09:48:11'),
(13, 'tasks_assign', 40867, 18, '2022-05-25 10:13:32', '2022-05-25 10:13:32'),
(14, 'tasks_assign', 40867, 19, '2022-05-25 10:16:01', '2022-05-25 10:16:01'),
(15, 'tasks_assign', 5, 22, '2022-05-25 10:42:02', '2022-05-25 10:42:02'),
(16, 'tasks_assign', 5, 27, '2022-05-25 11:16:43', '2022-05-25 11:16:43'),
(17, 'tasks_assign', 111, 27, '2022-05-25 11:16:43', '2022-05-25 11:16:43'),
(18, 'tasks_assign', 4519, 27, '2022-05-25 11:16:43', '2022-05-25 11:16:43'),
(19, 'tasks_assign', 13482, 27, '2022-05-25 11:16:43', '2022-05-25 11:16:43'),
(20, 'tasks_assign', 40867, 27, '2022-05-25 11:16:43', '2022-05-25 11:16:43');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `comment`
--
ALTER TABLE `comment`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id_create` (`user_id_create`);

--
-- Indexes for table `departments`
--
ALTER TABLE `departments`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `meeting`
--
ALTER TABLE `meeting`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id_create` (`user_id_create`);

--
-- Indexes for table `news`
--
ALTER TABLE `news`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id_create` (`user_id_create`),
  ADD KEY `cate_id` (`cate_id`);

--
-- Indexes for table `notify`
--
ALTER TABLE `notify`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`) USING BTREE;

--
-- Indexes for table `projects`
--
ALTER TABLE `projects`
  ADD PRIMARY KEY (`id`),
  ADD KEY `department_id` (`department_id`),
  ADD KEY `projects_ibfk_2` (`user_id_create`);

--
-- Indexes for table `suggestions`
--
ALTER TABLE `suggestions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id_create` (`user_id_create`);

--
-- Indexes for table `tasks`
--
ALTER TABLE `tasks`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id_create` (`user_id_create`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD KEY `department_id` (`department_id`);

--
-- Indexes for table `user_assign_data`
--
ALTER TABLE `user_assign_data`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `comment`
--
ALTER TABLE `comment`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `departments`
--
ALTER TABLE `departments`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `meeting`
--
ALTER TABLE `meeting`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `news`
--
ALTER TABLE `news`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `notify`
--
ALTER TABLE `notify`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `projects`
--
ALTER TABLE `projects`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `suggestions`
--
ALTER TABLE `suggestions`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tasks`
--
ALTER TABLE `tasks`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=40868;

--
-- AUTO_INCREMENT for table `user_assign_data`
--
ALTER TABLE `user_assign_data`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `comment`
--
ALTER TABLE `comment`
  ADD CONSTRAINT `comment_ibfk_1` FOREIGN KEY (`user_id_create`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `meeting`
--
ALTER TABLE `meeting`
  ADD CONSTRAINT `meeting_ibfk_1` FOREIGN KEY (`user_id_create`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `news`
--
ALTER TABLE `news`
  ADD CONSTRAINT `news_ibfk_1` FOREIGN KEY (`user_id_create`) REFERENCES `users` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `news_ibfk_2` FOREIGN KEY (`cate_id`) REFERENCES `category` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `notify`
--
ALTER TABLE `notify`
  ADD CONSTRAINT `notify_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `projects`
--
ALTER TABLE `projects`
  ADD CONSTRAINT `projects_ibfk_1` FOREIGN KEY (`department_id`) REFERENCES `departments` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `projects_ibfk_2` FOREIGN KEY (`user_id_create`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `suggestions`
--
ALTER TABLE `suggestions`
  ADD CONSTRAINT `suggestions_ibfk_1` FOREIGN KEY (`user_id_create`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `tasks`
--
ALTER TABLE `tasks`
  ADD CONSTRAINT `tasks_ibfk_1` FOREIGN KEY (`user_id_create`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `users_ibfk_1` FOREIGN KEY (`department_id`) REFERENCES `departments` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `user_assign_data`
--
ALTER TABLE `user_assign_data`
  ADD CONSTRAINT `user_assign_data_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
