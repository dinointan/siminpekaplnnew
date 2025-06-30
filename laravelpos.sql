-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 19, 2025 at 02:33 PM
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
-- Database: `laravelpos`
--

-- --------------------------------------------------------

--
-- Table structure for table `absences`
--

CREATE TABLE `absences` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `login_at` time NOT NULL,
  `logout_at` time DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `absences`
--

INSERT INTO `absences` (`id`, `user_id`, `login_at`, `logout_at`, `created_at`, `updated_at`) VALUES
(1, 11, '13:29:00', '13:31:00', '2025-01-19 06:29:25', '2025-01-19 06:31:11'),
(2, 9, '13:31:00', '13:32:00', '2025-01-19 06:31:17', '2025-01-19 06:32:08'),
(3, 11, '13:32:00', NULL, '2025-01-19 06:32:13', '2025-01-19 06:32:13');

-- --------------------------------------------------------

--
-- Table structure for table `cache`
--

CREATE TABLE `cache` (
  `key` varchar(255) NOT NULL,
  `value` mediumtext NOT NULL,
  `expiration` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `cache_locks`
--

CREATE TABLE `cache_locks` (
  `key` varchar(255) NOT NULL,
  `owner` varchar(255) NOT NULL,
  `expiration` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `carts`
--

CREATE TABLE `carts` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `item_id` bigint(20) UNSIGNED NOT NULL,
  `qty` int(11) NOT NULL,
  `subtotal` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `description` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `name`, `description`, `created_at`, `updated_at`) VALUES
(1, 'esse', NULL, '2025-01-19 06:28:46', '2025-01-19 06:28:46'),
(2, 'excepturi', NULL, '2025-01-19 06:28:46', '2025-01-19 06:28:46'),
(3, 'architecto', NULL, '2025-01-19 06:28:46', '2025-01-19 06:28:46'),
(4, 'nobis', NULL, '2025-01-19 06:28:46', '2025-01-19 06:28:46'),
(5, 'molestiae', NULL, '2025-01-19 06:28:46', '2025-01-19 06:28:46'),
(6, 'consequatur', NULL, '2025-01-19 06:28:46', '2025-01-19 06:28:46'),
(7, 'consequuntur', NULL, '2025-01-19 06:28:46', '2025-01-19 06:28:46'),
(8, 'ut', NULL, '2025-01-19 06:28:46', '2025-01-19 06:28:46'),
(9, 'sit', NULL, '2025-01-19 06:28:46', '2025-01-19 06:28:46'),
(10, 'optio', NULL, '2025-01-19 06:28:46', '2025-01-19 06:28:46'),
(11, 'dolores', NULL, '2025-01-19 06:28:46', '2025-01-19 06:28:46'),
(12, 'et', NULL, '2025-01-19 06:28:46', '2025-01-19 06:28:46'),
(13, 'voluptas', NULL, '2025-01-19 06:28:46', '2025-01-19 06:28:46'),
(14, 'eum', NULL, '2025-01-19 06:28:46', '2025-01-19 06:28:46'),
(15, 'magni', NULL, '2025-01-19 06:28:46', '2025-01-19 06:28:46'),
(16, 'voluptatum', NULL, '2025-01-19 06:28:46', '2025-01-19 06:28:46'),
(17, 'eius', NULL, '2025-01-19 06:28:46', '2025-01-19 06:28:46'),
(18, 'iste', NULL, '2025-01-19 06:28:46', '2025-01-19 06:28:46'),
(19, 'aut', NULL, '2025-01-19 06:28:46', '2025-01-19 06:28:46'),
(20, 'veniam', NULL, '2025-01-19 06:28:46', '2025-01-19 06:28:46');

-- --------------------------------------------------------

--
-- Table structure for table `customers`
--

CREATE TABLE `customers` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `phone` varchar(255) NOT NULL,
  `address` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `customers`
--

INSERT INTO `customers` (`id`, `name`, `phone`, `address`, `created_at`, `updated_at`) VALUES
(1, 'Claud Bednar', '+1 (586) 934-6130', NULL, '2025-01-19 06:28:46', '2025-01-19 06:28:46'),
(2, 'Mrs. Marian Lindgren', '+1-651-808-8388', '62742 Crooks Crest\nSouth Winnifred, IN 21490', '2025-01-19 06:28:46', '2025-01-19 06:28:46'),
(3, 'Miss Trisha Champlin', '661-703-3354', NULL, '2025-01-19 06:28:46', '2025-01-19 06:28:46'),
(4, 'Jermaine Hoeger', '+1.985.953.6839', '786 Feil Garden\nBartonstad, NE 30812-6220', '2025-01-19 06:28:46', '2025-01-19 06:28:46'),
(5, 'Toney Lakin', '(520) 604-8738', '654 Stanton Cliff Apt. 819\nHuelsborough, WA 84661', '2025-01-19 06:28:46', '2025-01-19 06:28:46'),
(6, 'Florencio Fahey', '+1.814.734.4981', '5730 Isac Light Suite 759\nLake Tobin, MT 77569', '2025-01-19 06:28:46', '2025-01-19 06:28:46'),
(7, 'Tyra Murray I', '419-692-6180', '68465 Sipes Coves\nNorth Ebonymouth, OH 65115', '2025-01-19 06:28:46', '2025-01-19 06:28:46'),
(8, 'Birdie Doyle', '234.792.2666', NULL, '2025-01-19 06:28:46', '2025-01-19 06:28:46'),
(9, 'Dr. Anjali Goldner', '+1.646.732.3896', NULL, '2025-01-19 06:28:46', '2025-01-19 06:28:46'),
(10, 'Miss Bria Marquardt DVM', '+1.848.982.6155', NULL, '2025-01-19 06:28:46', '2025-01-19 06:28:46'),
(11, 'Dr. Weldon Connelly', '980-876-3012', '85289 Doyle Bridge\nFredyfort, OK 73365', '2025-01-19 06:28:46', '2025-01-19 06:28:46'),
(12, 'Miss Alexane Fahey', '870.427.8921', '77982 Justice Islands Apt. 999\nLorenzatown, DE 77127', '2025-01-19 06:28:46', '2025-01-19 06:28:46'),
(13, 'Hilma Christiansen', '912-692-0234', '46288 D\'Amore Shoals\nCarterview, UT 27259', '2025-01-19 06:28:46', '2025-01-19 06:28:46'),
(14, 'Enola Champlin II', '+1-470-787-7282', NULL, '2025-01-19 06:28:46', '2025-01-19 06:28:46'),
(15, 'Kyla Durgan', '(220) 273-1016', NULL, '2025-01-19 06:28:46', '2025-01-19 06:28:46'),
(16, 'Dr. Alfonzo Hansen', '(678) 958-4153', NULL, '2025-01-19 06:28:46', '2025-01-19 06:28:46'),
(17, 'Christa Casper', '+1-571-764-2670', '78081 Arno Tunnel Apt. 851\nCormierport, AK 15664', '2025-01-19 06:28:46', '2025-01-19 06:28:46'),
(18, 'Kadin Ferry', '706.565.4514', NULL, '2025-01-19 06:28:46', '2025-01-19 06:28:46'),
(19, 'Rory Mayer', '908-234-6650', '59866 Kling Squares Suite 564\nLake Mariahborough, AK 01138-2902', '2025-01-19 06:28:46', '2025-01-19 06:28:46'),
(20, 'Maryse O\'Hara', '(279) 657-3636', '8575 Pollich Path Suite 667\nSouth Billie, WV 40181-5588', '2025-01-19 06:28:46', '2025-01-19 06:28:46'),
(21, 'Loyal Turcotte', '1-956-666-0300', '475 Tamara Forks Suite 253\nJeraldberg, MI 12293-8657', '2025-01-19 06:28:46', '2025-01-19 06:28:46'),
(22, 'Misty Carter I', '352-714-6763', '3510 Ruecker Junctions\nLaneport, MT 46489-3252', '2025-01-19 06:28:46', '2025-01-19 06:28:46'),
(23, 'Ewald Feest', '1-785-492-2316', NULL, '2025-01-19 06:28:46', '2025-01-19 06:28:46'),
(24, 'Dr. Kasandra Hahn II', '+18705059752', NULL, '2025-01-19 06:28:46', '2025-01-19 06:28:46'),
(25, 'Royal Hane', '380.200.2284', NULL, '2025-01-19 06:28:46', '2025-01-19 06:28:46');

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
-- Table structure for table `items`
--

CREATE TABLE `items` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `code` varchar(255) NOT NULL,
  `category_id` bigint(20) UNSIGNED NOT NULL,
  `cost_price` int(11) NOT NULL,
  `selling_price` int(11) NOT NULL,
  `stock` int(11) NOT NULL DEFAULT 0,
  `picture` varchar(255) NOT NULL DEFAULT 'default.png',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `items`
--

INSERT INTO `items` (`id`, `name`, `code`, `category_id`, `cost_price`, `selling_price`, `stock`, `picture`, `created_at`, `updated_at`) VALUES
(1, 'Off--\' \'Nonsense!\' said.', 'REXE2104', 13, 4847, 7317, 63, 'default.png', '2025-01-19 06:28:46', '2025-01-19 06:28:46'),
(2, 'Footman continued in.', 'IFHJ6081', 20, 3842, 9088, 96, 'default.png', '2025-01-19 06:28:46', '2025-01-19 06:28:46'),
(3, 'Hatter: \'as the things.', 'PXFB8034', 9, 5166, 1917, 19, 'default.png', '2025-01-19 06:28:46', '2025-01-19 06:28:46'),
(4, 'Twinkle, twinkle--\"\'.', 'NCDC0248', 2, 5005, 6023, 9, 'default.png', '2025-01-19 06:28:46', '2025-01-19 06:28:46'),
(5, 'Gryphon, and, taking.', 'JZMX2376', 2, 9643, 5754, 89, 'default.png', '2025-01-19 06:28:46', '2025-01-19 06:28:46'),
(6, 'Alice did not come the.', 'TMDA1225', 3, 8480, 6176, 98, 'default.png', '2025-01-19 06:28:46', '2025-01-19 06:28:46'),
(7, 'An enormous puppy was.', 'OTXJ6849', 1, 2351, 8927, 51, 'default.png', '2025-01-19 06:28:46', '2025-01-19 06:28:46'),
(8, 'Who Stole the Tarts?.', 'JKNH6456', 2, 1885, 4881, 1, 'default.png', '2025-01-19 06:28:46', '2025-01-19 06:28:46'),
(9, 'Alice. \'It must have.', 'JXQI6653', 5, 7296, 2106, 71, 'default.png', '2025-01-19 06:28:46', '2025-01-19 06:28:46'),
(10, 'Alice, \'or perhaps they.', 'BXTI2114', 14, 1213, 1593, 49, 'default.png', '2025-01-19 06:28:46', '2025-01-19 06:28:46'),
(11, 'Alice thought decidedly.', 'CUOD8211', 10, 2262, 5954, 52, 'default.png', '2025-01-19 06:28:46', '2025-01-19 06:28:46'),
(12, 'Alice thought she might.', 'LEFE5383', 1, 6120, 9176, 52, 'default.png', '2025-01-19 06:28:46', '2025-01-19 06:28:46'),
(13, 'Father William,\' the.', 'YZWF0811', 8, 5818, 5243, 77, 'default.png', '2025-01-19 06:28:46', '2025-01-19 06:28:46'),
(14, 'Hatter was the Rabbit.', 'OIPL7024', 16, 1707, 8355, 58, 'default.png', '2025-01-19 06:28:46', '2025-01-19 06:28:46'),
(15, 'White Rabbit, \'but it.', 'XIAW4419', 10, 7226, 8065, 86, 'default.png', '2025-01-19 06:28:46', '2025-01-19 06:28:46'),
(16, 'Alice could only see.', 'CHEN5222', 16, 2151, 1104, 46, 'default.png', '2025-01-19 06:28:46', '2025-01-19 06:28:46'),
(17, 'Duchess said to itself.', 'UTXU2197', 1, 2832, 3378, 75, 'default.png', '2025-01-19 06:28:46', '2025-01-19 06:28:46'),
(18, 'Which shall sing?\' \'Oh.', 'GDWY7198', 14, 7356, 1128, 35, 'default.png', '2025-01-19 06:28:46', '2025-01-19 06:28:46'),
(19, 'There was nothing on it.', 'ILCQ5006', 20, 7554, 6386, 16, 'default.png', '2025-01-19 06:28:46', '2025-01-19 06:28:46'),
(20, 'King, \'and don\'t look.', 'AMJN8085', 19, 1943, 5614, 57, 'default.png', '2025-01-19 06:28:46', '2025-01-19 06:28:46'),
(21, 'Alice could only hear.', 'BIYC6097', 19, 2968, 7674, 78, 'default.png', '2025-01-19 06:28:46', '2025-01-19 06:28:46'),
(22, 'She went on for some.', 'JVTJ6619', 15, 1996, 3108, 20, 'default.png', '2025-01-19 06:28:46', '2025-01-19 06:28:46'),
(23, 'Mock Turtle in a deep.', 'ZOIL0834', 14, 2211, 6688, 29, 'default.png', '2025-01-19 06:28:46', '2025-01-19 06:28:46'),
(24, 'I can\'t tell you more.', 'AFQR6417', 9, 6993, 5408, 72, 'default.png', '2025-01-19 06:28:46', '2025-01-19 06:28:46'),
(25, 'Alice\'s, and they went.', 'ISEP3416', 4, 6459, 5627, 10, 'default.png', '2025-01-19 06:28:46', '2025-01-19 06:28:46'),
(26, 'While she was dozing.', 'GBJK9523', 8, 6444, 6544, 99, 'default.png', '2025-01-19 06:28:46', '2025-01-19 06:28:46'),
(27, 'Cat, \'or you wouldn\'t.', 'HPZW9676', 6, 7512, 4084, 16, 'default.png', '2025-01-19 06:28:46', '2025-01-19 06:28:46'),
(28, 'I mentioned before, And.', 'OCKT5266', 18, 8290, 1616, 5, 'default.png', '2025-01-19 06:28:46', '2025-01-19 06:28:46'),
(29, 'There are no mice in.', 'HUAP9355', 17, 4382, 8292, 42, 'default.png', '2025-01-19 06:28:46', '2025-01-19 06:28:46'),
(30, 'Alice. The poor little.', 'ISKD9626', 20, 7411, 5414, 4, 'default.png', '2025-01-19 06:28:46', '2025-01-19 06:28:46'),
(31, 'By this time with one.', 'LCST4782', 13, 5018, 1295, 80, 'default.png', '2025-01-19 06:28:46', '2025-01-19 06:28:46'),
(32, 'Gryphon at the bottom.', 'QYSU6439', 6, 9653, 2463, 33, 'default.png', '2025-01-19 06:28:46', '2025-01-19 06:28:46'),
(33, 'As she said to itself.', 'LNRG8576', 1, 7270, 2741, 39, 'default.png', '2025-01-19 06:28:46', '2025-01-19 06:28:46'),
(34, 'It\'s by far the most.', 'WFDL7118', 10, 1821, 7385, 84, 'default.png', '2025-01-19 06:28:46', '2025-01-19 06:28:46'),
(35, 'King. \'It began with.', 'ZJWW6087', 12, 9929, 6655, 96, 'default.png', '2025-01-19 06:28:46', '2025-01-19 06:28:46'),
(36, 'Alice hastily, afraid.', 'KUFF1039', 14, 1657, 2222, 31, 'default.png', '2025-01-19 06:28:46', '2025-01-19 06:28:46'),
(37, 'They all made of solid.', 'VERX9215', 3, 9961, 8744, 20, 'default.png', '2025-01-19 06:28:46', '2025-01-19 06:28:46'),
(38, 'Alice, \'and why it is I.', 'GZML2115', 14, 8114, 1907, 81, 'default.png', '2025-01-19 06:28:46', '2025-01-19 06:28:46'),
(39, 'Dinah my dear! I shall.', 'BYQH2140', 12, 9590, 3283, 75, 'default.png', '2025-01-19 06:28:46', '2025-01-19 06:28:46'),
(40, 'I say--that\'s the same.', 'UOVJ7818', 16, 3200, 7299, 9, 'default.png', '2025-01-19 06:28:46', '2025-01-19 06:28:46'),
(41, 'Rabbit\'s voice; and the.', 'QSPF6178', 6, 4139, 2875, 44, 'default.png', '2025-01-19 06:28:46', '2025-01-19 06:28:46'),
(42, 'Cat went on, \'if you.', 'DZCO7759', 7, 2710, 7433, 25, 'default.png', '2025-01-19 06:28:46', '2025-01-19 06:28:46'),
(43, 'Gryphon, with a sudden.', 'EHGJ1346', 1, 3620, 1536, 4, 'default.png', '2025-01-19 06:28:46', '2025-01-19 06:28:46'),
(44, 'March Hare. Alice was a.', 'XYIU6392', 4, 5378, 8734, 3, 'default.png', '2025-01-19 06:28:46', '2025-01-19 06:28:46'),
(45, 'But here, to Alice\'s.', 'CREU1919', 14, 4705, 5826, 88, 'default.png', '2025-01-19 06:28:46', '2025-01-19 06:28:46'),
(46, 'Alice for protection.', 'MTZR3558', 14, 3196, 6635, 8, 'default.png', '2025-01-19 06:28:46', '2025-01-19 06:28:46'),
(47, 'The great question is.', 'ZSMV3380', 4, 2446, 9317, 18, 'default.png', '2025-01-19 06:28:46', '2025-01-19 06:28:46'),
(48, 'Off--\' \'Nonsense!\' said.', 'SRTM9952', 6, 2638, 8043, 13, 'default.png', '2025-01-19 06:28:46', '2025-01-19 06:28:46'),
(49, 'Queen in front of them.', 'PBUX1604', 19, 1032, 9030, 63, 'default.png', '2025-01-19 06:28:46', '2025-01-19 06:28:46'),
(50, 'Alice went on muttering.', 'SVUK7559', 13, 3673, 4430, 73, 'default.png', '2025-01-19 06:28:46', '2025-01-19 06:28:46'),
(51, 'Mouse, who was sitting.', 'DPYT3978', 18, 4388, 1531, 79, 'default.png', '2025-01-19 06:28:46', '2025-01-19 06:28:46'),
(52, 'VERY turn-up nose, much.', 'PYKR3999', 8, 8383, 2479, 62, 'default.png', '2025-01-19 06:28:46', '2025-01-19 06:28:46'),
(53, 'The March Hare will be.', 'PTUO3645', 6, 8095, 3202, 71, 'default.png', '2025-01-19 06:28:46', '2025-01-19 06:28:46'),
(54, 'White Rabbit: it was.', 'RYPY2335', 10, 5953, 6384, 36, 'default.png', '2025-01-19 06:28:46', '2025-01-19 06:28:46'),
(55, 'Just then her head down.', 'NOUU2660', 7, 7017, 1628, 75, 'default.png', '2025-01-19 06:28:46', '2025-01-19 06:28:46'),
(56, 'King; and as the jury.', 'IMNB9421', 4, 2449, 9588, 24, 'default.png', '2025-01-19 06:28:46', '2025-01-19 06:28:46'),
(57, 'The Dormouse had closed.', 'EZIM3705', 1, 3991, 3265, 52, 'default.png', '2025-01-19 06:28:46', '2025-01-19 06:28:46'),
(58, 'Alice. \'Come on, then,\'.', 'UOIH0003', 6, 3896, 8457, 56, 'default.png', '2025-01-19 06:28:46', '2025-01-19 06:28:46'),
(59, 'Yet you balanced an eel.', 'CCBM1905', 8, 8276, 6457, 84, 'default.png', '2025-01-19 06:28:46', '2025-01-19 06:28:46'),
(60, 'Hatter said, turning to.', 'VJSY9537', 13, 2083, 7163, 8, 'default.png', '2025-01-19 06:28:46', '2025-01-19 06:28:46'),
(61, 'Mock Turtle; \'but it.', 'QWZA8537', 12, 1879, 6494, 33, 'default.png', '2025-01-19 06:28:46', '2025-01-19 06:28:46'),
(62, 'Alice. \'Who\'s making.', 'ULUZ4703', 3, 9641, 2407, 47, 'default.png', '2025-01-19 06:28:46', '2025-01-19 06:28:46'),
(63, 'I am! But I\'d better.', 'UUXN6207', 4, 3748, 8951, 95, 'default.png', '2025-01-19 06:28:46', '2025-01-19 06:28:46'),
(64, 'WAS a narrow escape!\'.', 'JEBU2745', 17, 6513, 3094, 47, 'default.png', '2025-01-19 06:28:46', '2025-01-19 06:28:46'),
(65, 'Mabel! I\'ll try if I.', 'FPIH5565', 14, 3796, 3017, 57, 'default.png', '2025-01-19 06:28:46', '2025-01-19 06:28:46'),
(66, 'Hatter\'s remark seemed.', 'CPVD3542', 6, 4765, 9639, 41, 'default.png', '2025-01-19 06:28:46', '2025-01-19 06:28:46'),
(67, 'But if I\'m not used to.', 'WCCB0987', 16, 1532, 9291, 86, 'default.png', '2025-01-19 06:28:46', '2025-01-19 06:28:46'),
(68, 'Antipathies, I think--\'.', 'FNNI1733', 9, 8876, 5198, 69, 'default.png', '2025-01-19 06:28:46', '2025-01-19 06:28:46'),
(69, 'As she said to herself.', 'OWDL7857', 6, 4290, 2902, 58, 'default.png', '2025-01-19 06:28:46', '2025-01-19 06:28:46'),
(70, 'Time!\' \'Perhaps not,\'.', 'IKBA8546', 20, 2799, 2381, 39, 'default.png', '2025-01-19 06:28:46', '2025-01-19 06:28:46'),
(71, 'Alice)--\'and perhaps.', 'BEOG9849', 8, 5379, 1748, 75, 'default.png', '2025-01-19 06:28:46', '2025-01-19 06:28:46'),
(72, 'Queen to play croquet.', 'QNNW0101', 16, 2291, 1912, 47, 'default.png', '2025-01-19 06:28:46', '2025-01-19 06:28:46'),
(73, 'Alice: \'I don\'t think.', 'LPXZ3422', 6, 7373, 7161, 57, 'default.png', '2025-01-19 06:28:46', '2025-01-19 06:28:46'),
(74, 'Hatter. Alice felt a.', 'EAXC1935', 12, 3010, 8638, 44, 'default.png', '2025-01-19 06:28:46', '2025-01-19 06:28:46'),
(75, 'Queen! The Queen!\' and.', 'MDZU2524', 20, 3841, 8410, 28, 'default.png', '2025-01-19 06:28:46', '2025-01-19 06:28:46'),
(76, 'Tell her to carry it.', 'OIKQ6019', 6, 1667, 7773, 50, 'default.png', '2025-01-19 06:28:46', '2025-01-19 06:28:46'),
(77, 'Duchess. An invitation.', 'MUXB2050', 20, 1645, 7817, 58, 'default.png', '2025-01-19 06:28:46', '2025-01-19 06:28:46'),
(78, 'King hastily said, and.', 'ZUFI6203', 1, 9923, 9904, 10, 'default.png', '2025-01-19 06:28:46', '2025-01-19 06:28:46'),
(79, 'The judge, by the fire.', 'YDYB6901', 4, 7204, 1186, 2, 'default.png', '2025-01-19 06:28:46', '2025-01-19 06:28:46'),
(80, 'Alice alone with the.', 'WPHV5012', 13, 8677, 9618, 63, 'default.png', '2025-01-19 06:28:46', '2025-01-19 06:28:46'),
(81, 'There was no time she\'d.', 'GIMM4845', 16, 8767, 6508, 73, 'default.png', '2025-01-19 06:28:46', '2025-01-19 06:28:46'),
(82, 'Duck. \'Found IT,\' the.', 'TZWB5170', 13, 1338, 8204, 17, 'default.png', '2025-01-19 06:28:46', '2025-01-19 06:28:46'),
(83, 'The Dormouse shook its.', 'JGCD1956', 6, 9050, 5384, 83, 'default.png', '2025-01-19 06:28:46', '2025-01-19 06:28:46'),
(84, 'Oh, my dear Dinah! I.', 'EOTB9687', 5, 4045, 3076, 29, 'default.png', '2025-01-19 06:28:46', '2025-01-19 06:28:46'),
(85, 'And Alice was silent.', 'OTOX7045', 20, 1623, 3005, 76, 'default.png', '2025-01-19 06:28:46', '2025-01-19 06:28:46'),
(86, 'Alice waited till the.', 'HVLP8834', 1, 6590, 4881, 45, 'default.png', '2025-01-19 06:28:46', '2025-01-19 06:28:46'),
(87, 'Alice had been for some.', 'GUDT5154', 18, 2408, 9350, 22, 'default.png', '2025-01-19 06:28:46', '2025-01-19 06:28:46'),
(88, 'King repeated angrily.', 'KTIV0284', 16, 9906, 3721, 50, 'default.png', '2025-01-19 06:28:46', '2025-01-19 06:28:46'),
(89, 'For some minutes the.', 'WRSE8291', 8, 7961, 6456, 57, 'default.png', '2025-01-19 06:28:46', '2025-01-19 06:28:46'),
(90, 'Gryphon, before Alice.', 'HDBH2567', 6, 6417, 1806, 58, 'default.png', '2025-01-19 06:28:46', '2025-01-19 06:28:46'),
(91, 'Alice remarked. \'Right.', 'ZCUD4127', 8, 8438, 1750, 7, 'default.png', '2025-01-19 06:28:46', '2025-01-19 06:28:46'),
(92, 'Alice, timidly; \'some.', 'VOJN7375', 14, 8404, 8824, 39, 'default.png', '2025-01-19 06:28:46', '2025-01-19 06:28:46'),
(93, 'Queen. \'Never!\' said.', 'MBIR3791', 7, 8665, 9486, 10, 'default.png', '2025-01-19 06:28:46', '2025-01-19 06:28:46'),
(94, 'I\'ll set Dinah at you!\'.', 'PBVS3246', 11, 5145, 8244, 32, 'default.png', '2025-01-19 06:28:46', '2025-01-19 06:28:46'),
(95, 'This time Alice waited.', 'ZOFC3367', 6, 5192, 1079, 30, 'default.png', '2025-01-19 06:28:46', '2025-01-19 06:28:46'),
(96, 'Alice; \'living at the.', 'CSYE2010', 17, 7650, 6055, 24, 'default.png', '2025-01-19 06:28:46', '2025-01-19 06:28:46'),
(97, 'Alice waited a little.', 'ORZK7260', 20, 6976, 7335, 48, 'default.png', '2025-01-19 06:28:46', '2025-01-19 06:28:46'),
(98, 'I don\'t think,\' Alice.', 'MRLL3197', 18, 8909, 4125, 4, 'default.png', '2025-01-19 06:28:46', '2025-01-19 06:28:46'),
(99, 'Wonderland, though she.', 'WLSV7334', 5, 3480, 6360, 39, 'default.png', '2025-01-19 06:28:46', '2025-01-19 06:28:46'),
(100, 'CHAPTER V. Advice from.', 'DKWI5519', 9, 6264, 7506, 18, 'default.png', '2025-01-19 06:28:46', '2025-01-19 06:28:46'),
(101, 'Has lasted the rest of.', 'PWXB6093', 19, 2133, 8455, 92, 'default.png', '2025-01-19 06:28:46', '2025-01-19 06:28:46'),
(102, 'Lizard, who seemed to.', 'CZPK4751', 17, 2054, 7129, 30, 'default.png', '2025-01-19 06:28:46', '2025-01-19 06:28:46'),
(103, 'How puzzling all these.', 'SMJY0626', 9, 2392, 4363, 55, 'default.png', '2025-01-19 06:28:46', '2025-01-19 06:28:46'),
(104, 'First, because I\'m on.', 'RFSZ5090', 2, 3058, 7808, 49, 'default.png', '2025-01-19 06:28:46', '2025-01-19 06:28:46'),
(105, 'Duchess, \'and that\'s a.', 'YXSU2230', 13, 9534, 3018, 24, 'default.png', '2025-01-19 06:28:46', '2025-01-19 06:28:46'),
(106, 'Gryphon, the squeaking.', 'PGSR4300', 16, 3957, 7114, 40, 'default.png', '2025-01-19 06:28:46', '2025-01-19 06:28:46'),
(107, 'Knave \'Turn them over!\'.', 'HQRI1220', 2, 2479, 6860, 31, 'default.png', '2025-01-19 06:28:46', '2025-01-19 06:28:46'),
(108, 'Dormouse said--\' the.', 'OJNQ1770', 16, 4171, 1712, 87, 'default.png', '2025-01-19 06:28:46', '2025-01-19 06:28:46'),
(109, 'Alice for protection.', 'NHTO5564', 12, 9291, 1062, 35, 'default.png', '2025-01-19 06:28:46', '2025-01-19 06:28:46'),
(110, 'Alice, very much what.', 'LRRG0512', 5, 8701, 2892, 3, 'default.png', '2025-01-19 06:28:46', '2025-01-19 06:28:46'),
(111, 'Miss, we\'re doing our.', 'IDAE4304', 6, 7864, 3928, 34, 'default.png', '2025-01-19 06:28:46', '2025-01-19 06:28:46'),
(112, 'By the time when she.', 'ELKI4052', 1, 6253, 1638, 93, 'default.png', '2025-01-19 06:28:46', '2025-01-19 06:28:46'),
(113, 'Lizard\'s slate-pencil.', 'SZRY1012', 11, 8127, 8297, 25, 'default.png', '2025-01-19 06:28:46', '2025-01-19 06:28:46'),
(114, 'Alice. \'Of course not,\'.', 'RLJP4749', 10, 9250, 5009, 95, 'default.png', '2025-01-19 06:28:46', '2025-01-19 06:28:46'),
(115, 'At last the Caterpillar.', 'HGTI6929', 3, 2670, 8661, 14, 'default.png', '2025-01-19 06:28:46', '2025-01-19 06:28:46'),
(116, 'THE LITTLE BUSY BEE,\".', 'CTBN9754', 4, 4952, 3089, 55, 'default.png', '2025-01-19 06:28:46', '2025-01-19 06:28:46'),
(117, 'King repeated angrily.', 'SINI7980', 17, 2708, 3527, 23, 'default.png', '2025-01-19 06:28:46', '2025-01-19 06:28:46'),
(118, 'King repeated angrily.', 'YMQI1704', 17, 8171, 4407, 71, 'default.png', '2025-01-19 06:28:46', '2025-01-19 06:28:46'),
(119, 'Mock Turtle said with.', 'QTFH0231', 3, 4751, 7962, 67, 'default.png', '2025-01-19 06:28:46', '2025-01-19 06:28:46'),
(120, 'Some of the garden: the.', 'UWHF9953', 9, 1900, 9131, 13, 'default.png', '2025-01-19 06:28:46', '2025-01-19 06:28:46'),
(121, 'Mock Turtle said with.', 'EQJO7825', 8, 2511, 4569, 7, 'default.png', '2025-01-19 06:28:46', '2025-01-19 06:28:46'),
(122, 'The Dormouse had closed.', 'TARM7799', 15, 3996, 1571, 43, 'default.png', '2025-01-19 06:28:46', '2025-01-19 06:28:46'),
(123, 'So she set to work very.', 'XWXM7891', 6, 1827, 8706, 33, 'default.png', '2025-01-19 06:28:46', '2025-01-19 06:28:46'),
(124, 'Half-past one, time for.', 'HWXN0748', 11, 9670, 7249, 12, 'default.png', '2025-01-19 06:28:46', '2025-01-19 06:28:46'),
(125, 'Alice was so long that.', 'TWNS5233', 20, 8159, 3380, 57, 'default.png', '2025-01-19 06:28:46', '2025-01-19 06:28:46'),
(126, 'The Dormouse again took.', 'PYDZ0522', 10, 2828, 8757, 5, 'default.png', '2025-01-19 06:28:46', '2025-01-19 06:28:46'),
(127, 'WILL do next! As for.', 'KDRR7828', 9, 8773, 2444, 3, 'default.png', '2025-01-19 06:28:46', '2025-01-19 06:28:46'),
(128, 'King, \'that only makes.', 'SFVC3997', 2, 4217, 2297, 25, 'default.png', '2025-01-19 06:28:46', '2025-01-19 06:28:46'),
(129, 'I will tell you how it.', 'YHJB0491', 17, 2055, 4734, 97, 'default.png', '2025-01-19 06:28:46', '2025-01-19 06:28:46'),
(130, 'Queen, in a Little Bill.', 'YJBA7571', 5, 7567, 9578, 85, 'default.png', '2025-01-19 06:28:46', '2025-01-19 06:28:46'),
(131, 'Some of the shepherd.', 'SHSD1585', 4, 2444, 4714, 8, 'default.png', '2025-01-19 06:28:46', '2025-01-19 06:28:46'),
(132, 'I grow at a king,\' said.', 'MHZR5816', 15, 3351, 9186, 17, 'default.png', '2025-01-19 06:28:46', '2025-01-19 06:28:46'),
(133, 'Mouse, who seemed to.', 'TRTJ8070', 5, 5779, 1233, 82, 'default.png', '2025-01-19 06:28:46', '2025-01-19 06:28:46'),
(134, 'What happened to me!.', 'RZOA4264', 9, 5966, 6391, 81, 'default.png', '2025-01-19 06:28:46', '2025-01-19 06:28:46'),
(135, 'Queen. \'Can you play.', 'BVQA0052', 11, 5831, 7732, 34, 'default.png', '2025-01-19 06:28:46', '2025-01-19 06:28:46'),
(136, 'I? Ah, THAT\'S the great.', 'DZUO8479', 9, 5009, 2508, 77, 'default.png', '2025-01-19 06:28:46', '2025-01-19 06:28:46'),
(137, 'Alice ventured to taste.', 'AZPN4247', 8, 3467, 1639, 70, 'default.png', '2025-01-19 06:28:46', '2025-01-19 06:28:46'),
(138, 'Alice could think of.', 'LMFO7309', 4, 6504, 6216, 3, 'default.png', '2025-01-19 06:28:46', '2025-01-19 06:28:46'),
(139, 'Queen had ordered. They.', 'HYDA0486', 10, 4920, 2216, 59, 'default.png', '2025-01-19 06:28:46', '2025-01-19 06:28:46'),
(140, 'I can\'t get out again.', 'WBOI6356', 2, 7067, 9443, 97, 'default.png', '2025-01-19 06:28:46', '2025-01-19 06:28:46'),
(141, 'Dormouse shall!\' they.', 'SRAS3813', 11, 5563, 9762, 86, 'default.png', '2025-01-19 06:28:46', '2025-01-19 06:28:46'),
(142, 'By this time it all is!.', 'NDWG6182', 1, 2437, 5900, 99, 'default.png', '2025-01-19 06:28:46', '2025-01-19 06:28:46'),
(143, 'I know who I am! But.', 'GSFN5362', 16, 9510, 5508, 8, 'default.png', '2025-01-19 06:28:46', '2025-01-19 06:28:46'),
(144, 'DON\'T know,\' said Alice.', 'FQQD4669', 2, 5942, 4274, 62, 'default.png', '2025-01-19 06:28:46', '2025-01-19 06:28:46'),
(145, 'Come on!\' So they got.', 'RVET4094', 4, 3832, 7655, 7, 'default.png', '2025-01-19 06:28:46', '2025-01-19 06:28:46'),
(146, 'I suppose I ought to.', 'TDNM9530', 16, 3299, 4026, 7, 'default.png', '2025-01-19 06:28:46', '2025-01-19 06:28:46'),
(147, 'HAVE their tails fast.', 'GRBC5721', 15, 7221, 5902, 48, 'default.png', '2025-01-19 06:28:46', '2025-01-19 06:28:46'),
(148, 'I think I should think.', 'DFOA7753', 15, 7916, 9453, 31, 'default.png', '2025-01-19 06:28:46', '2025-01-19 06:28:46'),
(149, 'Queen had ordered. They.', 'IRTY4889', 13, 7034, 9516, 40, 'default.png', '2025-01-19 06:28:46', '2025-01-19 06:28:46'),
(150, 'May it won\'t be raving.', 'VEBZ2824', 17, 7270, 5678, 31, 'default.png', '2025-01-19 06:28:46', '2025-01-19 06:28:46'),
(151, 'CAN all that stuff,\'.', 'JPVN1189', 16, 1766, 6227, 98, 'default.png', '2025-01-19 06:28:46', '2025-01-19 06:28:46'),
(152, 'Queen\'s voice in the.', 'IPAX1633', 2, 7314, 9257, 57, 'default.png', '2025-01-19 06:28:46', '2025-01-19 06:28:46'),
(153, 'Mouse replied rather.', 'OOTR3717', 2, 9442, 2437, 53, 'default.png', '2025-01-19 06:28:46', '2025-01-19 06:28:46'),
(154, 'At last the Caterpillar.', 'ICJD7715', 9, 2769, 7703, 51, 'default.png', '2025-01-19 06:28:46', '2025-01-19 06:28:46'),
(155, 'Alice; \'it\'s laid for a.', 'JYCW0788', 10, 9856, 5338, 34, 'default.png', '2025-01-19 06:28:46', '2025-01-19 06:28:46'),
(156, 'However, she got used.', 'CFRG5884', 20, 7123, 2454, 49, 'default.png', '2025-01-19 06:28:46', '2025-01-19 06:28:46'),
(157, 'Alice began to tremble.', 'EPZP6142', 17, 6025, 2203, 28, 'default.png', '2025-01-19 06:28:46', '2025-01-19 06:28:46'),
(158, 'For the Mouse to tell.', 'MMGZ1438', 8, 2080, 1334, 16, 'default.png', '2025-01-19 06:28:46', '2025-01-19 06:28:46'),
(159, 'Paris, and Paris is the.', 'YJIG6621', 11, 9718, 8926, 6, 'default.png', '2025-01-19 06:28:46', '2025-01-19 06:28:46'),
(160, 'Alice could see, when.', 'GTOZ8283', 1, 8208, 3412, 61, 'default.png', '2025-01-19 06:28:46', '2025-01-19 06:28:46'),
(161, 'Gryphon. Alice did not.', 'LYGV6708', 5, 2683, 1352, 96, 'default.png', '2025-01-19 06:28:46', '2025-01-19 06:28:46'),
(162, 'Alice, (she had kept a.', 'WBMG5137', 12, 1567, 8875, 57, 'default.png', '2025-01-19 06:28:46', '2025-01-19 06:28:46'),
(163, 'King, the Queen, \'and.', 'HMRV4851', 13, 2456, 9211, 55, 'default.png', '2025-01-19 06:28:46', '2025-01-19 06:28:46'),
(164, 'And so it was not much.', 'VDAS3806', 6, 4626, 6139, 57, 'default.png', '2025-01-19 06:28:46', '2025-01-19 06:28:46'),
(165, 'The master was an old.', 'ZWBN0412', 2, 9898, 8446, 75, 'default.png', '2025-01-19 06:28:46', '2025-01-19 06:28:46'),
(166, 'Alice; \'I can\'t explain.', 'AHVS0123', 10, 2702, 7494, 95, 'default.png', '2025-01-19 06:28:46', '2025-01-19 06:28:46'),
(167, 'Alice laughed so much.', 'YUOJ4859', 14, 3708, 3392, 49, 'default.png', '2025-01-19 06:28:46', '2025-01-19 06:28:46'),
(168, 'Mock Turtle said with.', 'YDFE5494', 14, 5284, 7734, 57, 'default.png', '2025-01-19 06:28:46', '2025-01-19 06:28:46'),
(169, 'Alice to herself, in a.', 'FKTI2311', 13, 6370, 5017, 2, 'default.png', '2025-01-19 06:28:46', '2025-01-19 06:28:46'),
(170, 'It\'s enough to try the.', 'KPMD1975', 6, 6067, 1470, 46, 'default.png', '2025-01-19 06:28:46', '2025-01-19 06:28:46'),
(171, 'Caterpillar. \'Not QUITE.', 'VVIN1741', 13, 6553, 1684, 16, 'default.png', '2025-01-19 06:28:46', '2025-01-19 06:28:46'),
(172, 'I had not attended to.', 'EHGX0083', 16, 1564, 1281, 4, 'default.png', '2025-01-19 06:28:46', '2025-01-19 06:28:46'),
(173, 'So she sat still just.', 'JZAM3149', 1, 7024, 2828, 3, 'default.png', '2025-01-19 06:28:46', '2025-01-19 06:28:46'),
(174, 'This time Alice waited.', 'HJCM1713', 9, 1451, 9660, 84, 'default.png', '2025-01-19 06:28:46', '2025-01-19 06:28:46'),
(175, 'Gryphon, before Alice.', 'JAUX9089', 5, 7224, 7518, 78, 'default.png', '2025-01-19 06:28:46', '2025-01-19 06:28:46'),
(176, 'Alice, (she had kept a.', 'VIGW9832', 8, 5025, 8861, 67, 'default.png', '2025-01-19 06:28:46', '2025-01-19 06:28:46'),
(177, 'Duchess: \'and the moral.', 'GXNU0504', 20, 9456, 4896, 61, 'default.png', '2025-01-19 06:28:46', '2025-01-19 06:28:46'),
(178, 'Queen said to herself.', 'EVHQ9842', 17, 7287, 8966, 95, 'default.png', '2025-01-19 06:28:46', '2025-01-19 06:28:46'),
(179, 'CHAPTER V. Advice from.', 'SOMS2955', 2, 4347, 9526, 2, 'default.png', '2025-01-19 06:28:46', '2025-01-19 06:28:46'),
(180, 'Alice herself, and once.', 'CYHY7358', 14, 5848, 9567, 47, 'default.png', '2025-01-19 06:28:46', '2025-01-19 06:28:46'),
(181, 'Tell me that first, and.', 'ZTBY0830', 1, 4387, 6512, 25, 'default.png', '2025-01-19 06:28:46', '2025-01-19 06:28:46'),
(182, 'Mock Turtle sang this.', 'NSUJ8307', 5, 3797, 7984, 5, 'default.png', '2025-01-19 06:28:46', '2025-01-19 06:28:46'),
(183, 'Said his father; \'don\'t.', 'FSMG6349', 19, 6511, 7794, 99, 'default.png', '2025-01-19 06:28:46', '2025-01-19 06:28:46'),
(184, 'Queen\'s hedgehog just.', 'NPBE0759', 18, 9963, 1159, 40, 'default.png', '2025-01-19 06:28:46', '2025-01-19 06:28:46'),
(185, 'QUEEN OF HEARTS. Alice.', 'ZVPE9216', 2, 4587, 8851, 86, 'default.png', '2025-01-19 06:28:46', '2025-01-19 06:28:46'),
(186, 'The baby grunted again.', 'LQMI7392', 10, 2197, 1386, 46, 'default.png', '2025-01-19 06:28:46', '2025-01-19 06:28:46'),
(187, 'However, I\'ve got back.', 'UPGU5252', 10, 5265, 8101, 38, 'default.png', '2025-01-19 06:28:46', '2025-01-19 06:28:46'),
(188, 'Alice. \'And ever since.', 'PCHB1042', 16, 1017, 7099, 57, 'default.png', '2025-01-19 06:28:46', '2025-01-19 06:28:46'),
(189, 'Queen?\' said the Mouse.', 'OPYQ8205', 20, 9976, 3005, 97, 'default.png', '2025-01-19 06:28:46', '2025-01-19 06:28:46'),
(190, 'Queen said to the table.', 'CEIA3382', 7, 4911, 6180, 99, 'default.png', '2025-01-19 06:28:46', '2025-01-19 06:28:46'),
(191, 'Mock Turtle, capering.', 'ZLPU4258', 13, 8843, 2850, 23, 'default.png', '2025-01-19 06:28:46', '2025-01-19 06:28:46'),
(192, 'Prizes!\' Alice had got.', 'ZHRU2366', 11, 5964, 7158, 71, 'default.png', '2025-01-19 06:28:46', '2025-01-19 06:28:46'),
(193, 'Alice, \'shall I NEVER.', 'BCHQ1522', 4, 9247, 7268, 67, 'default.png', '2025-01-19 06:28:46', '2025-01-19 06:28:46'),
(194, 'First, because I\'m on.', 'DKEL1985', 1, 9856, 7481, 50, 'default.png', '2025-01-19 06:28:46', '2025-01-19 06:28:46'),
(195, 'WOULD always get into.', 'OMSO9391', 7, 6160, 3261, 20, 'default.png', '2025-01-19 06:28:46', '2025-01-19 06:28:46'),
(196, 'What would become of.', 'ZLQS8220', 10, 9178, 4909, 6, 'default.png', '2025-01-19 06:28:46', '2025-01-19 06:28:46'),
(197, 'There was exactly one.', 'YIYI7337', 16, 1286, 1935, 91, 'default.png', '2025-01-19 06:28:46', '2025-01-19 06:28:46'),
(198, 'The long grass rustled.', 'HPFU5890', 2, 3063, 1208, 57, 'default.png', '2025-01-19 06:28:46', '2025-01-19 06:28:46'),
(199, 'Do you think, at your.', 'WSUN3737', 20, 9127, 5235, 23, 'default.png', '2025-01-19 06:28:46', '2025-01-19 06:28:46'),
(200, 'Dormouse into the sea.', 'OCVH7095', 6, 2339, 6671, 20, 'default.png', '2025-01-19 06:28:46', '2025-01-19 06:28:46'),
(201, 'But there seemed to be.', 'QGPU8215', 19, 4118, 4432, 80, 'default.png', '2025-01-19 06:28:46', '2025-01-19 06:28:46'),
(202, 'Mock Turtle, and to her.', 'EXNY7987', 16, 7672, 4625, 17, 'default.png', '2025-01-19 06:28:46', '2025-01-19 06:28:46'),
(203, 'Rabbit in a deep voice.', 'DMPF1178', 6, 9210, 2441, 91, 'default.png', '2025-01-19 06:28:46', '2025-01-19 06:28:46'),
(204, 'CHAPTER IX. The Mock.', 'ISYD6025', 6, 2359, 7497, 16, 'default.png', '2025-01-19 06:28:46', '2025-01-19 06:28:46'),
(205, 'I shall see it quite.', 'RMVR7688', 7, 8598, 9634, 75, 'default.png', '2025-01-19 06:28:46', '2025-01-19 06:28:46'),
(206, 'Lobster Quadrille, that.', 'YCFN4551', 8, 4412, 6597, 91, 'default.png', '2025-01-19 06:28:46', '2025-01-19 06:28:46'),
(207, 'Alice began, in rather.', 'CFOT4490', 12, 9373, 9065, 51, 'default.png', '2025-01-19 06:28:46', '2025-01-19 06:28:46'),
(208, 'And beat him when he.', 'YBGW7431', 10, 2722, 3591, 76, 'default.png', '2025-01-19 06:28:46', '2025-01-19 06:28:46'),
(209, 'Dormouse, not choosing.', 'DPEJ8199', 18, 6567, 5116, 42, 'default.png', '2025-01-19 06:28:46', '2025-01-19 06:28:46'),
(210, 'I will just explain to.', 'OYVK0243', 17, 2769, 5843, 21, 'default.png', '2025-01-19 06:28:46', '2025-01-19 06:28:46'),
(211, 'But do cats eat bats, I.', 'DFFE6618', 18, 5376, 1324, 95, 'default.png', '2025-01-19 06:28:46', '2025-01-19 06:28:46'),
(212, 'Bill It was so full of.', 'MATH9949', 8, 3632, 8515, 35, 'default.png', '2025-01-19 06:28:46', '2025-01-19 06:28:46'),
(213, 'He says it kills all.', 'WWFV3276', 2, 3849, 7178, 52, 'default.png', '2025-01-19 06:28:46', '2025-01-19 06:28:46'),
(214, 'Mouse was swimming away.', 'RRDT9352', 18, 4198, 1836, 97, 'default.png', '2025-01-19 06:28:46', '2025-01-19 06:28:46'),
(215, 'BEST butter, you know.\'.', 'AUEI3509', 12, 4495, 5693, 68, 'default.png', '2025-01-19 06:28:46', '2025-01-19 06:28:46'),
(216, 'The Dormouse shook its.', 'JVZD6742', 14, 4692, 6820, 74, 'default.png', '2025-01-19 06:28:46', '2025-01-19 06:28:46'),
(217, 'How puzzling all these.', 'QTDW4363', 11, 4511, 3674, 4, 'default.png', '2025-01-19 06:28:46', '2025-01-19 06:28:46'),
(218, 'MINE.\' The Queen had.', 'DLRD2078', 19, 6161, 9396, 23, 'default.png', '2025-01-19 06:28:46', '2025-01-19 06:28:46'),
(219, 'In a minute or two she.', 'TRRS9466', 2, 9413, 1157, 94, 'default.png', '2025-01-19 06:28:46', '2025-01-19 06:28:46'),
(220, 'Gryphon, before Alice.', 'KUHR6851', 12, 6011, 6610, 100, 'default.png', '2025-01-19 06:28:46', '2025-01-19 06:28:46'),
(221, 'At last the Caterpillar.', 'GVSQ4831', 11, 6493, 7554, 77, 'default.png', '2025-01-19 06:28:46', '2025-01-19 06:28:46'),
(222, 'I\'ll just see what this.', 'ACPX5395', 12, 9374, 6821, 65, 'default.png', '2025-01-19 06:28:46', '2025-01-19 06:28:46'),
(223, 'Duchess said to herself.', 'GURQ9680', 10, 6126, 9847, 66, 'default.png', '2025-01-19 06:28:46', '2025-01-19 06:28:46'),
(224, 'ONE with such sudden.', 'MZAF2005', 10, 5132, 5303, 21, 'default.png', '2025-01-19 06:28:46', '2025-01-19 06:28:46'),
(225, 'Rabbit came up to the.', 'NVWG4932', 12, 5506, 1790, 93, 'default.png', '2025-01-19 06:28:46', '2025-01-19 06:28:46'),
(226, 'Why, I do so like that.', 'VRPN9388', 20, 4645, 4281, 27, 'default.png', '2025-01-19 06:28:46', '2025-01-19 06:28:46'),
(227, 'Majesty!\' the Duchess.', 'XFJY6142', 15, 6088, 3579, 49, 'default.png', '2025-01-19 06:28:46', '2025-01-19 06:28:46'),
(228, 'Do you think you could.', 'FMQK2787', 9, 9872, 2636, 34, 'default.png', '2025-01-19 06:28:46', '2025-01-19 06:28:46'),
(229, 'Alice was beginning to.', 'TDUH0493', 2, 2541, 1091, 63, 'default.png', '2025-01-19 06:28:46', '2025-01-19 06:28:46'),
(230, 'LESS,\' said the Cat, as.', 'TDBK7640', 2, 1937, 2199, 14, 'default.png', '2025-01-19 06:28:46', '2025-01-19 06:28:46'),
(231, 'HIM TWO--\" why, that.', 'RIOL9098', 19, 2557, 7851, 56, 'default.png', '2025-01-19 06:28:46', '2025-01-19 06:28:46'),
(232, 'Cheshire Cat, she was.', 'MYKH9462', 13, 7804, 1561, 53, 'default.png', '2025-01-19 06:28:46', '2025-01-19 06:28:46'),
(233, 'Gryphon in an undertone.', 'ANHZ3251', 20, 4801, 4617, 33, 'default.png', '2025-01-19 06:28:46', '2025-01-19 06:28:46'),
(234, 'Alice had not the right.', 'RROJ4883', 3, 3229, 8559, 69, 'default.png', '2025-01-19 06:28:46', '2025-01-19 06:28:46'),
(235, 'Dormouse\'s place, and.', 'UGSQ6493', 7, 9963, 1389, 7, 'default.png', '2025-01-19 06:28:46', '2025-01-19 06:28:46'),
(236, 'The further off from.', 'PXZF7445', 8, 3381, 7415, 53, 'default.png', '2025-01-19 06:28:46', '2025-01-19 06:28:46'),
(237, 'It was high time you.', 'ZELW1543', 6, 5906, 3240, 8, 'default.png', '2025-01-19 06:28:46', '2025-01-19 06:28:46'),
(238, 'Alice like the three.', 'LJCF7790', 1, 7310, 2930, 60, 'default.png', '2025-01-19 06:28:46', '2025-01-19 06:28:46'),
(239, 'Don\'t let me help to.', 'GIPH0079', 8, 7551, 7936, 24, 'default.png', '2025-01-19 06:28:46', '2025-01-19 06:28:46'),
(240, 'Tell her to carry it.', 'AKRX9367', 5, 5364, 1767, 10, 'default.png', '2025-01-19 06:28:46', '2025-01-19 06:28:46'),
(241, 'She was walking hand in.', 'QUGU1380', 20, 4978, 7676, 70, 'default.png', '2025-01-19 06:28:46', '2025-01-19 06:28:46'),
(242, 'I shall think nothing.', 'JFJN7350', 3, 1344, 4990, 90, 'default.png', '2025-01-19 06:28:46', '2025-01-19 06:28:46'),
(243, 'VERY long claws and a.', 'MXQQ4107', 11, 8092, 7368, 39, 'default.png', '2025-01-19 06:28:46', '2025-01-19 06:28:46'),
(244, 'Never heard of one,\'.', 'DMOE0484', 17, 3621, 1547, 86, 'default.png', '2025-01-19 06:28:46', '2025-01-19 06:28:46'),
(245, 'As soon as look at me.', 'QULD1859', 1, 6729, 4432, 71, 'default.png', '2025-01-19 06:28:46', '2025-01-19 06:28:46'),
(246, 'But she did it so VERY.', 'EEJI8581', 4, 8995, 6031, 74, 'default.png', '2025-01-19 06:28:46', '2025-01-19 06:28:46'),
(247, 'However, she soon made.', 'HDQH6710', 13, 6717, 1531, 48, 'default.png', '2025-01-19 06:28:46', '2025-01-19 06:28:46'),
(248, 'KNOW IT TO BE TRUE--\".', 'RGKC6835', 14, 6177, 2363, 42, 'default.png', '2025-01-19 06:28:46', '2025-01-19 06:28:46'),
(249, 'Alice did not venture.', 'STRB5782', 11, 9822, 8157, 6, 'default.png', '2025-01-19 06:28:46', '2025-01-19 06:28:46'),
(250, 'And so she felt certain.', 'JOMZ3813', 2, 5914, 4589, 34, 'default.png', '2025-01-19 06:28:46', '2025-01-19 06:28:46'),
(251, 'I could show you our.', 'LFXH8933', 1, 3782, 5276, 74, 'default.png', '2025-01-19 06:28:46', '2025-01-19 06:28:46'),
(252, 'Lory, who at last she.', 'BLFS3807', 9, 1895, 8123, 79, 'default.png', '2025-01-19 06:28:46', '2025-01-19 06:28:46'),
(253, 'In the very tones of.', 'YLFK4114', 4, 3728, 8435, 94, 'default.png', '2025-01-19 06:28:46', '2025-01-19 06:28:46'),
(254, 'Duchess; \'I never was.', 'BGQP3967', 1, 6287, 6000, 87, 'default.png', '2025-01-19 06:28:46', '2025-01-19 06:28:46'),
(255, 'This time there were.', 'MZGQ6267', 18, 9295, 5813, 71, 'default.png', '2025-01-19 06:28:46', '2025-01-19 06:28:46'),
(256, 'Alice, in a confused.', 'PFZY4514', 19, 8324, 9717, 53, 'default.png', '2025-01-19 06:28:46', '2025-01-19 06:28:46'),
(257, 'Off with his nose Trims.', 'HBCZ8725', 10, 2163, 4571, 14, 'default.png', '2025-01-19 06:28:46', '2025-01-19 06:28:46'),
(258, 'Alice said to itself.', 'KSXL5771', 8, 6340, 2459, 47, 'default.png', '2025-01-19 06:28:46', '2025-01-19 06:28:46'),
(259, 'VERY long claws and a.', 'OKJD7395', 18, 1516, 3641, 57, 'default.png', '2025-01-19 06:28:46', '2025-01-19 06:28:46'),
(260, 'Trims his belt and his.', 'OAZN1497', 9, 9494, 5615, 76, 'default.png', '2025-01-19 06:28:46', '2025-01-19 06:28:46'),
(261, 'And in she went. Once.', 'AAZU1640', 1, 5397, 2387, 42, 'default.png', '2025-01-19 06:28:46', '2025-01-19 06:28:46'),
(262, 'Mock Turtle, \'but if.', 'QADZ9631', 17, 4797, 7257, 55, 'default.png', '2025-01-19 06:28:46', '2025-01-19 06:28:46'),
(263, 'Alice. \'Come on, then!\'.', 'OUAM3547', 17, 1092, 6126, 71, 'default.png', '2025-01-19 06:28:46', '2025-01-19 06:28:46'),
(264, 'I chose,\' the Duchess.', 'VPXC1318', 12, 6203, 6330, 76, 'default.png', '2025-01-19 06:28:46', '2025-01-19 06:28:46'),
(265, 'Hatter. \'Nor I,\' said.', 'MEZI7172', 9, 1152, 5088, 42, 'default.png', '2025-01-19 06:28:46', '2025-01-19 06:28:46'),
(266, 'I shall have some fun.', 'SACD8059', 20, 8446, 3995, 73, 'default.png', '2025-01-19 06:28:46', '2025-01-19 06:28:46'),
(267, 'Five, in a wondering.', 'XDOC5474', 10, 4009, 9286, 55, 'default.png', '2025-01-19 06:28:46', '2025-01-19 06:28:46'),
(268, 'Alice to herself, as.', 'GGUW2043', 10, 6223, 4962, 17, 'default.png', '2025-01-19 06:28:46', '2025-01-19 06:28:46'),
(269, 'Alice heard it before,\'.', 'IMKX9813', 11, 5973, 7599, 39, 'default.png', '2025-01-19 06:28:46', '2025-01-19 06:28:46'),
(270, 'I breathe\"!\' \'It IS a.', 'XVWR4706', 12, 8638, 1091, 91, 'default.png', '2025-01-19 06:28:46', '2025-01-19 06:28:46'),
(271, 'Alice. \'Come on, then!\'.', 'JELO9367', 17, 3123, 5617, 21, 'default.png', '2025-01-19 06:28:46', '2025-01-19 06:28:46'),
(272, 'I only wish they COULD!.', 'QYHF0737', 13, 5318, 5032, 18, 'default.png', '2025-01-19 06:28:46', '2025-01-19 06:28:46'),
(273, 'Mock Turtle. \'Hold your.', 'MSPE2795', 7, 5940, 5546, 16, 'default.png', '2025-01-19 06:28:46', '2025-01-19 06:28:46'),
(274, 'White Rabbit. She was.', 'IGUM0308', 6, 6280, 2248, 36, 'default.png', '2025-01-19 06:28:46', '2025-01-19 06:28:46'),
(275, 'Time, and round goes.', 'ROIV8360', 18, 2546, 3133, 93, 'default.png', '2025-01-19 06:28:46', '2025-01-19 06:28:46'),
(276, 'THE BOOTS AND SHOES.\'.', 'DQFP1095', 7, 1011, 6522, 18, 'default.png', '2025-01-19 06:28:46', '2025-01-19 06:28:46'),
(277, 'Duchess was sitting on.', 'AXBP8298', 2, 5630, 8980, 73, 'default.png', '2025-01-19 06:28:46', '2025-01-19 06:28:46'),
(278, 'That he met in the same.', 'NIYJ1637', 11, 7613, 9106, 75, 'default.png', '2025-01-19 06:28:46', '2025-01-19 06:28:46'),
(279, 'Seven flung down his.', 'ZEJX1931', 7, 9475, 4987, 69, 'default.png', '2025-01-19 06:28:46', '2025-01-19 06:28:46'),
(280, 'Alice, and sighing. \'It.', 'SQDY4284', 5, 9962, 4333, 4, 'default.png', '2025-01-19 06:28:46', '2025-01-19 06:28:46'),
(281, 'King. \'Shan\'t,\' said.', 'PYSF0365', 10, 7683, 3585, 3, 'default.png', '2025-01-19 06:28:46', '2025-01-19 06:28:46'),
(282, 'THIS witness.\' \'Well.', 'GIBG7144', 9, 5886, 2457, 16, 'default.png', '2025-01-19 06:28:46', '2025-01-19 06:28:46'),
(283, 'Miss, this here ought.', 'FWZL8525', 13, 5849, 8610, 36, 'default.png', '2025-01-19 06:28:46', '2025-01-19 06:28:46'),
(284, 'Alice started to her.', 'NCKG1082', 8, 4209, 7953, 73, 'default.png', '2025-01-19 06:28:46', '2025-01-19 06:28:46'),
(285, 'It was so small as this.', 'RCAB5043', 17, 6374, 3403, 5, 'default.png', '2025-01-19 06:28:46', '2025-01-19 06:28:46'),
(286, 'King. Here one of the.', 'VGMA8706', 6, 6748, 3128, 24, 'default.png', '2025-01-19 06:28:46', '2025-01-19 06:28:46'),
(287, 'I\'ve finished.\' So they.', 'USTY6294', 2, 8710, 5478, 12, 'default.png', '2025-01-19 06:28:46', '2025-01-19 06:28:46'),
(288, 'Mock Turtle. \'Certainly.', 'BVLF3686', 3, 4142, 2792, 95, 'default.png', '2025-01-19 06:28:46', '2025-01-19 06:28:46'),
(289, 'Then it got down off.', 'FFWK5416', 7, 1922, 1158, 80, 'default.png', '2025-01-19 06:28:46', '2025-01-19 06:28:46'),
(290, 'THE SLUGGARD,\"\' said.', 'FQQM3791', 4, 1209, 4039, 1, 'default.png', '2025-01-19 06:28:46', '2025-01-19 06:28:46'),
(291, 'The players all played.', 'TBBI4104', 3, 3785, 9050, 85, 'default.png', '2025-01-19 06:28:46', '2025-01-19 06:28:46'),
(292, 'Queen merely remarking.', 'NLZK6888', 11, 9245, 9996, 94, 'default.png', '2025-01-19 06:28:46', '2025-01-19 06:28:46'),
(293, 'White Rabbit cried out.', 'BNBI0594', 13, 4396, 2268, 60, 'default.png', '2025-01-19 06:28:46', '2025-01-19 06:28:46'),
(294, 'Do cats eat bats? Do.', 'ZVFH8994', 5, 9081, 7285, 93, 'default.png', '2025-01-19 06:28:46', '2025-01-19 06:28:46'),
(295, 'I almost wish I hadn\'t.', 'RKEL4213', 4, 8379, 9915, 53, 'default.png', '2025-01-19 06:28:46', '2025-01-19 06:28:46'),
(296, 'And yet you incessantly.', 'LFPM3527', 15, 7138, 8189, 36, 'default.png', '2025-01-19 06:28:46', '2025-01-19 06:28:46'),
(297, 'WOULD put their heads.', 'FPKW8448', 9, 2331, 2110, 78, 'default.png', '2025-01-19 06:28:46', '2025-01-19 06:28:46'),
(298, 'Dormouse crossed the.', 'KFSJ4621', 6, 3874, 3283, 62, 'default.png', '2025-01-19 06:28:46', '2025-01-19 06:28:46'),
(299, 'I get it home?\' when it.', 'AFRX2938', 12, 3394, 6618, 14, 'default.png', '2025-01-19 06:28:46', '2025-01-19 06:28:46'),
(300, 'Alice knew it was out.', 'TAWC5820', 18, 9735, 7864, 68, 'default.png', '2025-01-19 06:28:46', '2025-01-19 06:28:46'),
(301, 'Beras', '0001', 1, 85000, 120000, 100, 'default.png', '2025-01-19 06:28:46', '2025-01-19 06:28:46');

-- --------------------------------------------------------

--
-- Table structure for table `item_supplier`
--

CREATE TABLE `item_supplier` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `item_id` bigint(20) UNSIGNED NOT NULL,
  `supplier_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `jobs`
--

CREATE TABLE `jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `queue` varchar(255) NOT NULL,
  `payload` longtext NOT NULL,
  `attempts` tinyint(3) UNSIGNED NOT NULL,
  `reserved_at` int(10) UNSIGNED DEFAULT NULL,
  `available_at` int(10) UNSIGNED NOT NULL,
  `created_at` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `job_batches`
--

CREATE TABLE `job_batches` (
  `id` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `total_jobs` int(11) NOT NULL,
  `pending_jobs` int(11) NOT NULL,
  `failed_jobs` int(11) NOT NULL,
  `failed_job_ids` longtext NOT NULL,
  `options` mediumtext DEFAULT NULL,
  `cancelled_at` int(11) DEFAULT NULL,
  `created_at` int(11) NOT NULL,
  `finished_at` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

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
(1, '0001_01_01_000000_create_users_table', 1),
(2, '0001_01_01_000001_create_cache_table', 1),
(3, '0001_01_01_000002_create_jobs_table', 1),
(4, '2024_05_21_174125_create_categories_table', 1),
(5, '2024_05_21_174227_create_customers_table', 1),
(6, '2024_05_21_174511_create_payment_methods_table', 1),
(7, '2024_05_21_175122_create_item_supplier_table', 1),
(8, '2024_05_21_175123_create_wholesale_prices_table', 1),
(9, '2024_05_21_182615_create_carts_table', 1),
(10, '2024_05_22_030109_create_transactions_table', 1),
(11, '2024_05_22_030902_create_transaction_details_table', 1),
(12, '2024_05_27_072011_create_absences_table', 1);

-- --------------------------------------------------------

--
-- Table structure for table `payment_methods`
--

CREATE TABLE `payment_methods` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL DEFAULT 'Tunai',
  `description` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `payment_methods`
--

INSERT INTO `payment_methods` (`id`, `name`, `description`, `created_at`, `updated_at`) VALUES
(1, 'Tunai', NULL, '2025-01-19 06:28:45', '2025-01-19 06:28:45'),
(2, 'Debit', NULL, '2025-01-19 06:28:45', '2025-01-19 06:28:45'),
(3, 'Kredit', NULL, '2025-01-19 06:28:45', '2025-01-19 06:28:45'),
(4, 'Transfer', NULL, '2025-01-19 06:28:45', '2025-01-19 06:28:45'),
(5, 'OVO', NULL, '2025-01-19 06:28:45', '2025-01-19 06:28:45'),
(6, 'GoPay', NULL, '2025-01-19 06:28:45', '2025-01-19 06:28:45'),
(7, 'Dana', NULL, '2025-01-19 06:28:45', '2025-01-19 06:28:45'),
(8, 'QRIS', NULL, '2025-01-19 06:28:45', '2025-01-19 06:28:45');

-- --------------------------------------------------------

--
-- Table structure for table `sessions`
--

CREATE TABLE `sessions` (
  `id` varchar(255) NOT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `ip_address` varchar(45) DEFAULT NULL,
  `user_agent` text DEFAULT NULL,
  `payload` longtext NOT NULL,
  `last_activity` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `sessions`
--

INSERT INTO `sessions` (`id`, `user_id`, `ip_address`, `user_agent`, `payload`, `last_activity`) VALUES
('tdOPXhWoUZBCqRptgEb7NiwVI5v2eRfh3P23jGec', 11, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/131.0.0.0 Safari/537.36', 'YTo1OntzOjY6Il90b2tlbiI7czo0MDoiUkE4QnJtcE9QVVpFTWNrYUlTMm5sZzhQeDdsRzZ1QVFQbmpZNjBadCI7czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319czozOiJ1cmwiO2E6MDp7fXM6OToiX3ByZXZpb3VzIjthOjE6e3M6MzoidXJsIjtzOjQwOiJodHRwOi8vMTI3LjAuMC4xOjgwMDAvcmVwb3J0L3RyYW5zYWN0aW9uIjt9czo1MDoibG9naW5fd2ViXzU5YmEzNmFkZGMyYjJmOTQwMTU4MGYwMTRjN2Y1OGVhNGUzMDk4OWQiO2k6MTE7fQ==', 1737293574);

-- --------------------------------------------------------

--
-- Table structure for table `suppliers`
--

CREATE TABLE `suppliers` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `phone` varchar(255) NOT NULL,
  `address` varchar(255) NOT NULL,
  `email` varchar(255) DEFAULT NULL,
  `description` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `suppliers`
--

INSERT INTO `suppliers` (`id`, `name`, `phone`, `address`, `email`, `description`, `created_at`, `updated_at`) VALUES
(1, 'Schumm-Schumm', '1-531-624-4475', '415 Braun Causeway\nRobertsfurt, WY 47867-1936', 'drew.white@example.net', 'Esse doloremque delectus quaerat voluptatem dicta harum sint.', '2025-01-19 06:28:46', '2025-01-19 06:28:46'),
(2, 'Gottlieb-Wunsch', '234.329.1802', '4665 Gutkowski Place\nNew Elouiseland, WV 76625-2374', 'stacey48@example.net', 'Soluta et temporibus nemo dolore corrupti nihil.', '2025-01-19 06:28:46', '2025-01-19 06:28:46'),
(3, 'Thompson, Nicolas and Yost', '1-304-315-4407', '2009 Ramon Port Apt. 583\nVirgieport, IL 69634-9016', 'thompson.percy@example.org', 'Corporis et minima id ratione quis excepturi sit.', '2025-01-19 06:28:46', '2025-01-19 06:28:46'),
(4, 'Hagenes Ltd', '906.701.7466', '3873 Gusikowski Brook\nHammesshire, KY 18916', 'furman.abshire@example.net', 'Eum qui beatae illum voluptatem voluptatem.', '2025-01-19 06:28:46', '2025-01-19 06:28:46'),
(5, 'Stanton-Labadie', '+13607328219', '93590 Dessie Valley\nEast Zechariah, NE 48982', 'leonardo.jacobs@example.net', 'Vero aut possimus adipisci esse ratione.', '2025-01-19 06:28:46', '2025-01-19 06:28:46'),
(6, 'Schimmel, Ebert and Rohan', '+14436522920', '5422 Lenora Village\nAliyaborough, NM 49391-9777', 'qjohns@example.org', 'Inventore qui voluptatem et mollitia occaecati.', '2025-01-19 06:28:46', '2025-01-19 06:28:46'),
(7, 'King-Wiegand', '661.694.2214', '995 Nikki Fields\nEast Gunnar, DC 95192-7754', 'clark.corkery@example.com', 'A sint ut hic sint ipsum explicabo.', '2025-01-19 06:28:46', '2025-01-19 06:28:46'),
(8, 'Hettinger LLC', '+13394934176', '71508 Bosco Mews Apt. 583\nWest Keshawnton, ND 53594', 'chill@example.net', 'Deleniti illum eos blanditiis quam impedit quas.', '2025-01-19 06:28:46', '2025-01-19 06:28:46'),
(9, 'Kirlin, Dooley and Walker', '469.799.9413', '296 Clark Burgs Suite 167\nClarissafurt, RI 81856', 'russell.nikolaus@example.com', 'Explicabo labore ut aut quo debitis placeat et.', '2025-01-19 06:28:46', '2025-01-19 06:28:46'),
(10, 'Block Group', '(678) 688-9805', '65798 White Green\nLake Weldonberg, CO 00106', 'julian61@example.org', 'Ducimus perferendis modi laudantium eos assumenda.', '2025-01-19 06:28:46', '2025-01-19 06:28:46'),
(11, 'McDermott Ltd', '380.430.2828', '49478 Kennedy Groves\nJaquelinville, SD 87344-7141', 'smurphy@example.net', 'Ducimus cupiditate suscipit cupiditate dolores.', '2025-01-19 06:28:46', '2025-01-19 06:28:46'),
(12, 'Kris and Sons', '678.238.0843', '290 Aurelia Plains Apt. 598\nKirlinport, AL 65339-1503', 'lexi.jerde@example.net', 'Omnis inventore aut maxime alias ullam ea.', '2025-01-19 06:28:46', '2025-01-19 06:28:46'),
(13, 'Lesch PLC', '+1 (504) 508-2711', '4914 Robel Pass\nDouglasfurt, FL 27399-1504', 'trowe@example.net', 'Odit dolorem omnis non voluptates.', '2025-01-19 06:28:46', '2025-01-19 06:28:46'),
(14, 'Grady LLC', '1-279-276-7808', '4204 Purdy Knoll Suite 291\nDannieport, NV 75068', 'cullen.tremblay@example.com', 'Sed ut fugiat debitis odit ut nihil.', '2025-01-19 06:28:46', '2025-01-19 06:28:46'),
(15, 'Ebert and Sons', '+1-832-521-9941', '59495 Everardo Fall Suite 007\nDavinview, OK 11664', 'anne.nienow@example.com', 'Eos suscipit velit voluptas.', '2025-01-19 06:28:46', '2025-01-19 06:28:46'),
(16, 'Jacobson, Schulist and Cole', '1-757-691-2979', '287 Reynolds Island\nWest Oniefurt, ID 49657', 'jast.rachel@example.net', 'Nisi voluptas nihil amet ex.', '2025-01-19 06:28:46', '2025-01-19 06:28:46'),
(17, 'Moen PLC', '1-520-959-1426', '678 Esmeralda Point Suite 885\nMarquardthaven, NE 53298', 'zmoen@example.org', 'Consectetur quas explicabo odit possimus vel dolorum.', '2025-01-19 06:28:46', '2025-01-19 06:28:46'),
(18, 'Schaefer, Cremin and Kulas', '603.852.6512', '80789 Alberto Summit\nEast Hester, MS 44638', 'angelica.legros@example.org', 'Alias corporis excepturi et aut ut quisquam tenetur.', '2025-01-19 06:28:46', '2025-01-19 06:28:46'),
(19, 'Barton, Vandervort and Schaden', '561-847-6701', '9741 Minnie Rue Suite 763\nNorth Melissa, MN 86816-9221', 'tromp.presley@example.org', 'Ut quod labore perspiciatis.', '2025-01-19 06:28:46', '2025-01-19 06:28:46'),
(20, 'Ondricka-Walsh', '+1 (843) 963-4479', '295 Kessler Views\nSkilesmouth, LA 50684-8444', 'qpollich@example.net', 'Voluptates qui omnis illum maiores.', '2025-01-19 06:28:46', '2025-01-19 06:28:46'),
(21, 'Kuhic, Schinner and Kuhlman', '754.201.3049', '1662 Terry Flats Suite 513\nNew Cooperfurt, KY 69853', 'wlubowitz@example.org', 'Sit nostrum libero similique.', '2025-01-19 06:28:46', '2025-01-19 06:28:46'),
(22, 'Green Group', '+1-478-770-5403', '516 Skye Plaza\nPort Leopoldoview, MT 85180-9919', 'ulises99@example.com', 'Vel minus est veniam voluptas excepturi illo.', '2025-01-19 06:28:46', '2025-01-19 06:28:46'),
(23, 'Robel, Tremblay and Gibson', '+1.316.259.3193', '191 Alessia Square\nBorisfort, MT 79348', 'ydouglas@example.com', 'Et quaerat vero iusto delectus aut et libero.', '2025-01-19 06:28:46', '2025-01-19 06:28:46'),
(24, 'Hauck, Daugherty and Quigley', '508.762.7083', '14015 Jerde Locks Suite 398\nEichmannbury, WI 66489-9280', 'grayce47@example.com', 'Consectetur pariatur vel sit.', '2025-01-19 06:28:46', '2025-01-19 06:28:46'),
(25, 'Ernser, Bernhard and Hyatt', '828-998-0050', '697 Antonia Stravenue\nWest Erickmouth, PA 07386', 'mason48@example.com', 'Et consequatur nemo quam odit in velit.', '2025-01-19 06:28:46', '2025-01-19 06:28:46');

-- --------------------------------------------------------

--
-- Table structure for table `transactions`
--

CREATE TABLE `transactions` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `customer_id` bigint(20) UNSIGNED DEFAULT NULL,
  `invoice` varchar(255) NOT NULL,
  `invoice_no` varchar(255) NOT NULL,
  `total` int(11) NOT NULL,
  `discount` int(11) NOT NULL DEFAULT 0,
  `payment_method_id` bigint(20) UNSIGNED DEFAULT NULL,
  `amount` int(11) DEFAULT NULL,
  `change` int(11) NOT NULL DEFAULT 0,
  `status` enum('paid','debt') NOT NULL DEFAULT 'paid',
  `note` text DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `transaction_details`
--

CREATE TABLE `transaction_details` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `transaction_id` bigint(20) UNSIGNED NOT NULL,
  `item_id` bigint(20) UNSIGNED NOT NULL,
  `qty` int(11) NOT NULL,
  `item_price` int(11) NOT NULL,
  `total` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `username` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `phone` varchar(255) NOT NULL,
  `role` varchar(255) NOT NULL DEFAULT 'cashier',
  `position` varchar(255) DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `picture` varchar(2048) NOT NULL DEFAULT 'profile.jpg',
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `username`, `email`, `phone`, `role`, `position`, `password`, `picture`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Marvin Gulgowski', 'schuster.major', 'edgar72@example.net', '+19187402631', 'admin', NULL, '$2y$12$f84o3Lb86HQuD7eXS7zVGOcm3q4O9WJ5el2.CREKDvHFBnfDHvFg.', 'profile.jpg', 'OWgLEk0PfU', '2025-01-19 06:28:45', '2025-01-19 06:28:45'),
(2, 'Ms. Jaida Maggio DVM', 'ajenkins', 'nicole64@example.org', '786-838-1642', 'admin', 'Pest Control Worker', '$2y$12$f84o3Lb86HQuD7eXS7zVGOcm3q4O9WJ5el2.CREKDvHFBnfDHvFg.', 'profile.jpg', 'mfE1QmG7fC', '2025-01-19 06:28:45', '2025-01-19 06:28:45'),
(3, 'Kayden Jenkins', 'kaleb10', 'stone.murphy@example.com', '(248) 457-4069', 'cashier', 'Video Editor', '$2y$12$f84o3Lb86HQuD7eXS7zVGOcm3q4O9WJ5el2.CREKDvHFBnfDHvFg.', 'profile.jpg', 'SGdKSIsQF1', '2025-01-19 06:28:45', '2025-01-19 06:28:45'),
(4, 'Kellie Renner', 'zfarrell', 'odie02@example.com', '+15317101574', 'supervisor', NULL, '$2y$12$f84o3Lb86HQuD7eXS7zVGOcm3q4O9WJ5el2.CREKDvHFBnfDHvFg.', 'profile.jpg', '7ckNxE4EKb', '2025-01-19 06:28:45', '2025-01-19 06:28:45'),
(5, 'Augusta Mante', 'rodriguez.ruth', 'cynthia.hermiston@example.com', '1-334-650-0977', 'supervisor', NULL, '$2y$12$f84o3Lb86HQuD7eXS7zVGOcm3q4O9WJ5el2.CREKDvHFBnfDHvFg.', 'profile.jpg', 'lOyHj1R74X', '2025-01-19 06:28:45', '2025-01-19 06:28:45'),
(6, 'Dr. Tanner Crist DVM', 'isobel.mraz', 'ellen.dietrich@example.org', '+1 (757) 258-6607', 'admin', 'Central Office Operator', '$2y$12$f84o3Lb86HQuD7eXS7zVGOcm3q4O9WJ5el2.CREKDvHFBnfDHvFg.', 'profile.jpg', '2eY27EBrb6', '2025-01-19 06:28:45', '2025-01-19 06:28:45'),
(7, 'Prof. Duane Stamm Sr.', 'fschoen', 'woodrow.crona@example.org', '361.693.9017', 'cashier', 'Archivist', '$2y$12$f84o3Lb86HQuD7eXS7zVGOcm3q4O9WJ5el2.CREKDvHFBnfDHvFg.', 'profile.jpg', '17NitBDzml', '2025-01-19 06:28:45', '2025-01-19 06:28:45'),
(8, 'Guillermo Crooks Sr.', 'vyundt', 'velma.dach@example.com', '(364) 285-8202', 'cashier', 'Petroleum Engineer', '$2y$12$f84o3Lb86HQuD7eXS7zVGOcm3q4O9WJ5el2.CREKDvHFBnfDHvFg.', 'profile.jpg', 'J5KAUQbvUx', '2025-01-19 06:28:45', '2025-01-19 06:28:45'),
(9, 'daryl Ledner', 'kasir', 'llewellyn77@example.net', '+14149651424', 'cashier', 'Woodworking Machine Setter', '$2y$12$KdAg39EWCR325qzXe9XbYeKBwtz9YBSKfqc7KrpJNdKUtjDiuYEte', 'profile.jpg', 'NT6LGX2c83cDDGK9QwTtOjaCEJwFV9f9HvrnW2PODaykl0wjv0zoTgcEAnim', '2025-01-19 06:28:45', '2025-01-19 06:31:04'),
(10, 'Miss Lizzie Kerluke Sr.', 'raynor.raymond', 'effertz.colby@example.org', '507.536.2528', 'admin', 'Kindergarten Teacher', '$2y$12$f84o3Lb86HQuD7eXS7zVGOcm3q4O9WJ5el2.CREKDvHFBnfDHvFg.', 'profile.jpg', 'cMWlF4ZhaX', '2025-01-19 06:28:45', '2025-01-19 06:28:45'),
(11, 'Admin', 'admin', 'dbauch@example.org', '(440) 392-0370', 'owner', 'Occupational Health Safety Specialist', '$2y$12$H3VttTnGR7c82snMTjSCbeQLVISM8H5TesiMJ8/MV9wtTiUqfpNL2', 'profile.jpg', 'OAZzY5oXP33r5W1Lknzzr9fs43HEvOYe2UIiErJdfHGei7GsK3nckGEdwBdS', '2025-01-19 06:28:45', '2025-01-19 06:28:45');

-- --------------------------------------------------------

--
-- Table structure for table `wholesale_prices`
--

CREATE TABLE `wholesale_prices` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `item_id` bigint(20) UNSIGNED NOT NULL,
  `min_qty` int(11) NOT NULL,
  `price` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `wholesale_prices`
--

INSERT INTO `wholesale_prices` (`id`, `item_id`, `min_qty`, `price`, `created_at`, `updated_at`) VALUES
(1, 301, 10, 100000, '2025-01-19 06:28:46', '2025-01-19 06:28:46'),
(2, 301, 15, 95000, '2025-01-19 06:28:46', '2025-01-19 06:28:46'),
(3, 301, 20, 90000, '2025-01-19 06:28:46', '2025-01-19 06:28:46');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `absences`
--
ALTER TABLE `absences`
  ADD PRIMARY KEY (`id`),
  ADD KEY `absences_user_id_foreign` (`user_id`);

--
-- Indexes for table `cache`
--
ALTER TABLE `cache`
  ADD PRIMARY KEY (`key`);

--
-- Indexes for table `cache_locks`
--
ALTER TABLE `cache_locks`
  ADD PRIMARY KEY (`key`);

--
-- Indexes for table `carts`
--
ALTER TABLE `carts`
  ADD PRIMARY KEY (`id`),
  ADD KEY `carts_user_id_foreign` (`user_id`),
  ADD KEY `carts_item_id_foreign` (`item_id`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `categories_name_unique` (`name`);

--
-- Indexes for table `customers`
--
ALTER TABLE `customers`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `items`
--
ALTER TABLE `items`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `items_code_unique` (`code`),
  ADD KEY `items_category_id_foreign` (`category_id`);

--
-- Indexes for table `item_supplier`
--
ALTER TABLE `item_supplier`
  ADD PRIMARY KEY (`id`),
  ADD KEY `item_supplier_item_id_foreign` (`item_id`),
  ADD KEY `item_supplier_supplier_id_foreign` (`supplier_id`);

--
-- Indexes for table `jobs`
--
ALTER TABLE `jobs`
  ADD PRIMARY KEY (`id`),
  ADD KEY `jobs_queue_index` (`queue`);

--
-- Indexes for table `job_batches`
--
ALTER TABLE `job_batches`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `payment_methods`
--
ALTER TABLE `payment_methods`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sessions`
--
ALTER TABLE `sessions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `sessions_user_id_index` (`user_id`),
  ADD KEY `sessions_last_activity_index` (`last_activity`);

--
-- Indexes for table `suppliers`
--
ALTER TABLE `suppliers`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `transactions`
--
ALTER TABLE `transactions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `transactions_user_id_foreign` (`user_id`),
  ADD KEY `transactions_customer_id_foreign` (`customer_id`),
  ADD KEY `transactions_payment_method_id_foreign` (`payment_method_id`);

--
-- Indexes for table `transaction_details`
--
ALTER TABLE `transaction_details`
  ADD PRIMARY KEY (`id`),
  ADD KEY `transaction_details_transaction_id_foreign` (`transaction_id`),
  ADD KEY `transaction_details_item_id_foreign` (`item_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_username_unique` (`username`),
  ADD UNIQUE KEY `users_email_unique` (`email`),
  ADD UNIQUE KEY `users_phone_unique` (`phone`);

--
-- Indexes for table `wholesale_prices`
--
ALTER TABLE `wholesale_prices`
  ADD PRIMARY KEY (`id`),
  ADD KEY `wholesale_prices_item_id_foreign` (`item_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `absences`
--
ALTER TABLE `absences`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `carts`
--
ALTER TABLE `carts`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `customers`
--
ALTER TABLE `customers`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `items`
--
ALTER TABLE `items`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=302;

--
-- AUTO_INCREMENT for table `item_supplier`
--
ALTER TABLE `item_supplier`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `jobs`
--
ALTER TABLE `jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `payment_methods`
--
ALTER TABLE `payment_methods`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `suppliers`
--
ALTER TABLE `suppliers`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT for table `transactions`
--
ALTER TABLE `transactions`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `transaction_details`
--
ALTER TABLE `transaction_details`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `wholesale_prices`
--
ALTER TABLE `wholesale_prices`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `absences`
--
ALTER TABLE `absences`
  ADD CONSTRAINT `absences_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `carts`
--
ALTER TABLE `carts`
  ADD CONSTRAINT `carts_item_id_foreign` FOREIGN KEY (`item_id`) REFERENCES `items` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `carts_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `items`
--
ALTER TABLE `items`
  ADD CONSTRAINT `items_category_id_foreign` FOREIGN KEY (`category_id`) REFERENCES `categories` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `item_supplier`
--
ALTER TABLE `item_supplier`
  ADD CONSTRAINT `item_supplier_item_id_foreign` FOREIGN KEY (`item_id`) REFERENCES `items` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `item_supplier_supplier_id_foreign` FOREIGN KEY (`supplier_id`) REFERENCES `suppliers` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `transactions`
--
ALTER TABLE `transactions`
  ADD CONSTRAINT `transactions_customer_id_foreign` FOREIGN KEY (`customer_id`) REFERENCES `customers` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `transactions_payment_method_id_foreign` FOREIGN KEY (`payment_method_id`) REFERENCES `payment_methods` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `transactions_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `transaction_details`
--
ALTER TABLE `transaction_details`
  ADD CONSTRAINT `transaction_details_item_id_foreign` FOREIGN KEY (`item_id`) REFERENCES `items` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `transaction_details_transaction_id_foreign` FOREIGN KEY (`transaction_id`) REFERENCES `transactions` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `wholesale_prices`
--
ALTER TABLE `wholesale_prices`
  ADD CONSTRAINT `wholesale_prices_item_id_foreign` FOREIGN KEY (`item_id`) REFERENCES `items` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
