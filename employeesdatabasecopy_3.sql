-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Počítač: 127.0.0.1:3307
-- Vytvořeno: Čtv 27. dub 2023, 21:09
-- Verze serveru: 10.10.2-MariaDB
-- Verze PHP: 8.0.26

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Databáze: `employeesdatabasecopy_3`
--

-- --------------------------------------------------------

--
-- Struktura tabulky `departments`
--

DROP TABLE IF EXISTS `departments`;
CREATE TABLE IF NOT EXISTS `departments` (
  `id` int(6) UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(50) NOT NULL,
  `nameShortcut` varchar(10) NOT NULL,
  `city` varchar(50) NOT NULL,
  `color` varchar(7) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=22 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Vypisuji data pro tabulku `departments`
--

INSERT INTO `departments` (`id`, `name`, `nameShortcut`, `city`, `color`) VALUES
(17, 'OddÄ›lenÃ­ marketingu', 'MKT', 'Ostrava', '#24b23c'),
(18, 'OddÄ›lenÃ­ prodeje', 'PROD', 'Liberec', '#2c808c'),
(19, 'OddÄ›lenÃ­ financÃ­', 'FIN', 'Praha', '#c535d0'),
(20, 'OddÄ›lenÃ­ IT', 'IT', 'Brno', '#3ba8b0'),
(21, 'OddÄ›lenÃ­ kvality', 'KVA', 'Olomouc', '#fff700');

-- --------------------------------------------------------

--
-- Struktura tabulky `employees`
--

DROP TABLE IF EXISTS `employees`;
CREATE TABLE IF NOT EXISTS `employees` (
  `id` int(6) UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(30) NOT NULL,
  `surname` varchar(30) NOT NULL,
  `password` varchar(60) NOT NULL,
  `email` varchar(50) NOT NULL,
  `department_id` int(6) UNSIGNED NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `email` (`email`),
  KEY `fk_employee_department` (`department_id`)
) ENGINE=InnoDB AUTO_INCREMENT=23 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Vypisuji data pro tabulku `employees`
--

INSERT INTO `employees` (`id`, `name`, `surname`, `password`, `email`, `department_id`) VALUES
(16, 'TomÃ¡Å¡', 'NovÃ¡k', '$2y$10$rn2zrbL3I4.6TpE0RS20puhmG1xnnVJZJGCW11eJaREoUwUiYNO9W', 'tomas.novak@seznam.cz', 18),
(17, 'Petra ', 'KratochvÃ­lovÃ¡', '$2y$10$bykeHe4B2tHqC9g.8YXDkOAJ6OgOFfHHt1BKoCAiYCSgAEg.lMFs.', 'petra.kratochvilova@seznam.cz', 17),
(18, 'Ahoj', 'POkornÃ½', '$2y$10$VXhy0qJq7emf8kt79b74G.KBMkJQD512Es99nVOH5iQadECFy7Y/W', 'ahoj@kurva.de', 19),
(19, 'AdÃ©la ', 'SÃ½korovÃ¡', '$2y$10$SJWphJYyaepliThIxo6ERuOFwmoFmMo54dwe2YCQvolEJRSbAVCpS', 'adela.sykora@seznam.cz', 18),
(20, 'Jan', 'Å tÄ›pÃ¡nek', '$2y$10$IQEzsAaqIf/fKPqDYGTt5.bvKf2T./FqLBTeABJj410mCHrlWEqcm', 'jan.stepanek@seznam.cz', 20),
(21, 'Barbora ', 'BÃ­lkovÃ¡', '$2y$10$mt66iET.gT9u5UkN9quQy.VeONBqCcPyWhC7oeFLnIZ2Cx68ijuge', 'barbora.bilkova@seznam.cz', 19),
(22, 'Ondra', 'NovotnÃ½', '$2y$10$K9a7WXssxD.knxzhxEwXhelNUINNjz4X6NG2FK1BpjGIwua9PZBly', 'marek.novotny@seznam.cz', 21);

--
-- Omezení pro exportované tabulky
--

--
-- Omezení pro tabulku `employees`
--
ALTER TABLE `employees`
  ADD CONSTRAINT `fk_employee_department` FOREIGN KEY (`department_id`) REFERENCES `departments` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
