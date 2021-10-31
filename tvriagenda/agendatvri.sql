-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 02, 2021 at 08:37 AM
-- Server version: 10.4.17-MariaDB
-- PHP Version: 7.3.25

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `agendatvri`
--

-- --------------------------------------------------------

--
-- Table structure for table `absen`
--

CREATE TABLE `absen` (
  `id_absen` int(11) NOT NULL,
  `id_pegawai` int(100) NOT NULL,
  `hadir` int(100) NOT NULL,
  `izin` int(100) NOT NULL,
  `tidak_hadir` int(100) NOT NULL,
  `bulan` int(100) NOT NULL,
  `tanggal` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `absen`
--

INSERT INTO `absen` (`id_absen`, `id_pegawai`, `hadir`, `izin`, `tidak_hadir`, `bulan`, `tanggal`) VALUES
(13, 10, 20, 0, 0, 1, '2020-05-17');

-- --------------------------------------------------------

--
-- Table structure for table `acara`
--

CREATE TABLE `acara` (
  `id_acara` int(11) NOT NULL,
  `nama_acara` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id_admin` int(11) NOT NULL,
  `username` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `level` varchar(100) NOT NULL,
  `log` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `id_pegawai` int(11) DEFAULT NULL,
  `nip` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id_admin`, `username`, `password`, `nama`, `level`, `log`, `id_pegawai`, `nip`) VALUES
(2, 'admin', '21232f297a57a5a743894a0e4a801fc3', 'admin2', 'admin', '2020-11-15 09:47:08', 1, NULL),
(3, 'user', 'ee11cbb19052e40b07aac0ca060c23ee', 'User', 'user', '2018-04-02 18:27:39', NULL, NULL),
(4, 'pejabat', 'e0c4bde30c959d22007497388ca42a4e', ' Test67', 'user', '2020-11-14 13:00:17', 2, NULL),
(5, 'pegawai', '047aeeb234644b9e2d4138ed3bc7976a', ' Test67', 'pegawai', '2020-11-14 13:01:52', 2, NULL),
(6, 'sespri', '09968bfea4fbc189d492ec2594d12dd6', ' Test kost2', 'sespri', '2020-11-22 18:24:46', 1, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `agenda`
--

CREATE TABLE `agenda` (
  `id_agenda` bigint(255) NOT NULL,
  `tanggal` date DEFAULT NULL,
  `jam_mulai` time DEFAULT NULL,
  `jam_selesai` time DEFAULT NULL,
  `nama_agenda` varchar(255) DEFAULT NULL,
  `lokasi_agenda` varchar(255) DEFAULT NULL,
  `status_agenda` varchar(255) DEFAULT NULL,
  `tipestatus_agenda` varchar(255) DEFAULT NULL,
  `contact_person` varchar(255) DEFAULT NULL,
  `informasi` text DEFAULT NULL,
  `id_pegawai` int(255) DEFAULT NULL,
  `nama_pejabat` varchar(255) DEFAULT NULL,
  `nama_pegawai` varchar(255) DEFAULT NULL,
  `id_pejabat` bigint(255) DEFAULT NULL,
  `id_pejabatdisposisi` bigint(255) DEFAULT NULL,
  `isi_disposisi` varchar(255) DEFAULT NULL,
  `status_disposisi` int(10) DEFAULT NULL,
  `alasan_penolakan` varchar(255) DEFAULT NULL,
  `sebagai` varchar(100) DEFAULT NULL,
  `id_acara` int(100) DEFAULT NULL,
  `status_hadir` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `agenda`
--

INSERT INTO `agenda` (`id_agenda`, `tanggal`, `jam_mulai`, `jam_selesai`, `nama_agenda`, `lokasi_agenda`, `status_agenda`, `tipestatus_agenda`, `contact_person`, `informasi`, `id_pegawai`, `nama_pejabat`, `nama_pegawai`, `id_pejabat`, `id_pejabatdisposisi`, `isi_disposisi`, `status_disposisi`, `alasan_penolakan`, `sebagai`, `id_acara`, `status_hadir`) VALUES
(1, '2021-08-02', '00:39:00', '12:39:00', 'test Agenda Penyiar', '<p>test Agenda Penyiar</p>', NULL, NULL, 'test Agenda Penyiar', '<p>test Agenda Penyiar</p>', 1, '0', NULL, 0, NULL, NULL, NULL, NULL, 'Nara Sumber', 0, 1);

-- --------------------------------------------------------

--
-- Table structure for table `agendaaudio`
--

CREATE TABLE `agendaaudio` (
  `id_agenda` bigint(255) NOT NULL,
  `tanggal` date DEFAULT NULL,
  `jam_mulai` time DEFAULT NULL,
  `jam_selesai` time DEFAULT NULL,
  `nama_agenda` varchar(255) DEFAULT NULL,
  `lokasi_agenda` varchar(255) DEFAULT NULL,
  `status_agenda` varchar(255) DEFAULT NULL,
  `tipestatus_agenda` varchar(255) DEFAULT NULL,
  `contact_person` varchar(255) DEFAULT NULL,
  `informasi` text DEFAULT NULL,
  `id_pegawai` int(255) DEFAULT NULL,
  `nama_pejabat` varchar(255) DEFAULT NULL,
  `nama_pegawai` varchar(255) DEFAULT NULL,
  `id_pejabat` bigint(255) DEFAULT NULL,
  `id_pejabatdisposisi` bigint(255) DEFAULT NULL,
  `isi_disposisi` varchar(255) DEFAULT NULL,
  `status_disposisi` int(10) DEFAULT NULL,
  `alasan_penolakan` varchar(255) DEFAULT NULL,
  `sebagai` varchar(100) DEFAULT NULL,
  `id_acara` int(100) DEFAULT NULL,
  `status_hadir` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `agendachargen`
--

CREATE TABLE `agendachargen` (
  `id_agenda` bigint(255) NOT NULL,
  `tanggal` date DEFAULT NULL,
  `jam_mulai` time DEFAULT NULL,
  `jam_selesai` time DEFAULT NULL,
  `nama_agenda` varchar(255) DEFAULT NULL,
  `lokasi_agenda` varchar(255) DEFAULT NULL,
  `status_agenda` varchar(255) DEFAULT NULL,
  `tipestatus_agenda` varchar(255) DEFAULT NULL,
  `contact_person` varchar(255) DEFAULT NULL,
  `informasi` text DEFAULT NULL,
  `id_pegawai` int(255) DEFAULT NULL,
  `nama_pejabat` varchar(255) DEFAULT NULL,
  `nama_pegawai` varchar(255) DEFAULT NULL,
  `id_pejabat` bigint(255) DEFAULT NULL,
  `id_pejabatdisposisi` bigint(255) DEFAULT NULL,
  `isi_disposisi` varchar(255) DEFAULT NULL,
  `status_disposisi` int(10) DEFAULT NULL,
  `alasan_penolakan` varchar(255) DEFAULT NULL,
  `sebagai` varchar(100) DEFAULT NULL,
  `id_acara` int(100) DEFAULT NULL,
  `status_hadir` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `agendaeditor`
--

CREATE TABLE `agendaeditor` (
  `id_agenda` bigint(255) NOT NULL,
  `tanggal` date DEFAULT NULL,
  `jam_mulai` time DEFAULT NULL,
  `jam_selesai` time DEFAULT NULL,
  `nama_agenda` varchar(255) DEFAULT NULL,
  `lokasi_agenda` varchar(255) DEFAULT NULL,
  `status_agenda` varchar(255) DEFAULT NULL,
  `tipestatus_agenda` varchar(255) DEFAULT NULL,
  `contact_person` varchar(255) DEFAULT NULL,
  `informasi` text DEFAULT NULL,
  `id_pegawai` int(255) DEFAULT NULL,
  `nama_pejabat` varchar(255) DEFAULT NULL,
  `nama_pegawai` varchar(255) DEFAULT NULL,
  `id_pejabat` bigint(255) DEFAULT NULL,
  `id_pejabatdisposisi` bigint(255) DEFAULT NULL,
  `isi_disposisi` varchar(255) DEFAULT NULL,
  `status_disposisi` int(10) DEFAULT NULL,
  `alasan_penolakan` varchar(255) DEFAULT NULL,
  `sebagai` varchar(100) DEFAULT NULL,
  `id_acara` int(100) DEFAULT NULL,
  `status_hadir` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `agendafile`
--

CREATE TABLE `agendafile` (
  `id_agendafile` bigint(255) NOT NULL,
  `agenda_file` varchar(255) DEFAULT NULL,
  `id_agenda` int(255) DEFAULT NULL,
  `id_type` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `agendait`
--

CREATE TABLE `agendait` (
  `id_agenda` bigint(255) NOT NULL,
  `tanggal` date DEFAULT NULL,
  `jam_mulai` time DEFAULT NULL,
  `jam_selesai` time DEFAULT NULL,
  `nama_agenda` varchar(255) DEFAULT NULL,
  `lokasi_agenda` varchar(255) DEFAULT NULL,
  `status_agenda` varchar(255) DEFAULT NULL,
  `tipestatus_agenda` varchar(255) DEFAULT NULL,
  `contact_person` varchar(255) DEFAULT NULL,
  `informasi` text DEFAULT NULL,
  `id_pegawai` int(255) DEFAULT NULL,
  `nama_pejabat` varchar(255) DEFAULT NULL,
  `nama_pegawai` varchar(255) DEFAULT NULL,
  `id_pejabat` bigint(255) DEFAULT NULL,
  `id_pejabatdisposisi` bigint(255) DEFAULT NULL,
  `isi_disposisi` varchar(255) DEFAULT NULL,
  `status_disposisi` int(10) DEFAULT NULL,
  `alasan_penolakan` varchar(255) DEFAULT NULL,
  `sebagai` varchar(100) DEFAULT NULL,
  `id_acara` int(100) DEFAULT NULL,
  `status_hadir` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `agendakepustakaan`
--

CREATE TABLE `agendakepustakaan` (
  `id_agenda` bigint(255) NOT NULL,
  `tanggal` date DEFAULT NULL,
  `jam_mulai` time DEFAULT NULL,
  `jam_selesai` time DEFAULT NULL,
  `nama_agenda` varchar(255) DEFAULT NULL,
  `lokasi_agenda` varchar(255) DEFAULT NULL,
  `status_agenda` varchar(255) DEFAULT NULL,
  `tipestatus_agenda` varchar(255) DEFAULT NULL,
  `contact_person` varchar(255) DEFAULT NULL,
  `informasi` text DEFAULT NULL,
  `id_pegawai` int(255) DEFAULT NULL,
  `nama_pejabat` varchar(255) DEFAULT NULL,
  `nama_pegawai` varchar(255) DEFAULT NULL,
  `id_pejabat` bigint(255) DEFAULT NULL,
  `id_pejabatdisposisi` bigint(255) DEFAULT NULL,
  `isi_disposisi` varchar(255) DEFAULT NULL,
  `status_disposisi` int(10) DEFAULT NULL,
  `alasan_penolakan` varchar(255) DEFAULT NULL,
  `sebagai` varchar(100) DEFAULT NULL,
  `id_acara` int(100) DEFAULT NULL,
  `status_hadir` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `agendalightning`
--

CREATE TABLE `agendalightning` (
  `id_agenda` bigint(255) NOT NULL,
  `tanggal` date DEFAULT NULL,
  `jam_mulai` time DEFAULT NULL,
  `jam_selesai` time DEFAULT NULL,
  `nama_agenda` varchar(255) DEFAULT NULL,
  `lokasi_agenda` varchar(255) DEFAULT NULL,
  `status_agenda` varchar(255) DEFAULT NULL,
  `tipestatus_agenda` varchar(255) DEFAULT NULL,
  `contact_person` varchar(255) DEFAULT NULL,
  `informasi` text DEFAULT NULL,
  `id_pegawai` int(255) DEFAULT NULL,
  `nama_pejabat` varchar(255) DEFAULT NULL,
  `nama_pegawai` varchar(255) DEFAULT NULL,
  `id_pejabat` bigint(255) DEFAULT NULL,
  `id_pejabatdisposisi` bigint(255) DEFAULT NULL,
  `isi_disposisi` varchar(255) DEFAULT NULL,
  `status_disposisi` int(10) DEFAULT NULL,
  `alasan_penolakan` varchar(255) DEFAULT NULL,
  `sebagai` varchar(100) DEFAULT NULL,
  `id_acara` int(100) DEFAULT NULL,
  `status_hadir` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `agendamaintenance`
--

CREATE TABLE `agendamaintenance` (
  `id_agenda` bigint(255) NOT NULL,
  `tanggal` date DEFAULT NULL,
  `jam_mulai` time DEFAULT NULL,
  `jam_selesai` time DEFAULT NULL,
  `nama_agenda` varchar(255) DEFAULT NULL,
  `lokasi_agenda` varchar(255) DEFAULT NULL,
  `status_agenda` varchar(255) DEFAULT NULL,
  `tipestatus_agenda` varchar(255) DEFAULT NULL,
  `contact_person` varchar(255) DEFAULT NULL,
  `informasi` text DEFAULT NULL,
  `id_pegawai` int(255) DEFAULT NULL,
  `nama_pejabat` varchar(255) DEFAULT NULL,
  `nama_pegawai` varchar(255) DEFAULT NULL,
  `id_pejabat` bigint(255) DEFAULT NULL,
  `id_pejabatdisposisi` bigint(255) DEFAULT NULL,
  `isi_disposisi` varchar(255) DEFAULT NULL,
  `status_disposisi` int(10) DEFAULT NULL,
  `alasan_penolakan` varchar(255) DEFAULT NULL,
  `sebagai` varchar(100) DEFAULT NULL,
  `id_acara` int(100) DEFAULT NULL,
  `status_hadir` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `agendamastercontrol`
--

CREATE TABLE `agendamastercontrol` (
  `id_agenda` bigint(255) NOT NULL,
  `tanggal` date DEFAULT NULL,
  `jam_mulai` time DEFAULT NULL,
  `jam_selesai` time DEFAULT NULL,
  `nama_agenda` varchar(255) DEFAULT NULL,
  `lokasi_agenda` varchar(255) DEFAULT NULL,
  `status_agenda` varchar(255) DEFAULT NULL,
  `tipestatus_agenda` varchar(255) DEFAULT NULL,
  `contact_person` varchar(255) DEFAULT NULL,
  `informasi` text DEFAULT NULL,
  `id_pegawai` int(255) DEFAULT NULL,
  `nama_pejabat` varchar(255) DEFAULT NULL,
  `nama_pegawai` varchar(255) DEFAULT NULL,
  `id_pejabat` bigint(255) DEFAULT NULL,
  `id_pejabatdisposisi` bigint(255) DEFAULT NULL,
  `isi_disposisi` varchar(255) DEFAULT NULL,
  `status_disposisi` int(10) DEFAULT NULL,
  `alasan_penolakan` varchar(255) DEFAULT NULL,
  `sebagai` varchar(100) DEFAULT NULL,
  `id_acara` int(100) DEFAULT NULL,
  `status_hadir` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `agendaoperasional`
--

CREATE TABLE `agendaoperasional` (
  `id_agenda` bigint(255) NOT NULL,
  `tanggal` date DEFAULT NULL,
  `jam_mulai` time DEFAULT NULL,
  `jam_selesai` time DEFAULT NULL,
  `nama_agenda` varchar(255) DEFAULT NULL,
  `lokasi_agenda` varchar(255) DEFAULT NULL,
  `status_agenda` varchar(255) DEFAULT NULL,
  `tipestatus_agenda` varchar(255) DEFAULT NULL,
  `contact_person` varchar(255) DEFAULT NULL,
  `informasi` text DEFAULT NULL,
  `id_pegawai` int(255) DEFAULT NULL,
  `nama_pejabat` varchar(255) DEFAULT NULL,
  `nama_pegawai` varchar(255) DEFAULT NULL,
  `id_pejabat` bigint(255) DEFAULT NULL,
  `id_pejabatdisposisi` bigint(255) DEFAULT NULL,
  `isi_disposisi` varchar(255) DEFAULT NULL,
  `status_disposisi` int(10) DEFAULT NULL,
  `alasan_penolakan` varchar(255) DEFAULT NULL,
  `sebagai` varchar(100) DEFAULT NULL,
  `id_acara` int(100) DEFAULT NULL,
  `status_hadir` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `agendapdumum`
--

CREATE TABLE `agendapdumum` (
  `id_agenda` bigint(255) NOT NULL,
  `tanggal` date DEFAULT NULL,
  `jam_mulai` time DEFAULT NULL,
  `jam_selesai` time DEFAULT NULL,
  `nama_agenda` varchar(255) DEFAULT NULL,
  `lokasi_agenda` varchar(255) DEFAULT NULL,
  `status_agenda` varchar(255) DEFAULT NULL,
  `tipestatus_agenda` varchar(255) DEFAULT NULL,
  `contact_person` varchar(255) DEFAULT NULL,
  `informasi` text DEFAULT NULL,
  `id_pegawai` int(255) DEFAULT NULL,
  `nama_pejabat` varchar(255) DEFAULT NULL,
  `nama_pegawai` varchar(255) DEFAULT NULL,
  `id_pejabat` bigint(255) DEFAULT NULL,
  `id_pejabatdisposisi` bigint(255) DEFAULT NULL,
  `isi_disposisi` varchar(255) DEFAULT NULL,
  `status_disposisi` int(10) DEFAULT NULL,
  `alasan_penolakan` varchar(255) DEFAULT NULL,
  `sebagai` varchar(100) DEFAULT NULL,
  `id_acara` int(100) DEFAULT NULL,
  `status_hadir` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `agendapegawai`
--

CREATE TABLE `agendapegawai` (
  `id_agendapegawai` bigint(255) NOT NULL,
  `id_pegawai` int(255) DEFAULT NULL,
  `id_agenda` int(255) DEFAULT NULL,
  `id_type` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `agendapenatarias`
--

CREATE TABLE `agendapenatarias` (
  `id_agenda` bigint(255) NOT NULL,
  `tanggal` date DEFAULT NULL,
  `jam_mulai` time DEFAULT NULL,
  `jam_selesai` time DEFAULT NULL,
  `nama_agenda` varchar(255) DEFAULT NULL,
  `lokasi_agenda` varchar(255) DEFAULT NULL,
  `status_agenda` varchar(255) DEFAULT NULL,
  `tipestatus_agenda` varchar(255) DEFAULT NULL,
  `contact_person` varchar(255) DEFAULT NULL,
  `informasi` text DEFAULT NULL,
  `id_pegawai` int(255) DEFAULT NULL,
  `nama_pejabat` varchar(255) DEFAULT NULL,
  `nama_pegawai` varchar(255) DEFAULT NULL,
  `id_pejabat` bigint(255) DEFAULT NULL,
  `id_pejabatdisposisi` bigint(255) DEFAULT NULL,
  `isi_disposisi` varchar(255) DEFAULT NULL,
  `status_disposisi` int(10) DEFAULT NULL,
  `alasan_penolakan` varchar(255) DEFAULT NULL,
  `sebagai` varchar(100) DEFAULT NULL,
  `id_acara` int(100) DEFAULT NULL,
  `status_hadir` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `agendaredaktur`
--

CREATE TABLE `agendaredaktur` (
  `id_agenda` bigint(255) NOT NULL,
  `tanggal` date DEFAULT NULL,
  `jam_mulai` time DEFAULT NULL,
  `jam_selesai` time DEFAULT NULL,
  `nama_agenda` varchar(255) DEFAULT NULL,
  `lokasi_agenda` varchar(255) DEFAULT NULL,
  `status_agenda` varchar(255) DEFAULT NULL,
  `tipestatus_agenda` varchar(255) DEFAULT NULL,
  `contact_person` varchar(255) DEFAULT NULL,
  `informasi` text DEFAULT NULL,
  `id_pegawai` int(255) DEFAULT NULL,
  `nama_pejabat` varchar(255) DEFAULT NULL,
  `nama_pegawai` varchar(255) DEFAULT NULL,
  `id_pejabat` bigint(255) DEFAULT NULL,
  `id_pejabatdisposisi` bigint(255) DEFAULT NULL,
  `isi_disposisi` varchar(255) DEFAULT NULL,
  `status_disposisi` int(10) DEFAULT NULL,
  `alasan_penolakan` varchar(255) DEFAULT NULL,
  `sebagai` varchar(100) DEFAULT NULL,
  `id_acara` int(100) DEFAULT NULL,
  `status_hadir` int(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `agendaswitcher`
--

CREATE TABLE `agendaswitcher` (
  `id_agenda` bigint(255) NOT NULL,
  `tanggal` date DEFAULT NULL,
  `jam_mulai` time DEFAULT NULL,
  `jam_selesai` time DEFAULT NULL,
  `nama_agenda` varchar(255) DEFAULT NULL,
  `lokasi_agenda` varchar(255) DEFAULT NULL,
  `status_agenda` varchar(255) DEFAULT NULL,
  `tipestatus_agenda` varchar(255) DEFAULT NULL,
  `contact_person` varchar(255) DEFAULT NULL,
  `informasi` text DEFAULT NULL,
  `id_pegawai` int(255) DEFAULT NULL,
  `nama_pejabat` varchar(255) DEFAULT NULL,
  `nama_pegawai` varchar(255) DEFAULT NULL,
  `id_pejabat` bigint(255) DEFAULT NULL,
  `id_pejabatdisposisi` bigint(255) DEFAULT NULL,
  `isi_disposisi` varchar(255) DEFAULT NULL,
  `status_disposisi` int(10) DEFAULT NULL,
  `alasan_penolakan` varchar(255) DEFAULT NULL,
  `sebagai` varchar(100) DEFAULT NULL,
  `id_acara` int(100) DEFAULT NULL,
  `status_hadir` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `agendatd`
--

CREATE TABLE `agendatd` (
  `id_agenda` bigint(255) NOT NULL,
  `tanggal` date DEFAULT NULL,
  `jam_mulai` time DEFAULT NULL,
  `jam_selesai` time DEFAULT NULL,
  `nama_agenda` varchar(255) DEFAULT NULL,
  `lokasi_agenda` varchar(255) DEFAULT NULL,
  `status_agenda` varchar(255) DEFAULT NULL,
  `tipestatus_agenda` varchar(255) DEFAULT NULL,
  `contact_person` varchar(255) DEFAULT NULL,
  `informasi` text DEFAULT NULL,
  `id_pegawai` int(255) DEFAULT NULL,
  `nama_pejabat` varchar(255) DEFAULT NULL,
  `nama_pegawai` varchar(255) DEFAULT NULL,
  `id_pejabat` bigint(255) DEFAULT NULL,
  `id_pejabatdisposisi` bigint(255) DEFAULT NULL,
  `isi_disposisi` varchar(255) DEFAULT NULL,
  `status_disposisi` int(10) DEFAULT NULL,
  `alasan_penolakan` varchar(255) DEFAULT NULL,
  `sebagai` varchar(100) DEFAULT NULL,
  `id_acara` int(100) DEFAULT NULL,
  `status_hadir` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `agendavtr`
--

CREATE TABLE `agendavtr` (
  `id_agenda` bigint(255) NOT NULL,
  `tanggal` date DEFAULT NULL,
  `jam_mulai` time DEFAULT NULL,
  `jam_selesai` time DEFAULT NULL,
  `nama_agenda` varchar(255) DEFAULT NULL,
  `lokasi_agenda` varchar(255) DEFAULT NULL,
  `status_agenda` varchar(255) DEFAULT NULL,
  `tipestatus_agenda` varchar(255) DEFAULT NULL,
  `contact_person` varchar(255) DEFAULT NULL,
  `informasi` text DEFAULT NULL,
  `id_pegawai` int(255) DEFAULT NULL,
  `nama_pejabat` varchar(255) DEFAULT NULL,
  `nama_pegawai` varchar(255) DEFAULT NULL,
  `id_pejabat` bigint(255) DEFAULT NULL,
  `id_pejabatdisposisi` bigint(255) DEFAULT NULL,
  `isi_disposisi` varchar(255) DEFAULT NULL,
  `status_disposisi` int(10) DEFAULT NULL,
  `alasan_penolakan` varchar(255) DEFAULT NULL,
  `sebagai` varchar(100) DEFAULT NULL,
  `id_acara` int(100) DEFAULT NULL,
  `status_hadir` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `deputi`
--

CREATE TABLE `deputi` (
  `id_deputi` int(11) NOT NULL,
  `nama_deputi` varchar(100) NOT NULL,
  `satuankerja` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `deputi`
--

INSERT INTO `deputi` (`id_deputi`, `nama_deputi`, `satuankerja`) VALUES
(1, 'Satuan Kerja Berita', '0'),
(2, 'Satuan Kerja Program', '0'),
(3, 'Satuan Kerja Teknik Penyiaran', '0');

-- --------------------------------------------------------

--
-- Table structure for table `golruang`
--

CREATE TABLE `golruang` (
  `id_golruang` int(11) NOT NULL,
  `nama_golruang` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `golruang`
--

INSERT INTO `golruang` (`id_golruang`, `nama_golruang`) VALUES
(1, 'I/a'),
(2, 'I/b'),
(3, 'I/c'),
(4, 'I/d'),
(5, 'II/a'),
(6, 'II/b'),
(7, 'II/c'),
(8, 'II/d'),
(9, 'III/a'),
(10, 'III/b'),
(11, 'III/c'),
(12, 'III/d'),
(13, 'IV/a'),
(14, 'IV/b'),
(15, 'IV/c'),
(16, 'IV/d'),
(17, 'IV/e');

-- --------------------------------------------------------

--
-- Table structure for table `jabatan`
--

CREATE TABLE `jabatan` (
  `id_jabatan` int(11) NOT NULL,
  `nama_jabatan` varchar(100) DEFAULT NULL,
  `golongan` varchar(100) DEFAULT NULL,
  `tunjangan` int(100) DEFAULT NULL,
  `id_deputi` int(11) DEFAULT NULL,
  `id_unitkerja` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `jabatan`
--

INSERT INTO `jabatan` (`id_jabatan`, `nama_jabatan`, `golongan`, `tunjangan`, `id_deputi`, `id_unitkerja`) VALUES
(1, 'Penyiar', '0', 0, 2, 1);

-- --------------------------------------------------------

--
-- Table structure for table `jenisjabatan`
--

CREATE TABLE `jenisjabatan` (
  `id_jenisjabatan` int(11) NOT NULL,
  `nama_jenisjabatan` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `jenisjabatan`
--

INSERT INTO `jenisjabatan` (`id_jenisjabatan`, `nama_jenisjabatan`) VALUES
(1, 'JPT Pratama'),
(2, 'Jab. Administrator'),
(3, 'Jab. Pelaksana'),
(4, 'JPT Madya');

-- --------------------------------------------------------

--
-- Table structure for table `kegiatan`
--

CREATE TABLE `kegiatan` (
  `id_kegiatan` bigint(255) NOT NULL,
  `id_agenda` bigint(255) DEFAULT NULL,
  `tanggal` date DEFAULT NULL,
  `jam_mulai` time DEFAULT NULL,
  `jam_selesai` time DEFAULT NULL,
  `id_pegawai` bigint(255) DEFAULT NULL,
  `nama_kegiatan` varchar(255) DEFAULT NULL,
  `lokasi_kegiatan` varchar(255) DEFAULT NULL,
  `status_kegiatan` varchar(255) DEFAULT NULL,
  `tipestatus_kegiatan` varchar(255) DEFAULT NULL,
  `contact_person` varchar(255) DEFAULT NULL,
  `informasi` text DEFAULT NULL,
  `nama_pejabat` varchar(255) DEFAULT NULL,
  `id_pejabat` bigint(255) DEFAULT NULL,
  `id_pejabatdisposisi` bigint(255) DEFAULT NULL,
  `disposisi` varchar(255) DEFAULT NULL,
  `alasan_penolakan` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `kegiatan`
--

INSERT INTO `kegiatan` (`id_kegiatan`, `id_agenda`, `tanggal`, `jam_mulai`, `jam_selesai`, `id_pegawai`, `nama_kegiatan`, `lokasi_kegiatan`, `status_kegiatan`, `tipestatus_kegiatan`, `contact_person`, `informasi`, `nama_pejabat`, `id_pejabat`, `id_pejabatdisposisi`, `disposisi`, `alasan_penolakan`) VALUES
(1, 1, '2020-10-22', '11:00:00', '18:00:00', 2, 'test', 'test', '1', 'Private', 'test', 'test', 'test', NULL, NULL, NULL, NULL),
(3, 1, '2020-10-07', '01:55:00', '13:55:00', 2, 'test', 'test', '0', NULL, 'test', 'test', 'test', NULL, NULL, NULL, NULL),
(4, 1, '2020-10-22', '02:07:00', '14:07:00', 9, 'test6', 'test6', '3', NULL, 'test6', 'test6', 'test6', NULL, 10, 'test61', NULL),
(6, 1, '2020-10-21', '08:00:00', '21:00:00', 2, 'test678', 'test678', '2', NULL, 'test678', 'test678', 'test678', NULL, NULL, NULL, 'test61');

-- --------------------------------------------------------

--
-- Table structure for table `organisasi`
--

CREATE TABLE `organisasi` (
  `id_organisasi` int(11) NOT NULL,
  `nama_organisasi` varchar(100) NOT NULL,
  `id_deputi` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `pegawai`
--

CREATE TABLE `pegawai` (
  `id_pegawai` int(11) NOT NULL,
  `id_deputi` int(11) DEFAULT NULL,
  `id_statusasn` int(11) DEFAULT NULL,
  `id_golruang` int(11) DEFAULT NULL,
  `id_jabatan` int(110) NOT NULL,
  `id_jenisjabatan` int(11) DEFAULT NULL,
  `id_organisasi` int(11) DEFAULT NULL,
  `id_unitkerja` int(11) DEFAULT NULL,
  `id_admin` int(11) DEFAULT NULL,
  `nip` varchar(100) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `tempatlahir` varchar(255) DEFAULT NULL,
  `tanggallahir` date DEFAULT NULL,
  `GolRuang` varchar(255) DEFAULT NULL,
  `TmtGolRuang` varchar(255) DEFAULT NULL,
  `MKTahun` varchar(255) DEFAULT NULL,
  `MKBulan` varchar(255) DEFAULT NULL,
  `jk` varchar(100) NOT NULL,
  `foto` varchar(100) NOT NULL,
  `agama` varchar(100) NOT NULL,
  `pendidikan` varchar(100) NOT NULL,
  `status_kep` varchar(100) NOT NULL,
  `alamat` varchar(100) NOT NULL,
  `nohp` varchar(255) DEFAULT NULL,
  `tgl_dinas` varchar(100) DEFAULT NULL,
  `status_dinas` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pegawai`
--

INSERT INTO `pegawai` (`id_pegawai`, `id_deputi`, `id_statusasn`, `id_golruang`, `id_jabatan`, `id_jenisjabatan`, `id_organisasi`, `id_unitkerja`, `id_admin`, `nip`, `nama`, `tempatlahir`, `tanggallahir`, `GolRuang`, `TmtGolRuang`, `MKTahun`, `MKBulan`, `jk`, `foto`, `agama`, `pendidikan`, `status_kep`, `alamat`, `nohp`, `tgl_dinas`, `status_dinas`) VALUES
(1, 1, 1, 1, 1, 0, 0, 1, NULL, '12321321', 'MELLITA DIANALIA', NULL, NULL, NULL, NULL, NULL, NULL, 'P', 'foto_1605434353.jpg', 'islam', 'S1', '0', '<p>MELLITA DIANALIA</p>', '12321', '', ''),
(2, 1, 1, 2, 1, 0, 0, 1, NULL, '21321312', 'WIMA YASE RUSTAM', NULL, NULL, NULL, NULL, NULL, NULL, 'P', '', 'islam', 'S1', '0', '<p>WIMA YASE RUSTAM</p>', '21321321', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `satuankerja`
--

CREATE TABLE `satuankerja` (
  `id_satuankerja` int(11) NOT NULL,
  `nama_satuankerja` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `statusasn`
--

CREATE TABLE `statusasn` (
  `id_statusasn` int(11) NOT NULL,
  `nama_statusasn` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `statusasn`
--

INSERT INTO `statusasn` (`id_statusasn`, `nama_statusasn`) VALUES
(1, 'PNS'),
(2, 'PPPK'),
(4, 'Non PNS');

-- --------------------------------------------------------

--
-- Table structure for table `subunitkerja`
--

CREATE TABLE `subunitkerja` (
  `id_subunitkerja` int(11) NOT NULL,
  `nama_subunitkerja` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tpp`
--

CREATE TABLE `tpp` (
  `id_tpp` int(11) NOT NULL,
  `id_pegawai` int(100) NOT NULL,
  `jumlah_tpp` varchar(100) NOT NULL,
  `jumlah_potongan` varchar(100) NOT NULL,
  `bulan_t` int(100) NOT NULL,
  `tahun` int(100) NOT NULL,
  `tgl` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tpp`
--

INSERT INTO `tpp` (`id_tpp`, `id_pegawai`, `jumlah_tpp`, `jumlah_potongan`, `bulan_t`, `tahun`, `tgl`) VALUES
(7, 8, '300000', '0%', 1, 2018, '2018-04-02'),
(9, 9, '12750000', '0%', 5, 2020, '2020-05-01'),
(10, 10, '8749970', '30%', 1, 2020, '2020-05-17');

-- --------------------------------------------------------

--
-- Table structure for table `unitkerja`
--

CREATE TABLE `unitkerja` (
  `id_unitkerja` int(11) NOT NULL,
  `nama_unitkerja` varchar(100) NOT NULL,
  `id_organisasi` int(11) DEFAULT NULL,
  `id_deputi` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `unitkerja`
--

INSERT INTO `unitkerja` (`id_unitkerja`, `nama_unitkerja`, `id_organisasi`, `id_deputi`) VALUES
(1, 'EIC / PRODUSER', 0, 1),
(2, 'Pengarah Acara', 0, 1),
(3, 'Redaktur', 0, 1),
(4, 'Teleprompter', 0, 1),
(5, 'Editor Berita', 0, 1),
(6, 'Pengarah Siaran (PDU)', 0, 2),
(7, 'Komunikasi', 0, 2),
(8, 'Penata Rias', 0, 2),
(9, 'TD', 0, 3),
(10, 'Maintenance', 0, 3),
(11, 'Master Control', 0, 3),
(12, 'Switcher', 0, 3),
(13, 'Audio', 0, 3),
(14, 'Operator VTR', 0, 3),
(15, 'Lightning', 0, 3),
(16, 'Editor', 0, 3),
(17, 'Petugas IT', 0, 3),
(18, 'Operational Chargent', 0, 3);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `absen`
--
ALTER TABLE `absen`
  ADD PRIMARY KEY (`id_absen`);

--
-- Indexes for table `acara`
--
ALTER TABLE `acara`
  ADD PRIMARY KEY (`id_acara`);

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id_admin`);

--
-- Indexes for table `agenda`
--
ALTER TABLE `agenda`
  ADD PRIMARY KEY (`id_agenda`);

--
-- Indexes for table `agendaaudio`
--
ALTER TABLE `agendaaudio`
  ADD PRIMARY KEY (`id_agenda`);

--
-- Indexes for table `agendachargen`
--
ALTER TABLE `agendachargen`
  ADD PRIMARY KEY (`id_agenda`);

--
-- Indexes for table `agendaeditor`
--
ALTER TABLE `agendaeditor`
  ADD PRIMARY KEY (`id_agenda`);

--
-- Indexes for table `agendafile`
--
ALTER TABLE `agendafile`
  ADD PRIMARY KEY (`id_agendafile`);

--
-- Indexes for table `agendait`
--
ALTER TABLE `agendait`
  ADD PRIMARY KEY (`id_agenda`);

--
-- Indexes for table `agendakepustakaan`
--
ALTER TABLE `agendakepustakaan`
  ADD PRIMARY KEY (`id_agenda`);

--
-- Indexes for table `agendalightning`
--
ALTER TABLE `agendalightning`
  ADD PRIMARY KEY (`id_agenda`);

--
-- Indexes for table `agendamaintenance`
--
ALTER TABLE `agendamaintenance`
  ADD PRIMARY KEY (`id_agenda`);

--
-- Indexes for table `agendamastercontrol`
--
ALTER TABLE `agendamastercontrol`
  ADD PRIMARY KEY (`id_agenda`);

--
-- Indexes for table `agendaoperasional`
--
ALTER TABLE `agendaoperasional`
  ADD PRIMARY KEY (`id_agenda`);

--
-- Indexes for table `agendapdumum`
--
ALTER TABLE `agendapdumum`
  ADD PRIMARY KEY (`id_agenda`);

--
-- Indexes for table `agendapegawai`
--
ALTER TABLE `agendapegawai`
  ADD PRIMARY KEY (`id_agendapegawai`);

--
-- Indexes for table `agendapenatarias`
--
ALTER TABLE `agendapenatarias`
  ADD PRIMARY KEY (`id_agenda`);

--
-- Indexes for table `agendaredaktur`
--
ALTER TABLE `agendaredaktur`
  ADD PRIMARY KEY (`id_agenda`);

--
-- Indexes for table `agendaswitcher`
--
ALTER TABLE `agendaswitcher`
  ADD PRIMARY KEY (`id_agenda`);

--
-- Indexes for table `agendatd`
--
ALTER TABLE `agendatd`
  ADD PRIMARY KEY (`id_agenda`);

--
-- Indexes for table `agendavtr`
--
ALTER TABLE `agendavtr`
  ADD PRIMARY KEY (`id_agenda`);

--
-- Indexes for table `deputi`
--
ALTER TABLE `deputi`
  ADD PRIMARY KEY (`id_deputi`);

--
-- Indexes for table `golruang`
--
ALTER TABLE `golruang`
  ADD PRIMARY KEY (`id_golruang`);

--
-- Indexes for table `jabatan`
--
ALTER TABLE `jabatan`
  ADD PRIMARY KEY (`id_jabatan`);

--
-- Indexes for table `jenisjabatan`
--
ALTER TABLE `jenisjabatan`
  ADD PRIMARY KEY (`id_jenisjabatan`);

--
-- Indexes for table `kegiatan`
--
ALTER TABLE `kegiatan`
  ADD PRIMARY KEY (`id_kegiatan`);

--
-- Indexes for table `organisasi`
--
ALTER TABLE `organisasi`
  ADD PRIMARY KEY (`id_organisasi`);

--
-- Indexes for table `pegawai`
--
ALTER TABLE `pegawai`
  ADD PRIMARY KEY (`id_pegawai`);

--
-- Indexes for table `satuankerja`
--
ALTER TABLE `satuankerja`
  ADD PRIMARY KEY (`id_satuankerja`);

--
-- Indexes for table `statusasn`
--
ALTER TABLE `statusasn`
  ADD PRIMARY KEY (`id_statusasn`);

--
-- Indexes for table `subunitkerja`
--
ALTER TABLE `subunitkerja`
  ADD PRIMARY KEY (`id_subunitkerja`);

--
-- Indexes for table `tpp`
--
ALTER TABLE `tpp`
  ADD PRIMARY KEY (`id_tpp`);

--
-- Indexes for table `unitkerja`
--
ALTER TABLE `unitkerja`
  ADD PRIMARY KEY (`id_unitkerja`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `absen`
--
ALTER TABLE `absen`
  MODIFY `id_absen` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `acara`
--
ALTER TABLE `acara`
  MODIFY `id_acara` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id_admin` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `agenda`
--
ALTER TABLE `agenda`
  MODIFY `id_agenda` bigint(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `agendaaudio`
--
ALTER TABLE `agendaaudio`
  MODIFY `id_agenda` bigint(255) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `agendachargen`
--
ALTER TABLE `agendachargen`
  MODIFY `id_agenda` bigint(255) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `agendaeditor`
--
ALTER TABLE `agendaeditor`
  MODIFY `id_agenda` bigint(255) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `agendafile`
--
ALTER TABLE `agendafile`
  MODIFY `id_agendafile` bigint(255) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `agendait`
--
ALTER TABLE `agendait`
  MODIFY `id_agenda` bigint(255) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `agendakepustakaan`
--
ALTER TABLE `agendakepustakaan`
  MODIFY `id_agenda` bigint(255) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `agendalightning`
--
ALTER TABLE `agendalightning`
  MODIFY `id_agenda` bigint(255) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `agendamaintenance`
--
ALTER TABLE `agendamaintenance`
  MODIFY `id_agenda` bigint(255) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `agendamastercontrol`
--
ALTER TABLE `agendamastercontrol`
  MODIFY `id_agenda` bigint(255) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `agendaoperasional`
--
ALTER TABLE `agendaoperasional`
  MODIFY `id_agenda` bigint(255) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `agendapdumum`
--
ALTER TABLE `agendapdumum`
  MODIFY `id_agenda` bigint(255) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `agendapegawai`
--
ALTER TABLE `agendapegawai`
  MODIFY `id_agendapegawai` bigint(255) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `agendapenatarias`
--
ALTER TABLE `agendapenatarias`
  MODIFY `id_agenda` bigint(255) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `agendaredaktur`
--
ALTER TABLE `agendaredaktur`
  MODIFY `id_agenda` bigint(255) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `agendaswitcher`
--
ALTER TABLE `agendaswitcher`
  MODIFY `id_agenda` bigint(255) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `agendatd`
--
ALTER TABLE `agendatd`
  MODIFY `id_agenda` bigint(255) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `agendavtr`
--
ALTER TABLE `agendavtr`
  MODIFY `id_agenda` bigint(255) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `deputi`
--
ALTER TABLE `deputi`
  MODIFY `id_deputi` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `golruang`
--
ALTER TABLE `golruang`
  MODIFY `id_golruang` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `jabatan`
--
ALTER TABLE `jabatan`
  MODIFY `id_jabatan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `jenisjabatan`
--
ALTER TABLE `jenisjabatan`
  MODIFY `id_jenisjabatan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `kegiatan`
--
ALTER TABLE `kegiatan`
  MODIFY `id_kegiatan` bigint(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `organisasi`
--
ALTER TABLE `organisasi`
  MODIFY `id_organisasi` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `pegawai`
--
ALTER TABLE `pegawai`
  MODIFY `id_pegawai` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `satuankerja`
--
ALTER TABLE `satuankerja`
  MODIFY `id_satuankerja` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `statusasn`
--
ALTER TABLE `statusasn`
  MODIFY `id_statusasn` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `subunitkerja`
--
ALTER TABLE `subunitkerja`
  MODIFY `id_subunitkerja` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tpp`
--
ALTER TABLE `tpp`
  MODIFY `id_tpp` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `unitkerja`
--
ALTER TABLE `unitkerja`
  MODIFY `id_unitkerja` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
