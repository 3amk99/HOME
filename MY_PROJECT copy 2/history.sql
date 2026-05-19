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
    '$2y$10$CCNSl2iBT5ZOJNl6HpxM/OQ3bAD6tprCsIakpafHhb.HmJSOEKbeG',
    'admin'
),

(
    'omar',
    'omar@gmail.com',
    '$2y$10$OXXsJ9ovgZghJ8WHSn1yOeRf1kwAvqOTItYrWhEKK5kdsuy9UOt4u',
    'user'
),

(
    'sara',
    'sara@gmail.com',
    '$2y$10$G3GCzRyIBZogB6xZInFIgeNU5BlafMombe5twcUv.auR2GrDTVrBO',
    'user'
),

(
    'ali',
    'ali@gmail.com',
    '$2y$10$bpcxUEStFD/8/ohrqymuTus9nGyX4OZW7nJZo1z6RihGBdLIb6IhW',
    'user'
),

(
    'lina',
    'lina@gmail.com',
    '$2y$10$5lt/nixqQjVZCtg2FSLLF.cwzn8MzRK0Y9JKTba9W3E5CJc9sl6ne',
    'user'
);

UPDATE users
SET password = '$2y$10$CCNSl2iBT5ZOJNl6HpxM/OQ3bAD6tprCsIakpafHhb.HmJSOEKbeG'
WHERE username = '7ariss_3am';


UPDATE users
SET password = '$2y$10$OXXsJ9ovgZghJ8WHSn1yOeRf1kwAvqOTItYrWhEKK5kdsuy9UOt4u'
WHERE username = 'omar';


UPDATE users
SET password = '$2y$10$G3GCzRyIBZogB6xZInFIgeNU5BlafMombe5twcUv.auR2GrDTVrBO'
WHERE username = 'sara';


UPDATE users
SET password = '$2y$10$bpcxUEStFD/8/ohrqymuTus9nGyX4OZW7nJZo1z6RihGBdLIb6IhW'
WHERE username = 'ali';


UPDATE users
SET password = '$2y$10$5lt/nixqQjVZCtg2FSLLF.cwzn8MzRK0Y9JKTba9W3E5CJc9sl6ne'
WHERE username = 'lina';



ALTER TABLE attendance
ADD created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP;
