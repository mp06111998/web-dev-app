-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Gostitelj: 127.0.0.1
-- Čas nastanka: 21. sep 2021 ob 12.16
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
(4, 'testek', 'f7e0ef389ac6133c88aedbd66b44a4e1', 'marcel.polanc1998@gmail.com', '370c7e51f9c186ff0f2fbe4e9bcd4533', 0, '2021-09-21 09:10:36.081330'),
(5, 'marceltest', 'b0baee9d279d34fa1dfd71aadb908c3f', 'marcel.polanc1998@gmail.com', '9d4d35eb9440c10497086ac3205cee1a', 0, '2021-09-21 09:31:20.393661'),
(6, 'asdasd', '3cba1eb7a5bcd42097c3c3b6ff74c3a0', 'marcel.polanc1998@gmail.com', '687bb4c3a067ad07c4b63e47df5c2545', 0, '2021-09-21 09:31:32.906783');

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
(4, 140, 102, 36, 282, 2, 1, 1, 1),
(5, 0, 0, 0, 0, 1, 1, 1, 1),
(6, 0, 0, 0, 0, 1, 1, 1, 1);

-- --------------------------------------------------------

--
-- Struktura tabele `units`
--

CREATE TABLE `units` (
  `id_units` int(11) NOT NULL,
  `number` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Odloži podatke za tabelo `units`
--

INSERT INTO `units` (`id_units`, `number`) VALUES
(4, 2),
(5, 100),
(6, 1);

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
-- Indeksi tabele `units`
--
ALTER TABLE `units`
  ADD PRIMARY KEY (`id_units`);

--
-- AUTO_INCREMENT zavrženih tabel
--

--
-- AUTO_INCREMENT tabele `accounts`
--
ALTER TABLE `accounts`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

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
