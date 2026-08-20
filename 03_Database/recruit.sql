-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 03, 2026 at 01:30 PM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `recruit`
--

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `slug` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `name`, `slug`, `created_at`, `updated_at`) VALUES
(1, 'FrontEnd', 'frontend', '2023-10-26 01:36:41', '2023-11-04 08:31:41'),
(2, 'BackEnd', 'backend', '2023-10-26 01:58:22', '2023-11-04 08:31:49'),
(6, 'Intern', 'intern', '2023-11-07 09:07:29', '2023-11-07 09:07:29'),
(7, 'Fresher', 'fresher', '2023-11-07 09:07:35', '2023-11-07 09:07:35'),
(8, 'Developer', 'developer', '2023-11-07 09:07:39', '2023-11-10 11:14:53'),
(9, 'Other', 'other', '2023-11-11 06:05:42', '2023-11-11 06:05:42'),
(10, 'Middle', 'middle', '2023-11-11 06:54:35', '2023-11-11 06:54:41'),
(11, 'Junior', 'junior', '2023-11-11 06:54:46', '2023-11-11 06:54:46'),
(12, 'FullStack', 'fullstack', '2023-11-28 00:33:36', '2023-11-28 00:33:36'),
(13, 'Freelancer', 'freelancer', '2023-11-28 00:34:07', '2023-11-28 00:34:07'),
(14, 'Admin', 'admin', '2026-04-19 04:06:25', '2026-04-19 04:06:25');

-- --------------------------------------------------------

--
-- Table structure for table `companies`
--

CREATE TABLE `companies` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` varchar(255) DEFAULT NULL,
  `name` varchar(255) DEFAULT NULL,
  `industry` varchar(255) DEFAULT NULL,
  `capacity` varchar(255) DEFAULT NULL,
  `address` varchar(255) DEFAULT NULL,
  `tel` varchar(255) DEFAULT NULL,
  `website` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `companies`
--

INSERT INTO `companies` (`id`, `user_id`, `name`, `industry`, `capacity`, `address`, `tel`, `website`, `created_at`, `updated_at`) VALUES
(5, '10', 'BRAVO HÀ  NỘI', 'IT Project', 'Average 15 Monthly Base salary per year. 13 Monthly Base Salary.', 'Tầng 7, Tòa nhà văn phòng 311 – 313 thành phố Hà Nội', '02862733496', 'contact@topdev.vn', '2023-11-11 06:09:48', '2026-04-19 03:37:49'),
(6, '12', 'LG CNS', 'Phần Mềm', 'Over 1000', 'Tầng 35, tòa Keangnam Landmark 72, Phường Mễ Trì, Quận Nam Từ Liêm, Thành phố Hà Nội', '123456789', 'https://careers.lgcnsvn.com/', '2023-11-11 08:22:39', '2023-11-11 08:22:39'),
(8, '42', 'aa', 'aáda', 'asd', 'ađá', '1212121212', 'a123341', '2026-04-10 23:59:00', '2026-04-10 23:59:00'),
(9, '44', 'aa', '111111', '123123', '111111111', '1111111111', NULL, '2026-04-13 09:07:51', '2026-04-13 09:07:51'),
(10, '45', '1231231231', '123123123', '1231231', '3123123', '1231231231', NULL, '2026-04-13 09:30:02', '2026-04-13 09:30:02');

-- --------------------------------------------------------

--
-- Table structure for table `contacts`
--

CREATE TABLE `contacts` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `subject` varchar(255) DEFAULT NULL,
  `message` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `contacts`
--

INSERT INTO `contacts` (`id`, `name`, `email`, `subject`, `message`, `created_at`, `updated_at`) VALUES
(1, 'Minh Tuấn Lê', 'letuann267@gmail.com', 'đấ', 'đấ', '2026-04-12 01:59:40', '2026-04-12 01:59:40');

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(255) NOT NULL,
  `connection` text NOT NULL,
  `queue` text NOT NULL,
  `payload` longtext NOT NULL,
  `exception` longtext NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `jobs`
--

CREATE TABLE `jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `title` text DEFAULT NULL,
  `body` text DEFAULT NULL,
  `category_id` int(11) DEFAULT NULL,
  `province_id` bigint(20) UNSIGNED DEFAULT NULL,
  `gender` int(11) DEFAULT NULL,
  `startingAge` int(11) DEFAULT NULL,
  `endingAge` int(11) DEFAULT NULL,
  `duties` text DEFAULT NULL,
  `slug` varchar(255) NOT NULL,
  `address` varchar(255) DEFAULT NULL,
  `remote` varchar(255) DEFAULT NULL,
  `experience` varchar(255) DEFAULT NULL,
  `startingDate` varchar(255) DEFAULT NULL,
  `endingDate` varchar(255) DEFAULT NULL,
  `job_type` varchar(255) DEFAULT NULL,
  `price_type` text DEFAULT NULL,
  `price` text DEFAULT NULL,
  `language_id` bigint(20) UNSIGNED DEFAULT NULL,
  `language_level` varchar(255) DEFAULT NULL,
  `certificate` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `jobs`
--

