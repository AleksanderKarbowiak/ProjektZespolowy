-- phpMyAdmin SQL Dump
-- version 4.9.5
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Czas generowania: 26 Maj 2021, 15:17
-- Wersja serwera: 10.3.16-MariaDB
-- Wersja PHP: 7.3.23

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Baza danych: `id16889000_scw_baza`
--

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `Faculties`
--

CREATE TABLE `Faculties` (
  `ID` int(11) NOT NULL,
  `Name` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `Description` text COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Zrzut danych tabeli `Faculties`
--

INSERT INTO `Faculties` (`ID`, `Name`, `Description`) VALUES
(1, 'Wydział Zastosowań Informatyki i Matematyki', 'Wydział powstał 1 stycznia 2008 roku. Znaczna część kadry to osoby młode, łączące doświadczenia z wiodących polskich uczelni, bardzo zaangażowane w proces dydaktyczny, cały czas dążące do własnego rozwoju dydaktyczno-naukowego.\r\nRozwijamy pracownie multimedialne\r\nOd roku akademickiego 2016/17 uczymy w dwóch nowo wyposażonych pracowniach specjalistycznych: pracowni analizy przetwarzania obrazu, wyposażonej w 20 komputerów i specjalistyczne aparaty fotograficzne oraz pracowni audio, wyposażonej w specjalistyczny sprzęt służący do wszechstronnej analizy dźwięku.\r\nUczymy w dobrze wyposażonych pracowniach komputerowych\r\nUczymy w 15 laboratoriach komputerowych wyposażonych w 300 komputerów o następujących parametrach:\r\n• Intel Core i5-3570 (Quad-Core),\r\n• Pamięć RAM 8 GB,\r\n• Windows 7 / Linux.');

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `Fields`
--

CREATE TABLE `Fields` (
  `ID` int(11) NOT NULL,
  `Name` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `Description` text COLLATE utf8_unicode_ci NOT NULL,
  `IDFaculties` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Zrzut danych tabeli `Fields`
--

INSERT INTO `Fields` (`ID`, `Name`, `Description`, `IDFaculties`) VALUES
(1, 'Informatyka', 'Informatyka to jeden z najbardziej przyszłościowych kierunków studiów i pewna praca po otrzymaniu dyplomu. \r\nDla potrzeb dydaktyki, głównie dla studentów programu inżynierskiego i magisterskiego na kierunku Informatyka utworzono specjalistyczne laboratoria:\r\n• Laboratorium Technologii Cisco,\r\n• Laboratorium Podstaw Elektroniki,\r\n• Laboratorium Elektroniki Cyfrowej,\r\n• Laboratorium Sieci Komputerowych,\r\n• Laboratorium Teleinformatyki.', 1),
(2, 'Informatyka i Ekonometria', 'Ekonomia w informatyce, analiza danych i statystyka to tylko nieliczne dziedziny które opanujesz na tych studiach ', 1);

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `FieldsSub`
--

CREATE TABLE `FieldsSub` (
  `ID` int(11) NOT NULL,
  `IDFields` int(11) NOT NULL,
  `IDSubject` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Zrzut danych tabeli `FieldsSub`
--

INSERT INTO `FieldsSub` (`ID`, `IDFields`, `IDSubject`) VALUES
(1, 1, 1),
(2, 2, 1);

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `Lecturers`
--

CREATE TABLE `Lecturers` (
  `ID` int(11) NOT NULL,
  `Name` varchar(40) COLLATE utf8_unicode_ci NOT NULL,
  `Surname` varchar(60) COLLATE utf8_unicode_ci NOT NULL,
  `Email` varchar(60) COLLATE utf8_unicode_ci NOT NULL,
  `Degree` varchar(15) COLLATE utf8_unicode_ci NOT NULL,
  `Description` text COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Zrzut danych tabeli `Lecturers`
--

INSERT INTO `Lecturers` (`ID`, `Name`, `Surname`, `Email`, `Degree`, `Description`) VALUES
(2, 'Jan', 'Kowalski', 'jankowalski@test.pl', 'dr.inz', 'testowy');

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `Materials`
--

CREATE TABLE `Materials` (
  `ID` int(11) NOT NULL,
  `Name` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `Plik` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `IDSubject` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Zrzut danych tabeli `Materials`
--

INSERT INTO `Materials` (`ID`, `Name`, `Plik`, `IDSubject`) VALUES
(1, 'KolokwiumGrA', 'Materiały/kolos.jpg', 1);

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `Subjects`
--

CREATE TABLE `Subjects` (
  `ID` int(11) NOT NULL,
  `Name` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `Description` text COLLATE utf8_unicode_ci NOT NULL,
  `IDLecturers` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Zrzut danych tabeli `Subjects`
--

INSERT INTO `Subjects` (`ID`, `Name`, `Description`, `IDLecturers`) VALUES
(1, 'Wstęp do programowania', 'Opanujesz podstawy programowania z językiem C#', 2);

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `Tutor`
--

CREATE TABLE `Tutor` (
  `ID` int(11) NOT NULL,
  `IdUser` int(11) NOT NULL,
  `Price` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Zrzut danych tabeli `Tutor`
--

INSERT INTO `Tutor` (`ID`, `IdUser`, `Price`) VALUES
(1, 5, 50);

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `Users`
--

CREATE TABLE `Users` (
  `Id` int(8) NOT NULL COMMENT 'Id uzytkownika',
  `Name` varchar(30) COLLATE utf8_unicode_ci NOT NULL COMMENT 'Imie uzytkownika',
  `Surname` varchar(30) COLLATE utf8_unicode_ci NOT NULL COMMENT 'Nazwisko uzytkownika',
  `Login` varchar(30) COLLATE utf8_unicode_ci NOT NULL COMMENT 'Login uzytkownika',
  `Password` varchar(50) COLLATE utf8_unicode_ci NOT NULL COMMENT 'Haslo uzytkownika',
  `FieldId` int(11) NOT NULL COMMENT 'Id kierunku',
  `Email` varchar(60) COLLATE utf8_unicode_ci NOT NULL COMMENT 'Adres email uzytkownika',
  `IDTutor` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Zrzut danych tabeli `Users`
--

INSERT INTO `Users` (`Id`, `Name`, `Surname`, `Login`, `Password`, `FieldId`, `Email`, `IDTutor`) VALUES
(1, 'Uzytkownik', 'Testowy', 'Tester', '123test', 1, 'tester@gmail.com', NULL),
(3, 'Olek', 'Developer', 'olo', '123dev', 1, 'olo@gmail.com', NULL),
(4, 'Jan', 'Student', 'janekDzbanek', 'jano', 1, 'Janek@zjaranek.pl', NULL),
(5, 'Marta', 'Kowalska', 'martusia', 'mart123', 1, 'Mart@onet.eu', 1),
(6, 'Miś', 'Koala', 'misio', 'chinczyk', 1, 'bambus@3k.com', NULL),
(7, 'Test2', 'Test3', 'test', '1234', 1, 'test@test', NULL),
(8, 'Grzegorz', 'Pies', 'pies', '123pies', 1, 'pies@gmial.pl', NULL),
(9, 'Jan', '123', 'jan', '123dev', 1, 'jan@gmail.com', NULL),
(10, 'Jozef', 'Bazin', 'jozin', '123dev', 1, 'jozin@zbazin.cz', NULL);

--
-- Indeksy dla zrzutów tabel
--

--
-- Indeksy dla tabeli `Faculties`
--
ALTER TABLE `Faculties`
  ADD PRIMARY KEY (`ID`);

--
-- Indeksy dla tabeli `Fields`
--
ALTER TABLE `Fields`
  ADD PRIMARY KEY (`ID`);

--
-- Indeksy dla tabeli `FieldsSub`
--
ALTER TABLE `FieldsSub`
  ADD PRIMARY KEY (`ID`);

--
-- Indeksy dla tabeli `Lecturers`
--
ALTER TABLE `Lecturers`
  ADD PRIMARY KEY (`ID`);

--
-- Indeksy dla tabeli `Materials`
--
ALTER TABLE `Materials`
  ADD PRIMARY KEY (`ID`);

--
-- Indeksy dla tabeli `Subjects`
--
ALTER TABLE `Subjects`
  ADD PRIMARY KEY (`ID`);

--
-- Indeksy dla tabeli `Tutor`
--
ALTER TABLE `Tutor`
  ADD PRIMARY KEY (`ID`);

--
-- Indeksy dla tabeli `Users`
--
ALTER TABLE `Users`
  ADD PRIMARY KEY (`Id`);

--
-- AUTO_INCREMENT dla tabel zrzutów
--

--
-- AUTO_INCREMENT dla tabeli `Faculties`
--
ALTER TABLE `Faculties`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT dla tabeli `Fields`
--
ALTER TABLE `Fields`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT dla tabeli `FieldsSub`
--
ALTER TABLE `FieldsSub`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT dla tabeli `Lecturers`
--
ALTER TABLE `Lecturers`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT dla tabeli `Materials`
--
ALTER TABLE `Materials`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT dla tabeli `Subjects`
--
ALTER TABLE `Subjects`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT dla tabeli `Tutor`
--
ALTER TABLE `Tutor`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT dla tabeli `Users`
--
ALTER TABLE `Users`
  MODIFY `Id` int(8) NOT NULL AUTO_INCREMENT COMMENT 'Id uzytkownika', AUTO_INCREMENT=11;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
