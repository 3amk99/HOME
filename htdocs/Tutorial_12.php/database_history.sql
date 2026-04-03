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

