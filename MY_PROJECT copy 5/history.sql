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

drop table attendance ;
CREATE TABLE attendance
(
    id INT AUTO_INCREMENT PRIMARY KEY,

    student_id INT NOT NULL,

    attendance_date DATE NOT NULL,

    attendance_hour INT NOT NULL,

    status ENUM('present','absent') NOT NULL DEFAULT 'present',

    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,

    UNIQUE(student_id, attendance_date, attendance_hour),

    FOREIGN KEY (student_id) REFERENCES students(id)
);






id student_id attendance_date attendance_hour status created_at
1	1	2026-05-22	11	present	2026-05-22 12:09:11
2	2	2026-05-22	11	present	2026-05-22 12:09:22
3	3	2026-05-22	11	present	2026-05-22 12:09:25
4	1	2026-05-20	8	present	2026-05-22 12:20:35
5	1	2026-05-20	9	absent	2026-05-22 12:20:35
6	1	2026-05-20	10	present	2026-05-22 12:20:35
7	1	2026-05-20	11	present	2026-05-22 12:20:35
8	1	2026-05-20	12	present	2026-05-22 12:20:35
9	1	2026-05-20	15	absent	2026-05-22 12:20:35
10	1	2026-05-20	16	present	2026-05-22 12:20:35
11	2	2026-05-20	8	present	2026-05-22 12:20:35
12	2	2026-05-20	9	present	2026-05-22 12:20:35
13	2	2026-05-20	10	present	2026-05-22 12:20:35
14	2	2026-05-20	11	present	2026-05-22 12:20:35
15	2	2026-05-20	12	present	2026-05-22 12:20:35
16	2	2026-05-20	15	present	2026-05-22 12:20:35
17	2	2026-05-20	16	present	2026-05-22 12:20:35
18	3	2026-05-20	8	absent	2026-05-22 12:20:35
19	3	2026-05-20	9	absent	2026-05-22 12:20:35
20	3	2026-05-20	10	absent	2026-05-22 12:20:35
21	3	2026-05-20	11	present	2026-05-22 12:20:35
22	3	2026-05-20	12	present	2026-05-22 12:20:35
23	3	2026-05-20	15	absent	2026-05-22 12:20:35
24	3	2026-05-20	16	absent	2026-05-22 12:20:35
