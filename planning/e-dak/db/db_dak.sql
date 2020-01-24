-- phpMyAdmin SQL Dump
-- version 4.7.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 13, 2020 at 03:17 AM
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
-- Database: `db_dak`
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
  `bidang_verifikasi` int(11) DEFAULT NULL,
  `bidang_verifikasi_bappeda` int(11) DEFAULT NULL,
  `ttd1` int(11) DEFAULT NULL,
  `ttd2` int(11) DEFAULT NULL,
  `ttd3` int(11) DEFAULT NULL,
  `ttd4` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `bidang`
--

INSERT INTO `bidang` (`tahun`, `bidang_kode`, `bidang_nama`, `id_indikator`, `bidang_verifikasi`, `bidang_verifikasi_bappeda`, `ttd1`, `ttd2`, `ttd3`, `ttd4`) VALUES
(2019, 1, 'Pendidikan', 1, NULL, NULL, NULL, NULL, NULL, NULL),
(2020, 1, 'Jalan2', 1, NULL, NULL, NULL, NULL, NULL, NULL),
(2019, 2, 'Kesehatan dan KB', 1, NULL, NULL, NULL, NULL, NULL, NULL),
(2019, 3, 'Jalan', 1, NULL, NULL, NULL, NULL, NULL, NULL),
(2019, 4, 'Air Minum', 1, NULL, NULL, NULL, NULL, NULL, NULL),
(2019, 5, 'Sanitasi', 1, NULL, NULL, NULL, NULL, NULL, NULL),
(2019, 6, 'Perumahan dan Permukiman', 1, NULL, NULL, NULL, NULL, NULL, NULL),
(2019, 7, 'Irigasi', 1, NULL, NULL, NULL, NULL, NULL, NULL),
(2019, 8, 'Industri Kecil Menengah', 1, NULL, NULL, NULL, NULL, NULL, NULL),
(2019, 9, 'Pariwisata', 1, NULL, NULL, NULL, NULL, NULL, NULL),
(2019, 10, 'Kelautan dan Perikanan', 1, NULL, NULL, NULL, NULL, NULL, NULL),
(2019, 11, 'Pertanian', 1, NULL, NULL, NULL, NULL, NULL, NULL),
(2019, 12, 'Energi Skala Kecil', 1, NULL, NULL, NULL, NULL, NULL, NULL),
(2019, 13, 'Pasar', 1, NULL, NULL, NULL, NULL, NULL, NULL),
(2019, 14, 'Transportasi', 1, NULL, NULL, NULL, NULL, NULL, NULL),
(2019, 15, 'Lingkungan Hidup dan Kehutanan', 1, NULL, NULL, NULL, NULL, NULL, NULL);

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
  `detail_rincian_tw1_fisik_volume` double DEFAULT NULL,
  `detail_rincian_tw1_fisik_persen` double DEFAULT NULL,
  `detail_rincian_tw2_keuangan_rp` double DEFAULT NULL,
  `detail_rincian_tw2_fisik_volume` double DEFAULT NULL,
  `detail_rincian_tw2_fisik_persen` double DEFAULT NULL,
  `detail_rincian_tw3_keuangan_rp` double DEFAULT NULL,
  `detail_rincian_tw3_fisik_volume` double DEFAULT NULL,
  `detail_rincian_tw3_fisik_persen` double DEFAULT NULL,
  `detail_rincian_tw4_keuangan_rp` double DEFAULT NULL,
  `detail_rincian_tw4_fisik_volume` double DEFAULT NULL,
  `detail_rincian_tw4_fisik_persen` double DEFAULT NULL,
  `id_masalah` int(11) NOT NULL,
  `detail_rincian_file` text,
  `detail_rincian_pelaksanaan_jenis` tinyint(4) DEFAULT NULL COMMENT '1. Swakelola\n2. Konstraktual'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `detail_rincian`
--

