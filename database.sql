-- MARIA DB:
CREATE DATABASE IF NOT EXISTS `employeesdatabase` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;

USE `employeesdatabase`;

CREATE TABLE IF NOT EXISTS `employees` (
    `id` INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    `name` VARCHAR(30) NOT NULL,
    `surname` VARCHAR(30) NOT NULL,
    `password` VARCHAR(60) NOT NULL,
    `email` VARCHAR(50) NOT NULL UNIQUE,
    `department_id` INT(6) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

CREATE TABLE IF NOT EXISTS `departments` (
    `id` INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    `name` VARCHAR(50) NOT NULL,
    `nameShortcut` VARCHAR(10) NOT NULL,
    `city` VARCHAR(50) NOT NULL,
    `color` VARCHAR(7) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

INSERT INTO `departments` (`name`, `nameShortcut`, `city`, `color`) VALUES
    ('Oddělení financí', 'FIN', 'Praha', '#FF5733'),
    ('Oddělení IT', 'IT', 'Brno', '#3498DB'),
    ('Oddělení marketingu', 'MKT', 'Ostrava', '#F4D03F'),
    ('Oddělení lidských zdrojů', 'LZ', 'Plzeň', '#2ECC71'),
    ('Oddělení prodeje', 'PROD', 'Liberec', '#9B59B6'),
    ('Oddělení vývoje', 'VYV', 'Hradec Králové', '#E74C3C'),
    ('Oddělení kvality', 'KVA', 'Olomouc', '#95A5A6'),
    ('Oddělení logistiky', 'LOG', 'Zlín', '#27AE60'),
    ('Oddělení obchodu', 'OBC', 'Ústí nad Labem', '#F7DC6F');

ALTER TABLE `employees` ADD CONSTRAINT `fk_employee_department`
        FOREIGN KEY (`department_id`)
        REFERENCES `departments` (`id`)
        ON DELETE CASCADE;
