-- Создание базы и таблицы для to-do проекта.
-- Импорт: phpMyAdmin -> вкладка "Импорт" -> выбрать этот файл.

CREATE DATABASE IF NOT EXISTS todo_practice
    CHARACTER SET utf8mb4
    COLLATE utf8mb4_unicode_ci;

USE todo_practice;

CREATE TABLE IF NOT EXISTS tasks (
    id INT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    title VARCHAR(200) NOT NULL,
    created_at TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
