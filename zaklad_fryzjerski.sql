-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
-- Host: 127.0.0.1
-- Wersja serwera: 10.4.24-MariaDB
-- Wersja PHP: 8.1.6

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

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `uzytkownik`
--

CREATE TABLE `uzytkownik` (
  `PESEL` int(11) NOT NULL,
  `imie` varchar(30) NOT NULL,
  `nazwisko` varchar(30) NOT NULL,
  `telefon` varchar(15) NOT NULL,
  `login` varchar(30) NOT NULL,
  `haslo` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

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
  ADD PRIMARY KEY (`PESEL`);

--
-- AUTO_INCREMENT dla zrzuconych tabel
--

--
-- AUTO_INCREMENT dla tabeli `fryzjer`
--
ALTER TABLE `fryzjer`
  MODIFY `id_fryzjer` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT dla tabeli `rezerwacja`
--
ALTER TABLE `rezerwacja`
  MODIFY `id_rezerwacja` int(11) NOT NULL AUTO_INCREMENT;

--
-- Ograniczenia dla zrzutów tabel
--

--
-- Ograniczenia dla tabeli `rezerwacja`
--
ALTER TABLE `rezerwacja`
  ADD CONSTRAINT `rezerwacja_ibfk_1` FOREIGN KEY (`id_uzytkownik`) REFERENCES `uzytkownik` (`PESEL`),
  ADD CONSTRAINT `rezerwacja_ibfk_2` FOREIGN KEY (`id_fryzjer`) REFERENCES `fryzjer` (`id_fryzjer`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
