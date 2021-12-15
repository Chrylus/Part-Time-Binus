-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 15, 2021 at 10:24 AM
-- Server version: 10.4.17-MariaDB
-- PHP Version: 8.0.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `form_it`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` int(11) NOT NULL,
  `nama` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `status` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `nama`, `email`, `password`, `status`) VALUES
(1, 'Admin', 'Admin', 'Admin!', 'Online');

-- --------------------------------------------------------

--
-- Table structure for table `complaint`
--

CREATE TABLE `complaint` (
  `ID` int(20) NOT NULL,
  `tanggal_start` date NOT NULL DEFAULT current_timestamp(),
  `tanggal_end` date DEFAULT NULL,
  `nama` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `no_Telepon` varchar(255) NOT NULL,
  `lokasi` varchar(255) NOT NULL,
  `problem` varchar(255) NOT NULL,
  `lampiran` varchar(255) NOT NULL,
  `ticket` varchar(15) DEFAULT NULL,
  `PIC` varchar(50) DEFAULT NULL,
  `status_ticket` varchar(40) DEFAULT NULL,
  `status` varchar(40) DEFAULT NULL,
  `klasifikasi` varchar(255) NOT NULL,
  `note` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Triggers `complaint`
--
DELIMITER $$
CREATE TRIGGER `trig_status` BEFORE INSERT ON `complaint` FOR EACH ROW BEGIN
IF (NEW.tanggal_start = NEW.tanggal_end && (NEW.tanggal_end != '0000-00-00' || NEW.tanggal_end IS NOT NULL)) THEN
  SET NEW.status = 'Completed';
ELSE
   IF (NEW.tanggal_end > NEW.tanggal_start && (NEW.tanggal_end != '0000-00-00' || NEW.tanggal_end IS NOT NULL)) THEN
    SET NEW.status = 'Overdue';
   ELSE
      IF (NEW.PIC IS NOT NULL && NEW.PIC != '' && (NEW.tanggal_end IS NULL || NEW.tanggal_end = '0000-00-00')) THEN
          SET NEW.status = 'On Progress';
         ELSE
      SET NEW.status = 'Open';
        END IF;
   END IF;
END IF;
END
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `trig_status_PIC` BEFORE INSERT ON `complaint` FOR EACH ROW BEGIN
IF (NEW.PIC IS NOT NULL && NEW.PIC != '' && (NEW.tanggal_end IS NULL || NEW.tanggal_end = '0000-00-00')) THEN
  SET NEW.status_ticket = 'On Progress';
ELSE
   IF (NEW.PIC IS NOT NULL && NEW.PIC != '' && NEW.tanggal_end IS NOT NULL && NEW.tanggal_end != '0000-00-00') THEN
    SET NEW.status_ticket = 'Closed';
   ELSE 
    SET NEW.status_ticket = 'Open';
        END IF;
END IF;
END
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `trig_status_PIC_update` BEFORE UPDATE ON `complaint` FOR EACH ROW BEGIN
IF (NEW.PIC IS NOT NULL && NEW.PIC != '' && (NEW.tanggal_end IS NULL || NEW.tanggal_end = '0000-00-00')) THEN
  SET NEW.status_ticket = 'On Progress';
ELSE
   IF (NEW.PIC IS NOT NULL && NEW.PIC != '' && NEW.tanggal_end IS NOT NULL && NEW.tanggal_end != '0000-00-00') THEN
    SET NEW.status_ticket = 'Closed';
   ELSE 
    SET NEW.status_ticket = 'Open';
        END IF;
END IF;
END
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `trig_status_update` BEFORE UPDATE ON `complaint` FOR EACH ROW BEGIN
IF (NEW.tanggal_start = NEW.tanggal_end && (NEW.tanggal_end != '0000-00-00' || NEW.tanggal_end IS NOT NULL)) THEN
  SET NEW.status = 'Completed';
ELSE
   IF (NEW.tanggal_end > NEW.tanggal_start && (NEW.tanggal_end != '0000-00-00' || NEW.tanggal_end IS NOT NULL)) THEN
    SET NEW.status = 'Overdue';
   ELSE
      IF (NEW.PIC IS NOT NULL && NEW.PIC != '' &&  (NEW.tanggal_end IS NULL || NEW.tanggal_end = '0000-00-00')) THEN
          SET NEW.status = 'On Progress';
         ELSE
      SET NEW.status = 'Open';
        END IF;
   END IF;
END IF;
END
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `trig_ticket` BEFORE INSERT ON `complaint` FOR EACH ROW BEGIN
SET NEW.ticket = CONCAT ('01', (SELECT AUTO_INCREMENT FROM INFORMATION_SCHEMA.TABLES WHERE TABLE_SCHEMA = DATABASE() AND TABLE_NAME = 'complaint'), REPLACE (CONVERT (NEW.tanggal_start, CHAR), '-', ''));
END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `event`
--

CREATE TABLE `event` (
  `ID` int(11) NOT NULL,
  `tanggal_start` date NOT NULL DEFAULT current_timestamp(),
  `tanggal_mulai` date NOT NULL,
  `tanggal_selesai` date NOT NULL,
  `nama` varchar(255) NOT NULL,
  `nomor_induk` varchar(255) NOT NULL,
  `no_Telepon` varchar(255) NOT NULL,
  `event` varchar(255) NOT NULL,
  `waktu_mulai` varchar(255) NOT NULL,
  `waktu_selesai` varchar(255) NOT NULL,
  `ruangan` varchar(255) NOT NULL,
  `detail_event` varchar(255) NOT NULL,
  `ticket` varchar(255) DEFAULT NULL,
  `status` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Triggers `event`
--
DELIMITER $$
CREATE TRIGGER `trig_ticket_event` BEFORE INSERT ON `event` FOR EACH ROW BEGIN
SET NEW.ticket = CONCAT ('02', (SELECT AUTO_INCREMENT FROM INFORMATION_SCHEMA.TABLES WHERE TABLE_SCHEMA = DATABASE() AND TABLE_NAME = 'event'), REPLACE (CONVERT (NEW.tanggal_start, CHAR), '-', ''));
END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `peminjaman`
--

CREATE TABLE `peminjaman` (
  `ID` int(11) NOT NULL,
  `tanggal_start` date NOT NULL DEFAULT current_timestamp(),
  `tanggal_peminjaman` date NOT NULL,
  `tanggal_pengembalian` date DEFAULT NULL,
  `nama` varchar(255) NOT NULL,
  `nomor_induk` varchar(255) NOT NULL,
  `no_Telepon` varchar(255) NOT NULL,
  `event` varchar(255) NOT NULL,
  `waktu` varchar(255) NOT NULL,
  `waktu_pengembalian` varchar(255) DEFAULT NULL,
  `ruangan` varchar(255) NOT NULL,
  `peralatan` varchar(255) NOT NULL,
  `ticket` varchar(255) DEFAULT NULL,
  `status` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Triggers `peminjaman`
--
DELIMITER $$
CREATE TRIGGER `trig_ticket_peminjaman` BEFORE INSERT ON `peminjaman` FOR EACH ROW BEGIN
SET NEW.ticket = CONCAT ('03', (SELECT AUTO_INCREMENT FROM INFORMATION_SCHEMA.TABLES WHERE TABLE_SCHEMA = DATABASE() AND TABLE_NAME = 'peminjaman'), REPLACE (CONVERT (NEW.tanggal_start, CHAR), '-', ''));
END
$$
DELIMITER ;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `complaint`
--
ALTER TABLE `complaint`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `event`
--
ALTER TABLE `event`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `peminjaman`
--
ALTER TABLE `peminjaman`
  ADD PRIMARY KEY (`ID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `complaint`
--
ALTER TABLE `complaint`
  MODIFY `ID` int(20) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `event`
--
ALTER TABLE `event`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `peminjaman`
--
ALTER TABLE `peminjaman`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
