-- phpMyAdmin SQL Dump
-- version 4.7.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 10, 2019 at 10:48 PM
-- Server version: 10.1.25-MariaDB
-- PHP Version: 5.6.31

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_pelaporan`
--

-- --------------------------------------------------------

--
-- Table structure for table `bidang`
--

CREATE TABLE `bidang` (
  `tahun` int(11) NOT NULL,
  `bidang_kode` int(11) NOT NULL,
  `bidang_nama` varchar(45) DEFAULT NULL,
  `id_indikator` int(11) NOT NULL,
  `bidang_verifikasi` int(11) NOT NULL,
  `bidang_verifikasi_bappeda` int(11) NOT NULL,
  `ttd1` tinyint(4) NOT NULL,
  `ttd2` tinyint(4) NOT NULL,
  `ttd3` tinyint(4) NOT NULL,
  `ttd4` tinyint(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `bidang`
--

INSERT INTO `bidang` (`tahun`, `bidang_kode`, `bidang_nama`, `id_indikator`, `bidang_verifikasi`, `bidang_verifikasi_bappeda`, `ttd1`, `ttd2`, `ttd3`, `ttd4`) VALUES
(2019, 1, 'Pendidikan', 1, 1, 1, 1, 1, 0, 0),
(2019, 2, 'Kesehatan dan KB', 1, 1, 1, 1, 1, 0, 0),
(2019, 3, 'Jalan', 3, 1, 1, 1, 1, 0, 0),
(2019, 4, 'Air Minum', 3, 1, 1, 1, 1, 0, 0),
(2019, 5, 'Sanitasi', 3, 1, 1, 1, 1, 0, 0),
(2019, 6, 'Perumahan dan Permukiman', 3, 0, 1, 0, 0, 0, 0),
(2019, 7, 'Irigasi', 3, 1, 1, 1, 1, 0, 0),
(2019, 8, 'Industri Kecil Menengah', 2, 0, 1, 0, 0, 0, 0),
(2019, 9, 'Pariwisata', 2, 0, 1, 0, 0, 0, 0),
(2019, 10, 'Kelautan dan Perikanan', 2, 1, 1, 1, 1, 0, 0),
(2019, 11, 'Pertanian', 2, 0, 1, 0, 0, 0, 0),
(2019, 12, 'Energi Skala Kecil', 3, 0, 1, 0, 0, 0, 0),
(2019, 13, 'Pasar', 2, 1, 1, 1, 1, 0, 0),
(2019, 14, 'Transportasi', 3, 0, 1, 0, 0, 0, 0),
(2019, 15, 'Lingkungan Hidup dan Kehutanan', 2, 0, 1, 0, 0, 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `detail_rincian`
--

CREATE TABLE `detail_rincian` (
  `tahun` int(11) NOT NULL,
  `bidang_kode` int(11) NOT NULL,
  `sub_bidang_kode` int(11) NOT NULL,
  `kegiatan_kode` int(11) NOT NULL,
  `rincian_kode` int(11) NOT NULL,
  `detail_rincian_kode` int(11) NOT NULL,
  `detail_rincian_nama` text,
  `detail_rincian_volume` double DEFAULT NULL,
  `id_satuan` int(11) NOT NULL,
  `detail_rincian_penerima_manfaat` text,
  `detail_rincian_pagu` double DEFAULT NULL,
  `detail_rincian_swakelola_volume` double DEFAULT NULL,
  `detail_rincian_swakelola_rp` double DEFAULT NULL,
  `detail_rincian_konstraktual_volume` double DEFAULT NULL,
  `detail_rincian_konstraktual_rp` double DEFAULT NULL,
  `detail_rincian_pembayaran` varchar(100) DEFAULT NULL,
  `detail_rincian_tw1_keuangan_rp` double DEFAULT NULL,
  `detail_rincian_tw1_fisik_volume` varchar(100) DEFAULT NULL,
  `detail_rincian_tw1_fisik_persen` varchar(45) DEFAULT NULL,
  `detail_rincian_tw2_keuangan_rp` double DEFAULT NULL,
  `detail_rincian_tw2_fisik_volume` varchar(100) DEFAULT NULL,
  `detail_rincian_tw2_fisik_persen` varchar(45) DEFAULT NULL,
  `detail_rincian_tw3_keuangan_rp` double DEFAULT NULL,
  `detail_rincian_tw3_fisik_volume` varchar(100) DEFAULT NULL,
  `detail_rincian_tw3_fisik_persen` varchar(45) DEFAULT NULL,
  `detail_rincian_tw4_keuangan_rp` double DEFAULT NULL,
  `detail_rincian_tw4_fisik_volume` varchar(100) DEFAULT NULL,
  `detail_rincian_tw4_fisik_persen` varchar(45) DEFAULT NULL,
  `id_masalah` int(11) NOT NULL,
  `detail_rincian_file` text,
  `detail_rincian_pelaksanaan_jenis` tinyint(4) DEFAULT NULL COMMENT '1. Swakelola\n2. Konstraktual'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `detail_rincian`
--

INSERT INTO `detail_rincian` (`tahun`, `bidang_kode`, `sub_bidang_kode`, `kegiatan_kode`, `rincian_kode`, `detail_rincian_kode`, `detail_rincian_nama`, `detail_rincian_volume`, `id_satuan`, `detail_rincian_penerima_manfaat`, `detail_rincian_pagu`, `detail_rincian_swakelola_volume`, `detail_rincian_swakelola_rp`, `detail_rincian_konstraktual_volume`, `detail_rincian_konstraktual_rp`, `detail_rincian_pembayaran`, `detail_rincian_tw1_keuangan_rp`, `detail_rincian_tw1_fisik_volume`, `detail_rincian_tw1_fisik_persen`, `detail_rincian_tw2_keuangan_rp`, `detail_rincian_tw2_fisik_volume`, `detail_rincian_tw2_fisik_persen`, `detail_rincian_tw3_keuangan_rp`, `detail_rincian_tw3_fisik_volume`, `detail_rincian_tw3_fisik_persen`, `detail_rincian_tw4_keuangan_rp`, `detail_rincian_tw4_fisik_volume`, `detail_rincian_tw4_fisik_persen`, `id_masalah`, `detail_rincian_file`, `detail_rincian_pelaksanaan_jenis`) VALUES
(2019, 1, 1, 1, 1, 1, 'Rehabilitasi Sedang 3 Ruang Kelas SD Negeri 2 Puundoho', 3, 1, '1 Sekolah', 221131000, 3, 221130999, 0, 0, 'Bertahap', 0.333, '022', '0.1', 0, '0', '0', 199017899.1, '0', '44', 28747029.87, '0', '48', 11, NULL, 1),
(2019, 1, 1, 1, 1, 2, 'Rehabilitasi Sedang 3 Ruang Kelas SD Negeri 2 Tolala', 3, 1, '1 Sekolah', 221131000, 3, 221130999, 0, 0, 'Bertahap', 0, '0', '0', 0, '0', '0', 212285759.04, '0', '61', 68550609.69, '0', '80', 11, NULL, 1),
(2019, 1, 1, 1, 1, 3, 'Rehabilitasi Sedang 3 Ruang Kelas SD Negeri 1 Wawo', 3, 1, '1 Sekolah', 221131000, 3, 221130999, 0, 0, 'Bertahap', 0, '0', '0', 0, '0', '0', 203440519.08, '0', '98', 64127989.71, '0', '57', 11, NULL, 1),
(2019, 1, 1, 1, 1, 4, 'Rehabilitasi Berat 6 Ruang kelas SD Negeri 1 Majapahit', 6, 1, '1 Sekolah', 501230000, 6, 501229999, 0, 0, 'Bertahap', 0, '0', '0', 0, '0', '0', 175430499.65, '0', '88', 370910199.26, '0', '47', 11, NULL, 1),
(2019, 1, 1, 1, 1, 5, 'Rehabilitasi Berat 4  Ruang kelas SD Negeri 1 Jabal Kubis', 4, 1, '1 Sekolah', 321049000, 4, 321049000, 0, 0, 'Bertahap', 0, '0', '0', 0, '0', '0', 163734990, '0', '76', 173366460, '0', '28', 11, NULL, 1),
(2019, 1, 1, 1, 1, 6, 'Rehabilitasi Berat 5  Ruang kelas SD Negeri 1 Pasampang', 5, 1, '1 Sekolah', 401312000, 5, 401312000, 0, 0, 'Bertahap', 0, '0', '0', 0, '0', '0', 176577280, '0', '10', 140459200, '0', '68', 11, NULL, 1),
(2019, 1, 1, 1, 1, 7, 'Rehabilitasi Berat 5  Ruang kelas SD Negeri 1 Latali', 5, 1, '1 Sekolah', 401312000, 5, 401312000, 0, 0, 'Bertahap', 2222, '0', '0', 0, '0', '0', 168551040, '0', '89', 349141440, '0', '53', 11, NULL, 1),
(2019, 1, 1, 1, 2, 1, 'Rehabilitasi Sedang Ruang Perpustakaan SD Negeri 2 Mala-Mala', 1, 1, '1 Sekolah', 93366000, 1, 93366000, 0, 0, 'Bertahap', 0, '0', '0', 0, '0', '0', 78427440, '0', '97', 88697700, '0', '52', 11, NULL, 1),
(2019, 1, 1, 1, 2, 2, 'Rehabilitasi Sedang Ruang Perpustakaan SD Negeri 2 Lambai', 1, 1, '1 Sekolah', 93366000, 1, 93366000, 0, 0, 'Bertahap', 0, '0', '0', 0, '0', '0', 92432340, '0', '21', 34545420, '0', '42', 11, NULL, 1),
(2019, 1, 1, 1, 2, 3, 'Rehabilitasi Sedang Ruang Perpustakaan SD Negeri 1 Tambuha', 1, 1, '1 Sekolah', 93366000, 1, 93366000, 0, 0, 'Bertahap', 0, '0', '0', 0, '0', '0', 68157180, '0', '27', 68157180, '0', '90', 11, NULL, 1),
(2019, 1, 1, 1, 2, 4, 'Rehabilitasi Sedang Ruang Perpustakaan SD Negeri 1 Mataleuno', 1, 1, '1 Sekolah', 93366000, 1, 93366000, 0, 0, 'Bertahap', 0, '0', '0', 0, '0', '0', 21474180, '0', '73', 82162080, '0', '84', 11, NULL, 1),
(2019, 1, 1, 1, 2, 5, 'Rehabilitasi Sedang Ruang Perpustakaan SD Negeri 1 Pakue', 1, 1, '1 Sekolah', 93366000, 1, 93366000, 0, 0, 'Bertahap', 0, '0', '0', 0, '0', '0', 61621560, '0', '71', 55085940, '0', '92', 11, NULL, 1),
(2019, 1, 1, 1, 2, 6, 'Rehabilitasi Sedang Ruang Perpustakaan SD Negeri 1 Lanipa', 1, 1, '1 Sekolah', 93366000, 1, 93366000, 0, 0, 'Bertahap', 0, '0', '0', 0, '0', '0', 27076140, '0', '39', 51351300, '0', '90', 11, NULL, 1),
(2019, 1, 1, 1, 2, 7, 'Rehabilitasi Sedang Ruang Perpustakaan SD Negeri 1 Lalombundi', 1, 1, '1 Sekolah', 93366000, 1, 93366000, 0, 0, 'Bertahap', 0, '0', '0', 0, '0', '0', 65356200, '0', '88', 50417640, '0', '56', 11, NULL, 1),
(2019, 1, 1, 2, 1, 1, 'Pembangunan 2 Ruang Kelas Baru SD Negeri 2 Wawo Beserta Perabot', 2, 1, '1 Sekolah', 383000000, 2, 383000000, 0, 0, 'Bertahap', 0, '0', '0', 0, '0', '0', 45960000, '0', '29', 122560000, '0', '58', 11, NULL, 1),
(2019, 1, 1, 2, 2, 1, 'Pembangunan Jamban SD Negeri 2 RanteBaru', 1, 1, '1 Sekolah', 104190867, 1, 104190867, 0, 0, 'Bertahap', 0, '0', '0', 0, '0', '0', 52095433.5, '0', '78', 59388794.19, '0', '74', 11, NULL, 1),
(2019, 1, 1, 2, 2, 2, 'Pembangunan Jamban SD Negeri 1 Lapolu', 1, 1, '1 Sekolah', 104190867, 1, 104190867, 0, 0, 'Bertahap', 0, '0', '0', 0, '0', '0', 96897506.31, '0', '17', 17712447.39, '0', '81', 11, NULL, 1),
(2019, 1, 1, 2, 2, 3, 'Pembangunan Jamban SD Negeri 1 Tolala', 1, 1, '1 Sekolah', 104190867, 1, 104190867, 0, 0, 'Bertahap', 0, '0', '0', 0, '0', '0', 13544812.71, '0', '81', 71891698.23, '0', '55', 11, NULL, 1),
(2019, 1, 1, 2, 2, 4, 'Pembangunan Jamban SD Negeri 2 Watunohu', 1, 1, '1 Sekolah', 104190867, 1, 104190867, 0, 0, 'Bertahap', 0, '0', '0', 0, '0', '0', 80226967.59, '0', '24', 10419086.7, '0', '66', 11, NULL, 1),
(2019, 1, 1, 2, 2, 5, 'Pembangunan Jamban SD Negeri 2 Wawo', 1, 1, '1 Sekolah', 104190867, 1, 104190867, 0, 0, 'Bertahap', 0, '0', '0', 0, '0', '0', 14586721.38, '0', '96', 93771780.3, '0', '91', 11, NULL, 1),
(2019, 1, 1, 2, 2, 6, 'Pembangunan Jamban SD Negeri 1 Tiwu', 1, 1, '1 Sekolah', 104190867, 1, 104190867, 0, 0, 'Bertahap', 0, '0', '0', 0, '0', '0', 88562236.95, '0', '23', 12502904.04, '0', '15', 11, NULL, 1),
(2019, 1, 1, 2, 2, 7, 'Pembangunan Jamban SD Negeri 1 Totallang', 1, 1, '1 Sekolah', 104190867, 1, 104190866, 0, 0, 'Bertahap', 0, '0', '0', 0, '0', '0', 62514519.6, '0', '73', 28131533.82, '0', '89', 11, NULL, 1),
(2019, 1, 1, 2, 2, 8, 'Pembangunan Jamban SD Negeri 1 Tolala', 1, 1, '1 Sekolah', 104190867, 1, 104190867, 0, 0, 'Bertahap', 0, '0', '0', 0, '0', '0', 13544812.71, '0', '35', 22921990.74, '0', '18', 11, NULL, 1),
(2019, 1, 1, 2, 2, 9, 'Pembangunan Jamban SD Negeri 1 Walasiho', 1, 1, '1 Sekolah', 104190867, 1, 104190867, 0, 0, 'Bertahap', 0, '0', '0', 0, '0', '0', 26047716.75, '0', '11', 67724063.55, '0', '50', 11, NULL, 1),
(2019, 1, 1, 2, 2, 10, 'Pembangunan Jamban SD Negeri 1 Watuliwu', 1, 1, '1 Sekolah', 104190866, 1, 104190866, 0, 0, 'Bertahap', 0, '0', '0', 0, '0', '0', 76059332.18, '0', '33', 42718255.06, '0', '74', 11, NULL, 1),
(2019, 1, 1, 2, 2, 11, 'Pembangunan Jamban SD Negeri 2 Lambai', 1, 1, '1 Sekolah', 104190866, 1, 104190866, 0, 0, 'Bertahap', 0, '0', '0', 0, '0', '0', 102107048.68, '0', '42', 20838173.2, '0', '66', 11, NULL, 1),
(2019, 1, 1, 2, 2, 12, 'Pembangunan Jamban SD Negeri 2 Lapai', 1, 1, '1 Sekolah', 104190866, 1, 104190866, 0, 0, 'Bertahap', 0, '0', '0', 0, '0', '0', 72933606.2, '0', '39', 71891697.54, '0', '94', 11, NULL, 1),
(2019, 1, 1, 2, 2, 13, 'Pembangunan Jamban SD Negeri 1 Majapahit', 1, 1, '1 Sekolah', 104190867, 1, 104190867, 0, 0, 'Bertahap', 0, '0', '0', 0, '0', '0', 63556428.87, '0', '73', 77101241.58, '0', '44', 11, NULL, 1),
(2019, 1, 1, 2, 2, 14, 'Pembangunan Jamban SD Negeri 1 Mataleuno', 1, 1, '1 Sekolah', 104190867, 1, 104190867, 0, 0, 'Bertahap', 0, '0', '0', 0, '0', '0', 36466803.45, '0', '26', 14586721.38, '0', '77', 11, NULL, 1),
(2019, 1, 1, 2, 2, 15, 'Pembangunan Jamban SD Negeri 1 Sawangaoha', 1, 1, '1 Sekolah', 104190866, 1, 104190866, 0, 0, 'Bertahap', 0, '0', '0', 0, '0', '0', 13544812.58, '0', '55', 47927798.36, '0', '77', 11, NULL, 1),
(2019, 1, 1, 3, 1, 1, 'Pengadaan Buku Koleksi Perpustakaan SD (72 Paket)', 72, 2, '72 Sekolah', 3600000000, 72, 3578240232, 0, 0, 'Bertahap', 0, '0', '0', 0, '0', '0', 1610208104.4, '0', '15', 2075379334.56, '0', '22', 11, NULL, 1),
(2019, 1, 2, 1, 1, 1, 'Rehabilitasi Berat 3 Ruang Kelas SMP Swasta Haji Agus Salim Katoi', 3, 1, '1 Sekolah', 335720000, 3, 335719999, 0, 0, 'Bertahap', 0, '0', '0', 0, '0', '0', 332362799.01, '0', '77', 90644399.73, '0', '72', 11, NULL, 1),
(2019, 1, 2, 1, 1, 2, 'Rehabilitasi Berat 3 Ruang Kelas SMP Negeri 2 Pakue', 3, 1, '1 Sekolah', 335720000, 3, 335719999, 0, 0, 'Bertahap', 0, '0', '0', 0, '0', '0', 130930799.61, '0', '70', 70501199.79, '0', '22', 11, NULL, 1),
(2019, 1, 2, 1, 1, 3, 'Rehabilitasi Sedang 1 Ruang Kelas SMP Negeri SATAP Sulaho', 1, 1, '1 Sekolah', 170308100, 1, 170308100, 0, 0, 'Bertahap', 0, '0', '0', 0, '0', '0', 93669455, '0', '90', 27249296, '0', '31', 11, NULL, 1),
(2019, 1, 2, 1, 1, 4, 'Rehabilitasi Berat 3 Ruang Kelas SMP Negeri SATAP Lanipa-Nipa', 3, 1, '1 Sekolah', 509685900, 3, 509685900, 0, 0, 'Bertahap', 0, '0', '0', 0, '0', '0', 484201605, '0', '29', 417942438, '0', '76', 11, NULL, 1),
(2019, 1, 2, 1, 2, 1, 'Rehabilitasi Berat Ruang Laboratorium IPA SMP Negeri 1 Rante Angin', 1, 1, '1 Sekolah', 268731000, 1, 268731000, 0, 0, 'Bertahap', 0, '0', '0', 0, '0', '0', 69870060, '0', '92', 37622340, '0', '43', 11, NULL, 1),
(2019, 1, 2, 1, 3, 1, 'Rehabilitasi Total Ruang Perpustakaan SMP Negeri 1 Rante Angin', 1, 1, '1 Sekolah', 285852000, 1, 285852000, 0, 0, 'Bertahap', 0, '0', '0', 0, '0', '0', 177228240, '0', '50', 174369720, '0', '93', 11, NULL, 1),
(2019, 1, 2, 1, 4, 1, 'Rehabilitasi Berat Ruang Guru SMP Negeri 2 Rante Angin', 1, 1, '1 Sekolah', 280260000, 1, 280260000, 0, 0, 'Bertahap', 0, '0', '0', 0, '0', '0', 56052000, '0', '34', 56052000, '0', '19', 11, NULL, 1),
(2019, 1, 2, 1, 5, 1, 'Rehabilitasi Berat Ruang Kantor SMP Negeri 3 Pakue', 1, 1, '1 Sekolah', 280260000, 1, 280260000, 0, 0, 'Bertahap', 0, '0', '0', 0, '0', '0', 47644200, '0', '60', 137327400, '0', '73', 11, NULL, 1),
(2019, 1, 2, 2, 1, 1, 'Pembangunan Ruang Laboratorium IPA SMP Negeri SATAP Lapasi-Pasi', 1, 1, '1 Sekolah', 395194000, 1, 395194000, 0, 0, 'Bertahap', 0, '0', '0', 0, '0', '0', 359626540, '0', '95', 138317900, '0', '49', 11, NULL, 1),
(2019, 1, 2, 2, 1, 2, 'Pembangunan Ruang Laboratorium IPA SMP Negeri SATAP Lelewawo', 1, 1, '1 Sekolah', 395194000, 1, 395194000, 0, 0, 'Bertahap', 0, '0', '0', 0, '0', '0', 324059080, '0', '35', 177837300, '0', '16', 11, NULL, 1),
(2019, 1, 2, 2, 2, 1, 'Pembangunan Ruang Perpustakaan SMP Negeri SATAP Lapasi-Pasi', 1, 1, '1 Sekolah', 357316000, 1, 357316000, 0, 0, 'Bertahap', 0, '0', '0', 0, '0', '0', 235828560, '0', '45', 207243280, '0', '41', 11, NULL, 1),
(2019, 1, 2, 2, 2, 2, 'Pembangunan Ruang Perpustakaan SMP Negeri SATAP Tobela', 1, 1, '1 Sekolah', 357316000, 1, 357316000, 0, 0, 'Bertahap', 0, '0', '0', 0, '0', '0', 217962760, '0', '85', 178658000, '0', '12', 11, NULL, 1),
(2019, 1, 2, 2, 2, 3, 'Pembangunan Ruang Perpustakaan SMP Negeri SATAP Lelewawo', 1, 1, '1 Sekolah', 357316000, 1, 357316000, 0, 0, 'Bertahap', 0, '0', '0', 0, '0', '0', 321584400, '0', '63', 321584400, '0', '88', 11, NULL, 1),
(2019, 1, 2, 3, 1, 1, 'Pengadaan Peralatan Laboratorium IPA Fisika SMP', 7, 2, '7 Sekolah (SMP Negeri 1 Lasusua, SMP Negeri 1 Ngapa,SMP Negeri 1 Rante Angin, SMP Negeri 2 Batu Putuh, SMP Negeri 2 Pakue, SMP Negeri 2 Rante Angin, SMP Negeri 3 Batu Putih)', 122500000, 7, 112560000, 0, 0, 'Bertahap', 0, '0', '0', 0, '0', '0', 84420000, '0', '93', 70912800, '0', '63', 11, NULL, 1),
(2019, 1, 2, 3, 2, 1, 'Pengadaan Media Pembelajaran SMP (9 Paket)', 9, 2, '9 Sekolah (SMP Neg 1 Ngapa, SMP Neg 1 Pakue, SMP Neg 2 Batu Putih, SMP Neg 2 Pakue, SMP Neg SATAP Tojabi, SMP Neg SATAP Sulaho, SMP Neg 1 Pakue Utara, SMP NEG SATAP Lanipa-Nipa)', 279000000, 9, 279000000, 0, 0, 'Bertahap', 0, '0', '0', 0, '0', '0', 225990000, '0', '10', 108810000, '0', '98', 11, NULL, 1),
(2019, 1, 2, 3, 3, 1, 'Pengadaan Pendidikan Jasmani Olahraga dan Kesehatan SMP (8 Paket)', 8, 2, '8 Sekolah (SMP Neg 1 Kodeoha, SMP Neg 1 Lasusua, SMP Neg 1 Ngapa, SMP Neg 1 Pakue, SMP Neg Rante Angin, SMP Neg 2 Kodeoha, SMP Neg 2 Rante Angin, SMP Neg SATAP Lawaki)', 176000000, 8, 175723000, 0, 0, 'Bertahap', 0, '0', '0', 0, '0', '0', 36901830, '0', '80', 149364550, '0', '77', 11, NULL, 1),
(2019, 1, 2, 3, 4, 1, 'Pengadaan Buku Koleksi Perpustakaan SMP (11 Paket)', 11, 2, '11 Sekolah (SMP Neg 1 Kodeoha, SMP Neg 1 Lasusua, SMP Neg 1 Ngapa, SMP Neg 1 Pakue, SMP Neg 1 Rante Angin, SMP Neg 2 Batu Putih, SMP Neg 2 Pakue, SMP Neg 2 Rante Angin)', 275000000, 0, 0, 11, 273658528, 'Bertahap', 0, '0', '0', 0, '0', '0', 251765845.76, '0', '65', 240819504.64, '0', '71', 11, NULL, 2),
(2019, 1, 2, 3, 5, 1, 'Pengadaan Alat Kesenian Tradisional SMP (6 Paket)', 6, 2, '5 Sekolah (SMP Neg 1 Lasusua, SMP Neg 1 Ngapa, SMP Neg 1 Pakue, SMP Neg 1 Rante angin, SMP Neg 2 Batu Putih)', 206400000, 6, 199749000, 0, 0, 'Bertahap', 0, '0', '0', 0, '0', '0', 39949800, '0', '20', 47939760, '0', '54', 11, NULL, 1),
(2019, 1, 3, 1, 1, 1, 'Pembangunan 2 Ruang Kelas Baru SKB Kolaka Utara Beserta Perabotnya', 2, 1, '1 Sekolah', 355843000, 2, 355843000, 0, 0, 'Bertahap', 0, '0', '0', 0, '0', '0', 145895630, '0', '88', 192155220, '0', '97', 11, NULL, 1),
(2019, 1, 3, 1, 2, 1, 'Pembangunan Jamban SKB Kolaka Utara', 1, 1, '1 Sekolah', 67000000, 1, 67000000, 0, 0, 'Bertahap', 0, '0', '0', 0, '0', '0', 38190000, '0', '23', 42210000, '0', '86', 11, NULL, 1),
(2019, 1, 3, 2, 1, 1, 'Pengadaan Buku Koleksi Perpustakaan SKB (2 Paket)', 2, 2, '1 Sekolah', 100000000, 2, 100000000, 0, 0, 'Bertahap', 0, '0', '0', 0, '0', '0', 72000000, '0', '77', 29000000, '0', '87', 11, NULL, 1),
(2019, 1, 3, 3, 1, 1, 'Pembangunan Ruang Kelas Baru TK Pembina Lasusua', 1, 1, '1 Sekolah', 141512000, 1, 141512000, 0, 0, 'Bertahap', 0, '0', '0', 0, '0', '0', 104718880, '0', '65', 28302400, '0', '80', 11, NULL, 1),
(2019, 1, 4, 1, 1, 1, 'Renovasi Gedung Layanan Perpustakaan Kabupaten', 1, 3, '15 Kecamatan', 1772000000, 0, 0, 1, 1765052000, 'Bertahap', 0, '0', '0', 0, '0', '0', 247107280, '0', '74', 229456760, '0', '40', 11, NULL, 2),
(2019, 1, 4, 2, 1, 1, 'Pengadaan  Bahan Perpustakaan Pengadaan Ilmu Pengetahuan Umum', 1000, 4, '15 Kecamatan', 150000000, 1000, 149912000, 0, 0, 'Bertahap', 0, '0', '0', 0, '0', '0', 83950720, '0', '74', 113933120, '0', '37', 11, NULL, 1),
(2019, 2, 1, 1, 1, 1, 'Pengadaan Alat Kesehatan (ALKES) Set Puskesmas, Gimul Dan Laboratorium Puskesmas', 1, 2, '16 Puskesmas', 309710800, 0, 0, 1, 309698571, 'Bertahap', 0, '0', '0', 0, '0', '0', 226079956.83, '0', '97', 49551771.36, '0', '53', 11, NULL, 2),
(2019, 2, 1, 1, 2, 1, 'Pengadaan Alat Kesehatan (ALKES) Set Puskesmas, Gimul dan Laboratorium Puskesmas', 1, 2, '16 Puskesmas', 90838300, 0, 0, 1, 90800040, 'Bertahap', 0, '0', '0', 0, '0', '0', 47216020.8, '0', '28', 65376028.8, '0', '65', 11, NULL, 2),
(2019, 2, 1, 1, 3, 1, 'Pengadaan Alat Kesehatan (ALKES) Set Puskesmas Gimul dan Laboratorium', 1, 2, '16 Puskesmas', 1358471683, 0, 0, 1, 1356274683, 'Bertahap', 0, '0', '0', 0, '0', '0', 881578543.95, '0', '96', 528947126.37, '0', '46', 11, NULL, 2),
(2019, 2, 1, 1, 3, 2, 'Pengadaan Alat Kesehatan (ALKES) Set Puskesmas Gimul dan Laboratorium Puskesmas', 1, 2, '1 Puskesmas', 102742217, 0, 0, 1, 102741871, 'Bertahap', 0, '0', '0', 0, '0', '0', 91440265.19, '0', '94', 79111240.67, '0', '62', 11, NULL, 2),
(2019, 2, 2, 1, 1, 1, 'Pembangunan Gedung CSSD', 1, 3, '1 Rumah Sakit', 600000000, 0, 0, 1, 598626000, 'Bertahap', 0, '0', '0', 0, '0', '0', 598626000, '0', '92', 425024460, '0', '92', 11, NULL, 2),
(2019, 2, 2, 2, 1, 1, 'Pengadaan Alat Kesehatan Instalasi Gawat Darurat (IGD) ', 10, 2, '1 RSUD', 142311000, 0, 0, 10, 105950000, 'Bertahap', 0, '0', '0', 0, '0', '0', 81581500, '0', '66', 95355000, '0', '22', 11, NULL, 2),
(2019, 2, 2, 2, 1, 2, 'Pengadaan Alat Kesehatan Instalasi Gawat Darurat (IGD) ', 4, 2, '1 RSUD', 56765200, 0, 0, 4, 52856612, 'Bertahap', 0, '0', '0', 0, '0', '0', 45985252.44, '0', '85', 11099888.52, '0', '11', 11, NULL, 2),
(2019, 2, 2, 2, 1, 3, 'Pengadaan Alat Kesehatan Instalasi Gawat Darurat (IGD)', 10, 2, '1 RSUD', 63471800, 0, 0, 10, 40445000, 'Bertahap', 0, '0', '0', 0, '0', '0', 6875650, '0', '35', 8493450, '0', '36', 11, NULL, 2),
(2019, 2, 2, 2, 1, 4, 'Pengadaan Alat Kesehatan Instalasi Gawat Darurat (IGD) ', 6, 2, '1 RSUD', 117952000, 0, 0, 6, 88612000, 'Bertahap', 0, '0', '0', 0, '0', '0', 23039120, '0', '75', 61142280, '0', '75', 11, NULL, 2),
(2019, 2, 2, 2, 2, 1, 'Pengadaan Alat Kedokteran Umum (USG)', 1, 2, '1 RSUD', 550000000, 0, 0, 1, 549100000, 'Bertahap', 0, '0', '0', 0, '0', '0', 494190000, '0', '92', 280041000, '0', '13', 11, NULL, 2),
(2019, 2, 2, 2, 3, 1, 'Pengadaan Alat Kedokteran Umum (Whaserdesinfector)', 1, 2, '1 RSUD', 1521230000, 0, 0, 1, 1512938150, 'Bertahap', 0, '0', '0', 0, '0', '0', 1482679387, '0', '63', 544657734, '0', '11', 11, NULL, 2),
(2019, 2, 2, 2, 3, 2, 'Pengadaan Alat Kedokteran Umum (Auto Clab/Sterilisasi Uap)', 1, 2, '1 RSUD', 349570000, 0, 0, 1, 349570000, 'Bertahap', 0, '0', '0', 0, '0', '0', 87392500, '0', '56', 314613000, '0', '44', 11, NULL, 2),
(2019, 2, 3, 1, 1, 1, 'Pengadaan Obat dan Perbekalan Kesehatan', 1, 2, '16 Puskesmas', 11495380, 0, 0, 1, 10815000, 'Bertahap', 0, '0', '0', 0, '0', '0', 3244500, '0', '48', 1189650, '0', '91', 11, NULL, 2),
(2019, 2, 3, 1, 1, 2, 'Pengadaan Obat dan Perbekalan Kesehatan', 1, 2, '16 Puskesmas', 28479000, 0, 0, 1, 27279000, 'Bertahap', 0, '0', '0', 0, '0', '0', 25369470, '0', '16', 12821130, '0', '38', 11, NULL, 2),
(2019, 2, 3, 1, 1, 3, 'Pengadaan Obat dan Perbekalan Kesehatan', 1, 2, '16 Puskesmas', 10040380, 0, 0, 1, 9360000, 'Bertahap', 0, '0', '0', 0, '0', '0', 9079200, '0', '29', 7956000, '0', '44', 11, NULL, 2),
(2019, 2, 3, 1, 1, 4, 'Pengadaan Obat dan Perbekalan Kesehatan', 1, 2, '16 Puskesmas', 437026690, 0, 0, 1, 427026690, 'Bertahap', 0, '0', '0', 0, '0', '0', 89675604.9, '0', '65', 51243202.8, '0', '86', 11, NULL, 2),
(2019, 2, 3, 1, 1, 5, 'Pengadaan Obat dan Perbekalan Kesehatan', 1, 2, '16 Puskesmas', 281429000, 0, 0, 1, 270929000, 'Bertahap', 0, '0', '0', 0, '0', '0', 65022960, '0', '99', 208615330, '0', '51', 11, NULL, 2),
(2019, 2, 3, 1, 1, 6, 'Pengadaan Obat dan Perbekalan Kesehatan', 1, 2, '16 Puskesmas', 734786500, 0, 0, 1, 713586500, 'Bertahap', 0, '0', '0', 0, '0', '0', 592276795, '0', '20', 542325740, '0', '98', 11, NULL, 2),
(2019, 2, 3, 1, 1, 7, 'Pengadaan Obat dan Perbekalan Kesehatan', 1, 2, '16 Puskesmas', 470758170, 0, 0, 1, 459008170, 'Bertahap', 0, '0', '0', 0, '0', '0', 390156944.5, '0', '76', 353436290.9, '0', '21', 11, NULL, 2),
(2019, 2, 3, 1, 1, 8, 'Pengadaan Obat dan Perbekalan Kesehatan', 1, 2, '16 Puskesmas', 27160000, 0, 0, 1, 26160000, 'Bertahap', 0, '0', '0', 0, '0', '0', 25375200, '0', '63', 15172800, '0', '72', 11, NULL, 2),
(2019, 2, 3, 1, 2, 1, 'Pengadaan Obat dan Perbekalan Kesehatan', 1, 2, '16 Puskesmas', 232841892, 0, 0, 1, 227391892, 'Bertahap', 0, '0', '0', 0, '0', '0', 220570135.24, '0', '49', 195557027.12, '0', '45', 11, NULL, 2),
(2019, 2, 3, 1, 2, 2, 'Pengadaan Obat dan Perbekalan Kesehatan', 1, 2, '16 Puskesmas', 23254084, 0, 0, 1, 22422600, 'Bertahap', 0, '0', '0', 0, '0', '0', 13902012, '0', '12', 10987074, '0', '100', 11, NULL, 2),
(2019, 2, 3, 1, 2, 3, 'Pengadaan Obat dan Perbekalan Kesehatan', 1, 2, '16 Puskesmas', 39607000, 0, 0, 1, 38697000, 'Bertahap', 0, '0', '0', 0, '0', '0', 23605170, '0', '19', 5030610, '0', '32', 11, NULL, 2),
(2019, 2, 3, 1, 2, 4, 'Pengadaan Obat dan Perbekalan Kesehatan', 1, 2, '16 Puskesmas', 128776800, 0, 0, 1, 124656800, 'Bertahap', 0, '0', '0', 0, '0', '0', 88506328, '0', '49', 59835264, '0', '91', 11, NULL, 2),
(2019, 2, 3, 1, 2, 5, 'Pengadaan Obat dan Perbekalan Kesehatan', 1, 2, '16 Puskesmas', 32955000, 0, 0, 1, 32065000, 'Bertahap', 0, '0', '0', 0, '0', '0', 21804200, '0', '78', 12505350, '0', '73', 11, NULL, 2),
(2019, 2, 3, 1, 2, 6, 'Pengadaan Obat dan Perbekalan Kesehatan', 1, 2, '16 Puskesmas', 557683104, 0, 0, 1, 548483104, 'Bertahap', 0, '0', '0', 0, '0', '0', 164544931.2, '0', '83', 301665707.2, '0', '46', 11, NULL, 2),
(2019, 2, 4, 1, 1, 1, 'Pengadaan Implant Removal Kit', 21, 2, '-', 63000000, 0, 0, 1, 62947500, 'Bertahap', 0, '0', '0', 0, '0', '0', 16366350, '0', '43', 46581150, '0', '77', 11, NULL, 2),
(2019, 2, 4, 2, 1, 1, 'Pengadaan Kendaraan Roda Empat', 1, 3, 'Dinas Kependudukan dan KB', 800000000, 0, 0, 1, 798326100, 'Bertahap', 0, '0', '0', 0, '0', '0', 263447613, '0', '24', 574794792, '0', '54', 11, NULL, 2),
(2019, 2, 4, 3, 1, 1, 'Pengadaan KIE Kit', 15, 2, 'Dinas Pengendalian Penduduk dan KB', 195000000, 0, 0, 15, 74910000, 'Bertahap', 0, '0', '0', 0, '0', '0', 20225700, '0', '96', 19476600, '0', '44', 11, NULL, 2),
(2019, 2, 5, 1, 1, 1, 'Pengadaan DAK Stanting (Penugasan)', 1, 2, '16 Puskesmas', 235717000, 0, 0, 1, 235678700, 'Bertahap', 0, '0', '0', 0, '0', '0', 183829386, '0', '53', 226251552, '0', '25', 11, NULL, 2),
(2019, 2, 6, 1, 1, 1, 'Pengadaan Chyroterapy', 1, 2, '1 Puskesmas', 90000000, 0, 0, 1, 90000000, 'Bertahap', 0, '0', '0', 0, '0', '0', 63900000, '0', '55', 70200000, '0', '65', 11, NULL, 2),
(2019, 2, 6, 2, 1, 1, 'Pengadaan Vaccine Carrier', 19, 3, '1 Puskesmas', 192000000, 0, 0, 19, 191831962, 'Bertahap', 0, '0', '0', 0, '0', '0', 143873971.5, '0', '79', 72896145.56, '0', '51', 11, NULL, 2),
(2019, 2, 6, 3, 1, 1, 'Pengadaan BHP Pemeriksaan HIV AIDS', 1, 2, '1 Puskesmas', 93967920, 0, 0, 1, 93967488, 'Bertahap', 0, '0', '0', 0, '0', '0', 62018542.08, '0', '11', 44164719.36, '0', '49', 11, NULL, 2),
(2019, 3, 1, 1, 1, 1, 'PENINGKATAN JALAN LAHABARU - TOAHA KEC. WATUNOHU', 23, 1, '15 Kecamatan', 4853048750, 0, 0, 2, 4800765000, 'Bertahap', 0, '0', '0', 0, '0', '0', 0, '0', '0', 0, '0', '0', 11, NULL, 2),
(2019, 3, 1, 1, 1, 2, 'PENINGKATAN JALAN TOTALLANG - LATAWARO KEC. LASUSUA', 3.4, 6, '15 Kecamatan', 6864000000, 0, 0, 3.4, 6800702100, 'Bertahap', 0, '0', '0', 0, '0', '0', 0, '0', '0', 0, '0', '0', 11, NULL, 2),
(2019, 3, 1, 1, 1, 3, 'PENINGKATAN JALAN TOAHA - KOSALI KEC. PAKUE', 3.7, 6, '15 Kecamatan', 9234085000, 0, 0, 3.7, 9179775000, 'Bertahap', 0, '0', '0', 0, '0', '0', 0, '0', '0', 0, '0', '0', 11, NULL, 2),
(2019, 3, 1, 1, 1, 1111, 'Peningkatan Jalan Toaha - Kosali Kec. Pakue', 22, 1, '2', 2, 22, 22, 0, 0, '22', 0, '0', '0', 0, '0', '0', 0, '0', '0', 0, '0', '0', 8, NULL, 1),
(2019, 4, 1, 1, 1, 1, 'Pengembangan Jaringan Perpipaan SPAM IKK Kodeoha untuk Kelurahan Mala-Mala,Desa Awo,Kalu-Kaluku,Lametuna,Sawangaoha, dan Jabal Kubis Kec.Kodeoha', 100, 8, '500 Jiwa', 1044885300, 0, 0, 100, 1039767000, 'Bertahap', 0, '0', '0', 0, '0', '0', 500000000, '0', '75', 0, '0', '0', 11, NULL, 2),
(2019, 4, 1, 1, 1, 2, 'Pengembangan Jaringan Perpipaan SPAM IKK Ngapa untuk Desa Sarona,Tambuha,Toaha,Watunohu, Dan Lelehao Kec. Watunohu Kab. Kolaka Utara', 100, 8, '500 Jiwa', 513000000, 0, 0, 100, 508813000, 'Bertahap', 0, '0', '0', 0, '0', '0', 0, '0', '0', 0, '0', '0', 11, NULL, 2),
(2019, 4, 1, 1, 1, 3, 'Pengembangan Jaringan Perpipaan SPAM IKK Pakue Utara untuk Desa Teposua,Pakue,Puundoho, dan Amoe Kec. Pakue Utara Kab. Kolaka Utara', 70, 8, '350 Jiwa', 500000000, 0, 0, 70, 496539000, 'Bertahap', 0, '0', '0', 0, '0', '0', 0, '0', '0', 0, '0', '0', 11, NULL, 2),
(2019, 4, 2, 1, 1, 1, 'Pengembangan Jaringan Perpipaan SPAM Desa Ngapa Untuk Desa Ngapa Kec.Ngapa  Kab. Kolaka Utara', 212, 8, '1060 Jiwa', 386684000, 0, 0, 212, 383562539, 'Bertahap', 0, '0', '0', 0, '0', '0', 250000000, '0', '90', 0, '0', '0', 11, NULL, 2),
(2019, 4, 2, 1, 1, 2, 'Pengembangan Jaringan Perpipaan SPAM Desa Koreiha Untuk Desa Koreiha Kec. Ngapa Kab. Kolaka Utara', 40, 8, '200 Jiwa', 232858200, 0, 0, 40, 228039061, 'Bertahap', 0, '0', '0', 0, '0', '0', 0, '0', '0', 0, '0', '0', 11, NULL, 2),
(2019, 4, 2, 1, 1, 3, 'Pengembangan Jaringan Perpipaan Untuk SPAM  IKK Watumotaha Untuk Desa Watumotaha Kec. Ngapa Kab. Kolaka Utara', 120, 8, '600 Jiwa', 379819000, 0, 0, 120, 375414000, 'Bertahap', 0, '0', '0', 0, '0', '0', 0, '0', '0', 0, '0', '0', 11, NULL, 2),
(2019, 4, 2, 1, 1, 4, 'Pengembangan Jaringan Perpipaan SPAM Desa Nimbuneha Untuk Desa Nimbuneha  Kec. Ngapa Kab. Kolaka Utara', 105, 8, '525 Jiwa', 310850000, 0, 0, 105, 306801000, 'Bertahap', 0, '0', '0', 0, '0', '0', 0, '0', '0', 0, '0', '0', 11, NULL, 2),
(2019, 4, 2, 1, 1, 5, 'Pengembangan Jaringan Perpipaan SPAM Desa Mataleuno Untuk Desa Mataleuno  Kec.Pakue Utara Kab. Kolaka Utara', 147, 8, '735 Jiwa', 330730000, 0, 0, 147, 325122000, 'Bertahap', 0, '0', '0', 0, '0', '0', 0, '0', '0', 0, '0', '0', 11, NULL, 2),
(2019, 4, 2, 1, 1, 6, 'Pengembangan Jaringan Perpipaan SPAM Desa Saludongka  Untuk Desa Saludongka Kec.Pakue Utara Kab. Kolaka Utara', 192, 8, '960 Jiwa', 363647000, 0, 0, 192, 359969000, 'Bertahap', 0, '0', '0', 0, '0', '0', 0, '0', '0', 0, '0', '0', 11, NULL, 2),
(2019, 4, 2, 1, 1, 7, 'Pengembangan Jaringan Perpipaan SPAM Desa Loka,Patikala, dan Lawaki Jaya  Untuk Desa Loka, Patikala, dan Lawaki Jaya Kec. Tolala Kab. Kolaka Utara', 218, 8, '1090 Jiwa', 562250000, 0, 0, 218, 556347000, 'Bertahap', 0, '0', '0', 0, '0', '0', 0, '0', '0', 0, '0', '0', 11, NULL, 2),
(2019, 5, 1, 1, 1, 1, 'Pembangunan IPALD Kec. Pakue', 1, 3, '50-100 KK', 500000000, 1, 500000000, 0, 0, 'Bertahap', 0, '0', '0', 0, '0', '0', 485000000, '0', '71', 290000000, '0', '23', 11, NULL, 1),
(2019, 5, 1, 2, 1, 1, 'Pembangunan Tangki Septik Komunal Kec Lambai Desa Lapasi-Pasi', 5, 3, '20-50 KK', 250000000, 5, 250000000, 0, 0, 'Bertahap', 0, '0', '0', 0, '0', '0', 122500000, '0', '52', 57500000, '0', '32', 11, NULL, 1),
(2019, 5, 1, 2, 1, 2, 'Pembangunan Tangki Septik Komunal Kec. Wawo Desa Wawo', 5, 3, '20-50 KK', 250000000, 5, 250000000, 0, 0, 'Bertahap', 0, '0', '0', 0, '0', '0', 42500000, '0', '61', 105000000, '0', '61', 11, NULL, 1),
(2019, 5, 1, 2, 1, 3, 'Pembangunan Tangki Septik Komunal Kec. Katoi  Desa Lambuno', 5, 3, '20-50 KK', 250000000, 5, 250000000, 0, 0, 'Bertahap', 0, '0', '0', 0, '0', '0', 175000000, '0', '74', 227500000, '0', '87', 11, NULL, 1),
(2019, 5, 1, 2, 1, 4, 'Pembangunan Tangki Septik Komunal Kec. Pakue Utara  Desa Puundoho', 5, 3, '20-50 KK', 250000000, 5, 250000000, 0, 0, 'Bertahap', 0, '0', '0', 0, '0', '0', 235000000, '0', '70', 142500000, '0', '86', 11, NULL, 1),
(2019, 5, 1, 2, 1, 5, 'Pembangunan Tangki Septik Komunal Kec. Pakue Tengah  Desa Powalaa', 5, 3, '20-50 KK', 250000000, 5, 250000000, 0, 0, 'Bertahap', 0, '0', '0', 0, '0', '0', 165000000, '0', '25', 247500000, '0', '35', 11, NULL, 1),
(2019, 5, 1, 2, 1, 6, 'Pembangunan Tangki Septik Komunal Kec. Porehu  Desa Ponggi', 5, 3, '20-50 KK', 250000000, 5, 250000000, 0, 0, 'Bertahap', 0, '0', '0', 0, '0', '0', 135000000, '0', '99', 30000000, '0', '96', 11, NULL, 1),
(2019, 5, 1, 2, 1, 7, 'Pembangunan Tangki Septik Komunal Kec. Tolala  Desa Bahari', 5, 3, '20-50 KK', 286777500, 5, 286777500, 0, 0, 'Bertahap', 0, '0', '0', 0, '0', '0', 103239900, '0', '87', 134785425, '0', '61', 11, NULL, 1),
(2019, 5, 1, 3, 1, 1, 'Pembangunan  Tangki Septik Individual Perkotaan Zona Wilayah 1', 407, 3, '2035 Jiwa', 2442000000, 407, 2442000000, 0, 0, 'Bertahap', 0, '0', '0', 0, '0', '0', 1929180000, '0', '57', 2197800000, '0', '91', 11, NULL, 1),
(2019, 5, 1, 3, 2, 1, 'Pengadaan Truck Tinja', 1, 3, '1 Kecamatan', 547730000, 0, 0, 1, 484700000, 'Bertahap', 0, '0', '0', 0, '0', '0', 344137000, '0', '77', 126022000, '0', '73', 11, NULL, 2),
(2019, 7, 1, 1, 1, 1, 'Rehabilitasi Jaringan Irigasi Batu Putih DI Batu Putih', 520, 9, '62 Ha', 744000000, 0, 0, 520, 740062000, 'Bertahap', 0, '0', '0', 0, '0', '0', 500000000, '0', '81', 740062000, '0', '100', 11, NULL, 2),
(2019, 7, 1, 1, 1, 2, 'Rehabilitasi Jaringan Irigasi Majapahit DI Majapahit', 465, 9, '46 Ha', 552000000, 0, 0, 465, 548082510, 'Bertahap', 0, '0', '0', 0, '0', '0', 500000000, '0', '90', 548082510, '0', '100', 11, NULL, 2),
(2019, 7, 1, 1, 1, 3, 'Rehabilitasi Jaringan Irigasi Mataleuno DI Mataleuno', 785, 9, '90 Ha', 1080000000, 0, 0, 785, 1006500000, 'Bertahap', 0, '0', '0', 0, '0', '0', 503250000, '0', '65', 1006500000, '0', '100', 11, NULL, 2),
(2019, 7, 1, 1, 1, 4, 'Rehabilitasi Jaringan Irigasi Pasampang DI Pasampang-Labipi', 497, 9, '51 Ha', 612000000, 0, 0, 497, 607500000, 'Bertahap', 0, '0', '0', 0, '0', '0', 300000000, '0', '75', 607500000, '0', '100', 11, NULL, 2),
(2019, 7, 1, 1, 1, 5, 'Rehabilitasi Jaringan Irigasi Rante Angin DI Rante Angin', 1065, 9, '100 Ha', 1200000000, 0, 0, 1065, 1194000000, 'Bertahap', 0, '0', '0', 0, '0', '0', 800000000, '0', '70', 1194000000, '0', '100', 11, NULL, 2),
(2019, 7, 1, 1, 1, 6, 'Rehabilitasi Jaringan Irigasi Salulotong DI Salulotong', 470, 9, '47 Ha', 564000000, 0, 0, 470, 560565000, 'Bertahap', 0, '0', '0', 0, '0', '0', 450000000, '0', '65', 560565000, '0', '100', 11, NULL, 2),
(2019, 7, 1, 1, 1, 7, 'Rehabilitasi Jaringan Irigasi Wawo DI Wawo', 210, 9, '21 Ha', 252000000, 0, 0, 210, 250260000, 'Bertahap', 0, '0', '0', 0, '0', '0', 200000000, '0', '89', 250260000, '0', '100', 11, NULL, 2),
(2019, 10, 1, 1, 1, 1, 'Pengadaan Kapal Ikan 2 GT Fiber Glass Beserta Mesin,Alat Tangkap Gillnet dan Alat Bantu Penangkapan Fish Finder', 5, 2, '4 Desa (Desa Lawekara Kec Rante Angin, Desa Watunohu Kec. Watunohu, Desa Sapoiha Kec Watunohu, Desa Lametuna Kec Kodeoha)', 222500000, 0, 0, 5, 220752400, 'Bertahap', 0, '0', '0', 0, '0', '0', 90508484, '0', '47', 90508484, '0', '29', 11, NULL, 2),
(2019, 10, 1, 1, 1, 2, 'Pengadaan Kapal Penangkapan Ikan 2 GT Kayu Beserta Mesin, Alat Tangkap Gillnet dan Alat Bantu Penangkapan Fish Finder', 8, 2, '7 Desa ( Desa Pitulua Kec. Lasusua, Desa Lasusua Kec Lasusua, Desa Wawo Kec. Wawo, Desa Walasiho Kec Wawo, Desa Lambai Kec Lambai, Desa Ujung Tobaku Kec Katoi, Desa Lanipa-Nipa Kec Katoi)', 324000000, 0, 0, 8, 320892000, 'Bertahap', 0, '0', '0', 0, '0', '0', 243877920, '0', '59', 80223000, '0', '29', 11, NULL, 2),
(2019, 10, 1, 1, 2, 1, 'Pengadaan Alat Penangkapan Ikan (DAK)', 43, 3, '11 Kecamatan (Kec.Rante Angin, Kec Lambai, Kec Wawo. Kec Lasusua, Kec Katoi, Kec.Kodeoha, Kec Watunohu, Kec Pakue, Kec Pakue Tengah, Kec Batu Putih)', 178250000, 0, 0, 43, 177529000, 'Bertahap', 0, '0', '0', 0, '0', '0', 83438630, '0', '20', 49708120, '0', '14', 11, NULL, 2),
(2019, 10, 1, 1, 3, 1, 'Alat Bantu Penangkapan Ikan', 20, 3, '8 Kecamatan (Kec Lambai, Kec Wawo, KecLasusua, Kec Katoi, Kec Watunohu, Kec Pakue, Kec Pakue Tengah, Kec Batu Putih)', 47500000, 0, 0, 20, 47190000, 'Bertahap', 0, '0', '0', 0, '0', '0', 11325600, '0', '88', 13213200, '0', '53', 11, NULL, 2),
(2019, 10, 1, 1, 4, 1, 'Paket Percontohan Budidaya Udang Vename Tradisional Desa Teposua Kecamatan Pakue Utara', 1, 2, '1 Kelompok', 50000000, 1, 50000000, 0, 0, 'Bertahap', 0, '0', '0', 0, '0', '0', 37000000, '0', '58', 46500000, '0', '31', 11, NULL, 1),
(2019, 10, 1, 1, 4, 2, 'Paket Percontohan Budidaya Udang Vaname Tradisional Desa Wawo Kecamatan Wawo', 1, 2, '1 Kelompok', 50000000, 1, 50000000, 0, 0, 'Bertahap', 0, '0', '0', 0, '0', '0', 41500000, '0', '90', 8500000, '0', '17', 11, NULL, 1),
(2019, 10, 1, 1, 5, 1, 'Paket Percontohan Budidaya Ikan Nila Salin Desa Tahibua Kecamatan Tiwu', 3, 2, '1 Kelompok', 132195000, 3, 132195000, 0, 0, 'Bertahap', 0, '0', '0', 0, '0', '0', 38336550, '0', '71', 67419450, '0', '79', 11, NULL, 1),
(2019, 10, 1, 1, 6, 1, 'Paket Budidaya Ikan Nila Dengan Padi (MINAPADI) Desa Majapahit Kecamatan Pakue Tengah', 2, 2, '1 Kelompok', 66000000, 2, 66000000, 0, 0, 'Bertahap', 0, '0', '0', 0, '0', '0', 46860000, '0', '68', 54120000, '0', '12', 11, NULL, 1),
(2019, 10, 1, 1, 6, 2, 'Paket Budidaya Ikan Nila Dengan Padi (MINAPADI) Desa Rante Limbong Kecamatan Lasusua', 2, 2, '1 Kelompok', 66000000, 2, 66000000, 0, 0, 'Bertahap', 0, '0', '0', 0, '0', '0', 62700000, '0', '58', 57420000, '0', '67', 11, NULL, 1),
(2019, 10, 1, 1, 7, 1, 'Paket Budidaya Ikan Lele di Kolam Terpal Desa Ngapa Kecamatan Ngapa', 2, 2, '1 Kelompok', 83843600, 1, 83843600, 0, 0, 'Bertahap', 0, '0', '0', 0, '0', '0', 65398008, '0', '19', 36052748, '0', '38', 11, NULL, 1),
(2019, 10, 1, 1, 7, 2, 'Paket Budidaya Ikan Lele di Kolam Terpal Desa Delang-Delang Kecamatan Kodeoha', 1, 2, '1 Kelompok', 40000000, 1, 40000000, 0, 0, 'Bertahap', 0, '0', '0', 0, '0', '0', 36000000, '0', '20', 7200000, '0', '86', 11, NULL, 1),
(2019, 11, 1, 1, 1, 1, 'Pembangunan Embung Desa Lanipa-Nipa Kec. Katoi', 1, 3, '1 Desa', 150000000, 1, 150000000, 0, 0, 'Bertahap', 0, '0', '0', 0, '0', '0', 28500000, '0', '30', 22500000, '0', '61', 11, NULL, 1),
(2019, 11, 1, 1, 1, 2, 'Pembangunan Embung Desa Tadaumerah Kec. Ngapa', 1, 3, '1 Desa', 150000000, 1, 150000000, 0, 0, 'Bertahap', 0, '0', '0', 0, '0', '0', 111000000, '0', '95', 123000000, '0', '95', 11, NULL, 1),
(2019, 11, 1, 1, 1, 3, 'Pembangunan Embung Desa Koreiha Kec. Ngapa', 1, 3, '1 Desa', 150000000, 1, 150000000, 0, 0, 'Bertahap', 0, '0', '0', 0, '0', '0', 75000000, '0', '91', 55500000, '0', '75', 11, NULL, 1),
(2019, 11, 1, 1, 1, 4, 'Pembangunan Embung Desa Watumotaha Kec. Ngapa', 1, 3, '1 Desa', 154817000, 1, 154817000, 0, 0, 'Bertahap', 0, '0', '0', 0, '0', '0', 20126210, '0', '85', 60378630, '0', '68', 11, NULL, 1),
(2019, 11, 1, 1, 2, 1, 'Pembangunan Pintu Air Kelurahan Rante Baru Kec. Rante Angin', 1, 3, '1 Desa', 30000000, 1, 30000000, 0, 0, 'Bertahap', 0, '0', '0', 0, '0', '0', 9600000, '0', '57', 20100000, '0', '52', 11, NULL, 1),
(2019, 11, 1, 1, 2, 2, 'Pembangunan Pintu Air Kel Rante Angin  Kec. Rante Angin', 1, 3, '1 Desa', 30000000, 1, 30000000, 0, 0, 'Bertahap', 0, '0', '0', 0, '0', '0', 25500000, '0', '73', 29100000, '0', '95', 11, NULL, 1),
(2019, 11, 1, 1, 2, 3, 'Pembangunan Pintu Air Desa Landolia Kec. Rante Angin', 1, 3, '1 Desa', 30000000, 1, 30000000, 0, 0, 'Bertahap', 0, '0', '0', 0, '0', '0', 17100000, '0', '20', 4500000, '0', '83', 11, NULL, 1),
(2019, 11, 1, 2, 1, 1, 'Pembangunan Jalan Produksi Perkebunan Desa Rante Baru Kec. Rante Angin', 1, 6, '1 Desa', 287300000, 1, 287300000, 0, 0, 'Bertahap', 0, '0', '0', 0, '0', '0', 51714000, '0', '58', 206856000, '0', '84', 11, NULL, 1),
(2019, 13, 1, 1, 1, 1, 'Pembangunan Pasar Rakyat (DAK) Latali', 1, 3, '1 Desa', 1642932675, 0, 0, 1, 1637712000, 'Bertahap', 0, '0', '0', 0, '0', '0', 638707680, '0', '34', 605953440, '0', '62', 11, NULL, 2),
(2019, 13, 1, 1, 1, 2, 'Pembangunan Pasar Rakyat (DAK) Bangsalae', 1, 3, '1 Desa', 1242932675, 0, 0, 1, 1237787000, 'Bertahap', 0, '0', '0', 0, '0', '0', 358958230, '0', '84', 420847580, '0', '55', 11, NULL, 2),
(2019, 13, 1, 2, 1, 1, 'Pengadaan Motor Operasional Kemetrologian', 1, 2, '1 Prangkat Daerah', 138400000, 0, 0, 1, 130400000, 'Bertahap', 0, '0', '0', 0, '0', '0', 23472000, '0', '54', 57376000, '0', '27', 11, NULL, 2),
(2019, 13, 1, 2, 1, 2, 'Pengadaan Mobil Operasional Kemetrologian', 1, 3, '1 OPD', 466000000, 0, 0, 1, 452000000, 'Bertahap', 0, '0', '0', 0, '0', '0', 339000000, '0', '11', 203400000, '0', '47', 11, NULL, 2),
(2019, 13, 1, 2, 1, 3, 'Pengadaan Karoseri Kendaraan Operasional Kemetrologian', 1, 2, '1 OPD', 145600000, 0, 0, 1, 141790000, 'Bertahap', 0, '0', '0', 0, '0', '0', 120521500, '0', '25', 19850600, '0', '92', 11, NULL, 2),
(2019, 13, 1, 2, 2, 1, 'Pengadaan Alat UTTP', 1, 2, '1 Kecamatan', 750000000, 0, 0, 1, 733865000, 'Bertahap', 0, '0', '0', 0, '0', '0', 198143550, '0', '72', 139434350, '0', '48', 11, NULL, 2),
(2019, 15, 1, 1, 1, 1, 'Pembangunan Bank Sampah', 1, 3, '1 Desa', 250000000, 0, 0, 1, 248559000, 'Bertahap', 0, '0', '0', 0, '0', '0', 161563350, '0', '25', 74567700, '0', '97', 11, NULL, 2),
(2019, 15, 1, 1, 2, 1, 'Pembangunan Rumah Pengomposan', 1, 3, '1 Desa', 200000000, 0, 0, 1, 199220000, 'Bertahap', 0, '0', '0', 0, '0', '0', 69727000, '0', '92', 197227800, '0', '96', 11, NULL, 2),
(2019, 15, 1, 2, 1, 1, 'Pengadaan Dump Truck', 1, 3, '1 Kecamatan', 387860000, 0, 0, 1, 351700000, 'Bertahap', 0, '0', '0', 0, '0', '0', 239156000, '0', '51', 298945000, '0', '70', 11, NULL, 2);

-- --------------------------------------------------------

--
-- Table structure for table `file`
--

CREATE TABLE `file` (
  `id_file` int(11) NOT NULL,
  `file_nama` text,
  `file_ket` text,
  `tahun` int(11) NOT NULL,
  `bidang_kode` int(11) NOT NULL,
  `sub_bidang_kode` int(11) NOT NULL,
  `kegiatan_kode` int(11) NOT NULL,
  `rincian_kode` int(11) NOT NULL,
  `detail_rincian_kode` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `indikator`
--

CREATE TABLE `indikator` (
  `id_indikator` int(11) NOT NULL,
  `indikator_nama` varchar(45) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `indikator`
--

INSERT INTO `indikator` (`id_indikator`, `indikator_nama`) VALUES
(1, 'Sosial Budaya'),
(2, 'Ekonomi'),
(3, 'Infrastruktur');

-- --------------------------------------------------------

--
-- Table structure for table `jenis`
--

CREATE TABLE `jenis` (
  `id_jenis` int(11) NOT NULL,
  `jenis_nama` varchar(45) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `jenis`
--

INSERT INTO `jenis` (`id_jenis`, `jenis_nama`) VALUES
(1, 'Reguler'),
(2, 'Penugasan'),
(3, 'Afirmasi');

-- --------------------------------------------------------

--
-- Table structure for table `kegiatan`
--

CREATE TABLE `kegiatan` (
  `tahun` int(11) NOT NULL,
  `bidang_kode` int(11) NOT NULL,
  `sub_bidang_kode` int(11) NOT NULL,
  `kegiatan_kode` int(11) NOT NULL,
  `kegiatan_nama` text,
  `kegiatan_jenis` tinyint(4) DEFAULT NULL,
  `id_jenis` int(11) NOT NULL,
  `id_opd` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `kegiatan`
--

INSERT INTO `kegiatan` (`tahun`, `bidang_kode`, `sub_bidang_kode`, `kegiatan_kode`, `kegiatan_nama`, `kegiatan_jenis`, `id_jenis`, `id_opd`) VALUES
(2019, 1, 1, 1, 'REHABILITASI PRASARANA BELAJAR SD ', 0, 1, 1),
(2019, 1, 1, 2, 'PEMBANGUNAN PRASARANA BELAJAR SD ', NULL, 1, 1),
(2019, 1, 1, 3, 'PENGADAAN SARANA BELAJAR SD ', NULL, 1, 1),
(2019, 1, 2, 1, 'REHABILITASI PRASARANA BELAJAR SMP ', NULL, 1, 1),
(2019, 1, 2, 2, 'PEMBANGUNAN PRASARANA BELAJAR SMP ', NULL, 1, 1),
(2019, 1, 2, 3, 'PENGADAAN SARANA BELAJAR SMP', NULL, 1, 1),
(2019, 1, 3, 1, 'PEMBANGUNAN PRASARANA BELAJAR SKB', NULL, 1, 1),
(2019, 1, 3, 2, 'PENGADAAN SARANA BELAJAR SKB', NULL, 1, 1),
(2019, 1, 3, 3, 'SARANA DAN PRASARANA PAUD (HANYA UNTUK TK NEGERI, MOHON CEK REFERENSI) ', NULL, 1, 1),
(2019, 1, 4, 1, 'REHABILITASI GEDUNG LAYANAN PERPUSTAKAAN ', NULL, 1, 2),
(2019, 1, 4, 2, 'PENGEMBANGAN KOLEKSI PERPUSTAKAAN ', NULL, 1, 2),
(2019, 2, 1, 1, 'PENYEDIAAN ALAT KESEHATAN PUSKESMAS NON AFIRMASI ', NULL, 1, 3),
(2019, 2, 2, 1, 'PEMBANGUNAN DAN REHABILITASI RS KAB/KOTA DAN PROVINSI ', NULL, 1, 4),
(2019, 2, 2, 2, 'PENYEDIAAN ALAT KESEHATAN DI RS KAB/KOTA DAN PROVINSI', NULL, 1, 4),
(2019, 2, 3, 1, 'PENYEDIAAN OBAT DAN BMHP (BAHAN MEDIS HABIS PAKAI) DI KAB/KOTA ', NULL, 1, 3),
(2019, 2, 4, 1, 'PENYEDIAAN SARANA PRASARANA KLINIK PELAYANAN KB ', NULL, 1, 5),
(2019, 2, 4, 2, 'PENGADAAN MOBIL UNIT PENERANGAN KB ', NULL, 1, 5),
(2019, 2, 4, 3, 'PENGADAAN SARANA KIE KIT DAN MEDIA LINI LAPANGAN ', NULL, 1, 5),
(2019, 2, 5, 1, 'PENYEDIAAN OBAT GIZI ', NULL, 2, 3),
(2019, 2, 6, 1, 'PENYEDIAAN CRYOTERAPI  ', NULL, 2, 3),
(2019, 2, 6, 2, 'PENYEDIAAN VACCINE CARRIER ', NULL, 2, 3),
(2019, 2, 6, 3, 'PENGADAAN BAHAN HABIS PAKAI PEMERIKSAAN HIV, CD4 DAN VIRALOAD', NULL, 2, 3),
(2019, 3, 1, 1, 'PENINGKATAN (STRUKTUR DAN KAPASITAS) JALAN/JEMBATAN (REGULER) ', NULL, 1, 6),
(2019, 4, 1, 1, 'PERLUASAN SPAM PERPIPAAN MELALUI PEMANFAATAN IDLE CAPACITY SISTEM PENYEDIAAN AIR MINUM (SPAM) TERBANGUN (REGULER) ', NULL, 1, 6),
(2019, 4, 2, 1, 'PERLUASAN SPAM PERPIPAAN MELALUI PEMANFAATAN IDLE CAPACITY SISTEM PENYEDIAAN AIR MINUM (SPAM) TERBANGUN KHUSUS UNTUK DESA YANG SUDAH MELAKSANAKAN PAMSIMAS (PENUGASAN) ', NULL, 2, 6),
(2019, 5, 1, 1, 'PENGEMBANGAN SISTEM PENGELOLAAN AIR LIMBAH DOMESTIK TERPUSAT (SPALD-T) SKALA PERMUKIMAN DAN/ATAU PERKOTAAN (REGULER) ', NULL, 1, 6),
(2019, 5, 1, 2, 'PEMBANGUNAN SISTEM PENGELOLAAN AIR LIMBAH DOMESTIK SETEMPAT (SPALD-S) DI DAERAH PERKOTAAN DAN/ATAU PERDESAAN (REGULER) ', NULL, 1, 6),
(2019, 5, 1, 3, 'PEMBANGUNAN SISTEM PENGELOLAAN AIR LIMBAH DOMESTIK SETEMPAT (SPALD-S) DI DAERAH PERKOTAAN DAN/ATAU PERDESAAN (PENUGASAN) ', NULL, 2, 6),
(2019, 7, 1, 1, 'REHABILITASI JARINGAN IRIGASI', NULL, 2, 6),
(2019, 10, 1, 1, 'Pengadaan Sarana dan Prasarana Pemberdayaan Usaha Kecil Masyarakat Kelautan dan Perikanan (Nelayan dan Pembudidaya Ikan)', NULL, 1, 9),
(2019, 11, 1, 1, 'PEMBANGUNAN/PERBAIKAN SUMBER-SUMBER AIR ', NULL, 1, 7),
(2019, 11, 1, 2, 'PEMBANGUNAN/PERBAIKAN JALAN PERTANIAN ', NULL, 1, 8),
(2019, 13, 1, 1, 'PEMBANGUNAN/REVITALISASI PASAR RAKYAT, KHUSUSNYA TIPE D ', NULL, 2, 10),
(2019, 13, 1, 2, 'PENYEDIAAN SARANA DALAM MENDUKUNG PEMBENTUKAN UNIT METROLOGI LEGAL ', NULL, 2, 10),
(2019, 15, 1, 1, 'PENGELOLAAN SAMPAH SERTA SARANA PRASARANA PENDUKUNG ', NULL, 2, 11),
(2019, 15, 1, 2, 'PENGADAAN ALAT ANGKUT SAMPAH DUMP TRUCK ', NULL, 2, 11);

-- --------------------------------------------------------

--
-- Table structure for table `kegiatan_penunjang`
--

CREATE TABLE `kegiatan_penunjang` (
  `tahun` int(11) NOT NULL,
  `bidang_kode` int(11) NOT NULL,
  `sub_bidang_kode` int(11) NOT NULL,
  `kegiatan_penunjang_kode` int(11) NOT NULL,
  `kegiatan_penunjang_nama` text,
  `kegiatan_penunjang_volume` double DEFAULT NULL,
  `id_satuan` int(11) NOT NULL,
  `kegiatan_penunjang_penerima_manfaat` text,
  `kegiatan_penunjang_pagu` double DEFAULT NULL,
  `kegiatan_penunjang_swakelola_volume` double DEFAULT NULL,
  `kegiatan_penunjang_swakelola_rp` double DEFAULT NULL,
  `kegiatan_penunjang_konstraktual_volume` double DEFAULT NULL,
  `kegiatan_penunjang_konstraktual_rp` double DEFAULT NULL,
  `kegiatan_penunjang_pembayaran` varchar(100) DEFAULT NULL,
  `kegiatan_penunjang_tw1_keuangan_rp` double DEFAULT NULL,
  `kegiatan_penunjang_tw1_fisik_volume` double DEFAULT NULL,
  `kegiatan_penunjang_tw1_fisik_persen` double DEFAULT NULL,
  `kegiatan_penunjang_tw2_keuangan_rp` double DEFAULT NULL,
  `kegiatan_penunjang_tw2_fisik_volume` double DEFAULT NULL,
  `kegiatan_penunjang_tw2_fisik_persen` double DEFAULT NULL,
  `kegiatan_penunjang_tw3_keuangan_rp` double DEFAULT NULL,
  `kegiatan_penunjang_tw3_fisik_volume` double DEFAULT NULL,
  `kegiatan_penunjang_tw3_fisik_persen` double DEFAULT NULL,
  `kegiatan_penunjang_tw4_keuangan_rp` double DEFAULT NULL,
  `kegiatan_penunjang_tw4_fisik_volume` double DEFAULT NULL,
  `kegiatan_penunjang_tw4_fisik_persen` double DEFAULT NULL,
  `kegiatan_penunjang_file` text,
  `kegiatan_penunjang_jenis` tinyint(4) DEFAULT NULL,
  `id_masalah` int(11) NOT NULL,
  `id_jenis` int(11) NOT NULL,
  `kegiatan_penunjang_pelaksanaan_jenis` tinyint(4) DEFAULT NULL COMMENT '1. Swakelola\n2. Konstraktual'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `kegiatan_penunjang`
--

INSERT INTO `kegiatan_penunjang` (`tahun`, `bidang_kode`, `sub_bidang_kode`, `kegiatan_penunjang_kode`, `kegiatan_penunjang_nama`, `kegiatan_penunjang_volume`, `id_satuan`, `kegiatan_penunjang_penerima_manfaat`, `kegiatan_penunjang_pagu`, `kegiatan_penunjang_swakelola_volume`, `kegiatan_penunjang_swakelola_rp`, `kegiatan_penunjang_konstraktual_volume`, `kegiatan_penunjang_konstraktual_rp`, `kegiatan_penunjang_pembayaran`, `kegiatan_penunjang_tw1_keuangan_rp`, `kegiatan_penunjang_tw1_fisik_volume`, `kegiatan_penunjang_tw1_fisik_persen`, `kegiatan_penunjang_tw2_keuangan_rp`, `kegiatan_penunjang_tw2_fisik_volume`, `kegiatan_penunjang_tw2_fisik_persen`, `kegiatan_penunjang_tw3_keuangan_rp`, `kegiatan_penunjang_tw3_fisik_volume`, `kegiatan_penunjang_tw3_fisik_persen`, `kegiatan_penunjang_tw4_keuangan_rp`, `kegiatan_penunjang_tw4_fisik_volume`, `kegiatan_penunjang_tw4_fisik_persen`, `kegiatan_penunjang_file`, `kegiatan_penunjang_jenis`, `id_masalah`, `id_jenis`, `kegiatan_penunjang_pelaksanaan_jenis`) VALUES
(2019, 1, 4, 1, 'Desain Perencanaan Untuk Kegiatan Kontraktual', 1, 2, '-', 35440000, 0, 0, 1, 35200000, 'Bertahap', 0, 0, 0, 0, 0, 0, 3520000, 0, 77, 0, 0, 0, NULL, 2, 11, 1, NULL),
(2019, 1, 4, 2, 'Biaya Tender', 1, 2, '-', 6060000, 1, 6060000, 0, 0, 'Bertahap', 0, 0, 0, 0, 0, 0, 0, 0, 25, 0, 0, 0, NULL, 1, 11, 1, NULL),
(2019, 1, 4, 3, 'Penyelenggaraan Rapat Koordinasi', 3, 5, '-', 9000000, 3, 9000000, 0, 0, 'Bertahap', 0, 0, 0, 0, 0, 0, 0, 0, 37, 0, 0, 0, NULL, 1, 11, 1, NULL),
(2019, 1, 4, 4, 'Pengawasan Pelaksanaan Reviuw Oleh APIP di Daerah', 1, 2, '-', 15192000, 1, 15192000, 0, 0, 'Bertahap', 0, 0, 0, 0, 0, 0, 0, 0, 28, 0, 0, 0, NULL, 1, 11, 1, NULL),
(2019, 1, 4, 5, 'Penunjukan Konsultan Pengawas Kegiatan Kontraktual', 1, 7, '-', 34808000, 1, 34808000, 0, 0, 'Bertahap', 0, 0, 0, 0, 0, 0, 0, 0, 43, 0, 0, 0, NULL, 1, 11, 1, NULL),
(2019, 2, 2, 1, 'Desain Perencanaan Untuk Kegiatan Kontraktual', 1, 2, '-', 12000000, 0, 0, 1, 11800000, 'Bertahap', 6844000, 0, 15, 0, 0, 0, 0, 0, 0, 0, 0, 0, NULL, 2, 11, 1, NULL),
(2019, 2, 2, 2, 'Penyelenggaraan Rapat Koordinasi', 4, 5, '-', 18000000, 4, 18000000, 0, 0, 'Bertahap', 0, 0, 11, 0, 0, 0, 0, 0, 0, 0, 0, 0, NULL, 1, 11, 1, NULL),
(2019, 3, 1, 1, 'Penyelenggaraan rapat koordinasi', 2, 5, '-', 125000000, 2, 125000000, 0, 0, 'Bertahap', 0, 0, 16, 0, 0, 0, 0, 0, 0, 0, 0, 0, NULL, 1, 11, 1, NULL),
(2019, 3, 1, 4, 'Penunjukan Konsultan Pengawas Kegiatan Kontraktual', 3, 7, '-', 419022680, 0, 0, 3, 415282000, 'Bertahap', 16611280, 0, 2, 0, 0, 0, 0, 0, 0, 0, 0, 0, NULL, 2, 11, 1, NULL),
(2019, 3, 1, 5, 'Desain Perencanaan Untuk Kegiatan Kontraktual (Reguler)', 1, 2, '-', 300000000, 1, 300000000, 0, 0, 'Bertahap', 0, 0, 13, 0, 0, 0, 0, 0, 0, 0, 0, 0, NULL, 1, 11, 1, NULL),
(2019, 3, 1, 6, 'Perjalanan Dinas Ke dan Dari Lokasi Untuk Perencanaan,Pengendalian,dan Pengawasan', 1, 5, '-', 229911570, 1, 229911570, 0, 0, 'Bertahap', 0, 0, 24, 0, 0, 0, 0, 0, 0, 0, 0, 0, NULL, 1, 11, 1, NULL),
(2019, 3, 1, 7, 'Honorarium Fasilitator Kegiatan DAK Fisik yang Dilakukakan Secara Swakelolah', 2, 7, '-', 28757000, 2, 28757000, 0, 0, 'Bertahap', 0, 0, 22, 0, 0, 0, 0, 0, 0, 0, 0, 0, NULL, 1, 11, 1, NULL),
(2019, 4, 1, 1, 'Honorarium Fasilitator Kegiatan DAK Fisik Yang Dilakukan Secara Swakelolah', 1, 7, '-', 6840000, 1, 6840000, 0, 0, 'Bertahap', 0, 0, 100, 0, 0, 0, 0, 0, 0, 0, 0, 0, NULL, 1, 11, 1, NULL),
(2019, 4, 1, 2, 'Perjalanan Dinas Ke dan Dari Lokasi Untuk Perencanaan,Pengendalian,dan Pengawasan', 62, 5, '-', 58750000, 62, 58750000, 0, 0, 'Bertahap', 0, 0, 100, 0, 0, 0, 0, 0, 0, 0, 0, 0, NULL, 1, 11, 1, NULL),
(2019, 4, 1, 3, 'Penunjukan Konsultan Pengawas Kegiatan Kontraktual', 1, 7, '-', 41157800, 0, 0, 1, 41089400, 'Bertahap', 41089400, 0, 100, 0, 0, 0, 0, 0, 0, 0, 0, 0, NULL, 2, 11, 1, NULL),
(2019, 4, 1, 4, 'Penyelenggaraan Rapat Koordinasi', 1, 5, '-', 1561900, 1, 1561900, 0, 0, 'Bertahap', 0, 0, 100, 0, 0, 0, 0, 0, 0, 0, 0, 0, NULL, 1, 11, 1, NULL),
(2019, 4, 2, 1, 'Penunjukan Konsultan Pengawas Kegiatan Kontraktual (Penugasan)', 1, 7, '-', 51336600, 0, 0, 1, 51238000, 'Bertahap', 51238000, 0, 100, 0, 0, 0, 0, 0, 0, 0, 0, 0, NULL, 2, 11, 2, NULL),
(2019, 4, 2, 2, 'Penyelenggaraan Rapat Koordinasi (Penugasan)', 1, 5, '-', 310150, 1, 310150, 0, 0, 'Bertahap', 0, 0, 100, 0, 0, 0, 0, 0, 0, 0, 0, 0, NULL, 1, 11, 2, NULL),
(2019, 4, 2, 3, 'Perjalanan Dinas Ke dan Dari Lokasi Untuk Perencanaan,Pengendalian,dan Pengawasan (Penugasan)', 83, 5, '-', 83450000, 83, 83450000, 0, 0, 'Bertahap', 0, 0, 100, 0, 0, 0, 0, 0, 0, 0, 0, 0, NULL, 1, 11, 2, NULL),
(2019, 5, 1, 1, 'Honorarium Fasilitator Kegiatan DAK Fisik yang Dilakukakan Secara Swakelolah', 4, 7, '-', 76800000, 4, 76800000, 0, 0, 'Bertahap', 0, 0, 37, 0, 0, 0, 0, 0, 0, 0, 0, 0, NULL, 1, 11, 1, NULL),
(2019, 5, 1, 2, 'Penyelenggaraan Rapat Koordinasi', 12, 5, '-', 8581500, 12, 8581500, 0, 0, 'Bertahap', 0, 0, 35, 0, 0, 0, 0, 0, 0, 0, 0, 0, NULL, 1, 11, 1, NULL),
(2019, 5, 1, 3, 'Perjalanan Dinas Ke dan Dari Lokasi Untuk Perencanaan,Pengendalian,dan Pengawasan', 35, 5, '-', 34975000, 35, 34975000, 0, 0, 'Bertahap', 0, 0, 13, 0, 0, 0, 0, 0, 0, 0, 0, 0, NULL, 1, 11, 1, NULL),
(2019, 5, 1, 4, 'Honorarium Fasilitator Kegiatan DAK Fisik Yang Dilakukan Secara Swakelolah', 4, 7, '-', 63480000, 4, 63480000, 0, 0, 'Bertahap', 0, 0, 79, 0, 0, 0, 0, 0, 0, 0, 0, 0, NULL, 1, 11, 2, NULL),
(2019, 5, 1, 5, 'Penyelenggaraan Rapat Koordinasi', 12, 5, '-', 66584200, 12, 66584200, 0, 0, 'Bertahap', 0, 0, 18, 0, 0, 0, 0, 0, 0, 0, 0, 0, NULL, 1, 11, 2, NULL),
(2019, 5, 1, 6, 'Perjalanan Dinas Ke dan Dari Lokasi Untuk Perencanaan, Pengendalian dan Pengawasan (Penugasan)', 49, 5, '-', 27289800, 49, 27289800, 0, 0, 'Bertahap', 0, 0, 88, 0, 0, 0, 0, 0, 0, 0, 0, 0, NULL, 1, 11, 2, NULL),
(2019, 7, 1, 1, 'Honorarium Fasilitator Kegiatan DAK Fisik yang Dilakukakan Secara Swakelolah', 1, 7, '-', 9600000, 1, 9600000, 0, 0, 'Bertahap', 0, 0, 0, 0, 0, 0, 5000000, 0, 60, 9600000, 0, 100, NULL, 1, 11, 2, NULL),
(2019, 7, 1, 2, 'Penunjukan Konsultan Pengawas Kegiatan Kontraktual', 1, 7, '-', 100080000, 0, 0, 1, 99700000, 'Bertahap', 0, 0, 0, 0, 0, 0, 75000000, 0, 80, 99700000, 0, 100, NULL, 2, 11, 2, NULL),
(2019, 7, 1, 3, 'Penyelenggaraan Rapat Koordinasi', 2, 5, '-', 73000000, 2, 73000000, 0, 0, 'Bertahap', 0, 0, 0, 0, 0, 0, 12000000, 0, 10, 73000000, 0, 100, NULL, 1, 11, 2, NULL),
(2019, 7, 1, 4, 'Perjalanan Dinas Ke dan Dari Lokasi Untuk Perencanaan,Pengendalian,dan Pengawasan', 76, 5, '-', 75767000, 76, 75767000, 0, 0, 'Bertahap', 0, 0, 0, 0, 0, 0, 65000000, 0, 55, 75767000, 0, 100, NULL, 1, 11, 2, NULL),
(2019, 10, 1, 1, 'Desain Perencanaan Untuk Kegiatan Kontraktual', 1, 7, '-', 8800000, 0, 0, 1, 8760400, 'Bertahap', 7446340, 0, 11, 0, 0, 0, 0, 0, 0, 0, 0, 0, NULL, 2, 11, 1, NULL),
(2019, 10, 1, 2, 'Penyelenggaraan Rapat Koordinasi', 3, 5, '-', 2669400, 3, 2669400, 0, 0, 'Bertahap', 0, 0, 36, 0, 0, 0, 0, 0, 0, 0, 0, 0, NULL, 1, 11, 1, NULL),
(2019, 10, 1, 3, 'Perjalanan Dinas Ke dan Dari Lokasi Untuk Perencanaan,Pengendalian,dan Pengawasan', 3, 5, '-', 54830000, 3, 54830000, 0, 0, 'Bertahap', 0, 0, 88, 0, 0, 0, 0, 0, 0, 0, 0, 0, NULL, 1, 11, 1, NULL),
(2019, 11, 1, 1, 'Honorarium Fasilitator Kegiatan DAK Fisik Yang Dilakukan Secara Swakelolah', 9, 7, '-', 36000000, 9, 36000000, 0, 0, 'Bertahap', 0, 0, 52, 0, 0, 0, 0, 0, 0, 0, 0, 0, NULL, 1, 11, 1, NULL),
(2019, 11, 1, 2, 'Penyelenggaraan Rapat Koordinasi', 8, 5, '-', 5600000, 8, 5600000, 0, 0, 'Bertahap', 0, 0, 72, 0, 0, 0, 0, 0, 0, 0, 0, 0, NULL, 1, 11, 1, NULL),
(2019, 13, 1, 1, 'Desain Perencanaan Untuk Kegiatan Kontraktual', 2, 2, '-', 75943826, 0, 0, 2, 71610000, 'Bertahap', 66597300, 0, 65, 0, 0, 0, 0, 0, 0, 0, 0, 0, NULL, 2, 11, 2, NULL),
(2019, 13, 1, 2, 'Penunjukan Konsultasn Pengawas Kegiatan Kontraktual', 2, 7, '-', 60755060, 0, 0, 2, 54310000, 'Bertahap', 40189400, 0, 39, 0, 0, 0, 0, 0, 0, 0, 0, 0, NULL, 2, 11, 2, NULL),
(2019, 13, 1, 3, 'Perjalanan Dinas Ke Dan Dari Lokasi Untuk Perencanaan, Pengendalian, dan Pengawasan', 1, 5, '-', 15188764, 1, 15188764, 0, 0, 'Bertahap', 0, 0, 38, 0, 0, 0, 0, 0, 0, 0, 0, 0, NULL, 1, 11, 2, NULL),
(2019, 15, 1, 1, 'Desain Perencanaan Untuk Kegiatan Kontraktual', 1, 2, '-', 11250000, 0, 0, 1, 11055000, 'Bertahap', 4422000, 0, 87, 0, 0, 0, 0, 0, 0, 0, 0, 0, NULL, 2, 11, 2, NULL),
(2019, 15, 1, 2, 'Penunjukan Konsultasn Pengawas Kegiatan Kontraktual', 6, 7, '-', 11250000, 0, 0, 6, 11000000, 'Bertahap', 9350000, 0, 60, 0, 0, 0, 0, 0, 0, 0, 0, 0, NULL, 2, 11, 2, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `masalah`
--

CREATE TABLE `masalah` (
  `id_masalah` int(11) NOT NULL,
  `masalah_kode` int(11) DEFAULT NULL,
  `masalah_nama` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `masalah`
--

INSERT INTO `masalah` (`id_masalah`, `masalah_kode`, `masalah_nama`) VALUES
(1, 1, 'Permasalahan terkait dengan Peraturan perundangan'),
(2, 2, 'Permasalahan terkait dengan Petunjuk  Teknis'),
(3, 3, 'Permasalahan terkait dengan Rencana  Kerja  dan  Anggaran SKPD'),
(4, 4, 'Permasalahan terkait dengan DPA-SKPD'),
(5, 5, 'Permasalahan terkait dengan SK Penetapan Pelaksana  kegiatan'),
(6, 6, 'Permasalahan terkait dengan Pelaksanaan Tender Pekerjaan  Kontrak'),
(7, 7, 'Permasalahan terkait dengan Persiapan  Pekerjaan  Swakelola'),
(8, 8, 'Permasalahan terkait dengan Penerbitan SP2D'),
(9, 9, 'Permasalahan terkait dengan Pelaksanaan Pekerjaan  Kontrak'),
(10, 10, 'Permasalahan terkait dengan Pelaksanaan Pekerjaan  Swakelola'),
(11, 11, 'Permasalahan Lain-lain');

-- --------------------------------------------------------

--
-- Table structure for table `opd`
--

CREATE TABLE `opd` (
  `id_opd` int(11) NOT NULL,
  `opd_nama` text
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `opd`
--

INSERT INTO `opd` (`id_opd`, `opd_nama`) VALUES
(1, 'Dinas Pendidikan dan Kebudayaan'),
(2, 'Dinas Perpustakaan dan Arsip Daerah'),
(3, 'Dinas Kesehatan'),
(4, 'RSUD Djafar Harun'),
(5, 'Dinas Pengendalian Penduduk dan Keluarga Berencana'),
(6, 'Dinas PU dan Penataan Ruang'),
(7, 'Dinas Tanaman Pangan dan Holtikultura'),
(8, 'Dinas Perkebunan dan Peternakan'),
(9, 'Dinas Perikanan'),
(10, 'Dinas Perdagangan'),
(11, 'Dinas Lingkungan Hidup');

-- --------------------------------------------------------

--
-- Table structure for table `pegawai`
--

CREATE TABLE `pegawai` (
  `id_pegawai` int(11) NOT NULL,
  `pegawai_nip` varchar(45) DEFAULT NULL,
  `pegawai_nama` varchar(45) DEFAULT NULL,
  `pegawai_username` varchar(45) DEFAULT NULL,
  `pegawai_password` text,
  `pegawai_no_hp` varchar(15) DEFAULT NULL,
  `pegawai_jk` tinyint(4) DEFAULT NULL,
  `pegawai_jabatan` tinyint(4) DEFAULT NULL,
  `pegawai_email` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pegawai`
