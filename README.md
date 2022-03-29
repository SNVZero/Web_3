SQL - Создание таблицы  
CREATE TABLE application (  
id int(10) unsigned NOT NULL AUTO_INCREMENT,  
name varchar(128) NOT NULL DEFAULT 'name',  
mail varchar(128) NOT NULL DEFAULT 'email',  
bio varchar(256) NOT NULL DEFAULT 'bio',  
date varchar(10) NOT NULL DEFAULT '01-01-1970',  
gender varchar(1) NOT NULL DEFAULT '-',  
limbs varchar(1) NOT NULL DEFAULT '4',  
ability_1 varchar(16) NOT NULL DEFAULT 'no spell',  
ability_2varchar(16) NOT NULL DEFAULT 'no spell',  
ability_3varchar(16) NOT NULL DEFAULT 'no spell',  
ability_4varchar(16) NOT NULL DEFAULT 'no spell',  
PRIMARY KEY (id)  
);  
