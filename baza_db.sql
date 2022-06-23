-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Czas generowania: 28 Sty 2022, 16:53
-- Wersja serwera: 10.4.18-MariaDB
-- Wersja PHP: 8.0.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Baza danych: `baza_db`
--

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `adresy`
--

CREATE TABLE `adresy` (
  `id_adres` int(11) NOT NULL,
  `miasto` varchar(15) NOT NULL,
  `miejscowosc` varchar(15) NOT NULL,
  `wojewodztwo` varchar(15) NOT NULL,
  `kod_pocztowy` varchar(6) NOT NULL,
  `ulica` varchar(30) NOT NULL,
  `nr_domu` varchar(5) NOT NULL,
  `nr_lokalu` varchar(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Zrzut danych tabeli `adresy`
--

INSERT INTO `adresy` (`id_adres`, `miasto`, `miejscowosc`, `wojewodztwo`, `kod_pocztowy`, `ulica`, `nr_domu`, `nr_lokalu`) VALUES
(1, 'Lodz', 'Lodz', 'lodzkie', '91-123', 'Mlynarska', '123a', '11'),
(2, 'Krakow', 'Krakow', 'malopolskie', '21-123', 'Manny', '23a', '41'),
(3, 'Gdansk', 'Gdansk', 'pomorskie', '11-423', 'Krakowska', '1a', '51'),
(4, 'Wroclaw', 'Wroclaw', 'dolnoslaskie', '11-523', 'Zielona', '13b', '51'),
(5, 'Warszawa', 'Warszawa', 'mazowieckie', '54-133', 'Czerwonego grzyba', '3b', '5');

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `dostawa`
--

CREATE TABLE `dostawa` (
  `id_dostawa` int(11) NOT NULL,
  `sposob_dostawy` char(40) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Zrzut danych tabeli `dostawa`
--

INSERT INTO `dostawa` (`id_dostawa`, `sposob_dostawy`) VALUES
(1, 'Kurier - Poczta Polska'),
(2, 'Kurier - dhl');

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `egzemplarze`
--

CREATE TABLE `egzemplarze` (
  `id_egzemplarz` int(11) NOT NULL,
  `id_produkt` int(11) NOT NULL,
  `kod_produktu` varchar(30) NOT NULL,
  `cena` decimal(10,0) NOT NULL,
  `data_zakupu` datetime DEFAULT NULL,
  `czy_sprzedano` bit(1) DEFAULT NULL,
  `data_sprzedazy` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Zrzut danych tabeli `egzemplarze`
--

INSERT INTO `egzemplarze` (`id_egzemplarz`, `id_produkt`, `kod_produktu`, `cena`, `data_zakupu`, `czy_sprzedano`, `data_sprzedazy`) VALUES
(1, 1, '1111', '1100', '2020-05-12 00:00:00', b'1', '2020-06-01 00:00:00'),
(2, 2, '2111', '600', '2020-02-01 00:00:00', b'1', '2020-03-01 00:00:00'),
(3, 3, '3111', '500', '2020-05-12 00:00:00', NULL, NULL),
(4, 4, '4111', '300', '2020-03-16 00:00:00', NULL, NULL),
(5, 5, '5111', '900', '2020-08-22 00:00:00', b'1', '2020-10-01 00:00:00');

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `faktury`
--

CREATE TABLE `faktury` (
  `id_faktura` int(11) NOT NULL,
  `id_klient` int(11) NOT NULL,
  `nr_faktura` int(11) DEFAULT NULL,
  `data_sprzedazy` datetime DEFAULT NULL,
  `wartosc` decimal(10,0) DEFAULT NULL,
  `nazwa_banku` varchar(20) DEFAULT NULL,
  `forma_platnosci` varchar(30) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Zrzut danych tabeli `faktury`
--

INSERT INTO `faktury` (`id_faktura`, `id_klient`, `nr_faktura`, `data_sprzedazy`, `wartosc`, `nazwa_banku`, `forma_platnosci`) VALUES
(1, 1, 1, '2020-04-02 00:00:00', '1110', 'PKO BANK SA', 'Przelew tradycyjny'),
(2, 2, 2, '2020-01-05 00:00:00', '560', 'Millenium', 'Przelew tradycyjny'),
(3, 3, 3, '2020-05-03 00:00:00', '1560', 'Santander SA', 'Przelew tradycyjny');

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `forma_platnosci`
--

CREATE TABLE `forma_platnosci` (
  `id_forma_platnosci` int(11) NOT NULL,
  `forma_platnosci` char(40) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Zrzut danych tabeli `forma_platnosci`
--

INSERT INTO `forma_platnosci` (`id_forma_platnosci`, `forma_platnosci`) VALUES
(1, 'Gotowka'),
(2, 'Przelew'),
(3, 'Blik');

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `historia`
--

CREATE TABLE `historia` (
  `id_historia` int(11) NOT NULL,
  `id_klient` int(11) NOT NULL,
  `id_produktow` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Zrzut danych tabeli `historia`
--

INSERT INTO `historia` (`id_historia`, `id_klient`, `id_produktow`) VALUES
(12, 1, '8 9 2');

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `kategorie`
--

CREATE TABLE `kategorie` (
  `id_kategoria` int(11) NOT NULL,
  `id_producent` int(11) NOT NULL,
  `nazwa_kategorii` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Zrzut danych tabeli `kategorie`
--

INSERT INTO `kategorie` (`id_kategoria`, `id_producent`, `nazwa_kategorii`) VALUES
(1, 1, 'Karty graficzne'),
(2, 2, 'Plyty glowne'),
(3, 1, 'Zasilacze'),
(4, 2, 'Pamieci RAM'),
(5, 2, 'Procesory'),
(6, 2, 'Sluchawki'),
(7, 1, 'Dyski SSD'),
(8, 1, 'Klawiatury');

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `klienci`
--

CREATE TABLE `klienci` (
  `id_klient` int(11) NOT NULL,
  `id_adres` int(11) NOT NULL,
  `id_kontakt` int(11) NOT NULL,
  `k_login` text NOT NULL,
  `k_haslo` binary(32) NOT NULL,
  `k_nazwisko` text NOT NULL,
  `k_imie` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Zrzut danych tabeli `klienci`
--

INSERT INTO `klienci` (`id_klient`, `id_adres`, `id_kontakt`, `k_login`, `k_haslo`, `k_nazwisko`, `k_imie`) VALUES
(1, 1, 1, 'jozek123', 0x3064386435386535306233396639656462623432393364643433326231663332, 'Karolczak', 'Jozef'),
(2, 2, 2, 'narek323', 0x3536643837363635613337643864643265663130646563363136373733306365, 'Marek', 'Jozefowicz'),
(3, 3, 3, '42dfg', 0x6435646131393731653538313865646230643637656230313830363764353630, 'Michal', 'Karolczak');

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `kontakty`
--

CREATE TABLE `kontakty` (
  `id_kontakt` int(11) NOT NULL,
  `nr_tel` varchar(20) NOT NULL,
  `fax` varchar(30) DEFAULT NULL,
  `email` varchar(25) NOT NULL,
  `www` varchar(60) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Zrzut danych tabeli `kontakty`
--

INSERT INTO `kontakty` (`id_kontakt`, `nr_tel`, `fax`, `email`, `www`) VALUES
(1, '+34 132-542-453', NULL, 'malpa12@gmail.com', NULL),
(2, '+42 542-234-653', '(22)5887883', '123545gg3@gmail.com', 'www.hello.pl'),
(3, '+36 132-565-453', '(54)7655844', 'pa63@gmail.com', NULL),
(4, '+64 642-547-443', NULL, 'dsf123@gmail.com', NULL),
(5, '+24 137-642-113', NULL, 'zyrfa23@gmail.com', 'www.fdsf.com');

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `pracownicy`
--

CREATE TABLE `pracownicy` (
  `id_pracownik` int(11) NOT NULL,
  `id_adres` int(11) NOT NULL,
  `id_kontakt` int(11) NOT NULL,
  `p_login` text NOT NULL,
  `p_haslo` binary(32) NOT NULL,
  `p_imie` text NOT NULL,
  `p_nazwisko` text NOT NULL,
  `uprawnienia` varchar(10) NOT NULL,
  `konto_aktywne` bit(1) NOT NULL,
  `data_zatrudnienia` datetime NOT NULL,
  `data_zwolnienia` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Zrzut danych tabeli `pracownicy`
--

INSERT INTO `pracownicy` (`id_pracownik`, `id_adres`, `id_kontakt`, `p_login`, `p_haslo`, `p_imie`, `p_nazwisko`, `uprawnienia`, `konto_aktywne`, `data_zatrudnienia`, `data_zwolnienia`) VALUES
(4, 4, 4, '1242df', 0x3831646339626462353264303464633230303336646264383331336564303535, 'Filip', 'Dupski', 'admin', b'1', '2019-03-12 00:00:00', NULL),
(5, 5, 5, '242as', 0x3862383234346262303432343363623361366663386466363637633637663962, 'Szymon', 'Ogorski', 'admin2', b'1', '2019-07-12 00:00:00', NULL);

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `producenci`
--

CREATE TABLE `producenci` (
  `id_producent` int(11) NOT NULL,
  `nazwa_producenta` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Zrzut danych tabeli `producenci`
--

INSERT INTO `producenci` (`id_producent`, `nazwa_producenta`) VALUES
(1, 'GE FORCE'),
(2, 'MSI');

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `produkty`
--

CREATE TABLE `produkty` (
  `id_produkt` int(11) NOT NULL,
  `id_kategoria` int(11) NOT NULL,
  `nazwa_produktu` varchar(25) NOT NULL,
  `opis` text NOT NULL,
  `fotografia` text NOT NULL,
  `cena` decimal(10,0) NOT NULL,
  `kategoria` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Zrzut danych tabeli `produkty`
--

INSERT INTO `produkty` (`id_produkt`, `id_kategoria`, `nazwa_produktu`, `opis`, `fotografia`, `cena`, `kategoria`) VALUES
(1, 6, 'Xiaomi Mi True Wireless', 'Maximum working time: 5 h\r\nVolume control: No\r\nMemory card slot: No\r\nBuilt-in microphone: Yes\r\nRange: 10 m\r\nType of transmission: Bluetooth\r\nThe Xiaomi Mi True Wireless Earphones 2 Basic headphones are an excellent choice for every music lover who requires excellent sound quality, mobility and everyday comfort.', 'images/xiaomi_mi_true.jpg', '25', 'Earphones'),
(2, 5, 'MSI GTX 1660 VENTUS', 'Card length: 204 mm\r\nAmount of RAM: 6 GB\r\nChipset type: GeForce GTX 1660\r\nCore clock in boost mode: 1830 MHz\r\nCombining cards: No\r\nConnector type: PCI Express 3.0 x16\r\nIf you want to reach for the latest gaming productions, it is worth having a graphic layout of this kind. The NVIDIA GTX 1660 card is based on the modern Turing architecture, which ensures its higher performance in games, graphics design, and multimedia use and processing. The GTX 1660 card is a solution dedicated to players, streamers and people dealing with multimedia processing.', 'images/gtx_1660.jpg', '700', 'GPU'),
(3, 5, 'Intel Core i5-11400', 'Producer: Intel\r\nLine: Core i5\r\nSocket type: Socket 1200 (Rocket Lake)\r\nNumber of core: 6\r\nNumber of threads: 12\r\nProcessor clock frequency [GHz]: 2.6\r\nReliable, stable and extremely fast in operation - the i5-11400 processor, BX8070811400 was created for professional use, at home, in the office and wherever there is a need to perform several engaging processes simultaneously. Power, quality and pace of operation - check how much the representative of the 11th generation of i5 processors has to offer!', 'images/intel_i5_11.jpg', '215', 'CPU'),
(4, 2, 'MSI MPG Z490 GAMING', 'Board Chipset: Intel Z490\r\nProcessor Socket: Socket 1200\r\nNumber of memory slots: 4\r\nCordless operation: No\r\nMotherboard standard: ATX\r\nMemory standard: DDR4\r\nMPG series motherboards bring out the best in games by enabling full color expression with advanced RGB lighting control and synchronization. Experiment on a new, higher level of personalization using the front LED backlight strip, which allows you to conveniently display notifications and game status in real time. With the MPG Series, you can turn your gear into an information center and stylish scoreboard.', 'images/msi_z490.jpg', '215', 'Motherboard'),
(5, 5, 'AMD Ryzen 7 5800X', 'Producer: AMD\r\nLine: Ryzen 7\r\nSocket type: Socket AM4\r\nNumber of core: 8\r\nNumber of threads: 16\r\nProcessor clock frequency [GHz]: 3.8\r\nThe latest AMD processor based on Zen 3 architecture. Unrivaled among 8-core processors in both games and professional applications.', 'images/amd_ryzen7.jpg', '447', 'CPU'),
(6, 8, 'iBOX Aurora K-6', 'Interface: USB and Bluetooth\r\nBacklight: RGB\r\nType of switches: KRGD Red Switch\r\nKeyboard type: Mechanical\r\nKeyboard Layout: American (US)\r\nThe color of the switches: Red\r\nAre you looking for a low pitch keyboard? Are you looking for a mechanical keyboard? Are you looking for a keyboard that will allow you to work both wired and wireless? If so then Aurora K-6 is for you! The keyboard has a beautiful LED backlight. The illuminated keys are grouped into blocks marked with colors, which makes the work much easier. There are as many as 20 different lighting effects. It is the perfect product for every lover of unconventional solutions.', 'images/ibox_k6.jpg', '67', 'Keyboard'),
(7, 1, 'GeForce RTX 3060', 'Card length: 240 mm\r\nAmount of RAM: 12 GB\r\nChipset manufacturer: NVIDIA\r\nChipset type: GeForce RTX 3060\r\nCore clock in boost mode: 1792 MHz\r\nCombining cards: No\r\nForget about annoying screen stuttering while playing your best productions or freezing while working in advanced graphics programs. The Inno3D graphics card is not only a few times greater performance and energy efficiency, but also a guarantee of unique quality and smoothness of the displayed image. Enjoy undisturbed duel and compete with the best rivals in the world. With 12 GB of GDDR6 memory, you can do much more!', 'images/rtx_3060.jpg', '951', 'GPU'),
(8, 8, 'iBOX Aurora K-5', 'Producer: iBOX\r\nInterface: USB\r\nBacklight: RGB\r\nType of switches: KRGD Red Switch\r\nKeyboard type: Mechanical\r\nKeyboard Layout: American (US)\r\nAre you looking for a keyboard that glows in an inconspicuous way? Try Aurora K-5! Thanks to the Crystal Axis Switch switches and the illuminated side line and the illuminated wrist rest, it looks unique. The red switches used in it with a long lifespan of up to 60 million presses will be perfect for every game. The keyboard has a magnetically attached wrist rest, which reduces hand fatigue during long-term gameplay. It is the perfect product for any advanced gamer. The possibility of blocking the Win + L combination will prevent accidental blocking of the computer at the least appropriate moment during the game.', 'images/ibox_k5.jpg', '50', 'Keyboard'),
(9, 5, 'Intel Core i5-10400F', 'Producer: Intel\r\nLine: Core i5\r\nSocket type: Socket 1200 (Rocket Lake)\r\nNumber of core: 6\r\nNumber of threads: 12\r\nProcessor clock frequency [GHz]: 2.9\r\nThe Intel Core i5-10400F processor, based on the new Comet Lake architecture, was created with gamers in mind, so it is equipped with 6 cores and 12 logical threads, thanks to which you will not run out of computing power in the middle of the game. A single core is clocked at 2.9 GHz, which is enough for most applications. However, if you run out of power, the manufacturer offers the proprietary Intel Turbo Boost 2.0 solution, which automatically increases the processor clock frequency to 4.3 GHz, so that you will always have enough power. The introduction of 12 MB of L3 cache along with the new Intel Smart Cache technology will improve work with frequently used programs or applications. The air cooler included in the set will also help to maintain adequate performance, which effectively cools the processor, allowing it to work at the highest speed.', 'images/intel_i5_10.jpg', '162', 'CPU'),
(10, 3, 'SilentiumPC Vero L3', 'Producer: SilentiumPC\r\nStandard/Format: ATX\r\nPower [W]: 500W\r\nEfficiency: 89%\r\nFan diameter: 120 mm\r\nCooling type: active - fan\r\nATX Vero L3 500 W is a very high efficiency, confirmed by the 80 PLUS® Bronze 230V certificate, modern and efficient DC-DC converters, an extremely strong single +12 V line, very quiet operation in a large load range and a very low price.', 'images/silentiumpc_vero.jpg', '53', 'Power supply'),
(11, 4, 'Corsair Vengeance', 'Producer: Corsair\r\nLine: Vengeance RGB PRO\r\nConnector type: DIMM\r\nMemory type: DDR4\r\nTotal capacity: 16 GB\r\nWorking frequency [MHz]: 3200\r\nMulti-zone RGB lighting RAMs that can be synchronized with other Corsair products using the iCUE software.', 'images/corsair_vengeance.jpg', '98', 'RAM'),
(12, 7, 'Crucial MX500', 'Producer: Crucial\r\nModel: MX500\r\nDisk capacity: 500 GB\r\nInterface: SATA III\r\nReading speed: 560 MB/s\r\nWrite speed: 510 MB/s\r\nBoot up your system in seconds, load files instantly and speed up the most demanding applications with the Crucial MX500.', 'images/ssd_crucial.jpg', '64', 'SSD drive');

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `status_zamowienia`
--

CREATE TABLE `status_zamowienia` (
  `id_status_zamowienia` int(11) NOT NULL,
  `status_zamowienia` char(40) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Zrzut danych tabeli `status_zamowienia`
--

INSERT INTO `status_zamowienia` (`id_status_zamowienia`, `status_zamowienia`) VALUES
(1, 'nowe'),
(2, 'zrealizowane');

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `zamowienia`
--

CREATE TABLE `zamowienia` (
  `id_zamowienia` int(11) NOT NULL,
  `id_klient` int(11) NOT NULL,
  `id_produkt` int(11) NOT NULL,
  `id_status_zamowienia` int(11) NOT NULL,
  `id_dostawa` int(11) NOT NULL,
  `id_forma_platnosci` int(11) NOT NULL,
  `data_zlozenia_zamowienia` datetime NOT NULL,
  `czy_przyjeto_zamowienie` bit(1) NOT NULL,
  `data_przyjecia_zamowienia` datetime DEFAULT NULL,
  `zaplacono` bit(1) DEFAULT NULL,
  `data_wysylki` datetime DEFAULT NULL,
  `czy_zamowienie_zrealizowano` bit(1) DEFAULT NULL,
  `data_realizacji_zamowienia` datetime DEFAULT NULL,
  `forma_platnosci` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Zrzut danych tabeli `zamowienia`
--

INSERT INTO `zamowienia` (`id_zamowienia`, `id_klient`, `id_produkt`, `id_status_zamowienia`, `id_dostawa`, `id_forma_platnosci`, `data_zlozenia_zamowienia`, `czy_przyjeto_zamowienie`, `data_przyjecia_zamowienia`, `zaplacono`, `data_wysylki`, `czy_zamowienie_zrealizowano`, `data_realizacji_zamowienia`, `forma_platnosci`) VALUES
(1, 1, 1, 1, 1, 1, '2020-01-11 00:00:00', b'1', '2020-01-20 00:00:00', b'1', '2020-01-31 00:00:00', b'0', NULL, NULL),
(2, 2, 2, 2, 2, 2, '2020-06-21 00:00:00', b'1', '2020-06-30 00:00:00', b'1', '2020-01-31 00:00:00', b'1', '2020-02-02 00:00:00', 'Przelew'),
(3, 3, 3, 1, 2, 3, '2020-05-13 00:00:00', b'1', '2020-05-22 00:00:00', b'1', '2020-01-31 00:00:00', b'1', '2020-02-12 00:00:00', 'Blik'),
(4, 1, 4, 1, 2, 1, '2020-05-16 00:00:00', b'1', '2020-06-20 00:00:00', b'0', NULL, NULL, NULL, NULL),
(5, 2, 5, 2, 1, 2, '2020-03-12 00:00:00', b'1', '2020-05-20 00:00:00', b'1', '2020-01-31 00:00:00', b'0', NULL, NULL);

--
-- Indeksy dla zrzutów tabel
--

--
-- Indeksy dla tabeli `adresy`
--
ALTER TABLE `adresy`
  ADD PRIMARY KEY (`id_adres`);

--
-- Indeksy dla tabeli `dostawa`
--
ALTER TABLE `dostawa`
  ADD PRIMARY KEY (`id_dostawa`);

--
-- Indeksy dla tabeli `egzemplarze`
--
ALTER TABLE `egzemplarze`
  ADD PRIMARY KEY (`id_egzemplarz`),
  ADD KEY `egzemplarze_fk0` (`id_produkt`);

--
-- Indeksy dla tabeli `faktury`
--
ALTER TABLE `faktury`
  ADD PRIMARY KEY (`id_faktura`),
  ADD KEY `faktury_fk0` (`id_klient`);

--
-- Indeksy dla tabeli `forma_platnosci`
--
ALTER TABLE `forma_platnosci`
  ADD PRIMARY KEY (`id_forma_platnosci`);

--
-- Indeksy dla tabeli `historia`
--
ALTER TABLE `historia`
  ADD PRIMARY KEY (`id_historia`);

--
-- Indeksy dla tabeli `kategorie`
--
ALTER TABLE `kategorie`
  ADD PRIMARY KEY (`id_kategoria`),
  ADD KEY `kategorie_fk0` (`id_producent`);

--
-- Indeksy dla tabeli `klienci`
--
ALTER TABLE `klienci`
  ADD PRIMARY KEY (`id_klient`),
  ADD KEY `klienci_fk0` (`id_adres`),
  ADD KEY `klienci_fk1` (`id_kontakt`);

--
-- Indeksy dla tabeli `kontakty`
--
ALTER TABLE `kontakty`
  ADD PRIMARY KEY (`id_kontakt`);

--
-- Indeksy dla tabeli `pracownicy`
--
ALTER TABLE `pracownicy`
  ADD PRIMARY KEY (`id_pracownik`),
  ADD KEY `pracownicy_fk0` (`id_adres`),
  ADD KEY `pracownicy_fk1` (`id_kontakt`);

--
-- Indeksy dla tabeli `producenci`
--
ALTER TABLE `producenci`
  ADD PRIMARY KEY (`id_producent`);

--
-- Indeksy dla tabeli `produkty`
--
ALTER TABLE `produkty`
  ADD PRIMARY KEY (`id_produkt`),
  ADD KEY `produkty_fk0` (`id_kategoria`);

--
-- Indeksy dla tabeli `status_zamowienia`
--
ALTER TABLE `status_zamowienia`
  ADD PRIMARY KEY (`id_status_zamowienia`);

--
-- Indeksy dla tabeli `zamowienia`
--
ALTER TABLE `zamowienia`
  ADD PRIMARY KEY (`id_zamowienia`),
  ADD KEY `zamowienia_fk0` (`id_klient`),
  ADD KEY `zamowienia_fk1` (`id_produkt`),
  ADD KEY `zamowienia_fk2` (`id_status_zamowienia`),
  ADD KEY `zamowienia_fk3` (`id_dostawa`),
  ADD KEY `zamowienia_fk4` (`id_forma_platnosci`);

--
-- AUTO_INCREMENT dla zrzuconych tabel
--

--
-- AUTO_INCREMENT dla tabeli `historia`
--
ALTER TABLE `historia`
  MODIFY `id_historia` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- Ograniczenia dla zrzutów tabel
--

--
-- Ograniczenia dla tabeli `egzemplarze`
--
ALTER TABLE `egzemplarze`
  ADD CONSTRAINT `egzemplarze_fk0` FOREIGN KEY (`id_produkt`) REFERENCES `produkty` (`id_produkt`);

--
-- Ograniczenia dla tabeli `faktury`
--
ALTER TABLE `faktury`
  ADD CONSTRAINT `faktury_fk0` FOREIGN KEY (`id_klient`) REFERENCES `klienci` (`id_klient`);

--
-- Ograniczenia dla tabeli `kategorie`
--
ALTER TABLE `kategorie`
  ADD CONSTRAINT `kategorie_fk0` FOREIGN KEY (`id_producent`) REFERENCES `producenci` (`id_producent`);

--
-- Ograniczenia dla tabeli `klienci`
--
ALTER TABLE `klienci`
  ADD CONSTRAINT `klienci_fk0` FOREIGN KEY (`id_adres`) REFERENCES `adresy` (`id_adres`),
  ADD CONSTRAINT `klienci_fk1` FOREIGN KEY (`id_kontakt`) REFERENCES `kontakty` (`id_kontakt`);

--
-- Ograniczenia dla tabeli `pracownicy`
--
ALTER TABLE `pracownicy`
  ADD CONSTRAINT `pracownicy_fk0` FOREIGN KEY (`id_adres`) REFERENCES `adresy` (`id_adres`),
  ADD CONSTRAINT `pracownicy_fk1` FOREIGN KEY (`id_kontakt`) REFERENCES `kontakty` (`id_kontakt`);

--
-- Ograniczenia dla tabeli `produkty`
--
ALTER TABLE `produkty`
  ADD CONSTRAINT `produkty_fk0` FOREIGN KEY (`id_kategoria`) REFERENCES `kategorie` (`id_kategoria`);

--
-- Ograniczenia dla tabeli `zamowienia`
--
ALTER TABLE `zamowienia`
  ADD CONSTRAINT `zamowienia_fk0` FOREIGN KEY (`id_klient`) REFERENCES `klienci` (`id_klient`),
  ADD CONSTRAINT `zamowienia_fk1` FOREIGN KEY (`id_produkt`) REFERENCES `produkty` (`id_produkt`),
  ADD CONSTRAINT `zamowienia_fk2` FOREIGN KEY (`id_status_zamowienia`) REFERENCES `status_zamowienia` (`id_status_zamowienia`),
  ADD CONSTRAINT `zamowienia_fk3` FOREIGN KEY (`id_dostawa`) REFERENCES `dostawa` (`id_dostawa`),
  ADD CONSTRAINT `zamowienia_fk4` FOREIGN KEY (`id_forma_platnosci`) REFERENCES `forma_platnosci` (`id_forma_platnosci`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
