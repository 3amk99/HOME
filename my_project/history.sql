create database my_project ;
use my_project ; 
CREATE TABLE users 
(
    id INT AUTO_INCREMENT PRIMARY KEY,
    username VARCHAR(50),
    email VARCHAR(100),
    password VARCHAR(255),
    role ENUM('admin', 'user') DEFAULT 'user'
);

CREATE TABLE boxes 
(
    id INT AUTO_INCREMENT PRIMARY KEY,
    box_name VARCHAR(50)
);
CREATE TABLE classes 
(
    id INT AUTO_INCREMENT PRIMARY KEY,
    class_name VARCHAR(50),
    box_id INT,

    FOREIGN KEY (box_id) REFERENCES boxes(id)
);
CREATE TABLE students 
(
    id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(100),
    photo VARCHAR(255),
    class_id INT,

    FOREIGN KEY (class_id) REFERENCES classes(id)
);
CREATE TABLE attendance 
(
    id INT AUTO_INCREMENT PRIMARY KEY,

    status ENUM('present', 'absent') DEFAULT 'present' ,

    attendance_date DATE ,

    student_id INT ,

    FOREIGN KEY (student_id) REFERENCES students(id)
);


INSERT INTO users
(username, email, password, role)

VALUES

(
    '7ariss_3am',
    '7ariss_3am@gmail.com',
    '$2y$10$hash1',
    'admin'
),

(
    'omar',
    'omar@gmail.com',
    '$2y$10$hash2',
    'user'
),

(
    'sara',
    'sara@gmail.com',
    '$2y$10$hash3',
    'user'
),

(
    'ali',
    'ali@gmail.com',
    '$2y$10$hash4',
    'user'
),

(
    'lina',
    'lina@gmail.com',
    '$2y$10$hash5',
    'user'
);