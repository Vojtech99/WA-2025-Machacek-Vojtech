-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Počítač: 127.0.0.1
-- Vytvořeno: Ned 08. čen 2025, 20:39
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
-- Databáze: `wa_2025_vm_02`
--

-- --------------------------------------------------------

--
-- Struktura tabulky `games`
--

CREATE TABLE `games` (
  `id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `developer` varchar(255) NOT NULL,
  `genre` varchar(100) DEFAULT NULL,
  `platform` varchar(100) DEFAULT NULL,
  `year` int(11) NOT NULL,
  `price` decimal(10,2) NOT NULL,
  `pegi` varchar(10) NOT NULL,
  `description` text DEFAULT NULL,
  `link` varchar(255) DEFAULT NULL,
  `images` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin DEFAULT NULL CHECK (json_valid(`images`)),
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `user_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Vypisuji data pro tabulku `games`
--

INSERT INTO `games` (`id`, `title`, `developer`, `genre`, `platform`, `year`, `price`, `pegi`, `description`, `link`, `images`, `created_at`, `updated_at`, `user_id`) VALUES
(2, 'Minecraft', 'Mojang Studios', 'Sandbox', 'PC, PS4, Switch', 2011, 599.00, '7+', 'Kreativní hra o stavění a přežití v kostičkovém světě.', 'https://www.minecraft.net', '[]', '2025-05-31 14:07:22', '2025-05-31 14:07:22', 1),
(3, 'Elden Ring', 'FromSoftware', 'Action RPG', 'PC, PS5, Xbox Series', 2022, 1499.00, '5', 'Temný fantasy svět, těžké souboje, otevřený svět.', 'https://en.bandainamcoent.eu/elden-ring', '[]', '2025-05-31 14:07:22', '2025-06-08 14:43:39', 1),
(4, 'Stardew Valley', 'ConcernedApe', 'Simulation', 'PC, Switch, PS4', 2016, 349.00, '7+', 'Zemědělství, vztahy a relax v pixelovém stylu.', 'https://www.stardewvalley.net', '[]', '2025-05-31 14:07:22', '2025-05-31 14:07:22', 1),
(5, 'DOOM Eternal', 'id Software', 'FPS', 'PC, PS4, Xbox', 2020, 1099.00, '18+', 'Intenzivní střílečka proti démonům z pekla.', 'https://slayersclub.bethesda.net', '[]', '2025-05-31 14:07:22', '2025-05-31 14:07:22', 1),
(6, 'Animal Crossing: New Horizons', 'Nintendo', 'Simulation', 'Switch', 2020, 1399.00, '3+', 'Klidný život na ostrově plném roztomilých zvířátek.', 'https://www.animal-crossing.com', '[]', '2025-05-31 14:07:22', '2025-05-31 14:07:22', 1),
(7, 'Cyberpunk 2077', 'CD Projekt RED', 'RPG', 'PC, PS5, Xbox', 2020, 699.00, '18+', 'Futuristické město, příběh, volby, přestřelky.', 'https://www.cyberpunk.net', '[]', '2025-05-31 14:07:22', '2025-05-31 14:07:22', 1),
(8, 'Hades', 'Supergiant Games', 'Roguelike', 'PC, Switch, PS5', 2020, 499.00, '12+', 'Rychlá akční hra s řeckou mytologií a opakováním.', 'https://www.supergiantgames.com', '[]', '2025-05-31 14:07:22', '2025-05-31 14:07:22', 1),
(9, 'God of War Ragnarok', 'Santa Monica Studio', 'Action', 'PS5, PS4', 2022, 1799.00, '18+', 'Kratos a Atreus čelí severským bohům.', 'https://www.playstation.com/god-of-war', '[]', '2025-05-31 14:07:22', '2025-05-31 14:07:22', 1),
(10, 'League of Legends', 'Riot Games', 'MOBA', 'PC', 2009, 0.00, '12+', 'Týmová strategie v aréně – populární online hra.', 'https://www.leagueoflegends.com', '[]', '2025-05-31 14:07:22', '2025-05-31 14:07:22', 1);

--
-- Indexy pro exportované tabulky
--

--
-- Indexy pro tabulku `games`
--
ALTER TABLE `games`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`);

--
-- AUTO_INCREMENT pro tabulky
--

--
-- AUTO_INCREMENT pro tabulku `games`
--
ALTER TABLE `games`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
