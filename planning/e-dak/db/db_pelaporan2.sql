-- phpMyAdmin SQL Dump
-- version 4.7.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 14, 2019 at 01:40 AM
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
  `id_indikator` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `bidang`
--

INSERT INTO `bidang` (`tahun`, `bidang_kode`, `bidang_nama`, `id_indikator`) VALUES
(2019, 1, 'Pendidikan', 1),
(2019, 2, 'Kesehatan dan KB', 1),
(2019, 3, 'Jalan', 1),
(2019, 4, 'Air Minum', 1),
(2019, 5, 'Sanitasi', 1),
(2019, 6, 'Perumahan dan Permukiman', 1),
(2019, 7, 'Irigasi', 1),
(2019, 8, 'Industri Kecil Menengah', 1),
(2019, 9, 'Pariwisata', 1),
(2019, 10, 'Kelautan dan Perikanan', 1),
(2019, 11, 'Pertanian', 1),
(2019, 12, 'Energi Skala Kecil', 1),
(2019, 13, 'Pasar', 1),
(2019, 14, 'Transportasi', 1),
(2019, 15, 'Lingkungan Hidup dan Kehutanan', 1);

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
(2019, 3, 1, 1, 1, 2001384, 'Peningkatan Jalan Totallang - Latawaro Kec. Lasusua', 3.4, 1, '15 Kecamatan', 6864000000, NULL, NULL, NULL, 6800702100, 'Termin', 1360140420, '0', '30', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, NULL, NULL),
(2019, 3, 1, 1, 1, 4100345, 'Peningkatan Jalan Toaha - Kosali Kec. Pakue', 3.67, 1, '15 Kecamatan', 9234085000, NULL, NULL, NULL, 9179775000, 'Termin', 0, '0', '0', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, NULL, NULL),
(2019, 3, 1, 1, 1, 5001340, 'Peningkatan Jalan Lahabaru - Toaha Kec. Watunohu', 2, 1, '15 Kecamatan', 4853048750, NULL, NULL, NULL, 4800765000, 'Termin', 960153000, '0', '30', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, NULL, NULL);

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
(2019, 3, 1, 1, 'Desain perencanaan untuk kegiatan kontraktual (Reguler)', 1, 1, NULL, 300000000, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, 1, 1, NULL),
(2019, 3, 1, 2, 'Honorarium fasilitator kegiatan DAK Fisik yang dilakukan secara swakelola', 2, 1, NULL, 28757000, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, 1, 1, NULL),
(2019, 3, 1, 3, 'Penunjukan konsultan pengawas kegiatan kontraktual', 3, 1, NULL, 419022680, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, 1, 1, NULL),
(2019, 3, 1, 4, 'Penyelenggaraan rapat koordinasi', 2, 1, NULL, 125000000, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, 1, 1, NULL),
(2019, 3, 1, 5, '	Perjalanan dinas ke dan dari lokasi untuk perencanaan, pengendalian, dan pengawasan', 1, 1, NULL, 229911570, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, 1, 1, NULL);

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
(1, '-', 'Achmadi Ngalang, ST', 'achmadi', '$2y$10$XyT0gnmepaA8B26LBicylOrKPpW/s8EOf0t8uKPWzh.Gcakt8REpe', '-', NULL, NULL, '-'),
(2, '-', 'Drs. Syamsu Rijal, MM', 'syamsu', '$2y$10$fN5jUcFUvh.kYDYSkDk25u8ajSce0YsxQT6p.WHAZbxzPjNVToaiC', '-', NULL, NULL, 'dinasperpustakaankabkolut@gmail.com'),
(3, '-', 'Irham, SKM,M.Kes', 'irham', '$2y$10$hZdHYIt1ccKbdEsIB7S/Ruu0W0adsGH/dS8IPw1tYCPNLjEJB8hxe', '-', NULL, NULL, 'dinkes.kolakautara@gmail.com'),
(4, '-', 'Muhammad Jufri, S.KM', 'jufri', '$2y$10$b5BA4e./MfD5QxX4uox/Xex9o2FZyY7rMJyvayUV2PMsknJY383i.', '-', NULL, NULL, 'jupridalduk01@gmail.com'),
(5, '-', 'Mulyadi, SKM', 'mulyadi', '$2y$10$vf6hgHRSwORcoZAYr3OGceLMpdl1.PIwmJrqnGlTj.d/5X0yGddCC', '-', NULL, NULL, 'djafar.harun@gmail.com'),
(6, '-', 'Syahrullah, ST', 'syahrullah', '$2y$10$DojdTZBzcsq3BW9TyySid.FN/OiuKlWVC.fRp1gDAiozFRlHdk0ca', '-', NULL, NULL, 'stsyahrullah@gmail.com'),
(7, '-', 'Mahmuddin, ST', 'mahmuddin', '$2y$10$ZsxUlCsr6l5qf5oPbyOKreEqA6oHAF1pFBusTFvncOCKjWJetSb3u', '-', NULL, NULL, 'udhienk.st@gmail.com'),
(8, '-', 'Sahrul, ST', 'sahrul', '$2y$10$NIMDdW/X0PR4TrLSNgRY.OS/ewUEcPuHT9KjeZGeTLaz.02Lr9Hfa', '-', NULL, NULL, 'ciptakolut.2010@gmail.com'),
(9, '-', 'Agustan MA, S.Pi', 'agustan', '$2y$10$gpbUl1EgxZOQXXxDAPp5dOCvoeJp9x8idDMji7a0Zdg5mxcQsbKSe', '-', NULL, NULL, 'agustandkp@gmail.com'),
(10, '-', 'Ngatimo, SP', 'ngatimo', '$2y$10$gE93P2oBhTcc1dWL4FIhf.OGjM/yVsTjuNfLVPQ0lr5nQv0jDDbbm', '-', NULL, NULL, 'ngatimo-pertanian@yahoo.com'),
(11, '-', 'Nasrullah Ahmad, SP', 'nasrullah', '$2y$10$ceKcDy1QXwxsYIyTzx1iC.1uNXaq8JHLnWOqZvTcj5rO.k0ja2/ru', '-', NULL, NULL, 'arigmo@gmail.com'),
(12, '-', 'Risal Natsir, S.Ag, M.Si', 'risal', '$2y$10$s7uOFtKiN7VRXzg6DgA.L.0cViiQljRc3rp4nhcL8xVAGUfQq2uwi', '-', NULL, NULL, 'risalnatsir2@gmail.com'),
(13, '-', 'Annas, ST', 'annas', '$2y$10$OJvtdS6PMQTMHIJ6oBB6BusImVVFa0Ha4dJzgznEVatUW3NWiD0QW', '-', NULL, NULL, 'annasst7@gamil.com'),
(14, '-', 'Suardi, S.Hut', 'suardi', '$2y$10$Zc3YjP.nB6spBAwtiWaUE.rqiBPofii0MZguWHxhDioVfzU7IyttK', '-', NULL, NULL, 'suardi.sabir@yahoo.co.id');

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
(1, 'Km');

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
(2019, 15, 1, 'LINGKUNGAN HIDUR');

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
(1, 'Administrator', 'admin', '$2y$13$ZtzUVhoI/bLqKmpetdHWW.ozUXArLlGrHbX7uCa68du.WSGZX8SQS', 1);

