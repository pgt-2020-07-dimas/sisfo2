-- phpMyAdmin SQL Dump
-- version 5.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 20, 2020 at 04:55 AM
-- Server version: 10.4.11-MariaDB
-- PHP Version: 7.4.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `sisfo`
--

-- --------------------------------------------------------

--
-- Table structure for table `evaluasidosen`
--

CREATE TABLE `evaluasidosen` (
  `id` int(11) NOT NULL,
  `nama` text CHARACTER SET latin1 NOT NULL,
  `mk` text CHARACTER SET latin1 NOT NULL,
  `tahun` text CHARACTER SET latin1 NOT NULL,
  `nim` text CHARACTER SET latin1 NOT NULL,
  `a1` int(11) NOT NULL,
  `a2` int(11) NOT NULL,
  `a3` int(11) NOT NULL,
  `a4` int(11) NOT NULL,
  `a5` int(11) NOT NULL,
  `a6` int(11) NOT NULL,
  `a7` int(11) NOT NULL,
  `a8` int(11) NOT NULL,
  `a9` int(11) NOT NULL,
  `a10` int(11) NOT NULL,
  `a11` int(11) NOT NULL,
  `b1` int(11) NOT NULL,
  `b2` int(11) NOT NULL,
  `b3` int(11) NOT NULL,
  `b4` int(11) NOT NULL,
  `b5` int(11) NOT NULL,
  `b6` int(11) NOT NULL,
  `b7` int(11) NOT NULL,
  `b8` int(11) NOT NULL,
  `b9` int(11) NOT NULL,
  `c1` int(11) NOT NULL,
  `c2` int(11) NOT NULL,
  `c3` int(11) NOT NULL,
  `c4` int(11) NOT NULL,
  `d1` int(11) NOT NULL,
  `d2` int(11) NOT NULL,
  `d3` int(11) NOT NULL,
  `d4` int(11) NOT NULL,
  `d5` int(11) NOT NULL,
  `d6` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `logkondite`
--

CREATE TABLE `logkondite` (
  `id` int(11) NOT NULL,
  `nim` int(11) NOT NULL,
  `nama` text CHARACTER SET latin1 NOT NULL,
  `jenispoin` text CHARACTER SET latin1 NOT NULL,
  `poin` int(11) NOT NULL,
  `keterangan` text CHARACTER SET latin1 NOT NULL,
  `tahun` int(11) NOT NULL,
  `prodi` text CHARACTER SET latin1 NOT NULL,
  `tanggal` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `logkondite`
--

INSERT INTO `logkondite` (`id`, `nim`, `nama`, `jenispoin`, `poin`, `keterangan`, `tahun`, `prodi`, `tanggal`) VALUES
(1, 1702014, 'DIMAS DWI CAHYO', 'MINUS', -5, 'Terlambat', 2020, 'T. ELEKTRONIKA', '2020-03-01'),
(2, 1702014, 'DIMAS DWI CAHYO', 'PLUS', 10, 'KEGIATAN PMB', 2019, 'T. ELEKTRONIKA', '2019-07-24'),
(3, 1702014, 'DIMAS DWI CAHYO', 'MINUS', -30, 'ALPHA', 2020, 'T. ELEKTRONIKA', '2020-03-01');

-- --------------------------------------------------------

--
-- Table structure for table `mahasiswa`
--

CREATE TABLE `mahasiswa` (
  `nim` int(11) NOT NULL,
  `nama` text CHARACTER SET latin1 NOT NULL,
  `jeniskelamin` text CHARACTER SET latin1 NOT NULL,
  `programstudi` text CHARACTER SET latin1 NOT NULL,
  `tempatlahir` text CHARACTER SET latin1 NOT NULL,
  `tanggallahir` date NOT NULL,
  `tahunmasuk` int(11) NOT NULL,
  `status` text CHARACTER SET latin1 NOT NULL,
  `kelas` text CHARACTER SET latin1 NOT NULL,
  `password` text CHARACTER SET latin1 NOT NULL,
  `pembimbing` text CHARACTER SET latin1 NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `mahasiswa`
--

INSERT INTO `mahasiswa` (`nim`, `nama`, `jeniskelamin`, `programstudi`, `tempatlahir`, `tanggallahir`, `tahunmasuk`, `status`, `kelas`, `password`, `pembimbing`) VALUES
(1702014, 'Dimas Dwi Cahyo', 'Laki-laki', 'T. ELEKTRONIKA', 'KLATEN', '1998-01-29', 2017, '1', 'B', '$2y$10$snBoyVBAsUL6HgbO70b4luv6mPFBn3qsAs/Uq1d4gUnp60kCxBVo6', 'INDRI PURWITA SARY,S.Pd.,M.T.');

-- --------------------------------------------------------

--
-- Table structure for table `nilaiakademik`
--

CREATE TABLE `nilaiakademik` (
  `id` int(11) NOT NULL,
  `nim` int(11) NOT NULL,
  `nama` text CHARACTER SET latin1 NOT NULL,
  `uts` text CHARACTER SET latin1 NOT NULL,
  `uas` text CHARACTER SET latin1 NOT NULL,
  `tugas` text CHARACTER SET latin1 NOT NULL,
  `kuis` text CHARACTER SET latin1 NOT NULL,
  `akhir` text CHARACTER SET latin1 NOT NULL,
  `huruf` text CHARACTER SET latin1 NOT NULL,
  `angka` double NOT NULL,
  `kodemk` text CHARACTER SET latin1 NOT NULL,
  `namamk` text CHARACTER SET latin1 NOT NULL,
  `sks` int(11) NOT NULL,
  `tahunakademik` int(11) NOT NULL,
  `prodi` text CHARACTER SET latin1 NOT NULL,
  `dosen` text CHARACTER SET latin1 NOT NULL,
  `kelas` text CHARACTER SET latin1 NOT NULL,
  `status` text CHARACTER SET latin1 NOT NULL,
  `statusmk` text CHARACTER SET latin1 NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `nilaiakademik`
--

INSERT INTO `nilaiakademik` (`id`, `nim`, `nama`, `uts`, `uas`, `tugas`, `kuis`, `akhir`, `huruf`, `angka`, `kodemk`, `namamk`, `sks`, `tahunakademik`, `prodi`, `dosen`, `kelas`, `status`, `statusmk`) VALUES
(1, 1702014, 'DIMAS DWI CAHYO', '75', '75', '75', '75', '75', 'B', 3, 'FSK', 'FISIKA TERAPAN', 2, 20182, 'T. ELEKTRONIKA', 'IHSAN AUDITIA AKHINOV, S.T.,M.T.', '1EB', 'DIATAS 2,75', 'Belum diisi'),
(2, 1702014, 'DIMAS DWI CAHYO', '100', '100', '100', '100', '100', 'A', 4, 'MTK', 'MATEMATIKA TERAPAN', 2, 20171, 'T. ELEKTRONIKA', 'IHSAN AUDITA AKHINOV, S.T.,M.T.', '3EB', 'DIATAS 2,75', 'Belum diisi'),
(3, 1702014, 'DIMAS DWI CAHYO', '100', '100', '100', '100', '100', 'A', 4, 'PJV', 'PEMROGRAMAN JAVA', 2, 20172, 'T. ELEKTRONIKA', 'M. RIDWAN ARIF C.,S.T.,M.T.', '3EB', 'DIATAS 2,75', 'Belum diisi'),
(4, 1702014, 'DIMAS DWI CAHYO', '75', '75', '75', '75', '75', 'B', 3, 'MJE', 'MANAJEMEN ENERGI', 2, 20181, 'T. ELEKTRONIKA', 'M. RIDWAN ARIF C.,S.T.,M.T', '3EB', 'Diatas 2,75', 'Belum diisi'),
(5, 1702014, 'DIMAS DWI CAHYO', '100', '100', '100', '100', '100', 'A', 4, 'STK', 'STATISTIKA', 2, 20191, 'T. ELEKTRONIKA', 'INDRI PURWITA SARY,S.Pd.,M.T.', '3EB', 'Diatas 2,75', 'Belum diisi'),
(6, 1702014, 'DIMAS DWI CAHYO', '90', '90', '90', '90', '90', 'A', 4, 'PHP', 'HTML,PHP,JAVASCRIPT,FRAMEWORK DALAM SEMINGGU', 2, 20192, 'T. ELEKTRONIKA', 'M. RIDWAN ARIF C.,S.T.,M.T.', '3EB', 'Diatas 2,75', 'Belum diisi'),
(7, 1702014, 'DIMAS DWI CAHYO', '75', '75', '75', '75', '75', 'B', 3, 'INS', 'INSTRUMENTASI 1', 2, 20171, 'T. ELEKTRONIKA', 'DEVI HANDAYA,S.T.,M.T.', '3EB', 'Diatas 2,75', 'Belum diisi'),
(8, 1702014, 'DIMAS DWI CAHYO', '50', '50', '50', '50', '50', 'C', 2, 'PTM', 'PRAKTEK TEKNOLOGI MEKANIK', 3, 20171, 'T. ELEKTRONIKA', 'AHMAD ZOHARI,S.T.', '3EB', 'Dibawah 2,75', 'Belum diisi');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `logkondite`
--
ALTER TABLE `logkondite`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `nilaiakademik`
--
ALTER TABLE `nilaiakademik`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `logkondite`
--
ALTER TABLE `logkondite`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `nilaiakademik`
--
ALTER TABLE `nilaiakademik`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
