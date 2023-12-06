CREATE DATABASE IF NOT EXISTS class;

USE class;

CREATE TABLE IF NOT EXISTS class (
    id INT PRIMARY KEY,
    name VARCHAR(255),
    email VARCHAR(255),
    password VARCHAR(255),
    profile_image_path VARCHAR(255)
);
