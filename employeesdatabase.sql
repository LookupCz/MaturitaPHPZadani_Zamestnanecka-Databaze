-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Počítač: 127.0.0.1:3307
-- Vytvořeno: Ned 23. dub 2023, 19:37
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
-- Databáze: `employeesdatabase`
--
CREATE DATABASE IF NOT EXISTS `employeesdatabase` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;
USE `employeesdatabase`;

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
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Vypisuji data pro tabulku `departments`
--

INSERT INTO `departments` (`id`, `name`, `nameShortcut`, `city`, `color`) VALUES
(1, 'Oddělení financí', 'FIN', 'Praha', '#FF5733'),
(2, 'Oddělení IT', 'IT', 'Brno', '#3498DB'),
(3, 'Oddělení marketingu', 'MKT', 'Ostrava', '#F4D03F'),
(4, 'Oddělení lidských zdrojů', 'LZ', 'Plzeň', '#2ECC71'),
(5, 'Oddělení prodeje', 'PROD', 'Liberec', '#9B59B6'),
(6, 'Oddělení vývoje', 'VYV', 'Hradec Králové', '#E74C3C'),
(7, 'Oddělení kvality', 'KVA', 'Olomouc', '#95A5A6'),
(8, 'Oddělení logistiky', 'LOG', 'Zlín', '#27AE60'),
(9, 'Oddělení obchodu', 'OBC', 'Ústí nad Labem', '#F7DC6F');

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
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Vypisuji data pro tabulku `employees`
--

INSERT INTO `employees` (`id`, `name`, `surname`, `password`, `email`, `department_id`) VALUES
(1, 'AdÃ©la', 'SÃ½korovÃ¡', '$2y$10$0BqUU2lcHgAs4EDmaBe0zuwgfxN.NTqYtlpFwLFm9Wao.goeWWjkS', 'adela.sykora@seznam.cz', 3),
(2, 'TomÃ¡Å¡', 'NovÃ¡k', '$2y$10$GBU.gzen/xl6cuou5PkqOeHj46AE0O.c5yps.ytI5gClVy.8uA0X6', 'tomas.novak@seznam.cz', 2),
(3, 'Petra ', 'KratochvÃ­lovÃ¡', '$2y$10$T8ZhOJBSS8t5PKugP2k2KO1kI4B97O7KCM8R5MMMsI3niiSQDfr0y', 'petra.kratochvilova@seznam.cz', 3),
(4, 'Jan ', 'Å tÄ›pÃ¡nek', '$2y$10$kEDx7hH0vSICM8LG.iSuz.Hnyy98Xg.tYxQcnUdsQvIKyn2.9MRPO', 'jan.stepanek@seznam.cz', 2),
(5, 'KateÅ™ina ', 'NavrÃ¡tilovÃ¡', '$2y$10$nAoSPT6NrrbPXwy/d73uV.qMbyPSvdKmNjMEPyG9hzZsvuo08JMYW', 'katerina.navratilova@seznam.cz', 5),
(6, 'JiÅ™Ã­ ', 'ProchÃ¡zka', '$2y$10$FKZzahLB4pB1e5ErOInCreGp5gtD3Q565SGQKW5YsaGjQem8m7ecy', 'jiri.prochazka@seznam.cz', 1),
(7, 'Barbora ', 'BÃ­lkovÃ¡', '$2y$10$DBiC27IQAtIHGfOXCQ0M3.7aLk7yt.Pr1m5kqV.ib9aDNL67cH72O', 'barbora.bilkova@seznam.cz', 8),
(8, 'Marek ', 'NovotnÃ½', '$2y$10$5p.EfinRko9632LiG9DKdee9o5IBguQwI10iygjvVQGol7N1NFDti', 'marek.novotny@seznam.cz', 9),
(9, 'Veronika ', 'SvobodovÃ¡', '$2y$10$09vSy4eVqQ/3NHdtG6bba.UfdyiNlUIY9xP6cprEzB2OyqIeC8/BC', 'veronika.svobodova@seznam.cz', 6),
(10, 'Michal ', 'VeselÃ½', '$2y$10$9GhvYVvBPDrz6uEIfkBiOOvLPp3IY8KYNJCvBOapLCL8HWH5kcakq', 'michal.vesely@seznam.cz', 4);

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