INSERT INTO `jobs` (`id`, `user_id`, `title`, `body`, `category_id`, `province_id`, `gender`, `startingAge`, `endingAge`, `duties`, `slug`, `address`, `remote`, `experience`, `startingDate`, `endingDate`, `job_type`, `price_type`, `price`, `language_id`, `language_level`, `certificate`, `created_at`, `updated_at`) VALUES
(14, 10, 'Software Engineer (NodeJS)', 'Tốt nghiệp đại học các ngành liên quan đến Công nghệ thông tin.\r\nKinh nghiệm tối thiểu 1 năm lập trình với Store Procedure: Oracle, MS SQL,…\r\nKinh nghiệm lập trình với .NET, Java, ReactJS, NodeJS,...\r\nKinh nghiệm sử dụng git như GitHub/GitLab, Docker containers là một điểm cộng lớn.\r\nKiến thức về quy trình phát triển phần mềm và quản lý dự án triển khai phần mềm.\r\nCó kiến thức và giải pháp về tối ưu hóa xử lý Code và hệ thống.\r\nCó kiến thức về giải thuật lập trình.\r\nCó tối thiểu 02 năm kinh nghiệm tham gia phát triển ứng dụng phần mềm.\r\nNăng lực giải quyết vấn đề.\r\nNăng lực làm việc theo nhóm / độc lập.\r\nNăng lực giao tiếp tốt.\r\nNăng lực đọc hiểu các tài liệu chuyên ngành IT tiếng Anh.', 8, 1, 1, 18, 24, 'Lập trình ứng dụng, phục vụ cho hơn 12,000 user sử dụng tại ACB.\r\nLập trình tích hợp vào các hệ sinh thái đa dạng, đa nền tảng (NodeJS, …)\r\nTham gia phát triển phần mềm theo phương pháp Agile, Scrum cùng phòng ban khác.\r\nNghiên cứu, áp dụng các tính năng của các phiên bản Oracle mới để ứng dụng vào phần mềm hiện có của ngân hàng như Database Sharding, Big Data, Queue, In-Memory, JSON.', 'software-engineer-nodejs', 'Biên Hòa, Đồng Nai', '0', '1-3', '2023-11-12', '2024-02-03', 'Part Time', 'Hourly', '4000', 10, 'A2', NULL, '2023-11-11 06:16:49', '2023-12-15 10:46:56'),
(16, 10, 'IT - CHUYÊN VIÊN VẬN HÀNH ỨNG DỤNG E-BANKING', 'Tốt nghiệp Đại Học, chuyên ngành CNTT hoặc các chuyên ngành về vận hành ứng dụng,...;\r\nTối thiểu 3 năm trong các lĩnh vực liên quan hệ thống, phần mềm, cơ sở dữ liệu, ưu tiên các ứng viên đã có kinh nghiệm quản lý các ứng dụng E Banking tại các ngân hàng;\r\nHiểu biết về các vấn đề/lỗi phát sinh của ứng dụng E Banking/Digital Banking thường gặp;\r\nCó kiến thức tốt về công nghệ phần mềm, về lập trình ứng dụng, quản trị hệ thống phần mềm, cơ sở dữ liệu, các dịch vụ Tài chính – Ngân hàng\r\nƯu tiên ứng viên lập trình được các ngôn ngữ C#, Java, Oracle để chỉnh sửa và hỗ trợ kịp thời cho các ứng dụng;\r\nCó kỹ năng phân tích, nhìn nhận vấn đề, kỹ năng làm việc nhóm và giao tiếp tốt.', 2, 3, 1, 24, 26, 'Đảm bảo tốt công việc vận hành hàng ngày đối với các hệ thống được giao phụ trách;\r\nThường trực giải đáp cho người sử dụng các vấn đề liên quan đến việc sử dụng hệ thống chương trình;\r\nTổ chức xây dựng các quy trình, hướng dẫn công việc, tài liệu vận hành hệ thống;\r\nChịu trách nhiệm phối hợp với các bộ phận khác trong và ngoài Khối CNTT để giải quyết các sự cố của các hệ thống thuộc phạm vi phụ trách;\r\nTham gia xây dựng và hoàn thiện các qui định về quản lý việc sử dụng hệ thống công nghệ thông tin  tại bộ phận.\r\nTham gia sửa chữa các lỗi ứng dụng phát sinh trong quá trình vận hành.\r\nThực hiện các nhiệm vụ khác được cấp trên phân công', 'it-chuyen-vien-van-hanh-u-ng-dung-e-banking', 'Bình Thạnh, TP Hồ Chí Minh', '1', '1-3', '2023-11-11', '2023-11-30', 'Part Time', 'Hourly', '2000', 10, 'A1', NULL, '2023-11-11 06:22:51', '2023-12-11 08:31:53'),
(17, 12, '[Middle/ Senior] SAP ABAP Developer', 'Bắt buộc\r\n\r\nTối thiểu 3  năm kinh nghiệm thực hành ABAP \r\nCó kinh nghiệm về ABAP cốt lõi và nâng cao, đã làm việc với ECC và S4/HANA\r\nCó kinh nghiệm về New Open SQL\r\nƯu tiên\r\n\r\nCó kiến thức cơ bản về quy trình nghiệp vụ SAP (SD,MM,FICO...)\r\nCó kinh nghiệm phát triển SAP Business Transformation Platform(BTP)', 10, 1, 2, 18, 20, 'Với tư cách là ABAP Developer, công việc chính của bạn sẽ là:\r\n\r\nPhát triển các dự án sử dụng SAP ECC 6.0, S/4 HANA\r\nHiểu các yêu cầu thiết kế chức năng và chuyển đổi thành các thông số kĩ thuật thiết kế\r\nKiểm tra và gỡ lỗi ABAP phức tạp liên quan đến việc triển khai mô-đun SAP.\r\nCung cấp hỗ trợ kỹ thuật cho các ứng dụng SAP ABAP, xác định và giải quyết kịp thời các vấn đề, bao gồm gỡ lỗi chuyên sâu và khắc phục sự cố mã ABAP.', 'middle-senior-sap-abap-developer', 'Long khánh, Đồng Nai', '0', '4-7', '2023-11-18', '', 'Full Time', 'Fixed', '4900', 10, 'A1', NULL, '2023-11-11 08:28:44', '2023-12-11 09:07:02'),
(18, 12, 'Senior Backend Developer (E-Commerce, Java, Spring, SQL)', 'Java, JSP,  Spring Framework,\r\nJavascript, jQuery, AJAX Servlet\r\nMysql, mariaDB\r\nTOEIC > 550 or other english certificates (Optional)\r\nSQL tuning exp\r\nE-cormerce exp', 2, 1, 2, 20, 25, 'Main project is LG Online Brand Shop (for Korea, USA, Japan)\r\nDevelop projects using Java, Spring framework, SQL\r\nDesign engaging and meaningful web solutions, use the latest platforms, technologies and\r\nframeworks or develop new to increase project.\r\nJob details will be discussed further in the interview.', 'senior-backend-developer-e-commerce-java-spring-sql', 'quận 7, TP Hồ Chí Minh', '0', '4-7', '2023-11-09', '2024-01-05', 'Part Time', 'Hourly', '3000', 10, 'A1', NULL, '2023-11-11 08:30:43', '2023-12-11 08:49:49'),
(19, 12, 'Infra Engineer (On-Premise)', 'Bắt buộc:\r\n\r\nKiến thức cơ bản và khả năng vận hành của máy chủ và lưu trữ, lưu trữ\r\nKiến thức cơ bản và sử dụng hoạt động của phần mềm trung gian (WEB/WAS)\r\nCó kiến thức cơ bản và ứng dụng Database\r\nTiếng anh giao tiếp (TOEIC 550 trở lên)\r\nƯu tiên: \r\nChứng chỉ Linux/Windows và kinh nghiệm vận hành\r\nCó kinh nghiệm vận hành M/W\r\ncó chứng chỉ và kinh nghiệm DB\r\nBiết tiếng Hàn', 11, 2, 2, 25, 30, 'LG CNS dẫn đầu trong việc cung cấp môi trường làm việc tốt nhất cho nhân viên.\r\nVới vai trò Kỹ sư system, công việc chính của bạn:\r\nOn-premise/Private Cloud\r\nVận hành On-Premise / Private Cloud-based architecture\r\nGiải quyết vấn đề và hỗ trợ kỹ thuật\r\nThực hiện các công việc theo yêu cầu từ Quản lý', 'infra-engineer-on-premise', 'Số 34 đường Giang Văn Minh, Phường Kim Mã, Quận Ba Đình, Thành phố Hà Nội', '0', '4-7', '2023-11-11', '', 'Full Time', 'Fixed', '50000', 10, 'A1', NULL, '2023-11-11 08:31:54', '2023-12-11 08:48:54'),
(20, 10, 'IT - CHUYÊN VIÊN QUẢN TRỊ CƠ SỞ DỮ LIỆU BÁO CÁO VÀ NGHIỆP VỤ', 'Tốt nghiệp Đại học chuyên ngành Công nghệ Thông tin\r\nCó 3 năm kinh nghiệm chuyên sâu về hệ thống Linux, Solaris.\r\nCó 3 năm kinh nghiệm chuyên sâu về cơ sở dữ liệu Postgres, MongoDB, MinIO (object storage).\r\nCó bằng cấp về quản trị hệ thống Oracle (OCA hoặc OCP), MS SQL Server, Postgres, Solaris/Linux.\r\nCó kiến thức chuyên sâu về cơ sở dữ liệu Postgres, MongoDB, MinIO (object storage).\r\nCó kiến thức về nghiệp vụ ngân hàng.\r\nCó khả năng đọc, hiểu chính xác tài liệu kỹ thuật tiếng Anh.\r\nCó khả năng làm việc với nhóm tốt.\r\nKỹ năng tổ chức công việc\r\nCó tinh thần trách nhiệm, năng động, nhiệt tình, không ngại khó.\r\nTrung thực, cẩn thận, chính xác, chịu khó học tập trao dồi chuyên môn', 1, 2, 1, 20, 30, 'Tiếp nhận hệ thống máy chủ và tài liệu kỹ thuật kèm theo\r\nGiám sát họat động của máy chủ và cơ sở dữ liệu Báo cáo và nghiệp vụ hằng ngày.\r\nNghiên cứu và đưa ra các giải pháp khắc phục sự cố nếu có cho các hệ thống Cơ sở dữ liệu Báo cáo và nghiệp vụ hoặc các sự cố về cơ sở dữ liệu.\r\nQuản lý an ninh cơ sở dữ liệu Báo cáo và nghiệp vụ: ngăn chặn các hành động truy cập và điều chỉnh cơ sở dữ liệu mà không được phép.\r\nTạo user và cấp quyền truy cập thích hợp cho nhân viên nhóm khác khi có yêu cầu hoặc cho các chương trình không phải vận hành.\r\nThực hiện kiểm tra kế họach sao lưu và phục hồi hệ thống. Cài đặt các cơ sở dữ liệu\r\nBáo cáo và nghiệp vụ cho các đơn vị khác khi có yêu cầu.\r\nThực hiện kiểm tra và bảo trì hệ thống vào cuối tháng hoặc cuối quý.\r\nNghiên cứu và đánh giá các hệ thống cơ sở dữ liệu Báo cáo và nghiệp vụ và đưa ra các giải pháp tối ưu, các biện pháp tinh chỉnh cho cơ sở dữ liệu.\r\nThực hiện việc dự phòng thảm hoạ, phục hồi hệ thống hoặc chuyển đổi hệ thống khi cần thiết\r\nThực hiện các công việc do Giám đốc/ Phó Giám đốc, Giám đốc phòng, Giám đốc bộ phận giao\r\nThực hiện các công việc nghiên cứu, tìm hiểu hệ thống để nâng cao khả năng vận hành, xử lý, tham gia dự án khác theo yêu cầu hoặc phối hợp các bộ phận ứng dụng khác để phát triển và điều chỉnh.\r\nBiên soạn các tài liệu kỹ thuật vận hành, các quy trình, các quy định', 'it-chuyen-vien-quan-tri-co-so-du-lieu-bao-cao-va-nghiep-vu', '375, Đỗ Xuân Hợp, Quận 9, TP Hồ Chí Minh', '1', '1-3', '2023-11-11', '2024-02-03', 'Full Time', 'Fixed', '6000', 10, 'A1', NULL, '2023-11-11 06:18:41', '2023-12-15 10:46:38'),
(34, 10, 'Job test DatGold', 'Hello DatGold', 2, 50, 1, 19, 21, 'Perface', 'job-test-datgold', 'Quận 1 Thành Phố Hồ Chí Minh', '0', '1-3', '2023-12-16', '2023-12-25', 'Full Time', 'Fixed', '242422', 11, 'A1', 'Master\'s degree', '2023-12-16 04:38:14', '2023-12-16 04:38:14'),
(35, 10, 'datgold', 'hello', 2, 1, 1, 16, 20, 'fdgg', 'datgold', 'HCM', '0', '+7', '2023-12-15', '2023-12-26', 'Full Time', 'Fixed', '435454', 13, 'A2', 'Master\'s degree', '2023-12-16 05:20:46', '2023-12-16 05:20:46'),
(36, 10, 'test', 'test', 2, 50, 1, 18, 22, 'ok', 'test', 'HCM', '0', '1-3', '2023-12-18', '2023-12-26', 'Full Time', 'Fixed', '10000', 11, 'A1', 'Master\'s degree', '2023-12-16 10:16:53', '2023-12-16 10:16:53'),
(37, 10, 'FullStack-IT-Job', 'job', 2, 50, 3, 18, 21, 'hello', 'fullstack-it-job', 'HOCHIMINH', '0', '1-3', '2023-12-17', '2023-12-26', 'partyime/full', 'Fixed', '1.000.333 ₫', 11, 'A1', 'Master\'s degree', '2023-12-16 11:45:19', '2023-12-16 20:24:17'),
(38, 10, 'qwe', 'qwe', 10, 14, 1, 2, 3, 'qq', 'qwe', 'we', '0', '1-3', '2026-04-07', '2026-04-30', 'Full Time', 'Fixed', '1.231 ₫', 10, 'N2', 'Bachelor\'s degree', '2026-04-17 03:29:21', '2026-04-17 03:29:21');