-- --------------------------------------------------------

--
-- Table structure for table `users_admin`
--

CREATE TABLE `users_admin` (
  `id_users_admin` int(11) NOT NULL,
  `id_users` int(11) NOT NULL,
  `id_indikator` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

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
  ADD KEY `fk_pegawai_ppk_sub_bidang1_idx` (`tahun`,`bidang_kode`,`sub_bidang_kode`),
  ADD KEY `fk_pegawai_ppk_jenis1_idx` (`id_jenis`);

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
  MODIFY `id_pegawai` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;
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
  MODIFY `id_satuan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id_users` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `users_admin`
--
ALTER TABLE `users_admin`
  MODIFY `id_users_admin` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `users_opd`
--
ALTER TABLE `users_opd`
  MODIFY `id_users_opd` int(11) NOT NULL AUTO_INCREMENT;
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
  ADD CONSTRAINT `fk_pegawai_ppk_jenis1` FOREIGN KEY (`id_jenis`) REFERENCES `jenis` (`id_jenis`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_pegawai_ppk_pegawai1` FOREIGN KEY (`id_pegawai`) REFERENCES `pegawai` (`id_pegawai`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_pegawai_ppk_sub_bidang1` FOREIGN KEY (`tahun`,`bidang_kode`,`sub_bidang_kode`) REFERENCES `sub_bidang` (`tahun`, `bidang_kode`, `sub_bidang_kode`) ON DELETE CASCADE ON UPDATE CASCADE;

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
