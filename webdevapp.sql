-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Gostitelj: 127.0.0.1
-- Čas nastanka: 20. sep 2021 ob 10.42
-- Različica strežnika: 10.4.21-MariaDB
-- Različica PHP: 7.3.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Zbirka podatkov: `webdevapp`
--

-- --------------------------------------------------------

--
-- Struktura tabele `accounts`
--

CREATE TABLE `accounts` (
  `id` int(11) NOT NULL,
  `username` varchar(45) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(45) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(45) COLLATE utf8_unicode_ci NOT NULL,
  `vkey` varchar(45) COLLATE utf8_unicode_ci NOT NULL,
  `verified` tinyint(1) NOT NULL DEFAULT 0,
  `createdate` timestamp(6) NOT NULL DEFAULT current_timestamp(6) ON UPDATE current_timestamp(6)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Odloži podatke za tabelo `accounts`
--

INSERT INTO `accounts` (`id`, `username`, `password`, `email`, `vkey`, `verified`, `createdate`) VALUES
(1, 'testek', 'f7e0ef389ac6133c88aedbd66b44a4e1', 'marcel.polanc1998@gmail.com', '1d42d6ff3cde81168d5da815bd3fa126', 0, '2021-09-17 07:54:11.961788');

-- --------------------------------------------------------

--
-- Struktura tabele `materials`
--

CREATE TABLE `materials` (
  `id_materials` int(11) NOT NULL,
  `wood` int(11) NOT NULL,
  `clay` int(11) NOT NULL,
  `iron` int(11) NOT NULL,
  `wheat` int(11) NOT NULL,
  `wood_land` int(11) NOT NULL,
  `clay_land` int(11) NOT NULL,
  `iron_land` int(11) NOT NULL,
  `wheat_land` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Odloži podatke za tabelo `materials`
--

INSERT INTO `materials` (`id_materials`, `wood`, `clay`, `iron`, `wheat`, `wood_land`, `clay_land`, `iron_land`, `wheat_land`) VALUES
(1, 296, 222, 238, 20279, 7, 4, 4, 6);

--
-- Indeksi zavrženih tabel
--

--
-- Indeksi tabele `accounts`
--
ALTER TABLE `accounts`
  ADD PRIMARY KEY (`id`);

--
-- Indeksi tabele `materials`
--
ALTER TABLE `materials`
  ADD PRIMARY KEY (`id_materials`);

--
-- AUTO_INCREMENT zavrženih tabel
--

--
-- AUTO_INCREMENT tabele `accounts`
--
ALTER TABLE `accounts`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Omejitve tabel za povzetek stanja
--

--
-- Omejitve za tabelo `materials`
--
ALTER TABLE `materials`
  ADD CONSTRAINT `materials_ibfk_1` FOREIGN KEY (`id_materials`) REFERENCES `accounts` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