--

INSERT INTO `pegawai` (`id_pegawai`, `pegawai_nip`, `pegawai_nama`, `pegawai_username`, `pegawai_password`, `pegawai_no_hp`, `pegawai_jk`, `pegawai_jabatan`, `pegawai_email`) VALUES
(1, '-', 'Achmadi Ngalang, ST', 'ppkpendidikan', '$2y$10$XyT0gnmepaA8B26LBicylOrKPpW/s8EOf0t8uKPWzh.Gcakt8REpe', '-', NULL, NULL, 'achmadi.diknasporakolut@gmail.com'),
(2, '-', 'Drs. Syamsu Rijal, MM', 'ppkperpustakaan', '$2y$10$fN5jUcFUvh.kYDYSkDk25u8ajSce0YsxQT6p.WHAZbxzPjNVToaiC', '-', NULL, NULL, 'dinasperpustakaankabkolut@gmail.com'),
(3, '-', 'Irham, SKM,M.Kes', 'ppkkesehatan', '$2y$10$hZdHYIt1ccKbdEsIB7S/Ruu0W0adsGH/dS8IPw1tYCPNLjEJB8hxe', '-', NULL, NULL, 'dinkes.kolakautara@gmail.com'),
(4, '-', 'Muhammad Jufri, S.KM', 'ppkkb', '$2y$10$b5BA4e./MfD5QxX4uox/Xex9o2FZyY7rMJyvayUV2PMsknJY383i.', '-', NULL, NULL, 'jupridalduk01@gmail.com'),
(5, '-', 'Mulyadi, SKM', 'ppkrsud', '$2y$10$vf6hgHRSwORcoZAYr3OGceLMpdl1.PIwmJrqnGlTj.d/5X0yGddCC', '-', NULL, NULL, 'djafar.harun@gmail.com'),
(6, '-', 'Syahrullah, ST', 'ppkjalan', '$2y$10$DojdTZBzcsq3BW9TyySid.FN/OiuKlWVC.fRp1gDAiozFRlHdk0ca', '-', NULL, NULL, 'stsyahrullah@gmail.com'),
(7, '-', 'Mahmuddin, ST', 'ppkairminum', '$2y$10$ZsxUlCsr6l5qf5oPbyOKreEqA6oHAF1pFBusTFvncOCKjWJetSb3u', '-', NULL, NULL, 'udhienk.st@gmail.com'),
(8, '-', 'Sahrul, ST', 'ppksanitasi', '$2y$10$NIMDdW/X0PR4TrLSNgRY.OS/ewUEcPuHT9KjeZGeTLaz.02Lr9Hfa', '-', NULL, NULL, 'ciptakolut.2010@gmail.com'),
(9, '-', 'Agustan MA, S.Pi', 'ppkperikanan', '$2y$10$gpbUl1EgxZOQXXxDAPp5dOCvoeJp9x8idDMji7a0Zdg5mxcQsbKSe', '-', NULL, NULL, 'agustandkp@gmail.com'),
(10, '-', 'Ngatimo, SP', 'ppktanamanpangan', '$2y$10$gE93P2oBhTcc1dWL4FIhf.OGjM/yVsTjuNfLVPQ0lr5nQv0jDDbbm', '-', NULL, NULL, 'ngatimo-pertanian@yahoo.com'),
(11, '-', 'Nasrullah Ahmad, SP', 'ppkperkebunan', '$2y$10$ceKcDy1QXwxsYIyTzx1iC.1uNXaq8JHLnWOqZvTcj5rO.k0ja2/ru', '-', NULL, NULL, 'arigmo@gmail.com'),
(12, '-', 'Risal Natsir, S.Ag, M.Si', 'ppkpasar', '$2y$10$s7uOFtKiN7VRXzg6DgA.L.0cViiQljRc3rp4nhcL8xVAGUfQq2uwi', '-', NULL, NULL, 'risalnatsir2@gmail.com'),
(13, '-', 'Annas, ST', 'ppkirigasi', '$2y$10$OJvtdS6PMQTMHIJ6oBB6BusImVVFa0Ha4dJzgznEVatUW3NWiD0QW', '-', NULL, NULL, 'annasst7@gamil.com'),
(14, '-', 'Suardi, S.Hut', 'ppklingkunganhidup', '$2y$10$Zc3YjP.nB6spBAwtiWaUE.rqiBPofii0MZguWHxhDioVfzU7IyttK', '-', NULL, NULL, 'suardi.sabir@yahoo.co.id'),
(15, '-', 'Ahmad Khairun', 'irun', '$2y$10$BsZGBDoP8ayxuPCRfptYvOMagoSYBIUiNzRzgvCv.YGhw2hABGNc.', '-', NULL, NULL, 'irunwazed@gmail.com');

