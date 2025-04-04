-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Počítač: 127.0.0.1
-- Vytvořeno: Čtv 13. bře 2025, 15:25
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
-- Databáze: `wa_machacek_vojtech`
--

-- --------------------------------------------------------

--
-- Struktura tabulky `wa_test`
--

CREATE TABLE `wa_test` (
  `id` int(11) NOT NULL,
  `user_name` varchar(50) NOT NULL,
  `user_surname` varchar(50) NOT NULL,
  `user_email` varchar(100) NOT NULL,
  `user_age` int(11) DEFAULT NULL,
  `registration_date` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Vypisuji data pro tabulku `wa_test`
--

INSERT INTO `wa_test` (`id`, `user_name`, `user_surname`, `user_email`, `user_age`, `registration_date`) VALUES
(1, 'Petr', 'Novák', 'novak@example.cz', 26, '2025-03-13 14:21:51'),
(2, 'Jana', 'Pokorná', 'pokorna@example.cz', 32, '2025-03-13 14:21:51'),
(3, 'Josef', 'Nový', 'novy@example.cz', 48, '2025-03-13 14:21:51'),
(4, 'Kateřina', 'Stránská', 'stranska@example.cz', 31, '2025-03-13 14:21:51');

--
-- Indexy pro exportované tabulky
--

--
-- Indexy pro tabulku `wa_test`
--
ALTER TABLE `wa_test`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `user_email` (`user_email`);

--
-- AUTO_INCREMENT pro tabulky
--

--
-- AUTO_INCREMENT pro tabulku `wa_test`
--
ALTER TABLE `wa_test`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
