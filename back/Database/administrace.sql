-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Počítač: 127.0.0.1
-- Vytvořeno: Pon 29. zář 2025, 14:00
-- Verze serveru: 10.4.32-MariaDB
-- Verze PHP: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Databáze: `administrace`
--

-- --------------------------------------------------------

--
-- Struktura tabulky `loginsystem`
--

CREATE TABLE `loginsystem` (
  `id` int(11) NOT NULL,
  `username` varchar(50) CHARACTER SET cp1250 COLLATE cp1250_czech_cs NOT NULL,
  `password` varchar(255) CHARACTER SET cp1250 COLLATE cp1250_czech_cs NOT NULL,
  `role` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Vypisuji data pro tabulku `loginsystem`
--

INSERT INTO `loginsystem` (`id`, `username`, `password`, `role`) VALUES
(3, 'admin', '$2y$10$JKJ.ZKw0Jb5zI7dZvvLXJOZQyAZiwfPRhYUWfa2jgjv66xWqKKM1a', 'admin'),
(4, 'admin1', '$2y$10$yuU9.R7/rvw5YruSgqTueeFsyqdMaFggCuCNLtP5oiumrmVa0U4US', 'admin'),
(5, 'admin2', '$2y$10$QDniClOHjmBtRYFnxWHYx.s6JZOnBAw0zhUZb6r3oUV.r7Havut0i', 'admin'),
(6, 'VedouciRZ', '$2y$10$rF5HzaudMhZXK9EYAGEuVOa41tJw9x9CrvXIbG16d3iebx1VmrkvW', 'RZ');

--
-- Indexy pro exportované tabulky
--

--
-- Indexy pro tabulku `loginsystem`
--
ALTER TABLE `loginsystem`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT pro tabulky
--

--
-- AUTO_INCREMENT pro tabulku `loginsystem`
--
ALTER TABLE `loginsystem`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
