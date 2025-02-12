CREATE DATABASE IF NOT EXISTS facebook_php_db;

USE facebook_php_db;

CREATE TABLE users (
    id BIGINT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(255) NOT NULL,
    school VARCHAR(255),
    birthday DATE,
    hometown VARCHAR(255)
);

CREATE TABLE posts (
    id BIGINT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    user_id BIGINT UNSIGNED NOT NULL,
    likes INT DEFAULT 0 CHECK (likes >= 0),
    date_posted DATE,
    content TEXT,
    FOREIGN KEY (user_id) REFERENCES users(id) ON DELETE CASCADE
);