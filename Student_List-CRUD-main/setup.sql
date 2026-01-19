-- Workshop 8 Database Setup
-- Student Management System

-- Create database
CREATE DATABASE IF NOT EXISTS school_db;
USE school_db;

-- Create students table
CREATE TABLE IF NOT EXISTS students (
    id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(100) NOT NULL,
    email VARCHAR(100) NOT NULL,
    course VARCHAR(100) NOT NULL,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
);

-- Insert sample data (optional)
INSERT INTO students (name, email, course) VALUES
('John Doe', 'john.doe@example.com', 'Computer Science'),
('Jane Smith', 'jane.smith@example.com', 'Information Technology'),
('Mike Johnson', 'mike.johnson@example.com', 'Software Engineering'),
('Sarah Williams', 'sarah.williams@example.com', 'Data Science'),
('David Brown', 'david.brown@example.com', 'Cybersecurity');

-- Verify data
SELECT * FROM students;
