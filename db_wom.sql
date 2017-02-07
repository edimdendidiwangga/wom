-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Feb 06, 2017 at 05:46 AM
-- Server version: 10.1.19-MariaDB
-- PHP Version: 5.6.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_wom`
--

-- --------------------------------------------------------

--
-- Table structure for table `bu`
--

CREATE TABLE `bu` (
  `id_bu` int(2) NOT NULL,
  `bu` varchar(3) NOT NULL,
  `nama_cabang` varchar(50) NOT NULL,
  `id_users` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `bu`
--

INSERT INTO `bu` (`id_bu`, `bu`, `nama_cabang`, `id_users`) VALUES
(1, '1', 'BALARAJA', 1),
(2, '1', 'BEKASI', 1),
(3, '1', 'CILEDUG', 1),
(4, '1', 'CIPUTAT', 1),
(5, '1', 'DEPOK', 1),
(6, '1', 'KEMAYORAN', 1),
(7, '1', 'RAWAMANGUN', 1),
(8, '1', 'TANGERANG', 1),
(9, '1', 'HEAD OFFICE', 1),
(10, '1', 'CIKARANG', 1),
(11, '3', 'CIBINONG', 2);

-- --------------------------------------------------------

--
-- Table structure for table `contract`
--

CREATE TABLE `contract` (
  `id_contract` int(8) NOT NULL,
  `id_karyawan` int(8) NOT NULL,
  `no_pkwt1` text NOT NULL,
  `join1` varchar(10) NOT NULL,
  `end1` varchar(10) NOT NULL,
  `no_pkwt2` text,
  `join2` varchar(10) DEFAULT NULL,
  `end2` varchar(10) DEFAULT NULL,
  `no_pkwt3` text,
  `join3` varchar(10) DEFAULT NULL,
  `end3` varchar(10) DEFAULT NULL,
  `no_pkwt4` text,
  `join4` varchar(10) DEFAULT NULL,
  `end4` varchar(10) DEFAULT NULL,
  `no_pkwt5` text,
  `join5` varchar(10) DEFAULT NULL,
  `end5` varchar(10) DEFAULT NULL,
  `no_pkwt6` text,
  `join6` varchar(10) DEFAULT NULL,
  `end6` varchar(10) DEFAULT NULL,
  `no_pkwt7` text,
  `join7` varchar(10) DEFAULT NULL,
  `end7` varchar(10) DEFAULT NULL,
  `no_pkwt8` text,
  `join8` varchar(10) DEFAULT NULL,
  `end8` varchar(10) DEFAULT NULL,
  `no_pkwt9` text,
  `join9` varchar(10) DEFAULT NULL,
  `end9` varchar(10) DEFAULT NULL,
  `no_pkwt10` text,
  `join10` varchar(10) DEFAULT NULL,
  `end10` varchar(10) DEFAULT NULL,
  `no_pkwt11` text,
  `join11` varchar(10) DEFAULT NULL,
  `end11` varchar(10) DEFAULT NULL,
  `no_pkwt12` text,
  `join12` varchar(10) DEFAULT NULL,
  `end12` varchar(10) DEFAULT NULL,
  `no_pkwt13` text,
  `join13` varchar(10) DEFAULT NULL,
  `end13` varchar(10) DEFAULT NULL,
  `no_pkwt14` text,
  `join14` varchar(10) DEFAULT NULL,
  `end14` varchar(10) DEFAULT NULL,
  `no_pkwt15` text,
  `join15` varchar(10) DEFAULT NULL,
  `end15` varchar(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `data_karyawan`
--

CREATE TABLE `data_karyawan` (
  `id_data_karyawan` int(11) NOT NULL,
  `id_karyawan` int(10) NOT NULL,
  `id_bu` varchar(3) NOT NULL,
  `nik` varchar(20) NOT NULL,
  `virtual_nik` varchar(25) NOT NULL,
  `npwp` varchar(30) NOT NULL,
  `hire_date` varchar(12) NOT NULL,
  `quit_date` varchar(12) NOT NULL,
  `position` text NOT NULL,
  `job_class` text NOT NULL,
  `location` text NOT NULL,
  `cabang_induk` text NOT NULL,
  `org_name` text NOT NULL,
  `jaminan` varchar(2) NOT NULL,
  `no_jaminan` text NOT NULL,
  `kartu_ketenagakerjaan` varchar(2) NOT NULL,
  `bpjs_ketenagakerjaan` varchar(30) NOT NULL,
  `kartu_kesehatan` varchar(2) NOT NULL,
  `bpjs_kesehatan` varchar(30) NOT NULL,
  `ket` text NOT NULL,
  `status` varchar(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `gaji`
--

CREATE TABLE `gaji` (
  `id_gaji` int(11) NOT NULL,
  `id_karyawan` int(10) NOT NULL,
  `ump` int(12) NOT NULL,
  `gaji_pokok` varchar(12) NOT NULL,
  `tun_maintenance` varchar(10) NOT NULL,
  `tun_jabatan` varchar(10) NOT NULL,
  `tun_jaga_malam` varchar(10) NOT NULL,
  `tun_lain` varchar(12) NOT NULL,
  `insentive` varchar(12) NOT NULL,
  `overtime` varchar(12) NOT NULL,
  `kehadiran` varchar(2) NOT NULL,
  `rapel` varchar(10) NOT NULL,
  `periode_gaji` varchar(15) NOT NULL,
  `update_gaji` varchar(18) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `karyawan`
--

CREATE TABLE `karyawan` (
  `id_karyawan` int(11) NOT NULL,
  `nama_karyawan` varchar(80) NOT NULL,
  `religion` varchar(20) NOT NULL,
  `birthplace` varchar(50) NOT NULL,
  `birthdate` varchar(10) NOT NULL,
  `id_type` varchar(2) NOT NULL,
  `id_number` varchar(30) NOT NULL,
  `education` varchar(5) NOT NULL,
  `gender` varchar(2) NOT NULL,
  `marital_status` varchar(3) NOT NULL,
  `permanent_address` text NOT NULL,
  `domisili_address` text NOT NULL,
  `home_phone` varchar(14) NOT NULL,
  `mobile_phone` varchar(14) NOT NULL,
  `freshgraduate` varchar(2) NOT NULL,
  `financial` varchar(2) NOT NULL,
  `update_active` varchar(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `keluarga`
--

CREATE TABLE `keluarga` (
  `id_keluarga` int(11) NOT NULL,
  `id_karyawan` int(10) NOT NULL,
  `mother_name` text NOT NULL,
  `spouse_name` text NOT NULL,
  `spouse_birthdate` varchar(12) NOT NULL,
  `chile1_name` text NOT NULL,
  `chile1_birthdate` varchar(12) NOT NULL,
  `chile2_name` text NOT NULL,
  `chile2_birthdate` varchar(12) NOT NULL,
  `chile3_name` text NOT NULL,
  `chile3_birthdate` varchar(12) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `mutasi`
--

CREATE TABLE `mutasi` (
  `id_mutasi` int(11) NOT NULL,
  `id_karyawan` int(10) NOT NULL,
  `mutasi1_dari` text,
  `mutasi1_ke` text,
  `mutasi2_dari` text,
  `mutasi2_ke` text,
  `mutasi3_dari` text,
  `mutasi3_ke` text,
  `tgl_sp1` text,
  `berlaku_sp1` text,
  `tgl_sp2` text,
  `berlaku_sp2` text,
  `tgl_sp3` text,
  `berlaku_sp3` text
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `rekening`
--

CREATE TABLE `rekening` (
  `id_rekening` int(11) NOT NULL,
  `id_karyawan` int(10) NOT NULL,
  `atas_nama` text NOT NULL,
  `nama_bank` varchar(30) NOT NULL,
  `no_rek` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id_users` int(11) NOT NULL,
  `nama_users` varchar(50) NOT NULL,
  `username` varchar(20) NOT NULL,
  `password` varchar(100) NOT NULL,
  `level` varchar(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id_users`, `nama_users`, `username`, `password`, `level`) VALUES
(1, 'Administrator', 'admin', '21232f297a57a5a743894a0e4a801fc3', '1');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `bu`
--
ALTER TABLE `bu`
  ADD PRIMARY KEY (`id_bu`);

--
-- Indexes for table `contract`
--
ALTER TABLE `contract`
  ADD PRIMARY KEY (`id_contract`);

--
-- Indexes for table `data_karyawan`
--
ALTER TABLE `data_karyawan`
  ADD PRIMARY KEY (`id_data_karyawan`);

--
-- Indexes for table `gaji`
--
ALTER TABLE `gaji`
  ADD PRIMARY KEY (`id_gaji`);

--
-- Indexes for table `karyawan`
--
ALTER TABLE `karyawan`
  ADD PRIMARY KEY (`id_karyawan`);

--
-- Indexes for table `keluarga`
--
ALTER TABLE `keluarga`
  ADD PRIMARY KEY (`id_keluarga`);

--
-- Indexes for table `mutasi`
--
ALTER TABLE `mutasi`
  ADD PRIMARY KEY (`id_mutasi`);

--
-- Indexes for table `rekening`
--
ALTER TABLE `rekening`
  ADD PRIMARY KEY (`id_rekening`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id_users`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `bu`
--
ALTER TABLE `bu`
  MODIFY `id_bu` int(2) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
--
-- AUTO_INCREMENT for table `contract`
--
ALTER TABLE `contract`
  MODIFY `id_contract` int(8) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `data_karyawan`
--
ALTER TABLE `data_karyawan`
  MODIFY `id_data_karyawan` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `gaji`
--
ALTER TABLE `gaji`
  MODIFY `id_gaji` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `karyawan`
--
ALTER TABLE `karyawan`
  MODIFY `id_karyawan` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `keluarga`
--
ALTER TABLE `keluarga`
  MODIFY `id_keluarga` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `mutasi`
--
ALTER TABLE `mutasi`
  MODIFY `id_mutasi` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `rekening`
--
ALTER TABLE `rekening`
  MODIFY `id_rekening` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id_users` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