-- --------------------------------------------------------

--
-- Table structure for table `job_request`
--

CREATE TABLE `job_request` (
  `id` int(11) NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `job_id` int(11) DEFAULT NULL,
  `status` varchar(5) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `job_request`
--

INSERT INTO `job_request` (`id`, `user_id`, `job_id`, `status`, `created_at`, `updated_at`) VALUES
(61, 18, 14, '2', '2023-12-11 07:08:58', '2026-04-11 09:34:42'),
(65, 23, 14, NULL, '2023-12-12 18:15:42', '2023-12-12 18:15:42'),
(67, 30, 16, NULL, '2023-12-15 23:20:49', '2023-12-15 23:20:49'),
(68, 30, 32, NULL, '2023-12-15 23:21:02', '2023-12-15 23:21:02'),
(70, 32, 36, NULL, '2023-12-16 10:25:12', '2023-12-16 10:25:12'),
(71, 32, 34, NULL, '2023-12-16 10:25:16', '2023-12-16 10:25:16'),
(72, 11, 36, NULL, '2023-12-16 10:27:37', '2023-12-16 10:27:37'),
(73, 11, 34, NULL, '2023-12-16 10:27:51', '2023-12-16 10:27:51'),
(74, 41, 37, '1', '2023-12-16 11:48:50', '2023-12-16 19:24:05'),
(75, 11, 37, '1', '2023-12-16 11:50:47', '2023-12-16 20:23:01'),
(76, 11, 35, NULL, '2026-04-11 10:06:01', '2026-04-11 10:06:01'),
(77, 11, 18, NULL, '2026-04-11 10:06:05', '2026-04-11 10:06:05'),
(78, 11, 17, NULL, '2026-04-11 10:06:07', '2026-04-11 10:06:07'),
(79, 11, 19, NULL, '2026-04-11 10:06:09', '2026-04-11 10:06:09'),
(81, 43, 14, '1', '2026-04-12 02:25:49', '2026-04-12 02:26:52'),
(82, 43, 34, NULL, '2026-04-12 02:25:50', '2026-04-12 02:25:50'),
(83, 43, 36, NULL, '2026-04-12 02:25:52', '2026-04-12 02:25:52'),
(84, 43, 19, NULL, '2026-04-12 02:25:53', '2026-04-12 02:25:53'),
(85, 43, 18, NULL, '2026-04-12 02:25:54', '2026-04-12 02:25:54'),
(86, 43, 20, NULL, '2026-04-12 02:25:55', '2026-04-12 02:25:55'),
(87, 43, 17, NULL, '2026-04-12 02:25:57', '2026-04-12 02:25:57'),
(88, 43, 16, NULL, '2026-04-12 02:25:58', '2026-04-12 02:25:58'),
(89, 43, 37, NULL, '2026-04-12 02:25:59', '2026-04-12 02:25:59'),
(90, 43, 35, NULL, '2026-04-12 02:26:00', '2026-04-12 02:26:00'),
(91, 11, 16, NULL, '2026-04-17 02:00:23', '2026-04-17 02:00:23');

-- --------------------------------------------------------

--
-- Table structure for table `languages`
--

CREATE TABLE `languages` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `slug` varchar(45) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `languages`
--

INSERT INTO `languages` (`id`, `name`, `slug`, `created_at`, `updated_at`) VALUES
(10, 'Vietnamese', 'vietnamese', '2023-11-11 06:05:52', '2023-11-11 06:05:52'),
(11, 'English', 'english', '2023-11-11 06:06:00', '2023-11-11 06:06:00'),
(12, 'France', 'france', '2023-11-11 06:06:07', '2023-11-11 06:06:07'),
(13, 'Japanese', 'japanese', '2023-11-11 06:06:12', '2023-11-11 06:06:18'),
(15, 'a', 'a', '2026-04-14 10:09:13', '2026-04-14 10:09:13');

-- --------------------------------------------------------

--
-- Table structure for table `language_user`
--

CREATE TABLE `language_user` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `language_id` bigint(20) UNSIGNED NOT NULL,
  `level` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `language_user`
--

INSERT INTO `language_user` (`id`, `user_id`, `language_id`, `level`, `created_at`, `updated_at`) VALUES
(26, 18, 12, 'B2', '2023-12-11 08:29:54', '2023-12-11 08:29:54'),
(27, 18, 11, 'C1', '2023-12-11 08:29:54', '2023-12-11 08:29:54'),
(31, 11, 11, 'A1', '2023-12-11 18:28:44', '2023-12-11 18:28:44'),
(32, 11, 12, 'C1', '2023-12-11 18:28:44', '2023-12-11 18:28:44'),
(33, 19, 11, 'A2', '2023-12-12 10:18:32', '2023-12-12 10:18:32'),
(34, 20, 10, 'B1', '2023-12-12 10:20:45', '2023-12-12 10:20:45'),
(35, 21, 10, 'A2', '2023-12-12 10:31:07', '2023-12-12 10:31:07'),
(36, 22, 11, 'A1', '2023-12-12 10:32:37', '2023-12-12 10:32:37'),
(42, 24, 10, 'A1', '2023-12-13 05:27:52', '2023-12-13 05:27:52'),
(43, 25, 10, 'A1', '2023-12-13 05:29:57', '2023-12-13 05:29:57'),
(44, 26, 10, 'A1', '2023-12-13 05:31:51', '2023-12-13 05:31:51'),
(45, 23, 10, 'A2', '2023-12-13 05:35:54', '2023-12-13 05:35:54'),
(46, 27, 11, 'A2', '2023-12-14 11:38:34', '2023-12-14 11:38:34'),
(47, 28, 11, 'A2', '2023-12-14 12:56:13', '2023-12-14 12:56:13'),
(51, 30, 10, 'B1', '2023-12-15 23:17:58', '2023-12-15 23:17:58'),
(52, 31, 11, 'A2', '2023-12-16 05:29:04', '2023-12-16 05:29:04'),
(53, 31, 10, 'A1', '2023-12-16 05:29:04', '2023-12-16 05:29:04'),
(54, 32, 10, 'A1', '2023-12-16 10:18:56', '2023-12-16 10:18:56'),
(55, 37, 11, 'A1', '2023-12-16 11:24:18', '2023-12-16 11:24:18'),
(56, 43, 10, 'A1', '2026-04-12 02:23:04', '2026-04-12 02:23:04'),
(57, 43, 11, 'C1', '2026-04-12 02:23:04', '2026-04-12 02:23:04');

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(5, '2021_09_05_205102_create_companies_table', 1),
(6, '2021_09_05_205406_create_roles_table', 1),
(7, '2021_09_05_205446_create_categories_table', 1),
(8, '2021_09_05_205519_create_photos_table', 1),
(9, '2021_09_11_211343_create_contacts_table', 2),
(10, '2021_11_16_203304_create_sucessful_users_table', 3),
(11, '2021_11_17_145017_create_languages_table', 4),
(13, '2021_09_05_212611_create_jobs_table', 5),
(14, '2021_11_17_154934_create_language_user_table', 5),
(15, '2021_12_13_002248_create_provinces_table', 6),
(17, '2023_12_13_000758_change_field_to_user_table', 7),
(18, '2023_12_13_121518_change_field_to_job_table', 8),
(19, '2023_12_13_122452_change_field_to_user_tables', 9),
(20, '2023_12_14_175816_change_field_level_to_job_table', 10),
(21, '2023_12_15_164912_change_field_certificate_to_table', 11),
(22, '2021_09_04_100734_create_priority_table', 12),
(23, '2026_04_13_000000_add_is_approved_to_users_table', 13);

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) NOT NULL,
  `token` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `password_resets`