INSERT INTO `detail_rincian` (`tahun`, `bidang_kode`, `sub_bidang_kode`, `kegiatan_kode`, `rincian_kode`, `detail_rincian_kode`, `detail_rincian_nama`, `detail_rincian_volume`, `id_satuan`, `detail_rincian_penerima_manfaat`, `detail_rincian_pagu`, `detail_rincian_swakelola_volume`, `detail_rincian_swakelola_rp`, `detail_rincian_konstraktual_volume`, `detail_rincian_konstraktual_rp`, `detail_rincian_pembayaran`, `detail_rincian_tw1_keuangan_rp`, `detail_rincian_tw1_fisik_volume`, `detail_rincian_tw1_fisik_persen`, `detail_rincian_tw2_keuangan_rp`, `detail_rincian_tw2_fisik_volume`, `detail_rincian_tw2_fisik_persen`, `detail_rincian_tw3_keuangan_rp`, `detail_rincian_tw3_fisik_volume`, `detail_rincian_tw3_fisik_persen`, `detail_rincian_tw4_keuangan_rp`, `detail_rincian_tw4_fisik_volume`, `detail_rincian_tw4_fisik_persen`, `id_masalah`, `detail_rincian_file`, `detail_rincian_pelaksanaan_jenis`) VALUES
(2019, 3, 1, 1, 1, 2001384, 'Peningkatan Jalan Totallang - Latawaro Kec. Lasusua', 3.4, 1, '15 Kecamatan', 6864000000, NULL, NULL, NULL, 6800702100, 'Termin', 1360140420, 0, 30, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, NULL, NULL),
(2019, 3, 1, 1, 1, 4100345, 'Peningkatan Jalan Toaha - Kosali Kec. Pakue', 3.67, 1, '15 Kecamatan', 9234085000, NULL, NULL, NULL, 9179775000, 'Termin', 0, 0, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, NULL, NULL),
(2019, 3, 1, 1, 1, 5001340, 'Peningkatan Jalan Lahabaru - Toaha Kec. Watunohu', 2, 1, '15 Kecamatan', 4853048750, NULL, NULL, NULL, 4800765000, 'Termin', 960153000, 0, 30, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, NULL, NULL),
(2020, 1, 221, 1, 1, 4100345, 'Peningkatan Jalan Toaha - Kosali Kec. Pakue', 0.0004, 1, '15 Kecamatan', 0.0003, 0.0004, 122, 0, 0, 'rekening', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 1, NULL, 1);

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
(2019, 1, 4, 1, 'REHABILITASI GEDUNG LAYANAN PERPUSTAKAAN ', NULL, 1, 1),
(2019, 1, 4, 2, 'PENGEMBANGAN KOLEKSI PERPUSTAKAAN ', NULL, 1, 1),
(2019, 2, 1, 1, 'PENYEDIAAN ALAT KESEHATAN PUSKESMAS NON AFIRMASI ', NULL, 1, 1),
(2019, 2, 2, 1, 'PEMBANGUNAN DAN REHABILITASI RS KAB/KOTA DAN PROVINSI ', NULL, 1, 1),
(2019, 2, 2, 2, 'PENYEDIAAN ALAT KESEHATAN DI RS KAB/KOTA DAN PROVINSI', NULL, 1, 1),
(2019, 2, 3, 1, 'PENYEDIAAN OBAT DAN BMHP (BAHAN MEDIS HABIS PAKAI) DI KAB/KOTA ', NULL, 1, 1),
(2019, 2, 4, 1, 'PENYEDIAAN SARANA PRASARANA KLINIK PELAYANAN KB ', NULL, 1, 1),
(2019, 2, 4, 2, 'PENGADAAN MOBIL UNIT PENERANGAN KB ', NULL, 1, 1),
(2019, 2, 4, 3, 'PENGADAAN SARANA KIE KIT DAN MEDIA LINI LAPANGAN ', NULL, 1, 1),
(2019, 2, 5, 1, 'PENYEDIAAN OBAT GIZI ', NULL, 2, 1),
(2019, 2, 6, 1, 'PENYEDIAAN CRYOTERAPI  ', NULL, 2, 1),
(2019, 2, 6, 2, 'PENYEDIAAN VACCINE CARRIER ', NULL, 2, 1),
(2019, 2, 6, 3, 'PENGADAAN BAHAN HABIS PAKAI PEMERIKSAAN HIV, CD4 DAN VIRALOAD', NULL, 2, 1),
(2019, 3, 1, 1, 'PENINGKATAN (STRUKTUR DAN KAPASITAS) JALAN/JEMBATAN (REGULER) ', NULL, 1, 1),
(2019, 4, 1, 1, 'PERLUASAN SPAM PERPIPAAN MELALUI PEMANFAATAN IDLE CAPACITY SISTEM PENYEDIAAN AIR MINUM (SPAM) TERBANGUN (REGULER) ', NULL, 1, 1),
(2019, 4, 2, 1, 'PERLUASAN SPAM PERPIPAAN MELALUI PEMANFAATAN IDLE CAPACITY SISTEM PENYEDIAAN AIR MINUM (SPAM) TERBANGUN KHUSUS UNTUK DESA YANG SUDAH MELAKSANAKAN PAMSIMAS (PENUGASAN) ', NULL, 2, 1),
(2019, 5, 1, 1, 'PENGEMBANGAN SISTEM PENGELOLAAN AIR LIMBAH DOMESTIK TERPUSAT (SPALD-T) SKALA PERMUKIMAN DAN/ATAU PERKOTAAN (REGULER) ', NULL, 1, 1),
(2019, 5, 1, 2, 'PEMBANGUNAN SISTEM PENGELOLAAN AIR LIMBAH DOMESTIK SETEMPAT (SPALD-S) DI DAERAH PERKOTAAN DAN/ATAU PERDESAAN (REGULER) ', NULL, 1, 1),
(2019, 5, 1, 3, 'PEMBANGUNAN SISTEM PENGELOLAAN AIR LIMBAH DOMESTIK SETEMPAT (SPALD-S) DI DAERAH PERKOTAAN DAN/ATAU PERDESAAN (PENUGASAN) ', NULL, 2, 1),
(2019, 7, 1, 1, 'REHABILITASI JARINGAN IRIGASI', NULL, 2, 1),
(2019, 10, 1, 1, 'Pengadaan Sarana dan Prasarana Pemberdayaan Usaha Kecil Masyarakat Kelautan dan Perikanan (Nelayan dan Pembudidaya Ikan)', NULL, 1, 1),
(2019, 11, 1, 1, 'PEMBANGUNAN/PERBAIKAN SUMBER-SUMBER AIR ', NULL, 1, 1),
(2019, 11, 1, 2, 'PEMBANGUNAN/PERBAIKAN JALAN PERTANIAN ', NULL, 1, 1),
(2019, 13, 1, 1, 'PEMBANGUNAN/REVITALISASI PASAR RAKYAT, KHUSUSNYA TIPE D ', NULL, 2, 1),
(2019, 13, 1, 2, 'PENYEDIAAN SARANA DALAM MENDUKUNG PEMBENTUKAN UNIT METROLOGI LEGAL ', NULL, 2, 1),
(2019, 15, 1, 1, 'PENGELOLAAN SAMPAH SERTA SARANA PRASARANA PENDUKUNG ', NULL, 2, 1),
(2019, 15, 1, 2, 'PENGADAAN ALAT ANGKUT SAMPAH DUMP TRUCK ', NULL, 2, 1),
(2020, 1, 221, 1, 'jalanan', NULL, 1, 44);

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
  `kode_urusan` int(11) DEFAULT NULL,
  `kode_bidang` int(11) DEFAULT NULL,
  `kode_unit` int(11) DEFAULT NULL,
  `kode_sub_unit` int(11) DEFAULT NULL,
  `opd_nama` text
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `opd`
--

