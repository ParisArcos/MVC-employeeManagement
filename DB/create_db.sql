-- CREATE LIBRARY DATABASE IF NOT EXISTS
DROP DATABASE IF EXISTS employees_v2;
CREATE DATABASE IF NOT EXISTS employees_v2;

USE employees_v2;

CREATE TABLE employees (
    id INT UNSIGNED AUTO_INCREMENT,
    name VARCHAR(20) NOT NULL,
    lastName VARCHAR(50),
    email VARCHAR(100) NOT NULL,
    avatar TEXT,
    gender VARCHAR(10) NOT NULL DEFAULT "man",
    city VARCHAR(20),
    streetAddress INT,
    state VARCHAR(5),
    age INT NOT NULL,
    postalCode INT,
    phoneNumber INT UNIQUE NOT NULL,
    PRIMARY KEY(id)
);

CREATE TABLE users (
    id INT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(20) UNIQUE NOT NULL,
    password VARCHAR(255) NOT NULL,
    email VARCHAR(100) UNIQUE NOT NULL
);