--

INSERT INTO `password_resets` (`email`, `token`, `created_at`) VALUES
('letuann267@gmail.com', '$2y$10$1rMD/O9JMMKgRE.jKN3oQOC9McYwRfVRCthMmdVOJuL6yndQgh76C', '2026-04-17 01:02:50');

-- --------------------------------------------------------

--
-- Table structure for table `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) NOT NULL,
  `tokenable_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `token` varchar(64) NOT NULL,
  `abilities` text DEFAULT NULL,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `photos`
--

CREATE TABLE `photos` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` text NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `photos`
--

INSERT INTO `photos` (`id`, `name`, `created_at`, `updated_at`) VALUES
(1, 'default.png', NULL, NULL),
(2, '169936875812-300x169.png', '2023-11-07 07:52:38', '2023-11-07 07:52:38');

-- --------------------------------------------------------

--
-- Table structure for table `priority`
--

CREATE TABLE `priority` (
  `priority_id` bigint(20) UNSIGNED NOT NULL,
  `job_id` bigint(20) UNSIGNED DEFAULT NULL,
  `age` int(11) DEFAULT NULL,
  `gender` int(11) DEFAULT NULL,
  `category` int(11) DEFAULT NULL,
  `language` int(11) DEFAULT NULL,
  `certificate` int(11) DEFAULT NULL,
  `total` int(11) DEFAULT NULL,
  `province_priority` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `priority`
--

INSERT INTO `priority` (`priority_id`, `job_id`, `age`, `gender`, `category`, `language`, `certificate`, `total`, `province_priority`) VALUES
(2, 34, 9, 9, 9, 9, 9, 50, 9),
(3, 35, 5, 5, 5, 5, 5, 30, 5),
(6, 14, 10, 10, 10, 10, 10, 60, 10),
(7, 16, 5, 5, 5, 5, 5, 30, 5),
(8, 17, 6, 6, 6, 6, 6, 36, 6),
(9, 18, 7, 7, 7, 7, 7, 42, 7),
(10, 19, 8, 8, 8, 8, 8, 48, 8),
(11, 20, 7, 7, 7, 7, 7, 42, 7),
(13, 36, 9, 9, 7, 9, 9, 51, 8),
(14, 37, 10, 7, 7, 4, 6, 44, 10),
(15, 38, NULL, 1, NULL, NULL, NULL, 1, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `provinces`
--

CREATE TABLE `provinces` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `provinces`
--

INSERT INTO `provinces` (`id`, `name`, `created_at`, `updated_at`) VALUES
(1, 'Thành phố Hà Nội', '2023-12-12 17:46:32', '2023-12-12 17:46:32'),
(2, 'Tỉnh Hà Giang', '2023-12-12 17:46:32', '2023-12-12 17:46:32'),
(3, 'Tỉnh Cao Bằng', '2023-12-12 17:46:32', '2023-12-12 17:46:32'),
(4, 'Tỉnh Bắc Kạn', '2023-12-12 17:46:32', '2023-12-12 17:46:32'),
(5, 'Tỉnh Tuyên Quang', '2023-12-12 17:46:32', '2023-12-12 17:46:32'),
(6, 'Tỉnh Lào Cai', '2023-12-12 17:46:32', '2023-12-12 17:46:32'),
(7, 'Tỉnh Điện Biên', '2023-12-12 17:46:32', '2023-12-12 17:46:32'),
(8, 'Tỉnh Lai Châu', '2023-12-12 17:46:32', '2023-12-12 17:46:32'),
(9, 'Tỉnh Sơn La', '2023-12-12 17:46:32', '2023-12-12 17:46:32'),
(10, 'Tỉnh Yên Bái', '2023-12-12 17:46:32', '2023-12-12 17:46:32'),
(11, 'Tỉnh Hoà Bình', '2023-12-12 17:46:32', '2023-12-12 17:46:32'),
(12, 'Tỉnh Thái Nguyên', '2023-12-12 17:46:32', '2023-12-12 17:46:32'),
(13, 'Tỉnh Lạng Sơn', '2023-12-12 17:46:32', '2023-12-12 17:46:32'),
(14, 'Tỉnh Quảng Ninh', '2023-12-12 17:46:32', '2023-12-12 17:46:32'),
(15, 'Tỉnh Bắc Giang', '2023-12-12 17:46:32', '2023-12-12 17:46:32'),
(16, 'Tỉnh Phú Thọ', '2023-12-12 17:46:32', '2023-12-12 17:46:32'),
(17, 'Tỉnh Vĩnh Phúc', '2023-12-12 17:46:32', '2023-12-12 17:46:32'),
(18, 'Tỉnh Bắc Ninh', '2023-12-12 17:46:32', '2023-12-12 17:46:32'),
(19, 'Tỉnh Hải Dương', '2023-12-12 17:46:32', '2023-12-12 17:46:32'),
(20, 'Thành phố Hải Phòng', '2023-12-12 17:46:32', '2023-12-12 17:46:32'),
(21, 'Tỉnh Hưng Yên', '2023-12-12 17:46:32', '2023-12-12 17:46:32'),
(22, 'Tỉnh Thái Bình', '2023-12-12 17:46:32', '2023-12-12 17:46:32'),
(23, 'Tỉnh Hà Nam', '2023-12-12 17:46:32', '2023-12-12 17:46:32'),
(24, 'Tỉnh Nam Định', '2023-12-12 17:46:32', '2023-12-12 17:46:32'),
(25, 'Tỉnh Ninh Bình', '2023-12-12 17:46:32', '2023-12-12 17:46:32'),
(26, 'Tỉnh Thanh Hóa', '2023-12-12 17:46:32', '2023-12-12 17:46:32'),
(27, 'Tỉnh Nghệ An', '2023-12-12 17:46:32', '2023-12-12 17:46:32'),
(28, 'Tỉnh Hà Tĩnh', '2023-12-12 17:46:32', '2023-12-12 17:46:32'),
(29, 'Tỉnh Quảng Bình', '2023-12-12 17:46:32', '2023-12-12 17:46:32'),
(30, 'Tỉnh Quảng Trị', '2023-12-12 17:46:32', '2023-12-12 17:46:32'),
(31, 'Tỉnh Thừa Thiên Huế', '2023-12-12 17:46:32', '2023-12-12 17:46:32'),
(32, 'Thành phố Đà Nẵng', '2023-12-12 17:46:32', '2023-12-12 17:46:32'),
(33, 'Tỉnh Quảng Nam', '2023-12-12 17:46:32', '2023-12-12 17:46:32'),
(34, 'Tỉnh Quảng Ngãi', '2023-12-12 17:46:32', '2023-12-12 17:46:32'),
(35, 'Tỉnh Bình Định', '2023-12-12 17:46:32', '2023-12-12 17:46:32'),
(36, 'Tỉnh Phú Yên', '2023-12-12 17:46:32', '2023-12-12 17:46:32'),
(37, 'Tỉnh Khánh Hòa', '2023-12-12 17:46:32', '2023-12-12 17:46:32'),
(38, 'Tỉnh Ninh Thuận', '2023-12-12 17:46:32', '2023-12-12 17:46:32'),
(39, 'Tỉnh Bình Thuận', '2023-12-12 17:46:32', '2023-12-12 17:46:32'),
(40, 'Tỉnh Kon Tum', '2023-12-12 17:46:32', '2023-12-12 17:46:32'),
(41, 'Tỉnh Gia Lai', '2023-12-12 17:46:32', '2023-12-12 17:46:32'),
(42, 'Tỉnh Đắk Lắk', '2023-12-12 17:46:32', '2023-12-12 17:46:32'),
(43, 'Tỉnh Đắk Nông', '2023-12-12 17:46:32', '2023-12-12 17:46:32'),
(44, 'Tỉnh Lâm Đồng', '2023-12-12 17:46:32', '2023-12-12 17:46:32'),
(45, 'Tỉnh Bình Phước', '2023-12-12 17:46:32', '2023-12-12 17:46:32'),
(46, 'Tỉnh Tây Ninh', '2023-12-12 17:46:32', '2023-12-12 17:46:32'),
(47, 'Tỉnh Bình Dương', '2023-12-12 17:46:32', '2023-12-12 17:46:32'),
(48, 'Tỉnh Đồng Nai', '2023-12-12 17:46:32', '2023-12-12 17:46:32'),
(49, 'Tỉnh Bà Rịa - Vũng Tàu', '2023-12-12 17:46:32', '2023-12-12 17:46:32'),
(50, 'Thành phố Hồ Chí Minh', '2023-12-12 17:46:32', '2023-12-12 17:46:32'),
(51, 'Tỉnh Long An', '2023-12-12 17:46:32', '2023-12-12 17:46:32'),
(52, 'Tỉnh Tiền Giang', '2023-12-12 17:46:32', '2023-12-12 17:46:32'),
(53, 'Tỉnh Bến Tre', '2023-12-12 17:46:32', '2023-12-12 17:46:32'),
(54, 'Tỉnh Trà Vinh', '2023-12-12 17:46:32', '2023-12-12 17:46:32'),
(55, 'Tỉnh Vĩnh Long', '2023-12-12 17:46:32', '2023-12-12 17:46:32'),
(56, 'Tỉnh Đồng Tháp', '2023-12-12 17:46:32', '2023-12-12 17:46:32'),
(57, 'Tỉnh An Giang', '2023-12-12 17:46:32', '2023-12-12 17:46:32'),
(58, 'Tỉnh Kiên Giang', '2023-12-12 17:46:32', '2023-12-12 17:46:32'),
(59, 'Thành phố Cần Thơ', '2023-12-12 17:46:32', '2023-12-12 17:46:32'),
(60, 'Tỉnh Hậu Giang', '2023-12-12 17:46:32', '2023-12-12 17:46:32'),
(61, 'Tỉnh Sóc Trăng', '2023-12-12 17:46:32', '2023-12-12 17:46:32'),
(62, 'Tỉnh Bạc Liêu', '2023-12-12 17:46:32', '2023-12-12 17:46:32'),
(63, 'Tỉnh Cà Mau', '2023-12-12 17:46:32', '2023-12-12 17:46:32');

-- --------------------------------------------------------

--
-- Table structure for table `roles`
--

CREATE TABLE `roles` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `roles`
--

INSERT INTO `roles` (`id`, `name`, `created_at`, `updated_at`) VALUES
(1, 'user', NULL, NULL),
(2, 'company', NULL, NULL),
(3, 'administrator', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `sucessful_users`
--

CREATE TABLE `sucessful_users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` varchar(255) DEFAULT NULL,
  `comment` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `sucessful_users`
--

INSERT INTO `sucessful_users` (`id`, `user_id`, `comment`, `created_at`, `updated_at`) VALUES
(1, '3', 'Oke', '2023-10-26 02:02:26', '2023-10-26 02:02:26'),
(8, '42', 'a', '2026-04-12 02:16:54', '2026-04-12 02:16:54'),
(9, '11', 'a', '2026-04-12 02:17:16', '2026-04-12 02:17:16');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `surname` varchar(255) NOT NULL,
  `gender` int(11) DEFAULT NULL,
  `username` varchar(255) NOT NULL,
  `slug` varchar(255) NOT NULL,
  `about` text DEFAULT NULL,
  `email` varchar(255) NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `cv` varchar(255) DEFAULT NULL,
  `photo_id` varchar(255) NOT NULL DEFAULT '1',
  `role_id` varchar(255) NOT NULL DEFAULT '1',
  `category_id` varchar(255) DEFAULT '1',
  `investigation_id` varchar(255) DEFAULT NULL,
  `birthday` datetime DEFAULT NULL,
  `province_id` bigint(20) UNSIGNED DEFAULT NULL,
  `phone_number` varchar(255) DEFAULT NULL,
  `certificate` varchar(255) DEFAULT NULL,
  `username_changed` varchar(255) NOT NULL DEFAULT '0',
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `is_deleted` int(11) DEFAULT NULL,
  `is_approved` tinyint(1) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `surname`, `gender`, `username`, `slug`, `about`, `email`, `email_verified_at`, `password`, `cv`, `photo_id`, `role_id`, `category_id`, `investigation_id`, `birthday`, `province_id`, `phone_number`, `certificate`, `username_changed`, `remember_token`, `created_at`, `updated_at`, `is_deleted`, `is_approved`) VALUES
(3, 'System', 'Admin', NULL, 'SystemAdmin', 'systemadmin', 'System Admin of Employing X website', 'systemadmin@gmail.com', '2026-04-01 06:52:19', '$2y$10$mpstzyooUkpEttB7Z2YarejcUBNxAZWMaW0FEkrpDFOfSGec5zYb.', NULL, '1', '1', '1', NULL, NULL, NULL, NULL, NULL, '0', 'Dizm9lm7zByCjsIpTJf3fhkVHWD8HAxzkZAxT63u7haz60fNoGOhvUg9rgAY', '2023-10-26 01:36:41', '2023-11-10 09:17:44', 0, 1),
(10, 'Bravo', 'Hanoi', NULL, 'acb', 'acb', 'Công ty Cổ phần Phần mềm BRAVO', 'companyrecruittest@gmail.com', '2023-11-11 06:10:55', '$2y$10$mpstzyooUkpEttB7Z2YarejcUBNxAZWMaW0FEkrpDFOfSGec5zYb.', NULL, '1', '2', '1', NULL, NULL, 2, NULL, NULL, '0', 'BJR9USN6cYTPVxeVYCYvuTLEqHz5J4BthF2PBpRxQwPsHMiNErAe2yV7vtz2', '2023-11-11 06:09:48', '2026-04-19 03:37:49', 0, 1),
(11, 'Hongg', 'Bap', 1, 'hong', 'hong', 'Looking for a jobs IT', 'sonhongthcsquangtrung@gmail.com', '2023-11-11 06:50:17', '$2y$10$mpstzyooUkpEttB7Z2YarejcUBNxAZWMaW0FEkrpDFOfSGec5zYb.', '1775980827Lê Minh Tuấn-CV-Intern Business Analyst.pdf', '1', '1', '1', NULL, '2006-01-12 00:00:00', 1, NULL, 'Master\'s degree', '0', 'M6uds2i8H87uosSjEcGeO7Bp7cTrAWiXFbqbn04h1MkwRJoarzMUgAxxFugS', '2023-11-11 06:41:51', '2026-04-16 11:08:38', 0, 1),
(12, 'Lg', 'Cns', NULL, 'lgadmin', 'lgadmin', 'Là Chuyên gia Chuyển đổi Kỹ thuật số (DX) và Đối tác tăng trưởng kỹ thuật số, chúng tôi cống hiến các kỹ năng DX của mình để giúp các khách hàng lớn đạt được thành công. \r\n\r\nLG CNS dẫn đầu công nghệ Cloud, AI/Big data, smart factory, smart logistics, smart city, blockchain, và các công nghệ chuyển đổi số khác', 'recruittestting@gmail.com', '2023-11-11 08:24:12', '$2y$10$ewEaIZBuHKbjf9t1xT3IuOFCbLPHZgOQFhoV9kYT7TELmFgltzvoq', NULL, '1', '2', '1', NULL, NULL, 2, NULL, NULL, '0', 'rFBy3srW8Ppp2nhfOC76KVUQ9wAD0ZHCCX41k90oDmAm9wg9MaSDPXX7J92Q', '2023-11-11 08:22:39', '2023-11-11 08:24:12', 0, 1),
(18, 'Thao', 'Vy', 2, 'hehe', 'hehe', NULL, 'tsugimigi@gmail.com', '2023-11-12 08:24:12', '$2y$10$6TIe/vuVpnxgYupcreO7EudKt7tIwbnKt4nwUJpugLBgvgoOxCO/y', NULL, '1', '1', '1', NULL, '2002-11-15 00:00:00', 1, NULL, NULL, '0', 'stNZGLIvd8MZN4rI53HYiU5fkv7hZHpJaUYqEVTCntfCT665pw03wg7Uj0RA', '2023-11-13 10:09:57', '2023-12-05 06:09:58', 0, 1),
(19, 'Tesst', 'Tesst', 1, 'tesst', 'tesst', NULL, 'test@gmail.com', NULL, '$2y$10$EKqzUlGO9sO7GyH.2j1FCO0Nq.V9CLAWVLRvRpJlX4SiLSe0DQeR6', NULL, '1', '1', '1', NULL, '2001-11-16 00:00:00', 1, NULL, NULL, '0', NULL, '2023-12-12 10:18:32', '2023-12-12 10:18:32', 0, 1),
(20, 'Test', 'Test', 2, 'test', 'test', NULL, 'tes1t@gmail.com', NULL, '$2y$10$d0HpHrspoEXTktsMiNd0xOIBbV5mMFdZi4gw/lz5zNM33qL5Ig7TW', NULL, '1', '1', '2', NULL, '2001-11-16 00:00:00', 1, NULL, NULL, '0', NULL, '2023-12-12 10:20:45', '2023-12-12 10:20:45', 0, 1),
(21, 'Testag', 'Test1', 2, 'test1', 'test1', NULL, 'test1@gmail.com', NULL, '$2y$10$f24beJRMC1Dl70m/vR/6sO9YQDLs5hVRbB1M19SHDs6CrUCSUo0f2', NULL, '1', '1', '1', NULL, '2001-11-16 00:00:00', 2, NULL, NULL, '0', NULL, '2023-12-12 10:31:07', '2023-12-12 10:31:07', 0, 1),
(22, 'Test', 'Test12', 2, 'test12', 'test12', NULL, 'test12@gmail.com', NULL, '$2y$10$yHndbv3HGioxA617ogYERuuMOnYa/.pw110KWLQYYBxOi5MJ32Yiy', NULL, '1', '1', '2', NULL, '2001-11-16 00:00:00', 2, NULL, NULL, '0', NULL, '2023-12-12 10:32:37', '2023-12-12 10:32:37', 0, 1),
(23, 'Thanh', 'Nv', 1, 'nvthanh', 'nvthanh', NULL, 'thanh@gmail.com', '2023-11-11 06:10:55', '$2y$10$8W103V.nFgkPcM6giwHIHOA7.k1l8q.Ysa/u7fiY.g6/SRbqUyZHm', NULL, '1', '1', '1', NULL, '2001-11-16 00:00:00', 1, '1234567892', NULL, '0', 'C2UbZw7fkuDs7w1EhMyKSZFw9EeHWYU8oadMZxmec4Ykk0S5TXOsKxdUxjbL', '2023-12-12 18:04:09', '2026-04-17 08:12:01', 1, 1),
(24, 'Test', 'Test', 1, 'tes111t', 'tes111t', NULL, 'tes111t@gmail.com', NULL, '$2y$10$NvSbhhHROTMVc4crKBSpW.5pSwbEa/ep6YAsJa9dGHeCnTSDstMV.', NULL, '1', '1', '2', NULL, '2023-12-01 00:00:00', 1, NULL, NULL, '0', NULL, '2023-12-13 05:27:52', '2023-12-13 05:27:52', 0, 1),
(25, 'Test', 'Test', 1, 'testss', 'testss', NULL, 'testssssss@gmail.com', NULL, '$2y$10$FxLzK8doiVvUq5tQKvwbeeT/G90LfKOptMfwQ5KAiEfwdfBJA1ufy', NULL, '1', '1', '2', NULL, '2023-12-05 00:00:00', 1, NULL, NULL, '0', NULL, '2023-12-13 05:29:57', '2023-12-13 05:29:57', 0, 1),
(26, 'Tesss', 'Tesss', 1, 'agagag', 'agagag', NULL, 'tagaga@gmail.com', NULL, '$2y$10$bRo4bgdevtMP5Eec8Jz8sudlgRUlMxqVE34bJCWZS1on3/HhPl0cG', NULL, '1', '1', '1', NULL, '2023-12-06 00:00:00', 14, NULL, NULL, '0', NULL, '2023-12-13 05:31:51', '2023-12-13 05:31:51', 0, 1),
(29, 'Hong', 'Bap', 2, 'adminhong', 'adminhong', 'company', 'sonhong@gmail.com', NULL, '$2y$10$o.0SxJWGcPLbUVR6OWBDdOojTBPCYLO1OSKS.dzHi13cypdr2T.Uu', NULL, '1', '2', '1', NULL, '2023-12-15 00:00:00', 5, '0908507046', NULL, '0', NULL, '2023-12-15 20:33:08', '2023-12-15 20:33:08', 0, 1),
(30, 'Son', 'Hong', 1, 'sonhong', 'sonhong', 'Tuyển dụng', 'sonhong6701@gmail.com', '2023-12-15 23:16:05', '$2y$10$mpstzyooUkpEttB7Z2YarejcUBNxAZWMaW0FEkrpDFOfSGec5zYb.', NULL, '1', '1', '2', NULL, '2001-02-16 00:00:00', 14, '0908507046', 'Master\'s degree', '0', NULL, '2023-12-15 23:13:27', '2023-12-15 23:17:58', 0, 1),
(41, 'Dat', 'Gold', 1, 'datgold', 'datgold', 'hello', 'tranquangdat38hl@gmail.com', '2023-12-16 11:48:33', '$2y$10$8sSvWfEozUkZoBvEuGeyQu0ZLsGjgmaLhgd9rays2j1DhQ/miroWC', NULL, '1', '1', '2', NULL, '1997-06-12 00:00:00', 50, '0823488817', 'Master\'s degree', '0', NULL, '2023-12-16 11:48:11', '2023-12-16 11:48:33', 0, 1),
(42, 'Admin', 'Aa', 1, 'khongnhoten', 'khongnhoten', 'acv', 'lehieu2672@gmail.com', '2026-04-01 06:59:45', '$2y$10$8oS7Wv.UR9MCsXMBZlM3hObr1MzjcvH2LU77QKHvR2bvQ/J8LGCwm', NULL, '1', '3', '14', NULL, '2026-04-07 00:00:00', 11, '1212121212', NULL, '0', '6ApmypnVgy5hFWeg2DS31xuJfS2MN0HcnNZygfqLe3Tn9gKHG0Fgm6iK4mlU', '2026-04-10 23:59:00', '2026-04-19 04:06:51', 0, 1),
(43, 'Minh', 'Le', 2, 'letuan', 'letuan', 'adf', 'letuann267@gmail.com', '2026-04-12 02:23:31', '$2y$10$uk9o/NghxQWr2E4Du6bhS.R6XctaQPwd3JEsUIF7Lo/JguCeLKRXK', NULL, '1', '1', '2', NULL, '2026-04-07 00:00:00', 11, '0911497986', 'Associate degree', '0', 'uRaeD6SX0FGLlvKUfSaoqaBv2glerh2OWhEqZRm6ckDYIZrR9N3B7lZZXdRx', '2026-04-12 02:23:04', '2026-04-12 02:52:02', 1, 1),
(44, 'Acv', 'Sds', 1, 'asd', 'asd', 'sdasdasda', 'a@gmail.com', NULL, '$2y$10$IJSWvbQTb22YmQyHrFxt.utHScKnaREPs0xwIGGCIV3LdfqazdoXq', NULL, '1', '2', '1', NULL, '2022-11-11 00:00:00', 15, '0911497983', 'Bachelor\'s degree', '0', 'qQW6UNr1Tab1M0x98T1aeRkZ3grsZatBAfcxlPTGY9gXklgwQMXR88CnOXvc', '2026-04-13 09:07:51', '2026-04-13 09:07:51', 0, 1),
(45, 'Aaaa', 'Aaaaaa', 1, 'aaaaaaaa', 'aaaaaaaa', 'aaaaaaaaaaaa', 'aaaa@gmail.com', NULL, '$2y$10$/8an3ATEodrgWZXAV33Die6xYMmWdwIGfp3erKMBVBU3Vf94cyvMy', NULL, '1', '2', '1', NULL, '2026-04-14 00:00:00', 13, '0911497983', 'Bachelor\'s degree', '0', NULL, '2026-04-13 09:30:02', '2026-04-13 09:30:02', 0, 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `companies`
--
ALTER TABLE `companies`
  ADD PRIMARY KEY (`id`),
  ADD KEY `companies_name_index` (`name`),
  ADD KEY `companies_industry_index` (`industry`),
  ADD KEY `companies_capacity_index` (`capacity`),
  ADD KEY `companies_address_index` (`address`),
  ADD KEY `companies_tel_index` (`tel`),
  ADD KEY `companies_website_index` (`website`);

--
-- Indexes for table `contacts`
--
ALTER TABLE `contacts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `jobs`
--
ALTER TABLE `jobs`
  ADD PRIMARY KEY (`id`),
  ADD KEY `jobs_user_id_index` (`user_id`);

