CREATE DATABASE stage_db;

USE stage_db;

CREATE TABLE users (
    id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(100),
    email VARCHAR(100),
    password TEXT,
    role ENUM('admin','etudiant','entreprise')
);

CREATE TABLE offres (
    id INT AUTO_INCREMENT PRIMARY KEY,
    titre VARCHAR(255),
    description TEXT,
    entreprise_id INT
);

CREATE TABLE candidatures (
    id INT AUTO_INCREMENT PRIMARY KEY,
    user_id INT,
    offre_id INT,
    cv VARCHAR(255),
    status VARCHAR(50)
);

CREATE TABLE notifications (
    id INT AUTO_INCREMENT PRIMARY KEY,
    user_id INT,
    message TEXT,
    is_read TINYINT DEFAULT 0,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);