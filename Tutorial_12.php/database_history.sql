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