--
-- Indexes for table `job_request`
--
ALTER TABLE `job_request`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `languages`
--
ALTER TABLE `languages`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `language_user`
--
ALTER TABLE `language_user`
  ADD PRIMARY KEY (`id`),
  ADD KEY `language_user_user_id_index` (`user_id`),
  ADD KEY `language_user_language_id_index` (`language_id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indexes for table `photos`
--
ALTER TABLE `photos`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `priority`
--
ALTER TABLE `priority`
  ADD PRIMARY KEY (`priority_id`),
  ADD KEY `priority_job_id_foreign` (`job_id`);

--
-- Indexes for table `provinces`
--
ALTER TABLE `provinces`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sucessful_users`
--
ALTER TABLE `sucessful_users`
  ADD PRIMARY KEY (`id`),
  ADD KEY `sucessful_users_comment_index` (`comment`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_slug_unique` (`slug`),
  ADD UNIQUE KEY `users_email_unique` (`email`),
  ADD KEY `users_surname_index` (`surname`),
  ADD KEY `users_username_index` (`username`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `companies`
--
ALTER TABLE `companies`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `contacts`
--
ALTER TABLE `contacts`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `jobs`
--
ALTER TABLE `jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=39;

--
-- AUTO_INCREMENT for table `job_request`
--
ALTER TABLE `job_request`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=92;

--
-- AUTO_INCREMENT for table `languages`
--
ALTER TABLE `languages`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `language_user`
--
ALTER TABLE `language_user`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=58;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `photos`
--
ALTER TABLE `photos`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `priority`
--
ALTER TABLE `priority`
  MODIFY `priority_id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `provinces`
--
ALTER TABLE `provinces`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=64;

--
-- AUTO_INCREMENT for table `roles`
--
ALTER TABLE `roles`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `sucessful_users`
--
ALTER TABLE `sucessful_users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=46;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `priority`
--
ALTER TABLE `priority`
  ADD CONSTRAINT `priority_job_id_foreign` FOREIGN KEY (`job_id`) REFERENCES `jobs` (`id`) ON DELETE SET NULL;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
