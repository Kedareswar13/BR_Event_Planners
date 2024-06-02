-- Create database
CREATE DATABASE IF NOT EXISTS event_planners_db;

-- Use the created database
USE event_planners_db;

-- Create table to store form data
CREATE TABLE IF NOT EXISTS form_data (
    id INT AUTO_INCREMENT PRIMARY KEY,
    yourFirstName VARCHAR(50) NOT NULL,
    yourLastName VARCHAR(50) NOT NULL,
    email VARCHAR(100) NOT NULL,
    phone VARCHAR(15) NOT NULL,
    eventDate DATE NOT NULL,
    location VARCHAR(100) NOT NULL,
    howFound VARCHAR(50) NOT NULL,
    interestedIn TEXT,
    howHelp TEXT,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);
