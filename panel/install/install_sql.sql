-- phpMyAdmin SQL Dump
-- version 4.9.7
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Czas generowania: 21 Mar 2022, 13:06
-- Wersja serwera: 10.2.6-MariaDB
-- Wersja PHP: 7.3.32

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Baza danych: `pomagamyzd_test`
--

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `counter`
--

CREATE TABLE `counter` (
  `data` date NOT NULL DEFAULT '0000-00-00',
  `licznik` int(11) NOT NULL DEFAULT 1
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Zrzut danych tabeli `counter`
--

INSERT INTO `counter` (`data`, `licznik`) VALUES('2022-03-21', 0);

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `kategorie__glowne`
--

CREATE TABLE `kategorie__glowne` (
  `id` int(11) NOT NULL,
  `nazwa` varchar(30) CHARACTER SET utf8 COLLATE utf8_polish_ci NOT NULL,
  `opis` varchar(150) CHARACTER SET utf8 COLLATE utf8_polish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Zrzut danych tabeli `kategorie__glowne`
--

INSERT INTO `kategorie__glowne` (`id`, `nazwa`, `opis`) VALUES(1, 'Towary', '');
INSERT INTO `kategorie__glowne` (`id`, `nazwa`, `opis`) VALUES(2, 'Usługi', '');
INSERT INTO `kategorie__glowne` (`id`, `nazwa`, `opis`) VALUES(3, 'Zakwaterowanie', '');

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `kategorie__podkategorie`
--

CREATE TABLE `kategorie__podkategorie` (
  `id` int(11) NOT NULL,
  `kategorie__glowne_id` int(11) NOT NULL,
  `nazwa` varchar(100) COLLATE utf8_polish_ci NOT NULL,
  `opis` varchar(150) COLLATE utf8_polish_ci NOT NULL,
  `kategorie__podkategorie_3poziom` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_polish_ci;

--
-- Zrzut danych tabeli `kategorie__podkategorie`
--

INSERT INTO `kategorie__podkategorie` (`id`, `kategorie__glowne_id`, `nazwa`, `opis`, `kategorie__podkategorie_3poziom`) VALUES(1, 1, 'Żywność', '', 0);
INSERT INTO `kategorie__podkategorie` (`id`, `kategorie__glowne_id`, `nazwa`, `opis`, `kategorie__podkategorie_3poziom`) VALUES(2, 1, 'Ubrania', '', 0);
INSERT INTO `kategorie__podkategorie` (`id`, `kategorie__glowne_id`, `nazwa`, `opis`, `kategorie__podkategorie_3poziom`) VALUES(3, 1, 'Długoterminowa', '', 1);
INSERT INTO `kategorie__podkategorie` (`id`, `kategorie__glowne_id`, `nazwa`, `opis`, `kategorie__podkategorie_3poziom`) VALUES(4, 1, 'Krótkoterminowa', '', 1);
INSERT INTO `kategorie__podkategorie` (`id`, `kategorie__glowne_id`, `nazwa`, `opis`, `kategorie__podkategorie_3poziom`) VALUES(5, 1, 'Dla dzieci', '', 2);
INSERT INTO `kategorie__podkategorie` (`id`, `kategorie__glowne_id`, `nazwa`, `opis`, `kategorie__podkategorie_3poziom`) VALUES(6, 1, 'Dla dorosłych', '', 2);
INSERT INTO `kategorie__podkategorie` (`id`, `kategorie__glowne_id`, `nazwa`, `opis`, `kategorie__podkategorie_3poziom`) VALUES(7, 1, 'Chemia domowa', '', 0);
INSERT INTO `kategorie__podkategorie` (`id`, `kategorie__glowne_id`, `nazwa`, `opis`, `kategorie__podkategorie_3poziom`) VALUES(8, 1, 'Kosmetyki i higiena', '', 0);
INSERT INTO `kategorie__podkategorie` (`id`, `kategorie__glowne_id`, `nazwa`, `opis`, `kategorie__podkategorie_3poziom`) VALUES(9, 1, 'Wyposażenie wnętrza', '', 0);
INSERT INTO `kategorie__podkategorie` (`id`, `kategorie__glowne_id`, `nazwa`, `opis`, `kategorie__podkategorie_3poziom`) VALUES(10, 1, 'Materiały i narzędzia budowlane', '', 0);
INSERT INTO `kategorie__podkategorie` (`id`, `kategorie__glowne_id`, `nazwa`, `opis`, `kategorie__podkategorie_3poziom`) VALUES(11, 1, 'Meble', '', 9);
INSERT INTO `kategorie__podkategorie` (`id`, `kategorie__glowne_id`, `nazwa`, `opis`, `kategorie__podkategorie_3poziom`) VALUES(12, 1, 'AGD i RTV', '', 9);
INSERT INTO `kategorie__podkategorie` (`id`, `kategorie__glowne_id`, `nazwa`, `opis`, `kategorie__podkategorie_3poziom`) VALUES(13, 1, 'Inne np. pościele, kołdry, koce, ręczniki', '', 9);
INSERT INTO `kategorie__podkategorie` (`id`, `kategorie__glowne_id`, `nazwa`, `opis`, `kategorie__podkategorie_3poziom`) VALUES(14, 1, 'Przybory szkolne', '', 0);
INSERT INTO `kategorie__podkategorie` (`id`, `kategorie__glowne_id`, `nazwa`, `opis`, `kategorie__podkategorie_3poziom`) VALUES(15, 1, 'Leki i sprzęt medyczny', '', 0);
INSERT INTO `kategorie__podkategorie` (`id`, `kategorie__glowne_id`, `nazwa`, `opis`, `kategorie__podkategorie_3poziom`) VALUES(16, 1, 'Dla niemowląt i dzieci', '', 0);
INSERT INTO `kategorie__podkategorie` (`id`, `kategorie__glowne_id`, `nazwa`, `opis`, `kategorie__podkategorie_3poziom`) VALUES(17, 2, 'Medyczne', '', 0);
INSERT INTO `kategorie__podkategorie` (`id`, `kategorie__glowne_id`, `nazwa`, `opis`, `kategorie__podkategorie_3poziom`) VALUES(18, 2, 'Transportowe', '', 0);
INSERT INTO `kategorie__podkategorie` (`id`, `kategorie__glowne_id`, `nazwa`, `opis`, `kategorie__podkategorie_3poziom`) VALUES(19, 2, 'Transport towarowy', '', 18);
INSERT INTO `kategorie__podkategorie` (`id`, `kategorie__glowne_id`, `nazwa`, `opis`, `kategorie__podkategorie_3poziom`) VALUES(20, 2, 'Transport osobowy', '', 18);
INSERT INTO `kategorie__podkategorie` (`id`, `kategorie__glowne_id`, `nazwa`, `opis`, `kategorie__podkategorie_3poziom`) VALUES(21, 2, 'Remontowo - budowlane', '', 0);
INSERT INTO `kategorie__podkategorie` (`id`, `kategorie__glowne_id`, `nazwa`, `opis`, `kategorie__podkategorie_3poziom`) VALUES(22, 2, 'Tłumaczenia', '', 0);
INSERT INTO `kategorie__podkategorie` (`id`, `kategorie__glowne_id`, `nazwa`, `opis`, `kategorie__podkategorie_3poziom`) VALUES(23, 2, 'Prawnicze', '', 0);
INSERT INTO `kategorie__podkategorie` (`id`, `kategorie__glowne_id`, `nazwa`, `opis`, `kategorie__podkategorie_3poziom`) VALUES(24, 2, 'Edukacyjne', '', 0);
INSERT INTO `kategorie__podkategorie` (`id`, `kategorie__glowne_id`, `nazwa`, `opis`, `kategorie__podkategorie_3poziom`) VALUES(28, 3, 'Mieszkanie lub Dom', '', 0);
INSERT INTO `kategorie__podkategorie` (`id`, `kategorie__glowne_id`, `nazwa`, `opis`, `kategorie__podkategorie_3poziom`) VALUES(29, 3, 'Pokój lub pokoje', '', 0);

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `settings`
--

CREATE TABLE `settings` (
  `id` int(11) NOT NULL,
  `nazwa` varchar(100) COLLATE utf8_polish_ci NOT NULL,
  `wartosc` text COLLATE utf8_polish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_polish_ci;

--
-- Zrzut danych tabeli `settings`
--

INSERT INTO `settings` (`id`, `nazwa`, `wartosc`) VALUES(1, 'miasto', 'V2Fyc3phd2EgcG9tYWdh');
INSERT INTO `settings` (`id`, `nazwa`, `wartosc`) VALUES(2, 'address_footer', 'eHh4eCA0MQ==');
INSERT INTO `settings` (`id`, `nazwa`, `wartosc`) VALUES(3, 'miasto_footer', 'OTktOTk5IFdhcnN6YXdh');
INSERT INTO `settings` (`id`, `nazwa`, `wartosc`) VALUES(4, 'email_footer', 'eHh4eEB4eHh4LmNvbQ==');
INSERT INTO `settings` (`id`, `nazwa`, `wartosc`) VALUES(5, 'miejsce_zbiorki', 'PGZpZ3VyZSBjbGFzcz0idGFibGUiPjx0YWJsZT48dGJvZHk+PHRyPjx0ZCBjb2xzcGFuPSIzIj48c3Ryb25nPkRhcnkgemJpZXJhbXkgcG9kIG5hc3TEmXB1asSFY3ltaSBhZHJlc2FtaTwvc3Ryb25nPjwvdGQ+PC90cj48dHI+PHRkPjEuPC90ZD48dGQ+eHh4IDQxIChEYXJtb3d5IOKAnFNrbGVwaWvigJ0pPC90ZD48dGQ+Jm5ic3A7PC90ZD48L3RyPjwvdGJvZHk+PC90YWJsZT48L2ZpZ3VyZT48ZmlndXJlIGNsYXNzPSJ0YWJsZSI+PHRhYmxlPjx0Ym9keT48dHI+PHRkIGNvbHNwYW49IjMiPjxzdHJvbmc+RGFyeSB3eWRhamVteSBwb2QgbmFzdMSZcHVqxIVjeW1pIGFkcmVzYW1pPC9zdHJvbmc+PC90ZD48L3RyPjx0cj48dGQ+MTwvdGQ+PHRkPnh4eCA0MSAoRGFybW93eSDigJxTa2xlcGlr4oCdKTwvdGQ+PHRkPiZuYnNwOzwvdGQ+PC90cj48L3Rib2R5PjwvdGFibGU+PC9maWd1cmU+');
INSERT INTO `settings` (`id`, `nazwa`, `wartosc`) VALUES(6, 'telefon_footer', 'KzQ4IHh4eCB4eHggeHh4');
INSERT INTO `settings` (`id`, `nazwa`, `wartosc`) VALUES(11, 'pokaz_form_kontakt', 'b2Zm');
INSERT INTO `settings` (`id`, `nazwa`, `wartosc`) VALUES(12, 'certyfikat_text', 'PHA+VGVuIGNlcnR5ZmlrYXQgem9zdGHFgiB3eXN0YXdpb255IHByemV6IGNlbnRydW0gY2VydHlmaWthY2ppPC9wPg==');
INSERT INTO `settings` (`id`, `nazwa`, `wartosc`) VALUES(13, 'page_name', 'eHh4eHh4LnBs');
INSERT INTO `settings` (`id`, `nazwa`, `wartosc`) VALUES(14, 'pokaz_sklepik', 'b24=');

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `towary`
--

CREATE TABLE `towary` (
  `id` int(11) NOT NULL,
  `nazwa` varchar(100) COLLATE utf8_polish_ci NOT NULL,
  `opis` text COLLATE utf8_polish_ci NOT NULL,
  `kategorie__glowne_id` int(11) NOT NULL COMMENT 'ile_potrzeba',
  `kategorie__podkategorie_id` int(11) NOT NULL,
  `zapotrzebowanie` decimal(10,2) NOT NULL,
  `ile_dostepne` decimal(10,2) NOT NULL,
  `j_m` varchar(5) COLLATE utf8_polish_ci NOT NULL COMMENT 'Jednostka miary',
  `pokaz` int(11) NOT NULL DEFAULT 1,
  `uzytkownicy_id` int(11) NOT NULL,
  `data` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_polish_ci;

--
-- Zrzut danych tabeli `towary`
--

`ile_dostepne`, `j_m`, `pokaz`, `uzytkownicy_id`, `data`) VALUES(57, 'Olej', '', 1, 3, '-1.00', '0.00', 'szt', 1, 0, '2022-03-21 12:09:26');

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `towary_magazyn`
--

CREATE TABLE `towary_magazyn` (
  `id` int(11) NOT NULL,
  `nazwa` varchar(200) COLLATE utf8_polish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_polish_ci;

--
-- Zrzut danych tabeli `towary_magazyn`
--

INSERT INTO `towary_magazyn` (`id`, `nazwa`) VALUES(1, 'cukier');
INSERT INTO `towary_magazyn` (`id`, `nazwa`) VALUES(2, 'bazylia');
INSERT INTO `towary_magazyn` (`id`, `nazwa`) VALUES(3, 'butelkowany sok z cytryny');
INSERT INTO `towary_magazyn` (`id`, `nazwa`) VALUES(4, 'cebula,');
INSERT INTO `towary_magazyn` (`id`, `nazwa`) VALUES(5, 'cytryna');
INSERT INTO `towary_magazyn` (`id`, `nazwa`) VALUES(6, 'czosnek');
INSERT INTO `towary_magazyn` (`id`, `nazwa`) VALUES(7, 'daktyle');
INSERT INTO `towary_magazyn` (`id`, `nazwa`) VALUES(8, 'imbir');
INSERT INTO `towary_magazyn` (`id`, `nazwa`) VALUES(9, 'kolendra');
INSERT INTO `towary_magazyn` (`id`, `nazwa`) VALUES(10, 'koncentrat pomidorowy');
INSERT INTO `towary_magazyn` (`id`, `nazwa`) VALUES(11, 'marchew');
INSERT INTO `towary_magazyn` (`id`, `nazwa`) VALUES(12, 'mięta');
INSERT INTO `towary_magazyn` (`id`, `nazwa`) VALUES(13, 'migdały');
INSERT INTO `towary_magazyn` (`id`, `nazwa`) VALUES(14, 'mro?one warzywa');
INSERT INTO `towary_magazyn` (`id`, `nazwa`) VALUES(15, 'oregano');
INSERT INTO `towary_magazyn` (`id`, `nazwa`) VALUES(16, 'orzechy włoskie');
INSERT INTO `towary_magazyn` (`id`, `nazwa`) VALUES(17, 'papryka wędzona');
INSERT INTO `towary_magazyn` (`id`, `nazwa`) VALUES(18, 'pasty warzywne');
INSERT INTO `towary_magazyn` (`id`, `nazwa`) VALUES(19, 'pomarańcze');
INSERT INTO `towary_magazyn` (`id`, `nazwa`) VALUES(20, 'rodzynki');
INSERT INTO `towary_magazyn` (`id`, `nazwa`) VALUES(21, 'soczewica');
INSERT INTO `towary_magazyn` (`id`, `nazwa`) VALUES(22, 'tymianek');
INSERT INTO `towary_magazyn` (`id`, `nazwa`) VALUES(23, 'ziemniaki');
INSERT INTO `towary_magazyn` (`id`, `nazwa`) VALUES(24, 'chleb  żytni');
INSERT INTO `towary_magazyn` (`id`, `nazwa`) VALUES(25, 'gotowe sosy w słoikach (bez konserwantów, z prostym składem)');
INSERT INTO `towary_magazyn` (`id`, `nazwa`) VALUES(26, 'jogurt naturalny');
INSERT INTO `towary_magazyn` (`id`, `nazwa`) VALUES(27, 'kasza gryczana');
INSERT INTO `towary_magazyn` (`id`, `nazwa`) VALUES(28, 'kuskus');
INSERT INTO `towary_magazyn` (`id`, `nazwa`) VALUES(29, 'łosoś w puszce');
INSERT INTO `towary_magazyn` (`id`, `nazwa`) VALUES(30, 'majonez');
INSERT INTO `towary_magazyn` (`id`, `nazwa`) VALUES(31, 'kostki bulionowe');
INSERT INTO `towary_magazyn` (`id`, `nazwa`) VALUES(32, 'makaron');
INSERT INTO `towary_magazyn` (`id`, `nazwa`) VALUES(33, 'musztarda');
INSERT INTO `towary_magazyn` (`id`, `nazwa`) VALUES(34, 'ocet balsamiczny');
INSERT INTO `towary_magazyn` (`id`, `nazwa`) VALUES(35, 'ocet winny');
INSERT INTO `towary_magazyn` (`id`, `nazwa`) VALUES(36, 'olej sezamowy');
INSERT INTO `towary_magazyn` (`id`, `nazwa`) VALUES(37, 'oliwa z oliwek');
INSERT INTO `towary_magazyn` (`id`, `nazwa`) VALUES(38, 'pierś kurczaka');
INSERT INTO `towary_magazyn` (`id`, `nazwa`) VALUES(39, 'płatki owsiane');
INSERT INTO `towary_magazyn` (`id`, `nazwa`) VALUES(40, 'ryż');
INSERT INTO `towary_magazyn` (`id`, `nazwa`) VALUES(41, 'sardynki w puszce');
INSERT INTO `towary_magazyn` (`id`, `nazwa`) VALUES(42, 'sos chili');
INSERT INTO `towary_magazyn` (`id`, `nazwa`) VALUES(43, 'sos sojowy');
INSERT INTO `towary_magazyn` (`id`, `nazwa`) VALUES(44, 'tarty ser');
INSERT INTO `towary_magazyn` (`id`, `nazwa`) VALUES(45, 'tuńczyk w puszce');
INSERT INTO `towary_magazyn` (`id`, `nazwa`) VALUES(46, 'zupy w słoikach');

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `uzytkownicy`
--

CREATE TABLE `uzytkownicy` (
  `user_id` int(11) NOT NULL,
  `user_name` varchar(10) COLLATE utf8_polish_ci NOT NULL,
  `user_password` varchar(100) COLLATE utf8_polish_ci NOT NULL,
  `description` varchar(200) COLLATE utf8_polish_ci NOT NULL,
  `data` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_polish_ci;

--
-- Zrzut danych tabeli `uzytkownicy`
--

INSERT INTO `uzytkownicy` (`user_id`, `user_name`, `user_password`, `description`, `data`) VALUES(1, 'test', '$2y$10$sfSKfsq93GuewOc66NloGe33kwDms040zyGS3adtFFg0GTxbyuYE.', '', '2022-03-21 01:01:04');

--
-- Indeksy dla zrzutów tabel
--

--
-- Indeksy dla tabeli `counter`
--
ALTER TABLE `counter`
  ADD PRIMARY KEY (`data`);

--
-- Indeksy dla tabeli `kategorie__glowne`
--
ALTER TABLE `kategorie__glowne`
  ADD PRIMARY KEY (`id`);

--
-- Indeksy dla tabeli `kategorie__podkategorie`
--
ALTER TABLE `kategorie__podkategorie`
  ADD PRIMARY KEY (`id`);

--
-- Indeksy dla tabeli `settings`
--
ALTER TABLE `settings`
  ADD PRIMARY KEY (`id`);

--
-- Indeksy dla tabeli `towary`
--
ALTER TABLE `towary`
  ADD PRIMARY KEY (`id`);

--
-- Indeksy dla tabeli `towary_magazyn`
--
ALTER TABLE `towary_magazyn`
  ADD PRIMARY KEY (`id`);

--
-- Indeksy dla tabeli `uzytkownicy`
--
ALTER TABLE `uzytkownicy`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT dla zrzuconych tabel
--

--
-- AUTO_INCREMENT dla tabeli `kategorie__glowne`
--
ALTER TABLE `kategorie__glowne`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT dla tabeli `kategorie__podkategorie`
--
ALTER TABLE `kategorie__podkategorie`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- AUTO_INCREMENT dla tabeli `settings`
--
ALTER TABLE `settings`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT dla tabeli `towary`
--
ALTER TABLE `towary`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=61;

--
-- AUTO_INCREMENT dla tabeli `towary_magazyn`
--
ALTER TABLE `towary_magazyn`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=47;

--
-- AUTO_INCREMENT dla tabeli `uzytkownicy`
--
ALTER TABLE `uzytkownicy`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