INSERT INTO `opd` (`id_opd`, `kode_urusan`, `kode_bidang`, `kode_unit`, `kode_sub_unit`, `opd_nama`) VALUES
(1, 1, 1, 1, 1, 'Dinas Pendidikan dan Kebudayaan'),
(2, 1, 1, 1, 1, 'Dinas Pendidikan Dan Kebudayaan'),
(3, 1, 2, 1, 1, 'Dinas Kesehatan, Pengendalian Penduduk dan Keluarga Berencana'),
(4, 1, 2, 1, 2, 'Rumah Sakit Umum Daerah Morowali'),
(5, 1, 3, 1, 1, 'Dinas Pekerjaan Umum dan Penataan Ruang '),
(6, 1, 4, 1, 1, 'Dinas Perumahan, Kawasan Pemukiman dan Pertanahan'),
(7, 1, 5, 1, 1, 'Badan Kesatuan Bangsa dan Politik Daerah'),
(8, 1, 5, 2, 1, 'Satuan Polisi Pamong Praja'),
(9, 1, 6, 1, 1, 'Dinas Sosial'),
(10, 1, 6, 2, 1, 'Badan Koordinasi Penanggulangan Bencana Daerah'),
(11, 2, 1, 1, 1, 'Dinas Tenaga Kerja Dan Transmigrasi Daerah'),
(12, 2, 5, 1, 1, 'Dinas Lingkungan Hidup Daerah'),
(13, 2, 6, 1, 1, 'Dinas Kependudukan dan Pencatatan Sipil Daerah'),
(14, 2, 7, 1, 1, 'Dinas Pemberdayaan Masyarakat, Desa,Pemberdayaan Perempuan dan Perlindungan Anak'),
(15, 2, 9, 1, 1, 'Dinas Perhubungan Daerah'),
(16, 2, 10, 1, 1, 'Dinas Komunikasi dan Informatika'),
(17, 2, 11, 1, 1, 'Dinas Koperasi, Usaha Kecil, dan Menengah'),
(18, 2, 12, 1, 1, 'Dinas Penanaman Modal dan Pelayanan Terpadu Satu Pintu'),
(19, 2, 13, 1, 1, 'Dinas Pemuda, Olahraga dan Pariwisata Daerah'),
(20, 2, 17, 1, 1, 'Dinas Perpustakaan Daerah'),
(21, 3, 1, 1, 1, 'Dinas Perikanan Daerah'),
(22, 3, 3, 1, 1, 'Dinas Pertanian Dan Ketahanan Pangan'),
(23, 3, 6, 1, 1, 'Dinas Perdagangan Dan Perindustrian'),
(24, 4, 1, 1, 1, 'Dewan Perwakilan Rakyat Daerah'),
(25, 4, 1, 2, 1, 'Kepala Daerah Dan Wakil Kepala Daerah'),
(26, 4, 1, 3, 1, 'Bagian Umum Dan Protokoler'),
(27, 4, 1, 3, 2, 'Bagian Hukum Dan Perundang-Undangan'),
(28, 4, 1, 3, 3, 'Bagian Kesejahteraan Rakyat Dan Kemasyarakatan'),
(29, 4, 1, 3, 4, 'Bagian Perekonomian'),
(30, 4, 1, 3, 5, 'Bagian Organisasi dan Tata Laksana'),
(31, 4, 1, 3, 6, 'Bagian Pembangunan Dan LPSE'),
(32, 4, 1, 3, 7, 'Bagian Unit Layanan Pengadaan'),
(33, 4, 1, 3, 8, 'Bagian Administrasi Sumber Daya Alam'),
(34, 4, 1, 3, 9, 'Bagian Administrasi Pemerintahan Umum'),
(35, 4, 1, 4, 1, 'Sekretariat DPRD'),
(36, 4, 1, 9, 1, 'Kecamatan Menui Kepulauan'),
(37, 4, 1, 10, 1, 'Kecamatan Bungku Selatan'),
(38, 4, 1, 11, 1, 'Kecamatan Bungku Tengah'),
(39, 4, 1, 12, 1, 'Kecamatan Bungku Barat'),
(40, 4, 1, 13, 1, 'Kecamatan Bahodopi'),
(41, 4, 1, 14, 1, 'Kecamatan Bumi Raya'),
(42, 4, 1, 15, 1, 'Kecamatan Wita Ponda'),
(43, 4, 1, 16, 1, 'Kecamatan Bungku Timur'),
(44, 4, 1, 17, 1, 'Kecamatan Bungku Pesisir'),
(45, 4, 2, 1, 1, 'Inspektorat Daerah'),
(46, 4, 3, 1, 1, 'Badan Perencanaan, Penelitian, dan Pengembangan Daerah'),
(47, 4, 4, 5, 1, 'Badan Pengelola Keuangan dan Aset Daerah'),
(48, 4, 4, 6, 1, 'Badan Pengelola Pendapatan Daerah'),
(49, 4, 5, 6, 1, 'Badan Kepegawaian Daerah dan Pengembangan Sumber Daya Manusia');

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
(1, '11', 'aka', '11', '$2y$13$ZtzUVhoI/bLqKmpetdHWW.ozUXArLlGrHbX7uCa68du.WSGZX8SQS', '085756733113', NULL, NULL, NULL);

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
(2019, 15, 1, 2, 1, 'PENGADAAN ALAT ANGKUT SAMPAH DUMP TRUCK '),
(2020, 1, 221, 1, 1, 'peningkatan jalan');

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
(2019, 15, 1, 'LINGKUNGAN HIDUR'),
(2020, 1, 221, 'jalan 2');

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
  MODIFY `id_opd` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=50;
--
-- AUTO_INCREMENT for table `pegawai`
--
ALTER TABLE `pegawai`
  MODIFY `id_pegawai` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `pegawai_penunjang`
--
ALTER TABLE `pegawai_penunjang`
  MODIFY `id_pegawai_penunjang` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `pegawai_ppk`
--
ALTER TABLE `pegawai_ppk`
  MODIFY `id_pegawai_ppk` int(11) NOT NULL AUTO_INCREMENT;
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
