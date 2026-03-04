-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 04, 2026 at 04:54 PM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `cm_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `customers`
--

CREATE TABLE `customers` (
  `Id` varchar(29) NOT NULL,
  `name` varchar(255) NOT NULL,
  `phone` varchar(15) NOT NULL,
  `address` text NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `customers`
--

INSERT INTO `customers` (`Id`, `name`, `phone`, `address`, `created_at`) VALUES
('C0001', 'Satya', '083862850769', 'Jl. Galang Sewu Raya', '2024-11-24 13:06:55'),
('C0002', 'Alen', '085155045311', 'Jl. Pudak Payung', '2024-11-24 13:08:53'),
('C0003', 'Nitaa', '089518629837', 'Jl. Depoksari Raya', '2024-11-24 13:10:41'),
('C0004', 'Nurhaliza', '088786765345', 'Jl. Peterongan', '2024-11-25 10:37:00'),
('C0005', 'Sheilla', '089787665789', 'Jl. Pemuda', '2024-12-02 05:01:09'),
('C0006', 'nanda', '083841046213', 'Kendal', '2024-12-02 05:29:00'),
('C0007', 'Sifa', '08897867567', 'Jl. Syuhada raya', '2024-12-08 13:42:11'),
('C0008', 'Syfa', '088769584739', 'Jl. Depoksari', '2024-12-13 11:25:20');

-- --------------------------------------------------------

--
-- Table structure for table `menu`
--

CREATE TABLE `menu` (
  `id_menu` int(11) NOT NULL,
  `nama_menu` varchar(100) DEFAULT NULL,
  `kategori` enum('makanan','minuman') DEFAULT NULL,
  `harga` int(11) DEFAULT NULL,
  `stok` int(11) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `menu`
--

INSERT INTO `menu` (`id_menu`, `nama_menu`, `kategori`, `harga`, `stok`, `created_at`) VALUES
(1, 'Cuanki Indomie Soto', 'makanan', 15000, 20, '2026-03-04 14:51:23');

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `order_id` varchar(10) NOT NULL,
  `order_name` varchar(255) DEFAULT NULL,
  `additional_soap` varchar(255) DEFAULT NULL,
  `customer_id` varchar(11) DEFAULT NULL,
  `customer_name` varchar(255) DEFAULT NULL,
  `shipping_address` text DEFAULT NULL,
  `order_date` datetime DEFAULT current_timestamp(),
  `quantity` int(11) DEFAULT 0,
  `additional_quantity` int(11) NOT NULL DEFAULT 0,
  `total_amount` decimal(10,2) DEFAULT NULL,
  `status` enum('pending','processing','shipped','complete','cancelled') DEFAULT 'pending',
  `payment_method` varchar(50) DEFAULT NULL,
  `payment_status` enum('unpaid','paid') DEFAULT 'unpaid',
  `shipping_method` varchar(50) DEFAULT NULL,
  `order_notes` text DEFAULT NULL,
  `updated_at` datetime DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`order_id`, `order_name`, `additional_soap`, `customer_id`, `customer_name`, `shipping_address`, `order_date`, `quantity`, `additional_quantity`, `total_amount`, `status`, `payment_method`, `payment_status`, `shipping_method`, `order_notes`, `updated_at`) VALUES
('O0001', 'Softener 5L Sakura', '', 'C0001', NULL, 'Jl. Galang Sewu Raya', '2024-10-23 14:16:00', 1, 0, 67000.00, 'processing', NULL, 'unpaid', NULL, 'Mohon segera di proses ya kak', '2024-12-15 14:37:12'),
('O0002', 'Floor Cleaner 5L Lemon', '', 'C0002', NULL, 'Jl. Pudak Payung', '2024-10-23 13:36:00', 2, 0, 84000.00, 'processing', NULL, 'unpaid', NULL, 'Segera di proses min', '2024-12-15 14:37:31'),
('O0003', 'Handsoap 5L Aroma Mint', 'Parfum Laundry 5L Snappy', 'C0003', 'Nitaa', 'Jl. Depoksari Raya', '2024-10-23 22:02:00', 1, 1, 156000.00, 'processing', NULL, 'unpaid', NULL, 'No', '2024-12-15 14:55:00'),
('O0004', 'Floor Cleaner 5L Lemon', '', 'C0004', 'Nurhaliza', 'Jl. Peterongan', '2024-11-25 09:03:00', 1, 0, 42000.00, 'processing', NULL, 'unpaid', NULL, 'No', '2024-12-15 14:55:17'),
('O0005', 'Pembersih Kaca 5L', 'Parfum Laundry 5L Sakura', 'C0005', 'Sheilla ', 'Jl. Pemuda', '2024-11-30 11:07:00', 1, 2, 267000.00, 'processing', NULL, 'unpaid', NULL, 'No', '2024-12-15 14:55:19'),
('O0006', 'Parfum Laundry 5L Sakura', 'Pembersih Kaca 5L', 'C0006', 'nanda', 'Kendal', '2024-12-02 09:08:00', 1, 1, 160000.00, 'processing', NULL, 'unpaid', NULL, 'No', '2024-12-15 14:55:28'),
('O0007', 'Floor Cleaner 5L Lavender', '', 'C0007', 'Sifa', 'Jl. Syuhada Raya', '2024-12-13 23:46:00', 1, 0, 42000.00, 'pending', NULL, 'unpaid', NULL, 'No', '2024-12-13 23:46:37'),
('O0008', 'Parfum Laundry 5L Snappy', 'Handsoap 5L Lemon Mania', 'C0005', 'Sheilla', 'Jl. Pemuda', '2024-12-13 13:05:00', 1, 2, 205000.00, 'processing', NULL, 'unpaid', NULL, 'Cepat kirim ya!!', '2024-12-15 13:06:42');

-- --------------------------------------------------------

--
-- Table structure for table `produk`
--

CREATE TABLE `produk` (
  `Kd_Barang` varchar(6) NOT NULL,
  `Gambar_Barang` varchar(225) NOT NULL,
  `Nm_Barang` varchar(50) DEFAULT NULL,
  `Deskripsi_Produk` varchar(225) NOT NULL,
  `Hrg_Satuan` decimal(15,2) DEFAULT 0.00
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `produk`
--

INSERT INTO `produk` (`Kd_Barang`, `Gambar_Barang`, `Nm_Barang`, `Deskripsi_Produk`, `Hrg_Satuan`) VALUES
('B001', '67408f5cf2638.png', 'Deterjen Liquid 5L', 'Deterjen dengan formula ekonomis yang cocok digunakan untuk kebutuhan sehari-hari dan juga laundry.', 45000.00),
('B002', '67408f901dac1.png', 'Handsoap 5L Lemon Mania', 'Handsoap dengan formulaa ekonomis yang cocok digunakan baik di rumah tangga maupun kantor / restaurant.', 49000.00),
('B003', '67408fbb577d7.png', 'Handsoap 5L Aroma Mint', 'Handsoap dengan formula ekonomis yang cocok digunakan baik di rumah tangga maupun kantor / restaurant.', 49000.00),
('B004', '67408fc5c9f1f.png', 'Handsoap 5L Strawberry', 'Handsoap dengan formula ekonomis yang cocok digunakan baik di rumah tangga maupun kantor / restaurant.', 49000.00),
('B005', '67408fcfda982.png', 'Softener 5L Ocean Akasia', 'Softener yang dengan formula ekonomis yang cocok digunakan untuk kebutuhan sehari-hari dan juga laundry .', 67000.00),
('B006', '67408fd970646.png', 'Softener 5L Sakura', 'Parfum dengan formula ekonomis yang cocok digunakan untuk kebutuhan sehari-hari dan juga laundry .', 67000.00),
('B007', '67408fe65673f.png', 'Parfum Laundry 5L Sakura', 'Parfum dengan formula ekonomis yang cocok digunakan untuk kebutuhan sehari-hari dan juga laundry .', 107000.00),
('B008', '67408ff1c9588.png', 'Parfum Laundry 5L Snappy', 'Parfum dengan formula ekonomis yang cocok digunakan untuk kebutuhan sehari-hari dan juga laundry .', 107000.00),
('B009', '67408ffce5766.png', 'Floor Cleaner 5L Lemon', 'Pembersih lantai dengan formula ekonomis yang cocok digunakan untuk kebutuhan sehari-hari maupun bisnis.', 42000.00),
('B010', '674090082d9ef.png', 'Floor Cleaner 5L Lavender', 'Pembersih lantai dengan formula ekonomis yang cocok digunakan untuk kebutuhan sehari-hari maupun bisnis.', 42000.00),
('B011', '6740903768860.png', 'Karbol Sereh 5L Sereh', 'Pembersih lantai fungsi ganda dengan formulasi alami untuk membersihkan kamar mandi juga.', 72000.00),
('B012', '674090453c894.png', 'Karbol Pine 5L Pinus', 'Karbol Wangi dapat digunakan untuk membersihkan lantai kamar mandi. dan juga lantai ruangan di rumah.', 53000.00),
('B013', '67409051a2042.png', 'Pembersih Kaca 5L', 'Pembersih multifungsi yang secara efisien dapat membersihkan kaca sehingga jendela/cermin tetap berkilau dan juga lantai ruangan di rumah.', 53000.00),
('B014', '675c6cea84622.png', 'Sabun Cuci Piring 5L Jeruk Nipis', 'Cairan pencuci piring dengan harga ekonomis dengan daya bersih yang baik. Ampuh merontokan minyak-minyak yang menempel pada piring seketika.', 50000.00);

-- --------------------------------------------------------

--
-- Table structure for table `review`
--

CREATE TABLE `review` (
  `Kd_Review` int(11) UNSIGNED NOT NULL,
  `Nm_Customer` varchar(25) NOT NULL,
  `Rating` int(1) NOT NULL,
  `Komentar` text NOT NULL,
  `Tgl_Review` datetime NOT NULL DEFAULT current_timestamp(),
  `Status` varchar(20) NOT NULL DEFAULT '"Menunggu"',
  `profile_pic` varchar(255) NOT NULL,
  `like_count` int(11) UNSIGNED NOT NULL DEFAULT 0,
  `Verified_Purchase` tinyint(1) UNSIGNED NOT NULL DEFAULT 0,
  `Anonim` tinyint(1) UNSIGNED NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `review`
--

INSERT INTO `review` (`Kd_Review`, `Nm_Customer`, `Rating`, `Komentar`, `Tgl_Review`, `Status`, `profile_pic`, `like_count`, `Verified_Purchase`, `Anonim`) VALUES
(1, 'Yunita R.', 5, 'Cukup baik, namun ada beberapa hal yang perlu ditingkatkan', '2024-12-15 12:55:00', 'Approved', 'uploads/1734242100_yunita.jpg', 0, 0, 0),
(2, 'Satya P.', 5, 'Sangat memuaskan, hasilnya sesuai dengan yang diharapkan', '2024-12-15 12:56:14', 'Approved', 'uploads/1734242174_satya.jpg', 0, 0, 0),
(3, 'Talenta P.', 5, 'Produk ini sangat bagus! Saya sangat merekomendasikan.', '2024-12-15 12:56:57', 'Approved', 'uploads/1734242217_alen.jpg', 0, 0, 0),
(4, 'Nurhaliza', 5, 'produk sangat bagus, baunya harum banget!! ga nyesel beli disini', '2024-12-15 12:57:49', 'Approved', 'uploads/1734242269_ibu nur dan suami.jpg', 0, 0, 0),
(5, 'zee', 4, 'sangat recomended beli disini!! harga terjangkau suka banget', '2024-12-15 12:58:25', 'Approved', 'uploads/1734242305_zee.jpg', 0, 0, 0),
(6, 'nina', 5, 'bener bener wangi banget!!', '2024-12-15 12:59:13', 'Approved', 'uploads/1734242353_ibu.jpg', 0, 0, 0),
(7, 'caca', 4, 'wangi bgt rekomen sih!', '2024-12-15 12:59:40', 'Approved', 'uploads/1734242380_download (5).jpg', 0, 0, 0),
(8, 'Nanda', 5, 'Wangi pol!!', '2024-12-15 13:00:02', 'Approved', 'uploads/1734242402_nanda.png', 0, 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `password`) VALUES
(1, 'jsp', '$2y$10$fR.dcukD4vptF6vVPKC1h.low.hNScnZjiaTlHITpu5VoF7o1IZDu'),
(10, 'ahai', '$2y$10$dVsvGlUgoYUgZdl6bAKKUOXuDesWBzhSjn/4cxExEvXEgVbTPrsS.'),
(11, 'sebul', '$2y$10$jOpAgs.EVlta/fap601PoOU4vACg15UJSwx8gUB/ULwbBVAtCbnyW');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `customers`
--
ALTER TABLE `customers`
  ADD PRIMARY KEY (`Id`);

--
-- Indexes for table `menu`
--
ALTER TABLE `menu`
  ADD PRIMARY KEY (`id_menu`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`order_id`);

--
-- Indexes for table `produk`
--
ALTER TABLE `produk`
  ADD PRIMARY KEY (`Kd_Barang`);

--
-- Indexes for table `review`
--
ALTER TABLE `review`
  ADD PRIMARY KEY (`Kd_Review`),
  ADD KEY `IndexBrg` (`Nm_Customer`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username` (`username`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `menu`
--
ALTER TABLE `menu`
  MODIFY `id_menu` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `review`
--
ALTER TABLE `review`
  MODIFY `Kd_Review` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
