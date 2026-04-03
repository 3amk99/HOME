CREATE DATABASE solicode_project;
USE solicode_project;
CREATE TABLE users 
(
    id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(100) NOT NULL,
    photo VARCHAR(255) NOT NULL
);
CREATE TABLE Group_users 
(
 id INT AUTO_INCREMENT PRIMARY KEY ,
 name_group VARCHAR(100) NOT NULL ,
 max_number INT NOT NULL 
);
ALTER TABLE users ADD Group_id INT ;

ALTER TABLE users ADD COLUMN Group_key INT NOT NULL ;
ALTER TABLE users ADD CONSTRAINT fk_users FOREIGN KEY (Group_key) REFERENCES Group_users(id) ON DELETE CASCADE ;


alter table users drop foreign key fk_users ;
alter table users drop column Group_id , drop column Group_key;


alter table users add column groupe_id int not null ;
alter table users add constraint lign_users foreign key (groupe_id) 
                     references Group_users(id) on delete cascade ;

CREATE TABLE BOX
(
 id INT AUTO_INCREMENT PRIMARY KEY ,
 name_box VARCHAR(100) NOT NULL ,
 max_number_box INT NOT NULL 
);
alter table Group_users add column box_id int not null ;
alter table Group_users add constraint lign_Group_users foreign key (box_id)
                      references BOX(id) on delete cascade ;