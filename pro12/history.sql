create database tutorial_12 ;
use tutorial_12 ;
create table Article 
(
 id int auto_increment primary key ,
 title varchar(50) ,
 content TEXT ,
 date DATETIME 
);

alter table article modify  date DATETIME DEFAULT CURRENT_TIMESTAMP ;

alter table article add photo varchar(255) ;

TRUNCATE table article ;

create table categories
(
  id int auto_increment primary key  ,
  name varchar(50) NOT NULL 
);

alter table article add column id_category int ;
alter table article 
add constraint fk_categories
foreign key (id_category) references categories(id) on delete cascade ;

create table login
(
 id int primary key auto_increment ,
 mail varchar(255) ,
 password varchar(255) 
)

CREATE TABLE users 
(
    id INT AUTO_INCREMENT PRIMARY KEY,
    email VARCHAR(255),
    password VARCHAR(255)
);

...


ALTER TABLE likes
DROP FOREIGN KEY fk_category_id;

ALTER TABLE likes
DROP COLUMN category_id ;

oooooooooooooooooooooooooooooooooo

USE tutorial_12;

ALTER DATABASE tutorial_12 
CHARACTER SET = utf8mb4 
COLLATE = utf8mb4_unicode_ci;

ALTER TABLE article 
CONVERT TO CHARACTER SET utf8mb4 
COLLATE utf8mb4_unicode_ci;

ALTER TABLE article 
MODIFY title VARCHAR(50) CHARACTER SET utf8mb4,
MODIFY content TEXT CHARACTER SET utf8mb4,
MODIFY photo VARCHAR(255) CHARACTER SET utf8mb4; //ba9i khassni nssawl hna 

oooooooooooooooooooooooooooooooooooooooooooooooooooooo

use tutorial_12 ;
CREATE TABLE article_views 
(
    id INT AUTO_INCREMENT PRIMARY KEY,
    article_id INT,
    ip_address VARCHAR(50),
    created_at DATETIME DEFAULT CURRENT_TIMESTAMP
);

ooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooo
ALTER TABLE likes 
ADD UNIQUE (login_id, article_id);
oooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooo