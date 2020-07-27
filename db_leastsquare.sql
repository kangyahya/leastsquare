-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: 28 Jul 2020 pada 00.07
-- Versi Server: 10.1.29-MariaDB
-- PHP Version: 7.2.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_leastsquare`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `lap_prediksi`
--

CREATE TABLE `lap_prediksi` (
  `id` int(11) NOT NULL,
  `tahun` year(4) NOT NULL,
  `prodi` varchar(30) NOT NULL,
  `prediksi` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `lap_prediksi`
--

INSERT INTO `lap_prediksi` (`id`, `tahun`, `prodi`, `prediksi`) VALUES
(1, 2016, 'DKV', 101.6),
(2, 2016, 'SIKA', 132.5),
(3, 2020, 'DKV', 20);

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_distribution`
--

CREATE TABLE `tbl_distribution` (
  `id_dist` int(11) NOT NULL,
  `tahun` varchar(4) NOT NULL,
  `id_fakultas` int(11) NOT NULL,
  `id_jenjang` int(11) NOT NULL,
  `id_prodi` int(11) NOT NULL,
  `dist` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tbl_distribution`
--

INSERT INTO `tbl_distribution` (`id_dist`, `tahun`, `id_fakultas`, `id_jenjang`, `id_prodi`, `dist`) VALUES
(1, '2012', 1, 1, 1, 20),
(2, '2012', 1, 1, 2, 20),
(3, '2012', 1, 1, 3, 23),
(4, '2012', 1, 2, 4, 21),
(5, '2012', 1, 2, 5, 24),
(6, '2012', 2, 1, 6, 25),
(7, '2012', 2, 1, 7, 25),
(8, '2012', 2, 2, 8, 30),
(9, '2013', 1, 1, 1, 20),
(10, '2013', 1, 1, 2, 20),
(11, '2013', 1, 1, 3, 15),
(12, '2013', 1, 2, 4, 26),
(13, '2013', 1, 2, 5, 22),
(14, '2013', 2, 1, 6, 27),
(15, '2013', 2, 1, 7, 21),
(16, '2013', 2, 2, 8, 30),
(17, '2014', 1, 1, 1, 20),
(18, '2014', 1, 1, 2, 30),
(19, '2014', 1, 1, 3, 20),
(20, '2014', 1, 2, 4, 27),
(21, '2014', 1, 2, 5, 23),
(22, '2014', 2, 1, 6, 24),
(23, '2014', 2, 1, 7, 33),
(24, '2014', 2, 2, 8, 23),
(25, '2015', 1, 1, 1, 20),
(26, '2015', 1, 1, 2, 20),
(27, '2015', 1, 1, 3, 20),
(28, '2015', 1, 2, 4, 20),
(29, '2015', 1, 2, 5, 20),
(30, '2015', 2, 1, 6, 20),
(31, '2015', 2, 1, 7, 20),
(32, '2015', 2, 2, 8, 20),
(33, '2016', 1, 1, 1, 50),
(34, '2016', 1, 1, 2, 40),
(35, '2016', 1, 1, 3, 30),
(36, '2016', 1, 2, 4, 25),
(37, '2016', 1, 2, 5, 50),
(38, '2016', 2, 1, 6, 66),
(39, '2016', 2, 1, 7, 66),
(40, '2016', 2, 2, 8, 43);

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_fakultas`
--

CREATE TABLE `tbl_fakultas` (
  `id_fakultas` int(11) NOT NULL,
  `fakultas` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tbl_fakultas`
--

INSERT INTO `tbl_fakultas` (`id_fakultas`, `fakultas`) VALUES
(1, 'Fakultas Teknologi dan Informatika');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_group_users`
--

CREATE TABLE `tbl_group_users` (
  `id_group` int(11) NOT NULL,
  `group_name` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tbl_group_users`
--

INSERT INTO `tbl_group_users` (`id_group`, `group_name`) VALUES
(1, 'Master'),
(2, 'Sekretariat'),
(3, 'Pimpinan');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_jenjang`
--

CREATE TABLE `tbl_jenjang` (
  `id_jenjang` int(11) NOT NULL,
  `jenjang` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tbl_jenjang`
--

INSERT INTO `tbl_jenjang` (`id_jenjang`, `jenjang`) VALUES
(1, 'S1'),
(2, 'D3');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_mahasiswa`
--

CREATE TABLE `tbl_mahasiswa` (
  `id` int(11) NOT NULL,
  `nim` varchar(10) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `jk` varchar(1) NOT NULL,
  `id_fakultas` int(11) NOT NULL,
  `id_prodi` int(11) NOT NULL,
  `id_sekolah` int(11) NOT NULL,
  `ta` year(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tbl_mahasiswa`
--

INSERT INTO `tbl_mahasiswa` (`id`, `nim`, `nama`, `jk`, `id_fakultas`, `id_prodi`, `id_sekolah`, `ta`) VALUES
(11, '191107001', 'Ayu Nabilah', 'L', 1, 2, 1, 2019),
(12, '191109003', 'Ai Widasukmawati Az-Zahra', 'P', 1, 2, 2, 2019),
(13, '191109004', 'Ridho Firmansyah', 'L', 1, 1, 4, 2019),
(14, '191109005', 'Ahmad Nursyifa', 'L', 1, 2, 4, 2019),
(15, '191113007', 'Laila Tussyarofah', 'P', 1, 2, 4, 2019),
(16, '191101008', 'Ramadhan Feriansyah', 'L', 1, 2, 4, 2019),
(17, '191101009', 'Faskal Riztaldi', 'P', 1, 2, 4, 2019),
(18, '191136011', 'Ghina Alyaa Nabiilah', 'L', 1, 2, 4, 2019),
(19, '191136012', 'Yohanes Ricardo Setiawan', 'L', 1, 2, 4, 2019),
(20, '191186013', 'Yosef Andrian Kristiadi', 'P', 1, 1, 4, 2019),
(21, '191162014', 'Firli Safitri', 'L', 1, 2, 4, 2019),
(22, '191500015', 'Daniel Celo Onibala', 'P', 1, 1, 4, 2019),
(23, '191500016', 'Tio Mauludin', 'L', 1, 2, 4, 2019),
(24, '191500017', 'Achmad Danial Mubarrok', 'L', 1, 2, 4, 2019),
(25, '191500018', 'Alfaisal Dwiarianto', 'P', 1, 1, 4, 2019),
(26, '191149019', 'Fahrurrozi', 'L', 1, 3, 4, 2019),
(27, '191301020', 'Malvin Hidayat', 'P', 1, 1, 4, 2019),
(28, '191105021', 'Adam Arifuddin Uthbi', 'L', 1, 2, 4, 2019),
(29, '191105022', 'Siti Emilia', 'L', 1, 2, 4, 2019),
(30, '191240024', 'Raihan Rizqia Zaini Rosadi', 'P', 1, 1, 4, 2019),
(31, '191207025', 'Aldi Rahmadi', 'L', 1, 2, 4, 2019),
(32, '191169026', 'Ariiq Valerian Romero', 'P', 1, 3, 4, 2019),
(33, '191102027', 'Nathania Vanessa Wijaya', 'L', 1, 2, 4, 2019),
(34, '191102031', 'Abdul Wahid', 'L', 1, 2, 4, 2019),
(35, '191303041', 'Gazha Floryan', 'P', 1, 1, 4, 2019),
(36, '191191042', 'Nur Intan Agustin', 'L', 1, 2, 4, 2019),
(37, '191101043', 'Shafa Puteri Anggraeni', 'P', 1, 2, 4, 2019),
(38, '191149044', 'Setiawan Djodi', 'L', 1, 3, 4, 2019),
(39, '191111045', 'Kiki Rizkita', 'L', 1, 1, 4, 2019),
(40, '191109047', 'Elena Gunawan', 'P', 1, 2, 4, 2019),
(41, '191109048', 'Tria Herlina Ningsih', 'L', 1, 2, 4, 2019),
(42, '191101050', 'Ervin Maulana Ginanjar', 'P', 1, 1, 4, 2019),
(43, '191108051', 'Abdul Hafizh Hadi', 'L', 1, 1, 4, 2019),
(44, '191305053', 'Agus Permadi', 'L', 1, 1, 4, 2019),
(45, '191111054', 'Hastuti Romdhona', 'P', 1, 2, 4, 2019),
(46, '191111055', 'Shafwan Hendryan Shirman', 'L', 1, 1, 4, 2019),
(47, '191250056', 'Herry Sapriyanto', 'P', 1, 1, 4, 2019),
(48, '191250057', 'Muhammad Rifqi Alidzanur', 'L', 1, 1, 4, 2019),
(49, '191500074', 'Nur Ikhsan', 'L', 1, 1, 4, 2019),
(50, '191251075', 'Nova Triyanti', 'P', 1, 1, 4, 2019),
(51, '191111076', 'Nia Aghniyatul Ilmi', 'L', 1, 3, 4, 2019),
(52, '191110078', 'Mohammad Luthfi', 'P', 1, 1, 4, 2019),
(53, '191104079', 'Oding Bahrudin Saputra', 'L', 1, 1, 4, 2019),
(54, '191109083', 'Melani Yanti', 'L', 1, 2, 4, 2019),
(55, '191138089', 'Muhamad Fani Faisal', 'P', 1, 3, 4, 2019),
(56, '191306090', 'Rasyid Aryoseto Wibowo', 'L', 1, 1, 4, 2019),
(57, '191102094', 'Rendy Rukman Maulidin', 'P', 1, 2, 4, 2019),
(58, '191259095', 'Mochammad Saefful Bakhri', 'L', 1, 3, 4, 2019),
(59, '191500097', 'Farkhanurdin Mauhadi Achmad', 'L', 1, 1, 4, 2019),
(60, '191198098', 'Stevi Fadila Chika H.P', 'P', 1, 1, 4, 2019),
(61, '191104099', 'Nandi Saputra', 'L', 1, 2, 4, 2019),
(62, '191187100', 'Try Sutisna', 'P', 1, 2, 4, 2019),
(63, '191500101', 'Muhamad Raga Sutamin', 'L', 1, 1, 4, 2019),
(64, '191500102', 'M. Khoiruzzaman Sa\'ban Ginanjar', 'L', 1, 3, 4, 2019),
(65, '191301103', 'Permana', 'P', 1, 1, 4, 2019),
(66, '191500104', 'Mochammad Bagus Rafli', 'L', 1, 1, 4, 2019),
(67, '191111105', 'Syahrul Hidayat', 'P', 1, 1, 4, 2019),
(68, '191500106', 'Galih Pratama Rahadian', 'L', 1, 1, 4, 2019),
(69, '191500107', 'Lantip Senoaji', 'L', 1, 3, 4, 2019),
(70, '191216108', 'Ryuzaldi Willem Nay', 'P', 1, 1, 4, 2019),
(71, '191185110', 'Nicko Tri Marchiano', 'L', 1, 2, 4, 2019),
(72, '191157111', 'Wisah Sri Mulyani', 'P', 1, 3, 4, 2019),
(73, '191500112', 'Sutianah', 'L', 1, 2, 4, 2019),
(74, '191500113', 'Wahyu Bantar Maula', 'L', 1, 1, 4, 2019),
(75, '191101134', 'Rizqi Fauzi Mahendra', 'P', 1, 2, 4, 2019),
(76, '191308135', 'Muhammad Ahsin Romdhona', 'L', 1, 2, 4, 2019),
(77, '191111136', 'Yogie Purnama', 'P', 1, 1, 4, 2019),
(78, '191155141', 'Apriyanti Nurul Awaliyah', 'L', 1, 1, 4, 2019),
(79, '191111142', 'Muhammad Zidan Efendi', 'L', 1, 1, 4, 2019),
(80, '191138144', 'Gilang Muhammad Ramadhan', 'P', 1, 3, 4, 2019),
(81, '191153147', 'Fikri Fakhrudin', 'L', 1, 1, 4, 2019),
(82, '191309148', 'Tedi Herdianto', 'P', 1, 2, 4, 2019),
(83, '191500150', 'Nanda Diyaul Haq', 'L', 1, 3, 4, 2019),
(84, '191112151', 'Brilliant Axxellarrenno', 'L', 1, 1, 4, 2019),
(85, '191174157', 'Ahmad Zidni Aula As Saify', 'P', 1, 1, 4, 2019),
(86, '191311158', 'Lintang Permana Putra', 'L', 1, 1, 4, 2019),
(87, '191216159', 'Rizky Alvian Maulana', 'P', 1, 1, 4, 2019),
(88, '191171160', 'Alvin Elia Milarda', 'L', 1, 3, 4, 2019),
(89, '191103161', 'Lenny Ariyanto', 'L', 1, 2, 4, 2019),
(90, '191312165', 'Amanda Feodora', 'P', 1, 1, 4, 2019),
(91, '191101166', 'Yuda Wikusuma', 'L', 1, 3, 4, 2019),
(92, '191101167', 'Fahmi Azziz Baihaqi', 'P', 1, 3, 4, 2019),
(93, '191313168', 'Muhammad Wendra Anugrah Firdaus', 'L', 1, 2, 4, 2019),
(94, '191313169', 'Aulia Apriliani Mulyadi', 'L', 1, 2, 4, 2019),
(95, '191314170', 'Tiara Fanisa', 'P', 1, 1, 4, 2019),
(96, '191500172', 'Raden Doni Dwi Prasetyo', 'L', 1, 1, 4, 2019),
(97, '191227175', 'Hisyam Muzakki', 'P', 1, 3, 4, 2019),
(98, '191316177', 'Adelia Oktaviani', 'L', 1, 1, 4, 2019),
(99, '191101178', 'Rifqy Aufa Alfarez', 'L', 1, 1, 4, 2019),
(100, '191156182', 'Achmad Fa\'iq Hafizh', 'P', 1, 1, 4, 2019),
(101, '191500183', 'Muh. Rayhan Albastanjar Asi', 'L', 1, 1, 4, 2019),
(102, '191169184', 'Aldi Setiawan', 'P', 1, 1, 4, 2019),
(103, '191500185', 'Bayu Eka Salam', 'L', 1, 3, 4, 2019),
(104, '191156186', 'Dandy Rahmat Zain', 'L', 1, 3, 4, 2019),
(105, '191103187', 'Fatkhurohman', 'P', 1, 1, 4, 2019),
(106, '191500189', 'Moh. Alka Nur Adillah', 'L', 1, 3, 4, 2019),
(107, '191500191', 'An\'im Falahuddin', 'P', 1, 2, 4, 2019),
(108, '191102194', 'Dwi Asy Syafa\'Atul Ulyah', 'L', 1, 2, 4, 2019),
(109, '191500195', 'Risqi Yahya', 'L', 1, 1, 4, 2019),
(110, '191500196', 'Noval Thaher', 'P', 1, 1, 4, 2019),
(111, '191500197', 'Romli Saeful Bahri', 'L', 1, 1, 4, 2019),
(112, '191317198', 'Eki Naragusthury', 'P', 1, 2, 4, 2019),
(113, '191261202', 'Farel Rifqy Fairuz', 'L', 1, 1, 4, 2019),
(114, '191500204', '', 'L', 1, 1, 4, 2019),
(115, '191102205', '', 'P', 1, 2, 4, 2019),
(116, '191319206', '', 'L', 1, 1, 4, 2019),
(117, '191500207', '', 'P', 1, 1, 4, 2019),
(118, '191261208', '', 'L', 1, 1, 4, 2019),
(119, '191500209', '', 'L', 1, 2, 4, 2019),
(120, '191150211', '', 'P', 1, 1, 4, 2019),
(121, '191138212', '', 'L', 1, 3, 4, 2019),
(122, '191102213', '', 'P', 1, 1, 4, 2019),
(123, '191318214', '', 'L', 1, 1, 4, 2019),
(124, '191500216', '', 'L', 1, 1, 4, 2019),
(125, '191320217', '', 'P', 1, 1, 4, 2019),
(126, '191320218', '', 'L', 1, 1, 4, 2019),
(127, '191156219', '', 'P', 1, 1, 4, 2019),
(128, '191322221', '', 'L', 1, 1, 4, 2019),
(129, '191321222', '', 'L', 1, 3, 4, 2019),
(130, '191500223', '', 'P', 1, 3, 4, 2019),
(131, '191500225', '', 'L', 1, 3, 4, 2019),
(132, '191324226', '', 'P', 1, 1, 4, 2019),
(133, '191325227', '', 'L', 1, 3, 4, 2019),
(134, '191150232', '', 'L', 1, 3, 4, 2019),
(174, '2016102001', 'Adih', 'L', 1, 1, 1, 2016),
(175, '2016102002', 'Antoni Prasetyo', 'L', 1, 1, 2, 2016),
(176, '2016102003', 'Baby Asrofa', 'L', 1, 1, 4, 2016),
(177, '2016102004', 'Hendra Reinaldi', 'L', 1, 1, 1, 2016),
(178, '2016102005', 'Indah Fatiroh', 'L', 1, 1, 2, 2016),
(179, '2016102006', 'Miki Wahyudi Alamsyah', 'L', 1, 1, 4, 2016),
(180, '2016102007', 'Muhammad Khoiril Annam', 'L', 1, 1, 1, 2016),
(181, '2016102008', 'Nabil Fadel Muhammad', 'L', 1, 1, 2, 2016),
(182, '2016102009', 'Prayogo', 'L', 1, 1, 4, 2016),
(183, '2016102010', 'Remici Ferniawan', 'L', 1, 1, 1, 2016),
(184, '2016102011', 'Rian Anjasmara', 'L', 1, 1, 2, 2016),
(185, '2016102012', 'Romi Thomas', 'L', 1, 1, 4, 2016),
(186, '2016102013', 'Andi Handrian', 'L', 1, 1, 1, 2016),
(187, '2016102014', 'Anggi Sitohang', 'L', 1, 1, 2, 2016),
(188, '2016102015', 'Dimas Adriansyah', 'L', 1, 1, 4, 2016),
(189, '2016102016', 'Endah Kurnia Putri', 'L', 1, 1, 1, 2016),
(190, '2016102017', 'Fauzan Ikhsanur Susanto', 'L', 1, 1, 2, 2016),
(191, '2016102018', 'Gyosandi Putra Sitanggang', 'L', 1, 1, 4, 2016),
(192, '2016102019', 'Harry Alberto Sinaga', 'L', 1, 1, 1, 2016),
(193, '2016102020', 'Igo Octaviandri', 'L', 1, 1, 2, 2016),
(194, '2016102021', 'Juanda Aslika', 'L', 1, 1, 4, 2016),
(195, '2016102022', 'Misbah', 'L', 1, 1, 1, 2016),
(196, '2016102023', 'Muhammad Candra Gunawan', 'L', 1, 1, 2, 2016),
(197, '2016102024', 'Muslim', 'L', 1, 1, 4, 2016),
(198, '2016102025', 'Prasetya Perwira Putra Perdana', 'L', 1, 1, 1, 2016),
(199, '2016102026', 'Randy Rezabayani', 'L', 1, 1, 2, 2016),
(200, '2016102027', 'Reno Apriano', 'L', 1, 1, 4, 2016),
(201, '2016102028', 'Rifki Ariandhi', 'L', 1, 1, 1, 2016),
(202, '2016102029', 'Six Two Sihombing', 'L', 1, 1, 2, 2016),
(203, '2016102030', 'Tri Ananda Putra', 'L', 1, 1, 4, 2016),
(204, '2016102031', 'Wahyu Candra', 'L', 1, 1, 1, 2016),
(205, '2016102032', 'Wahyu Kurniawan', 'L', 1, 1, 2, 2016),
(206, '2016102033', 'Leonardo Wibawa Tambunan', 'L', 1, 1, 4, 2016),
(207, '2016102034', 'Maryanto', 'L', 1, 1, 1, 2016),
(208, '2016102035', 'Riandra Putra', 'L', 1, 1, 2, 2016),
(209, '2016102036', 'Indra Rio Purwanto', 'L', 1, 1, 4, 2016),
(210, '2016102037', 'Topan Hidayat', 'L', 1, 1, 1, 2016),
(211, '2016102038', 'Arman', 'L', 1, 1, 2, 2016),
(212, '2016102039', 'Aprizal', 'L', 1, 1, 4, 2016),
(213, '2016102040', 'Asmarita', 'L', 1, 1, 1, 2016),
(214, '2016102041', 'Desi Rita Putri Sari', 'L', 1, 1, 2, 2016),
(215, '2016102042', 'Dira Rahmayani', 'L', 1, 1, 4, 2016),
(216, '2016102043', 'Edison Boangmanalu', 'L', 1, 1, 1, 2016),
(217, '2016102044', 'Esa Fadjri Huda', 'L', 1, 1, 2, 2016),
(218, '2016102045', 'Firmansyah', 'L', 1, 1, 4, 2016),
(219, '2016102046', 'Hasmonalisa Has', 'L', 1, 1, 1, 2016),
(220, '2016102047', 'Muhammad Azwan', 'L', 1, 1, 2, 2016),
(221, '2016102048', 'Novita', 'L', 1, 1, 4, 2016),
(222, '2016102049', 'Putri Ayu Andira', 'L', 1, 1, 1, 2016),
(223, '2016102050', 'Rika Fitriani', 'L', 1, 1, 2, 2016),
(224, '2016102051', 'Yovi Fortrano Kurniawan', 'L', 1, 1, 4, 2016),
(225, '2016102052', 'Zikri', 'L', 1, 1, 1, 2016),
(226, '2016102053', 'Ade Putra Nurcholik Santito', 'L', 1, 1, 2, 2016),
(227, '2016102054', 'Agung Krismodian', 'L', 1, 1, 4, 2016),
(228, '2016102055', 'Ary Irfandi', 'L', 1, 1, 1, 2016),
(229, '2016102056', 'Atika Puspasari', 'L', 1, 1, 2, 2016),
(230, '2016102057', 'Aulia Rahmi', 'L', 1, 1, 4, 2016),
(231, '2016102058', 'Chandra Zulfika', 'L', 1, 1, 1, 2016),
(232, '2016102059', 'Cynthia Nofentary Purba', 'L', 1, 1, 2, 2016),
(233, '2016102060', 'Dehand Derana Putra', 'L', 1, 1, 4, 2016),
(234, '2016102061', 'Dian Candra Dewi ', 'L', 1, 1, 1, 2016),
(235, '2016102062', 'Febby Dwi Utama', 'L', 1, 1, 2, 2016),
(236, '2016102063', 'Galuh Mayang Sari', 'L', 1, 1, 4, 2016),
(237, '2016102064', 'Maizatul Akmar', 'L', 1, 1, 1, 2016),
(238, '2016102065', 'Martha Puspita', 'L', 1, 1, 2, 2016),
(239, '2016102066', 'Mikael Prapaskalis G', 'L', 1, 1, 4, 2016),
(240, '2016102067', 'Muhammad Ihsan', 'L', 1, 1, 1, 2016),
(241, '2016102068', 'Muhammad Sarimin', 'L', 1, 1, 2, 2016),
(242, '2016102069', 'Natanael Sijabat', 'L', 1, 1, 4, 2016),
(243, '2016102070', 'R.Bayzura Puan Nabila', 'L', 1, 1, 1, 2016),
(244, '2016102071', 'Radoth Mh Tamba', 'L', 1, 1, 2, 2016),
(245, '2016102072', 'Randi Rizky Kurniawan', 'L', 1, 1, 4, 2016),
(246, '2016102073', 'Riko Septiadi', 'L', 1, 1, 1, 2016),
(247, '2016102074', 'Silha Wildania Utami', 'L', 1, 1, 2, 2016),
(248, '2016102075', 'Vanna Poibe Situmeang', 'L', 1, 1, 4, 2016),
(249, '2016102076', 'Wahyudi Ahlan', 'L', 1, 1, 1, 2016),
(250, '2016102077', 'Tri Agus Saputro', 'L', 1, 1, 2, 2016),
(251, '2016102078', 'Muchlis Maulana', 'L', 1, 1, 4, 2016),
(252, '2016102079', 'Hadi Prasetio', 'L', 1, 1, 1, 2016),
(253, '2016102080', 'Dwi Yuni Ratna Sari', 'L', 1, 1, 2, 2016),
(254, '2016102081', 'Juhendar', 'L', 1, 1, 4, 2016),
(255, '2016102082', 'Eka Dewi Kurniati', 'L', 1, 1, 1, 2016),
(256, '2016102083', 'Bahrurrohim', 'L', 1, 1, 2, 2016),
(257, '2016102084', 'Agus Tonar', 'L', 1, 1, 4, 2016),
(258, '2016102085', 'Danny Damarry Siregar', 'L', 1, 1, 1, 2016),
(259, '2016102086', 'Ariantomi Yandra', 'L', 1, 1, 2, 2016),
(260, '2016102087', 'Oldi Syahputra Ramadhani', 'L', 1, 1, 4, 2016),
(261, '2016102088', 'Roza Rezita', 'L', 1, 1, 1, 2016),
(262, '2016102089', 'Ramona Risanti', 'L', 1, 1, 2, 2016),
(263, '2016102090', 'Vita Rahayu', 'L', 1, 1, 4, 2016),
(264, '2016102091', 'Junita Sri Wisna H', 'L', 1, 1, 1, 2016),
(265, '2016114001', 'Abdul Rahman Ritonga', 'L', 1, 2, 1, 2016),
(266, '2016114002', 'Afriwan', 'P', 1, 2, 2, 2016),
(267, '2016114003', 'Aidir', 'L', 1, 2, 4, 2016),
(268, '2016114004', 'Andi Bakia Askara', 'L', 1, 2, 1, 2016),
(269, '2016114005', 'Andika', 'P', 1, 2, 2, 2016),
(270, '2016114006', 'Antia Minanda', 'L', 1, 2, 4, 2016),
(271, '2016114007', 'Basri', 'P', 1, 2, 1, 2016),
(272, '2016114008', 'Berliana Sari', 'L', 1, 2, 2, 2016),
(273, '2016114009', 'David Andreas Sirait', 'L', 1, 2, 4, 2016),
(274, '2016114010', 'Elsa Pragita Barnella', 'P', 1, 2, 1, 2016),
(275, '2016114011', 'Febri Harianto', 'L', 1, 2, 2, 2016),
(276, '2016114012', 'Mulyadi', 'P', 1, 2, 4, 2016),
(277, '2016114013', 'Ogi Rinaldo', 'L', 1, 2, 1, 2016),
(278, '2016114014', 'Qurratu\'aini Mutie', 'L', 1, 2, 2, 2016),
(279, '2016114015', 'Ratna Sri Wijayanti', 'P', 1, 2, 4, 2016),
(280, '2016114016', 'Rudi Nur Supandi', 'L', 1, 2, 1, 2016),
(281, '2016114017', 'Sandika Aprillioga', 'P', 1, 2, 2, 2016),
(282, '2016114018', 'Suzana', 'L', 1, 2, 4, 2016),
(283, '2016114019', 'Dimas Prayoga Putra', 'L', 1, 2, 1, 2016),
(284, '2016114020', 'Epsan Iyawan Ginting', 'P', 1, 2, 2, 2016),
(285, '2016114021', 'Herlanto Sihar Napitupulu', 'L', 1, 2, 4, 2016),
(286, '2016114022', 'Lajemi', 'P', 1, 2, 1, 2016),
(287, '2016114023', 'Leica Febby Shafitri', 'L', 1, 2, 2, 2016),
(288, '2016114024', 'Rizki Aulia Ansari', 'L', 1, 2, 4, 2016),
(289, '2016114025', 'Rusmiati', 'P', 1, 2, 1, 2016),
(290, '2016114026', 'Samuel Yedijah Pardede', 'L', 1, 2, 2, 2016),
(291, '2016114027', 'Santa Meidiana Putri', 'P', 1, 2, 4, 2016),
(292, '2016114028', 'Satrio Sakti Purwanto', 'L', 1, 2, 1, 2016),
(293, '2016114029', 'Soedrajad Haryo Adji', 'L', 1, 2, 2, 2016),
(294, '2016114030', 'Zulmaidi Raddha', 'P', 1, 2, 4, 2016),
(295, '2016114031', 'Nasri', 'L', 1, 2, 1, 2016),
(296, '2016114032', 'Rahmad', 'P', 1, 2, 2, 2016),
(297, '2016114033', 'Wandi', 'L', 1, 2, 4, 2016),
(298, '2016114034', 'Muhammad Hanafi', 'L', 1, 2, 1, 2016),
(299, '2016114035', 'Apriandi', 'P', 1, 2, 2, 2016),
(300, '2016114036', 'Muhammad Ismail Saleh', 'L', 1, 2, 4, 2016),
(301, '2016114037', 'Abdul Aziz', 'P', 1, 2, 1, 2016),
(302, '2016114038', 'Dwi Ardiansyah', 'L', 1, 2, 2, 2016),
(303, '2016114039', 'Astry Lucyana Waty', 'L', 1, 2, 4, 2016),
(304, '2016114040', 'Muhamad Rasyid Ridho', 'P', 1, 2, 1, 2016),
(305, '2016114041', 'Muzdalifah', 'L', 1, 2, 2, 2016),
(306, '2016114042', 'Hendriko Evriando Moses', 'P', 1, 2, 4, 2016),
(307, '2016114043', 'Riodicki Bintan Alamanda', 'L', 1, 2, 1, 2016),
(308, '2016114044', 'Anggi Rinta Apriliandini', 'L', 1, 2, 2, 2016),
(309, '2016114045', 'Lucky Henry Yohanes', 'P', 1, 2, 4, 2016),
(310, '2016114046', 'Adek Parantiwi Safitri', 'L', 1, 2, 1, 2016),
(311, '2016114047', 'Edwin Ghutowo', 'P', 1, 2, 2, 2016),
(312, '2016114048', 'Piter Son', 'L', 1, 2, 4, 2016),
(313, '2016114049', 'Amegia Putri Bintani', 'L', 1, 2, 1, 2016),
(314, '2016114050', 'Irwan Saputra', 'P', 1, 2, 2, 2016),
(315, '2016114051', 'Arpenius Vernando Sitohang', 'L', 1, 2, 4, 2016),
(316, '2016114052', 'Ageng Nur Agustins Zahra', 'P', 1, 2, 1, 2016),
(317, '2016114053', 'Asmadi Hasan', 'L', 1, 2, 2, 2016),
(318, '2016114054', 'Deni Saputra', 'L', 1, 2, 4, 2016),
(319, '2016114055', 'Destya Dwi Safitri', 'P', 1, 2, 1, 2016),
(320, '2016114056', 'Fajeri', 'L', 1, 2, 2, 2016),
(321, '2016114057', 'Fendi Pradana', 'P', 1, 2, 4, 2016),
(322, '2016114058', 'Jupitar', 'L', 1, 2, 1, 2016),
(323, '2016114059', 'Mas Ayu Ritia Mawaddah', 'L', 1, 2, 2, 2016),
(324, '2016114060', 'Novi Fatmayanti', 'P', 1, 2, 4, 2016),
(325, '2016114061', 'Rapella Desiani', 'L', 1, 2, 1, 2016),
(326, '2016114062', 'Romauli Kristina Sidauruk', 'P', 1, 2, 2, 2016),
(327, '2016114063', 'Sulasteri', 'L', 1, 2, 4, 2016),
(328, '2016114064', 'Ummi Atiya', 'L', 1, 2, 1, 2016),
(329, '2016114065', 'Yulia Rosdatina', 'P', 1, 2, 2, 2016),
(330, '2016114066', 'Ahmad Fajrian', 'L', 1, 2, 4, 2016),
(331, '2016114067', 'Deska Rosa Rahmadini', 'P', 1, 2, 1, 2016),
(332, '2016114068', 'Fachry Muhammad', 'L', 1, 2, 2, 2016),
(333, '2016114069', 'Febrian Prakoso', 'L', 1, 2, 4, 2016),
(334, '2016114070', 'Fidayat', 'P', 1, 2, 1, 2016),
(335, '2016114071', 'Gestri Galuheana', 'L', 1, 2, 2, 2016),
(336, '2016114072', 'Gusti Randa', 'P', 1, 2, 4, 2016),
(337, '2016114073', 'Marina Anggasari Putri', 'L', 1, 2, 1, 2016),
(338, '2016114074', 'Nur Fadila Ys', 'L', 1, 2, 2, 2016),
(339, '2016114075', 'Pajrin', 'P', 1, 2, 4, 2016),
(340, '2016114076', 'Raja Wira Pradana', 'L', 1, 2, 1, 2016),
(341, '2016114077', 'Rani Fitmadiniyah', 'P', 1, 2, 2, 2016),
(342, '2016114078', 'Rouli Verawati Gurning', 'L', 1, 2, 4, 2016),
(343, '2016114079', 'Tina Sitorus', 'L', 1, 2, 1, 2016),
(344, '2016114080', 'Yoga Oktaliandi Saputra', 'P', 1, 2, 2, 2016),
(345, '2016114081', 'Yudika Mangoloi Naibaho', 'L', 1, 2, 4, 2016),
(346, '2016114082', 'Zulfiansyah Linggar Jati', 'P', 1, 2, 1, 2016),
(347, '2016114083', 'Yuhandra Dinata Hasibuan', 'L', 1, 2, 2, 2016),
(348, '2016114084', 'Urai Dian Dharma Putra', 'L', 1, 2, 4, 2016),
(349, '2016114085', 'Ira Gusriana', 'P', 1, 2, 1, 2016),
(350, '2016114086', 'Zulfikar', 'L', 1, 2, 2, 2016),
(351, '2016114087', 'Hazri Rizaldi', 'P', 1, 2, 4, 2016),
(352, '2016114088', 'Novrianto Gunawan', 'L', 1, 2, 1, 2016),
(353, '2016114089', 'Wahyu', 'L', 1, 2, 2, 2016),
(354, '2016114090', 'Yulis Maryuni', 'P', 1, 2, 4, 2016),
(355, '2016114091', 'Ary Pranata', 'L', 1, 2, 1, 2016),
(356, '2016114092', 'Leni Anggraini Lalala', 'P', 1, 2, 1, 2016),
(357, '2016114093', 'Rusdi Nur', 'L', 1, 2, 2, 2016),
(358, '2016114094', 'Nur Afni Nezaputri', 'L', 1, 2, 4, 2016),
(359, '2016114095', 'Ahmad Sohibi', 'P', 1, 2, 1, 2016),
(360, '2016114096', 'Putra Sanjaya', 'L', 1, 2, 2, 2016),
(361, '2016114097', 'Sunartri Agung', 'P', 1, 2, 4, 2016),
(362, '2016114098', 'Heru Faktio Aji', 'L', 1, 2, 1, 2016),
(363, '2016114099', 'Athratus Sufiyanti', 'L', 1, 2, 2, 2016),
(364, '2016114100', 'Ike Atmajawati', 'P', 1, 2, 4, 2016),
(365, '2016114101', 'Sigit Priosembodo', 'L', 1, 2, 1, 2016),
(366, '2016114102', 'Syarifah Fitriana', 'P', 1, 2, 2, 2016),
(367, '2016114103', 'Tri Hardiyanti', 'L', 1, 2, 4, 2016),
(368, '2016114104', 'Yanti', 'L', 1, 2, 1, 2016),
(369, '2016114105', 'Yuni Naina', 'P', 1, 2, 2, 2016),
(370, '2016114106', 'Desra Gandi', 'L', 1, 2, 4, 2016),
(371, '2016114107', 'Ema Fitria', 'P', 1, 2, 1, 2016),
(372, '2016114108', 'Feni Yuniarti', 'L', 1, 2, 2, 2016),
(373, '2016114109', 'Hermanto Setiadi Lumbantoruan', 'L', 1, 2, 4, 2016),
(374, '2016114110', 'Imay Jullianty', 'P', 1, 2, 1, 2016),
(375, '2016114111', 'Monalisa Nia Novita Panjaitan', 'L', 1, 2, 2, 2016),
(376, '2016114112', 'Rizal Hadi', 'P', 1, 2, 4, 2016),
(377, '2016114113', 'Suryani Tessalonika Juita Siburian', 'L', 1, 2, 1, 2016),
(378, '2016114114', 'Wandika', 'L', 1, 2, 2, 2016),
(379, '2016114115', 'Santi Afrika Dewi', 'P', 1, 2, 4, 2016),
(380, '2016114116', 'Muhammad Shadikin', 'L', 1, 2, 1, 2016),
(381, '2016114117', 'Ade Nova', 'P', 1, 2, 2, 2016),
(382, '2016114118', 'Evi Rawadi', 'L', 1, 2, 4, 2016),
(383, '2016114119', 'Zulkefri', 'L', 1, 2, 1, 2016),
(384, '2016114120', 'Anjar Wijaya', 'P', 1, 2, 2, 2016),
(385, '2016114121', 'Fitri Yenti', 'L', 1, 2, 4, 2016),
(386, '2016114122', 'Irsys Pisca Cantona', 'P', 1, 2, 1, 2016),
(387, '2016114123', 'Maria Ulfa', 'L', 1, 2, 2, 2016),
(388, '2016114124', 'Yudha Anggara', 'L', 1, 2, 4, 2016),
(389, '2016114125', 'Ali Jaja', 'P', 1, 2, 1, 2016),
(390, '2016114126', 'Azni Novshally', 'L', 1, 2, 2, 2016),
(391, '2016114127', 'Haidir Syahalam', 'P', 1, 2, 4, 2016),
(392, '2016114128', 'Indra Lasmana', 'L', 1, 2, 1, 2016),
(393, '2016114129', 'Nurul Afifah El- Fath', 'L', 1, 2, 2, 2016),
(394, '2016114130', 'Redi Junianto', 'P', 1, 2, 4, 2016),
(395, '2016114131', 'Riska Chintami Aulia', 'L', 1, 2, 1, 2016),
(396, '2016114132', 'Rusdi Akbar', 'P', 1, 2, 2, 2016),
(397, '2016114133', 'Tobi', 'L', 1, 2, 4, 2016),
(398, '2016114134', 'Wan Kirana Shabilla', 'L', 1, 2, 1, 2016),
(399, '2016114135', 'Nadiyah Khamilah Azzah', 'P', 1, 2, 2, 2016),
(400, '2016114136', 'Sahrul Diansyah', 'L', 1, 2, 4, 2016),
(401, '2016114137', 'Sepriyan Niccy', 'P', 1, 2, 1, 2016),
(402, '2016114138', 'Aditya Nindy Pamungkas', 'L', 1, 2, 2, 2016),
(403, '2016114139', 'Muhammad Fadli', 'L', 1, 2, 4, 2016),
(404, '2016114140', 'Iswandi', 'P', 1, 2, 1, 2016),
(405, '2016114141', 'Zulhijrah', 'L', 1, 2, 2, 2016),
(406, '2016114142', 'Jeki Saputra', 'P', 1, 2, 4, 2016),
(407, '2016105001', 'Anggraeni Syahfitri', 'L', 1, 3, 1, 2016),
(408, '2016105002', 'Anggun September', 'P', 1, 3, 1, 2016),
(409, '2016105003', 'Apriyani', 'L', 1, 3, 1, 2016),
(410, '2016105004', 'Dafit', 'P', 1, 3, 1, 2016),
(411, '2016105005', 'Dedi Irwansyah', 'L', 1, 3, 1, 2016),
(412, '2016105006', 'Denis Andrian', 'P', 1, 3, 1, 2016),
(413, '2016105007', 'Devi Syntya', 'L', 1, 3, 1, 2016),
(414, '2016105008', 'Dewi Ratih Kartikamurti', 'P', 1, 3, 1, 2016),
(415, '2016105009', 'Erizka Sry Indah Lestari', 'L', 1, 3, 1, 2016),
(416, '2016105010', 'Febry Safitri', 'P', 1, 3, 1, 2016),
(417, '2016105011', 'Fitri Purnamasari', 'L', 1, 3, 1, 2016),
(418, '2016105012', 'Ibrahim', 'P', 1, 3, 1, 2016),
(419, '2016105013', 'Juli Andre', 'L', 1, 3, 1, 2016),
(420, '2016105014', 'Maimunah', 'P', 1, 3, 1, 2016),
(421, '2016105015', 'Martoni Afrizal', 'L', 1, 3, 1, 2016),
(422, '2016105016', 'Mira Widia Astuti', 'P', 1, 3, 1, 2016),
(423, '2016105017', 'Nadila Pratiwi', 'L', 1, 3, 1, 2016),
(424, '2016105018', 'Noffiyanti', 'P', 1, 3, 1, 2016),
(425, '2016105019', 'Nor Zafila', 'L', 1, 3, 1, 2016),
(426, '2016105020', 'Novi Dwi Lestari', 'P', 1, 3, 1, 2016),
(427, '2016105021', 'Prasetyio Trisakti', 'L', 1, 3, 1, 2016),
(428, '2016105022', 'Puja Lestari', 'P', 1, 3, 1, 2016),
(429, '2016105023', 'Putri Maharani Triastuti', 'L', 1, 3, 1, 2016),
(430, '2016105024', 'Putri Yudia Wulandari', 'P', 1, 3, 1, 2016),
(431, '2016105025', 'Ramika Tamila', 'L', 1, 3, 1, 2016),
(432, '2016105026', 'Ratna Dewi Sari', 'P', 1, 3, 1, 2016),
(433, '2016105027', 'Rendra Adjie Prawira', 'L', 1, 3, 1, 2016),
(434, '2016105028', 'Resyidah', 'P', 1, 3, 1, 2016),
(435, '2016105029', 'Reza Widiya Juliani', 'L', 1, 3, 1, 2016),
(436, '2016105030', 'Rina Enjelina', 'P', 1, 3, 1, 2016),
(437, '2016105031', 'Riski Arta Ananda', 'L', 1, 3, 1, 2016),
(438, '2016105032', 'Santia', 'P', 1, 3, 1, 2016),
(439, '2016105033', 'Siti Akmarliani Nanda', 'L', 1, 3, 1, 2016),
(440, '2016105034', 'Siti Nabilah', 'P', 1, 3, 1, 2016),
(441, '2016105035', 'Siti Yuliana', 'L', 1, 3, 1, 2016),
(442, '2016105036', 'Sukarno', 'P', 1, 3, 1, 2016),
(443, '2016105037', 'Winda Saputri', 'L', 1, 3, 1, 2016),
(444, '2016105038', 'Adi Putra', 'P', 1, 3, 1, 2016),
(445, '2016105039', 'Amalia Hardi Cusinia', 'L', 1, 3, 1, 2016),
(446, '2016105040', 'Ayu Sariaty Br. Manurung', 'P', 1, 3, 1, 2016),
(447, '2016105041', 'David Oktaviandi Butar-Butar', 'L', 1, 3, 1, 2016),
(448, '2016105042', 'Desi Syaras Mita', 'P', 1, 3, 1, 2016),
(449, '2016105043', 'Devitri Wahyuni', 'L', 1, 3, 1, 2016),
(450, '2016105044', 'Dian Pratama', 'P', 1, 3, 1, 2016),
(451, '2016105045', 'Fatmawati', 'L', 1, 3, 1, 2016),
(452, '2016105046', 'Geri Indra Joni', 'P', 1, 3, 1, 2016),
(453, '2016105047', 'Gitaria Larasati', 'L', 1, 3, 1, 2016),
(454, '2016105048', 'Hamidah', 'P', 1, 3, 1, 2016),
(455, '2016105049', 'M. Teguh Dwi Kusuma', 'L', 1, 3, 1, 2016),
(456, '2016105050', 'Marina Afriyanty', 'P', 1, 3, 1, 2016),
(457, '2016105051', 'Mira Santika', 'L', 1, 3, 1, 2016),
(458, '2016105052', 'Mislan Kuswara', 'P', 1, 3, 1, 2016),
(459, '2016105053', 'Nada Armita', 'L', 1, 3, 1, 2016),
(460, '2016105054', 'Nadila Tika Kusuma', 'P', 1, 3, 1, 2016),
(461, '2016105055', 'Nielda Junika', 'L', 1, 3, 1, 2016),
(462, '2016105056', 'Nina Lindasari', 'P', 1, 3, 1, 2016),
(463, '2016105057', 'Novia Maini', 'L', 1, 3, 1, 2016),
(464, '2016105058', 'Novia Sakina Putri', 'P', 1, 3, 1, 2016),
(465, '2016105059', 'Nur Isnaini Fatimah', 'L', 1, 3, 1, 2016),
(466, '2016105060', 'Rahmat Wastio Wicaksono', 'P', 1, 3, 1, 2016),
(467, '2016105061', 'Ratih Puspa Dewi', 'L', 1, 3, 1, 2016),
(468, '2016105062', 'Renny Fauzila', 'P', 1, 3, 1, 2016),
(469, '2016105063', 'Ria Riski Pinasti', 'L', 1, 3, 1, 2016),
(470, '2016105064', 'Roro Khaliqah Nadhirah', 'P', 1, 3, 1, 2016),
(471, '2016105065', 'Rosmidar', 'L', 1, 3, 1, 2016),
(472, '2016105066', 'Satriani Bhettrysia Manurung', 'P', 1, 3, 1, 2016),
(473, '2016105067', 'Siti Lailatul Qodri', 'L', 1, 3, 1, 2016),
(474, '2016105068', 'Stevanus Trionanda', 'P', 1, 3, 1, 2016),
(475, '2016105069', 'Syarfina Witri', 'L', 1, 3, 1, 2016),
(476, '2016105070', 'Yudi Purnama Aji', 'P', 1, 3, 1, 2016),
(477, '2016105071', 'Zian Oga', 'L', 1, 3, 1, 2016),
(478, '2016105072', 'Anugrah Perkasa', 'P', 1, 3, 1, 2016),
(479, '2016105073', 'Roy Erwin Kaban', 'L', 1, 3, 1, 2016),
(480, '2016105074', 'Friska Ruth Dina Sitorus', 'P', 1, 3, 1, 2016),
(481, '2016105075', 'Gunawan Saputera', 'L', 1, 3, 1, 2016),
(482, '2016105076', 'Novi Elissadora', 'P', 1, 3, 1, 2016),
(483, '2016105077', 'Zulfa Dianti', 'L', 1, 3, 1, 2016),
(484, '2016105078', 'Zainudin Ahmad Yani', 'P', 1, 3, 1, 2016),
(485, '2016105079', 'Ismy Kurniati', 'L', 1, 3, 1, 2016),
(486, '2016105080', 'Duma Yola Simanjuntak', 'P', 1, 3, 1, 2016),
(487, '2016105081', 'Mia Ariska', 'L', 1, 3, 1, 2016),
(488, '2016105082', 'Fitriani', 'P', 1, 3, 1, 2016),
(489, '2016105083', 'M.Arif', 'L', 1, 3, 1, 2016),
(490, '2016105084', 'Astuti', 'P', 1, 3, 1, 2016),
(491, '2017102001', 'Ardisoma Putra', 'L', 1, 1, 1, 2017),
(492, '2017102002', 'Ari Andesta Mirwandi', 'P', 1, 1, 2, 2017),
(493, '2017102003', 'Dessi Harsinta', 'P', 1, 1, 4, 2017),
(494, '2017102004', 'Fujiana', 'P', 1, 1, 1, 2017),
(495, '2017102005', 'Iin Febriansyah', 'P', 1, 1, 2, 2017),
(496, '2017102006', 'Jesy Krismoniyanti', 'P', 1, 1, 4, 2017),
(497, '2017102007', 'Lucsy Thelyana', 'P', 1, 1, 1, 2017),
(498, '2017102008', 'M. Ikhsan', 'L', 1, 1, 2, 2017),
(499, '2017102009', 'Mardiana', 'L', 1, 1, 4, 2017),
(500, '2017102010', 'Marisha Ramadani', 'P', 1, 1, 1, 2017),
(501, '2017102011', 'Mawar Pratiwi', 'P', 1, 1, 2, 2017),
(502, '2017102012', 'Megawati', 'P', 1, 1, 4, 2017),
(503, '2017102013', 'Mikhael Rianto Nanuru', 'L', 1, 1, 1, 2017),
(504, '2017102014', 'Muhamad Al Rasyid', 'L', 1, 1, 2, 2017),
(505, '2017102015', 'Nurul Amirah Najla', 'P', 1, 1, 4, 2017),
(506, '2017102016', 'Ove Roza Putri R. Linge', 'P', 1, 1, 1, 2017),
(507, '2017102017', 'Piyola Charina Putri', 'P', 1, 1, 2, 2017),
(508, '2017102018', 'Rismawaty Ruth Theodora Limbong', 'L', 1, 1, 4, 2017),
(509, '2017102019', 'Rohimatul Munawwaroh', 'L', 1, 1, 1, 2017),
(510, '2017102020', 'Siti Rohayati', 'P', 1, 1, 2, 2017),
(511, '2017102021', 'Taupik', 'P', 1, 1, 4, 2017),
(512, '2017102022', 'Vabiola Anggriani Sakri', 'P', 1, 1, 1, 2017),
(513, '2017102023', 'Anjas Asmara', 'L', 1, 1, 2, 2017),
(514, '2017102024', 'Aprilia Suraini', 'L', 1, 1, 4, 2017),
(515, '2017102025', 'Aulia Rizki', 'P', 1, 1, 1, 2017),
(516, '2017102026', 'Cici Sahriani Br. Manullang', 'P', 1, 1, 2, 2017),
(517, '2017102027', 'Debby Andrianto', 'P', 1, 1, 4, 2017),
(518, '2017102028', 'Desmaria Lumbantoruan', 'L', 1, 1, 1, 2017),
(519, '2017102029', 'Diah Ayu Susilowati', 'L', 1, 1, 2, 2017),
(520, '2017102030', 'Dwi Wahyuningsih', 'P', 1, 1, 4, 2017),
(521, '2017102031', 'Fani Setia Wirawan', 'P', 1, 1, 1, 2017),
(522, '2017102032', 'Fauzizah Eka Destiana', 'P', 1, 1, 2, 2017),
(523, '2017102033', 'Hasma Wati', 'L', 1, 1, 4, 2017),
(524, '2017102034', 'Maslakha', 'L', 1, 1, 1, 2017),
(525, '2017102035', 'Nindy Ratna Milasari', 'P', 1, 1, 2, 2017),
(526, '2017102036', 'Nova Visa Rika', 'P', 1, 1, 4, 2017),
(527, '2017102037', 'Nurul Hidayah', 'P', 1, 1, 1, 2017),
(528, '2017102038', 'Ryzkie Akbar Dipamarannu', 'L', 1, 1, 2, 2017),
(529, '2017102039', 'Sariana', 'L', 1, 1, 4, 2017),
(530, '2017102040', 'Yuni Santika', 'P', 1, 1, 1, 2017),
(531, '2017102041', 'Zesa Maulana Kasogi', 'P', 1, 1, 2, 2017),
(532, '2017102042', 'Rokhimah', 'P', 1, 1, 4, 2017),
(533, '2017102043', 'Safnita Yuni Ambarita', 'L', 1, 1, 1, 2017),
(534, '2017102044', 'Srisismawati', 'L', 1, 1, 2, 2017),
(535, '2017102045', 'Muhairiyati', 'P', 1, 1, 4, 2017),
(536, '2017102046', 'Imam Solihin', 'P', 1, 1, 1, 2017),
(537, '2017102047', 'Adela Yudeska', 'P', 1, 1, 2, 2017),
(538, '2017102048', 'Hanniky Pertiwi', 'L', 1, 1, 4, 2017),
(539, '2017114001', 'Ardian Majid', 'L', 1, 2, 1, 2017),
(540, '2017114002', 'Ari Restuhadi', 'P', 1, 2, 2, 2017),
(541, '2017114003', 'Asba Budi Widyanto', 'P', 1, 2, 4, 2017),
(542, '2017114004', 'Azra Yulia Rahayu', 'P', 1, 2, 1, 2017),
(543, '2017114005', 'Destia Sari', 'L', 1, 2, 2, 2017),
(544, '2017114006', 'Dewi Nurul Ayuni', 'L', 1, 2, 4, 2017),
(545, '2017114007', 'Dinra Rifaldi', 'P', 1, 2, 1, 2017),
(546, '2017114008', 'Eza Azliyanti', 'P', 1, 2, 2, 2017),
(547, '2017114009', 'Imi Zianti', 'P', 1, 2, 4, 2017),
(548, '2017114010', 'Jumaira', 'L', 1, 2, 1, 2017),
(549, '2017114011', 'Kharisma', 'L', 1, 2, 2, 2017),
(550, '2017114012', 'Lolita', 'P', 1, 2, 4, 2017),
(551, '2017114013', 'Murdiani', 'P', 1, 2, 1, 2017),
(552, '2017114014', 'Nur Hafizah Alma Diana', 'P', 1, 2, 2, 2017),
(553, '2017114015', 'Oktaviani Dwi Putri', 'L', 1, 2, 4, 2017),
(554, '2017114016', 'Ririn Syintia Nendela', 'L', 1, 2, 1, 2017),
(555, '2017114017', 'Riska Atmanegara', 'P', 1, 2, 2, 2017),
(556, '2017114018', 'Risti Anggita', 'P', 1, 2, 4, 2017),
(557, '2017114019', 'Rosyanti Sitorus', 'P', 1, 2, 1, 2017),
(558, '2017114020', 'Sandi Oktora', 'L', 1, 2, 2, 2017),
(559, '2017114021', 'Sarkawi', 'L', 1, 2, 4, 2017),
(560, '2017114022', 'Selly Soraya', 'P', 1, 2, 1, 2017),
(561, '2017114023', 'Siti Hidayati', 'P', 1, 2, 2, 2017),
(562, '2017114024', 'Tita Rizki Anggriani', 'P', 1, 2, 4, 2017),
(563, '2017114025', 'Ulan Dari', 'L', 1, 2, 1, 2017),
(564, '2017114026', 'Wahyu Pratama', 'L', 1, 2, 2, 2017),
(565, '2017114027', 'Wihelmina Noni', 'P', 1, 2, 4, 2017),
(566, '2017114028', 'Yola Rodia Misnawati', 'P', 1, 2, 1, 2017),
(567, '2017114029', 'Alifa Fisca Dharmawan', 'P', 1, 2, 2, 2017),
(568, '2017114030', 'Ayu Dwi Mulyani', 'L', 1, 2, 4, 2017),
(569, '2017114031', 'Azheinita Eka Putri', 'L', 1, 2, 1, 2017),
(570, '2017114032', 'Desti Indriyanti', 'P', 1, 2, 2, 2017),
(571, '2017114033', 'Devi Syahputri', 'P', 1, 2, 4, 2017),
(572, '2017114034', 'Dwi Syafitri', 'P', 1, 2, 1, 2017),
(573, '2017114035', 'Efrilla Taurusia', 'L', 1, 2, 2, 2017),
(574, '2017114036', 'Erika', 'L', 1, 2, 4, 2017),
(575, '2017114037', 'Haryati', 'P', 1, 2, 1, 2017),
(576, '2017114038', 'Hesty Mirviasari', 'P', 1, 2, 2, 2017),
(577, '2017114039', 'Lyzha Efendi', 'P', 1, 2, 4, 2017),
(578, '2017114040', 'Marni Juwita', 'L', 1, 2, 1, 2017),
(579, '2017114041', 'Maryanik Nanda Wulan Mayang Sari', 'L', 1, 2, 2, 2017),
(580, '2017114042', 'Massytah', 'P', 1, 2, 4, 2017),
(581, '2017114043', 'Mega Trisnawati', 'P', 1, 2, 1, 2017),
(582, '2017114044', 'Mery Maharani', 'P', 1, 2, 2, 2017),
(583, '2017114045', 'Mira Lestari', 'L', 1, 2, 4, 2017),
(584, '2017114046', 'Nadia Husna Salamah', 'L', 1, 2, 1, 2017),
(585, '2017114047', 'Nadya Utary', 'P', 1, 2, 2, 2017),
(586, '2017114048', 'Nolis Febry Anggraini', 'P', 1, 2, 4, 2017),
(587, '2017114049', 'Nurkumala', 'P', 1, 2, 1, 2017),
(588, '2017114050', 'Peri Amando Lingga', 'L', 1, 2, 2, 2017),
(589, '2017114051', 'Riana Putri Meilani', 'L', 1, 2, 4, 2017),
(590, '2017114052', 'Rido Hermawan', 'P', 1, 2, 1, 2017),
(591, '2017114053', 'Rini Ariani Purba', 'P', 1, 2, 2, 2017),
(592, '2017114054', 'Riska Septihardani', 'P', 1, 2, 4, 2017),
(593, '2017114055', 'Septryna Rahma Yolla', 'L', 1, 2, 1, 2017),
(594, '2017114056', 'Siti Amini', 'L', 1, 2, 2, 2017),
(595, '2017114057', 'Siti Nurhasidah', 'P', 1, 2, 4, 2017),
(596, '2017114058', 'Suci Ratna Sari', 'P', 1, 2, 1, 2017),
(597, '2017114059', 'Syrry Hidayani', 'P', 1, 2, 2, 2017),
(598, '2017114060', 'Tirton Harinata Simanjuntak', 'L', 1, 2, 4, 2017),
(599, '2017114061', 'Werni Nopita', 'L', 1, 2, 1, 2017),
(600, '2017114062', 'Wika Khairinnisa', 'P', 1, 2, 2, 2017),
(601, '2017114063', 'Yuni Fadila', 'P', 1, 2, 4, 2017),
(602, '2017114064', 'Mazlan', 'P', 1, 2, 1, 2017),
(603, '2017114065', 'Rasidin', 'L', 1, 2, 2, 2017),
(604, '2017114066', 'Mala Sari', 'L', 1, 2, 4, 2017),
(605, '2017114067', 'Yuli Hartini', 'P', 1, 2, 1, 2017),
(606, '2017114068', 'Vitri Aprillia', 'P', 1, 2, 2, 2017),
(607, '2017114069', 'Mega Mustika', 'P', 1, 2, 4, 2017),
(608, '2017114070', 'Widia Ningrum', 'L', 1, 2, 1, 2017),
(609, '2017114071', 'Puja Septiwidara', 'L', 1, 2, 2, 2017),
(610, '2017114072', 'Eggy Amelia Putri', 'P', 1, 2, 4, 2017),
(611, '2017114073', 'Novica Soviyanti', 'P', 1, 2, 1, 2017),
(612, '2017114074', 'Elis Pratiwi', 'P', 1, 2, 2, 2017),
(613, '2017114075', 'Jumaida Afrilia', 'L', 1, 2, 4, 2017),
(614, '2017114076', 'Diana', 'L', 1, 2, 1, 2017),
(615, '2017114077', 'Ryan Rahman Setiawan', 'P', 1, 2, 2, 2017),
(616, '2017114078', 'Diki Harianto', 'P', 1, 2, 4, 2017),
(617, '2017114079', 'Ulli Pena Ardo Prianto', 'P', 1, 2, 1, 2017),
(618, '2017114080', 'Heni Widya Yanti', 'L', 1, 2, 2, 2017),
(619, '2017114081', 'Fittriyana Sari', 'L', 1, 2, 4, 2017),
(620, '2017114082', 'Nurshalin', 'P', 1, 2, 1, 2017),
(621, '2017114083', 'Dian Cita Juriza', 'P', 1, 2, 2, 2017),
(622, '2017114084', 'Dini Fitri', 'P', 1, 2, 4, 2017),
(623, '2017114085', 'Luwiyanti', 'L', 1, 2, 1, 2017),
(624, '2017114086', 'Nopi Pahlelawati', 'L', 1, 2, 2, 2017),
(625, '2017105001', 'Artika Sahfitri', 'P', 1, 3, 2, 2017),
(626, '2017105002', 'Asih Yundani', 'L', 1, 3, 4, 2017),
(627, '2017105003', 'Chyntia Prihatika Hardiyanti', 'L', 1, 3, 1, 2017),
(628, '2017105004', 'Dwi Arimi', 'P', 1, 3, 2, 2017),
(629, '2017105005', 'Eko Hermanto', 'L', 1, 3, 4, 2017),
(630, '2017105006', 'Endang Striyana', 'L', 1, 3, 1, 2017),
(631, '2017105007', 'Etik Triwahyuni', 'P', 1, 3, 2, 2017),
(632, '2017105008', 'Hesi Kusuma', 'L', 1, 3, 4, 2017),
(633, '2017105009', 'Hotlita Banjarnahor', 'L', 1, 3, 1, 2017),
(634, '2017105010', 'Jannati', 'P', 1, 3, 2, 2017),
(635, '2017105011', 'Kharisma Yoga S', 'L', 1, 3, 4, 2017),
(636, '2017105012', 'Lestari Hutagalung', 'L', 1, 3, 1, 2017),
(637, '2017105013', 'Lili Endang', 'P', 1, 3, 2, 2017),
(638, '2017105014', 'M. Hafiz', 'L', 1, 3, 4, 2017),
(639, '2017105015', 'Melisa', 'L', 1, 3, 1, 2017),
(640, '2017105016', 'Muhammad Uzair', 'P', 1, 3, 2, 2017),
(641, '2017105017', 'Nor Evtiana', 'L', 1, 3, 4, 2017),
(642, '2017105018', 'Novianty Ambarita', 'L', 1, 3, 1, 2017),
(643, '2017105019', 'Novita Three Putri Hastoni', 'P', 1, 3, 2, 2017),
(644, '2017105020', 'Nurjana Febrian Anggraini', 'L', 1, 3, 4, 2017),
(645, '2017105021', 'Nurmala Sari', 'L', 1, 3, 1, 2017),
(646, '2017105022', 'R. Seri Wahyuni', 'P', 1, 3, 2, 2017),
(647, '2017105023', 'Regina Rahmadiyanti', 'L', 1, 3, 4, 2017),
(648, '2017105024', 'Ronal Pakpahan', 'L', 1, 3, 1, 2017),
(649, '2017105025', 'Sukri Afiansyah', 'P', 1, 3, 2, 2017),
(650, '2017105026', 'Sustriliani', 'L', 1, 3, 4, 2017),
(651, '2017105027', 'Afifah Faradila', 'L', 1, 3, 1, 2017),
(652, '2017105028', 'Alya Desi Deria', 'P', 1, 3, 2, 2017),
(653, '2017105029', 'Anggi Namora Hutasuhut', 'L', 1, 3, 4, 2017),
(654, '2017105030', 'Annadini Farhatani', 'L', 1, 3, 1, 2017),
(655, '2017105031', 'Aprilya Puspita Sari', 'P', 1, 3, 2, 2017),
(656, '2017105032', 'Ayu Rosmini', 'L', 1, 3, 4, 2017),
(657, '2017105033', 'Edo Apriadi', 'L', 1, 3, 1, 2017),
(658, '2017105034', 'Eki Sandra', 'P', 1, 3, 2, 2017),
(659, '2017105035', 'Feby Novianti Utami', 'L', 1, 3, 4, 2017),
(660, '2017105036', 'Firdaus', 'L', 1, 3, 1, 2017),
(661, '2017105037', 'Fitriani Widyaningsih', 'P', 1, 3, 2, 2017),
(662, '2017105038', 'Fitriyani', 'L', 1, 3, 4, 2017),
(663, '2017105039', 'Gracecia Olivia Manurung', 'L', 1, 3, 1, 2017),
(664, '2017105040', 'Hernia', 'P', 1, 3, 2, 2017),
(665, '2017105041', 'Jefriadi', 'L', 1, 3, 4, 2017),
(666, '2017105042', 'Maica', 'L', 1, 3, 1, 2017),
(667, '2017105043', 'Mayzura', 'P', 1, 3, 2, 2017),
(668, '2017105044', 'Medi Pardiansyah', 'L', 1, 3, 4, 2017),
(669, '2017105045', 'Mery Diana Linggar Jati', 'L', 1, 3, 1, 2017),
(670, '2017105046', 'Mira Dianti', 'P', 1, 3, 2, 2017),
(671, '2017105047', 'Muhammad Razali', 'L', 1, 3, 4, 2017),
(672, '2017105048', 'Muhammad Rio Al Khafid', 'L', 1, 3, 1, 2017),
(673, '2017105049', 'Nia Oktavira', 'P', 1, 3, 2, 2017),
(674, '2017105050', 'Nur Irdawati', 'L', 1, 3, 4, 2017),
(675, '2017105051', 'Nurhayati', 'L', 1, 3, 1, 2017),
(676, '2017105052', 'Oka Lestari', 'P', 1, 3, 2, 2017),
(677, '2017105053', 'Panca Satria Putra', 'L', 1, 3, 4, 2017),
(678, '2017105054', 'Pratiwi Sari Juada', 'L', 1, 3, 1, 2017),
(679, '2017105055', 'Rama Liyana', 'P', 1, 3, 2, 2017),
(680, '2017105056', 'Ria Kusuma', 'L', 1, 3, 4, 2017),
(681, '2017105057', 'Rico Wiranto', 'L', 1, 3, 1, 2017),
(682, '2017105058', 'Rimasni', 'P', 1, 3, 2, 2017),
(683, '2017105059', 'Saleha', 'L', 1, 3, 4, 2017),
(684, '2017105060', 'Sela Darmita', 'L', 1, 3, 1, 2017),
(685, '2017105061', 'Seri Noradila', 'P', 1, 3, 2, 2017),
(686, '2017105062', 'Siska Afradila', 'L', 1, 3, 4, 2017),
(687, '2017105063', 'Titin Ria Ferianti Sinurat', 'L', 1, 3, 1, 2017),
(688, '2017105064', 'Utari', 'P', 1, 3, 2, 2017),
(689, '2017105065', 'Yetri', 'L', 1, 3, 4, 2017),
(690, '2017105066', 'Zulhimi Hidayat Simatupang', 'L', 1, 3, 1, 2017),
(691, '2017105067', 'Vitra Alifya Istiqomah', 'P', 1, 3, 2, 2017),
(692, '2017105068', 'Misterli', 'L', 1, 3, 4, 2017),
(693, '2017105069', 'Asih Trisna Utami', 'L', 1, 3, 1, 2017),
(694, '2017105070', 'Sopatri Dewi', 'P', 1, 3, 2, 2017),
(695, '2017105071', 'Maisuryati', 'L', 1, 3, 4, 2017),
(696, '2017105072', 'Syazrina Iwan', 'L', 1, 3, 1, 2017),
(697, '2017105073', 'Syahril', 'P', 1, 3, 2, 2017),
(698, '2017105074', 'Ferbina Br Tarigan', 'L', 1, 3, 4, 2017),
(699, '2017105075', 'Fitri Mahendi Prameswari', 'L', 1, 3, 1, 2017),
(700, '2017105076', 'Nurkhairiyah', 'P', 1, 3, 2, 2017),
(701, '2017105077', 'Destarida', 'L', 1, 3, 4, 2017),
(702, '2017105078', 'Reni Kurniati', 'L', 1, 3, 1, 2017),
(703, '2017105079', 'Muhammad Helmi', 'P', 1, 3, 2, 2017),
(704, '2017105080', 'Wan Mita Pratiwi', 'L', 1, 3, 4, 2017),
(705, '2017105081', 'Nova Puspita', 'L', 1, 3, 1, 2017),
(706, '2017105082', 'Azirawati', 'P', 1, 3, 2, 2017),
(707, '2017105083', 'Sudarsinah', 'L', 1, 3, 4, 2017),
(708, '2017105084', 'Desi Aliska', 'L', 1, 3, 1, 2017),
(709, '2017105085', 'Ismalina Anggriani', 'P', 1, 3, 2, 2017),
(710, '2017105086', 'Ilham', 'L', 1, 3, 4, 2017),
(711, '2017105087', 'Melia Ariska', 'L', 1, 3, 1, 2017),
(712, '2017105088', 'Andika', 'P', 1, 3, 2, 2017),
(713, '2017105089', 'Gustara Putra', 'L', 1, 3, 4, 2017),
(714, '2017105090', 'Tewi Novitasari', 'L', 1, 3, 1, 2017),
(715, '2017105091', 'M.Salim', 'P', 1, 3, 2, 2017),
(716, '2017105092', 'Julian Anggar Kesuma Siregar', 'L', 1, 3, 4, 2017),
(717, '2017105093', 'Meizy Keniloreah', 'L', 1, 3, 1, 2017),
(718, '2017105094', 'Eka Riski Wahyuni', 'P', 1, 3, 2, 2017),
(719, '2017105095', 'Cici Paramida', 'L', 1, 3, 4, 2017),
(720, '2017105096', 'Haripin', 'L', 1, 3, 1, 2017),
(721, '2017105097', 'Juprizal', 'P', 1, 3, 2, 2017),
(722, '2017105098', 'Atika Putri Oktapiani', 'L', 1, 3, 4, 2017),
(723, '2017105099', 'Ranti Fitri', 'L', 1, 3, 1, 2017),
(724, '2017105100', 'Yorendi Papiyanto', 'P', 1, 3, 2, 2017),
(808, '2018102001', 'Agung Agustinoval', 'L', 1, 1, 1, 2018),
(809, '2018102002', 'Albet Suganda', 'P', 1, 1, 2, 2018),
(810, '2018102003', 'Aulia Berlina', 'L', 1, 1, 4, 2018),
(811, '2018102004', 'Dara Nikara', 'P', 1, 1, 1, 2018),
(812, '2018102005', 'Destriana Trisara', 'L', 1, 1, 2, 2018),
(813, '2018102006', 'Devi Indriani', 'L', 1, 1, 4, 2018),
(814, '2018102007', 'Doni Prayoga', 'P', 1, 1, 1, 2018),
(815, '2018102008', 'Dova Rahmat Oldesta', 'L', 1, 1, 2, 2018),
(816, '2018102009', 'Evi Ramaniah', 'P', 1, 1, 4, 2018),
(817, '2018102010', 'Fitria Nengsih', 'L', 1, 1, 1, 2018),
(818, '2018102011', 'Gugum Gumilar', 'L', 1, 1, 2, 2018),
(819, '2018102012', 'Henny Fransisca', 'P', 1, 1, 4, 2018),
(820, '2018102013', 'Heti Hidayah', 'L', 1, 1, 1, 2018),
(821, '2018102014', 'Imartisya', 'P', 1, 1, 2, 2018),
(822, '2018102015', 'Julia Andresta Lubis', 'L', 1, 1, 4, 2018),
(823, '2018102016', 'Mega Puspita Sari', 'L', 1, 1, 1, 2018),
(824, '2018102017', 'Mutiara Octaviani Pangestika', 'P', 1, 1, 2, 2018),
(825, '2018102018', 'Nada Agustiana', 'L', 1, 1, 4, 2018),
(826, '2018102019', 'Nendy Tiranda Ivani', 'P', 1, 1, 1, 2018),
(827, '2018102020', 'Noraini', 'L', 1, 1, 2, 2018),
(828, '2018102021', 'Novita Indah Nursanti', 'L', 1, 1, 1, 2018),
(829, '2018102022', 'Nurharipah', 'P', 1, 1, 2, 2018),
(830, '2018102023', 'Oktavia Andrian Yuri', 'L', 1, 1, 4, 2018),
(831, '2018102024', 'Pristya Dhea Natasya', 'P', 1, 1, 1, 2018),
(832, '2018102025', 'Raja Nopiyanti', 'L', 1, 1, 2, 2018),
(833, '2018102026', 'Ratna', 'L', 1, 1, 4, 2018),
(834, '2018102027', 'Rini Fitriani', 'P', 1, 1, 1, 2018),
(835, '2018102028', 'Safitri', 'L', 1, 1, 2, 2018),
(836, '2018102029', 'Sandy Joshua', 'P', 1, 1, 4, 2018),
(837, '2018102030', 'Sasmita', 'L', 1, 1, 1, 2018),
(838, '2018102031', 'Seily Wulandari', 'L', 1, 1, 2, 2018),
(839, '2018102032', 'Taufik Muharram', 'P', 1, 1, 4, 2018),
(840, '2018102033', 'Tiara Suci Pratiwi', 'L', 1, 1, 1, 2018),
(841, '2018102034', 'Wan Muhammad Ridwan Hasyari', 'P', 1, 1, 2, 2018),
(842, '2018102035', 'Wulandari Noviriani', 'L', 1, 1, 4, 2018),
(843, '2018102036', 'Zulia Putri', 'L', 1, 1, 1, 2018),
(844, '2018102037', 'Akika Suri', 'P', 1, 1, 2, 2018),
(845, '2018102038', 'Alimatusyadya', 'L', 1, 1, 4, 2018),
(846, '2018102039', 'Aljabar', 'P', 1, 1, 1, 2018),
(847, '2018102040', 'Anita Rahmah Wandania', 'L', 1, 1, 2, 2018),
(848, '2018102041', 'Deannisa Anabella', 'L', 1, 1, 4, 2018),
(849, '2018102042', 'Deri Gusta Rendi', 'P', 1, 1, 1, 2018),
(850, '2018102043', 'Dessy Ratnasari', 'L', 1, 1, 2, 2018),
(851, '2018102044', 'Deti Mahfuzah', 'P', 1, 1, 4, 2018),
(852, '2018102045', 'Eki Remon', 'L', 1, 1, 1, 2018),
(853, '2018102046', 'Fabella Machfira', 'L', 1, 1, 2, 2018),
(854, '2018102047', 'Fadli Yonata', 'P', 1, 1, 4, 2018),
(855, '2018102048', 'Feriwanto.Sirait', 'L', 1, 1, 1, 2018),
(856, '2018102049', 'Fitri Astutie Rusbandiri', 'P', 1, 1, 2, 2018),
(857, '2018102050', 'Gloria Hilliari', 'L', 1, 1, 4, 2018),
(858, '2018102051', 'Hairun Tunisa', 'L', 1, 1, 1, 2018),
(859, '2018102052', 'Hanisah Hadi', 'P', 1, 1, 2, 2018),
(860, '2018102053', 'Hikmal Wahyudi', 'L', 1, 1, 4, 2018),
(861, '2018102054', 'Jihan Pratidya', 'P', 1, 1, 1, 2018),
(862, '2018102055', 'Lista Kumala Sari Sinaga', 'L', 1, 1, 2, 2018),
(863, '2018102056', 'Maria Ratu Rosari Berek', 'L', 1, 1, 1, 2018),
(864, '2018102057', 'Mekar Pratiwi', 'P', 1, 1, 2, 2018),
(865, '2018102058', 'Novita Sari', 'L', 1, 1, 4, 2018),
(866, '2018102059', 'Nurhandika Sepvia Putri', 'P', 1, 1, 1, 2018),
(867, '2018102060', 'Palopi Rizka Yolanda', 'L', 1, 1, 2, 2018),
(868, '2018102061', 'Regita Maharani Ardhia Safitri', 'L', 1, 1, 4, 2018),
(869, '2018102062', 'Rini Rezeki', 'P', 1, 1, 1, 2018),
(870, '2018102063', 'Rizka Machiafelinda', 'L', 1, 1, 2, 2018),
(871, '2018102064', 'Sakdiyah', 'P', 1, 1, 4, 2018),
(872, '2018102065', 'Sarifah Zarima', 'L', 1, 1, 1, 2018),
(873, '2018102066', 'Sartika Istiqomah', 'L', 1, 1, 2, 2018),
(874, '2018102067', 'Siti Amalia Nabila', 'P', 1, 1, 4, 2018),
(875, '2018102068', 'Sri Mulyati', 'L', 1, 1, 1, 2018),
(876, '2018102069', 'Syahrendy', 'P', 1, 1, 2, 2018),
(877, '2018102070', 'Ukma Dayana', 'L', 1, 1, 4, 2018),
(878, '2018102071', 'Yolanda Aryanti', 'L', 1, 1, 1, 2018),
(879, '2018102072', 'Yosafat Christian', 'P', 1, 1, 2, 2018),
(880, '2018102073', 'Yunita Mardiana Sinta', 'L', 1, 1, 4, 2018),
(881, '2018102074', 'Zaya Ummu Syabila', 'P', 1, 1, 1, 2018),
(882, '2018102075', 'Pamela Gloriez', 'L', 1, 1, 2, 2018),
(883, '2018102076', 'Astri Rahma Putri', 'L', 1, 1, 4, 2018),
(884, '2018102077', 'Medyta Saraswati', 'P', 1, 1, 1, 2018),
(885, '2018102078', 'Saidah', 'L', 1, 1, 2, 2018),
(886, '2018102079', 'Lilis Arianti', 'P', 1, 1, 4, 2018),
(887, '2018102080', 'Liza Putri Fitriani', 'L', 1, 1, 1, 2018),
(888, '2018102081', 'Randi', 'L', 1, 1, 2, 2018),
(889, '2018102082', 'Cindy Ida Ayunesia', 'P', 1, 1, 4, 2018),
(890, '2018102083', 'Melfanalia Purba', 'L', 1, 1, 1, 2018),
(891, '2018102084', 'Sulastri', 'P', 1, 1, 2, 2018),
(892, '2018102085', 'Oktavianti', 'L', 1, 1, 4, 2018),
(893, '2018102086', 'Rahmany Silmy Kaffah', 'L', 1, 1, 1, 2018),
(894, '2018102087', 'Julia Jelita', 'P', 1, 1, 2, 2018),
(895, '2018102088', 'Daniel Logika Amajihono', 'L', 1, 1, 4, 2018),
(896, '2018102089', 'Reza Fadilah', 'P', 1, 1, 1, 2018),
(897, '2018102090', 'Sima Sari', 'L', 1, 1, 2, 2018),
(898, '2018102091', 'Briyan Sitinjak', 'L', 1, 1, 1, 2018),
(899, '2018102092', 'Rendy Zakir Oktavian', 'P', 1, 1, 2, 2018),
(900, '2018102093', 'Aripin', 'L', 1, 1, 4, 2018),
(901, '2018114001', 'Amira', 'P', 1, 2, 1, 2018),
(902, '2018114002', 'Anis Wardaini', 'L', 1, 2, 2, 2018),
(903, '2018114003', 'Bobby Manullang', 'L', 1, 2, 4, 2018),
(904, '2018114004', 'Dini Mariani Halawa', 'P', 1, 2, 1, 2018),
(905, '2018114005', 'Erick Kurniansyah', 'L', 1, 2, 2, 2018),
(906, '2018114006', 'Eti Lestari', 'P', 1, 2, 4, 2018),
(907, '2018114007', 'Isnana', 'L', 1, 2, 1, 2018),
(908, '2018114008', 'Julian Saputra', 'L', 1, 2, 2, 2018),
(909, '2018114009', 'Kartina Devi', 'P', 1, 2, 4, 2018),
(910, '2018114010', 'M.Ali Hanapiah', 'L', 1, 2, 1, 2018),
(911, '2018114011', 'Muhammad Amin', 'P', 1, 2, 2, 2018),
(912, '2018114012', 'Mutia Evita Sari', 'L', 1, 2, 4, 2018),
(913, '2018114013', 'Nicko Pratama', 'L', 1, 2, 1, 2018),
(914, '2018114014', 'Nur Adia', 'P', 1, 2, 2, 2018),
(915, '2018114015', 'Safaratul Aini', 'L', 1, 2, 4, 2018),
(916, '2018114016', 'Shelly Tsaniah', 'P', 1, 2, 1, 2018),
(917, '2018114017', 'Siti Zulaiha', 'L', 1, 2, 2, 2018),
(918, '2018114018', 'Sri Yulita', 'L', 1, 2, 4, 2018),
(919, '2018114019', 'Anggi Arnindi', 'P', 1, 2, 1, 2018),
(920, '2018114020', 'Ansyari Idris', 'L', 1, 2, 2, 2018),
(921, '2018114021', 'Ayudiya As`Sarifa Dewi', 'P', 1, 2, 1, 2018),
(922, '2018114022', 'Azian', 'L', 1, 2, 2, 2018),
(923, '2018114023', 'Diki Andana', 'L', 1, 2, 4, 2018),
(924, '2018114024', 'Embun Mutiara Fitriany', 'P', 1, 2, 1, 2018),
(925, '2018114025', 'Esra Lamsehat Lumbantobing', 'L', 1, 2, 2, 2018),
(926, '2018114026', 'Ira Purnama Sari', 'P', 1, 2, 4, 2018),
(927, '2018114027', 'Joel Paschalis Silitonga', 'L', 1, 2, 1, 2018),
(928, '2018114028', 'Mustafa Rajuli', 'L', 1, 2, 2, 2018),
(929, '2018114029', 'Nanda Wulandhari', 'P', 1, 2, 4, 2018),
(930, '2018114030', 'Naomi Audya Zhon Situmorang', 'L', 1, 2, 1, 2018),
(931, '2018114031', 'Nasarudin', 'P', 1, 2, 2, 2018),
(932, '2018114032', 'Nathalia Veronica', 'L', 1, 2, 4, 2018),
(933, '2018114033', 'Rahman Syahid', 'L', 1, 2, 1, 2018),
(934, '2018114034', 'Refli', 'P', 1, 2, 2, 2018),
(935, '2018114035', 'Widya Ningsih', 'L', 1, 2, 4, 2018),
(936, '2018114036', 'Wulan Rahayu Ningtyas', 'P', 1, 2, 1, 2018),
(937, '2018114037', 'Yeyen Harisda', 'L', 1, 2, 2, 2018),
(938, '2018114038', 'Fanny Hidayati Eka Putri', 'L', 1, 2, 4, 2018),
(939, '2018114039', 'Ratna Yunita', 'P', 1, 2, 1, 2018),
(940, '2018114040', 'Arning Pratiwi', 'L', 1, 2, 2, 2018),
(941, '2018114041', 'Cheni Herviany Anggriany', 'P', 1, 2, 4, 2018),
(942, '2018114042', 'Herza Nurpazila', 'L', 1, 2, 1, 2018),
(943, '2018114043', 'Nurafendi', 'L', 1, 2, 2, 2018),
(944, '2018114044', 'Mifta Anggun Sari', 'P', 1, 2, 4, 2018),
(945, '2018114045', 'Deby Kartio', 'L', 1, 2, 1, 2018),
(946, '2018114046', 'Nova Herfina', 'P', 1, 2, 2, 2018),
(947, '2018114047', 'Abdul Rahman', 'L', 1, 2, 4, 2018),
(948, '2018114048', 'Dicky Pratama', 'L', 1, 2, 1, 2018),
(949, '2018114049', 'Varensya Ladyana', 'P', 1, 2, 2, 2018),
(950, '2018114050', 'Karina Anjani', 'L', 1, 2, 4, 2018),
(951, '2018114051', 'Intan Tri Handayani', 'P', 1, 2, 1, 2018),
(952, '2018114052', 'Risa', 'L', 1, 2, 2, 2018),
(953, '2018114053', 'Pratiwi Afrillia', 'L', 1, 2, 4, 2018),
(954, '2018114054', 'Dwi Susanti', 'P', 1, 2, 1, 2018),
(955, '2018114055', 'Darma Adi Putra', 'L', 1, 2, 2, 2018),
(956, '2018114056', 'Harlina', 'P', 1, 2, 1, 2018),
(957, '2018114057', 'Sri Ulandari', 'L', 1, 2, 2, 2018),
(958, '2018114058', 'Arief Spiandi', 'L', 1, 2, 4, 2018),
(959, '2018114059', 'Futri Wahyuni', 'P', 1, 2, 1, 2018),
(960, '2018114060', 'Putri Santina', 'L', 1, 2, 2, 2018),
(961, '2018114061', 'Supriadi', 'P', 1, 2, 4, 2018),
(962, '2018114062', 'Putra Alamsyah', 'L', 1, 2, 1, 2018),
(963, '2018114063', 'Reza Fariq Almondra', 'L', 1, 2, 2, 2018),
(964, '2018105001', 'Andrianto', 'P', 1, 3, 2, 2018),
(965, '2018105002', 'Desi Rizkiah', 'L', 1, 3, 4, 2018),
(966, '2018105003', 'Devina Christine Yeo', 'P', 1, 3, 1, 2018),
(967, '2018105004', 'Dewi Ewilianti', 'L', 1, 3, 2, 2018),
(968, '2018105005', 'Febri Mulyani', 'L', 1, 3, 4, 2018),
(969, '2018105006', 'Idris', 'P', 1, 3, 1, 2018),
(970, '2018105007', 'Indra Kusnabawito', 'L', 1, 3, 2, 2018),
(971, '2018105008', 'Lolita', 'P', 1, 3, 4, 2018),
(972, '2018105009', 'Mashidayu', 'L', 1, 3, 1, 2018),
(973, '2018105010', 'Mega Polorita', 'L', 1, 3, 2, 2018),
(974, '2018105011', 'Muhammad Syahrudi', 'P', 1, 3, 1, 2018),
(975, '2018105012', 'Murcida', 'L', 1, 3, 2, 2018),
(976, '2018105013', 'Nadia Apriyuni', 'P', 1, 3, 4, 2018),
(977, '2018105014', 'Najima Oktariani', 'L', 1, 3, 1, 2018),
(978, '2018105015', 'Novi Hasyiah', 'L', 1, 3, 2, 2018),
(979, '2018105016', 'Nur\'Ah Darina', 'P', 1, 3, 4, 2018),
(980, '2018105017', 'Nuriski Hana Septiani', 'L', 1, 3, 1, 2018),
(981, '2018105018', 'Nurul Asikin', 'P', 1, 3, 2, 2018),
(982, '2018105019', 'Ra\'Aina', 'L', 1, 3, 4, 2018),
(983, '2018105020', 'Rahmadhania', 'L', 1, 3, 1, 2018),
(984, '2018105021', 'Rasyid Arido', 'P', 1, 3, 2, 2018),
(985, '2018105022', 'Sarah', 'L', 1, 3, 4, 2018),
(986, '2018105023', 'Sendri', 'P', 1, 3, 1, 2018),
(987, '2018105024', 'Siti Nurhasanah', 'L', 1, 3, 2, 2018),
(988, '2018105025', 'Tria Handayani', 'L', 1, 3, 4, 2018),
(989, '2018105026', 'Wenny Andriani', 'P', 1, 3, 1, 2018),
(990, '2018105027', 'Yuliana Lestari', 'L', 1, 3, 2, 2018),
(991, '2018105028', 'Ahmad Fadly Masturoh', 'P', 1, 3, 4, 2018),
(992, '2018105029', 'Aisyah', 'L', 1, 3, 1, 2018),
(993, '2018105030', 'Anggie Dwi Septiana', 'L', 1, 3, 2, 2018),
(994, '2018105031', 'Bobi Supriyanto', 'P', 1, 3, 4, 2018),
(995, '2018105032', 'Dasa Novriyansah', 'L', 1, 3, 1, 2018),
(996, '2018105033', 'Dian Afriyeni', 'P', 1, 3, 2, 2018),
(997, '2018105034', 'Dira Aulia Sandriana', 'L', 1, 3, 1, 2018),
(998, '2018105035', 'Fanny Andariesta', 'L', 1, 3, 2, 2018),
(999, '2018105036', 'Febri Fajerin  ', 'P', 1, 3, 4, 2018),
(1000, '2018105037', 'Kurnia Lestiyanti', 'L', 1, 3, 1, 2018),
(1001, '2018105038', 'Nur Azila', 'P', 1, 3, 2, 2018),
(1002, '2018105039', 'Putri Yuliandari', 'L', 1, 3, 4, 2018);
INSERT INTO `tbl_mahasiswa` (`id`, `nim`, `nama`, `jk`, `id_fakultas`, `id_prodi`, `id_sekolah`, `ta`) VALUES
(1003, '2018105040', 'Ratih Trenasih', 'L', 1, 3, 1, 2018),
(1004, '2018105041', 'Rino Nopinaldo', 'P', 1, 3, 2, 2018),
(1005, '2018105042', 'Ripangga Febrianda', 'L', 1, 3, 4, 2018),
(1006, '2018105043', 'Rizqiyatulfitri Yanti', 'P', 1, 3, 1, 2018),
(1007, '2018105044', 'Sri Murni', 'L', 1, 3, 2, 2018),
(1008, '2018105045', 'Sumiati', 'L', 1, 3, 4, 2018),
(1009, '2018105046', 'Wan Nur Aniza', 'P', 1, 3, 1, 2018),
(1010, '2018105047', 'Wetti Safitri', 'L', 1, 3, 2, 2018),
(1011, '2018105048', 'Merisa Riski', 'P', 1, 3, 4, 2018),
(1012, '2018105049', 'Riska Syahrani Saputri', 'L', 1, 3, 1, 2018),
(1013, '2018105050', 'Chris Natalia Br Manurung', 'L', 1, 3, 2, 2018),
(1014, '2018105051', 'Maulana Ihsan', 'P', 1, 3, 4, 2018),
(1015, '2018105052', 'Al Gazali', 'L', 1, 3, 1, 2018),
(1016, '2018105053', 'Tesa Octafiona', 'P', 1, 3, 2, 2018),
(1017, '2018105054', 'Yustisi Sianturi', 'L', 1, 3, 4, 2018),
(1018, '2018105055', 'Wandi', 'L', 1, 3, 1, 2018),
(1019, '2018105056', 'Muhammad Agung', 'P', 1, 3, 2, 2018),
(1020, '2018105057', 'Abdi Sohlihin', 'L', 1, 3, 4, 2018),
(1021, '2018105058', 'Novita Maulida', 'P', 1, 3, 1, 2018),
(1022, '2018105059', 'Nur Hidayati', 'L', 1, 3, 2, 2018),
(1023, '2018105060', 'Septi Hajar', 'L', 1, 3, 4, 2018),
(1024, '2018105061', 'Riansyah', 'P', 1, 3, 1, 2018),
(1025, '2018105062', 'Maulana Ihsan', 'L', 1, 3, 2, 2018),
(1026, '2018105063', 'Indira Ghea Praditha', 'P', 1, 3, 4, 2018),
(1027, '2018105064', 'Rahmaita Safitri', 'L', 1, 3, 1, 2018),
(1028, '2018105065', 'Edy Susanto', 'L', 1, 3, 2, 2018),
(1029, '2018105066', 'Irwansyah', 'P', 1, 3, 4, 2018),
(1030, '2018105067', 'Cindy Febriana', 'L', 1, 3, 1, 2018),
(1031, '2018105068', 'Muhammad Ikhram', 'P', 1, 3, 2, 2018),
(1032, '2018105069', 'Marini', 'L', 1, 3, 1, 2018),
(1033, '2018105070', 'Nurul Fuadi', 'L', 1, 3, 2, 2018),
(1034, '2018105071', 'Anggara Pratama Putra', 'P', 1, 3, 4, 2018),
(1035, '2018105072', 'Fina Amalina', 'L', 1, 3, 1, 2018),
(1036, '2018105073', 'Gifari Aswat', 'P', 1, 3, 2, 2018),
(1037, '2018105074', 'Nurpiana', 'L', 1, 3, 4, 2018),
(1038, '2018105075', 'Ade Maya Alfiani', 'L', 1, 3, 1, 2018),
(1039, '2018105076', 'Lisdi Tri Utami', 'P', 1, 3, 2, 2018);

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_pmb`
--

CREATE TABLE `tbl_pmb` (
  `id_pmb` int(11) NOT NULL,
  `ta` varchar(10) NOT NULL,
  `id_fakultas` int(11) NOT NULL,
  `id_prodi` int(11) NOT NULL,
  `id_jenjang` int(11) NOT NULL,
  `jml_pendaftar` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tbl_pmb`
--

INSERT INTO `tbl_pmb` (`id_pmb`, `ta`, `id_fakultas`, `id_prodi`, `id_jenjang`, `jml_pendaftar`) VALUES
(1, '2012/2013', 1, 1, 1, 30),
(2, '2012/2013', 1, 1, 1, 40),
(3, '2013/2014', 1, 2, 2, 32);

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_prodi`
--

CREATE TABLE `tbl_prodi` (
  `id_prodi` int(11) NOT NULL,
  `prodi` varchar(50) NOT NULL,
  `id_fakultas` int(11) NOT NULL,
  `id_jenjang` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tbl_prodi`
--

INSERT INTO `tbl_prodi` (`id_prodi`, `prodi`, `id_fakultas`, `id_jenjang`) VALUES
(1, 'TI', 1, 1),
(2, 'SIKA', 1, 1),
(3, 'DKV', 1, 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_sekolah`
--

CREATE TABLE `tbl_sekolah` (
  `id_sekolah` int(11) NOT NULL,
  `nama_sekolah` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tbl_sekolah`
--

INSERT INTO `tbl_sekolah` (`id_sekolah`, `nama_sekolah`) VALUES
(1, 'SMKN 1 Kota CIrebon'),
(2, 'SMKN 2 Kota Cirebon'),
(4, 'SMK Informatika Kota Cirebon');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_users`
--

CREATE TABLE `tbl_users` (
  `id_users` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `nickname` varchar(50) NOT NULL,
  `img` varchar(100) NOT NULL DEFAULT 'default.png',
  `id_group` int(11) NOT NULL,
  `last_login` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `ip_address` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tbl_users`
--

INSERT INTO `tbl_users` (`id_users`, `username`, `password`, `nickname`, `img`, `id_group`, `last_login`, `ip_address`) VALUES
(1, 'sekretariat', 'b45238b6e7ee5c3344a196ef4f8f925c3981b073', 'Sekretariat', 'default.png', 2, '2020-07-27 15:48:10', '::1'),
(2, 'pimpinan', '59335c9f58c78597ff73f6706c6c8fa278e08b3a', 'Pimpinan', 'default.png', 3, '2020-07-27 16:30:31', '::1'),
(3, 'master', '4f26aeafdb2367620a393c973eddbe8f8b846ebd', 'Administrator', 'default.png', 1, '2020-07-27 01:10:27', '::1');

-- --------------------------------------------------------

--
-- Stand-in structure for view `v_prediksi_global`
-- (Lihat di bawah untuk tampilan aktual)
--
CREATE TABLE `v_prediksi_global` (
`tahun` year(4)
,`dist` bigint(21)
);

-- --------------------------------------------------------

--
-- Stand-in structure for view `v_prediksi_prodi`
-- (Lihat di bawah untuk tampilan aktual)
--
CREATE TABLE `v_prediksi_prodi` (
`tahun` year(4)
,`dist` bigint(21)
,`id_prodi` int(11)
);

-- --------------------------------------------------------

--
-- Struktur untuk view `v_prediksi_global`
--
DROP TABLE IF EXISTS `v_prediksi_global`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `v_prediksi_global`  AS  select `tbl_mahasiswa`.`ta` AS `tahun`,count(`tbl_mahasiswa`.`nim`) AS `dist` from `tbl_mahasiswa` group by `tbl_mahasiswa`.`ta` order by `tbl_mahasiswa`.`ta` ;

-- --------------------------------------------------------

--
-- Struktur untuk view `v_prediksi_prodi`
--
DROP TABLE IF EXISTS `v_prediksi_prodi`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `v_prediksi_prodi`  AS  select `tbl_mahasiswa`.`ta` AS `tahun`,count(`tbl_mahasiswa`.`nim`) AS `dist`,`tbl_mahasiswa`.`id_prodi` AS `id_prodi` from `tbl_mahasiswa` group by `tbl_mahasiswa`.`ta`,`tbl_mahasiswa`.`id_prodi` order by `tbl_mahasiswa`.`ta`,`tbl_mahasiswa`.`id_prodi` ;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `lap_prediksi`
--
ALTER TABLE `lap_prediksi`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_distribution`
--
ALTER TABLE `tbl_distribution`
  ADD PRIMARY KEY (`id_dist`);

--
-- Indexes for table `tbl_fakultas`
--
ALTER TABLE `tbl_fakultas`
  ADD PRIMARY KEY (`id_fakultas`);

--
-- Indexes for table `tbl_group_users`
--
ALTER TABLE `tbl_group_users`
  ADD PRIMARY KEY (`id_group`);

--
-- Indexes for table `tbl_jenjang`
--
ALTER TABLE `tbl_jenjang`
  ADD PRIMARY KEY (`id_jenjang`);

--
-- Indexes for table `tbl_mahasiswa`
--
ALTER TABLE `tbl_mahasiswa`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_pmb`
--
ALTER TABLE `tbl_pmb`
  ADD PRIMARY KEY (`id_pmb`),
  ADD KEY `id_fakultas` (`id_fakultas`),
  ADD KEY `id_prodi` (`id_prodi`),
  ADD KEY `id_jenjang` (`id_jenjang`);

--
-- Indexes for table `tbl_prodi`
--
ALTER TABLE `tbl_prodi`
  ADD PRIMARY KEY (`id_prodi`);

--
-- Indexes for table `tbl_sekolah`
--
ALTER TABLE `tbl_sekolah`
  ADD PRIMARY KEY (`id_sekolah`);

--
-- Indexes for table `tbl_users`
--
ALTER TABLE `tbl_users`
  ADD PRIMARY KEY (`id_users`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `lap_prediksi`
--
ALTER TABLE `lap_prediksi`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `tbl_distribution`
--
ALTER TABLE `tbl_distribution`
  MODIFY `id_dist` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=41;

--
-- AUTO_INCREMENT for table `tbl_fakultas`
--
ALTER TABLE `tbl_fakultas`
  MODIFY `id_fakultas` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tbl_group_users`
--
ALTER TABLE `tbl_group_users`
  MODIFY `id_group` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `tbl_jenjang`
--
ALTER TABLE `tbl_jenjang`
  MODIFY `id_jenjang` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `tbl_mahasiswa`
--
ALTER TABLE `tbl_mahasiswa`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1040;

--
-- AUTO_INCREMENT for table `tbl_pmb`
--
ALTER TABLE `tbl_pmb`
  MODIFY `id_pmb` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `tbl_prodi`
--
ALTER TABLE `tbl_prodi`
  MODIFY `id_prodi` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `tbl_sekolah`
--
ALTER TABLE `tbl_sekolah`
  MODIFY `id_sekolah` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `tbl_users`
--
ALTER TABLE `tbl_users`
  MODIFY `id_users` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
