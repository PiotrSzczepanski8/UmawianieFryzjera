-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Czas generowania: 09 Gru 2024, 10:06
-- Wersja serwera: 10.4.20-MariaDB
-- Wersja PHP: 7.3.29

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Baza danych: `zaklad_fryzjerski`
--
CREATE DATABASE IF NOT EXISTS `zaklad_fryzjerski` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;
USE `zaklad_fryzjerski`;

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `fryzjer`
--

CREATE TABLE `fryzjer` (
  `id_fryzjer` int(11) NOT NULL,
  `imie` varchar(30) DEFAULT NULL,
  `nazwisko` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Zrzut danych tabeli `fryzjer`
--

INSERT INTO `fryzjer` (`id_fryzjer`, `imie`, `nazwisko`) VALUES
(1, 'Marek', 'Rurka'),
(2, 'Weronika', 'Krzywy'),
(3, 'Maria', 'Janosik');

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `rezerwacja`
--

CREATE TABLE `rezerwacja` (
  `id_rezerwacja` int(11) NOT NULL,
  `data` date NOT NULL,
  `godzina` time NOT NULL,
  `id_uzytkownik` int(11) NOT NULL,
  `id_fryzjer` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Zrzut danych tabeli `rezerwacja`
--

INSERT INTO `rezerwacja` (`id_rezerwacja`, `data`, `godzina`, `id_uzytkownik`, `id_fryzjer`) VALUES
(3, '2024-12-04', '10:30:00', 2147483647, 2),
(5, '2024-12-04', '10:30:00', 2147483647, 2),
(6, '2024-12-04', '09:45:00', 2147483647, 3),
(7, '2024-12-04', '09:45:00', 2147483647, 1),
(9, '2024-12-04', '13:30:00', 2147483647, 1),
(10, '2024-12-04', '15:00:00', 2147483647, 3),
(11, '2024-12-04', '16:30:00', 2147483647, 1),
(12, '2024-12-04', '15:00:00', 2147483647, 2),
(13, '2024-12-04', '17:15:00', 2147483647, 3),
(14, '2024-12-04', '17:15:00', 2147483647, 2),
(15, '2024-12-03', '10:30:00', 2147483647, 1),
(16, '2024-12-03', '10:30:00', 2147483647, 2),
(17, '2024-12-03', '09:45:00', 2147483647, 3),
(18, '2024-12-05', '09:45:00', 2147483647, 2),
(19, '2024-12-05', '10:30:00', 2147483647, 2),
(20, '2024-12-05', '11:15:00', 2147483647, 2),
(21, '2024-12-05', '12:00:00', 2147483647, 2),
(22, '2024-12-05', '12:00:00', 2147483647, 3),
(23, '2024-12-05', '11:15:00', 2147483647, 3),
(24, '2024-12-06', '09:45:00', 2147483647, 1),
(25, '2024-12-06', '10:30:00', 2147483647, 1),
(26, '2024-12-06', '11:15:00', 2147483647, 1),
(27, '2024-12-09', '09:45:00', 2147483647, 2),
(28, '2024-12-09', '10:30:00', 2147483647, 2),
(29, '2024-12-09', '10:30:00', 2147483647, 3),
(30, '2024-12-10', '09:45:00', 2147483647, 3),
(31, '2024-12-10', '10:30:00', 2147483647, 3),
(32, '2024-12-10', '11:15:00', 2147483647, 3),
(33, '2024-12-10', '12:00:00', 2147483647, 3),
(35, '2024-12-10', '11:15:00', 2147483647, 1),
(36, '2024-12-10', '12:00:00', 2147483647, 1),
(37, '2024-12-10', '11:15:00', 2147483647, 2),
(39, '2024-12-02', '09:45:00', 2147483647, 1),
(40, '2024-12-02', '10:30:00', 2147483647, 1),
(41, '2024-12-02', '11:15:00', 2147483647, 2),
(42, '2024-12-02', '10:30:00', 2147483647, 2),
(43, '2024-12-02', '15:00:00', 2147483647, 2),
(44, '2024-12-02', '16:30:00', 2147483647, 2),
(45, '2024-12-02', '17:15:00', 2147483647, 2),
(46, '2024-12-02', '15:45:00', 2147483647, 2),
(47, '2024-12-02', '12:00:00', 2147483647, 3),
(48, '2024-12-02', '11:15:00', 2147483647, 3),
(49, '2024-12-02', '09:45:00', 2147483647, 3),
(90, '2024-12-04', '12:00:00', 2147483647, 2);

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `uzytkownik`
--

CREATE TABLE `uzytkownik` (
  `PESEL` int(11) NOT NULL,
  `imie` varchar(30) NOT NULL,
  `nazwisko` varchar(30) NOT NULL,
  `login` varchar(30) NOT NULL,
  `haslo` varchar(100) NOT NULL,
  `telefon` varchar(15) NOT NULL,
  `id_uzytkownik` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Zrzut danych tabeli `uzytkownik`
--

INSERT INTO `uzytkownik` (`PESEL`, `imie`, `nazwisko`, `login`, `haslo`, `telefon`, `id_uzytkownik`) VALUES
(2147483647, 'Karolina', 'Fryderyk', 'marekrurka', 'kurka', '+90 000 000 000', 1);

--
-- Indeksy dla zrzutów tabel
--

--
-- Indeksy dla tabeli `fryzjer`
--
ALTER TABLE `fryzjer`
  ADD PRIMARY KEY (`id_fryzjer`);

--
-- Indeksy dla tabeli `rezerwacja`
--
ALTER TABLE `rezerwacja`
  ADD PRIMARY KEY (`id_rezerwacja`),
  ADD KEY `id_uzytkownik` (`id_uzytkownik`),
  ADD KEY `id_fryzjer` (`id_fryzjer`);

--
-- Indeksy dla tabeli `uzytkownik`
--
ALTER TABLE `uzytkownik`
  ADD PRIMARY KEY (`id_uzytkownik`);

--
-- AUTO_INCREMENT dla zrzuconych tabel
--

--
-- AUTO_INCREMENT dla tabeli `fryzjer`
--
ALTER TABLE `fryzjer`
  MODIFY `id_fryzjer` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT dla tabeli `rezerwacja`
--
ALTER TABLE `rezerwacja`
  MODIFY `id_rezerwacja` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=91;

--
-- AUTO_INCREMENT dla tabeli `uzytkownik`
--
ALTER TABLE `uzytkownik`
  MODIFY `id_uzytkownik` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Ograniczenia dla zrzutów tabel
--

--
-- Ograniczenia dla tabeli `rezerwacja`
--
ALTER TABLE `rezerwacja`
  ADD CONSTRAINT `rezerwacja_ibfk_2` FOREIGN KEY (`id_fryzjer`) REFERENCES `fryzjer` (`id_fryzjer`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