-- --------------------------------------------------------

--
-- Table structure for table `pegawai_penunjang`
--

CREATE TABLE `pegawai_penunjang` (
  `id_pegawai_penunjang` int(11) NOT NULL,
  `id_pegawai` int(11) NOT NULL,
  `tahun` int(11) NOT NULL,
  `bidang_kode` int(11) NOT NULL,
  `sub_bidang_kode` int(11) NOT NULL,
  `kegiatan_penunjang_kode` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `pegawai_ppk`
--

CREATE TABLE `pegawai_ppk` (
  `id_pegawai_ppk` int(11) NOT NULL,
  `id_pegawai` int(11) NOT NULL,
  `tahun` int(11) NOT NULL,
  `bidang_kode` int(11) NOT NULL,
  `sub_bidang_kode` int(11) NOT NULL,
  `id_jenis` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pegawai_ppk`
--

INSERT INTO `pegawai_ppk` (`id_pegawai_ppk`, `id_pegawai`, `tahun`, `bidang_kode`, `sub_bidang_kode`, `id_jenis`) VALUES
(8, 1, 2019, 1, 1, 1),
(9, 1, 2019, 1, 2, 1),
(11, 1, 2019, 1, 3, 1),
(12, 2, 2019, 1, 4, 1),
(13, 3, 2019, 2, 1, 1),
(14, 3, 2019, 2, 3, 1),
(16, 3, 2019, 2, 5, 2),
(17, 3, 2019, 2, 6, 2),
(18, 4, 2019, 2, 4, 1),
(19, 5, 2019, 2, 2, 1),
(20, 6, 2019, 3, 1, 1),
(21, 7, 2019, 4, 1, 1),
(22, 7, 2019, 4, 2, 2),
(23, 8, 2019, 5, 1, 1),
(24, 8, 2019, 5, 1, 2),
(25, 9, 2019, 10, 1, 1),
(26, 10, 2019, 11, 1, 1),
(27, 11, 2019, 11, 1, 1),
(28, 12, 2019, 13, 1, 2),
(29, 13, 2019, 7, 1, 2),
(30, 14, 2019, 15, 1, 2);

-- --------------------------------------------------------

--
-- Table structure for table `rincian`
--

CREATE TABLE `rincian` (
  `tahun` int(11) NOT NULL,
  `bidang_kode` int(11) NOT NULL,
  `sub_bidang_kode` int(11) NOT NULL,
  `kegiatan_kode` int(11) NOT NULL,
  `rincian_kode` int(11) NOT NULL,
  `rincian_nama` text
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `rincian`
--

INSERT INTO `rincian` (`tahun`, `bidang_kode`, `sub_bidang_kode`, `kegiatan_kode`, `rincian_kode`, `rincian_nama`) VALUES
(2019, 1, 1, 1, 1, 'REHABILITASI RUANG KELAS DENGAN TINGKAT KERUSAKAN SEDANG ATAU BERAT, BESERTA PERABOTNYA '),
(2019, 1, 1, 1, 2, 'REHABILITASI RUANG PERPUSTAKAAN DENGAN TINGKAT KERUSAKAN SEDANG/BERAT, BESERTA PERABOTNYA '),
(2019, 1, 1, 2, 1, 'PEMBANGUNAN RUANG KELAS BARU (RKB) BESERTA PERABOTNYA '),
(2019, 1, 1, 2, 2, 'PEMBANGUNAN TOILET (JAMBAN) BESERTA SANITASINYA '),
(2019, 1, 1, 3, 1, 'PENGADAAN BUKU KOLEKSI PERPUSTAKAAN (BUKU REFERENSI, BUKU PENGAYAAN, BUKU PANDUAN PENDIDIK) '),
(2019, 1, 2, 1, 1, 'REHABILITASI RUANG KELAS DENGAN TINGKAT KERUSAKAN MINIMAL SEDANG BESERTA PERABOTNYA '),
(2019, 1, 2, 1, 2, 'REHABILITASI RUANG LABORATORIUM ILMU PENGETAHUAN ALAM (IPA) BESERTA PERABOTNYA '),
(2019, 1, 2, 1, 3, 'REHABILITASI RUANG PERPUSTAKAAN DENGAN TINGKAT KERUSAKAN MINIMAL SEDANG BESERTA PERABOTNYA '),
(2019, 1, 2, 1, 4, 'REHABILITASI RUANG GURU DENGAN TINGKAT KERUSAKAN MINIMAL SEDANG BESERTA PERABOTNYA '),
(2019, 1, 2, 1, 5, 'REHABILITASI RUANG KANTOR BESERTA PERABOT '),
(2019, 1, 2, 2, 1, 'PEMBANGUNAN LABORATORIUM ILMU PENGETAHUAN ALAM (IPA) BESERTA PERABOTNYA '),
(2019, 1, 2, 2, 2, 'PEMBANGUNAN RUANG PERPUSTAKAAN BESERTA PERABOTNYA '),
(2019, 1, 2, 3, 1, 'PENGADAAN PERALATAN LABORATORIUM ILMU PENGETAHUAN ALAM (IPA) FISIKA '),
(2019, 1, 2, 3, 2, 'PENGADAAN MEDIA PENDIDIKAN '),
(2019, 1, 2, 3, 3, 'PENGADAAN SARANA PENDIDIKAN JASMANI OLAHRAGA DAN KESEHATAN (PJOK) '),
(2019, 1, 2, 3, 4, 'PENGADAAN BUKU KOLEKSI PERPUSTAKAAN SEKOLAH '),
(2019, 1, 2, 3, 5, 'PENGADAAN ALAT KESENIAN TRADISIONAL '),
(2019, 1, 3, 1, 1, 'PEMBANGUNAN RUANG KELAS BARU BESERTA PERABOTNYA '),
(2019, 1, 3, 1, 2, 'PEMBANGUNAN JAMBAN BESERTA SANITASINYA '),
(2019, 1, 3, 2, 1, 'PENGADAAN BUKU KOLEKSI PERPUSTAKAAN (BUKU REFERENSI, BUKU PENGAYAAN, BUKU PANDUAN PENDIDIK) '),
(2019, 1, 3, 3, 1, 'PEMBANGUNAN RUANG KELAS BARU (RKB) BESERTA PERABOTNYA '),
(2019, 1, 4, 1, 1, 'RENOVASI GEDUNG LAYANAN PEPUSTAKAAN PROVINSI/KAB/KOTA '),
(2019, 1, 4, 2, 1, 'PENGADAAN BAHAN PERPUSTAKAAN '),
(2019, 2, 1, 1, 1, 'PENYEDIAAN SET KESEHATAN GIGI DAN MULUT '),
(2019, 2, 1, 1, 2, 'PENYEDIAAN SET LABORATORIUM '),
(2019, 2, 1, 1, 3, 'PENYEDIAAN PERALATAN UKM (PUSTU SET, PHN KIT, IMUNISASI KIT, UKS KIT, UKGS KIT, BIDAN KIT, POSYANDU KIT, KESLING KIT) '),
(2019, 2, 2, 1, 1, 'INSTALASI CENTRAL STERILE SREVICE DEPARTMENT (CSSD) '),
(2019, 2, 2, 2, 1, 'ALAT KESEHATAN INSTALASI GAWAT DARURAT (IGD) '),
(2019, 2, 2, 2, 2, 'ALAT KESEHATAN INSTALASI RADIOLOGI '),
(2019, 2, 2, 2, 3, 'ALAT KESEHATAN INSTALASI CENTRAL STERILE SERVICE DEPARTMENT (CSSD) '),
(2019, 2, 3, 1, 1, 'PENGADAAN OBAT PUSKESMAS '),
(2019, 2, 3, 1, 2, 'PENYEDIAAN BAHAN MEDIS HABIS PAKAI PUSKESMAS '),
(2019, 2, 4, 1, 1, 'PENGADAAN IMPLANT REMOVAL KIT '),
(2019, 2, 4, 2, 1, 'PENGADAAN MOBIL UNIT PENERANGAN KB (MUPEN) '),
(2019, 2, 4, 3, 1, 'PENGADAAN KIE KIT '),
(2019, 2, 5, 1, 1, 'PENYEDIAAN OBAT GIZI (VITAMIN A MERAH, VITAMIN A BIRU, TABLET PENAMBAH DARAH IBU HAMIL, TABLET PENAMBAH DARAH REMAJA PUTRI DAN MINERAL MIX)  '),
(2019, 2, 6, 1, 1, 'CRYOTHERAPY '),
(2019, 2, 6, 2, 1, 'PENYEDIAAN VACCINE CARRIER '),
(2019, 2, 6, 3, 1, 'PENGADAAN BAHAN HABIS PAKAI PEMERIKSAAN HIV  '),
(2019, 3, 1, 1, 1, 'PENINGKATAN (STRUKTUR DAN KAPASITAS) JALAN '),
(2019, 4, 1, 1, 1, 'PENGEMBANGAN JARINGAN PERPIPAAN SPAM '),
(2019, 4, 2, 1, 1, 'PENGEMBANGAN JARINGAN PERPIPAAN SPAM '),
(2019, 5, 1, 1, 1, 'PEMBANGUNAN IPAL KOMUNAL MINIMAL 50 KK '),
(2019, 5, 1, 2, 1, 'PEMBANGUNAN TANGKI SEPTIK SKALA KOMUNAL (5-10 KK) '),
(2019, 5, 1, 3, 1, 'PEMBANGUNAN TANGKI SEPTIK SKALA INDIVIDU PERKOTAAN '),
(2019, 5, 1, 3, 2, 'PENGADAAN TRUK TINJA '),
(2019, 7, 1, 1, 1, 'REHABILITASI SALURAN SEKUNDER'),
(2019, 10, 1, 1, 1, 'Perahu/Kapal Penangkap Ikan Berukuran lebih kecil dari 3 GT beserta mesin, alat penangkapan ikan dan alat bantu penangkapan ikan'),
(2019, 10, 1, 1, 2, 'Alat Penangkapan Ikan Ramah Lingkungan'),
(2019, 10, 1, 1, 3, 'Alat Bantu Penangkapan Ikan'),
(2019, 10, 1, 1, 4, 'Paket Percontohan Budidaya Udang Tradisional'),
(2019, 10, 1, 1, 5, 'Paket Percontohan Nila di Kolam/Tambak'),
(2019, 10, 1, 1, 6, 'Paket Budidaya Ikan Nila/Udang Galah dengan Padi (MINAPADI)'),
(2019, 10, 1, 1, 7, 'Paket Budidaya Lele di Kolam'),
(2019, 11, 1, 1, 1, 'PEMBANGUNAN EMBUNG '),
(2019, 11, 1, 1, 2, 'PEMBANGUNAN PINTU AIR '),
(2019, 11, 1, 2, 1, 'PEMBANGUNAN JALAN PRODUKSI PERKEBUNAN '),
(2019, 13, 1, 1, 1, 'PEMBANGUNAN PASAR RAKYAT '),
(2019, 13, 1, 2, 1, 'PEMBELIAN KENDARAAN KEMETROLOGIAN '),
(2019, 13, 1, 2, 2, 'PEMBELIAN PERALATAN STANDAR KEMETROLOGIAN '),
(2019, 15, 1, 1, 1, 'BANK SAMPAH '),
(2019, 15, 1, 1, 2, 'RUMAH PENGOMPOSAN '),
(2019, 15, 1, 2, 1, 'PENGADAAN ALAT ANGKUT SAMPAH DUMP TRUCK ');

-- --------------------------------------------------------

--
-- Table structure for table `satuan`
--

CREATE TABLE `satuan` (
  `id_satuan` int(11) NOT NULL,
  `satuan_nama` varchar(45) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `satuan`
--

INSERT INTO `satuan` (`id_satuan`, `satuan_nama`) VALUES
(1, 'Ruang'),
(2, 'Paket'),
(3, 'Unit'),
(4, 'Buah'),
(5, 'Frekuensi'),
(6, 'Km'),
(7, 'Orang Bulan'),
(8, 'SR'),
(9, 'Meter');

-- --------------------------------------------------------

--
-- Table structure for table `sub_bidang`
--

CREATE TABLE `sub_bidang` (
  `tahun` int(11) NOT NULL,
  `bidang_kode` int(11) NOT NULL,
  `sub_bidang_kode` int(11) NOT NULL,
  `sub_bidang_nama` text
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `sub_bidang`
--

INSERT INTO `sub_bidang` (`tahun`, `bidang_kode`, `sub_bidang_kode`, `sub_bidang_nama`) VALUES
(2019, 1, 1, 'SD'),
(2019, 1, 2, 'SMP'),
(2019, 1, 3, 'SKB'),
(2019, 1, 4, 'PERPUSTAKAAN DAERAH'),
(2019, 2, 1, 'PELAYANAN KESEHATAN DASAR (REGULER)'),
(2019, 2, 2, 'PELAYANAN KESEHATAN RUJUKAN'),
(2019, 2, 3, 'PELAYANAN KEFARMASIAN DAN PERBEKALAN KESEHATAN (REGULER) '),
(2019, 2, 4, 'KELUARGA BERENCANA (REGULER) '),
(2019, 2, 5, 'PENURUNAN STUNTING (PENUGASAN)'),
(2019, 2, 6, 'PENGENDALIAN PENYAKIT (PENUGASAN)'),
(2019, 3, 1, 'JALAN'),
(2019, 4, 1, 'AIR MINUM PERKOTAAN'),
(2019, 4, 2, 'AIR MINUM PERDESAAN'),
(2019, 5, 1, 'AIR LIMBAH'),
(2019, 7, 1, 'IRIGASI'),
(2019, 10, 1, 'Perikanan Kabupaten/Kota'),
(2019, 11, 1, 'PERTANIAN KABUTAPATEN / KOTA'),
(2019, 13, 1, 'PASAR'),
(2019, 15, 1, 'LINGKUNGAN HIDUP');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id_users` int(11) NOT NULL,
  `nama` varchar(45) DEFAULT NULL,
  `username` varchar(45) DEFAULT NULL,
  `password` text,
  `level` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id_users`, `nama`, `username`, `password`, `level`) VALUES
(1, 'Administrator', 'admin', '$2y$13$ZtzUVhoI/bLqKmpetdHWW.ozUXArLlGrHbX7uCa68du.WSGZX8SQS', 1),
(2, 'Dinas pendidikan', 'dinaspendidikan', '$2y$10$weLzmzWcsDfQg5wOGz.kLupINspbw6jWzrB1M9f7WekRVGKcRNj6K', 3),
(3, 'Bidang Pemberdayaan Manusia BAPPEDA', 'sosbud', '$2y$10$ZTJn5JnIJSETD2dlkdF9k.x/zzTH7jtRiXkWCwttPWjW2sUitEHCe', 2),
(4, 'Bidang Infrastruktur Dan Pengembangan Wilayah', 'infrastruktur', '$2y$10$1E3BXZSOD6bqChocB9uCoeRpj1S3icGjkM.4LaOEc2ZSZtiVG9fIG', 2),
(6, 'Bidang Ekonomi dan Sumber Daya Alam BAPPEDA', 'ekonomi', '$2y$10$R/pKh520I1I4ezQ.85C4R.fL/LM18KYIaowZ3AJ90mpEpuwr6lxoO', 2),
(7, 'Dinas Kesehatan', 'kesehatan', '$2y$10$mGioW8IM/5mPdtjV6Ei29OFPimrtdzELoElJdldsveZJXm.gkoAOG', 3),
(8, 'Dinas PU dan Penataan Ruang', 'pu', '$2y$10$RYj5l4C0zi4wGI6d4aUeyuOGPjnvA3T6CYJy4ex5Mu909D5l22oTW', 3),
(9, 'Dinas Lingkungan Hidup', 'lingkunganhidup', '$2y$10$7B/cHKvGkIfHE6LajkoG6uMUj5kExHckneA.LcGNPWtGz.mer7RyG', 3),
(10, 'RSUD', 'rsud', '$2y$10$fUCVoG.x9V12krXH7SBr8eaKIunSFCM5YOq3w6p.U0nry9Fwr5IBW', 3),
(11, 'Dinas Perikanan', 'perikanan', '$2y$10$3PEVmBvqDHLsluuMoq20MOuA5WC3ePEQTwr2txYrzY/XDw7eBuorO', 3),
(12, 'Dinas Perdagangan', 'perdagangan', '$2y$10$h1wj3R03nAFj6/vjl8oDH.Yu331lp28Tp.d/BQW/Zs/yDGZcB8lii', 3),
(13, 'Dinas Tanaman Pangan Dan Holtikoltura', 'tanamanpangan', '$2y$10$WPcsxNKGdZC42zLUkYvPlu8UKEzZNgYraa9KO63MmLJmQXEkXCnjq', 3),
(14, 'Dinas Perkebunan dan Peternakan', 'perkebunan', '$2y$10$y8MYqJglGEm82vj/cj/mV.7JMUqX7UPPsFGy5aljwMJdomxoiTPN6', 3),
(15, 'Dinas Pengendalian Penduduk dan KB', 'kb', '$2y$10$HUtCYkQ7HZb5tJw.rGOTx.JDoZvQO1PIH885NvM4jliOyYltf2ykS', 3),
(16, 'Dinas Perpustakaan', 'perpustakaan', '$2y$10$CcEZDRdi5FV5PqylHvfxH.5CnCkQA53qtwhzXJl8K6544/OiWsfeG', 3),
(17, 'sekda', 'sekda', '$2y$10$3WtsSFcGWhCfpdbUemyk/.AH0TsQMxrv/pHPyLE/g.W9/.k00O0QO', 1);

-- --------------------------------------------------------

--
-- Table structure for table `users_admin`
--

CREATE TABLE `users_admin` (
  `id_users_admin` int(11) NOT NULL,
  `id_users` int(11) NOT NULL,
  `id_indikator` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users_admin`
--

INSERT INTO `users_admin` (`id_users_admin`, `id_users`, `id_indikator`) VALUES
(6, 6, 2),
(8, 4, 3),
(9, 3, 1);

-- --------------------------------------------------------

--
-- Table structure for table `users_opd`
--

CREATE TABLE `users_opd` (
  `id_users_opd` int(11) NOT NULL,
  `id_users` int(11) NOT NULL,
  `id_opd` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users_opd`
--

INSERT INTO `users_opd` (`id_users_opd`, `id_users`, `id_opd`) VALUES
(5, 7, 3),
(6, 8, 6),
(7, 9, 11),
(8, 10, 4),
(9, 11, 9),
(10, 12, 10),
(11, 13, 7),
(12, 14, 8),
(13, 15, 5),
(14, 16, 2),
(15, 2, 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `bidang`
--
ALTER TABLE `bidang`
  ADD PRIMARY KEY (`bidang_kode`,`tahun`),
  ADD KEY `fk_bidang_indikator1_idx` (`id_indikator`);

--
-- Indexes for table `detail_rincian`
--
ALTER TABLE `detail_rincian`
  ADD PRIMARY KEY (`tahun`,`bidang_kode`,`sub_bidang_kode`,`kegiatan_kode`,`rincian_kode`,`detail_rincian_kode`),
  ADD KEY `fk_detail_rincian_rincian1_idx` (`tahun`,`bidang_kode`,`sub_bidang_kode`,`kegiatan_kode`,`rincian_kode`),
  ADD KEY `fk_detail_rincian_satuan1_idx` (`id_satuan`),
  ADD KEY `fk_detail_rincian_masalah1_idx` (`id_masalah`);

--
-- Indexes for table `file`
--
ALTER TABLE `file`
  ADD PRIMARY KEY (`id_file`,`tahun`,`bidang_kode`,`sub_bidang_kode`,`kegiatan_kode`,`rincian_kode`,`detail_rincian_kode`),
  ADD KEY `fk_file_detail_rincian1_idx` (`tahun`,`bidang_kode`,`sub_bidang_kode`,`kegiatan_kode`,`rincian_kode`,`detail_rincian_kode`);

--
-- Indexes for table `indikator`
--
ALTER TABLE `indikator`
  ADD PRIMARY KEY (`id_indikator`);

--
-- Indexes for table `jenis`
--
ALTER TABLE `jenis`
  ADD PRIMARY KEY (`id_jenis`);

--
-- Indexes for table `kegiatan`
--
ALTER TABLE `kegiatan`
  ADD PRIMARY KEY (`tahun`,`bidang_kode`,`sub_bidang_kode`,`kegiatan_kode`),
  ADD KEY `fk_kegiatan_sub_bidang1_idx` (`tahun`,`bidang_kode`,`sub_bidang_kode`),
  ADD KEY `fk_kegiatan_jenis1_idx` (`id_jenis`),
  ADD KEY `fk_kegiatan_opd1_idx` (`id_opd`);

--
-- Indexes for table `kegiatan_penunjang`
--
ALTER TABLE `kegiatan_penunjang`
  ADD PRIMARY KEY (`tahun`,`bidang_kode`,`sub_bidang_kode`,`kegiatan_penunjang_kode`),
  ADD KEY `fk_kegiatan_penunjang_sub_bidang1_idx` (`tahun`,`bidang_kode`,`sub_bidang_kode`),
  ADD KEY `fk_kegiatan_penunjang_satuan1_idx` (`id_satuan`),
  ADD KEY `fk_kegiatan_penunjang_masalah1_idx` (`id_masalah`),
  ADD KEY `fk_kegiatan_penunjang_jenis1_idx` (`id_jenis`);

--
-- Indexes for table `masalah`
--
ALTER TABLE `masalah`
  ADD PRIMARY KEY (`id_masalah`);

--
-- Indexes for table `opd`
--
ALTER TABLE `opd`
  ADD PRIMARY KEY (`id_opd`);

--
-- Indexes for table `pegawai`
--
ALTER TABLE `pegawai`
  ADD PRIMARY KEY (`id_pegawai`);

--
-- Indexes for table `pegawai_penunjang`
--
ALTER TABLE `pegawai_penunjang`
  ADD PRIMARY KEY (`id_pegawai_penunjang`,`tahun`,`bidang_kode`,`sub_bidang_kode`,`kegiatan_penunjang_kode`),
  ADD KEY `fk_pegawai_penunjang_pegawai1_idx` (`id_pegawai`),
  ADD KEY `fk_pegawai_penunjang_kegiatan_penunjang1_idx` (`tahun`,`bidang_kode`,`sub_bidang_kode`,`kegiatan_penunjang_kode`);

--
-- Indexes for table `pegawai_ppk`
--
ALTER TABLE `pegawai_ppk`
  ADD PRIMARY KEY (`id_pegawai_ppk`),
  ADD KEY `fk_pegawai_ppk_pegawai1_idx` (`id_pegawai`),
  ADD KEY `tahun` (`tahun`),
  ADD KEY `bidang_kode` (`bidang_kode`),
  ADD KEY `sub_bidang_kode` (`sub_bidang_kode`),
  ADD KEY `id_jenis` (`id_jenis`);

--
-- Indexes for table `rincian`
--
ALTER TABLE `rincian`
  ADD PRIMARY KEY (`tahun`,`bidang_kode`,`sub_bidang_kode`,`kegiatan_kode`,`rincian_kode`),
  ADD KEY `fk_rincian_kegiatan1_idx` (`tahun`,`bidang_kode`,`sub_bidang_kode`,`kegiatan_kode`);

--
-- Indexes for table `satuan`
--
ALTER TABLE `satuan`
  ADD PRIMARY KEY (`id_satuan`);

--
-- Indexes for table `sub_bidang`
--
ALTER TABLE `sub_bidang`
  ADD PRIMARY KEY (`tahun`,`bidang_kode`,`sub_bidang_kode`),
  ADD KEY `fk_sub_bidang_bidang1_idx` (`bidang_kode`,`tahun`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id_users`);

--
-- Indexes for table `users_admin`
--
ALTER TABLE `users_admin`
  ADD PRIMARY KEY (`id_users_admin`),
  ADD KEY `fk_users_admin_users1_idx` (`id_users`),
  ADD KEY `fk_users_admin_indikator1_idx` (`id_indikator`);

--
-- Indexes for table `users_opd`
--
ALTER TABLE `users_opd`
  ADD PRIMARY KEY (`id_users_opd`),
  ADD KEY `fk_users_opd_users1_idx` (`id_users`),
  ADD KEY `fk_users_opd_opd1_idx` (`id_opd`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `file`
--
ALTER TABLE `file`
  MODIFY `id_file` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `indikator`
--
ALTER TABLE `indikator`
  MODIFY `id_indikator` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `jenis`
--
ALTER TABLE `jenis`
  MODIFY `id_jenis` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `masalah`
--
ALTER TABLE `masalah`
  MODIFY `id_masalah` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
--
-- AUTO_INCREMENT for table `opd`
--
ALTER TABLE `opd`
  MODIFY `id_opd` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
--
-- AUTO_INCREMENT for table `pegawai`
--
ALTER TABLE `pegawai`
  MODIFY `id_pegawai` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;
--
-- AUTO_INCREMENT for table `pegawai_penunjang`
--
ALTER TABLE `pegawai_penunjang`
  MODIFY `id_pegawai_penunjang` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `pegawai_ppk`
--
ALTER TABLE `pegawai_ppk`
  MODIFY `id_pegawai_ppk` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;
--
-- AUTO_INCREMENT for table `satuan`
--
ALTER TABLE `satuan`
  MODIFY `id_satuan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id_users` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;
--
-- AUTO_INCREMENT for table `users_admin`
--
ALTER TABLE `users_admin`
  MODIFY `id_users_admin` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
--
-- AUTO_INCREMENT for table `users_opd`
--
ALTER TABLE `users_opd`
  MODIFY `id_users_opd` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `bidang`
--
ALTER TABLE `bidang`
  ADD CONSTRAINT `fk_bidang_indikator1` FOREIGN KEY (`id_indikator`) REFERENCES `indikator` (`id_indikator`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `detail_rincian`
--
ALTER TABLE `detail_rincian`
  ADD CONSTRAINT `fk_detail_rincian_masalah1` FOREIGN KEY (`id_masalah`) REFERENCES `masalah` (`id_masalah`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_detail_rincian_rincian1` FOREIGN KEY (`tahun`,`bidang_kode`,`sub_bidang_kode`,`kegiatan_kode`,`rincian_kode`) REFERENCES `rincian` (`tahun`, `bidang_kode`, `sub_bidang_kode`, `kegiatan_kode`, `rincian_kode`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_detail_rincian_satuan1` FOREIGN KEY (`id_satuan`) REFERENCES `satuan` (`id_satuan`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `file`
--
ALTER TABLE `file`
  ADD CONSTRAINT `fk_file_detail_rincian1` FOREIGN KEY (`tahun`,`bidang_kode`,`sub_bidang_kode`,`kegiatan_kode`,`rincian_kode`,`detail_rincian_kode`) REFERENCES `detail_rincian` (`tahun`, `bidang_kode`, `sub_bidang_kode`, `kegiatan_kode`, `rincian_kode`, `detail_rincian_kode`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `kegiatan`
--
ALTER TABLE `kegiatan`
  ADD CONSTRAINT `fk_kegiatan_jenis1` FOREIGN KEY (`id_jenis`) REFERENCES `jenis` (`id_jenis`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_kegiatan_opd1` FOREIGN KEY (`id_opd`) REFERENCES `opd` (`id_opd`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_kegiatan_sub_bidang1` FOREIGN KEY (`tahun`,`bidang_kode`,`sub_bidang_kode`) REFERENCES `sub_bidang` (`tahun`, `bidang_kode`, `sub_bidang_kode`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `kegiatan_penunjang`
--
ALTER TABLE `kegiatan_penunjang`
  ADD CONSTRAINT `fk_kegiatan_penunjang_jenis1` FOREIGN KEY (`id_jenis`) REFERENCES `jenis` (`id_jenis`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_kegiatan_penunjang_masalah1` FOREIGN KEY (`id_masalah`) REFERENCES `masalah` (`id_masalah`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_kegiatan_penunjang_satuan1` FOREIGN KEY (`id_satuan`) REFERENCES `satuan` (`id_satuan`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_kegiatan_penunjang_sub_bidang1` FOREIGN KEY (`tahun`,`bidang_kode`,`sub_bidang_kode`) REFERENCES `sub_bidang` (`tahun`, `bidang_kode`, `sub_bidang_kode`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `pegawai_penunjang`
--
ALTER TABLE `pegawai_penunjang`
  ADD CONSTRAINT `fk_pegawai_penunjang_kegiatan_penunjang1` FOREIGN KEY (`tahun`,`bidang_kode`,`sub_bidang_kode`,`kegiatan_penunjang_kode`) REFERENCES `kegiatan_penunjang` (`tahun`, `bidang_kode`, `sub_bidang_kode`, `kegiatan_penunjang_kode`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_pegawai_penunjang_pegawai1` FOREIGN KEY (`id_pegawai`) REFERENCES `pegawai` (`id_pegawai`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `pegawai_ppk`
--
ALTER TABLE `pegawai_ppk`
  ADD CONSTRAINT `fk_pegawai_ppk_pegawai1` FOREIGN KEY (`id_pegawai`) REFERENCES `pegawai` (`id_pegawai`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `rincian`
--
ALTER TABLE `rincian`
  ADD CONSTRAINT `fk_rincian_kegiatan1` FOREIGN KEY (`tahun`,`bidang_kode`,`sub_bidang_kode`,`kegiatan_kode`) REFERENCES `kegiatan` (`tahun`, `bidang_kode`, `sub_bidang_kode`, `kegiatan_kode`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `sub_bidang`
--
ALTER TABLE `sub_bidang`
  ADD CONSTRAINT `fk_sub_bidang_bidang1` FOREIGN KEY (`bidang_kode`,`tahun`) REFERENCES `bidang` (`bidang_kode`, `tahun`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `users_admin`
--
ALTER TABLE `users_admin`
  ADD CONSTRAINT `fk_users_admin_indikator1` FOREIGN KEY (`id_indikator`) REFERENCES `indikator` (`id_indikator`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_users_admin_users1` FOREIGN KEY (`id_users`) REFERENCES `users` (`id_users`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `users_opd`
--
ALTER TABLE `users_opd`
  ADD CONSTRAINT `fk_users_opd_opd1` FOREIGN KEY (`id_opd`) REFERENCES `opd` (`id_opd`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_users_opd_users1` FOREIGN KEY (`id_users`) REFERENCES `users` (`id_users`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
