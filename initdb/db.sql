CREATE DATABASE IF NOT EXISTS contact_db CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci;
USE contact_db;

CREATE TABLE users (
  id INT AUTO_INCREMENT PRIMARY KEY,
  first_name VARCHAR(255),
  last_name VARCHAR(255),
  email VARCHAR(255) NOT NULL UNIQUE,
  phone INT NOT NULL UNIQUE,
  description  TEXT,
  password VARCHAR(255) NOT NULL,
  reset_token VARCHAR(255),
  reset_token_expires DATETIME,
  createdAt DATETIME,
  updatedAt DATETIME
) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci;

CREATE TABLE contacts (
  id INT AUTO_INCREMENT PRIMARY KEY,
  user_id INT NOT NULL,  
  first_name VARCHAR(255),
  last_name VARCHAR(255),
  email VARCHAR(255) NOT NULL UNIQUE,
  phone INT,
  adresse VARCHAR(255),
  description  TEXT,
  createdAt DATETIME,
  updatedAt DATETIME,
  FOREIGN KEY (user_id) REFERENCES users(id)
) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci;

CREATE TABLE external_contacts (
  id INT AUTO_INCREMENT PRIMARY KEY,
  first_name VARCHAR(255),
  last_name VARCHAR(255),
  email VARCHAR(255) NOT NULL UNIQUE,
  phone INT,
  adresse VARCHAR(255),
  description  TEXT,
  createdAt DATETIME DEFAULT CURRENT_TIMESTAMP,
  updatedAt DATETIME DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci;

CREATE INDEX idx_contacts_user ON contacts(user_id);


