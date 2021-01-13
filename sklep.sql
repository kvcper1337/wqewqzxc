-- phpMyAdmin SQL Dump
-- version 4.7.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Czas generowania: 13 Sty 2021, 14:05
-- Wersja serwera: 5.7.17
-- Wersja PHP: 5.6.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Baza danych: `sklep`
--

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `product`
--

CREATE TABLE `product` (
  `id` int(11) NOT NULL,
  `brand` varchar(255) CHARACTER SET utf32 NOT NULL,
  `name` varchar(255) CHARACTER SET utf8 NOT NULL,
  `price` double(10,2) NOT NULL,
  `image` varchar(255) CHARACTER SET utf8mb4 NOT NULL,
  `date` date DEFAULT NULL,
  `status` enum('1','0') CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL DEFAULT '1' COMMENT '1=Active | 0=Inactive'
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Zrzut danych tabeli `product`
--

INSERT INTO `product` (`id`, `brand`, `name`, `price`, `image`, `date`, `status`) VALUES
(1, 'Dior', 'Kardigan Dior WMN', 149.99, 'images/x/product1.jpg', '2021-01-03', '1'),
(2, 'Dior', 'Sunglasses M', 239.00, 'images/x/product2.jpg', NULL, '1'),
(3, 'GUCCI', 'sukienka', 739.99, 'images/x/product3.jpg', '2021-01-03', '1'),
(4, 'GUCCI', 'sukienka2', 590.99, 'images/x/product4.jpg', '2021-01-04', '1'),
(5, 'Nike', 'PULLOVER', 239.00, 'images/x/product5.jpg', '2021-01-03', '1'),
(10, 'basic', 'basic tshirt grey', 29.99, 'images/x/product10.jpg', NULL, '1'),
(8, 'ARMANi', 'sukienka balowa', 129.99, 'images/x/product8.jpg', '2021-01-12', '1'),
(6, 'UA', 't-shirt bialy white', 45.99, 'images/x/product6.jpg', '2021-01-07', '1'),
(7, 'DIOR', 'sukienka balowa', 1000.00, 'images/x/product7.jpg', '2021-01-03', '1'),
(9, 'LEE', 'sukienka chinska', 249.99, 'images/x/product9.jpg', '2021-01-03', '1');

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `username` varchar(50) CHARACTER SET utf8mb4 NOT NULL,
  `password` varchar(150) CHARACTER SET utf8mb4 NOT NULL,
  `firstname` varchar(128) NOT NULL,
  `lastname` varchar(128) NOT NULL,
  `email` varchar(255) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Zrzut danych tabeli `user`
--

INSERT INTO `user` (`id`, `username`, `password`, `firstname`, `lastname`, `email`) VALUES
(19, 'admin', '21232f297a57a5a743894a0e4a801fc3', 'admin', 'admin', 'admin@admin.admin');

--
-- Indeksy dla zrzutów tabel
--

--
-- Indexes for table `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT dla tabeli `product`
--
ALTER TABLE `product`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;
--
-- AUTO_INCREMENT dla tabeli `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
