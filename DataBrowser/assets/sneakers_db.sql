-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 05, 2024 at 02:26 AM
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
-- Database: `sneakers_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `sneakers`
--

CREATE TABLE `sneakers` (
  `id` int(11) NOT NULL,
  `make` varchar(100) NOT NULL,
  `model` varchar(100) NOT NULL,
  `colorway` varchar(100) NOT NULL,
  `price` float NOT NULL,
  `new_release` tinyint(1) NOT NULL,
  `picture` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `sneakers`
--

INSERT INTO `sneakers` (`id`, `make`, `model`, `colorway`, `price`, `new_release`, `picture`) VALUES
(1, 'Nike', 'Air Jordan 4 Retro', 'MX Granite', 230, 1, 'https://image.goat.com/transform/v1/attachments/product_template_pictures/images/105/217/381/original/1373134_00.png.png?action=crop&width=300'),
(2, 'Nike', 'Wmns Air Jordan 11 Retro', 'Bred Velvet', 246, 1, 'https://image.goat.com/transform/v1/attachments/product_template_pictures/images/105/392/726/original/1395042_00.png.png?action=crop&width=300'),
(3, 'Nike', 'Dunk High Retro Premium', 'Wu-Tan', 195, 1, 'https://image.goat.com/transform/v1/attachments/product_template_pictures/images/105/391/533/original/1445010_00.png.png?action=crop&width=300'),
(4, 'Nike', 'Air Jordan 9 Retro', 'Olive', 210, 1, 'https://image.goat.com/transform/v1/attachments/product_template_pictures/images/104/860/451/original/1373118_00.png.png?action=crop&width=300'),
(6, 'Nike', 'Air Jordan 4 Retro', 'White Thunder', 251, 1, 'https://image.goat.com/transform/v1/attachments/product_template_pictures/images/102/744/314/original/1333222_00.png.png?action=crop&width=300'),
(7, 'Nike', 'Air Jordan 1 Retro High OG', 'Midnight Navy', 180, 1, 'https://image.goat.com/transform/v1/attachments/product_template_pictures/images/102/499/092/original/1334510_00.png.png?action=crop&width=300'),
(8, 'Nike', 'Travis Scott x Air Jordan 1 Retro Low OG SP', 'Reverse Olive', 418, 1, 'https://image.goat.com/transform/v1/attachments/product_template_pictures/images/104/376/353/original/1382370_00.png.png?action=crop&width=300'),
(10, 'Nike', 'Wmns Air Jordan 4 Retro', 'Orchid', 259, 1, 'https://image.goat.com/transform/v1/attachments/product_template_pictures/images/104/352/216/original/1394973_00.png.png?action=crop&width=300'),
(12, 'Nike', 'Air Jordan 1 Retro Low OG', 'Mocha', 140, 1, 'https://image.goat.com/transform/v1/attachments/product_template_pictures/images/103/845/118/original/1308778_00.png.png?action=crop&width=300'),
(13, 'Nike', 'Air Jordan 11 Retro Low', 'Diffused Blue', 138, 1, 'https://image.goat.com/transform/v1/attachments/product_template_pictures/images/103/218/480/original/1260930_00.png.png?action=crop&width=300'),
(16, 'Nike', 'Dunk Low', 'Grey Fog', 83, 0, 'https://image.goat.com/transform/v1/attachments/product_template_pictures/images/102/529/153/original/815560_00.png.png?action=crop&width=300'),
(17, 'New Balance', '9060', 'Fuchsia Pink', 162, 1, 'https://image.goat.com/transform/v1/attachments/product_template_pictures/images/103/411/697/original/1454774_00.png.png?action=crop&width=300'),
(19, 'Nike', 'Zoom Kobe 5 Protro', 'X-Ray', 172, 1, 'https://image.goat.com/transform/v1/attachments/product_template_pictures/images/104/567/705/original/1381863_00.png.png?action=crop&width=300'),
(20, 'Rick Owens', 'Wmns Lunar Mega Tractor Boot', 'Pearl', 4080, 1, 'https://image.goat.com/transform/v1/attachments/product_template_pictures/images/103/810/890/original/RP02D3862_LGF_89.png.png?action=crop&width=300'),
(27, 'Nike', 'Air Jordan 1 High OG', 'Rebellionaire', 134, 0, 'https://image.goat.com/transform/v1/attachments/product_template_pictures/images/069/236/749/original/838649_00.png.png?action=crop&width=300'),
(28, 'Nike', 'Air Jordan 12 Retro', 'Playoff', 128, 0, 'https://image.goat.com/transform/v1/attachments/product_template_pictures/images/066/248/031/original/858712_00.png.png?action=crop&width=300'),
(29, 'Nike', 'LeBron 9', 'Big Bang', 105, 0, 'https://image.goat.com/transform/v1/attachments/product_template_pictures/images/067/957/684/original/897203_00.png.png?action=crop&width=300'),
(30, 'Nike', 'Concepts x Dunk Low SB', 'Orange Lobster', 264, 0, 'https://image.goat.com/transform/v1/attachments/product_template_pictures/images/081/467/358/original/1004215_00.png?action=crop&width=300'),
(31, 'Nike', 'Louis Vuitton x Air Force 1 Low', 'White Comet Red', 4207, 0, 'https://image.goat.com/transform/v1/attachments/product_template_pictures/images/078/397/642/original/1005437_00.png.png?action=crop&width=300'),
(33, 'Nike', 'A Ma Maniére x Wmns Air Jordan 3 Retro', 'While You Were Sleeping', 127, 1, 'https://image.goat.com/transform/v1/attachments/product_template_pictures/images/103/344/813/original/1381865_00.png.png?action=crop&width=300');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `sneakers`
--
ALTER TABLE `sneakers`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `sneakers`
--
ALTER TABLE `sneakers`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
